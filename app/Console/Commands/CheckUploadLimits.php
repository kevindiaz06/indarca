<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckUploadLimits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:check-limits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica los límites de subida del servidor y muestra recomendaciones';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('=== VERIFICACIÓN DE LÍMITES DE SUBIDA ===');
        $this->newLine();

        // Límites importantes para subida de archivos
        $limits = [
            'post_max_size' => ini_get('post_max_size'),
            'upload_max_filesize' => ini_get('upload_max_filesize'),
            'max_file_uploads' => ini_get('max_file_uploads'),
            'memory_limit' => ini_get('memory_limit'),
            'max_execution_time' => ini_get('max_execution_time'),
            'max_input_time' => ini_get('max_input_time'),
        ];

        // Mostrar límites actuales
        foreach ($limits as $setting => $value) {
            $this->line("✓ <info>{$setting}:</info> {$value}");
        }

        $this->newLine();
        $this->info('=== ANÁLISIS ===');

        // Convertir a bytes para análisis
        $postMaxBytes = $this->convertToBytes($limits['post_max_size']);
        $uploadMaxBytes = $this->convertToBytes($limits['upload_max_filesize']);
        $maxFiles = (int) $limits['max_file_uploads'];

        $this->line("• POST máximo: " . number_format($postMaxBytes / (1024 * 1024), 2) . " MB");
        $this->line("• Upload por archivo: " . number_format($uploadMaxBytes / (1024 * 1024), 2) . " MB");
        $this->line("• Máximo archivos: {$maxFiles}");

        $this->newLine();

        // Calculamos cuántos archivos de 10MB podemos subir
        $filesOf10MB = floor($postMaxBytes / (10 * 1024 * 1024));
        $this->line("Archivos de 10MB que se pueden subir simultáneamente: <comment>{$filesOf10MB}</comment>");

        $hasWarnings = false;

        if ($maxFiles < 10) {
            $this->warn("⚠️  ADVERTENCIA: max_file_uploads ({$maxFiles}) es menor que nuestro límite de 10 archivos");
            $hasWarnings = true;
        }

        if ($filesOf10MB < 10) {
            $this->warn("⚠️  ADVERTENCIA: post_max_size permite solo {$filesOf10MB} archivos de 10MB");
            $hasWarnings = true;
        }

        if ($hasWarnings) {
            $this->newLine();
            $this->info('=== RECOMENDACIONES ===');

            if ($maxFiles < 20) {
                $this->line("• Aumentar max_file_uploads a 20 o más");
            }

            if ($postMaxBytes < (150 * 1024 * 1024)) {
                $this->line("• Aumentar post_max_size a 150M o más");
            }

            if ($uploadMaxBytes < (10 * 1024 * 1024)) {
                $this->line("• Aumentar upload_max_filesize a 10M o más");
            }

            $this->newLine();
            $this->info('=== CONFIGURACIÓN RECOMENDADA ===');
            $this->line("post_max_size = 150M");
            $this->line("upload_max_filesize = 10M");
            $this->line("max_file_uploads = 20");
            $this->line("memory_limit = 256M");
            $this->line("max_execution_time = 300");
            $this->line("max_input_time = 300");

            $this->newLine();
            $this->comment('Ver config-xampp.ini para instrucciones de configuración en XAMPP');
        } else {
            $this->newLine();
            $this->success('✅ Todos los límites están configurados correctamente para subir 10 archivos de 10MB');
        }

        return 0;
    }

    /**
     * Convierte valores como "40M", "150M" a bytes
     */
    private function convertToBytes($value)
    {
        $unit = strtolower(substr($value, -1));
        $number = (float) substr($value, 0, -1);

        switch ($unit) {
            case 'g': return $number * 1024 * 1024 * 1024;
            case 'm': return $number * 1024 * 1024;
            case 'k': return $number * 1024;
            default: return $number;
        }
    }
}
