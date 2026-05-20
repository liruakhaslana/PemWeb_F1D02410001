<?php
require_once "config/database.php";

$hasil = mysqli_query($conn, "SELECT * FROM pendaftaran ORDER BY waktu_daftar DESC");
?>

<h2 style="margin-top: 40px;">Data Pendaftar</h2>

<?php if (mysqli_num_rows($hasil) > 0): ?>
<table class="data-table" style="margin-top: 20px;">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Tgl Main</th>
            <th>Server</th>
            <th>Platform</th>
            <th>Waktu Daftar</th>
        </tr>
    </thead>
    <tbody>
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
    </tbody>
</table>
<?php else: ?>
    <p>Belum ada data pendaftar.</p>
<?php endif; ?>

<?php mysqli_close($conn); ?>