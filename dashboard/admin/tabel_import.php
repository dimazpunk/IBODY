<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
  $page = "Import Man Power";
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
        <div class="content">
            <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-12 text-right">
                    <span class="box pull-right">
                        <a href = "data_mp.php" class="btn btn-danger btn-sm">
                            <i class="material-icons">keyboard_arrow_right</i> Export
                        </a>
                    </span>
                    <span class="box pull-right">
                        <a href = "preview_import.php" class="btn btn-dark btn-sm">
                            <i class="material-icons">keyboard_arrow_right</i> Import
                        </a>
                    </span>
                </div>
                </div> 
                <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Tabel Karyawan</h4>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th class="text-center">No</th>
                            <th>Npk</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>                           
                            <th>Tanggal Masuk</th>
                            <th>Dept</th>
                            <th>Dept Fungsion</th>
                            <th>Section</th>
                            <th>Group</th>
                            <th>Shift</th>
                            <th>Jabatan</th>
                            <th>Status</th>    
                            <th>Divhead</th>                                          
                            </tr>
                        </thead>
                        <tbody>    
                        <?php
                        $no = 1;
                          $man = mysqli_query ($con,"SELECT karyawan.npk AS kn, 
                                                            karyawan.nama AS km,      
                                                            karyawan.tanggal_lahir AS kl,
                                                            karyawan.tanggal_masuk AS kt,
                                                            karyawan.dept AS kd,
                                                            karyawan.dept_fungsion AS kf,
                                                            karyawan.section AS ks,
                                                            karyawan.group AS kg,
                                                            karyawan.shift AS kif, 
                                                            karyawan.jabatan AS kj,
                                                            karyawan.status AS ktus,
                                                            karyawan.divhead AS kv
                                                            FROM karyawan")or die (mysqli_error($con)); 
                          while ($mp = mysqli_fetch_assoc ($man)){
                        ?>               
                            <tr>
                            <td class="text-center"><?=$no++;?></td>
                            <td><?=$mp ['kn']?></td>
                            <td><?=$mp ['km']?></td>
                            <td><?=$mp ['kl']?></td>
                            <td><?=$mp ['kt']?></td>
                            <td><?=$mp ['kd']?></td>
                            <td><?=$mp ['kf']?> </td>
                            <td><?=$mp ['ks']?></td>
                            <td><?=$mp ['kg']?></td>
                            <td><?=$mp ['kif']?></td>
                            <td><?=$mp ['kj']?></td>
                            <td><?=$mp ['ktus']?></td>
                            <td><?=$mp ['kv']?></td>                         
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
                <!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
    7 days
    </button> -->
            </div>
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