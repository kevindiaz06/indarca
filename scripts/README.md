# Scripts del Proyecto INDARCA

Esta carpeta contiene scripts y herramientas de mantenimiento del proyecto.

## Scripts Disponibles

### 🔧 **Scripts de Mantenimiento**

#### `check-file-system.php`
Script PHP para verificar el estado del sistema de archivos y permisos.
- Verifica permisos de directorios críticos
- Valida la estructura de carpetas requerida

#### `check-storage-link.sh`
Script Bash para verificar y crear enlaces simbólicos de storage en Laravel.
- Verifica el enlace simbólico `public/storage`
- Crea el enlace si no existe

#### `rename_images.php`
Script PHP para renombrar y organizar imágenes del proyecto.
- Renombra archivos de imagen con patrones específicos
- Organiza imágenes en directorios apropiados

### 🚀 **Scripts de Deploy**

#### `deploy-assets.sh`
Script para deployment de assets estáticos.
- Compila y optimiza assets para producción
- Copia archivos a directorios de destino

#### `check-assets.sh`
Script para verificar la integridad de los assets.
- Valida que todos los assets requeridos estén presentes
- Verifica integridad de archivos CSS/JS

## Uso

Antes de ejecutar cualquier script, asegúrate de tener los permisos necesarios:

```bash
chmod +x scripts/*.sh
```

Para scripts PHP, ejecuta desde la raíz del proyecto:

```bash
php scripts/nombre-del-script.php
```

Para scripts Bash:

```bash
./scripts/nombre-del-script.sh
``` 