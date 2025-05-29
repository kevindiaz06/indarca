<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;

class CustomResetPasswordController extends Controller
{
    /**
     * Muestra el formulario para solicitar el enlace de restablecimiento de contraseña.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Procesa la solicitud de restablecimiento de contraseña.
     * En lugar de enviar un enlace, genera una nueva contraseña aleatoria
     * y la envía por correo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        try {
            // Validar el correo electrónico
            $request->validate(['email' => 'required|email']);

            // Buscar el usuario por email
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                \Log::warning('Intento de recuperación de contraseña para email no existente: ' . $request->email);
                return back()->withErrors(['email' => trans('passwords.user')]);
            }

            // Generar una contraseña aleatoria
            $newPassword = Str::random(10);

            try {
                // Primero intentar enviar el correo ANTES de cambiar la contraseña
                Mail::to($user->email)->send(new ResetPasswordMail($user->name, $newPassword));

                \Log::info('Correo de nueva contraseña enviado exitosamente a: ' . $user->email);

                // Solo si el correo se envía exitosamente, actualizar la contraseña
                $user->password = Hash::make($newPassword);
                $user->save();

                \Log::info('Contraseña actualizada exitosamente para usuario: ' . $user->email);

                return back()->with('status', 'Se ha enviado una nueva contraseña temporal a su correo electrónico. Por su seguridad, le recomendamos cambiarla inmediatamente después de iniciar sesión.');

            } catch (\Exception $e) {
                // Error al enviar el correo
                \Log::error('Error al enviar correo de nueva contraseña para ' . $user->email . ': ' . $e->getMessage());
                \Log::error('Stack trace: ' . $e->getTraceAsString());

                return back()->withErrors(['email' => 'No se pudo enviar el correo con la nueva contraseña. Por favor, contacte al administrador.']);
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Error de validación
            return back()->withErrors($e->errors());

        } catch (\Illuminate\Session\TokenMismatchException $e) {
            // Error de token CSRF
            \Log::warning('Token CSRF expirado en recuperación de contraseña para IP: ' . $request->ip());
            return redirect()->route('password.request')
                ->withErrors(['email' => 'Su sesión ha expirado. Por favor, intente nuevamente.'])
                ->withInput($request->only('email'));

        } catch (\Exception $e) {
            // Error general
            \Log::error('Error general en recuperación de contraseña: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            return back()->withErrors(['email' => 'Ocurrió un error inesperado. Por favor, intente nuevamente.']);
        }
    }
}
