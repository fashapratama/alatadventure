<?php
include 'koneksi.php';

// Cek apakah ID pesanan ada dalam URL
if (isset($_GET['transaksi'])) {
    $transaksi = $_GET['transaksi'];

    // Hapus pemesanan berdasarkan transaksi ID
    $delete_sql = "DELETE FROM pemesanan WHERE transaksi = '$transaksi'";

    if ($conn->query($delete_sql) === TRUE) {
        echo "Pemesanan berhasil dibatalkan.";
    } else {
        echo "Error: " . $delete_sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "ID transaksi tidak ditemukan.";
}
?>
