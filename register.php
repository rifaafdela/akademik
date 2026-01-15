<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #eef2f6; /* Abu-abu kebiruan lembut */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0; /* Memberi jarak atas bawah di layar HP */
        }

        .card-register {
            border: none;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            background: white;
            padding: 20px;
            width: 100%;
        }

        .logo-container {
            width: 60px;
            height: 60px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin: 0 auto 15px auto;
        }

        .form-control {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 10px 12px;
            border-radius: 10px;
            font-size: 0.95rem;
        }

        .form-control:focus {
            background-color: white;
            box-shadow: none;
            border-color: #2563eb;
        }

        .btn-primary {
            background-color: #2563eb;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .text-primary {
            color: #2563eb !important;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            
            <div class="card card-register">
                <div class="card-body">
                    
                    <div class="text-center mb-4">
                        <div class="logo-container">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                        <h4 class="fw-bold text-dark">Buat Akun</h4>
                        <p class="text-muted small">Bergabung dengan SIAKAD Kampus</p>
                    </div>

                    <?php if(isset($_GET['pesan'])): ?>
                        <div class="alert alert-danger py-2 text-center border-0 bg-danger bg-opacity-10 text-danger small">
                            <?= htmlspecialchars($_GET['pesan']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="proses_register.php" method="POST">
                        
                        <div class="mb-3">
                            <label class="form-label small text-muted">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Contoh: Nabilla Fitricia" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small text-muted">Email Kampus</label>
                            <input type="email" class="form-control" name="email" placeholder="nama@kampus.ac.id" required>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label small text-muted">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="••••••" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label small text-muted">Ulangi Password</label>
                                <input type="password" class="form-control" name="konfirmasi_password" placeholder="••••••" required>
                            </div>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="agree" required>
                            <label class="form-check-label small text-muted" for="agree">
                                Saya setuju dengan Syarat & Ketentuan
                            </label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="register" class="btn btn-primary">
                                Daftar Sekarang
                            </button>
                        </div>
                    </form>

                    <div class="mt-4 text-center">
                        <small class="text-muted">Sudah punya akun? <a href="login.php" class="text-primary fw-bold text-decoration-none">Login</a></small>
                    </div>

                </div>
            </div>

            <div class="text-center mt-3 text-muted opacity-50">
                <small>&copy; 2026 Sistem Akademik</small>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>