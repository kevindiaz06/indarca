<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class ValidateJwtToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // Verificar si el token está presente
            if (!$request->bearerToken()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Token no proporcionado'
                ], 401);
            }

            // Verificar si el usuario está autenticado con el token
            if (!Auth::guard('sanctum')->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Token inválido o expirado'
                ], 401);
            }

            $user = Auth::guard('sanctum')->user();

            // Validación adicional: verificar estado del usuario
            if (!$user->is_active) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario inactivo'
                ], 403);
            }

            // Verificar la IP desde la que se hace la solicitud
            if ($user->last_ip && $user->last_ip !== $request->ip()) {
                // Registrar intento sospechoso
                Log::warning('Intento de acceso con IP diferente', [
                    'user_id' => $user->id,
                    'last_ip' => $user->last_ip,
                    'current_ip' => $request->ip()
                ]);

                // En producción, podrías decidir si bloquear o permitir
                // Si quieres bloquear:
                // return response()->json(['success' => false, 'message' => 'Acceso desde IP no reconocida'], 403);
            }

            // Actualizar la última IP y actividad del usuario
            $user->last_ip = $request->ip();
            $user->last_activity = now();
            $user->save();

            return $next($request);

        } catch (\Exception $e) {
            Log::error('Error de autenticación JWT: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error de autenticación'
            ], 500);
        }
    }
}
