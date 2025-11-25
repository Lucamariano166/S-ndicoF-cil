<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnidadeResource\Pages;
use App\Filament\Resources\UnidadeResource\RelationManagers;
use App\Models\Unidade;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnidadeResource extends Resource
{
    protected static ?string $model = Unidade::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $navigationLabel = 'Unidades';

    protected static ?string $modelLabel = 'Unidade';

    protected static ?string $pluralModelLabel = 'Unidades';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações da Unidade')
                    ->schema([
                        Forms\Components\Select::make('condominio_id')
                            ->label('Condomínio')
                            ->relationship('condominio', 'nome')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\TextInput::make('bloco')
                            ->label('Bloco')
                            ->maxLength(10)
                            ->placeholder('Ex: A, B, Torre 1'),
                        Forms\Components\TextInput::make('numero')
                            ->label('Número')
                            ->required()
                            ->maxLength(20)
                            ->placeholder('Ex: 101, 201'),
                        Forms\Components\Select::make('tipo')
                            ->label('Tipo')
                            ->required()
                            ->options([
                                'apartamento' => 'Apartamento',
                                'casa' => 'Casa',
                                'sala' => 'Sala Comercial',
                                'loja' => 'Loja',
                            ])
                            ->default('apartamento'),
                        Forms\Components\TextInput::make('metragem')
                            ->label('Metragem (m²)')
                            ->numeric()
                            ->suffix('m²')
                            ->minValue(0),
                        Forms\Components\TextInput::make('vagas_garagem')
                            ->label('Vagas de Garagem')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                    ])->columns(3),

                Forms\Components\Section::make('Observações')
                    ->schema([
                        Forms\Components\Textarea::make('observacoes')
                            ->label('Observações')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('condominio.nome')
                    ->label('Condomínio')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bloco')
                    ->label('Bloco')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('numero')
                    ->label('Número')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'apartamento' => 'primary',
                        'casa' => 'success',
                        'sala' => 'warning',
                        'loja' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'apartamento' => 'Apartamento',
                        'casa' => 'Casa',
                        'sala' => 'Sala',
                        'loja' => 'Loja',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('metragem')
                    ->label('Metragem')
                    ->numeric(decimalPlaces: 2)
                    ->suffix(' m²')
                    ->sortable(),
                Tables\Columns\TextColumn::make('vagas_garagem')
                    ->label('Vagas')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('users_count')
                    ->label('Moradores')
                    ->counts('users')
                    ->badge()
                    ->color('info'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('condominio')
                    ->label('Condomínio')
                    ->relationship('condominio', 'nome')
                    ->searchable()
                    ->preload(),
                Tables\Filters\SelectFilter::make('tipo')
                    ->label('Tipo')
                    ->options([
                        'apartamento' => 'Apartamento',
                        'casa' => 'Casa',
                        'sala' => 'Sala Comercial',
                        'loja' => 'Loja',
                    ]),
                Tables\Filters\Filter::make('bloco')
                    ->label('Bloco')
                    ->form([
                        Forms\Components\TextInput::make('bloco')
                            ->label('Bloco'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['bloco'],
                                fn (Builder $query, $bloco): Builder => $query->where('bloco', $bloco),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('bloco', 'asc');
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
            'index' => Pages\ListUnidades::route('/'),
            'create' => Pages\CreateUnidade::route('/create'),
            'edit' => Pages\EditUnidade::route('/{record}/edit'),
        ];
    }
}
