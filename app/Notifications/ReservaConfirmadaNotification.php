<?php

namespace App\Notifications;

use App\Models\Reserva;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservaConfirmadaNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Reserva $reserva
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $espacoLabel = str_replace('_', ' ', ucwords($this->reserva->espaco, '_'));

        return (new MailMessage)
            ->subject('Reserva Confirmada - ' . $this->reserva->condominio->nome)
            ->greeting('Olá, ' . $notifiable->name . '!')
            ->line('Sua reserva foi confirmada!')
            ->line('**Espaço:** ' . $espacoLabel)
            ->line('**Data:** ' . $this->reserva->data_reserva->format('d/m/Y'))
            ->line('**Horário:** ' . $this->reserva->hora_inicio->format('H:i') . ' às ' . $this->reserva->hora_fim->format('H:i'))
            ->when($this->reserva->valor_taxa, function($mail) {
                return $mail->line('**Taxa:** R$ ' . number_format($this->reserva->valor_taxa, 2, ',', '.'));
            })
            ->action('Ver Reserva', url('/admin/reservas/' . $this->reserva->id))
            ->line('Aproveite o espaço!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'reserva_id' => $this->reserva->id,
            'espaco' => $this->reserva->espaco,
            'data_reserva' => $this->reserva->data_reserva,
        ];
    }
}
