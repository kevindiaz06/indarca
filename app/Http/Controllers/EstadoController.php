<?php

namespace App\Http\Controllers;

use App\Models\Densimetro;
use Illuminate\Http\Request;

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
            return view('estado')->withErrors([
                'referencia' => 'No se encontró ningún densímetro con esa referencia.'
            ])->withInput();
        }

        // Preparar datos para mostrar en la vista
        $estado = [
            'referencia' => $densimetro->referencia_reparacion,
            'numero_serie' => $densimetro->numero_serie,
            'marca' => $densimetro->marca,
            'modelo' => $densimetro->modelo,
            'estado' => $this->formatearEstado($densimetro->estado),
            'fecha_entrada' => $densimetro->fecha_entrada->format('d/m/Y'),
            'cliente' => $densimetro->cliente->name,
            'observaciones' => $densimetro->observaciones
        ];

        return view('estado', ['estado' => $estado]);
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
}
