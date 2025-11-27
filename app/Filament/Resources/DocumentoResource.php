<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentoResource\Pages;
use App\Models\Documento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Support\Enums\FontWeight;

class DocumentoResource extends Resource
{
    protected static ?string $model = Documento::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Documentos';

    protected static ?string $modelLabel = 'Documento';

    protected static ?string $pluralModelLabel = 'Documentos';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações Básicas')
                    ->schema([
                        Forms\Components\Select::make('condominio_id')
                            ->relationship('condominio', 'nome')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->label('Condomínio'),

                        Forms\Components\TextInput::make('titulo')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('descricao')
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\Select::make('categoria')
                            ->options([
                                'ata' => 'Ata de Assembleia',
                                'estatuto' => 'Estatuto',
                                'regimento' => 'Regimento Interno',
                                'contrato' => 'Contrato',
                                'nota_fiscal' => 'Nota Fiscal',
                                'laudo' => 'Laudo Técnico',
                                'projeto' => 'Projeto',
                                'convenio' => 'Convênio',
                                'outros' => 'Outros',
                            ])
                            ->required()
                            ->native(false),

                        Forms\Components\TagsInput::make('tags')
                            ->placeholder('Digite uma tag e pressione Enter')
                            ->helperText('Tags facilitam a busca e organização')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Arquivo')
                    ->schema([
                        Forms\Components\FileUpload::make('arquivo')
                            ->required()
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/*'])
                            ->maxSize(10240) // 10MB
                            ->downloadable()
                            ->openable()
                            ->previewable(true)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('arquivo_nome')
                            ->label('Nome do Arquivo')
                            ->helperText('Nome original do arquivo (preenchido automaticamente)'),

                        Forms\Components\TextInput::make('arquivo_tipo')
                            ->label('Tipo do Arquivo'),

                        Forms\Components\DateTimePicker::make('data_documento')
                            ->label('Data do Documento')
                            ->helperText('Data real do documento (ex: data da assembleia)')
                            ->native(false),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Compartilhamento')
                    ->schema([
                        Forms\Components\Toggle::make('publico')
                            ->label('Documento Público')
                            ->helperText('Se ativo, todos os moradores podem visualizar')
                            ->inline(false),

                        Forms\Components\TextInput::make('link_compartilhamento')
                            ->label('Link de Compartilhamento')
                            ->disabled()
                            ->helperText('Será gerado automaticamente ao salvar'),

                        Forms\Components\DateTimePicker::make('link_expira_em')
                            ->label('Link Expira Em')
                            ->native(false),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Forms\Components\Section::make('Versionamento')
                    ->schema([
                        Forms\Components\TextInput::make('versao')
                            ->numeric()
                            ->default(1)
                            ->disabled()
                            ->helperText('Versão atual do documento'),

                        Forms\Components\Select::make('documento_original_id')
                            ->relationship('documentoOriginal', 'titulo')
                            ->label('Documento Original')
                            ->helperText('Se este é uma nova versão de um documento existente')
                            ->searchable()
                            ->preload(),
                    ])
                    ->columns(2)
                    ->collapsible()
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('condominio.nome')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('titulo')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold)
                    ->description(fn (Documento $record): string => $record->descricao ?? ''),

                Tables\Columns\TextColumn::make('categoria')
                    ->badge()
                    ->colors([
                        'primary' => 'ata',
                        'success' => 'estatuto',
                        'warning' => 'regimento',
                        'danger' => 'contrato',
                        'info' => 'nota_fiscal',
                        'gray' => 'outros',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'ata' => 'Ata',
                        'estatuto' => 'Estatuto',
                        'regimento' => 'Regimento',
                        'contrato' => 'Contrato',
                        'nota_fiscal' => 'Nota Fiscal',
                        'laudo' => 'Laudo',
                        'projeto' => 'Projeto',
                        'convenio' => 'Convênio',
                        'outros' => 'Outros',
                        default => $state,
                    }),

                Tables\Columns\TextColumn::make('tags')
                    ->badge()
                    ->separator(',')
                    ->toggleable(),

                Tables\Columns\IconColumn::make('publico')
                    ->boolean()
                    ->label('Público')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('arquivo_nome')
                    ->label('Arquivo')
                    ->description(fn (Documento $record): string => $record->tamanho_formatado ?? '')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('versao')
                    ->label('v')
                    ->badge()
                    ->color('gray')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('visualizacoes')
                    ->icon('heroicon-o-eye')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('data_documento')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Enviado por')
                    ->toggleable()
                    ->toggledHiddenByDefault(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('condominio_id')
                    ->relationship('condominio', 'nome')
                    ->label('Condomínio')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('categoria')
                    ->options([
                        'ata' => 'Ata de Assembleia',
                        'estatuto' => 'Estatuto',
                        'regimento' => 'Regimento Interno',
                        'contrato' => 'Contrato',
                        'nota_fiscal' => 'Nota Fiscal',
                        'laudo' => 'Laudo Técnico',
                        'projeto' => 'Projeto',
                        'convenio' => 'Convênio',
                        'outros' => 'Outros',
                    ])
                    ->multiple(),

                Tables\Filters\TernaryFilter::make('publico')
                    ->label('Público')
                    ->placeholder('Todos')
                    ->trueLabel('Apenas públicos')
                    ->falseLabel('Apenas privados'),

                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->url(fn (Documento $record): string => asset('storage/' . $record->arquivo))
                    ->openUrlInNewTab(),

                Tables\Actions\Action::make('gerar_link')
                    ->icon('heroicon-o-link')
                    ->color('info')
                    ->action(function (Documento $record) {
                        $link = $record->gerarLinkCompartilhamento();
                        \Filament\Notifications\Notification::make()
                            ->title('Link gerado com sucesso!')
                            ->body("Link: {$link}")
                            ->success()
                            ->send();
                    })
                    ->requiresConfirmation(),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
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
            'index' => Pages\ListDocumentos::route('/'),
            'create' => Pages\CreateDocumento::route('/create'),
            'edit' => Pages\EditDocumento::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
