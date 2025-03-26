<?php

namespace App\Mail;

use App\Models\Densimetro;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DensimetroCambioEstadoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;
    public $densimetro;
    public $fecha;

    /**
     * Create a new message instance.
     *
     * @param Densimetro $densimetro
     * @return void
     */
    public function __construct(Densimetro $densimetro)
    {
        $this->densimetro = $densimetro;
        $this->cliente = $densimetro->cliente;
        $this->fecha = now()->format('d/m/Y');
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'INDARCA - Actualización de Estado del Densímetro #' . $this->densimetro->referencia_reparacion,
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
            view: 'emails.densimetro_cambio_estado',
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
