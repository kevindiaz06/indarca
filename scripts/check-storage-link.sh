#!/bin/bash

# Script para verificar y reparar el enlace simbólico de storage
# Uso: ./check-storage-link.sh

echo "🔍 Verificando enlace simbólico de storage..."

# Verificar si el enlace existe
if [ -L "public/storage" ]; then
    echo "✅ El enlace simbólico existe"

    # Verificar si apunta al lugar correcto
    LINK_TARGET=$(readlink public/storage)
    EXPECTED_TARGET="../storage/app/public"

    if [ "$LINK_TARGET" = "$EXPECTED_TARGET" ] || [ "$LINK_TARGET" = "$(pwd)/storage/app/public" ]; then
        echo "✅ El enlace apunta al directorio correcto: $LINK_TARGET"
    else
        echo "⚠️  El enlace apunta a un directorio incorrecto: $LINK_TARGET"
        echo "🔧 Recreando enlace simbólico..."
        rm public/storage
        php artisan storage:link
    fi

    # Verificar si el directorio de destino existe
    if [ -d "storage/app/public" ]; then
        echo "✅ El directorio storage/app/public existe"
    else
        echo "❌ El directorio storage/app/public no existe"
        echo "🔧 Creando directorio..."
        mkdir -p storage/app/public
        echo "✅ Directorio creado"
    fi

else
    echo "❌ El enlace simbólico no existe"
    echo "🔧 Creando enlace simbólico..."
    php artisan storage:link
    echo "✅ Enlace simbólico creado"
fi

# Verificar permisos
echo ""
echo "🔍 Verificando permisos..."

if [ -w "storage/app/public" ]; then
    echo "✅ El directorio storage/app/public tiene permisos de escritura"
else
    echo "⚠️  El directorio storage/app/public no tiene permisos de escritura"
    echo "🔧 Ajustando permisos..."
    chmod -R 755 storage/
    echo "✅ Permisos ajustados"
fi

# Verificar estructura de directorios
echo ""
echo "🔍 Verificando estructura de directorios..."

REQUIRED_DIRS=(
    "storage/app/public/archivos"
    "storage/app/public/archivos/densimetros"
    "storage/app/public/team"
    "storage/app/public/logos"
)

for dir in "${REQUIRED_DIRS[@]}"; do
    if [ -d "$dir" ]; then
        echo "✅ $dir existe"
    else
        echo "🔧 Creando $dir..."
        mkdir -p "$dir"
        echo "✅ $dir creado"
    fi
done

echo ""
echo "🎉 Verificación completada"
echo ""
echo "📋 Comandos útiles:"
echo "   - Verificar archivos: php artisan storage:verify"
echo "   - Reparar archivos: php artisan storage:verify --fix"
echo "   - Limpiar archivos huérfanos: php artisan storage:cleanup --dry-run"
