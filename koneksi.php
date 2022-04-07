<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "cobapa";
$connect = mysqli_connect($host, $username, $password, $database);

if (!$connect) {
    die("Connecting Failed");
} else {
}

?>
