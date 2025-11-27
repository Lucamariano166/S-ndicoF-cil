<?php

namespace App\Console\Commands;

use App\Models\Boleto;
use App\Models\User;
use App\Notifications\BoletoVencendoNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class EnviarLembretesBoletos extends Command
{
    protected $signature = 'boletos:lembretes {--dias=3 : Enviar para boletos que vencem em X dias}';

    protected $description = 'Envia lembretes por email para boletos próximos do vencimento';

    public function handle()
    {
        $dias = (int) $this->option('dias');

        $this->info("Buscando boletos que vencem em {$dias} dias...");

        // Buscar boletos pendentes que vencem nos próximos X dias
        $boletosVencendo = Boleto::where('status', 'pendente')
            ->whereDate('vencimento', '=', now()->addDays($dias)->toDateString())
            ->with(['unidade.user', 'condominio'])
            ->get();

        if ($boletosVencendo->isEmpty()) {
            $this->info('Nenhum boleto encontrado para o período.');
            return Command::SUCCESS;
        }

        $this->info("Encontrados {$boletosVencendo->count()} boletos.");

        $enviados = 0;

        foreach ($boletosVencendo as $boleto) {
            // Buscar morador da unidade
            $morador = $boleto->unidade->user;

            if (!$morador || !$morador->email) {
                $this->warn("Boleto #{$boleto->id} - Sem morador ou email cadastrado");
                continue;
            }

            try {
                // Enviar notificação
                $morador->notify(new BoletoVencendoNotification($boleto, $dias));

                $enviados++;
                $this->info("✓ Lembrete enviado para {$morador->name} - Boleto #{$boleto->id}");
            } catch (\Exception $e) {
                $this->error("✗ Erro ao enviar para {$morador->name}: " . $e->getMessage());
            }
        }

        $this->info("---");
        $this->info("Total de lembretes enviados: {$enviados}");

        return Command::SUCCESS;
    }
}
