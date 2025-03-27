<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationCodeController extends Controller
{
    /**
     * Verifica el código ingresado por el usuario
     */
    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'code' => 'required|string|size:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No se encontró un usuario con este correo.']);
        }

        $verificationCode = VerificationCode::where('user_id', $user->id)
                                           ->where('code', $request->code)
                                           ->where('used', false)
                                           ->where('expires_at', '>', Carbon::now())
                                           ->latest()
                                           ->first();

        if (!$verificationCode) {
            return back()->withErrors(['code' => 'El código de verificación es inválido o ha expirado.']);
        }

        // Marcar el código como usado
        $verificationCode->used = true;
        $verificationCode->save();

        // Marcar el correo como verificado
        $user->email_verified_at = Carbon::now();
        $user->save();

        // Iniciar sesión
        Auth::login($user);

        return redirect()->route('home')->with('status', 'Tu cuenta ha sido verificada correctamente.');
    }

    /**
     * Reenvía el código de verificación
     */
    public function resend(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No se encontró un usuario con este correo.']);
        }

        // Verificar si ya existe un código activo
        $existingCode = VerificationCode::where('user_id', $user->id)
                                       ->where('used', false)
                                       ->where('expires_at', '>', Carbon::now())
                                       ->first();

        if ($existingCode) {
            // Si hay un código activo, reenviarlo
            $user->notify(new \App\Notifications\VerifyEmailWithCode($existingCode->code));
        } else {
            // Generar un nuevo código
            $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

            // Crear el registro de verificación
            VerificationCode::create([
                'user_id' => $user->id,
                'code' => $code,
                'expires_at' => Carbon::now()->addMinutes(60),
            ]);

            // Enviar el código por correo electrónico
            $user->notify(new \App\Notifications\VerifyEmailWithCode($code));
        }

        return back()->with('status', 'Se ha reenviado el código de verificación a tu correo electrónico.');
    }
}
