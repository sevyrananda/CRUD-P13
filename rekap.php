<?php
require_once "koneksi.php";

// mengambil data dari tabel pendaftaran_siswa
$search = isset($_GET['search']) ? $_GET['search'] : '';

// menampilkan tabel
function showTable($conn, $search)
{
    $sql = "SELECT * FROM pendaftaran_siswa";

    // menambahkan kondisi pencarian
    if ($search != '') {
        $sql .= " WHERE nama LIKE '%$search%'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table class="table mt-4 table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Asal Sekolah</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1; // Variabel untuk mengurutkan nomor
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                <td>' . $no . '</td>
                <td>' . $row["nama"] . '</td>
                <td>' . $row["alamat"] . '</td>
                <td>' . $row["jenis_kelamin"] . '</td>
                <td>' . $row["agama"] . '</td>
                <td>' . $row["asal_sekolah"] . '</td>
                <td>' . $row["tanggal_daftar"] . '</td>
                <td>
                    <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="openEditModal(' . $row["id"] . ')"><i class="fa-solid fa-pen"></i></button>
                    <button class="btn btn-outline-danger" onclick="deleteConfirmation(' . $row["id"] . ')"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>';
            $no++; // Increment urutan nomor
        }
        echo '</tbody>
            </table>';
    } else {
        echo "Tidak ada data pendaftaran siswa.";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Rekap Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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

    <!-- kontent -->
    <div class="container">
        <h2 class="mt-4">Rekap Data Pendaftaran Siswa</h2>

        <div class="mb-3 text-end">
            <a href="form.php" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="mb-3">
            <form method="GET" action="rekap.php">
                <div class="input-group col-md-3 float-end">
                    <input type="text" class="form-control" placeholder="Cari berdasarkan nama" name="search" value="<?php echo $search; ?>">
                    <button class="btn btn-success" type="submit">Cari</button>
                </div>
            </form>
        </div>

        <?php
        showTable($conn, $search);

        // alert update
        $updateParam = isset($_GET['update']) ? $_GET['update'] : '';

        if ($updateParam === 'success') {
            echo '
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Sukses!",
                    text: "Data berhasil diperbarui.",
                    showConfirmButton: false,
                    timer: 1000 
                });
            </script>
            ';
        }

        // Tutup koneksi database
        $conn->close();
        ?>

        <!-- Form Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" action="update.php" method="POST">
                            <input type="hidden" name="id" id="editId">
                            <div class="mb-3">
                                <label for="editNama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="editNama" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="editAlamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="editAlamat" name="alamat"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="editJenisKelaminLaki" value="Laki-laki">
                                    <label class="form-check-label" for="editJenisKelaminLaki">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="editJenisKelaminPerempuan" value="Perempuan">
                                    <label class="form-check-label" for="editJenisKelaminPerempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="editAgama" class="form-label">Agama</label>
                                <select class="form-select" id="editAgama" name="agama">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editAsalSekolah" class="form-label">Asal Sekolah</label>
                                <input type="text" class="form-control" id="editAsalSekolah" name="asal_sekolah">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
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


        <script>
            function openEditModal(id) {
                // Mengambil data siswa berdasarkan ID dari database
                fetch('get_data.php?id=' + id)
                    .then(response => response.json())
                    .then(data => {
                        // Mengisi nilai-nilai input pada form edit
                        document.getElementById('editId').value = data.id;
                        document.getElementById('editNama').value = data.nama;
                        document.getElementById('editAlamat').value = data.alamat;
                        if (data.jenis_kelamin === 'Laki-laki') {
                            document.getElementById('editJenisKelaminLaki').checked = true;
                        } else if (data.jenis_kelamin === 'Perempuan') {
                            document.getElementById('editJenisKelaminPerempuan').checked = true;
                        }
                        document.getElementById('editAgama').value = data.agama;
                        document.getElementById('editAsalSekolah').value = data.asal_sekolah;
                    })
                    .catch(error => {
                        console.log('Terjadi kesalahan saat mengambil data siswa:', error);
                    });
            }

            //alert konfirmasi hapus
            function deleteConfirmation(id) {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // mengirim permintaan hapus ke halaman hapus.php
                        fetch('hapus.php?id=' + id)
                            .then(response => response.text())
                            .then(data => {
                                Swal.fire({
                                    title: 'Berhasil',
                                    text: 'Data telah dihapus!',
                                    showConfirmButton: false,
                                    timer: 1000,
                                    icon: 'success'
                                }).then(() => {
                                    // Refresh halaman
                                    window.location.reload();
                                });
                            })
                            .catch(error => {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Terjadi kesalahan saat menghapus data.',
                                    icon: 'error'
                                });
                            });
                    }
                });
            }
        </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>