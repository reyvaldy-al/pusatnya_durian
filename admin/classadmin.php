<?php
include 'koneksi.php';
class admin {
	private $id,
	$username,
	$password;

	public function login() {
		  global $koneksi;
			if(isset($_POST['login'])){
			$ambil = $koneksi->query("SELECT*FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'");
			$yangcocok = $ambil->num_rows;
			if ($yangcocok==1) {
				$_SESSION['admin'] = $ambil->fetch_assoc();
			 echo "<div class='alert alert-info'>Login Sukses</div>";
			 echo "<meta http-equiv='refresh' content='1;url=index.php'>";
			}
			else{
				echo "<div class='alert alert-danger'>Login Gagal,Periksa Email Atau Passwordnya</div>";
			 echo "<meta http-equiv='refresh' content='1;url=login.php'>";

			}
		 }
	}
	public function ubahproduk(){
		global $koneksi;
		if (isset($_POST['ubah'])){
	  	$namafoto=$_FILES['foto']['name'];
	  	$lokasifoto=$_FILES['foto']['tmp_name'];
	  	// $lokasifoto = $foto['tmp_name'];
	  	if(!empty($lokasifoto)){
	 		move_uploaded_file($lokasifoto,"../foto produk/$namafoto");
	  		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");


	  	}
	  	else{
	  			$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]', deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
	  	}
	 	echo "<script>alert('data produk telah diubah');</script>";
	 	echo "<script>location='index.php?halaman=produk';</script>";
	  }
	}
	public function tambahproduk(){
		global $koneksi;
		if (isset($_POST['save'])) {
			$nama =$_FILES['foto']['name'];
			$lokasi = $_FILES['foto']['tmp_name'];
			move_uploaded_file($lokasi, "../foto produk/".$nama);
			$koneksi->query("INSERT INTO produk(nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk) VALUES ('$_POST[nama]', '$_POST[harga]', '$_POST[berat]','$nama','$_POST[deskripsi]')");
			echo "<div class='alert alert-info'>Data tersimpan</div>";
			echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
		}
	}
	public function hapusproduk(){
		global $koneksi;
		$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
	$fotoproduk = $pecah['foto_produk'];
	if (file_exists("../foto_produk/$fotoproduk"))
	{
		unlink("../foto_produk/$fotoproduk");
	}

	$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

	echo "<script>alert('produk terhapus');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
	}
	public function hapuspelanggan(){
		global $koneksi;
		$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
	

	$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");

	echo "<script>alert('pelanggan terhapus');</script>";
	echo "<script>location='index.php?halaman=pelanggan';</script>";
}
}
 ?>
