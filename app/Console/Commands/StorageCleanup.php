<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\TeamMember;
use App\Models\Empresa;
use App\Models\DensimetroArchivo;

class StorageCleanup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:cleanup {--dry-run : Solo mostrar archivos huérfanos sin eliminar} {--force : Eliminar archivos huérfanos}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Identifica y opcionalmente elimina archivos huérfanos del storage';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dryRun = $this->option('dry-run');
        $force = $this->option('force');

        if (!$dryRun && !$force) {
            $this->error('Debes especificar --dry-run para ver archivos huérfanos o --force para eliminarlos');
            return 1;
        }

        $this->info('🔍 Analizando archivos en storage...');
        $this->newLine();

        $orphanedFiles = [];

        // Verificar archivos de equipo
        $this->info('📁 Verificando archivos de equipo...');
        $teamOrphans = $this->checkTeamFiles();
        $orphanedFiles = array_merge($orphanedFiles, $teamOrphans);

        // Verificar logos de empresas
        $this->info('📁 Verificando logos de empresas...');
        $logoOrphans = $this->checkCompanyLogos();
        $orphanedFiles = array_merge($orphanedFiles, $logoOrphans);

        // Verificar archivos de densímetros
        $this->info('📁 Verificando archivos de densímetros...');
        $densimetroOrphans = $this->checkDensimetroFiles();
        $orphanedFiles = array_merge($orphanedFiles, $densimetroOrphans);

        $this->newLine();

        if (empty($orphanedFiles)) {
            $this->info('✅ No se encontraron archivos huérfanos');
            return 0;
        }

        $this->warn('⚠️  Se encontraron ' . count($orphanedFiles) . ' archivos huérfanos:');
        $this->newLine();

        foreach ($orphanedFiles as $file) {
            $size = Storage::disk('public')->size($file);
            $sizeFormatted = $this->formatBytes($size);
            $this->line("   📄 {$file} ({$sizeFormatted})");
        }

        $this->newLine();

        if ($dryRun) {
            $this->info('🔍 Modo dry-run: No se eliminaron archivos');
            $this->info('💡 Para eliminar estos archivos, ejecuta: php artisan storage:cleanup --force');
        } elseif ($force) {
            if ($this->confirm('¿Estás seguro de que quieres eliminar estos archivos? Esta acción no se puede deshacer.')) {
                $deletedCount = 0;
                $deletedSize = 0;

                foreach ($orphanedFiles as $file) {
                    try {
                        $size = Storage::disk('public')->size($file);
                        Storage::disk('public')->delete($file);
                        $deletedCount++;
                        $deletedSize += $size;
                        $this->line("   ✅ Eliminado: {$file}");
                    } catch (\Exception $e) {
                        $this->error("   ❌ Error eliminando {$file}: " . $e->getMessage());
                    }
                }

                $this->newLine();
                $this->info("🗑️  Eliminados {$deletedCount} archivos (" . $this->formatBytes($deletedSize) . ")");
            } else {
                $this->info('❌ Operación cancelada');
            }
        }

        return 0;
    }

    /**
     * Verificar archivos huérfanos de miembros del equipo
     */
    private function checkTeamFiles()
    {
        $orphans = [];
        $teamImages = TeamMember::whereNotNull('image')->pluck('image')->toArray();

        if (Storage::disk('public')->exists('team')) {
            $allTeamFiles = Storage::disk('public')->files('team');

            foreach ($allTeamFiles as $file) {
                if (!in_array($file, $teamImages)) {
                    $orphans[] = $file;
                }
            }
        }

        $this->line("   📊 Encontrados " . count($orphans) . " archivos huérfanos de equipo");
        return $orphans;
    }

    /**
     * Verificar logos huérfanos de empresas
     */
    private function checkCompanyLogos()
    {
        $orphans = [];
        $companyLogos = Empresa::whereNotNull('logo')->pluck('logo')->toArray();

        if (Storage::disk('public')->exists('logos')) {
            $allLogoFiles = Storage::disk('public')->files('logos');

            foreach ($allLogoFiles as $file) {
                if (!in_array($file, $companyLogos)) {
                    $orphans[] = $file;
                }
            }
        }

        $this->line("   📊 Encontrados " . count($orphans) . " logos huérfanos de empresas");
        return $orphans;
    }

    /**
     * Verificar archivos huérfanos de densímetros
     */
    private function checkDensimetroFiles()
    {
        $orphans = [];
        $densimetroFiles = DensimetroArchivo::pluck('ruta_archivo')->toArray();

        if (Storage::disk('public')->exists('archivos/densimetros')) {
            $allDensimetroFiles = Storage::disk('public')->allFiles('archivos/densimetros');

            foreach ($allDensimetroFiles as $file) {
                if (!in_array($file, $densimetroFiles)) {
                    $orphans[] = $file;
                }
            }
        }

        $this->line("   📊 Encontrados " . count($orphans) . " archivos huérfanos de densímetros");
        return $orphans;
    }

    /**
     * Formatear bytes a una unidad legible
     */
    private function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, $precision) . ' ' . $units[$i];
    }
}
