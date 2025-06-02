# 🍪 Banner de Cookies para INDARCA

## 📋 Descripción

Banner de cookies moderno y profesional desarrollado con Bootstrap 5 para el sitio web de INDARCA. Cumple con todos los requisitos especificados incluyendo diseño flotante, bloqueo de navegación, persistencia de datos y animaciones elegantes.

## ✨ Características

### ✅ Requisitos Cumplidos
- **✓ Flotante**: Posicionado fijo en la parte inferior de la pantalla
- **✓ Bloqueo de navegación**: Desactiva el scroll hasta que se acepten las cookies
- **✓ Diseño moderno**: Utiliza componentes y clases de Bootstrap 5
- **✓ Texto personalizado**: "Este sitio web utiliza cookies para mejorar la experiencia del usuario."
- **✓ Botón único**: Solo incluye botón "Aceptar" (sin opción de rechazar)
- **✓ Persistencia**: Guarda la preferencia en localStorage
- **✓ Animación**: Entrada suave con efecto deslizante desde abajo

### 🎨 Características Adicionales
- **Responsive**: Se adapta perfectamente a móviles y tablets
- **Accesibilidad**: Soporte para tecla Escape y enfoque automático
- **Efecto blur**: Fondo difuminado mientras el banner está activo
- **Iconografía**: Iconos de Bootstrap para mejor UX
- **Analytics ready**: Dispara evento personalizado al aceptar
- **Prevención táctil**: Bloquea scroll en dispositivos móviles

## 📁 Archivos Creados

```
resources/views/partials/cookie-banner.blade.php  # Componente principal
resources/views/demo-cookies.blade.php            # Página de demostración
routes/web.php                                    # Ruta agregada
BANNER_COOKIES_README.md                          # Este archivo
```

## 🚀 Instalación

### 1. Archivos ya incluidos
Los siguientes archivos ya están creados e integrados:

- `resources/views/partials/cookie-banner.blade.php` - Componente del banner
- Inclusión automática en `resources/views/layout.blade.php`
- Ruta de demo en `routes/web.php`

### 2. Verificar dependencias
Asegúrate de que tu proyecto tenga:
- Bootstrap 5 (ya incluido en el layout)
- Bootstrap Icons (ya incluido en el layout)

## 🔧 Uso

### Integración Automática
El banner se incluye automáticamente en todas las páginas que extienden el layout principal:

```php
@extends('layout')

@section('content')
    <!-- Tu contenido aquí -->
@endsection
```

### Integración Manual (opcional)
Si necesitas incluirlo en un layout diferente:

```php
{{-- En tu vista Blade --}}
@include('partials.cookie-banner')
```

## 🎯 Funcionamiento

### 1. Detección Automática
- Al cargar la página, verifica si existe `cookies-accepted` en localStorage
- Si no existe, muestra el banner después de 1 segundo
- Si existe, no muestra el banner

### 2. Bloqueo de Navegación
Mientras el banner está visible:
- Agrega clase `cookie-banner-active` al body
- Aplica `overflow: hidden` y `position: fixed`
- Previene scroll con rueda del ratón
- Previene scroll táctil en móviles

### 3. Aceptación
Al hacer clic en "Aceptar":
- Guarda `cookies-accepted: true` en localStorage
- Guarda timestamp en `cookies-accepted-date`
- Remueve el bloqueo de navegación
- Anima la salida del banner
- Dispara evento `cookies-accepted`

## 🎨 Personalización

### Colores y Estilos
El banner utiliza las variables CSS de tu proyecto:

```css
:root {
    --color-primary: #F40006;  /* Color principal de INDARCA */
}
```

### Modificar Texto
Edita el archivo `resources/views/partials/cookie-banner.blade.php`:

```html
<p class="mb-0 text-muted small">Tu texto personalizado aquí</p>
```

### Cambiar Temporización
Modifica los delays en el JavaScript del componente:

