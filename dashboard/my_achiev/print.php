<?php
require_once "../../config/config.php";
if (isset($_SESSION['npk'])){
    $grp = $_SESSION ['group'];
    $npk = $_SESSION ['npk']; 
    $jbt = $_SESSION ['jabatan'];
    $sec = $_SESSION ['section'];
    $fung = $_SESSION ['dept_fungsion'];
    $role = $_SESSION ['level'];
    $jbt = $_SESSION ['jabatan'];
    $today = date ("Y-m-d");
    $bulan = date ("M Y");
    $tanggal_awal = date ('Y-m-01', strtotime($today));
    $tanggal_akhir = date ('Y-m-t', strtotime ($today));
    
    if (isset ($_GET['pencarian'])){
        $awal = $_GET ['dari'];
        $akhir = $_GET ['ke'];
        $tahun = $_GET ['tahunform'];

        $blnpertama = date ('d-'.$awal. '-'.$tahun);
        $hari = date ('d-'.$akhir. '-'.$tahun);
    }else{
        $blnpertama = date ('d-1-y');
        $hari = date ('d-m-Y');
        $tahun = date ('Y');
    }
        $blnawal = date ('m', strtotime ($blnpertama));
        $blnakhir = date ('m', strtotime($hari));

        $tanggal_mulai = date ('Y-m-d', strtotime($hari.'-'.$blnawal.'-01'));
        $tanggal_akhir = date ('Y-m-t', strtotime($hari.'-'.$blnakhir.'-01'));

        $count_awal = date_create ($tanggal_mulai);
        $count_akhir = date_create ($tanggal_akhir);
        $todays = date_diff ($count_awal,$count_akhir) ->days +1;
        $selisih_bulan = ($blnakhir - $blnawal)+1;

        $bln = $selisih_bulan;
        
    
    $jumlah1 = "SELECT nilai, periode
    FROM buat_ss WHERE nilai > 0  AND periode ";
?>
<style>
table {
    border-collapse: collapse;
    table-layout: fixed;
    width: 483px;
}
table td {
    width: 155%;
}
</style>
<html>
<head>
  <title>Resume Data Suggestion System [SS]</title>
  </head>

<body>
    <table border="1" cellpading="1">
    <tr>
        <td style ="width:100%; align=center;">
            <h3 style="text-align: center;">
            REPORT DATA SUGGESTION SYSTEM (SS)
            </h3>
        </td>
    </tr>
    </table>
</body>
    <table border="1" cellpading="1">
    <thead>
        <tr>
        <th class="text-center">No</th>
        <th>Npk</th>
        <th>Nama</th>
            <?php
            for ($i = 1; $i <= $bln ; $i++){
            $namabln = date ('M-Y', strtotime($tahun.'-'.$i.'-1'));
            ?>
        <th><?=$namabln?></th> 
        <?php
            }
            ?>                                              
        </tr>
    </thead>
    <tbody>
    <?php
            $batas = 3000;
            $halaman = (isset($_GET['halaman']))?(int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
            $no = $halaman_awal+1;	               
            $previous = $halaman - 1;
            $next = $halaman + 1;                      
            $data = mysqli_query($con,"SELECT  buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                        shift.id_shift, buat_ss.periode 
                        FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                        LEFT JOIN dept ON karyawan.dept = dept.id_dept
                        LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                        LEFT JOIN shift ON karyawan.shift = shift.id_shift
                        LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori")or die (mysqli_error($con));
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);
            //menampilkan filter data//
            if (isset($_GET['pencarian'])){
            $filter= " AND periode BETWEEN '$_GET[dari]' AND '$_GET[ke]'";
            }else{
            $filter = "";
            }
            //menampilkan search data//
            if (isset($_GET['cari'])){
            $src = "AND kategori.id_kategori LIKE '%".$cari."%'";
            }else{
            $src = "";
            } 
            if ($role !== "super admin"){
                if ($role == "foreman"){
                    if ($jbt == "FRM"){    
                        $control = mysqli_query ($con,"SELECT karyawan.npk AS npk, karyawan.nama, dept.nama_dept AS dp, dept.nama_dept, shift.id_shift, group_tb.nama_group AS grp 
                        FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group 
                        LEFT JOIN dept ON karyawan.dept = dept.id_dept                             
                        LEFT JOIN shift ON karyawan.shift = shift.id_shift WHERE `group`='$grp' ORDER BY karyawan.npk ASC limit $halaman_awal, $batas")or die (mysqli_error($con)); 
                        $us = "control.php";  
                    }
                }elseif ($role == "superior"){
                    if ($jbt =="SPV"){
                    $control = mysqli_query ($con,"SELECT karyawan.npk AS npk, karyawan.nama, dept.nama_dept AS dp, dept.nama_dept, shift.id_shift, group_tb.nama_group AS grp 
                    FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group 
                    LEFT JOIN dept ON karyawan.dept = dept.id_dept                             
                    LEFT JOIN shift ON karyawan.shift = shift.id_shift WHERE section='$sec' ORDER BY karyawan.npk ASC limit $halaman_awal, $batas")or die (mysqli_error($con)); 
                    $us = "control.php"; 
                    }
                }else{
                    $control = mysqli_query ($con,"SELECT karyawan.npk AS npk, karyawan.nama, dept.nama_dept AS dp, dept.nama_dept, shift.id_shift, group_tb.nama_group AS grp 
                    FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group 
                    LEFT JOIN dept ON karyawan.dept = dept.id_dept                             
                    LEFT JOIN shift ON karyawan.shift = shift.id_shift WHERE npk='$npk' ORDER BY karyawan.npk ASC limit $halaman_awal, $batas")or die (mysqli_error($con)); 
                    $us = "control.php"; 
                    }
                }else{
                    $control = mysqli_query ($con,"SELECT karyawan.npk AS npk, karyawan.nama, dept.nama_dept AS dp, dept.nama_dept, shift.id_shift, group_tb.nama_group AS grp 
                    FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group 
                    LEFT JOIN dept ON karyawan.dept = dept.id_dept                             
                    LEFT JOIN shift ON karyawan.shift = shift.id_shift ORDER BY karyawan.npk ASC limit $halaman_awal, $batas")or die (mysqli_error($con)); 
                    $us = "control.php";      
            }   

            while ($ct = mysqli_fetch_assoc ($control)){

            ?>                       
        <tr>
        <td class="text-center"><?=$no++;?></td>
        <td class="text-center"><?=$ct['npk']?></td>
        <td class="text-left"><?=$ct['nama']?></td>
            <?php
            for ($i = 1; $i <= $bln ; $i++){
            $date_awal = date ('Y-m-01', strtotime($tahun.'-'.$i.'-1'));
            $date_akhir = date ('Y-m-t', strtotime($tahun.'-'.$i.'-1'));
            $qry = mysqli_num_rows(mysqli_query($con, $jumlah1." AND buat_ss.npk = '$ct[npk]' AND periode between '$date_awal' AND '$date_akhir'"));
            ?>                         
        <td class="text-center"><?=$qry?></td> 
        <?php
            }
            ?>                                                                                                       
        </td>
        </tr>
        <?php  
        }                          
        ?>                           
    </tbody>
    </table>
</html> 
<?php
$html = ob_get_contents();
        ob_end_clean();
        require_once('../../assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf -> writeHTML($html);
        $pdf -> output('Data_Monitoring_SS.pdf','D');
?>
<?php
}else {
echo "<script> window.location ='../../login.php';</script>"; 
}
?>