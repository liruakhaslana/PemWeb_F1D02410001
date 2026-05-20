<?php
require_once "../config/database.php";
require_once "../includes/auth.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username     = trim($_POST['username'] ?? '');
    $nama_lengkap = trim($_POST['nama_lengkap'] ?? '');
    $email        = trim($_POST['email'] ?? '');
    $password     = $_POST['password'] ?? '';

    // Validasi
    if (empty($username) || empty($nama_lengkap) || empty($email) || empty($password)) {
        header("Location: ../pages/register.php?error=4");
        exit;
    }

    if (strlen($password) < 6) {
        header("Location: ../pages/register.php?error=2");
        exit;
    }

    // Cek username sudah ada
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        header("Location: ../pages/register.php?error=1");
        exit;
    }

    // Hash password (PENTING!)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, nama_lengkap, email, password) 
            VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $nama_lengkap, $email, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Akun berhasil dibuat! Silakan login.";
        header("Location: ../pages/login.php");
    } else {
        header("Location: ../pages/register.php?error=3");
    }
    exit;
}
?>