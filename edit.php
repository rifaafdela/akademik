<?php
$page='mahasiswa';
include 'navbar.php';
include 'koneksi.php';

$nim=$_GET['nim'];
$data=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM mahasiswa WHERE nim='$nim'"));
?>

<!doctype html>
<html>
<head>
  <title>Edit Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Edit Mahasiswa</h3>

  <form action="update.php" method="POST">
    <input type="text" name="nim" value="<?= $data['nim'] ?>" readonly class="form-control mb-2">
    <input type="text" name="nama_mhs" value="<?= $data['nama_mhs'] ?>" class="form-control mb-2">
    <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" class="form-control mb-2">
    <textarea name="alamat" class="form-control mb-2"><?= $data['alamat'] ?></textarea>

    <button name="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
  </form>
</div>

</body>
</html>
