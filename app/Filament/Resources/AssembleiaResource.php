<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssembleiaResource\Pages;
use App\Models\Assembleia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssembleiaResource extends Resource
{
    protected static ?string $model = Assembleia::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Assembleias';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('condominio_id')->relationship('condominio', 'nome')->required(),
            Forms\Components\TextInput::make('titulo')->required(),
            Forms\Components\Textarea::make('descricao'),
            Forms\Components\Select::make('tipo')->options(['ordinaria' => 'Ordinária', 'extraordinaria' => 'Extraordinária'])->required(),
            Forms\Components\DateTimePicker::make('data_assembleia')->required(),
            Forms\Components\TextInput::make('local'),
            Forms\Components\Select::make('status')->options(['agendada' => 'Agendada', 'convocada' => 'Convocada', 'realizada' => 'Realizada', 'cancelada' => 'Cancelada'])->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('condominio.nome')->searchable(),
                Tables\Columns\TextColumn::make('titulo')->searchable(),
                Tables\Columns\TextColumn::make('tipo')->badge(),
                Tables\Columns\TextColumn::make('data_assembleia')->dateTime('d/m/Y H:i'),
                Tables\Columns\TextColumn::make('status')->badge(),
            ])
            ->filters([Tables\Filters\SelectFilter::make('status')])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssembleias::route('/'),
            'create' => Pages\CreateAssembleia::route('/create'),
            'edit' => Pages\EditAssembleia::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
