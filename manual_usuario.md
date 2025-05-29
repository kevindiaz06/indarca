# Manual de Usuario - Sistema de Gestión de Densímetros INDARCA

![Logo INDARCA](public/assets/img/logo-indarca.png)

## Índice
1. [Introducción](#1-introducción)
2. [Acceso al Sistema](#2-acceso-al-sistema)
3. [Consulta Pública de Estado](#3-consulta-pública-de-estado)
4. [Panel de Cliente](#4-panel-de-cliente)
5. [Panel de Administración](#5-panel-de-administración)
6. [Gestión de Densímetros](#6-gestión-de-densímetros)
7. [Gestión de Usuarios](#7-gestión-de-usuarios)
8. [Gestión de Empresas](#8-gestión-de-empresas)
9. [Sistema de Calibración](#9-sistema-de-calibración)
10. [Gestión de Archivos](#10-gestión-de-archivos)
11. [Reportes y Exportación](#11-reportes-y-exportación)
12. [Configuración del Sistema](#12-configuración-del-sistema)
13. [Preguntas Frecuentes](#13-preguntas-frecuentes)

## 1. Introducción

El Sistema de Gestión de Densímetros INDARCA es una herramienta moderna y completa diseñada para administrar todo el ciclo de vida de las reparaciones de densímetros nucleares. Este manual está dirigido a todos los usuarios del sistema: clientes, trabajadores y administradores.

### 1.1 Características Principales
- **Gestión completa de densímetros**: Desde recepción hasta entrega
- **Sistema de calibración avanzado**: Control automático de fechas de vencimiento
- **Consulta pública**: Verificación de estado sin necesidad de registro
- **Gestión de archivos**: Subida y gestión de documentos técnicos
- **Reportes avanzados**: Exportación en PDF y Excel
- **API RESTful**: Integración con sistemas externos
- **Interfaz responsive**: Acceso desde cualquier dispositivo

### 1.2 Roles de Usuario
- **Administrador**: Acceso completo al sistema
- **Trabajador**: Gestión de densímetros y seguimiento de reparaciones
- **Cliente**: Consulta de sus equipos y historial

## 2. Acceso al Sistema

### 2.1 Página de Inicio
- Acceda a la dirección web del sistema en su navegador
- La página principal muestra información general de INDARCA y acceso a las diferentes secciones
- Interfaz moderna y responsive que se adapta a cualquier dispositivo

### 2.2 Iniciar Sesión
1. Haga clic en el botón "Iniciar Sesión" en la esquina superior derecha
2. Ingrese su correo electrónico y contraseña
3. Seleccione "Recordarme" si desea mantener la sesión abierta
4. Haga clic en "Acceder"

### 2.3 Verificación por Código
Para mayor seguridad, el sistema utiliza verificación por código:
1. Después del registro, recibirá un código de verificación por email
2. Ingrese el código en la pantalla de verificación
3. Su cuenta será activada automáticamente

### 2.4 Recuperar Contraseña
1. En la pantalla de inicio de sesión, haga clic en "¿Olvidó su contraseña?"
2. Ingrese su correo electrónico
3. Recibirá un enlace para restablecer su contraseña
4. Siga las instrucciones del correo para crear una nueva contraseña

### 2.5 Registro (Solo para nuevos clientes)
1. Solicite al administrador de sistema la creación de su cuenta
2. Recibirá un correo electrónico con instrucciones para activar su cuenta
3. Ingrese el código de verificación enviado
4. Configure su contraseña personal

## 3. Consulta Pública de Estado

### 3.1 Acceso a la Consulta Pública
1. Desde la página principal, haga clic en "Consultar Estado"
2. No se requiere inicio de sesión para esta función
3. Disponible 24/7 para consultas rápidas

### 3.2 Buscar un Densímetro
1. Ingrese el número de serie o la referencia de reparación del densímetro
2. Haga clic en "Consultar"
3. El sistema mostrará el estado actual del equipo en tiempo real

### 3.3 Consulta de Calibración
1. Acceda a la sección "Consultar Calibración"
2. Ingrese número de serie, marca y modelo
3. Verifique el estado de calibración del equipo

### 3.4 Interpretación de Resultados
- **En Recepción**: El equipo ha sido recibido y está pendiente de diagnóstico
- **En Diagnóstico**: Se está evaluando el estado del equipo
- **En Reparación**: El equipo está siendo reparado
- **En Pruebas**: Se están realizando pruebas de funcionamiento
- **Finalizado**: La reparación ha sido completada
- **Entregado**: El equipo ha sido devuelto al cliente

### 3.5 Generar PDF de Estado
1. Después de consultar un densímetro, haga clic en "Generar PDF"
2. Se creará un documento oficial con toda la información
3. Puede guardarlo o imprimirlo para sus registros

## 4. Panel de Cliente

### 4.1 Acceso al Panel
1. Inicie sesión con sus credenciales de cliente
2. Será dirigido automáticamente a su panel de control personalizado

### 4.2 Dashboard del Cliente
- **Resumen de equipos**: Vista general de todos sus densímetros
- **Estados actuales**: Distribución por estado de reparación
- **Notificaciones**: Alertas importantes sobre sus equipos
- **Accesos rápidos**: Enlaces directos a funciones principales

### 4.3 Historial de Incidencias
1. Desde el menú, seleccione "Historial de Incidencias"
2. Visualizará todos sus equipos registrados en el sistema

### 4.4 Ver Detalles de un Densímetro
1. Haga clic en la referencia del densímetro que desea consultar
2. Se mostrará la información detallada, incluyendo:
   - Datos técnicos del equipo
   - Estado actual y progreso
   - Fechas relevantes (entrada y fecha de finalización)
   - Observaciones del técnico
   - Estado de calibración
   - Archivos adjuntos disponibles

### 4.5 Gestión de Perfil
1. Haga clic en su nombre de usuario en la esquina superior derecha
2. Seleccione "Perfil"
3. Podrá actualizar:
   - Información personal
   - Contraseña
   - Datos de contacto

## 5. Panel de Administración

### 5.1 Acceso al Panel Administrativo
1. Inicie sesión con credenciales de administrador o trabajador
2. En el menú principal, seleccione "Panel de Administración"

### 5.2 Dashboard Administrativo
El dashboard proporciona una vista completa del sistema:
- **Estadísticas en tiempo real**:
  - Densímetros activos
  - Densímetros completados este mes
  - Clientes registrados
  - Distribución por estados
- **Gráficos interactivos**: Visualización de tendencias y métricas
- **Alertas del sistema**: Notificaciones importantes
- **Accesos rápidos**: Enlaces a funciones administrativas principales

### 5.3 Navegación del Panel
El menú lateral izquierdo permite acceder a todas las secciones:
- **Dashboard**: Vista general del sistema
- **Densímetros**: Gestión completa de equipos
- **Usuarios**: Administración de cuentas de usuario
- **Empresas**: Gestión de empresas cliente
- **Reportes**: Generación y exportación de informes
- **Configuración**: Ajustes del sistema

### 5.4 Funciones Avanzadas
- **Búsqueda global**: Busque en todo el sistema desde cualquier página
- **Filtros avanzados**: Combine múltiples criterios de búsqueda
- **Exportación masiva**: Exporte datos en lotes
- **Notificaciones en tiempo real**: Reciba alertas instantáneas

## 6. Gestión de Densímetros

### 6.1 Listar Densímetros
1. Desde el panel de administración, seleccione "Densímetros"
2. Visualizará la lista completa de equipos con información resumida
3. Utilice los filtros avanzados para buscar por:
   - Cliente o empresa
   - Estado de reparación
   - Rango de fechas
   - Número de serie o referencia
   - Estado de calibración

### 6.2 Registrar Nuevo Densímetro
1. Haga clic en "Crear Nuevo" o "Registrar Densímetro"
2. Complete el formulario con los datos solicitados:
   - **Cliente**: Seleccione de la lista de clientes registrados
   - **Número de serie**: Ingrese el número único del equipo
   - **Marca y modelo**: Especifique fabricante y modelo
   - **Estado inicial**: Generalmente "En Recepción"
   - **Observaciones iniciales**: Notas sobre el estado del equipo
   - **Información de calibración**: Si aplica
3. Haga clic en "Guardar"
4. El sistema generará automáticamente una referencia única

### 6.3 Editar Densímetro
1. En la lista de densímetros, haga clic en "Editar" o en el nombre del equipo
2. Actualice la información necesaria:
   - Cambiar estado según el progreso
   - Añadir observaciones técnicas
   - Actualizar fechas importantes
   - Modificar información de calibración
3. Haga clic en "Actualizar"

### 6.4 Estados de Densímetros
El sistema maneja los siguientes estados:
- **En Recepción**: Equipo recibido, pendiente de evaluación
- **En Diagnóstico**: Evaluación técnica en progreso
- **En Reparación**: Proceso de reparación activo
- **En Pruebas**: Verificación de funcionamiento
- **Finalizado**: Reparación completada
- **Entregado**: Equipo devuelto al cliente

### 6.5 Funciones Avanzadas
- **Búsqueda inteligente**: El sistema sugiere resultados mientras escribe
- **Filtros combinados**: Use múltiples criterios simultáneamente
- **Vista de calendario**: Visualice fechas importantes en formato calendario
- **Exportación personalizada**: Exporte solo los campos que necesite

## 7. Gestión de Usuarios

### 7.1 Listar Usuarios
1. Desde el panel de administración, seleccione "Usuarios"
2. Visualizará todos los usuarios registrados con información básica
3. Filtre por:
   - Rol (Admin, Trabajador, Cliente)
   - Estado (Activo, Inactivo)
   - Empresa asociada
   - Fecha de registro

### 7.2 Crear Nuevo Usuario
1. Haga clic en "Crear Usuario"
2. Complete el formulario con:
   - **Información personal**: Nombre, apellidos, email
   - **Rol**: Seleccione el nivel de acceso apropiado
   - **Empresa asociada**: Para clientes, seleccione la empresa
   - **Estado inicial**: Generalmente "Activo"
3. Haga clic en "Guardar"
4. El sistema enviará un correo de activación al nuevo usuario

### 7.3 Editar Usuario
1. En la lista de usuarios, haga clic en "Editar" junto al usuario deseado
2. Actualice la información necesaria:
   - Datos personales
   - Rol y permisos
   - Estado de la cuenta
   - Empresa asociada
3. Haga clic en "Actualizar"

### 7.4 Gestión de Estados
- **Activar/Desactivar**: Control del acceso al sistema
- **Cambiar rol**: Modificar permisos de usuario
- **Restablecer contraseña**: Enviar enlace de restablecimiento
- **Verificar cuenta**: Gestionar estado de verificación

### 7.5 Funciones de Seguridad
- **Auditoría de accesos**: Registro de inicios de sesión
- **Gestión de sesiones**: Control de sesiones activas
- **Políticas de contraseña**: Configuración de requisitos de seguridad

## 8. Gestión de Empresas

### 8.1 Listar Empresas
1. Desde el panel de administración, seleccione "Empresas"
2. Visualizará todas las empresas registradas con información resumida
3. Filtre por:
   - Estado (Activo, Inactivo)
   - Tipo de cliente
   - Fecha de registro

### 8.2 Crear Nueva Empresa
1. Haga clic en "Crear Empresa"
2. Complete el formulario con:
   - **Información básica**: Nombre, dirección, teléfono, email
   - **Logo**: Suba el logo de la empresa (opcional)
   - **Tipo de cliente**: Categorización de la empresa
   - **Estado**: Activo por defecto
3. Haga clic en "Guardar"

### 8.3 Editar Empresa
1. En la lista de empresas, haga clic en "Editar" junto a la empresa deseada
2. Actualice la información necesaria:
   - Datos de contacto
   - Logo corporativo
   - Estado de la empresa
   - Tipo de cliente
3. Haga clic en "Actualizar"

### 8.4 Ver Clientes de una Empresa
1. En la lista de empresas, haga clic en "Ver Clientes"
2. Se mostrará un listado de todos los usuarios asociados a esa empresa
3. Puede gestionar los usuarios directamente desde esta vista

### 8.5 Gestión de Logos
- **Subir logo**: Formatos soportados: JPG, PNG, SVG
- **Redimensionamiento automático**: El sistema optimiza las imágenes
- **Vista previa**: Vea cómo se verá el logo en el sistema

## 9. Sistema de Calibración

### 9.1 Gestión de Calibración
El sistema incluye un módulo avanzado para el control de calibración:
- **Estado de calibración**: Calibrado/No calibrado
- **Fechas de vencimiento**: Control automático de vencimientos
- **Alertas automáticas**: Notificaciones de calibraciones próximas a vencer
- **Historial de calibración**: Registro completo de calibraciones

### 9.2 Configurar Calibración
1. Al editar un densímetro, vaya a la sección "Calibración"
2. Configure:
   - **Estado actual**: Calibrado o No calibrado
   - **Fecha de próxima calibración**: Cuando vence la calibración actual
   - **Observaciones**: Notas sobre la calibración
3. El sistema verificará automáticamente los vencimientos

### 9.3 Verificación Automática
- El sistema verifica diariamente las fechas de calibración
- Actualiza automáticamente el estado si la calibración ha vencido
- Registra todos los cambios en el log del sistema
- Envía notificaciones a los responsables

### 9.4 Consulta de Calibración
Los clientes pueden consultar el estado de calibración:
1. Use la consulta pública de calibración
2. Ingrese número de serie, marca y modelo
3. Vea el estado actual y fecha de próximo vencimiento

### 9.5 Reportes de Calibración
- **Equipos próximos a vencer**: Lista de equipos que requieren calibración
- **Historial de calibraciones**: Registro completo por equipo
- **Estadísticas**: Métricas de calibración por período

## 10. Gestión de Archivos

### 10.1 Subir Archivos
1. Desde la vista de detalles del densímetro, vaya a la sección "Archivos"
2. Haga clic en "Subir Archivo" o arrastre archivos al área designada
3. Seleccione uno o múltiples archivos desde su computadora
4. Añada una descripción breve para cada archivo
5. Haga clic en "Subir"

### 10.2 Tipos de Archivos Soportados
- **Documentos**: PDF, DOC, DOCX, TXT
- **Imágenes**: JPG, PNG, GIF, WebP
- **Hojas de cálculo**: XLS, XLSX, CSV
- **Archivos comprimidos**: ZIP, RAR
- **Otros**: Según configuración del sistema

### 10.3 Gestión de Archivos
- **Vista previa**: Vea el contenido sin descargar
- **Descarga**: Descargue archivos individuales o en lote
- **Eliminar**: Quite archivos que ya no son necesarios
- **Organización**: Ordene por fecha, tipo o nombre

### 10.4 Permisos de Archivos
- **Administradores**: Acceso completo a todos los archivos
- **Trabajadores**: Pueden ver y gestionar archivos de equipos asignados
- **Clientes**: Solo pueden ver archivos de sus propios equipos

### 10.5 Funciones Avanzadas
- **Subida múltiple**: Suba varios archivos simultáneamente
- **Progreso de subida**: Vea el progreso en tiempo real
- **Validación automática**: El sistema verifica tipo y tamaño
- **Backup automático**: Los archivos se respaldan automáticamente

## 11. Reportes y Exportación

### 11.1 Tipos de Reportes Disponibles
El sistema ofrece múltiples tipos de reportes:
- **Dashboard general**: Estadísticas completas del sistema
- **Listado de usuarios**: Información detallada de usuarios
- **Listado de empresas**: Datos de empresas cliente
- **Densímetros por estado**: Equipos agrupados por estado
- **Reportes de calibración**: Estado de calibración de equipos
- **Reportes personalizados**: Filtros específicos según necesidades

### 11.2 Generar Reportes
1. Desde el panel de administración, seleccione "Reportes"
2. Elija el tipo de reporte deseado
3. Configure los filtros:
   - **Rango de fechas**: Período específico
   - **Estados**: Filtrar por estado de densímetros
   - **Clientes**: Reportes específicos por cliente
   - **Empresas**: Datos de empresas específicas
4. Haga clic en "Generar Reporte"

### 11.3 Exportar a PDF
1. Seleccione el reporte deseado
2. Configure las opciones de formato:
   - Orientación (vertical/horizontal)
   - Tamaño de página
   - Incluir gráficos
3. Haga clic en "Exportar a PDF"
4. El archivo se generará y podrá descargarlo

### 11.4 Exportar a Excel
1. Seleccione el reporte deseado
2. Configure las opciones:
   - Hojas múltiples
   - Formato de datos
   - Incluir fórmulas
3. Haga clic en "Exportar a Excel"
4. El archivo se generará para análisis avanzados

### 11.5 Reportes Programados
- **Reportes automáticos**: Configure reportes que se generen automáticamente
- **Envío por email**: Reciba reportes periódicos por correo
- **Almacenamiento**: Los reportes se guardan para consulta posterior

### 11.6 Dashboard Interactivo
- **Gráficos en tiempo real**: Visualización dinámica de datos
- **Filtros interactivos**: Modifique la vista sin recargar
- **Exportación directa**: Exporte gráficos y datos desde el dashboard

## 12. Configuración del Sistema

### 12.1 Configuraciones Generales
Los administradores pueden configurar:
- **Información de la empresa**: Datos de INDARCA
- **Configuración de correo**: Servidores SMTP
- **Configuración de notificaciones**: Tipos y frecuencia
- **Configuración de archivos**: Tamaños máximos y tipos permitidos

### 12.2 Gestión de Configuraciones
1. Acceda a "Configuración" desde el menú administrativo
2. Modifique los valores según sea necesario
3. Guarde los cambios
4. El sistema aplicará las configuraciones inmediatamente

### 12.3 Configuraciones de Seguridad
- **Políticas de contraseña**: Requisitos mínimos
- **Tiempo de sesión**: Duración de sesiones activas
- **Intentos de login**: Límites de intentos fallidos
- **Verificación en dos pasos**: Configuración de 2FA

### 12.4 Configuraciones de Notificaciones
- **Email de notificaciones**: Configurar remitente
- **Plantillas de correo**: Personalizar mensajes
- **Frecuencia de alertas**: Configurar periodicidad
- **Destinatarios**: Gestionar listas de distribución

## 13. Preguntas Frecuentes

### 13.1 Consultas Generales

**¿Cómo saber si mi densímetro está listo?**
Puede consultar el estado en la sección pública "Consultar Estado" ingresando el número de serie o referencia, o iniciar sesión como cliente para ver detalles completos en su panel personal.

**¿Qué significa cada estado de reparación?**
- **En Recepción**: Equipo recibido, pendiente de evaluación inicial
- **En Diagnóstico**: Evaluación técnica en curso
- **En Reparación**: Proceso de reparación activo
- **En Pruebas**: Verificación de funcionamiento post-reparación
- **Finalizado**: Reparación completada, pendiente de entrega
- **Entregado**: Equipo devuelto al cliente

**¿Cómo funciona el sistema de calibración?**
El sistema verifica automáticamente las fechas de calibración y actualiza el estado cuando vence. Puede consultar el estado de calibración en la sección específica o en los detalles del densímetro.

### 13.2 Problemas de Acceso

**¿No recuerdo mi contraseña, qué hago?**
Utilice la opción "¿Olvidó su contraseña?" en la pantalla de inicio de sesión. Recibirá un enlace por correo para restablecerla.

**¿No recibí el código de verificación?**
Verifique su carpeta de spam. Si no lo encuentra, puede solicitar un nuevo código desde la pantalla de verificación.

**¿Mi cuenta está bloqueada, qué hago?**
Contacte al administrador del sistema o use el formulario de contacto en el sitio web.

### 13.3 Gestión de Información

**¿Cómo puedo cambiar mi información personal?**
Acceda a su perfil desde el menú de usuario (esquina superior derecha) y utilice la opción "Editar Perfil".

**¿Puedo subir archivos relacionados con mi densímetro?**
Los clientes pueden ver archivos, pero solo administradores y trabajadores pueden subirlos. Contacte a INDARCA si necesita adjuntar documentación.

**¿Cómo puedo obtener un reporte de mis equipos?**
Los clientes pueden ver su historial en el panel personal. Para reportes específicos, contacte al administrador.

### 13.4 Problemas Técnicos

**¿No encuentro mi equipo en el sistema, qué debo hacer?**
Contacte directamente con INDARCA a través del formulario de contacto, llamando al +18095960333, o enviando un email a contacto@indarca.com.

**¿El sistema está lento, qué puedo hacer?**
- Verifique su conexión a internet
- Cierre otras pestañas del navegador
- Limpie la caché del navegador
- Contacte soporte si el problema persiste

**¿Puedo acceder desde mi móvil?**
Sí, el sistema tiene un diseño responsive que se adapta a dispositivos móviles y tablets.

### 13.5 Contacto y Soporte

**¿Cómo puedo contactar a INDARCA?**
- **Teléfono**: +18095960333
- **Email**: contacto@indarca.com
- **Dirección**: C. C 16, Santo Domingo Este 11506, República Dominicana
- **Horario**: Lunes - Viernes: 9:00 AM - 5:00 PM

**¿Hay soporte técnico disponible?**
Sí, puede contactar al soporte técnico durante el horario laboral para asistencia con el sistema.

**¿Puedo solicitar nuevas funcionalidades?**
Sí, INDARCA considera sugerencias de mejora. Contacte a través de los canales oficiales para hacer sus propuestas.

---

## Información de Contacto

- **Empresa**: INDARCA SRL
- **Dirección**: C. C 16, Santo Domingo Este 11506, República Dominicana
- **Teléfono**: +18095960333
- **Email**: contacto@indarca.com
- **Horario de atención**: Lunes - Viernes: 9:00 AM - 5:00 PM (GMT-4)

## Redes Sociales

- [LinkedIn](https://www.linkedin.com/company/indarca-srl/)
- [Facebook](https://www.facebook.com/share/1EJq41gUNs/?mibextid=wwXIfr)
- [Instagram](https://www.instagram.com/indarca.srl?igsh=MXZzN2l3cTBxaG1jOA==)
- [Twitter/X](https://x.com/indarca_srl?s=11)

---

*Este manual se actualiza regularmente. Para la versión más reciente, consulte el sistema en línea o contacte al administrador.*
