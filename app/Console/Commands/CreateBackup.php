<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\BackupService;
use App\Services\LoggingService;

class CreateBackup extends Command
{
    protected $signature = 'backup:create';
    protected $description = 'Create a new backup of the database';

    protected $backupService;
    protected $loggingService;

    public function __construct(BackupService $backupService, LoggingService $loggingService)
    {
        parent::__construct();
        $this->backupService = $backupService;
        $this->loggingService = $loggingService;
    }

    public function handle()
    {
        try {
            $this->info('Creating backup...');
            $backupPath = $this->backupService->createBackup();

            if ($backupPath) {
                $this->info('Backup created successfully at: ' . $backupPath);
                $this->loggingService->logActivity(
                    'backup_created',
                    'Database backup created successfully',
                    ['path' => $backupPath]
                );
            } else {
                throw new \Exception('Failed to create backup');
            }

            $this->info('Cleaning old backups...');
            $this->backupService->cleanOldBackups();
            $this->info('Old backups cleaned successfully');

        } catch (\Exception $e) {
            $this->error('Error creating backup: ' . $e->getMessage());
            $this->loggingService->logError(
                'backup_failed',
                $e->getMessage()
            );
        }
    }
}
