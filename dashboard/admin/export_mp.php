<?php
require_once "../../config/config.php";
if (isset($_SESSION['npk'])){
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
                                        <th>Dept</th>
                                        <th>Shift</th>
                                        <th>Group</th>                                                  
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $batas = 50;
                                        $halaman = (isset($_GET['halaman']))?(int)$_GET['halaman'] : 1;
                                        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                                        $no = $halaman_awal+1;	               
                                        $previous = $halaman - 1;
                                        $next = $halaman + 1;                      
                                        $data = mysqli_query($con,"SELECT  buat_ss.npk AS npk, karyawan.npk AS npk_kar, buat_ss.id_buat AS id,karyawan.nama, kategori.id_kategori, buat_ss.judul, dept.nama_dept, group_tb.nama_group,
                                                    shift.id_shift, buat_ss.periode 
                                                    FROM buat_ss LEFT JOIN karyawan ON buat_ss.npk = karyawan.npk
                                                    LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                                    LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                                    LEFT JOIN shift ON karyawan.shift = shift.id_shift
                                                    LEFT JOIN kategori ON buat_ss.id_kategori = kategori.id_kategori")or die (mysqli_error($con));
                                        $jumlah_data = mysqli_num_rows($data);
                                        $total_halaman = ceil($jumlah_data / $batas);
                                        $admin = mysqli_query ($con,"SELECT karyawan.npk, karyawan.nama, dept.nama_dept AS dp, username.password, username.npk AS npk_u, dept.nama_dept, shift.id_shift, username.level AS ul, group_tb.nama_group AS grp
                                                                            FROM karyawan LEFT JOIN username ON karyawan.npk = username.npk
                                                                            LEFT JOIN dept ON karyawan.dept = dept.id_dept
                                                                            LEFT JOIN group_tb ON karyawan.group = group_tb.id_group
                                                                            LEFT JOIN shift ON karyawan.shift = shift.id_shift ORDER BY karyawan.npk ASC limit $halaman_awal, $batas")or die (mysqli_error($con)); 
                                                                            $us = "edit_mp.php"; 
                                        while ($ad = mysqli_fetch_assoc ($admin)){
                                        ?>                       
                                    <tr>
                                        <td class="text-center"><?=$no++;?></td>
                                        <td><?=$ad ['npk']?></td>
                                        <td><?=$ad ['nama']?></td>
                                        <td><?=$ad ['dp']?></td>
                                        <td><?=$ad ['id_shift']?></td>
                                        <td><?=$ad ['grp']?></td>                         
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
                <a href ="data_mp.php" class="btn btn-info">>>Kembali </a>
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