<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // if (config('app.env') === 'local') {
        //    $this->app['request']->server->set('HTTPS', true);
        // }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Compartir variables de estadísticas con todas las vistas
        View::composer('*', function ($view) {
            // Obtener conteo de usuarios con rol 'web' (clientes)
            $totalClientes = User::where('role', 'cliente')->count();

            // Obtener conteo de trabajadores (suma de 'admin' y 'trabajador')
            $totalTrabajadores = User::whereIn('role', ['admin', 'trabajador'])->count();

            $view->with(compact('totalClientes', 'totalTrabajadores'));
        });

        if (config('app.debug')) {
            DB::listen(function ($query) {
                Log::channel('performance')->info(
                    'Query executed',
                    [
                        'sql' => $query->sql,
                        'bindings' => $query->bindings,
                        'time' => $query->time,
                    ]
                );
            });
        }

        // Monitoreo de memoria
        if (config('app.debug')) {
            register_shutdown_function(function () {
                $memoryUsage = memory_get_peak_usage(true);
                Log::channel('performance')->info(
                    'Memory Usage',
                    [
                        'peak_memory' => $memoryUsage,
                        'peak_memory_mb' => round($memoryUsage / 1024 / 1024, 2),
                    ]
                );
            });
        }
    }
}
