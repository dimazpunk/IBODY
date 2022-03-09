
<?PHP
$server="localhost";
$user="root";
$password="";
$dbname="BPMI";
$conn= new mysqli($server,$user,$password,$dbname);


$buat_ss= mysqli_query($conn,'insert into buat_ss 
            values ("Body/2021-03/27837/006",27837,"B1","BPD-PM-QS","N","Membuat Cutting Sticker","2021-03-11","2021-03-13","E","2021-03-16","tidak ada label","foto1","add label","foto2","memberikan kesan indah","foto3",80,"100%")');

?>