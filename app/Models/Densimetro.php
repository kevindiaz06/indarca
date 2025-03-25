<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Densimetro extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cliente_id',
        'numero_serie',
        'marca',
        'modelo',
        'fecha_entrada',
        'referencia_reparacion',
        'estado',
        'observaciones',
    ];

    /**
     * Los atributos que deben convertirse a tipos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_entrada' => 'date',
    ];

    /**
     * Obtiene el cliente (usuario) al que pertenece el densímetro.
     */
    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    /**
     * Genera una referencia única para el densímetro.
     *
     * @return string
     */
    public static function generarReferencia()
    {
        $prefix = 'REF-';
        $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random = '';

        do {
            $random = '';
            for ($i = 0; $i < 8; $i++) {
                $random .= $chars[rand(0, strlen($chars) - 1)];
            }
            $referencia = $prefix . $random;
        } while (static::where('referencia_reparacion', $referencia)->exists());

        return $referencia;
    }
}
