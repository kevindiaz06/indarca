<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DensimetroArchivo extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'densimetro_id',
        'nombre_archivo',
        'ruta_archivo',
        'tipo_archivo',
        'extension',
        'mime_type',
        'tamano',
    ];

    /**
     * Obtiene el densímetro al que pertenece este archivo.
     */
    public function densimetro()
    {
        return $this->belongsTo(Densimetro::class);
    }
}
