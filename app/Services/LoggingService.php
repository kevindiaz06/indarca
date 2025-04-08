<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class LoggingService
{
    public function logActivity(string $action, string $description, array $context = [])
    {
        $logData = [
            'timestamp' => Carbon::now()->toDateTimeString(),
            'action' => $action,
            'description' => $description,
            'user_id' => auth()->id() ?? 'system',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'context' => $context
        ];

        Log::channel('activity')->info(json_encode($logData));
    }

    public function logError(string $action, string $error, array $context = [])
    {
        $logData = [
            'timestamp' => Carbon::now()->toDateTimeString(),
            'action' => $action,
            'error' => $error,
            'user_id' => auth()->id() ?? 'system',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'context' => $context
        ];

        Log::channel('error')->error(json_encode($logData));
    }

    public function getActivityLogs($startDate = null, $endDate = null)
    {
        $logs = [];
        $logFile = storage_path('logs/activity.log');

        if (file_exists($logFile)) {
            $lines = file($logFile);
            foreach ($lines as $line) {
                $logEntry = json_decode($line, true);
                if ($logEntry) {
                    $logDate = Carbon::parse($logEntry['timestamp']);
                    if ((!$startDate || $logDate->gte($startDate)) &&
                        (!$endDate || $logDate->lte($endDate))) {
                        $logs[] = $logEntry;
                    }
                }
            }
        }

        return collect($logs);
    }
}
