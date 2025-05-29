<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpFoundation\Response;

class HandlePasswordResetCsrf
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            return $next($request);
        } catch (TokenMismatchException $e) {
            // Si es una petición para recuperación de contraseñas
            if ($request->is('password/email')) {
                \Log::warning('Token CSRF expirado en recuperación de contraseña para IP: ' . $request->ip());

                return redirect()->route('password.request')
                    ->withErrors(['email' => 'Su sesión ha expirado. Por favor, intente nuevamente.'])
                    ->withInput($request->only('email'));
            }

            // Para otras rutas, lanzar la excepción normalmente
            throw $e;
        }
    }
}
