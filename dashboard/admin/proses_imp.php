
<?php
require_once "../../config/config.php";
require '../../phpspreadsheet/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
$file_names = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 
if(isset($_POST['bsimpan']))
{
    if(isset($_FILES['import']['name']) && in_array($_FILES['import']['type'], $file_names)) {
    
        $arr_file = explode('.', $_FILES['import']['name']);
        $extension = end($arr_file);
    
        if('csv' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
    
        $spreadsheet = $reader->load($_FILES['import']['tmp_name']);
        
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        mysqli_query($con,"DELETE FROM pesan");
        for($i = 1;$i < count($sheetData);$i++)
        {
            $idpesan = $sheetData[$i]['1'];
            $pesan = $sheetData[$i]['2'];
            mysqli_query($con,"INSERT INTO pesan (id_pesan,pesan) VALUES ('$idpesan','$pesan')");
        }
        $_SESSION['info'] = 'Data Berhasil di Upload'; //session yang harus dibuat yang nanti ditangkaps
        //   echo "<script>document.location.href='../my_achiev/my_aciev.php'</script>";
        }else{
        //   echo "<script>alert ('File Upload terlalu besar, Max 3 MB') </script>";
        }
        // unlink($_FILES['import']['name']);
        // header("Location: preview_import.php"); 
        
    
}
?>
