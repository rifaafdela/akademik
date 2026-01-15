<?php
session_start();
include "koneksi.php";

$id = $_SESSION['id'];
$nama = $_POST['nama'];
$password = $_POST['password'];

if($password != ''){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $db->prepare("UPDATE pengguna SET nama_lengkap=?, password=? WHERE id=?");
    $stmt->bind_param("ssi",$nama,$hash,$id);
}else{
    $stmt = $db->prepare("UPDATE pengguna SET nama_lengkap=? WHERE id=?");
    $stmt->bind_param("si",$nama,$id);
}

$stmt->execute();
$_SESSION['nama'] = $nama;

header("Location: profil.php");