<?php
$host = 'localhost'; // Host MySQL, biasanya localhost
$username = 'root'; // Username MySQL
$password = ''; // Password MySQL, kosongkan jika tidak ada
$dbname = 'alat_adventure'; // Nama database yang sudah dibuat

// Membuat koneksi ke MySQL
$conn = new mysqli($host, $username, $password, $dbname);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
