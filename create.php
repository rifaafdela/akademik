<?php
$page = 'mahasiswa';
include 'navbar.php';
include 'koneksi.php';
?>

<!doctype html>
<html>
<head>
  <title>Tambah Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Tambah Mahasiswa</h3>

  <form action="proses.php" method="POST">
    <input type="text" name="nim" class="form-control mb-2" placeholder="NIM" required>
    <input type="text" name="nama_mhs" class="form-control mb-2" placeholder="Nama" required>

    <select name="prodi_id" class="form-control mb-2" required>
      <option value="">-- Pilih Prodi --</option>
      <?php
      $p = mysqli_query($db,"SELECT * FROM prodi");
      while($r=mysqli_fetch_array($p)){
        echo "<option value='$r[id]'>$r[nama_prodi]</option>";
      }
      ?>
    </select>

    <input type="date" name="tgl_lahir" class="form-control mb-2" required>
    <textarea name="alamat" class="form-control mb-2" placeholder="Alamat"></textarea>

    <button name="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
  </form>
</div>

</body>
</html>
