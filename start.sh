#!/usr/bin/env bash
set -e

cd /var/www/html

echo "Verificando variables de entorno:"
echo "DATABASE_URL: $DATABASE_URL"
echo "RENDER_EXTERNAL_URL: $RENDER_EXTERNAL_URL"

# Configurar valores predeterminados si las variables no están definidas
if [ -z "$DATABASE_URL" ]; then
  echo "ADVERTENCIA: DATABASE_URL no está definido, usando valor predeterminado"
  DATABASE_URL="postgres://usuario:mi_contraseña_secreta@db-postgresql-nyc1-12345.a.db.onrender.com:5432/mi_base_de_datos"
fi

if [ -z "$RENDER_EXTERNAL_URL" ]; then
  echo "ADVERTENCIA: RENDER_EXTERNAL_URL no está definido, usando valor predeterminado"
  RENDER_EXTERNAL_URL="https://indarca.onrender.com"
fi

# Crear archivo .env con las variables de entorno explícitas
echo "APP_NAME=INDARCA
APP_ENV=production
APP_KEY=base64:pz2/CqWrz5QNubtlx4YVOIB5MFi5MxGVlLro6kLJBDo=
APP_DEBUG=false
APP_URL=$RENDER_EXTERNAL_URL

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=pgsql
DATABASE_URL=$DATABASE_URL

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=kevindiazmota@gmail.com
MAIL_PASSWORD=xvukcmqkqvyhpttd
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=kevindiazmota@gmail.com
MAIL_FROM_NAME=\"INDARCA Servicio Técnico\"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false" > .env

echo "Verificando configuración de .env:"
cat .env

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
echo "Intentando conectar a PostgreSQL usando DATABASE_URL"

# Extraer host de DATABASE_URL
DB_HOST=$(echo $DATABASE_URL | sed -E 's/^.*@([^:]+).*$/\1/')
echo "Host de base de datos: $DB_HOST"

while ! pg_isready -h $DB_HOST
do
  echo "Esperando a PostgreSQL..."
  sleep 2
done

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
