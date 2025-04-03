#!/usr/bin/env bash
# exit on error
set -o errexit

cd /var/www/html

echo "Verificando variables de entorno..."
echo "DATABASE_URL definida: $([ ! -z "$DATABASE_URL" ] && echo 'SÍ' || echo 'NO')"
echo "DB_CONNECTION: $DB_CONNECTION"

echo "Instalando dependencias de Composer..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "Generando clave de la aplicación..."
php artisan key:generate --force

echo "Cacheando configuración..."
php artisan config:cache

echo "Cacheando rutas..."
php artisan route:cache

echo "Ejecutando migraciones..."
php artisan migrate --force

# Configurar permisos
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Iniciar PHP-FPM en segundo plano
php-fpm -D

# Iniciar NGINX en primer plano
exec nginx -g 'daemon off;'
