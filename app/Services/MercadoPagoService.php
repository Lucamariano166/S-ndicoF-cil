<?php

namespace App\Services;

use App\Models\Boleto;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Exceptions\MPApiException;

class MercadoPagoService
{
    protected PaymentClient $client;

    public function __construct()
    {
        // Configurar SDK
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));

        // Configurar ambiente (local para testes, server para produção)
        if (config('services.mercadopago.sandbox')) {
            MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);
        }

        $this->client = new PaymentClient();
    }

    /**
     * Gera um boleto (via Mercado Pago)
     */
    public function gerarBoleto(Boleto $boleto): array
    {
        try {
            // Data de vencimento no formato correto (apenas data, sem hora)
            $dataVencimento = $boleto->vencimento->format('Y-m-d');

            // Preparar dados do pagamento
            $paymentData = [
                "transaction_amount" => (float) $boleto->valor,
                "description" => $boleto->descricao ?? "Boleto - {$boleto->referencia}",
                "payment_method_id" => "bolbradesco",
                "payer" => [
                    "email" => $boleto->unidade->user->email ?? "morador@exemplo.com",
                    "first_name" => explode(' ', $boleto->unidade->user->name ?? 'Morador')[0],
                    "last_name" => explode(' ', $boleto->unidade->user->name ?? 'Exemplo')[1] ?? 'Exemplo',
                    "identification" => [
                        "type" => "CPF",
                        "number" => preg_replace('/\D/', '', $boleto->unidade->user->cpf ?? '00000000000')
                    ],
                ],
                "date_of_expiration" => $dataVencimento,
            ];

            // Criar pagamento
            $payment = $this->client->create($paymentData);

            // Retornar dados do boleto
            return [
                'success' => true,
                'payment_id' => $payment->id,
                'status' => $payment->status,
                'barcode' => $payment->barcode->content ?? null,
                'digitable_line' => $payment->transaction_details->digitable_line ?? null,
                'pdf_url' => $payment->transaction_details->external_resource_url ?? null,
            ];

        } catch (MPApiException $e) {
            return [
                'success' => false,
                'error' => $e->getApiResponse()->getContent(),
                'message' => $e->getMessage(),
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    public function consultarPagamento(string $paymentId): ?object
    {
        try {
            return $this->client->get($paymentId);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function cancelarPagamento(string $paymentId): bool
    {
        try {
            $payment = $this->client->cancel($paymentId);
            return $payment->status === 'cancelled';
        } catch (\Exception $e) {
            return false;
        }
    }
}
