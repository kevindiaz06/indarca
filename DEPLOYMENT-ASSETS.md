# 📹 Guía de Despliegue de Assets de Media - INDARCA

## Problema Identificado
El video del hero principal no se mostraba en producción debido a:
1. **Error de ruta**: Diferencia entre mayúsculas/minúsculas en la ruta del archivo
2. **Assets no versionados**: Videos grandes no incluidos en el sistema de control de versiones
3. **Falta de proceso de despliegue**: No hay procedimiento claro para manejar assets de media

## Solución Implementada

### 1. Corrección de Rutas
- **Antes**: `assets/img/otros/` (minúsculas)  
- **Después**: `assets/img/OTROS/` (mayúsculas)
- **Archivo corregido**: `resources/views/inicio.blade.php`

### 2. Formatos de Video
- **Principal**: `videoHeroindarca.mov` (formato QuickTime)
- **Fallback**: `videoHeroindarca.mp4` (mayor compatibilidad)

### 3. Ubicación de Assets
```
public/
└── assets/
    └── img/
        └── OTROS/
            ├── videoHeroindarca.mov (7.1MB)
            └── videoHeroindarca.mp4 (7.1MB)
```

## 🚀 Proceso de Despliegue

### Para Desarrolladores Locales
1. Verificar que el video existe en la ruta correcta
2. Ejecutar el script de despliegue (opcional)

### Para Producción
1. **Subir manualmente** el video a la carpeta `public/assets/img/OTROS/`
2. **Ejecutar script de despliegue**:
   ```bash
   chmod +x deploy-assets.sh
   ./deploy-assets.sh
   ```

### Para Servicios en la Nube (Vercel, Netlify, etc.)
1. **Incluir assets en build**: Configurar CI/CD para incluir assets de media
2. **Variables de entorno**: Considerar usar CDN para assets grandes
3. **Alternativa recomendada**: Mover a storage cloud (AWS S3, etc.)

## 📋 Checklist de Verificación

- [ ] Video existe en `public/assets/img/OTROS/videoHeroindarca.mov`
- [ ] Versión MP4 disponible para compatibilidad
- [ ] Permisos correctos (755 para directorios)
- [ ] Cache limpiado después de cambios
- [ ] Prueba en navegador local
- [ ] Prueba en entorno de producción

## 🔧 Comandos Útiles

```bash
# Verificar existencia del video
ls -la public/assets/img/OTROS/videoHero*

# Verificar tamaño de archivos
du -h public/assets/img/OTROS/videoHero*

# Crear versión MP4 manualmente
cp public/assets/img/OTROS/videoHeroindarca.mov public/assets/img/OTROS/videoHeroindarca.mp4

# Limpiar cache de Laravel
php artisan config:clear && php artisan cache:clear && php artisan view:clear
```

## 🚨 Notas Importantes

1. **Tamaño del archivo**: El video pesa 7.1MB, considera optimización para web
2. **CDN recomendado**: Para mejor rendimiento en producción
3. **Backup**: Mantén respaldo del video en almacenamiento externo
4. **Monitoreo**: Verifica regularmente que el video se carga correctamente

## 🔍 Troubleshooting

### El video no se carga
1. Verificar ruta en código vs ubicación real
2. Comprobar permisos de archivos
3. Revisar logs del servidor web
4. Probar en diferentes navegadores

### Error 404 en el video
1. Confirmar que el archivo existe en la ruta correcta
2. Verificar configuración del servidor web
3. Revisar reglas de reescritura de URLs

### Performance lento
1. Considerar optimización del video
2. Implementar lazy loading
3. Usar CDN para distribución de contenido

---
**Última actualización**: $(date)
**Responsable**: Equipo de Desarrollo INDARCA 
