<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class ExportController extends Controller
{
    /**
     * Summary of exportDefaultExcel
     * @return StreamedResponse
     */
    public function exportDefaultExcel(): StreamedResponse
    {
        $tables = [
            'theme_contents',
            'intro_contents',
            'section_contents',
            'sub_section_contents'
        ];
        $themeTable = [
            'slug',
            'description',
            'language_id',
        ];
        $introTable = [
            'title',
            'small_text',
            'year',
            'language_id'
        ];
        $sectionTable = [
            'title',
            'language_id'
        ];
        $subSectionTable = [
            'title',
            'sub_title',
            'paragraph',
            'language_id',
            'zodiac_sign_id',
            'section_title'
        ];

        $spreadsheet = new Spreadsheet();

        foreach ($tables as $index => $table) {
            switch ($table) {
                case 'theme_contents':
                    $headers = $themeTable;
                    break;
                case 'intro_contents':
                    $headers = $introTable;
                    break;
                case 'section_contents':
                    $headers = $sectionTable;
                    break;
                case 'sub_section_contents':
                    $headers = $subSectionTable;
                    break;
                default:
                    $headers = [];
            }
            if ($index === 0) {
                $sheet = $spreadsheet->getActiveSheet();
            } else {
                $sheet = $spreadsheet->createSheet();
            }
            $sheet->setTitle(substr($table, 0, 31));

            foreach ($headers as $colIndex => $header) {
                $cell = Coordinate::stringFromColumnIndex($colIndex + 1) . '1';
                $sheet->setCellValue($cell, $header);
            }
        }

        $spreadsheet->setActiveSheetIndex(0);

        $writer = new Xlsx($spreadsheet);

        return new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="default_template.xlsx"',
            'Cache-Control' => 'max-age=0',
        ]);
    }
}