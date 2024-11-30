<?php
include 'koneksi.php';

// Cek apakah ID alat ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data alat berdasarkan ID
    $sql = "SELECT * FROM alat WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $alat = $result->fetch_assoc();
    } else {
        echo "Alat tidak ditemukan.";
        exit;
    }

    // Proses update jika form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];

        // Periksa jika gambar baru diupload
        $gambar_baru = '';
        if ($_FILES['gambar']['name'] != '') {
            // Hapus gambar lama jika ada
            if (file_exists("uploads/" . $alat['gambar'])) {
                unlink("uploads/" . $alat['gambar']);
            }

            // Proses upload gambar baru
            $target_dir = "uploads/";
            $gambar_baru = basename($_FILES['gambar']['name']);
            $target_file = $target_dir . $gambar_baru;

            // Upload gambar baru
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
                // Update data alat
                $update_sql = "UPDATE alat SET nama = '$nama', deskripsi = '$deskripsi', harga = '$harga', gambar = '$gambar_baru' WHERE id = '$id'";
            } else {
                echo "Gambar gagal diupload.";
                exit;
            }
        } else {
            // Jika tidak ada gambar baru, hanya update data lainnya
            $update_sql = "UPDATE alat SET nama = '$nama', deskripsi = '$deskripsi', harga = '$harga' WHERE id = '$id'";
        }

        if ($conn->query($update_sql) === TRUE) {
            echo "Alat berhasil diperbarui.";
            header("Location: admin.php"); // Kembali ke halaman admin
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
} else {
    echo "ID alat tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Alat</title>
</head>
<body>

<h1>Edit Alat</h1>

<form action="edit_alat.php?id=<?php echo $alat['id']; ?>" method="POST" enctype="multipart/form-data">
    <label for="nama">Nama Alat</label>
    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($alat['nama']); ?>" required><br>

    <label for="deskripsi">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" required><?php echo htmlspecialchars($alat['deskripsi']); ?></textarea><br>

    <label for="harga">Harga</label>
    <input type="number" id="harga" name="harga" value="<?php echo htmlspecialchars($alat['harga']); ?>" required><br>

    <label for="gambar">Gambar (Opsional)</label>
    <input type="file" id="gambar" name="gambar" accept="image/*"><br>
    <img src="uploads/<?php echo $alat['gambar']; ?>" width="100" height="100" alt="Gambar Alat"><br>

    <button type="submit">Perbarui Alat</button>
</form>

</body>
</html>
