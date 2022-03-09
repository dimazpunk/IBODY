<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
    $page = "Preview SS";
    $bulan = date ("M Y");
    //Menampilkan query string dengan pindah halaman di menu preview (menambahkan link di setiap tombol preview)
    if ($_GET['hal']=='frm'){
        $link='../ss/scoring.php';
    }else if ($_GET['hal']=='detail'){
        $link='../ss/detail_SS.php';
    }else if ($_GET['hal']=='aciev'){
        $link='../my_achiev/my_aciev.php';
    }else if ($_GET['hal']=='aproval'){
        $link='../admin/resume_ss.php';
    }else if ($_GET['hal']=='data'){
      $link='../admin/data_ss.php';
    }
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
            <div class="row">
              <div class="col-sm-12 text-right">
                  <span class="box pull-right">                    
                    <a href ="<?=$link?>" class="btn btn-info btn-sm">Kembali </a>
                  </span>
                  <!-- <span class="box pull-right">                    
                    <a href ="scoring.php" class="btn btn-danger">Download </a>
                  </span> -->
              </div> 
            </div> 
            <div class ="card">
            <div class="card-body ">
              <div class="row">  
              <div class="col-md-12">        
                <div class="card">    <!--<input type="text" name="tgrp" value = "" class="form-control" readonly>    -->
                <div class="table-responsive">           
                  <table class="table table-bordered">
                    <tbody> 
                      <?php
                        $preview = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, 
                        kategori.id_kategori AS kat, buat_ss.judul, dept.nama_dept, group_tb.nama_group AS grp, shift.id_shift, buat_ss.periode, 
                        buat_ss.kondisi_saat_ini AS saat_ini, buat_ss.proses_perbaikan AS perbaikan, buat_ss.tanggal_improvement AS date_imp, 
                        buat_ss.tanggal_implementasi AS date_iml, buat_ss.foto_before AS fb, buat_ss.foto_after AS fa, buat_ss.hasil_perbaikan AS hp, buat_ss.nilai
                        FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                        LEFT JOIN dept ON karyawan.dept = dept.id_dept
                        LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                        LEFT JOIN shift ON karyawan.shift = shift.id_shift
                        LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE id_buat='$_GET[id]'") or die (mysqli_error($con)); 
                        $prv = mysqli_fetch_assoc ($preview);
                      ?>                             
                      <tr>
                        <td rowspan="3" class="text-center p-2">
                          <img src="../../assets/img/logo_adm.png" style="width:100px ; padding:0px">
                        </td>
                        <td rowspan="3" class="text-center font-weight-bold" colspan="8"><h4>SUGGESTION SYSTEM (SS)</h5></td>
                        <td class="text-left py-0" colspan="2">No Form</td>
                        <td class="text-left py-0" colspan="2">:081/form-HR/ADM</td>
                        <td rowspan="3" class="text-center px-4"><h4><?php echo date('Y'); ?></h4></td>
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
                        <td class="text-center py-1" colspan="12"><?=$prv ['id'];?></td>                                         
                      </tr>
                      <tr>
                        <td class="text-center py-1" colspan="2">Kriteria SS</td>
                        <td colspan="2" class="text-center py-1 <? if ($prv['kat']=='S'){echo "bg-info text-white";}?>">SAFETY</td>
                        <td colspan="2" class="text-center py-1 <? if ($prv['kat']=='Q'){echo "bg-info text-white";}?>">QUALITY</td>
                        <td colspan="2" class="text-center py-1 <? if ($prv['kat']=='C'){echo "bg-info text-white";}?>">COST</td>
                        <td colspan="2" class="text-center py-1 <? if ($prv['kat']=='D'){echo "bg-info text-white";}?>">DELIVERY</td>
                        <td colspan="2" class="text-center py-1 <? if ($prv['kat']=='P'){echo "bg-info text-white";}?>">PRODUCTIVITY</td>
                        <td colspan="2" class="text-center py-1 <? if ($prv['kat']=='E'){echo "bg-info text-white";}?>">ENVIRONMENT</td>                                                                                   
                      </tr>
                      <tr>
                        <td class="text-center py-1" colspan="2">Periode SS</td>
                        <td class="text-center py-1" colspan="12"><?=$prv ['periode'];?></td>
                        <!-- <td class="text-center py-1">Feb</td>
                        <td class="text-center py-1">Mar</td>
                        <td class="text-center py-1">Apr</td>
                        <td class="text-center py-1">Mei</td>
                        <td class="text-center py-1">Jun</td>
                        <td class="text-center py-1">Jul</td>
                        <td class="text-center py-1">Agt</td>
                        <td class="text-center py-1">Sep</td>
                        <td class="text-center py-1">Okt</td>
                        <td class="text-center py-1">Nov</td>
                        <td class="text-center py-1">Des</td>                                                                                                                            -->
                      </tr>
                      <tr>
                        <td colspan="14"></td>
                      </tr>
                      <tr>
                        <td class="text-center text-nowrap py-1 bg-secondary text-white">Data Pembuat SS</td>
                      </tr>
                      <tr>
                        <td class="text-center py-1">Nama</td>
                        <td class="text-center py-1"colspan="6"><?=$prv ['nama'];?></td>
                        <td class="text-center py-1"colspan="2">Dept</td>
                        <td class="text-center py-1"colspan="6"><?=$prv ['nama_dept'];?></td>                                                                               
                      </tr>
                      <tr>
                        <td class="text-center py-1">NPK</td>
                        <td class="text-center py-1"colspan="3"><?=$prv['npk'];?></td>
                        <td class="text-center py-1"colspan="2">Shift</td>
                        <td class="text-center py-1"><?=$prv ['id_shift'];?></td>
                        <td class="text-center py-1"colspan="2">Seksi</td>
                        <td class="text-center py-1"colspan="6"><?=$prv ['grp'];?></td>                                                                                                                                                               
                      </tr>
                      <tr>
                        <td colspan="14"></td>
                      </tr>
                      <tr>
                        <td class="text-center text-nowrap py-1 bg-secondary text-white">Data Improvement</td>
                      </tr>
                      <tr>
                        <td class="text-center py-1" colspan="2">Judul SS</td>
                        <td class="text-center text-nowrap py-1"colspan="12"><?=$prv ['judul'];?></td>                                                                             
                      </tr>
                      <tr>
                        <td class="text-center py-1"colspan="4">Tanggal Pembuatan Improvement</td>
                        <td class="text-center py-1"colspan="3"><?=$prv ['date_imp'];?></td>
                        <td class="text-center py-1"colspan="4">Tanggal Implementasi</td>
                        <td class="text-center py-1"colspan="3"><?=$prv ['date_iml'];?></td>                                                                                                                                                            
                      </tr>
                      <tr>
                        <td colspan="14"></td>
                      </tr>
                      <tr>
                        <td class="text-center p-0 bg-secondary text-white" colspan="7">Kondisi Saat Ini</td>
                        <td class="text-center p-0 bg-secondary text-white" colspan="8">Proses Perbaikan</td>
                      </tr>
                      <tr>
                        <td class="text-center p-0"colspan="3" style="width:100px"><?=$prv ['saat_ini'];?></td>
                        <td class="text-center p-0"colspan="4" style="width:100px"><img style="width:70%"src="../../assets/img/product/<?echo $prv['fb'];?>"/> </td>
                        <td class="text-center p-0"colspan="4" style="width:100px"><?=$prv ['perbaikan'];?></td>                  
                        <td class="text-center p-0"colspan="4" style="width:100px"><img style="width:70%"src="../../assets/img/product/<?echo $prv['fa'];?>"/></td>
                      </tr>
                      <tr>
                        <td colspan="14"></td>
                      </tr>
                      <tr>
                        <td class="text-center p-0 bg-secondary text-white"colspan="7">Hasil Perbaikan</td>
                        <td class="text-center p-0 bg-secondary text-white"colspan="8">Reward</td>
                      </tr>
                      <tr>
                        <td class="text-center p-0"colspan="7"><?=$prv ['hp'];?></td>
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
                              <td class="text-center py-1 align-middle" rowspan="3">Div.Head</td>
                              <td class="text-center text-nowrap py-1">98-100</td>
                              <td class="text-center py-1">150.000</td>
                              <td class="text-center py-3 align-middle" rowspan="15"><?=$prv ['nilai'];?></td>
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
                              <td class="text-center py-1 align-middle" rowspan="3">Dept.Head</td>
                              <td class="text-center text-nowrap py-1">89-91</td>
                              <td class="text-center py-1">80.000</td>
                              <td class="text-center py-3" rowspan="3"></td>
                              <td class="text-center py-1" rowspan="3"></td>
                              <!-- <td class="text-center py-1" rowspan="3"></td>                                                                                                                                                                                                                                                                                         -->
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
                              <td class="text-center py-1 align-middle" rowspan="4">Sect.Head</td>
                              <td class="text-center text-nowrap py-1">74-79</td>
                              <td class="text-center py-1">25.000</td>
                              <td class="text-center py-4" rowspan="4"></td>
                              <td class="text-center py-1" rowspan="4"></td>
                              <!-- <td class="text-center py-1" rowspan="4"></td>                                                                                                                                                                                                                                                                                         --> -->
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
                              <td class="text-center py-1 align-middle" rowspan="5">Foreman</td>
                              <td class="text-center text-nowrap py-1">49-58</td>
                              <td class="text-center py-1">8.000</td>
                              <td class="text-center py-5" rowspan="5"></td>
                              <td class="text-center py-1" rowspan="5"></td>
                              <!-- <td class="text-center py-1" rowspan="5"></td>                                                                                                                                                                                                                                                                                         -->
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