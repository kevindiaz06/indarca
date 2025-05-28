# Documentación Técnica - Sistema de Gestión de Densímetros INDARCA

## 1. Arquitectura del Sistema

### 1.1 Visión General
El sistema de gestión de densímetros INDARCA está desarrollado con el framework Laravel 12.x (PHP 8.2+), siguiendo una arquitectura MVC (Modelo-Vista-Controlador) con patrones adicionales como Repository y Service. La aplicación permite gestionar todo el ciclo de reparación de densímetros nucleares, desde su recepción hasta su entrega, incluyendo un sistema avanzado de calibración.

### 1.2 Componentes Principales
- **Frontend**: Blade (motor de plantillas de Laravel) + Bootstrap 5.2.3 + JavaScript/jQuery
- **Backend**: PHP 8.2+ / Laravel 12.x
- **Base de Datos**: MySQL 8.0 / MariaDB 10.3+
- **Autenticación**: Laravel Sanctum + Sistema personalizado de verificación por código
- **Build Tool**: Vite 4.0
- **Contenedores**: Docker + Docker Compose
- **API**: RESTful con documentación Swagger (L5-Swagger)

### 1.3 Patrones Arquitectónicos
- **MVC**: Separación clara entre Modelo, Vista y Controlador
- **Repository Pattern**: Abstracción de la capa de datos
- **Service Pattern**: Lógica de negocio encapsulada
- **Facade Pattern**: Interfaces simplificadas para servicios complejos
- **Observer Pattern**: Eventos y listeners para acciones del sistema

## 2. Estructura del Proyecto

### 2.1 Directorios Principales
```
app/
├── Console/           # Comandos Artisan personalizados
├── Exceptions/        # Manejo personalizado de excepciones
├── Exports/          # Clases para exportación de datos
├── Facades/          # Facades personalizados
├── Helpers/          # Funciones auxiliares globales
├── Http/
│   ├── Controllers/  # Controladores de la aplicación
│   │   ├── Admin/    # Controladores del panel administrativo
│   │   ├── Api/      # Controladores de API RESTful
│   │   └── Auth/     # Controladores de autenticación
│   ├── Middleware/   # Middleware personalizado
│   └── Requests/     # Clases de validación de formularios
├── Imports/          # Clases para importación de datos
├── Mail/             # Clases de correo electrónico
├── Models/           # Modelos Eloquent
├── Notifications/    # Sistema de notificaciones
├── Policies/         # Políticas de autorización
├── Providers/        # Proveedores de servicios
├── Repositories/     # Implementación del patrón Repository
├── Rules/            # Reglas de validación personalizadas
└── Services/         # Servicios de lógica de negocio
```

### 2.2 Configuración Docker
- **Dockerfile**: Configuración para PHP 8.2 con Apache
- **docker-compose.yml**: Orquestación de servicios (app, nginx, mysql)
- **Scripts de utilidad**: deploy-assets.sh, check-assets.sh

## 3. Modelos de Datos

### 3.1 Densimetro
Representa un equipo densímetro nuclear en reparación.
- **Atributos principales**:
  - `cliente_id`: ID del cliente propietario
  - `numero_serie`: Número de serie único del equipo
  - `marca`: Marca del densímetro
  - `modelo`: Modelo del densímetro
  - `fecha_entrada`: Fecha de recepción
  - `fecha_finalizacion`: Fecha de finalización de la reparación
  - `referencia_reparacion`: Código único de referencia
  - `estado`: Estado actual del equipo
  - `observaciones`: Notas adicionales
  - `calibrado`: Estado de calibración (boolean)
  - `fecha_proxima_calibracion`: Fecha de vencimiento de calibración

- **Funcionalidades avanzadas**:
  - Sistema de caché optimizado para consultas frecuentes
  - Verificación automática de estado de calibración
  - Generación automática de referencias únicas
  - Invalidación automática de caché en actualizaciones

### 3.2 User
Gestiona los usuarios del sistema con diferentes roles.
- **Roles**:
  - `admin`: Acceso completo al sistema
  - `trabajador`: Gestión de densímetros y seguimiento
  - `cliente`: Consulta de sus equipos
- **Funcionalidades**:
  - Verificación por código de email
  - Gestión de perfiles personalizables
  - Sistema de roles y permisos

### 3.3 Empresa
Representa una empresa cliente.
- **Atributos principales**:
  - `nombre`: Nombre de la empresa
  - `direccion`: Dirección física
  - `telefono`: Teléfono de contacto
  - `email`: Correo electrónico
  - `logo`: Logo personalizado de la empresa
  - `tipo_cliente`: Tipo de cliente
  - `activo`: Estado activo/inactivo

### 3.4 DensimetroArchivo
Gestiona los archivos adjuntos a cada densímetro.
- **Funcionalidades**:
  - Subida de múltiples tipos de archivo
  - Gestión de permisos y acceso
  - Visualización y descarga segura

### 3.5 Nuevos Modelos
- **TeamMember**: Gestión del equipo de trabajo
- **SystemSetting**: Configuraciones del sistema
- **PendingVerification**: Verificaciones pendientes
- **VerificationCode**: Códigos de verificación
- **Cliente**: Información específica de clientes
- **Persona**: Datos personales base

## 4. Flujos de Trabajo Principales

### 4.1 Registro de Densímetros
1. El administrador o trabajador registra un nuevo densímetro
2. Se asigna automáticamente una referencia única de reparación
3. Se asocia a un cliente existente
4. Se establece el estado inicial y se puede añadir documentación
5. Se configura el estado de calibración si aplica

