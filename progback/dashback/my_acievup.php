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
  <?php include "page/dochead.php";?>
</head>
<body class="">
  <div class="wrapper ">
    <?php include "page/navbar.php";?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card ">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons"></i>
                    </div>
                    <h4 class="card-title">Suggestion System</h4>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-md-12">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="card card-chart">
                  <div class="card-header card-header-rose" data-header-animation="true">
                    <div class="ct-chart" id="websiteViewsChart"></div>
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
                    <h4 class="card-title">Website Views</h4>
                    <p class="card-category">Last Campaign Performance</p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">access_time</i> campaign sent 2 days ago
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
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
                    <h4 class="card-title">Daily Sales</h4>
                    <p class="card-category">
                      <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">access_time</i> updated 4 minutes ago
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
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
                    <h4 class="card-title">Completed Tasks</h4>
                    <p class="card-category">Last Campaign Performance</p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">access_time</i> campaign sent 2 days ago
                    </div>
                  </div>
                </div>
              </div>
            </div>                         
            <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Body Division</h4>
                </div>
                <div class="row">
                  <div class="col-sm-11 text-right">
                      <span class="box pull-right">                    
                        <button type="submit" class="btn btn-info btn-sm">Download All SS</button>
                      </span>
                  </div>
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
                          <th>Seksi</th>
                          <th>Shift</th>
                          <th>Date</th>                         
                          <th class="text-center">Nilai</th>
                          <th class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">1</td>
                          <td>37290</td>
                          <td>PURNOMO</td>
                          <td>Quality</td>
                          <td>Membuat System SS Online</td>
                          <td>Body 1</td>
                          <td>Committe QCCSS & ICARE</td>
                          <td>N</td>
                          <th>03/03/2021</th>  
                          <td class="text-center">90</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                              <i class="material-icons">preview</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">get_app</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target=".fd-example-modal-lg">
                              <i class="material-icons">delete_outline</i>
                            </button>
                            <div style="width:1500px" class="modal fade fd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" style="width:1500px">
                                <div class="modal-content">
                                  <div class="table-responsive">
                                    <table class="table table-bordered">
                                      <tbody>
                                        <div class="col-md-12">
                                          <div class="card ">
                                            <div class="card-header card-header-rose card-header-text text-left">
                                              <div class="card-text">
                                                <h4 class="card-title">Hai Sahabat</h4>
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
                            </div>                            
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">2</td>
                          <td>37290</td>
                          <td>PURNOMO</td>
                          <td>Quality</td>
                          <td>Rekap Data SS</td>
                          <td>Body 1</td>
                          <td>Committe QCCSS & ICARE</td>
                          <td>N</td>
                          <th>10/03/2021</th>                           
                          <td class="text-center">80</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                              <i class="material-icons">preview</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">get_app</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">3</td>
                          <td>37290</td>
                          <td>PURNOMO</td>
                          <td>Quality</td>
                          <td>Membuat Materi Sharing QCC</td>
                          <td>Body 1</td>
                          <td>Committe QCCSS & ICARE</td>
                          <td>N</td>
                          <th>12/03/2021</th>                           
                          <td class="text-center">90</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                              <i class="material-icons">preview</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">get_app</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">4</td>
                          <td>37290</td>
                          <td>PURNOMO</td>
                          <td>Productivity</td>
                          <td>Membuat Materi FMDS</td>
                          <td>Body 1</td>
                          <td>Committe QCCSS & ICARE</td>
                          <td>N</td>
                          <th>20/03/2021</th>                         
                          <td class="text-center">70</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                                <i class="material-icons">preview</i>
                            </button>                        
                            <button type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">get_app</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">5</td>
                          <td>37290</td>
                          <td>PURNOMO</td>
                          <td>Safety</td>
                          <td>Membuat Materi Asakai</td>
                          <td>Body 1</td>
                          <td>Committe QCCSS & ICARE</td>
                          <td>N</td>
                          <th>01/03/2021</th>                          
                          <td class="text-center">75</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                              <i class="material-icons">preview</i>
                            </button>
                            <div style="width:1500px" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" style="width:1500px">
                                <div class="modal-content">
                                  <div class="table-responsive">
                                    <table class="table table-bordered">
                                      <tbody>
                                        <tr>
                                          <td rowspan="3" class="text-center p-2">
                                            <img src="../assets/img/logo_adm.png" style="width:100px ; padding:0px">
                                          </td>
                                          <td rowspan="3" class="text-center font-weight-bold" colspan="8"><h4>SUGGESTION SYSTEM (SS)</h5></td>
                                          <td class="text-left py-0" colspan="2">No Form</td>
                                          <td class="text-left py-0" colspan="2">:081/form-HR/ADM</td>
                                          <td rowspan="3" class="text-center px-4"><h4>2021</h4></td>
                                        </tr>
                                        <tr>
                                          <td class="text-left py-0" colspan="2">Tgl Efektif</td>
                                          <td class="text-left py-0" colspan="2">:1 Mei 2020</td>                                        
                                        </tr>
                                        <tr>
                                          <td class="text-left py-0" colspan="2">Revisi</td>
                                          <td class="text-left py-0" colspan="2">:5</td>                                        
                                        </tr>
                                        <tr>
                                          <td colspan="14" class="text-center p-0">(SS yang di nilai adalah SS yang sudah di implementasikan)</td>
                                        </tr>
                                        <tr>
                                          <td class="text-center text-nowrap py-1" colspan="2">No. Registrasi SS</td>
                                          <td class="text-center py-1" colspan="12">bodyss0321</td>                                         
                                        </tr>
                                        <tr>
                                          <td class="text-center py-1" colspan="2">Kriteria SS</td>
                                          <td colspan="2" class="text-center py-1 bg-info text-white">SAFETY</td>
                                          <td colspan="2" class="text-center py-1">QUALITY</td>
                                          <td colspan="2" class="text-center py-1">COST</td>
                                          <td colspan="2" class="text-center py-1">DELIVERY</td>
                                          <td colspan="2" class="text-center py-1">PRODUCTIVITY</td>
                                          <td colspan="2" class="text-center py-1">ENVIRONMENT</td>                                                                                   
                                        </tr>
                                        <tr>
                                          <td class="text-center py-1" colspan="2">Periode SS</td>
                                          <td class="text-center py-1">Januari</td>
                                          <td class="text-center py-1">Februari</td>
                                          <td class="text-center py-1 bg-info text-white">Maret</td>
                                          <td class="text-center py-1">April</td>
                                          <td class="text-center py-1">Mei</td>
                                          <td class="text-center py-1">Juni</td>
                                          <td class="text-center py-1">Juli</td>
                                          <td class="text-center py-1">Agustus</td>
                                          <td class="text-center py-1">September</td>
                                          <td class="text-center py-1">Oktober</td>
                                          <td class="text-center py-1">November</td>
                                          <td class="text-center py-1">Desember</td>                                                                                                                           
                                        </tr>
                                        <tr>
                                          <td colspan="14"></td>
                                        </tr>
                                        <tr>
                                          <td class="text-center text-nowrap py-1">Data Pembuat SS</td>
                                        </tr>
                                        <tr>
                                          <td class="text-center py-1">Nama</td>
                                          <td class="text-center py-1"colspan="6">PURNOMO</td>
                                          <td class="text-center py-1"colspan="2">Dept</td>
                                          <td class="text-center py-1"colspan="6">BODY 1</td>                                                                               
                                        </tr>
                                        <tr>
                                          <td class="text-center py-1">NPK</td>
                                          <td class="text-center py-1"colspan="3">37290</td>
                                          <td class="text-center py-1"colspan="2">Shift</td>
                                          <td class="text-center py-1">N</td>
                                          <td class="text-center py-1"colspan="2">Seksi</td>
                                          <td class="text-center py-1"colspan="6">Committe QCCSS & ICARE</td>                                                                                                                                                               
                                        </tr>
                                        <tr>
                                          <td colspan="14"></td>
                                        </tr>
                                        <tr>
                                          <td class="text-center text-nowrap py-1">Data Improvement</td>
                                        </tr>
                                        <tr>
                                          <td class="text-center py-1" colspan="2">Judul SS</td>
                                          <td class="text-center text-nowrap py-1"colspan="12">Program SS Online</td>                                                                             
                                        </tr>
                                        <tr>
                                          <td class="text-center py-1"colspan="4">Tanggal Pembuatan Improvement</td>
                                          <td class="text-center py-1"colspan="3">10 Maret 2021</td>
                                          <td class="text-center py-1"colspan="4">Tanggal Implementasi</td>
                                          <td class="text-center py-1"colspan="3">15 Maret 2021</td>                                                                                                                                                            
                                        </tr>
                                        <tr>
                                          <td colspan="14"></td>
                                        </tr>
                                        <tr>
                                          <td class="text-center p-0"colspan="8">Kondisi Saat Ini</td>
                                          <td class="text-center p-0"colspan="8">Proses Perbaikan</td>
                                        </tr>
                                        <tr>
                                          <td class="text-center p-0"colspan="8" style="height:200px">Gambar 1</td>
                                          <td class="text-center p-0"colspan="8">Gambar 2</td>
                                        </tr>
                                        <tr>
                                          <td colspan="14"></td>
                                        </tr>
                                        <tr>
                                          <td class="text-center p-0"colspan="8">Hasil Perbaikan</td>
                                          <td class="text-center p-0"colspan="8">Reward</td>
                                        </tr>
                                        <tr>
                                          <td class="text-center p-0"colspan="8">Gambar 1</td>
                                          <td class="text-center p-0"colspan="8" style="font-size:10px ;line-height:10px">
                                            <table>
                                              <tr>
                                                <td>No</td>
                                                <td>Penilai</td>
                                                <td>Range Nilai</td>
                                                <td>Nominal (Rupiah)</td>
                                                <td>Nilai & Nominal</td>
                                                <td>Tanggal Check</td>   
                                                <td>Nama & Tanda tangan</td>                                                                                                                                                                                           
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">1</td>
                                                <td class="text-center py-1">BOD</td>
                                                <td class="text-center py-1">>100</td> 
                                                <td class="text-center py-1" colspan="4">SPESIAL REWARD</td>                                                                                                                                                                                                                                          
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">2</td>
                                                <td class="text-center py-1" rowspan="3">Div.Head</td>
                                                <td class="text-center text-nowrap py-1">98-100</td>
                                                <td class="text-center py-1">150.000</td>
                                                <td class="text-center py-1" rowspan="3"></td>
                                                <td class="text-center py-1" rowspan="3"></td>
                                                <td class="text-center py-1" rowspan="3"></td>
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">3</td>
                                                <td class="text-center text-nowrap py-1">95-97</td>
                                                <td class="text-center py-1">125.000</td>                                                                                                                                                                                                                                          
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">4</td>
                                                <td class="text-center text-nowrap py-1">92-93</td>
                                                <td class="text-center py-1">100.000</td>                                                                                                                                                                                                                                          
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">5</td>
                                                <td class="text-center py-1" rowspan="3">Dept.Head</td>
                                                <td class="text-center text-nowrap py-1">89-91</td>
                                                <td class="text-center py-1">80.000</td>
                                                <td class="text-center py-1" rowspan="3"></td>
                                                <td class="text-center py-1" rowspan="3"></td>
                                                <td class="text-center py-1" rowspan="3"></td>                                                                                                                                                                                                                                                                                        
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">6</td>
                                                <td class="text-center text-nowrap py-1">86-88</td>
                                                <td class="text-center py-1">60.000</td>                                                                                                                                                                                                                                          
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">7</td>
                                                <td class="text-center text-nowrap py-1">80-85</td>
                                                <td class="text-center py-1">40.000</td>                                                                                                                                                                                                                                          
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">8</td>
                                                <td class="text-center py-1" rowspan="4">Sect.Head</td>
                                                <td class="text-center text-nowrap py-1">74-79</td>
                                                <td class="text-center py-1">25.000</td>
                                                <td class="text-center py-1" rowspan="4"></td>
                                                <td class="text-center py-1" rowspan="4"></td>
                                                <td class="text-center py-1" rowspan="4"></td>                                                                                                                                                                                                                                                                                        
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">9</td>
                                                <td class="text-center text-nowrap py-1">69-73</td>
                                                <td class="text-center py-1">20.000</td>                                                                                                                                                                                                                                          
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">10</td>
                                                <td class="text-center text-nowrap py-1">64-68</td>
                                                <td class="text-center py-1">15.000</td>                                                                                                                                                                                                                                          
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">11</td>
                                                <td class="text-center text-nowrap py-1">59-63</td>
                                                <td class="text-center py-1">10.000</td>                                                                                                                                                                                                                                          
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">12</td>
                                                <td class="text-center py-1" rowspan="5">Foreman</td>
                                                <td class="text-center text-nowrap py-1">49-58</td>
                                                <td class="text-center py-1">8.000</td>
                                                <td class="text-center py-1" rowspan="5"></td>
                                                <td class="text-center py-1" rowspan="5"></td>
                                                <td class="text-center py-1" rowspan="5"></td>                                                                                                                                                                                                                                                                                        
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">13</td>
                                                <td class="text-center text-nowrap py-1">37-48</td>
                                                <td class="text-center py-1">6.000</td>                                                                                                                                                                                                                                          
                                              </tr>  
                                              <tr>
                                                <td class="text-center py-1">14</td>
                                                <td class="text-center text-nowrap py-1">25-36</td>
                                                <td class="text-center py-1">4.000</td>                                                                                                                                                                                                                                          
                                              </tr> 
                                              <tr>
                                                <td class="text-center py-1">15</td>
                                                <td class="text-center text-nowrap py-1">13-24</td>
                                                <td class="text-center py-1">3.000</td>                                                                                                                                                                                                                                                                                         
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">16</td>
                                                <td class="text-center text-nowrap py-1">1-23</td>
                                                <td class="text-center py-1">2.500</td>                                                                                                                                                                                                                                                                                         
                                              </tr>
                                              <tr>
                                                <td class="text-left p-0"colspan="7" style="font-size:10px ;height:50px">
                                                  Komentar Pemberi Nilai
                                                </td>
                                              </tr>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                                            </table>
                                          </td>
                                        </tr> 
                                        <tr>
                                          <td colspan="14"></td>
                                        </tr>
                                        <tr>
                                          <td class="text-center bg-info text-white py-1"colspan="14">Keterangan</td>
                                        </tr>
                                        <tr>
                                          <td class="text-left py-1"colspan="8" rowspan="2"style="font-size:9px;line-height:12px">
                                            <ol class="p-2">
                                              <li>Penilaian dapat ditentukan ke level jabatan selanjutnya jika tiap level jabatan memberikan nilai tertingginya
                                              (Sec.Head =63 ;Dept.Head =88 ;Div.Head =100). Reward yang didapat adalah reward tertinggi yang dicapai.
                                              </li>
                                              <li>SS terbaik adalah SS yang mempunyai nilai tertinggi dan di nilai oleh Division Head (Minimal nilai =95)
                                              SS terbaik dapat mengikuti konvensi SS di masing - masing area pada periode berjalan.
                                              </li>
                                              <li>Spesial Reward dapat diajukan oleh Division Head (Nilai =100) ke BOD melalui Komite QCC/SS.
                                              Proses seleksi dilakukan sesuai dengan SK President Award
                                              </li>
                                            </ol>
                                          </td>
                                          <td class="text-left px-5"colspan="8"style="font-size:8px;line-height:10px">
                                          Penentuan Range Penilaian SS
                                            <table class="px:5">
                                              <tr>
                                                <td class="text-center py-1">KRITERIA</td>
                                                <td class="text-center py-1">BS</td>
                                                <td class="text-center py-1">B</td>
                                                <td class="text-center py-1">R</td>
                                                <td class="text-center py-1">K</td>                                               
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">IDE</td>
                                                <td class="text-center py-1">12-15</td>
                                                <td class="text-center py-1">8-11</td>
                                                <td class="text-center py-1">4-7</td>
                                                <td class="text-center py-1">1-3</td>                                               
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">USAHA</td>
                                                <td class="text-center py-1">27-35</td>
                                                <td class="text-center py-1">18-26</td>
                                                <td class="text-center py-1">9-17</td>
                                                <td class="text-center py-1">1-8</td>                                               
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">HASIL</td>
                                                <td class="text-center py-1">31-40</td>
                                                <td class="text-center py-1">21-30</td>
                                                <td class="text-center py-1">11-20</td>
                                                <td class="text-center py-1">1-10</td>                                               
                                              </tr>
                                              <tr>
                                                <td class="text-center py-1">PAPER WORK</td>
                                                <td class="text-center py-1">8-10</td>
                                                <td class="text-center py-1">5-7</td>
                                                <td class="text-center py-1">3-4</td>
                                                <td class="text-center py-1">1-2</td>                                               
                                              </tr>     
                                              <tr>
                                                <td class="text-left py-1" colspan="5">BS:Baik Sekali B:Baik R:Rata-Rata K:Kurang</td>
                                              </tr>                                                                                                                                                                                                                              
                                            </table>                                          
                                          </td>
                                        </tr>
                                        <tr>
                                          <td colspan="7" class="text-left py-1" style="font-size:8px;line-height:8px">Detail lebih lanjut dapat melihat kriteria SS PT Astra Daihatsu Motor</td>
                                        </tr>                                                                                                                                                               
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <button type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">get_app</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                       <tr>
                          <td class="text-center">6</td>
                          <td>37290</td>
                          <td>PURNOMO</td>
                          <td>Quality</td>
                          <td>Membuat System SS Online</td>
                          <td>Body 1</td>
                          <td>Committe QCCSS & ICARE</td>
                          <td>N</td>
                          <th>20/03/2021</th>                           
                          <td class="text-center">70</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                              <i class="material-icons">preview</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">get_app</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">7</td>
                          <td>37290</td>
                          <td>PURNOMO</td>
                          <td>Quality</td>
                          <td>Membuat System SS Online</td>
                          <td>Body 1</td>
                          <td>Committe QCCSS & ICARE</td>
                          <td>N</td>
                          <th>25/03/2021</th>                          
                          <td class="text-center">65</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                              <i class="material-icons">preview</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">get_app</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">8</td>
                          <td>37290</td>
                          <td>PURNOMO</td>
                          <td>Quality</td>
                          <td>Membuat System SS Online</td>
                          <td>Body 1</td>
                          <td>Committe QCCSS & ICARE</td>
                          <td>N</td>
                          <th>05/03/2021</th>                         
                          <td class="text-center">64</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                              <i class="material-icons">preview</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">get_app</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">9</td>
                          <td>37290</td>
                          <td>PURNOMO</td>
                          <td>Quality</td>
                          <td>Membuat System SS Online</td>
                          <td>Body 1</td>
                          <td>Committe QCCSS & ICARE</td>
                          <td>N</td>
                          <th>06/03/2021</th>                         
                          <td class="text-center">50</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                              <i class="material-icons">preview</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">get_app</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">10</td>
                          <td>37290</td>
                          <td>PURNOMO</td>
                          <td>Quality</td>
                          <td>Membuat System SS Online</td>
                          <td>Body 1</td>
                          <td>Committe QCCSS & ICARE</td>
                          <td>N</td>
                          <th>07/03/2021</th>                         
                          <td class="text-center">48</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                              <i class="material-icons">preview</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">get_app</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>                  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> 
            <!-- <button type="b
            <!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
7 days
</button> -->
          </div>
        </div>
      </div>

<?php include "page/footer.php";?>
</body>

</html>