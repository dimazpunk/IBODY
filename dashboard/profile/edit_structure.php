<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
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
                    <h4 class="card-title">Edit Structure</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form method="" action="/" class="form-horizontal">
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Foreman</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="Number" class="form-control" placeholder="masukan npk">
                          <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Section Head</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="Number" class="form-control" placeholder="masukan npk">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Manager</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="Number" class="form-control" placeholder="masukan npk">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Division Head</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="Number" class="form-control" placeholder="masukan npk">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Director</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="Number" class="form-control" placeholder="masukan npk">
                        </div>
                      </div>
                    </div>                                                          
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Disabled</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" class="form-control" value="Disabled input here.." disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row-right ">
                      <button type="cancel" class="btn btn-warning">Batal</button>                      
                      <button type="submit" class="btn btn-success">Save</button>
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

</html>
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
  }
?>