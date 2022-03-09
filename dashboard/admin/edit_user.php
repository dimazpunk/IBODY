<?php
  require_once "../../config/config.php";
  $page = "Edit User";
  if (isset($_SESSION['npk'])){

    if(isset($_GET['bsimpan'])) //menghubungkan tombol submit   
    {
      $user = $_GET['pass'];
        $simpan = mysqli_query($con, "UPDATE username SET `password` = '$_GET[pass]' WHERE npk = '$_GET[id]'")or die (mysqli_error($con));
  // memasukan data inputan ke databases
        if($simpan){
        echo "<script>alert('simpan data ss sukses!'); 
               document.location = 'admin_mng.php';
             </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju
        }
        else
        {
        echo "<script>alert('simpan data gagal!'); 
              </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju            
        }
  }
?>      
<!--
=========================================================
Material Dashboard PRO - v2.2.2x
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
    $user = mysqli_query ($con,"SELECT karyawan.npk, karyawan.nama, dept.nama_dept AS dp, group_tb.nama_group AS grp, shift.id_shift, jabatan.nama_jabatan AS jabatan
    FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
    LEFT JOIN dept ON karyawan.dept = dept.id_dept
    LEFT JOIN jabatan ON karyawan.jabatan = jabatan.id_jabatan
    LEFT JOIN shift ON karyawan.shift = shift.id_shift WHERE npk = '$_GET[id]'")or die (mysqli_error($con)); 
    $ur = mysqli_fetch_assoc ($user);
?> 
  <div class="wrapper ">
    <?php include "../page/navbar.php";?>
      <div class="content">
        <div class="content">
          <div class="container-fluid">
            <!-- <div class="row">
              <div class="col-sm-12 text-right">
                  <span class="box pull-right">                    
                    <button type="submit" class="btn btn-success btn-sm">A3 Report</button>
                    <button type="submit" class="btn btn-success btn-sm">
                      <a href ="scoring_spv.php" class="material-icons" >Level Up</a></button>                       
                  </span>
              </div>
            </div>           -->
            <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-warning card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Edit User</h4>
                  </div>
                </div>
                <div class="card-body ">               
                  <form method="GET" action="proses_user.php" class="form-horizontal" enctype ="multipart/form-data">   
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
                      <label class="col-sm-2 col-form-label">Departement</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tdept" value="<?=$ur ['dp']?>" readonly>
                          </div>
                        </div>                   
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Seksi</label>
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
                              <input type="text" class="form-control" name="tshift" value="<?=$ur ['id_shift']?>" readonly>
                          </div>
                        </div>                   
                      </div> 
                      <?php
                          $psr = mysqli_query ($con,"SELECT username.npk, username.user, username.password AS ps, username.level AS la
                          FROM username WHERE npk = '$_GET[id]'")or die (mysqli_error($con)); 
                          $pr = mysqli_fetch_assoc ($psr);
                      ?>   
                      <!-- <div class="row">
                      <label class="col-sm-2 col-form-label">Password Lama</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" name="tpassword" value="" readonly>
                          </div>
                        </div>                   
                      </div> -->
                      <!-- <div class="row">
                      <label class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                            <input type="text" name="pass" class="form-control" placeholder="masukan password baru" required autofocus>
                          </div>
                        </div>
                      </div>  -->
                      <?php
                      $level = mysqli_query ($con,"SELECT DISTINCT username.level
                      FROM username")or die (mysqli_error($con)); 
                      ?> 
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Level User</label>
                          <div class="col-sm-10">
                              <div class="form-group">
                              <select class="custom-select my-1 mr-sm-2" name="level" id="inlineFormCustomSelectPref" required>
                                  <option selected></option>
                                  <?php 
                                  while ($lv = mysqli_fetch_assoc ($level)){
                                  ?>
                                  <option                                 
                                  <?php
                                  if ($lv ['level']== $pr ['la']){
                                      echo "selected='selected'";
                                  }
                                  ?> value="<?=$lv ['level']?>"> <?=$lv ['level']?> </option>     
                                  <?php
                                  }
                                  ?>                      
                              </select>
                              </div>
                          </div> 
                      </div> 
                    <!-- <div class="row">
                      <label class="col-sm-2 col-form-label label-checkbox">Level User</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="exampleRadios" value="option1" checked> Operator
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="exampleRadios" value="option2" checked> Foreman
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="exampleRadios" value="option3" checked> Superior
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="exampleRadios" value="option4" checked> Super Admin
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div> 
                      </div>
                    </div>                  -->
                    <div class="row">
                      <div class="col-lg-12 text-right">
                        <span class="box pull-right">
                          <a href ="admin_mng.php" class="btn btn-danger">Batal </a>                    
                          <button type="submit" class="btn btn-info" name="bsimpan">Submit</button>
                        </span>
                      </div>
                    </div>                                       
                  </form>
                </div>
              </div>
            </div>  
            </div>           
					</div>          
					<!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">7 days </button> -->
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