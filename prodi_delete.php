<?php
include("koneksi.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // --- CEK DULU SEBELUM HAPUS ---
    // Apakah ada mahasiswa yang terdaftar di prodi ini?
    $cek_mahasiswa = mysqli_query($db, "SELECT * FROM mahasiswa WHERE prodi_id='$id'");
    
    // Kalau ketemu ada mahasiswa di prodi ini
    if(mysqli_num_rows($cek_mahasiswa) > 0) {
        // Jangan dihapus, balikin ke halaman prodi dengan pesan gagal
        header("Location:prodi.php?pesan=gagal");
    } else {
        // Kalau kosong (aman), baru hapus
        $hapus = mysqli_query($db, "DELETE FROM prodi WHERE id='$id'");

        if($hapus){
            header("Location:prodi.php?pesan=hapus");
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
} else {
    // Kalau orang coba buka file ini langsung tanpa ID, tendang balik
    header("Location:prodi.php");
}
?>