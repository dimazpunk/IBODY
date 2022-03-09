<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
  $date = date('Y-m-d');
  $page = "Form Suggestion System (SS)";
  //   $start_date = date ('m-01-Y');
  //   $end_date = date ('m-t-Y');
  //   $today = date('Ymd'); // membuat kode id secara otomatis
  //   $char = 'BDY'.$today;
    
  // if(isset($_POST['bsimpan'])) //menghubungkan tombol submit   
  // {
  //   $sql = mysqli_query ($con, "SELECT max(id_buat) AS id_buat FROM buat_ss WHERE id_buat LIKE '{$char}%' ORDER BY id_buat DESC LIMIT 1")  or die (mysqli_error($con)); 
  //   $data = mysqli_fetch_assoc ($sql);
  //   $kode = $data['id_buat'];
  //   $urut = substr($kode,-3,3);
  //   $urut = (int) $urut;
  //   $urut++;
  //   $kode_auto = $char. sprintf("%03s", $urut);
  //   // upload gambar 1
  //   $folder = '../../assets/img/product/';
  //   $nama_p = $_FILES ['foto_before'] ['name'];
  //   $x = explode ('.', $nama_p);
  //   $exstensi = strtolower (end($x));
  //   $ukuran = $_FILES ['foto_before'] ['size'];
  //   $file_temp = $_FILES ['foto_before'] ['tmp_name'];
  //   $nama_before = "BF".$kode_auto.".".$exstensi;
  //   $file_upload = array ('png', 'jpg', 'jpeg');
  //   //upload gambar 2
  //   $folder2 = '../../assets/img/product/';
  //   $nama_p2 = $_FILES ['foto_after'] ['name'];
  //   $x2 = explode ('.', $nama_p2);
  //   $exstensi2 = strtolower (end($x2));
  //   $ukuran2 = $_FILES ['foto_after'] ['size'];
  //   $file_temp2 = $_FILES ['foto_after'] ['tmp_name'];
  //   $nama_after = "AF".$kode_auto.".".$exstensi;
  //   $file_upload2 = array ('png', 'jpg', 'jpeg');
  //   //upload file A3
  //   $folder3 = '../../assets/img/product/';
  //   $nama_p3 = $_FILES ['a3_report'] ['name'];
  //   $x3 = explode ('.', $nama_p3);
  //   $exstensi3 = strtolower (end($x3));
  //   $ukuran3 = $_FILES ['a3_report'] ['size'];
  //   $file_temp3 = $_FILES ['a3_report'] ['tmp_name'];
  //   $file_upload3 = array ('pdf');
  //   // echo $nama_p;
  //   if ((in_array($exstensi, $file_upload)===true) AND (in_array($exstensi2, $file_upload2)===true)){
  //       if (($ukuran < 3132210) AND ($ukuran2 < 3132210)){
  //         move_uploaded_file ($file_temp, $folder.$nama_before);
  //         move_uploaded_file ($file_temp2, $folder2.$nama_after);
  //         mysqli_query($con, "INSERT INTO buat_ss (id_buat,npk, judul, tanggal_improvement, tanggal_implementasi, 
  //             id_kategori, periode, kondisi_saat_ini, foto_before, proses_perbaikan, foto_after, hasil_perbaikan, a3_report, `status`)
  //             VALUES ('$kode_auto','$_POST[tnpk]',
  //             '$_POST[tjudul]',
  //             '$_POST[dateimpr]',
  //             '$_POST[dateimpl]',
  //             '$_POST[tkategori]',
  //             '$date',
  //             '$_POST[saat_ini]',                                        
  //             '$nama_before',
  //             '$_POST[perbaikan]',                                        
  //             '$nama_after',
  //             '$_POST[hasil]',
  //             '$nama_p3',
  //             'a'                                                                              
  //             )")or die (mysqli_error($con));
  //                 if ((in_array($exstensi3, $file_upload3)===true) AND ($ukuran3 < 3132210)) {
  //                     move_uploaded_file ($file_temp3, $folder3.$nama_p3);
  //                   } 
  //         $_SESSION['info'] = 'Disimpan'; //session yang harus dibuat yang nanti ditangkap
  //         echo "<script>document.location.href='../my_achiev/my_aciev.php'</script>";
  //       }else{
  //         echo "<script>alert ('File Upload terlalu besar, Max 3 MB') </script>";
  //       }
  //   }else{

  //   }
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
                  <form method="POST" action="proses_ss.php" id="ss" class="form-horizontal" enctype ="multipart/form-data">
                  <?php
                        $making = mysqli_query ($con,"SELECT karyawan.npk, karyawan.nama, dept.nama_dept AS dp, group_tb.nama_group AS grp, shift.id_shift
                                                            FROM karyawan LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                                            LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                                            LEFT JOIN shift ON karyawan.shift = shift.id_shift WHERE npk = $_SESSION[npk]")or die (mysqli_error($con)); 
                       $mk = mysqli_fetch_assoc ($making);
                  ?>                   
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Npk</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="Number" id ="tnpk" name="tnpk" class="form-control" value = "<?=$mk ['npk']?>" placeholder="masukan npk" required readonly>
                          <span class="bmd-help">A block of help text that breaks onto a newline.</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Nama</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" id="tnama" name="tnama" value = "<?=$mk ['nama']?>" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label text-dark">Dept</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <input type="text" name="tdept" value = "<?=$mk ['dp']?>" class="form-control" readonly>                          
                        </div>
                      </div>                   
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label text-dark">Seksi</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <input type="text" name="tgrp" value = "<?=$mk ['grp']?>" class="form-control" readonly>                           
                        </div>
                      </div>                   
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label text-dark">Shift</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <input type="text" name="tshift" value = "<?=$mk ['id_shift']?>" class="form-control" readonly>                          
                        </div>
                      </div>                   
                    </div>                   
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Judul SS</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <textarea class="form-control" name="tjudul" rows="2" placeholder="masukan judul SS" required autofocus></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Tgl. Improvement</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="Date" name="dateimpr" class="form-control" required>
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Tgl. Implementasi</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="Date" name="dateimpl" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label text-dark">Kategori</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" name="tkategori" id="inlineFormCustomSelectPref" required>
                            <option selected></option>
                            <option value="S">Safety</option>
                            <option value="Q">Quality</option>
                            <option value="C">Cost</option>
                            <option value="D">Delivery</option>
                            <option value="E">Environment</option>
                            <option value="P">Productivity</option>                            
                        </select>
                        </div>
                      </div>                   
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label text-dark">Periode</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <input type="text" name="tperiode" value = "<?=$date?>" class="form-control" readonly>                                                         
                        </div>
                      </div>                   
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <hr/ style="border-color:#cb0e40">
                      </div>
                    </div>                   
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Kondisi Saat Ini</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <textarea class= "form-control" rows="3" name="saat_ini" placeholder="Deskripsikan sebelum perbaikan" required> </textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-5 col-form-label">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="../../assets/img/view.jpg" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                          <span class="btn btn-info btn btn-file ">
                            <span class="fileinput-new">Upload Foto Before</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="foto_before" required/>
                          </span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>                      
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Proses Perbaikan</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <textarea  class="form-control" name="perbaikan" rows="3" placeholder="Deskripsikan proses perbaikan" required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-5 col-form-label">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="../../assets/img/view.jpg" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                          <span class="btn btn-danger btn btn-file">
                            <span class="fileinput-new">Upload Foto After</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="foto_after" required/>
                          </span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>                                     
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-dark">Hasil Perbaikan</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                        <textarea  class="form-control" name="hasil" rows="3" placeholder="Deskripsikan keadaan setelah perbaikan, manfaat(SQCDMP)" required></textarea >
                        </div>
                      </div>
                    </div>  
                    <div class="row">                                              
                      <label for="formFile" class=" col-sm-2 col-form-label text-dark">Upload File A3 Report</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="file" name="a3_report" id="fexampleFormControlFile1">  
                      </div>   
                    </div>                                                                                                                                                                                       
                    <div class="col-sm-12  text-center">
                    <span class="box pull-center">                     
                      <a href="../page/display.php" class="btn btn-danger btn-sm">Batal</a>                      
                      <button type="submit" name="bsimpan" class="btn btn-info btn-sm">Simpan</button>
                    </span>
                  </div>     
                  <div class="not"></div>               
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
<?php include "../page/footer.php";?>
</body>

</html>
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
}
?>