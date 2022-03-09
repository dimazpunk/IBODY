<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $page = "Tabel Penilaian SS";
    $grp = $_SESSION ['group'];
    $jbt = $_SESSION ['jabatan'];
    $sec = $_SESSION ['section'];
    $fung = $_SESSION ['dept_fungsion'];
    $today = date ("Y-m-d");
    $_SESSION ['startM'] = (isset($_POST [ 'start']))? $_POST ['start'] : date ('m');
    $_SESSION ['EndM'] = (isset($_POST [ 'start']))? $_POST ['start'] : date ('m');
    $tanggal_awal = date ('Y-m-01', strtotime($today));
    $tanggal_akhir = date ('Y-m-05', strtotime ('next month 23:59'));
    if(isset($_GET['filter']))
    $tgl = $_POST['periode'];
    // if(isset($_GET['periode'])){
    //   $tgl = $_GET['periode'];
    //   $score = mysqli_query($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
    //                             shift.id_shift, buat_ss.periode 
    //                             FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
    //                             LEFT JOIN dept ON karyawan.dept = dept.id_dept
    //                             LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
    //                             LEFT JOIN shift ON karyawan.shift = shift.id_shift
    //                             LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE  periode='$tgl'");
    // }else{
      
    // } 
    // while ($sc = mysqli_fetch_assoc ($score));
    
    // if($_SESSION ['level'] = 'Super Admin'){  //untun mengatur login base on level admin supaya data masuk sesuai dengan usernamenya
    //   $n = 0;
    // }else if
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">List Data Suggestion System (SS)</h4>
                </div>

                  <!-- <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                          <label class ="col-sm">PILIH TANGGAL</label>
                            <input type="date" name="periode">
                            <input type="submit" value="FILTER">
                      </div>
                      <div class="col-md-4">  
                      <div class="dropdown">                    
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter Periode
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="javascript:;">Safety</a>
                          <a class="dropdown-item" href="javascript:;">Quality</a>
                          <a class="dropdown-item" href="javascript:;">Cost</a>
                          <a class="dropdown-item" href="javascript:;">Delivery</a>
                          <a class="dropdown-item" href="javascript:;">Environment</a>
                          <a class="dropdown-item" href="javascript:;">Productivity</a>
                        </div>
                      </div>
                      <div>
                    </div>
                  </div>                -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>                       
                        <tr>
                          <th class="text-center">No</th>
                          <th>Npk</th>
                          <th>Nama</th>
                          <th>Kategori</th>
                          <th>Judul</th>
                          <th>Dept</th>
                          <th>Group</th>
                          <th>Shift</th>                                                 
                          <th class="text-center">Periode</th>
                          <th class="text-center">A3 Report</th>                          
                          <th class="text-center">Actions</th>
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
                      if ($role !== "super admin"){
                        if ($role == "foreman"){
                          if ($jbt == "FRM"){
                                $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id, karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                shift.id_shift, buat_ss.periode, buat_ss.a3_report AS a3
                                FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai=0 AND `group`='$grp' limit $halaman_awal, $batas") or die (mysqli_error($con)); 
                                $nil = "scoring_frm.php";
                          }
                        }elseif ($role == "superior"){
                          if ($jbt =="SPV"){
                                $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id, karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                shift.id_shift, buat_ss.periode, buat_ss.a3_report AS a3
                                FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE (nilai = 58 AND a3_report <> '') AND section = '$sec'") or die (mysqli_error($con)); 
                                $nil = "scoring_spv.php";                              
                          }elseif ($jbt == "MNG"){
                                $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id, karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                shift.id_shift, buat_ss.periode, buat_ss.a3_report AS a3
                                FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE (nilai =79 AND a3_report <> '') AND dept_fungsion = '$fung'") or die (mysqli_error($con)); 
                                $nil = "scoring_mng.php";                                                            
                          }elseif ($jbt == "DIV"){
                                $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id, karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                shift.id_shift, buat_ss.periode, buat_ss.a3_report AS a3
                                FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai = 91 AND a3_report <> ''") or die (mysqli_error($con));  
                                $nil = "scoring_div.php";                                                                 
                          }
                        }
                      }else{
                          $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                                          shift.id_shift, buat_ss.periode, buat_ss.a3_report AS a3 
                                                          FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                                          LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                                          LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                                          LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                                          LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai=0 limit $halaman_awal, $batas") or die (mysqli_error($con));   
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
                          <td><?=$sc['nama_group']?></td>  
                          <td><?=$sc['id_shift']?></td>                                               
                          <td class="text-center"><?=$sc['periode']?></td>
                          <th class="text-center"><?=$sc['a3']?></th> 
                          <td class="td-actions text-right">
                              <a href ="preview_ss.php?id=<?=$sc['id']?>&hal=frm" data-toggle="tooltip" title="Preview" class="btn btn-info">
                                <i class="material-icons">preview</i>  
                              </a>   
                              <a href ="../../assets/img/product/<?=$sc['a3']?>" target ="blank" data-toggle="tooltip" title="A3 Report" class="btn btn-success">
                              <i class="material-icons">note_add</i>
                            </a>                    
                              <a href="<?=$nil?>?id=<?=$sc['id']?>" data-toggle="tooltip" title="Nilai SS" class="btn btn-warning">  
                                <i class="material-icons">edit</i> 
                              </a>                  
                          </td>
                        </tr>
                      <?php  
                      }                          
                      ?>                                        
                      </tbody>
                    </table>  
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
            <!-- <div class="row">
              <h4 class="col-sm"> Data MP Belum Buat SS </h>
            </div>   -->
            <!-- <div class="row">
              <div class="col-sm-11">
                <span class="box">                    
                  <a href="" class="btn btn-danger">Data Mp Belum Buat SS</a>
                </span>
              </div>
            </div>          
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>                       
                          <tr>
                            <th class="text-center">No</th>
                            <th>Npk</th>
                            <th>Nama</th>
                            <th>Dept</th>
                            <th>Group</th>
                            <th>Shift</th>   
                            <th>Periode</th>
                            <th>Tahun</th>                                                    
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $no = 1;
                          if ($role !== "super admin"){
                            if ($role == "foreman"){
                              if ($jbt == "FRM"){
                                $belum = mysqli_query ($con,"SELECT karyawan.npk AS npk_kar, buat_ss.npk AS npk, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                    shift.id_shift, buat_ss.periode 
                                    FROM karyawan LEFT JOIN buat_ss ON karyawan.npk = buat_ss.npk
                                    LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                    LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                    LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                    LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE  buat_ss.npk is NULL AND `group`='$grp'GROUP by npk") or die (mysqli_error($con)); 
                                    $nil = "scoring_frm.php";
                              }
                            }elseif ($role == "superior"){
                              if ($jbt =="SPV"){
                                $belum = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                    shift.id_shift, buat_ss.periode 
                                    FROM karyawan LEFT JOIN buat_ss ON karyawan.npk = buat_ss.npk
                                    LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                    LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                    LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                    LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE section = '$sec' GROUP by npk") or die (mysqli_error($con)); 
                                    $nil = "scoring_spv.php";                              
                              }elseif ($jbt == "MNG"){
                                $belum = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                    shift.id_shift, buat_ss.periode 
                                    FROM karyawan LEFT JOIN buat_ss ON karyawan.npk = buat_ss.npk
                                    LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                    LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                    LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                    LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE dept_fungsion = '$fung'") or die (mysqli_error($con)); 
                                    $nil = "scoring_mng.php";                                                            
                              }elseif ($jbt == "DIV"){
                                $belum = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                    shift.id_shift, buat_ss.periode 
                                    FROM karyawan LEFT JOIN buat_ss ON karyawan.npk = buat_ss.npk
                                    LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                    LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                    LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                    LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai = 91 ") or die (mysqli_error($con));  
                                    $nil = "scoring_div.php";                                                                 
                              }
                            }
                          }else{
                            $belum = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id, karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                                              shift.id_shift, buat_ss.periode 
                                                              FROM karyawan LEFT JOIN buat_ss ON buat_ss.npk = karyawan.npk
                                                              LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                                              LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                                              LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                                              LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE buat_ss.npk is NULL") or die (mysqli_error($con));   
                                                              $nil = "scoring_frm.php";                                               
                          }                        
                            while ($bl = mysqli_fetch_assoc ($belum)){
                          ?>  
                          <tr>
                            <td class="text-center"><?=$no++;?></td>                          
                            <td><?=$bl['npk_kar']?></td>
                            <td><?=$bl['nama']?></td>
                            <td><?=$bl['nama_dept']?></td>
                            <td><?=$bl['nama_group']?></td>
                            <td><?=$bl['id_shift']?></td> 
                            <td>Mei</td>  
                            <td>2021</td>                                                                                                        
                          </tr>
                          <?php  
                            }                          
                            ?>  
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>         -->
            <!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
7 days
</button> -->
          </div>
        </div>
      </div>
<script src ="assets/js/jquery.js"></script>
<script src ="assets/js/popper.js"></script>
<script src ="assets/js/bootstrap.js"></script>
<script>
  $function (){
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<?php include "../page/footer.php";?>
</body>

</html>
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
  }
?>