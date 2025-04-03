#!/bin/sh

# Iniciar PHP-FPM
php-fpm81

# Iniciar NGINX
nginx

# Mantener el contenedor en ejecución
tail -f /var/log/nginx/error.log
