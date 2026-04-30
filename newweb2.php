<?php include "proses.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karakter & Pendaftaran - Wuthering Waves</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .alert-sukses {
            background-color: #1a472a;
            color: #a8f5c0;
            border: 1px solid #2ecc71;
            padding: 14px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .alert-gagal {
            background-color: #4a1a1a;
            color: #f5a8a8;
            border: 1px solid #e74c3c;
            padding: 14px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <header class="main-header">
        <video autoplay muted loop playsinline>
            <source src="wuwavid1.mp4" type="video/mp4">
        </video>
        <div class="header-overlay"></div>
        <div class="header-content">
            <h1>Wuthering Waves</h1>
            <div class="header-divider"></div>
            <p class="tagline">Head toward our shared future, leaving the past behind</p>
            <p class="author-tag">Resonator Preview &middot; Wuthering Waves</p>
        </div>
    </header>

    <nav class="navbar">
        <a href="newweb.php" class="nav-link">Beranda</a>
        <a href="newweb2.php" class="nav-link">Karakter & Daftar</a>
    </nav>

    <main class="konten">

        <?php if ($pesan === "sukses"): ?>
            <div class="alert-sukses"> Data berhasil disimpan ke database!</div>
        <?php elseif ($pesan !== ""): ?>
            <div class="alert-gagal"> Gagal menyimpan data. <?= $pesan ?></div>
        <?php endif; ?>

        <section>
            <h2>Tabel Karakter (Resonator)</h2>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Elemen</th>
                        <th>Senjata</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Jinshi</td><td>Spectro</td><td>Broadblade</td></tr>
                    <tr><td>Aemeath</td><td>Fusion</td><td>Sword</td></tr>
                    <tr><td>Cartethya</td><td>Aero</td><td>Sword</td></tr>
                    <tr><td>Hiyuki</td><td>Glacio</td><td>Sword</td></tr>
                </tbody>
            </table>
        </section>

        <section class="form-section">
            <h2>Pengisian data akun Wuthering Waves</h2>
            <form action="newweb2.php" method="POST" class="main-form">
                <div class="form-group">
                    <label for="username">Username:
                    <input type="text" id="username" name="username">
                    </label>
                </div>
                <div class="form-group">
                    <label for="user-email">Email:
                    <input type="email" id="user-email" name="email" required>
                    </label>
                </div>
                <div class="form-group">
                    <label for="play-date">Tanggal Mulai Main:
                    <input type="date" id="play-date" name="play-date">
                    </label>
                </div>
                <div class="form-group">
                    <label>Pilih Server:</label><br>
                    <input type="radio" id="asia" name="server" value="Asia" checked>
                    <label for="asia">Asia</label>
                    <input type="radio" id="america" name="server" value="America">
                    <label for="america">America</label>
                    <input type="radio" id="europe" name="server" value="Europe">
                    <label for="europe">Europe</label>
                </div>
                <div class="form-group">
                    <label>Platform yang Digunakan:</label><br>
                    <input type="checkbox" id="pc" name="platform[]" value="PC">
                    <label for="pc">PC</label>
                    <input type="checkbox" id="mobile" name="platform[]" value="Mobile">
                    <label for="mobile">Mobile</label>
                    <input type="checkbox" id="ps5" name="platform[]" value="PS5">
                    <label for="ps5">PS5</label>
                </div>
                <div class="form-group">
                    <label for="reason">Alasan ingin mengikuti komunitas dari game Wuthering Waves:<br>
                    <textarea id="reason" name="reason" rows="4" placeholder="Tuliskan alasan Anda di sini..."></textarea>
                    </label>
                </div>
                <button type="submit" class="btn-submit">Kirim Data</button>
            </form>
        </section>

        <?php include "get_pendaftar.php"; ?>

    </main>

    <footer class="main-footer">
        <p>&copy; 2026 Komunitas Wuthering Waves.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>