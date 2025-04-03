<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        // Compartir variables de estadísticas con todas las vistas
        View::composer('*', function ($view) {
            // Obtener conteo de usuarios con rol 'web' (clientes)
            $totalClientes = User::where('role', 'cliente')->count();

            // Obtener conteo de trabajadores (suma de 'admin' y 'trabajador')
            $totalTrabajadores = User::whereIn('role', ['admin', 'trabajador'])->count();

            $view->with(compact('totalClientes', 'totalTrabajadores'));
        });

        if (env('APP_ENV') == 'production') {
            $url->forceScheme('https');
        }
    }
}
