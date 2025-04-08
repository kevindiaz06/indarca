<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Densimetro;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Buscar densímetro por número de serie
Route::middleware(['api.throttle:30,1'])->get('/densimetros/buscar', function (Request $request) {
    $numeroSerie = $request->query('numero_serie');

    if (!$numeroSerie) {
        return response()->json([
            'existe' => false,
            'error' => 'Número de serie no proporcionado'
        ]);
    }

    $densimetro = Densimetro::buscarPorNumeroSerie($numeroSerie);

    if ($densimetro) {
        return response()->json([
            'existe' => true,
            'en_reparacion' => $densimetro->fecha_finalizacion === null,
            'densimetro' => [
                'id' => $densimetro->id,
                'numero_serie' => $densimetro->numero_serie,
                'marca' => $densimetro->marca,
                'modelo' => $densimetro->modelo
            ]
        ]);
    }

    return response()->json([
        'existe' => false
    ]);
});
