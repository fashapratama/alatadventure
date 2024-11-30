<?php
include 'koneksi.php';

// Memeriksa apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $alat = implode(", ", $_POST['alat']);
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $transaksi = rand(100000, 999999); // Generate transaksi ID

    // Menyimpan pemesanan ke database
    $sql = "INSERT INTO pemesanan (nama, email, alamat, telepon, alat, jumlah, tanggal, transaksi) 
            VALUES ('$nama', '$email', '$alamat', '$telepon', '$alat', '$jumlah', '$tanggal', '$transaksi')";

    if ($conn->query($sql) === TRUE) {
        echo "Pemesanan berhasil. Kode Transaksi: $transaksi";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
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
    $sepatu_ukuran = isset($_POST['sepatu_ukuran']) ? $_POST['sepatu_ukuran'] : ''; // Ukuran sepatu
    $jaket_ukuran = isset($_POST['jaket_ukuran']) ? $_POST['jaket_ukuran'] : ''; // Ukuran jaket

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
    if (in_array('Sepatu Hiking', $alat) && empty($sepatu_ukuran)) {
        $errors[] = "Ukuran sepatu hiking harus dipilih.";
    }
    if (in_array('Jaket Tebal', $alat) && empty($jaket_ukuran)) {
        $errors[] = "Ukuran jaket tebal harus dipilih.";
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

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Alat Adventure</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"], input[type="number"], input[type="date"], select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        select {
            padding: 12px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 20px;
        }

        ul {
            padding-left: 20px;
        }

        .form-group input[type="date"] {
            width: calc(100% - 2px); /* Fix input date box */
        }

        /* Style for the multi-select box */
        select[multiple] {
            height: auto;
            min-height: 100px; /* Set height for better user experience */
        }

        /* Mengatur tampilan Select2 */
        .select2-container--default .select2-selection--multiple {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 8px;
            font-size: 14px;
            height: auto;
            min-height: 50px; /* Menambah tinggi dropdown agar lebih mudah dipilih */
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #5cb85c;
            color: white;
            border-radius: 15px;
            margin: 2px;
            padding: 5px 10px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: white;
        }

        .select2-container--default .select2-selection__rendered {
            padding: 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Pemesanan Alat Adventure</h1>

        <!-- Menampilkan pesan error jika ada -->
        <?php if (!empty($errors)): ?>
            <div class="error-message">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="<?php echo isset($nama) ? $nama : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="<?php echo isset($alamat) ? $alamat : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <input type="number" id="telepon" name="telepon" value="<?php echo isset($telepon) ? $telepon : ''; ?>" required>
            </div>

            <!-- Updated select for multiple items -->
            <div class="form-group">
                <label for="alat">Pilih Alat Adventure (Yang Ingin Anda Pesan)</label>
                <select id="alat" name="alat[]" multiple="multiple" required>
                    <option value="Tenda" <?php echo isset($alat) && in_array('Tenda', $alat) ? 'selected' : ''; ?>>Tenda</option>
                    <option value="Kendaraan Offroad" <?php echo isset($alat) && in_array('Kendaraan Offroad', $alat) ? 'selected' : ''; ?>>Kendaraan Offroad</option>
                    <option value="Peralatan Masak" <?php echo isset($alat) && in_array('Peralatan Masak', $alat) ? 'selected' : ''; ?>>Peralatan Masak</option>
                    <option value="Sepatu Hiking" <?php echo isset($alat) && in_array('Sepatu Hiking', $alat) ? 'selected' : ''; ?>>Sepatu Hiking</option>
                    <option value="Jaket Tebal" <?php echo isset($alat) && in_array('Jaket Tebal', $alat) ? 'selected' : ''; ?>>Jaket Tebal</option>
                    <option value="Trekking Pole" <?php echo isset($alat) && in_array('Trekking Pole', $alat) ? 'selected' : ''; ?>>Trekking Pole</option>
                    <option value="Sleeping Bag" <?php echo isset($alat) && in_array('Sleeping Bag', $alat) ? 'selected' : ''; ?>>Sleeping Bag</option>
                    <option value="Headlamp" <?php echo isset($alat) && in_array('Headlamp', $alat) ? 'selected' : ''; ?>>Headlamp</option>
                </select>
            </div>

            <!-- Ukuran Sepatu -->
            <?php if (isset($alat) && is_array($alat) && in_array('Sepatu Hiking', $alat)): ?>
                <div class="form-group">
                    <label for="sepatu_ukuran">Ukuran Sepatu Hiking</label>
                    <select id="sepatu_ukuran" name="sepatu_ukuran" required>
                        <option value="">Pilih Ukuran</option>
                        <option value="38" <?php echo isset($sepatu_ukuran) && $sepatu_ukuran == '38' ? 'selected' : ''; ?>>38</option>
                        <option value="39" <?php echo isset($sepatu_ukuran) && $sepatu_ukuran == '39' ? 'selected' : ''; ?>>39</option>
                        <option value="40" <?php echo isset($sepatu_ukuran) && $sepatu_ukuran == '40' ? 'selected' : ''; ?>>40</option>
                        <option value="41" <?php echo isset($sepatu_ukuran) && $sepatu_ukuran == '41' ? 'selected' : ''; ?>>41</option>
                        <option value="42" <?php echo isset($sepatu_ukuran) && $sepatu_ukuran == '42' ? 'selected' : ''; ?>>42</option>
                        <option value="43" <?php echo isset($sepatu_ukuran) && $sepatu_ukuran == '43' ? 'selected' : ''; ?>>43</option>
                    </select>
                </div>
            <?php endif; ?>

            <!-- Ukuran Jaket -->
            <?php if (isset($alat) && is_array($alat) && in_array('Jaket Tebal', $alat)): ?>
                <div class="form-group">
                    <label for="jaket_ukuran">Ukuran Jaket Tebal</label>
                    <select id="jaket_ukuran" name="jaket_ukuran" required>
                        <option value="">Pilih Ukuran</option>
                        <option value="M" <?php echo isset($jaket_ukuran) && $jaket_ukuran == 'M' ? 'selected' : ''; ?>>M</option>
                        <option value="L" <?php echo isset($jaket_ukuran) && $jaket_ukuran == 'L' ? 'selected' : ''; ?>>L</option>
                        <option value="XL" <?php echo isset($jaket_ukuran) && $jaket_ukuran == 'XL' ? 'selected' : ''; ?>>XL</option>
                    </select>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="jumlah">Jumlah Alat</label>
                <input type="number" id="jumlah" name="jumlah" value="<?php echo isset($jumlah) ? $jumlah : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal Pemesanan</label>
                <input type="date" id="tanggal" name="tanggal" value="<?php echo isset($tanggal) ? $tanggal : ''; ?>" required>
            </div>

            <button type="submit">Proses Pemesanan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#alat').select2({
                placeholder: 'Pilih alat adventure yang akan dipesan',
                width: '100%'
            });
        });
    </script>
</body>
</html>
