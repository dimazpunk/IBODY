<?php
  require_once "../../config/config.php";
  $page = "Achievement BQC";
    // menghitung jumlah sudah dinilai
    $today = date ("Y-m-d");
    $tanggal_awal = date ('Y-m-01', strtotime($today));
    $tanggal_akhir = date ('Y-m-05', strtotime ('next month 23:59'));
    $jumlah = mysqli_query ($con,"SELECT buat_ss.npk AS npk_b, karyawan.npk AS npk, dept.nama_dept, nilai, periode
                                  FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk 
                                  LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                  WHERE karyawan.dept = 'B3' AND nilai >0  AND periode
                                  BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'")or die (mysqli_error($con)); 
    $jm2 = mysqli_num_rows ($jumlah);
  // menghitung jumlah submit ss
    $jumlah2 = mysqli_query ($con,"SELECT buat_ss.npk AS npk_b, karyawan.npk AS npk, dept.nama_dept, nilai, periode 
                                  FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk 
                                  LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                  WHERE karyawan.dept = 'B3' AND periode
                                  BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'")or die (mysqli_error($con)); 
    $jm1 = mysqli_num_rows ($jumlah2);
// menghitung total karyawan
    $jumlah3 = mysqli_query ($con,"SELECT karyawan.npk, dept.nama_dept FROM karyawan 
                                  LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                  WHERE karyawan.dept = 'B3' AND karyawan.jabatan <> 'SPV' AND karyawan.jabatan <> 'MNG' AND karyawan.jabatan <> 'DIV'") or die (mysqli_error($con));
    $jm3 = mysqli_num_rows ($jumlah3);
// Menghitung mp aktif membuat ss
    $jumlah4 = mysqli_query ($con, "SELECT npk, periode FROM buat_ss WHERE periode BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' GROUP BY npk") or die (mysqli_error($con));
    $jm4 = mysqli_num_rows ($jumlah4);
// Menghitung persentasi
    $average = number_format ($jm2/$jm3*100,2);
// Menghitung total nominal SS 
    $reward = mysqli_query ($con, "SELECT SUM(Nominal) AS total, buat_ss.npk AS npk_b, dept, karyawan.npk AS npk FROM buat_ss
                            LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                            LEFT JOIN dept ON karyawan.dept = dept.id_dept
                            WHERE karyawan.dept = 'B3' AND periode BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'") or die (mysqli_error($con));
    $rw = mysqli_fetch_assoc ($reward); 
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
            <!-- <div class="row">
              <div class="col-md-12">
                <div class="card ">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons"></i>
                    </div>
                    <h4 class="card-title">Departement BQC</h4>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-md-12">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- <div class="row">
              <div class="col-md-6">
                <div class="card card-chart">
                  <div class="card-header card-header-success" data-header-animation="true">
                    <div class="ct-chart" id="dailySalesChart"></div>
                  </div>
                  <div class="card-body">
                    <div class="card-actions">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Fix Header!
                      </button>
                      <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                        <i class="material-icons">refresh</i>
                      </button>
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                        <i class="material-icons">edit</i>
                      </button>
                    </div>
                    <h4 class="card-title">Achievement SS Per Month</h4>
                    <p class="card-category">
                      <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today.</p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">access_time</i> updated 1 minutes ago
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-chart">
                  <div class="card-header card-header-info" data-header-animation="true">
                    <div class="ct-chart" id="completedTasksChart"></div>
                  </div>
                  <div class="card-body">
                    <div class="card-actions">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Fix Header!
                      </button>
                      <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                        <i class="material-icons">refresh</i>
                      </button>
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                        <i class="material-icons">edit</i>
                      </button>
                    </div>
                    <h4 class="card-title">Achievement Average SS Per Month</h4>
                    <p class="card-category">Last Achievement Performance</p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">access_time</i> updated 1 minutes ago
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">weekend</i>
                    </div>
                    <p class="card-category">SS Submit</p>
                    <h2 class="card-title"><?=$jm1 ?></h2>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons text-danger">warning</i>
                      <a href="#pablo">Updated 1 minutes ago</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">bookmark</i>
                    </div>
                    <p class="card-category">SS Sudah dinilai</p>
                    <h2 class="card-title"><?=$jm2 ?></h2>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">local_offer</i> Updated 1 minutes ago
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">SS This Month</p>
                    <h2 class="card-title"><?=$average."%"?></h2>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> Updated 1 minutes ago
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">paid</i>
                    </div>
                    <p class="card-category">Total Rewards</p>
                    <h2 class="card-title"><?=$rw['total']?></h2>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> Updated 1 minutes ago
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card ">
                  <!-- <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons"></i>
                    </div>
                    <h4 class="card-title">SS Update</h4>
                  </div> -->
                    <div class="btn-group">
                      <div class ="col-md-6 pull-right">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Option
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Shift A</a>
                          <a class="dropdown-item" href="#">Shift B</a>
                          <a class="dropdown-item" href="#">Non Shift</a>
                        </div>
                      </div>
                    </div>
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="table-responsive table-sales">
                          <table class="table">
                            <tbody>
                              <?php
                              // menghitung total karyawan per area
                              $areaj = mysqli_query ($con,"SELECT  group_tb.nama_group AS grs, group_tb.id_group AS grp FROM group_tb
                              LEFT JOIN karyawan ON group_tb.id_group = karyawan.group WHERE karyawan.dept='B3' GROUP BY grp") or die (mysqli_error($con));

                              // $areaj = mysqli_query ($con,"SELECT karyawan.npk, dept.nama_dept, group_tb.nama_group AS grp FROM karyawan
                              //                         LEFT JOIN dept ON karyawan.dept = dept.id_dept
                              //                         LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                              //                         WHERE karyawan.group ='$grp' AND karyawan.jabatan <> 'SPV' AND karyawan.jabatan <> 'MNG' AND karyawan.jabatan <> 'DIV'") or die (mysqli_error($con));
                             // menghitung total karyawan per area
                             while ($aj = mysqli_fetch_assoc ($areaj)){ 

                             $areah = mysqli_query ($con,"SELECT shift FROM karyawan WHERE dept='B3' AND `group`= '$aj[grp]' GROUP BY shift ") or die (mysqli_error($con));       
                             while ($sf = mysqli_fetch_assoc ($areah)){                   

                              // Menghitung jumlah ss submit
                              $area = mysqli_query ($con,"SELECT buat_ss.npk AS npk_b, karyawan.npk AS npk, buat_ss.nilai AS nilai, buat_ss.periode AS periode
                                                       FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk 
                                                      WHERE karyawan.group= '$aj[grp]' AND karyawan.dept='B1' AND karyawan.shift= '$sf[shift]' AND buat_ss.nilai  > 0  AND  buat_ss.periode
                                                      BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")or die (mysqli_error($con)); 
                                                      $ar = mysqli_num_rows($area);

                              // menghitung total karyawan per group
                               $totalgrp = mysqli_query ($con,"SELECT karyawan.npk FROM karyawan 
                               WHERE karyawan.dept='B3' AND karyawan.group = '$aj[grp]' AND karyawan.shift= '$sf[shift]' AND karyawan.jabatan <> 'SPV' AND karyawan.jabatan <> 'MNG' AND karyawan.jabatan <> 'DIV'") or die (mysqli_error($con));
                               $tgp = mysqli_num_rows ($totalgrp);

                                $rata = number_format ($ar/$tgp*100,2);
                              ?>
                              <tr>
                                <td><?=$aj['grs']?></td>
                                <td><?=$sf['shift']?></td>
                                <td><?=$tgp ?></td>
                                <td class="text-right">
                                <?=$ar ?>
                                </td>
                                <td class="text-right">
                                <?=$rata."%"?>
                                </td>
                              </tr>
                              <?php
                              }
                              }
                              ?>                                                                                    
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-6 ml-auto mr-auto">
                        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active" data-interval="10000">
                              <img src="../../assets/img/terios.png" alt="..." class="d-block w-100">
                            <!-- <div id="worldMap" style="height: 300px;"></div> -->
                            </div>
                            <div class="carousel-item" data-interval="2000">
                              <img src="../../assets/img/max.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-interval="2000">
                              <img src="../../assets/img/xenia.png" class="d-block w-100" alt="...">
                            </div> 
                          </div>
                        </div>
                      </div>
                      <!-- <div class="col-md-6 ml-auto mr-auto">
                        <div id="worldMap" style="height: 300px;"></div>
                      </div>  -->
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