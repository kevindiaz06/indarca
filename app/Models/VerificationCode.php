<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    use HasFactory;

<<<<<<< HEAD
    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'code',
        'expires_at',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
=======
    protected $fillable = [
        'user_id',
        'code',
        'used',
        'expires_at'
    ];

    protected $casts = [
        'used' => 'boolean',
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff
        'expires_at' => 'datetime',
    ];

    /**
<<<<<<< HEAD
     * Obtiene el usuario asociado con este código de verificación.
=======
     * Relación con el usuario
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
<<<<<<< HEAD
=======

    /**
     * Verifica si el código ha expirado
     */
    public function isExpired()
    {
        return $this->expires_at->isPast();
    }
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff
}
