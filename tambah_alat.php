<?php
include 'koneksi.php';

// Proses tambah alat
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_alat = $_POST['nama_alat'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Proses upload gambar
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Memeriksa apakah file adalah gambar
    if (getimagesize($_FILES["gambar"]["tmp_name"]) !== false) {
        // Pindahkan file gambar ke direktori uploads
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Query untuk menambahkan alat
            $insert_sql = "INSERT INTO alat (nama, deskripsi, harga, gambar) 
                           VALUES ('$nama_alat', '$deskripsi', '$harga', '" . basename($_FILES["gambar"]["name"]) . "')";

            if ($conn->query($insert_sql) === TRUE) {
                echo "Alat berhasil ditambahkan.";
                header("Location: index.php"); // Kembali ke halaman dashboard admin
            } else {
                echo "Error: " . $insert_sql . "<br>" . $conn->error;
            }
        } else {
            echo "Gambar gagal diupload.";
        }
    } else {
        echo "File yang diupload bukan gambar.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alat</title>
</head>
<body>

<h1>Tambah Alat Baru</h1>

<form action="tambah_alat.php" method="POST" enctype="multipart/form-data">
    <label for="nama">Nama Alat</label>
    <input type="text" id="nama_alat" name="nama_alat" required><br>

    <label for="deskripsi">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" required></textarea><br>

    <label for="harga">Harga</label>
    <input type="number" id="harga" name="harga" required><br>

    <label for="gambar">Gambar</label>
    <input type="file" id="gambar" name="gambar" accept="image/*" required><br>

    <button type="submit">Tambah Alat</button>
</form>

</body>
</html>
