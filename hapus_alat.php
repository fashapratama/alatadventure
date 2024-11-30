<?php
include 'koneksi.php';

// Cek apakah ID alat ada dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data alat
    $delete_sql = "DELETE FROM alat WHERE id = '$id'";

    if ($conn->query($delete_sql) === TRUE) {
        echo "Alat berhasil dihapus.";
        header("Location: admin.php"); // Setelah hapus, kembali ke halaman daftar alat
    } else {
        echo "Error: " . $delete_sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "ID alat tidak ditemukan.";
    exit;
}
?>
