<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservaResource\Pages;
use App\Models\Reserva;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservaResource extends Resource
{
    protected static ?string $model = Reserva::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'Reservas';
    protected static ?int $navigationSort = 9;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('condominio_id')->relationship('condominio', 'nome')->required(),
            Forms\Components\Select::make('unidade_id')
                ->relationship('unidade', 'numero')
                ->getOptionLabelFromRecordUsing(fn ($record) => $record->identificacao)
                ->searchable()
                ->required(),
            Forms\Components\Select::make('user_id')
                ->label('Morador')
                ->relationship('user', 'name')
                ->searchable()
                ->required()
                ->default(fn () => auth()->id()),
            Forms\Components\Select::make('espaco')->options([
                'salao_festas' => 'Salão de Festas',
                'churrasqueira_1' => 'Churrasqueira 1',
                'churrasqueira_2' => 'Churrasqueira 2',
                'quadra_esportes' => 'Quadra de Esportes',
                'piscina' => 'Piscina',
                'espaco_gourmet' => 'Espaço Gourmet',
            ])->required(),
            Forms\Components\DatePicker::make('data_reserva')->required(),
            Forms\Components\TimePicker::make('hora_inicio')->required(),
            Forms\Components\TimePicker::make('hora_fim')->required(),
            Forms\Components\TextInput::make('finalidade'),
            Forms\Components\TextInput::make('numero_convidados')->numeric(),
            Forms\Components\TextInput::make('valor_taxa')->numeric()->prefix('R$'),
            Forms\Components\Select::make('status')->options([
                'pendente' => 'Pendente',
                'confirmada' => 'Confirmada',
                'realizada' => 'Realizada',
                'cancelada' => 'Cancelada',
                'rejeitada' => 'Rejeitada'
            ])->default('pendente')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('condominio.nome')->searchable(),
                Tables\Columns\TextColumn::make('unidade.identificacao'),
                Tables\Columns\TextColumn::make('user.name')->label('Morador')->searchable(),
                Tables\Columns\TextColumn::make('espaco')->badge(),
                Tables\Columns\TextColumn::make('data_reserva')->date('d/m/Y'),
                Tables\Columns\TextColumn::make('hora_inicio')->time('H:i'),
                Tables\Columns\TextColumn::make('status')->badge(),
            ])
            ->filters([Tables\Filters\SelectFilter::make('status'), Tables\Filters\SelectFilter::make('espaco')])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReservas::route('/'),
            'create' => Pages\CreateReserva::route('/create'),
            'edit' => Pages\EditReserva::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
