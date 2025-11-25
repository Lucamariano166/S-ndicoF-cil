<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Usuários';

    protected static ?string $modelLabel = 'Usuário';

    protected static ?string $pluralModelLabel = 'Usuários';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações Pessoais')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nome Completo')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\TextInput::make('cpf')
                            ->label('CPF')
                            ->mask('999.999.999-99')
                            ->unique(ignoreRecord: true)
                            ->maxLength(14),
                        Forms\Components\TextInput::make('whatsapp')
                            ->label('WhatsApp')
                            ->mask('(99) 99999-9999')
                            ->maxLength(15),
                        Forms\Components\TextInput::make('password')
                            ->label('Senha')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => bcrypt($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create')
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Section::make('Vinculação')
                    ->schema([
                        Forms\Components\Select::make('condominio_id')
                            ->label('Condomínio')
                            ->relationship('condominio', 'nome')
                            ->searchable()
                            ->preload()
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
                            ->disabled(fn (callable $get) => !$get('condominio_id')),
                        Forms\Components\Select::make('roles')
                            ->label('Perfil')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->options([
                                'super_admin' => 'Super Admin',
                                'sindico' => 'Síndico',
                                'morador' => 'Morador',
                                'porteiro' => 'Porteiro',
                                'administradora' => 'Administradora',
                            ]),
                        Forms\Components\Toggle::make('ativo')
                            ->label('Ativo')
                            ->required()
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('condominio.nome')
                    ->label('Condomínio')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('unidade.identificacao')
                    ->label('Unidade')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Perfil')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'super_admin' => 'danger',
                        'sindico' => 'warning',
                        'morador' => 'success',
                        'porteiro' => 'info',
                        'administradora' => 'primary',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'super_admin' => 'Super Admin',
                        'sindico' => 'Síndico',
                        'morador' => 'Morador',
                        'porteiro' => 'Porteiro',
                        'administradora' => 'Administradora',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->label('WhatsApp')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('cpf')
                    ->label('CPF')
                    ->searchable()
                    ->toggleable(),
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
                Tables\Filters\SelectFilter::make('condominio')
                    ->label('Condomínio')
                    ->relationship('condominio', 'nome')
                    ->searchable()
                    ->preload(),
                Tables\Filters\SelectFilter::make('role')
                    ->label('Perfil')
                    ->relationship('roles', 'name')
                    ->options([
                        'super_admin' => 'Super Admin',
                        'sindico' => 'Síndico',
                        'morador' => 'Morador',
                        'porteiro' => 'Porteiro',
                        'administradora' => 'Administradora',
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
