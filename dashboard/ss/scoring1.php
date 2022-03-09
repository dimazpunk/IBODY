<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $grp = $_SESSION ['group'];
    $jbt = $_SESSION ['jabatan'];      
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Body Division</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>                       
                        <tr>
                          <th class="text-center">No</th>
                          <th>Npk</th>
                          <th>Nama</th>
                          <th>Kategori</th>
                          <th>Judul</th>
                          <th>Dept</th>
                          <th>Group</th>
                          <th>Shift</th>                                                 
                          <th class="text-center">Date</th>
                          <th>Nilai</th>                           
                          <th class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $no = 1;
                            $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                            shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress
                            FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                            LEFT JOIN dept ON karyawan.dept = dept.id_dept
                            LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                            LEFT JOIN shift ON karyawan.shift = shift.id_shift
                            LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE nilai >=58 ")or die (mysqli_error($con)); 
                          while ($sc = mysqli_fetch_assoc ($score)){
                        ?>                                        
                        <tr>
                          <td class="text-center"><?=$no++;?></td>
                          <td><?=$sc['npk']?></td>                
                          <td><?=$sc['nama']?></td>
                          <td><?=$sc['id_kategori']?></td>
                          <td><?=$sc['judul']?></td>                          
                          <td><?=$sc['nama_dept']?></td>                          
                          <td><?=$sc['nama_group']?></td>  
                          <td><?=$sc['id_shift']?></td>                                               
                          <td class="text-center"><?=$sc['periode']?></td>
                          <td><?=$sc['nilai']?></td>                          
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                              <i class="material-icons">preview</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success">
                              <a href="scoring_spv.php?id=<?=$sc['id']?>" class="material-icons"> edit</a>                              
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">note_add</i>
                            </button>                              
                          </td>
                        </tr>
                      <?php  
                      }                          
                      ?>                         
                      </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="javascript:;">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:;">Next</a></li>
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