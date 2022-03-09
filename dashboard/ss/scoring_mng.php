<?php
  require_once "../../config/config.php";
  $page = "Manager";
  if (isset($_SESSION['npk'])){

  //   if(isset($_GET['bsimpan'])) //menghubungkan tombol submit   
  //   {
  //     $simpan = mysqli_query($con, "UPDATE buat_ss SET nilai = '$_GET[nilai1]' WHERE id_buat = '$_GET[id]'")or die (mysqli_error($con));
  // // memasukan data inputan ke databases
  //       if($simpan){
  //       echo "<script>alert('simpan data ss sukses!'); 
  //             document.location = 'scoring.php';
  //       </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju
  //       }
  //       else
  //       {
  //       echo "<script>alert('simpan data gagal!'); 
  //       //       </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju            
  //       }
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
      <div class="content">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Manager</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form method="GET" action="proses_mng.php" class="form-horizontal">
                    <input type="hidden" name="id" value ="<?=$_GET['id']?>" class="form-control" readonly>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                              <input type="number" name="nilai1" min="80" max="91" class="form-control"> 
                            </div>
                        </div>
                        <label class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                            <input type="number" class="form-control" value="40.000" disabled>                         
                            </div>
                        </div>                                         
                    </div>               
                    <div class="row-right ">
                      <div class="col-lg-12 text-right">
                        <a href ="scoring.php" class="btn btn-danger">Batal</a>                       
                        <button type="submit" class="btn btn-success" name ="bsimpan">Submit</button>
                      </div>
                    </div>                    
                  </form>
                </div>
              </div>
              <div class="row">              
                <div class="col-md-6">
                  <div class="card ">
                    <div class="card-header card-header-rose card-header-text">
                      <div class="card-text">
                        <h4 class="card-title">Nilai</h4>
                      </div>
                    </div>
                    <div class="card-body ">
                      <form method="" action="/" class="form-horizontal">
                        <div class="row">
                          <label class="col-sm-2 col-form-label">Nilai 80-85</label>
                          <div class="col-sm-10">
                            <div class="form-group">
                                <input type="number" class="form-control"  value="40.000" disabled> 
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <label class="col-sm-2 col-form-label">Nilai 86-88</label>
                          <div class="col-sm-10">
                            <div class="form-group">
                                <input type="number" class="form-control" value="60.000" disabled>
                            </div>
                          </div>                   
                        </div>
                        <div class="row">
                        <label class="col-sm-2 col-form-label">Nilai 89-91</label>
                          <div class="col-sm-10">
                            <div class="form-group">
                                <input type="number" class="form-control" value="80.000" disabled>
                            </div>
                          </div>                   
                        </div>                                                                                          
                      </form>
                    </div>
                  </div>
                </div> 
                <div class="col-md-6">
                  <div class="card ">
                    <div class="card-header card-header-warning card-header-text">
                      <div class="card-text">
                        <h4 class="card-title">Penentuan Range Penilaian SS</h4>
                      </div>
                    </div>
                    <div class="card-body ">
                    <div class="table-responsive">
                      <table class="table" id="table1">
                      <thead>
                          <tr>
                          <th class="text-center">Kriteria</th>
                          <th>BS</th>
                          <th>B</th>
                          <th>R</th>
                          <th>K</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">IDE</td>
                          <td>12 - 15</td>
                          <td>8 - 11</td>
                          <td>4 - 17</td>
                          <td>1 - 13</td>
                        </tr>
                        <tr>
                          <td class="text-center">USAHA</td>
                          <td>27 - 35</td>
                          <td>18 - 26</td>
                          <td>9 - 17</td>
                          <td>1 - 8</td>
                        </tr>   
                        <tr>
                          <td class="text-center">HASIL</td>
                          <td>31 - 40</td>
                          <td>21 - 30</td>
                          <td>11 - 20</td>
                          <td>1 - 10</td>
                        </tr> 
                        <tr>
                          <td class="text-center">PAPERWORK</td>
                          <td>8 - 10</td>
                          <td>5 - 7</td>
                          <td>3 - 4</td>
                          <td>1 - 2</td>
                        </tr>                                              
                      </tbody>
                      </table>
                    </div>
                  </div>
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