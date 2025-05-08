<?php

namespace App\Services;

use App\Mail\DensimetroCambioEstadoMail;
use App\Mail\DensimetroRecepcionMail;
use App\Models\Densimetro;
use App\Models\User;
use App\Repositories\DensimetroRepository;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DensimetroService
{
    protected DensimetroRepository $repository;

    /**
     * Constructor
     *
     * @param DensimetroRepository $repository
     */
    public function __construct(DensimetroRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Registrar un nuevo densímetro
     *
     * @param array $data Datos del densímetro
     * @param User $cliente Cliente asociado
     * @return Densimetro
     */
    public function registrarNuevo(array $data, User $cliente): Densimetro
    {
        // Verificar si el densímetro ya existe
        $densimetroExistente = $this->repository->findByNumeroSerie($data['numero_serie']);

        if ($densimetroExistente) {
            // Si tiene una reparación en curso, lanzar excepción
            if ($densimetroExistente->fecha_finalizacion === null) {
                throw new \Exception('Este densímetro ya está en proceso de reparación y no puede registrarse nuevamente hasta que finalice.');
            }

            // Si existe pero está finalizado, crear nueva reparación con datos existentes
            $referencia = $this->repository->generarReferencia();

            $densimetroData = [
                'cliente_id' => $data['cliente_id'],
                'numero_serie' => $data['numero_serie'],
                'marca' => $densimetroExistente->marca,
                'modelo' => $densimetroExistente->modelo,
                'fecha_entrada' => now()->toDateString(),
                'referencia_reparacion' => $referencia,
                'estado' => 'recibido',
                'observaciones' => $data['observaciones'] ?? null,
                'calibrado' => null,
                'fecha_proxima_calibracion' => null,
            ];

            $densimetro = $this->repository->create($densimetroData);
        } else {
            // Crear un nuevo densímetro
            $referencia = $this->repository->generarReferencia();

            $densimetroData = [
                'cliente_id' => $data['cliente_id'],
                'numero_serie' => $data['numero_serie'],
                'marca' => $data['marca'] ?? null,
                'modelo' => $data['modelo'] ?? null,
                'fecha_entrada' => now()->toDateString(),
                'referencia_reparacion' => $referencia,
                'estado' => 'recibido',
                'observaciones' => $data['observaciones'] ?? null,
                'calibrado' => null,
                'fecha_proxima_calibracion' => null,
            ];

            // Si el estado inicial es finalizado o entregado
            if (isset($data['estado']) && ($data['estado'] == 'finalizado' || $data['estado'] == 'entregado')) {
                $densimetroData['estado'] = $data['estado'];
                $densimetroData['fecha_finalizacion'] = now()->toDateString();

                // Manejar datos de calibración
                if (isset($data['calibrado'])) {
                    $densimetroData['calibrado'] = $data['calibrado'];

                    // Si está calibrado, debe tener fecha de próxima calibración
                    if ($data['calibrado'] == 1) {
                        if (isset($data['fecha_proxima_calibracion']) && !empty($data['fecha_proxima_calibracion'])) {
                            // Verificar que la fecha esté en el futuro
                            $fechaProxima = Carbon::parse($data['fecha_proxima_calibracion']);
                            $hoy = Carbon::today();

                            if ($fechaProxima <= $hoy) {
                                throw new \Exception('La fecha de próxima calibración debe ser posterior a la fecha actual.');
                            }

                            $densimetroData['fecha_proxima_calibracion'] = $data['fecha_proxima_calibracion'];

                            Log::info("Nuevo densímetro - Serie: {$data['numero_serie']} - " .
                                     "Próxima calibración programada para: {$data['fecha_proxima_calibracion']}");
                        } else if ($data['estado'] == 'entregado') {
                            // Para entregado es obligatorio
                            throw new \Exception('Para densímetros calibrados, debe especificar la fecha de próxima calibración antes de entregarlos al cliente.');
                        } else {
                            // Para finalizado, usar fecha predeterminada (1 año)
                            $densimetroData['fecha_proxima_calibracion'] = Carbon::now()->addYear()->format('Y-m-d');

                            Log::info("Nuevo densímetro - Serie: {$data['numero_serie']} - " .
                                     "Se asignó fecha de próxima calibración predeterminada: {$densimetroData['fecha_proxima_calibracion']}");
                        }
                    }
                } else if ($data['estado'] == 'entregado') {
                    // Para estado entregado, es obligatorio especificar si está calibrado
                    throw new \Exception('Debe especificar si el densímetro está calibrado antes de registrarlo como "Entregado".');
                } else {
                    // Para estado finalizado, usar valor predeterminado (no calibrado)
                    $densimetroData['calibrado'] = 0;
                }
            }

            $densimetro = $this->repository->create($densimetroData);
        }

        // Enviar correo de recepción
        $this->enviarCorreoRecepcion($cliente, $densimetro);

        return $densimetro;
    }

    /**
     * Actualizar un densímetro
     *
     * @param int $id ID del densímetro
     * @param array $data Datos actualizados
     * @return Densimetro
     * @throws \Exception
     */
    public function actualizar(int $id, array $data): Densimetro
    {
        $densimetro = $this->repository->findById($id);
        $estadoAnterior = $densimetro->estado;

        // Verificar si el densímetro está en estado "entregado" y bloquear modificaciones
        if ($densimetro->estado === 'entregado') {
            throw new \Exception('No se pueden modificar densímetros en estado "Entregado". Este registro está bloqueado para evitar inconsistencias. Si necesita realizar cambios, por favor registre un nuevo ingreso del densímetro.');
        }

        // Verificar si está cambiando a un estado final (finalizado o entregado)
        $cambiandoAEstadoFinal = ($data['estado'] == 'finalizado' || $data['estado'] == 'entregado') &&
                                 ($estadoAnterior != 'finalizado' && $estadoAnterior != 'entregado');

        // Si está cambiando a estado final, validar y ajustar datos de calibración
        if ($cambiandoAEstadoFinal) {
            // Asegurarse de que haya un valor para calibrado (si no se especificó, usar valor predeterminado)
            if (!isset($data['calibrado']) || $data['calibrado'] === '') {
                if ($data['estado'] === 'entregado') {
                    // Para estado entregado, es obligatorio especificar el estado de calibración
                    throw new \Exception('Debe especificar si el densímetro está calibrado antes de cambiarlo a estado "Entregado".');
                } else {
                    // Para estado finalizado, usar valor predeterminado (no calibrado)
                    $data['calibrado'] = 0;
                    Log::info("Densímetro ID: {$id} - Se asignó valor predeterminado 'No calibrado' al finalizar.");
                }
            }

            // Si está calibrado, debe tener fecha de próxima calibración
            if ($data['calibrado'] == 1) {
                if (!isset($data['fecha_proxima_calibracion']) || empty($data['fecha_proxima_calibracion'])) {
                    if ($data['estado'] === 'entregado') {
                        throw new \Exception('Para densímetros calibrados, debe especificar la fecha de próxima calibración antes de entregarlos al cliente.');
                    } else {
                        // Establecer una fecha predeterminada (1 año desde hoy) para estado finalizado
                        $data['fecha_proxima_calibracion'] = Carbon::now()->addYear()->format('Y-m-d');
                        Log::info("Densímetro ID: {$id} - Se asignó fecha de próxima calibración predeterminada: {$data['fecha_proxima_calibracion']}");
                    }
                } else {
                    // Verificar que la fecha de calibración esté en el futuro
                    $fechaProxima = Carbon::parse($data['fecha_proxima_calibracion']);
                    $hoy = Carbon::today();

                    if ($fechaProxima <= $hoy) {
                        throw new \Exception('La fecha de próxima calibración debe ser posterior a la fecha actual.');
                    }

                    // Registrar en log la fecha establecida de próxima calibración
                    Log::info("Densímetro ID: {$id}, Número de Serie: {$densimetro->numero_serie} - " .
                             "Próxima calibración programada para: {$data['fecha_proxima_calibracion']}");
                }
            } else {
                // Si no está calibrado, asegurar que no tenga fecha de próxima calibración
                $data['fecha_proxima_calibracion'] = null;
            }
        } else if (isset($data['calibrado'])) {
            // Si no está cambiando a estado final pero sí está cambiando el estado de calibración
            if ($data['calibrado'] == 1) {
                // Si lo marca como calibrado, debe tener fecha de próxima calibración
                if (!isset($data['fecha_proxima_calibracion']) || empty($data['fecha_proxima_calibracion'])) {
                    // Establecer fecha predeterminada (1 año)
                    $data['fecha_proxima_calibracion'] = Carbon::now()->addYear()->format('Y-m-d');
                    Log::info("Densímetro ID: {$id} - Calibrado marcado como SÍ, se asignó fecha predeterminada: {$data['fecha_proxima_calibracion']}");
                }
            } else {
                // Si lo marca como no calibrado, eliminar fecha de próxima calibración
                $data['fecha_proxima_calibracion'] = null;
            }
        }

        // Verificar si está cambiando el número de serie
        if ($data['numero_serie'] !== $densimetro->numero_serie) {
            // Validar si existe otro en reparación con ese número
            if ($this->repository->existeOtroEnReparacion($data['numero_serie'], $id)) {
                throw new \Exception('Este número de serie ya está asignado a otro densímetro en reparación.');
            }

            // Considerar usar datos de marca/modelo de otro finalizado
            $otroFinalizado = $this->repository->findOtroFinalizado($data['numero_serie'], $id);

            if ($otroFinalizado) {
                if (empty($data['marca'])) {
                    $data['marca'] = $otroFinalizado->marca;
                }
                if (empty($data['modelo'])) {
                    $data['modelo'] = $otroFinalizado->modelo;
                }
            }
        }

        // Manejar fechas de finalización
        if (($data['estado'] == 'finalizado' || $data['estado'] == 'entregado') && !$densimetro->fecha_finalizacion) {
            $data['fecha_finalizacion'] = now()->toDateString();
        } elseif (($estadoAnterior == 'finalizado' || $estadoAnterior == 'entregado') &&
                ($data['estado'] != 'finalizado' && $data['estado'] != 'entregado')) {
            $data['fecha_finalizacion'] = null;
        }

        // Actualizar el densímetro
        $densimetro = $this->repository->update($densimetro, $data);

        // Notificar cambio de estado si es necesario
        if ($estadoAnterior != $data['estado']) {
            $this->enviarCorreoCambioEstado($densimetro);
        }

        return $densimetro;
    }

    /**
     * Eliminar un densímetro
     *
     * @param int $id ID del densímetro
     * @return bool
     */
    public function eliminar(int $id): bool
    {
        $densimetro = $this->repository->findById($id);
        return $this->repository->delete($densimetro);
    }

    /**
     * Generar PDF del densímetro
     *
     * @param int $id ID del densímetro
     * @return \Barryvdh\DomPDF\PDF
     */
    public function generarPDF(int $id)
    {
        $densimetro = Densimetro::with(['cliente', 'archivos'])->findOrFail($id);

        // Verificar el estado de calibración antes de generar el PDF
        $densimetro->verificarYActualizarCalibrado();

        $date = Carbon::now()->format('d-m-Y_H-i-s');
        $fileName = "densimetro_{$densimetro->referencia_reparacion}_{$date}.pdf";

        $data = [
            'densimetro' => $densimetro,
            'title' => 'Ficha de Densímetro',
            'date' => Carbon::now()->format('d/m/Y H:i:s')
        ];

        $pdf = PDF::loadView('reports.densimetro_pdf', $data);

        // Configurar opciones para el PDF
        $pdf->setPaper('a4');
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('enable-local-file-access', true);
        $pdf->setOption('images', true);

        return [
            'pdf' => $pdf,
            'fileName' => $fileName
        ];
    }

    /**
     * Enviar correo de recepción al cliente
     *
     * @param User $cliente Cliente destinatario
     * @param Densimetro $densimetro Densímetro recibido
     * @return void
     */
    private function enviarCorreoRecepcion(User $cliente, Densimetro $densimetro): void
    {
        try {
            Log::info('Correo de recepción enviado a ' . $cliente->email . ' con referencia ' . $densimetro->referencia_reparacion);
            Mail::to($cliente->email)->send(new DensimetroRecepcionMail($cliente, $densimetro));
        } catch (\Exception $e) {
            Log::error('Error al enviar correo de recepción: ' . $e->getMessage());
        }
    }

    /**
     * Enviar correo de cambio de estado al cliente
     *
     * @param Densimetro $densimetro Densímetro actualizado
     * @return void
     */
    private function enviarCorreoCambioEstado(Densimetro $densimetro): void
    {
        $cliente = $densimetro->cliente;

        if (!$cliente) {
            Log::warning('No se puede enviar correo de cambio de estado para el densímetro ID: ' . $densimetro->id . ' porque el cliente no existe');
            return;
        }

        try {
            Log::info('Correo de cambio de estado enviado a ' . $cliente->email . ' - Nuevo estado: ' . $densimetro->estado);
            Mail::to($cliente->email)->send(new DensimetroCambioEstadoMail($cliente, $densimetro, now()->format('d/m/Y')));
        } catch (\Exception $e) {
            Log::error('Error al enviar correo de cambio de estado: ' . $e->getMessage());
        }
    }
}
