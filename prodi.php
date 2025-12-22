<?php
$page='prodi';
include 'navbar.php';
include 'koneksi.php';
?>

<!doctype html>
<html>
<head>
  <title>Data Prodi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Data Prodi</h3>
  <a href="prodi_create.php" class="btn btn-primary mb-3">+ Tambah Prodi</a>

  <table class="table table-bordered">
    <tr>
      <th>No</th><th>Nama</th><th>Jenjang</th><th>Aksi</th>
    </tr>

    <?php
    $no=1;
    $sql=mysqli_query($db,"SELECT * FROM prodi");
    while($d=mysqli_fetch_array($sql)){
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $d['nama_prodi'] ?></td>
      <td><?= $d['jenjang'] ?></td>
      <td>
        <a href="prodi_edit.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="prodi_delete.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</div>

</body>
</html>
