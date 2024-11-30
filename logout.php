<?php
session_start(); // Memulai sesi
session_destroy(); // Menghapus sesi pengguna
header('Location: index.php'); // Arahkan kembali ke halaman index
exit;
?>
