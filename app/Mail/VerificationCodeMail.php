<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;

class VerificationCodeMail extends BaseMail
{
    public $nombre;
    public $codigo;
    public $url;

    /**
     * Create a new message instance.
     */
    public function __construct($nombre, $codigo, $url = '')
    {
        parent::__construct();
        $this->nombre = $nombre;
        $this->codigo = $codigo;
        $this->url = $url;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verificación de Cuenta - INDARCA',
            from: new Address(config('mail.from.address'), config('mail.from.name')),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.verification-code',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
