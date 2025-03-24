<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    /**
     * Verifica si el usuario es administrador.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Verifica si el usuario es trabajador.
     *
     * @return bool
     */
    public function isTrabajador()
    {
        return $this->role === 'trabajador';
    }

    /**
     * Verifica si el usuario es web (cliente).
     *
     * @return bool
     */
    public function isWeb()
    {
        return $this->role === 'web';
    }

    /**
     * Verifica si el usuario tiene acceso de personal (admin o trabajador).
     *
     * @return bool
     */
    public function isStaff()
    {
        return $this->role === 'admin' || $this->role === 'trabajador';
    }
}
