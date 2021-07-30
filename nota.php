<?php include 'koneksi.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Nota Pembelian</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'menu.php'; ?>

<section class = "konten">
	<div class = "container">

<!--nota copas detail di admin-->
<h2>Detail Pembelian</h2>
<?php
 $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan Where pembelian.id_pembelian='$_GET[id]'");
 $detail = $ambil->fetch_assoc(); ?>

 <!-- <pre><?php //print_r($detail); ?></pre> -->
<?php
$idpelangganyangbeli = $detail["id_pelanggan"];
$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];
if ($idpelangganyangbeli!==$idpelangganyanglogin)
{
	echo "<script>alert('usaha yang sia-sia :v');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
 ?>
 <div class="row">
 	<div class="col-md-4">
 		<h3>Pembelian</h3>
 		<strong>No. Pembelian: <?php echo $detail['id_pembelian'] ?></strong><br>
 		Tanggal: <?php echo $detail['tanggal_pembelian']; ?><br>
 		Total: <?php echo number_format($detail['total_pembelian']) ?>
 	</div>
 	<div class="col-md-4">
 		<h3>Pelanggn</h3>
 		<strong><?php echo $detail['nama_pelanggan']; ?></strong>
 		<p>

 			<?php echo $detail['telepon_pelanggan']; ?><br>
 			<?php echo $detail['email_pelanggan']; ?>

		</p>
 	</div>
 	<div class="col-md-4">
 		<h3>Pengiriman</h3>
 		<strong><?php echo $detail['nama_kota'] ?></strong><br>
 		Ongkos Kirim: Rp. <?php echo number_format($detail['tarif']); ?><br>
 		Alamat: <?php echo $detail['alamat_pengiriman'] ?>
 	</div>
 </div>
 <table class="table table-bordered">
	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama Produk</th>
 			<th>Harga</th>
 			<th>Berat</th>
 			<th>Jumlah</th>
 			<th>Subberat</th>
 			<th>Subtotal</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; ?>
 		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian ='$_GET[id]'"); ?>
 		<?php while($pecah=$ambil->fetch_assoc()){ ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['nama']; ?></td>
 			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
 			<td><?php echo $pecah['berat']; ?> gr.</td>
 			<td><?php echo $pecah['jumlah']; ?></td>
 			<td><?php echo $pecah['subberat'] ?> gr.</td>
 			<td>Rp. <?php echo number_format($pecah['subharga']) ?></td>
			<a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-success">Pembayaran</a>
		</tr>

 		<?php $nomor++; ?>
 	<?php } ?>

 	</tbody>
 </table>

<div class = "row">
	<div class = "col-md-7">
		<div class = "alert alert-info">
			<p>
				Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
				<strong>BANK BNI 00431-01-61-002603-1 AN. GALIH WAHYU NUR SYAMSUDIN </strong>
			</p>

		</div>
	</div>
</div>
<!-- <tr>
	<td>
<a href="pembayaran.php?id=<?php echo $pecah['$id_pelanggan'] ?>" class="btn btn-info">Pembayaran</a>
	</td>
</tr> -->
	</div>
</section>

</body>
</html>
