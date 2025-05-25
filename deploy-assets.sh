#!/bin/bash

# Script de despliegue para assets de INDARCA
# Este script debe ejecutarse durante el despliegue en producción

echo "🚀 Iniciando despliegue de assets para INDARCA..."

# Crear directorios necesarios si no existen
mkdir -p public/assets/img/OTROS
mkdir -p storage/app/public/media

# Verificar que el video del hero exista
if [ ! -f "public/assets/img/OTROS/videoHeroindarca.mov" ]; then
    echo "⚠️  ADVERTENCIA: No se encuentra el video del hero en public/assets/img/OTROS/"
    echo "   Asegúrate de subir el archivo videoHeroindarca.mov a esta ubicación"
fi

# Crear versión MP4 si no existe
if [ -f "public/assets/img/OTROS/videoHeroindarca.mov" ] && [ ! -f "public/assets/img/OTROS/videoHeroindarca.mp4" ]; then
    echo "📹 Creando versión MP4 del video del hero..."
    cp "public/assets/img/OTROS/videoHeroindarca.mov" "public/assets/img/OTROS/videoHeroindarca.mp4"
fi

# Verificar permisos
echo "🔐 Verificando permisos de directorios..."
chmod -R 755 public/assets/
chmod -R 775 storage/

# Optimizar storage link si no existe
if [ ! -L "public/storage" ]; then
    echo "🔗 Creando enlace simbólico para storage..."
    php artisan storage:link
fi

# Limpiar cache
echo "🧹 Limpiando cache..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear

echo "✅ Despliegue de assets completado!"
echo ""
echo "📋 Verificaciones post-despliegue:"
echo "   - Video del hero: public/assets/img/OTROS/videoHeroindarca.mov"
echo "   - Versión MP4: public/assets/img/OTROS/videoHeroindarca.mp4"
echo "   - Storage link: public/storage"
echo ""
echo "🌐 Tu aplicación debería mostrar correctamente el video del hero ahora."
