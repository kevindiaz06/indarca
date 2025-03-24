<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArquitecturaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DensimetrosController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\SobreNosotrosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ContactoFormularioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Ruta para consulta de estado de densímetros - Definida en primer lugar
Route::get('/estado', [EstadoController::class, 'index'])->name('estado');
Route::post('/estado/consultar', [EstadoController::class, 'consultar'])->name('estado.consultar');

// Ruta para el formulario de contacto
Route::post('/contacto/enviar', [ContactoFormularioController::class, 'enviar'])->name('contacto.enviar');

// Rutas de autenticación y restablecimiento de contraseña
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas principales
Route::get('/', [InicioController::class, 'index'])->name('inicio');
Route::get('/arquitectura', [ArquitecturaController::class, 'index'])->name('arquitectura');
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::get('/densimetros', [DensimetrosController::class, 'index'])->name('densimetros');
Route::get('/noticias', [NoticiasController::class, 'index'])->name('noticias');
Route::get('/sobre-nosotros', [SobreNosotrosController::class, 'index'])->name('sobreNosotros');
