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
                                  <h4 class="card-title text-left">Body Division</h4>
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
                          <th>Dept</th>
                          <th>Npk</th>
                          <th>Frm</th>
                          <th>Npk</th>
                          <th>Spv</th>
                          <th>Npk</th>
                          <th>Mng</th>
                          <th>Npk</th>                                                   
                          <th>Div Head</th>
                          <th class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">1</td>
                          <td>37290</td>
                          <td>PURNOMO</td>
                          <td>Body 1</td>
                          <td>19679</td>
                          <td>Darto</td>
                          <td>5000</td>
                          <td>Deva Andriansyah</td>
                          <td>36000</td>
                          <td>Gigih</td>
                          <td>24000</td>
                          <td>Fauzan Diaz</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target=".dd-example-modal-lg">
                              <i class="material-icons">edit</i>
                            </button>
                            <div style="width:1500px" class="modal fade dd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                            <h4 class="card-title text-left">Body Division</h4>
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
                            <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target=".cd-example-modal-lg">
                              <i class="material-icons">delete_outline</i>
                            </button>
                            <div style="width:1500px" class="modal fade cd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                              <h4 class="card-title text-left">Hai Sahabat Admin</h4>
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
                          <td>27837</td>
                          <td>Wahyudi</td>
                          <td>Body 1</td>
                          <td>19646</td>
                          <td>Darto</td>
                          <td>5000</td>
                          <td>Deva Andriansyah</td>
                          <td>36000</td>
                          <td>Gigih</td>
                          <td>24000</td>
                          <td>Fauzan Diaz</td>
                          <td class="td-actions text-right">
                          <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target=".dd-example-modal-lg">
                              <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target=".cd-example-modal-lg">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">3</td>
                          <td>35527</td>
                          <td>Mukhit Tobroni</td>
                          <td>Body 2</td>                           
                          <td>19646</td>
                          <td>Darto</td>
                          <td>5000</td>
                          <td>Deva Andriansyah</td>
                          <td>36000</td>
                          <td>Gigih</td>
                          <td>24000</td>
                          <td>Fauzan Diaz</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target=".dd-example-modal-lg">
                              <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target=".cd-example-modal-lg">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">4</td>
                          <td>19646</td>
                          <td>Darto</td>
                          <td>Body 1</td>                           
                          <td>19646</td>
                          <td>Darto</td>
                          <td>5000</td>
                          <td>Deva Andriansyah</td>
                          <td>36000</td>
                          <td>Gigih</td>
                          <td>24000</td>
                          <td>Fauzan Diaz</td>
                          <td class="td-actions text-right">                      
                            <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target=".dd-example-modal-lg">
                              <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target=".cd-example-modal-lg">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">5</td>
                          <td>28967</td>
                          <td>Anugrah</td>
                          <td>Body 1</td>                           
                          <td>19646</td>
                          <td>Darto</td>
                          <td>5000</td>
                          <td>Deva Andriansyah</td>
                          <td>36000</td>
                          <td>Gigih</td>
                          <td>24000</td>
                          <td>Fauzan Diaz</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target=".dd-example-modal-lg">
                              <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target=".cd-example-modal-lg">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                       <tr>
                          <td class="text-center">6</td>
                          <td>34011</td>
                          <td>Muhammad Harsanto</td>
                          <td>Body 1</td>                           
                          <td>19646</td>
                          <td>Darto</td>
                          <td>5000</td>
                          <td>Deva Andriansyah</td>
                          <td>36000</td>
                          <td>Gigih</td>
                          <td>24000</td>
                          <td>Fauzan Diaz</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target=".dd-example-modal-lg">
                              <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target=".cd-example-modal-lg">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">7</td>
                          <td>37290</td>
                          <td>Mamo</td>
                          <td>Body 1</td>                           
                          <td>19646</td>
                          <td>Darto</td>
                          <td>5000</td>
                          <td>Deva Andriansyah</td>
                          <td>36000</td>
                          <td>Gigih</td>
                          <td>24000</td>
                          <td>Fauzan Diaz</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target=".dd-example-modal-lg">
                              <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target=".cd-example-modal-lg">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">8</td>
                          <td>37290</td>
                          <td>Mamo</td>
                          <td>Body 1</td>                           
                          <td>19646</td>
                          <td>Darto</td>
                          <td>5000</td>
                          <td>Deva Andriansyah</td>
                          <td>36000</td>
                          <td>Gigih</td>
                          <td>24000</td>
                          <td>Fauzan Diaz</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target=".dd-example-modal-lg">
                              <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target=".cd-example-modal-lg">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">9</td>
                          <td>37290</td>
                          <td>Mamo</td>
                          <td>Body 1</td>                           
                          <td>19646</td>
                          <td>Darto</td>
                          <td>5000</td>
                          <td>Deva Andriansyah</td>
                          <td>36000</td>
                          <td>Gigih</td>
                          <td>24000</td>
                          <td>Fauzan Diaz</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target=".dd-example-modal-lg">
                              <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target=".cd-example-modal-lg">
                              <i class="material-icons">delete_outline</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">10</td>
                          <td>37290</td>
                          <td>Mamo</td>
                          <td>Body 1</td>                          
                          <td>19646</td>
                          <td>Darto</td>
                          <td>5000</td>
                          <td>Deva Andriansyah</td>
                          <td>36000</td>
                          <td>Gigih</td>
                          <td>24000</td>
                          <td>Fauzan Diaz</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target=".dd-example-modal-lg">
                              <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target=".cd-example-modal-lg">
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
            <!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
7 days
</button> -->
          </div>
        </div>
      </div>

<?php include "page/footer.php";?>
</body>

</html>