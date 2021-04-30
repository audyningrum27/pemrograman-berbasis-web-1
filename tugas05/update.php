<?php
session_start();
		
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buku</title>
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
                <li><a href="hapus.php">Hapus Buku</a></li>
                <li><a href="update.php" class="active">Update</a></li>
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
                    <div>
                        <button type="submit" name="submit">Cari Buku</button>
                    </div>
                </div>
            </form>

            <?php
				//kode php disini
				if(isset($_POST['submit'])) {
					$judul = $_POST['judul'];
					$query = "SELECT * FROM 6706202013_tbbuku WHERE judul='$judul'";
					$hasil = mysqli_query($conn, $query);
					if($hasil == true) {
						foreach ($hasil as $value) {
							$judul = $value['judul'];
							$pengarang = $value['pengarang'];
							$penerbit = $value['penerbit'];
							?>
							<form method="post" class="table">
								<div class="group-form">
									<label>Judul Buku</label>
									<div class="input">
										<input type="text" value="<?php echo "$judul"; ?>" placeholder="Judul Buku" name="judul">
									</div>
								</div>
								<div class="group-form">
									<label>Pengarang</label>
									<div class="input">
										<input type="text" value="<?php echo "$pengarang"; ?>" placeholder="Pengarang" name="pengarang">
									</div>
								</div>
								<div class="group-form">
									<label>Penerbit</label>
									<div class="input">
										<input type="text" value="<?php echo "$penerbit"; ?>" placeholder="Penerbit" name="penerbit">
									</div>
								</div>
								<div class="group-form">
									<div>
										<button type="submit" name="update">Update</button>
									</div>
								</div>
							</form>
							<?php
						}
					}
				}
			?>
        </div>
    </div>
    <?php
		if(isset($_POST['update'])) {
			$judul_update = $_POST['judul'];
			$pengarang_update = $_POST['pengarang'];
            $penerbit_update = $_POST['penerbit'];
			$query = "UPDATE 6706202013_tbbuku SET pengarang='$pengarang_update', penerbit='$penerbit_update' WHERE judul='$judul_update'";
			$update = $conn -> query($query);
			if($update == true) {
				?>
				<script>alert('Data berhasil diupdate');</script>
				<?php
			}
		}
	?>
</body>

</html>