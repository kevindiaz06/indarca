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
        // Validar el correo electrónico
        $request->validate(['email' => 'required|email']);

        // Buscar el usuario por email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => trans('passwords.user')]);
        }

        // Generar una contraseña aleatoria
        $newPassword = Str::random(10);

        // Actualizar la contraseña del usuario
        $user->password = Hash::make($newPassword);
        $user->save();

        // Enviar la nueva contraseña por correo
        try {
            Mail::to($user->email)->send(new ResetPasswordMail($user->name, $newPassword));

            return back()->with('status', 'Se ha enviado una nueva contraseña a su correo electrónico.');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'No se pudo enviar el correo con la nueva contraseña.']);
        }
    }
}
