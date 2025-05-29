<?php

namespace App\Mail;

use App\Models\Densimetro;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DensimetroCorreoPersonalizadoMail extends BaseMail
{
    use Queueable, SerializesModels;

    public $cliente;
    public $densimetro;
    public $asunto;
    public $mensaje;
    public $remitente;

    /**
     * Create a new message instance.
     *
     * @param User $cliente
     * @param Densimetro $densimetro
     * @param string $asunto
     * @param string $mensaje
     * @param string $remitente
     * @return void
     */
    public function __construct(User $cliente, Densimetro $densimetro, string $asunto, string $mensaje, string $remitente)
    {
        parent::__construct();
        $this->cliente = $cliente;
        $this->densimetro = $densimetro;
        $this->asunto = $asunto;
        $this->mensaje = $mensaje;
        $this->remitente = $remitente;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->asunto,
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
            view: 'emails.densimetro_correo_personalizado',
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