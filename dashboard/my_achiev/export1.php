<?php
require_once "../../config/config.php";
if (isset($_SESSION['npk'])){
    $grp = $_SESSION ['group'];
    $npk = $_SESSION ['npk']; 
    $jbt = $_SESSION ['jabatan'];
    $sec = $_SESSION ['section'];
    $fung = $_SESSION ['dept_fungsion'];
    $role = $_SESSION ['level'];
    $jbt = $_SESSION ['jabatan'];
?>
<html>
<head>
  <title>Resume Data Suggestion System [SS]</title> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Suggestion System</h2>
			<h4>Body Division</h4>
				<div class="data-tables datatable-dark">
                                <table class="table" id="mauexport">
                                    <thead>
                                        <tr>
                                        <th class="text-center">No</th>
                                        <th>Npk</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Judul</th>
                                        <th>Dept</th>
                                        <th>Seksi</th>
                                        <th>Shift</th>
                                        <th>Date</th>                         
                                        <th class="text-center">Nilai</th>
                                        <th>Nominal</th>                             
                                        </tr>
                                    </thead>
                                <tbody>
                                <?php
                                        $no = 1;
                                        if ($role !== "npk"){  
                                            $score = mysqli_query ($con,"SELECT buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                            shift.id_shift, buat_ss.periode, buat_ss.nilai, buat_ss.nominal, buat_ss.progress
                                            FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                            LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                            LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                            LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                            LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori WHERE karyawan.npk = '$npk' AND nilai >=0 ")or die (mysqli_error($con)); 
                                        }       
                                        while ($sc = mysqli_fetch_assoc ($score)){
                                        ?>                        
                                    <tr>
                                    <td class="text-center"><?=$no++;?></td>
                                    <td><?=$sc['npk']?></td>
                                    <td><?=$sc['nama']?></td>
                                    <td><?=$sc['id_kategori']?></td>
                                    <td><?=$sc['judul']?></td>
                                    <td><?=$sc['nama_dept']?></td>
                                    <td><?=$sc['judul']?></td>
                                    <td><?=$sc['id_shift']?></td>
                                    <th><?=$sc['periode']?></th>  
                                    <td class="text-center"><?=$sc['nilai']?></td>
                                    <?php
                                    $nilai = $sc['nilai'];
                                    if ($nilai >= 98 AND $nilai <=100){
                                        $nominal= 150000;
                                    }elseif ($nilai >= 95){
                                        $nominal= 125000;
                                    }elseif ($nilai >= 92){
                                        $nominal= 100000; 
                                    }elseif ($nilai >= 89){
                                        $nominal= 80000;
                                    }elseif ($nilai >= 86){
                                        $nominal= 60000;
                                    }elseif ($nilai >= 80){
                                        $nominal= 40000;  
                                    }elseif ($nilai >= 74){
                                        $nominal25000;   
                                    }elseif ($nilai >= 69){
                                        $nominal= 20000; 
                                    }elseif ($nilai >= 64){
                                        $nominal=15000; 
                                    }elseif ($nilai >= 59){
                                        $nominal= 10000;  
                                    }elseif ($nilai >= 49){
                                        $nominal=8000;  
                                    }elseif ($nilai >= 37){
                                        $nominal= 6000;
                                    }elseif ($nilai >= 25){
                                        $nominal= 4000;
                                    }elseif ($nilai >= 13){
                                        $nominal=3000;
                                    }elseif ($nilai >= 1){
                                        $nominal= 2500;
                                    }else{
                                     $nominal=0;
                                    }
                                    $rupiah="Rp ".number_format ($nominal,0,'',',');
                                    ?>                                
                                  <th><?=$rupiah?></td>
                                  </tr>
                                    <?php  
                                    }                          
                                    ?>                           
                                </tbody>
                                </table>		 			
					<!-- Masukkan table nya disini, dimulai dari tag TABLE -->
					
				</div>             
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

<div class="row">
        <div class="col-sm-4 text-center">
            <span class="box pull-center">                    
                <a href ="my_aciev.php" class="btn btn-info">>>Kembali </a>
            </span>
        </div>
</div>	

</body>

</html>
<?php
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
  }
?>