<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $page = "User Setting";
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
              <div class ="col-md-6">
                  <form class="">
                    <div class="input-group no-border">
                      <input type="text" value="" name="cari" class="form-control" placeholder="Search...">
                      <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                      </button>
                    </div>
                  </form>
              </div>
              <div class="col-sm-6 text-right">
                <span class="box pull-right">
                <a href = "detail_ss.php" class="btn btn-danger btn-sm">
                  <i class="material-icons">keyboard_arrow_left</i> Import
                </a>
                </span>
                <span class="box pull-right">
                <a href = "export.php" class="btn btn-info btn-sm">
                  <i class="material-icons">keyboard_arrow_right</i> Export
                </a>
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
                  <h4 class="card-title">User Setting</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th>Npk</th>
                          <th>Nama</th>
                          <th>Password</th>
                          <th>Dept</th>
                          <th>Level</th>                                                  
                          <th class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $batas = 20;
                        $halaman = (isset($_GET['halaman']))?(int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                        $no = $halaman_awal+1;	               
                        $previous = $halaman - 1;
                        $next = $halaman + 1;                      
                        $data = mysqli_query($con,"SELECT  karyawan.npk AS npk, karyawan.nama, dept.nama_dept AS dp, group_tb.nama_group AS grp, username.password, username.npk AS npk_u,
                                  shift.id_shift, username.level AS ul
                                  FROM karyawan LEFT JOIN username ON karyawan.npk = username.npk
                                  LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                  LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                  LEFT JOIN shift ON karyawan.shift = shift.id_shift")or die (mysqli_error($con));
                        $jumlah_data = mysqli_num_rows($data);
                        $total_halaman = ceil($jumlah_data / $batas);
                        //Menampilkan search data
                        if(isset($_GET['cari'])){ 
                          $admin = mysqli_query ($con,"SELECT karyawan.npk, karyawan.nama, dept.nama_dept AS dp, username.password, 
                          username.npk AS npk_u, dept.nama_dept, shift.id_shift, username.level AS ul, group_tb.nama_group AS grp
                          FROM karyawan LEFT JOIN username ON karyawan.npk = username.npk
                          LEFT JOIN dept ON karyawan.dept = dept.id_dept
                          LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                          LEFT JOIN shift ON karyawan.shift = shift.id_shift WHERE karyawan.npk LIKE '%".$_GET['cari']."%' OR dept.nama_dept LIKE '%".$_GET['cari']."%' limit $halaman_awal, $batas")or die (mysqli_error($con)); 
                          $us = "edit_user.php";
                        }else{
                          $admin = mysqli_query ($con,"SELECT karyawan.npk, karyawan.nama, dept.nama_dept AS dp, username.password, 
                          username.npk AS npk_u, dept.nama_dept, shift.id_shift, username.level AS ul, group_tb.nama_group AS grp
                          FROM karyawan LEFT JOIN username ON karyawan.npk = username.npk
                          LEFT JOIN dept ON karyawan.dept = dept.id_dept
                          LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                          LEFT JOIN shift ON karyawan.shift = shift.id_shift ORDER BY karyawan.npk ASC limit $halaman_awal, $batas")or die (mysqli_error($con)); 
                          $us = "edit_user.php";
                        }
                        while ($ad = mysqli_fetch_assoc ($admin)){
                      ?>                       
                        <tr>
                          <td class="text-center"><?=$no++;?></td>
                          <td><?=$ad ['npk']?></td>
                          <td><?=$ad ['nama']?></td>
                          <td><?=$ad ['password']?></td>
                          <td><?=$ad ['dp']?></td>
                          <td><?=$ad ['ul']?></td>                         
                          <td class="td-actions text-right">
                            <a href="<?=$us?>?id=<?=$ad['npk']?>" rel="tooltip" class="btn btn-success">  
                                <i class="material-icons">edit</i> 
                            </a>  
                            <div style="width:1500px" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" style="width:1500px">
                                <div class="modal-content">
                                  <div class="table-responsive">
                                    <table class="table table-bordered">
                                      <tbody>
                                      <div class="col-md-12">
                                        <div class="card ">
                                          <div class="card-header card-header-rose card-header-text text-left">
                                            <div class="card-text">
                                              <h4 class="card-title">User Management</h4>
                                            </div>
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
                                                  <label class="col-sm-2 col-form-label">Nama Pengguna</label>
                                                  <div class="col-sm-10">
                                                    <div class="form-group">
                                                      <input type="text" class="form-control" placeholder="masukan nama">
                                                    </div>
                                                  </div>
                                                </div>                                          
                                                <div class="row">
                                                <label class="col-sm-2 col-form-label">Level Log In</label>
                                                  <div class="col-sm-10">
                                                    <div class="form-group">
                                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                        <option selected></option>
                                                        <option value="SA">Super Admin</option>
                                                        <option value="AD">Admin</option>
                                                        <option value="AGT">Anggota</option>                           
                                                    </select>
                                                    </div>
                                                  </div>                   
                                                </div>
                                                <div class="row">
                                                  <label class="col-sm-2 col-form-label">Kata Sandi</label>
                                                  <div class="col-sm-10">
                                                    <div class="form-group">
                                                      <input type="Password" class="form-control" placeholder="masukan Password">
                                                    </div>
                                                  </div>
                                                </div>                                            
                                                <div class="row">
                                                <label class="col-sm-2 col-form-label">Departement</label>
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
                                                <label class="col-sm-2 col-form-label">Seksi</label>
                                                  <div class="col-sm-10">
                                                    <div class="form-group">
                                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                        <option selected></option>
                                                        <option value="CQI">Committe QCCSS & ICARE</option>
                                                        <option value="CH">Committe Hoshin</option>
                                                        <option value="CT">Committe TPM</option>
                                                    </select>
                                                    </div>
                                                  </div>                   
                                                </div>
                                                <div class="row">
                                                <label class="col-sm-2 col-form-label">Shift</label>
                                                  <div class="col-sm-10">
                                                    <div class="form-group">
                                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                        <option selected></option>
                                                        <option value="A">Shift A</option>
                                                        <option value="B">Shift B</option>
                                                        <option value="N">Non Shift</option>
                                                    </select>
                                                    </div>
                                                  </div>                   
                                                </div>
                                                <div class="row">
                                                  <label class="col-sm-2 col-form-label label-checkbox">Status</label>
                                                  <div class="col-sm-10 checkbox-radios">
                                                    <div class="form-check">
                                                      <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" value="option2" checked> Aktif
                                                        <span class="circle">
                                                          <span class="check"></span>
                                                        </span>
                                                      </label>
                                                      <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" value="option1"> Tidak Aktif
                                                        <span class="circle">
                                                          <span class="check"></span>
                                                        </span>
                                                      </label>                                                
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
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <a href= "delete_user.php?id=<?=$ad['npk']?>" type="button" rel="tooltip" class="btn btn-danger btn-hapus" data-target=".cd-example-modal-lg">
                              <i class="material-icons">delete_outline</i>
                            </a>
                            <!-- <div style="width:1500px" class="modal fade cd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" style="width:1500px">
                                <div class="modal-content">
                                  <div class="table-responsive">
                                    <table class="table table-bordered">
                                      <tbody>
                                        <div class="col-md-12">
                                          <div class="card ">
                                            <div class="card-header card-header-rose card-header-text text-left">
                                              <div class="card-text">
                                                <h4 class="card-title">User Mangement</h4>
                                              </div>
                                            </div>
                                            <div class="card-body ">
                                            <form method="" action="/" class="form-horizontal">
                                              <div class="row">
                                                <p class="text-center">Apakah anda yakin menghapus data user ini?</p>
                                              </div>
                                              <div class="row-right ">
                                                  <button type="cancel" class="btn- btn-warning btn-sm">Batal</button>                      
                                                  <button type="submit" class="btn- btn-success btn-sm">Ya</button>
                                              </div>                    
                                            </form>
                                          </div>  
                                        </div>                                                                                 
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>     -->
                          </td>
                        </tr>
                        <?php  
                        }                          
                        ?>                          
                      </tbody>
                    </table>
                      <nav>
                        <ul class="pagination justify-content-center">
                          <li class="page-item">
                            <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                          </li>
                          <?php 
                          for($x=1;$x<=$total_halaman;$x++){
                            ?> 
                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                            <?php
                          }
                          ?>				
                          <li class="page-item">
                            <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                          </li>
                        </ul>
                      </nav>
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