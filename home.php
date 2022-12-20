<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contoh Modularisasi</title>
    <link href="style2.css" rel="stylesheet" type="text/stylesheet"
media="screen" />
</head>
<body>
<?php
include("koneksi.php");

// query untuk menampilkan data
$q="";
if (isset($_GET['submit']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where = " WHERE nama LIKE '{$q}%'";
}
$title = 'Data Barang';
include_once 'koneksi.php';
$sql = 'SELECT * FROM data_barang';
if (isset($sql_where))
    $sql .= $sql_where;
$result = mysqli_query($conn, $sql);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style2.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>D A T A B A S E</h1>
        </header>
        <nav>
            <a href="home.php">Home</a>
            <a href="tambah.php">Tambah Barang</a>
            <a href="ubah.php">Ubah Barang</a>
            <a href="hapus.php">Hapus Barang</a>
        </nav>
        <div class="container">
        <h1>Data Barang</h1>
        <div class="main">
<?php
?>
<form action="" method="get">
    <label for="q">Cari data: </label>
    <input type="text" id="q" name="q" class="input-q" value="<?php echo $q ?>">
    <input type="submit" name="submit" value="Cari" class="btn btn-primary">
</form>

            <table>
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Katagori</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php if($result): ?>
            <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td><img src="gambar/<?= $row['gambar'];?>" alt="<?=
$row['nama'];?>"></td>
                <td><?= $row['nama'];?></td>
                <td><?= $row['kategori'];?></td>
                <td><?= $row['harga_beli'];?></td>
                <td><?= $row['harga_jual'];?></td>
                <td><?= $row['stok'];?></td>
                <td>
                <a href="ubah.php?id=<?= $row['id_barang'];?>">Ubah</a>
                <a href="hapus.php?id=<?= $row['id_barang'];?>">Hapus</a> 
                </td>
            </tr>
            <?php endwhile; else: ?>
            <tr>
                <td colspan="7">Belum ada data</td>
            </tr>
            <?php endif; ?>
            </table>
        </div>
    </div>
        <footer>
            <p>&copy; 2022 Informatika Universitas Pelita Bangsa</p>
        </footer>
    </div>
</body>
</html>
