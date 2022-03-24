<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="gaya.css">
        <title>Soal 3</title>
    </head>
    <body>

        <div class="header">
            <div class="Logo">
            <img src="Image/Logopolines.png" alt="Polines" width="60%" height="auto">
            </div>
            <div class="nav">
                <ul>
                    <li><a href="Soal4.php">Soal 4</a></li>
                    <li><a href="soal3.php">Soal 3</a></li>
                    <li><a href="Soal2.php">Soal 2</a></li>
                    <li><a href="soal1.php">Soal 1</a></li>
                </ul>
            </div>   
        </div>
        <div class="container">
        <div class="content">
        <div style="text-align:center;"><br><br><br><br>
        <h2>Soal 3 : Menghitung Bangun Datar</h2>
        <h3>Pilih bangun datar yang akan dihitung luas dan kelilingnya</h3></div>
        <img src="Image/bangundatar.png" alt="icon"> <br><br><br>   
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <select name="bangunDatar" style="width:150px; background-color:red; color: white; height:25px;">
                    <option value="lingkaran">Lingkaran</option>
                    <option value="persegi">Persegi</option>
                    <option value="segitiga">Segitiga</option>
                    <option value="jajargenjang">Jajar - Genjang</option>
                    <option value="layanglayang">Layang - Layang</option>
                </select>
                <br><br>
                <button type="submit" name="submit" >Submit
                </button>
            </form>
            <?php

            $bangun = $hitung = $jariJari = $sisi = $alas = $tinggi = $d1 = $d2 = $jariJari = $hitungLingkaran = $hasilAkhir = "";
            
            if ($_SERVER["REQUEST_METHOD"]=="GET"){
                if (isset($_GET["jariJari"])) {
                    $jariJari = $_GET["jariJari"];
                    $hitung = hitungLingkaran($jariJari);
                }

                if (isset($_GET["sisi"])) {
                    $sisi = $_GET["sisi"];
                    $hitung = hitungPersegi($sisi);
                }

                if (isset($_GET["alasS"])) {
                    $alas = $_GET["alasS"];
                    $tinggi = $_GET['tinggiS'];
                    $hitung = hitungSegitiga($alas,$tinggi);
                }

                if (isset($_GET["tinggi"])) {
                    $alas = $_GET['alas'];
                    $tinggi = $_GET['tinggi'];
                    $miring = $_GET['miring'];
                    $hitung = hitungjGenjang($alas,$tinggi,$miring);
                }

                if (isset($_GET["d1"])) {
                    $d1 = $_GET['d1'];
                    $d2 = $_GET['d2'];
                    $a = $_GET['a'];
                    $b = $_GET['b'];
                    $hitung = hitungLayang($d1, $d2, $a, $b);
                }
            }
            
            if(isset($_POST['submit'])){
                $bangun = $_POST["bangunDatar"];
                if ($bangun == "lingkaran") {?>
                    <h1> Lingkaran </h1>
                    <img src="Image/lingkaran.jpeg" alt="Lingkaran" style="width:100px"><br><br>
                    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
                    Masukkan jari - jari : <input type="number" name = "jariJari"><br><br>
                    <button type="submit" name="insert" >Insert</button>
                    </form>
                <?php    

                }elseif ($bangun == "persegi") {?>
                    <h1> Persegi </h1>
                    <img src="Image/persegi.jpeg" alt="Persegi" style="width:100px"><br><br>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
                    Masukkan sisi : <input type="number" name = "sisi"><br><br>
                    <button type="submit" name="insert" >Insert</button>
                    </form>
                <?php
                
                }elseif ($bangun == "segitiga") {?>
                    <h1> Segitiga (siku - siku)</h1>
                    <img src="Image/segitiga.jpeg" alt="Segitiga"><br>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
                    <table><tr><td>Masukkan alas  </td>
                    <td>: <input type="number" name = "alasS"></td></tr><br><br>
                    <tr><td>Masukkan tinggi  </td>
                    <td>: <input type="number" name = "tinggiS"></td></tr></table><br><br>
                    <button type="submit" name="insert" >Insert</button>
                    </form>
                <?php 
                
                }elseif ($bangun == "jajargenjang") {?>
                    <h1> Jajar genjang </h1>
                    <img src="Image/jajargenjang.jpeg" alt="Jajar Genjang" style="width:150px"><br>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
                    <table><tr><td>Masukkan alas  </td>
                    <td>: <input type="number" name = "alas"></td></tr><br><br>
                    <tr><td>Masukkan tinggi  </td>
                    <td>: <input type="number" name = "tinggi"></td></tr><br><br>
                    <tr><td>Masukkan sisi miring  </td>
                    <td>: <input type="number" name = "miring"></td></tr></table><br><br>
                    <button type="submit" name="insert" >Insert</button>
                    </form>
                <?php  
                
                }elseif ($bangun == "layanglayang"){?>
                    <h1> Layang - Layang </h1>
                    <img src="Image/layang.jpeg" alt="Layang - Layang">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
                    <table><tr><td>Masukkan diagonal 1  </td>
                    <td>: <input type="number" name = "d1"></td></tr><br><br>
                    <tr><td>Masukkan diagonal 2  </td>
                    <td>: <input type="number" name = "d2"></td></tr><br><br>
                    <tr><td>Masukkan sisi miring atas  </td>
                    <td>: <input type="number" name = "a"></td></tr><br><br>
                    <tr><td>Masukkan sisi miring bawah  </td>
                    <td>: <input type="number" name = "b"></td></tr></table><br><br>
                    <button type="submit" name="insert" >Insert</button>
                    </form>
                <?php 
        
                }                
            }
            
            //lingkaran
            function hitungLingkaran($data){
                if(is_numeric($data)){
                    $luasLingkaran = $data * $data * 3.14;
                    $kelilingLingkaran = $data * 2 * 3.14;
                    $hasilAkhir = "<h1>Hasil Perhitungan</h1><br><b>Luas lingkaran </b> adalah $luasLingkaran <br> <b>Keliling lingkaran</b> adalah $kelilingLingkaran";
                    
                }else {
                    $hasilAkhir = "Harus memasukkan jari - jari";
                }return $hasilAkhir;
            }
            //persegi
            function hitungPersegi($data){
                if (is_numeric($data)){
                    $luasPersegi = $data * $data;
                    $kelilingPersegi = $data * 4;
                    $hasilAkhir = "<h1>Hasil Perhitungan</h1><br><b>Luas Persegi </b> adalah $luasPersegi <br> <b>Keliling Persegi</b> adalah $kelilingPersegi";
                
                }else {
                    $hasilAkhir = "Harus memasukkan sisi";
                }return $hasilAkhir;
            }
            //segitiga
            function hitungSegitiga($alas,$tinggi){
                if (is_numeric($alas)) {
                    if (is_numeric($tinggi)){
                        $luasSegitiga = $alas * $tinggi /2;
                        $sisiMiring = (($alas * $alas) + ($tinggi * $tinggi));
                        $sisiMiring2 = pow($sisiMiring, 0.5);
                        $kelilingSegitiga = $alas + $tinggi + $sisiMiring2;
                        $hasilAkhir = "<h1>Hasil Perhitungan</h1><br><b>Luas Segitiga </b> adalah $luasSegitiga <br> <b>Keliling Segitiga</b> adalah $kelilingSegitiga";
                    }else {
                        $hasilAkhir = "Harus memasukkan tinggi";
                    }
                }else {
                    $hasilAkhir = "Harus memasukkan alas";
                }return $hasilAkhir;
            }

            //jajar genjang
            function hitungjGenjang($alas,$tinggi,$miring){
                if (is_numeric($alas)) {
                    if (is_numeric($tinggi)) {
                        if (is_numeric($miring)){
                            $luasJG = $alas * $tinggi;
                            $kelilingJG = 2 * ($alas + $miring); 
                            $hasilAkhir = "<h1>Hasil Perhitungan</h1><br><b>Luas Jajar Genjang </b> adalah $luasJG <br> <b>Keliling Jajar Genjang</b> adalah $kelilingJG";
                        }else {
                            $hasilAkhir = "Harus memasukkan sisi miring";
                        }
                    }else {
                        $hasilAkhir = "Harus memasukkan tinggi";
                    }           
                }else {
                    $hasilAkhir = "Harus memasukkan alas";
                }return $hasilAkhir;
            }

            //Layang - layang
            function hitungLayang($d1, $d2, $a, $b){
                if (is_numeric($d1)) {     
                    if (is_numeric($d2)){
                        if (is_numeric($a)){
                            if (is_numeric($b)){
                                $luasLayang = $d1 * $d2 / 2;
                                $kelilingLayang = 2* ($a + $b);
                                $hasilAkhir = "<h1>Hasil Perhitungan</h1><br><b>Luas Layang - Layang</b> adalah $luasLayang <br> <b>Keliling Layang - Layang</b> adalah $kelilingLayang";
                            }else {
                                $hasilAkhir = "Harus memasukkan sisi miring bawah";
                            }
                        }else {
                            $hasilAkhir = "Harus memasukkan sisi miring atas";
                        }
                    }else {
                        $hasilAkhir = "Harus memasukkan diagonal 2";
                    }          
                }else {
                    $hasilAkhir = "Harus memasukkan diagonal 1";
                }return $hasilAkhir;
            }

            ?>
            <br><br><br><br><br>
            <?php
                echo $hitung;
                echo "<br><br>";
            ?>
        </div>
        </div>
        <div class="footer">
            <div class="Logo">
            <img src="Image/Logopolines.png" alt="Polines" width="60%" height="auto">
            </div>
            <div class="nav">
                <ul>
                    <li><a href="bukuTamu.php">Buku Tamu</a></li>
                    <li><a href="Biodata.php">Anggota Kelompok</a></li>
                    <li><a href="https://www.polines.ac.id">Polines</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>