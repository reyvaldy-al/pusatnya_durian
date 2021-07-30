<h2>Tambah Produk</h2>
<?php
include 'classadmin.php';
session_start();
if(isset($_POST['save'])){
  $login = new admin();
  if($login->tambahproduk($_POST)){
    $_SESSION["save"];
  }
}
 ?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga (Rp></label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Berat (gr_cm)</label>
		<input type="number" class="form-control" name="berat">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>

</form>
<?php

 ?>
