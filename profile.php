<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
include "koneksi.php";

$id = $_SESSION['id'];
$data = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM pengguna WHERE id='$id'"));
?>

<!doctype html>
<html>
<head>
<title>Edit Profil</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5 col-md-6">
<div class="card shadow">
<div class="card-body">

<h4 class="mb-3">Edit Profil</h4>

<form action="profil_update.php" method="POST">
    <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control" value="<?= $data['email'] ?>" readonly>
    </div>

    <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" value="<?= $data['nama_lengkap'] ?>" required>
    </div>

    <div class="mb-3">
        <label>Password Baru</label>
        <input type="password" name="password" class="form-control">
        <small class="text-muted">Kosongkan jika tidak diganti</small>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>

</div>
</div>
</div>

</body>
</html>