# Documentación Técnica - Sistema de Gestión de Densímetros INDARCA

## 1. Arquitectura del Sistema

### 1.1 Visión General
El sistema de gestión de densímetros INDARCA está desarrollado con el framework Laravel (PHP), siguiendo una arquitectura MVC (Modelo-Vista-Controlador). La aplicación permite gestionar todo el ciclo de reparación de densímetros nucleares, desde su recepción hasta su entrega.

### 1.2 Componentes Principales
- **Frontend**: Blade (motor de plantillas de Laravel) + JavaScript/jQuery
- **Backend**: PHP 8.1+ / Laravel
- **Base de Datos**: MySQL/MariaDB
- **Autenticación**: Sistema nativo de Laravel con personalización para verificación por código

## 2. Estructura del Proyecto

### 2.1 Directorios Principales
- `/app`: Contiene el código fuente de la aplicación
  - `/app/Models`: Modelos de datos (Densimetro, User, Empresa, etc.)
  - `/app/Http/Controllers`: Controladores que manejan las peticiones
  - `/app/Services`: Servicios para lógica de negocio
  - `/app/Helpers`: Funciones auxiliares
- `/routes`: Definición de rutas de la aplicación
- `/resources/views`: Plantillas Blade para la interfaz de usuario
- `/public`: Archivos accesibles públicamente (CSS, JS, imágenes)
- `/database`: Migraciones y seeders para la base de datos
- `/config`: Archivos de configuración

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

### 3.2 User
Gestiona los usuarios del sistema con diferentes roles.
- **Roles**:
  - `admin`: Acceso completo al sistema
  - `trabajador`: Gestión de densímetros y seguimiento
  - `cliente`: Consulta de sus equipos

### 3.3 Empresa
Representa una empresa cliente.
- **Atributos principales**:
  - `nombre`: Nombre de la empresa
  - `direccion`: Dirección física
  - `telefono`: Teléfono de contacto
  - `email`: Correo electrónico

### 3.4 DensimetroArchivo
Gestiona los archivos adjuntos a cada densímetro.

## 4. Flujos de Trabajo Principales

### 4.1 Registro de Densímetros
1. El administrador o trabajador registra un nuevo densímetro
2. Se asigna automáticamente una referencia única de reparación
3. Se asocia a un cliente existente
4. Se establece el estado inicial y se puede añadir documentación

### 4.2 Seguimiento de Reparaciones
1. El equipo se actualiza a través del panel de administración
2. Se pueden agregar archivos y observaciones
3. Se actualiza el estado del densímetro según avanza la reparación
4. Al completarse, se establece la fecha de finalización

### 4.3 Consulta de Estado
1. Los clientes pueden consultar el estado de sus equipos
2. El sistema permite búsqueda por número de serie o referencia
3. Se muestra información detallada del avance de la reparación

## 5. API y Servicios

### 5.1 API RESTful
El sistema proporciona endpoints para:
- Consulta de densímetros
- Actualización de estados
- Gestión de usuarios y empresas

### 5.2 Servicio de Caché
Implementado para optimizar consultas frecuentes:
- Búsqueda de densímetros por número de serie
- Verificación de disponibilidad de equipos

## 6. Seguridad

### 6.1 Autenticación y Autorización
- Autenticación basada en Laravel Fortify
- Verificación por código para mayor seguridad
- Middleware de roles para proteger rutas según el perfil de usuario

### 6.2 Validación de Datos
- Validación en el servidor para todas las entradas de usuario
- Protección contra CSRF en formularios
- Sanitización de datos para prevenir inyección SQL

## 7. Reportes y Exportación

### 7.1 Generación de Informes
El sistema permite generar:
- Informes de estado de densímetros
- Listados de clientes y empresas
- Estadísticas de reparaciones

### 7.2 Formatos de Exportación
- PDF para documentos formales
- Excel para análisis de datos

## 8. Configuración del Sistema

### 8.1 Variables de Entorno
Las principales configuraciones se controlan a través del archivo `.env`:
- Conexión a base de datos
- Configuración de correo electrónico
- Ajustes de aplicación

### 8.2 Configuración de Correo
El sistema utiliza el servicio de correo configurado para:
- Notificaciones de estado
- Restablecimiento de contraseñas
- Verificación de cuentas

## 9. Gestión de Archivos

### 9.1 Almacenamiento
Los archivos de densímetros se almacenan en:
- Disco local (configuración por defecto)
- Posibilidad de configurar almacenamiento en la nube

### 9.2 Tipos de Archivos Soportados
- Documentos (PDF, DOC, DOCX)
- Imágenes (JPG, PNG)
- Archivos comprimidos (ZIP)

## 10. Logs y Monitoreo

### 10.1 Sistema de Logs
- Registro de actividades críticas
- Seguimiento de errores
- Auditoría de acciones de usuarios

### 10.2 Monitoreo de Rendimiento
- Caché para consultas frecuentes
- Optimización de consultas a base de datos 
