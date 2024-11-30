<?php
// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $alat = isset($_POST['alat']) ? $_POST['alat'] : []; // Alat bisa lebih dari satu
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal']; // Tambahkan tanggal pemesanan

    // Generate angka random untuk transaksi
    $randomNumber = rand(100000, 999999); // Angka random 6 digit

    // Validasi input
    $errors = [];
    if (empty($nama)) {
        $errors[] = "Nama tidak boleh kosong.";
    }
    if (empty($email)) {
        $errors[] = "Email tidak boleh kosong.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }
    if (empty($alamat)) {
        $errors[] = "Alamat tidak boleh kosong.";
    }
    if (empty($telepon)) {
        $errors[] = "Telepon tidak boleh kosong.";
    }
    if (empty($tanggal)) {
        $errors[] = "Tanggal pemesanan tidak boleh kosong.";
    }
    if (empty($alat)) {
        $errors[] = "Pilih alat adventure yang akan dipesan.";
    }

    // Jika tidak ada error, tampilkan data pemesanan
    if (empty($errors)) {
        // Redirect atau tampilkan informasi pemesanan
        $alat_str = implode(', ', $alat); // Menggabungkan pilihan alat menjadi string
        header("Location: pembayaran.php?alat=$alat_str&nama=$nama&email=$email&telepon=$telepon&transaksi=$randomNumber&tanggal=$tanggal");
        exit();
    }
}
?>
