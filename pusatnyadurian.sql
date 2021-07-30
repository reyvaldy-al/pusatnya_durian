-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 04:09 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusatnyadurian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'tokodurian.com', 'tokodurian.com', 'toko durian');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Purwokerto', 10000),
(2, 'Purbalingga', 20000),
(3, 'Cilacap', 30000),
(4, 'Jogja', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'galihwnsyamsudin@gmail.com', 'galih', 'galih wahyu nur syamsudin', '085747756183', ''),
(2, 'rebelion747@gmail.com', 'rebelion747', 'rebelion', '087711454743', ''),
(3, 'kamucuma656@gmail.com', 'kamucuma656', 'kamu cuma', '085647739507', 'ittelkom'),
(4, 'asd@sex.com', 'durenmontok', 'nijar', '087865477336', 'teluk c6'),
(5, 'gmail@reyogawa.com', 'abc123', 'reyvaldy', '0812345', 'buntu'),
(6, 'agz@ittp.com', 'agz@ittp.com', 'Anggi', '08888888', 'telkom'),
(7, 'lol@lol.com', '1234', 'lol', '12345', 'bbbb'),
(8, 'aditya@gmail.com', 'aditya8255', 'ujang', '081', 'jln kamboja');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 1, 'galih wahyu nur syamsudin', 'BCA', 685000, '2019-07-09', '20190709101120bukti tf.jpg'),
(2, 20, '', '', 0, '2019-07-12', ''),
(3, 21, 'nijar', 'BCA', 110000, '2019-07-12', '20190712170956Screenshot_2019-03-21 Galih WN Syamsudin ( galihwnsyamsudin) â€¢ Foto dan video Instag'),
(4, 22, 'nijar', 'BCA', 70000, '2019-07-12', '20190712171418Untitled.png'),
(5, 25, 'Reyvaldy', 'BNI', 100000, '2019-07-13', '20190713061852WhatsApp Image 2019-04-21 at 22.48.02.jpeg'),
(6, 32, 'as', 'BNI', 100000, '2019-07-15', '2019071509585833o1nnt.jpg'),
(7, 33, 'asd', 'bnc', 10000000, '2019-07-15', '201907151012562000px-Brother_logo.svg.png'),
(8, 33, 'sada', 'sad', 123123123, '2019-07-15', '201907151013231251.jpeg'),
(9, 33, 'Rey', 'BN', 300000, '2019-07-15', '20190715101446231.jpeg'),
(10, 34, 'Rey', 'BNI', 100000, '2019-07-15', '20190715101616231.jpeg'),
(11, 35, 'Agz', 'BNI', 100000, '2019-07-15', '20190715101956231.jpeg'),
(12, 36, '', '', 0, '2019-07-15', '20190715110216');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `id_ongkir`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(1, 1, '2019-07-08', 685000, 1, 'Purwokerto', 10000, 'kalibagor blok e.63 (53191)', 'barang dikirim', '1000'),
(18, 2, '2019-07-08', 180000, 3, 'Cilacap', 30000, 'cilacap deket pantai (0000)', 'pending', ''),
(19, 3, '2019-07-08', 340000, 4, 'Jogja', 40000, 'deket malioboro(9999)', 'pending', ''),
(20, 1, '2019-07-12', 60000, 1, 'Purwokerto', 10000, 'puri teluk c6', 'batal', ''),
(21, 1, '2019-07-12', 110000, 1, 'Purwokerto', 10000, 'teluk c6', 'barang dikirim', 'PWT96011'),
(22, 4, '2019-07-12', 70000, 2, 'Purbalingga', 20000, 'mbuh', 'barang dikirim', 'pwt1'),
(23, 1, '2019-07-12', 120000, 2, 'Purbalingga', 20000, 'selabaya(0001)', 'pending', ''),
(24, 1, '2019-07-12', 50000, 0, '', 0, '', 'pending', ''),
(25, 5, '2019-07-13', 100000, 0, '', 0, 'Buntu, sidamulya', 'sudah kirim pembayaran', ''),
(26, 1, '2019-07-14', 80000, 3, 'Cilacap', 30000, 'mbuh(9999)', 'pending', ''),
(27, 3, '2019-07-14', 85000, 1, 'Purwokerto', 10000, 'blablabla(000)', 'pending', ''),
(28, 3, '2019-07-14', 10000, 1, 'Purwokerto', 10000, 'blablabla(000)', 'pending', ''),
(29, 3, '2019-07-14', 95000, 2, 'Purbalingga', 20000, 'gcgcg', 'pending', ''),
(30, 3, '2019-07-14', 60000, 1, 'Purwokerto', 10000, 'asd', 'pending', ''),
(31, 3, '2019-07-15', 85000, 1, 'Purwokerto', 10000, 'dasd', 'pending', ''),
(32, 10, '2019-07-15', 75000, 0, '', 0, '', 'sudah kirim pembayaran', ''),
(33, 6, '2019-07-15', 270000, 2, 'Purbalingga', 20000, 'Kunyuk', 'barang dikirim', '1000'),
(34, 6, '2019-07-15', 100000, 0, '', 0, '', 'sudah kirim pembayaran', ''),
(35, 6, '2019-07-15', 90000, 3, 'Cilacap', 30000, 'buntu', 'sudah kirim pembayaran', ''),
(36, 7, '2019-07-15', 335000, 1, 'Purwokerto', 10000, 'kepo\r\n', 'sudah kirim pembayaran', ''),
(37, 6, '2019-07-15', 75000, 0, '', 0, '', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 1, 1, '', 0, 0, 0, 0),
(2, 1, 2, 1, '', 0, 0, 0, 0),
(3, 12, 8, 1, '', 0, 0, 0, 0),
(4, 13, 3, 1, 'Buah durian ochee atau duri hitam', 100000, 1000, 1000, 100000),
(5, 13, 4, 1, 'Buah durian canee', 50000, 1000, 1000, 50000),
(6, 14, 4, 2, 'Buah durian canee', 60000, 1000, 2000, 120000),
(7, 15, 1, 1, 'Buah Durian Bhineka Bawor', 50000, 1000, 1000, 50000),
(8, 15, 2, 1, 'Buah durian Musang King', 75000, 1000, 1000, 75000),
(9, 15, 6, 1, 'bibit durian bhineka bawor bawor 1.5 meter', 75000, 5000, 5000, 75000),
(10, 16, 1, 1, 'Buah Durian Bhineka Bawor', 50000, 1000, 1000, 50000),
(11, 17, 2, 1, 'Buah durian Musang King', 75000, 1000, 1000, 75000),
(12, 17, 10, 2, 'bibit durian ochee 1.5 meter', 300000, 5000, 10000, 600000),
(13, 18, 2, 2, 'Buah durian Musang King', 75000, 1000, 2000, 150000),
(14, 19, 5, 3, 'Bibit durian bhineka bawor 1 meter', 100000, 5000, 15000, 300000),
(15, 20, 1, 1, 'Buah Durian Bhineka Bawor', 50000, 1000, 1000, 50000),
(16, 21, 3, 1, 'Buah durian ochee atau duri hitam', 100000, 1000, 1000, 100000),
(17, 22, 1, 1, 'Buah Durian Bhineka Bawor', 50000, 1000, 1000, 50000),
(18, 23, 3, 1, 'Buah durian ochee atau duri hitam', 100000, 1000, 1000, 100000),
(19, 24, 1, 1, 'Buah Durian Bhineka Bawor', 50000, 1000, 1000, 50000),
(20, 25, 1, 2, 'Buah Durian Bhineka Bawor', 50000, 1000, 2000, 100000),
(21, 26, 1, 1, 'Buah Durian Bhineka Bawor', 50000, 1000, 1000, 50000),
(22, 27, 2, 1, 'Buah durian Musang King', 75000, 1000, 1000, 75000),
(23, 29, 2, 1, 'Buah durian Musang King', 75000, 1000, 1000, 75000),
(24, 30, 1, 1, 'Buah Durian Bhineka Bawor', 50000, 1000, 1000, 50000),
(25, 31, 2, 1, 'Buah durian Musang King', 75000, 1000, 1000, 75000),
(26, 32, 2, 1, 'Buah durian Musang king super', 75000, 1000, 1000, 75000),
(27, 33, 2, 2, 'Buah durian Musang king super', 75000, 1000, 2000, 150000),
(28, 33, 3, 1, 'Buah durian ochee atau duri hitam', 100000, 1000, 1000, 100000),
(29, 34, 3, 1, 'Buah durian ochee atau duri hitam', 100000, 1000, 1000, 100000),
(30, 35, 4, 1, 'Buah durian canee', 60000, 1000, 1000, 60000),
(31, 36, 9, 1, 'bibit durian ochee 1 meter', 250000, 5000, 5000, 250000),
(32, 36, 2, 1, 'Buah durian Musang king super', 75000, 1000, 1000, 75000),
(33, 37, 2, 1, 'Buah durian Musang king super', 75000, 1000, 1000, 75000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `berat_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(2, 'Buah durian Musang king super', 1000, 75000, 'durian-musang-king-3.jpg', ' 			 			 			 			 			Buah durian musang king asli malaysia 		 		 		 		 		', 92),
(4, 'Buah durian canee', 1000, 60000, 'buah-durian-cane.jpg', ' 			 			Buah durian asli thailan 		 		', 99),
(5, 'Bibit durian bhineka bawor 1 meter', 5000, 100000, 'bibit bawor.jpg', ' 			bibit durian bhineka bawor 1.5 meter 		', 100),
(6, 'bibit durian bhineka bawor bawor 1.5 meter', 5000, 75000, 'bibit bawor 1,5.jpg', ' 			 			 			bibi durian bhineka bawor 		 		 		', 100),
(7, 'bibit durian musang king 1 meter', 5000, 150000, 'bibit musangking.jpg', ' 			bibit durian musang king 		', 100),
(8, 'bibit durian musang king 1.5 meter', 5000, 200000, 'mk1,5.jpg', 'bibit durian musang king', 100),
(9, 'bibit durian ochee 1 meter', 5000, 250000, 'bibit duri hitam.jpg', ' 			bibit durian duri hitam atau biasa dikenal dengan nama durian ochee,asli malaysia 		', 99),
(10, 'bibit durian ochee 1.5 meter', 5000, 300000, 'bibit duri hitam 1,5.jpg', ' 			durian duri hitam ukuran 1.5 meter 		', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
