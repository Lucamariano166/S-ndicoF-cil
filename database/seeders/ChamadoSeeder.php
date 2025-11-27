<?php

namespace Database\Seeders;

use App\Models\Chamado;
use App\Models\Condominio;
use App\Models\Unidade;
use App\Models\User;
use Illuminate\Database\Seeder;

class ChamadoSeeder extends Seeder
{
    public function run(): void
    {
        $condominio = Condominio::first();

        if (!$condominio) {
            return;
        }

        $unidades = Unidade::where('condominio_id', $condominio->id)->take(3)->get();
        $users = User::where('condominio_id', $condominio->id)->get();
        $sindico = $users->firstWhere('email', 'sindico@exemplo.com');

        if ($unidades->isEmpty() || $users->isEmpty()) {
            return;
        }

        $categorias = ['manutencao', 'limpeza', 'seguranca', 'vazamento', 'eletrica', 'elevador'];
        $prioridades = ['baixa', 'media', 'alta', 'urgente'];
        $statuses = ['aberto', 'em_andamento', 'resolvido'];

        $chamadosExemplo = [
            [
                'titulo' => 'Vazamento no banheiro da unidade 101',
                'descricao' => 'Há um vazamento constante na torneira do banheiro. A água não para de pingar mesmo com a torneira fechada.',
                'categoria' => 'vazamento',
                'prioridade' => 'alta',
                'status' => 'aberto',
            ],
            [
                'titulo' => 'Lâmpada queimada no corredor do 2º andar',
                'descricao' => 'A lâmpada do corredor do 2º andar está queimada há 3 dias, deixando o local muito escuro à noite.',
                'categoria' => 'manutencao',
                'prioridade' => 'media',
                'status' => 'em_andamento',
            ],
            [
                'titulo' => 'Barulho excessivo da unidade 202',
                'descricao' => 'Moradores da unidade 202 estão fazendo muito barulho após as 22h, prejudicando o descanso dos vizinhos.',
                'categoria' => 'seguranca',
                'prioridade' => 'media',
                'status' => 'aberto',
            ],
            [
                'titulo' => 'Portão da garagem com defeito',
                'descricao' => 'O portão automático da garagem está travando e não abre completamente, causando transtornos para os moradores.',
                'categoria' => 'manutencao',
                'prioridade' => 'urgente',
                'status' => 'aberto',
            ],
            [
                'titulo' => 'Limpeza da piscina',
                'descricao' => 'A piscina está com a água verde e precisa de tratamento urgente.',
                'categoria' => 'limpeza',
                'prioridade' => 'alta',
                'status' => 'em_andamento',
            ],
            [
                'titulo' => 'Elevador fazendo barulho estranho',
                'descricao' => 'O elevador está fazendo um barulho metálico durante o uso. Solicitamos revisão de segurança.',
                'categoria' => 'elevador',
                'prioridade' => 'urgente',
                'status' => 'aberto',
            ],
            [
                'titulo' => 'Interfone sem funcionar',
                'descricao' => 'O interfone da unidade 101 não está funcionando há 2 semanas.',
                'categoria' => 'eletrica',
                'prioridade' => 'media',
                'status' => 'resolvido',
            ],
        ];

        foreach ($chamadosExemplo as $index => $exemplo) {
            $unidade = $unidades[$index % $unidades->count()];
            $user = $users[$index % $users->count()];

            Chamado::create([
                'condominio_id' => $condominio->id,
                'unidade_id' => $unidade->id,
                'user_id' => $user->id,
                'atribuido_para' => $exemplo['status'] !== 'aberto' ? $sindico?->id : null,
                'titulo' => $exemplo['titulo'],
                'descricao' => $exemplo['descricao'],
                'categoria' => $exemplo['categoria'],
                'prioridade' => $exemplo['prioridade'],
                'status' => $exemplo['status'],
                'resolvido_em' => $exemplo['status'] === 'resolvido' ? now()->subDays(rand(1, 5)) : null,
            ]);
        }
    }
}
