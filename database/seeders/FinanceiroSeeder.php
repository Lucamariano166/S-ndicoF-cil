<?php

namespace Database\Seeders;

use App\Models\Condominio;
use App\Models\Despesa;
use App\Models\Receita;
use App\Models\Unidade;
use App\Models\Boleto;
use Illuminate\Database\Seeder;

class FinanceiroSeeder extends Seeder
{
    public function run(): void
    {
        $condominio = Condominio::first();

        if (!$condominio) {
            $this->command->warn('Nenhum condomínio encontrado. Execute o seeder de condomínios primeiro.');
            return;
        }

        $unidades = Unidade::where('condominio_id', $condominio->id)->limit(5)->get();

        // DESPESAS - Últimos 3 meses
        $despesas = [
            // Novembro 2025
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Manutenção do elevador social',
                'observacoes' => 'Troca de cabos e revisão preventiva completa',
                'categoria' => 'elevador',
                'valor' => 3500.00,
                'data_vencimento' => '2025-11-10',
                'data_pagamento' => '2025-11-08',
                'status' => 'paga',
                'fornecedor' => 'Elevadores Atlas Ltda',
                'numero_nota' => 'NF-45123',
            ],
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Conta de energia elétrica - Outubro/2025',
                'observacoes' => 'Áreas comuns e elevadores',
                'categoria' => 'energia',
                'valor' => 2850.50,
                'data_vencimento' => '2025-11-15',
                'data_pagamento' => null,
                'status' => 'pendente',
                'fornecedor' => 'Companhia Energética',
                'numero_nota' => null,
            ],
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Conta de água - Outubro/2025',
                'observacoes' => 'Consumo geral do condomínio',
                'categoria' => 'agua',
                'valor' => 1850.00,
                'data_vencimento' => '2025-11-20',
                'data_pagamento' => null,
                'status' => 'pendente',
                'fornecedor' => 'Companhia de Saneamento',
                'numero_nota' => null,
            ],
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Salário do zelador - Novembro/2025',
                'observacoes' => 'Pagamento mensal + vale transporte',
                'categoria' => 'administracao',
                'valor' => 2500.00,
                'data_vencimento' => '2025-11-05',
                'data_pagamento' => '2025-11-03',
                'status' => 'paga',
                'fornecedor' => 'José Silva',
                'numero_nota' => 'RPA-001',
            ],

            // Outubro 2025
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Limpeza de caixa d\'água',
                'observacoes' => 'Limpeza semestral obrigatória',
                'categoria' => 'limpeza',
                'valor' => 1200.00,
                'data_vencimento' => '2025-10-25',
                'data_pagamento' => '2025-10-23',
                'status' => 'paga',
                'fornecedor' => 'Limpa Bem Serviços',
                'numero_nota' => 'NF-8877',
            ],
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Seguro predial anual',
                'observacoes' => 'Cobertura contra incêndio e desastres',
                'categoria' => 'seguros',
                'valor' => 5800.00,
                'data_vencimento' => '2025-10-30',
                'data_pagamento' => '2025-10-28',
                'status' => 'paga',
                'fornecedor' => 'Seguradora XYZ',
                'numero_nota' => 'NF-22334',
            ],
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Manutenção do jardim',
                'observacoes' => 'Poda de árvores e plantio de flores',
                'categoria' => 'jardinagem',
                'valor' => 850.00,
                'data_vencimento' => '2025-10-15',
                'data_pagamento' => '2025-10-12',
                'status' => 'paga',
                'fornecedor' => 'Jardins & Cia',
                'numero_nota' => 'NF-5566',
            ],

            // Setembro 2025
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Reparo no portão principal',
                'observacoes' => 'Troca de motor e ajuste de sensores',
                'categoria' => 'manutencao',
                'valor' => 2100.00,
                'data_vencimento' => '2025-09-20',
                'data_pagamento' => '2025-09-18',
                'status' => 'paga',
                'fornecedor' => 'Portões Automáticos Pro',
                'numero_nota' => 'NF-9988',
            ],
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'IPTU - 3ª parcela',
                'observacoes' => 'Imposto predial',
                'categoria' => 'impostos',
                'valor' => 1500.00,
                'data_vencimento' => '2025-09-10',
                'data_pagamento' => '2025-09-08',
                'status' => 'paga',
                'fornecedor' => 'Prefeitura Municipal',
                'numero_nota' => null,
            ],
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Internet fibra ótica',
                'observacoes' => 'Plano de 500MB para áreas comuns',
                'categoria' => 'internet',
                'valor' => 350.00,
                'data_vencimento' => '2025-09-05',
                'data_pagamento' => '2025-09-03',
                'status' => 'paga',
                'fornecedor' => 'Telecom Brasil',
                'numero_nota' => 'NF-7788',
            ],

            // Despesa vencida (exemplo)
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Reforma do salão de festas',
                'observacoes' => 'Pintura e troca de piso - Pendente de aprovação',
                'categoria' => 'obras',
                'valor' => 8500.00,
                'data_vencimento' => '2025-11-01',
                'data_pagamento' => null,
                'status' => 'pendente',
                'fornecedor' => 'Construmais Ltda',
                'numero_nota' => null,
            ],
        ];

        foreach ($despesas as $despesa) {
            Despesa::create($despesa);
        }

        // RECEITAS - Últimos 3 meses (pagamentos de boletos)
        $receitas = [
            // Novembro 2025
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Taxa de condomínio - Novembro/2025 - Unidade 101',
                'observacoes' => 'Pagamento via PIX',
                'tipo' => 'taxa_condominio',
                'valor' => 850.00,
                'data_competencia' => '2025-11-01',
                'data_recebimento' => '2025-11-08',
                'boleto_id' => null,
                'unidade_id' => $unidades[0]->id ?? null,
                'numero_recibo' => 'REC-2025-11-001',
            ],
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Taxa de condomínio - Novembro/2025 - Unidade 102',
                'observacoes' => 'Pagamento via transferência',
                'tipo' => 'taxa_condominio',
                'valor' => 850.00,
                'data_competencia' => '2025-11-01',
                'data_recebimento' => '2025-11-05',
                'boleto_id' => null,
                'unidade_id' => $unidades[1]->id ?? null,
                'numero_recibo' => 'REC-2025-11-002',
            ],
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Multa por atraso - Unidade 103',
                'observacoes' => 'Atraso de 15 dias no pagamento',
                'tipo' => 'multa',
                'valor' => 85.00,
                'data_competencia' => '2025-10-01',
                'data_recebimento' => '2025-11-15',
                'boleto_id' => null,
                'unidade_id' => $unidades[2]->id ?? null,
                'numero_recibo' => 'REC-2025-11-003',
            ],

            // Outubro 2025
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Taxa de condomínio - Outubro/2025 - Unidade 101',
                'observacoes' => 'Pagamento em dia',
                'tipo' => 'taxa_condominio',
                'valor' => 850.00,
                'data_competencia' => '2025-10-01',
                'data_recebimento' => '2025-10-05',
                'boleto_id' => null,
                'unidade_id' => $unidades[0]->id ?? null,
                'numero_recibo' => 'REC-2025-10-001',
            ],
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Taxa de condomínio - Outubro/2025 - Unidade 102',
                'observacoes' => 'Pagamento em dia',
                'tipo' => 'taxa_condominio',
                'valor' => 850.00,
                'data_competencia' => '2025-10-01',
                'data_recebimento' => '2025-10-07',
                'boleto_id' => null,
                'unidade_id' => $unidades[1]->id ?? null,
                'numero_recibo' => 'REC-2025-10-002',
            ],
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Aluguel do salão de festas',
                'observacoes' => 'Evento de aniversário - Unidade 201',
                'tipo' => 'aluguel',
                'valor' => 350.00,
                'data_competencia' => '2025-10-15',
                'data_recebimento' => '2025-10-10',
                'boleto_id' => null,
                'unidade_id' => $unidades[3]->id ?? null,
                'numero_recibo' => 'REC-2025-10-003',
            ],

            // Setembro 2025
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Taxa de condomínio - Setembro/2025 - Unidade 101',
                'observacoes' => 'Pagamento em dia',
                'tipo' => 'taxa_condominio',
                'valor' => 850.00,
                'data_competencia' => '2025-09-01',
                'data_recebimento' => '2025-09-05',
                'boleto_id' => null,
                'unidade_id' => $unidades[0]->id ?? null,
                'numero_recibo' => 'REC-2025-09-001',
            ],
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Taxa de condomínio - Setembro/2025 - Unidade 102',
                'observacoes' => 'Pagamento em dia',
                'tipo' => 'taxa_condominio',
                'valor' => 850.00,
                'data_competencia' => '2025-09-01',
                'data_recebimento' => '2025-09-08',
                'boleto_id' => null,
                'unidade_id' => $unidades[1]->id ?? null,
                'numero_recibo' => 'REC-2025-09-002',
            ],
            [
                'condominio_id' => $condominio->id,
                'descricao' => 'Serviço de chaveiro - Taxa extra',
                'observacoes' => 'Cópia de chaves para novo morador',
                'tipo' => 'servico',
                'valor' => 120.00,
                'data_competencia' => '2025-09-20',
                'data_recebimento' => '2025-09-20',
                'boleto_id' => null,
                'unidade_id' => $unidades[4]->id ?? null,
                'numero_recibo' => 'REC-2025-09-003',
            ],
        ];

        foreach ($receitas as $receita) {
            Receita::create($receita);
        }

        $this->command->info('✅ Dados financeiros criados com sucesso!');
        $this->command->info('📊 ' . count($despesas) . ' despesas criadas');
        $this->command->info('💰 ' . count($receitas) . ' receitas criadas');
    }
}
