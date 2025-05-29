<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

class TestMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test {email : El correo electrónico de destino}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prueba la configuración de correo enviando un email de prueba';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        $this->info('Probando configuración de correo...');
        $this->info('Correo destino: ' . $email);

        // Mostrar configuración actual
        $this->info('Configuración actual:');
        $this->line('MAIL_MAILER: ' . config('mail.default'));
        $this->line('MAIL_HOST: ' . config('mail.mailers.smtp.host'));
        $this->line('MAIL_PORT: ' . config('mail.mailers.smtp.port'));
        $this->line('MAIL_USERNAME: ' . (config('mail.mailers.smtp.username') ? 'Configurado' : 'No configurado'));
        $this->line('MAIL_FROM_ADDRESS: ' . config('mail.from.address'));
        $this->line('MAIL_FROM_NAME: ' . config('mail.from.name'));

        try {
            // Intentar enviar correo de prueba
            Mail::to($email)->send(new ResetPasswordMail('Usuario de Prueba', 'password123'));

            $this->info('✅ Correo enviado exitosamente!');

        } catch (\Exception $e) {
            $this->error('❌ Error al enviar correo:');
            $this->error($e->getMessage());

            // Mostrar sugerencias
            $this->line('');
            $this->warn('Posibles soluciones:');
            $this->line('1. Verificar que XAMPP tenga sendmail configurado');
            $this->line('2. Verificar configuración SMTP en .env');
            $this->line('3. Usar un servicio de correo como Mailtrap o Gmail');
            $this->line('4. Para desarrollo local, usar el driver "log" en .env: MAIL_MAILER=log');

            return 1;
        }

        return 0;
    }
}