### 4.2 Seguimiento de Reparaciones
1. El equipo se actualiza a través del panel de administración
2. Se pueden agregar archivos y observaciones
3. Se actualiza el estado del densímetro según avanza la reparación
4. Sistema automático de verificación de calibración
5. Al completarse, se establece la fecha de finalización

### 4.3 Consulta de Estado
1. Los clientes pueden consultar el estado de sus equipos
2. El sistema permite búsqueda por número de serie o referencia
3. Se muestra información detallada del avance de la reparación
4. Consulta específica de calibración disponible
5. Generación de PDFs de estado

### 4.4 Sistema de Calibración
1. Registro de fechas de calibración
2. Verificación automática de vencimientos
3. Actualización automática de estados
4. Notificaciones de calibraciones próximas a vencer

## 5. API y Servicios

### 5.1 API RESTful
El sistema proporciona endpoints para:
- Consulta de densímetros por número de serie
- Verificación de disponibilidad de equipos
- Actualización de estados
- Gestión de usuarios y empresas

**Endpoints principales**:
```
GET /api/densimetros/buscar?numero_serie={serie}
```

### 5.2 Servicios Especializados

#### DensimetroService
- Lógica compleja de gestión de densímetros
- Validaciones de negocio
- Integración con sistema de caché

#### CacheService
- Gestión centralizada de caché
- Invalidación automática
- Optimización de consultas frecuentes

#### ExportService
- Generación de reportes PDF
- Exportación a Excel
- Formateo de datos

#### BackupService
- Respaldos automáticos
- Gestión de archivos de respaldo
- Restauración de datos

#### LoggingService
- Registro de actividades críticas
- Auditoría de acciones
- Monitoreo del sistema

## 6. Seguridad

### 6.1 Autenticación y Autorización
- Autenticación basada en Laravel Sanctum
- Verificación por código para mayor seguridad
- Middleware de roles para proteger rutas según el perfil de usuario
- Sistema de tokens JWT para API

### 6.2 Middleware de Seguridad
- **XssProtection**: Protección contra ataques XSS
- **ValidateJwtToken**: Validación de tokens JWT
- **RateLimit**: Limitación de peticiones por minuto
- **CORS**: Configuración de políticas de origen cruzado

### 6.3 Validación de Datos
- Validación en el servidor para todas las entradas de usuario
- Protección contra CSRF en formularios
- Sanitización de datos para prevenir inyección SQL
- Reglas de validación personalizadas

## 7. Reportes y Exportación

### 7.1 Generación de Informes
El sistema permite generar:
- Informes de estado de densímetros
- Listados de clientes y empresas
- Estadísticas de reparaciones
- Reportes de calibración
- Dashboard en tiempo real

### 7.2 Formatos de Exportación
- **PDF**: Documentos formales con DomPDF
- **Excel**: Análisis de datos con Maatwebsite Excel
- **Reportes personalizados**: Formateo específico por tipo

### 7.3 Nuevas Funcionalidades de Reportes
- Exportación de dashboard completo
- Reportes filtrados por fechas
- Estadísticas avanzadas
- Gráficos y visualizaciones

## 8. Configuración del Sistema

### 8.1 Variables de Entorno
Las principales configuraciones se controlan a través del archivo `.env`:
- Conexión a base de datos MySQL 8.0
- Configuración de correo electrónico
- Ajustes de aplicación
- Configuración de caché
- Configuración de API

### 8.2 Configuración de Correo
El sistema utiliza el servicio de correo configurado para:
- Notificaciones de estado
- Restablecimiento de contraseñas
- Verificación de cuentas por código
- Alertas de calibración

### 8.3 Configuración Docker
- Variables de entorno para contenedores
- Configuración de volúmenes persistentes
- Red interna para servicios
- Configuración de puertos

## 9. Gestión de Archivos

### 9.1 Almacenamiento
Los archivos de densímetros se almacenan en:
- Disco local (configuración por defecto)
- Soporte para almacenamiento en la nube
- Sistema de enlaces simbólicos de Laravel

### 9.2 Tipos de Archivos Soportados
- Documentos (PDF, DOC, DOCX)
- Imágenes (JPG, PNG, WebP)
- Archivos comprimidos (ZIP, RAR)
- Hojas de cálculo (XLS, XLSX)

### 9.3 Gestión Avanzada
- Subida múltiple de archivos
- Previsualización de archivos
- Control de tamaño y tipo
- Gestión de permisos por archivo

## 10. Logs y Monitoreo

### 10.1 Sistema de Logs
- Registro de actividades críticas con LoggingService
- Seguimiento de errores detallado
- Auditoría de acciones de usuarios
- Logs de calibración automática

### 10.2 Monitoreo de Rendimiento
- Sistema de caché optimizado con CacheService
- Optimización de consultas a base de datos
- Rate limiting en API
- Monitoreo de tiempo de respuesta

### 10.3 Métricas del Sistema
- Dashboard con estadísticas en tiempo real
- Métricas de uso por usuario
- Estadísticas de densímetros por estado
- Análisis de rendimiento

## 11. Tecnologías y Dependencias

### 11.1 Backend Dependencies
```json
{
  "php": "^8.2",
  "laravel/framework": "^12.0",
  "laravel/sanctum": "^4.0",
  "barryvdh/laravel-dompdf": "^3.1",
  "maatwebsite/excel": "^3.1",
  "darkaonline/l5-swagger": "^8.5"
}
```
