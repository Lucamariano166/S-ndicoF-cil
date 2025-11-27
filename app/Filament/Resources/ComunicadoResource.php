<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComunicadoResource\Pages;
use App\Models\Comunicado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComunicadoResource extends Resource
{
    protected static ?string $model = Comunicado::class;
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationLabel = 'Comunicados';
    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('condominio_id')->relationship('condominio', 'nome')->required(),
            Forms\Components\TextInput::make('titulo')->required(),
            Forms\Components\Textarea::make('mensagem')->required()->rows(5),
            Forms\Components\Select::make('prioridade')->options(['baixa' => 'Baixa', 'normal' => 'Normal', 'alta' => 'Alta', 'urgente' => 'Urgente'])->default('normal')->required(),
            Forms\Components\Select::make('tipo_destinatarios')->options(['todos' => 'Todos', 'sindicos' => 'Síndicos', 'proprietarios' => 'Proprietários', 'inquilinos' => 'Inquilinos'])->default('todos')->required(),
            Forms\Components\Toggle::make('enviar_email')->default(true),
            Forms\Components\Toggle::make('publicar_mural')->default(true),
            Forms\Components\Select::make('status')->options(['rascunho' => 'Rascunho', 'agendado' => 'Agendado', 'enviado' => 'Enviado', 'arquivado' => 'Arquivado'])->default('rascunho')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('condominio.nome')->searchable(),
                Tables\Columns\TextColumn::make('titulo')->searchable(),
                Tables\Columns\TextColumn::make('prioridade')->badge(),
                Tables\Columns\TextColumn::make('tipo_destinatarios')->badge(),
                Tables\Columns\TextColumn::make('status')->badge(),
                Tables\Columns\TextColumn::make('enviado_em')->dateTime('d/m/Y H:i'),
            ])
            ->filters([Tables\Filters\SelectFilter::make('status'), Tables\Filters\SelectFilter::make('prioridade')])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComunicados::route('/'),
            'create' => Pages\CreateComunicado::route('/create'),
            'edit' => Pages\EditComunicado::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
