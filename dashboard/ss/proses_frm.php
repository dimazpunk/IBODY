<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){

    if(isset($_GET['bsimpan'])) //menghubungkan tombol submit   
    {
      // if $ tglperiode ss ('Y-m-d') AND $tgl_batas <= $tgl_clamp
      // echo $tgl_clamp = date ('Y-m-t', strtotime($tgl_clamp));
      //  }else{
      //  echo $tgl_clamp= Date ('Y-m-d'); 
      //  }
      $tgl_clamp = date ('Y-m-d');
      $tgl_batas = date ("Y-m-10", strtotime ('+1 month', strtotime($tgl_clamp)));
      $bulan_approval = date ('m');
      $tahun_approval = date ('Y');
      $d_approval = date ('d'); //approval
        if ($d_approval <= 10){
          $bulan_sebelum= $bulan_approval -1;
          $tahun_sebelum= $tahun_approval -1;
          $tgl_approval = date ("Y-m-t", strtotime ('2021-'.$bulan_sebelum.'-01' ));
          
          if ($bulan_approval == 01){
            $tgl_approval = date ("Y-m-t", strtotime ($tahun_sebelum.'-12-'.$d_approval ));
          }else{
            $tgl_approval = date ("Y-m-t", strtotime ($tahun_approval.'-'.$bulan_sebelum.'-'.$d_approval ));
          }
        }else{
          $tgl_approval= date('Y-m-d');
          // echo $tgl_approval;
        }
      $a3=$_GET ['a3'];
      $nilai = $_GET['nilai1'];
      if ($nilai >= 98 AND $nilai <=100){
        $nominal= 150000;
        $tgl_clamp= $tgl_approval;
      }elseif ($nilai >= 95 AND $nilai <=97){
        $nominal= 125000;
        $tgl_clamp= $tgl_approval;
      }elseif ($nilai >= 92 AND $nilai <=93){
        $nominal= 100000; 
        $tgl_clamp= $tgl_approval;
      }elseif ($nilai == 91){
        $nominal= 100000; 
        $tgl_clamp='0000-00-00';                               
      }elseif ($nilai >= 89 AND $nilai <=90){
        $nominal= 80000;
        $tgl_clamp= $tgl_approval;
      }elseif ($nilai >= 86 AND $nilai <=88){
        $nominal= 60000;
        $tgl_clamp= $tgl_approval; 
      }elseif ($nilai >= 80 AND $nilai <=85){
        $nominal= 40000;  
        $tgl_clamp= $tgl_approval;
      }elseif ($nilai == 79){
        $nominal= 25000;  
        $tgl_clamp='0000-00-00'; 
      }elseif ($nilai >= 74 AND $nilai <=78){
        $nominal= 25000;  
        $tgl_clamp= $tgl_approval;
      }elseif ($nilai >= 69 AND $nilai <=73){
        $nominal= 20000; 
        $tgl_clamp= $tgl_approval;
      }elseif ($nilai >= 64 AND $nilai <=68){
        $nominal= 15000; 
        $tgl_clamp= $tgl_approval;
      }elseif ($nilai >= 59 AND $nilai <=63){
        $nominal= 10000;  
        $tgl_clamp= $tgl_approval;
      }elseif ($nilai == 58){
        if ($a3==""){
          $tgl_clamp = $tgl_approval;
        }else{
          $tgl_clamp='0000-00-00';  
        }
        $nominal= 8000;  
      }elseif ($nilai >= 49 AND $nilai <=57){
        $nominal= 8000;  
        $tgl_clamp= $tgl_approval;
      }elseif ($nilai >= 37 AND $nilai <=48){
        $nominal= 6000;
        $tgl_clamp= $tgl_approval;
      }elseif ($nilai >= 25 AND $nilai <=36){
        $nominal= 4000;
        $tgl_clamp= $tgl_approval;
      }elseif ($nilai >= 13 AND $nilai <=24){
        $nominal= 3000;
        $tgl_clamp= $tgl_approval;
      }elseif ($nilai >= 1 AND $nilai <=12){
        $nominal= 2500;
        $tgl_clamp= $tgl_approval;
      }else{
        echo "nilai tidak valid";
      }
        $rupiah="Rp ".number_format ($nominal,0,'',',');
        $angka = $nominal;
      // disini nanti ada penempatan program aproval ss
        $simpan = mysqli_query($con, "UPDATE buat_ss SET nilai = '$_GET[nilai1]' , Nominal= $angka , periode_clamp = '$tgl_clamp' WHERE id_buat = '$_GET[id]'")or die (mysqli_error($con));
  // memasukan data inputan ke databases

        if($simpan){
        $_SESSION['info'] = 'SS Sukses dinilai'; //session yang harus dibuat yang nanti ditangkap
        echo "<script>document.location.href='scoring.php'</script>";
        }
        else
        {
        echo "<script>alert('simpan data gagal!'); 
              </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju            
        }
  }
?>  
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
}
?>