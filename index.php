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

// Fungsi pencarian
$search = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

// Query untuk mengambil data buku
$sql = "SELECT * FROM buku WHERE nama_buku LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<table class="table table-bordered">
        <tr>
            <th><a href="index.php">HOME</a></th>
            <th><a href="admin.php">ADMIN</a></th>
            <th><a href="pengadaan.php">PENGADAAN</a></th>
        </tr>
    </table>
<div class="container mt-5">
<h1>UNIBOOKSTORE</h1>
    <h2>Daftar Buku</h2>
    
    <form method="POST" class="mb-4">
        <input type="text" name="search" placeholder="Cari Nama Buku" class="form-control" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit" class="btn btn-primary mt-2">Cari</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Buku</th>
                <th>Kategori</th>
                <th>Nama Buku</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Penerbit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id_buku']}</td>
                            <td>{$row['kategori']}</td>
                            <td>{$row['nama_buku']}</td>
                            <td>{$row['harga']}</td>
                            <td>{$row['stok']}</td>
                            <td>{$row['nama_penerbit']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
