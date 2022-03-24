<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="gaya.css">
        <title>Soal 4</title>
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
      <h2>Soal 4 : Menghitung Bangun Ruang</h2>
      <h3>Pilih bangun Ruang yang akan dihitung luas, Keliling, dan Volume :</h3></div>
      <img src="Image/bangunruang.png" alt="icon"> <br><br><br> 
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method ="post">
        <select name="bangunRuang" style="width:150px; background-color:red; height:25px; color: white;">
            <option value="Balok">Balok</option>
            <option value="Tabung">Tabung</option>
            <option value="Bola">Bola</option>
            <option value="Kerucut">Kerucut</option>
        </select>
        <br><br>
        <button type="submit" name="submit" >Submit</button>
    </form>
    <?php

$bangun = $hitung = $jarijari = $panjang = $lebar = $tinggi  = $hitungBalok = $hasilAkhir = "";

if ($_SERVER["REQUEST_METHOD"]=="GET"){
    if (isset($_GET["panjang"])) {
        $panjang = $_GET["panjang"];
        $lebar = $_GET["lebar"];
        $tinggi = $_GET["tinggi"];
        $hitung = hitungBalok($panjang,$lebar,$tinggi);
    }

    if (isset($_GET["jarijariT"])) {
        $jarijari = $_GET["jarijariT"];
        $tinggi = $_GET["tinggiT"];
        $hitung = hitungTabung($jarijari,$tinggi);
    }

    if (isset($_GET["jarijariB"])) {
        $jarijari = $_GET["jarijariB"];
        $hitung = hitungBola($jarijari);
    }

    if (isset($_GET["jarijariK"])) {
        $jarijari = $_GET['jarijariK'];
        $tinggi = $_GET['tinggiK'];
        $hitung = hitungKerucut($jarijari,$tinggi);
    }
}

if(isset($_POST['submit'])){
    $bangun = $_POST["bangunRuang"];
    if ($bangun == "Balok") {?>
        <h1> Balok </h1>
        <img src="Image/Balok.jpg" alt="balok" style="width:200px"><br><br>
        <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
        Masukkan Panjang : <input type="number" name = "panjang"><br><br>
        Masukkan Lebar : <input type="number" name = "lebar"><br><br>
        Masukkan Tinggi : <input type="number" name = "tinggi"><br><br>
        <button type="submit" name="insert" >Insert</button>
        </form>
    <?php    

    }elseif ($bangun == "Tabung") {?>
        <h1> Tabung </h1>
        <img src="Image/Tabung.jpg" alt="tabung" style="width:200px"><br><br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
        Masukkan Jari - jari : <input type="number" name = "jarijariT"><br><br>
        Masukkan Tinggi : <input type="number" name = "tinggiT"><br><br>
        <button type="submit" name="insert" >Insert</button>
        </form>
    <?php
    
    }elseif ($bangun == "Bola") {?>
        <h1> Bola</h1>
        <img src="Image/Bola.png" alt="bola" style="width:200px"><br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
        <table>
            <tr>
                <td>Masukkan Jari - jari  </td>
                <td>: <input type="number" name = "jarijariB"></td>
            </tr>
        </table>
            <br><br>
            <button type="submit" name="insert" >Insert</button>
        </form>
    <?php 
      
    }elseif ($bangun == "Kerucut") {?>
        <h1> Kerucut </h1>
        <img src="Image/Kerucut.jpg" alt="kerucut" style="width:200px"><br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
        <table>
            <tr>
                <td>Masukkan Jari - jari  </td>
                <td>: <input type="number" name = "jarijariK"></td>
            </tr><br><br>
            <tr>
                <td>Masukkan tinggi  </td>
                <td>: <input type="number" name = "tinggiK"></td>
            </tr>
        </table>
        <br><br>
        <button type="submit" name="insert" >Insert</button>
        </form>
    <?php  
    }
}

//Balok
function hitungBalok($panjang,$lebar,$tinggi){
    if(is_numeric($panjang)){
        if(is_numeric($lebar)){
            if(is_numeric($tinggi)){
        $luasBalok = 2 * ($panjang*$lebar + $panjang*$tinggi + $lebar*$tinggi);
        $kelilingBalok = 4 * ($panjang + $lebar + $tinggi);
        $volumeBalok = $panjang * $lebar * $tinggi;
        $hasilAkhir = "<h1>Hasil Perhitungan</h1><br><b>Luas Balok </b> adalah $luasBalok <br> <b>Keliling Balok</b> adalah $kelilingBalok <br> <b>Volume Balok</b> adalah $volumeBalok"; 
    }else {
        $hasilAkhir = "Harus memasukkan panjang";
        }
    }else {
        $hasilAkhir = "Harus memasukkan lebar";
        }
    }else {
        $hasilAkhir = "Harus memasukkan tinggi";
    }return $hasilAkhir;
}

//Tabung
function hitungTabung($jarijari,$tinggi){
    if (is_numeric($jarijari)){
        if (is_numeric($tinggi)){
        $luasTabung = $jarijari * $jarijari * 2 * 22/7;;
        $kelilingTabung =  $jarijari * 2 * 22/7;
        $volumeTabung =   $jarijari * $jarijari * $tinggi * 22/7 ;
        $hasilAkhir = "<h1>Hasil Perhitungan</h1><br><b>Luas Tabung </b> adalah $luasTabung <br> <b>Keliling Tabung</b> adalah $kelilingTabung <br> <b>Volume Tabung</b> adalah $volumeTabung";
    
    }else {
        $hasilAkhir = "Harus memasukkan jari jari";
        }
    }else {
        $hasilAkhir = "Harus memasukkan tinggi";
    }return $hasilAkhir;
}
//Bola
function hitungBola($jarijari){
    if (is_numeric($jarijari)) {
            $luasBola = $jarijari * $jarijari * 4 * 22/7;
            $kelilingBola = $jarijari *$jarijari * $jarijari * 4/3 * 22/7;
            $volumeBola = $jarijari * $jarijari * 4/3 * 22/7;
            $hasilAkhir = "<h1>Hasil Perhitungan</h1><br><b>Luas Bola </b> adalah $luasBola <br> <b>Keliling Bola</b> adalah $kelilingBola <br> <b>Volume Bola</b> adalah $volumeBola";
        }else {
            $hasilAkhir = "Harus memasukkan jari jari";
    }return $hasilAkhir;
}

//Kerucut
function hitungkerucut($jarijari,$tinggi){
    if (is_numeric($jarijari)) {
        if (is_numeric($tinggi)) {
                $luasKerucut =  $jarijari * $jarijari * 22/7;
                $kelilingKerucut = $jarijari * 2 * 22/7; 
                $volumeKerucut = $jarijari * $jarijari * $tinggi * 22/7 * 1/3;
                $hasilAkhir = "<h1>Hasil Perhitungan</h1><br><b>Luas Kerucut </b> adalah $luasKerucut <br> <b>Keliling Kerucut</b> adalah $kelilingKerucut <br> <b>Volume Kerucut</b> adalah $volumeKerucut";
            }else {
                $hasilAkhir = "Harus memasukkan sisi jari jari";
            }
        }else {
            $hasilAkhir = "Harus memasukkan tinggi";
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