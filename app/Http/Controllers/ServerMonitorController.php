<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ServerMonitorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $serverInfo = $this->getServerInfo();
        $systemInfo = $this->getSystemInfo();
        $databaseInfo = $this->getDatabaseInfo();
        $storageInfo = $this->getStorageInfo();
        
        return view('admin.server-monitor.index', compact(
            'serverInfo', 
            'systemInfo', 
            'databaseInfo', 
            'storageInfo'
        ));
    }

    public function getSystemData()
    {
        return response()->json([
            'server' => $this->getServerInfo(),
            'system' => $this->getSystemInfo(),
            'database' => $this->getDatabaseInfo(),
            'storage' => $this->getStorageInfo(),
            'timestamp' => now()->format('H:i:s')
        ]);
    }

    public function downloadServerReport()
    {
        $serverInfo = $this->getServerInfo();
        $systemInfo = $this->getSystemInfo();
        $databaseInfo = $this->getDatabaseInfo();
        $storageInfo = $this->getStorageInfo();
        
        // Generar alertas para el PDF
        $alerts = $this->generateSystemAlerts($systemInfo, $storageInfo, $databaseInfo);
        
        $data = [
            'serverInfo' => $serverInfo,
            'systemInfo' => $systemInfo,
            'databaseInfo' => $databaseInfo,
            'storageInfo' => $storageInfo,
            'alerts' => $alerts,
            'generatedAt' => now()->format('d/m/Y H:i:s'),
            'generatedBy' => auth()->user()->name,
        ];

        $pdf = Pdf::loadView('admin.server-monitor.pdf-report', $data);
        $pdf->setPaper('A4', 'portrait');
        
        $filename = 'informe-servidor-' . now()->format('Y-m-d-H-i-s') . '.pdf';
        
        return $pdf->download($filename);
    }

    private function getServerInfo()
    {
        return [
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
            'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Desconocido',
            'server_name' => $_SERVER['SERVER_NAME'] ?? 'Desconocido',
            'server_port' => $_SERVER['SERVER_PORT'] ?? 'Desconocido',
            'document_root' => $_SERVER['DOCUMENT_ROOT'] ?? 'Desconocido',
            'max_execution_time' => ini_get('max_execution_time'),
            'memory_limit' => ini_get('memory_limit'),
            'upload_max_filesize' => ini_get('upload_max_filesize'),
            'post_max_size' => ini_get('post_max_size'),
        ];
    }

    private function getSystemInfo()
    {
        $uptime = $this->getSystemUptime();
        $loadAverage = $this->getLoadAverage();
        $memoryUsage = $this->getMemoryUsage();
        $diskUsage = $this->getDiskUsage();

        return [
            'operating_system' => PHP_OS,
            'uptime' => $uptime,
            'load_average' => $loadAverage,
            'memory_usage' => $memoryUsage,
            'disk_usage' => $diskUsage,
            'current_memory_usage' => $this->formatBytes(memory_get_usage(true)),
            'peak_memory_usage' => $this->formatBytes(memory_get_peak_usage(true)),
        ];
    }

    private function getDatabaseInfo()
    {
        try {
            $connection = DB::connection()->getPdo();
            $databaseName = DB::connection()->getDatabaseName();
            
            // Obtener información de la base de datos
            $tables = DB::select("SELECT COUNT(*) as count FROM information_schema.tables WHERE table_schema = ?", [$databaseName]);
            $tableCount = $tables[0]->count ?? 0;

            // Información de conexión
            $connectionInfo = [
                'driver' => config('database.default'),
                'database_name' => $databaseName,
                'connected' => true,
                'table_count' => $tableCount,
            ];

            // Intentar obtener el tamaño de la base de datos (funciona con MySQL)
            try {
                $size = DB::select("SELECT ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS size_mb FROM information_schema.tables WHERE table_schema = ?", [$databaseName]);
                $connectionInfo['size_mb'] = $size[0]->size_mb ?? 'N/A';
            } catch (\Exception $e) {
                $connectionInfo['size_mb'] = 'N/A';
            }

            return $connectionInfo;
        } catch (\Exception $e) {
            return [
                'driver' => config('database.default'),
                'connected' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    private function getStorageInfo()
    {
        $storagePath = storage_path();
        $publicPath = public_path();
        
        return [
            'storage_path' => $storagePath,
            'storage_free_space' => $this->formatBytes(disk_free_space($storagePath)),
            'storage_total_space' => $this->formatBytes(disk_total_space($storagePath)),
            'storage_used_space' => $this->formatBytes(disk_total_space($storagePath) - disk_free_space($storagePath)),
            'storage_usage_percentage' => round(((disk_total_space($storagePath) - disk_free_space($storagePath)) / disk_total_space($storagePath)) * 100, 2),
            'public_path' => $publicPath,
        ];
    }

    private function getSystemUptime()
    {
        if (PHP_OS_FAMILY === 'Linux') {
            try {
                $uptime = file_get_contents('/proc/uptime');
                $uptimeSeconds = floatval(explode(' ', $uptime)[0]);
                return $this->formatUptime($uptimeSeconds);
            } catch (\Exception $e) {
                return 'N/A';
            }
        }
        return 'N/A';
    }

    private function getLoadAverage()
    {
        if (function_exists('sys_getloadavg')) {
            $load = sys_getloadavg();
            return [
                '1min' => round($load[0], 2),
                '5min' => round($load[1], 2),
                '15min' => round($load[2], 2),
            ];
        }
        return ['1min' => 'N/A', '5min' => 'N/A', '15min' => 'N/A'];
    }

    private function getMemoryUsage()
    {
        if (PHP_OS_FAMILY === 'Linux') {
            try {
                $meminfo = file_get_contents('/proc/meminfo');
                preg_match('/MemTotal:\s+(\d+)\s+kB/', $meminfo, $total);
                preg_match('/MemAvailable:\s+(\d+)\s+kB/', $meminfo, $available);
                
                if (isset($total[1]) && isset($available[1])) {
                    $totalMem = $total[1] * 1024;
                    $availableMem = $available[1] * 1024;
                    $usedMem = $totalMem - $availableMem;
                    
                    return [
                        'total' => $this->formatBytes($totalMem),
                        'used' => $this->formatBytes($usedMem),
                        'available' => $this->formatBytes($availableMem),
                        'usage_percentage' => round(($usedMem / $totalMem) * 100, 2),
                    ];
                }
            } catch (\Exception $e) {
                // Fallback si no se puede leer /proc/meminfo
            }
        }
        
        return [
            'total' => 'N/A',
            'used' => 'N/A',
            'available' => 'N/A',
            'usage_percentage' => 'N/A',
        ];
    }

    private function getDiskUsage()
    {
        $rootPath = '/';
        if (PHP_OS_FAMILY === 'Windows') {
            $rootPath = 'C:';
        }
        
        try {
            $totalSpace = disk_total_space($rootPath);
            $freeSpace = disk_free_space($rootPath);
            $usedSpace = $totalSpace - $freeSpace;
            
            return [
                'total' => $this->formatBytes($totalSpace),
                'used' => $this->formatBytes($usedSpace),
                'free' => $this->formatBytes($freeSpace),
                'usage_percentage' => round(($usedSpace / $totalSpace) * 100, 2),
            ];
        } catch (\Exception $e) {
            return [
                'total' => 'N/A',
                'used' => 'N/A',
                'free' => 'N/A',
                'usage_percentage' => 'N/A',
            ];
        }
    }

    private function formatBytes($size, $precision = 2)
    {
        if ($size === false || $size === null) {
            return 'N/A';
        }
        
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        for ($i = 0; $size > 1024 && $i < count($units) - 1; $i++) {
            $size /= 1024;
        }
        
        return round($size, $precision) . ' ' . $units[$i];
    }

    private function formatUptime($seconds)
    {
        $days = floor($seconds / 86400);
        $hours = floor(($seconds % 86400) / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        
        return sprintf('%d días, %d horas, %d minutos', $days, $hours, $minutes);
    }

    private function generateSystemAlerts($systemInfo, $storageInfo, $databaseInfo)
    {
        $alerts = [];
        
        // Verificar uso de memoria del sistema
        if ($systemInfo['memory_usage']['usage_percentage'] !== 'N/A' && 
            $systemInfo['memory_usage']['usage_percentage'] > 85) {
            $alerts[] = [
                'type' => 'danger',
                'title' => 'Memoria del Sistema Alta',
                'message' => "El uso de memoria del sistema está al {$systemInfo['memory_usage']['usage_percentage']}%"
            ];
        }
        
        // Verificar uso de disco
        if ($storageInfo['storage_usage_percentage'] !== 'N/A' && 
            $storageInfo['storage_usage_percentage'] > 90) {
            $alerts[] = [
                'type' => 'danger',
                'title' => 'Espacio en Disco Bajo',
                'message' => "El disco está al {$storageInfo['storage_usage_percentage']}% de su capacidad"
            ];
        }
        
        // Verificar conexión a base de datos
        if (!$databaseInfo['connected']) {
            $alerts[] = [
                'type' => 'danger',
                'title' => 'Error de Base de Datos',
                'message' => 'No se puede conectar a la base de datos'
            ];
        }
        
        // Verificar carga del sistema
        if ($systemInfo['load_average']['1min'] !== 'N/A' && 
            is_numeric($systemInfo['load_average']['1min']) && 
            $systemInfo['load_average']['1min'] > 2.0) {
            $alerts[] = [
                'type' => 'warning',
                'title' => 'Carga del Sistema Alta',
                'message' => "La carga promedio es {$systemInfo['load_average']['1min']}"
            ];
        }
        
        return $alerts;
    }
} 