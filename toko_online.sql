-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2022 pada 14.05
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(10) NOT NULL,
  `gambar` text NOT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`, `berat`) VALUES
(1, 'Jacket', 'Nevada', 'Pakaian Pria', 200000, 0, 'jacket.jpg', 500),
(4, 'Kamera DSLR', '6D', 'Elektronik', 1000000, -10, 'kamera.jpg', 300),
(5, 'Speaker Bluetooth', 'Sony Merk', 'Elektronik', 200000, -7, 'speaker.jpg', 0),
(51, 'Headphone', 'JBL Headphone', 'Elektonik', 100000, 5, 'headphone1.jpg', 0),
(52, 'SSD Eksternal', 'V-GEN 256 GB external ssd', 'Elektronik', 450000, 1, 'ssd1.jpg', 0),
(57, 'Pakaian anak', 'New Produk terbaru size umur 4-8 tahun', 'Pakaian Anak', 30000, 100, '4b0fd5f63b47011a07ddf80e2c6e641d.jpg', 0),
(59, 'Canon x411s', 'Printer terbaru canon harga murah CMYK', 'Elektronik', 2000000, 10, '519qNsCy5FL__SL500_AA280_.jpg', 0),
(60, 'Jacket new boy', 'terbaru terjangkau anti debu', 'Pakaian Anak', 80000, 29, '9757808ad050716f25f08599d86b79ff--pakaian-anak-anak-laki.jpg', 0),
(61, 'Rei Bag', '30 liter new', 'Pakaian Pria', 500000, 5, '10602314_A1_V7.jpg', 0),
(62, 'Celana Panjang BlackHawk', 'size 30-38', 'Pakaian Pria', 150000, 39, '15720012_B_V6.jpg', 0),
(63, 'Celana Pendek Gaul', 'size 30-38', 'Pakaian p', 60000, 34, '19803059_B_V1.jpg', 0),
(64, 'Tas Cantik nanas', 'for student style bag', 'Pakaian Wanita', 45000, 140, 'ananas-tas-zwart.jpg', 0),
(65, 'ACCU Batery', 'Yuasa battery', 'Elektronik', 200000, 200, 'BBB100.jpg', 0),
(66, 'Jam Tangan Swiss', 'Water resistant', 'Pakaian Pria', 150000, 64, '5d3ef5d712f6e.jpg', 0),
(67, 'Adidas new ', 'Ready size 29-43', 'Pakaian Pria', 110000, 300, '3M-reflective-rope-shoelaces-sneakers-black21.jpg', 0),
(68, 'Arloji Pria', 'New Arloji Keren', 'Pakaian Pria', 200000, 79, '20170621_020322arloji.jpg', 0),
(69, 'Philips Magic jar', 'Until 5kg', 'Elektronik', 250000, 70, 'c07c3d64a09bf22caa061322de4e7d4d.jpg', 0),
(70, 'Celana Pendek army', 'size 30-38', 'Pakaian Pria', 65000, 160, 'celana_ARMY_CARGO_celana_pendek_doreng_celana_cargo.jpg', 0),
(73, 'Carrier Bag Mount', 'Ready warna blue red green', 'Pakaian Pria', 450000, 28, 'cobalt-mdlsrghtside.jpg', 0),
(74, 'ETX-14L-BigCrank Battery', 'Untuk sepeda motor', 'Elektronik', 250000, 15, 'ETX-14L-BigCrank_side.jpg', 0),
(75, 'Tas Laptop', 'Bahan Halus lembut tahan air', 'Pakaian Pria', 100000, 100, 'everki-ekf661-contempro-tas-selempang-laptop-commuter-briefcase-bag-141-inch-black-17.jpg', 0),
(76, 'Tas Undangan', 'Warna Brown, red, chocolate', 'Pakaian Wanita', 68000, 120, 'ex-still-access-01.jpg', 0),
(77, 'Topi Keren', 'Ready green,blue,brown color', 'Pakaian Pria', 42000, 28, 'ex-still-access-03.jpg', 0),
(78, 'Philips Magic jar New', 'Ready green,blue,brown color', 'Elektronik', 305000, 57, 'hipwee-IMG_20200918_211915.jpg', 0),
(79, 'Rolex ', 'jam tangan keren', 'Pakaian Pria', 2000000, 5, 'IMG-20110411-01463.jpg', 0),
(80, 'IWC Watch', 'tersedia warna silver, Gold', 'Pakaian Pria', 700000, 50, 'IMG-20171121-WA0043.jpg', 0),
(81, 'Inlander BackPack', '70L+5L', 'Pakaian Pria', 500000, 34, 'Inlander-Red-Polyester-Hiking-Backpack-SDL180895729-2-54272.jpg', 0),
(82, 'Tas Vlanel', 'Bisa PO warna', 'Pakaian Anak', 50000, 47, 'maxresdefault_(1).jpg', 0),
(84, 'Tas Rajut', 'Blue red salmon', 'Pakaian Wanita', 78000, 45, 'maxresdefault.jpg', 0),
(86, 'Pakaian anak Papua', 'Pakaian adat COD', 'Pakaian Anak', 150000, 5, 'Pakaian_Anak_Adat_Papua.jpg', 0),
(87, 'Cartoon Clothes', 'Ready Gambar Lainnya', 'Pakaian Anak', 45000, 50, 'pakaian_anak_kemeja_karakter.jpg', 0),
(88, 'ASIC Sepatu voli', 'Ready size 29-43', 'Alat Olahraga', 500000, 26, 'SEPATU_OLAHRAGA_VOLI_ASICS_GEL_NIMBUS_CEWESEPATU_VOLY_MURAH.jpg', 0),
(90, 'Alat Pembersih debu', 'Keep COD', 'Elektonik', 1400000, 15, 'unnamed.jpg', 0),
(92, 'Warrior Shoes', 'Blue Green', 'Pakaian Pria', 120000, 10, 'sepatu-warrior-sparta-lc-low-green-hijau-ijo.jpg', 0),
(98, 'phillips led 3 watt', 'lampu phillips led 3 watt', 'lampu', 23000, 10, 'phillips_led_3w.jpg', 0),
(100, 'Caleg Ngeyel', 'Lord Rizaldi', 'lampu', 10000, 2, 'WhatsApp_Image_2022-06-11_at_15_25_34.jpeg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_wa` bigint(15) DEFAULT NULL,
  `expedisi` varchar(100) DEFAULT NULL,
  `paket` varchar(100) DEFAULT NULL,
  `tgl_pesan` datetime NOT NULL,
  `pembayaran` varchar(100) NOT NULL,
  `jmlh_pesanan` int(11) NOT NULL,
  `status_code` char(50) NOT NULL,
  `struk` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `id_user`, `nama`, `alamat`, `no_wa`, `expedisi`, `paket`, `tgl_pesan`, `pembayaran`, `jmlh_pesanan`, `status_code`, `struk`) VALUES
