# Persistencia de Imágenes en Storage

## Descripción

Se han realizado modificaciones en el sistema para que todas las imágenes subidas (logos de empresas, fotos de miembros del equipo y archivos de densímetros) se mantengan permanentemente en el storage, incluso cuando se actualicen o eliminen los registros asociados.

## Cambios Realizados

### 1. TeamController.php
**Archivo:** `app/Http/Controllers/Admin/TeamController.php`

#### Método `update()`
- **Líneas modificadas:** 157-160
- **Cambio:** Se comentó la eliminación de la imagen anterior cuando se actualiza un miembro del equipo
- **Antes:**
  ```php
  if ($teamMember->image) {
      Storage::disk('public')->delete($teamMember->image);
  }
  ```
- **Después:**
  ```php
  // COMENTADO: No eliminar imagen anterior para mantener historial
  // if ($teamMember->image) {
  //     Storage::disk('public')->delete($teamMember->image);
  // }
  ```

#### Método `destroy()`
- **Líneas modificadas:** 200-203
- **Cambio:** Se comentó la eliminación de la imagen cuando se elimina un miembro del equipo
- **Antes:**
  ```php
  if ($teamMember->image) {
      Storage::disk('public')->delete($teamMember->image);
  }
  ```
- **Después:**
  ```php
  // COMENTADO: No eliminar imagen para mantener historial en storage
  // if ($teamMember->image) {
  //     Storage::disk('public')->delete($teamMember->image);
  // }
  ```

### 2. EmpresaController.php
**Archivo:** `app/Http/Controllers/EmpresaController.php`

#### Método `update()`
- **Líneas modificadas:** 186-189
- **Cambio:** Se comentó la eliminación del logo anterior cuando se actualiza una empresa
- **Antes:**
  ```php
  if ($empresa->logo && \Storage::disk('public')->exists($empresa->logo)) {
      \Storage::disk('public')->delete($empresa->logo);
  }
  ```
- **Después:**
  ```php
  // COMENTADO: No eliminar imagen anterior para mantener historial
  // if ($empresa->logo && \Storage::disk('public')->exists($empresa->logo)) {
  //     \Storage::disk('public')->delete($empresa->logo);
  // }
  ```

### 3. DensimetroArchivoController.php
**Archivo:** `app/Http/Controllers/DensimetroArchivoController.php`

#### Método `destroy()`
- **Líneas modificadas:** 104-107
- **Cambio:** Se comentó la eliminación del archivo físico cuando se elimina un registro de archivo
- **Antes:**
  ```php
  if (Storage::disk('public')->exists($archivo->ruta_archivo)) {
      Storage::disk('public')->delete($archivo->ruta_archivo);
  }
  ```
- **Después:**
  ```php
  // COMENTADO: No eliminar archivo físico para mantener historial en storage
  // if (Storage::disk('public')->exists($archivo->ruta_archivo)) {
  //     Storage::disk('public')->delete($archivo->ruta_archivo);
  // }
  ```

## Beneficios

1. **Historial Completo:** Todas las imágenes subidas se mantienen en el servidor, permitiendo un historial completo de cambios
2. **Recuperación de Datos:** En caso de errores o necesidad de restaurar imágenes anteriores, los archivos siguen disponibles
3. **Auditoría:** Facilita la auditoría y seguimiento de cambios en el sistema
4. **Backup Completo:** Los backups del storage incluirán todas las imágenes históricas

## Consideraciones

### Espacio en Disco
- **Impacto:** El espacio utilizado en disco aumentará con el tiempo al no eliminar archivos
- **Recomendación:** Implementar un sistema de limpieza periódica manual o automatizada si es necesario

### Gestión de Archivos Huérfanos
- **Situación:** Archivos que ya no están referenciados en la base de datos pero siguen en el storage
- **Solución:** Se puede crear un comando artisan para identificar y opcionalmente limpiar archivos huérfanos

## Rutas de Storage Afectadas

- `storage/app/public/team/` - Fotos de miembros del equipo
- `storage/app/public/logos/` - Logos de empresas
- `storage/app/public/archivos/densimetros/` - Archivos de densímetros

## Comando para Identificar Archivos Huérfanos (Futuro)

Se puede implementar un comando artisan para gestionar archivos huérfanos:

```bash
php artisan storage:cleanup --dry-run  # Ver archivos huérfanos
php artisan storage:cleanup --force    # Eliminar archivos huérfanos
```

## Fecha de Implementación

**Fecha:** Diciembre 2024
**Desarrollador:** Asistente IA
**Motivo:** Solicitud del usuario para mantener persistencia de imágenes en el tiempo

## Comando Artisan Incluido

Se ha creado un comando artisan para gestionar archivos huérfanos:

```bash
# Ver archivos huérfanos sin eliminar
php artisan storage:cleanup --dry-run

# Eliminar archivos huérfanos (con confirmación)
php artisan storage:cleanup --force
```

**Archivo:** `app/Console/Commands/StorageCleanup.php` 
