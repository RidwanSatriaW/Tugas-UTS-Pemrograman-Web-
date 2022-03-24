<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gaya.css">
    <style>
        th{
            border: rgb(255, 255, 255) solid 2px;
            background-color:rgb(18, 18, 18);
        }
        table,tr,td{
            background-color:rgb(18, 18, 18);
            text-align: center;
            border: rgb(255, 255, 255) solid 2px;
            padding: 10px;
            margin-right: auto;
        }  
    </style>
    <title>Soal 2 : Array 2 Dimensi</title>
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

    <div style="text-align:center;"><br><br><br><br><h2>Soal 2 : Array 2 Dimensi</h2></div>

    <?php
        $tNilai = array(
            array("Nama", "Matematika", "Bahasa Indonesia", "Bahasa Inggris", "IPA", "IPS"),
            array("Adi", 7, 8, 6, 6, 7),
            array("Bunga", 8, 9, 9, 8, 7),
            array("Candra", 8, 8, 9, 9, 8),
            array("Dita", 6, 8, 8, 6, 8),
            array("Edgar", 5, 6, 5, 6, 6)
        );
        $siswa = count($tNilai);
        $nilai = count($tNilai[0]);
        $avg = 0;
    ?>
    <?php
        //Tampilkan data
        echo "<div class=\"content\">";
        echo "<table border=\"2\" style=\"border-collapse:collapse; width:100%\"><caption>Tabel Nilai</caption>";
        for($row = 0; $row<$siswa; $row++){
            echo "<tr>";
            for($col = 0; $col<$nilai; $col++){
                echo "<td>".$tNilai[$row][$col]."</td>";
            };
            echo "</tr>";
        };
        echo "</table><br>";

        //Menghitung rata-rata nilai tiap siswa
        echo "<div class=\"tabel\"><table border=\"2\" style=\"border-collapse:collapse\"><caption>Rata-rata Siswa</caption>";
        echo "<tr><th>Nama</th><th>Rata-rata</th></tr>";
        for($row = 1; $row<$siswa; $row++){
            echo "<tr><td>".$tNilai[$row][0]."</td>";
            echo "<td>";
            for($col = $nilai-1; $col>0; $col--){
                $avg += $tNilai[$row][$col];
            };
            echo $avg/($nilai-1)."</td></tr>";
            $avg = 0;
        };
        echo "</table></div>";
        

        //Menghitung rata-rata tiap pelajaran
        echo "<div class=\"tabel\"><table border=\"2\" style=\"border-collapse:collapse\"><caption>Rata-rata Mapel</caption>";
        echo "<tr><th>Mata Pelajaran</th><th>Rata-rata</th></tr>";
        for($row = 1; $row<$siswa; $row++){
            echo "<tr><td>".$tNilai[0][$row]."</td>";
            echo "<td>";
            for($col = $nilai-1; $col>0; $col--){
                $avg += $tNilai[$col][$row];
            };
            echo $avg/($nilai-1)."</td></tr>";
            $avg = 0;
        };
        echo "</table></div>";

        //Penentuan jurusan siswa
        echo "<div class=\"tabel\"><table border=\"2\" style=\"border-collapse:collapse\"><caption>Rekomendasi Jurusan</caption>";
        echo "<tr><th>Nama</th><th>Jurusan</th></tr>";
        for($row = 1; $row<$siswa; $row++){
            echo "<tr><td>".$tNilai[$row][0]."</td>";
            echo "<td>";
            for($col = $nilai-1; $col>0; $col--){
                $avg += $tNilai[$row][$col];
            };
            $avg = $avg / ( $nilai - 1 );

            if($avg < 6){
                echo "Tidak naik kelas";
            }
            elseif($tNilai[$row][4] > $tNilai[$row][5]){
                echo "IPA";
            }else{
                echo "IPS";
            };
            $avg = 0;
        };
        echo "</table></div></div><br>";
    ?>

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