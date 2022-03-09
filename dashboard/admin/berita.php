<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
  $date = date('Y-m-d');
  $page = "Tambah Berita";
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
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Form Berita</h4>
                  </div>
                </div>               
                <div class="card-body ">
                  <form method="POST" action="proses_berita.php" id="ss" class="form-horizontal" enctype ="multipart/form-data">
                  <?php
                        $making = mysqli_query ($con,"SELECT karyawan.npk, karyawan.nama, dept.nama_dept AS dp, group_tb.nama_group AS grp, shift.id_shift
                                                            FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                                            LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                                            LEFT JOIN shift ON karyawan.shift = shift.id_shift WHERE npk = $_SESSION[npk]")or die (mysqli_error($con)); 
                       $mk = mysqli_fetch_assoc ($making);
                  ?>   
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-dark">Terbit</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                              <input type="text" name="terbit" value = "<?=$date?>" class="form-control" readonly>                                                         
                            </div>
                        </div>                   
                    </div>                                  
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-dark">Judul</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                            <textarea class="form-control" name="judul" rows="2" placeholder="masukan judul berita" required autofocus></textarea>
                            </div>
                        </div>
                    </div>                 
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Isi Berita</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <textarea class="ckeditor" id="ckedtor" name="isi"></textarea>
                          <!-- <textarea class= "form-control" rows="3" name="isi" placeholder="deskripsikan berita " required> </textarea> -->
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-5 col-form-label">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../../assets/img/view.jpg" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-info btn-sm btn-file ">
                              <span class="fileinput-new">Upload Foto</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" name="foto" required/>
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>                                                                                                                                                                                                                                                
                    <div class="col-sm-12  text-right">
                        <span class="box pull-right">                     
                            <a href="../admin/berita.php" class="btn btn-danger btn-sm">Batal</a>                      
                            <button type="submit" name="bsimpan" class="btn btn-info btn-sm">Simpan</button>
                        </span>
                    </div>     
                    <div class="not"></div>               
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
<!-- <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script> -->
</body>
</html>
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
}
?>