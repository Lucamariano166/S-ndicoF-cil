<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NovoLeadNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * O número de tentativas para enviar o email.
     */
    public $tries = 3;

    /**
     * O número de segundos antes do timeout.
     */
    public $timeout = 120;

    public function __construct(
        public Lead $lead
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🎯 Novo Lead Cadastrado - SíndicoFácil',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.novo-lead',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
