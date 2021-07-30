<?php
session_start();
//koneksi ke database
   include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>PUSATNYA DURIAN</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php'; ?>

	<!--konten-->
	<section class="konten">
		<div class="container">
      <img src="HOME.png">
      <br><br>
			<div class="row">

				<?php $ambil = $koneksi->query("SELECT * FROM produk");?>
				<?php while($perproduk = $ambil->fetch_assoc()){ ?>

				<div class="col-md-3">
					<div class="thumbnail">
						<img src="foto produk/<?php echo $perproduk['foto_produk']; ?>" alt="" width="150px">
						<div class="caption">
							<h3><?php echo $perproduk['nama_produk']; ?></h3>
							<h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
							<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
                            <a href= "detail.php?id=<?php echo $perproduk["id_produk"];?>" class = "btn btn-default">Detail</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
</body>
</html>
