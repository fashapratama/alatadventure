<?php
// Mengambil data dari URL
$alat = isset($_GET['alat']) ? $_GET['alat'] : '';
$nama = isset($_GET['nama']) ? $_GET['nama'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$telepon = isset($_GET['telepon']) ? $_GET['telepon'] : '';
$transaksi = isset($_GET['transaksi']) ? $_GET['transaksi'] : '';
$sepatu_ukuran = isset($_GET['sepatu_ukuran']) ? $_GET['sepatu_ukuran'] : '';
$jaket_ukuran = isset($_GET['jaket_ukuran']) ? $_GET['jaket_ukuran'] : '';

// Daftar harga untuk setiap alat
$hargaAlat = [
    "Tenda" => 35000,
    "Kendaraan Offroad" => 250000,
    "Peralatan Masak" => 25000,
    "Sepatu Hiking" => 30000,
    "Jaket Tebal" => 20000,
    "Trekking Pole" => 15000,
    "Sleeping Bag" => 25000,
    "Tas Carrier" => 20000,
    "Headlamp" => 5000
];

// Validasi jika alat atau transaksi tidak ditemukan
if (empty($alat) || empty($transaksi)) {
    echo "<p>Alat yang Anda pilih atau transaksi tidak ditemukan.</p>";
    exit;
}

// Menghitung total harga berdasarkan alat yang dipilih
$totalHarga = 0;
$alatArray = explode(",", $alat); // Mengubah string alat menjadi array
$alatList = [];

// Menyusun ulang alat yang dipilih dan menghitung harga berdasarkan jumlahnya
foreach ($alatArray as $item) {
    $item = trim($item); // Membersihkan spasi berlebih
    if (isset($hargaAlat[$item])) {
        if (isset($alatList[$item])) {
            // Jika item sudah ada, hanya menambah jumlahnya
            $alatList[$item]['jumlah'] += 1;
        } else {
            // Jika item pertama kali dipesan
            $alatList[$item] = ['harga' => $hargaAlat[$item], 'jumlah' => 1];
        }
    }
}

// Menghitung total harga berdasarkan item dan jumlahnya dengan penambahan harga
foreach ($alatList as $item => $details) {
    // Menambahkan harga barang sesuai jumlah yang dipesan
    $totalHarga += $details['harga'] * $details['jumlah']; // Menggunakan perkalian untuk mendapatkan harga total
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Alat Adventure</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .success-message {
            background-color: #dff0d8;
            padding: 20px;
            border: 1px solid #d0e9c6;
            color: #3c763d;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        /* Styling tombol */
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
            transform: scale(1.05); /* Zoom effect saat hover */
        }

        button:active {
            transform: scale(0.98); /* Zoom out effect saat tombol diklik */
        }

        /* Tombol Edit dan Kembali */
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        .edit-button, .back-button {
            padding: 10px;
            background-color: #388e3c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease; /* Efek transisi */
        }

        .edit-button:hover, .back-button:hover {
            background-color: #2c6e2f;
            transform: scale(1.05); /* Zoom effect saat hover */
        }

        .edit-button:active, .back-button:active {
            transform: scale(0.98); /* Zoom out effect saat tombol diklik */
        }

        /* Styling untuk tombol Kembali */
        .back-button {
            background-color: #f44336;
        }

        .back-button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Transaksi Pembayaran</h1>

        <div class="success-message">
            <h3>Transaksi Anda Berhasil!</h3>
            <p>Detail Pemesanan:</p>
            <table>
                <tr>
                    <th>Nama Lengkap</th>
                    <td><?php echo htmlspecialchars($nama); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($email); ?></td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td><?php echo htmlspecialchars($telepon); ?></td>
                </tr>
                <tr>
                    <th>Alat yang Dipesan</th>
                    <td>
                        <ul>
                            <?php foreach ($alatList as $item => $details): ?>
                                <li>
                                    <?php echo htmlspecialchars($item) . " x " . $details['jumlah']; ?>
                                    <?php 
                                    if ($item == "Sepatu Hiking" && $sepatu_ukuran): 
                                        echo " - Ukuran: " . htmlspecialchars($sepatu_ukuran);
                                    elseif ($item == "Jaket Tebal" && $jaket_ukuran): 
                                        echo " - Ukuran: " . htmlspecialchars($jaket_ukuran);
                                    endif;
                                    ?>
                                    - Rp <?php echo number_format($details['harga'] * $details['jumlah'], 0, ',', '.'); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th>Nomor Transaksi</th>
                    <td><?php echo htmlspecialchars($transaksi); ?></td>
                </tr>
            </table>
            <p>Silakan lakukan pembayaran dengan menggunakan kode transaksi di atas.</p>
        </div>

        <!-- Tombol Edit dan Kembali -->
        <div class="button-container">
            <!-- Tombol Edit untuk mengubah pesanan -->
            <form action="hapus_pesanan.php" method="GET">
                <input type="hidden" name="alat" value="<?php echo htmlspecialchars($alat); ?>">
                <input type="hidden" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <input type="hidden" name="telepon" value="<?php echo htmlspecialchars($telepon); ?>">
                <input type="hidden" name="transaksi" value="<?php echo htmlspecialchars($transaksi); ?>">
                <button type="submit" class="edit-button">Hapus Pesanan</button>
            </form>

            <!-- Tombol Kembali ke Beranda -->
            <form action="index.php" method="get">
                <button type="submit" class="back-button">Kembali ke Beranda</button>
            </form>
        </div>
    </div>

</body>
</html>
