<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $page = "Group Setting";
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
            <div class="row">
              <div class="col-sm-12 text-right">
                <span class="box pull-right">                                  
                <button type="button" rel="tooltip" class="btn btn-info btn-sm" data-toggle="modal" data-target=".ed-example-modal-lg">
                Tambah MP
                </button>
                  <div style="width:1500px" class="modal fade ed-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" style="width:1500px">
                      <div class="modal-content">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <tbody>
                            <div class="col-md-12">
                              <div class="card ">
                                <div class="card-header card-header-rose card-header-icon">
                                  <div class="card-icon">
                                    <i class="material-icons">assignment</i>
                                  </div>
                                  <h4 class="card-title text-left">Dept Account</h4>
                                </div>
                                <div class="card-body ">
                                  <form method="" action="/" class="form-horizontal">
                                    <div class="row">
                                      <label class="col-sm-2 col-form-label">Npk</label>
                                      <div class="col-sm-10">
                                        <div class="form-group">
                                          <input type="Number" class="form-control" placeholder="masukan npk">
                                          <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <label class="col-sm-2 col-form-label">Nama Karyawan</label>
                                      <div class="col-sm-10">
                                        <div class="form-group">
                                          <input type="text" class="form-control" placeholder="masukan nama">
                                        </div>
                                      </div>
                                    </div>                                        
                                    <div class="row">
                                      <label class="col-sm-2 col-form-label">Dept</label>
                                      <div class="col-sm-10">
                                        <div class="form-group">
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                          <option selected></option>
                                          <option value="B1">Body 1</option>
                                          <option value="B2">Body 2</option>
                                          <option value="BQ">BQC</option>                           
                                        </select>
                                        </div>
                                      </div>                   
                                    </div>
                                    <div class="row">
                                      <label class="col-sm-2 col-form-label">Foreman</label>
                                      <div class="col-sm-10">
                                        <div class="form-group">
                                          <input type="text" class="form-control" placeholder="masukan npk">
                                          <input type="text" class="form-control" placeholder="">                                                      
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <label class="col-sm-2 col-form-label">Supervisor</label>
                                      <div class="col-sm-10">
                                        <div class="form-group">
                                          <input type="text" class="form-control" placeholder="masukan npk">
                                          <input type="text" class="form-control" placeholder="">                                                      
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <label class="col-sm-2 col-form-label">Manager</label>
                                      <div class="col-sm-10">
                                        <div class="form-group">
                                          <input type="text" class="form-control" placeholder="masukan npk">
                                          <input type="text" class="form-control" placeholder="">                                                      
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <label class="col-sm-2 col-form-label">Division Head</label>
                                      <div class="col-sm-10">
                                        <div class="form-group">
                                          <input type="text" class="form-control" placeholder="masukan npk">
                                          <input type="text" class="form-control" placeholder="">                                                      
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
                            </tbody>
                          </table>
                        </div>
                      </div>  
                    </div>
                  </div>
                </span>
              </div>
            </div>           
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Departement Administration</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="text-center">No Id</th>
                            <th>Group</th>
                            <th>Npk Koordinator</th>
                            <th>Nama Koordinator</th>
                            <th>Division</th>
                            <th class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                          $master = mysqli_query ($con,"SELECT karyawan.npk, karyawan.nama, dept_fungsion.nama_dept_fungsion AS df, group_tb.npk_group AS npkgrp, section.npk_sec AS npksc, dept_fungsion.npk_fungsion AS npkdp, dept.nama_dept AS dp, dept.npk_dept AS npkd, divhead.npk_div AS npkdiv,
                                                              divhead.nama_div AS namadiv, group_tb.nama_group AS ng
                                                              FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                                              LEFT JOIN section ON karyawan.section = section.id_section
                                                              LEFT JOIN dept_fungsion ON karyawan.dept_fungsion = dept_fungsion.id_dept_fungsion
                                                              LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                                              LEFT JOIN divhead ON karyawan.divhead = divhead.id_div WHERE jabatan = 'FRM' GROUP BY `group`")or die (mysqli_error($con)); 
                          while ($dm = mysqli_fetch_assoc ($master)){
                        ?>                        
                          <tr>
                            <td class="text-center"><?=$no++;?></td>
                            <td><?=$dm['ng']?></td>
                            <td><?=$dm ['npkgrp']?></td>
                            <?php 
                              $foreman = mysqli_query ($con,"SELECT nama FROM karyawan WHERE npk = '$dm[npkgrp]'") or die (mysqli_error($con)); 
                              $fr = mysqli_fetch_assoc ($foreman);
                            ?>                              
                            <td><?=$fr ['nama']?></td>
                            <?php 
                              $div = mysqli_query ($con,"SELECT nama FROM karyawan WHERE npk = '$dm[npkdiv]'") or die (mysqli_error($con)); 
                              $dv = mysqli_fetch_assoc ($div);
                            ?>                              
                            <td><?=$dm ['namadiv']?></td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target=".dd-example-modal-lg">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target=".cd-example-modal-lg">
                                <i class="material-icons">delete_outline</i>
                              </button>
                            </td>
                          </tr>
                          <?php  
                          }                          
                          ?>                         
                        </tbody>
                      </table>
                    </div>
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
                    <h4 class="card-title">Departement Fungsional</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="text-center">No Id</th>
                            <th>Departement Account</th>
                            <th>Npk Koordinator</th>
                            <th>Nama Koordinator</th>
                            <th>Division</th>
                            <th class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                          $master1 = mysqli_query ($con,"SELECT karyawan.npk, karyawan.nama, dept_fungsion.nama_dept_fungsion AS df, group_tb.npk_group AS npkgrp, section.npk_sec AS npksc, dept_fungsion.npk_fungsion AS npkdp, dept.nama_dept AS dp, dept.npk_dept AS npkd, divhead.npk_div AS npkdiv,
                                                              divhead.nama_div AS namadiv
                                                              FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                                              LEFT JOIN section ON karyawan.section = section.id_section
                                                              LEFT JOIN dept_fungsion ON karyawan.dept_fungsion = dept_fungsion.id_dept_fungsion
                                                              LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                                              LEFT JOIN divhead ON karyawan.divhead = divhead.id_div WHERE jabatan = 'MNG' ")or die (mysqli_error($con)); 
                          while ($dm1 = mysqli_fetch_assoc ($master1)){
                        ?>                        
                          <tr>
                            <td class="text-center"><?=$no++;?></td>
                            <td><?=$dm1['df']?></td>
                            <td><?=$dm1 ['npkd']?></td>
                            <?php 
                              $manager1 = mysqli_query ($con,"SELECT nama FROM karyawan WHERE npk = '$dm1[npkd]'") or die (mysqli_error($con)); 
                              $mg1 = mysqli_fetch_assoc ($manager1);
                              ?>                              
                            <td><?=$mg1 ['nama']?></td>
                            <?php 
                              $div1 = mysqli_query ($con,"SELECT nama FROM karyawan WHERE npk = '$dm1[npkdiv]'") or die (mysqli_error($con)); 
                              $dv1 = mysqli_fetch_assoc ($div1);
                              ?>                              
                            <td><?=$dm1 ['namadiv']?></td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target=".dd-example-modal-lg">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target=".cd-example-modal-lg">
                                <i class="material-icons">delete_outline</i>
                              </button>
                            </td>
                          </tr>
                          <?php  
                          }                          
                          ?>                         
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