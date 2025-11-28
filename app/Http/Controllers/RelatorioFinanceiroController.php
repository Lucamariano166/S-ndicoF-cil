<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatorioFinanceiroController extends Controller
{
    public function gerarPdf(Request $request)
    {
        $dataInicio = \Carbon\Carbon::parse($request->get('data_inicio', now()->startOfMonth()));
        $dataFim = \Carbon\Carbon::parse($request->get('data_fim', now()->endOfMonth()));
        $tipo = $request->get('tipo', 'todos');
        $categoriaDespesa = $request->get('categoria_despesa', 'todas');
        $tipoReceita = $request->get('tipo_receita', 'todos');

        // Buscar receitas
        $receitas = DB::table('receitas')
            ->select([
                'id',
                DB::raw("'Receita' as tipo_transacao"),
                'data_recebimento as data',
                'descricao',
                'tipo as categoria',
                DB::raw('NULL as fornecedor_unidade'),
                'valor',
                DB::raw("'Recebida' as status"),
                'created_at',
                'updated_at',
            ])
            ->whereBetween('data_recebimento', [$dataInicio, $dataFim])
            ->whereNull('deleted_at')
            ->when($tipoReceita !== 'todos', fn ($q) => $q->where('tipo', $tipoReceita));

        // Buscar despesas
        $despesas = DB::table('despesas')
            ->select([
                'id',
                DB::raw("'Despesa' as tipo_transacao"),
                DB::raw('COALESCE(data_pagamento, data_vencimento) as data'),
                'descricao',
                'categoria',
                'fornecedor as fornecedor_unidade',
                'valor',
                DB::raw("CASE
                    WHEN status = 'paga' THEN 'Paga'
                    WHEN status = 'pendente' THEN 'Pendente'
                    ELSE status
                END as status"),
                'created_at',
                'updated_at',
            ])
            ->where(function ($query) use ($dataInicio, $dataFim) {
                $query->whereBetween('data_vencimento', [$dataInicio, $dataFim])
                    ->orWhereBetween('data_pagamento', [$dataInicio, $dataFim]);
            })
            ->whereNull('deleted_at')
            ->when($categoriaDespesa !== 'todas', fn ($q) => $q->where('categoria', $categoriaDespesa));

        // Combinar dados baseado no tipo
        if ($tipo === 'receitas') {
            $dados = collect($receitas->get());
        } elseif ($tipo === 'despesas') {
            $dados = collect($despesas->get());
        } else {
            $dados = collect($receitas->get())->merge($despesas->get())->sortByDesc('data');
        }

        // Calcular totais
        $totalReceitas = $dados->where('tipo_transacao', 'Receita')->sum('valor');
        $totalDespesas = $dados->where('tipo_transacao', 'Despesa')->sum('valor');
        $saldo = $totalReceitas - $totalDespesas;

        // Renderizar view
        $html = view('filament.resources.relatorio-financeiro-resource.pdf.relatorio', [
            'dados' => $dados,
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'totalReceitas' => $totalReceitas,
            'totalDespesas' => $totalDespesas,
            'saldo' => $saldo,
        ])->render();

        return response($html)
            ->header('Content-Type', 'text/html; charset=utf-8');
    }
}
