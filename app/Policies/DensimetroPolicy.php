<?php

namespace App\Policies;

use App\Models\Densimetro;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DensimetroPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'trabajador']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Densimetro  $densimetro
     * @return bool
     */
    public function view(User $user, Densimetro $densimetro): bool
    {
        // Los admin y trabajadores pueden ver cualquier densímetro
        if (in_array($user->role, ['admin', 'trabajador'])) {
            return true;
        }

        // Los clientes solo pueden ver sus propios densímetros
        return $user->role === 'cliente' && $densimetro->cliente_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'trabajador']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Densimetro  $densimetro
     * @return bool
     */
    public function update(User $user, Densimetro $densimetro): bool
    {
        return in_array($user->role, ['admin', 'trabajador']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Densimetro  $densimetro
     * @return bool
     */
    public function delete(User $user, Densimetro $densimetro): bool
    {
        // Solo los administradores pueden eliminar densímetros
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can generate a PDF for the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Densimetro  $densimetro
     * @return bool
     */
    public function generatePDF(User $user, Densimetro $densimetro): bool
    {
        // Admin y trabajadores pueden generar PDF de cualquier densímetro
        if (in_array($user->role, ['admin', 'trabajador'])) {
            return true;
        }

        // Los clientes solo pueden generar PDF de sus propios densímetros
        return $user->role === 'cliente' && $densimetro->cliente_id === $user->id;
    }
}
