<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Absensi Online</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background: #f8f9fa; }
        .box { background: white; padding: 20px; margin: 50px auto; width: 300px; border-radius: 10px; }
        input, button { padding: 10px; width: 90%; margin-top: 10px; }
        button { background: #007bff; color: white; border: none; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Absensi Kehadiran</h2>
        <form method="POST">
            <input type="text" name="nama" placeholder="Masukkan Nama" required><br>
            <button type="submit" name="absen">Absen</button>
        </form>
    </div>

<?php
if (isset($_POST['absen'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $tanggal = date("Y-m-d");
    $waktu = date("H:i:s");

    $sql = "INSERT INTO absensi (nama, tanggal, waktu) VALUES ('$nama', '$tanggal', '$waktu')";
    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:green;'>Absen berhasil!</p>";
    } else {
        echo "<p style='color:red;'>Gagal absen!</p>";
    }
}
?>
</body>
</html>