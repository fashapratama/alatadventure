<?php
session_start(); // Memulai sesi untuk memeriksa apakah pengguna sudah login

// Cek apakah pengguna sudah login, jika belum, arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Termasuk koneksi ke database
include 'koneksi.php';

// Ambil data pesanan
$sql_pesanan = "SELECT * FROM pemesanan";
$result_pesanan = $conn->query($sql_pesanan);

// Ambil data alat
$sql_alat = "SELECT * FROM alat";
$result_alat = $conn->query($sql_alat);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    
    <style>
        /* Resetting some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Basic Page Layout */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            padding: 20px;
            line-height: 1.6;
        }

        h1, h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 36px;
            text-align: center;
        }

        h2 {
            font-size: 24px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        table th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #ddd;
        }

        /* Links (buttons) */
        a {
            color: #4CAF50;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #4CAF50;
            border-radius: 4px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        a:hover {
            background-color: #4CAF50;
            color: white;
        }

        a:active {
            background-color: #45a049;
        }

        /* Confirm Delete Action */
        a[onclick] {
            color: #f44336;
            border-color: #f44336;
        }

        a[onclick]:hover {
            background-color: #f44336;
            color: white;
        }

        /* Button for adding new items */
        a[href="tambah_alat.php"] {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 20px;
            margin-bottom: 40px;
            text-decoration: none;
        }

        a[href="tambah_alat.php"]:hover {
            background-color: #45a049;
        }

        /* Image Display */
        img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.1);
        }

        /* Logout button styling */
        .logout-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            text-align: center;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 20px;
            margin-bottom: 40px;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #e53935;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table th, table td {
                font-size: 12px;
                padding: 8px;
            }

            a, a[href="tambah_alat.php"] {
                font-size: 14px;
                padding: 6px 12px;
            }

            img {
                max-width: 80px;
                max-height: 80px;
            }

            h1 {
                font-size: 28px;
            }

            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

    <h1>Dashboard Admin</h1>

    <!-- Tombol Logout -->
    <a href="logout.php" class="logout-button">Logout</a>

    <!-- Menampilkan data pesanan -->
    <h2>Daftar Pesanan</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Alat</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Menampilkan data pesanan
            if ($result_pesanan->num_rows > 0) {
                while ($row = $result_pesanan->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['transaksi'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>" . $row['telepon'] . "</td>";
                    echo "<td>" . $row['alat'] . "</td>";
                    echo "<td>" . $row['jumlah'] . "</td>";
                    echo "<td>" . $row['tanggal'] . "</td>";
                    echo "<td>
                            <a href='hapus_pesanan.php?transaksi=" . $row['transaksi'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus pesanan?\");'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Tidak ada pesanan ditemukan.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <br><br>

    <!-- Menampilkan data alat -->
    <h2>Daftar Alat Adventure</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID Alat</th>
                <th>Nama Alat</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Menampilkan data alat
            if ($result_alat->num_rows > 0) {
                while ($row = $result_alat->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['deskripsi'] . "</td>";
                    echo "<td>" . number_format($row['harga'], 2) . "</td>";
                    echo "<td><img src='uploads/" . $row['gambar'] . "' width='100' height='100' alt='" . $row['nama'] . "' /></td>";
                    echo "<td>
                            <a href='edit_alat.php?id=" . $row['id'] . "'>Edit</a> | 
                            <a href='hapus_alat.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus alat?\");'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada alat ditemukan.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <br><br>
    <a href="tambah_alat.php">Tambah Alat Baru</a>

</body>
</html>

<?php
// Menutup koneksi database
$conn->close();
?>
