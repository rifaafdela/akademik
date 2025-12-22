<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
        <div class="card col-md-6 mx-auto">
            <div class="card-header bg-primary text-white">Input Data Prodi</div>
            <div class="card-body">
                <form action="prodi_proses.php" method="POST">
                    <div class="mb-3">
                        <label>Nama Prodi</label>
                        <input type="text" name="nama_prodi" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Jenjang</label>
                        <select name="jenjang" class="form-select" required>
                            <option value="">-- Pilih Jenjang --</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S2">S2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control"></textarea>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                    <a href="prodi.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>