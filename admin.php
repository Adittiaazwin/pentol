<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Absensi</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: auto; background: white; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background: #007bff; color: white; }
        a { text-decoration: none; color: red; }
    </style>
</head>
<body>
<h2 style="text-align:center;">Data Absensi</h2>
<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Waktu</th>
    </tr>
    <?php
    $no = 1;
    $data = mysqli_query($conn, "SELECT * FROM absensi ORDER BY id DESC");
    while ($row = mysqli_fetch_assoc($data)) {
        echo "<tr>
                <td>{$no}</td>
                <td>{$row['nama']}</td>
                <td>{$row['tanggal']}</td>
                <td>{$row['waktu']}</td>
              </tr>";
        $no++;
    }
    ?>
</table>
<p style="text-align:center;"><a href="logout.php">Logout</a></p>
</body>
</html>