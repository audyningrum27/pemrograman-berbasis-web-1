<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
                <li><a href="admin.php" class="active">Admin</a></li>
                <li><a href="lihatdata.php">Lihat Data</a></li>
                <li><a href="cari.php">Cari</a></li>
                <li><a href="tambah.php">Tambah Buku</a></li>
                <li><a href="hapus.php">Hapus Buku</a></li>
                <li><a href="update.php">Update</a></li>
            </ul>
        </div>
        <div class="content">
            <?php
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
            <p class="teks">Selamat Datang <b><?php echo $_SESSION['user'] ?></b></p>
            
            <a class="button" href="logout.php" onclick="return confirm('yakin akan logout ?')">Logout
            </a>
        </div>
    </div>
</body>

</html>