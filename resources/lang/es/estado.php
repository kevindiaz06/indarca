<?php

return [
    // Cabeceras
    'device_status_title' => 'Consulta de Estado de Densímetros',
    'calibration_status_title' => 'Consulta por Estado de Calibración',

    // Primera tarjeta: Consulta por referencia
    'reference_description' => 'Introduzca la referencia de reparación que recibió por correo electrónico para consultar el estado actual de su densímetro.',
    'reference_placeholder' => 'Ej. REF-ABCD1234',
    'submit_query' => 'Consultar',

    // Segunda tarjeta: Consulta por Estado de Calibración
    'calibration_description' => 'Introduzca el número de serie, marca y modelo <strong>exactos</strong> del densímetro para verificar su estado de calibración. Todos los datos deben coincidir con los registrados en nuestro sistema.',

    // Campos de formulario
    'serial_number' => 'Número de Serie',
    'serial_number_placeholder' => 'Número de serie del densímetro',
    'brand' => 'Marca',
    'brand_placeholder' => 'Marca del densímetro',
    'model' => 'Modelo',
    'model_placeholder' => 'Modelo del densímetro',
    'verify_calibration' => 'Verificar Estado de Calibración',

    // Texto de ayuda
    'questions' => '¿Tiene alguna pregunta?',
    'contact_us' => 'Contáctenos',

    // Mensajes de alerta
    'close' => 'Cerrar',

    // Errores comunes
    'reference_not_found' => 'La referencia proporcionada no se encuentra en nuestro sistema.',
    'invalid_reference' => 'La referencia ingresada no es válida.',
    'densimeter_not_found' => 'No se encontró un densímetro con los datos proporcionados.',
    'data_mismatch' => 'Los datos proporcionados no coinciden con nuestros registros.',
    'system_error' => 'Ha ocurrido un error en el sistema. Por favor, inténtelo de nuevo más tarde.',

    // Estados del densímetro
    'status_received' => 'Recibido',
    'status_in_repair' => 'En reparación',
    'status_completed' => 'Reparación finalizada',
    'status_delivered' => 'Entregado al cliente',

    // Versiones cortas para la línea de tiempo
    'status_received_short' => 'Recibido',
    'status_in_repair_short' => 'En reparación',
    'status_completed_short' => 'Finalizado',
    'status_delivered_short' => 'Entregado',

    // Títulos de PDF
    'densimeter_status' => 'Estado de Densímetro',
    'calibration_status' => 'Estado de Calibración',
    'densimeter_calibration_status' => 'Estado de Calibración de Densímetro',

    // Mensajes de log
    'calibration_auto_update_log' => 'Actualizado automáticamente estado de calibración para densímetro #{id}, serie: {serial} - Cambio a No calibrado por fecha vencida',
    'calibration_query_log' => 'Consultando calibración para densímetro #{id}, serie: {serial}, Calibrado: {calibrated}, Próxima fecha: {next_date}',

    // Valores generales
    'client_not_available' => 'Cliente no disponible',
    'yes' => 'Sí',
    'no' => 'No',
    'not_set' => 'No establecida',
    'not_specified' => 'No especificado',
    'not_available' => 'No disponible',
    'not_scheduled' => 'No programada',

    // Vista resultado_estado.blade.php
    'query_result' => 'Resultado de la Consulta',
    'entry_date' => 'Fecha de Entrada',
    'current_status' => 'Estado Actual',
    'calibrated' => 'Calibrado',
    'not_calibrated' => 'No calibrado',
    'next_calibration_date' => 'Próxima fecha de calibración',
    'back' => 'Volver',
    'print_result' => 'Imprimir Resultado',

    // Vista calibracion.blade.php
    'calibration_info' => 'Información de Calibración',
    'last_revision' => 'Última Revisión',
    'next_calibration' => 'Próxima Calibración',
    'days_remaining' => 'Quedan <strong>:days</strong> días para la próxima calibración',
    'days_remaining_warning' => '<strong>¡Atención!</strong> Solo quedan <strong>:days</strong> días para la próxima calibración',
    'calibration_expired' => '<strong>¡Calibración vencida!</strong> Han pasado <strong>:days</strong> días desde la fecha programada',
    'print_info' => 'Imprimir Información',

    // Vista PDF
    'densimeter_info' => 'Información del Densímetro',
    'reference' => 'Referencia',
    'client_data' => 'Datos del Cliente',
    'name' => 'Nombre',
    'document_generated' => 'Documento generado el',

    // Vista calibracion_pdf.blade.php
    'date' => 'Fecha',
    'calibration_valid' => 'Estado de calibración en regla',
    'warning' => '¡Atención!',
    'days_remaining_warning_simple' => 'Solo quedan <strong>:days</strong> días para la próxima calibración',
    'calibration_expired_title' => '¡Calibración vencida!',
    'calibration_expired_simple' => 'Han pasado <strong>:days</strong> días desde la fecha programada',
    'important_note' => 'Nota importante',
    'calibration_note' => 'Mantenga sus equipos con la calibración al día para asegurar mediciones precisas y cumplir con los estándares de calidad requeridos.',
    'indarca_seal' => 'Sello INDARCA',
    'validity' => 'Validez',
    'one_year' => '1 año',
];
