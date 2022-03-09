<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
  $page = "Upload Media";
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
                                    <form method="POST" action="proses_upload.php" enctype="multipart/form-data">
                                        <input type="file" name="media" class="pull-left">
                                        <span class="box pull-right">
                                            <a href = "../page/display.php" class="btn btn-danger btn-sm">
                                                <i class="material-icons">keyboard_arrow_right</i> Cancel
                                            </a>
                                        </span>
                                        <span class="box pull-right">
                                            <button type= "submit" name ="bsimpan" class="btn btn-info btn-sm">
                                                <i class="material-icons">keyboard_arrow_right</i> Submit
                                            </button>
                                        </span>
                                    </form>
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

<?php include "../page/footer.php";?>
</body>

</html>
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
  }
?>