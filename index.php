<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas 12</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
  <style>
    .list-group-item:hover {
      background-color: #d4ffde;
    }

    .list-group-item:hover a {
      color: #fff;
    }

    .card {
      width: 400px;
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
            <a class="nav-link active" aria-current="page" href="#">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
  <div class="container-fluid" style="margin-top: 150px;">
    <div class="row">
      <div class="col-md-8 offset-md-2 d-flex justify-content-center">
        <div class="d-flex">
          <div>
            <div class="text">
              <h1>Website Pendaftaran Siswa</h1>
              <p>Silahkan melakukan pendaftaran dengan mengisi form registrasi.</p>
            </div>
            <div class="text">
            <a href="form.php" class="btn btn-danger"> Registrasi sekarang</a>
            </div>
          </div>
          <div class="ml-5">
            <img src="img/img.jpg" alt="Image" class="img-fluid" width="400px">
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Footer -->
  <footer class="mt-5 bg-dark text-light text-center fixed-bottom">
    <b>
      <p>JWD B - Sevyra &copy; 2023</p>
    </b>
  </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>