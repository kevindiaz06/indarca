<?php

namespace App\Http\Controllers;

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
            'codigo' => 'required|string|max:50',
        ]);

        // Aquí iría la lógica para consultar el estado del densímetro según el código
        // Por ahora, simulamos una respuesta
        $codigo = $request->input('codigo');

        // Datos de ejemplo (en un caso real, esto vendría de la base de datos)
        $estado = [
            'codigo' => $codigo,
            'modelo' => 'Densímetro X-2000',
            'estado' => 'Activo',
            'ultima_revision' => '2023-10-15',
            'proxima_revision' => '2024-04-15',
            'cliente' => 'Constructora ABC',
            'observaciones' => 'Funcionamiento óptimo en última revisión'
        ];

        return view('estado', ['estado' => $estado]);
    }
}
