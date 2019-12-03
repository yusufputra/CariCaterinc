-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Mei 2018 pada 06.05
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `caricate_proj`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id_cart` int(11) NOT NULL,
  `id_konten` int(11) NOT NULL,
  `pemesan` varchar(50) NOT NULL,
  `penjual` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_cart`, `id_konten`, `pemesan`, `penjual`, `qty`, `jumlah`) VALUES
(2, 34, 'healthfitmlg', 'catersor', 5, 150000),
(3, 5, '', 'healthfitmlg', 5, 75000),
(5, 4, '', 'healthfitmlg', 5, 75000),
(6, 5, '', 'healthfitmlg', 5, 75000),
(7, 14, '', 'anacater', 5, 45000),
(8, 2, 'jaejae123', 'healthfitmlg', 5, 50000),
(9, 14, '', 'anacater', 5, 45000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`id_comment` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `commentor` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `like` int(4) NOT NULL,
  `dislike` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`id_comment`, `comment`, `commentor`, `user`, `date`, `like`, `dislike`) VALUES
(1, 'Pesanannya udah nyampe, makasih! Enak banget puding nya', 'huliaihzulia', 'healthfitmlg', '12-04-2017', 42, 0),
(2, 'Udah pesen healthty snacknya, gak sabar nungguin datang :9', 'indahapri', 'healthfitmlg', '12-04-2017', 41, 0),
(3, 'Makanannya enak ', 'huliaihzulia', 'healthfitmlg', '13-04-2017', 43, 0),
(4, 'enak sekali !', 'ulfiarahma', 'healthfitmlg', '24-04-2017', 42, 0),
(5, 'tes', 'huliaihzulia', 'healthfitmlg', '20-06-2017', 45, 0),
(6, 'ehrhrhr', '', 'healthfitmlg', '17-03-2018', 3, 0),
(7, 'test', 'yusufputra99', 'catersor', '18-03-2018', 7, 0),
(8, 'huaa', '', 'healthfitmlg', '12-05-2018', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivered`
--

CREATE TABLE IF NOT EXISTS `delivered` (
`id_deliv` int(11) NOT NULL,
  `id_konten` int(11) NOT NULL,
  `pemesan` varchar(50) NOT NULL,
  `penjual` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `notes` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `delivered`
--

INSERT INTO `delivered` (`id_deliv`, `id_konten`, `pemesan`, `penjual`, `qty`, `jumlah`, `notes`, `date`) VALUES
(30, 2, 'healthfitmlg', 'healthfitmlg', 5, 50000, '', '13 April 2017 04:38:27'),
(31, 2, 'azhar', 'healthfitmlg', 5, 50000, 'banyakin', '13 April 2017 04:49:21'),
(32, 2, 'healthfitmlg', 'healthfitmlg', 5, 50000, '', '13 April 2017 04:52:27'),
(33, 1, 'huliaihzulia', 'healthfitmlg', 5, 50000, '', '13 April 2017 06:52:21'),
(34, 1, 'huliaihzulia', 'healthfitmlg', 2, 20000, '', '22 April 2017 05:21:17'),
(35, 1, 'ulfiarahma', 'healthfitmlg', 3, 30000, 'Ayamnya agak kering ya gorengnya', '24 April 2017 10:40:26'),
(36, 4, 'yusufputra99', 'healthfitmlg', 5, 75000, 'hiihihihih', '18 March 2018 09:59:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE IF NOT EXISTS `konten` (
`id_konten` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL,
  `rate` double DEFAULT NULL,
  `pict` varchar(100) DEFAULT NULL,
  `kategori` varchar(100) NOT NULL,
  `kategori_makan` varchar(50) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `minor` int(11) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konten`
--

INSERT INTO `konten` (`id_konten`, `judul`, `deskripsi`, `harga`, `rate`, `pict`, `kategori`, `kategori_makan`, `waktu`, `minor`, `user`) VALUES
(1, 'Paket Siswa 1', 'Nasi, Capcay, Ayam sambal ', 10000, 0, 'ImgContent/1.PNG', '', 'sehat', 'pagi', 1, 'healthfitmlg'),
(2, 'Paket Siswa 2', 'Nasi, Tumis kacang, Ayam kecap ', 10000, 0, 'ImgContent/2.PNG', '', 'sehat', 'siang', 1, 'healthfitmlg'),
(3, 'Paket Siswa 3', 'Nasi, Tumis sawi, Ayam balado', 9000, 0, 'ImgContent/3.PNG', '', 'sehat', 'pagi', 1, 'healthfitmlg'),
(4, 'Healthy Snack ', 'Oat dengan apel/pisang/buah naga', 15000, 0, 'ImgContent/a.JPG', '', 'sehat', 'pagi', 2, 'healthfitmlg'),
(5, 'Almond Milk ', 'Susu dari almond', 15000, 0, 'ImgContent/15.JPG', '', 'sehat', 'pagi', 2, 'healthfitmlg'),
(14, 'Ayam Goreng', 'Ayam goreng + Nasi + Sayur', 9000, 0, 'ImgContent/6.PNG', '', 'sehat', 'pagi', 3, 'anacater'),
(34, 'Nasi Ayam Laos', 'Nasi ayam', 30000, 0, 'ImgContent/11.PNG', '', 'sehat', 'pagi', 2, 'catersor'),
(35, 'Paket Hemat 1', 'Nasi dengan lauk sayuran bergizi\r\n', 15000, 0, 'ImgContent/12.PNG', '', 'sehat', 'pagi', 1, 'catersor'),
(37, 'Ayam Lemak', 'Ayam lemak dengan bumbu khas Malaysia', 10000, 0, 'ImgContent/9.PNG', '', 'sehat', 'pagi', 2, 'catersor'),
(38, 'Paket Diet', 'Menu diet hemat', 15000, 0, 'ImgContent/7.PNG', '', 'diet', 'siang', 2, 'healthfitmlg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`id_order` int(11) NOT NULL,
  `id_konten` int(11) NOT NULL,
  `pemesan` varchar(50) NOT NULL,
  `penjual` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `notes` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `id_konten`, `pemesan`, `penjual`, `qty`, `jumlah`, `notes`, `date`) VALUES
(1, 14, 'lorem', 'anacater', 5, 45000, '', '19 June 2017 10:32:59'),
(2, 14, 'tiniwinibiti17', 'anacater', 5, 45000, '', '12 May 2018 07:59:04'),
(3, 38, 'supriadi', 'healthfitmlg', 5, 50000, '', '16 May 2018 09:53:21'),
(4, 1, 'asdqwe', 'healthfitmlg', 5, 50000, '', '26 May 2018 04:59:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
`id_promo` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id_promo`, `judul`) VALUES
(8, 'Almond Milk '),
(7, 'Ayam Goreng'),
(2, 'Healthy Snack '),
(9, 'Paket Diet'),
(11, 'Paket Siswa 1'),
(1, 'Paket Siswa 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id_slider` int(11) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `Judul` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `gambar`, `Judul`) VALUES
(10, 'ImgContent/Slider/e.jpg', 'Nikmati camilan favoritmu!'),
(11, 'ImgContent/Slider/b.jpg', 'Menu makanan sehat'),
(12, 'ImgContent/Slider/d.jpg', 'Rasakan puding nikmat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `seller` int(11) NOT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `user`, `password`, `email`, `telepon`, `alamat`, `gender`, `picture`, `seller`, `city`) VALUES
(37, 'Health Fit Malang', 'healthfitmlg', 'aGVhbHRoZml0bWxn', 'healthfitmalang@gmail.com', '082293999912', 'Jln Danau Singkarak G6 A9 Sawojajar Malang', 'female', 'ProfPict/4.PNG', 1, ''),
(39, 'Indah Apri', 'indahapri', 'aW5kYWhhcHJp', 'indahapri16@gmail.com', '085706883946', 'Jl. Danau Kerinci 4 G6/C4', 'female', 'ProfPict/14799784_10206155423919469_2005618524_o.png', 0, ''),
(42, 'Hulia Ihzulia Haq', 'huliaihzulia', 'aHVsaWFpaHp1bGlh', 'ihzulia@gmail.com', '0812525502245', 'Jln Danau Singkarah G6 A9 Sawojajar Malang', 'female', 'ProfPict/13028-NOLW9E.jpg', 0, ''),
(43, 'AdminCater', 'admin', 'YWRtaW4xMjM=', 'admin@caricatering.com', '08123321233', '', 'male', 'ProfPict/profpic.jpg', 2, ''),
(49, 'Yohanis Ferdinand', 'yohanisferdi', 'eW9oYW5pc2ZlcmRp', 'yohanisferdi@gmail.com', '082141878905', 'Pakis Malang', 'male', '', 0, ''),
(51, 'Yusuf Putra', 'azhar', 'YWFram96OTk=', 'me@yusufputra.com', '081231396027', 'Jl. Danau Ranau G6/B4 Sawojajar', 'male', 'ProfPict/', 0, ''),
(59, 'Catering Sore', 'catersor', 'Y2F0ZXJzb3I=', 'cateringsore@gmail.com', '085703821923', 'Jln Danau Bratan VII Sawojajar Malang', 'female', 'ProfPict/6.jpg', 1, ''),
(61, 'Catering Enak', 'caterenak', 'Y2F0ZXJlbmFr', 'caterenak@gmail.com', '081252550224', NULL, 'female', '', 1, ''),
(68, 'Ulfia Rahma', 'ulfiarahma', 'dWxmaWFyYWhtYQ==', 'ulfi@gmail.com', '081233455677', 'Jln Danau Ranau B2 Sawojajar', 'female', 'ProfPict/14800341_10206155423959470_834820125_o.png', 0, ''),
(69, 'sonia cynthia', 'soniacyn', 'MTIzNDU2Nw==', 'soniacyn@gmail.com', '082244990264', NULL, 'female', '', 0, ''),
(70, 'Yusuf Putra', 'bangucup', 'MTIzNDU2', 'me@xyz.com', '081234567890', NULL, 'male', '', 1, NULL),
(71, 'Yusuf Putra', 'yusufputra99', 'YmFuZ3VjdXAxMjM=', 'yusufputra99@gmail.com', '081231396027', NULL, 'male', '', 0, NULL),
(72, 'jaejae', 'jaejae123', 'TmljaGtodW4y', 'jaein5105@gmail.com', '08123456789', NULL, 'female', '', 0, NULL),
(73, 'Alif Alamsyah Yudhanto', 'tiniwinibiti17', 'c2ViZWxhczEy', 'alamsyaah1198@gmail.com', '081357919691', NULL, 'male', '', 0, NULL),
(74, 'supro', 'supriadi', 'c3VwcmlhZGk=', 'supri@mail.com', '081231396027', NULL, 'male', '', 0, NULL),
(75, 'asdqwe', 'asdqwe', 'YXNkcXdl', 'a@a.com', '098123', NULL, 'male', '', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `delivered`
--
ALTER TABLE `delivered`
 ADD PRIMARY KEY (`id_deliv`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
 ADD PRIMARY KEY (`id_konten`), ADD UNIQUE KEY `judul_2` (`judul`), ADD UNIQUE KEY `pict` (`pict`), ADD KEY `judul` (`judul`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
 ADD PRIMARY KEY (`id_promo`), ADD UNIQUE KEY `judul` (`judul`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `delivered`
--
ALTER TABLE `delivered`
MODIFY `id_deliv` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
