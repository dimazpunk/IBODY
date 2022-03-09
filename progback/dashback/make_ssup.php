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
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Form Buat SS</h4>
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
                      <label class="col-sm-2 col-form-label">Nama</label>
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
                    <label class="col-sm-2 col-form-label">Seksi</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option selected></option>
                            <option value="CQI">Committe QCC & ICARE</option>
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
                      <label class="col-sm-2 col-form-label">Judul SS</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="masukan judul SS">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Tanggal Improvement</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="Date" class="form-control">
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Tanggal Implementasi</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="Date" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option selected></option>
                            <option value="S">Safety</option>
                            <option value="Q">Quality</option>
                            <option value="C">Cost</option>
                            <option value="D">Delivery</option>
                            <option value="M">Moral</option>
                            <option value="P">Productivity</option>                            
                        </select>
                        </div>
                      </div>                   
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label">Periode</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option selected></option>
                            <option value="JN">Januari</option>
                            <option value="FE">Februari</option>
                            <option value="MA">Maret</option>
                            <option value="AP">April</option>
                            <option value="ME">Mei</option>
                            <option value="JN">Juni</option>
                            <option value="Jl">Juli</option>
                            <option value="AG">Agustus</option>
                            <option value="SE">September</option>
                            <option value="OK">Oktober</option>
                            <option value="NV">November</option>
                            <option value="DE">Desember</option>                                                        
                        </select>
                        </div>
                      </div>                   
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <hr/ style="border-color:#cb0e40">
                      </div>
                    </div>                   
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Kondisi Saat Ini</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Deskripsikan sebelum perbaikan">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Upload Foto</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Foto Kondisi saat ini [png;jpg;jpeg;tif]</label>                        
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Review Photo</label>
                      <div class="col-sm-10">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../assets/img/image_placeholder.jpg" alt="...">
                          </div>
                        </div>
                      </div>
                    </div>                       
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Proses Perbaikan</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Deskripsikan proses perbaikan">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Upload Foto</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Foto Setelah Perbaikan [png;jpg;jpeg;tif]</label>                        
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Review Photo</label>
                      <div class="col-sm-10">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../assets/img/image_placeholder.jpg" alt="...">
                          </div>
                        </div>
                      </div>
                    </div>                                      
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Hasil Perbaikan</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Deskripsikan keadaan setelah perbaikan, manfaat(SQCDMP)">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">SS Level Up</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <label for="exampleFormControlFile1">Upload File A3 Report [png;jpg;jpeg;tif]</label>                        
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Review A3 Report</label>
                      <div class="col-sm-10">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../assets/img/image_placeholder.jpg" alt="...">
                          </div>
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
                      <button type="submit" class="btn btn-success">Submit</button>
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
<?php include "page/footer.php";?>
</body>

</html>