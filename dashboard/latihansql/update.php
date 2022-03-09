<?PHP
$server="localhost";
$user="root";
$password="";
$dbname="BPMI";
$conn= new mysqli($server,$user,$password,$dbname);

$karyawan= mysqli_query($conn,'update karyawan set jabatan="SPV" where npk=37290');
?>
