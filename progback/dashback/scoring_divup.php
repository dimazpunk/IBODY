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
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Scoring Division Head</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form method="" action="/" class="form-horizontal">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nilai 92 - 94</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                <option selected></option>
                                <option value="92">92</option>
                                <option value="93">93</option>
                                <option value="94">94</option>                                                       
                            </select>
                            </div>
                        </div>
                        <label class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                            <input type="number" class="form-control" value="100.000" disabled>                         
                            </div>
                        </div>                                         
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label">Nilai 95 - 97</label>
                      <div class="col-sm-3">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option selected></option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                        </select>
                        </div>
                      </div>
                      <label class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                            <input type="number" class="form-control" value="125.000" disabled>                         
                            </div>
                        </div>                    
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label">Nilai 98 - 100</label>
                      <div class="col-sm-3">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option selected></option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                            <option value="100">100</option>
                        </select>
                        </div>
                      </div>
                      <label class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                            <input type="number" class="form-control" value="150.000" disabled>                         
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