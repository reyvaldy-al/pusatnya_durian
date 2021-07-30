<?php
include 'koneksi.php';
class pelanggan {
	private $email,
	$password;

	public function login(){
		global $koneksi;
    if(isset($_POST["login"]))
    {
    	$email = $_POST["email"];
    	$password = $_POST["password"];
    	$ambil = $koneksi->query("SELECT * FROM pelanggan
    		WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
    	$akunyangcocok = $ambil->num_rows;

    	if($akunyangcocok==1)
    	{
    		$akun = $ambil->fetch_assoc();
    		$_SESSION["pelanggan"]=$akun;
    		echo "<script>alert('anda sukses login');</script>";

    		//jika suda belanja
    		if(isset($_SESSION["keranjang"])OR !empty($_SESSION["keranjang"]))
    		{
    			echo "<script>location='checkout.php';</script>";
    		}
    		else
    		{
    			echo "<script>location='index.php';</script>";
    		}
    	}

    	else
    	{
    		echo "<script>alert('anda gagal login');</script>";
    		echo "<script>location='login.php';</script>";
    	}
    }
	}

	public function beli(){
		global $koneksi;
    $id_produk = $_GET['id'];

    if (isset($_SESSION['keranjang'][$id_produk]))
    {
    	$_SESSION['keranjang'][$id_produk]+=1;
    }
    else
    {
    	$_SESSION['keranjang'][$id_produk]=1;
    }
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    //larikan ke halaman keranjang
    echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
    echo "<script>location='keranjang.php';</script>";
	}

	public function hapuskeranjang(){
		global $koneksi;
    $id_produk=$_GET["id"];
    unset($_SESSION["keranjang"][$id_produk]);

    echo "<script>alert('produk dihapus dari keranjang');</script>";
    echo "<script>location='keranjang.php';</script>";
	}

	public function checkout($Totalbelanja){
		global $koneksi;
    if(isset($_POST["checkout"]))
    {
        $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
        $id_ongkir = $_POST["id_ongkir"];
        $tanggal_pembelian = date("Y-m-d");
        $alamat_pengiriman = $_POST['alamat_pengiriman'];

        $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir ='$id_ongkir'");
        $arrayongkir = $ambil->fetch_assoc();
        $nama_kota = $arrayongkir['nama_kota'];
        $tarif = $arrayongkir['tarif'];
        $total_pembelian = $totalbelanja + $tarif;

        //1. menyimpan data ke tabel pembelian
        $koneksi->query("INSERT INTO pembelian(id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman)VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");
        //2. mendapatkan id_pembelian yang baru saja terjadi
        $id_pembelian_barusan = $koneksi->insert_id;

        foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
        {
            $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
            $perproduk = $ambil->fetch_assoc();

            $nama = $perproduk['nama_produk'];
            $harga = $perproduk['harga_produk'];
            $berat = $perproduk['berat_produk'];
            $subberat = $perproduk['berat_produk']*$jumlah;
            $subharga = $perproduk['harga_produk']*$jumlah;

            $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah)VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");

            //script update stok
            $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah WHERE id_produk='$id_produk'");
        }
        //3. setelah checkout, mengkosongkan keranjang belanja

        unset($_SESSION["keranjang"]);

        //4. tampilan akan dialihkan ke halaman nota,nota dari pembelian yang baru terjadi
        echo "<script>alert('pembelian sukses');</script>";
        echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
      }
    }
  }
 ?>
