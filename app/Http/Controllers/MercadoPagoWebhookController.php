<?php

namespace App\Http\Controllers;

use App\Models\Boleto;
use App\Services\MercadoPagoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MercadoPagoWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Log do webhook recebido
        Log::info('Mercado Pago Webhook recebido', $request->all());

        // Validar se é uma notificação de pagamento
        if ($request->type !== 'payment') {
            return response()->json(['message' => 'Tipo de notificação não suportado'], 200);
        }

        // Obter ID do pagamento
        $paymentId = $request->input('data.id');

        if (!$paymentId) {
            return response()->json(['message' => 'ID do pagamento não encontrado'], 400);
        }

        try {
            // Consultar dados do pagamento na API do Mercado Pago
            $service = new MercadoPagoService();
            $payment = $service->consultarPagamento($paymentId);

            if (!$payment) {
                Log::error('Pagamento não encontrado no Mercado Pago', ['payment_id' => $paymentId]);
                return response()->json(['message' => 'Pagamento não encontrado'], 404);
            }

            // Buscar boleto pelo código de barras ou linha digitável
            $boleto = Boleto::where('codigo_barras', $payment->barcode->content ?? null)
                ->orWhere('linha_digitavel', $payment->transaction_details->digitable_line ?? null)
                ->first();

            if (!$boleto) {
                Log::warning('Boleto não encontrado no sistema', [
                    'payment_id' => $paymentId,
                    'barcode' => $payment->barcode->content ?? null
                ]);
                return response()->json(['message' => 'Boleto não encontrado no sistema'], 404);
            }

            // Atualizar status do boleto baseado no status do pagamento
            $novoStatus = match($payment->status) {
                'approved' => 'pago',
                'pending', 'in_process' => 'pendente',
                'rejected', 'cancelled' => 'cancelado',
                default => null,
            };

            if ($novoStatus && $boleto->status !== $novoStatus) {
                $boleto->update([
                    'status' => $novoStatus,
                    'data_pagamento' => $payment->status === 'approved' ? now() : null,
                ]);

                Log::info('Status do boleto atualizado', [
                    'boleto_id' => $boleto->id,
                    'status_anterior' => $boleto->status,
                    'status_novo' => $novoStatus,
                    'payment_id' => $paymentId,
                ]);
            }

            return response()->json(['message' => 'Webhook processado com sucesso'], 200);

        } catch (\Exception $e) {
            Log::error('Erro ao processar webhook do Mercado Pago', [
                'payment_id' => $paymentId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json(['message' => 'Erro ao processar webhook'], 500);
        }
    }
}
