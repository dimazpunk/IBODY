<?php
require_once "../../config/config.php";
require '../../phpspreadsheet/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    if(isset($_POST['import'])){ // Jika user mengklik tombol Import
        $nama_file_baru = $_POST['namafile'];
          $path = 'tmp/' . $nama_file_baru; // Set tempat menyimpan file tersebut dimana
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
          $spreadsheet = $reader->load($path); // Load file yang tadi diupload ke folder tmp
          $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        $numrow = 1;
        foreach($sheet AS $row){
          // Ambil data pada excel sesuai Kolom
            $no             = $row['A']; // Ambil data No
            $npk            = $row['B']; // Ambil data npk
            $nama           = $row['C']; // Ambil data nama
            $tanggal_lahir  = $row['D']; // Ambil data tanggal lahir
            $tanggal_masuk  = $row['E']; // Ambil data masuk
            $dept           = $row['F']; // Ambil data dept
            $dept_fungsion  = $row['G']; // Ambil data dept fungsion
            $section        = $row['H']; // Ambil data section
            $group          = $row['I']; // Ambil data group
            $shift          = $row['J']; // Ambil data shift
            $jabatan        = $row['K']; // Ambil data jabatan
            $status         = $row['L']; // Ambil data status
            $divhead        = $row['M']; // Ambil data divhead
          // Cek jika semua data tidak diisi
          if($npk == "" && $nama == "" && $tanggal_lahir == "" && $tanggal_masuk == "" && $dept == "" && $dept_fungsion == ""
            && $section == "" && $group == "" && $shift == "" && $jabatan == "" && $status == "" && $divhead == "")
            continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
          // Cek $numrow apakah lebih dari 1
          // Artinya karena baris pertama adalah nama-nama kolom
          // Jadi dilewat saja, tidak usah diimport
          if($numrow > 1){
            // Buat query Insert
            $data = "INSERT INTO karyawan VALUES('" . $npk . "','" . $nama . "','" . $tanggal_lahir . "','" . $tanggal_masuk . "','" . $dept . "','" . $dept_fungsion . "',
                                                '" . $section . "','" . $group . "','" . $shift . "','" . $jabatan . "','" . $status . "','" . $divhead . "')";
            // Eksekusi $query
            mysqli_query($con, $data);
          }
          $numrow++; // Tambah 1 setiap kali looping
        }
          unlink($path); // Hapus file excel yg telah diupload, ini agar tidak terjadi penumpukan file
      }
      header('location: index.php'); // Redirect ke halaman awal