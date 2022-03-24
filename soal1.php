<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Soal 1</title>
    <link rel="stylesheet" href="gaya.css">
    <style>
        .error{color:red;}
    </style>
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
    <?php

    $nama = $nim = $jenisKelamin = $jurusan = $IPK = $preIPK = $print = $arrayNilai = $m1 = $m2 = $m3 = $m4 = $m5 = "";
    $namaErr = $nimErr = $jurusanErr = $m1Err = $m2Err = $m3Err = $m4Err = $m5Err = $genderErr = "";
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        
        // validasi nama
        if(empty($_POST["nama"])){
            $namaErr = "Name required";
        }else{
            $nama = $_POST["nama"];
            if(!preg_match("/^[a-zA-Z' ]*$/", $nama)){
                $namaErr = "Invalid Charcter";
                $nama = "";
            }
        }

        //validasi nim
        if(empty($_POST["nim"])){
            $nimErr = "Nim required";
        }else {
            $nim = $_POST["nim"];
            if (strlen($nim) !=8 ) {
                $nimErr = "NIM harus 8 karakter";
                $nim = "";
            }elseif(!preg_match("/^[0-9]*$/", $nim)){
                $nimErr = "NIM salah";
                $nim = "";
            }            
        }

        if(empty($_POST["jenisKelamin"])){
            $genderErr = "gender required";
        }else{
            $jenisKelamin = $_POST["jenisKelamin"];
        }

        //validasi jurusan
        if(empty($_POST["jurusan"])){
            $jurusanErr = "jurusan required";
        }else{
            $jurusan = $_POST["jurusan"];
        }
        
        // validasi matkul
        if(empty($_POST["m1"])){
            $m1Err = "m1 required";
        }else{
            $m1 = validasi_matkul($_POST["m1"]);
        }

        if(empty($_POST["m2"])){
            $m2Err = "m2 required";
        }else{
            $m2 = validasi_matkul($_POST["m2"]);
        }
        if(empty($_POST["m3"])){
            $m3Err = "m3 required";
        }else{
            $m3 = validasi_matkul($_POST["m3"]);
        }
        if(empty($_POST["m4"])){
            $m4Err = "m4 required";
        }else{
            $m4 = validasi_matkul($_POST["m4"]);
        }
        if(empty($_POST["m5"])){
            $m5Err = "m5 required";
        }else{
            $m5 = validasi_matkul($_POST["m5"]);
        }


        $arrayNilai = [$m1,$m2,$m3,$m4,$m5];
        $IPK = hitungIPK($arrayNilai);
        $preIPK = predikatIPK($IPK);
        $print = hasil($nama, $nim, $jenisKelamin, $jurusan, $arrayNilai, $IPK, $preIPK);
        
    }

    // fungsi hitung IPK
    function hitungIPK($arrayNilai){       
        $total = 0;
        
        foreach ($arrayNilai as $key => $Value) {
            if (is_numeric ($Value) ) {
                foreach ($arrayNilai as $key) {
                $total = $total + $key;
                }
                $bobot = 3 * $total;
                $IPK = $bobot/15;
                return $IPK;

                $predikat = predikatIPK($IPK);
            }
        }
    }

    // fungsi predikat IPK
    function predikatIPK($IPK){
        if ($IPK < 2) {
            $hasil = "Maaf, anda belum lulus";
        }elseif ($IPK < 2.76) {
            $hasil = "Cukup";
        }elseif ($IPK < 3.01) {
            $hasil = "Memuaskan";
        }elseif ($IPK < 3.51) {
            $hasil = "Sangat memuaskan";
        }elseif ($IPK < 3.76) {
            $hasil = "Dengan pujian (Cumlaude)";
        }elseif ($IPK <= 4) {
            $hasil = "Dengan pujian tertinggi (Summa Cumlaude)";
        }
        return $hasil;
    }

    // filter validasi gender
    function validasi_gender($data){
        if(!isset($data) || !$data){
            $data = 'Pilih jenis kelamin';
        }return $data;
    }

    //filter validasi matkul
    function validasi_matkul($data){
        
        if (!preg_match("/^[a-eA-E ]*$/",$data)) {
            $data = "Nilai salah"; 
                  
        }elseif (strlen($data) !=1 ) {
            $data = "Nilai salah";
            
        }else {
            if ($data == "A" || $data == "a") {
                $data = 4;
                
            }elseif ($data == "B" || $data == "b") {
                $data = 3;
                
            }elseif ($data == "C" || $data == "c") {
                $data = 2;
                
            }elseif ($data == "D" || $data == "d") {
                $data = 1;
                
            }elseif ($data == "E" || $data == "e") {
                $data = 0;
                
            }
        } return $data;
        
    }

    //output
    function hasil($nama, $nim, $jenisKelamin, $jurusan, $arrayNilai, $IPK, $preIPK){
        $teks = "Nama : $nama <br>
        NIM : $nim <br>
        Jenis Kelamin : $jenisKelamin <br>
        Jurusan : $jurusan <br>
        Mata Kuliah 1 : $arrayNilai[0]<br>
        Mata Kuliah 2 : $arrayNilai[1]<br>
        Mata Kuliah 3 : $arrayNilai[2]<br>
        Mata Kuliah 4 : $arrayNilai[3]<br>
        Mata Kuliah 5 : $arrayNilai[4]<br>
        IPK : $IPK <br>
        Predikat IPK : $preIPK";
        return $teks;
    }



    ?>
  <div class="container">
    <div class="content">
        <br><br><br><br>
        <div style="text-align:center;"><h2>Soal 1 : Menghitung IPK</h2></div>
        <img src="Image/topiwisuda.png" alt="topiwisuda" width="30%">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post" class="table_soal1">
            <table class="soal1">
                <tr>
                    <td class = "lebarTd">Nama</td>
                    <td><input type="text" placeholder="Masukkan nama" name="nama"></td>
                    <td><span class="error">* <?php echo $namaErr;?></span></td>
                </tr>
                <tr>
                    <td class = "lebarTd">NIM</td>
                    <td><input type="text" placeholder="Masukkan NIM" name="nim"></td>
                    <td><span class="error">* <?php echo $nimErr;?></span></td>
                </tr>
                <tr>
                    <td class = "lebarTd">Jenis Kelamin</td>
                    <td><input type="radio" name="jenisKelamin" value="laki - laki">laki - laki</td>               
                    <td><span class="error">* <?php echo $genderErr ;?></span></td>              
                </tr>
                <tr>
                    <td><td><input type="radio" name="jenisKelamin" value="Perempuan">Perempuan</td></td>
                </tr>
                <tr>
                    <td class = "lebarTd">Jurusan</td>
                    <td>
                        <select name="jurusan" id="jurusan" placeholder = "Silahkan pilih">
                        <option selected="selected">Pilih Jurusan</option>    
                        <option value="D3 Teknik Sipil">D3 Teknik Sipil</option>
                            <option value="D3 Teknik Sipil">D3 Teknik Sipil</option>
                            <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                            <option value="D3 Teknik Mesin">D3 Teknik Mesin</option>
                            <option value="D3 Akuntansi">D3 Akuntansi</option>
                            <option value="D3 Teknik Telekomunikasi">D3 Teknik Telekomunikasi</option>
                        </select>
                    </td>
                    <td><span class="error">* <?php echo $jurusanErr;?></span></td>
                </tr>
                <tr>
                    <td class = "lebarTd">Mata Kuliah 1</td>
                    <td><input type="text" placeholder="masukkan nilai" name="m1"></td>
                    <td><span class="error">* <?php echo $m1Err;?></span></td>
                </tr>
                <tr>
                    <td class = "lebarTd">Mata Kuliah 2</td>
                    <td><input type="text" placeholder="masukkan nilai" name="m2"></td>
                    <td><span class="error">* <?php echo $m2Err;?></span></td>
                </tr>
                <tr>
                    <td class = "lebarTd">Mata Kuliah 3</td>
                    <td><input type="text" placeholder="masukkan nilai" name= "m3"></td>
                    <td><span class="error">* <?php echo $m3Err;?></span></td>
                </tr>
                <tr>
                    <td class = "lebarTd">Mata Kuliah 4</td>
                    <td><input type="text" placeholder="masukkan nilai" name= "m4"></td>
                    <td><span class="error">* <?php echo $m4Err;?></span></td>
                </tr>
                <tr>
                    <td class = "lebarTd">Mata Kuliah 5</td>
                    <td><input type="text" placeholder="masukkan nilai" name="m5"></td>
                    <td><span class="error">* <?php echo $m5Err;?></span></td>
                </tr>
                <tr>
                    <td><br><button type="submit" name="submit" >Submit
                    </button>
                    </td>
                </tr>
            </table>
            </form><br><br><br>
        <?php
            echo "$print<br>";
            // echo "$arrayNilai[0]";

        ?><br><br><br>
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
                <li><a href="https://www.polines.ac.id/">Polines</a></li>
            </ul>
        </div>
    </div>
  </body>
</html>
