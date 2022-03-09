<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $page = "Tabel Voice Of Customer";
    $grp = $_SESSION ['group'];
    $npk = $_SESSION ['npk'];  
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
      <!-- End Navbarr -->
      <div class="content">
        <div class="content">
          <div class="container-fluid">
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
                                <form action="my_aciev.php" method="get">
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
                                <form class="navbar-form">
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
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Body Division</h4>
                </div>
                <div class="row">
                  <div class="col-sm-11 text-right">
                    <span class="box pull-right">                    
                      <a href ="export1.php" class="btn btn-info btn-sm">Export Data </a>
                    </span>
                  </div>
                </div>                 
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>ID</th>
                                <th>Npk</th>
                                <th>Nama</th>
                                <th>Dept</th>
                                <th>Voice</th>                                                                                                    
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $batas = 10;
                                    $halaman = (isset($_GET['halaman']))?(int)$_GET['halaman'] : 1;
                                    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                                    $no = $halaman_awal+1;	               
                                    $previous = $halaman - 1;
                                    $next = $halaman + 1;                      
                                    $data = mysqli_query($con,"SELECT  voice_member.npk, karyawan.npk AS npk_kar, karyawan.nama, dept.nama_dept
                                            FROM voice_member LEFT JOIN karyawan ON voice_member.npk = karyawan.npk
                                            LEFT JOIN dept ON karyawan.dept = dept.id_dept ")or die (mysqli_error($con));
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
                                                      
                                    $voice = mysqli_query ($con,"SELECT voice_member.npk, karyawan.npk AS npk_kar, karyawan.nama, dept.nama_dept, voice_member.voice, voice_member.id_voice
                                    FROM voice_member LEFT JOIN karyawan ON voice_member.npk= karyawan.npk
                                    LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                    WHERE karyawan.npk  $filter $src limit $halaman_awal, $batas")or die (mysqli_error($con)); 
                                      
                                    while ($vc = mysqli_fetch_assoc ($voice)){
                                ?>                       
                            <tr>
                                <td class="text-center"><?=$no++;?></td>
                                <td><?=$vc['id_voice']?></td>
                                <td><?=$vc['npk']?></td>
                                <td><?=$vc['nama']?></td>
                                <td><?=$vc['nama_dept']?></td>
                                <td><?=$vc['voice']?></td>                           
                                <td class="td-actions text-right">                           
                                <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target=".fd-example-modal-lg">
                                    <i class="material-icons">delete_outline</i>
                                </button>
                                <div style="width:1500px" class="modal fade fd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" style="width:1500px">
                                    <div class="modal-content">
                                        <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <div class="col-md-12">
                                                <div class="card ">
                                                <div class="card-header card-header-rose card-header-text text-left">
                                                    <div class="card-text">
                                                    <h4 class="card-title">Hai Sahabat</h4>
                                                    </div>
                                                </div>
                                                <div class="card-body ">
                                                <form method="" action="/" class="form-horizontal">
                                                    <div class="row">
                                                    <p class="text-center">Apakah anda yakin menghapus data user ini?</p>
                                                    </div>
                                                    <div class="row-right ">
                                                        <button type="cancel" class="btn- btn-warning btn-sm">Batal</button>                      
                                                        <button type="submit" class="btn- btn-success btn-sm">Ya</button>
                                                    </div>                    
                                                </form>
                                                </div>  
                                            </div>                                                                                 
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>                            
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
            <!-- <button type="b
             <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
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