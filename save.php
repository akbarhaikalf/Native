<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
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
// query SQL untuk insert data
$query="INSERT INTO datasetcoba SET age='$age',sex='$sex',cp='$cp',trestbps='$trestbps',chol='$chol',fbs='$fbs',restecg='$restecg',thalach='$thalach',exang='$exang',oldpeak='$oldpeak',slope='$slope',ca='$ca',thal='$thal'";
mysqli_query($conn, $query);
// mengalihkan ke halaman index.php
header("location:index(1).php");
?>