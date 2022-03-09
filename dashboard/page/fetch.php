<?php
//fetch.php;
// if(isset($_POST["view"]))
// {
 require_once "../../config/config.php";
 $_POST["view"] = 1;
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE buat_ss SET notif=1 WHERE notif=0";
  mysqli_query($con, $update_query);
 }
 $notif = "SELECT * FROM buat_ss ORDER BY id_buat DESC LIMIT 10";
 $result = mysqli_query($con, $notif);
 $output = '';
 echo $_POST["view"];
 if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_array($result)){
   $output .= '
   <li>
    <a href="#">
     <strong>'.$row["npk"].'</strong><br />
     <small><em>'.$row["judul"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $notif_1 = "SELECT * FROM buat_ss WHERE notif=0";
 $result_1 = mysqli_query($con, $notif_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo $count;
 echo json_encode($data);
// }

?>
