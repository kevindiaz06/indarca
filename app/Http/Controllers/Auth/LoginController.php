<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\PendingVerification;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Personaliza el campo usado para la autenticación (opcional).
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Manejar un intento de inicio de sesión.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /**
     * Valida la solicitud de inicio de sesión.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        // Verificar si existe una verificación pendiente para este correo
        $pendingVerification = PendingVerification::where('email', $request->{$this->username()})->first();

        if ($pendingVerification) {
            // Redireccionar a la página de verificación
            throw ValidationException::withMessages([
                $this->username() => [
                    'Esta cuenta aún no ha sido verificada. Por favor, introduzca el código de verificación enviado a su correo.',
                    'verification_pending' => true,
                    'email' => $request->{$this->username()},
                ],
            ])->redirectTo(route('verification.notice', ['email' => $request->{$this->username()}]));
        }
    }

    /**
     * Procesa la respuesta después de que el usuario es autenticado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        // Verificar si el usuario no está verificado y verificarlo automáticamente
        if ($user->email_verified_at === null) {
            $user->email_verified_at = Carbon::now();
            $user->save();
        }

        session()->flash('login_success', true);

        // Redirigir según el rol del usuario
        if ($user->role === 'admin' || $user->role === 'trabajador') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'cliente') {
            return redirect()->route('cliente.historial');
        }

        // Para otros roles, redirigir a la página por defecto
        return redirect()->intended($this->redirectTo);
    }
}
