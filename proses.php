<?php
require_once "koneksi.php";

// mengambil data dari formulir
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['gender'];
$agama = $_POST['agama'];
$asal_sekolah = $_POST['asal'];

// menyiapkan pernyataan SQL dengan parameter terikat
$sql = "INSERT INTO pendaftaran_siswa (nama, alamat, jenis_kelamin, agama, asal_sekolah) 
        VALUES (?, ?, ?, ?, ?)";

// menyiapkan pernyataan prepared statement
$stmt = $conn->prepare($sql);

// bind parameter ke pernyataan prepared statement
$stmt->bind_param("sssss", $nama, $alamat, $jenis_kelamin, $agama, $asal_sekolah);

// menjalankan pernyataan prepared statement
if ($stmt->execute()) {
    // alert Pendaftaran berhasil
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">';
    echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>';
    echo '<div id="success-alert" class="alert alert-success" role="alert">';
    echo 'Pendaftaran berhasil!';
    echo '</div>';
    echo '<script>';
    echo 'setTimeout(function(){';
    echo '  document.getElementById("success-alert").style.display = "none";';
    echo '  window.location.href = "rekap.php";';
    echo '}, 2000);';
    echo '</script>';
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $stmt->error;
}

// menutup pernyataan prepared statement
$stmt->close();

// menutup koneksi database
$conn->close();
?>
