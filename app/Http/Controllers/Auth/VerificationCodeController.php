<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use App\Models\PendingVerification;
use App\Notifications\VerifyEmailWithCode;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Notification;

class VerificationCodeController extends Controller
{
    /**
     * Verifica el código ingresado por el usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string|size:6',
        ]);

        // Buscar en las verificaciones pendientes
        $pendingVerification = PendingVerification::where('email', $request->email)
            ->where('code', $request->code)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$pendingVerification) {
            return back()->withErrors(['code' => 'El código es inválido o ha expirado.']);
        }

        try {
            // Crear el usuario verificado
            $user = User::create([
                'name' => $pendingVerification->name,
                'email' => $pendingVerification->email,
                'password' => $pendingVerification->password, // Ya está hasheado
                'role' => 'cliente',
                'is_admin' => false,
                'email_verified_at' => Carbon::now() // Marcar como verificado inmediatamente
            ]);

            // Eliminar la verificación pendiente
            $pendingVerification->delete();

            // Iniciar sesión automáticamente
            Auth::login($user);

            return redirect()->route('home')->with('status', 'Tu correo electrónico ha sido verificado correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ocurrió un error durante la verificación. Por favor, inténtelo de nuevo.']);
        }
    }

    /**
     * Reenvía el código de verificación.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Buscar en las verificaciones pendientes
        $pendingVerification = PendingVerification::where('email', $request->email)->first();

        if (!$pendingVerification) {
            return back()->withErrors(['email' => 'No se encontró un registro pendiente para este correo electrónico.']);
        }

        try {
            // Generar nuevo código aleatorio de 6 dígitos
            $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

            // Actualizar el código y la fecha de expiración
            $pendingVerification->code = $code;
            $pendingVerification->expires_at = Carbon::now()->addMinutes(60);
            $pendingVerification->save();

            // Enviar el código por correo electrónico usando Notification facade
            Notification::route('mail', [
                $pendingVerification->email => $pendingVerification->name ?? 'Usuario',
            ])->notify(new VerifyEmailWithCode($code));

            return back()->with('status', 'Se ha enviado un nuevo código de verificación a tu correo electrónico.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ocurrió un error al reenviar el código. Por favor, inténtelo de nuevo.']);
        }
    }
}
