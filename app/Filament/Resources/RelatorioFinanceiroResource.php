<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RelatorioFinanceiroResource\Pages;
use Filament\Resources\Resource;

class RelatorioFinanceiroResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationLabel = 'Relatório Financeiro';

    protected static ?string $navigationGroup = 'Financeiro';

    protected static ?int $navigationSort = 1;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ViewRelatorioFinanceiro::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
