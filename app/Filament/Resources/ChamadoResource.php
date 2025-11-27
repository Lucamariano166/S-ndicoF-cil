<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChamadoResource\Pages;
use App\Models\Chamado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ChamadoResource extends Resource
{
    protected static ?string $model = Chamado::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationLabel = 'Chamados';

    protected static ?string $modelLabel = 'Chamado';

    protected static ?string $pluralModelLabel = 'Chamados';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações do Chamado')
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
                            ->label('Unidade (opcional)')
                            ->relationship(
                                'unidade',
                                'numero',
                                fn (Builder $query, callable $get) =>
                                    $query->where('condominio_id', $get('condominio_id'))
                            )
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->identificacao)
                            ->searchable()
                            ->preload()
                            ->disabled(fn (callable $get) => !$get('condominio_id')),
                        Forms\Components\Select::make('user_id')
                            ->label('Aberto por')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->default(fn () => auth()->id()),
                        Forms\Components\Select::make('atribuido_para')
                            ->label('Atribuído para')
                            ->relationship('responsavel', 'name')
                            ->searchable()
                            ->preload(),
                    ])->columns(2),

                Forms\Components\Section::make('Detalhes')
                    ->schema([
                        Forms\Components\TextInput::make('titulo')
                            ->label('Título')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Resumo do problema'),
                        Forms\Components\Select::make('categoria')
                            ->label('Categoria')
                            ->required()
                            ->options([
                                'geral' => 'Geral',
                                'manutencao' => 'Manutenção',
                                'limpeza' => 'Limpeza',
                                'seguranca' => 'Segurança',
                                'barulho' => 'Barulho',
                                'vazamento' => 'Vazamento',
                                'eletrica' => 'Elétrica',
                                'hidraulica' => 'Hidráulica',
                                'elevador' => 'Elevador',
                                'portaria' => 'Portaria',
                                'jardim' => 'Jardim',
                                'outro' => 'Outro',
                            ])
                            ->default('geral'),
                        Forms\Components\Select::make('prioridade')
                            ->label('Prioridade')
                            ->required()
                            ->options([
                                'baixa' => 'Baixa',
                                'media' => 'Média',
                                'alta' => 'Alta',
                                'urgente' => 'Urgente',
                            ])
                            ->default('media'),
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->required()
                            ->options([
                                'aberto' => 'Aberto',
                                'em_andamento' => 'Em Andamento',
                                'resolvido' => 'Resolvido',
                                'fechado' => 'Fechado',
                                'cancelado' => 'Cancelado',
                            ])
                            ->default('aberto'),
                    ])->columns(4),

                Forms\Components\Section::make('Descrição')
                    ->schema([
                        Forms\Components\Textarea::make('descricao')
                            ->label('Descrição do Problema')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Anexos')
                    ->schema([
                        Forms\Components\FileUpload::make('fotos')
                            ->label('Fotos')
                            ->image()
                            ->multiple()
                            ->maxFiles(5)
                            ->maxSize(2048)
                            ->directory('chamados')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Observações Adicionais')
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
                Tables\Columns\TextColumn::make('id')
                    ->label('#')
                    ->sortable(),
                Tables\Columns\TextColumn::make('titulo')
                    ->label('Título')
                    ->searchable()
                    ->limit(40)
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('categoria')
                    ->label('Categoria')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'manutencao' => 'warning',
                        'limpeza' => 'info',
                        'seguranca' => 'danger',
                        'vazamento' => 'danger',
                        'eletrica' => 'warning',
                        'elevador' => 'primary',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'geral' => 'Geral',
                        'manutencao' => 'Manutenção',
                        'limpeza' => 'Limpeza',
                        'seguranca' => 'Segurança',
                        'barulho' => 'Barulho',
                        'vazamento' => 'Vazamento',
                        'eletrica' => 'Elétrica',
                        'hidraulica' => 'Hidráulica',
                        'elevador' => 'Elevador',
                        'portaria' => 'Portaria',
                        'jardim' => 'Jardim',
                        'outro' => 'Outro',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'aberto' => 'danger',
                        'em_andamento' => 'warning',
                        'resolvido' => 'success',
                        'fechado' => 'gray',
                        'cancelado' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'aberto' => 'Aberto',
                        'em_andamento' => 'Em Andamento',
                        'resolvido' => 'Resolvido',
                        'fechado' => 'Fechado',
                        'cancelado' => 'Cancelado',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('prioridade')
                    ->label('Prioridade')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'baixa' => 'success',
                        'media' => 'warning',
                        'alta' => 'danger',
                        'urgente' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'baixa' => 'Baixa',
                        'media' => 'Média',
                        'alta' => 'Alta',
                        'urgente' => 'URGENTE',
                        default => $state,
                    })
                    ->icon(fn (string $state): string => $state === 'urgente' ? 'heroicon-o-exclamation-triangle' : ''),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Aberto por')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('responsavel.name')
                    ->label('Responsável')
                    ->searchable()
                    ->toggleable()
                    ->default('Não atribuído'),
                Tables\Columns\TextColumn::make('unidade.identificacao')
                    ->label('Unidade')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'aberto' => 'Aberto',
                        'em_andamento' => 'Em Andamento',
                        'resolvido' => 'Resolvido',
                        'fechado' => 'Fechado',
                        'cancelado' => 'Cancelado',
                    ])
                    ->multiple(),
                Tables\Filters\SelectFilter::make('prioridade')
                    ->label('Prioridade')
                    ->options([
                        'baixa' => 'Baixa',
                        'media' => 'Média',
                        'alta' => 'Alta',
                        'urgente' => 'Urgente',
                    ])
                    ->multiple(),
                Tables\Filters\SelectFilter::make('categoria')
                    ->label('Categoria')
                    ->options([
                        'geral' => 'Geral',
                        'manutencao' => 'Manutenção',
                        'limpeza' => 'Limpeza',
                        'seguranca' => 'Segurança',
                        'barulho' => 'Barulho',
                        'vazamento' => 'Vazamento',
                        'eletrica' => 'Elétrica',
                        'hidraulica' => 'Hidráulica',
                        'elevador' => 'Elevador',
                        'portaria' => 'Portaria',
                        'jardim' => 'Jardim',
                        'outro' => 'Outro',
                    ])
                    ->multiple(),
                Tables\Filters\SelectFilter::make('condominio')
                    ->label('Condomínio')
                    ->relationship('condominio', 'nome')
                    ->searchable()
                    ->preload(),
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
            'index' => Pages\ListChamados::route('/'),
            'create' => Pages\CreateChamado::route('/create'),
            'edit' => Pages\EditChamado::route('/{record}/edit'),
        ];
    }
}
