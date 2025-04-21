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
            ];

            // Si el estado inicial es finalizado o entregado, registrar fecha de finalización
            if (isset($data['estado']) && ($data['estado'] == 'finalizado' || $data['estado'] == 'entregado')) {
                $densimetroData['estado'] = $data['estado'];
                $densimetroData['fecha_finalizacion'] = now()->toDateString();
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

        // Preparar datos de calibración
        if ($data['estado'] == 'finalizado' || $data['estado'] == 'entregado') {
            $data['calibrado'] = $data['calibrado'] ?? 0;
            if ($data['calibrado'] == 1 && isset($data['fecha_proxima_calibracion'])) {
                // La fecha ya está en los datos
            } else {
                $data['fecha_proxima_calibracion'] = null;
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
            Mail::to($cliente->email)->send(new DensimetroCambioEstadoMail($densimetro));
        } catch (\Exception $e) {
            Log::error('Error al enviar correo de cambio de estado: ' . $e->getMessage());
        }
    }
}
