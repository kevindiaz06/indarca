<?php
// Script para renombrar imágenes según el nombre de su carpeta
$baseDir = __DIR__ . '/public/assets/img';
$mainFolders = glob($baseDir . '/*', GLOB_ONLYDIR);

// Primero, procesar todas las imágenes en la carpeta principal
echo "Procesando imágenes en la carpeta principal img\n";
$imageFiles = getImageFiles($baseDir);
if (!empty($imageFiles)) {
    renameFiles($imageFiles, $baseDir, "IMG");
}

foreach ($mainFolders as $mainFolder) {
    $mainFolderName = basename($mainFolder);
    echo "Procesando carpeta principal: $mainFolderName\n";

    // Procesar archivos directamente en la carpeta principal
    $imageFiles = getImageFiles($mainFolder);
    if (!empty($imageFiles)) {
        renameFiles($imageFiles, $mainFolder, $mainFolderName);
    }

    // Obtener todas las subcarpetas
    $subFolders = glob($mainFolder . '/*', GLOB_ONLYDIR);

    if (!empty($subFolders)) {
        // Procesar cada subcarpeta
        foreach ($subFolders as $subFolder) {
            $subFolderName = basename($subFolder);
            echo "  Procesando subcarpeta: $subFolderName\n";

            // Obtener el nombre combinado para la subcarpeta
            $folderPrefix = $mainFolderName . '_' . $subFolderName;

            // Procesar imágenes en la subcarpeta
            $imageFiles = getImageFiles($subFolder);
            if (!empty($imageFiles)) {
                renameFiles($imageFiles, $subFolder, $folderPrefix);
            }

            // Procesar sub-subcarpetas si existen
            $subSubFolders = glob($subFolder . '/*', GLOB_ONLYDIR);
            foreach ($subSubFolders as $subSubFolder) {
                $subSubFolderName = basename($subSubFolder);
                echo "    Procesando sub-subcarpeta: $subSubFolderName\n";

                // Obtener el nombre combinado para la sub-subcarpeta
                $subSubFolderPrefix = $folderPrefix . '_' . $subSubFolderName;

                // Procesar imágenes en la sub-subcarpeta
                $imageFiles = getImageFiles($subSubFolder);
                if (!empty($imageFiles)) {
                    renameFiles($imageFiles, $subSubFolder, $subSubFolderPrefix);
                }
            }
        }
    }
}

// Función para obtener todos los archivos de imagen en una carpeta
function getImageFiles($folder) {
    // Extensiones de imagen comunes
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'tiff', 'tif', 'svg', 'JPG', 'JPEG', 'PNG', 'DNG', 'MOV'];

    // Array para almacenar todos los archivos de imagen
    $images = [];

    // Buscar archivos con cada extensión
    foreach ($imageExtensions as $ext) {
        $found = glob($folder . '/*.' . $ext);
        $images = array_merge($images, $found);
    }

    return $images;
}

// Función para renombrar archivos
function renameFiles($images, $folder, $prefix) {
    if (empty($images)) {
        echo "    No se encontraron imágenes en: " . basename($folder) . "\n";
        return;
    }

    // Ordenar archivos para mantener un orden consistente
    sort($images);

    // Renombrar cada imagen
    $counter = 1;
    foreach ($images as $image) {
        $extension = pathinfo($image, PATHINFO_EXTENSION);
        $newName = $prefix . '_' . $counter . '.' . $extension;
        $newPath = dirname($image) . '/' . $newName;

        // Verificar si el archivo ya tiene el formato correcto
        if (basename($image) === $newName) {
            echo "    Archivo ya tiene el formato correcto: " . basename($image) . "\n";
        } else {
            echo "    Renombrando: " . basename($image) . " → $newName\n";

            // Renombrar el archivo
            rename($image, $newPath);
        }
        $counter++;
    }

    echo "    Se procesaron $counter archivos en: " . basename($folder) . "\n";
}

echo "Proceso completado.\n";
