<?php
include("koneksi.php");

// Cek tombol submit
if(isset($_POST['submit'])){
    
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mhs'];
    $tgl = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $prodi_id = $_POST['prodi_id']; 

    // --- VALIDASI DUPLIKAT NIM ---
    // Cek dulu ke database, NIM ini udah ada belum?
    $cek_nim = mysqli_query($db, "SELECT nim FROM mahasiswa WHERE nim='$nim'");
    
    if(mysqli_num_rows($cek_nim) > 0){
        // Jika NIM sudah ada, tampilkan pesan alert dan kembali ke form
        echo "
        <script>
            alert('Gagal! NIM $nim sudah terdaftar di sistem. Gunakan NIM lain.');
            window.history.back(); 
        </script>
        ";
        return; // Stop, jangan lanjut simpan
    }

    // --- PROSES SIMPAN ---
    // Kalau NIM belum ada, baru kita simpan
    $query = "INSERT INTO mahasiswa(nim, nama_mhs, tgl_lahir, alamat, prodi_id) 
              VALUES ('$nim', '$nama', '$tgl', '$alamat', '$prodi_id')";
    
    $sql = mysqli_query($db, $query);

    if($sql){
        header("Location:index.php?pesan=simpan"); 
    } else {
        echo "Gagal menyimpan data. Error: " . mysqli_error($db);
    }
}
?>