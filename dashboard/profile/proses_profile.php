<?php
  require_once "../../config/config.php";
  if (isset($_POST['dpf'])) {
    $fungsion = $_POST["dpf"];

    $section = "select * from section where id_dept_fungsion = '$fungsion'";
    $hasil = mysqli_query($con, $section);
    while ($sc = mysqli_fetch_array($hasil)) {
        ?>
        <option value="<?php echo  $sc['id_section']; ?>"><?php echo $sc['nama_section']; ?></option>
        <?php
    }
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
}else{
    echo $_GET["dpf"];
}
if(isset($_GET['bsimpan'])) //menghubungkan tombol submit   
    {
        
        $simpan = mysqli_query($con, "UPDATE karyawan SET jabatan = '$_GET[tjabatan]', dept = '$_GET[tdept]', dept_fungsion = '$_GET[dpf]',   
                                             section = '$_GET[section]', `group` = '$_GET[grp]', shift = '$_GET[tshift]', section = '$_GET[section]', `status` = '$_GET[tstatus]'
                                              WHERE npk = '$_GET[tnpk]'")or die(mysqli_error($con));
  // memasukan data inputan ke databases
        $_SESSION['info'] = 'Disimpan';
        if($simpan){
            echo "<script>document.location = 'data_mp.php';</script>";
// memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju
        }
        else
        {
        // echo "<script>alert('simpan data gagal!'); 
        //       </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju            
        }
  }
?>