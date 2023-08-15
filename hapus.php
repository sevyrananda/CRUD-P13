<?php
require_once "koneksi.php";

// Memeriksa apakah parameter ID telah diberikan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menyiapkan pernyataan SQL dengan parameter terikat
    $sql = "DELETE FROM pendaftaran_siswa WHERE id = ?";
    
    // Menyiapkan pernyataan prepared statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameter ke pernyataan prepared statement
    $stmt->bind_param("s", $id);
    
    // Mengeksekusi pernyataan prepared statement
    if ($stmt->execute()) {
        // Data berhasil dihapus
        echo "Data telah dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }
    
    // Menutup pernyataan prepared statement
    $stmt->close();
} else {
    echo "ID tidak ditemukan.";
}

// Menutup koneksi database
$conn->close();
?>
