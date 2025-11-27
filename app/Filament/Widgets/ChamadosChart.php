<?php

namespace App\Filament\Widgets;

use App\Models\Chamado;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ChamadosChart extends ChartWidget
{
    protected static ?string $heading = 'Chamados por Categoria';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $chamadosPorCategoria = Chamado::query()
            ->select('categoria', DB::raw('count(*) as total'))
            ->whereIn('status', ['aberto', 'em_andamento'])
            ->groupBy('categoria')
            ->pluck('total', 'categoria')
            ->toArray();

        $labels = array_map(function ($categoria) {
            return match ($categoria) {
                'manutencao' => 'Manutenção',
                'limpeza' => 'Limpeza',
                'seguranca' => 'Segurança',
                'vazamento' => 'Vazamento',
                'eletrica' => 'Elétrica',
                'barulho' => 'Barulho',
                'elevador' => 'Elevador',
                'portaria' => 'Portaria',
                'areas_comuns' => 'Áreas Comuns',
                'jardim' => 'Jardim',
                'garagem' => 'Garagem',
                'outro' => 'Outro',
                default => ucfirst($categoria),
            };
        }, array_keys($chamadosPorCategoria));

        return [
            'datasets' => [
                [
                    'label' => 'Chamados Abertos',
                    'data' => array_values($chamadosPorCategoria),
                    'backgroundColor' => [
                        'rgb(59, 130, 246)',
                        'rgb(34, 197, 94)',
                        'rgb(249, 115, 22)',
                        'rgb(239, 68, 68)',
                        'rgb(168, 85, 247)',
                        'rgb(236, 72, 153)',
                        'rgb(14, 165, 233)',
                        'rgb(251, 146, 60)',
                        'rgb(132, 204, 22)',
                        'rgb(250, 204, 21)',
                        'rgb(163, 163, 163)',
                        'rgb(100, 116, 139)',
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
