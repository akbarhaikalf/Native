<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>
</head>

<body>


    <b>Input Fitur</b>
    <form action="" method="POST" enctype="multipart/form-data">
        
        <b>Age : </b><input type="text" name="age"><br>
        <b>Sex :</b><input type="text" name="sex"><br>
        <b>cp  :</b><input type="text" name="cp"><br>
        <b>trestbps :</b><input type="text" name="trestbps"><br>
        <b>chol :</b> <input type="text" name="chol"><br>
        <b>fbs : </b> <input type="text" name="fbs"><br>
        <b>restecg : </b> <input type="text" name="restecg"><br>
        <b>thalach : </b> <input type="text" name="thalach"><br>
        <b>exang :</b> <input type="text" name="exang"><br>
        <b>oldepak : </b> <input type="text" name="oldpeak"><br>
        <b>slope : </b> <input type="text" name="slope"><br>
        <b>ca : </b> <input type="text" name="ca"><br>
        <b>thal :</b> <input type="text" name="thal"><br>
        <input type="submit" name="nButton"">
    </form>


    <?php
    function panggil_model()
    {
        $perintah = "C:\\Users\\Haikal\\AppData\\Local\\Programs\\Python\\Python39\\python.exe C:\\xampp\\htdocs\\CobaPA\\baca.py";
        $output = shell_exec($perintah);
        return "$output";
    }
    ?>

    <?php if (isset($_POST['nButton'])) {
        $age            = $_POST['age'];
        $sex           = $_POST['sex'];
        $cp        = $_POST['cp'];
        $trestbps  = $_POST['trestbps'];
        $chol         = $_POST['chol'];
        $fbs         = $_POST['fbs'];
        $restecg         = $_POST['restecg'];
        $thalach         = $_POST['thalach'];
        $exang         = $_POST['exang'];
        $oldpeak         = $_POST['oldpeak'];
        $slope         = $_POST['slope'];
        $ca         = $_POST['ca'];
        $thal         = $_POST['thal'];

        $sql="insert into datasetcoba (age, sex, cp, trestbps, chol, fbs, restecg, thalach, exang, oldpeak, slope, ca, thal) values
		('$age','$sex','$cp','$trestbps','$chol','$fbs','$restecg','$thalach','$exang','$oldpeak','$slope','$ca','$thal')";

        mysqli_query($connect, $sql);
        echo "</b>berhasil di input<br><br><br>";

        $model = panggil_model();
        echo 'Hasil prediksi:' . $model . "</br>";
        //  print_r($model);
    } ?>

</body>

</html>