<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $date = date('Y-m-d');
    $start_date = date ('m-01-Y');
    $end_date = date ('m-t-Y');
    $today = date('Ymd'); // membuat kode id secara otomatis
    $char = 'BDY'.$today;
    
  if(isset($_POST['bsimpan'])) //menghubungkan tombol submit   ..
  {
    $sql = mysqli_query ($con, "SELECT max(id_buat) AS id_buat FROM buat_ss WHERE id_buat LIKE '{$char}%' ORDER BY id_buat DESC LIMIT 1")  or die (mysqli_error($con)); 
    $data = mysqli_fetch_assoc ($sql);
    $kode = $data['id_buat'];
    $urut = substr($kode,-3,3);
    $urut = (int) $urut;
    $urut++;
    $kode_auto = $char. sprintf("%03s", $urut);
    // upload gambar 1
    $folder = '../../assets/img/product/';
    $nama_p = $_FILES ['foto_before'] ['name'];
    $x = explode ('.', $nama_p);
    $exstensi = strtolower (end($x));
    $ukuran = $_FILES ['foto_before'] ['size'];
    $file_temp = $_FILES ['foto_before'] ['tmp_name'];
    $nama_before = "BF".$kode_auto.".".$exstensi;
    $file_upload = array ('png', 'jpg', 'jpeg');
    //upload gambar 2
    $folder2 = '../../assets/img/product/';
    $nama_p2 = $_FILES ['foto_after'] ['name'];
    $x2 = explode ('.', $nama_p2);
    $exstensi2 = strtolower (end($x2));
    $ukuran2 = $_FILES ['foto_after'] ['size'];
    $file_temp2 = $_FILES ['foto_after'] ['tmp_name'];
    $nama_after = "AF".$kode_auto.".".$exstensi;
    $file_upload2 = array ('png', 'jpg', 'jpeg');
    //upload file A3
    $folder3 = '../../assets/img/product/';
    $nama_p3 = $_FILES ['a3_report'] ['name'];
    $x3 = explode ('.', $nama_p3);
    $exstensi3 = strtolower (end($x3));
    $ukuran3 = $_FILES ['a3_report'] ['size'];
    $file_temp3 = $_FILES ['a3_report'] ['tmp_name'];
    $file_upload3 = array ('pdf');
    // echo $nama_p;
    if ((in_array($exstensi, $file_upload)===true) AND (in_array($exstensi2, $file_upload2)===true)){
        if (($ukuran < 3132210) AND ($ukuran2 < 3132210)){
          move_uploaded_file ($file_temp, $folder.$nama_before);
          move_uploaded_file ($file_temp2, $folder2.$nama_after);
          mysqli_query($con, "INSERT INTO buat_ss (id_buat,npk, judul, tanggal_improvement, tanggal_implementasi, 
              id_kategori, periode, kondisi_saat_ini, foto_before, proses_perbaikan, foto_after, hasil_perbaikan, a3_report, `status`)
              VALUES ('$kode_auto','$_POST[tnpk]',
              '$_POST[tjudul]',
              '$_POST[dateimpr]',
              '$_POST[dateimpl]',
              '$_POST[tkategori]',
              '$date',
              '$_POST[saat_ini]',                                        
              '$nama_before',
              '$_POST[perbaikan]',                                        
              '$nama_after',
              '$_POST[hasil]',
              '$nama_p3',
              'a'                                                                              
              )")or die (mysqli_error($con));
                  if ((in_array($exstensi3, $file_upload3)===true) AND ($ukuran3 < 3132210)) {
                      move_uploaded_file ($file_temp3, $folder3.$nama_p3);
                    } 
          $_SESSION['info'] = 'Disimpan'; //session yang harus dibuat yang nanti ditangkap
          echo "<script>document.location.href='../my_achiev/my_aciev.php'</script>";
        }else{
          echo "<script>alert ('File Upload terlalu besar, Max 3 MB') </script>";
        }
    }else{

    }
}

?> 
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
}
?>