<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    /**
     * Tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'empresas';

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'logo',
        'tipo_cliente',
        'destacado',
        'activo',
    ];

    /**
     * Los atributos que deben convertirse a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'destacado' => 'boolean',
        'activo' => 'boolean',
    ];

    /**
     * Los atributos que tienen valores por defecto.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'activo' => false,
    ];
}
