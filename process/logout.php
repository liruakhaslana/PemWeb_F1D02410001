<?php
// Logout dan kembali ke halaman awal
session_start();
session_destroy();

// Redirect ke halaman awal
header("Location: ../pages/home.php");
exit;
?>