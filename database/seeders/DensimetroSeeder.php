<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Densimetro;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DensimetroSeeder extends Seeder
{
    public function run()
    {
        // Obtener IDs de clientes existentes
        $clienteIds = User::whereIn('role', ['cliente'])->pluck('id')->toArray();

        // Si no hay clientes, usar algunos IDs por defecto
        if (empty($clienteIds)) {
            $clienteIds = [3, 4, 5]; // IDs de clientes de respaldo
        }

        // Estados posibles para los densímetros
        $estados = [
            'recibido',
            'en_proceso',
            'pendiente_piezas',
            'calibrando',
            'finalizado',
            'entregado',
            'en_espera',
            'reparando'
        ];

        // Marcas y modelos comunes de densímetros
        $marcasModelos = [
            ['marca' => 'Troxler', 'modelo' => '3440'],
            ['marca' => 'Troxler', 'modelo' => '3430'],
            ['marca' => 'Humboldt', 'modelo' => 'H-4140'],
            ['marca' => 'CPN', 'modelo' => 'MC-3'],
            ['marca' => 'Seaman', 'modelo' => 'HS-5001'],
            ['marca' => 'InstroTek', 'modelo' => 'QG-3000'],
            ['marca' => 'TransTech', 'modelo' => 'NDG-3000'],
            ['marca' => 'Gilson', 'modelo' => 'HM-200'],
        ];

        $registros = [];
        $fechaActual = Carbon::now();

        // Generar aproximadamente 100 registros distribuidos en los últimos 12 meses
        for ($mes = 0; $mes < 12; $mes++) {
            // Entre 6 y 12 registros por mes para totalizar ~100
            $registrosPorMes = rand(6, 12);

            for ($i = 0; $i < $registrosPorMes; $i++) {
                // Fecha aleatoria dentro del mes
                $fechaBase = $fechaActual->copy()->subMonths($mes);
                $diaAleatorio = rand(1, $fechaBase->daysInMonth);
                $fechaEntrada = $fechaBase->copy()->day($diaAleatorio);

                // Seleccionar marca y modelo aleatorio
                $marcaModelo = $marcasModelos[array_rand($marcasModelos)];

                // Generar número de serie único
                $numeroSerie = $marcaModelo['marca'] . '-' .
                              str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT) .
                              chr(65 + rand(0, 25)); // Letra aleatoria al final

                // Estado aleatorio
                $estado = $estados[array_rand($estados)];

                // Cliente aleatorio
                $clienteId = $clienteIds[array_rand($clienteIds)];

                // Generar fecha de finalización si el estado lo requiere
                $fechaFinalizacion = null;
                if (in_array($estado, ['finalizado', 'entregado'])) {
                    $fechaFinalizacion = $fechaEntrada->copy()->addDays(rand(5, 45));
                }

                // Calibración (70% de probabilidad de estar calibrado)
                $calibrado = rand(1, 10) <= 7;
                $fechaProximaCalibr = null;
                if ($calibrado) {
                    $fechaProximaCalibr = $fechaEntrada->copy()->addMonths(rand(6, 24));
                }

                // Observaciones aleatorias
                $observaciones = [
                    'Equipo en buen estado general',
                    'Requiere limpieza profunda',
                    'Presenta desgaste normal por uso',
                    'Pantalla con rayones menores',
                    'Botones funcionales correctamente',
                    'Carcasa con pequeños golpes',
                    'Equipo bien conservado',
                    'Necesita calibración urgente',
                    'Funcionamiento óptimo',
                    'Requiere revisión de sensores',
                    null // Sin observaciones
                ];

                $registros[] = [
                    'cliente_id' => $clienteId,
                    'numero_serie' => $numeroSerie,
                    'marca' => $marcaModelo['marca'],
                    'modelo' => $marcaModelo['modelo'],
                    'fecha_entrada' => $fechaEntrada->format('Y-m-d'),
                    'fecha_finalizacion' => $fechaFinalizacion ? $fechaFinalizacion->format('Y-m-d') : null,
                    'referencia_reparacion' => Densimetro::generarReferencia(),
                    'estado' => $estado,
                    'observaciones' => $observaciones[array_rand($observaciones)],
                    'calibrado' => $calibrado,
                    'fecha_proxima_calibracion' => $fechaProximaCalibr ? $fechaProximaCalibr->format('Y-m-d') : null,
                    'created_at' => $fechaEntrada->format('Y-m-d H:i:s'),
                    'updated_at' => $fechaEntrada->format('Y-m-d H:i:s'),
                ];
            }
        }

        // Insertar registros en lotes para mejor rendimiento
        $chunks = array_chunk($registros, 50);
        foreach ($chunks as $chunk) {
            DB::table('densimetros')->insert($chunk);
        }

        $this->command->info('Se han creado ' . count($registros) . ' registros de densímetros distribuidos en los últimos 12 meses.');
    }
}

