<?PHP
$server="localhost";
$user="root";
$password="";
$dbname="BPMI";
$conn= new mysqli($server,$user,$password,$dbname);

$buat_ss= mysqli_query($conn,'update buat_ss set npk="40628" where npk=');
?>
