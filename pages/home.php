<?php
require_once "../config/database.php";
require_once "../includes/auth.php";

$page_title = "Beranda - Wuthering Waves";

include "../includes/header.php"; 
include "../includes/navbar.php"; 
?>

<main class="konten">
    <h1>Selamat Datang di Komunitas Wuthering Waves</h1>
    <p>Head toward our shared future, leaving the past behind.</p>
    
    <?php if (isset($_SESSION['user_id'])): ?>
        <p>Selamat datang, <strong><?= htmlspecialchars($_SESSION['username'] ?? '') ?></strong>!</p>
        <a href="daftar.php" class="btn-submit" style="display:inline-block; width:auto; padding:12px 30px; text-decoration:none;">→ Isi Data Pendaftaran</a>
    <?php else: ?>
        <a href="login.php" class="btn-submit" style="display:inline-block; width:auto; padding:12px 30px; text-decoration:none;">→ Login untuk mendaftar</a>
    <?php endif; ?>
</main>

<?php include "../includes/footer.php"; ?>