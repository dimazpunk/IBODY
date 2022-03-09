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
                  <div class="col-sm-12 text-right">
                      <span class="box pull-right">                    
                        <button type="submit" class="btn btn-info btn-sm">Save to Excel</button>
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
                  <h4 class="card-title">Departement Body 1</h4>
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
                          <th>Implementasi</th>                         
                          <th class="text-center">Nilai</th>
                          <th class="text-center">Reward</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">1</td>
                          <td>37290</td>
                          <td>PURNOMO</td>
                          <td>Quality</td>
                          <td>Membuat System SS Online</td>
                          <th>03/03/2021</th>  
                          <td class="text-center">90</td>
                          <td class="td-center">Rp 80.000</td>
                        </tr>
                        <tr>
                          <td class="text-center">2</td>
                          <td>27837</td>
                          <td>Wahyudi</td>
                          <td>Safety</td>
                          <td>Rekap Data SS</td>
                          <th>10/03/2021</th>                            
                          <td class="text-center">80</td>
                          <td class="td-center">Rp 40.000</td>
                        </tr>
                        <tr>
                          <td class="text-center">3</td>
                          <td>35527</td>
                          <td>Mukhit Tobroni</td>
                          <td>Quality</td>
                          <td>Membuat Materi Sharing QCC</td>
                          <th>12/03/2021</th>                               
                          <td class="text-center">90</td>
                          <td class="td-center">Rp 80.000</td>
                        </tr>
                        <tr>
                          <td class="text-center">4</td>
                          <td>19646</td>
                          <td>Darto</td>
                          <td>Productivity</td>
                          <td>Membuat Materi FMDS</td>
                          <th>20/03/2021</th>                           
                          <td class="text-center">70</td>
                          <td class="td-center">Rp 20.000</td>
                        </tr>
                        <tr>
                          <td class="text-center">5</td>
                          <td>28967</td>
                          <td>Anugrah</td>
                          <td>Safety</td>
                          <td>Membuat Materi Asakai</td>
                          <th>01/03/2021</th>                           
                          <td class="text-center">75</td>
                          <td class="td-center">Rp 80.000</td>
                        </tr>
                       <tr>
                          <td class="text-center">6</td>
                          <td>34011</td>
                          <td>Muhammad Harsanto</td>
                          <td>Quality</td>
                          <td>Membuat System SS Online</td>
                          <th>20/03/2021</th>                           
                          <td class="text-center">70</td>
                          <td class="td-center">Rp 20.000</td>
                        </tr>
                        <tr>
                          <td class="text-center">7</td>
                          <td>37290</td>
                          <td>Mamo</td>
                          <td>Quality</td>
                          <td>Membuat System SS Online</td>
                          <th>25/03/2021</th>                          
                          <td class="text-center">65</td>
                          <td class="td-center">Rp 15.000</td>
                        </tr>
                        <tr>
                          <td class="text-center">8</td>
                          <td>37290</td>
                          <td>Mamo</td>
                          <td>Quality</td>
                          <td>Membuat System SS Online</td>
                          <th>05/03/2021</th>                          
                          <td class="text-center">64</td>
                          <td class="td-center">Rp 15.000</td>
                        </tr>
                        <tr>
                          <td class="text-center">9</td>
                          <td>37290</td>
                          <td>Mamo</td>
                          <td>Quality</td>
                          <td>Membuat System SS Online</td>
                          <th>07/03/2021</th>                           
                          <td class="text-center">50</td>
                          <td class="td-center">Rp 8.000</td>
                        </tr>
                        <tr>
                          <td class="text-center">10</td>
                          <td>37290</td>
                          <td>Mamo</td>
                          <td>Quality</td>
                          <td>Membuat System SS Online</td>
                          <th>07/03/2021</th>                          
                          <td class="text-center">48</td>
                          <td class="td-center">Rp 6.000</td>
                          </td>
                        </tr>                  
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

<?php include "page/footer.php";?>
</body>

</html>