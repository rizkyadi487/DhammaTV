-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2017 at 02:34 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dhammatv`
--

-- --------------------------------------------------------

--
-- Table structure for table `dhammadb_acara`
--

CREATE TABLE `dhammadb_acara` (
  `id_jenis_acara` int(5) NOT NULL,
  `acara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dhammadb_acara`
--

INSERT INTO `dhammadb_acara` (`id_jenis_acara`, `acara`) VALUES
(1, 'Meditasi Pagi'),
(2, 'Meditasi Malam'),
(3, 'Cool Kids'),
(4, 'Kids For Dhamma'),
(5, 'Dhamma Wacana'),
(6, 'Dhamma Talk'),
(7, 'Panorama Negeri China'),
(8, 'Film Dokumenter'),
(9, 'Film Serial'),
(10, 'Wahana Seni Budaya'),
(11, 'Sambang Deso'),
(12, 'Hidup Sehat'),
(13, 'Etalase'),
(14, 'Kiprah Jati'),
(15, 'Seni dan Tradisi'),
(16, 'Suara Kita'),
(17, 'Art and Play'),
(18, 'Happy Holy Kid'),
(19, 'Bodhicitta'),
(20, 'Han Zhi Gong'),
(21, 'Setitik Pencerahan'),
(22, 'Selingan'),
(23, 'Cermin'),
(24, 'Lagu Rohani'),
(25, 'Manage Your Mind'),
(26, 'Detektif Elang'),
(27, 'Aku Pasti Bisa'),
(28, 'Colour Jump'),
(29, 'Acara Baru');

-- --------------------------------------------------------

--
-- Table structure for table `dhammadb_daftar_cetak`
--

CREATE TABLE `dhammadb_daftar_cetak` (
  `id_daftar_cetak` int(10) NOT NULL,
  `kode_pemesanan` varchar(20) NOT NULL,
  `kode_jenis_cetakan` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `dhammadb_gaji_karyawan`
--

CREATE TABLE `dhammadb_gaji_karyawan` (
  `id_gaji_karyawan` int(5) NOT NULL,
  `id_karyawan` int(5) NOT NULL,
  `tanggal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dhammadb_gaji_karyawan`
--

INSERT INTO `dhammadb_gaji_karyawan` (`id_gaji_karyawan`, `id_karyawan`, `tanggal`) VALUES
(1, 2, 'May 2013'),
(3, 3, 'May 2013');

-- --------------------------------------------------------

--
-- Table structure for table `dhammadb_jenis_kerjaan`
--

CREATE TABLE `dhammadb_jenis_kerjaan` (
  `id_jenis_satuan` int(10) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dhammadb_jenis_kerjaan`
--

INSERT INTO `dhammadb_jenis_kerjaan` (`id_jenis_satuan`, `satuan`) VALUES
(4, 'Crew');

-- --------------------------------------------------------

--
-- Table structure for table `dhammadb_karyawan`
--

