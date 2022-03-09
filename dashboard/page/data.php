<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){
          //menghitung jumlah pesan dari tabel pesan
          $notif= mysqli_query($con, "SELECT Count(id_buat) AS pesan FROM buat_ss")or die (mysqli_error($con));

          //menampilkan data
          $hasil = mysqli_fetch_array($notif);

          //membuat data json
          echo json_encode(array('jumlah' => $hasil['jumlah']));
}
?>