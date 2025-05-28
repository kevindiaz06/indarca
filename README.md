# INDARCA - Sistema de Gestión de Densímetros Nucleares

<p align="center">
  <img src="public/assets/img/logo-indarca.png" alt="Logo INDARCA" width="300">
</p>

## Sobre INDARCA

INDARCA es una empresa especializada en servicios de ingeniería, arquitectura y calibración de densímetros nucleares. El sistema permite:

- Control y seguimiento completo del ciclo de reparación de densímetros
- Gestión integral de clientes y empresas
- Sistema de consulta pública del estado de reparaciones
- Panel administrativo para gestionar el proceso completo
- Generación de reportes y estadísticas
- Exportación de datos en formatos PDF y Excel
- Sistema de calibración con seguimiento de fechas de vencimiento
- Gestión de archivos adjuntos por densímetro
- API RESTful para integración con sistemas externos

## Datos de Contacto

- **Dirección**: C. C 16, Santo Domingo Este 11506, República Dominicana
- **Teléfono**: +18095960333
- **Horario**: Lunes - Viernes: 9:00 AM - 5:00 PM
- **Email**: contacto@indarca.com

## Redes Sociales

- [LinkedIn](https://www.linkedin.com/company/indarca-srl/)
- [Facebook](https://www.facebook.com/share/1EJq41gUNs/?mibextid=wwXIfr)
- [Instagram](https://www.instagram.com/indarca.srl?igsh=MXZzN2l3cTBxaG1jOA==)
- [Twitter/X](https://x.com/indarca_srl?s=11)

## Características principales

### Gestión de densímetros
- Registro completo de equipos con información técnica
- Asignación automática de referencia única de reparación
- Seguimiento del estado de reparación en tiempo real
- Historial completo de reparaciones
- Adjuntar archivos y documentación técnica
- Sistema de calibración con fechas de vencimiento automático
- Verificación automática de estado de calibración

### Gestión de usuarios
- Sistema de roles: administrador, trabajador y cliente
- Verificación de cuentas por email con códigos de verificación
- Perfiles personalizables
- Control de acceso basado en roles
- Gestión de equipos de trabajo

### Gestión de empresas
- Registro detallado de empresas cliente
- Asociación de usuarios a empresas
- Historial de servicios por empresa
- Estado activo/inactivo de empresas
- Logos personalizados por empresa

### Consulta pública
- Consulta de estado sin necesidad de iniciar sesión
- Búsqueda por número de serie o referencia
- Visualización de estado actual de la reparación
- Consulta específica de calibración
- Generación de PDFs de estado

### Panel administrativo
- Dashboard con estadísticas en tiempo real
- Gestión completa de densímetros, usuarios y empresas
- Generación de reportes personalizados
- Exportación de datos en diferentes formatos
- Gestión de archivos adjuntos
- Sistema de caché optimizado

### API RESTful
- Endpoints para consulta de densímetros
- Rate limiting para protección
- Búsqueda por número de serie
- Verificación de disponibilidad de equipos

## Documentación

El proyecto incluye documentación completa:

- **[Documentación Técnica](documentacion_tecnica.md)**: Detalles de la arquitectura, modelos y componentes del sistema
- **[Manual de Usuario](manual_usuario.md)**: Guía paso a paso para todos los usuarios del sistema
- **[Guía de Implementación](guia_implementacion.md)**: Instrucciones detalladas para instalar y configurar el sistema
- **[Análisis del Backend](analisis_backend_indarca.md)**: Evaluación técnica del código y recomendaciones
- **[Evaluación UX/UI](examenUX.md)**: Análisis de experiencia de usuario y mejoras sugeridas

## Requisitos técnicos

- **PHP**: >= 8.2
- **Laravel**: ^12.0
- **Composer**: Última versión
- **MySQL**: 8.0+ / MariaDB 10.3+
- **Node.js**: v18+ y npm
- **Servidor web**: Apache 2.4+ o Nginx 1.18+
- **Extensiones PHP requeridas**:
  - BCMath, Ctype, Fileinfo, JSON, Mbstring
  - OpenSSL, PDO, Tokenizer, XML
  - GD (para procesamiento de imágenes)
  - ZIP (para exportación y manejo de archivos)

## Tecnologías utilizadas

### Backend
- **Framework**: Laravel 12.x
- **Base de datos**: MySQL 8.0
- **Autenticación**: Laravel Sanctum
- **Generación PDF**: DomPDF
- **Exportación Excel**: Maatwebsite Excel
- **Documentación API**: L5-Swagger

### Frontend
- **Motor de plantillas**: Blade
- **CSS Framework**: Bootstrap 5.2.3
- **JavaScript**: Vanilla JS + jQuery
- **Build tool**: Vite 4.0
- **Preprocesador CSS**: Sass

### DevOps
- **Contenedores**: Docker + Docker Compose
- **Servidor web**: Apache/Nginx
- **Cache**: Sistema de caché integrado de Laravel

## Instalación rápida

### Instalación tradicional

1. **Clonar el repositorio**
```bash
git clone https://github.com/tuusuario/indarca.git
cd indarca
```

2. **Instalar dependencias**
```bash
composer install
npm install
```

3. **Configurar entorno**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configurar base de datos en el archivo .env**

5. **Ejecutar migraciones y seeders**
```bash
php artisan migrate --seed
```

6. **Compilar assets y iniciar servidor**
```bash
npm run build
php artisan serve
```

### Instalación con Docker

1. **Clonar el repositorio**
```bash
git clone https://github.com/tuusuario/indarca.git
cd indarca
```

2. **Configurar variables de entorno**
```bash
cp .env.example .env
# Editar .env con la configuración de Docker
```

3. **Construir y ejecutar contenedores**
```bash
docker-compose up -d --build
```

4. **Ejecutar migraciones dentro del contenedor**
```bash
docker-compose exec app php artisan migrate --seed
```

Para una instalación más detallada, consulte la [Guía de Implementación](guia_implementacion.md).

## Credenciales de prueba

### Administrador
- Email: admin@indarca.com
- Contraseña: admin123

### Trabajador
- Email: trabajador@indarca.com
- Contraseña: trabajador123

### Cliente
- Email: cliente@example.com
- Contraseña: cliente123

> **IMPORTANTE**: Cambie estas contraseñas inmediatamente después de la instalación.

## Estructura del proyecto

```
indarca/
├── app/
│   ├── Console/           # Comandos de consola
│   ├── Exceptions/        # Manejo de excepciones
│   ├── Exports/          # Clases de exportación
│   ├── Facades/          # Facades personalizados
│   ├── Helpers/          # Funciones auxiliares
│   ├── Http/
│   │   ├── Controllers/  # Controladores
│   │   │   ├── Admin/    # Controladores del panel admin
│   │   │   ├── Api/      # Controladores de API
│   │   │   └── Auth/     # Controladores de autenticación
│   │   ├── Middleware/   # Middleware personalizado
│   │   └── Requests/     # Validación de formularios
│   ├── Imports/          # Clases de importación
│   ├── Mail/             # Clases de correo
│   ├── Models/           # Modelos Eloquent
│   ├── Notifications/    # Notificaciones
│   ├── Policies/         # Políticas de autorización
│   ├── Providers/        # Proveedores de servicios
│   ├── Repositories/     # Patrón repositorio
│   ├── Rules/            # Reglas de validación
│   └── Services/         # Servicios de negocio
├── bootstrap/            # Archivos de arranque
├── config/               # Configuración
├── database/
│   ├── factories/        # Factories para testing
│   ├── migrations/       # Migraciones de BD
│   └── seeders/          # Seeders de datos
├── docker/               # Configuración Docker
├── public/               # Archivos públicos
├── resources/
│   ├── js/               # JavaScript
│   ├── sass/             # Archivos Sass
│   └── views/            # Plantillas Blade
├── routes/               # Definición de rutas
├── storage/              # Almacenamiento
└── tests/                # Tests automatizados
```

## Funcionalidades avanzadas

### Sistema de caché
- Caché optimizado para consultas frecuentes
- Invalidación automática de caché
- Mejora significativa del rendimiento

### Sistema de archivos
- Subida de múltiples archivos por densímetro
- Visualización y descarga de archivos
- Gestión de permisos de archivos

### Reportes avanzados
- Generación de PDFs personalizados
- Exportación a Excel con formato
- Reportes de dashboard en tiempo real

### API RESTful
- Rate limiting configurado
- Documentación con Swagger
- Endpoints seguros y optimizados

## Mantenimiento

Para mantener el sistema actualizado y seguro:

```bash
# Actualizar dependencias
composer update
npm update

# Optimizar para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Limpiar caché
php artisan optimize:clear
```

## Scripts de utilidad

El proyecto incluye scripts útiles:

- `deploy-assets.sh`: Script para despliegue de assets
- `check-assets.sh`: Verificación de assets compilados
- `rename_images.php`: Utilidad para renombrar imágenes

## Seguridad

- Middleware de protección XSS
- Validación JWT para tokens
- Rate limiting en API
- Validación robusta de formularios
- Protección CSRF en todas las rutas

## Licencia

Este proyecto es software propietario de INDARCA SRL.

---

## Contribución

Para contribuir al proyecto:

1. Fork el repositorio
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## Soporte

Para soporte técnico, contacte a:
- **Email técnico**: soporte@indarca.com
- **Teléfono**: +18095960333
- **Horario de soporte**: Lunes - Viernes: 9:00 AM - 5:00 PM (GMT-4)
