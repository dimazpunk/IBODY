<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $page = "Monitoring Control Team";
    $grp = $_SESSION ['group'];
    $npk = $_SESSION ['npk'];  
    $jbt = $_SESSION ['jabatan'];
    $sec = $_SESSION ['section'];
    $today = date ("Y-m-d");
    $bulan = date ("M Y");
    $tanggal_awal = date ('Y-m-01', strtotime($today));
    $tanggal_akhir = date ('Y-m-t', strtotime ($today));
    
    if (isset ($_GET['pencarian'])){
        $awal = $_GET ['bulan1'];
        $akhir = $_GET ['bulan2'];
        $tahun = $_GET ['tahun'];

        $blnpertama = date ('d-'.$awal. '-'.$tahun);
        $hari = date ('d-'.$akhir. '-'.$tahun);
    }else{
        $awal = "01";
        $akhir = date('m');
        $blnpertama = date ('d-1-Y');
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
    //menghubungkan tombol submit  
        if(isset($_GET['id']))
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

    // $jumlah1 = mysqli_query ($con,"SELECT nilai, periode
    // FROM buat_ss WHERE buat_ss.npk = $npk AND nilai > 0  AND periode 
    // BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'")or die (mysqli_error($con)); 
// $jm = mysqli_num_rows ($jumlah1);
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
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons"></i>
                    </div>
                    <h4 class="card-title">Filter Data</h4>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-md-6">
                                          <!-- form filter data berdasarkan range tanggal  -->
                        <form action="control.php" method="get">
                          <div class="row">
                            <label class="col-sm-2 col-form-label">Dari</label>
                              <div class="col-sm-10">
                                <div class="form-group">
                                  <select class="custom-select my-1 mr-sm-2 btn-info" name="bulan1" id="inlineFormCustomSelectPref">
                                    <option selected></option>
                                    <option value ="01" >Januari</option>  
                                    <option value ="02" >Februari</option> 
                                    <option value ="03" >Maret</option> 
                                    <option value ="04" >April</option>  
                                    <option value ="05" >Mei</option> 
                                    <option value ="06" >Juni</option> 
                                    <option value ="07" >Juli</option>  
                                    <option value ="08" >Agustus</option> 
                                    <option value ="09" >September</option>  
                                    <option value ="10" >Oktober</option>  
                                    <option value ="11" >November</option>  
                                    <option value ="12" >Desember</option>                                                                                                                                                                
                                  </select>
                                </div>
                              </div> 
                          </div>
                          <div class="row">
                            <label class="col-sm-2 col-form-label">Sampai</label>
                              <div class="col-sm-10">
                                <div class="form-group">
                                  <select class="custom-select my-1 mr-sm-2 btn-info" name="bulan2" id="inlineFormCustomSelectPref">
                                    <option selected></option>
                                    <option value ="01" >Januari</option>  
                                    <option value ="02" >Februari</option> 
                                    <option value ="03" >Maret</option> 
                                    <option value ="04" >April</option>  
                                    <option value ="05" >Mei</option> 
                                    <option value ="06" >Juni</option> 
                                    <option value ="07" >Juli</option>  
                                    <option value ="08" >Agustus</option> 
                                    <option value ="09" >September</option>  
                                    <option value ="10" >Oktober</option>  
                                    <option value ="11" >November</option>  
                                    <option value ="12" >Desember</option>                                                                                                                                                                
                                  </select>
                                </div>
                              </div> 
                          </div>
                          <div class="row">
                            <label class="col-sm-2 col-form-label">Tahun</label>
                              <div class="col-sm-10">
                                <div class="form-group">
                                  <select class="custom-select my-1 mr-sm-2 btn-info" name="tahun" id="inlineFormCustomSelectPref">
                                    <option selected></option>
                                    <?php
                                        $mulai= 2021;
                                        for($i = date("Y");$i>=$mulai; $i--){
                                            $sel = $i == date('Y') ? ' selected="selected"' : '';
                                            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                    }
                                    ?>                                                      
                                  </select>
                                </div>
                              </div> 
                          </div>   
                          <!-- <div class="row">                      
                            <div class ="col-sm-6">
                                  <button class="btn btn-info" type="submit" name="pencarian">Lets Go</button>
                            </div>
                          </div> -->
                          <div class="row">
                            <div class="col-lg-12 text-right">
                              <span class="box pull-right">
                                <a href ="control.php" class="btn btn-danger btn-sm">Refresh</a>                      
                                <button class="btn btn-info btn-sm" type="submit" name="pencarian">Lets Go</button>
                              </span>
                            </div>
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
                  <h4 class="card-title">SS Control Team </h4>
                </div>
                <div class="row">
                  <div class="col-sm-11 text-right">
                    <span class="box pull-right">  
                        <?php
                        if(isset($_GET['bulan1']) AND isset($_GET['bulan2']) AND isset($_GET['tahun'])){
                        ?>  
                         <a href = "cetak1.php?dari=<?echo $_GET['bulan1'];?>&ke=<?echo $_GET['bulan2'];?>&tahun=<?echo $_GET['tahun'];?>" class="btn btn-info btn-sm">
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
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th>Npk</th>
                          <th>Nama</th>
                            <?php
                            for ($i = 0; $i < $bln ; $i++){
                              $b = $i + ($awal);
                            $namabln = date ('M-Y', strtotime($tahun.'-'.$b.'-1'));
                            ?>
                          <th><?=$namabln?></th> 
                          <?php
                            }
                            ?>                                              
                          <th class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                              //menampilkan pagination
                              $batas = 20;
                              $halaman = (isset($_GET['halaman']))?(int)$_GET['halaman'] : 1;
                              $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                              $no = $halaman_awal+1;	               
                              $previous = $halaman - 1;
                              $next = $halaman + 1;                      
                              $data = mysqli_query($con,"SELECT  karyawan.npk AS npk, karyawan.nama, dept.nama_dept AS dp, group_tb.nama_group AS grp,
                                        shift.id_shift
                                        FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                        LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                        LEFT JOIN shift ON karyawan.shift = shift.id_shift")or die (mysqli_error($con));
                              $jumlah_data = mysqli_num_rows($data);
                              $total_halaman = ceil($jumlah_data / $batas);
                            //menampilkan filter data//
                            if (isset($_GET['pencarian'])){
                              $filter= " AND periode BETWEEN $tanggal_mulai AND $tanggal_akhir ";
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
                              LEFT JOIN shift ON karyawan.shift = shift.id_shift  ORDER BY karyawan.npk ASC limit $halaman_awal, $batas")or die (mysqli_error($con)); 
                              $us = "control.php"; 
                            }                                            
                              while ($ct = mysqli_fetch_assoc($control)){

                            ?>                       
                        <tr>
                          <td class="text-center"><?=$no++;?></td>
                          <td class="text-center"><?=$ct['npk']?></td>
                          <td class="text-left"><?=$ct['nama']?></td>  
                            <?php
                            for ($i = 0; $i < $bln ; $i++){
                              $b = $i + ($awal);
                            $date_awal = date ('Y-m-01', strtotime($tahun.'-'.$b.'-1'));
                            $date_akhir = date ('Y-m-t', strtotime($tahun.'-'.$b.'-1'));
                            $qry = mysqli_num_rows(mysqli_query($con, $jumlah1." AND buat_ss.npk = '$ct[npk]' AND periode between '$date_awal' AND '$date_akhir'"));
                            ?>                         
                          <td class="text-center"><?=$qry?></td> 
                          <?php
                            }
                          ?>                                                                            
                          <td class="td-actions text-center">                           
                            <!-- <button type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">get_app</i>
                            </button> -->
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