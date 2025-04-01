# INDARCA - Sistema de Gestión de Densímetros

<p align="center">
  <img src="public/assets/img/logo-indarca.png" alt="Logo INDARCA" width="300">
</p>

## Sobre INDARCA

INDARCA es una empresa especializada en servicios de ingeniería, arquitectura y calibración de densímetros nucleares. El sistema permite:

- Control y seguimiento de reparaciones de densímetros
- Gestión de clientes y empresas
- Sistema de consulta del estado de reparaciones
- Panel administrativo para gestionar el proceso completo

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

- **Gestión de densímetros**: Registro, seguimiento y control de los equipos en reparación
- **Gestión de usuarios**: Administración de usuarios con roles de administrador, trabajador y cliente
- **Gestión de empresas**: Control de las empresas asociadas al sistema
- **Consulta pública**: Formulario para que los clientes puedan consultar el estado de sus equipos
- **Panel administrativo**: Interfaz completa para la gestión del sistema

## Requisitos técnicos

- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js y npm

## Instalación

1. Clonar el repositorio
```bash
git clone https://github.com/tuusuario/indarca.git
cd indarca
```

2. Instalar dependencias de PHP
```bash
composer install
```

3. Instalar dependencias de JavaScript
```bash
npm install
```

4. Copiar el archivo de entorno y configurarlo
```bash
cp .env.example .env
```

5. Generar clave de aplicación
```bash
php artisan key:generate
```

6. Configurar la base de datos en el archivo .env

7. Ejecutar migraciones y seeders
```bash
php artisan migrate --seed
```

8. Compilar assets
```bash
npm run dev
```

9. Iniciar el servidor
```bash
php artisan serve
```

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

## Estructura del proyecto

- `app/Models`: Modelos de la aplicación (Densimetro, Empresa, User)
- `app/Http/Controllers`: Controladores para cada sección
- `resources/views`: Vistas divididas por secciones
- `routes/web.php`: Definición de rutas de la aplicación

## Licencia

Este proyecto es software propietario de INDARCA.
=======
# indarca
