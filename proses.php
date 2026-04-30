<?php
require_once "koneksi.php";

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['username']) || empty($_POST['email'])) {
        $pesan = "Data wajib diisi!";
    } else {

        $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
        $email    = mysqli_real_escape_string($koneksi, trim($_POST['email']));
        $tgl_main = $_POST['play-date'] ?? '';
        $server   = $_POST['server'] ?? '';
        $platform = isset($_POST['platform']) ? implode(", ", $_POST['platform']) : "";
        $alasan   = mysqli_real_escape_string($koneksi, trim($_POST['reason'] ?? ''));

        $sql = "INSERT INTO pendaftaran 
        (username, email, tanggal_main, server, platform, alasan)
        VALUES ('$username', '$email', '$tgl_main', '$server', '$platform', '$alasan')";

        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Data berhasil disimpan!');</script>";
            $pesan = "sukses";
        } else {
            echo "<script>alert('Gagal menyimpan data.');</script>";
            $pesan = "ERROR: " . mysqli_error($koneksi);
        }
    }
}
?>