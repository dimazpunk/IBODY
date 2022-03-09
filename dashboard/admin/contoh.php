<?php
require '../../vendor/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
$sheet->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai F1
$sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
$sheet->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
// Buat header tabel nya pada baris ke 3
$sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
$sheet->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
$sheet->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
$sheet->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$sheet->setCellValue('E3', "TELEPON"); // Set kolom E3 dengan tulisan "TELEPON"
$sheet->setCellValue('F3', "ALAMAT"); // Set kolom F3 dengan tulisan "ALAMAT"
// Apply style header yang telah kita buat tadi ke masing-masing kolom header
// Set height baris ke 1, 2 dan 3
// Set orientasi kertas jadi LANDSCAPE

$sheet->setTitle("Laporan Data Siswa");
// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');
$writer = new Xlsx($spreadsheet);
$writer->save($nama);
unlink($nama);
exit($content);
?>
<!-- 
// $spreadsheet = new Spreadsheet();
// $sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'Hello World !');

// $writer = new Xlsx($spreadsheet);
// $writer->save('hello world.xlsx'); -->
