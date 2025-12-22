<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "db_akademik";

$db = mysqli_connect($server, $user, $password, $database);

if(!$db){
    die("Koneksi database gagal");
}
?>
