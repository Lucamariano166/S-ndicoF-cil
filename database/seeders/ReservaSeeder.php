<?php

namespace Database\Seeders;

use App\Models\Reserva;
use App\Models\Condominio;
use App\Models\Unidade;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReservaSeeder extends Seeder
{
    public function run(): void
    {
        $condominio = Condominio::first();
        if (!$condominio) return;

        $unidade = Unidade::where('condominio_id', $condominio->id)->first();
        if (!$unidade) return;

        $user = User::first();

        Reserva::create([
            'condominio_id' => $condominio->id,
            'unidade_id' => $unidade->id,
            'user_id' => $user->id,
            'espaco' => 'salao_festas',
            'data_reserva' => now()->addDays(10),
            'hora_inicio' => '18:00',
            'hora_fim' => '23:00',
            'finalidade' => 'Aniversário',
            'numero_convidados' => 50,
            'valor_taxa' => 200.00,
            'status' => 'pendente',
        ]);

        Reserva::create([
            'condominio_id' => $condominio->id,
            'unidade_id' => $unidade->id,
            'user_id' => $user->id,
            'espaco' => 'churrasqueira_1',
            'data_reserva' => now()->addDays(5),
            'hora_inicio' => '12:00',
            'hora_fim' => '18:00',
            'finalidade' => 'Confraternização',
            'numero_convidados' => 15,
            'valor_taxa' => 50.00,
            'status' => 'confirmada',
            'confirmada_em' => now(),
        ]);

        Reserva::create([
            'condominio_id' => $condominio->id,
            'unidade_id' => $unidade->id,
            'user_id' => $user->id,
            'espaco' => 'quadra_esportes',
            'data_reserva' => now()->subDays(2),
            'hora_inicio' => '14:00',
            'hora_fim' => '16:00',
            'finalidade' => 'Futebol',
            'numero_convidados' => 10,
            'status' => 'realizada',
            'confirmada_em' => now()->subDays(5),
        ]);
    }
}
