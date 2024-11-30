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
            background-color: #e8f5e9; /* Light green background */
        }

        /* Navbar */
        nav {
            background-color: #388e3c; /* Green navbar background */
            padding: 15px 0;
            text-align: center;
            position: relative;
        }

        nav img {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%); /* Center the image vertically */
            height: 50px;
            width: 50px;
            border-radius: 50%; /* Makes the logo round */
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
            transition: transform 0.2s ease, color 0.3s ease; /* Menambahkan efek transisi */
        }

        nav ul li a:hover {
            color: #fff176; /* Hover color */
            transform: scale(1.1); /* Zoom effect saat hover */
        }

        nav ul li a:active {
            transform: scale(0.95); /* Efek zoom out saat tombol diklik */
        }

        /* Welcome Section */
        .welcome-section {
            background-image: url('images/adventure-bg.jpg'); /* Add your background image here */
            background-size: cover;
            background-position: center;
            padding: 80px 20px;
            text-align: center;
            color: white;
            height: 300px; /* Adjust the height as needed */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-repeat: no-repeat;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5); /* Optional shadow for readability */
        }

        .welcome-section h1 {
            font-size: 32px;
            margin: 0;
            color: #ffffff; /* White text for the title */
        }

        .welcome-section p {
            font-size: 18px;
            margin-top: 10px;
            color: #ffffff; /* White text for the description */
        }

        /* Image inside the content section */
        .image-content {
            text-align: center;
            margin-top: 20px;
        }

        .image-content img {
            width: 80%; /* Adjust size to fit the page */
            max-width: 600px; /* Set a max width for the image */
            height: auto;
            border-radius: 8px; /* Optional: adds rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional: adds shadow for the image */
        }

        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .products {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product {
            background-color: #c8e6c9; /* Light green background for products */
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 200px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .product:hover {
            transform: translateY(-10px);
            background-color: #a5d6a7; /* Darker green on hover */
        }

        .product img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .product h3 {
            font-size: 18px;
            margin-top: 15px;
            color: #388e3c; /* Green color for product titles */
        }

        .product p {
            font-size: 14px;
            color: #2c6e31; /* Darker green for descriptions */
        }

        .order-button {
            background-color: #66bb6a; /* Green button */
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
            background-color: #388e3c; /* Dark green when hovered */
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <img src="images/gunung_2-removebg-preview.png" alt="Logo"> <!-- Replace this with your logo -->
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="Barang.php">Barang</a></li>    
            <li><a href="tentang_kami.php">Tentang Kami</a></li>
            <li><a href="login.php">Login</a></li> <!-- Added Login link -->
        </ul>
    </nav>
    <!-- Displaying Image in Content Section -->
    <div class="image-content">
        <img src="images/hiking.jpg" alt="Adventure Image"> <!-- Add your image here -->
    </div>

    <div class="container">
        <h1>Selamat Datang di Pemesanan Alat Adventure</h1>
        <p>Kami dengan senang hati menyambut Anda di dunia petualangan! Temukan berbagai alat berkualitas tinggi yang akan mendukung setiap petualangan Anda, mulai dari tenda, kendaraan off-road, hingga peralatan hiking yang nyaman dan aman.
           Sebelum Anda memutuskan untuk memesan, silahkan jelajahi berbagai pilihan kami yang dirancang khusus untuk kebutuhan petualangan Anda. Kami percaya, setiap perjalanan membutuhkan persiapan yang tepat, dan kami siap membantu Anda!
           Selamat berpetualang, dan jangan ragu untuk menghubungi kami jika ada pertanyaan.
           Pesan alat petualangan terbaik sekarang juga, dan mulailah perjalanan Anda!</p>
    </div>
        
</body>
</html>
