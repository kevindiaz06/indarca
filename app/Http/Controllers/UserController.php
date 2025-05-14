<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Densimetro;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordChangedMail;

class UserController extends Controller
{
    /**
     * Constructor para aplicar middleware de autenticación y roles
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,trabajador');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        // Verificar si la solicitud viene del panel de administración
        if (request()->is('admin*')) {
            return view('admin.usuarios.index', compact('users'));
        }

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Verificar si la solicitud viene del panel de administración
        if (request()->is('admin*')) {
            return view('admin.usuarios.create');
        }

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:cliente,trabajador,admin',
        ]);

        // Crear usuario con email verificado automáticamente
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'is_admin' => $request->role === 'admin' ? true : false,
            'email_verified_at' => now(), // Verificar el correo automáticamente
        ]);

        // Enviar credenciales por correo
        try {
            Mail::to($user->email)->send(new \App\Mail\WelcomeMail(
                $user->name,
                $user->email,
                $request->password // Contraseña sin encriptar para el correo
            ));
        } catch (\Exception $e) {
            // Registrar el error pero continuar con la creación
            \Log::error('Error al enviar correo de bienvenida: ' . $e->getMessage());
        }

        // Verificar si la solicitud viene del panel de administración
        if (request()->is('admin*')) {
            return redirect()->route('admin.usuarios')
                ->with('success', 'Usuario creado exitosamente y credenciales enviadas por correo.');
        }

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado exitosamente y credenciales enviadas por correo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        // Verificar si la solicitud viene del panel de administración
        if (request()->is('admin*')) {
            return view('admin.usuarios.show', compact('user'));
        }

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        // Verificar si la solicitud viene del panel de administración
        if (request()->is('admin*')) {
            return view('admin.usuarios.edit', compact('user'));
        }

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $currentUser = Auth::user();

        // Restricciones para trabajadores
        if ($currentUser->role === 'trabajador') {
            // Trabajadores no pueden cambiar roles
            if ($request->role != $user->role) {
                return redirect()->back()
                    ->with('error', 'No tienes permisos para cambiar el rol de los usuarios.');
            }

            // Trabajadores no pueden editar a administradores
            if ($user->role === 'admin') {
                return redirect()->back()
                    ->with('error', 'No tienes permisos para editar a un administrador.');
            }

            // Trabajadores no pueden editar a otros trabajadores
            if ($user->role === 'trabajador' && $user->id !== $currentUser->id) {
                return redirect()->back()
                    ->with('error', 'No tienes permisos para editar a otro trabajador.');
            }
        }

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:cliente,trabajador,admin',
        ];

        // Solo los administradores pueden cambiar roles
        if ($currentUser->role === 'admin') {
            $rules['role'] = 'required|in:cliente,trabajador,admin';
        }

        if ($request->filled('password')) {
            $rules['password'] = 'string|min:8|confirmed';
        }

        $request->validate($rules);

        $user->name = $request->name;
        $user->email = $request->email;

        // Solo los administradores pueden cambiar roles
        if ($currentUser->role === 'admin') {
            $user->role = $request->role;
            $user->is_admin = $request->role === 'admin' ? true : false;
        }

        // Variable para controlar si se cambió la contraseña
        $passwordChanged = false;
        $newPassword = null;

        if ($request->filled('password')) {
            $passwordChanged = true;
            $newPassword = $request->password;
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Enviar correo si se cambió la contraseña de un cliente
        if ($passwordChanged && $user->role === 'cliente' && $newPassword) {
            try {
                Mail::to($user->email)->send(new PasswordChangedMail(
                    $user->name,
                    $user->email,
                    $newPassword
                ));
            } catch (\Exception $e) {
                // Registrar el error pero continuar con la actualización
                \Log::error('Error al enviar correo de cambio de contraseña: ' . $e->getMessage());
            }
        }

        // Verificar si la solicitud viene del panel de administración
        if (request()->is('admin*')) {
            return redirect()->route('admin.usuarios')
                ->with('success', 'Usuario actualizado exitosamente.');
        }

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Evitar eliminar el propio usuario
        if (Auth::id() == $id) {
            if (request()->is('admin*')) {
                return redirect()->route('admin.usuarios')
                    ->with('error', 'No puedes eliminar tu propio usuario.');
            }

            return redirect()->route('users.index')
                ->with('error', 'No puedes eliminar tu propio usuario.');
        }

        $user = User::findOrFail($id);
        $currentUser = Auth::user();

        // Restricciones para trabajadores
        if ($currentUser->role === 'trabajador') {
            // Trabajadores no pueden eliminar administradores
            if ($user->role === 'admin') {
                if (request()->is('admin*')) {
                    return redirect()->route('admin.usuarios')
                        ->with('error', 'No tienes permisos para eliminar a un administrador.');
                }

                return redirect()->route('users.index')
                    ->with('error', 'No tienes permisos para eliminar a un administrador.');
            }

            // Trabajadores no pueden eliminar a otros trabajadores
            if ($user->role === 'trabajador') {
                if (request()->is('admin*')) {
                    return redirect()->route('admin.usuarios')
                        ->with('error', 'No tienes permisos para eliminar a otro trabajador.');
                }

                return redirect()->route('users.index')
                    ->with('error', 'No tienes permisos para eliminar a otro trabajador.');
            }
        }

        $user->delete();

        if (request()->is('admin*')) {
            return redirect()->route('admin.usuarios')
                ->with('success', 'Usuario eliminado exitosamente.');
        }

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado exitosamente.');
    }
}
