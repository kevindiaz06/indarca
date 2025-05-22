# Imagen base para PHP 8.2
FROM php:8.2-fpm

# Argumentos para usuario no-root
ARG user=laravel
ARG uid=1000

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nodejs \
    npm

# Limpiar cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Obtener Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear usuario del sistema
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Establecer directorio de trabajo
WORKDIR /var/www

# Copiar archivos de la aplicación
COPY . /var/www

# Establecer permisos
RUN chown -R $user:$user /var/www
RUN chmod -R 755 /var/www/storage

# Cambiar al usuario no-root
USER $user

# Instalar dependencias de Composer
RUN composer install --no-interaction --optimize-autoloader

# Instalar dependencias de Node.js y compilar assets
RUN npm install && npm run build

# Exponer puerto 9000
EXPOSE 9000

# Comando para iniciar PHP-FPM
CMD ["php-fpm"]