<?php
require_once "../config/database.php";
require_once "../includes/auth.php";
requireLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username   = trim($_POST['username'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $tgl_main   = $_POST['play-date'] ?? '';
    $server     = $_POST['server'] ?? '';
    $platform   = isset($_POST['platform']) ? implode(", ", $_POST['platform']) : "";
    $alasan     = trim($_POST['reason'] ?? '');

    if (empty($username) || empty($email)) {
        $_SESSION['error'] = "Username dan Email wajib diisi!";
        header("Location: ../pages/daftar.php");
        exit;
    }

    $sql = "INSERT INTO pendaftaran (username, email, tanggal_main, server, platform, alasan) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $username, $email, $tgl_main, $server, $platform, $alasan);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Data berhasil disimpan!";
    } else {
        $_SESSION['error'] = "Gagal menyimpan data.";
    }

    $stmt->close();
    header("Location: ../pages/daftar.php");
    exit;
}
?>