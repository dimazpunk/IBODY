<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $page = "Tabel Detail SS";
    $grp = $_SESSION ['group'];
    $jbt = $_SESSION ['jabatan'];
    $sec = $_SESSION ['section'];
    $fung = $_SESSION ['dept_fungsion'];
    $today = date ("Y-m-d");
    $bulan = date ("M Y");
    $tanggal_awal = date ('Y-m-01', strtotime($today));
    $tanggal_akhir = date ('Y-m-t', strtotime ($today));

    if(isset($_GET['id'])) //menghubungkan tombol submit  
    {
      $delete = mysqli_query($con, "UPDATE buat_ss SET `status` = 'b' WHERE id_buat = '$_GET[id]'")or die (mysqli_error($con));
  // memasukan data inputan ke databases
        if($delete){
        echo "<script>alert('delete data ss sukses!'); 
              document.location = 'detail_ss.php';
        </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju
        }
        else
        {
        echo "<script>alert('delete data ss gagal, silahkan coba lagi'); 
        //       </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju            
        }
  }    
?> 
<!--
=========================================================
Material Dashboard PRO - v2.2.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard-pro
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>
    BPMI - Dashboard
  </title>
  <?php include "../page/dochead.php";?>
</head>
<body class="">
  <div class="wrapper ">
    <?php include "../page/navbar.php";?>
      <!-- End Navbar -->
        <div class="content">
            <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 text-right">
                      <span class="box pull-right">
                      <a href = "detail_ss.php" class="btn btn-danger btn-sm">
                        <i class="material-icons">keyboard_arrow_left</i> Refresh
                      </a>
                      </span>
                      <span class="box pull-right">
                      <a href = "export.php" class="btn btn-info btn-sm">
                        <i class="material-icons">keyboard_arrow_right</i> Export
                      </a>
                      </span>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <div class="card ">
                    <div class="card-header card-header-success card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons"></i>
                      </div>
                      <h4 class="card-title">Filter Data</h4>
                    </div>
                    <div class="card-body ">
                      <div class="row">
                        <div class="col-md-6">
                                            <!-- form filter data berdasarkan range tanggal  -->
                          <form action="detail_ss.php" method="get">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label class="col-form-label">from</label>
                                </div>
                                <div class="col-auto">
                                    <input type="date" class="form-control" name="dari" required>
                                </div>
                                <div class="col-auto">
                                    <label class="col-form-label">until</label>
                                </div>                               
                                <div class="col-auto">
                                    <input type="date" class="form-control" name="ke" required>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-info btn-sm" type="submit" name="pencarian">Cari</button>
                                </div>
                            </div>
                          </form>
                        </div>
                        <div class ="col-md-4">
                          <form class=""> 
                            <div class="input-group no-border">
                              <input type="text" value="" name="cari" class="form-control" placeholder="Search...">
                              <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div> 
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Body Division</h4>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                            <thead>
                                <tr>
                                <th class="text-center">No</th>
                                <th>Npk</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Dept</th>
                                <th class="text-center">Periode</th>                                
                                <th>Progress</th>
                                <th>Nilai</th>      
                                <th>Nominal</th>                                                     
                                <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                              $batas = 25;
                              $halaman = (isset($_GET['halaman']))?(int)$_GET['halaman'] : 1;
                              $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                              $no = $halaman_awal+1;	               
                              $previous = $halaman - 1;
                              $next = $halaman + 1;                      
                              $data = mysqli_query($con,"SELECT  buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                        shift.id_shift, buat_ss.periode, buat_ss.a3_report AS a3
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
                              if ($role !== "super admin"){
                                if ($role == "foreman"){
                                  if ($jbt == "FRM"){
                                        $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                        shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress, buat_ss.a3_report AS a3
                                        FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                        LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                        LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                        LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                        LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai>0 AND `group`='$grp' AND buat_ss.status='a'  $filter limit $halaman_awal, $batas ") or die (mysqli_error($con)); 
                                        $nil = "scoring_frm.php";
                                  }
                                }elseif ($role == "superior"){
                                  if ($jbt =="SPV"){
                                        $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                        shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress, buat_ss.a3_report AS a3
                                        FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                        LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                        LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                        LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                        LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE (nilai >58 AND a3_report <> '')AND section = '$sec' $filter limit $halaman_awal, $batas  ") or die (mysqli_error($con)); 
                                        $nil = "scoring_spv.php";                              
                                  }elseif ($jbt == "MNG"){
                                        $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                        shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress, buat_ss.a3_report AS a3
                                        FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                        LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                        LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                        LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                        LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai >79 AND dept_fungsion = '$fung' $filter") or die (mysqli_error($con)); 
                                        $nil = "scoring_mng.php";                                                            
                                  }elseif ($jbt == "DIV"){
                                        $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                        shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress, buat_ss.a3_report AS a3
                                        FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                        LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                        LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                        LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                        LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai >= 91 $filter") or die (mysqli_error($con));  
                                        $nil = "scoring_div.php";                                                                 
                                  }
                                }
                              }else{
                                  $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                                                  shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress, buat_ss.a3_report AS a3
                                                                  FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                                                  LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                                                  LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                                                  LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                                                  LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai>0 $filter limit $halaman_awal, $batas ") or die (mysqli_error($con));   
                                                                  $nil = "scoring_frm.php";                                                   
                              }                        
                                while ($sc = mysqli_fetch_assoc ($score)){
                              ?>                                                                                    
                                <tr>
                                <td class="text-center"><?=$no++;?></td>
                                <td><?=$sc['npk']?></td>
                                <td><?=$sc['nama']?></td>
                                <td><?=$sc['id_kategori']?></td>
                                <td><?=$sc['judul']?></td>
                                <td><?=$sc['nama_dept']?></td>
                                <td class="text-center"><?=$sc['periode']?></td>  
                                <?php
                                $nilai = $sc['nilai'];
                                $a3    =$sc ['a3'];
                                if ($nilai >= 98 AND $nilai <=100){
                                  $nominal= 150000;
                                  $progress = 100;
                                  $color = "bg-info";
                                }elseif ($nilai >= 95 AND $nilai <=97){
                                  $nominal= 125000;
                                  $progress = 100;
                                  $color = "bg-info";
                                }elseif ($nilai >= 92 AND $nilai <=93){
                                  $nominal= 100000; 
                                  $progress = 100; 
                                  $color = "bg-info";
                                }elseif ($nilai == 91){
                                  $nominal= 100000; 
                                  $progress = 75;     
                                  $color = "bg-success";                                
                                }elseif ($nilai >= 89 AND $nilai <=90){
                                  $nominal= 80000;
                                  $progress = 100;
                                  $color = "bg-info";
                                }elseif ($nilai >= 86 AND $nilai <=88){
                                  $nominal= 60000;
                                  $progress = 100;
                                  $color = "bg-info";
                                }elseif ($nilai >= 80 AND $nilai <=85){
                                  $nominal= 40000;  
                                  $progress = 100; 
                                  $color = "bg-info";
                                }elseif ($nilai == 79){
                                  $nominal= 10000;  
                                  $progress = 50; 
                                  $color = "bg-warning";
                                }elseif ($nilai >= 74 AND $nilai <=78){
                                  $nominal= 25000;  
                                  $progress = 100; 
                                  $color = "bg-info";
                                }elseif ($nilai >= 69 AND $nilai <=73){
                                  $nominal= 20000; 
                                  $progress = 100;
                                  $color = "bg-info";
                                }elseif ($nilai >= 64 AND $nilai <=68){
                                  $nominal= 15000; 
                                  $progress = 100;
                                  $color = "bg-info";
                                }elseif ($nilai >= 59 AND $nilai <=63){
                                  $nominal= 10000;  
                                  $progress = 100;
                                  $color = "bg-info";
                                }elseif ($nilai == 58){
                                  if ($a3==""){
                                    $progress = 100; 
                                    $color = "bg-info";
                                  }else{
                                    $progress = 50;
                                    $color = "bg-warning";
                                  }
                                  $nominal= 8000;  
                                }elseif ($nilai >= 49 AND $nilai <=57){
                                  $nominal= 8000;  
                                  $progress = 100;
                                  $color = "bg-info";
                                }elseif ($nilai >= 37 AND $nilai <=48){
                                  $nominal= 6000;
                                  $progress = 100;
                                  $color = "bg-info";
                                }elseif ($nilai >= 25 AND $nilai <=36){
                                  $nominal= 4000;
                                  $progress = 100;
                                  $color = "bg-info";
                                }elseif ($nilai >= 13 AND $nilai <=24){
                                  $nominal= 3000;
                                  $progress = 100;
                                  $color = "bg-info";
                                }elseif ($nilai >= 1 AND $nilai <=12){
                                  $nominal= 2500;
                                  $progress = 100;
                                  $color = "bg-info";
                                }else{
                                  $nominal=0;
                                  $progress=0;
                                  $color = "bg-white";
                                }
                                  $rupiah="Rp ".number_format ($nominal,0,'',',');
                                  ?>                               
                                <td>
                                  <div class="progress" id= "progress" style = "height:15px; border-radius:50px">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated <?=$color?>" role="progressbar" style="width: <?=$progress?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>                       
                                </td> 
                                <td><?=$sc['nilai']?></td>                               
                                <th><?=$rupiah?></td>
                                <td class="td-actions text-center">
                                  <a href ="preview_ss.php?id=<?=$sc['id']?>&hal=detail" rel="tooltip" class="btn btn-info">
                                    <i class="material-icons">preview</i>
                                  </a>
                                    <!-- <button type="button" rel="tooltip" class="btn btn-success">
                                      <i class="material-icons">get_app</i>
                                    </button> -->
                                  <a href ="detail_ss.php?id=<?=$sc['id']?>" rel="tooltip" class="btn btn-danger">
                                    <i class="material-icons">delete_outline</i>
                                  </a>                                   
                                </td>
                                </tr>
                                <?php  
                                }                          
                                ?>                                 
                                <!-- <tr>
                                <td class="text-center">2</td>
                                <td>27837</td>
                                <td>Wahyudi</td>
                                <td>Safety</td>
                                <td>Rekap Data SS</td>
                                <td>Body 1</td>
                                <td>Committe QCCSS & ICARE</td>
                                <td>N</td>
                                <td class="text-center">80</td>
                                <td class="td-actions text-center">
                                    <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                                    <i class="material-icons">preview</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-success">
                                      <i class="material-icons">get_app</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger">
                                      <i class="material-icons">delete_outline</i>
                                    </button>                                                                            
                                </td>
                                </tr>
                                <tr>
                                <td class="text-center">3</td>
                                <td>35527</td>
                                <td>Mukhit Tobroni</td>
                                <td>Quality</td>
                                <td>Membuat Materi Sharing QCC</td>
                                <td>Body 2</td>
                                <td>Committe Hoshin</td>
                                <td>N</td>
                                <td class="text-center">90</td>
                                <td class="td-actions text-center">
                                    <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                                    <i class="material-icons">preview</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-success">
                                      <i class="material-icons">get_app</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger">
                                      <i class="material-icons">delete_outline</i>
                                    </button>                                          
                                </td>
                                </tr>
                                <tr>
                                <td class="text-center">4</td>
                                <td>19646</td>
                                <td>Darto</td>
                                <td>Productivity</td>
                                <td>Membuat Materi FMDS</td>
                                <td>Body 1</td>
                                <td>Committe Hoshin</td>
                                <td>N</td>
                                <td class="text-center">70</td>
                                <td class="td-actions text-center">
                                    <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                                        <i class="material-icons">preview</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-success">
                                      <i class="material-icons">get_app</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger">
                                      <i class="material-icons">delete_outline</i>
                                    </button>                                                                                                   
                                </td>
                                </tr>
                                <tr>
                                <td class="text-center">5</td>
                                <td>28967</td>
                                <td>Anugrah</td>
                                <td>Safety</td>
                                <td>Membuat Materi Asakai</td>
                                <td>Body 2</td>
                                <td>Committe Hoshin</td>
                                <td>N</td>
                                <td class="text-center">75</td>
                                <td class="td-actions text-center">
                                    <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                                    <i class="material-icons">preview</i>
                                    </button>
                                    <div style="width:1500px" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" style="width:1500px">
                                        <div class="modal-content">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                <td rowspan="3" class="text-center p-2">
                                                    <img src="../assets/img/logo_adm.png" style="width:100px ; padding:0px">
                                                </td>
                                                <td rowspan="3" class="text-center font-weight-bold" colspan="8"><h4>SUGGESTION SYSTEM (SS)</h5></td>
                                                <td class="text-left py-0" colspan="2">No Form</td>
                                                <td class="text-left py-0" colspan="2">:081/form-HR/ADM</td>
                                                <td rowspan="3" class="text-center px-4"><h4>2021</h4></td>
                                                </tr>
                                                <tr>
                                                <td class="text-left py-0" colspan="2">Tgl Efektif</td>
                                                <td class="text-left py-0" colspan="2">:1 Mei 2020</td>                                        
                                                </tr>
                                                <tr>
                                                <td class="text-left py-0" colspan="2">Revisi</td>
                                                <td class="text-left py-0" colspan="2">:5</td>                                        
                                                </tr>
                                                <tr>
                                                <td colspan="14" class="text-center p-0">(SS yang di nilai adalah SS yang sudah di implementasikan)</td>
                                                </tr>
                                                <tr>
                                                <td class="text-center text-nowrap py-1" colspan="2">No. Registrasi SS</td>
                                                <td class="text-center py-1" colspan="12">bodyss0321</td>                                         
                                                </tr>
                                                <tr>
                                                <td class="text-center py-1" colspan="2">Kriteria SS</td>
                                                <td colspan="2" class="text-center py-1 bg-info text-white">SAFETY</td>
                                                <td colspan="2" class="text-center py-1">QUALITY</td>
                                                <td colspan="2" class="text-center py-1">COST</td>
                                                <td colspan="2" class="text-center py-1">DELIVERY</td>
                                                <td colspan="2" class="text-center py-1">PRODUCTIVITY</td>
                                                <td colspan="2" class="text-center py-1">ENVIRONMENT</td>                                                                                   
                                                </tr>
                                                <tr>
                                                <td class="text-center py-1" colspan="2">Periode SS</td>
                                                <td class="text-center py-1">Januari</td>
                                                <td class="text-center py-1">Februari</td>
                                                <td class="text-center py-1 bg-info text-white">Maret</td>
                                                <td class="text-center py-1">April</td>
                                                <td class="text-center py-1">Mei</td>
                                                <td class="text-center py-1">Juni</td>
                                                <td class="text-center py-1">Juli</td>
                                                <td class="text-center py-1">Agustus</td>
                                                <td class="text-center py-1">September</td>
                                                <td class="text-center py-1">Oktober</td>
                                                <td class="text-center py-1">November</td>
                                                <td class="text-center py-1">Desember</td>                                                                                                                           
                                                </tr>
                                                <tr>
                                                <td colspan="14"></td>
                                                </tr>
                                                <tr>
                                                <td class="text-center text-nowrap py-1">Data Pembuat SS</td>
                                                </tr>
                                                <tr>
                                                <td class="text-center py-1">Nama</td>
                                                <td class="text-center py-1"colspan="6">PURNOMO</td>
                                                <td class="text-center py-1"colspan="2">Dept</td>
                                                <td class="text-center py-1"colspan="6">BODY 1</td>                                                                               
                                                </tr>
                                                <tr>
                                                <td class="text-center py-1">NPK</td>
                                                <td class="text-center py-1"colspan="3">37290</td>
                                                <td class="text-center py-1"colspan="2">Shift</td>
                                                <td class="text-center py-1">N</td>
                                                <td class="text-center py-1"colspan="2">Seksi</td>
                                                <td class="text-center py-1"colspan="6">Committe QCCSS & ICARE</td>                                                                                                                                                               
                                                </tr>
                                                <tr>
                                                <td colspan="14"></td>
                                                </tr>
                                                <tr>
                                                <td class="text-center text-nowrap py-1">Data Improvement</td>
                                                </tr>
                                                <tr>
                                                <td class="text-center py-1" colspan="2">Judul SS</td>
                                                <td class="text-center text-nowrap py-1"colspan="12">Program SS Online</td>                                                                             
                                                </tr>
                                                <tr>
                                                <td class="text-center py-1"colspan="4">Tanggal Pembuatan Improvement</td>
                                                <td class="text-center py-1"colspan="3">10 Maret 2021</td>
                                                <td class="text-center py-1"colspan="4">Tanggal Implementasi</td>
                                                <td class="text-center py-1"colspan="3">15 Maret 2021</td>                                                                                                                                                            
                                                </tr>
                                                <tr>
                                                <td colspan="14"></td>
                                                </tr>
                                                <tr>
                                                <td class="text-center p-0"colspan="8">Kondisi Saat Ini</td>
                                                <td class="text-center p-0"colspan="8">Proses Perbaikan</td>
                                                </tr>
                                                <tr>
                                                <td class="text-center p-0"colspan="8" style="height:200px">Gambar 1</td>
                                                <td class="text-center p-0"colspan="8">Gambar 2</td>
                                                </tr>
                                                <tr>
                                                <td colspan="14"></td>
                                                </tr>
                                                <tr>
                                                <td class="text-center p-0"colspan="8">Hasil Perbaikan</td>
                                                <td class="text-center p-0"colspan="8">Reward</td>
                                                </tr>
                                                <tr>
                                                <td class="text-center p-0"colspan="8">Gambar 1</td>
                                                <td class="text-center p-0"colspan="8" style="font-size:10px ;line-height:10px">
                                                    <table>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>Penilai</td>
                                                        <td>Range Nilai</td>
                                                        <td>Nominal (Rupiah)</td>
                                                        <td>Nilai & Nominal</td>
                                                        <td>Tanggal Check</td>   
                                                        <td>Nama & Tanda tangan</td>                                                                                                                                                                                           
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">1</td>
                                                        <td class="text-center py-1">BOD</td>
                                                        <td class="text-center py-1">>100</td> 
                                                        <td class="text-center py-1" colspan="4">SPESIAL REWARD</td>                                                                                                                                                                                                                                          
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">2</td>
                                                        <td class="text-center py-1" rowspan="3">Div.Head</td>
                                                        <td class="text-center text-nowrap py-1">98-100</td>
                                                        <td class="text-center py-1">150.000</td>
                                                        <td class="text-center py-1" rowspan="3"></td>
                                                        <td class="text-center py-1" rowspan="3"></td>
                                                        <td class="text-center py-1" rowspan="3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">3</td>
                                                        <td class="text-center text-nowrap py-1">95-97</td>
                                                        <td class="text-center py-1">125.000</td>                                                                                                                                                                                                                                          
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">4</td>
                                                        <td class="text-center text-nowrap py-1">92-93</td>
                                                        <td class="text-center py-1">100.000</td>                                                                                                                                                                                                                                          
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">5</td>
                                                        <td class="text-center py-1" rowspan="3">Dept.Head</td>
                                                        <td class="text-center text-nowrap py-1">89-91</td>
                                                        <td class="text-center py-1">80.000</td>
                                                        <td class="text-center py-1" rowspan="3"></td>
                                                        <td class="text-center py-1" rowspan="3"></td>
                                                        <td class="text-center py-1" rowspan="3"></td>                                                                                                                                                                                                                                                                                        
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">6</td>
                                                        <td class="text-center text-nowrap py-1">86-88</td>
                                                        <td class="text-center py-1">60.000</td>                                                                                                                                                                                                                                          
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">7</td>
                                                        <td class="text-center text-nowrap py-1">80-85</td>
                                                        <td class="text-center py-1">40.000</td>                                                                                                                                                                                                                                          
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">8</td>
                                                        <td class="text-center py-1" rowspan="4">Sect.Head</td>
                                                        <td class="text-center text-nowrap py-1">74-79</td>
                                                        <td class="text-center py-1">25.000</td>
                                                        <td class="text-center py-1" rowspan="4"></td>
                                                        <td class="text-center py-1" rowspan="4"></td>
                                                        <td class="text-center py-1" rowspan="4"></td>                                                                                                                                                                                                                                                                                        
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">9</td>
                                                        <td class="text-center text-nowrap py-1">69-73</td>
                                                        <td class="text-center py-1">20.000</td>                                                                                                                                                                                                                                          
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">10</td>
                                                        <td class="text-center text-nowrap py-1">64-68</td>
                                                        <td class="text-center py-1">15.000</td>                                                                                                                                                                                                                                          
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">11</td>
                                                        <td class="text-center text-nowrap py-1">59-63</td>
                                                        <td class="text-center py-1">10.000</td>                                                                                                                                                                                                                                          
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">12</td>
                                                        <td class="text-center py-1" rowspan="5">Foreman</td>
                                                        <td class="text-center text-nowrap py-1">49-58</td>
                                                        <td class="text-center py-1">8.000</td>
                                                        <td class="text-center py-1" rowspan="5"></td>
                                                        <td class="text-center py-1" rowspan="5"></td>
                                                        <td class="text-center py-1" rowspan="5"></td>                                                                                                                                                                                                                                                                                        
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">13</td>
                                                        <td class="text-center text-nowrap py-1">37-48</td>
                                                        <td class="text-center py-1">6.000</td>                                                                                                                                                                                                                                          
                                                    </tr>  
                                                    <tr>
                                                        <td class="text-center py-1">14</td>
                                                        <td class="text-center text-nowrap py-1">25-36</td>
                                                        <td class="text-center py-1">4.000</td>                                                                                                                                                                                                                                          
                                                    </tr> 
                                                    <tr>
                                                        <td class="text-center py-1">15</td>
                                                        <td class="text-center text-nowrap py-1">13-24</td>
                                                        <td class="text-center py-1">3.000</td>                                                                                                                                                                                                                                                                                         
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">16</td>
                                                        <td class="text-center text-nowrap py-1">1-23</td>
                                                        <td class="text-center py-1">2.500</td>                                                                                                                                                                                                                                                                                         
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left p-0"colspan="7" style="font-size:10px ;height:50px">
                                                        Komentar Pemberi Nilai
                                                        </td>
                                                    </tr>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                                                    </table>
                                                </td>
                                                </tr> 
                                                <tr>
                                                <td colspan="14"></td>
                                                </tr>
                                                <tr>
                                                <td class="text-center bg-info text-white py-1"colspan="14">Keterangan</td>
                                                </tr>
                                                <tr>
                                                <td class="text-left py-1"colspan="8" rowspan="2"style="font-size:9px;line-height:12px">
                                                    <ol class="p-2">
                                                    <li>Penilaian dapat ditentukan ke level jabatan selanjutnya jika tiap level jabatan memberikan nilai tertingginya
                                                    (Sec.Head =63 ;Dept.Head =88 ;Div.Head =100). Reward yang didapat adalah reward tertinggi yang dicapai.
                                                    </li>
                                                    <li>SS terbaik adalah SS yang mempunyai nilai tertinggi dan di nilai oleh Division Head (Minimal nilai =95)
                                                    SS terbaik dapat mengikuti konvensi SS di masing - masing area pada periode berjalan.
                                                    </li>
                                                    <li>Spesial Reward dapat diajukan oleh Division Head (Nilai =100) ke BOD melalui Komite QCC/SS.
                                                    Proses seleksi dilakukan sesuai dengan SK President Award
                                                    </li>
                                                    </ol>
                                                </td>
                                                <td class="text-left px-5"colspan="8"style="font-size:8px;line-height:10px">
                                                Penentuan Range Penilaian SS
                                                    <table class="px:5">
                                                    <tr>
                                                        <td class="text-center py-1">KRITERIA</td>
                                                        <td class="text-center py-1">BS</td>
                                                        <td class="text-center py-1">B</td>
                                                        <td class="text-center py-1">R</td>
                                                        <td class="text-center py-1">K</td>                                               
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">IDE</td>
                                                        <td class="text-center py-1">12-15</td>
                                                        <td class="text-center py-1">8-11</td>
                                                        <td class="text-center py-1">4-7</td>
                                                        <td class="text-center py-1">1-3</td>                                               
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">USAHA</td>
                                                        <td class="text-center py-1">27-35</td>
                                                        <td class="text-center py-1">18-26</td>
                                                        <td class="text-center py-1">9-17</td>
                                                        <td class="text-center py-1">1-8</td>                                               
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">HASIL</td>
                                                        <td class="text-center py-1">31-40</td>
                                                        <td class="text-center py-1">21-30</td>
                                                        <td class="text-center py-1">11-20</td>
                                                        <td class="text-center py-1">1-10</td>                                               
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center py-1">PAPER WORK</td>
                                                        <td class="text-center py-1">8-10</td>
                                                        <td class="text-center py-1">5-7</td>
                                                        <td class="text-center py-1">3-4</td>
                                                        <td class="text-center py-1">1-2</td>                                               
                                                    </tr>     
                                                    <tr>
                                                        <td class="text-left py-1" colspan="5">BS:Baik Sekali B:Baik R:Rata-Rata K:Kurang</td>
                                                    </tr>                                                                                                                                                                                                                              
                                                    </table>                                          
                                                </td>
                                                </tr>
                                                <tr>
                                                <td colspan="7" class="text-left py-1" style="font-size:8px;line-height:8px">Detail lebih lanjut dapat melihat kriteria SS PT Astra Daihatsu Motor</td>                                                
                                                </tr>                                                                                                                                                               
                                            </tbody>
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <button type="button" rel="tooltip" class="btn btn-success">
                                      <i class="material-icons">get_app</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger">
                                      <i class="material-icons">delete_outline</i>
                                    </button>                                      
                                </td>
                                </tr>
                                <tr>
                                <td class="text-center">6</td>
                                <td>37290</td>
                                <td>Muhammad Harsanto</td>
                                <td>Quality</td>
                                <td>Membuat System SS Online</td>
                                <td>Body 1</td>
                                <td>Committe QCCSS & ICARE</td>
                                <td>N</td>
                                <td class="text-center">70</td>
                                <td class="td-actions text-center">
                                    <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                                    <i class="material-icons">preview</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-success">
                                      <i class="material-icons">get_app</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger">
                                      <i class="material-icons">delete_outline</i>
                                    </button>                                                                             
                                </td>
                                </tr>
                                <tr>
                                <td class="text-center">7</td>
                                <td>37290</td>
                                <td>Mamo</td>
                                <td>Quality</td>
                                <td>Membuat System SS Online</td>
                                <td>Body 1</td>
                                <td>Committe QCCSS & ICARE</td>
                                <td>N</td>
                                <td class="text-center">65</td>
                                <td class="td-actions text-center">
                                    <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                                    <i class="material-icons">preview</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-success">
                                      <i class="material-icons">get_app</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger">
                                      <i class="material-icons">delete_outline</i>
                                    </button>                                                                             
                                </td>
                                </tr>
                                <tr>
                                <td class="text-center">8</td>
                                <td>37290</td>
                                <td>Mamo</td>
                                <td>Quality</td>
                                <td>Membuat System SS Online</td>
                                <td>Body 1</td>
                                <td>Committe QCCSS & ICARE</td>
                                <td>N</td>
                                <td class="text-center">64</td>
                                <td class="td-actions text-center">
                                    <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                                    <i class="material-icons">preview</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-success">
                                      <i class="material-icons">get_app</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger">
                                      <i class="material-icons">delete_outline</i>
                                    </button>                                                                             
                                </td>
                                </tr>
                                <tr>
                                <td class="text-center">9</td>
                                <td>37290</td>
                                <td>Mamo</td>
                                <td>Quality</td>
                                <td>Membuat System SS Online</td>
                                <td>Body 1</td>
                                <td>Committe QCCSS & ICARE</td>
                                <td>N</td>
                                <td class="text-center">50</td>
                                <td class="td-actions text-center">
                                    <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                                    <i class="material-icons">preview</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-success">
                                      <i class="material-icons">get_app</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger">
                                      <i class="material-icons">delete_outline</i>
                                    </button>                                                                             
                                </td>
                                </tr>
                                <tr>
                                <td class="text-center">10</td>
                                <td>37290</td>
                                <td>Mamo</td>
                                <td>Quality</td>
                                <td>Membuat System SS Online</td>
                                <td>Body 1</td>
                                <td>Committe QCCSS & ICARE</td>
                                <td>N</td>
                                <td class="text-center">48</td>
                                <td class="td-actions text-center">
                                    <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                                    <i class="material-icons">preview</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-success">
                                      <i class="material-icons">get_app</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger">
                                      <i class="material-icons">delete_outline</i>
                                    </button>                                                                             
                                </td>
                                </tr>                                                  -->
                        </tbody>
                        </table> 
                        <!-- menampilkan paginations -->
                          <nav>
                            <ul class="pagination justify-content-center">
                              <li class="page-item">
                                <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                              </li>
                              <?php 
                              for($x=1;$x<=$total_halaman;$x++){
                                ?> 
                                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                <?php
                              }
                              ?>				
                              <li class="page-item">
                                <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                              </li>
                            </ul>
                          </nav>                        
                        </div>
                    </div>
                    </div>
                </div>
                </div>                            
                <!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
    7 days
    </button> -->
            </div>
            </div>
        </div>
<?php include "../page/footer.php";?>
<!-- <script>
    $(document).ready(function() {
      $('#table1').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "INPUT",
          searchPlaceholder: "Search records",
        }
      });

      var table = $('#table1').DataTable();

      // Edit record

      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');

        if ($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record

      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');

        if ($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
        }

        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record

      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script> -->
</body>

</html>
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
  }
?>