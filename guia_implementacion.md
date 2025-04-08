# Guía de Implementación - Sistema de Gestión de Densímetros INDARCA

## Índice
1. [Requisitos Previos](#1-requisitos-previos)
2. [Instalación del Sistema](#2-instalación-del-sistema)
3. [Configuración Inicial](#3-configuración-inicial)
4. [Despliegue en Producción](#4-despliegue-en-producción)
5. [Mantenimiento](#5-mantenimiento)
6. [Solución de Problemas](#6-solución-de-problemas)
7. [Actualización del Sistema](#7-actualización-del-sistema)

## 1. Requisitos Previos

### 1.1 Requisitos de Servidor
- Servidor web: Apache 2.4+ o Nginx 1.18+
- PHP 8.1 o superior
- MySQL 5.7+ o MariaDB 10.3+
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

### 1.2 Herramientas Necesarias
- Composer (gestor de dependencias PHP)
- Node.js (v14+) y npm (para compilar assets)
- Git (para control de versiones)

### 1.3 Servidor de Correo
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

### 2.2 Instalar Dependencias de PHP
```bash
composer install --no-dev --optimize-autoloader
```

### 2.3 Instalar Dependencias de JavaScript
```bash
npm install
```

### 2.4 Compilar Assets
```bash
npm run production
```

### 2.5 Configurar Variables de Entorno
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

### 2.6 Crear la Base de Datos
1. Cree una base de datos MySQL vacía
2. Configure los detalles de conexión en el archivo `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=indarca
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

### 2.7 Ejecutar Migraciones y Seeders
```bash
php artisan migrate --seed
```
Este comando creará las tablas necesarias y poblará la base de datos con datos iniciales, incluyendo un usuario administrador predeterminado.

## 3. Configuración Inicial

### 3.1 Configuración del Servidor Web

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

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### 3.2 Configuración de Permisos
```bash
chmod -R 755 /ruta/a/indarca
chmod -R 777 /ruta/a/indarca/storage
chmod -R 777 /ruta/a/indarca/bootstrap/cache
```

### 3.3 Configuración de Correo
Edite el archivo `.env` para configurar el envío de correos:
```
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
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 4. Despliegue en Producción

### 4.1 Recomendaciones de Hosting
- Servidor VPS con mínimo 2GB de RAM
- Almacenamiento SSD de al menos 20GB
- Ancho de banda mínimo: 1TB/mes
- Proveedores recomendados:
  - DigitalOcean
  - AWS
  - Google Cloud
  - Linode

### 4.2 Configuración de HTTPS
1. Adquiera un certificado SSL (Let's Encrypt es gratuito)
2. Configure su servidor web para usar HTTPS
3. Actualice el archivo `.env`:
```
APP_URL=https://indarca.example.com
FORCE_HTTPS=true
```

### 4.3 Script de Despliegue
El archivo `start.sh` incluido en el proyecto facilita el despliegue:
```bash
chmod +x start.sh
./start.sh
```

Este script realizará:
- Actualización de dependencias
- Compilación de assets
- Optimizaciones de caché
- Reinicio de servicios necesarios

### 4.4 Verificación de Despliegue
1. Acceda a la URL configurada
2. Inicie sesión con las credenciales de administrador predeterminadas:
   - Email: admin@indarca.com
   - Contraseña: admin123
3. Cambie inmediatamente la contraseña predeterminada

## 5. Mantenimiento

### 5.1 Respaldo de Base de Datos
Configure respaldos diarios automáticos:
```bash
# Crear un script de respaldo en /usr/local/bin/backup-indarca.sh
#!/bin/bash
BACKUP_DIR="/ruta/a/backups"
MYSQL_USER="usuario"
MYSQL_PASSWORD="contraseña"
MYSQL_DATABASE="indarca"
TIMESTAMP=$(date +"%Y%m%d-%H%M%S")

# Crear directorio de respaldos si no existe
mkdir -p $BACKUP_DIR

# Respaldar la base de datos
mysqldump -u$MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE | gzip > $BACKUP_DIR/indarca-$TIMESTAMP.sql.gz

# Eliminar respaldos más antiguos de 30 días
find $BACKUP_DIR -name "indarca-*.sql.gz" -mtime +30 -delete
```

Configure un cron job para ejecutar el script diariamente:
```
0 2 * * * /usr/local/bin/backup-indarca.sh
```

### 5.2 Monitoreo del Sistema
Herramientas recomendadas:
- **Supervisor** para monitorear procesos PHP
- **New Relic** o **Datadog** para monitoreo avanzado
- **Monit** para verificar disponibilidad del servicio

### 5.3 Mantenimiento de Logs
Configure rotación de logs para evitar archivos demasiado grandes:
```
/ruta/a/indarca/storage/logs/*.log {
    daily
    missingok
    rotate 14
    compress
    delaycompress
    notifempty
    create 0640 www-data www-data
}
```

### 5.4 Tareas Programadas
Configure el programador de tareas de Laravel en cron:
```
* * * * * cd /ruta/a/indarca && php artisan schedule:run >> /dev/null 2>&1
```

## 6. Solución de Problemas

### 6.1 Errores Comunes y Soluciones

#### Problema: Error 500 al acceder al sistema
**Solución**:
1. Verifique los logs de error en `/ruta/a/indarca/storage/logs/laravel.log`
2. Asegúrese de que los permisos de archivos son correctos
3. Verifique la configuración de `.env`

#### Problema: No se envían correos electrónicos
**Solución**:
1. Verifique la configuración SMTP en `.env`
2. Confirme que el servicio de correo está funcionando
3. Revise los logs de Laravel para detalles específicos del error

#### Problema: Carga lenta del sistema
**Solución**:
1. Asegúrese de haber ejecutado las optimizaciones de caché
2. Verifique el rendimiento de la base de datos
3. Considere implementar un servicio de caché como Redis

### 6.2 Logs y Diagnóstico
- Logs de Laravel: `/storage/logs/laravel.log`
- Logs de Apache/Nginx: Según configuración del servidor
- Diagnóstico rápido:
```bash
php artisan about
```

## 7. Actualización del Sistema

### 7.1 Procedimiento de Actualización
```bash
# 1. Realizar respaldo de seguridad
mysqldump -u usuario -p indarca > indarca_backup_$(date +%Y%m%d).sql
cp -r /ruta/a/indarca /ruta/a/indarca_backup_$(date +%Y%m%d)

# 2. Actualizar el código fuente
cd /ruta/a/indarca
git pull origin main

# 3. Actualizar dependencias
composer install --no-dev --optimize-autoloader
npm install
npm run production

# 4. Actualizar la base de datos
php artisan migrate

# 5. Limpiar caché
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 6. Reiniciar servicios si es necesario
sudo systemctl restart php8.1-fpm
sudo systemctl restart nginx  # o apache2
```

### 7.2 Consideraciones para Actualización
- Siempre revise los cambios en el archivo `CHANGELOG.md` antes de actualizar
- Realice las actualizaciones en un entorno de prueba antes de producción
- Verifique la compatibilidad de las extensiones personalizadas

### 7.3 Rollback en Caso de Problemas
```bash
# Restaurar código
rm -rf /ruta/a/indarca
cp -r /ruta/a/indarca_backup_FECHA /ruta/a/indarca

# Restaurar base de datos
mysql -u usuario -p indarca < indarca_backup_FECHA.sql

# Reiniciar servicios
sudo systemctl restart php8.1-fpm
sudo systemctl restart nginx  # o apache2
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
