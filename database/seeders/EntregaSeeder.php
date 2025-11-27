<?php

namespace Database\Seeders;

use App\Models\Entrega;
use App\Models\Unidade;
use App\Models\User;
use Illuminate\Database\Seeder;

class EntregaSeeder extends Seeder
{
    public function run(): void
    {
        $unidades = Unidade::all();
        $porteiros = User::role('porteiro')->get();
        $moradores = User::role('morador')->get();

        if ($unidades->isEmpty() || $porteiros->isEmpty()) {
            $this->command->warn('É necessário ter unidades e porteiros cadastrados para gerar entregas.');
            return;
        }

        $entregas = [
            // Entregas pendentes recentes
            [
                'unidade_id' => $unidades->random()->id,
                'recebido_por' => $porteiros->random()->id,
                'tipo' => 'encomenda',
                'remetente' => 'Mercado Livre',
                'descricao' => 'Caixa média',
                'status' => 'pendente',
                'data_recebimento' => now()->subDays(2),
            ],
            [
                'unidade_id' => $unidades->random()->id,
                'recebido_por' => $porteiros->random()->id,
                'tipo' => 'correspondencia',
                'remetente' => 'Correios',
                'descricao' => 'Envelope registrado',
                'status' => 'pendente',
                'data_recebimento' => now()->subDays(1),
            ],
            // Entrega atrasada (>7 dias) - deve mostrar alerta
            [
                'unidade_id' => $unidades->random()->id,
                'recebido_por' => $porteiros->random()->id,
                'tipo' => 'encomenda',
                'remetente' => 'Shopee',
                'descricao' => 'Caixa pequena',
                'status' => 'pendente',
                'data_recebimento' => now()->subDays(10),
                'observacoes' => 'Morador viajando',
            ],
            [
                'unidade_id' => $unidades->random()->id,
                'recebido_por' => $porteiros->random()->id,
                'tipo' => 'encomenda',
                'remetente' => 'Amazon',
                'descricao' => 'Caixa grande',
                'status' => 'pendente',
                'data_recebimento' => now()->subDays(8),
            ],
            // Entregas já retiradas
            [
                'unidade_id' => $unidades->random()->id,
                'recebido_por' => $porteiros->random()->id,
                'retirado_por' => $moradores->isNotEmpty() ? $moradores->random()->id : null,
                'tipo' => 'encomenda',
                'remetente' => 'Magazine Luiza',
                'descricao' => 'Pacote médio',
                'status' => 'retirada',
                'data_recebimento' => now()->subDays(5),
                'data_retirada' => now()->subDays(4),
            ],
            [
                'unidade_id' => $unidades->random()->id,
                'recebido_por' => $porteiros->random()->id,
                'retirado_por' => $moradores->isNotEmpty() ? $moradores->random()->id : null,
                'tipo' => 'correspondencia',
                'remetente' => 'Banco Itaú',
                'descricao' => 'Carta registrada',
                'status' => 'retirada',
                'data_recebimento' => now()->subDays(3),
                'data_retirada' => now()->subDays(2),
            ],
            [
                'unidade_id' => $unidades->random()->id,
                'recebido_por' => $porteiros->random()->id,
                'retirado_por' => $moradores->isNotEmpty() ? $moradores->random()->id : null,
                'tipo' => 'encomenda',
                'remetente' => 'Aliexpress',
                'descricao' => 'Envelope acolchoado',
                'status' => 'retirada',
                'data_recebimento' => now()->subDays(6),
                'data_retirada' => now()->subDays(5),
            ],
            // Entregas devolvidas
            [
                'unidade_id' => $unidades->random()->id,
                'recebido_por' => $porteiros->random()->id,
                'tipo' => 'encomenda',
                'remetente' => 'Correios',
                'descricao' => 'Pacote pequeno',
                'status' => 'devolvida',
                'data_recebimento' => now()->subDays(20),
                'observacoes' => 'Devolvido após 15 dias sem retirada',
            ],
            // Mais entregas pendentes para aumentar o contador
            [
                'unidade_id' => $unidades->random()->id,
                'recebido_por' => $porteiros->random()->id,
                'tipo' => 'encomenda',
                'remetente' => 'Americanas',
                'descricao' => 'Caixa pequena',
                'status' => 'pendente',
                'data_recebimento' => now(),
            ],
            [
                'unidade_id' => $unidades->random()->id,
                'recebido_por' => $porteiros->random()->id,
                'tipo' => 'outro',
                'remetente' => 'Ifood',
                'descricao' => 'Entrega de alimentos',
                'status' => 'pendente',
                'data_recebimento' => now(),
            ],
            [
                'unidade_id' => $unidades->random()->id,
                'recebido_por' => $porteiros->random()->id,
                'tipo' => 'encomenda',
                'remetente' => 'Zara',
                'descricao' => 'Sacola com roupas',
                'status' => 'pendente',
                'data_recebimento' => now()->subHours(3),
            ],
            [
                'unidade_id' => $unidades->random()->id,
                'recebido_por' => $porteiros->random()->id,
                'tipo' => 'correspondencia',
                'remetente' => 'Receita Federal',
                'descricao' => 'Documento oficial',
                'status' => 'pendente',
                'data_recebimento' => now()->subDays(4),
            ],
        ];

        foreach ($entregas as $entrega) {
            Entrega::create(array_merge([
                'condominio_id' => $entrega['unidade_id'] ? Unidade::find($entrega['unidade_id'])->condominio_id : null,
            ], $entrega));
        }

        $this->command->info('✓ 12 entregas criadas com sucesso!');
    }
}
