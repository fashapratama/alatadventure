<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Alat Adventure</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Navbar */
        nav {
            background: linear-gradient(135deg, #388e3c, #81c784);
            padding: 15px 0;
            text-align: center;
            position: relative;
            animation: fadeIn 2s ease;
        }

        nav img {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            height: 50px;
            width: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        /* Main Container */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* Product Grid */
        .products {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px 0;
        }

        .product {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .product img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .product img:hover {
            transform: scale(1.05);
        }

        .product h3 {
            font-size: 18px;
            margin-top: 15px;
            color: #333;
        }

        .product p {
            font-size: 14px;
            color: #555;
            margin: 10px 0;
        }

        .price {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
            font-weight: bold;
        }

        .order-button {
            background-color: #5cb85c;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .order-button:hover {
            background-color: #4cae4c;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .products {
                flex-direction: column;
                align-items: center;
            }

            .product {
                width: 80%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <img src="images/gunung_2-removebg-preview.png" alt="Logo">
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="Barang.php">Barang</a></li>
            <li><a href="tentang_kami.php">Tentang Kami</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Alat Adventure Terbaru</h1>

        <div class="products">
            <?php
            include 'koneksi.php';

            // Query untuk mengambil data alat
            $sql = "SELECT * FROM alat";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<img src="images/' . $row['gambar'] . '" alt="' . $row['nama'] . '">';
                    echo '<h3>' . $row['nama'] . '</h3>';
                    echo '<p>' . $row['deskripsi'] . '</p>';
                    echo '<p class="price">Rp ' . number_format($row['harga'], 2, ',', '.') . '</p>';
                    echo '<a href="pemesanan.php?alat=' . $row['nama'] . '" class="order-button">Pesan Sekarang</a>';
                    echo '</div>';
                }
            } else {
                echo "<p>Tidak ada alat yang tersedia.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>

</body>
</html>
