<?php
session_start();
include 'koneksi.php';

// Jika sudah login, langsung ke index
if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($db, "SELECT * FROM pengguna WHERE email='$email'");
    $user = mysqli_fetch_assoc($query);

    if($user && password_verify($password, $user['password'])){
        $_SESSION['login'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['nama'] = $user['nama_lengkap'];

        header("Location: index.php");
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login Sistem Akademik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card {
            border-radius: 12px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card login-card shadow">
                <div class="card-header text-center bg-white border-0 pt-4">
                    <h4 class="fw-bold text-primary">Sistem Akademik</h4>
                    <small class="text-muted">Silakan login untuk melanjutkan</small>
                </div>

                <div class="card-body px-4 pb-4">
                    <?php if(isset($error)){ ?>
                        <div class="alert alert-danger text-center">
                            <?= $error ?>
                        </div>
                    <?php } ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control" placeholder="******" required>
                            </div>
                        </div>

                        <button name="login" class="btn btn-primary w-100">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </button>
                    </form>
                </div>

                <div class="card-footer text-center bg-light">
                    <small class="text-muted">
                        © <?= date('Y') ?> Sistem Akademik
                    </small>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>