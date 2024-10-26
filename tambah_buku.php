<?php
$mysqli = new mysqli("localhost", "root", "", "databuku");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// form penambahan buku
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_buku'])) {
    $id_buku = $_POST['id_buku']; 
    $kategori = $_POST['kategori'];
    $nama_buku = $_POST['nama_buku'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $nama_penerbit = $_POST['nama_penerbit'];

    $stmt = $mysqli->prepare("INSERT INTO buku (id_buku, kategori, nama_buku, harga, stok, nama_penerbit) VALUES (?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        die("Prepare failed: " . $mysqli->error);
    }
    
    $stmt->bind_param("ssssis", $id_buku, $kategori, $nama_buku, $harga, $stok, $nama_penerbit);
    $stmt->execute();
    $stmt->close();

    // kembali ke admin setelah buku
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </style>
</head>
<body>
    <h1>Tambah Buku</h1>
    <div class="form-container">
        <form method="POST">
            <label>ID Buku:</label>
            <input type="text" name="id_buku" required><br><br>
            <label>Kategori:</label>
            <input type="text" name="kategori" required><br><br>
            <label>Nama Buku:</label>
            <input type="text" name="nama_buku" required><br><br>
            <label>Harga:</label>
            <input type="number" name="harga" step="0.01" required><br><br>
            <label>Stok:</label>
            <input type="number" name="stok" required><br><br>
            <label>Penerbit:</label>
            <input type="text" name="nama_penerbit" required><br><br>
            <input type="submit" class="btn btn-primary mt-2" name="add_buku" value="Tambah Buku">
            <a href="admin.php" class="btn btn-primary mt-2">Kembali</a>
        </form>
    </div>
</body>
</html>