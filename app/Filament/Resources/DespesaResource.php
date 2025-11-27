<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DespesaResource\Pages;
use App\Models\Despesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DespesaResource extends Resource
{
    protected static ?string $model = Despesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationLabel = 'Despesas';

    protected static ?string $navigationGroup = 'Financeiro';

    protected static ?int $navigationSort = 1;

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
                            ->placeholder('Ex: Manutenção do elevador'),

                        Forms\Components\Select::make('categoria')
                            ->label('Categoria')
                            ->options([
                                'manutencao' => 'Manutenção',
                                'limpeza' => 'Limpeza',
                                'seguranca' => 'Segurança',
                                'energia' => 'Energia',
                                'agua' => 'Água',
                                'gas' => 'Gás',
                                'internet' => 'Internet',
                                'elevador' => 'Elevador',
                                'jardinagem' => 'Jardinagem',
                                'administracao' => 'Administração',
                                'impostos' => 'Impostos',
                                'seguros' => 'Seguros',
                                'juridico' => 'Jurídico',
                                'obras' => 'Obras',
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

                        Forms\Components\DatePicker::make('data_vencimento')
                            ->label('Data de Vencimento')
                            ->required()
                            ->native(false)
                            ->displayFormat('d/m/Y'),

                        Forms\Components\DatePicker::make('data_pagamento')
                            ->label('Data de Pagamento')
                            ->native(false)
                            ->displayFormat('d/m/Y'),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'pendente' => 'Pendente',
                                'paga' => 'Paga',
                                'vencida' => 'Vencida',
                                'cancelada' => 'Cancelada',
                            ])
                            ->default('pendente')
                            ->required(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Fornecedor')
                    ->schema([
                        Forms\Components\TextInput::make('fornecedor')
                            ->label('Nome do Fornecedor')
                            ->maxLength(255)
                            ->placeholder('Ex: Empresa XYZ Ltda'),

                        Forms\Components\TextInput::make('numero_nota')
                            ->label('Número da Nota Fiscal')
                            ->maxLength(255)
                            ->placeholder('Ex: NF-12345'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Comprovantes')
                    ->schema([
                        Forms\Components\FileUpload::make('comprovantes')
                            ->label('Arquivos Comprovantes')
                            ->multiple()
                            ->maxFiles(5)
                            ->acceptedFileTypes(['application/pdf', 'image/*'])
                            ->maxSize(5120)
                            ->directory('comprovantes/despesas')
                            ->downloadable()
                            ->openable()
                            ->helperText('Máximo de 5 arquivos (PDF ou imagens). Tamanho máximo: 5MB por arquivo.'),
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

                Tables\Columns\TextColumn::make('categoria')
                    ->label('Categoria')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match($state) {
                        'manutencao' => 'Manutenção',
                        'limpeza' => 'Limpeza',
                        'seguranca' => 'Segurança',
                        'energia' => 'Energia',
                        'agua' => 'Água',
                        'gas' => 'Gás',
                        'internet' => 'Internet',
                        'elevador' => 'Elevador',
                        'jardinagem' => 'Jardinagem',
                        'administracao' => 'Administração',
                        'impostos' => 'Impostos',
                        'seguros' => 'Seguros',
                        'juridico' => 'Jurídico',
                        'obras' => 'Obras',
                        'outros' => 'Outros',
                        default => $state,
                    })
                    ->color(fn ($state) => match($state) {
                        'manutencao' => 'warning',
                        'limpeza' => 'success',
                        'seguranca' => 'danger',
                        'energia', 'agua', 'gas' => 'info',
                        'impostos', 'juridico' => 'gray',
                        default => 'primary',
                    })
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('valor')
                    ->label('Valor')
                    ->money('BRL')
                    ->sortable(),

                Tables\Columns\TextColumn::make('data_vencimento')
                    ->label('Vencimento')
                    ->date('d/m/Y')
                    ->sortable()
                    ->color(fn ($record) => $record->isVencida() ? 'danger' : null)
                    ->icon(fn ($record) => $record->isVencida() ? 'heroicon-o-exclamation-triangle' : null),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match($state) {
                        'pendente' => 'Pendente',
                        'paga' => 'Paga',
                        'vencida' => 'Vencida',
                        'cancelada' => 'Cancelada',
                        default => $state,
                    })
                    ->color(fn ($state) => match($state) {
                        'pendente' => 'warning',
                        'paga' => 'success',
                        'vencida' => 'danger',
                        'cancelada' => 'gray',
                        default => 'primary',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('fornecedor')
                    ->label('Fornecedor')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('condominio.nome')
                    ->label('Condomínio')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('data_vencimento', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('condominio_id')
                    ->label('Condomínio')
                    ->relationship('condominio', 'nome')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pendente' => 'Pendente',
                        'paga' => 'Paga',
                        'vencida' => 'Vencida',
                        'cancelada' => 'Cancelada',
                    ])
                    ->default('pendente'),

                Tables\Filters\SelectFilter::make('categoria')
                    ->label('Categoria')
                    ->options([
                        'manutencao' => 'Manutenção',
                        'limpeza' => 'Limpeza',
                        'seguranca' => 'Segurança',
                        'energia' => 'Energia',
                        'agua' => 'Água',
                        'gas' => 'Gás',
                        'internet' => 'Internet',
                        'elevador' => 'Elevador',
                        'jardinagem' => 'Jardinagem',
                        'administracao' => 'Administração',
                        'impostos' => 'Impostos',
                        'seguros' => 'Seguros',
                        'juridico' => 'Jurídico',
                        'obras' => 'Obras',
                        'outros' => 'Outros',
                    ])
                    ->multiple(),

                Tables\Filters\Filter::make('vencidas')
                    ->label('Vencidas')
                    ->query(fn (Builder $query) => $query->where('status', 'pendente')->where('data_vencimento', '<', now())),
            ])
            ->actions([
                Tables\Actions\Action::make('marcar_como_paga')
                    ->label('Marcar como Paga')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn ($record) => $record->isPendente())
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update([
                            'status' => 'paga',
                            'data_pagamento' => now(),
                        ]);
                    }),

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
            'index' => Pages\ListDespesas::route('/'),
            'create' => Pages\CreateDespesa::route('/create'),
            'edit' => Pages\EditDespesa::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pendente')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $count = static::getModel()::where('status', 'pendente')->count();
        return $count > 10 ? 'danger' : 'warning';
    }
}
