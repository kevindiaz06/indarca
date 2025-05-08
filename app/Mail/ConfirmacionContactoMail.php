<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;

class ConfirmacionContactoMail extends BaseMail
{
    public $nombre;
    public $contacto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos)
    {
        parent::__construct(); // Llama al constructor de BaseMail
        $this->nombre = $datos['nombre'];
        $this->contacto = [
            'nombre' => $datos['nombre'],
            'email' => $datos['correo'],
            'asunto' => $datos['asunto'],
            'mensaje' => $datos['mensaje']
        ];
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Confirmación de recepción de su mensaje - INDARCA',
            from: new Address(config('mail.from.address'), config('mail.from.name')),
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.confirmacion-contacto',
            with: [
                'contacto' => $this->contacto
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
