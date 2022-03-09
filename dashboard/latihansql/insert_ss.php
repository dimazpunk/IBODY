
<?php
$server="localhost";
$user="root";
$password="";
$dbname="BPMI";
$conn= new mysqli($server,$user,$password,$dbname);


$buat_ss= mysqli_query($conn,'INSERT INTO buat_ss 
            values ("Body/2021-04/37290/001",37290,"B1","BPD-PMD-QR","N","Membuat program SS Online","2021-04-10","2021-04-13","P","2021-04-16","SS Manual","foto1","sistem digital","foto2","digital web dengan kemudahan akses","foto3",99,"100%")');


?>