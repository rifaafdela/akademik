<?php
include("koneksi.php");

if(isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mhs'];
    $tgl = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    // Query Update data berdasarkan NIM
    $update = mysqli_query($db, "UPDATE mahasiswa SET nama_mhs='$nama', tgl_lahir='$tgl', alamat='$alamat' WHERE nim='$nim'");

    if($update){
        // Sukses? Balik ke index bawa pesan 'update'
        header("Location:index.php?pesan=update");
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>