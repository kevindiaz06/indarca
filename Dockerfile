# Imagen base de PHP 8.2 con Apache
FROM php:8.2-apache

# Evitar errores de localización durante instalaciones
ENV DEBIAN_FRONTEND=noninteractive

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    zlib1g-dev \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    mariadb-client \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/*

# Instalar extensiones de PHP
RUN docker-php-ext-install pdo_mysql mysqli mbstring exif pcntl bcmath gd zip

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos del proyecto
COPY . /var/www/html

# Crear copia de seguridad del directorio storage
RUN cp -r /var/www/html/storage /var/www/html/storage_backup

# Instalar dependencias de Composer
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Instalar Node.js y compilar assets
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
 && apt-get update \
 && apt-get install -y nodejs \
 && npm install \
 && npm run build \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/*

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html \
 && chmod -R 775 /var/www/html/storage \
 && chmod -R 775 /var/www/html/bootstrap/cache \
 && chmod -R 775 /var/www/html/storage_backup

# Configurar Apache
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Crear enlace simbólico del storage
RUN php artisan storage:link

# Crear script de inicialización
RUN echo '#!/bin/bash\n\
if [ -z "$(ls -A /var/www/html/storage)" ]; then\n\
    echo "Storage directory is empty, restoring from backup..."\n\
    cp -r /var/www/html/storage_backup/* /var/www/html/storage/\n\
    chown -R www-data:www-data /var/www/html/storage\n\
    chmod -R 775 /var/www/html/storage\n\
    echo "Storage restored successfully"\n\
fi\n\
echo "Removing storage backup..."\n\
rm -rf /var/www/html/storage_backup\n\
apache2-foreground' > /usr/local/bin/init-storage.sh \
 && chmod +x /usr/local/bin/init-storage.sh

# Exponer el puerto 80
EXPOSE 80

# Usar el script de inicialización como comando de inicio
CMD ["/usr/local/bin/init-storage.sh"]
