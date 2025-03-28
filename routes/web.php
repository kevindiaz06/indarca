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
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\Auth\CustomResetPasswordController;
use App\Http\Controllers\DensimetroController;
use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClienteController;

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

/*
|--------------------------------------------------------------------------
| Credenciales de Prueba
|--------------------------------------------------------------------------
|
| Administrador:
| Email: admin@indarca.com
| Contraseña: admin123
|
| Trabajador:
| Email: trabajador@indarca.com
| Contraseña: trabajador123
|
| Cliente:
| Email: cliente@example.com
| Contraseña: cliente123
|
*/

// Rutas principales del sitio público - Vistas deben extender de 'layout.blade.php'
Route::get('/', [InicioController::class, 'index'])->name('inicio');
Route::get('/arquitectura', [ArquitecturaController::class, 'index'])->name('arquitectura');
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::get('/densimetros', [DensimetrosController::class, 'index'])->name('densimetros');
Route::get('/noticias', [NoticiasController::class, 'index'])->name('noticias');
Route::get('/sobre-nosotros', [SobreNosotrosController::class, 'index'])->name('sobreNosotros');

// Rutas para consulta de estado de densímetros - Vistas deben extender de 'layout.blade.php'
Route::get('/estado', [EstadoController::class, 'index'])->name('estado');
Route::post('/estado/consultar', [EstadoController::class, 'consultar'])->name('estado.consultar');

// Rutas para formularios - Formularios del sitio público
Route::post('/contacto/enviar', [ContactoFormularioController::class, 'enviar'])->name('contacto.enviar');

// Rutas de autenticación - Vistas deben extender de 'layouts.app'
// Personalizar la ruta de reset de contraseña
Route::get('password/reset', [CustomResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [CustomResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Rutas para verificación de correo electrónico
Route::get('/verification/notice', [RegisterController::class, 'showVerificationNotice'])->name('verification.notice');
Route::post('/verification/verify', [VerificationCodeController::class, 'verify'])->name('verification.verify');
Route::post('/verification/resend', [VerificationCodeController::class, 'resend'])->name('verification.resend');
// Mantener las demás rutas de autenticación
Auth::routes(['reset' => false]);
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas para gestión de usuarios - Definir si deben extender de 'layouts.app' o 'admin.layouts.admin'
// según donde se muestren estas vistas
Route::resource('users', UserController::class);
Route::resource('empresas', EmpresaController::class);

// Rutas para el perfil del usuario
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para clientes
Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/historial-incidencias', [ClienteController::class, 'historialIncidencias'])->name('usuario.historial-incidencias');
});

// Panel de Administración (protegido por middleware)
// IMPORTANTE: Todas las vistas de esta sección deben extender de 'admin.layouts.admin'
Route::prefix('admin')->middleware(['auth', 'role:admin,trabajador'])->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // Gestión de usuarios
    Route::get('/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios');
    Route::get('/usuarios/crear', [UserController::class, 'create'])->name('admin.usuarios.crear');
    Route::post('/usuarios', [UserController::class, 'store'])->name('admin.usuarios.store');
    Route::get('/usuarios/{user}/editar', [UserController::class, 'edit'])->name('admin.usuarios.editar');
    Route::put('/usuarios/{user}', [UserController::class, 'update'])->name('admin.usuarios.update');
    Route::delete('/usuarios/{user}', [UserController::class, 'destroy'])->name('admin.usuarios.destroy');

    // Gestión de empresas
    Route::get('/empresas', [AdminController::class, 'empresas'])->name('admin.empresas');
    Route::get('/empresas/crear', [EmpresaController::class, 'create'])->name('admin.empresas.crear');
    Route::post('/empresas', [EmpresaController::class, 'store'])->name('admin.empresas.store');
    Route::get('/empresas/{empresa}/editar', [EmpresaController::class, 'edit'])->name('admin.empresas.editar');
    Route::put('/empresas/{empresa}', [EmpresaController::class, 'update'])->name('admin.empresas.update');
    Route::delete('/empresas/{empresa}', [EmpresaController::class, 'destroy'])->name('admin.empresas.destroy');

    // Gestión de densímetros
    Route::get('/densimetros', [DensimetroController::class, 'index'])->name('admin.densimetros.index');
    Route::get('/densimetros/crear', [DensimetroController::class, 'create'])->name('admin.densimetros.create');
    Route::post('/densimetros', [DensimetroController::class, 'store'])->name('admin.densimetros.store');
    Route::get('/densimetros/{densimetro}', [DensimetroController::class, 'show'])->name('admin.densimetros.show');
    Route::get('/densimetros/{densimetro}/editar', [DensimetroController::class, 'edit'])->name('admin.densimetros.edit');
    Route::put('/densimetros/{densimetro}', [DensimetroController::class, 'update'])->name('admin.densimetros.update');
    Route::delete('/densimetros/{densimetro}', [DensimetroController::class, 'destroy'])->name('admin.densimetros.destroy');
});
