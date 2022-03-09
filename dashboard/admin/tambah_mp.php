<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $page = "Tambah Man Power";
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
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-info card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Data Man Power</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form method="POST" action="ambil_section.php" class="form-horizontal">
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Npk</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="Number" name ="tnpk" class="form-control" placeholder="masukan npk" required>
                          <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Nama</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" name ="nama" class="form-control" placeholder="masukan nama" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Tgl. Lahir</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="Date" name="datetl" class="form-control" required>
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Tgl. Masuk</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="Date" name="datetm" class="form-control" required>
                        </div>
                      </div>
                    </div>                    
                    <div class="row">
                    <label class="col-sm-2 col-form-label text-dark">Departement</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" name="tdept" id="inlineFormCustomSelectPref" required>
                            <option selected></option>
                            <option value="B1">BODY 1</option>
                            <option value="B2">BODY 2</option>
                            <option value="B3">BQC</option>                          
                        </select>
                        </div>
                      </div>                   
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label text-dark">Dept. Fungsion</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" name="fungsion" id="fungsion" required>
                            <option selected>-Pilih Dept Fungsion-</option>
                              <?php
                                 // mengambil nama nama dept fungsion yang ada di data base
                              $fungsion = mysqli_query ($con, "SELECT* FROM dept_fungsion ORDER BY nama_dept_fungsion");
                              while ($fu = mysqli_fetch_array($fungsion)){
                                ?>
                                <option  value ="<?php echo $fu['id_dept_fungsion'];?>"><?php echo $fu['nama_dept_fungsion'];?></option>
                              <?php
                              }
                              ?>
                            <!-- <option value="B1">BUSINESS & PEOPLE DEVELOPMENT</option>
                            <option value="B2">PRODUCTION</option>
                            <option value="BQ">TOTAL QUALITY</option> -->
                        </select>
                        </div>
                      </div>                   
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label text-dark">Section</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" name="section" id="section" required>
                            <option selected>-Pilih Section-</option>
                            <!-- <option value="PM">PERFORMANCE MANAGEMENT</option>
                            <option value="CH">PRODUCTION 1</option>
                            <option value="CT">QUALITY 2</option> -->
                        </select>
                        </div>
                      </div>                   
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label text-dark">Group</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" name="grp" id="grp" required>
                            <option selected>-Pilih Group-</option>
                            <!-- <option value="KQ">KOMITE QCCSS & ICARE</option>
                            <option value="KP">KOMITE PDCA</option>
                            <option value="AM">ASSET MANAGEMENT</option> -->
                        </select>
                        </div>
                      </div>                   
                    </div> 
                    <div class="row">
                    <label class="col-sm-2 col-form-label text-dark">Shift</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" name="shift" id="inlineFormCustomSelectPref" required>
                            <option selected></option>
                            <option value="A">SHIFT A</option>
                            <option value="B">SHIFT B</option>
                            <option value="N">SHIFT N</option>                                                     
                        </select>
                        </div>
                      </div>                   
                    </div>                          
                    <div class="row">
                    <label class="col-sm-2 col-form-label text-dark">Jabatan</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" name="jab" id="inlineFormCustomSelectPref" required>
                            <option selected></option>
                            <option value="DIV">DIVISION HEAD</option>
                            <option value="MNG">MANAGER</option>
                            <option value="SPV">SUPERVISOR</option>
                            <option value="FRM">FOREMAN</option>
                            <option value="TL">TEAM LEADER</option>  
                            <option value="TM">TEAM MEMBER</option>                                                       
                        </select>
                        </div>
                      </div>                   
                    </div>    
                    <div class="row">
                    <label class="col-sm-2 col-form-label text-dark">Status</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" name="stat" id="inlineFormCustomSelectPref" required>
                            <option selected></option>
                            <option value="K1">KONTRAK 1</option>
                            <option value="K2">KONTRAK 2</option>
                            <option value="P">PERMANEN</option>                                                     
                        </select>
                        </div>
                      </div>                   
                    </div> 
                    <div class="row">
                    <label class="col-sm-2 col-form-label text-dark">Divisi</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" name="div" id="inlineFormCustomSelectPref" required>
                            <option selected></option>
                            <option value="BDY">BODY DIVISION</option>                                                   
                        </select>
                        </div>
                      </div>                   
                    </div>                               
                    <div class="col-sm-12  text-right">
                      <span class="box pull-right">                     
                          <a href = "data_mp.php" class="btn btn-danger btn-sm">Batal
                          </a>
                      </span>                    
                        <button type="submit" name="bsimpan" class="btn btn-info btn-sm">Simpan</button>
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
<?php include "../page/footer.php";?>
</body>
<script>
  var htmlobjek;
  $(document).ready (function(){
      //apabila terjadi event onchange terhadap object <select id=fungsion?
    $("#fungsion").change (function(){
    var fungsion = $("#fungsion"). val ();
    $.ajax({
    url :"ambil_section.php",
    method : "post",
    data :"fungsion="+fungsion,
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
    url :"ambil_section.php",
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

</html>
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
  }
?>