CREATE TABLE `dhammadb_karyawan` (
  `id_karyawan` int(5) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `gaji_pokok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dhammadb_karyawan`
--

INSERT INTO `dhammadb_karyawan` (`id_karyawan`, `nama_karyawan`, `alamat`, `gaji_pokok`) VALUES
(2, 'Wayan Joblar', 'Jakarta', 400000),
(3, 'Made Lempog', 'surabaya', 350000);

-- --------------------------------------------------------

--
-- Table structure for table `dhammadb_kwitansi`
--

CREATE TABLE `dhammadb_kwitansi` (
  `kode_kwitansi` varchar(20) NOT NULL,
  `kode_nota` varchar(20) NOT NULL,
  `tgl_bayar` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `dhammadb_nama_crew`
--

CREATE TABLE `dhammadb_nama_crew` (
  `kode_jenis_cetakan` int(5) NOT NULL,
  `id_jenis_satuan` int(10) NOT NULL,
  `nama_cetakan` varchar(100) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `dhammadb_nama_crew`
--

INSERT INTO `dhammadb_nama_crew` (`kode_jenis_cetakan`, `id_jenis_satuan`, `nama_cetakan`, `harga`) VALUES
(34, 4, 'Rizky Adi Prasetyo', 1),
(33, 4, 'Kiki', 1),
(32, 4, 'Tika', 1),
(31, 4, 'Adin', 1),
(30, 4, 'Prasetyo', 1),
(29, 4, 'Sasa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dhammadb_pelanggan`
--

CREATE TABLE `dhammadb_pelanggan` (
  `kode_pelanggan` int(5) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `dhammadb_pelanggan`
--

INSERT INTO `dhammadb_pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `jenis`, `alamat_pelanggan`) VALUES
(31, 'Cilik Lumbung', 'Umum', 'Dewi Madri'),
(33, 'Dedek', 'Perusahaan', 'fdfdfdf'),
(35, 'Ika Kartika Rahayu', 'Umum', 'Rogojampi, Banyuwangi');

-- --------------------------------------------------------

--
-- Table structure for table `dhammadb_pembayaran`
--

CREATE TABLE `dhammadb_pembayaran` (
  `kode_pembayaran` varchar(30) NOT NULL,
  `kode_pemesanan` varchar(30) NOT NULL,
  `tgl_bayar` varchar(40) NOT NULL,
  `bayar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `dhammadb_pemesanan`
--

CREATE TABLE `dhammadb_pemesanan` (
  `kode_pemesanan` varchar(20) NOT NULL,
  `tgl_pesan` varchar(30) NOT NULL,
  `tgl_selesai` varchar(30) NOT NULL,
  `kode_user` int(5) NOT NULL,
  `narasumber_shooting` text NOT NULL,
  `presenter_shooting` varchar(100) NOT NULL,
  `jumlah_harga` int(20) NOT NULL,
  `uang_muka` int(20) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL DEFAULT 'Belum Shooting',
  `alamat_shooting` text NOT NULL,
  `id_jenis_acara` int(5) NOT NULL,
  `naskah` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `dhammadb_pemesanan`
--

INSERT INTO `dhammadb_pemesanan` (`kode_pemesanan`, `tgl_pesan`, `tgl_selesai`, `kode_user`, `narasumber_shooting`, `presenter_shooting`, `jumlah_harga`, `uang_muka`, `status_pembayaran`, `alamat_shooting`, `id_jenis_acara`, `naskah`) VALUES
('PS00000001', '09 August 2017', '10 August 2017', 1, 'narasumber baru', 'Rama', 1, 1, 'Belum Shooting', 'JL MT Haryono no 218 Dinoyo Malang Jatim Indonesia Asia Tenggara Dunia Bima Sakti', 2, 'dlscrib_com_laporan-pkl.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `dhammadb_pemesanan_detail`
--

CREATE TABLE `dhammadb_pemesanan_detail` (
  `id_pemesanan_detail` int(10) NOT NULL,
  `kode_pemesanan` varchar(30) NOT NULL,
  `kode_jenis_cetakan` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dhammadb_pemesanan_detail`
--

INSERT INTO `dhammadb_pemesanan_detail` (`id_pemesanan_detail`, `kode_pemesanan`, `kode_jenis_cetakan`, `jumlah`) VALUES
(127, 'PS00000001', 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dhammadb_sessions`
--

CREATE TABLE `dhammadb_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dhammadb_sessions`
--

INSERT INTO `dhammadb_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1f25b22a9b6b3f0315f621ffee40a4b5', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1501571645, ''),
('216c62b790c900b04c21a2a1f35b598f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1501835426, ''),
('523db668ac5f386995f56eb795f417ff', '192.168.42.244', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1501557723, 'a:9:{s:9:\"user_data\";s:0:\"\";s:9:\"logged_in\";s:17:\"yesGetMeLoginBaby\";s:15:\"nama_user_login\";s:18:\"Rizky Adi Prasetyo\";s:8:\"username\";s:5:\"admin\";s:5:\"level\";s:5:\"admin\";s:10:\"key_search\";s:9:\"nama_user\";s:9:\"kode_user\";s:1:\"1\";s:14:\"id_jenis_acara\";s:1:\"3\";s:13:\"cart_contents\";a:3:{s:32:\"7e564750caaa306010222d6adc86313c\";a:7:{s:5:\"rowid\";s:32:\"7e564750caaa306010222d6adc86313c\";s:2:\"id\";s:2:\"32\";s:3:\"qty\";s:1:\"1\";s:5:\"price\";s:1:\"1\";s:4:\"name\";s:4:\"Tika\";s:7:\"options\";a:1:{s:6:\"Satuan\";s:4:\"Crew\";}s:8:\"subtotal\";i:1;}s:11:\"total_items\";i:1;s:10:\"cart_total\";i:1;}}'),
('76762cc4f95ed9a253ed5001b49e4f0c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1501731695, ''),
('7b0c9055b5d909a6cb49d86fde42cfdb', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1501552474, ''),
('7b9de441d7c2ac3bbf3685228944c889', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', 1502243654, ''),
('8054a4b5c87fff75b9abd96dbe4ebf4c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1501837241, ''),
('8685fd16c3dd63918f17f5fc019a030c', '192.168.42.129', 'Mozilla/5.0 (Linux; Android 4.4.4; SM-J110G Build/KTU84P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.109 Mo', 1501556184, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"logged_in\";s:17:\"yesGetMeLoginBaby\";s:15:\"nama_user_login\";s:18:\"Rizky Adi Prasetyo\";s:8:\"username\";s:5:\"admin\";s:5:\"level\";s:5:\"admin\";s:10:\"key_search\";s:9:\"nama_user\";}'),
('c52b2d2debd267b4b143d986209f5717', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1501560614, ''),
('dbf23e886a2c9cb75c168d9efe957b4c', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1501835424, ''),
('df33214e3b2efdf9cea567d52abeea39', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1501563097, 'a:9:{s:9:\"user_data\";s:0:\"\";s:9:\"logged_in\";s:17:\"yesGetMeLoginBaby\";s:15:\"nama_user_login\";s:18:\"Rizky Adi Prasetyo\";s:8:\"username\";s:5:\"admin\";s:5:\"level\";s:5:\"admin\";s:10:\"key_search\";s:9:\"nama_user\";s:9:\"kode_user\";s:1:\"1\";s:14:\"id_jenis_acara\";s:1:\"3\";s:13:\"cart_contents\";a:3:{s:32:\"7e564750caaa306010222d6adc86313c\";a:7:{s:5:\"rowid\";s:32:\"7e564750caaa306010222d6adc86313c\";s:2:\"id\";s:2:\"32\";s:3:\"qty\";s:1:\"1\";s:5:\"price\";s:1:\"1\";s:4:\"name\";s:4:\"Tika\";s:7:\"options\";a:1:{s:6:\"Satuan\";s:4:\"Crew\";}s:8:\"subtotal\";i:1;}s:11:\"total_items\";i:1;s:10:\"cart_total\";i:1;}}'),
('e1d3c4aff21afd55aeb5c32143b163ef', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1501731694, '');

-- --------------------------------------------------------

--
-- Table structure for table `dhammadb_setting`
--

CREATE TABLE `dhammadb_setting` (
  `id_setting` int(10) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_setting` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dhammadb_setting`
--

INSERT INTO `dhammadb_setting` (`id_setting`, `tipe`, `title`, `content_setting`) VALUES
(1, 'site_title', 'Nama Situs', 'DhammaTV'),
(2, 'site_quotes', 'Quotes Situs', 'Sistem Informasi Management Shooting - DhammaTV'),
(3, 'site_footer', 'Teks Footer', 'Sistem Informasi Management Shooting - DhammaTV'),
(4, 'key_login', 'Hash Key MD5', 'Dhamma'),
(5, 'site_theme', 'Theme Folder', 'flat-dot'),
(6, 'site_limit_small', 'Limit Data Small', '5'),
(7, 'site_limit_medium', 'Limit Data Medium', '10');

-- --------------------------------------------------------

--
-- Table structure for table `dhammadb_user`
--

CREATE TABLE `dhammadb_user` (
  `kode_user` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `alamat_user` text NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `telepon_user` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `dhammadb_user`
--

INSERT INTO `dhammadb_user` (`kode_user`, `username`, `password`, `level`, `nama_user`, `alamat_user`, `email_user`, `telepon_user`, `foto`) VALUES
(1, 'admin', '366a2c4c22944ff0f73e92b080a11450', 'admin', 'Rizky Adi Prasetyo', 'JL MT Haryono no 218 Dinoyo, Malang', 'rizkyadi487@gmail.com', '085330371258', 'black.jpg'),
(53, 'user', 'ada6abf2818d68fa0ea4a15ad002a7ca', 'produser', 'user', 'user', 'userssss', 'user', '2bdlak15g8_wallpaper_1589756.jpg'),
(59, 'rizkyadi', '397c97c60091d394b754f6377904531b', 'admin', 'Rizky Adi', 'JL MT Haryono no 218 Dinoyo, Malang', 'rizkyadi487@gmail.com', '085330371258', '1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dhammadb_acara`
--
ALTER TABLE `dhammadb_acara`
  ADD PRIMARY KEY (`id_jenis_acara`);

--
-- Indexes for table `dhammadb_daftar_cetak`
--
ALTER TABLE `dhammadb_daftar_cetak`
  ADD PRIMARY KEY (`id_daftar_cetak`);

--
-- Indexes for table `dhammadb_gaji_karyawan`
--
ALTER TABLE `dhammadb_gaji_karyawan`
  ADD PRIMARY KEY (`id_gaji_karyawan`);

--
-- Indexes for table `dhammadb_jenis_kerjaan`
--
ALTER TABLE `dhammadb_jenis_kerjaan`
  ADD PRIMARY KEY (`id_jenis_satuan`);

--
-- Indexes for table `dhammadb_karyawan`
--
ALTER TABLE `dhammadb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `dhammadb_kwitansi`
--
ALTER TABLE `dhammadb_kwitansi`
  ADD PRIMARY KEY (`kode_kwitansi`);

--
-- Indexes for table `dhammadb_nama_crew`
--
ALTER TABLE `dhammadb_nama_crew`
  ADD PRIMARY KEY (`kode_jenis_cetakan`);

--
-- Indexes for table `dhammadb_pelanggan`
--
ALTER TABLE `dhammadb_pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `dhammadb_pembayaran`
--
ALTER TABLE `dhammadb_pembayaran`
  ADD PRIMARY KEY (`kode_pembayaran`);

--
-- Indexes for table `dhammadb_pemesanan`
--
ALTER TABLE `dhammadb_pemesanan`
  ADD PRIMARY KEY (`kode_pemesanan`);

--
-- Indexes for table `dhammadb_pemesanan_detail`
--
ALTER TABLE `dhammadb_pemesanan_detail`
  ADD PRIMARY KEY (`id_pemesanan_detail`);

--
-- Indexes for table `dhammadb_sessions`
--
ALTER TABLE `dhammadb_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `dhammadb_setting`
--
ALTER TABLE `dhammadb_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `dhammadb_user`
--
ALTER TABLE `dhammadb_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dhammadb_acara`
--
ALTER TABLE `dhammadb_acara`
  MODIFY `id_jenis_acara` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `dhammadb_daftar_cetak`
--
ALTER TABLE `dhammadb_daftar_cetak`
  MODIFY `id_daftar_cetak` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dhammadb_gaji_karyawan`
--
ALTER TABLE `dhammadb_gaji_karyawan`
  MODIFY `id_gaji_karyawan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dhammadb_jenis_kerjaan`
--
ALTER TABLE `dhammadb_jenis_kerjaan`
  MODIFY `id_jenis_satuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dhammadb_karyawan`
--
ALTER TABLE `dhammadb_karyawan`
  MODIFY `id_karyawan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dhammadb_nama_crew`
--
ALTER TABLE `dhammadb_nama_crew`
  MODIFY `kode_jenis_cetakan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `dhammadb_pelanggan`
--
ALTER TABLE `dhammadb_pelanggan`
  MODIFY `kode_pelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `dhammadb_pemesanan_detail`
--
ALTER TABLE `dhammadb_pemesanan_detail`
  MODIFY `id_pemesanan_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `dhammadb_setting`
--
ALTER TABLE `dhammadb_setting`
  MODIFY `id_setting` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dhammadb_user`
--
ALTER TABLE `dhammadb_user`
  MODIFY `kode_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
