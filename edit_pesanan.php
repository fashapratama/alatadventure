<?php
include 'koneksi.php';

// Cek apakah parameter 'transaksi' ada dalam URL
if (isset($_GET['transaksi'])) {
    $transaksi = $_GET['transaksi'];
    echo "Transaksi ID: " . $transaksi;  // Menampilkan ID transaksi yang diterima


    // Proses update jika form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $alat = implode(", ", $_POST['alat']);
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];

        // Update data pemesanan
        $update_sql = "UPDATE pemesanan SET 
                        nama = '$nama', 
                        email = '$email', 
                        alamat = '$alamat', 
                        telepon = '$telepon', 
                        alat = '$alat', 
                        jumlah = '$jumlah', 
                        tanggal = '$tanggal' 
                        WHERE transaksi = '$transaksi'";

        if ($conn->query($update_sql) === TRUE) {
            echo "Pemesanan berhasil diperbarui.";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
} else {
    echo "ID transaksi tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemesanan</title>
</head>
<body>

<h1>Edit Pemesanan</h1>

<!-- Form untuk mengupdate data pemesanan -->
<form action="edit_pesanan.php?transaksi=<?php echo $order['transaksi']; ?>" method="POST">
    <label for="nama">Nama Lengkap</label>
    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($order['nama']); ?>" required><br>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($order['email']); ?>" required><br>

    <label for="alamat">Alamat</label>
    <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($order['alamat']); ?>" required><br>

    <label for="telepon">Nomor Telepon</label>
    <input type="number" id="telepon" name="telepon" value="<?php echo htmlspecialchars($order['telepon']); ?>" required><br>

    <label for="alat">Alat Adventure</label>
    <select id="alat" name="alat[]" multiple required>
        <option value="Tenda" <?php echo in_array('Tenda', explode(", ", $order['alat'])) ? 'selected' : ''; ?>>Tenda</option>
        <option value="Kendaraan Offroad" <?php echo in_array('Kendaraan Offroad', explode(", ", $order['alat'])) ? 'selected' : ''; ?>>Kendaraan Offroad</option>
        <option value="Peralatan Masak" <?php echo in_array('Peralatan Masak', explode(", ", $order['alat'])) ? 'selected' : ''; ?>>Peralatan Masak</option>
        <option value="Sepatu Hiking" <?php echo in_array('Sepatu Hiking', explode(", ", $order['alat'])) ? 'selected' : ''; ?>>Sepatu Hiking</option>
        <option value="Jaket Tebal" <?php echo in_array('Jaket Tebal', explode(", ", $order['alat'])) ? 'selected' : ''; ?>>Jaket Tebal</option>
        <option value="Trekking Pole" <?php echo in_array('Trekking Pole', explode(", ", $order['alat'])) ? 'selected' : ''; ?>>Trekking Pole</option>
        <option value="Sleeping Bag" <?php echo in_array('Sleeping Bag', explode(", ", $order['alat'])) ? 'selected' : ''; ?>>Sleeping Bag</option>
        <option value="Headlamp" <?php echo in_array('Headlamp', explode(", ", $order['alat'])) ? 'selected' : ''; ?>>Headlamp</option>
    </select><br>

    <label for="jumlah">Jumlah Alat</label>
    <input type="number" id="jumlah" name="jumlah" value="<?php echo htmlspecialchars($order['jumlah']); ?>" required><br>

    <label for="tanggal">Tanggal Pemesanan</label>
    <input type="date" id="tanggal" name="tanggal" value="<?php echo htmlspecialchars($order['tanggal']); ?>" required><br>

    <button type="submit">Perbarui Pemesanan</button>
</form>

</body>
</html>
