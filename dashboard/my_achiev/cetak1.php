<?php
require_once "../../config/config.php";
if (isset($_SESSION['npk'])){
  $grp = $_SESSION ['group'];
  $npk = $_SESSION ['npk']; 
}
    $today = date ("Y-m-d");
    $bulan = date ("M Y");
    $tanggal_awal = date ('Y-m-01', strtotime($today));
    $tanggal_akhir = date ('Y-m-t', strtotime ($today));
    
    
        $awal = $_GET ['dari'];
        $akhir = $_GET ['ke'];
        $tahun = $_GET ['tahun'];

        $blnpertama = date ('d-'.$awal. '-'.$tahun);
        $hari = date ('d-'.$akhir. '-'.$tahun);
    
        $blnawal = date ('m', strtotime ($blnpertama));
        $blnakhir = date ('m', strtotime($hari));

        $tanggal_mulai = date ('Y-m-d', strtotime($hari.'-'.$blnawal.'-01'));
        $tanggal_akhir = date ('Y-m-t', strtotime($hari.'-'.$blnakhir.'-01'));

        $count_awal = date_create ($tanggal_mulai);
        $count_akhir = date_create ($tanggal_akhir);
        $todays = date_diff ($count_awal,$count_akhir) ->days +1;
        $selisih_bulan = ($blnakhir - $blnawal)+1;

        $bln = $selisih_bulan;
        
require '../../phpspreadsheet/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Npk');
    $sheet->setCellValue('C1', 'Nama');
    $no = 1;
    $cell = "D";
    // for ($b = "D"; $b <= "Z" ; $b++){
    for ($i = 0; $i < $bln ; $i++){
      $b = $i + ($awal);
      $namabln = date ('M-Y', strtotime($tahun.'-'.$b.'-1'));
      $sheet->setCellValue($cell.'1', $namabln);

      $cell++;
    }
    $tots = 3; // melooping jumlah kolom yang ada 3
    for ($i = 0; $i < $tots ; $i++){
      $b = ($i) + ($awal);
      $date_awal = date ('Y-m-01', strtotime($tahun.'-'.$b.'-1'));
      $date_akhir = date ('Y-m-t', strtotime($tahun.'-'.$b.'-1'));

      $control = mysqli_query ($con,"SELECT karyawan.npk AS npk, karyawan.nama, dept.nama_dept AS dp, dept.nama_dept, shift.id_shift, group_tb.nama_group AS grp,
      (SELECT count(buat_ss.npk) FROM buat_ss WHERE buat_ss.npk = karyawan.npk AND buat_ss.nilai >0 AND periode  between '$date_awal' AND '$date_akhir' ) AS total
      FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group 
      LEFT JOIN dept ON karyawan.dept = dept.id_dept                            
      LEFT JOIN shift ON karyawan.shift = shift.id_shift ORDER BY karyawan.npk")or die (mysqli_error($con)); 
      $no=2;
      $na=1;
      while ($ct = mysqli_fetch_assoc($control)){
        $sheet->setCellValue('A'.$no, $na);
        $sheet->setCellValue('B'.$no, $ct['npk']);
        $sheet->setCellValue('C'.$no, $ct['nama']);

        $no++;
        $na++;
      }
    }
    $cells = "D";
    $tots = $bln;
    for ($i = 0; $i < $tots ; $i++){
      $b = ($i) + ($awal);
      $date_awal = date ('Y-m-01', strtotime($tahun.'-'.$b.'-1'));
      $date_akhir = date ('Y-m-t', strtotime($tahun.'-'.$b.'-1'));

      $control = mysqli_query ($con,"SELECT karyawan.npk AS npk, karyawan.nama, dept.nama_dept AS dp, dept.nama_dept, shift.id_shift, group_tb.nama_group AS grp,
      (SELECT count(buat_ss.npk) FROM buat_ss WHERE buat_ss.npk = karyawan.npk AND buat_ss.nilai >0 AND periode  between '$date_awal' AND '$date_akhir' ) AS total
      FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group 
      LEFT JOIN dept ON karyawan.dept = dept.id_dept                            
      LEFT JOIN shift ON karyawan.shift = shift.id_shift ORDER BY karyawan.npk")or die (mysqli_error($con)); 
      $no=2;
      
      while ($ct = mysqli_fetch_assoc($control)){
        $sheet->setCellValue($cells.$no, $ct['total']);

        $no++;
      }
      $cells++;
    }
    //menampilkan data //

    // $i=2;

    //   $na = 2;
    //   $cell = "D";
    //   for ($a = 0; $a < $bln ; $a++){
    //     $b = $a + ($awal);
    //     $date_awal = date ('Y-m-01', strtotime($tahun.'-'.$b.'-1'));
    //     $date_akhir = date ('Y-m-t', strtotime($tahun.'-'.$b.'-1'));

    //     $jumlah1 = "SELECT nilai, periode
    //                 FROM buat_ss WHERE nilai >0  AND periode ";

    //     $qry = mysqli_num_rows(mysqli_query($con, $jumlah1." AND buat_ss.npk = '$ct[npk]' AND periode between '$date_awal' AND '$date_akhir'"));
    //     $sheet->setCellValue($cell.$na, $qry);
    //     $cell++;
    //     $na++;
    //   }
    
    // $sheet->setCellValue('A'.$i, $no);
    // $sheet->setCellValue('B'.$i, $ct['npk']);
    // $sheet->setCellValue('C'.$i, $ct['nama']);

    // $i++;
    // $no++;  
        
    
    //set colom
    $sheet->getColumnDimension('A')->setWidth(4); // Set width kolom A
    $sheet->getColumnDimension('B')->setWidth(12); // Set width kolom B
    $sheet->getColumnDimension('C')->setWidth(15); // Set width kolom C
    $sheet->getColumnDimension('D')->setWidth(15); // Set width kolom D
    $no = 1;
    $cell = "D";
    for ($i = 0; $i < $bln ; $i++){
      // $b = $i + ($awal);
      $namabln = date ('M-Y', strtotime($tahun.'-'.$b.'-1'));
      $sheet->getColumnDimension($cell)->setWidth(15); // Set width kolom D

      $cell++;
    }
    

    $filename = "Rekap Monitoring Data SS.xlsx";
    try {
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);
        $content = file_get_contents($filename);
    } catch(Exception $e) {
        exit($e->getMessage());
    }
    
    header("Content-Disposition: attachment; filename=".$filename);
    
    unlink($filename);
    exit($content);    
?>