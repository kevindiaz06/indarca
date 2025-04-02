<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\PendingVerification;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();

        // Si el correo no está verificado, verificarlo automáticamente
        if ($user->email_verified_at === null) {
            // Verificar automáticamente al usuario
            $user->email_verified_at = Carbon::now();
            $user->save();

            // Continuar con la solicitud ya que el usuario ahora está verificado
            return $next($request);
        }

        return $next($request);
    }
}
