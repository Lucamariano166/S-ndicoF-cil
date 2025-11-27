<?php

namespace App\Filament\Widgets;

use App\Models\Entrega;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestEntregas extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Entrega::query()
                    ->where('status', 'pendente')
                    ->latest('data_recebimento')
                    ->limit(10)
            )
            ->heading('Entregas Pendentes Recentes')
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->size(40),
                Tables\Columns\TextColumn::make('unidade.identificacao')
                    ->label('Unidade')
                    ->searchable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('tipo')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'encomenda' => 'primary',
                        'correspondencia' => 'info',
                        'outro' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'encomenda' => 'Encomenda',
                        'correspondencia' => 'Correspondência',
                        'outro' => 'Outro',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('remetente')
                    ->label('Remetente')
                    ->limit(20),
                Tables\Columns\TextColumn::make('dias_espera')
                    ->label('Dias')
                    ->state(function (Entrega $record): string {
                        $dias = $record->dias_espera;
                        return $dias . ($dias === 1 ? ' dia' : ' dias');
                    })
                    ->color(fn (Entrega $record): string =>
                        $record->isAtrasada() ? 'danger' : 'gray'
                    )
                    ->icon(fn (Entrega $record): string =>
                        $record->isAtrasada() ? 'heroicon-o-exclamation-triangle' : ''
                    ),
                Tables\Columns\TextColumn::make('data_recebimento')
                    ->label('Recebida em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('ver')
                    ->label('Ver')
                    ->icon('heroicon-o-eye')
                    ->url(fn (Entrega $record): string => "/admin/entregas/{$record->id}/edit"),
            ]);
    }
}
