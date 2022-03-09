<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $date = date('Y-m-d');
    $start_date = date ('m-01-Y');
    $end_date = date ('m-t-Y');
    $today = date('Ymd'); // membuat kode id secara otomatis
    $char = 'DA'.$today;
    
  if(isset($_POST['bsimpan'])) //menghubungkan tombol submit
  {
    $sql = mysqli_query ($con, "SELECT max(id_media) AS id_media FROM media WHERE id_media LIKE '{$char}%' ORDER BY id_media DESC LIMIT 1")  or die (mysqli_error($con)); 
    $data = mysqli_fetch_assoc ($sql);
    $kode = $data['id_media'];
    $urut = substr($kode,-3,3);
    $urut = (int) $urut;
    $urut++;
    $kode_auto = $char. sprintf("%03s", $urut);
    // upload gambar 1
    $folder = '../../assets/img/media/';
    $nama_p = $_FILES ['media'] ['name'];
    $x = explode ('.', $nama_p);
    $exstensi = strtolower (end($x));
    $ukuran = $_FILES ['media'] ['size'];
    $file_temp = $_FILES ['media'] ['tmp_name'];
    $nama_media = "M".$kode_auto.".".$exstensi;
    $file_upload = array ('png', 'jpg', 'jpeg');
    // echo $nama_p;
    if ((in_array($exstensi, $file_upload)===true)){
        if ($ukuran < 5000000){
          move_uploaded_file ($file_temp, $folder.$nama_media);
          mysqli_query($con, "INSERT INTO media (id_media, nama_media)
              VALUES ('$kode_auto','$nama_media')")or die (mysqli_error($con));
          $_SESSION['info'] = 'Disimpan'; //session yang harus dibuat yang nanti ditangkap
          echo "<script>document.location.href='../page/display.php'</script>";
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