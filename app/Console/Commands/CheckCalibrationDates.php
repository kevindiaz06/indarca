<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Densimetro;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\DensimetroRecordatorioCalibrado;
use App\Mail\DensimetroProximoVencimientoMail;
use Carbon\Carbon;

class CheckCalibrationDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:calibration-dates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica las fechas de calibración de los densímetros, actualiza su estado si ha pasado la fecha y envía recordatorios';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Iniciando verificación de fechas de calibración...');

        // Obtener todos los densímetros calibrados con fecha de próxima calibración
        $densimetros = Densimetro::where('calibrado', true)
            ->whereNotNull('fecha_proxima_calibracion')
            ->get();

        $countActualizados = 0;
        $countRecordatoriosSemana = 0;
        $countRecordatoriosDias = 0;
        $today = Carbon::today();

        foreach ($densimetros as $densimetro) {
            // Asegurarse de que la fecha sea un objeto Carbon
            $fecha_calibracion = $densimetro->fecha_proxima_calibracion;
            if (!($fecha_calibracion instanceof \DateTime)) {
                $fecha_calibracion = Carbon::parse($fecha_calibracion);
            }

            // Verificar si la fecha de calibración ha pasado
            if ($fecha_calibracion < $today) {
                // Actualizar el estado de calibración a no calibrado
                $densimetro->calibrado = false;
                $densimetro->save();

                Log::info("Densímetro ID: {$densimetro->id}, Número de Serie: {$densimetro->numero_serie} - El estado de calibración se actualizó a No Calibrado porque la fecha de calibración (" . $fecha_calibracion->format('Y-m-d') . ") ha expirado.");

                $countActualizados++;
            }
            // Verificar si faltan exactamente 7 días para el vencimiento
            elseif ($fecha_calibracion->diffInDays($today) == 7) {
                $this->enviarRecordatorio($densimetro, 7);
                $countRecordatoriosSemana++;
            }
            // Verificar si faltan exactamente 2 días para el vencimiento
            elseif ($fecha_calibracion->diffInDays($today) == 2) {
                $this->enviarRecordatorio($densimetro, 2);
                $countRecordatoriosDias++;
            }
        }

        $this->info("Verificación completada:");
        $this->info("- {$countActualizados} densímetros actualizados a No Calibrado");
        $this->info("- {$countRecordatoriosSemana} recordatorios enviados (7 días)");
        $this->info("- {$countRecordatoriosDias} recordatorios enviados (2 días)");

        return Command::SUCCESS;
    }

    /**
     * Envía un correo electrónico de recordatorio al cliente.
     *
     * @param Densimetro $densimetro
     * @param int $diasRestantes
     * @return void
     */
    private function enviarRecordatorio(Densimetro $densimetro, int $diasRestantes)
    {
        // Verificar si el densímetro tiene un cliente asociado
        if (!$densimetro->cliente) {
            Log::warning("No se puede enviar recordatorio para el densímetro ID: {$densimetro->id} porque no tiene cliente asociado");
            return;
        }

        try {
            // Usar la nueva clase para el envío de correos
            Mail::to($densimetro->cliente->email)
                ->send(new DensimetroProximoVencimientoMail($densimetro, $diasRestantes));

            Log::info("Recordatorio de calibración enviado al cliente {$densimetro->cliente->email} para el densímetro {$densimetro->numero_serie}. Días restantes: {$diasRestantes}");
        } catch (\Exception $e) {
            Log::error("Error al enviar recordatorio de calibración: " . $e->getMessage());
        }
    }
}
