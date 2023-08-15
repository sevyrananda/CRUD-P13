<!DOCTYPE html>
<html>

<head>
  <title>Form Registrasi</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
  <style>
    .container {
      margin-top: 5x;
    }

    .card {
      margin-top: 30px;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Tugas 12 : Web Pendaftaran Siswa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Registrasi
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="form.php">Form Registrasi</a></li>
              <li><a class="dropdown-item" href="rekap.php">Rekap Data</a></li>
            </ul>
          </li>
        </ul>
        <a href="" class="btn btn-success"></a>
      </div>
    </div>
  </nav>

  <!-- konten -->
  <div class="container col-md-4">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">Form Registrasi</h2>
        <form id="registrationForm" method="POST" action="proses.php">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
          </div>
          <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="laki-laki" value="Laki-laki" required>
              <label class="form-check-label" for="laki-laki">
                Laki-laki
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan" required>
              <label class="form-check-label" for="perempuan">
                Perempuan
              </label>
            </div>
          </div>
          <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <select class="form-select" id="agama" name="agama" required>
              <option value="">Pilih Agama</option>
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
              <option value="Katolik">Katolik</option>
              <option value="Hindu">Hindu</option>
              <option value="Buddha">Buddha</option>
              <option value="Konghucu">Konghucu</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="asal" class="form-label">Asal Sekolah</label>
            <input type="tel" class="form-control" id="asal" name="asal" required>
          </div>
          <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="mt-5 bg-dark text-light text-center fixed-bottom">
    <b>
      <p>JWD B - Sevyra &copy; 2023</p>
    </b>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

</body>

</html>