(92040822, 2029, 'Aris Wahyudi', 'jalan basuki rahmad rangge rt 06 rw 01 no 12 kec.lamongan kab.lamongan', 6288805317354, 'jne', 'REG-20000-4-5', '2022-06-16 11:48:27', 'bank_transfer', 220000, '201', 'https://app.sandbox.midtrans.com/snap/v1/transactions/c3b8685a-b4c3-424e-9420-0fbd3c322d4a/pdf'),
(1659837092, 2029, 'Aris Wahyudi', 'jalan basuki rahmad rangge rt 06 rw 01 no 12 kec.lamongan kab.lamongan', 6288805317354, 'jne', 'REG-20000-4-5', '2022-06-16 13:46:30', 'bank_transfer', 220000, '201', 'https://app.sandbox.midtrans.com/snap/v1/transactions/569ed2db-0972-4308-b6f2-ad22428fe07c/pdf'),
(1813144071, 2029, 'Aris Wahyudi', 'jalan basuki rahmad rangge rt 06 rw 01 no 12 kec.lamongan kab.lamongan', 6288805317354, 'jne', 'REG-20000-4-5', '2022-06-16 14:06:01', 'bank_transfer', 220000, '201', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3679a61b-c564-4b96-87c2-3cf3abe3b28f/pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(46, 419337826, 4, 'Kamera DSLR', 1, 1000000, ''),
(47, 1577265336, 1, 'Jacket', 1, 200000, ''),
(48, 1021652782, 4, 'Kamera DSLR', 1, 1000000, ''),
(49, 238095256, 1, 'Jacket', 1, 200000, ''),
(50, 517951682, 1, 'Jacket', 1, 200000, ''),
(51, 205170060, 1, 'Jacket', 1, 200000, ''),
(52, 951918858, 1, 'Jacket', 1, 200000, ''),
(53, 679135317, 1, 'Jacket', 1, 200000, ''),
(54, 1556242376, 1, 'Jacket', 1, 200000, ''),
(55, 204107893, 1, 'Jacket', 1, 200000, ''),
(56, 1199573452, 1, 'Jacket', 1, 200000, ''),
(57, 1804375650, 1, 'Jacket', 1, 200000, ''),
(58, 865066795, 1, 'Jacket', 1, 200000, ''),
(59, 1150605787, 1, 'Jacket', 1, 200000, ''),
(60, 93401984, 1, 'Jacket', 1, 200000, ''),
(61, 92040822, 1, 'Jacket', 1, 200000, ''),
(62, 1659837092, 1, 'Jacket', 1, 200000, ''),
(63, 1813144071, 1, 'Jacket', 1, 200000, '');

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
UPDATE tb_barang SET stok=stok-NEW.jumlah
WHERE id_brg=NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(2029, 'faruq1', 'faruq1', '12345', 2),
(2030, 'admin', 'admin', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_brg` (`id_brg`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2031;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
