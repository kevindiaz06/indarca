<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;

class WelcomeMail extends BaseMail
{
    public $user;
    public $password;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $password)
    {
        parent::__construct(); // Llama al constructor de BaseMail para inicializar la ruta del logo
        // Creamos un objeto con los datos para mantener la compatibilidad con la plantilla
        $this->user = (object)[
            'name' => $name,
            'email' => $email
        ];
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bienvenido a INDARCA - Información de Acceso',
            from: new Address(config('mail.from.address'), config('mail.from.name')),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome',
            with: [
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
