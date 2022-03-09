<?php
  require_once "../../config/config.php";
  if (isset($_SESSION['npk'])){

//mengambil data 5 pesan terbaru 
$sql = mysqli_query($con, "SELECT id_buat FROM buat_ss WHERE nilai <=0 ORDER BY id_buat DESC limit 2");
$result = array();

while ($row = mysqli_fetch_assoc($sql)) {
    $data[] = $row;
}
}
echo json_encode(array("result" => $data));
?>