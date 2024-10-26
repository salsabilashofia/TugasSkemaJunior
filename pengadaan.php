<?php
// Koneksi ke database
$host = 'localhost'; 
$user = 'root'; 
$password = ''; 
$database = 'databuku'; 

$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil semua buku dan mengurutkan berdasarkan stok paling sedikit
$sql = "SELECT nama_buku, nama_penerbit, stok FROM buku ORDER BY stok ASC";
$result = $conn->query($sql);

// Cek  query 
if (!$result) {
    die("Query gagal: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengadaan Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<table class="table table-bordered"><center>
        <tr>
            <th><a href="index.php">HOME</a></th>
            <th><a href="admin.php">ADMIN</a></th>
            <th><a href="pengadaan.php">PENGADAAN</a></th>
        </tr></center>
    </table>
<div class="container mt-5">
<h1>UNIBOOKSTORE</h1>
    <h2>Pengadaan Buku</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Buku</th>
                <th>Nama Penerbit</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nama_buku']}</td>
                            <td>{$row['nama_penerbit']}</td>
                            <td>{$row['stok']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td class='text-center'>Tidak ada buku yang tersedia</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>