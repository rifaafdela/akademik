<?php
// WAJIB: mulai session
session_start();

// Proteksi: harus login
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

// Koneksi database
include 'koneksi.php';

// Validasi parameter NIM
if(!isset($_GET['nim']) || $_GET['nim'] == ''){
    header("Location: mahasiswa.php");
    exit;
}

// Ambil NIM dari URL
$nim = $_GET['nim'];

// Query hapus data
$query = mysqli_query($db, "DELETE FROM mahasiswa WHERE nim='$nim'");

// Cek hasil
if($query){
    header("Location: mahasiswa.php?pesan=hapus");
    exit;
} else {
    echo "
    <div style='font-family: Arial; padding:20px;'>
        <h3>❌ Gagal Menghapus Data</h3>
        <p>Error: ".mysqli_error($db)."</p>
        <a href='mahasiswa.php'>Kembali</a>
    </div>
    ";
}