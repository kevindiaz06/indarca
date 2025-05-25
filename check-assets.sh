#!/bin/bash

# Script de verificación de assets críticos - INDARCA
# Verifica que todos los assets críticos estén en su lugar correcto

echo "🔍 VERIFICACIÓN DE ASSETS CRÍTICOS - INDARCA"
echo "=============================================="
echo ""

# Colores para output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Contador de errores
ERRORS=0

echo -e "${BLUE}📹 VERIFICANDO VIDEO DEL HERO...${NC}"
echo "--------------------------------------"

# Video del hero principal
if [ -f "public/assets/img/OTROS/videoHeroindarca.mov" ]; then
    SIZE=$(du -h "public/assets/img/OTROS/videoHeroindarca.mov" | cut -f1)
    echo -e "✅ ${GREEN}Video principal encontrado: ${SIZE}${NC}"
else
    echo -e "❌ ${RED}ERROR: Video principal no encontrado en public/assets/img/OTROS/videoHeroindarca.mov${NC}"
    ERRORS=$((ERRORS + 1))
fi

# Video MP4 de respaldo
if [ -f "public/assets/img/OTROS/videoHeroindarca.mp4" ]; then
    SIZE=$(du -h "public/assets/img/OTROS/videoHeroindarca.mp4" | cut -f1)
    echo -e "✅ ${GREEN}Video MP4 encontrado: ${SIZE}${NC}"
else
    echo -e "⚠️  ${YELLOW}ADVERTENCIA: Video MP4 no encontrado. Se creará automáticamente.${NC}"
fi

echo ""
echo -e "${BLUE}🔬 VERIFICANDO IMÁGENES DE DENSÍMETROS...${NC}"
echo "----------------------------------------------"

# Imagen del densímetro nuclear
if [ -f "public/assets/img/DENSIMETROS/TROXLER/DENSIMETROS_TROXLERR_10.png" ]; then
    SIZE=$(du -h "public/assets/img/DENSIMETROS/TROXLER/DENSIMETROS_TROXLERR_10.png" | cut -f1)
    echo -e "✅ ${GREEN}Imagen densímetro nuclear encontrada: ${SIZE}${NC}"
else
    echo -e "❌ ${RED}ERROR: Imagen densímetro nuclear no encontrada en public/assets/img/DENSIMETROS/TROXLER/DENSIMETROS_TROXLERR_10.png${NC}"
    ERRORS=$((ERRORS + 1))
fi

echo ""
echo -e "${BLUE}🔗 VERIFICANDO ENLACES SIMBÓLICOS...${NC}"
echo "--------------------------------------"

# Storage link
if [ -L "public/storage" ]; then
    echo -e "✅ ${GREEN}Enlace simbólico de storage existe${NC}"
else
    echo -e "⚠️  ${YELLOW}ADVERTENCIA: Enlace simbólico de storage no existe. Ejecuta: php artisan storage:link${NC}"
fi

echo ""
echo -e "${BLUE}📂 VERIFICANDO PERMISOS...${NC}"
echo "----------------------------"

# Verificar permisos de directorios críticos
if [ -d "public/assets" ]; then
    PERMS=$(stat -c "%a" "public/assets" 2>/dev/null || stat -f "%A" "public/assets" 2>/dev/null)
    if [ "$PERMS" = "755" ] || [ "$PERMS" = "0755" ]; then
        echo -e "✅ ${GREEN}Permisos de public/assets correctos: ${PERMS}${NC}"
    else
        echo -e "⚠️  ${YELLOW}ADVERTENCIA: Permisos de public/assets: ${PERMS} (recomendado: 755)${NC}"
    fi
fi

if [ -d "storage" ]; then
    PERMS=$(stat -c "%a" "storage" 2>/dev/null || stat -f "%A" "storage" 2>/dev/null)
    if [ "$PERMS" = "775" ] || [ "$PERMS" = "0775" ]; then
        echo -e "✅ ${GREEN}Permisos de storage correctos: ${PERMS}${NC}"
    else
        echo -e "⚠️  ${YELLOW}ADVERTENCIA: Permisos de storage: ${PERMS} (recomendado: 775)${NC}"
    fi
fi

echo ""
echo -e "${BLUE}📋 RESUMEN DE VERIFICACIÓN${NC}"
echo "============================"

if [ $ERRORS -eq 0 ]; then
    echo -e "🎉 ${GREEN}¡TODOS LOS ASSETS CRÍTICOS ESTÁN EN SU LUGAR!${NC}"
    echo -e "   ${GREEN}Tu aplicación debería funcionar correctamente en producción.${NC}"
else
    echo -e "⚠️  ${RED}SE ENCONTRARON ${ERRORS} ERRORES CRÍTICOS${NC}"
    echo -e "   ${RED}Revisa los archivos faltantes antes de desplegar en producción.${NC}"
fi

echo ""
echo -e "${BLUE}💡 COMANDOS ÚTILES:${NC}"
echo "-------------------"
echo "• Ejecutar script de despliegue: ./deploy-assets.sh"
echo "• Crear enlace de storage: php artisan storage:link"
echo "• Limpiar cache: php artisan config:clear && php artisan cache:clear && php artisan view:clear"
echo "• Verificar permisos: chmod -R 755 public/assets && chmod -R 775 storage"

exit $ERRORS
