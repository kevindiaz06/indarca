#!/usr/bin/env bash
set -e

cd /var/www/html

# Copiar archivo .env.docker a .env
cp .env.docker .env

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

echo "Esperando a que la base de datos esté lista..."
while ! pg_isready -h $POSTGRES_HOST -p 5432 -U $POSTGRES_USER
do
  echo "Esperando a PostgreSQL..."
  sleep 2
done

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
