<?php
include("koneksi.php");

// --- LOGIKA SIMPAN BARU ---
if(isset($_POST['simpan'])){
    $nama = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $ket = $_POST['keterangan'];

    $sql = mysqli_query($db, "INSERT INTO prodi (nama_prodi, jenjang, keterangan) VALUES ('$nama', '$jenjang', '$ket')");
    
    if($sql){
        header("Location:prodi.php?pesan=simpan");
    } else {
        echo "Gagal input data: " . mysqli_error($db);
    }
}

// --- LOGIKA UPDATE DATA (YANG KAMU CARI) ---
if(isset($_POST['update'])){
    $id = $_POST['id']; // Mengambil ID dari input hidden tadi
    $nama = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $ket = $_POST['keterangan'];

    // Query update database
    $sql = mysqli_query($db, "UPDATE prodi SET nama_prodi='$nama', jenjang='$jenjang', keterangan='$ket' WHERE id='$id'");
    
    if($sql){
        header("Location:prodi.php?pesan=update");
    } else {
        echo "Gagal update data: " . mysqli_error($db);
    }
}
?>