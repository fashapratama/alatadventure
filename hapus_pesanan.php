<?php
include 'koneksi.php';

// Cek apakah parameter 'transaksi' ada dalam URL
if (isset($_GET['transaksi'])) {
    $transaksi = $_GET['transaksi'];

    // Menampilkan konfirmasi penghapusan
    echo "Anda ingin menghapus pesanan dengan ID transaksi: $transaksi<br>";

    // Query untuk menghapus data pesanan berdasarkan transaksi
    $sql = "DELETE FROM pemesanan WHERE transaksi = '$transaksi'";

    // Proses penghapusan jika tombol konfirmasi ditekan
    if (isset($_POST['confirm_delete'])) {
        if ($conn->query($sql) === TRUE) {
            echo "Pesanan dengan ID transaksi: $transaksi berhasil dihapus.";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Menampilkan form konfirmasi penghapusan
    echo "
        <form method='POST'>
            <button type='submit' name='confirm_delete'>Ya, hapus pesanan</button>
            <a href='index.php'>Batal</a> <!-- Ganti dengan halaman yang sesuai -->
        </form>
    ";

} else {
    echo "ID transaksi tidak ditemukan.";
}

// Menutup koneksi database
$conn->close();
?>
