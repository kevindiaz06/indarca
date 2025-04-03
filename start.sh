#!/usr/bin/env bash
# exit on error
set -o errexit

cd /var/www/html

echo "Verificando variables de entorno..."
echo "DATABASE_URL definida: $([ ! -z "$DATABASE_URL" ] && echo 'SÍ' || echo 'NO')"
echo "DB_CONNECTION: $DB_CONNECTION"

# Crear archivo .env a partir de .env.example
echo "Creando archivo .env..."
cp .env.example .env

# Actualizar valores en .env
sed -i "s|APP_ENV=local|APP_ENV=production|g" .env
sed -i "s|APP_DEBUG=true|APP_DEBUG=false|g" .env
sed -i "s|APP_URL=http://localhost|APP_URL=https://indarca.onrender.com|g" .env
sed -i "s|DB_CONNECTION=.*|DB_CONNECTION=$DB_CONNECTION|g" .env

# Agregar DATABASE_URL explícitamente
if [ ! -z "$DATABASE_URL" ]; then
    echo "DATABASE_URL=$DATABASE_URL" >> .env
fi

echo "Contenido del archivo .env:"
cat .env

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
