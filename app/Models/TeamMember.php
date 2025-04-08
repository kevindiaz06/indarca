<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'short_description',
        'image',
        'social_networks',
        'user_id',
        'active',
        'display_order'
    ];

    protected $casts = [
        'social_networks' => 'array',
        'active' => 'boolean',
        'display_order' => 'integer'
    ];

    /**
     * Obtener el usuario asociado a este miembro del equipo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope para obtener solo miembros activos
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Scope para ordenar por orden de visualización
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order');
    }
}
