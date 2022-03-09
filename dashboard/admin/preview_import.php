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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                    <form method="post" action="proses_imp.php" enctype="multipart/form-data">
                                        <!--
                                        -- Buat sebuah input type file
                                        -- class pull-left berfungsi agar file input berada di sebelah kiri
                                        -->
                                            <input type="file" name="import" class="pull-left">
                                                <button type="submit" name="preview" class="btn btn-dark btn-sm">
                                                    <i class="material-icons">keyboard_arrow_right</i> Prev
                                                </button>
                                            <span class="box pull-right">
                                                <a href = "data_mp.php" class="btn btn-danger btn-sm">
                                                    <i class="material-icons">keyboard_arrow_right</i> Canc
                                                </a>
                                            </span>
                                            <span class="box pull-right">
                                                <button type= "submit"  name="bsimpan"class="btn btn-info btn-sm">
                                                    <i class="material-icons">keyboard_arrow_right</i> Subm
                                                </button>
                                            </span>
                                    </form>
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
                    <h4 class="card-title">Preview</h4>
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
                            <tr>
                            <td class="text-center">#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>                         
                            </tr>                                            
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