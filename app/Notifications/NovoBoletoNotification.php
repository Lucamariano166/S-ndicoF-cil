<?php

namespace App\Notifications;

use App\Models\Boleto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NovoBoletoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Boleto $boleto
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Novo Boleto Disponível - ' . $this->boleto->condominio->nome)
            ->greeting('Olá, ' . $notifiable->name . '!')
            ->line('Um novo boleto está disponível para sua unidade.')
            ->line('**Referência:** ' . $this->boleto->referencia)
            ->line('**Valor:** R$ ' . number_format($this->boleto->valor, 2, ',', '.'))
            ->line('**Vencimento:** ' . $this->boleto->vencimento->format('d/m/Y'))
            ->action('Ver Boleto', url('/admin/boletos/' . $this->boleto->id))
            ->line('Obrigado por utilizar o SíndicoFácil!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'boleto_id' => $this->boleto->id,
            'referencia' => $this->boleto->referencia,
            'valor' => $this->boleto->valor,
            'vencimento' => $this->boleto->vencimento,
        ];
    }
}
