<?php

namespace Database\Seeders;

use App\Models\Assembleia;
use App\Models\Condominio;
use App\Models\User;
use Illuminate\Database\Seeder;

class AssembleiaSeeder extends Seeder
{
    public function run(): void
    {
        $condominio = Condominio::first();
        if (!$condominio) return;

        $admin = User::first();

        Assembleia::create([
            'condominio_id' => $condominio->id,
            'user_id' => $admin->id,
            'titulo' => 'Assembleia Ordinária 2025',
            'descricao' => 'Assembleia anual para aprovação de contas e eleição do síndico',
            'tipo' => 'ordinaria',
            'data_assembleia' => now()->addMonth(),
            'local' => 'Salão de Festas',
            'status' => 'agendada',
        ]);

        Assembleia::create([
            'condominio_id' => $condominio->id,
            'user_id' => $admin->id,
            'titulo' => 'Assembleia Extraordinária - Reforma da Piscina',
            'descricao' => 'Aprovação do projeto e orçamento para reforma da piscina',
            'tipo' => 'extraordinaria',
            'data_assembleia' => now()->addWeeks(2),
            'local' => 'Salão de Festas',
            'status' => 'convocada',
        ]);
    }
}
