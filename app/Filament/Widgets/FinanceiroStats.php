<?php

namespace App\Filament\Widgets;

use App\Models\Despesa;
use App\Models\Receita;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FinanceiroStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // Receitas do mês atual
        $receitasMesAtual = Receita::whereYear('data_recebimento', now()->year)
            ->whereMonth('data_recebimento', now()->month)
            ->sum('valor');

        // Receitas do mês anterior
        $receitasMesAnterior = Receita::whereYear('data_recebimento', now()->subMonth()->year)
            ->whereMonth('data_recebimento', now()->subMonth()->month)
            ->sum('valor');

        $receitasVariacao = $receitasMesAnterior > 0
            ? (($receitasMesAtual - $receitasMesAnterior) / $receitasMesAnterior) * 100
            : 0;

        // Despesas do mês atual
        $despesasMesAtual = Despesa::whereYear('data_vencimento', now()->year)
            ->whereMonth('data_vencimento', now()->month)
            ->sum('valor');

        // Despesas pagas do mês
        $despesasPagasMes = Despesa::whereYear('data_vencimento', now()->year)
            ->whereMonth('data_vencimento', now()->month)
            ->where('status', 'paga')
            ->sum('valor');

        // Despesas pendentes
        $despesasPendentes = Despesa::where('status', 'pendente')->sum('valor');
        $despesasPendentesCount = Despesa::where('status', 'pendente')->count();

        // Saldo do mês
        $saldoMes = $receitasMesAtual - $despesasPagasMes;

        return [
            Stat::make('Receitas do Mês', 'R$ ' . number_format($receitasMesAtual, 2, ',', '.'))
                ->description($receitasVariacao >= 0
                    ? '+' . number_format($receitasVariacao, 1) . '% em relação ao mês anterior'
                    : number_format($receitasVariacao, 1) . '% em relação ao mês anterior'
                )
                ->descriptionIcon($receitasVariacao >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color('success')
                ->chart($this->getReceitasChartData()),

            Stat::make('Despesas do Mês', 'R$ ' . number_format($despesasMesAtual, 2, ',', '.'))
                ->description('R$ ' . number_format($despesasPagasMes, 2, ',', '.') . ' pagas')
                ->descriptionIcon('heroicon-m-credit-card')
                ->color('danger')
                ->chart($this->getDespesasChartData()),

            Stat::make('Despesas Pendentes', 'R$ ' . number_format($despesasPendentes, 2, ',', '.'))
                ->description($despesasPendentesCount . ' ' . ($despesasPendentesCount === 1 ? 'despesa pendente' : 'despesas pendentes'))
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('warning'),

            Stat::make('Saldo do Mês', 'R$ ' . number_format($saldoMes, 2, ',', '.'))
                ->description($saldoMes >= 0 ? 'Superavit' : 'Déficit')
                ->descriptionIcon($saldoMes >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($saldoMes >= 0 ? 'success' : 'danger'),
        ];
    }

    private function getReceitasChartData(): array
    {
        return collect(range(6, 0))->map(function ($daysAgo) {
            $date = now()->subDays($daysAgo);
            return Receita::whereDate('data_recebimento', $date)->sum('valor');
        })->toArray();
    }

    private function getDespesasChartData(): array
    {
        return collect(range(6, 0))->map(function ($daysAgo) {
            $date = now()->subDays($daysAgo);
            return Despesa::whereDate('data_pagamento', $date)
                ->where('status', 'paga')
                ->sum('valor');
        })->toArray();
    }
}
