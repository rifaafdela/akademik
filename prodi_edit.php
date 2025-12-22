<?php
include("koneksi.php");

// Ambil ID dari URL
if(!isset($_GET['id'])){
    header("Location:prodi.php");
}

$id = $_GET['id'];
// Cari data prodi berdasarkan ID
$sql = mysqli_query($db, "SELECT * FROM prodi WHERE id='$id'");
$data = mysqli_fetch_array($sql);

// Kalau data gak ketemu (misal ID ngasal), balikin ke prodi.php
if(mysqli_num_rows($sql) < 1){
    header("Location:prodi.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
    </style>
  </head>
  <body>

    <div class="container mt-5">
        <div class="card col-md-6 mx-auto shadow-sm border-0">
            <div class="card-header bg-warning text-dark fw-bold">
                Edit Data Program Studi
            </div>
            <div class="card-body bg-white">
                <form action="prodi_proses.php" method="POST">
                    
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Prodi</label>
                        <input type="text" name="nama_prodi" class="form-control" value="<?php echo $data['nama_prodi']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Jenjang</label>
                        <select name="jenjang" class="form-select" required>
                            <option value="">-- Pilih Jenjang --</option>
                            <option value="D2" <?php if($data['jenjang'] == 'D2') echo 'selected'; ?>>D2</option>
                            <option value="D3" <?php if($data['jenjang'] == 'D3') echo 'selected'; ?>>D3</option>
                            <option value="D4" <?php if($data['jenjang'] == 'D4') echo 'selected'; ?>>D4</option>
                            <option value="S1" <?php if($data['jenjang'] == 'S1') echo 'selected'; ?>>S1</option>
                            <option value="S2" <?php if($data['jenjang'] == 'S2') echo 'selected'; ?>>S2</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3"><?php echo $data['keterangan']; ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="prodi.php" class="btn btn-secondary">Batal</a>
                        <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>