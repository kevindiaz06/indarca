<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DensimetroArchivo;
use App\Services\CacheService;
use Carbon\Carbon;

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
        'calibrado',
        'fecha_proxima_calibracion',
    ];

    /**
     * Los atributos que deben convertirse a tipos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_entrada' => 'date',
        'fecha_finalizacion' => 'date',
        'fecha_proxima_calibracion' => 'date',
        'calibrado' => 'boolean',
    ];

    /**
     * Los atributos que deben convertirse a fechas.
     * DEPRECATED: Se mantiene para compatibilidad, usar $casts preferiblemente
     *
     * @var array<string>
     */
    protected $dates = [
        'fecha_entrada',
        'fecha_finalizacion',
        'fecha_proxima_calibracion',
    ];

    /**
     * El tiempo de caché en segundos (10 minutos)
     */
    const CACHE_TTL = 600;

    /**
     * Los eventos del modelo
     */
    protected static function booted()
    {
        // Limpiar caché cuando se actualiza o crea un nuevo registro
        static::saved(function ($model) {
            CacheService::forget('densimetro_' . $model->numero_serie);
            CacheService::forget('densimetro_disponible_' . $model->numero_serie);
            CacheService::forget('densimetro_existe_' . $model->numero_serie);
        });

        // Limpiar caché cuando se elimina un registro
        static::deleted(function ($model) {
            CacheService::forget('densimetro_' . $model->numero_serie);
            CacheService::forget('densimetro_disponible_' . $model->numero_serie);
            CacheService::forget('densimetro_existe_' . $model->numero_serie);
        });
    }

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
        $cacheKey = 'densimetro_disponible_' . $numeroSerie;

        return CacheService::remember($cacheKey, self::CACHE_TTL, function () use ($numeroSerie) {
            return !static::where('numero_serie', $numeroSerie)
                          ->whereNull('fecha_finalizacion')
                          ->exists();
        });
    }

    /**
     * Busca un densímetro por su número de serie.
     *
     * @param string $numeroSerie
     * @return Densimetro|null
     */
    public static function buscarPorNumeroSerie($numeroSerie)
    {
        $cacheKey = 'densimetro_' . $numeroSerie;

        return CacheService::remember($cacheKey, self::CACHE_TTL, function () use ($numeroSerie) {
            return static::where('numero_serie', $numeroSerie)->first();
        });
    }

    /**
     * Verifica si un densímetro ya existe en la base de datos.
     *
     * @param string $numeroSerie
     * @return bool
     */
    public static function existePorNumeroSerie($numeroSerie)
    {
        $cacheKey = 'densimetro_existe_' . $numeroSerie;

        return CacheService::remember($cacheKey, self::CACHE_TTL, function () use ($numeroSerie) {
            return static::where('numero_serie', $numeroSerie)->exists();
        });
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

    /**
     * Verifica si la fecha de calibración ha pasado y actualiza el estado si es necesario.
     * Este método se puede llamar desde cualquier lugar donde se acceda a un densímetro.
     *
     * @return bool Si el densímetro está calibrado después de la verificación
     */
    public function verificarYActualizarCalibrado()
    {
        // Si el densímetro no está calibrado, no hay nada que verificar
        if (!$this->calibrado || is_null($this->fecha_proxima_calibracion)) {
            return false;
        }

        $today = Carbon::today();

        // Asegurarse de que la fecha sea un objeto Carbon
        $fecha_calibracion = $this->fecha_proxima_calibracion;
        if (!($fecha_calibracion instanceof \DateTime)) {
            $fecha_calibracion = Carbon::parse($fecha_calibracion);
        }

        // Si la fecha de calibración ha pasado, actualizar estado
        if ($fecha_calibracion < $today) {
            // Guardar el valor anterior para registro
            $estadoAnterior = $this->calibrado;

            // Actualizar a no calibrado SIN disparar eventos para evitar bucle infinito
            $this->calibrado = false;
            $this->saveQuietly(); // Usar saveQuietly() para evitar eventos

            \Log::info("Densímetro ID: {$this->id}, Número de Serie: {$this->numero_serie} - " .
                       "Calibración actualizada de " . ($estadoAnterior ? 'Calibrado' : 'No Calibrado') .
                       " a No Calibrado. Fecha expirada: " . $fecha_calibracion->format('Y-m-d'));

            // Limpiar cualquier caché relacionada con este densímetro
            CacheService::forget('densimetro_' . $this->numero_serie);
            CacheService::forget('densimetro_existe_' . $this->numero_serie);

            return false;
        }

        return true;
    }

    /**
     * Boot method simplificado para evitar bucles infinitos
     */
    protected static function boot()
    {
        parent::boot();

        // Solo registrar eventos de limpieza de caché, sin verificación automática
        // La verificación se debe hacer manualmente cuando sea necesario
    }

    /**
     * Helper para formatear fecha de entrada de forma segura
     *
     * @param string $format
     * @return string
     */
    public function formatFechaEntrada($format = 'd/m/Y')
    {
        if (!$this->fecha_entrada) {
            return '-';
        }

        if ($this->fecha_entrada instanceof \Carbon\Carbon) {
            return $this->fecha_entrada->format($format);
        }

        return \Carbon\Carbon::parse($this->fecha_entrada)->format($format);
    }

    /**
     * Helper para formatear fecha de finalización de forma segura
     *
     * @param string $format
     * @return string
     */
    public function formatFechaFinalizacion($format = 'd/m/Y')
    {
        if (!$this->fecha_finalizacion) {
            return 'Pendiente';
        }

        if ($this->fecha_finalizacion instanceof \Carbon\Carbon) {
            return $this->fecha_finalizacion->format($format);
        }

        return \Carbon\Carbon::parse($this->fecha_finalizacion)->format($format);
    }

    /**
     * Helper para formatear fecha próxima calibración de forma segura
     *
     * @param string $format
     * @return string|null
     */
    public function formatFechaProximaCalibr($format = 'd/m/Y')
    {
        if (!$this->fecha_proxima_calibracion) {
            return null;
        }

        if ($this->fecha_proxima_calibracion instanceof \Carbon\Carbon) {
            return $this->fecha_proxima_calibracion->format($format);
        }

        return \Carbon\Carbon::parse($this->fecha_proxima_calibracion)->format($format);
    }
}
