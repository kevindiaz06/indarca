<?php

namespace App\Http\Controllers;

use App\Models\Densimetro;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;

class EstadoController extends Controller
{
    /**
     * Mostrar el formulario para consultar el estado de un densímetro.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('estado');
    }

    /**
     * Procesar la consulta del estado de un densímetro.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function consultar(Request $request)
    {
        $request->validate([
            'referencia' => 'required|string|max:50',
        ]);

        $referencia = $request->input('referencia');

        // Buscar el densímetro por su referencia de reparación
        $densimetro = Densimetro::with('cliente')
                               ->where('referencia_reparacion', $referencia)
                               ->first();

        if (!$densimetro) {
            // Usar session flash en lugar de withErrors para el mensaje general
            return redirect()->route('estado')
                             ->with('error', 'No se encontró ningún densímetro con esa referencia.')
                             ->withInput();
        }

        $estado = [
            'referencia' => $densimetro->referencia_reparacion,
            'numero_serie' => $densimetro->numero_serie,
            'marca' => $densimetro->marca,
            'modelo' => $densimetro->modelo,
            'fecha_entrada' => $densimetro->fecha_entrada->format('d/m/Y'),
            'estado' => $this->formatearEstado($densimetro->estado),
            'cliente' => $densimetro->cliente ? $densimetro->cliente->name : 'Cliente no disponible',
        ];

        // Verificar calibración si está en estado finalizado o entregado
        if ($densimetro->estado === 'finalizado' || $densimetro->estado === 'entregado') {
            // Verificar estado de calibración antes de mostrarlo (por si ha expirado)
            $densimetro->verificarYActualizarCalibrado();

            // Añadir información de calibración
            $estado['calibrado'] = $densimetro->calibrado;

            // Añadir fecha próxima de calibración si está calibrado
            if ($densimetro->calibrado && $densimetro->fecha_proxima_calibracion) {
                $fecha_proxima = $densimetro->fecha_proxima_calibracion;
                // Asegurarse de que la fecha sea un objeto DateTime
                if (!($fecha_proxima instanceof \DateTime)) {
                    $fecha_proxima = \Carbon\Carbon::parse($fecha_proxima);
                }
                $estado['fecha_proxima_calibracion'] = $fecha_proxima->format('d/m/Y');
            }
        }

        // Redirigir a la vista de resultados separada
        return view('resultado_estado', ['estado' => $estado]);
    }

    /**
     * Procesar la consulta de estado de calibración por número de serie, marca y modelo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function consultarCalibracion(Request $request)
    {
        $request->validate([
            'numero_serie' => 'required|string|max:50',
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
        ]);

        // Limpiar y normalizar los términos de búsqueda para aumentar la probabilidad de coincidencia
        $numeroSerie = trim($request->numero_serie);
        $marca = trim($request->marca);
        $modelo = trim($request->modelo);

        // Primero, intentar una búsqueda exacta
        $densimetro = Densimetro::where('numero_serie', $numeroSerie)
                              ->where('marca', $marca)
                              ->where('modelo', $modelo)
                              ->whereIn('estado', ['finalizado', 'entregado'])
                              ->orderBy('fecha_finalizacion', 'desc')
                              ->first();

        // Si no hay resultados, intentar una búsqueda más flexible
        if (!$densimetro) {
            $densimetro = Densimetro::where('numero_serie', 'like', '%' . $numeroSerie . '%')
                                 ->where(function($query) use ($marca) {
                                     $query->where('marca', 'like', '%' . $marca . '%')
                                           ->orWhereRaw("LOWER(marca) LIKE ?", ['%' . strtolower($marca) . '%']);
                                 })
                                 ->where(function($query) use ($modelo) {
                                     $query->where('modelo', 'like', '%' . $modelo . '%')
                                           ->orWhereRaw("LOWER(modelo) LIKE ?", ['%' . strtolower($modelo) . '%']);
                                 })
                                 ->whereIn('estado', ['finalizado', 'entregado'])
                                 ->orderBy('fecha_finalizacion', 'desc')
                                 ->first();
        }

        if (!$densimetro) {
            // Si aún no hay resultados, intentar solo con el número de serie
            $densimetro = Densimetro::where('numero_serie', 'like', '%' . $numeroSerie . '%')
                                 ->whereIn('estado', ['finalizado', 'entregado'])
                                 ->orderBy('fecha_finalizacion', 'desc')
                                 ->first();

            if (!$densimetro) {
                return redirect()->route('estado')->with('error', 'No se encontró ningún densímetro calibrado con esos datos o el densímetro aún está en proceso de reparación.');
            }
        }

        // Verificar estado de calibración de forma explícita
        $calibradoActual = false;
        $fechaProxima = null;

        if ($densimetro->calibrado) {
            // Verificar si la fecha de calibración ha expirado
            if ($densimetro->fecha_proxima_calibracion) {
                $fechaProxima = \Carbon\Carbon::parse($densimetro->fecha_proxima_calibracion);
                $hoy = \Carbon\Carbon::today();

                if ($fechaProxima >= $hoy) {
                    $calibradoActual = true;
                }
            }
        }

        // Actualizar el estado de calibración en la base de datos si cambió
        if ($densimetro->calibrado !== $calibradoActual && $densimetro->calibrado !== null) {
            $densimetro->calibrado = $calibradoActual;
            $densimetro->save();

            // Log para debugging
            \Log::info("Actualizado estado de calibración para densímetro #{$densimetro->id}, serie: {$densimetro->numero_serie} - Estado anterior: " .
                      ($densimetro->calibrado ? 'Calibrado' : 'No calibrado') .
                      " - Nuevo estado: " . ($calibradoActual ? 'Calibrado' : 'No calibrado'));
        }

        // Preparar los datos para la vista
        $calibracion = [
            'numero_serie' => $densimetro->numero_serie,
            'marca' => $densimetro->marca,
            'modelo' => $densimetro->modelo,
            'ultima_revision' => $densimetro->fecha_finalizacion ? $densimetro->fecha_finalizacion->format('d/m/Y') : null,
            'estado_calibracion' => $calibradoActual,
            'proxima_calibracion' => $fechaProxima ? $fechaProxima->format('d/m/Y') : null,
        ];

        // Redirección a la nueva vista de calibración
        return view('calibracion', ['calibracion' => $calibracion]);
    }

    /**
     * Formatea el estado del densímetro para mostrar en la interfaz.
     *
     * @param  string  $estado
     * @return string
     */
    private function formatearEstado($estado)
    {
        $formatos = [
            'recibido' => 'Recibido',
            'en_reparacion' => 'En reparación',
            'finalizado' => 'Reparación finalizada',
            'entregado' => 'Entregado al cliente'
        ];

        return $formatos[$estado] ?? $estado;
    }

