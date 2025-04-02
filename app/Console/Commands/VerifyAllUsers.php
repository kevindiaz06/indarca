<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class VerifyAllUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:verify-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Marcar como verificados todos los usuarios existentes en la base de datos';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Verificando todas las cuentas de usuario...');

        // Obtener usuarios sin verificar
        $unverifiedUsers = User::whereNull('email_verified_at')->get();

        if ($unverifiedUsers->isEmpty()) {
            $this->info('Todos los usuarios ya están verificados.');
            return;
        }

        $count = 0;
        foreach ($unverifiedUsers as $user) {
            $user->email_verified_at = Carbon::now();
            $user->save();
            $count++;
        }

        $this->info("Se han verificado {$count} cuentas de usuario.");
    }
}
