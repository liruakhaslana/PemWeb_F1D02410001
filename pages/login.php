<?php 
require_once "../config/database.php";
require_once "../includes/auth.php";

if (isLoggedIn()) {
    header("Location: daftar.php");
    exit;
}

$error = "";
if (isset($_GET['error'])) {
    $error = $_GET['error'] === '1' ? "Username atau password salah!" : "Terjadi kesalahan.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Wuthering Waves</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        body {
            background: linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.95)), 
                        url('../assets/images/wuwapic1.jpg') center/cover no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-container {
            background: rgba(38, 38, 38, 0.95);
            padding: 40px 35px;
            border-radius: 16px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 0 30px rgba(255, 204, 0, 0.3);
            border: 1px solid rgba(255, 204, 0, 0.2);
            text-align: center;
        }
        .login-container h2 {
            color: #ffcc00;
            margin-bottom: 25px;
            font-size: 2rem;
        }
        .login-container input {
            width: 100%;
            padding: 14px;
            margin: 10px 0;
            background: #1a1a1a;
            border: 1px solid #555;
            border-radius: 8px;
            color: #e0e0e0;
            font-size: 1rem;
        }
        .login-container input:focus {
            outline: none;
            border-color: #ffcc00;
            box-shadow: 0 0 8px rgba(255, 204, 0, 0.5);
        }
        .login-container button {
            width: 100%;
            padding: 14px;
            background: #ffcc00;
            color: black;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }
        .login-container button:hover {
            background: #ffd633;
            transform: scale(1.03);
        }
        .alert-gagal {
            background: #4a1a1a;
            color: #ff8080;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Komunitas</h2>
        
        <?php if ($error): ?>
            <p class="alert-gagal"><?= $error ?></p>
        <?php endif; ?>

        <form action="../process/login_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">LOGIN</button>
        </form>
        
        <p style="margin-top: 20px; color: #aaa;">
            Belum punya akun? Hubungi admin.
        </p>
    </div>
</body>
</html>