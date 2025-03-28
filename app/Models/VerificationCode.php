<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'code',
        'used',
        'expires_at',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'used' => 'boolean',
        'expires_at' => 'datetime',
    ];

    /**
     * Obtiene el usuario asociado con este código de verificación.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Verifica si el código ha expirado
     */
    public function isExpired()
    {
        return $this->expires_at->isPast();
    }
}
