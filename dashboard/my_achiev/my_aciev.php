<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $grp = $_SESSION ['group'];
    $npk = $_SESSION ['npk'];  
    $page = "My Achievement";

    //menghubungkan tombol submit  
    if(isset($_GET['id']))
    {
      $delete = mysqli_query($con, "UPDATE buat_ss SET `status` = 'b' WHERE id_buat = '$_GET[id]'")or die (mysqli_error($con));
  // memasukan data inputan ke databases
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
                      <div class="col-md-12">
                                          <!-- form filter data berdasarkan range tanggal  -->
                        <form action="my_aciev.php" method="get">
                          <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label text-dark">from</label>
                            </div>
                            <div class="col-auto">
                                <input type="date"  class="form" id="dari" name="dari" required>
                            </div>
                            <div class="col-auto">
                                <label class="col-form-label text-dark">Until</label>
                            </div>                               
                            <div class="col-auto">
                                <input type="date" class="form" id="ke" name="ke" required>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-info btn-sm" type="submit" name="pencarian">lets Go</button>
                                <a href ="my_aciev.php" class="btn btn-danger btn-sm">Refresh</a>  
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- <div class ="col-md-6">
                        <form class="navbar-form">
                          <div class="input-group no-border">
                            <input type="text" value="" name="cari" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                              <i class="material-icons">search</i>
                            </button>
                          </div>
                        </form>
                      </div> -->
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
                    <?php
                        if(isset($_GET['dari']) AND isset($_GET['ke'])){
                      ?>
                         <a href = "cetak2.php?dari=<?echo $_GET['dari'];?>&ke=<?echo $_GET['ke'];?>" class="btn btn-info btn-sm">
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
                          <th>Periode</th> 
                          <th class="text-center">A3 Report</th> 
                          <th>Progress</th>                                                  
                          <th class="text-center">Nilai</th>  
                          <th>Nominal</th>                                                   
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
                                        shift.id_shift, buat_ss.periode , buat_ss.a3_report AS a3
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
                            // if (isset($_GET['cari'])){
                            //   $src = "AND kategori.id_kategori LIKE '%".$cari."%'";
                            // }else{
                            //   $src = "";
                            // }                           
                            if ($role !== "npk"){                            
                                $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress, buat_ss.a3_report AS a3
                                FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE karyawan.npk = '$npk' $filter limit $halaman_awal, $batas")or die (mysqli_error($con)); 
                             }       
                              while ($sc = mysqli_fetch_assoc ($score)){
                            ?>      
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
                        <tr>
                          <td class="text-center"><?=$no++;?></td>
                          <td><?=$sc['npk']?></td>
                          <td><?=$sc['nama']?></td>
                          <td><?=$sc['id_kategori']?></td>
                          <td><?=$sc['judul']?></td>
                          <th><?=$sc['periode']?></th> 
                          <th class="text-center"><?=$sc['a3']?></th> 
                          <td>
                            <div class="progress" id= "progress" style = "height:15px; border-radius:50px">
                              <div class="progress-bar progress-bar-striped progress-bar-animated <?=$color?>" role="progressbar" style="width: <?=$progress?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>                       
                          </td>                           
                          <td class="text-center"><?=$sc['nilai']?></td>               
                          <td><?=$rupiah?></td>                               
                          <td class="td-actions text-right">
                              <a href ="../ss/preview_ss.php?id=<?=$sc['id']?>&hal=aciev" class="btn btn-info" rel="tooltip">
                                <i class="material-icons">preview</i>
                              </a>                            
                            <!-- <button type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">get_app</i>.
                            </button> -->
                            <a href ="../../assets/img/product/<?=$sc['a3']?>" target ="blank" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">note_add</i>
                            </a> 
                            <a href ="my_aciev.php?id=<?=$sc['id']?>" rel="tooltip" class="btn btn-danger hapuscoy">
                              <i class="material-icons">delete_outline</i>
                            </a>
                            <!-- <div style="width:1500px" class="modal fade fd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                            </div>                             -->
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
            <!-- <button type="b
             <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
7 days
</button> -->
          </div>
        </div>
      </div>
   </div>
<?php include "../page/footer.php";?>
</body>
<script>
  document.querySelector(".hapuscoy").addEventListener("click", function(e) {
   e.preventDefault();
   var getlink = $(this).attr('href');
  swal.fire({
    title: "Apakah sobat yakin mau dihapus?",
    type: "info",
    showCancelButton: true,
    confirmButtonText: "Hapus",
    confirmButtonColor: "#ff0055",
    cancelButtonColor: "#999999",
    reverseButtons: true,
    focusConfirm: false,
    focusCancel: true
  }).then((result) =>{
      if (result.value){
        document.location.href=getlink;
      }
  })
});
</script>
</html>
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
  }
?>