<?php

namespace Database\Seeders;

use App\Models\Comunicado;
use App\Models\Condominio;
use App\Models\User;
use Illuminate\Database\Seeder;

class ComunicadoSeeder extends Seeder
{
    public function run(): void
    {
        $condominio = Condominio::first();
        if (!$condominio) return;

        $admin = User::first();

        Comunicado::create([
            'condominio_id' => $condominio->id,
            'user_id' => $admin->id,
            'titulo' => 'Manutenção programada dos elevadores',
            'mensagem' => 'Informamos que no dia 15/12 haverá manutenção preventiva nos elevadores das 08h às 12h. Pedimos a compreensão de todos.',
            'prioridade' => 'alta',
            'tipo_destinatarios' => 'todos',
            'status' => 'enviado',
            'enviado_em' => now()->subDays(5),
        ]);

        Comunicado::create([
            'condominio_id' => $condominio->id,
            'user_id' => $admin->id,
            'titulo' => 'Limpeza da caixa d\'água',
            'mensagem' => 'A limpeza semestral da caixa d\'água está agendada para o dia 20/12. Haverá interrupção no abastecimento das 08h às 14h.',
            'prioridade' => 'urgente',
            'tipo_destinatarios' => 'todos',
            'status' => 'rascunho',
        ]);

        Comunicado::create([
            'condominio_id' => $condominio->id,
            'user_id' => $admin->id,
            'titulo' => 'Convocação para Assembleia',
            'mensagem' => 'Fica convocada a Assembleia Ordinária para o dia 15/01/2026 às 19h no Salão de Festas. Contamos com a presença de todos!',
            'prioridade' => 'alta',
            'tipo_destinatarios' => 'proprietarios',
            'status' => 'enviado',
            'enviado_em' => now()->subDays(2),
        ]);
    }
}
