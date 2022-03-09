<?php
  require_once "../../config/config.php";
  //variabel npk yang dikirimkan form.php
    // $npk = $_GET['npk'];

    // //mengambil data
    // $query = mysqli_query($con, "SELECT * FROM karyawan WHERE npk='$npk'")or die (mysqli_error($con));
    // $add = mysqli_fetch_array($query);
    // $data = array('nama' => $add['nama'],);

//tampil data
// echo json_encode($data);

if(isset($_POST['bsimpan'])) //menghubungkan tombol submit   
{
    mysqli_query($con, "INSERT INTO dept (id_dept, nama_dept, npk_dept)
    VALUES ('$_POST[id]',
    '$_POST[dpa]',
    '$_POST[npk]'                                                                                                                                                         
    )")or die (mysqli_error($con));
    $_SESSION['info'] = 'Disimpan';
            echo "<script>document.location = 'org_dept.php';</script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju
    //setelah submit tetap di halaman ini
}else{
    echo "<script>document.location = 'add_dept.php';</script>";
    // tidak berhasil submit tetap dihalaman ini
}
?>