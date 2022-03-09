<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $page = "Validation Data Profile";

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
<?php
      $user = mysqli_query ($con,"SELECT karyawan.npk, karyawan.nama, dept.nama_dept AS dp, 
      dept_fungsion.nama_dept_fungsion AS `nf`, 
      section.nama_section AS sc, 
      group_tb.nama_group AS grp, 
      shift.id_shift AS shf, 
      jabatan.nama_jabatan AS jabatan
      FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
      LEFT JOIN dept ON karyawan.dept = dept.id_dept
      LEFT JOIN dept_fungsion ON karyawan.dept_fungsion = dept_fungsion.id_dept_fungsion
      LEFT JOIN section ON karyawan.section = section.id_section
      LEFT JOIN jabatan ON karyawan.jabatan = jabatan.id_jabatan
      LEFT JOIN shift ON karyawan.shift = shift.id_shift WHERE npk = '$_SESSION[npk]' ")or die (mysqli_error($con)); 
      $ur = mysqli_fetch_assoc ($user);
  ?> 
  <div class="wrapper ">
    <?php include "../page/navbar.php";?>
      <!-- End Navbar -->
      <div class="content">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-icon">
                    <i class="material-icons">record_voice_over</i>
                  </div>
                  <h4 class="card-title">Apakah Data Sahabat sudah benar?</h4>                  
                </div>
                <div class="card-body ">
                  <form method="POST" action="voice_em.php" class="form-horizontal" enctype ="multipart/form-data">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Npk</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                            <input type="text" class="form-control" name ="tnpk" value="<?=$ur ['npk']?>" readonly>
                            <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tnama" value="<?=$ur ['nama']?>" readonly> 
                          </div>
                        </div>
                      </div>   
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tjabatan" value="<?=$ur ['jabatan']?>" readonly>
                          </div>
                        </div>                   
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Dept. Account</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tdept" value="<?=$ur['dp']?>" readonly>
                          </div>
                        </div>                   
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Dept. Fungsion</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tdf" value="<?=$ur['nf']?>" readonly>
                          </div>
                        </div>                   
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Section</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tsec" value="<?=$ur['sc']?>" readonly>
                          </div>
                        </div>                   
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Group</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tgrp" value="<?=$ur ['grp']?>" readonly>
                          </div>
                        </div>                   
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Shift</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tshift" value="<?=$ur ['shf']?>" readonly>
                          </div>
                        </div>                   
                      </div>                
                    <div class="row">
                      <div class="col-lg-12 text-right">
                        <span class="box pull-right">
                          <a href ="../profile/my_profile.php" class="btn btn-danger btn-sm">Tidak</a>                      
                          <a href="../ss/make_ss.php" class="btn btn-info btn-sm">Benar</a>
                        </span>
                      </div>
                    </div>                   
                  </form>
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