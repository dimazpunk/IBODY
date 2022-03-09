<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $role = $_SESSION ['level'];
    $page = "Dashboard";
  // menghitung jumlah sudah dinilai
      $today = date ("Y-m-d");
      $bulan = date ("M Y");
      $tanggal_awal = date ('Y-m-01', strtotime($today));
      $tanggal_akhir = date ('Y-m-t', strtotime ($today));

      $jumlah = mysqli_query ($con,"SELECT nilai, periode
                                    FROM buat_ss WHERE nilai >0  AND periode
                                    BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'")or die (mysqli_error($con)); 
      $jm2 = mysqli_num_rows ($jumlah);
   // menghitung jumlah submit ss
      $jumlah2 = mysqli_query ($con,"SELECT nilai, periode FROM buat_ss WHERE periode 
                                     BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'")or die (mysqli_error($con)); 
      $jm1 = mysqli_num_rows ($jumlah2);
  // menghitung total karyawan
      $jumlah3 = mysqli_query ($con,"SELECT karyawan.group AS grp FROM karyawan") or die (mysqli_error($con));
      $jm3 = mysqli_num_rows ($jumlah3);
  // Menghitung mp aktif membuat ss
      $jumlah4 = mysqli_query ($con, "SELECT npk, periode FROM buat_ss WHERE periode BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' GROUP BY npk") or die (mysqli_error($con));
      $jm4 = mysqli_num_rows ($jumlah4);
  // Menghitung persentasi
      $average = number_format ($jm2/$jm3*100,2);
  // Menghitung total nominal SS 
      $reward = mysqli_query ($con, "SELECT SUM(Nominal) AS total FROM buat_ss WHERE periode BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'") or die (mysqli_error($con));
      $rw = mysqli_fetch_assoc ($reward);  
?>
<?php
    $profil = mysqli_query ($con,"SELECT karyawan.npk, karyawan.nama, dept.nama_dept AS dp, group_tb.nama_group AS grp, shift.id_shift, jabatan.nama_jabatan AS jabatan
    FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
    LEFT JOIN dept ON karyawan.dept = dept.id_dept
    LEFT JOIN jabatan ON karyawan.jabatan = jabatan.id_jabatan
    LEFT JOIN shift ON karyawan.shift = shift.id_shift WHERE npk = $_SESSION[npk]")or die (mysqli_error($con)); 
    $pr = mysqli_fetch_assoc ($profil);
?>
<?php
  //Menampilkan foto 
  $media = mysqli_query ($con, "SELECT * FROM media ORDER BY nama_media DESC LIMIT 3 ") or die (mysqli_error($con));
  $md = mysqli_fetch_assoc ($media);
  //Menampilkan foto 1
  $media1 = mysqli_query ($con, "SELECT * FROM (SELECT * FROM media ORDER BY nama_media DESC LIMIT 3 ) AS fm ORDER BY nama_media  ASC LIMIT 1 ") or die (mysqli_error($con));
  $me = mysqli_fetch_assoc ($media1);
  //Menampilkan foto 2
  $media2 = mysqli_query ($con, "SELECT * FROM (SELECT * FROM media ORDER BY nama_media  DESC LIMIT 2 ) AS fm ORDER BY nama_media  ASC LIMIT 1 ") or die (mysqli_error($con));
  $ms = mysqli_fetch_assoc ($media2);
  //Menampilkan foto 3
  $media3 = mysqli_query ($con, "SELECT * FROM (SELECT * FROM media ORDER BY nama_media  DESC LIMIT 1 ) AS fm ORDER BY nama_media  ASC LIMIT 1 ") or die (mysqli_error($con));
  $mf = mysqli_fetch_assoc ($media3);
?>
<!--.
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
  <?php include "dochead.php";?>
</head>
<body class="">
  <div class="wrapper ">
    <?php include "navbar.php";?>
      <!-- End Navbar -->
      <div class="content">
        <div class="content">
          <div class="container-fluid">
          <?php  
            if ($role !== "superior"){?>  
          <div class="col-auto">
            <a href ="../page/validasi.php" class="btn btn-info btn-sm">Buat SS</a>  
          </div>
            <?php
            }?> 
            <span class="" style="width:300px">
              <div id="tgl" class="input-group no-border"></div>
            </span>
            <span class="px-0" style="width:140px">
              <div id="clock" class="input-group no-border"></div>
            </span>
            <?php
              $tanggal = mktime(date('m'), date("d"), date('Y'));
              // echo "<b> " . date("d-m-Y", $tanggal ) . "</b>";
              date_default_timezone_set("Asia/Jakarta");
              $jam = date ("H:i:s");
              // echo " |<b> " . $jam . " " ." </b> ";
              $a = date ("H");
              if (($a>=6) && ($a<=11)) {
                  echo " |<b>Selamat Pagi Sahabat $pr[nama] </b>";
              }else if(($a>=11) && ($a<=15)){
                  echo " |<b>Selamat  Siang Sahabat $pr[nama] </b> ";
              }elseif(($a>15) && ($a<=18)){
                  echo " |<b>Selamat Sore Sahabat $pr[nama] </b>";
              }else{
                  echo " |<b>Selamat Malam $pr[nama]</b>";
              }
          ?> 
            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active" data-interval="10000">
                  <img src="../../assets/img/media/<?php echo $me['nama_media'];?>" class="d-block w-100" alt="...">
                  
                </div>
                <div class="carousel-item" data-interval="2000">
                  <img src="../../assets/img/media/<?php echo $ms['nama_media'];?>" class="d-block w-100" alt="...">
                  <!-- <img src="../../assets/img/view2.jpg" class="d-block w-100" alt="..."> -->
                </div>
                <div class="carousel-item">
                  <img src="../../assets/img/media/<?php echo $mf['nama_media'];?>" class="d-block w-100" alt="...">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div> 
            <!-- bagian grafik-->
            <!-- <div class="row">
              <div class="col-md-6">
                <div class="card card-chart">
                  <div class="card-header card-header-success" data-header-animation="true">
                    <div class="ct-chart" id="achievementss"></div>
                  </div>
                  <div class="card-body">
                    <div class="card-actions">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Fix Header!
                      </button>
                      <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                        <i class="material-icons">refresh</i>
                      </button>
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                        <i class="material-icons">edit</i>
                      </button>
                    </div>
                    <h4 class="card-title">Achievement SS Per Month</h4>
                    <p class="card-category">
                      <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today.</p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">access_time</i> updated 1 minutes ago
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-chart">
                  <div class="card-header card-header-info" data-header-animation="true">
                    <div class="ct-chart" id="averagess"></div>
                  </div>
                  <div class="card-body">
                    <div class="card-actions">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Fix Header!
                      </button>
                      <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                        <i class="material-icons">refresh</i>
                      </button>
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                        <i class="material-icons">edit</i>
                      </button>
                    </div>
                    <h4 class="card-title">Achievement Average SS Per Month</h4>
                    <p class="card-category">Last Achievement Performance</p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">access_time</i> updated 1 minutes ago
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">weekend</i>
                    </div>
                    <p class="card-category">SS Submits</p>
                    <h2 class="card-title"><?=$jm1 ?></h2>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons text-danger">warning</i>
                      <a href="#pablo">Updated 1 minutes ago</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">bookmark</i>
                    </div>
                    <p class="card-category">SS Sudah Dinilai</p>
                    <h2 class="card-title"><?=$jm2 ?></h2>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">local_offer</i> Updated 1 minutes ago
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">SS This Month</p>
                    <h2 class="card-title"> <?=$average."%"?></h2>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> Updated 1 minutes ago
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">paid</i>
                    </div>
                    <p class="card-category">Total Rewards</p>
                    <h2 class="card-title"><?=$rw['total']?></h2>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> Updated 1 minutes ago
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats box-center">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">weekend</i>
                    </div>
                    <p class="card-category">Wahyudi</p>
                    <h2 class="card-title">99</h2>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons text-danger">warning</i>
                      <a href="#pablo">Updated 1 minutes ago</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">bookmark</i>
                    </div>
                    <p class="card-category">Mukhit Tobroni</p>
                    <h2 class="card-title">95</h2>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">local_offer</i> Updated 1 minutes ago
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">Purnomo</p>
                    <h2 class="card-title">93</h2>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> Updated 1 minutes ago
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">paid</i>
                    </div>
                    <p class="card-category">Darto</p>
                    <h2 class="card-title">90</h2>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> Updated 1 minutes ago
                    </div>
                  </div>
                </div>
              </div>
            </div>   --> 
            <?php
              $terbaik = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, buat_ss.judul, dept.nama_dept, group_tb.nama_group AS grp,
              shift.id_shift, buat_ss.periode, buat_ss.nilai
              FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
              LEFT JOIN dept ON karyawan.dept = dept.id_dept
              LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
              LEFT JOIN shift ON karyawan.shift = shift.id_shift
              LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori 
              WHERE nilai >=80 AND periode BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' 
              ORDER BY nilai DESC LIMIT 3") or die (mysqli_error($con)); 
                
            ?>
            <div class="row">
            <?php  
            while ($tbk = mysqli_fetch_assoc ($terbaik)){  
            ?>  
              <div class="col-md-4">
                <div class="card card-product">
                  <div class="card-header card-header-image" data-header-animation="true">
                    <a href="#pablo">
                    <img class="img" src="../../assets/img/faces/<?echo $tbk['npk'];?>.jpg"/>
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="card-actions text-center">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Fix Header!
                      </button>
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                        <i class="material-icons">art_track</i>
                      </button>
                      <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <h4 class="card-title">
                      <a href="#pablo"><?=$tbk ['npk'];?> <?=$tbk ['nama'];?> </a>                      
                    </h4>
                    <div class="card-description">Nilai SS :
                    <?=$tbk ['nilai'];?>         
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="price">
                      <h4><?=$bulan?></h4>
                    </div>
                    <div class="stats">
                      <p class="card-category"><i class="material-icons"></i> <?=$tbk ['nama_dept'];?></p>
                    </div>
                  </div>
                </div>
              </div>    
              <?php  
              }                          
              ?> 
            </div>          
            <!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
7 days
</button> -->
          </div>
        </div>
      </div>

<?php include "footer.php";?>
</body>

</html>
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
  }
?>