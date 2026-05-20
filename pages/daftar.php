<?php 
require_once "../config/database.php";
require_once "../includes/auth.php";
requireLogin(); 

$page_title = "Karakter & Pendaftaran - Wuthering Waves";
include "../includes/header.php"; 
include "../includes/navbar.php"; 
?>

<main class="konten">
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert-sukses"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert-gagal"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <h2>Pengisian Data Akun Wuthering Waves</h2>

    <form action="../process/register_process.php" method="POST" class="main-form">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" id="username" placeholder="Masukkan username" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email" placeholder="contoh@email.com" required>
        </div>

        <div class="form-group">
            <label>Tanggal Mulai Main</label>
            <input type="date" name="play-date">
        </div>

        <div class="form-group">
            <label>Pilih Server</label><br><br>
            <label><input type="radio" name="server" value="Asia" checked> Asia</label><br>
            <label><input type="radio" name="server" value="America"> America</label><br>
            <label><input type="radio" name="server" value="Europe"> Europe</label>
        </div>

        <div class="form-group">
            <label>Platform yang Digunakan</label><br><br>
            <label><input type="checkbox" name="platform[]" value="PC"> PC</label><br>
            <label><input type="checkbox" name="platform[]" value="Mobile"> Mobile</label><br>
            <label><input type="checkbox" name="platform[]" value="PS5"> PS5</label>
        </div>

        <div class="form-group">
            <label>Alasan ingin bergabung</label>
            <textarea name="reason" rows="4" placeholder="Tuliskan alasan Anda..."></textarea>
        </div>

        <button type="submit" class="btn-submit">KIRIM DATA</button>
    </form>

    <hr style="margin: 40px 0; border-color: #444;">
    <?php include "../get_pendaftar.php"; ?>
</main>

<?php include "../includes/footer.php"; ?>