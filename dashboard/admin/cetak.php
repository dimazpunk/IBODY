<?php
require_once "../../config/config.php";
require '../../phpspreadsheet/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

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

    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Npk');
    $sheet->setCellValue('C1', 'Nama');
    $sheet->setCellValue('D1', 'Kategori');
    $sheet->setCellValue('E1', 'Judul');
    $sheet->setCellValue('F1', 'Dept');
    $sheet->setCellValue('G1', 'Group');
    $sheet->setCellValue('H1', 'Shift');
    $sheet->setCellValue('I1', 'Periode');
    $sheet->setCellValue('J1', 'Nilai');
    $sheet->setCellValue('K1', 'Nonimal');
    
                $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress
                FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                LEFT JOIN dept ON karyawan.dept = dept.id_dept
                LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                LEFT JOIN shift ON karyawan.shift = shift.id_shift
                LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai >0 AND buat_ss.periode BETWEEN '$_GET[dari]' AND '$_GET[ke]' ORDER BY periode ASC")or die (mysqli_error($con));
                                    
    $i=2;
    $no=1;
    while ($sc = mysqli_fetch_assoc ($score)){
  
        $nilai = $sc['nilai'];
        if ($nilai >= 98 AND $nilai <=100){
          $nominal= 150000;
        }elseif ($nilai >= 95){
          $nominal= 125000;
        }elseif ($nilai >= 92){
          $nominal= 100000; 
        }elseif ($nilai >= 89){
          $nominal= 80000;
        }elseif ($nilai >= 86){
          $nominal= 60000;
        }elseif ($nilai >= 80){
          $nominal= 40000;  
        }elseif ($nilai >= 74){
          $nominal= 25000;   
        }elseif ($nilai >= 69){
          $nominal= 20000; 
        }elseif ($nilai >= 64){
          $nominal= 15000; 
        }elseif ($nilai >= 59){
          $nominal= 10000;  
        }elseif ($nilai >= 49){
          $nominal= 8000;  
        }elseif ($nilai >= 37){
          $nominal= 6000;
        }elseif ($nilai >= 25){
          $nominal= 4000;
        }elseif ($nilai >= 13){
          $nominal=3000;
        }elseif ($nilai >= 1){
          $nominal= 2500;
        }else{
          $nominal=0;
        }
        $rupiah="Rp ".number_format ($nominal,0,'',',');
   
  
    $sheet->setCellValue('A'.$i, $no);
    $sheet->setCellValue('B'.$i, $sc['npk']);
    $sheet->setCellValue('C'.$i, $sc['nama']);
    $sheet->setCellValue('D'.$i, $sc['id_kategori']);
    $sheet->setCellValue('E'.$i, $sc['judul']);
    $sheet->setCellValue('F'.$i, $sc['nama_dept']);
    $sheet->setCellValue('G'.$i, $sc['nama_group']);
    $sheet->setCellValue('H'.$i, $sc['id_shift']);
    $sheet->setCellValue('I'.$i, $sc['periode']);
    $sheet->setCellValue('J'.$i, $sc['nilai']);
    $sheet->setCellValue('K'.$i, $rupiah);

    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
    $sheet->getStyle('A'.$i)->applyFromArray($style_row);
    $sheet->getStyle('B'.$i)->applyFromArray($style_row);
    $sheet->getStyle('C'.$i)->applyFromArray($style_row);
    $sheet->getStyle('D'.$i)->applyFromArray($style_row);
    $sheet->getStyle('E'.$i)->applyFromArray($style_row);
    $sheet->getStyle('F'.$i)->applyFromArray($style_row);
    $sheet->getStyle('G'.$i)->applyFromArray($style_row);
    $sheet->getStyle('H'.$i)->applyFromArray($style_row);
    $sheet->getStyle('I'.$i)->applyFromArray($style_row);
    $sheet->getStyle('J'.$i)->applyFromArray($style_row);
    $sheet->getStyle('K'.$i)->applyFromArray($style_row);

    $sheet->getRowDimension($i)->setRowHeight(20);
                                  
    $i++;
    $no++;                  
}
    //set colom
    $sheet->getColumnDimension('A')->setWidth(4); // Set width kolom A
    $sheet->getColumnDimension('B')->setWidth(12); // Set width kolom B
    $sheet->getColumnDimension('C')->setWidth(15); // Set width kolom C
    $sheet->getColumnDimension('D')->setWidth(15); // Set width kolom D
    $sheet->getColumnDimension('E')->setWidth(50); // Set width kolom E
    $sheet->getColumnDimension('F')->setWidth(10); // Set width kolom C
    $sheet->getColumnDimension('G')->setWidth(20); // Set width kolom D
    $sheet->getColumnDimension('H')->setWidth(7); // Set width kolom E
    $sheet->getColumnDimension('I')->setWidth(20); // Set width kolom C
    $sheet->getColumnDimension('J')->setWidth(10); // Set width kolom D
    $sheet->getColumnDimension('K')->setWidth(20); // Set width kolom E

    // // Set height baris ke 1, 2, 3 dan 4
    // $sheet->getActiveSheet()->getRowDimension('1')->setRowHeight(20);


    // $styleArray = [
    //             'borders' => [
    //                 'allBorders' => [
    //                     'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                 ],
    //             ],
    //         ];
    // $i = $i - 1;
    // $sheet->getStyle('A1:G'.$i)->applyFromArray($styleArray);

    $filename = "Data Suggestion System .xlsx";
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