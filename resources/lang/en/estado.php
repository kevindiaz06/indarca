<?php

return [
    // Headers
    'device_status_title' => 'Densimeter Status Inquiry',
    'calibration_status_title' => 'Calibration Status Inquiry',

    // First card: Reference inquiry
    'reference_description' => 'Enter the repair reference number you received by email to check the current status of your densimeter.',
    'reference_placeholder' => 'E.g. REF-ABCD1234',
    'submit_query' => 'Check',

    // Second card: Calibration Status inquiry
    'calibration_description' => 'Enter the <strong>exact</strong> serial number, brand, and model of the densimeter to verify its calibration status. All data must match what is registered in our system.',

    // Form fields
    'serial_number' => 'Serial Number',
    'serial_number_placeholder' => 'Densimeter serial number',
    'brand' => 'Brand',
    'brand_placeholder' => 'Densimeter brand',
    'model' => 'Model',
    'model_placeholder' => 'Densimeter model',
    'verify_calibration' => 'Verify Calibration Status',

    // Help text
    'questions' => 'Have any questions?',
    'contact_us' => 'Contact Us',

    // Alert messages
    'close' => 'Close',

    // Common errors
    'reference_not_found' => 'The provided reference was not found in our system.',
    'invalid_reference' => 'The entered reference is not valid.',
    'densimeter_not_found' => 'No densimeter was found with the provided data.',
    'data_mismatch' => 'The provided data does not match our records.',
    'system_error' => 'A system error has occurred. Please try again later.',

    // Densimeter status
    'status_received' => 'Received',
    'status_in_repair' => 'In repair',
    'status_completed' => 'Repair completed',
    'status_delivered' => 'Delivered to client',

    // Short versions for timeline
    'status_received_short' => 'Received',
    'status_in_repair_short' => 'In repair',
    'status_completed_short' => 'Completed',
    'status_delivered_short' => 'Delivered',

    // PDF titles
    'densimeter_status' => 'Densimeter Status',
    'calibration_status' => 'Calibration Status',
    'densimeter_calibration_status' => 'Densimeter Calibration Status',

    // Log messages
    'calibration_auto_update_log' => 'Automatically updated calibration status for densimeter #{id}, serial: {serial} - Changed to Not calibrated due to expired date',
    'calibration_query_log' => 'Querying calibration for densimeter #{id}, serial: {serial}, Calibrated: {calibrated}, Next date: {next_date}',

    // General values
    'client_not_available' => 'Client not available',
    'yes' => 'Yes',
    'no' => 'No',
    'not_set' => 'Not set',
    'not_specified' => 'Not specified',
    'not_available' => 'Not available',
    'not_scheduled' => 'Not scheduled',

    // View resultado_estado.blade.php
    'query_result' => 'Query Result',
    'entry_date' => 'Entry Date',
    'current_status' => 'Current Status',
    'calibrated' => 'Calibrated',
    'not_calibrated' => 'Not Calibrated',
    'next_calibration_date' => 'Next calibration date',
    'back' => 'Back',
    'print_result' => 'Print Result',

    // View calibracion.blade.php
    'calibration_info' => 'Calibration Information',
    'last_revision' => 'Last Revision',
    'next_calibration' => 'Next Calibration',
    'days_remaining' => '<strong>:days</strong> days remaining until next calibration',
    'days_remaining_warning' => '<strong>Warning!</strong> Only <strong>:days</strong> days remaining until next calibration',
    'calibration_expired' => '<strong>Calibration expired!</strong> <strong>:days</strong> days have passed since the scheduled date',
    'print_info' => 'Print Information',

    // PDF View
    'densimeter_info' => 'Densimeter Information',
    'reference' => 'Reference',
    'client_data' => 'Client Data',
    'name' => 'Name',
    'document_generated' => 'Document generated on',

    // View calibracion_pdf.blade.php
    'date' => 'Date',
    'calibration_valid' => 'Calibration status in order',
    'warning' => 'Warning!',
    'days_remaining_warning_simple' => 'Only <strong>:days</strong> days remaining until next calibration',
    'calibration_expired_title' => 'Calibration expired!',
    'calibration_expired_simple' => '<strong>:days</strong> days have passed since the scheduled date',
    'important_note' => 'Important note',
    'calibration_note' => 'Keep your equipment with up-to-date calibration to ensure accurate measurements and comply with required quality standards.',
    'indarca_seal' => 'INDARCA Seal',
    'validity' => 'Validity',
    'one_year' => '1 year',
];
