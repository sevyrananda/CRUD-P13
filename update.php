<?php
require_once "koneksi.php";

// mengecek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // mengambil data dari form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $asal_sekolah = $_POST['asal_sekolah'];

    // menyiapkan pernyataan SQL untuk update data
    $sql = "UPDATE pendaftaran_siswa SET nama=?, alamat=?, jenis_kelamin=?, agama=?, asal_sekolah=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $nama, $alamat, $jenis_kelamin, $agama, $asal_sekolah, $id);

    // menjalankan pernyataan SQL untuk update data
    if ($stmt->execute()) {
        // Redirect ke halaman rekap.php setelah berhasil diupdate
        header("Location: rekap.php?update=success");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // menutup pernyataan dan koneksi database
    $stmt->close();
    $conn->close();
}
?>
