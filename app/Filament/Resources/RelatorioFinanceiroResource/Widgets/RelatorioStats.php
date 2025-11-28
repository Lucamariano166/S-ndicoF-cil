<?php

namespace App\Filament\Resources\RelatorioFinanceiroResource\Widgets;

use App\Models\Despesa;
use App\Models\Receita;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Livewire\Attributes\On;

class RelatorioStats extends BaseWidget
{
    public ?array $filters = [];

    #[On('filtersUpdated')]
    public function updateFilters(array $filters): void
    {
        $this->filters = $filters;
    }

    protected function getStats(): array
    {
        $dataInicio = $this->filters['data_inicio'] ?? now()->startOfMonth();
        $dataFim = $this->filters['data_fim'] ?? now()->endOfMonth();

        // Total de Receitas
        $totalReceitas = Receita::whereBetween('data_recebimento', [$dataInicio, $dataFim])
            ->sum('valor');

        // Contagem de Receitas
        $countReceitas = Receita::whereBetween('data_recebimento', [$dataInicio, $dataFim])
            ->count();

        // Total de Despesas Pagas
        $totalDespesasPagas = Despesa::where('status', 'paga')
            ->where(function ($query) use ($dataInicio, $dataFim) {
                $query->whereBetween('data_vencimento', [$dataInicio, $dataFim])
                    ->orWhereBetween('data_pagamento', [$dataInicio, $dataFim]);
            })
            ->sum('valor');

        // Total de Despesas (incluindo pendentes)
        $totalDespesas = Despesa::where(function ($query) use ($dataInicio, $dataFim) {
            $query->whereBetween('data_vencimento', [$dataInicio, $dataFim])
                ->orWhereBetween('data_pagamento', [$dataInicio, $dataFim]);
        })
            ->sum('valor');

        // Despesas Pendentes
        $despesasPendentes = Despesa::where('status', 'pendente')
            ->where(function ($query) use ($dataInicio, $dataFim) {
                $query->whereBetween('data_vencimento', [$dataInicio, $dataFim])
                    ->orWhereBetween('data_pagamento', [$dataInicio, $dataFim]);
            })
            ->sum('valor');

        $countDespesasPendentes = Despesa::where('status', 'pendente')
            ->where(function ($query) use ($dataInicio, $dataFim) {
                $query->whereBetween('data_vencimento', [$dataInicio, $dataFim])
                    ->orWhereBetween('data_pagamento', [$dataInicio, $dataFim]);
            })
            ->count();

        // Saldo (Receitas - Despesas Pagas)
        $saldo = $totalReceitas - $totalDespesasPagas;

        // Receitas por categoria
        $receitaPorTipo = Receita::selectRaw('tipo, SUM(valor) as total')
            ->whereBetween('data_recebimento', [$dataInicio, $dataFim])
            ->groupBy('tipo')
            ->orderByDesc('total')
            ->first();

        $maiorCategoriaReceita = $receitaPorTipo ? $receitaPorTipo->tipo_label : '-';

        // Despesas por categoria
        $despesaPorCategoria = Despesa::selectRaw('categoria, SUM(valor) as total')
            ->where(function ($query) use ($dataInicio, $dataFim) {
                $query->whereBetween('data_vencimento', [$dataInicio, $dataFim])
                    ->orWhereBetween('data_pagamento', [$dataInicio, $dataFim]);
            })
            ->groupBy('categoria')
            ->orderByDesc('total')
            ->first();

        $maiorCategoriaDespesa = $despesaPorCategoria ? $despesaPorCategoria->categoria_label : '-';

        return [
            Stat::make('Total de Receitas', 'R$ ' . number_format($totalReceitas, 2, ',', '.'))
                ->description($countReceitas . ' receita' . ($countReceitas !== 1 ? 's' : '') . ' no período')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart($this->getReceitasChartData($dataInicio, $dataFim)),

            Stat::make('Total de Despesas', 'R$ ' . number_format($totalDespesas, 2, ',', '.'))
                ->description('R$ ' . number_format($totalDespesasPagas, 2, ',', '.') . ' pagas')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart($this->getDespesasChartData($dataInicio, $dataFim)),

            Stat::make('Despesas Pendentes', 'R$ ' . number_format($despesasPendentes, 2, ',', '.'))
                ->description($countDespesasPendentes . ' despesa' . ($countDespesasPendentes !== 1 ? 's' : '') . ' pendente' . ($countDespesasPendentes !== 1 ? 's' : ''))
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('warning'),

            Stat::make('Saldo do Período', 'R$ ' . number_format($saldo, 2, ',', '.'))
                ->description($saldo >= 0 ? 'Superavit' : 'Déficit')
                ->descriptionIcon($saldo >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($saldo >= 0 ? 'success' : 'danger'),

            Stat::make('Maior Categoria de Receita', $maiorCategoriaReceita)
                ->description('Categoria com maior valor')
                ->descriptionIcon('heroicon-m-chart-pie')
                ->color('info'),

            Stat::make('Maior Categoria de Despesa', $maiorCategoriaDespesa)
                ->description('Categoria com maior gasto')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('warning'),
        ];
    }

    private function getReceitasChartData($dataInicio, $dataFim): array
    {
        $dias = $dataInicio->diffInDays($dataFim);
        $intervalo = max(1, intval($dias / 7)); // Dividir em aproximadamente 7 pontos

        return collect(range(6, 0))->map(function ($index) use ($dataInicio, $dataFim, $intervalo) {
            $data = $dataInicio->copy()->addDays($index * $intervalo);
            if ($data->greaterThan($dataFim)) {
                $data = $dataFim;
            }
            return Receita::whereDate('data_recebimento', $data)->sum('valor');
        })->toArray();
    }

    private function getDespesasChartData($dataInicio, $dataFim): array
    {
        $dias = $dataInicio->diffInDays($dataFim);
        $intervalo = max(1, intval($dias / 7));

        return collect(range(6, 0))->map(function ($index) use ($dataInicio, $dataFim, $intervalo) {
            $data = $dataInicio->copy()->addDays($index * $intervalo);
            if ($data->greaterThan($dataFim)) {
                $data = $dataFim;
            }
            return Despesa::whereDate('data_pagamento', $data)
                ->where('status', 'paga')
                ->sum('valor');
        })->toArray();
    }
}
