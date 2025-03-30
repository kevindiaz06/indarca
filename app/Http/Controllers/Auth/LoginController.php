<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Procesa la respuesta después de que el usuario es autenticado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        session()->flash('login_success', true);

        // Redirigir a administradores y clientes al panel de administración
        if ($user->role === 'admin' || $user->role === 'cliente' || $user->role === 'trabajador') {
            return redirect()->route('admin.dashboard');
        }

        // Para otros roles, redirigir a la página por defecto
        return redirect()->intended($this->redirectTo);
    }
}
