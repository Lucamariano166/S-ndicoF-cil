<?php

namespace Database\Seeders;

use App\Models\Documento;
use App\Models\Condominio;
use App\Models\User;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    public function run(): void
    {
        $condominio = Condominio::first();

        if (!$condominio) {
            return;
        }

        $admin = User::first();

        $documentos = [
            [
                'titulo' => 'Estatuto Social do Condomínio',
                'descricao' => 'Estatuto que rege as normas e diretrizes do condomínio',
                'categoria' => 'estatuto',
                'tags' => ['jurídico', 'oficial', 'normas'],
                'publico' => true,
                'data_documento' => now()->subYears(2),
                'arquivo_nome' => 'estatuto-social-2023.pdf',
                'arquivo_tipo' => 'application/pdf',
                'arquivo_tamanho' => 2456789,
            ],
            [
                'titulo' => 'Regimento Interno',
                'descricao' => 'Regras de convivência e uso das áreas comuns',
                'categoria' => 'regimento',
                'tags' => ['regras', 'convivência', 'áreas comuns'],
                'publico' => true,
                'data_documento' => now()->subYear(),
                'arquivo_nome' => 'regimento-interno-2024.pdf',
                'arquivo_tipo' => 'application/pdf',
                'arquivo_tamanho' => 1234567,
            ],
            [
                'titulo' => 'Ata da Assembleia Ordinária 2025',
                'descricao' => 'Assembleia anual com aprovação de contas e eleição do síndico',
                'categoria' => 'ata',
                'tags' => ['assembleia', '2025', 'prestação de contas'],
                'publico' => true,
                'data_documento' => now()->subMonths(2),
                'arquivo_nome' => 'ata-assembleia-ordinaria-2025.pdf',
                'arquivo_tipo' => 'application/pdf',
                'arquivo_tamanho' => 987654,
            ],
            [
                'titulo' => 'Ata da Assembleia Extraordinária - Reforma da Fachada',
                'descricao' => 'Aprovação do projeto de reforma da fachada e autorização de despesas',
                'categoria' => 'ata',
                'tags' => ['assembleia', 'reforma', 'fachada'],
                'publico' => true,
                'data_documento' => now()->subMonths(1),
                'arquivo_nome' => 'ata-assembleia-extraordinaria-fachada.pdf',
                'arquivo_tipo' => 'application/pdf',
                'arquivo_tamanho' => 654321,
            ],
            [
                'titulo' => 'Contrato de Manutenção de Elevadores',
                'descricao' => 'Contrato anual com empresa de manutenção preventiva e corretiva',
                'categoria' => 'contrato',
                'tags' => ['elevadores', 'manutenção', 'vigente'],
                'publico' => false,
                'data_documento' => now()->subMonths(3),
                'arquivo_nome' => 'contrato-elevadores-2025.pdf',
                'arquivo_tipo' => 'application/pdf',
                'arquivo_tamanho' => 1876543,
            ],
            [
                'titulo' => 'Laudo de Inspeção Predial',
                'descricao' => 'Laudo técnico completo sobre estado de conservação do prédio',
                'categoria' => 'laudo',
                'tags' => ['inspeção', 'técnico', 'estrutura'],
                'publico' => false,
                'data_documento' => now()->subMonths(4),
                'arquivo_nome' => 'laudo-inspecao-predial-2025.pdf',
                'arquivo_tipo' => 'application/pdf',
                'arquivo_tamanho' => 3456789,
            ],
            [
                'titulo' => 'Projeto de Reforma da Área de Lazer',
                'descricao' => 'Projeto arquitetônico completo da nova área de lazer',
                'categoria' => 'projeto',
                'tags' => ['reforma', 'área de lazer', 'arquitetura'],
                'publico' => true,
                'data_documento' => now()->subWeeks(2),
                'arquivo_nome' => 'projeto-area-lazer.pdf',
                'arquivo_tipo' => 'application/pdf',
                'arquivo_tamanho' => 5678901,
            ],
            [
                'titulo' => 'Nota Fiscal - Pintura Externa',
                'descricao' => 'NF da empresa contratada para pintura da fachada',
                'categoria' => 'nota_fiscal',
                'tags' => ['pintura', 'fachada', 'pagamento'],
                'publico' => false,
                'data_documento' => now()->subWeeks(3),
                'arquivo_nome' => 'nf-pintura-externa.pdf',
                'arquivo_tipo' => 'application/pdf',
                'arquivo_tamanho' => 234567,
            ],
            [
                'titulo' => 'Convênio com Academia',
                'descricao' => 'Acordo de desconto para moradores em academia local',
                'categoria' => 'convenio',
                'tags' => ['convênio', 'academia', 'desconto'],
                'publico' => true,
                'data_documento' => now()->subDays(15),
                'arquivo_nome' => 'convenio-academia.pdf',
                'arquivo_tipo' => 'application/pdf',
                'arquivo_tamanho' => 456789,
            ],
            [
                'titulo' => 'Manual de Uso das Churrasqueiras',
                'descricao' => 'Instruções e regras para reserva e uso das churrasqueiras',
                'categoria' => 'outros',
                'tags' => ['manual', 'churrasqueira', 'regras'],
                'publico' => true,
                'data_documento' => now()->subDays(5),
                'arquivo_nome' => 'manual-churrasqueiras.pdf',
                'arquivo_tipo' => 'application/pdf',
                'arquivo_tamanho' => 345678,
            ],
        ];

        foreach ($documentos as $doc) {
            Documento::create([
                'condominio_id' => $condominio->id,
                'user_id' => $admin->id,
                'titulo' => $doc['titulo'],
                'descricao' => $doc['descricao'],
                'categoria' => $doc['categoria'],
                'tags' => $doc['tags'],
                'arquivo' => 'documentos/exemplo.pdf', // fake path
                'arquivo_nome' => $doc['arquivo_nome'],
                'arquivo_tipo' => $doc['arquivo_tipo'],
                'arquivo_tamanho' => $doc['arquivo_tamanho'],
                'publico' => $doc['publico'],
                'data_documento' => $doc['data_documento'],
                'visualizacoes' => rand(5, 50),
                'ultima_visualizacao' => now()->subDays(rand(1, 7)),
            ]);
        }
    }
}
