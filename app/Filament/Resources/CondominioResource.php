<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CondominioResource\Pages;
use App\Filament\Resources\CondominioResource\RelationManagers;
use App\Models\Condominio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CondominioResource extends Resource
{
    protected static ?string $model = Condominio::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Condomínios';

    protected static ?string $modelLabel = 'Condomínio';

    protected static ?string $pluralModelLabel = 'Condomínios';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações Básicas')
                    ->schema([
                        Forms\Components\TextInput::make('nome')
                            ->label('Nome do Condomínio')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('cnpj')
                            ->label('CNPJ')
                            ->mask('99.999.999/9999-99')
                            ->unique(ignoreRecord: true)
                            ->maxLength(18),
                        Forms\Components\TextInput::make('total_unidades')
                            ->label('Total de Unidades')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                    ])->columns(3),

                Forms\Components\Section::make('Endereço')
                    ->schema([
                        Forms\Components\TextInput::make('cep')
                            ->label('CEP')
                            ->mask('99999-999')
                            ->maxLength(9),
                        Forms\Components\TextInput::make('endereco')
                            ->label('Endereço')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('numero')
                            ->label('Número')
                            ->maxLength(20),
                        Forms\Components\TextInput::make('complemento')
                            ->label('Complemento')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('bairro')
                            ->label('Bairro')
                            ->maxLength(100),
                        Forms\Components\TextInput::make('cidade')
                            ->label('Cidade')
                            ->maxLength(100),
                        Forms\Components\TextInput::make('estado')
                            ->label('Estado')
                            ->maxLength(2)
                            ->placeholder('Ex: DF'),
                    ])->columns(3),

                Forms\Components\Section::make('Plano e Status')
                    ->schema([
                        Forms\Components\Select::make('plano')
                            ->label('Plano')
                            ->required()
                            ->options([
                                'basico' => 'Básico',
                                'standard' => 'Standard',
                                'pro' => 'Pro',
                            ])
                            ->default('basico'),
                        Forms\Components\DatePicker::make('trial_ends_at')
                            ->label('Fim do Trial')
                            ->displayFormat('d/m/Y')
                            ->native(false),
                        Forms\Components\Toggle::make('ativo')
                            ->label('Ativo')
                            ->required()
                            ->default(true),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cnpj')
                    ->label('CNPJ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cidade')
                    ->label('Cidade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estado')
                    ->label('UF')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_unidades')
                    ->label('Unidades')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('plano')
                    ->label('Plano')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'basico' => 'gray',
                        'standard' => 'primary',
                        'pro' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'basico' => 'Básico',
                        'standard' => 'Standard',
                        'pro' => 'Pro',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('trial_ends_at')
                    ->label('Fim Trial')
                    ->date('d/m/Y')
                    ->sortable(),
                Tables\Columns\IconColumn::make('ativo')
                    ->label('Ativo')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('plano')
                    ->label('Plano')
                    ->options([
                        'basico' => 'Básico',
                        'standard' => 'Standard',
                        'pro' => 'Pro',
                    ]),
                Tables\Filters\TernaryFilter::make('ativo')
                    ->label('Ativo')
                    ->placeholder('Todos')
                    ->trueLabel('Somente ativos')
                    ->falseLabel('Somente inativos'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCondominios::route('/'),
            'create' => Pages\CreateCondominio::route('/create'),
            'edit' => Pages\EditCondominio::route('/{record}/edit'),
        ];
    }
}
