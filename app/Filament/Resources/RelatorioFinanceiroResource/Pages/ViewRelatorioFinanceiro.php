<?php

namespace App\Filament\Resources\RelatorioFinanceiroResource\Pages;

use App\Filament\Resources\RelatorioFinanceiroResource;
use App\Models\Despesa;
use App\Models\Receita;
use App\Models\TransacaoFinanceira;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Support\Facades\DB;

class ViewRelatorioFinanceiro extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $resource = RelatorioFinanceiroResource::class;

    protected static string $view = 'filament.resources.relatorio-financeiro-resource.pages.view-relatorio-financeiro';

    protected static ?string $title = 'Relatório Financeiro Detalhado';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'data_inicio' => now()->startOfMonth(),
            'data_fim' => now()->endOfMonth(),
            'tipo' => 'todos',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('data_inicio')
                    ->label('Data Início')
                    ->default(now()->startOfMonth())
                    ->required(),

                DatePicker::make('data_fim')
                    ->label('Data Fim')
                    ->default(now()->endOfMonth())
                    ->required(),

                Select::make('tipo')
                    ->label('Tipo de Transação')
                    ->options([
                        'todos' => 'Todas',
                        'receitas' => 'Apenas Receitas',
                        'despesas' => 'Apenas Despesas',
                    ])
                    ->default('todos')
                    ->required(),

                Select::make('categoria_despesa')
                    ->label('Categoria de Despesa')
                    ->options([
                        'todas' => 'Todas',
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
                    ->default('todas')
                    ->visible(fn ($get) => $get('tipo') === 'despesas' || $get('tipo') === 'todos'),

                Select::make('tipo_receita')
                    ->label('Tipo de Receita')
                    ->options([
                        'todos' => 'Todos',
                        'taxa_condominio' => 'Taxa de Condomínio',
                        'aluguel' => 'Aluguel',
                        'multa' => 'Multa',
                        'servico' => 'Serviço',
                        'evento' => 'Evento',
                        'outros' => 'Outros',
                    ])
                    ->default('todos')
                    ->visible(fn ($get) => $get('tipo') === 'receitas' || $get('tipo') === 'todos'),
            ])
            ->columns(4)
            ->statePath('data');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('data')
                    ->label('Data')
                    ->date('d/m/Y'),

                TextColumn::make('tipo_transacao')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Receita' => 'success',
                        'Despesa' => 'danger',
                    }),

                TextColumn::make('descricao')
                    ->label('Descrição')
                    ->limit(50),

                TextColumn::make('categoria')
                    ->label('Categoria/Tipo'),

                TextColumn::make('fornecedor_unidade')
                    ->label('Fornecedor/Unidade')
                    ->placeholder('-'),

                TextColumn::make('valor')
                    ->label('Valor')
                    ->money('BRL')
                    ->color(fn ($record): string => $record->tipo_transacao === 'Receita' ? 'success' : 'danger'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'Recebida' => 'success',
                        'Paga' => 'success',
                        'Pendente' => 'warning',
                        default => 'gray',
                    })
                    ->placeholder('-'),
            ])
            ->headerActions([
                Action::make('exportar_excel')
                    ->label('Exportar Excel')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->action('exportarExcel'),

                Action::make('exportar_pdf')
                    ->label('Exportar PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('danger')
                    ->action('exportarPdf'),
            ])
            ->defaultPaginationPageOption(25)
            ->queryStringIdentifier('transacoes')
            ->defaultSort('id', 'desc');
    }

    protected function getTableQuery(): EloquentBuilder
    {
        $dataInicio = $this->data['data_inicio'] ?? now()->startOfMonth();
        $dataFim = $this->data['data_fim'] ?? now()->endOfMonth();
        $tipo = $this->data['tipo'] ?? 'todos';
        $categoriaDespesa = $this->data['categoria_despesa'] ?? 'todas';
        $tipoReceita = $this->data['tipo_receita'] ?? 'todos';

        // Se for apenas receitas, retorna direto
        if ($tipo === 'receitas') {
            return Receita::query()
                ->select([
                    'id',
                    DB::raw("'Receita' as tipo_transacao"),
                    'data_recebimento as data',
                    'descricao',
                    'tipo as categoria',
                    DB::raw('NULL as fornecedor_unidade'),
                    'valor',
                    DB::raw("'Recebida' as status"),
                    'created_at',
                    'updated_at',
                ])
                ->whereBetween('data_recebimento', [$dataInicio, $dataFim])
                ->when($tipoReceita !== 'todos', fn ($q) => $q->where('tipo', $tipoReceita));
        }

        // Se for apenas despesas, retorna direto
        if ($tipo === 'despesas') {
            return Despesa::query()
                ->select([
                    'id',
                    DB::raw("'Despesa' as tipo_transacao"),
                    DB::raw('COALESCE(data_pagamento, data_vencimento) as data'),
                    'descricao',
                    'categoria',
                    'fornecedor as fornecedor_unidade',
                    'valor',
                    DB::raw("CASE
                        WHEN status = 'paga' THEN 'Paga'
                        WHEN status = 'pendente' THEN 'Pendente'
                        ELSE status
                    END as status"),
                    'created_at',
                    'updated_at',
                ])
                ->where(function ($query) use ($dataInicio, $dataFim) {
                    $query->whereBetween('data_vencimento', [$dataInicio, $dataFim])
                        ->orWhereBetween('data_pagamento', [$dataInicio, $dataFim]);
                })
                ->when($categoriaDespesa !== 'todas', fn ($q) => $q->where('categoria', $categoriaDespesa));
        }

        // Para "todos", usar modelo virtual com fromSub para evitar problema de ORDER BY do SQLite
        $receitas = DB::table('receitas')
            ->select([
                'id',
                DB::raw("'Receita' as tipo_transacao"),
                'data_recebimento as data',
                'descricao',
                'tipo as categoria',
                DB::raw('NULL as fornecedor_unidade'),
                'valor',
                DB::raw("'Recebida' as status"),
                'created_at',
                'updated_at',
            ])
            ->whereBetween('data_recebimento', [$dataInicio, $dataFim])
            ->whereNull('deleted_at')
            ->when($tipoReceita !== 'todos', fn ($q) => $q->where('tipo', $tipoReceita));

        $despesas = DB::table('despesas')
            ->select([
                'id',
                DB::raw("'Despesa' as tipo_transacao"),
                DB::raw('COALESCE(data_pagamento, data_vencimento) as data'),
                'descricao',
                'categoria',
                'fornecedor as fornecedor_unidade',
                'valor',
                DB::raw("CASE
                    WHEN status = 'paga' THEN 'Paga'
                    WHEN status = 'pendente' THEN 'Pendente'
                    ELSE status
                END as status"),
                'created_at',
                'updated_at',
            ])
            ->where(function ($query) use ($dataInicio, $dataFim) {
                $query->whereBetween('data_vencimento', [$dataInicio, $dataFim])
                    ->orWhereBetween('data_pagamento', [$dataInicio, $dataFim]);
            })
            ->whereNull('deleted_at')
            ->when($categoriaDespesa !== 'todas', fn ($q) => $q->where('categoria', $categoriaDespesa));

        $unionQuery = $receitas->unionAll($despesas);

        // Usar TransacaoFinanceira como modelo base e sobrescrever a tabela com a subquery
        return TransacaoFinanceira::query()->fromSub($unionQuery, 'transacoes');
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\RelatorioFinanceiroResource\Widgets\RelatorioStats::class,
        ];
    }

    public function exportarExcel()
    {
        $dados = $this->getTableQuery()->get();
        $dataInicio = \Carbon\Carbon::parse($this->data['data_inicio'] ?? now()->startOfMonth());
        $dataFim = \Carbon\Carbon::parse($this->data['data_fim'] ?? now()->endOfMonth());

        $fileName = 'relatorio_financeiro_' . $dataInicio->format('Y-m-d') . '_' . $dataFim->format('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function () use ($dados) {
            $file = fopen('php://output', 'w');

            // BOM para UTF-8
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // Cabeçalhos
            fputcsv($file, ['Data', 'Tipo', 'Descrição', 'Categoria/Tipo', 'Fornecedor/Unidade', 'Valor', 'Status'], ';');

            foreach ($dados as $registro) {
                fputcsv($file, [
                    \Carbon\Carbon::parse($registro->data)->format('d/m/Y'),
                    $registro->tipo_transacao,
                    $registro->descricao,
                    $registro->categoria,
                    $registro->fornecedor_unidade ?? '-',
                    number_format($registro->valor, 2, ',', '.'),
                    $registro->status ?? '-',
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportarPdf()
    {
        // Redirecionar para uma rota que gera o PDF
        $params = [
            'data_inicio' => $this->data['data_inicio'] ?? now()->startOfMonth()->format('Y-m-d'),
            'data_fim' => $this->data['data_fim'] ?? now()->endOfMonth()->format('Y-m-d'),
            'tipo' => $this->data['tipo'] ?? 'todos',
            'categoria_despesa' => $this->data['categoria_despesa'] ?? 'todas',
            'tipo_receita' => $this->data['tipo_receita'] ?? 'todos',
        ];

        return redirect()->route('relatorio.pdf', $params);
    }
}
