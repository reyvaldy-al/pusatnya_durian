<h2>Ubah Produk</h2>
<?php
include 'classadmin.php';

if(isset($_POST['ubah'])){
  $login = new admin();
  if($login->ubahproduk($_POST)){
    $_SESSION["ubah"];
  }
}
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

 ?>

 <form method="post" enctype="multipart/form-data">
 	<div class="form-group">

 		<img class="img-polaroid" style="margin-left: 30%;height: 200px;border: 1.5px solid blue; border-radius: 40px;" src="../foto produk/<?php echo $pecah['foto_produk']; ?>">

 		<input type="file" name="foto" class="form-control" >

 	</div>



 	<div class="form-group">
 		<label>Nama Produk</label>
 		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk'];?>">
 	</div>

 	<div class="form-group">
 		<label>Harga Rp</label>
 		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>" >
 	</div>
 	<div class="form-group">
 		<label>Berat gr</label>
 		<input type="number" name="berat" class="form-control" value="<?php echo $pecah['berat_produk']; ?>" >
 	</div>

 	<div class="form-group">
 		<label>Deskripsi</label>
 		<textarea name="deskripsi" class="form-control" rows="10">
 			<?php  echo $pecah ['deskripsi_produk']; ?>
 		</textarea>
 	</div>
 	<button class="btn btn-primary" name="ubah">Ubah</button>
 </form>

 <?php

 	?>
