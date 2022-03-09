<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $date = date('Y-m-d');
    $start_date = date ('m-01-Y');
    $end_date = date ('m-t-Y');
    $today = date('Ymd'); // membuat kode id secara otomatis
    $char = 'FT'.$today;
    
  if(isset($_POST['bsimpan'])) //menghubungkan tombol submit
  {
    $sql = mysqli_query ($con, "SELECT max(id_berita) AS id_berita FROM berita WHERE id_berita LIKE '{$char}%' ORDER BY id_berita DESC LIMIT 1")  or die (mysqli_error($con)); 
    $data = mysqli_fetch_assoc ($sql);
    $kode = $data['id_berita'];
    $urut = substr($kode,-3,3);
    $urut = (int) $urut;
    $urut++;
    $kode_auto = $char. sprintf("%03s", $urut);
    // upload gambar 1
    $folder = '../../assets/img/media/';
    $nama_p = $_FILES ['foto'] ['name'];
    $x = explode ('.', $nama_p);
    $exstensi = strtolower (end($x));
    $ukuran = $_FILES ['foto'] ['size'];
    $file_temp = $_FILES ['foto'] ['tmp_name'];
    $foto_berita = "M".$kode_auto.".".$exstensi;
    $file_upload = array ('png', 'jpg', 'jpeg');
    // echo $nama_p;
    if ((in_array($exstensi, $file_upload)===true)){
        if ($ukuran < 5000000){
          move_uploaded_file ($file_temp, $folder.$foto_berita);
          mysqli_query($con, "INSERT INTO berita (id_berita, terbit, judul, isi_berita, foto)
              VALUES ('$kode_auto',
                      '$_POST[terbit]',
                      '$_POST[judul]',
                      '$_POST[isi]',
                      '$foto_berita')")or die (mysqli_error($con));
          $_SESSION['info'] = 'Disimpan'; //session yang harus dibuat yang nanti ditangkap
          echo "<script>document.location.href='../../ibody/index.php'</script>";
        }else{
          echo "<script>alert ('File Upload terlalu besar, Max 5 MB') </script>";
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