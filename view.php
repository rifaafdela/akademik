<?php
include("koneksi.php");

// Cek ada NIM di URL gak? Kalo gak, tendang ke index
if(!isset($_GET['nim'])){
    header("Location:index.php");
}

$nim = $_GET['nim'];
// Ambil satu data doang sesuai NIM
$sql = mysqli_query($db, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$data = mysqli_fetch_array($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container mt-5">
        <div class="card col-md-6 mx-auto">
            <div class="card-header bg-info text-white">
                Detail Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="30%">NIM</th>
                        <td>: <?php echo $data['nim']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>: <?php echo $data['nama_mhs']; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>: <?php echo date('d F Y', strtotime($data['tgl_lahir'])); ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: <?php echo $data['alamat']; ?></td>
                    </tr>
                </table>
                
                <hr>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>