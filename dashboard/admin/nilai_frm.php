<?php
    require_once "../../config/config.php";
    if (isset($_SESSION['npk'])){
    if(isset($_GET['bsimpan'])) //menghubungkan tombol submit   
    {
        $nilai = $_GET['nilai1'];
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
            $nominal25000;   
            }elseif ($nilai >= 69){
            $nominal= 20000; 
            }elseif ($nilai >= 64){
            $nominal=15000; 
            }elseif ($nilai >= 59){
            $nominal= 10000;  
            }elseif ($nilai >= 49){
            $nominal=8000;  
            }elseif ($nilai >= 37){
            $nominal= 6000;
            }elseif ($nilai >= 25){
            $nominal= 4000;
            }elseif ($nilai >= 13){
            $nominal=3000;
            }elseif ($nilai >= 1){
            $nominal= 2500;
            }else{
            echo "nilai tidak valid";
            }
            $rupiah="Rp ".number_format ($nominal,0,'',',');
            $angka = $nominal;
            $simpan = mysqli_query($con, "UPDATE buat_ss SET nilai = '$_GET[nilai1]' , Nominal= $angka WHERE id_buat = '$_GET[id]'")or die (mysqli_error($con));
    // memasukan data inputan ke databases
            $_SESSION['info'] ='SS Sukses dinilai';
            echo  "<script>document.location = 'scoring_frm.php';</script>";  // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju
            }else
            {
            echo "<script>alert('simpan data gagal!'); 
                </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju            
            }
    }
?>