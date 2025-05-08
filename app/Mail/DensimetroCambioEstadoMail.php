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

class DensimetroCambioEstadoMail extends BaseMail
{
    use Queueable, SerializesModels;

    public $cliente;
    public $densimetro;
    public $fecha;

    /**
     * Create a new message instance.
     *
     * @param User $cliente
     * @param Densimetro $densimetro
     * @param string $fecha
     * @return void
     */
    public function __construct(User $cliente, Densimetro $densimetro, $fecha)
    {
        parent::__construct();
        $this->cliente = $cliente;
        $this->densimetro = $densimetro;
        $this->fecha = $fecha;
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
