<?php
  require_once "../../config/config.php";
if(isset($_GET['bsimpan'])) //menghubungkan tombol submit   
    {
        
        $simpan = mysqli_query($con, "UPDATE username SET `level`= '$_GET[level]'   
                                      WHERE npk = '$_GET[tnpk]'")or die(mysqli_error($con));
  // memasukan data inputan ke databases
        $_SESSION['info'] = 'Disimpan';
        if($simpan){
            echo "<script>document.location = 'admin_mng.php';</script>";
// memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju
        }
        else
        {
        // echo "<script>alert('simpan data gagal!'); 
        //       </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju            
        }
  }
?>