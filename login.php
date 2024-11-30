<?php
session_start(); // Memulai sesi untuk memeriksa status login pengguna

// Jika pengguna sudah login, arahkan ke halaman yang diinginkan
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php'); // Arahkan ke halaman dashboard setelah login
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Basic reset and styling */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #007bff, #6610f2); /* Gradient background */
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Login container styling */
        .login-container {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Label styling */
        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        /* Input field styling */
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Button styling */
        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Logout Button styling */
        .logout-button {
            width: 100%;
            padding: 12px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .logout-button:hover {
            background-color: #c82333;
        }

        /* Responsive styling for mobile */
        @media (max-width: 600px) {
            .login-container {
                padding: 20px;
            }

            h2 {
                font-size: 24px;
            }

            button {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <?php if (!isset($_SESSION['username'])): ?>
            <h2>Login Form</h2>
            <form action="login_process.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required><br>

                <button type="submit">Login</button>
            </form>
        <?php else: ?>
            <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
            <a href="dashboard.php" class="logout-button">Go to Dashboard</a>
            <a href="logout.php" class="logout-button">Logout</a>
        <?php endif; ?>
    </div>
</body>
</html>
