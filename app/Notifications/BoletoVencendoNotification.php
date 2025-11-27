<?php

namespace App\Notifications;

use App\Models\Boleto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BoletoVencendoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Boleto $boleto,
        public int $diasRestantes
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $subject = $this->diasRestantes === 0
            ? 'Boleto Vence Hoje!'
            : "Boleto Vence em {$this->diasRestantes} " . ($this->diasRestantes === 1 ? 'dia' : 'dias');

        return (new MailMessage)
            ->subject($subject . ' - ' . $this->boleto->condominio->nome)
            ->greeting('Olá, ' . $notifiable->name . '!')
            ->line('Lembrete: seu boleto está próximo do vencimento.')
            ->line('**Referência:** ' . $this->boleto->referencia)
            ->line('**Valor:** R$ ' . number_format($this->boleto->valor, 2, ',', '.'))
            ->line('**Vencimento:** ' . $this->boleto->vencimento->format('d/m/Y'))
            ->action('Pagar Agora', url('/admin/boletos/' . $this->boleto->id))
            ->line('Evite juros e multas. Pague em dia!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'boleto_id' => $this->boleto->id,
            'referencia' => $this->boleto->referencia,
            'dias_restantes' => $this->diasRestantes,
        ];
    }
}