```javascript
// Cambiar delay de aparición (actualmente 1000ms = 1 segundo)
setTimeout(() => {
    // mostrar banner
}, 1000);
```

## 📱 Responsividad

### Desktop
- Banner ancho completo con contenido centrado
- Botón alineado a la derecha
- Icono y texto en línea horizontal

### Mobile/Tablet
- Contenido centrado verticalmente
- Botón ocupa ancho completo
- Icono más pequeño
- Márgenes ajustados

## 🔧 API de JavaScript

### Eventos Disponibles

```javascript
// Escuchar cuando se aceptan las cookies
window.addEventListener('cookies-accepted', function(event) {
    console.log('Cookies aceptadas:', event.detail);
    // Aquí puedes activar Google Analytics, Facebook Pixel, etc.
});
```

### Métodos Útiles

```javascript
// Verificar si las cookies han sido aceptadas
const accepted = localStorage.getItem('cookies-accepted') === 'true';

// Resetear el banner (para testing)
localStorage.removeItem('cookies-accepted');

// Obtener fecha de aceptación
const acceptedDate = localStorage.getItem('cookies-accepted-date');
```

## 🧪 Testing

### Página de Demostración
Visita: `http://tu-dominio.com/demo-cookies`

### Resetear Banner
Para volver a ver el banner después de aceptarlo:

```javascript
// En la consola del navegador
localStorage.removeItem('cookies-accepted');
location.reload();
```

### Verificar Almacenamiento
```javascript
// Ver datos guardados
console.log('Cookies aceptadas:', localStorage.getItem('cookies-accepted'));
console.log('Fecha:', localStorage.getItem('cookies-accepted-date'));
```

## 🔒 Privacidad y Cumplimiento

### GDPR/LGPD
- El banner informa sobre el uso de cookies
- Permite al usuario dar consentimiento explícito
- Guarda registro de la fecha de aceptación
- No utiliza cookies hasta que el usuario acepta

### Datos Almacenados
Solo se guarda en localStorage del navegador:
- `cookies-accepted`: "true"
- `cookies-accepted-date`: timestamp ISO

## 🎉 Funcionalidades Avanzadas

### 1. Integración con Analytics
```javascript
window.addEventListener('cookies-accepted', function(event) {
    // Activar Google Analytics
    if (typeof gtag !== 'undefined') {
        gtag('consent', 'update', {
            'analytics_storage': 'granted'
        });
    }
    
    // Activar Facebook Pixel
    if (typeof fbq !== 'undefined') {
        fbq('consent', 'grant');
    }
});
```

### 2. Políticas de Expiración
```javascript
// Verificar si el consentimiento ha expirado (ejemplo: 1 año)
const acceptedDate = localStorage.getItem('cookies-accepted-date');
if (acceptedDate) {
    const oneYearAgo = new Date();
    oneYearAgo.setFullYear(oneYearAgo.getFullYear() - 1);
    
    if (new Date(acceptedDate) < oneYearAgo) {
        localStorage.removeItem('cookies-accepted');
        localStorage.removeItem('cookies-accepted-date');
    }
}
```

## 🛠️ Mantenimiento

### Actualizaciones
- El componente es autónomo y no requiere mantenimiento regular
- Las actualizaciones de Bootstrap son automáticamente compatibles
- Los estilos utilizan variables CSS del tema principal

### Debugging
Para debuggear problemas:

```javascript
// Habilitar logs detallados
window.cookieDebug = true;

// Verificar estado del banner
console.log('Banner visible:', !document.getElementById('cookie-banner').classList.contains('d-none'));
console.log('Body blocked:', document.body.classList.contains('cookie-banner-active'));
```

## 📞 Soporte

Para preguntas o modificaciones adicionales:
- Revisa la documentación de Bootstrap 5
- Verifica la consola del navegador para errores
- Testea en diferentes dispositivos y navegadores

---

**Desarrollado para INDARCA** - Banner de cookies moderno y funcional que mejora la experiencia del usuario mientras cumple con las regulaciones de privacidad. 
