<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArquitecturaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DensimetrosController;
use App\Http\Controllers\InicioController;
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
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DensimetroArchivoController;
use App\Http\Controllers\PoliticasPrivacidadController;
use App\Http\Controllers\LanguageController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
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
Route::get('/sobre-nosotros', [SobreNosotrosController::class, 'index'])->name('sobreNosotros');
Route::get('/politicas-privacidad', [PoliticasPrivacidadController::class, 'index'])->name('politicas.privacidad');

// Rutas para consulta de estado de densímetros - Vistas deben extender de 'layout.blade.php'
Route::get('/estado', [EstadoController::class, 'index'])->name('estado');
Route::post('/estado/consultar', [EstadoController::class, 'consultar'])->name('estado.consultar');
Route::post('/estado/calibracion', [EstadoController::class, 'consultarCalibracion'])->name('calibracion.consultar');
Route::get('/estado/pdf/{referencia}', [EstadoController::class, 'generarPDF'])->name('estado.pdf');
Route::get('/calibracion/pdf/{numero_serie}/{marca}/{modelo}', [EstadoController::class, 'generarCalibracionPDF'])->name('calibracion.pdf');

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
    Route::get('/historial', [ClienteController::class, 'historial'])->name('cliente.historial');
});

// Panel de Administración (protegido por middleware)
// IMPORTANTE: Todas las vistas de esta sección deben extender de 'admin.layouts.admin'
Route::prefix('admin')->middleware(['auth', 'role:admin,trabajador'])->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/refresh', [AdminController::class, 'refreshDashboardData'])->name('admin.dashboard.refresh');

    // Administración de cuenta
    Route::get('/cuenta', [AdminController::class, 'cuenta'])->name('admin.cuenta');

    // Reportes
    Route::get('/reportes/dashboard-pdf', [ReportController::class, 'generateDashboardPDF'])->name('admin.reportes.dashboard.pdf');
    Route::get('/reportes/usuarios-pdf', [ReportController::class, 'generateUsersPDF'])->name('admin.reportes.usuarios.pdf');
    Route::get('/reportes/empresas-pdf', [ReportController::class, 'generateEmpresasPDF'])->name('admin.reportes.empresas.pdf');
    Route::get('/reportes/usuarios-excel', [ReportController::class, 'generateUsersExcel'])->name('admin.reportes.usuarios.excel');
    Route::get('/reportes/empresas-excel', [ReportController::class, 'generateEmpresasExcel'])->name('admin.reportes.empresas.excel');
    Route::get('/reportes/densimetros-pdf', [ReportController::class, 'generateDensimetrosPDF'])->name('admin.reportes.densimetros.pdf');
    Route::get('/reportes/densimetros-excel', [ReportController::class, 'generateDensimetrosExcel'])->name('admin.reportes.densimetros.excel');

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
    Route::get('densimetros/{id}/pdf', [DensimetroController::class, 'generatePDF'])->name('admin.densimetros.pdf');

    // Gestión de archivos de densímetros (solo admin y trabajadores)
    Route::post('/densimetros/{densimetro}/archivos', [DensimetroArchivoController::class, 'store'])->name('admin.densimetros.archivos.store');
    Route::get('/archivos/{archivo}', [DensimetroArchivoController::class, 'show'])->name('admin.densimetros.archivos.show');
    Route::delete('/archivos/{archivo}', [DensimetroArchivoController::class, 'destroy'])->name('admin.densimetros.archivos.destroy');

    // Gestión del equipo (sección Vistas)
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/team', [App\Http\Controllers\Admin\TeamController::class, 'index'])->name('admin.team.index');
        Route::get('/team/create', [App\Http\Controllers\Admin\TeamController::class, 'create'])->name('admin.team.create');
        Route::post('/team', [App\Http\Controllers\Admin\TeamController::class, 'store'])->name('admin.team.store');
        Route::get('/team/{teamMember}/edit', [App\Http\Controllers\Admin\TeamController::class, 'edit'])->name('admin.team.edit');
        Route::put('/team/{teamMember}', [App\Http\Controllers\Admin\TeamController::class, 'update'])->name('admin.team.update');
        Route::delete('/team/{teamMember}', [App\Http\Controllers\Admin\TeamController::class, 'destroy'])->name('admin.team.destroy');
        Route::post('/team/update-order', [App\Http\Controllers\Admin\TeamController::class, 'updateOrder'])->name('admin.team.update-order');
    });
});

// Ruta para cambiar el idioma
Route::get('/change-language/{locale}', [LanguageController::class, 'changeLanguage'])
    ->name('change.language');
