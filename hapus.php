<?php
include 'koneksi.php';
mysqli_query($db,"DELETE FROM mahasiswa WHERE nim='$_GET[nim]'");
header("Location:index.php?pesan=hapus");
