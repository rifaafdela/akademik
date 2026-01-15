<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

$page = 'mahasiswa';
include 'navbar.php';
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">

  <!-- JUDUL -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold">📚 Data Mahasiswa</h3>
    <a href="create.php" class="btn btn-primary">
      + Tambah Mahasiswa
    </a>
  </div>

  <!-- TABEL -->
  <div class="card shadow-sm">
    <div class="card-body">

      <table class="table table-bordered table-striped table-hover align-middle text-center">
        <thead class="table-dark">
          <tr>
            <th width="5%">No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th width="20%">Aksi</th>
          </tr>
        </thead>
        <tbody>

        <?php
        $no = 1;
        $sql = mysqli_query($db,"
          SELECT m.*, p.nama_prodi
          FROM mahasiswa m
          LEFT JOIN prodi p ON m.prodi_id = p.id
        ");

        if(mysqli_num_rows($sql) == 0){
        ?>
          <tr>
            <td colspan="5" class="text-muted">
              Belum ada data mahasiswa
            </td>
          </tr>
        <?php
        } else {
          while($d = mysqli_fetch_array($sql)){
        ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['nim'] ?></td>
            <td><?= $d['nama_mhs'] ?></td>
            <td><?= $d['nama_prodi'] ?></td>
            <td>
              <a href="edit.php?nim=<?= $d['nim'] ?>" 
                 class="btn btn-warning btn-sm">
                 Edit
              </a>

              <a href="delete.php?nim=<?= $d['nim'] ?>" 
                 class="btn btn-danger btn-sm"
                 onclick="return confirm('Yakin ingin menghapus data ini?')">
                 Hapus
              </a>
            </td>
          </tr>
        <?php
          }
        }
        ?>

        </tbody>
      </table>

    </div>
  </div>

</div>

</body>
</html>