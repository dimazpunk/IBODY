<?php
  require_once "../../config/config.php";
  if (isset($_POST['fungsion'])) {
    $fungsion = $_POST["fungsion"];

    $section = "select * from section where id_dept_fungsion = '$fungsion'";
    $hasil = mysqli_query($con, $section);
    while ($sc = mysqli_fetch_array($hasil)) {
        ?>
        <option value="<?php echo  $sc['id_section']; ?>"><?php echo $sc['nama_section']; ?></option>
        <?php
    }
    ?>
        <option value=""> - </option>
    <?php
}
if (isset($_POST['section'])) {
    $section = $_POST["section"];

    $grp = "select * from group_tb where id_section = '$section'";
    $result = mysqli_query($con, $grp);
    while ($gr = mysqli_fetch_array($result)) {
        ?>
        <option value="<?php echo  $gr['id_group']; ?>"><?php echo $gr['nama_group']; ?></option>
        <?php
    }
    ?>
        <option value=""> - </option>
    <?php
}else{
    echo $_GET["fungsion"];
}
if(isset($_POST['bsimpan'])) //menghubungkan tombol submit   
{
    mysqli_query($con, "INSERT INTO karyawan (npk, nama, tanggal_lahir, tanggal_masuk, dept, dept_fungsion, section, `group`, shift,
                                    jabatan, `status`, divhead)
    VALUES ('$_POST[tnpk]',
    '$_POST[nama]',
    '$_POST[datetl]',
    '$_POST[datetm]',
    '$_POST[tdept]',
    '$_POST[fungsion]',
    '$_POST[section]',
    '$_POST[grp]',
    '$_POST[shift]',
    '$_POST[jab]',
    '$_POST[stat]',
    '$_POST[div]'                                                                                                                                                          
    )")or die (mysqli_error($con));
    $_SESSION['info'] = 'Disimpan';
            echo "<script>document.location = 'tambah_mp.php';</script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju
    //setelah submit tetap di halaman ini
}else{
    // tidak berhasil submit tetap dihalaman ini
}
?>

