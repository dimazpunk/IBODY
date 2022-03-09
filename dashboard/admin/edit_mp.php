<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $page = "Edit Man Power";

//     if(isset($_GET['bsimpan'])) //menghubungkan tombol submit   
//     {
        
//         $simpan = mysqli_query($con, "UPDATE karyawan SET jabatan = '$_GET[tjabatan]', dept = '$_GET[tdept]', dept_fungsion = '$_GET[dpf]',   
//                                              section = '$_GET[section]', `group` = '$_GET[grp]', shift = '$_GET[tshift]', section = '$_GET[section]', `status` = '$_GET[tstatus]'
//                                               WHERE npk = '$_GET[tnpk]'")or die(mysqli_error($con));
//   // memasukan data inputan ke databases
//         if($simpan){
//         echo "<script>alert('simpan data ss sukses!'); 
//                document.location = 'data_mp.php';
//              </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju
//         }
//         else
//         {
//         echo "<script>alert('simpan data gagal!'); 
//               </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju            
//         }
//   }
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
    $user = mysqli_query ($con,"SELECT karyawan.npk, karyawan.nama, dept.nama_dept AS dp, group_tb.nama_group AS grp, shift.id_shift AS sh, jabatan.nama_jabatan AS jabatan, `status`.nama_status AS st, dept_fungsion.nama_dept_fungsion AS dpf,
    section.nama_section AS sc FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
    LEFT JOIN dept ON karyawan.dept = dept.id_dept
    LEFT JOIN jabatan ON karyawan.jabatan = jabatan.id_jabatan  
    LEFT JOIN dept_fungsion ON karyawan.dept_fungsion = dept_fungsion.id_dept_fungsion    
    LEFT JOIN  `status` ON karyawan.status = `status`.id_status 
    LEFT JOIN section ON karyawan.section = section.id_section    
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
                    <h4 class="card-title">Edit Data MP</h4>
                  </div>
                </div>
                <div class="card-body ">               
                    <form method="GET" action="proses_edit.php" class="form-horizontal" enctype ="multipart/form-data">   
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
                                <input type="text" class="form-control" name="tnama" value="<?=$ur ['nama']?>"> 
                            </div>
                            </div>
                        </div>
                        <?php
                            $jabatan = mysqli_query ($con,"SELECT DISTINCT jabatan.nama_jabatan, jabatan.id_jabatan
                            FROM karyawan LEFT JOIN jabatan ON karyawan.jabatan = jabatan.id_jabatan")or die (mysqli_error($con)); 
                        ?>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                <select class="custom-select my-1 mr-sm-2" name="tjabatan" id="inlineFormCustomSelectPref" required>
                                    <option selected></option>
                                    <?php
                                    WHILE ($jbt = mysqli_fetch_assoc ($jabatan)){
                                    ?>
                                    <option                                 
                                    <?php
                                    if ($jbt ['nama_jabatan']== $ur ['jabatan']){
                                        echo "selected='selected'";
                                    }
                                    ?> value="<?=$jbt ['id_jabatan']?>"> <?=$jbt ['nama_jabatan']?> </option>     
                                    <?php
                                    }
                                    ?>                      
                                </select>
                                </div>
                            </div> 
                        </div>   
                        <?php
                            $dept = mysqli_query ($con,"SELECT DISTINCT dept.nama_dept, dept.id_dept
                            FROM karyawan LEFT JOIN dept ON karyawan.dept = dept.id_dept")or die (mysqli_error($con)); 
                        ?>                      
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Departement</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                <select class="custom-select my-1 mr-sm-2" name="tdept" id="inlineFormCustomSelectPref" required>
                                    <option selected></option>
                                    <?php
                                    WHILE ($dpt = mysqli_fetch_assoc ($dept)){
                                    ?>
                                    <option                                 
                                    <?php
                                    if ($dpt ['nama_dept']== $ur ['dp']){
                                        echo "selected='selected'";
                                    }
                                    ?> value="<?=$dpt ['id_dept']?>"> <?=$dpt ['nama_dept']?> </option>     
                                    <?php
                                    }
                                    ?>                      
                                </select>
                                </div>
                            </div> 
                        </div>    
                        <?php
                            $fung = mysqli_query ($con,"SELECT DISTINCT dept_fungsion.nama_dept_fungsion, dept_fungsion.id_dept_fungsion
                            FROM dept_fungsion")or die (mysqli_error($con)); 
                        ?> 
                        <div class="row">
                        <label class="col-sm-2 col-form-label">Dept. Fungsion</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                <select class="custom-select my-1 mr-sm-2" name="dpf" id="dpf" required>
                                    <option selected></option>
                                    <?php
                                    WHILE ($fu = mysqli_fetch_assoc ($fung)){
                                    ?>
                                    <option                                 
                                    <?php
                                    if ($fu ['nama_dept_fungsion']== $ur ['dpf']){
                                        echo "selected='selected'";
                                    }
                                    ?> value="<?=$fu ['id_dept_fungsion']?>"> <?=$fu ['nama_dept_fungsion']?> </option>     
                                    <?php
                                    }
                                    ?>                      
                                </select>
                                </div>
                            </div> 
                        </div>  
                        <?php
                            $section = mysqli_query ($con,"SELECT DISTINCT section.nama_section, section.id_section
                            FROM section")or die (mysqli_error($con)); 
                        ?> 
                        <div class="row">
                        <label class="col-sm-2 col-form-label">Section</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                <select class="custom-select my-1 mr-sm-2" name="section" id="section" required>
                                    <option selected></option>
                                    <?php
                                    WHILE ($sec = mysqli_fetch_assoc ($section)){
                                    ?>
                                    <option                                 
                                    <?php
                                    if ($sec ['nama_section']== $ur ['sc']){
                                        echo "selected='selected'";
                                    }
                                    ?> value="<?=$sec ['id_section']?>"> <?=$sec ['nama_section']?> </option>     
                                    <?php
                                    }
                                    ?>                      
                                </select>
                                </div>
                            </div> 
                        </div>                        
                        <!-- <div class="row">
                        <label class="col-sm-2 col-form-label">Group</label>
                            <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tgrp" value="<?=$ur ['grp']?>">
                            </div>
                            </div>                   
                        </div> -->
                        <?php
                            $groups = mysqli_query ($con,"SELECT DISTINCT group_tb.nama_group, group_tb.id_group
                            FROM group_tb")or die (mysqli_error($con)); 
                        ?> 
                        <div class="row">
                        <label class="col-sm-2 col-form-label">Group</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                <select class="custom-select my-1 mr-sm-2" name="grp" id="grp" required>
                                    <option selected></option>
                                    <?php
                                    WHILE ($gr = mysqli_fetch_assoc ($groups)){
                                    ?>
                                    <option                                 
                                    <?php
                                    if ($gr ['nama_group']== $ur ['grp']){
                                        echo "selected='selected'";
                                    }
                                    ?> value="<?=$gr ['id_group']?>"> <?=$gr ['nama_group']?> </option>     
                                    <?php
                                    }
                                    ?>                      
                                </select>
                                </div>
                            </div> 
                        </div>
                        <?php
                            $shift = mysqli_query ($con,"SELECT DISTINCT shift.id_shift
                            FROM shift")or die (mysqli_error($con)); 
                        ?>
                        <div class="row">
                        <label class="col-sm-2 col-form-label">Shift</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                <select class="custom-select my-1 mr-sm-2" name="tshift" id="inlineFormCustomSelectPref" required>
                                    <option selected></option>
                                    <?php
                                    WHILE ($sh = mysqli_fetch_assoc ($shift)){
                                    ?>
                                    <option                                 
                                    <?php
                                    if ($sh ['id_shift']== $ur ['sh']){
                                        echo "selected='selected'";
                                    }
                                    ?> value="<?=$sh ['id_shift']?>"> <?=$sh ['id_shift']?> </option>     
                                    <?php
                                    }
                                    ?>                      
                                </select>
                                </div>
                            </div> 
                        </div> 
                        <?php
                            $status = mysqli_query ($con,"SELECT DISTINCT `status`.nama_status, `status`.id_status
                            FROM `status`")or die (mysqli_error($con)); 
                        ?> 
                        <div class="row">
                        <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                <select class="custom-select my-1 mr-sm-2" name="tstatus" id="inlineFormCustomSelectPref" required>
                                    <option selected></option>
                                    <?php
                                    WHILE ($sts = mysqli_fetch_assoc ($status)){
                                    ?>
                                    <option                                 
                                    <?php
                                    if ($sts ['nama_status']== $ur ['st']){
                                        echo "selected='selected'";
                                    }
                                    ?> value="<?=$sts ['id_status']?>"> <?=$sts ['nama_status']?> </option>     
                                    <?php
                                    }
                                    ?>                      
                                </select>
                                </div>
                            </div> 
                        </div>                                                          
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <span class="box pull-right">
                                <a href ="data_mp.php" class="btn btn-danger">Batal </a>                    
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
<script>
  var htmlobjek;
  $(document).ready (function(){
      //apabila terjadi event onchange terhadap object <select id=fungsion?
    $("#dpf").change (function(){
    var dpf = $("#dpf"). val ();
    $.ajax({
    url :"proses_edit.php",
    method : "post",
    data :"dpf="+dpf,
    cache : false,
    success : function (msg){
      //jika data suksess diambil dari server kita tampilkan
    $("#section").html(msg);
    }
    });
    });
    $("#section").change (function(){
    var section = $("#section"). val ();
    $.ajax({
    url :"proses_edit.php",
    method : "post",
    data :"section="+section,
    cache : false,
    success : function (msg){
      //jika data suksess diambil dari server kita tampilkan
    $("#grp").html(msg);
    }
    });
    });
  });
</script>
                                    <!-- lampirkan script java untuk menampilkan combobox bertingkat -->
</html>
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
  }
?>