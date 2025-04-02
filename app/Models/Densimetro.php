<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DensimetroArchivo;

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
        'fecha_finalizacion',
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
        'fecha_finalizacion' => 'date',
    ];

    /**
     * Obtiene el cliente (usuario) al que pertenece el densímetro.
     */
    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    /**
     * Obtiene los archivos asociados a este densímetro.
     */
    public function archivos()
    {
        return $this->hasMany(DensimetroArchivo::class);
    }

    /**
     * Verifica si un densímetro está disponible para registrarse nuevamente.
     * Un densímetro está disponible solo si no tiene una reparación en curso.
     *
     * @param string $numeroSerie
     * @return bool
     */
    public static function estaDisponible($numeroSerie)
    {
        return !static::where('numero_serie', $numeroSerie)
                      ->whereNull('fecha_finalizacion')
                      ->exists();
    }

    /**
     * Busca un densímetro por su número de serie.
     *
     * @param string $numeroSerie
     * @return Densimetro|null
     */
    public static function buscarPorNumeroSerie($numeroSerie)
    {
        return static::where('numero_serie', $numeroSerie)->first();
    }

    /**
     * Verifica si un densímetro ya existe en la base de datos.
     *
     * @param string $numeroSerie
     * @return bool
     */
    public static function existePorNumeroSerie($numeroSerie)
    {
        return static::where('numero_serie', $numeroSerie)->exists();
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
