<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>

<body>

    <h3>Latihan Upload File</h3>
    <b>uploadlah file dibawah 1MB</b>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="nFile">
        <input type="submit" name="nButton" value="UPLOAD">
    </form>


    <?php
    function panggil_model()
    {
        $perintah = "C:\\Users\\Haikal\\AppData\\Local\\Programs\\Python\\Python39\\python.exe C:\\xampp\\htdocs\\CobaPA\\baca2.py";
        $output = shell_exec($perintah);
        return "$output";
    }
    ?>

    <?php if (isset($_POST['nButton'])) {
        $direktori = "berkas/";
        $namaFile  = $_FILES['nFile']['name'];
        move_uploaded_file($_FILES['nFile']['tmp_name'], $direktori . $namaFile);

        mysqli_query($connect, "insert into cobafile set file='$namaFile'");
        echo "</b>berhasil di upload<br><br><br>";

        $model = panggil_model();
        echo 'Hasil prediksi:' . $model . "</br>";
        // print_r($model);
    } ?>

</body>

</html>