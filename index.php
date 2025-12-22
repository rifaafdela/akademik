<?php
$page = 'home';
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
<body>

<div class="container mt-4">
  <h3>Data Mahasiswa</h3>

  <?php if(isset($_GET['pesan'])){ ?>
    <div class="alert alert-success">
      <?php echo $_GET['pesan']; ?>
    </div>
  <?php } ?>

  <a href="create.php" class="btn btn-primary mb-3">+ Tambah</a>

  <table class="table table-bordered">
    <tr>
      <th>No</th><th>NIM</th><th>Nama</th><th>Prodi</th><th>Aksi</th>
    </tr>

    <?php
    $no=1;
    $sql = mysqli_query($db,"
      SELECT m.*, p.nama_prodi 
      FROM mahasiswa m 
      LEFT JOIN prodi p ON m.prodi_id=p.id
    ");
    while($d=mysqli_fetch_array($sql)){
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $d['nim'] ?></td>
      <td><?= $d['nama_mhs'] ?></td>
      <td><?= $d['nama_prodi'] ?></td>
      <td>
        <a href="edit.php?nim=<?= $d['nim'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="delete.php?nim=<?= $d['nim'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</div>

</body>
</html>
