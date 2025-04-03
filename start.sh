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
if [ ! -z "$POSTGRES_HOST" ]; then
  while ! pg_isready -h $POSTGRES_HOST -p 5432 -U $POSTGRES_USER
  do
    echo "Esperando a PostgreSQL..."
    sleep 2
  done
fi

echo "Ejecutando migraciones..."
php artisan migrate --force

# Configurar permisos
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Modificar nginx para usar TCP en lugar de socket
sed -i 's|fastcgi_pass unix:/var/run/php-fpm.sock;|fastcgi_pass 127.0.0.1:9000;|' /etc/nginx/conf.d/default.conf

# Modificar PHP-FPM para usar TCP
sed -i 's|listen = /var/run/php-fpm.sock|listen = 127.0.0.1:9000|' /usr/local/etc/php-fpm.d/www.conf

# Verificar configuraciones
echo "Configuración de NGINX:"
cat /etc/nginx/conf.d/default.conf

echo "Configuración de PHP-FPM:"
cat /usr/local/etc/php-fpm.d/www.conf

# Iniciar PHP-FPM
php-fpm -D

# Verificar que PHP-FPM está en ejecución
ps aux | grep php-fpm

# Iniciar NGINX
nginx -g 'daemon off;'
