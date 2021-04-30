<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <?php include("config.php"); ?>
</head>
<style>
    <?php include "css/style.css"; ?>
</style>

<body>
    <div class="main">
        <div class="sidebar">
            <ul id="nav">
                <li><a href="index.php">Login</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="lihatdata.php">Lihat Data</a></li>
                <li><a href="cari.php">Cari</a></li>
                <li><a href="tambah.php" class="active">Tambah Buku</a></li>
                <li><a href="hapus.php">Hapus Buku</a></li>
                <li><a href="update.php">Update</a></li>
            </ul>
        </div>
        <div class="content">
            <form method="post">
                <div class="group-form">
                    <label for="form-judul">Judul Buku</label>
                    <div class="input">
                        <input type="text" id="form-judul" placeholder="Judul Buku" name="judul">
                    </div>
                </div>
                <div class="group-form">
                    <label for="form-pengarang">Pengarang</label>
                    <div class="input">
                        <input type="text" id="form-pengarang" placeholder="Pengarang" name="pengarang">
                    </div>
                </div>
                <div class="group-form">
                    <label for="form-penerbit">Penerbit</label>
                    <div class="input">
                        <input type="text" id="form-penerbit" placeholder="Penerbit" name="penerbit">
                    </div>
                </div>
                <div class="group-form">
                    <div>
                        <button type="submit" name="tambah">Tambah</button>
                    </div>
                </div>
            </form>
            <?php
                if(isset($_POST['tambah'])){
					$judul = $_POST['judul'];
					$pengarang = $_POST['pengarang'];
					$penerbit = $_POST['penerbit'];
					$query = "INSERT INTO `6706202013_tbbuku` (`judul`, `pengarang`, `penerbit`) VALUES ('$judul', '$pengarang', '$penerbit')";
					$tambah = mysqli_query($conn, $query);
					if($tambah == true) {
						?>
						<script type="text/javascript">alert('Data berhasil ditambahkan!');</script>
						<?php
					} else {
						?>
						<script type="text/javascript">alert('Gagal!');</script>
						<?php
					}
				}

                if (isset($_COOKIE["login"])) {
                    if ($_COOKIE["login"] == "true") {
                        $_SESSION["login"] = true;
                    }
                }
    
                if (!isset($_SESSION['login'])) {
                    echo "<script>alert('ilegal akses! harus login terlebih dahulu');
                        document.location.href='index.php';</script>";
                    die;
                }
            ?>
        </div>
    </div>
</body>

</html>