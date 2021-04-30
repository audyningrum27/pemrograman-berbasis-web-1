<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Buku</title>
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
                <li><a href="cari.php" class="active">Cari</a></li>
                <li><a href="tambah.php">Tambah Buku</a></li>
                <li><a href="hapus.php">Hapus Buku</a></li>
                <li><a href="update.php">Update</a></li>
            </ul>
        </div>
        <div class="content">
            <form method="post">
                <div class="group-form">
                    <label for="form-cari">Judul Buku</label>
                    <div class="input">
                        <input type="text" id="form-cari" placeholder="Judul Buku" name="judul">
                    </div>
                </div>
                <div class="group-form">
                    <div>
                        <button type="submit" name="cari">Cari Buku</button>
                    </div>
                </div>
            </form>
            <?php
                if(isset($_POST['cari'])) {
					$judul = $_POST['judul'];
					$query = "SELECT * FROM 6706202013_tbbuku WHERE judul='$judul'";
					$hasil = mysqli_query($conn, $query);
					?>
					<table class="table">
						<tr>
							<th>Judul Buku</th>
							<th>Pengarang</th>
							<th>Penerbit</th>
						</tr>
					<?php
					if($hasil == true) {
						foreach ($hasil as $value) {
							$judul = $value['judul'];
							$pengarang = $value['pengarang'];
                            $penerbit = $value['penerbit'];
							?>
							<tr>
								<td><?php echo "$judul"; ?></td>
								<td><?php echo "$pengarang"; ?></td>
								<td><?php echo "$penerbit"; ?></td>
							</tr>
							<?php
						}
					} else {
						echo "tidak ada data:";
					}
					?>
					</table>
					<?php
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