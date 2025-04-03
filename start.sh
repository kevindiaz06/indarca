#!/usr/bin/env bash

echo "Instalando dependencias de Composer..."
composer install --no-dev --working-dir=/var/www/html

echo "Optimizando autoloader..."
composer dump-autoload --optimize --no-dev

echo "Cacheando configuración..."
php artisan config:cache

echo "Cacheando rutas..."
php artisan route:cache

echo "Cacheando vistas..."
php artisan view:cache

echo "Ejecutando migraciones..."
php artisan migrate --force

# Iniciar PHP-FPM
php-fpm

# Iniciar NGINX
nginx

# Mantener el contenedor en ejecución
tail -f /var/log/nginx/error.log
