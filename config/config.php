<?PHP
date_default_timezone_set ('asia/jakarta');
session_start ();
$con=mysqli_connect('localhost','root','','BPMIS');
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
?>