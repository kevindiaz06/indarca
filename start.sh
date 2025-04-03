#!/usr/bin/env bash
set -e

cd /var/www/html

echo "Instalando dependencias de Composer..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "Cacheando configuración..."
php artisan config:cache

echo "Cacheando rutas..."
php artisan route:cache

echo "Cacheando vistas..."
php artisan view:cache

echo "Ejecutando migraciones..."
php artisan migrate --force

# Crear directorio para socket
mkdir -p /var/run
chown -R www-data:www-data /var/run

# Configurar permisos
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Iniciar PHP-FPM
php-fpm -D

# Iniciar NGINX
nginx -g 'daemon off;'
