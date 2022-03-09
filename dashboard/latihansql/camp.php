<?php 
    //nilaiku = 60
    // FRM = 1 - 58 = 50.000
    // SPV = 59 - 79 = 100.000
    // MNG = 80 - 90 = 150.000
    // DIV = 91 - 100 = 300.000 dan A3 REPORT
    $nilaiku = 60; // tidak menggunakan tanda petik dua karena termasuk dalam INT
    $report = "A3"; // Menggunakan tanda petik dua karena termasuk dalam text
    if ($nilaiku >= 91 AND $nilaiku <=100){
        if ($report == "A3"){ // nilai == karena perbandingan nilai jika hanya = makan nilai variabelnya akan tetap A3
            echo 300000;
        }else{
            echo 200000;
        }
    }elseif ($nilaiku >=80){
        echo 150000; // tidak menggunakan titik karena jika menggunakan titik makan tampil 150 aja
    }elseif ($nilaiku >=59){
        echo 100000;
    }elseif ($nilaiku >=1){
        echo '50.000'; // menggunakan tanda petik dan titik karena termasuk text sehingga tampilannya 50.000
    }else{
        echo "nilai tidak valid";
    }
?>
</br>
<?php
    // lantai 1 = pagi
    // lantai 2 = malam
    // welding = area x
    // assy = area y
    // nomor parkir = 1 - 5 sesuai dengan NPK
    // Casenya adalah ada karyawan shift pagi orang assy npk 2 dimanakah dia parkir?
    // jawabannya = parkir di lantai 1 area y dan nomor 2
    $shift = "pagi";
    $x = "welding";
    $dept = "welding";
    $npk = 2;
    if ($shift =="pagi"){
        echo "l1";
    }else{
        echo "l2";
    }
    if ($dept==$x){
        echo "x" . $npk;
    }else{
        echo "y";
    }
?>
</br>
<?php
    // si fulan pergi ke fm ada promo kalau belanja diatas 25000
    // dan bisa dapet promo 1) dapet kantong kertas 2) dapet beng beng
    // detail belanjaan 
    // a) kopi = 15000
    // b) Top = 5000
    // c) sabun = 3000
    // d) sampo = 12000
    // petugas harus melihat kalau bawa tas dapetnya bengbeng kalau tidak bawa tas dapetnya bisa milih kantong kertas/ beng beng
    $kopi = 15000;
    $top = 5000;
    $sabun =3000;
    $sampo =12000;
    $promo = 25000;
    $belanja = $kopi + $top + $sabun + $sampo;
    $tas = "bawa";
    if ($belanja > $promo){
        if ($tas == "bawa"){
            echo " bengbeng";
        }else{
            echo "milih kantong/bengbeng";
        }
    }else {
        echo "zonk";
    }
?>
</br>
<?php
    //pedagang ke pasar beli beras kalau belinya dibawah 2 kantong maka di naikin motor
    // kalau belinya lebih dari 2 maka naik becak
    // tapi karena kendaraan susah maka bisa naik bajaj gas atau bajai bensin
    // bajai gas maksimal 3 kantong
    // bajaj bensin maksimal 5 kantong
    $beli = 4;
    $kendaraan = "susah";
    if ($beli >2 ){
        if ($kendaraan == "susah"){
           if ($beli <=3){
               echo " bajaj gas";
           }else {
               echo " bajaj bensin";
           }
        }else {
            echo "becak";
        }
    }else{
        echo "motor";
    }
?>
</br>
<?php
    //mas purnomo bertugas membuat sistem penilaian
    //terdapat 2 jurusan yaitu IPA dan IPS
    //jurusan IPA apabila konsentrasi BIOLOGI : (Nilai 1 + nilai 2 + nilai 3 + nilai 4):4 
    //jika jurusan KIMIA ada dua pilihan ORGANIK dan ANORGANIK penilaian sama dengan BIOLOGI bedanya yaitu
    //jika KIMIA ORGANIK ditambah grade (A/B/C) jika nilai dibawah
    //Grade C = Kurang dari 50 ( 0 - 49)
    //Grade B = Sampai 80 ( 50 - 80)
    //Grade A = diatas 80 ( 81 - 100)
    //Jika KIMIA ANORGANIK terdapat 2 Grade
    //Grade B = 1 - 69
    //Grade A = 70 - 100
    //Jurusan IPS konsentrasi SEJARAH & SOSIOLOGI
    //Sistem penilaian mengambil nilai tertinggi dari 4 nilai yang ada
    //Di sosiologi nilai tertinggi ditambahkan 1 poin

    $x = "ips";
    $a = 65;
    $b = 65;
    $c = 70;
    $d = 65;
    $nilai = ($a + $b + $c + $d)/ 4;
    $konsentrasi = "sosiologi";   

    if ($x== "ipa"){
        if ($konsentrasi == "biologi"){
            echo $nilai ;
        }else{
            echo "kimia";
        }
            if($konsentrasi=="organik"){
                if($nilai < 50){     // jika menampilkan if menjorok ke dalam / bagian dari if atas maka elseif juga sejajar dengan if dalam
                    echo "C";
                }elseif($nilai >= 50 AND $nilai <=80){
                    echo "B";
                }elseif ($nilai > 80){
                    echo "A";
                }else{
                    echo "nilai tidak valid";
                }
            }else{
                echo "anorganik";
                if($nilai <= 69){
                    echo "B";
                }elseif($nilai >= 70){
                    echo "A";
                }else{
                    echo "nilai tidak valid";
                }
            }
    }else{
        echo "ips";
        if ($konsentrasi == "sejarah"){
            if ($a > $b AND $a > $c AND $a >$d){  // menampilkan nilai tertinggi
                echo $a;
            }elseif($b > $a AND $b > $c AND $a > $c){
                echo $b;
            }elseif ($c > $a AND $c > $b AND $c >$d){
                echo $c;
            }elseif ($d > $a AND $d > $b AND $d > $c){
                echo $d;
            }else{
                echo "no valid";
            }
        }else{
            if ($a > $b AND $a > $c AND $a >$d){
                echo ($a + 1);
            }elseif($b > $a AND $b > $c AND $a > $c){ // menampilkan nilai tertinggi
                echo ($b + 1);
            }elseif ($c > $a AND $c > $b AND $c >$d){
                echo ($c + 1);
            }elseif ($d > $a AND $d > $b AND $d > $c){
                echo ($d + 1);
            }else{
                echo "no valid";           
            }
        }
    }
// array ($a, $b, $c, $d)
?>