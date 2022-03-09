<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $page = "Penilaian SS";
    $report = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
    shift.id_shift, buat_ss.periode, buat_ss.a3_report AS a3 
    FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
    LEFT JOIN dept ON karyawan.dept = dept.id_dept
    LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
    LEFT JOIN shift ON karyawan.shift = shift.id_shift
    LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE buat_ss.id_buat='$_GET[id]'") or die (mysqli_error($con));   
    $sc = mysqli_fetch_assoc ($report);
    // $nil = "scoring_frm.php"; 
  //   if(isset($_GET['bsimpan'])) //menghubungkan tombol submit   
  //   {
  //     $nilai = $_GET['nilai1'];
  //       if ($nilai >= 98 AND $nilai <=100){
  //         $nominal= 150000;
  //       }elseif ($nilai >= 95){
  //         $nominal= 125000;
  //       }elseif ($nilai >= 92){
  //         $nominal= 100000; 
  //       }elseif ($nilai >= 89){
  //         $nominal= 80000;
  //       }elseif ($nilai >= 86){
  //         $nominal= 60000;
  //       }elseif ($nilai >= 80){
  //         $nominal= 40000;  
  //       }elseif ($nilai >= 74){
  //         $nominal25000;   
  //       }elseif ($nilai >= 69){
  //         $nominal= 20000; 
  //       }elseif ($nilai >= 64){
  //         $nominal=15000; 
  //       }elseif ($nilai >= 59){
  //         $nominal= 10000;  
  //       }elseif ($nilai >= 49){
  //         $nominal=8000;  
  //       }elseif ($nilai >= 37){
  //         $nominal= 6000;
  //       }elseif ($nilai >= 25){
  //         $nominal= 4000;
  //       }elseif ($nilai >= 13){
  //         $nominal=3000;
  //       }elseif ($nilai >= 1){
  //         $nominal= 2500;
  //       }else{
  //         echo "nilai tidak valid";
  //       }
  //       $rupiah="Rp ".number_format ($nominal,0,'',',');
  //       $angka = $nominal;
  //       $simpan = mysqli_query($con, "UPDATE buat_ss SET nilai = '$_GET[nilai1]' , Nominal= $angka WHERE id_buat = '$_GET[id]'")or die (mysqli_error($con));
  // // memasukan data inputan ke databases
  //       if($simpan){
  //       echo "<script>alert('simpan data ss sukses!'); 
  //              document.location = 'scoring.php';
  //            </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju
  //       }
  //       else
  //       {
  //       echo "<script>alert('simpan data gagal!'); 
  //             </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju            
  //       }
  // }
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
      <div class="content">
        <div class="content">
          <div class="container-fluid">
            <!-- <div class="row">
              <div class="col-sm-12 text-right">
                  <span class="box pull-right">                    
                    <button type="submit" class="btn btn-success btn-sm">A3 Report</button>
                    <button type="submit" class="btn btn-success btn-sm">
                      <a href ="scoring_spv.php" class="material-icons" >Level Up</a></button>                       
                  </span>
              </div>
            </div>           -->
            <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-warning card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Foreman</h4>
                  </div>
                </div>
                <div class="card-body ">               
                  <form method="GET" action="proses_frm.php" class="form-horizontal">
                        <input type="hidden" name="id" value ="<?=$_GET['id']?>" class="form-control" readonly>
                    <div class="row">
											<label class="col-sm-2 col-form-label">Input Nilai</label>
											<div class="col-sm-3">
													<div class="form-group">
                            <input type="number" name="nilai1" min="1" max="58" class="form-control">                          
													</div>
											</div>
                        <label class="col-sm-2 col-form-label">A3 Report</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                            <input type="text" name ="a3" class="form-control" value="<?=$sc['a3']?>" >                         
                            </div>
                        </div>                                         
                    </div>                    
                    <div class="row">
                      <div class="col-lg-12 text-right">
                        <span class="box pull-right">
                          <a href ="scoring.php" class="btn btn-danger">Batal</a>                      
                          <button type="submit" class="btn btn-info" name="bsimpan">Submit</button>
                        </span>
                      </div>
                    </div>                                       
                  </form>
                </div>
              </div>
              <div class="row">              
                <div class="col-md-6">
                  <div class="card ">
                    <div class="card-header card-header-warning card-header-text">
                      <div class="card-text">
                        <h4 class="card-title">Nilai</h4>
                      </div>
                    </div>
                    <div class="card-body ">
                      <form method="" action="/" class="form-horizontal">
                        <div class="row">
                          <label class="col-sm-2 col-form-label">Nilai 1-12</label>
                          <div class="col-sm-10">
                            <div class="form-group">
                                <input type="number" class="form-control"  value="2.500" disabled> 
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <label class="col-sm-2 col-form-label">Nilai 13-24</label>
                          <div class="col-sm-10">
                            <div class="form-group">
                                <input type="number" class="form-control" value="3.000" disabled>
                            </div>
                          </div>                   
                        </div>
                        <div class="row">
                        <label class="col-sm-2 col-form-label">Nilai 25-36</label>
                          <div class="col-sm-10">
                            <div class="form-group">
                                <input type="number" class="form-control" value="4.000" disabled>
                            </div>
                          </div>                   
                        </div>
                        <div class="row">
                        <label class="col-sm-2 col-form-label">Nilai 37-48</label>
                          <div class="col-sm-10">
                            <div class="form-group">
                                <input type="number" class="form-control" value="6.000" disabled>
                            </div>
                          </div>                   
                        </div>
                        <div class="row">
                        <label class="col-sm-2 col-form-label">Nilai 49-58</label>
                          <div class="col-sm-10">
                            <div class="form-group">
                                <input type="number" class="form-control" value="8.000" disabled>
                            </div>
                          </div>                   
                        </div>                                                                                                                                      
                      </form>
                    </div>
                  </div>
                </div> 
                <div class="col-md-6">
                  <div class="card ">
                    <div class="card-header card-header-warning card-header-text">
                      <div class="card-text">
                        <h4 class="card-title">Penentuan Range Penilaian SS</h4>
                      </div>
                    </div>
                    <div class="card-body ">
                    <div class="table-responsive">
                      <table class="table" id="table1">
                      <thead>
                          <tr>
                          <th class="text-center">Kriteria</th>
                          <th>BS</th>
                          <th>B</th>
                          <th>R</th>
                          <th>K</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">IDE</td>
                          <td>12 - 15</td>
                          <td>8 - 11</td>
                          <td>4 - 17</td>
                          <td>1 - 13</td>
                        </tr>
                        <tr>
                          <td class="text-center">USAHA</td>
                          <td>27 - 35</td>
                          <td>18 - 26</td>
                          <td>9 - 17</td>
                          <td>1 - 8</td>
                        </tr>   
                        <tr>
                          <td class="text-center">HASIL</td>
                          <td>31 - 40</td>
                          <td>21 - 30</td>
                          <td>11 - 20</td>
                          <td>1 - 10</td>
                        </tr> 
                        <tr>
                          <td class="text-center">PAPERWORK</td>
                          <td>8 - 10</td>
                          <td>5 - 7</td>
                          <td>3 - 4</td>
                          <td>1 - 2</td>
                        </tr>                                              
                      </tbody>
                      </table>
                    </div>
                  </div>
                </div>            
              </div>               
            </div>
            </div>             
					</div>          
					<!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">7 days </button> -->
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