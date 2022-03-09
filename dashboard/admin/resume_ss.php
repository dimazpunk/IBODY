<?php
  require_once "../../config/config.php";
  
  if (isset($_SESSION['npk'])){
    $today = date ("Y-m-d");
    $tgl1 = date ('Y-m-d', strtotime($today));
    $tgl2 = date ('Y-m-d', strtotime ($today));
    $page = "Aproval Suggestion System (SS)";
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
                    <a href = "resume_ss.php" class="btn btn-danger btn-sm">
                      <i class="material-icons">keyboard_arrow_left</i> Refresh
                    </a>
                    </span>
                    <span class="box pull-right">
                      <?php
                        if(isset($_GET['dari']) AND isset($_GET['ke'])){
                      ?>
                         <a href = "cetak.php?dari=<?echo $_GET['dari'];?>&ke=<?echo $_GET['ke'];?>" class="btn btn-info btn-sm">
                          <i class="material-icons">keyboard_arrow_right</i> Export
                        </a>
                      <?php
                        }else{
                      ?>
                          <a class="btn btn-info btn-sm">
                          <i class="material-icons">keyboard_arrow_right</i> Export
                        </a>
                      <?php
                        }            
                      ?>

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
                          <form action="resume_ss.php" method="get">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label class="col-form-label">from</label>
                                </div>
                                <div class="col-auto">
                                    <input type="date" class="form-control" id="dari" name="dari" required>
                                </div>
                                <div class="col-auto">
                                    <label class="col-form-label">until</label>
                                </div>                               
                                <div class="col-auto">
                                    <input type="date" class="form-control" id="ke" name="ke" required>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-info btn-sm" type="submit" name="pencarian">Lets Go</button>
                                </div>
                            </div>
                          </form>
                        </div>
                        <div class ="col-md-6">
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
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th>Npk</th>
                          <th>Nama</th>
                          <th>Kategori</th>
                          <th>Judul</th>
                          <th>Dept</th>
                          <th>Seksi</th>
                          <th>Shift</th>
                          <th>Periode</th>       
                          <th>Aproval</th>                  
                          <th class="text-center">Nilai</th>
                          <th>Nominal</th>                             
                          <th class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      //membuat paginations//
                        $batas = 10;
                        $halaman = (isset($_GET['halaman']))?(int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                        $no = $halaman_awal+1;	               
                        $previous = $halaman - 1;
                        $next = $halaman + 1;      
                        $tgl_clamp= Date ('Y-m-d');                
                        $data = mysqli_query($con,"SELECT  buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                  shift.id_shift, buat_ss.periode 
                                  FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                  LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                  LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                  LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                  LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori")or die (mysqli_error($con));
                        $jumlah_data = mysqli_num_rows($data);
                        $total_halaman = ceil($jumlah_data / $batas);   
                        // $dt1 = $_POST["tgl1"];
			                  // $dt2 = $_POST["tgl2"];
                        //menampilkan filter data//
                        if(isset($_GET['cari']) OR isset($_GET['pencarian'])){
                        if(isset($_GET['pencarian'])){ 
                                $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, 
                                kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress, buat_ss.periode_clamp AS bp
                                FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai >0 AND buat_ss.periode 
                                BETWEEN '$_GET[dari]' AND '$_GET[ke]' ORDER BY periode ASC")or die (mysqli_error($con));
                          }else{
                                $cari = $_GET['cari'];                
                                $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama,
                                kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress, buat_ss.periode_clamp AS bp
                                FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai >0  AND (buat_ss.npk LIKE '%".$cari."%' OR dept.nama_dept LIKE '%".$cari."%') limit $halaman_awal, $batas")or die (mysqli_error($con)); 
                          } 
                          //menampilkan searchs//   
                          }else{
                                $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress, buat_ss.periode_clamp AS bp
                                FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE buat_ss.periode_clamp <>'0000-00-00' ORDER BY periode_clamp DESC limit $halaman_awal, $batas")or die (mysqli_error($con));  
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
                          <th><?=$sc['periode']?></th>  
                          <th><?=$sc['bp']?></th>  
                          <td class="text-center"><?=$sc['nilai']?></td>
                          <?php
                                $nilai = $sc['nilai'];
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
                                    $nominal= 25000;   
                                  }elseif ($nilai >= 69){
                                    $nominal= 20000; 
                                  }elseif ($nilai >= 64){
                                    $nominal= 15000; 
                                  }elseif ($nilai >= 59){
                                    $nominal= 10000;  
                                  }elseif ($nilai >= 49){
                                    $nominal= 8000;  
                                  }elseif ($nilai >= 37){
                                    $nominal= 6000;
                                  }elseif ($nilai >= 25){
                                    $nominal= 4000;
                                  }elseif ($nilai >= 13){
                                    $nominal=3000;
                                  }elseif ($nilai >= 1){
                                    $nominal= 2500;
                                  }else{
                                    $nominal=0;
                                  }
                                  $rupiah="Rp ".number_format ($nominal,0,'',',');
                                  ?>
                          <th><?=$rupiah?></td>                          
                          <td class="td-actions text-right">
                                <a href ="../ss/preview_ss.php?id=<?=$sc['id']?>&hal=aproval" rel="tooltip" class="btn btn-info">
                                  <i class="material-icons">preview</i>
                                </a>
                            <!-- <a href="../ss/preview_ss.php?id=<?=$sc['id']?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">get_app</i>
                            </a> -->
                            <a href= "delete.php?id=<?=$sc['id']?>" type="button" class="btn btn-danger"  onclick= "return confirm ('apakah benar akan menghapus data ini')">
                              <i class="material-icons">delete_outline</i>
                            </a>
                        </tr>
                        <?php  
                        }                          
                        ?> 
                      </tbody>
                    </table>
                    <!-- menampilkan pagination -->
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
</body>

</html>
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
  }
?>