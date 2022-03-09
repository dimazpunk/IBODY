
<?PHP
$server="localhost";
$user="root";
$password="";
$dbname="BPMI";
$conn= new mysqli($server,$user,$password,$dbname);


$karyawan= mysqli_query($conn,'insert into karyawan 
            values (37290,"PURNOMO","1991-05-14","2010-10-15","B1","BPD","BPD-PM","BPD-PM-QS","N","TL","P")');
?>