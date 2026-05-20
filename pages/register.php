<?php 
require_once "../config/database.php";
require_once "../includes/auth.php";

if (isLoggedIn()) {
    header("Location: daftar.php");
    exit;
}

$error = "";
if (isset($_GET['error'])) {
    $error = match($_GET['error']) {
        '1' => "Username sudah digunakan!",
        '2' => "Password minimal 6 karakter!",
        default => "Terjadi kesalahan."
    };
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Wuthering Waves</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        body {
            background: linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.95)), 
                        url('../assets/images/wuwapic1.jpg') center/cover no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-container {
            background: rgba(38, 38, 38, 0.95);
            padding: 40px 35px;
            border-radius: 16px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 0 30px rgba(255, 204, 0, 0.3);
            text-align: center;
        }
        .register-container h2 {
            color: #ffcc00;
            margin-bottom: 25px;
        }
        .register-container input {
            width: 100%;
            padding: 14px;
            margin: 10px 0;
            background: #1a1a1a;
            border: 1px solid #555;
            border-radius: 8px;
            color: #e0e0e0;
        }
        .register-container button {
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
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Daftar Akun Baru</h2>
        
        <?php if ($error): ?>
            <p class="alert-gagal"><?= $error ?></p>
        <?php endif; ?>

        <form action="../process/register_user_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            
            <button type="submit">DAFTAR AKUN</button>
        </form>
        
        <p style="margin-top: 20px;">
            Sudah punya akun? <a href="login.php" style="color:#ffcc00;">Login di sini</a>
        </p>
    </div>
</body>
</html>