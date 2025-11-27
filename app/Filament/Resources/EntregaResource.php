<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EntregaResource\Pages;
use App\Models\Entrega;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class EntregaResource extends Resource
{
    protected static ?string $model = Entrega::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationLabel = 'Entregas';

    protected static ?string $modelLabel = 'Entrega';

    protected static ?string $pluralModelLabel = 'Entregas';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Destinatário')
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
                    ])->columns(2),

                Forms\Components\Section::make('Informações da Entrega')
                    ->schema([
                        Forms\Components\Select::make('tipo')
                            ->label('Tipo')
                            ->required()
                            ->options([
                                'encomenda' => 'Encomenda',
                                'correspondencia' => 'Correspondência',
                                'outro' => 'Outro',
                            ])
                            ->default('encomenda'),
                        Forms\Components\TextInput::make('remetente')
                            ->label('Remetente/Transportadora')
                            ->maxLength(255)
                            ->placeholder('Ex: Correios, Mercado Livre'),
                        Forms\Components\Textarea::make('descricao')
                            ->label('Descrição')
                            ->rows(2)
                            ->placeholder('Ex: Caixa grande, pacote pequeno')
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Registro')
                    ->schema([
                        Forms\Components\Select::make('recebido_por')
                            ->label('Recebido por (Porteiro)')
                            ->relationship('porteiro', 'name')
                            ->searchable()
                            ->preload()
                            ->default(fn () => auth()->id()),
                        Forms\Components\DateTimePicker::make('data_recebimento')
                            ->label('Data/Hora Recebimento')
                            ->required()
                            ->default(now())
                            ->displayFormat('d/m/Y H:i')
                            ->seconds(false)
                            ->native(false),
                        Forms\Components\FileUpload::make('foto')
                            ->label('Foto da Encomenda')
                            ->image()
                            ->maxSize(2048)
                            ->directory('entregas')
                            ->imageEditor()
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Retirada')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->required()
                            ->options([
                                'pendente' => 'Pendente',
                                'retirada' => 'Retirada',
                                'devolvida' => 'Devolvida',
                            ])
                            ->default('pendente')
                            ->reactive(),
                        Forms\Components\Select::make('retirado_por')
                            ->label('Retirado por (Morador)')
                            ->relationship('morador', 'name')
                            ->searchable()
                            ->preload()
                            ->visible(fn (callable $get) => $get('status') === 'retirada'),
                        Forms\Components\DateTimePicker::make('data_retirada')
                            ->label('Data/Hora Retirada')
                            ->displayFormat('d/m/Y H:i')
                            ->seconds(false)
                            ->native(false)
                            ->visible(fn (callable $get) => $get('status') === 'retirada'),
                        Forms\Components\FileUpload::make('assinatura')
                            ->label('Assinatura Digital')
                            ->image()
                            ->maxSize(1024)
                            ->directory('assinaturas')
                            ->visible(fn (callable $get) => $get('status') === 'retirada')
                            ->columnSpanFull(),
                    ])->columns(3)->collapsible(),

                Forms\Components\Section::make('Observações')
                    ->schema([
                        Forms\Components\Textarea::make('observacoes')
                            ->label('Observações')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->size(50),
                Tables\Columns\TextColumn::make('unidade.identificacao')
                    ->label('Unidade')
                    ->searchable()
                    ->sortable()
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
                    ->searchable()
                    ->limit(20)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pendente' => 'warning',
                        'retirada' => 'success',
                        'devolvida' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pendente' => 'Pendente',
                        'retirada' => 'Retirada',
                        'devolvida' => 'Devolvida',
                        default => $state,
                    }),
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
                Tables\Columns\TextColumn::make('morador.name')
                    ->label('Retirado por')
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pendente' => 'Pendente',
                        'retirada' => 'Retirada',
                        'devolvida' => 'Devolvida',
                    ])
                    ->default('pendente'),
                Tables\Filters\SelectFilter::make('tipo')
                    ->label('Tipo')
                    ->options([
                        'encomenda' => 'Encomenda',
                        'correspondencia' => 'Correspondência',
                        'outro' => 'Outro',
                    ]),
                Tables\Filters\Filter::make('atrasadas')
                    ->label('Atrasadas (>7 dias)')
                    ->query(fn (Builder $query): Builder => $query->where('status', 'pendente')->whereDate('data_recebimento', '<=', now()->subDays(7)))
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('registrar_retirada')
                    ->label('Registrar Retirada')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn (Entrega $record): bool => $record->isPendente())
                    ->form([
                        Forms\Components\Select::make('retirado_por')
                            ->label('Retirado por')
                            ->relationship('morador', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\FileUpload::make('assinatura')
                            ->label('Assinatura Digital (opcional)')
                            ->image()
                            ->maxSize(1024)
                            ->directory('assinaturas'),
                    ])
                    ->action(function (Entrega $record, array $data): void {
                        $record->update([
                            'status' => 'retirada',
                            'retirado_por' => $data['retirado_por'],
                            'data_retirada' => now(),
                            'assinatura' => $data['assinatura'] ?? null,
                        ]);
                    })
                    ->successNotificationTitle('Retirada registrada com sucesso!'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('data_recebimento', 'desc');
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
            'index' => Pages\ListEntregas::route('/'),
            'create' => Pages\CreateEntrega::route('/create'),
            'edit' => Pages\EditEntrega::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pendente')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $pendentes = static::getModel()::where('status', 'pendente')->count();
        return $pendentes > 10 ? 'danger' : 'warning';
    }
}
