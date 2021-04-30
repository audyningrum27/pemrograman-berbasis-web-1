<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Buku</title>
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
                <li><a href="tambah.php">Tambah Buku</a></li>
                <li><a href="hapus.php" class="active">Hapus Buku</a></li>
                <li><a href="update.php">Update</a></li>
            </ul>
        </div>
        <div class="content">
            <form method="post">
                <div class="group-form">
                    <label for="form-hapus">Judul Buku</label>
                    <div class="input">
                        <input type="text" id="form-hapus" placeholder="Judul Buku" name="judul">
                    </div>
                </div>
                <div class="group-form">
                    <div>
                        <button type="submit" name="hapus">Hapus Buku</button>
                    </div>
                </div>
            </form>
            <?php
                if(isset($_POST['hapus'])) {
                    $judul = $_POST['judul'];
                    $query = "DELETE FROM 6706202013_tbbuku WHERE judul='$judul'";
                    $hapus = mysqli_query($conn, $query);
                    if($hapus == true) {
                        ?>
                        <Script>alert('Data Berhasil dihapus');</Script>
                        <?php
                    } else {
                        ?>
                        <script>alert('Gagal');</script>
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