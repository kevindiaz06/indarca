<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:cliente');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.edit')
            ->with('success', 'Perfil actualizado exitosamente.');
    }

    /**
     * Eliminar el perfil del usuario autenticado.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();

        // Validar que el correo electrónico coincida
        $request->validate([
            'confirm_email' => ['required', 'email', 'in:' . $user->email],
        ]);

        $user = Auth::user();

        // Verificar que el usuario sea un cliente
        if ($user->role !== 'web') {
            return redirect()->route('inicio')
                ->with('error', 'No tienes permisos para realizar esta acción.');
        }


        // Eliminar el usuario
        $user->delete();

        // Cerrar sesión
        Auth::logout();

        // Invalidar la sesión y regenerar el token CSRF
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('inicio')
            ->with('success', 'Tu cuenta ha sido eliminada exitosamente.');
    }
}
