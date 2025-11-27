<?php

namespace App\Notifications;

use App\Models\Comunicado;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NovoComunicadoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Comunicado $comunicado
    ) {}

    public function via(object $notifiable): array
    {
        $channels = ['database'];

        if ($this->comunicado->enviar_email) {
            $channels[] = 'mail';
        }

        return $channels;
    }

    public function toMail(object $notifiable): MailMessage
    {
        $prioridadeLabel = match($this->comunicado->prioridade) {
            'urgente' => '🔴 URGENTE',
            'alta' => '⚠️ ALTA',
            'normal' => 'ℹ️',
            'baixa' => '',
            default => '',
        };

        return (new MailMessage)
            ->subject($prioridadeLabel . ' ' . $this->comunicado->titulo)
            ->greeting('Olá, ' . $notifiable->name . '!')
            ->line('**' . $this->comunicado->titulo . '**')
            ->line($this->comunicado->mensagem)
            ->line('---')
            ->line('Enviado por: ' . $this->comunicado->condominio->nome)
            ->line('Data: ' . $this->comunicado->enviado_em?->format('d/m/Y H:i'))
            ->when($this->comunicado->requer_confirmacao, function($mail) {
                return $mail->action('Confirmar Leitura', url('/admin/comunicados/' . $this->comunicado->id));
            });
    }

    public function toArray(object $notifiable): array
    {
        return [
            'comunicado_id' => $this->comunicado->id,
            'titulo' => $this->comunicado->titulo,
            'prioridade' => $this->comunicado->prioridade,
        ];
    }
}
