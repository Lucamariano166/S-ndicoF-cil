<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Financeiro</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #4F46E5;
            padding-bottom: 20px;
        }

        .header h1 {
            color: #4F46E5;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .header p {
            color: #666;
            font-size: 14px;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .summary-card {
            background: #f9fafb;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #4F46E5;
        }

        .summary-card.success {
            border-left-color: #10B981;
        }

        .summary-card.danger {
            border-left-color: #EF4444;
        }

        .summary-card h3 {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .summary-card p {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        thead {
            background: #4F46E5;
            color: white;
        }

        th {
            padding: 12px;
            text-align: left;
            font-size: 12px;
            text-transform: uppercase;
        }

        td {
            padding: 10px 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 13px;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .badge.success {
            background: #D1FAE5;
            color: #065F46;
        }

        .badge.danger {
            background: #FEE2E2;
            color: #991B1B;
        }

        .badge.warning {
            background: #FEF3C7;
            color: #92400E;
        }

        .text-success {
            color: #10B981;
            font-weight: 600;
        }

        .text-danger {
            color: #EF4444;
            font-weight: 600;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            color: #666;
            font-size: 12px;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }

        @media print {
            body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Relatório Financeiro Detalhado</h1>
        <p>Período: {{ \Carbon\Carbon::parse($dataInicio)->format('d/m/Y') }} a {{ \Carbon\Carbon::parse($dataFim)->format('d/m/Y') }}</p>
        <p>Gerado em: {{ now()->format('d/m/Y H:i:s') }}</p>
    </div>

    <div class="summary">
        <div class="summary-card success">
            <h3>Total de Receitas</h3>
            <p>R$ {{ number_format($totalReceitas, 2, ',', '.') }}</p>
        </div>

        <div class="summary-card danger">
            <h3>Total de Despesas</h3>
            <p>R$ {{ number_format($totalDespesas, 2, ',', '.') }}</p>
        </div>

        <div class="summary-card {{ $saldo >= 0 ? 'success' : 'danger' }}">
            <h3>Saldo do Período</h3>
            <p>R$ {{ number_format($saldo, 2, ',', '.') }}</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Fornecedor/Unidade</th>
                <th>Valor</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dados as $registro)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($registro->data)->format('d/m/Y') }}</td>
                    <td>
                        <span class="badge {{ $registro->tipo_transacao === 'Receita' ? 'success' : 'danger' }}">
                            {{ $registro->tipo_transacao }}
                        </span>
                    </td>
                    <td>{{ $registro->descricao }}</td>
                    <td>{{ $registro->categoria }}</td>
                    <td>{{ $registro->fornecedor_unidade ?? '-' }}</td>
                    <td class="{{ $registro->tipo_transacao === 'Receita' ? 'text-success' : 'text-danger' }}">
                        R$ {{ number_format($registro->valor, 2, ',', '.') }}
                    </td>
                    <td>
                        @if($registro->status)
                            <span class="badge {{ $registro->status === 'Recebida' || $registro->status === 'Paga' ? 'success' : 'warning' }}">
                                {{ $registro->status }}
                            </span>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 40px; color: #999;">
                        Nenhuma transação encontrada no período selecionado.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Este relatório foi gerado automaticamente pelo sistema de gestão condominial.</p>
        <p>Para imprimir ou salvar como PDF, use a função de impressão do seu navegador (Ctrl+P / Cmd+P).</p>
    </div>
</body>
</html>
