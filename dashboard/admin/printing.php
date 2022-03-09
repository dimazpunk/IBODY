<?php
// Load file koneksi.php
require_once "../../config/config.php";
// Load file autoload.php
require '../../vendor/vendor/autoload.php';
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$score = mysqli_query($con,"SELECT  buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
          shift.id_shift, buat_ss.periode 
          FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
          LEFT JOIN dept ON karyawan.dept = dept.id_dept
          LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
          LEFT JOIN shift ON karyawan.shift = shift.id_shift
          LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori")or die (mysqli_error($con));


while($data = mysqli_fetch_assoc($score)){ // Ambil semua data dari hasil eksekusi $sql
  
  // echo $data['npk'];
  // echo $data['nama'];
  // echo $data['id_kategori'];
  // echo $data['judul'];
  // echo $data['nama_dept'];
  // echo  $data['nama_group'];
  // echo $data['id_shift'];
  // echo $data['periode'];
  
}
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = [
  'font' => ['bold' => true], // Set font nya jadi bold
  'alignment' => [
    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ],
  'borders' => [
    'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
    'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
    'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
    'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
  ]
];
// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = [
  'alignment' => [
    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ],
  'borders' => [
    'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
    'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
    'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
    'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
  ]
];
//membuat paginations//
  

$sheet->setCellValue('A4', "No"); // Set kolom A4 dengan tulisan "Tanggal"
$sheet->setCellValue('B4', "Npk"); // Set kolom B4 dengan tulisan "Kode Transaksi"
$sheet->setCellValue('C4', "Kategori"); // Set kolom C4 dengan tulisan "Barang"
$sheet->setCellValue('D4', "Judul"); // Set kolom D4 dengan tulisan "Jumlah"
$sheet->setCellValue('E4', "Dept"); // Set kolom E4 dengan tulisan "Total Harga"
$sheet->setCellValue('F4', "Group"); // Set kolom A4 dengan tulisan "Tanggal"
$sheet->setCellValue('G4', "Shif"); // Set kolom B4 dengan tulisan "Kode Transaksi"
$sheet->setCellValue('H4', "Date"); // Set kolom C4 dengan tulisan "Barang"
$sheet->setCellValue('I4', "Nilai"); // Set kolom D4 dengan tulisan "Jumlah"
$sheet->setCellValue('J4', "Nominal"); // Set kolom E4 dengan tulisan "Total Harga"

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$sheet->getStyle('A4')->applyFromArray($style_col);
$sheet->getStyle('B4')->applyFromArray($style_col);
$sheet->getStyle('C4')->applyFromArray($style_col);
$sheet->getStyle('D4')->applyFromArray($style_col);
$sheet->getStyle('E4')->applyFromArray($style_col);
$sheet->getStyle('F4')->applyFromArray($style_col);
$sheet->getStyle('G4')->applyFromArray($style_col);
$sheet->getStyle('H4')->applyFromArray($style_col);
$sheet->getStyle('I4')->applyFromArray($style_col);
$sheet->getStyle('J4')->applyFromArray($style_col);

// Set height baris ke 1, 2, 3 dan 4
$sheet->getRowDimension('1')->setRowHeight(20);
$sheet->getRowDimension('2')->setRowHeight(20);
$sheet->getRowDimension('3')->setRowHeight(20);
$sheet->getRowDimension('4')->setRowHeight(20);
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 5
$sql = $score;// Eksekusi/Jalankan query dari variabel $query
// while($data = mysqli_fetch_assoc($sql)){ // Ambil semua data dari hasil eksekusi $sql
//   // $tgl = date('d-m-Y', strtotime($data['tgl'])); // Ubah format tanggal jadi dd-mm-yyyy
//   $sheet->setCellValue('A'.$numrow, $no);
//   $sheet->setCellValue('B'.$numrow, $data['npk']);
//   $sheet->setCellValue('C'.$numrow, $data['nama']);
//   $sheet->setCellValue('D'.$numrow, $data['id_kategori']);
//   $sheet->setCellValue('E'.$numrow, $data['judul']);
//   $sheet->setCellValue('F'.$numrow, $data['nama_dept']);
//   $sheet->setCellValue('G'.$numrow, $data['nama_group']);
//   $sheet->setCellValue('H'.$numrow, $data['id_shift']);
//   $sheet->setCellValue('I'.$numrow, $data['periode']);
  
// }
// Set orientasi kertas jadi LANDSCAPE
// $dirPath  = "/usr/share";
// $fileName = "{$dirPath}/filename.Xlsx";
$fileName = "{$dirPath}/filename.Xlsx";
// recursively creates all required nested directories
if (!file_exists($dirPath)) {
    mkdir($dirPath, 0774, true);
}
$name="laporan.xls";
// $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
// Set judul file sheet nya
$sheet->setTitle("Laporan SS");
$sheet;
// Proses file sheet
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename='.$name); // Set nama file sheet nya
// header('Cache-Control: max-age=0');
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

$writer->save($name);
$content = file_get_contents($name);

unlink($name);
exit($content)

// exit($content);
?>