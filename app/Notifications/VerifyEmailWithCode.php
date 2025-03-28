<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
<<<<<<< HEAD
use Illuminate\Support\Facades\URL;
=======
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff

class VerifyEmailWithCode extends Notification implements ShouldQueue
{
    use Queueable;

<<<<<<< HEAD
    /**
     * El código de verificación.
     *
     * @var string
     */
=======
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff
    protected $code;

    /**
     * Create a new notification instance.
     *
<<<<<<< HEAD
     * @param  string  $code
=======
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff
     * @return void
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
<<<<<<< HEAD
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['email' => $notifiable->getEmailForVerification()]
        );

        return (new MailMessage)
            ->subject('Verificación de Cuenta - INDARCA')
            ->view('emails.verification-code', [
                'nombre' => $notifiable->name,
                'codigo' => $this->code,
                'url' => $verificationUrl
            ]);
=======
        return (new MailMessage)
                    ->subject('Verificación de tu cuenta en INDARCA')
                    ->greeting('¡Hola ' . $notifiable->name . '!')
                    ->line('Gracias por registrarte en INDARCA. Para garantizar la seguridad de tu cuenta, necesitamos verificar tu dirección de correo electrónico.')
                    ->line('Por favor, utiliza el siguiente código de verificación para completar tu registro:')
                    ->view('emails.verification-code', [
                        'code' => $this->code,
                        'name' => $notifiable->name
                    ]);
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
