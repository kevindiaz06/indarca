<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class VerifyEmailWithCode extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * El código de verificación.
     *
     * @var string
     */
    protected $code;

    /**
     * Create a new notification instance.
     *
     * @param  string  $code
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
