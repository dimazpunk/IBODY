<?php
  require_once "../../config/config.php";
  require '../../phpspreadsheet/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

  if (isset($_SESSION['npk'])){
    
    // <!-- Buat Preview Data -->
    // Jika user telah mengklik tombol Preview
    if(isset($_POST['preview'])){
      $nama_file_baru = 'data.xlsx';
      // Cek apakah terdapat file data.xlsx pada folder tmp
      if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
        unlink('tmp/'.$nama_file_baru); // Hapus file tersebut
      $nama_file = $_FILES['file']['name']; // Ambil nama file yang akan diupload
      $tmp_file = $_FILES['file']['tmp_name'];
      $ext = pathinfo($nama_file, PATHINFO_EXTENSION); // Ambil ekstensi file yang akan diupload
      // Cek apakah file yang diupload adalah file xlsx
      if($ext == "xlsx"){
        // Upload file yang dipilih ke folder tmp
        move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);
        // Load librari PHPspreadesheet
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load('tmp/' . $nama_file_baru); // Load file yang tadi diupload ke folder tmp
        $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        // Buat sebuah tag form untuk proses import data ke database
        echo "<form method='post' action='import.php'>";
        // Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
        // ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload)
        echo "<input type='hidden' name='namafile' value='" . $nama_file_baru . "'>";
        // Buat sebuah div untuk alert validasi kosong
        echo "<div class='alert alert-danger' id='kosong'>
        Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum lengkap diisi.
        </div>";
        echo "<table class='table table-bordered'>
        <tr>
            <th>No</th>
            <th>Npk</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>                           
            <th>Tanggal Masuk</th>
            <th>Dept</th>
            <th>Dept Fungsion</th>
            <th>Section</th>
            <th>Group</th>
            <th>Shift</th>
            <th>Jabatan</th>
            <th>Status</th>    
            <th>Divhead</th> 
        </tr>";
        $numrow = 1;
        $kosong = 0;
        foreach ($sheet AS $row) { // Lakukan perulangan dari data yang ada di excel
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
            
          // Cek $numrow apakah lebih dari 1
          // Artinya karena baris pertama adalah nama-nama kolom
          // Jadi dilewat saja, tidak usah diimport
          if($numrow > 1){
            // START -->
            // Cek jika semua data tidak diisi
            if($npk == "" && $nama == "" && $tanggal_lahir == "" && $tanggal_masuk == "" && $dept == "" && $dept_fungsion == ""
                && $section == "" && $group == "" && $shift == "" && $jabatan == "" && $status == "" && $divhead == "")

              continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
            // Validasi apakah semua data telah diisi
            $npk_td = ($npk == "")? " style='background: #E07171;'" : ""; // Jika NIS kosong, beri warna merah
            $nama_td = ($nama == "")? " style='background: #E07171;'" : ""; // Jika Nama kosong, beri warna merah
            $lahir_td = ($tanggal_lahir == "")? " style='background: #E07171;'" : ""; // Jika Jenis Kelamin kosong, beri warna merah
            $masuk_td = ($tanggal_masuk == "")? " style='background: #E07171;'" : ""; // Jika Telepon kosong, beri warna merah
            $dept_td = ($dept == "")? " style='background: #E07171;'" : ""; // Jika Alamat kosong, beri warna merah
            $fung_td = ($dept_fungsion == "")? " style='background: #E07171;'" : ""; // Jika Alamat kosong, beri warna merah
            $sect_td = ($section == "")? " style='background: #E07171;'" : ""; // Jika Alamat kosong, beri warna merah
            $group_td = ($group == "")? " style='background: #E07171;'" : ""; // Jika Alamat kosong, beri warna merah
            $shift_td = ($shift == "")? " style='background: #E07171;'" : ""; // Jika Alamat kosong, beri warna merah
            $jab_td = ($jabatan == "")? " style='background: #E07171;'" : ""; // Jika Alamat kosong, beri warna merah
            $status_td = ($status == "")? " style='background: #E07171;'" : ""; // Jika Alamat kosong, beri warna merah
            $div_td = ($divhead == "")? " style='background: #E07171;'" : ""; // Jika Alamat kosong, beri warna merah
            // Jika salah satu data ada yang kosong
            if($npk == "" OR $nama == "" OR $tanggal_lahir == "" OR $tanggal_masuk == "" OR $dept == "" OR $dept_fungsion == ""
            OR $section == "" OR $group == "" OR $shift == "" OR $jabatan == "" OR $status == "" OR $divhead == ""){
              $kosong++; // Tambah 1 variabel $kosong
            }
            echo "<tr>";
            echo "<td".$npk_td.">".$npk."</td>";
            echo "<td".$nama_td.">".$nama."</td>";
            echo "<td".$lahir_td.">".$tanggal_lahir."</td>";
            echo "<td".$masuk_td.">".$tanggal_masuk."</td>";
            echo "<td".$dept_td.">".$dept."</td>";
            echo "<td".$fung_td.">".$dept_fungsion."</td>";
            echo "<td".$sect_td.">".$section."</td>";
            echo "<td".$group_td.">".$group."</td>";
            echo "<td".$shift_td.">".$shift."</td>";
            echo "<td".$jab_td.">".$jabatan."</td>";
            echo "<td".$status_td.">".$status."</td>";
            echo "<td".$div_td.">".$divhead."</td>"; 
            echo "</tr>";
          }
          $numrow++; // Tambah 1 setiap kali looping
        }
        echo "</table>";
        // Cek apakah variabel kosong lebih dari 1
        // Jika lebih dari 1, berarti ada data yang masih kosong
        if($kosong > 0){
        ?>
          <script>
          $(document).ready(function(){
            // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
            $("#jumlah_kosong").html('<?php echo $kosong; ?>');
            $("#kosong").show(); // Munculkan alert validasi kosong
          });
          </script>
        <?php
        }else{ // Jika semua data sudah diisi
          echo "<hr>";
          // Buat sebuah tombol untuk mengimport data ke database
          echo "<button type='submit' name='import' class='btn btn-primary'><span class='material-icon'></span> Import</button>";
        }
        echo "</form>";
      }else{ // Jika file yang diupload bukan File excel
        // Munculkan pesan validasi
        echo "<div class='alert alert-danger'>
        Hanya File excel (.xlsx) yang diperbolehkan
        </div>";
      }

}

?> 
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
}
?>