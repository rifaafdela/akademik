<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM pengguna WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1){
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nama'] = $user['nama_lengkap'];

            // ⬇️ PINDAH KE HALAMAN UTAMA
            header("Location: index.php");
            exit;
        }
    }

    header("Location: login.php?pesan=Email atau Password salah");
    exit;
}