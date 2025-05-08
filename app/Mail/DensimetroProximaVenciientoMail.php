<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\Densimetro;
use App\Models\User;

class DensimetroProximoVencimientoMail extends BaseMail
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
        parent::__construct(); // Llama al constructor de BaseMail
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
            subject: "IMPORTANTE: Próximo Vencimiento de Calibración de Densímetro - {$this->diasRestantes} días restantes",
            from: new Address(config('mail.from.address'), config('mail.from.name')),
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
