<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Densimetro;
use App\Models\User;
use App\Mail\DensimetroCorreoPersonalizadoMail;
use Illuminate\Support\Facades\Mail;

class TestCorreoPersonalizado extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:correo-personalizado {densimetro_id} {email_destino}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prueba el envío de correos personalizados para densímetros';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $densimetroId = $this->argument('densimetro_id');
        $emailDestino = $this->argument('email_destino');

        try {
            // Buscar el densímetro
            $densimetro = Densimetro::with('cliente')->findOrFail($densimetroId);

            $this->info("Densímetro encontrado: {$densimetro->referencia_reparacion}");

            // Crear un cliente temporal para la prueba si no existe
            $cliente = $densimetro->cliente;
            if (!$cliente) {
                $cliente = new User();
                $cliente->name = 'Cliente de Prueba';
                $cliente->email = $emailDestino;
            } else {
                $this->info("Cliente: {$cliente->name} ({$cliente->email})");
            }

            // Datos de prueba
            $asunto = 'Prueba de Correo Personalizado - Densímetro ' . $densimetro->referencia_reparacion;
            $mensaje = "Este es un correo de prueba para verificar que la funcionalidad de envío de correos personalizados funciona correctamente.\n\nSu densímetro está siendo procesado en nuestras instalaciones.\n\nGracias por confiar en INDARCA.";
            $remitente = 'Sistema de Pruebas INDARCA';

            $this->info("Enviando correo de prueba...");
            $this->info("Destinatario: {$emailDestino}");
            $this->info("Asunto: {$asunto}");

            // Enviar el correo
            Mail::to($emailDestino)
                ->send(new DensimetroCorreoPersonalizadoMail($cliente, $densimetro, $asunto, $mensaje, $remitente));

            $this->info("✅ Correo enviado exitosamente!");
            $this->info("Revisa la bandeja de entrada (y spam) de: {$emailDestino}");

        } catch (\Exception $e) {
            $this->error("❌ Error al enviar el correo: " . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
