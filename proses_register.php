<?php
include "koneksi_akademik.php";

if (isset($_POST['register'])) {
    $nama = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi_password'];

    // 1. Validasi Password
    if ($password !== $konfirmasi) {
        header("Location: register.php?pesan=Password dan Konfirmasi tidak cocok");
        exit();
    }

    // 2. Cek apakah email sudah terdaftar di database
    // Menggunakan Prepared Statement untuk keamanan
    $cek_email = $db->prepare("SELECT email FROM pengguna WHERE email = ?");
    $cek_email->bind_param("s", $email);
    $cek_email->execute();
    $cek_email->store_result();

    if ($cek_email->num_rows > 0) {
        header("Location: register.php?pesan=Email sudah terdaftar, gunakan email lain");
        exit();
    }

    // 3. Enkripsi Password (Hashing)
    // Sesuai soal poin 20 tentang keamanan data
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // 4. Insert Data Baru
    $sql = "INSERT INTO pengguna (nama_lengkap, email, password) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("sss", $nama, $email, $password_hash);
        
        if ($stmt->execute()) {
            // Jika sukses, arahkan ke login
            header("Location: login.php?pesan=Pendaftaran Berhasil, Silakan Login");
        } else {
            header("Location: register.php?pesan=Gagal Mendaftar");
        }
        $stmt->close();
    } else {
        echo "Error Database: " . $db->error;
    }
} else {
    header("Location: register.php");
}
$db->close();
?>