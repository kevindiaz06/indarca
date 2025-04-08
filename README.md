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

### Gestión de usuarios
- Sistema de roles: administrador, trabajador y cliente
- Verificación de cuentas por email
- Perfiles personalizables
- Control de acceso basado en roles

### Gestión de empresas
- Registro detallado de empresas cliente
- Asociación de usuarios a empresas
- Historial de servicios por empresa

### Consulta pública
- Consulta de estado sin necesidad de iniciar sesión
- Búsqueda por número de serie o referencia
- Visualización de estado actual de la reparación

### Panel administrativo
- Dashboard con estadísticas en tiempo real
- Gestión completa de densímetros, usuarios y empresas
- Generación de reportes personalizados
- Exportación de datos en diferentes formatos

## Documentación

El proyecto incluye documentación completa:

- **[Documentación Técnica](documentacion_tecnica.md)**: Detalles de la arquitectura, modelos y componentes del sistema
- **[Manual de Usuario](manual_usuario.md)**: Guía paso a paso para todos los usuarios del sistema
- **[Guía de Implementación](guia_implementacion.md)**: Instrucciones detalladas para instalar y configurar el sistema

## Requisitos técnicos

- PHP >= 8.1
- Composer
- MySQL 5.7+ / MariaDB 10.3+
- Node.js (v14+) y npm
- Servidor web: Apache 2.4+ o Nginx 1.18+
- Extensiones PHP requeridas:
  - BCMath, Ctype, Fileinfo, JSON, Mbstring
  - OpenSSL, PDO, Tokenizer, XML
  - GD (para procesamiento de imágenes)
  - ZIP (para exportación y manejo de archivos)

## Instalación rápida

1. Clonar el repositorio
```bash
git clone https://github.com/tuusuario/indarca.git
cd indarca
```

2. Instalar dependencias
```bash
composer install
npm install
```

3. Configurar entorno
```bash
cp .env.example .env
php artisan key:generate
```

4. Configurar base de datos en el archivo .env

5. Ejecutar migraciones y seeders
```bash
php artisan migrate --seed
```

6. Compilar assets y iniciar servidor
```bash
npm run dev
php artisan serve
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

- `app/Models`: Modelos de datos (Densimetro, User, Empresa, DensimetroArchivo)
- `app/Http/Controllers`: Controladores para la lógica de negocio
- `app/Services`: Servicios para procesos complejos y reutilizables
- `app/Helpers`: Funciones auxiliares y utilidades
- `resources/views`: Plantillas Blade para la interfaz de usuario
- `routes`: Definición de rutas web y API
- `public`: Archivos accesibles públicamente (CSS, JS, imágenes)
- `database`: Migraciones y seeders para la base de datos
- `config`: Archivos de configuración del sistema

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
```

## Licencia

Este proyecto es software propietario de INDARCA.
