# Guía de Implementación - Sistema de Gestión de Densímetros INDARCA

## Índice
1. [Requisitos Previos](#1-requisitos-previos)
2. [Instalación del Sistema](#2-instalación-del-sistema)
3. [Configuración Inicial](#3-configuración-inicial)
4. [Despliegue con Docker](#4-despliegue-con-docker)
5. [Despliegue en Producción](#5-despliegue-en-producción)
6. [Mantenimiento](#6-mantenimiento)
7. [Solución de Problemas](#7-solución-de-problemas)
8. [Actualización del Sistema](#8-actualización-del-sistema)

## 1. Requisitos Previos

### 1.1 Requisitos de Servidor (Instalación Tradicional)
- Servidor web: Apache 2.4+ o Nginx 1.18+
- PHP 8.2 o superior
- MySQL 8.0+ o MariaDB 10.3+
- Extensiones PHP requeridas:
  - BCMath
  - Ctype
  - Fileinfo
  - JSON
  - Mbstring
  - OpenSSL
  - PDO
  - Tokenizer
  - XML
  - GD (para procesamiento de imágenes)
  - ZIP (para exportación y manejo de archivos)

### 1.2 Requisitos para Docker (Recomendado)
- Docker Engine 20.10+
- Docker Compose 2.0+
- Mínimo 4GB RAM disponible
- 20GB de espacio en disco

### 1.3 Herramientas Necesarias
- Composer 2.0+ (gestor de dependencias PHP)
- Node.js v18+ y npm (para compilar assets)
- Git (para control de versiones)

### 1.4 Servidor de Correo
- Un servicio SMTP configurado para envío de notificaciones
- Alternativas recomendadas:
  - Servidor SMTP local
  - Servicios como Mailgun, SendGrid, o Amazon SES

## 2. Instalación del Sistema

### 2.1 Clonar el Repositorio
```bash
git clone [URL_DEL_REPOSITORIO] indarca
cd indarca
```

### 2.2 Instalación Tradicional

#### 2.2.1 Instalar Dependencias de PHP
```bash
composer install --no-dev --optimize-autoloader
```

#### 2.2.2 Instalar Dependencias de JavaScript
```bash
npm install
```

#### 2.2.3 Compilar Assets
```bash
npm run build
```

#### 2.2.4 Configurar Variables de Entorno
1. Copie el archivo de entorno de ejemplo:
```bash
cp .env.example .env
```

2. Genere la clave de aplicación:
```bash
php artisan key:generate
```

3. Edite el archivo `.env` para configurar:
   - Conexión a base de datos
   - Servidor de correo
   - Configuración de aplicación

#### 2.2.5 Crear la Base de Datos
1. Cree una base de datos MySQL vacía
2. Configure los detalles de conexión en el archivo `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=indarca
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

#### 2.2.6 Ejecutar Migraciones y Seeders
```bash
php artisan migrate --seed
```

### 2.3 Instalación con Docker (Recomendado)

#### 2.3.1 Configurar Variables de Entorno para Docker
```bash
cp .env.example .env
```

Edite el archivo `.env` con la configuración para Docker:
```env
APP_NAME=INDARCA
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=indarca
DB_USERNAME=indarca
DB_PASSWORD=password

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@indarca.com"
MAIL_FROM_NAME="${APP_NAME}"
```

#### 2.3.2 Construir y Ejecutar Contenedores
```bash
# Construir las imágenes
docker-compose build

# Ejecutar en segundo plano
docker-compose up -d

# Verificar que los contenedores estén ejecutándose
docker-compose ps
```

#### 2.3.3 Configurar la Aplicación en Docker
```bash
# Generar clave de aplicación
docker-compose exec app php artisan key:generate

# Ejecutar migraciones y seeders
docker-compose exec app php artisan migrate --seed

# Crear enlace simbólico del storage
docker-compose exec app php artisan storage:link

# Optimizar para producción
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache
docker-compose exec app php artisan view:cache
```

## 3. Configuración Inicial

### 3.1 Configuración del Servidor Web (Solo Instalación Tradicional)

#### Apache
Cree un archivo de configuración virtual host:
```apache
<VirtualHost *:80>
    ServerName indarca.example.com
    DocumentRoot /ruta/a/indarca/public

    <Directory /ruta/a/indarca/public>
        AllowOverride All
        Require all granted
    </Directory>

    # Configuración de seguridad
    Header always set X-Frame-Options "SAMEORIGIN"
    Header always set X-XSS-Protection "1; mode=block"
    Header always set X-Content-Type-Options "nosniff"

    ErrorLog ${APACHE_LOG_DIR}/indarca_error.log
    CustomLog ${APACHE_LOG_DIR}/indarca_access.log combined
</VirtualHost>
```

#### Nginx
```nginx
server {
    listen 80;
    server_name indarca.example.com;
    root /ruta/a/indarca/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.php;
    charset utf-8;

    # Configuración de caché para assets estáticos
    location ~* \.(js|css|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### 3.2 Configuración de Permisos (Solo Instalación Tradicional)
```bash
chmod -R 755 /ruta/a/indarca
chmod -R 775 /ruta/a/indarca/storage
chmod -R 775 /ruta/a/indarca/bootstrap/cache
chown -R www-data:www-data /ruta/a/indarca
```

### 3.3 Configuración de Correo
Edite el archivo `.env` para configurar el envío de correos:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.ejemplo.com
MAIL_PORT=587
MAIL_USERNAME=usuario@ejemplo.com
MAIL_PASSWORD=contraseña
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@indarca.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 3.4 Configuración de Caché
Optimice la aplicación para producción:
```bash
# Para instalación tradicional
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Para Docker
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache
docker-compose exec app php artisan view:cache
docker-compose exec app php artisan optimize
```

## 4. Despliegue con Docker

### 4.1 Configuración de Producción con Docker

#### 4.1.1 Docker Compose para Producción
Cree un archivo `docker-compose.prod.yml`:
```yaml
version: '3.8'

services:
  app:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: indarca-app-prod
    restart: unless-stopped
    environment:
      - APP_ENV=production
      - APP_DEBUG=false
    volumes:
      - ./storage:/var/www/html/storage
      - ./public/storage:/var/www/html/public/storage
    networks:
      - indarca-network

  nginx:
    image: nginx:alpine
    container_name: indarca-nginx-prod
    restart: unless-stopped
    ports:
      - "80:80"
      - "443:443"
    volumes:
      - ./:/var/www/html
      - ./docker/nginx/prod.conf:/etc/nginx/conf.d/default.conf
      - ./docker/ssl:/etc/nginx/ssl
    depends_on:
      - app
    networks:
      - indarca-network

  db:
    image: mysql:8.0
    container_name: indarca-db-prod
    restart: unless-stopped
    environment:
      MYSQL_DATABASE: ${DB_DATABASE}
      MYSQL_ROOT_PASSWORD: ${DB_PASSWORD}
      MYSQL_PASSWORD: ${DB_PASSWORD}
      MYSQL_USER: ${DB_USERNAME}
    volumes:
      - mysql-data:/var/lib/mysql
      - ./docker/mysql/my.cnf:/etc/mysql/conf.d/my.cnf
    networks:
      - indarca-network

  redis:
    image: redis:alpine
    container_name: indarca-redis-prod
    restart: unless-stopped
    volumes:
      - redis-data:/data
    networks:
      - indarca-network

networks:
  indarca-network:
    driver: bridge

volumes:
  mysql-data:
    driver: local
  redis-data:
    driver: local
```

#### 4.1.2 Script de Despliegue Automatizado
Cree un script `deploy.sh`:
```bash
#!/bin/bash

echo "🚀 Iniciando despliegue de INDARCA..."

# Detener contenedores existentes
docker-compose -f docker-compose.prod.yml down

# Actualizar código
git pull origin main

# Construir nuevas imágenes
docker-compose -f docker-compose.prod.yml build --no-cache

# Ejecutar contenedores
docker-compose -f docker-compose.prod.yml up -d

# Esperar a que la base de datos esté lista
echo "⏳ Esperando a que la base de datos esté lista..."
sleep 30

# Ejecutar migraciones
docker-compose -f docker-compose.prod.yml exec -T app php artisan migrate --force

# Optimizar aplicación
docker-compose -f docker-compose.prod.yml exec -T app php artisan config:cache
docker-compose -f docker-compose.prod.yml exec -T app php artisan route:cache
docker-compose -f docker-compose.prod.yml exec -T app php artisan view:cache

# Verificar estado
docker-compose -f docker-compose.prod.yml ps

echo "✅ Despliegue completado!"
```

### 4.2 Monitoreo con Docker
```bash
# Ver logs en tiempo real
docker-compose logs -f

# Ver logs de un servicio específico
docker-compose logs -f app

# Verificar uso de recursos
docker stats

# Acceder al contenedor de la aplicación
docker-compose exec app bash
```

## 5. Despliegue en Producción

### 5.1 Recomendaciones de Hosting
- **VPS/Servidor dedicado**: Mínimo 4GB RAM, 2 CPU cores
- **Almacenamiento**: SSD de al menos 50GB
- **Ancho de banda**: Mínimo 2TB/mes
- **Proveedores recomendados**:
  - DigitalOcean (Droplets)
  - AWS (EC2)
  - Google Cloud (Compute Engine)
  - Linode
  - Vultr

### 5.2 Configuración de HTTPS
1. Adquiera un certificado SSL (Let's Encrypt es gratuito)
2. Configure su servidor web para usar HTTPS
3. Actualice el archivo `.env`:
```env
APP_URL=https://indarca.example.com
FORCE_HTTPS=true
```

#### Configuración Let's Encrypt con Docker
```bash
# Instalar certbot
sudo apt install certbot python3-certbot-nginx

# Obtener certificado
sudo certbot --nginx -d indarca.example.com

# Configurar renovación automática
sudo crontab -e
# Añadir: 0 12 * * * /usr/bin/certbot renew --quiet
```

### 5.3 Scripts de Utilidad

#### Script de Inicio Mejorado (`start.sh`)
```bash
#!/bin/bash

echo "🔧 Configurando INDARCA..."

# Verificar si Docker está instalado
if ! command -v docker &> /dev/null; then
    echo "❌ Docker no está instalado. Instalando..."
    curl -fsSL https://get.docker.com -o get-docker.sh
    sh get-docker.sh
    sudo usermod -aG docker $USER
fi

# Verificar si Docker Compose está instalado
if ! command -v docker-compose &> /dev/null; then
    echo "❌ Docker Compose no está instalado. Instalando..."
    sudo curl -L "https://github.com/docker/compose/releases/download/v2.20.0/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
    sudo chmod +x /usr/local/bin/docker-compose
fi

# Configurar variables de entorno si no existen
if [ ! -f .env ]; then
    cp .env.example .env
    echo "📝 Archivo .env creado. Por favor, configure las variables necesarias."
fi

# Ejecutar con Docker
echo "🐳 Iniciando con Docker..."
docker-compose up -d --build

# Configurar aplicación
echo "⚙️ Configurando aplicación..."
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --seed
docker-compose exec app php artisan storage:link
docker-compose exec app php artisan optimize

echo "✅ INDARCA está listo!"
echo "🌐 Acceda a: http://localhost:8000"
```

### 5.4 Verificación de Despliegue
1. Acceda a la URL configurada
2. Inicie sesión con las credenciales de administrador predeterminadas:
   - Email: admin@indarca.com
   - Contraseña: admin123
3. Cambie inmediatamente la contraseña predeterminada
4. Verifique todas las funcionalidades principales

## 6. Mantenimiento

### 6.1 Respaldo de Base de Datos

#### Script de Respaldo Automatizado
```bash
#!/bin/bash
# /usr/local/bin/backup-indarca.sh

BACKUP_DIR="/var/backups/indarca"
TIMESTAMP=$(date +"%Y%m%d-%H%M%S")
RETENTION_DAYS=30

# Crear directorio de respaldos
mkdir -p $BACKUP_DIR

# Para instalación tradicional
if command -v mysql &> /dev/null; then
    mysqldump -u$DB_USERNAME -p$DB_PASSWORD $DB_DATABASE | gzip > $BACKUP_DIR/indarca-$TIMESTAMP.sql.gz
fi

# Para Docker
if command -v docker-compose &> /dev/null; then
    docker-compose exec -T db mysqldump -u$DB_USERNAME -p$DB_PASSWORD $DB_DATABASE | gzip > $BACKUP_DIR/indarca-docker-$TIMESTAMP.sql.gz
fi

# Respaldar archivos de storage
tar -czf $BACKUP_DIR/storage-$TIMESTAMP.tar.gz storage/

# Eliminar respaldos antiguos
find $BACKUP_DIR -name "*.gz" -mtime +$RETENTION_DAYS -delete
find $BACKUP_DIR -name "*.tar.gz" -mtime +$RETENTION_DAYS -delete

echo "✅ Respaldo completado: $TIMESTAMP"
```

#### Configurar Cron Job
```bash
# Editar crontab
crontab -e

# Añadir respaldo diario a las 2 AM
0 2 * * * /usr/local/bin/backup-indarca.sh >> /var/log/indarca-backup.log 2>&1
```

### 6.2 Monitoreo del Sistema

#### Script de Monitoreo
```bash
#!/bin/bash
# /usr/local/bin/monitor-indarca.sh

# Verificar servicios Docker
if ! docker-compose ps | grep -q "Up"; then
    echo "❌ Algunos servicios Docker no están ejecutándose"
    docker-compose up -d
fi

# Verificar espacio en disco
DISK_USAGE=$(df / | tail -1 | awk '{print $5}' | sed 's/%//')
if [ $DISK_USAGE -gt 80 ]; then
    echo "⚠️ Espacio en disco bajo: ${DISK_USAGE}%"
fi

# Verificar memoria
MEMORY_USAGE=$(free | grep Mem | awk '{printf("%.0f", $3/$2 * 100.0)}')
if [ $MEMORY_USAGE -gt 90 ]; then
    echo "⚠️ Uso de memoria alto: ${MEMORY_USAGE}%"
fi

# Verificar logs de errores
ERROR_COUNT=$(docker-compose logs app | grep -i error | wc -l)
if [ $ERROR_COUNT -gt 10 ]; then
    echo "⚠️ Muchos errores en logs: $ERROR_COUNT"
fi
```

### 6.3 Mantenimiento de Logs
```bash
# Configurar logrotate para Docker
sudo tee /etc/logrotate.d/docker-indarca << EOF
/var/lib/docker/containers/*/*.log {
    daily
    missingok
    rotate 7
    compress
    delaycompress
    notifempty
    copytruncate
}
EOF
```

### 6.4 Tareas Programadas
```bash
# Para instalación tradicional
* * * * * cd /ruta/a/indarca && php artisan schedule:run >> /dev/null 2>&1

# Para Docker
* * * * * docker-compose exec -T app php artisan schedule:run >> /dev/null 2>&1
```

## 7. Solución de Problemas

### 7.1 Problemas Comunes con Docker

#### Problema: Contenedores no inician
```bash
# Verificar logs
docker-compose logs

# Reconstruir contenedores
docker-compose down
docker-compose build --no-cache
docker-compose up -d
```

#### Problema: Base de datos no conecta
```bash
# Verificar estado de la base de datos
docker-compose exec db mysql -u root -p -e "SHOW DATABASES;"

# Reiniciar servicio de base de datos
docker-compose restart db
```

#### Problema: Permisos de archivos
```bash
# Corregir permisos en contenedor
docker-compose exec app chown -R www-data:www-data /var/www/html/storage
docker-compose exec app chmod -R 775 /var/www/html/storage
```

### 7.2 Problemas de Rendimiento

#### Optimización de Docker
```bash
# Limpiar imágenes no utilizadas
docker system prune -a

# Optimizar base de datos
docker-compose exec db mysql -u root -p -e "OPTIMIZE TABLE densimetros, users, empresas;"

# Limpiar caché de Laravel
docker-compose exec app php artisan optimize:clear
docker-compose exec app php artisan optimize
```

### 7.3 Diagnóstico del Sistema
```bash
# Información del sistema
docker-compose exec app php artisan about

# Verificar configuración
docker-compose exec app php artisan config:show

# Verificar rutas
docker-compose exec app php artisan route:list

# Estado de la base de datos
docker-compose exec app php artisan migrate:status
```

## 8. Actualización del Sistema

### 8.1 Procedimiento de Actualización con Docker
```bash
#!/bin/bash
# Script de actualización update.sh

echo "🔄 Iniciando actualización de INDARCA..."

# Crear respaldo antes de actualizar
./backup-indarca.sh

# Detener servicios
docker-compose down

# Actualizar código fuente
git pull origin main

# Reconstruir imágenes
docker-compose build --no-cache

# Iniciar servicios
docker-compose up -d

# Esperar a que la base de datos esté lista
sleep 30

# Ejecutar migraciones
docker-compose exec -T app php artisan migrate --force

# Limpiar y optimizar caché
docker-compose exec -T app php artisan optimize:clear
docker-compose exec -T app php artisan optimize

# Verificar estado
docker-compose ps

echo "✅ Actualización completada!"
```

### 8.2 Rollback en Caso de Problemas
```bash
#!/bin/bash
# Script de rollback rollback.sh

echo "🔙 Iniciando rollback..."

# Detener servicios actuales
docker-compose down

# Volver a la versión anterior
git checkout HEAD~1

# Reconstruir con versión anterior
docker-compose build --no-cache
docker-compose up -d

# Restaurar base de datos si es necesario
# docker-compose exec -T db mysql -u root -p indarca < backup.sql

echo "✅ Rollback completado!"
```

### 8.3 Verificación Post-Actualización
```bash
# Verificar servicios
docker-compose ps

# Verificar logs
docker-compose logs --tail=50

# Verificar aplicación
curl -I http://localhost:8000

# Verificar base de datos
docker-compose exec app php artisan migrate:status
```

---

## Apéndice A: Credenciales Predeterminadas

### Administrador
- Email: admin@indarca.com
- Contraseña: admin123

### Trabajador
- Email: trabajador@indarca.com
- Contraseña: trabajador123

### Cliente
- Email: cliente@example.com
- Contraseña: cliente123

> **IMPORTANTE**: Cambie estas contraseñas inmediatamente después de la instalación.

## Apéndice B: Puertos Utilizados

- **8000**: Aplicación web (Nginx)
- **3306**: Base de datos MySQL
- **6379**: Redis (si se configura)
- **1025**: MailHog (desarrollo)

## Apéndice C: Variables de Entorno Importantes

```env
# Aplicación
APP_NAME=INDARCA
APP_ENV=production
APP_DEBUG=false
APP_URL=https://indarca.example.com

# Base de datos
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=indarca
DB_USERNAME=indarca
DB_PASSWORD=secure_password

# Caché y sesiones
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

# Correo
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=noreply@indarca.com
MAIL_PASSWORD=mail_password
MAIL_ENCRYPTION=tls
```
