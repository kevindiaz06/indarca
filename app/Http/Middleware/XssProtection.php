<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class XssProtection
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
        $input = $request->all();
        array_walk_recursive($input, function(&$input) {
            $input = $this->clean($input);
        });
        $request->merge($input);

        $response = $next($request);

        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');

        return $response;
    }

    /**
     * Limpia el texto de posibles scripts maliciosos
     *
     * @param  string  $input
     * @return string
     */
    protected function clean($input)
    {
        if (is_string($input)) {
            // Eliminar etiquetas de script
            $input = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $input);

            // Eliminar atributos on* (eventos)
            $input = preg_replace('/\bon\w+=\s*["\'][^"\']*["\']/', '', $input);

            // Escapar caracteres especiales
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        }

        return $input;
    }
}