    /**
     * Generar PDF con el estado del densímetro.
     *
     * @param  string  $referencia
     * @return \Illuminate\Http\Response
     */
    public function generarPDF($referencia)
    {
        // Buscar el densímetro por su referencia de reparación
        $densimetro = Densimetro::with('cliente')
                              ->where('referencia_reparacion', $referencia)
                              ->firstOrFail();

        // Verificar estado de calibración antes de generar el PDF
        $densimetro->verificarYActualizarCalibrado();

        $estado = [
            'referencia' => $densimetro->referencia_reparacion,
            'numero_serie' => $densimetro->numero_serie,
            'marca' => $densimetro->marca,
            'modelo' => $densimetro->modelo,
            'fecha_entrada' => $densimetro->fecha_entrada->format('d/m/Y'),
            'estado' => $this->formatearEstado($densimetro->estado),
            'cliente' => $densimetro->cliente ? $densimetro->cliente->name : 'Cliente no disponible',
        ];

        // Verificar calibración si está en estado finalizado o entregado
        if ($densimetro->estado === 'finalizado' || $densimetro->estado === 'entregado') {
            // Añadir información de calibración
            $estado['calibrado'] = $densimetro->calibrado;

            // Añadir fecha próxima de calibración si está calibrado
            if ($densimetro->calibrado && $densimetro->fecha_proxima_calibracion) {
                $fecha_proxima = $densimetro->fecha_proxima_calibracion;
                // Asegurarse de que la fecha sea un objeto DateTime
                if (!($fecha_proxima instanceof \DateTime)) {
                    $fecha_proxima = \Carbon\Carbon::parse($fecha_proxima);
                }
                $estado['fecha_proxima_calibracion'] = $fecha_proxima->format('d/m/Y');
            }
        }

        $date = Carbon::now()->format('d-m-Y_H-i-s');
        $fileName = "estado_densimetro_{$densimetro->referencia_reparacion}_{$date}.pdf";

        $data = [
            'estado' => $estado,
            'title' => 'Estado de Densímetro',
            'date' => Carbon::now()->format('d/m/Y H:i:s')
        ];

        $pdf = PDF::loadView('reports.estado_pdf', $data);

        return $pdf->download($fileName);
    }

    /**
     * Generar PDF con la información de calibración del densímetro.
     *
     * @param  string  $numero_serie
     * @param  string  $marca
     * @param  string  $modelo
     * @return \Illuminate\Http\Response
     */
    public function generarCalibracionPDF($numero_serie, $marca, $modelo)
    {
        // Buscar el densímetro por número de serie, marca y modelo
        $densimetro = Densimetro::where('numero_serie', $numero_serie)
                              ->where('marca', $marca)
                              ->where('modelo', $modelo)
                              ->whereIn('estado', ['finalizado', 'entregado'])
                              ->orderBy('fecha_finalizacion', 'desc')
                              ->firstOrFail();

        // Verificar estado de calibración
        $calibradoActual = false;
        $fechaProxima = null;

        if ($densimetro->calibrado) {
            // Verificar si la fecha de calibración ha expirado
            if ($densimetro->fecha_proxima_calibracion) {
                $fechaProxima = \Carbon\Carbon::parse($densimetro->fecha_proxima_calibracion);
                $hoy = \Carbon\Carbon::today();

                if ($fechaProxima >= $hoy) {
                    $calibradoActual = true;
                }
            }
        }

        // Preparar los datos para el PDF
        $calibracion = [
            'numero_serie' => $densimetro->numero_serie,
            'marca' => $densimetro->marca,
            'modelo' => $densimetro->modelo,
            'ultima_revision' => $densimetro->fecha_finalizacion ? $densimetro->fecha_finalizacion->format('d/m/Y') : null,
            'estado_calibracion' => $calibradoActual,
            'proxima_calibracion' => $fechaProxima ? $fechaProxima->format('d/m/Y') : null,
        ];

        $date = Carbon::now()->format('d-m-Y_H-i-s');
        $fileName = "calibracion_densimetro_{$densimetro->numero_serie}_{$date}.pdf";

        $data = [
            'calibracion' => $calibracion,
            'title' => 'Estado de Calibración de Densímetro',
            'date' => Carbon::now()->format('d/m/Y H:i:s')
        ];

        $pdf = PDF::loadView('reports.calibracion_pdf', $data);

        return $pdf->download($fileName);
    }
}
