<?php

namespace App\Filament\Widgets;

use App\Models\Despesa;
use App\Models\Receita;
use Filament\Widgets\ChartWidget;

class FinanceiroChart extends ChartWidget
{
    protected static ?string $heading = 'Receitas vs Despesas (Últimos 6 meses)';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $months = collect(range(5, 0))->map(function ($monthsAgo) {
            return now()->subMonths($monthsAgo);
        });

        $receitasData = $months->map(function ($date) {
            return Receita::whereYear('data_recebimento', $date->year)
                ->whereMonth('data_recebimento', $date->month)
                ->sum('valor');
        })->toArray();

        $despesasData = $months->map(function ($date) {
            return Despesa::whereYear('data_pagamento', $date->year)
                ->whereMonth('data_pagamento', $date->month)
                ->sum('valor');
        })->toArray();

        $labels = $months->map(function ($date) {
            return $date->locale('pt_BR')->translatedFormat('M/Y');
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Receitas',
                    'data' => $receitasData,
                    'backgroundColor' => 'rgba(34, 197, 94, 0.2)',
                    'borderColor' => 'rgb(34, 197, 94)',
                    'borderWidth' => 2,
                    'tension' => 0.3,
                ],
                [
                    'label' => 'Despesas',
                    'data' => $despesasData,
                    'backgroundColor' => 'rgba(239, 68, 68, 0.2)',
                    'borderColor' => 'rgb(239, 68, 68)',
                    'borderWidth' => 2,
                    'tension' => 0.3,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
