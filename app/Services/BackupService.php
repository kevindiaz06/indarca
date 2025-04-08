<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BackupService
{
    public function createBackup()
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $filename = "backup_{$timestamp}.sql";

        // Crear el respaldo de la base de datos
        $command = sprintf(
            'mysqldump -u%s -p%s %s > %s',
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password'),
            config('database.connections.mysql.database'),
            storage_path("app/backups/{$filename}")
        );

        exec($command);

        // Comprimir el archivo
        $zip = new \ZipArchive();
        $zipPath = storage_path("app/backups/{$filename}.zip");

        if ($zip->open($zipPath, \ZipArchive::CREATE) === TRUE) {
            $zip->addFile(storage_path("app/backups/{$filename}"), $filename);
            $zip->close();

            // Eliminar el archivo SQL original
            unlink(storage_path("app/backups/{$filename}"));

            return $zipPath;
        }

        return false;
    }

    public function cleanOldBackups($daysToKeep = 7)
    {
        $files = Storage::files('backups');
        $now = Carbon::now();

        foreach ($files as $file) {
            $fileDate = Carbon::createFromTimestamp(Storage::lastModified($file));
            if ($now->diffInDays($fileDate) > $daysToKeep) {
                Storage::delete($file);
            }
        }
    }
}
