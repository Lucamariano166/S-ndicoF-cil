<?php

namespace App\Notifications;

use App\Models\Entrega;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NovaEntregaNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Entrega $entrega
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $tipoLabel = match($this->entrega->tipo) {
            'encomenda' => 'Encomenda',
            'correspondencia' => 'Correspondência',
            default => 'Entrega',
        };

        return (new MailMessage)
            ->subject('Nova ' . $tipoLabel . ' Recebida - ' . $this->entrega->condominio->nome)
            ->greeting('Olá, ' . $notifiable->name . '!')
            ->line('Uma ' . strtolower($tipoLabel) . ' foi recebida para sua unidade.')
            ->line('**Tipo:** ' . $tipoLabel)
            ->line('**Remetente:** ' . ($this->entrega->remetente ?? 'Não informado'))
            ->line('**Data de Recebimento:** ' . $this->entrega->created_at->format('d/m/Y H:i'))
            ->action('Ver Detalhes', url('/admin/entregas/' . $this->entrega->id))
            ->line('Retire sua entrega na portaria do condomínio.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'entrega_id' => $this->entrega->id,
            'tipo' => $this->entrega->tipo,
            'remetente' => $this->entrega->remetente,
        ];
    }
}
