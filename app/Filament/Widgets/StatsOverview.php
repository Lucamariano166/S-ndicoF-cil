<?php

namespace App\Filament\Widgets;

use App\Models\Boleto;
use App\Models\Chamado;
use App\Models\Entrega;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $boletosPendentes = Boleto::where('status', 'pendente')->count();
        $boletosVencidos = Boleto::where('status', 'pendente')
            ->whereDate('vencimento', '<', now())
            ->count();
        $valorPendente = Boleto::where('status', 'pendente')->sum('valor');

        $chamadosAbertos = Chamado::whereIn('status', ['aberto', 'em_andamento'])->count();
        $chamadosUrgentes = Chamado::where('prioridade', 'urgente')
            ->whereIn('status', ['aberto', 'em_andamento'])
            ->count();

        $entregasPendentes = Entrega::where('status', 'pendente')->count();
        $entregasAtrasadas = Entrega::where('status', 'pendente')
            ->whereDate('data_recebimento', '<=', now()->subDays(7))
            ->count();

        return [
            Stat::make('Boletos Pendentes', $boletosPendentes)
                ->description($boletosVencidos > 0 ? "{$boletosVencidos} vencidos" : 'Todos em dia')
                ->descriptionIcon($boletosVencidos > 0 ? 'heroicon-o-exclamation-triangle' : 'heroicon-o-check-circle')
                ->color($boletosVencidos > 0 ? 'danger' : 'success')
                ->chart([7, 4, 6, 3, 8, 6, $boletosPendentes]),

            Stat::make('Valor Pendente', 'R$ ' . number_format($valorPendente, 2, ',', '.'))
                ->description('Total a receber')
                ->descriptionIcon('heroicon-o-banknotes')
                ->color('warning'),

            Stat::make('Chamados Abertos', $chamadosAbertos)
                ->description($chamadosUrgentes > 0 ? "{$chamadosUrgentes} urgentes" : 'Nenhum urgente')
                ->descriptionIcon($chamadosUrgentes > 0 ? 'heroicon-o-fire' : 'heroicon-o-wrench-screwdriver')
                ->color($chamadosUrgentes > 0 ? 'danger' : 'info')
                ->chart([3, 5, 4, 6, 7, 5, $chamadosAbertos]),

            Stat::make('Entregas Pendentes', $entregasPendentes)
                ->description($entregasAtrasadas > 0 ? "{$entregasAtrasadas} atrasadas (>7 dias)" : 'Todas em dia')
                ->descriptionIcon($entregasAtrasadas > 0 ? 'heroicon-o-clock' : 'heroicon-o-archive-box')
                ->color($entregasAtrasadas > 0 ? 'warning' : 'success')
                ->chart([5, 8, 6, 4, 7, 9, $entregasPendentes]),
        ];
    }
}
