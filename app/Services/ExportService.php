<?php

namespace App\Services;

use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class ExportService
{
    public function exportToExcel(Collection $data, array $headers, string $filename)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Agregar encabezados
        $column = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($column, 1, $header);
            $column++;
        }

        // Agregar datos
        $row = 2;
        foreach ($data as $item) {
            $column = 1;
            foreach ($item as $value) {
                $sheet->setCellValueByColumnAndRow($column, $row, $value);
                $column++;
            }
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $path = storage_path("app/exports/{$filename}.xlsx");
        $writer->save($path);

        return $path;
    }

    public function exportToCsv(Collection $data, array $headers, string $filename)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Agregar encabezados
        $column = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($column, 1, $header);
            $column++;
        }

        // Agregar datos
        $row = 2;
        foreach ($data as $item) {
            $column = 1;
            foreach ($item as $value) {
                $sheet->setCellValueByColumnAndRow($column, $row, $value);
                $column++;
            }
            $row++;
        }

        $writer = new Csv($spreadsheet);
        $path = storage_path("app/exports/{$filename}.csv");
        $writer->save($path);

        return $path;
    }

    public function exportToJson(Collection $data, string $filename)
    {
        $path = storage_path("app/exports/{$filename}.json");
        file_put_contents($path, $data->toJson(JSON_PRETTY_PRINT));

        return $path;
    }
}
