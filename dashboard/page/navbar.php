<?php
 $role = $_SESSION ['level'];
 $jbt = $_SESSION ['jabatan'];

?>
<div class="sidebar" data-color="rose" data-background-color="black" data-image="../../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <h5>B</h5>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
           <h5>IBS </h5>
        </a></div>
      <div class="sidebar-wrapper">
        <div class="user">
        <?php
            $profil = mysqli_query ($con,"SELECT karyawan.npk, karyawan.nama, dept.nama_dept AS dp, group_tb.nama_group AS grp, shift.id_shift, jabatan.nama_jabatan AS jabatan
            FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
            LEFT JOIN dept ON karyawan.dept = dept.id_dept
            LEFT JOIN jabatan ON karyawan.jabatan = jabatan.id_jabatan
            LEFT JOIN shift ON karyawan.shift = shift.id_shift WHERE npk = $_SESSION[npk]")or die (mysqli_error($con)); 
            $pr = mysqli_fetch_assoc ($profil);
        ?>
          <div class="photo">
            <img src="../../assets/img/faces/<?echo $pr['npk'];?>.jpg" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                <?=$pr['nama'];?>
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="../profile/my_profile.php">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> My Profile </span>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="../profile/edit.php">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> Edit Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../profile/edit_structure.php">
                    <span class="sidebar-mini"> ES </span>
                    <span class="sidebar-normal"> Edit Structure </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../profile/edit_password.php">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> Edit Password </span>
                  </a>
                </li>                 -->
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="../my_achiev/my_aciev.php">
              <i class="material-icons">assessment</i>
              <p> My Achievement </p>
            </a>
          </li> -->
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#componentsExamples1">
              <i class="material-icons">timeline</i>
              <p> My Achievement
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="componentsExamples1">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="../my_achiev/my_aciev.php">
                    <span class="sidebar-mini"> MA </span>
                    <span class="sidebar-normal"> My Achiev
                    </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../my_achiev/control.php">
                    <span class="sidebar-mini"> CT</span>
                    <span class="sidebar-normal"> Control Team </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../my_achiev/control_area.php">
                    <span class="sidebar-mini"> CT</span>
                    <span class="sidebar-normal"> Control Area </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
              <i class="material-icons">book_online</i>
              <p> Suggestion System
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pagesExamples">
              <ul class="nav">
                <?php  
                  if ($role !== "superior"){?>                          
                <li class="nav-item ">
                  <a class="nav-link" href="../page/validasi.php">
                    <span class="sidebar-mini"> BS </span>
                    <span class="sidebar-normal"> Buat SS </span>
                  </a>
                </li>
                <?php
                }?>                
                <?php
                  if ($role !== "operator"){?>
                <li class="nav-item ">
                  <a class="nav-link" href="../ss/scoring.php">
                    <span class="sidebar-mini"> SC </span>
                    <span class="sidebar-normal"> Penilaian SS </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../ss/detail_ss.php">
                    <span class="sidebar-mini"> DS </span>
                    <span class="sidebar-normal"> Detail SS </span>
                  </a>
                </li>
                <?php
                }?>
                <li class="nav-item ">
                  <a class="nav-link" href="../ss/scoring1.php">
                    <span class="sidebar-mini"> SC </span>
                    <span class="sidebar-normal"> Scoring SPV </span>
                  </a>
                </li>                
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
              <i class="material-icons">timeline</i>
              <p> Achievement Area
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="componentsExamples">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="../achievement/aciev_b1.php">
                    <span class="sidebar-mini"> B1 </span>
                    <span class="sidebar-normal"> Body 1
                    </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../achievement/aciev_b2.php">
                    <span class="sidebar-mini"> B2 </span>
                    <span class="sidebar-normal"> Body 2 </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../achievement/aciev_bq.php">
                    <span class="sidebar-mini"> BQ </span>
                    <span class="sidebar-normal"> BQC </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <?php
          // akses menu
            if ($role == "super admin" ){?>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
              <i class="material-icons">account_balance</i>
              <p> Administrator
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="tablesExamples">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="../admin/admin_mng.php">
                    <span class="sidebar-mini"> US </span>
                    <span class="sidebar-normal"> User Setting</span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" data-toggle ="collapse" href="#tablesCollapse">
                    <span class="sidebar-mini"> ORG </span>
                    <span class="sidebar-normal"> Organization
                    <b class="caret"></b>
                    </span>
                  </a>
                  <div class="collapse" id="tablesCollapse">
                    <ul class="nav">
                      <li class="nav-item ">
                        <a class="nav-link" href="../admin/org_dept.php">
                          <span class="sidebar-mini"> DPT </span>
                          <span class="sidebar-normal"> Admin & Fungsional </span>
                        </a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="../admin/org_section.php">
                          <span class="sidebar-mini"> SEC </span>
                          <span class="sidebar-normal"> Section </span>
                        </a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="../admin/org_group.php">
                          <span class="sidebar-mini"> GRP </span>
                          <span class="sidebar-normal"> Group </span>
                        </a>
                      </li>                      
                    </ul>
                  </div> 
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../admin/data_mp.php">
                    <span class="sidebar-mini"> MPS </span>
                    <span class="sidebar-normal"> Man Power Setting </span>
                  </a>
                </li> 
                <li class="nav-item ">
                  <a class="nav-link" href="../admin/tabel_import.php">
                    <span class="sidebar-mini"> IMP </span>
                    <span class="sidebar-normal"> Import Man Power </span>
                  </a>
                </li>                                
                <li class="nav-item ">
                  <a class="nav-link" href="../admin/resume_ss.php">
                    <span class="sidebar-mini"> APS </span>
                    <span class="sidebar-normal"> Approval SS </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../admin/data_ss.php">
                    <span class="sidebar-mini"> MDS </span>
                    <span class="sidebar-normal"> Master Data SS </span>
                  </a>
                </li> 
                <li class="nav-item ">
                  <a class="nav-link" data-toggle ="collapse" href="#tablesCollapse1">
                    <span class="sidebar-mini"> MD </span>
                    <span class="sidebar-normal"> Media
                    <b class="caret"></b>
                    </span>
                  </a>
                  <div class="collapse" id="tablesCollapse1">
                    <ul class="nav">
                      <li class="nav-item ">
                        <a class="nav-link" href="../admin/upload.php">
                          <span class="sidebar-mini"> UMF </span>
                          <span class="sidebar-normal"> Upload Media Foto </span>
                        </a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="../admin/berita.php">
                          <span class="sidebar-mini"> TBR </span>
                          <span class="sidebar-normal"> Tambah Berita </span>
                        </a>
                      </li>                      
                    </ul>
                  </div> 
                </li>              
                <li class="nav-item ">
                  <a class="nav-link" href="../admin/hr_odc.php">
                    <span class="sidebar-mini"> HRO </span>
                    <span class="sidebar-normal"> SS HR ODC </span>
                  </a>
                </li>                
              </ul>
            </div>
          </li>
          <?php
          }?>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#tablesExamples1">
              <i class="material-icons">record_voice_over</i>
              <p>Voice
              <b class="caret"></b>              
              </p>              
            </a>
            <div class="collapse" id="tablesExamples1">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="../voice/voice_em.php">
                    <span class="sidebar-mini"> VOE </span>
                    <span class="sidebar-normal"> Voice Of Member</span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../voice/voice_oc.php">
                    <span class="sidebar-mini"> VOC </span>
                    <span class="sidebar-normal"> Voice Of Customer</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>                            
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="../calender/calendar.php">
              <i class="material-icons">date_range</i>
              <p> Calendar </p>
            </a>
          </li> -->
        </ul>
      </div>
      <div class="sidebar-background"></div>
    </div>
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
            <a class="navbar-brand" href="javascript:;"><?=$page?></a>
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
                <!-- <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button> -->
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item data-toggle="tooltip" title="Menu Utama">
                <a class="nav-link" href="../../ibody/index.php">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Back Dashboard
                  </p>
                </a>
              </li>
              <!-- action jumlah notifikasi-->
              <script>
                  var approval_num = setInterval(function()
                  {
                    $('.notification').load('../page/notif.php?m=1').fadeIn("fast"); // menggunakan  karena pake class
                    $('#list_pesan').load('../page/notif.php?m=2');//menggunakan # karena pake id
                  },3000 // refresh setiap 5 detik
                  );
              </script>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="notif" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification"></span>
                  <p class="d-lg-none d-md-block">
                    Pesan SS
                  </p>
                </a>
                <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <div class="dropdown-menu-header text-center">
                    Notifications
                  </div>

                  <div class="notifications-dropdown-footer text-center">
                    See All Notifications
                  </div>
                </div> -->
                <!-- <div class="dropdown-menu dropdown-menu-right" id="pesan" aria-labelledby="navbarDropdownMenuLink">
                  <div class="row">
                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                      <img src="../../assets/img/faces/.jpg" class="w-100 rounded-circle">
                    </div>
                    <div class="col-lg-3 col-lg-3 col-3">
                      <strong class="text-info"></strong>
                      <h6></h6>
                      <small class="text-warning">26.11.2021</small>
                  </div>
                </div> -->
                <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdownMenuLink">
                  <div class ="bg-succees-bright px-3 py-3 text-center d-flex justify-content-between align-items-center">
                    <h6 class="mb-10 btn btn-info" >Notification:<span ></span></h6>
                  </div>
                  <div class="dropdown-scroll" id="list_pesan">
                  
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" data-toggle="tooltip" title="Profile" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="../profile/my_profile.php">Profile</a>
                  <a class="dropdown-item" href="../../config/logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Menampilkan session 'info' untuk sweat alert -->
      <div class="info-data" data-infodata="<?php if(isset($_SESSION['info'])){ echo $_SESSION['info']; } unset($_SESSION['info']); ?>" ></div>
      <div class="message" data-infodata="<?php if(isset($_SESSION['pesan'])){ echo $_SESSION['pesan']; } unset($_SESSION['pesan']); ?>" ></div>    
      <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
        Launch static backdrop modal
      </button> -->

      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Hallo Sahabat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Apakah data profile sahabat sudah benar?
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Understood</button> -->
              <a class="btn btn-danger" href="../profile/my_profile.php">No</a>
              <a class="btn btn-info" href="../ss/make_ss.php">Yes</a>
            </div>
          </div>
        </div>
      </div>

  
      
