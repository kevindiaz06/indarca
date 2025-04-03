#!/usr/bin/env bash
set -e

cd /var/www/html

echo "Verificando variables de entorno DB_..."
env | grep "^DB_"

echo "Instalando dependencias de Composer..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "Generando clave de la aplicación..."
php artisan key:generate --force

echo "Cacheando configuración..."
php artisan config:cache

echo "Cacheando rutas..."
php artisan route:cache

echo "Cacheando vistas..."
php artisan view:cache

echo "Verificando conexión a PostgreSQL..."
if pg_isready -h "$DB_HOST" -p "$DB_PORT" -U "$DB_USERNAME"; then
    echo "Conexión exitosa a PostgreSQL"
else
    echo "Error al conectar a PostgreSQL. Detalles:"
    echo "Host: $DB_HOST"
    echo "Puerto: $DB_PORT"
    echo "Usuario: $DB_USERNAME"
    echo "Base de datos: $DB_DATABASE"

    # Intentar con valores predeterminados si las variables no están configuradas
    if [ -z "$DB_HOST" ]; then
        echo "DB_HOST no está definido. Intentando con localhost..."
        export DB_HOST=localhost
    fi

    if [ -z "$DB_PORT" ]; then
        echo "DB_PORT no está definido. Intentando con 5432..."
        export DB_PORT=5432
    fi

    # Esperar a que PostgreSQL esté disponible
    echo "Esperando a que PostgreSQL esté disponible..."
    for i in {1..30}; do
        if pg_isready -h "$DB_HOST" -p "$DB_PORT" -U "$DB_USERNAME"; then
            echo "Conexión exitosa a PostgreSQL después de esperar"
            break
        fi
        echo "Intento $i: PostgreSQL aún no está disponible. Esperando..."
        sleep 2
    done
fi

echo "Ejecutando migraciones..."
php artisan migrate --force

# Configurar permisos
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Verificar configuraciones
echo "Configuración de NGINX:"
cat /etc/nginx/conf.d/default.conf

# Iniciar PHP-FPM
php-fpm -D

# Iniciar NGINX
exec nginx -g 'daemon off;'
