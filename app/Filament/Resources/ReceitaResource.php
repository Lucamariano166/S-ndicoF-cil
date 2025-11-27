<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReceitaResource\Pages;
use App\Models\Receita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ReceitaResource extends Resource
{
    protected static ?string $model = Receita::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel = 'Receitas';

    protected static ?string $navigationGroup = 'Financeiro';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações Básicas')
                    ->schema([
                        Forms\Components\Select::make('condominio_id')
                            ->relationship('condominio', 'nome')
                            ->label('Condomínio')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Forms\Components\TextInput::make('descricao')
                            ->label('Descrição')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ex: Taxa de condomínio - Janeiro/2025'),

                        Forms\Components\Select::make('tipo')
                            ->label('Tipo')
                            ->options([
                                'taxa_condominio' => 'Taxa de Condomínio',
                                'aluguel' => 'Aluguel',
                                'multa' => 'Multa',
                                'servico' => 'Serviço',
                                'evento' => 'Evento',
                                'outros' => 'Outros',
                            ])
                            ->required()
                            ->searchable(),

                        Forms\Components\Textarea::make('observacoes')
                            ->label('Observações')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Valores e Datas')
                    ->schema([
                        Forms\Components\TextInput::make('valor')
                            ->label('Valor')
                            ->required()
                            ->numeric()
                            ->prefix('R$')
                            ->minValue(0)
                            ->placeholder('0,00'),

                        Forms\Components\DatePicker::make('data_competencia')
                            ->label('Data de Competência')
                            ->required()
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->helperText('Mês/ano de referência da receita'),

                        Forms\Components\DatePicker::make('data_recebimento')
                            ->label('Data de Recebimento')
                            ->required()
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->helperText('Data efetiva do recebimento'),

                        Forms\Components\TextInput::make('numero_recibo')
                            ->label('Número do Recibo')
                            ->maxLength(255)
                            ->placeholder('Ex: REC-12345'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Vinculações')
                    ->schema([
                        Forms\Components\Select::make('boleto_id')
                            ->relationship('boleto', 'id')
                            ->label('Boleto Relacionado')
                            ->searchable()
                            ->preload()
                            ->helperText('Vincule esta receita a um boleto pago'),

                        Forms\Components\Select::make('unidade_id')
                            ->relationship('unidade', 'numero')
                            ->label('Unidade')
                            ->searchable()
                            ->preload()
                            ->helperText('Unidade que gerou esta receita'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Comprovante')
                    ->schema([
                        Forms\Components\FileUpload::make('comprovante')
                            ->label('Arquivo Comprovante')
                            ->acceptedFileTypes(['application/pdf', 'image/*'])
                            ->maxSize(5120)
                            ->directory('comprovantes/receitas')
                            ->downloadable()
                            ->openable()
                            ->helperText('PDF ou imagem. Tamanho máximo: 5MB.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('descricao')
                    ->label('Descrição')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('tipo')
                    ->label('Tipo')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match($state) {
                        'taxa_condominio' => 'Taxa de Condomínio',
                        'aluguel' => 'Aluguel',
                        'multa' => 'Multa',
                        'servico' => 'Serviço',
                        'evento' => 'Evento',
                        'outros' => 'Outros',
                        default => $state,
                    })
                    ->color(fn ($state) => match($state) {
                        'taxa_condominio' => 'success',
                        'aluguel' => 'primary',
                        'multa' => 'warning',
                        'servico' => 'info',
                        'evento' => 'purple',
                        'outros' => 'gray',
                        default => 'primary',
                    })
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('valor')
                    ->label('Valor')
                    ->money('BRL')
                    ->sortable()
                    ->color('success')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('data_competencia')
                    ->label('Competência')
                    ->date('m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('data_recebimento')
                    ->label('Recebimento')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('unidade.numero')
                    ->label('Unidade')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('condominio.nome')
                    ->label('Condomínio')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('data_recebimento', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('condominio_id')
                    ->label('Condomínio')
                    ->relationship('condominio', 'nome')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('tipo')
                    ->label('Tipo')
                    ->options([
                        'taxa_condominio' => 'Taxa de Condomínio',
                        'aluguel' => 'Aluguel',
                        'multa' => 'Multa',
                        'servico' => 'Serviço',
                        'evento' => 'Evento',
                        'outros' => 'Outros',
                    ])
                    ->multiple(),

                Tables\Filters\SelectFilter::make('unidade_id')
                    ->label('Unidade')
                    ->relationship('unidade', 'numero')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListReceitas::route('/'),
            'create' => Pages\CreateReceita::route('/create'),
            'edit' => Pages\EditReceita::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::whereMonth('data_recebimento', now()->month)->count();
        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'success';
    }
}
