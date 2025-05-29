<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ResetPasswordMail extends BaseMail
{
    use Queueable, SerializesModels;

    public $nombre;
    public $password;

    /**
     * Create a new message instance.
     */
    public function __construct($nombre, $password)
    {
        parent::__construct(); // Llama al constructor de BaseMail para inicializar la ruta del logo
        $this->nombre = $nombre;
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva contraseña para su cuenta - INDARCA',
            from: new Address(config('mail.from.address'), config('mail.from.name')),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reset-password',
            with: [
                'nombre' => $this->nombre,
                'password' => $this->password
            ]
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
