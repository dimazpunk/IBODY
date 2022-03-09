<?php
    require_once "../../config/config.php";
    $page = "Notifikasi";
    if (isset($_SESSION['npk'])){
        $grp = $_SESSION ['group'];
        $jbt = $_SESSION ['jabatan'];
        $sec = $_SESSION ['section'];
        $fung = $_SESSION ['dept_fungsion'];
          
            if ($jbt == "FRM"){
                    $pesan = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id, karyawan.nama, kategori.id_kategori, buat_ss.judul, buat_ss.id_buat,count(*) AS jumlah, dept.nama_dept, group_tb.nama_group,
                    shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress
                    FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                    LEFT JOIN dept ON karyawan.dept = dept.id_dept
                    LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                    LEFT JOIN shift ON karyawan.shift = shift.id_shift
                    LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai=0 AND `group`='$grp' GROUP BY karyawan.npk ORDER BY COUNT(id_buat)") or die (mysqli_error($con)); 
            }elseif ($jbt =="SPV"){
                    $pesan = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, buat_ss.id_buat, count(*) AS jumlah, dept.nama_dept, group_tb.nama_group,
                    shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress, buat_ss.a3_report AS a3
                    FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                    LEFT JOIN dept ON karyawan.dept = dept.id_dept
                    LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                    LEFT JOIN shift ON karyawan.shift = shift.id_shift
                    LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE (nilai = 58 AND a3_report <>'') AND section = '$sec' GROUP BY karyawan.npk ORDER BY COUNT(id_buat)") or die (mysqli_error($con));                              
            }elseif ($jbt == "MNG"){
                    $pesan = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, buat_ss.id_buat, count(*) AS jumlah, dept.nama_dept, group_tb.nama_group,
                    shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress
                    FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                    LEFT JOIN dept ON karyawan.dept = dept.id_dept
                    LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                    LEFT JOIN shift ON karyawan.shift = shift.id_shift
                    LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai =79 AND dept_fungsion = '$fung' GROUP BY karyawan.npk ORDER BY COUNT(id_buat)") or die (mysqli_error($con));                                                          
            }elseif ($jbt == "DIV"){
                    $pesan = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, buat_ss.id_buat,count(*) AS jumlah, dept.nama_dept, group_tb.nama_group,
                    shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress
                    FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                    LEFT JOIN dept ON karyawan.dept = dept.id_dept
                    LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                    LEFT JOIN shift ON karyawan.shift = shift.id_shift
                    LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai = 91 GROUP BY karyawan.npk ORDER BY COUNT(id_buat)") or die (mysqli_error($con));                                                               
                
            }      
    }
    $tipe =$_GET['m'];
    if($tipe==1){
        if (($jbt == "TM") OR ($jbt == "TL")){
                echo '';
        }else{
                $ps = mysqli_num_rows($pesan); 
                echo $ps;
        }
    }elseif($tipe==2){
        if (($jbt == "TM") OR ($jbt == "TL")){
                echo '';
        }else{
        while ($ps = mysqli_fetch_assoc ($pesan)){
        echo '
        <div class="dropdown-item">
        <div class="row">
          <div class="col-md-2 profile-img">
            <img src="../../assets/img/faces/'.$ps['npk'].'.jpg" width="30px" class="rounded"/>
          </div>
          <div class="col-md-10">
            <a href="../ss/scoring.php">
                <b>'.$ps["nama"].'</b>
                <br>
                <small>'.$ps["jumlah"].' Item SS</small>
                <hr>
            </a>
          </div>
        </div>
        </div>';
        }
        }
    }

    //menghitung jumlah pesan dari tabel pesan
    // $notif= mysqli_query($con, "SELECT Count(id_buat) AS pesan FROM buat_ss")or die (mysqli_error($con));

    // //menampilkan data
    // $hasil = mysqli_fetch_array($notif);


?>

  