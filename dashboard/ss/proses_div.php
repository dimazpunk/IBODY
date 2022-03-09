<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){

    if(isset($_GET['bsimpan'])) //menghubungkan tombol submit   
    {
      $tgl_clamp= Date ('Y-m-d');
      $tgl_nol= Date ('Y-m-d', mktime('0000-00-00'));
      $nilai = $_GET['nilai1'];
      if ($nilai >= 98 AND $nilai <=100){
        $nominal= 150000;
        $tgl_clamp= Date ('Y-m-d');
      }elseif ($nilai >= 95 AND $nilai <=97){
        $nominal= 125000;
        $tgl_clamp= Date ('Y-m-d');
      }elseif ($nilai >= 92 AND $nilai <=93){
        $nominal= 100000; 
        $tgl_clamp= Date ('Y-m-d');
      }elseif ($nilai == 91){
        $nominal= 100000; 
        $tgl_clamp='0000-00-00';                               
      }elseif ($nilai >= 89 AND $nilai <=90){
        $nominal= 80000;
        $tgl_clamp= Date ('Y-m-d');
      }elseif ($nilai >= 86 AND $nilai <=88){
        $nominal= 60000;
        $tgl_clamp= Date ('Y-m-d'); 
      }elseif ($nilai >= 80 AND $nilai <=85){
        $nominal= 40000;  
        $tgl_clamp= Date ('Y-m-d');
      }elseif ($nilai == 79){
        $nominal= 10000;  
        $tgl_clamp='0000-00-00'; 
      }elseif ($nilai >= 74 AND $nilai <=78){
        $nominal= 25000;  
        $tgl_clamp= Date ('Y-m-d');
      }elseif ($nilai >= 69 AND $nilai <=73){
        $nominal= 20000; 
        $tgl_clamp= Date ('Y-m-d');
      }elseif ($nilai >= 64 AND $nilai <=68){
        $nominal= 15000; 
        $tgl_clamp= Date ('Y-m-d');
      }elseif ($nilai >= 59 AND $nilai <=63){
        $nominal= 10000;  
        $tgl_clamp= Date ('Y-m-d');
      }elseif ($nilai == 58){
        $nominal= 8000; 
        $tgl_clamp='0000-00-00';  
      }elseif ($nilai >= 49 AND $nilai <=57){
        $nominal= 8000;  
        $tgl_clamp= Date ('Y-m-d');
      }elseif ($nilai >= 37 AND $nilai <=48){
        $nominal= 6000;
        $tgl_clamp= Date ('Y-m-d');
      }elseif ($nilai >= 25 AND $nilai <=36){
        $nominal= 4000;
        $tgl_clamp= Date ('Y-m-d');
      }elseif ($nilai >= 13 AND $nilai <=24){
        $nominal= 3000;
        $tgl_clamp= Date ('Y-m-d');
      }elseif ($nilai >= 1 AND $nilai <=12){
        $nominal= 2500;
        $tgl_clamp= Date ('Y-m-d');
      }else{
        echo "nilai tidak valid";
      }
        $rupiah="Rp ".number_format ($nominal,0,'',',');
        $angka = $nominal;
         // disini nanti ada penempatan program aproval ss
      $simpan = mysqli_query($con, "UPDATE buat_ss SET nilai = '$_GET[nilai1]', Nominal= $angka , periode_clamp = '$tgl_clamp' WHERE id_buat = '$_GET[id]'")or die (mysqli_error($con));
  // memasukan data inputan ke databases
        if($simpan){
            $_SESSION['info'] = 'SS Sukses dinilai'; //session yang harus dibuat yang nanti ditangkap
            echo "<script>document.location.href='scoring.php'</script>";
        }
        else
        {
        echo "<script>alert('simpan data gagal!'); 
        //       </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju            
        }
  }
?> 
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
  }
?>