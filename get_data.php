<?php
require_once "koneksi.php";

// mengambil data siswa berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM pendaftaran_siswa WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Mengembalikan data dalam format JSON
    echo json_encode($row);
} else {
    echo "Invalid ID";
}

// menutup koneksi database
$conn->close();
?>
