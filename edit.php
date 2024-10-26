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
// Mengambil data buku
$id_buku = $conn->real_escape_string($_GET['id']);
$sql = "SELECT * FROM buku WHERE id_buku='$id_buku'";
$result = $conn->query($sql);
$buku = $result->fetch_assoc();

// edit buku
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $nama_buku = $conn->real_escape_string($_POST['nama_buku']);
    $kategori = $conn->real_escape_string($_POST['kategori']);
    $harga = $conn->real_escape_string($_POST['harga']);
    $stok = $conn->real_escape_string($_POST['stok']);
    $nama_penerbit = $conn->real_escape_string($_POST['nama_penerbit']);

    $sql = "UPDATE buku SET nama_buku='$nama_buku', kategori='$kategori', harga='$harga', stok='$stok', nama_penerbit='$nama_penerbit' WHERE id_buku='$id_buku'";
    $conn->query($sql);
    header('Location: admin.php');
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>
    
    <form method="POST">
        <br><label>ID Buku :</label>
        <input type="text" name="id_buku" placeholder="ID Buku" required></br>
        <br><label>Kategori :</label>
        <input type="text" name="kategori" value="<?php echo $buku['kategori']; ?>" required></br>
        <br><label>Nama Buku :</label>
        <input type="text" name="nama_buku" value="<?php echo $buku['nama_buku']; ?>" required></br>
        <br><label>Harga Buku :</label>
        <input type="number" name="harga" value="<?php echo $buku['harga']; ?>" required></br>
        <br><label>Stok Buku :</label>
        <input type="number" name="stok" value="<?php echo $buku['stok']; ?>" required></br>
        <br><label>Nama Penerbit :</label>
        <input type="text" name="nama_penerbit" value="<?php echo $buku['nama_penerbit']; ?>" required></br>
        <br>
        <input type="submit" class="btn btn-primary mt-2" name="edit">
        <a href="admin.php" class="btn btn-primary mt-2">Kembali</a>
    </form>
</body>
</html>
