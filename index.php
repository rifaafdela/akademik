<?php
// WAJIB: session & proteksi login
session_start();
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

// Penanda halaman aktif di navbar
$page = 'home';

// Navbar
include 'navbar.php';
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Dashboard | Sistem Akademik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-body">
      <h3 class="card-title">
        Selamat Datang 👋
      </h3>

      <p class="card-text">
        Halo, <strong><?= $_SESSION['nama']; ?></strong><br>
        Selamat datang di <b>Sistem Akademik</b>.
      </p>

      <hr>

      <div class="row">
        <div class="col-md-6">
          <div class="alert alert-primary">
            <h5>📚 Manajemen Mahasiswa</h5>
            <p>Kelola data mahasiswa: tambah, edit, dan hapus data.</p>
            <a href="mahasiswa.php" class="btn btn-primary btn-sm">
              Kelola Mahasiswa
            </a>
          </div>
        </div>

        <div class="col-md-6">
          <div class="alert alert-success">
            <h5>🏫 Program Studi</h5>
            <p>Kelola data program studi di sistem akademik.</p>
            <a href="prodi.php" class="btn btn-success btn-sm">
              Kelola Prodi
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

</body>
</html>