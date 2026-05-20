<nav class="navbar">
    <a href="home.php" class="nav-link">Beranda</a>
    <a href="daftar.php" class="nav-link">Karakter & Daftar</a>
    
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="../process/logout.php" class="nav-link" style="color:red; font-weight:bold;">Logout</a>
    <?php else: ?>
        <a href="login.php" class="nav-link">Login</a>
        <a href="register.php" class="nav-link" style="background:#ffcc00; color:black;">Daftar Akun</a>
    <?php endif; ?>
</nav>