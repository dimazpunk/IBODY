<?php
  require_once "../../config/config.php";
if(isset($_GET['id'])) //menghubungkan tombol submit  
    {
      $delete = mysqli_query($con, "DELETE FROM dept WHERE id_dept ='$_GET[id]'")or die (mysqli_error($con));
      $deletes = mysqli_query($con, "DELETE FROM dept_fungsion WHERE id_dept_fungsion ='$_GET[id]'")or die (mysqli_error($con));
  // memasukan data inputan ke databases
        if($delete){
          $_SESSION['info'] = 'Dihapus'; 
        echo "<script> 
              document.location = 'org_dept.php';
        </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju
        }
        else
        {
        echo "<script>alert('delete data ss gagal, silahkan coba lagi'); 
              document.location = 'org_dept.php';
               </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju            
        }
        if($deletes){
            $_SESSION['info'] = 'Dihapus'; 
          echo "<script> 
                document.location = 'org_dept.php';
          </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju
          }
          else
          {
          echo "<script>alert('delete data ss gagal, silahkan coba lagi'); 
                document.location = 'org_dept.php';
                 </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju            
          }
    } 
?>