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
              <div class="col-md-6">
                <div class="card card-profile">
                  <div class="card-avatar">
                    <a href="#pablo">
                      <img class="img" src="../assets/img/faces/my.jpg" />
                    </a>
                  </div>
                  <div class="card-body">
                    <h4 class="card-category text-gray">Mamo</h4>
                    <h4 class="card-title">Committe QCCSS Body Division</h4>
                    <p class="card-description">
                      "Dengan berbagi aku menjadi lebih bahagia - Ali Bin Abi Tholib"
                    </p>
                    <span class="btn btn btn-rose btn-file">
                              <span class="fileinput-new">Photo Profil</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" name="..." />
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">My Profile</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                    <form method="" action="/" class="form-horizontal">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Npk</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                            <input type="text" class="form-control" value="37290" disabled>
                            <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" value="mamo" disabled> 
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" value="Team Leader" disabled>
                          </div>
                        </div>                   
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Departement</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" value="Body 1" disabled>
                          </div>
                        </div>                   
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Seksi</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" value="Committe QCCSS & ICARE" disabled>
                          </div>
                        </div>                   
                      </div>
                      <div class="row">
                      <label class="col-sm-2 col-form-label">Shift</label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input type="text" class="form-control" value="Non Shift" disabled>
                          </div>
                        </div>                   
                      </div>                                                                                            
                    </form>
                  </div>
                </div>
              </div>
            </div> <!-- menutup row-->

            <!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
7 days
</button> -->
          </div>
        </div>
      </div>

<?php include "page/footer.php";?>
</body>

</html>