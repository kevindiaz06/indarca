#!/usr/bin/env bash
# exit on error
set -o errexit

echo "Running composer"
composer install --no-dev --optimize-autoloader

echo "Caching configuration..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Caching views..."
php artisan view:cache

# Si estás usando una instancia Free, debes realizar
# las migraciones de la base de datos en el comando de construcción.
# Descomentar la siguiente línea:
# php artisan migrate --force
