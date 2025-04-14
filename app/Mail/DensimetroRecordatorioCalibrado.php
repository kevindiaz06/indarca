<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Densimetro;
use App\Models\User;
use Carbon\Carbon;

class DensimetroRecordatorioCalibrado extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * El densímetro que está por vencer.
     *
     * @var Densimetro
     */
    public $densimetro;

    /**
     * El cliente propietario del densímetro.
     *
     * @var User
     */
    public $cliente;

    /**
     * Días restantes para el vencimiento.
     *
     * @var int
     */
    public $diasRestantes;

    /**
     * Create a new message instance.
     *
     * @param Densimetro $densimetro
     * @param int $diasRestantes
     */
    public function __construct(Densimetro $densimetro, int $diasRestantes)
    {
        $this->densimetro = $densimetro;
        $this->cliente = $densimetro->cliente;
        $this->diasRestantes = $diasRestantes;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "IMPORTANTE: Recordatorio de Calibración de Densímetro - {$this->diasRestantes} días restantes",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.densimetro_recordatorio_calibrado',
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
