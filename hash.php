<?php
// password yang ingin kamu pakai untuk login
$password = "1234";

// membuat hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

// tampilkan hasil hash
echo "Password asli: " . $password . "<br><br>";
echo "Password hash (COPY INI): <br>";
echo $hash;