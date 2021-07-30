<?php
include 'classpelanggan.php';
session_start();
if(isset($_POST['checkout'])){
  $login = new pelanggan();
  if($login->checkout($_POST)){
    $_SESSION["checkout"];
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
    <?php include 'menu.php'; ?>

<section class="konten">
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $totalbelanja = 0; ?>
                <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
                <?php
                $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                $pecah = $ambil->fetch_assoc();
                $subharga = $pecah["harga_produk"]*$jumlah;
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah["nama_produk"]; ?></td>
                    <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>Rp. <?php echo number_format($subharga); ?></td>

                </tr>
                <?php $nomor++; ?>
                <?php $totalbelanja+=$subharga; ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Belanja</th>
                    <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                </tr>
            </tfoot>
        </table>

        <form method="post">
            <div class = "row">
                <div class = "col-md-4">
                <div class="form-group">
                <input type="text" readonly value= "<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class = "form-control">
            </div>
                </div>
                <div class = "col-md-4">
                                <div class="form-group">
                <input type="text" readonly value= "<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class = "form-control">
            </div>
                </div>
                <div class = "col-md-4">
                    <select class="form-control" name="id_ongkir">
                        <option value="">Pilih ongkos kirim</option>
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM ongkir");
                        while($perongkir = $ambil->fetch_assoc()){ ?>
                        <option value="<?php echo $perongkir["id_ongkir"] ?>">
                            <?php echo $perongkir['nama_kota'] ?>-
                           Rp. <?php echo number_format($perongkir['tarif']) ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Alamat Lengkap Pengiriman</label>
                <textarea class="form-control" name="alamat_pengiriman" placeholder="masukan alamat lengkap pengiriman(termasuk kode pos)"></textarea>
            </div>
            <button class ="btn btn-primary" name="checkout">Checkout</button>
        </form>

        <?php

         ?>

    </div>
</section>
<!-- <gadipake, buat nampilin array>
    <?php print_r($_SESSION['pelanggan']); ?></pre>
   <pre><?php print_r($_SESSION["keranjang"]) ?></pre>  -->
</body>
</html>
