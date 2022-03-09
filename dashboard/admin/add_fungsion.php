<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $page = "Add Dept Account";
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
                    <h4 class="card-title">Add Dept</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form method="POST" action="proses_add_fung.php" class="form-horizontal">
                  <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">ID</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" name ="id" id="id" class="form-control" placeholder="masukan id departement baru" required>
                          <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Dept Fungtion</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" name ="dpa" id="dpa" class="form-control" placeholder="masukan nama departement baru" required>
                          <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Npk</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="number" onkeyup="isi_otomatis()" id="npk" name ="npk" class="form-control" placeholder="masukan npk koordinator" required>
                        </div>
                      </div>
                    </div> 
                    <!-- <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Nama</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" id="nama" name ="nama" class="form-control">
                        </div>
                      </div>
                    </div>                   -->
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
                          <a href = "org_dept.php" class="btn btn-danger btn-sm">Batal
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
<script type="text/javascript">

            function isi_otomatis(){
                var npk = $("#npk").val();
                $.ajax({
                    url: 'proses_add_dept.php',
                    type: 'GET',
                    data:{'npk':npk}, 
                }).done(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama').val(obj.nama);
                    console.log(obj)
                });
            }
        </script>
</html>
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
  }
?>