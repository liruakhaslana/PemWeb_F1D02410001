<?php
require_once "koneksi.php";

$hasil = mysqli_query($koneksi, "SELECT * FROM pendaftaran ORDER BY waktu_daftar DESC");
?>

<section style="margin-top: 40px;">
    <h2>Data Pendaftar</h2>

    <?php if (mysqli_num_rows($hasil) > 0): ?>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Tgl Main</th>
            <th>Server</th>
            <th>Platform</th>
            <th>Waktu</th>
        </tr>

        <?php $no = 1; while ($row = mysqli_fetch_assoc($hasil)): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= $row['tanggal_main'] ?></td>
            <td><?= $row['server'] ?></td>
            <td><?= $row['platform'] ?></td>
            <td><?= $row['waktu_daftar'] ?></td>
        </tr>
        <?php endwhile; ?>

    </table>
    <?php else: ?>
        <p>Belum ada data.</p>
    <?php endif; ?>
</section>

<?php mysqli_close($koneksi); ?>