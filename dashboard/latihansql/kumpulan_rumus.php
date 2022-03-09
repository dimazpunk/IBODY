<?php
//rumus koneksi ke database
    $server ="Localhost"; 
    $user ="root";
    $pass =""; // jika tidak punya password kosongkan saja
    $database ="BPMI"; //Isi dengan nama tabel yang ada di database

    $koneksi = mysqli_connect ($server,$user,$pass,$database) or die (mysqli_error($koneksi)); //or die untuk menampilkan error

    //jika tombol submit di klik
    if(isset($_POST['bsimpan'])) //menghubungkan tombol submit
    {
        $simpan = mysqli_query($koneksi, "INSERT INTO tmhs(nim, nama, alamat,prodi)
                                            VALUES ('$_POST[tnim]'
                                            VALUES '$_POST[tnama]'
                                            VALUES '$_POST[talamat]'
                                            VALUES '$_POST[tprodi]')                                                                                      
                                            "); // memasukan data inputan ke databases
        if($simpan){
            echo "<script>alert('simpan data sukses!'); 
                    document.location='ixxx.php';
                  </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju
        }
        else
        {
            echo "<script>alert('simpan data gagal!'); 
                    document.location='ixxx.php';
                  </script>"; // memunculkan notifikasi dan menghubungkan lokasi page yang akan di tuju            
        }
    }
    //pengujian jika tombol edit di klik
    if(isset($_GET['hal']))
    {
        if($_GET['hal'] =="edit")
        {
            $tampil= mysqli_query($koneksi, "SELECT * FROM tmhs WHERE id_mhs='$_GET[id]'"); // untuk mengambil data dari database sesuai nama tabel di phpmyadmin
            $data= mysqly_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan maka data ditampung kedalam variabel
                $vnim =$data ['nim'];
                $vnama =$data ['nama'];
                $valamat =$data ['alamat'];
                $vprodi =$data ['prodi'];                                                
            }
        }
    }
?>
<div class="card-body">
<form method="post" action="">
    <div class ="form-group">
        <label>Nim</label>
        <input type="text" name="tnim" value="<?=$vnim //menghubungkan ke nilai variabel edit?>" class="form-control" 
            placeholder ="input nim anda disini!" required>
    </div>
</form>
</div>           
<table class = "table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>Alamat</th> 
        <th>Program Study</th>
        <th>Action</th>                                        
    </tr>
    <?php 
        $no=1; // untuk menambah nomer otomatis ($no++;)
        $tampil =mysqli_query ($koneksi, "SELECT * FROM tmhs order by id_mhs desc"); // untuk mengambil data dari database sesuai nama tabel di phpmyadmin
        while($data= mysqli_fetch_array($tampil)):
    ?>  
        <tr>
            <td><?=$no++;?></td>
            <td><?=$data['Nim']//untuk menyambungkan ke database sesuai nama tabel di phpmyadmin?></td>
            <td><?=$data['nama']?></td>
            <td><?=$data['Alamat']?></td> 
            <th><?=$data['prodi']?></td>  
            <td>
                <a href="ixxx.php?hal=edit&id=<?=$data['id_mhs']?>" class="btn btn-succes">edit</a>
                <a href="ixxx.php" class="btn btn-danger">hapus</a>              
            </td>                              
        </tr>            
    <?php endwhile; // menggunakan endwhile karena diatas menggunakan (:)
    ?>
    <button type="submit" class="btn btn-success" name="bsimpan">simpan</button>
    <button type="reset" class="btn btn-success" name="breset">simpan</button>
</table>
<?php
    $sql = mysqli_query ($koneksi, "SELECT max (id) AS maxID FROM transaksi");
    $data = mysqli_fetch_array ($sql);
    $kode = $data ['maxID'];
    $kode++;
    $ket = datae("ymd"); // membuat kode id secara otomatis
    $kode_auto = $ket . sprint ("%03s", $kode);
    echo $kode_auto;
?>

if {// jika akan menghapus data
            $hapus = mysqli_query ($koneksi, "DELETE FROM tmhs WHERE id_mhs='$_GET[id]'");
                if ($hapus){
                    echo "<script> alert ('hapus data sukses!');
                                    document.location='index.php';
                        </script>";
                }
        }    
    // jika akan menampilkan pilihan apakah benar ingin menghapus data ini?
    <td>
        <a href = "index.php?hal=edit&id=<?=$data ['id_mhs']?>" class="btn btn-rose">Edit </a>
        <a href = "index.php?hal=hapus&id=<?=$data ['id_mhs']?>" onclick= "return confirm ('apakah benar akan menghapus data ini')"
                 class="btn btn-danger">hapus </a>
    </td>
