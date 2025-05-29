<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\DensimetroArchivo;
use App\Models\TeamMember;
use App\Models\Empresa;

class VerifyStorageFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:verify {--fix : Intentar reparar rutas rotas automáticamente}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica la integridad de los archivos almacenados y repara rutas rotas';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fix = $this->option('fix');

        $this->info('🔍 Verificando integridad de archivos almacenados...');
        $this->newLine();

        $totalErrors = 0;
        $totalFixed = 0;

        // Verificar archivos de densímetros
        $this->info('📁 Verificando archivos de densímetros...');
        $densimetroErrors = $this->verifyDensimetroFiles($fix);
        $totalErrors += $densimetroErrors['errors'];
        $totalFixed += $densimetroErrors['fixed'];

        // Verificar imágenes de equipo
        $this->info('📁 Verificando imágenes del equipo...');
        $teamErrors = $this->verifyTeamFiles($fix);
        $totalErrors += $teamErrors['errors'];
        $totalFixed += $teamErrors['fixed'];

        // Verificar logos de empresas
        $this->info('📁 Verificando logos de empresas...');
        $empresaErrors = $this->verifyEmpresaFiles($fix);
        $totalErrors += $empresaErrors['errors'];
        $totalFixed += $empresaErrors['fixed'];

        $this->newLine();

        if ($totalErrors === 0) {
            $this->info('✅ Todos los archivos están correctamente almacenados y accesibles.');
        } else {
            $this->error("❌ Se encontraron {$totalErrors} archivos con problemas.");

            if ($fix && $totalFixed > 0) {
                $this->info("🔧 Se repararon {$totalFixed} archivos automáticamente.");
            } elseif (!$fix) {
                $this->warn('💡 Ejecuta con --fix para intentar reparar automáticamente.');
            }
        }

        return $totalErrors > 0 ? 1 : 0;
    }

    /**
     * Verificar archivos de densímetros
     */
    private function verifyDensimetroFiles($fix)
    {
        $errors = 0;
        $fixed = 0;

        $archivos = DensimetroArchivo::all();

        foreach ($archivos as $archivo) {
            if (!Storage::disk('public')->exists($archivo->ruta_archivo)) {
                $this->warn("   ❌ Archivo faltante: {$archivo->ruta_archivo} (ID: {$archivo->id})");
                $errors++;

                if ($fix) {
                    // Intentar encontrar el archivo en ubicaciones alternativas
                    $alternativePaths = [
                        'archivos/densimetros/' . $archivo->densimetro_id . '/' . basename($archivo->ruta_archivo),
                        'archivos/' . basename($archivo->ruta_archivo),
                        basename($archivo->ruta_archivo)
                    ];

                    foreach ($alternativePaths as $altPath) {
                        if (Storage::disk('public')->exists($altPath)) {
                            $this->info("   🔧 Reparando: {$archivo->ruta_archivo} -> {$altPath}");
                            $archivo->ruta_archivo = $altPath;
                            $archivo->save();
                            $fixed++;
                            break;
                        }
                    }
                }
            }
        }

        $this->line("   📊 Archivos verificados: " . $archivos->count() . " | Errores: {$errors}");

        return ['errors' => $errors, 'fixed' => $fixed];
    }

    /**
     * Verificar imágenes del equipo
     */
    private function verifyTeamFiles($fix)
    {
        $errors = 0;
        $fixed = 0;

        $members = TeamMember::whereNotNull('image')->get();

        foreach ($members as $member) {
            if (!Storage::disk('public')->exists($member->image)) {
                $this->warn("   ❌ Imagen faltante: {$member->image} (Miembro: {$member->name})");
                $errors++;

                if ($fix) {
                    // Intentar encontrar la imagen en ubicaciones alternativas
                    $alternativePaths = [
                        'team/' . basename($member->image),
                        basename($member->image)
                    ];

                    foreach ($alternativePaths as $altPath) {
                        if (Storage::disk('public')->exists($altPath)) {
                            $this->info("   🔧 Reparando: {$member->image} -> {$altPath}");
                            $member->image = $altPath;
                            $member->save();
                            $fixed++;
                            break;
                        }
                    }
                }
            }
        }

        $this->line("   📊 Imágenes verificadas: " . $members->count() . " | Errores: {$errors}");

        return ['errors' => $errors, 'fixed' => $fixed];
    }

    /**
     * Verificar logos de empresas
     */
    private function verifyEmpresaFiles($fix)
    {
        $errors = 0;
        $fixed = 0;

        $empresas = Empresa::whereNotNull('logo')->get();

        foreach ($empresas as $empresa) {
            if (!Storage::disk('public')->exists($empresa->logo)) {
                $this->warn("   ❌ Logo faltante: {$empresa->logo} (Empresa: {$empresa->nombre})");
                $errors++;

                if ($fix) {
                    // Intentar encontrar el logo en ubicaciones alternativas
                    $alternativePaths = [
                        'logos/' . basename($empresa->logo),
                        basename($empresa->logo)
                    ];

                    foreach ($alternativePaths as $altPath) {
                        if (Storage::disk('public')->exists($altPath)) {
                            $this->info("   🔧 Reparando: {$empresa->logo} -> {$altPath}");
                            $empresa->logo = $altPath;
                            $empresa->save();
                            $fixed++;
                            break;
                        }
                    }
                }
            }
        }

        $this->line("   📊 Logos verificados: " . $empresas->count() . " | Errores: {$errors}");

        return ['errors' => $errors, 'fixed' => $fixed];
    }
}
