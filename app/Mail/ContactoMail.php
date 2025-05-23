<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;

class ContactoMail extends BaseMail
{
    public $datos;
    public $nombre;
    public $email;
    public $asunto;
    public $mensaje;
    public $telefono;

    /**
     * Create a new message instance.
     */
    public function __construct($datos)
    {
        parent::__construct(); // Llama al constructor de BaseMail
        $this->datos = $datos;
        $this->nombre = $datos['nombre'];
        $this->email = $datos['correo'];
        $this->asunto = $datos['asunto'];
        $this->mensaje = $datos['mensaje'];
        $this->telefono = $datos['telefono'] ?? null;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Formulario de Contacto - INDARCA',
            from: new Address(config('mail.from.address'), config('mail.from.name')),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contacto',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
