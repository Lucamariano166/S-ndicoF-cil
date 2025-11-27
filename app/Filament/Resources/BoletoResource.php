<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoletoResource\Pages;
use App\Filament\Resources\BoletoResource\RelationManagers;
use App\Models\Boleto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BoletoResource extends Resource
{
    protected static ?string $model = Boleto::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel = 'Boletos';

    protected static ?string $modelLabel = 'Boleto';

    protected static ?string $pluralModelLabel = 'Boletos';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações do Boleto')
                    ->schema([
                        Forms\Components\Select::make('condominio_id')
                            ->label('Condomínio')
                            ->relationship('condominio', 'nome')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('unidade_id', null)),
                        Forms\Components\Select::make('unidade_id')
                            ->label('Unidade')
                            ->relationship(
                                'unidade',
                                'numero',
                                fn (Builder $query, callable $get) =>
                                    $query->where('condominio_id', $get('condominio_id'))
                            )
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->identificacao)
                            ->searchable()
                            ->preload()
                            ->required()
                            ->disabled(fn (callable $get) => !$get('condominio_id')),
                        Forms\Components\TextInput::make('descricao')
                            ->label('Descrição')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ex: Condomínio + Taxa Extra'),
                        Forms\Components\TextInput::make('referencia')
                            ->label('Referência (Mês/Ano)')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ex: 11/2025'),
                    ])->columns(2),

                Forms\Components\Section::make('Valores e Datas')
                    ->schema([
                        Forms\Components\TextInput::make('valor')
                            ->label('Valor')
                            ->required()
                            ->numeric()
                            ->prefix('R$')
                            ->minValue(0)
                            ->step(0.01),
                        Forms\Components\DatePicker::make('vencimento')
                            ->label('Vencimento')
                            ->required()
                            ->displayFormat('d/m/Y')
                            ->native(false),
                        Forms\Components\DatePicker::make('data_pagamento')
                            ->label('Data de Pagamento')
                            ->displayFormat('d/m/Y')
                            ->native(false),
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->required()
                            ->options([
                                'pendente' => 'Pendente',
                                'pago' => 'Pago',
                                'vencido' => 'Vencido',
                                'cancelado' => 'Cancelado',
                            ])
                            ->default('pendente'),
                    ])->columns(4),

                Forms\Components\Section::make('Dados Bancários')
                    ->schema([
                        Forms\Components\TextInput::make('codigo_barras')
                            ->label('Código de Barras')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('linha_digitavel')
                            ->label('Linha Digitável')
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('arquivo_pdf')
                            ->label('Arquivo PDF')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(5120)
                            ->directory('boletos'),
                    ])->columns(2),

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
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('unidade.identificacao')
                    ->label('Unidade')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('descricao')
                    ->label('Descrição')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('referencia')
                    ->label('Ref.')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('valor')
                    ->label('Valor')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('vencimento')
                    ->label('Vencimento')
                    ->date('d/m/Y')
                    ->sortable()
                    ->color(fn (Boleto $record): string =>
                        $record->status === 'pendente' && $record->vencimento->isPast()
                            ? 'danger'
                            : 'gray'
                    ),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pendente' => 'warning',
                        'pago' => 'success',
                        'vencido' => 'danger',
                        'cancelado' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pendente' => 'Pendente',
                        'pago' => 'Pago',
                        'vencido' => 'Vencido',
                        'cancelado' => 'Cancelado',
                        default => $state,
                    }),
                Tables\Columns\IconColumn::make('arquivo_pdf')
                    ->label('PDF')
                    ->boolean()
                    ->trueIcon('heroicon-o-document-text')
                    ->falseIcon('heroicon-o-x-mark')
                    ->trueColor('success')
                    ->falseColor('gray'),
                Tables\Columns\TextColumn::make('data_pagamento')
                    ->label('Pago em')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('condominio')
                    ->label('Condomínio')
                    ->relationship('condominio', 'nome')
                    ->searchable()
                    ->preload(),
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pendente' => 'Pendente',
                        'pago' => 'Pago',
                        'vencido' => 'Vencido',
                        'cancelado' => 'Cancelado',
                    ])
                    ->multiple(),
                Tables\Filters\Filter::make('vencimento')
                    ->label('Vencimento')
                    ->form([
                        Forms\Components\DatePicker::make('vencimento_de')
                            ->label('De'),
                        Forms\Components\DatePicker::make('vencimento_ate')
                            ->label('Até'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['vencimento_de'],
                                fn (Builder $query, $date): Builder => $query->whereDate('vencimento', '>=', $date),
                            )
                            ->when(
                                $data['vencimento_ate'],
                                fn (Builder $query, $date): Builder => $query->whereDate('vencimento', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\Action::make('gerar_boleto')
                    ->label('Gerar via Mercado Pago')
                    ->icon('heroicon-o-document-currency-dollar')
                    ->color('success')
                    ->visible(fn (Boleto $record) => !$record->codigo_barras)
                    ->requiresConfirmation()
                    ->action(function (Boleto $record) {
                        $service = new \App\Services\MercadoPagoService();
                        $result = $service->gerarBoleto($record);

                        if ($result['success']) {
                            $record->update([
                                'codigo_barras' => $result['barcode'],
                                'linha_digitavel' => $result['digitable_line'],
                                'arquivo' => $result['pdf_url'],
                            ]);

                            \Filament\Notifications\Notification::make()
                                ->title('Boleto gerado com sucesso!')
                                ->body('Código de barras e linha digitável foram salvos.')
                                ->success()
                                ->send();
                        } else {
                            $errorMessage = $result['message'] ?? 'Erro desconhecido';
                            if (is_array($result['error'] ?? null)) {
                                $errorMessage = json_encode($result['error']);
                            }

                            \Filament\Notifications\Notification::make()
                                ->title('Erro ao gerar boleto')
                                ->body($errorMessage)
                                ->danger()
                                ->send();
                        }
                    }),

                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('vencimento', 'desc');
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
            'index' => Pages\ListBoletos::route('/'),
            'create' => Pages\CreateBoleto::route('/create'),
            'edit' => Pages\EditBoleto::route('/{record}/edit'),
        ];
    }
}
