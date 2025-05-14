<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Obtener el locale de la sesión o usar el predeterminado (español)
        $locale = Session::get('locale', 'es');

        // Establecer el locale para la solicitud actual
        App::setLocale($locale);

        return $next($request);
    }
}
