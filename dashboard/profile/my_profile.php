<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $page = "My Profile";

  //   $folder3 = '../../assets/img/faces/';
  //   $nama_p3 = $_FILES ['profile'] ['name'];
  //   $x3 = explode ('.', $nama_p3);
  //   $exstensi3 = strtolower (end($x));
  //   $ukuran3 = $_FILES ['profile'] ['size'];
  //   $file_temp3 = $_FILES ['profile'] ['tmp_name'];
  //   $file_upload3 = array ('png', 'jpg', 'jpeg', 'tiff');
  //   if (in_array($exstensi3, $file_upload3)===true){
  //     if ($ukuran3 < 3132210){
  //       move_uploaded_file ($file_temp3, $folder3.$nama_p3);
  //     }else{
  //       echo "<script>alert ('File Upload terlalu besar, Max 3 MB') </script>";
  //     }
  //     }else{
  //     echo "<script>alert ('File Upload tidak diperbolehkan') </script>";
  // }

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
    <?php
      $profil = mysqli_query ($con,"SELECT karyawan.npk, karyawan.nama, dept.nama_dept AS dp, 
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
      $pr = mysqli_fetch_assoc ($profil);
  ?> 
      <!-- End Navbar -->
      <div class="content">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-profile">
                  <div class="card-avatar">
                    <a href="#pablo">
                      <img class="img" src="../../assets/img/faces/<?echo $pr['npk'];?>.jpg"/>
                    </a>
                  </div>
                  <div class="card-body">
                    <h4 class="card-category text-gray"></h4>
                    <h4 class="card-title">Body Division</h4>
                    <p class="card-description">
                      PT Astra Daihatsu Motor - Indonesia
                    <!-- <span class="btn btn btn-rose btn-file">
                              <span class="fileinput-new">Photo Profil</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" name="profile" />
                    </span> -->
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card ">
                  <!-- <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Edit Profile</h4>
                    </div>
                  </div> -->
                  <div class="row">
                    <div class="col-sm-11 text-right">
                      <span class="box pull-left">                    
                        <a href ="edit_profile.php" class="btn btn-info">Edit Profile </a>
                      </span>
                    </div>
                  </div> 
                  <div class="card-body ">
                    <form method="POST" action="/" class="form-horizontal">
                      <div class="row">
                        <label class="col-sm-2 col-form-label">Npk</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                            <input type="text" class="form-control" name ="tnpk" value="<?=$pr['npk']?>" readonly>
                            <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tnama" value="<?=$pr ['nama']?>" readonly> 
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tjabatan" value="<?=$pr ['jabatan']?>" readonly>
                          </div>
                        </div>                   
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Departement Account</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tdept" value="<?=$pr['dp']?>" readonly>
                          </div>
                        </div>                   
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Departement Fungsion</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tdf" value="<?=$pr['nf']?>" readonly>
                          </div>
                        </div>                   
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Section</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tsec" value="<?=$pr['sc']?>" readonly>
                          </div>
                        </div>                   
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Group</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tgrp" value="<?=$pr ['grp']?>" readonly>
                          </div>
                        </div>                   
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Shift</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tshift" value="<?=$pr ['shf']?>" readonly>
                          </div>
                        </div>                   
                      </div>                                                                                            
                    </form>
                  </div>
                </div>
              </div>
            </div> <!-- menutup row-->

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