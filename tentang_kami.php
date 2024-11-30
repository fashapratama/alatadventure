<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Alat Adventure</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            transition: background-color 0.5s ease; /* Transition untuk perubahan background */
        }

        /* Navbar */
        nav {
            background: linear-gradient(135deg, #388e3c, #81c784); /* Gradasi hijau untuk navbar */
            padding: 15px 0;
            text-align: center;
            position: relative;
            animation: fadeIn 2s ease; /* Animasi untuk navbar */
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
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
            display: inline-block;
            vertical-align: middle;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #fff176; /* Warna kuning cerah saat hover */
            text-decoration: underline;
        }

        /* Kontainer utama */
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 10px;
            animation: slideIn 1.5s ease-out; /* Animasi slide-in untuk konten */
        }

        @keyframes slideIn {
            0% { transform: translateY(100px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        h1 {
            color: #388e3c;
            font-size: 28px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }

        /* Efek animasi hover pada team member */
        .team-member {
            background-color: #c8e6c9;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 200px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
        }

        .team-member img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
        }

        .team-member h3 {
            font-size: 18px;
            margin-top: 10px;
            color: #388e3c;
        }

        .team-member p {
            font-size: 14px;
            color: #555;
        }

        /* Button Styling */
        .back-button {
            background-color: #388e3c;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .back-button:hover {
            background-color: #81c784;
            transform: scale(1.1); /* Efek zoom saat hover */
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
            <li><a href="tentang_kami.php">Tentang Kami</a></li> <!-- About Us link -->
            <li><a href="login.php">Login</a></li> <!-- Added Login link -->
        </ul>
    </nav>

    <div class="container">
        <h1>Tentang Kami</h1>
        <p>Selamat datang di Alat Adventure! Kami adalah penyedia berbagai macam alat petualangan untuk menemani kegiatan outdoor Anda. Dengan tujuan untuk mempermudah perjalanan petualangan Anda, kami menyediakan berbagai alat berkualitas mulai dari tenda, kendaraan off-road, peralatan hiking, hingga sepatu hiking yang nyaman dan aman. Kami berkomitmen untuk memberikan produk terbaik dengan harga yang bersaing.</p>

        <p>Visi kami adalah untuk mendukung para petualang, pendaki, dan penggemar alam bebas dengan menyediakan alat-alat yang dapat meningkatkan pengalaman petualangan mereka. Dengan pengalaman yang kami miliki, kami percaya dapat memberikan layanan dan produk terbaik untuk Anda.</p>

        <!-- Back to Home Button -->
        <a href="index.php" class="back-button">Kembali ke Beranda</a>
    </div>

</body>
</html>
