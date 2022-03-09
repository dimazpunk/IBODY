<?php
require_once "../../config/config.php";
if (isset($_SESSION['npk'])){
    // download file pdf
header("Content-Type: application/octet-stream");
$folder = '../../assets/img/product/';
$file = $_GET["file"];
  
header("Content-Disposition: attachment; filename=" . urlencode($file));   
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($file));
  
flush(); // This doesn't really matter.
  
$fp = fopen($folder.$file, "r");
while (!feof($fp)) {
    echo fread($fp, 65536);
    flush(); // This is essential for large downloads
} 
  
fclose($fp); 
}else {
  echo "<script> window.location ='../../login.php';</script>"; 
  }
?>