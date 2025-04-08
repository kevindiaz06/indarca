<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService
{
    /**
     * Obtener un valor del caché o almacenarlo si no existe
     *
     * @param string $key
     * @param int $ttl
     * @param callable $callback
     * @return mixed
     */
    public static function remember(string $key, int $ttl, callable $callback)
    {
        return Cache::remember($key, $ttl, $callback);
    }

    /**
     * Obtener un valor del caché o almacenarlo para siempre si no existe
     *
     * @param string $key
     * @param callable $callback
     * @return mixed
     */
    public static function rememberForever(string $key, callable $callback)
    {
        return Cache::rememberForever($key, $callback);
    }

    /**
     * Eliminar un valor del caché
     *
     * @param string $key
     * @return bool
     */
    public static function forget(string $key)
    {
        return Cache::forget($key);
    }

    /**
     * Almacenar un valor en caché con un tiempo de expiración
     *
     * @param string $key
     * @param mixed $value
     * @param int $ttl
     * @return bool
     */
    public static function put(string $key, $value, int $ttl)
    {
        return Cache::put($key, $value, $ttl);
    }

    /**
     * Verificar si una clave existe en el caché
     *
     * @param string $key
     * @return bool
     */
    public static function has(string $key)
    {
        return Cache::has($key);
    }

    /**
     * Generar una clave de caché única basada en los parámetros
     *
     * @param string $prefix
     * @param array $params
     * @return string
     */
    public static function generateKey(string $prefix, array $params = [])
    {
        $paramString = !empty($params) ? '_' . md5(json_encode($params)) : '';
        return $prefix . $paramString;
    }
}
