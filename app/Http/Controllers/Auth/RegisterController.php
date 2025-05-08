<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\VerificationCode;
use App\Models\PendingVerification;
use App\Notifications\VerifyEmailWithCode;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email', 'unique:pending_verifications,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'cliente',
            'is_admin' => false,
        ]);
    }

    /**
     * Sobrescribe el método register para implementar la verificación por código
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        try {
            // Generar código aleatorio de 6 dígitos
            $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

            // Almacenar los datos del usuario y el código en pending_verifications
            PendingVerification::create([
                'email' => $request->email,
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'code' => $code,
                'expires_at' => Carbon::now()->addMinutes(60), // El código expira en 60 minutos
            ]);

            // Intentamos enviar el correo, pero continuamos incluso si falla
            try {
                // Primero intentamos con el driver configurado en .env
                Mail::to($request->email)
                    ->send(new VerificationCodeMail(
                        $request->name ?? 'Usuario',
                        $code,
                        ''
                    ));

                \Log::info("Correo de verificación enviado a: " . $request->email);
            } catch (\Exception $e) {
                // Si falla el envío, intentamos con el driver log como último recurso
                \Log::warning('Error al enviar correo de verificación con driver principal: ' . $e->getMessage());

                try {
                    // Guardar la configuración original
                    $originalMailer = config('mail.default');

                    // Cambiar temporalmente al driver log
                    config(['mail.default' => 'log']);

                    // Intentar enviar nuevamente con el driver log
                    Mail::to($request->email)
                        ->send(new VerificationCodeMail(
                            $request->name ?? 'Usuario',
                            $code,
                            ''
                        ));

                    \Log::info("Correo de verificación registrado en logs para: " . $request->email);

                    // Restablecer la configuración original
                    config(['mail.default' => $originalMailer]);
                } catch (\Exception $logException) {
                    \Log::error('Error crítico al intentar registrar correo en logs: ' . $logException->getMessage());
                }
            }

            // Esto asegura que se registre el código en los logs para que puedas usarlo si no llega por correo
            \Log::info("Código de verificación para {$request->email}: {$code}");

            // Redirigir a la página de verificación siempre, incluso si el correo falla
            return redirect()->route('verification.notice', ['email' => $request->email]);

        } catch (\Exception $e) {
            // En caso de error en el proceso principal (no en el correo), registramos error
            \Log::error('Error grave en el proceso de registro: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Ocurrió un error durante el registro. Por favor, inténtelo de nuevo.']);
        }
    }

    /**
     * Muestra la página para ingresar el código de verificación
     */
    public function showVerificationNotice(Request $request)
    {
        // Depuración: registrar que se llegó a este método
        \Log::info('Acceso a showVerificationNotice con email: ' . ($request->email ?? 'no proporcionado'));

        // Asegurar que hay un email disponible
        $email = $request->email;
        if (empty($email)) {
            return redirect()->route('register')->withErrors(['error' => 'No se proporcionó un email para la verificación.']);
        }

        // Verificar si existe una verificación pendiente para este email
        $pendingVerification = PendingVerification::where('email', $email)->first();
        if (!$pendingVerification) {
            return redirect()->route('register')->withErrors(['error' => 'No se encontró verificación pendiente para este email.']);
        }

        return view('auth.verify-code', ['email' => $email]);
    }
}
