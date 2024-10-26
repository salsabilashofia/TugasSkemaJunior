<?php
$mysqli = new mysqli("localhost", "root", "", "databuku");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Form menghapus buku
if (isset($_GET['delete'])) {
    $id_buku = $_GET['delete'];
    
    $stmt = $mysqli->prepare("DELETE FROM buku WHERE id_buku = ?");
    $stmt->bind_param("s", $id_buku);
    
    if ($stmt->execute()) {
        echo "Buku berhasil dihapus.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Mencari buku
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

$query = "SELECT * FROM buku WHERE nama_buku LIKE ?";
$stmt = $mysqli->prepare($query);
$search_param = "%" . $search_query . "%";
$stmt->bind_param("s", $search_param);
$stmt->execute();
$result_buku = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin UNIBOOKSTORE</title>
    <link rel="stylesheet" href="css/style.css">
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
    <h1>UNIBOOKSTORE</h1>
    <p>Khusus Admin</p>
    <a href="tambah_buku.php" class="btn btn-primary mt-2">Tambah Buku</a>
    <form method="get" action="">
        <input type="text" name="search" value="<?php echo htmlspecialchars($search_query); ?>" placeholder="Cari nama buku..." />
        <button type="submit" class="btn btn-primary mt-2">Cari</button>
    </form>

    <h2>Daftar Buku</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID Buku</th>
            <th>Kategori</th>
            <th>Nama Buku</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Penerbit</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result_buku->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id_buku']); ?></td>
            <td><?php echo htmlspecialchars($row['kategori']); ?></td>
            <td><?php echo htmlspecialchars($row['nama_buku']); ?></td>
            <td><?php echo htmlspecialchars($row['harga']); ?></td>
            <td><?php echo htmlspecialchars($row['stok']); ?></td>
            <td><?php echo htmlspecialchars($row['nama_penerbit']); ?></td>
            <td>
                <a href="?delete=<?php echo htmlspecialchars($row['id_buku']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">Hapus</a>
                <a href="edit.php?id=<?php echo htmlspecialchars($row['id_buku']); ?>">Edit</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
