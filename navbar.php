<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid px-5">
    <a class="navbar-brand" href="index.php">Akademik</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <a class="nav-link <?= ($page=='home')?'active':'' ?>" href="index.php">
            Home
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($page=='mahasiswa')?'active':'' ?>" href="mahasiswa.php">
            Mahasiswa
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($page=='prodi')?'active':'' ?>" href="prodi.php">
            Prodi
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-warning" href="logout.php">
            Logout
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>