<?php
require_once "../config/config.php";

		// if(isset($_SESSION["npk"])){ // jika ada sesi
			
		// 	// jika tidak ada aktivitas pada browser 
		// 	// selama 15 menit, maka
		// 	if((time() - $_SESSION["last_login_timestamp"]) > 30){// 60 = 1 * 60

		// 		// akan diarahkan kehalaman logout.php
		// 		header("location: ../config/logout.php");
		// 	} else {
		// 		// jika ada aktivitas update waktu
		// 		$_SESSION["last_login_timestamp"] = time();
		// 		// echo "<h3>".$_SESSION["npk"]."</h3>";
		// 		// echo "<h3>".$_SESSION["last_login_timestamp"]."</h3>";
		// 		// echo "<a href='../config/logout.php'>Logout</a>";
		// 	}
		// }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Parallax, Template, Registration, Landing">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>IBODY - Innovation Body</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/line-icons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/nivo-lightbox.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/main.css">    
    <link rel="stylesheet" href="css/responsive.css">

  </head>
  <body>

    <!-- Header Section Start -->
    <header id="hero-area" data-stellar-background-ratio="0.5">    
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a href="index.html" class="navbar-brand"><img class="img-fulid" src="img/body.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
              <i class="lnr lnr-menu"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#hero-area">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#services">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#features">Features</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link page-scroll" href="#portfolios">Works</a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#pricing">Pricing</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#team">Team</a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#blog">Blog</a>
              </li>
              <?php
              if (isset($_SESSION['npk'])){

              ?>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#contact">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="../config/logout.php">Log Out</a>
              </li>  
              <?php
              }
              ?> 
            </ul>
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
           <li>
              <a class="page-scroll" href="#hero-area">Home</a>
            </li>
            <li>
              <a class="page-scroll" href="#services">About Us</a>
            </li>
            <li>
              <a class="page-scroll" href="#features">Features</a>
            </li>
            <!-- <li>
              <a class="page-scroll" href="#portfolios">Works</a>
            </li>
            <li>
              <a class="page-scroll" href="#pricing">Pricing</a>
            </li> -->
            <li>
              <a class="page-scroll" href="#team">Team</a>
            </li>
            <li >
              <a class="page-scroll" href="#blog">Blog</a>
            </li>
            <?php
              if (isset($_SESSION['npk'])){
            ?>
            <li>
              <a class="page-scroll" href="#contact">Contact</a>
            </li>
            <li>
              <a class="page-scroll" href="../config/logout.php">Log out</a>
            </li>
            <?php
              }
            ?>
        </ul>
        <!-- Mobile Menu End -->

      </nav>
      <!-- Navbar End -->   
      <div class="container">      
        <div class="row justify-content-md-center">
          <div class="col-md-10">
            <div class="contents text-center">
              <h1 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">iBODY - INNOVATION PLATFORM FOR YOUR BRILLIANT IDEAS</h1>
              <p class="lead  wow fadeIn" data-wow-duration="1000ms" data-wow-delay="400ms">Innovation Learning & Digital Information </p>
              <?php
              if (!isset($_SESSION['npk'])){

              ?>
                <a href="../login.php" class="btn btn-common wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">Login</a>
              <?php
              }
              ?>
            </div>
          </div>
        </div> 
      </div>           
    </header>
    <!-- Header Section End --> 

    <!-- Services Section Start -->
    <section id="services" class="section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Tentang Kami</h2>
          <hr class="lines wow zoomIn" data-wow-delay="0.3s">
          <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Solusi kebutuhan dan kemudahan informasi, <em>QCC-SS dan Culture Behavior Improvement (CBI)</em><br> serta publikasi awarding sahabat Body</p>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="item-boxes wow fadeInDown" data-wow-delay="0.2s">
              <a href="#" class="icon" data-toggle="tooltip" title="klik disini">
                <i class="lnr lnr-pencil"></i>
              </a>
              <h4>QCC</h4>
              <p>Memberikan informasi aktivitas QCC <em>(Quality Control Circle)</em> dan keaktifan Circle serta memberikan kemudahan dalam input data notulen</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="item-boxes wow fadeInDown" data-wow-delay="0.8s">
              <a href="../dashboard/index.php" class="icon" data-toggle="tooltip" title="klik disini">
                <i class="lnr lnr-code"></i>
              </a>
              <h4>SS</h4>
              <p>Platform pembuatan inovasi SS <em>(Suggestion System)</em> dan monitoring control data Secara real time </p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="item-boxes wow fadeInDown" data-wow-delay="1.2s">
              <a href="#" class="icon" data-toggle="tooltip" title="klik disini">
                <i class="lnr lnr-mustache"></i>
              </a>
              <h4>CBI</h4>
              <p>Memberikan informasi aktivitas CBI <em>(Culture Behavior Improvement)</em> dan keaktifan Circle serta memberikan kemudahan dalam input data notulen</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Services Section End -->

    <!-- Features Section Start -->
    <section id="features" class="section" data-stellar-background-ratio="0.2">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Some Features</h2>
          <hr class="lines">
          <p class="section-subtitle">Web Aplikasi ini menyediakan feature yang compatible dan teknologi digital yang terintegrasi ke semua user sahabat Body</p>
        </div>
        <div class="row">
          <div class="col-lg-8 col-md-12 col-xs-12">
            <div class="container">
              <div class="row">
                 <div class="col-lg-6 col-sm-6 col-xs-12 box-item">
                    <span class="icon">
                      <i class="lnr lnr-rocket"></i>
                    </span>
                    <div class="text">
                      <h4>One system Platform</h4>
                      <p>Memudahkan kontrol dan monitoring inovasi QCC-SS & CBI sahabat dalam satu waktu</p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-xs-12 box-item">
                    <span class="icon">
                      <i class="lnr lnr-laptop-phone"></i>
                    </span>
                    <div class="text">
                      <h4>Flexibility</h4>
                      <p>Multi device akses untuk mobilitas sahabat</p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-xs-12 box-item">
                    <span class="icon">
                      <i class="lnr lnr-layers"></i>
                    </span>
                    <div class="text">
                      <h4>Meet your desirability</h4>
                      <p>Menemukan keinginan sahabat </p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-xs-12 box-item">
                    <span class="icon">
                      <i class="lnr lnr-cog"></i>
                    </span>
                    <div class="text">
                      <h4>Easy to Use</h4>
                      <p>Memberikan kemudahan di tangan sahabat</p>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xs-12">
            <div class="show-box">
              <img class="img-fulid" src="img/features/terios.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Features Section End -->    

    <!-- Portfolio Section -->
    <!-- <section id="portfolios" class="section"> -->
      <!-- Container Starts -->
      <!-- <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Our Portfolio</h2>
          <hr class="lines">
          <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, dignissimos! <br> Lorem ipsum dolor sit amet, consectetur.</p>
        </div>
        <div class="row">          
          <div class="col-md-12"> -->
            <!-- Portfolio Controller/Buttons -->
            <!-- <div class="controls text-center">
              <a class="filter active btn btn-common" data-filter="all">
                All 
              </a>
              <a class="filter btn btn-common" data-filter=".design">
                Design 
              </a>
              <a class="filter btn btn-common" data-filter=".development">
                Development
              </a>
              <a class="filter btn btn-common" data-filter=".print">
                Print 
              </a>
            </div> -->
            <!-- Portfolio Controller/Buttons Ends-->
          <!-- </div> -->

          <!-- Portfolio Recent Projects -->
          <!-- <div id="portfolio" class="row">
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development print">
              <div class="portfolio-item">
                <div class="shot-item">
                  <img src="img/portfolio/img1.jpg" alt="" />  
                  <a class="overlay lightbox" href="img/portfolio/img1.jpg">
                    <i class="lnr lnr-eye item-icon"></i>
                  </a>
                </div>               
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix design print">
              <div class="portfolio-item">
                <div class="shot-item">
                  <img src="img/portfolio/img2.jpg" alt="" />  
                  <a class="overlay lightbox" href="img/portfolio/img2.jpg">
                    <i class="lnr lnr-eye item-icon"></i>
                  </a>
                </div>               
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development">
              <div class="portfolio-item">
                <div class="shot-item">
                  <img src="img/portfolio/img3.jpg" alt="" />  
                  <a class="overlay lightbox" href="img/portfolio/img3.jpg">
                    <i class="lnr lnr-eye item-icon"></i>
                  </a>
                </div>               
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development design">
              <div class="portfolio-item">
                <div class="shot-item">
                  <img src="img/portfolio/img4.jpg" alt="" />  
                  <a class="overlay lightbox" href="img/portfolio/img4.jpg">
                    <i class="lnr lnr-eye item-icon"></i>
                  </a>
                </div>               
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development">
              <div class="portfolio-item">
                <div class="shot-item">
                  <img src="img/portfolio/img5.jpg" alt="" />  
                  <a class="overlay lightbox" href="img/portfolio/img5.jpg">
                    <i class="lnr lnr-eye item-icon"></i>
                  </a>
                </div>               
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix print design">
              <div class="portfolio-item">
                <div class="shot-item">
                  <img src="img/portfolio/img6.jpg" alt="" />  
                  <a class="overlay lightbox" href="img/portfolio/img6.jpg">
                    <i class="lnr lnr-eye item-icon"></i>
                  </a>
                </div>               
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <!-- Container Ends -->
    <!-- </section> -->
    <!-- Portfolio Section Ends --> 

    <!-- Start Video promo Section -->
    <section class="video-promo section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
              <div class="video-promo-content text-center">
                <h2 class="wow zoomIn" data-wow-duration="1000ms" data-wow-delay="100ms">Watch Channel Innovation Video</h2>
                <p class="wow zoomIn" data-wow-duration="1000ms" data-wow-delay="100ms">Menyediakan informasi mengenai konten edukasi QCC-SS dan <em>Culture Behavior Improvement (CBI)</em> serta media event virtual Body </p>
                <a href="https://www.youtube.com/channel/UCFxajDVi31Sc9YHR9YHBSog" class="" target="blank"><i class="fa fa-youtube-play" style="font-size:40px;color:red" data-toggle="tooltip" title="Youtube"></i></a>
                <a href="https://instagram.com/body_division?utm_medium=copy_link" class="ml-3" target="blank"><i class="fa fa-instagram" style="font-size:38px;color:red" data-toggle="tooltip" title="Instagram"></i></a>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Video Promo Section -->

    <!-- Start Pricing Table Section -->
    <!-- <div id="pricing" class="section pricing-section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Pricing Table</h2>
          <hr class="lines">
          <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, dignissimos! <br> Lorem ipsum dolor sit amet, consectetur.</p>
        </div>

        <div class="row pricing-tables">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="pricing-table">
              <div class="pricing-details">
                <h2>Free</h2>
                <span>$00</span>
                <ul>
                  <li>Consectetur adipiscing</li>
                  <li>Nunc luctus nulla et tellus</li>
                  <li>Suspendisse quis metus</li>
                  <li>Vestibul varius fermentum erat</li>
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-common">Get Plan</a>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="pricing-table">
              <div class="pricing-details">
                <h2>Popular</h2>
                <span>$3.99</span>
                <ul>
                  <li>Consectetur adipiscing</li>
                  <li>Nunc luctus nulla et tellus</li>
                  <li>Suspendisse quis metus</li>
                  <li>Vestibul varius fermentum erat</li>
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-common">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="pricing-table">
              <div class="pricing-details">
                <h2>Premium</h2>
                <span>$9.50</span>
                <ul>
                  <li>Consectetur adipiscing</li>
                  <li>Nunc luctus nulla et tellus</li>
                  <li>Suspendisse quis metus</li>
                  <li>Vestibul varius fermentum erat</li>
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-common">Buy Now</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div> -->
    <!-- End Pricing Table Section -->

    <!-- Counter Section Start -->
    <?php
      $karyawan = mysqli_query ($con,"SELECT  karyawan.npk  FROM karyawan") or die (mysqli_error($con));
      $mp = mysqli_num_rows($karyawan);
    ?>
    <div class="counters section" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row"> 
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="facts-item">   
              <div class="icon">
                <i class="lnr lnr-clock"></i>
              </div>             
              <div class="fact-count">
                <h3><span class="counter"><?php echo $mp;?></span></h3>
                <h4>Body Divisi</h4>
              </div>
            </div>
          </div>
          <?php
            $karyawans = mysqli_query ($con,"SELECT  karyawan.npk, karyawan.dept FROM karyawan WHERE karyawan.dept = 'B1'") or die (mysqli_error($con));
            $mps = mysqli_num_rows($karyawans);
          ?>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="facts-item">   
              <div class="icon">
                <i class="lnr lnr-briefcase"></i>
              </div>            
              <div class="fact-count">
                <h3><span class="counter"><?php echo $mps;?></span></h3>
                <h4>BODY 1</h4>
              </div>
            </div>
          </div>
          <?php
            $karya = mysqli_query ($con,"SELECT  karyawan.npk, karyawan.dept FROM karyawan WHERE karyawan.dept = 'B2'") or die (mysqli_error($con));
            $ma = mysqli_num_rows($karya);
          ?>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="facts-item"> 
              <div class="icon">
                <i class="lnr lnr-user"></i>
              </div>              
              <div class="fact-count">
                <h3><span class="counter"><?php echo $ma;?></span></h3>
                <h4>BODY 2</h4>
              </div>
            </div>
          </div>
          <?php
            $employee = mysqli_query ($con,"SELECT  karyawan.npk, karyawan.dept FROM karyawan WHERE karyawan.dept = 'B3'") or die (mysqli_error($con));
            $em = mysqli_num_rows($employee);
          ?>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="facts-item"> 
              <div class="icon">
                <i class="lnr lnr-heart"></i>
              </div>              
              <div class="fact-count">
                <h3><span class="counter"><?php echo $em;?></span></h3>
                <h4>BQC</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Counter Section End -->

    <!-- Team section Start -->
    <section id="team" class="section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Our Team</h2>
          <hr class="lines">
          <p class="section-subtitle">Kolaborasi engineer<br> Membangun infrastructure Body Divisi di Era digital industri 4.0 </p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <img src="img/team/team1.jpg" alt="">
              <div class="team-details">
                <div class="team-inner">
                  <h4 class="team-title">Rio S. Judeen</h4>
                  <p>Master Developer</p>
                  <!-- <ul class="social-list">
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul> -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <img src="img/team/mamo.jpg" alt="">
              <div class="team-details">
                <div class="team-inner">
                  <h4 class="team-title">Purnomo</h4>
                  <p>Fullstack Native Developer</p>
                  <!-- <ul class="social-list">
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul> -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <img src="img/team/marc.jpg" alt="">
              <div class="team-details">
                <div class="team-inner">                  
                  <h4 class="team-title">Wahyudi</h4>
                  <p>Data Engineer administration</p>
                  <!-- <ul class="social-list">
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul> -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <img class="img-fulid" src="img/team/team4.jpg" alt="">
              <div class="team-details">
                <div class="team-inner">
                  <h4 class="team-title">Fakhri Rizal S.</h4>
                  <p>Master Developer</p>
                  <!-- <ul class="social-list">
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Team section End -->

    <!-- testimonial Section Start -->
    <div id="testimonial" class="section" data-stellar-background-ratio="0.1">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-12">
            <div class="touch-slider owl-carousel owl-theme">
              <div class="testimonial-item">
                <img src="img/testimonial/customer1.jpg" alt="Client Testimonoal" />
                <div class="testimonial-text">
                  <p>Web aplikasi ini memberikan kemudahan untuk pengguna <br> Complex dan user friendly</p>
                  <h3>Fauzan Diaz</h3>
                  <span>Division Head Body</span>
                </div>
              </div>
              <div class="testimonial-item">
                <img src="img/testimonial/customer2.jpg" alt="Client Testimonoal" />
                <div class="testimonial-text">
                  <p>Memberikan kemudahan dalam olah data<br> Feature yang sangat tangguh</p>
                  <h3>Gigih Adicita Wijaya</h3>
                  <span>Dept Head Business & People Development Body</span>
                </div>
              </div>
              <div class="testimonial-item">
                <img src="img/testimonial/customer3.jpg" alt="Client Testimonoal" />
                <div class="testimonial-text">
                  <p>Platform development yang sangat complex <br> Dengan one point system</p>
                  <h3>M. Levino</h3>
                  <span>Dept Head Stainable Process Body</span>
                </div>
              </div>
              <div class="testimonial-item">
                <img src="img/testimonial/customer4.jpg" alt="Client Testimonoal" />
                <div class="testimonial-text">
                  <p>Memberikan informasi yang sangat uptodate  <br> Real time monitoring</p>
                  <h3>David Mahendra</h3>
                  <span>Dept Head Quality Body</span>
                </div>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </div>
    <!-- testimonial Section Start -->

    <!-- Blog Section -->
          <?php
            $berita = mysqli_query ($con,"SELECT  berita.id_berita AS bi, berita.terbit AS bt, berita.judul AS bj, berita.isi_berita AS bs, berita.foto AS bf  FROM berita") or die (mysqli_error($con));
            $br = mysqli_fetch_assoc ($berita);
          ?>
    <section id="blog" class="section">
      <!-- Container Starts -->
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Recent Blog</h2>
          <hr class="lines">
          <p class="section-subtitle">Memberikan informasi mengenai event QCC-SS dan CBI <br> serta publish awarding untuk sahabat Body</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-item">
            <!-- Blog Item Starts -->
            <div class="blog-item-wrapper">
              <div class="blog-item-img">
                <a href="single-post.html">
                  <img src="img/blog/img1.jpg" alt="">
                </a>                
              </div>
              <div class="blog-item-text"> 
                <div class="meta-tags">
                  <span class="date"><i class="lnr  lnr-clock"></i><?=$br ['bt']?></span>
                  <!-- <span class="comments"><a href="#"><i class="lnr lnr-bubble"></i> 24 Comments</a></span> -->
                </div>
                <h3>
                  <a href="single-post.html"><?=$br ['bj']?></a>
                </h3>
                <p>
                <?=$br ['bs']?>
                </p>
                <a href="single-post.html" class="btn-rm">Read More <i class="lnr lnr-arrow-right"></i></a>
              </div>
            </div>
            <!-- Blog Item Wrapper Ends-->
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-item">
            <!-- Blog Item Starts -->
            <div class="blog-item-wrapper">
              <div class="blog-item-img">
                <a href="single-post.html">
                  <img src="img/blog/img2.jpg" alt="">
                </a>                
              </div>
              <div class="blog-item-text"> 
                <div class="meta-tags">
                  <span class="date"><i class="lnr  lnr-clock"></i>2 Days Ago</span>
                  <!-- <span class="comments"><a href="#"><i class="lnr lnr-bubble"></i> 24 Comments</a></span> -->
                </div>
                <h3>
                  <a href="single-post.html">Body Raih Juara 2 kategori QCC di konvensi QCC-SS Ke 35 ADM</a>
                </h3>
                <p>
                Prestasi yang sangat membanggakan di raih oleh Circle Adem tentram dengan menyabet juara 2, improvement yang dilakukan... 
                </p>
                <a href="single-post.html" class="btn-rm">Read More <i class="lnr lnr-arrow-right"></i></a>
              </div>
            </div>
            <!-- Blog Item Wrapper Ends-->
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-item">
            <!-- Blog Item Starts -->
            <div class="blog-item-wrapper">
              <div class="blog-item-img">
                <a href="single-post.html">
                  <img src="img/blog/img3.jpg" alt="">
                </a>                
              </div>
              <div class="blog-item-text"> 
                <div class="meta-tags">
                  <span class="date"><i class="lnr  lnr-clock"></i>2 Days Ago</span>
                  <!-- <span class="comments"><a href="#"><i class="lnr lnr-bubble"></i> 24 Comments</a></span> -->
                </div> 
                <h3>
                  <a href="single-post.html">Body Juara 1 Kategori Design thinking tingkat ADM</a>
                </h3>
                <p>
                 Circle Iysi Squad tampil luar biasa dengan meraih juara 1 di konvensi Design thinking tingkat ADM, ini merupakan seri perdana... 
                </p>
                <a href="single-post.html" class="btn-rm">Read More <i class="lnr lnr-arrow-right"></i></a>
              </div>
            </div>
            <!-- Blog Item Wrapper Ends-->
          </div>
        </div>
      </div>
    </section>
    <!-- blog Section End -->
    <?php
    if (isset($_SESSION['npk'])){
    ?>
    <!-- Contact Section Start -->
    <section id="contact" class="section" data-stellar-background-ratio="-0.2">      
      <div class="contact-form">
        <div class="container">
          <div class="row">     
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="contact-us">
                <h3>Contact With us</h3>
                <div class="contact-address">
                  <p>Committee QCCSS, ICARE & PDCA BODY </p>
                  <p class="phone">Phone: <span>(0812 9026 4246)</span></p>
                  <p class="email">E-mail: <span>(contact@ibody.com)</span></p>
                </div>
                <!-- <div class="social-icons">
                  <ul>
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li class="dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  </ul>
                </div> -->
              </div>
            </div>     
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="contact-block">
                <form id="contactForm">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Npk" required data-error="Please enter your name">
                        <div class="help-block with-errors"></div>
                      </div>                                 
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" placeholder="Your Name" id="email" class="form-control" name="name" required data-error="Please enter your email">
                        <div class="help-block with-errors"></div>
                      </div> 
                    </div>
                    <div class="col-md-12">
                      <div class="form-group"> 
                        <textarea class="form-control" id="message" placeholder="Your Message" rows="8" data-error="Write your message" required></textarea>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="submit-button text-center">
                        <button class="btn btn-common" id="submit" type="submit">Send Message</button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div> 
                        <div class="clearfix"></div> 
                      </div>
                    </div>
                  </div>            
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>           
    </section>
    <?php
    }
    ?>
    <!-- Contact Section End -->

    <!-- Footer Section Start -->
    <footer>          
      <div class="container">
        <div class="row">
          <!-- Footer Links -->
          <div class="col-lg-6 col-sm-6 col-xs-12">
            <ul class="footer-links">
              <li>
                <a href="#">Homepage</a>
              </li>
              <li>
                <a href="#">About Us</a>
              </li>
              <li>
                <a href="#">Features</a>
              </li>
              <li>
                <a href="#">Contact</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="copyright">
              <p>All copyrights reserved &copy; <?php echo date('Y'); ?> - Designed & Developed by <a rel="nofollow" href="#">PERMENT</a></p>
            </div>
          </div>  
        </div>
      </div>
    </footer>
    <!-- Footer Section End --> 

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lnr lnr-arrow-up"></i>
    </a>
    
    <div id="loader">
      <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
      </div>
    </div>     

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="js/jquery-min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mixitup.js"></script>
    <script src="js/nivo-lightbox.js"></script>
    <script src="js/owl.carousel.js"></script>    
    <script src="js/jquery.stellar.min.js"></script>    
    <script src="js/jquery.nav.js"></script>    
    <script src="js/scrolling-nav.js"></script>    
    <script src="js/jquery.easing.min.js"></script>    
    <script src="js/smoothscroll.js"></script>    
    <script src="js/jquery.slicknav.js"></script>     
    <script src="js/wow.js"></script>   
    <script src="js/jquery.vide.js"></script>
    <script src="js/jquery.counterup.min.js"></script>    
    <script src="js/jquery.magnific-popup.min.js"></script>    
    <script src="js/waypoints.min.js"></script>    
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>   
    <script src="js/main.js"></script>
    <script src="../assets/js/idle/jquery.idle.js" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <?php
   if(isset($_SESSION["npk"])){ // jika ada sesi
    ?>
    <script>
    $(document).idle({
        onIdle: function(){
            window.location="../config/logout.php";                
        },
        idle: 500000
    });
    </script>
   <?php 
   }
   ?>
  </body>
</html>