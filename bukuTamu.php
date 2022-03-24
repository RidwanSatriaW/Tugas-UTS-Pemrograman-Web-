<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gaya.css">
    <title>Buku Tamu</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
    <div class="header">
        <div class="Logo">
           <img src="Image/Logopolines.png" alt="Polines" width="60%" height="auto">
        </div>
        <div class="nav">
            <ul>
                <li><a href="">Soal 4</a></li>
                <li><a href="soal3.php">Soal 3</a></li>
                <li><a href="Soal2.php">Soal 2</a></li>
                <li><a href="soal1.php">Soal 1</a></li>
            </ul>
        </div>   
    </div>
    <div class="container">
    <?php
        $nama = $comment = $email = "";
        $namaErr = $emailErr = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            //validasi field nama
            if(empty($_POST["nama"])){
                $namaErr = "Name required";
            }else{
                $nama = $_POST["nama"];
                if(!preg_match("/^[a-zA-Z' ]*$/", $nama)){
                    $namaErr = "Invalid Charcter";
                    $nama = "";
                }
            }

            //validasi field Email
            if(empty($_POST["email"])){
                $emailErr = "Email required";
            }else{
                $email = $_POST["email"];
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $emailErr = "Wrong format";
                    $email = "";
                }
            }

            //validasi field komentar
            if(empty($_POST["comment"])){
                $comment = "Tidak ada pesan";
            }else{
                $comment = $_POST["comment"];
            }
        }
    ?>
    <br><br>
    <div class="content" ><br><br><br>
    <div style="text-align:center;"><h2>Buku Tamu</h2></div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="nama" placeholder="nama">
            <span class="error">* <?php echo $namaErr;?></span><br><br>
            <label for="email">E-Mail</label><br>
            <input type="text" name="email" id="email" placeholder="e-mail">
            <span class="error">* <?php echo $emailErr;?></span><br><br>
            <label for="comment">Komentar</label><br>
            <textarea name="comment" id="comment" cols="30" rows="10"></textarea><br><br>
            <button type="submit" name="submit" >Submit
                </button>
        </form>    
    </div>
    <br><hr><br>
    <?php
        echo '<div class="content">';
        echo "Nama : $nama <br>";
        echo "E-mail : $email <br>";
        echo "Komentar : $comment <br>";
        echo "</div>"
    ?><br><br><br>
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