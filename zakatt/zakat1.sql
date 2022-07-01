-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2021 pada 18.22
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datamustahik`
--

CREATE TABLE `datamustahik` (
  `kodemustahik` int(11) NOT NULL,
  `namamustahik` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rt` int(3) NOT NULL,
  `rw` int(3) NOT NULL,
  `jmlkartukeluarga` int(2) NOT NULL,
  `jmlangkeluarga` int(2) NOT NULL,
  `status` varchar(12) NOT NULL,
  `catatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datamustahik`
--

INSERT INTO `datamustahik` (`kodemustahik`, `namamustahik`, `alamat`, `rt`, `rw`, `jmlkartukeluarga`, `jmlangkeluarga`, `status`, `catatan`) VALUES
(4, 'Bayuuunn', 'uf 3 no 99', 1, 21, 1, 5, 'Yatim/Piatu', 'oke'),
(5, 'Ibu Hasanuda', 'TA 9 No 2', 5, 22, 1, 6, 'Tidak Mampu', 'oke'),
(7, 'asep', 'cijonggol', 11, 21, 2, 3, 'Yatim/Piatu', 'okeee21312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapanitia`
--

CREATE TABLE `datapanitia` (
  `kodepanitia` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jammasuk` time NOT NULL,
  `jamakhir` time NOT NULL,
  `namapanitia` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `catatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datapanitia`
--

INSERT INTO `datapanitia` (`kodepanitia`, `tanggal`, `jammasuk`, `jamakhir`, `namapanitia`, `alamat`, `nohp`, `catatan`) VALUES
(5, '2021-06-12', '16:40:00', '22:40:00', 'Fajri', 'Jalan Yang Ada', '1000521', 'popp'),
(8, '2021-07-02', '12:34:00', '18:34:00', 'dapa', 'tc 2 no 3', '2147483647', 'mantap'),
(10, '2021-08-26', '10:25:00', '10:28:00', 'sultan ucup mantap ', 'Jalan bojongnangka', '2147483647', 'Setiap hari jumat okee'),
(11, '2021-09-11', '15:25:00', '15:27:00', 'Farda', 'UB 2 No 3', '+6285155116774', 'Selalu mantap'),
(12, '2021-09-11', '20:28:00', '21:28:00', 'Jaki', 'UC 2 No 1', '+6285155116884', 'siap'),
(13, '2021-09-20', '15:47:00', '20:41:00', 'Agus', 'TC 2 No 10', '231111111111111', 'Tidak bisa menjadi panitia ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapezakat`
--

CREATE TABLE `datapezakat` (
  `kodezakat` int(11) NOT NULL,
  `tanggaljam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `namapezakat` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jumlahjiwa` int(11) NOT NULL,
  `berupaberas` float NOT NULL,
  `berupauang` int(11) NOT NULL,
  `fidyahberas` float NOT NULL,
  `fidyahuang` int(11) NOT NULL,
  `infaq` int(11) NOT NULL,
  `zakatmal` int(11) NOT NULL,
  `totalberas` float NOT NULL,
  `totaluang` int(11) NOT NULL,
  `panitiajaga` varchar(30) NOT NULL,
  `panitiajaga2` varchar(30) NOT NULL,
  `telahdiubahadmin` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datapezakat`
--

INSERT INTO `datapezakat` (`kodezakat`, `tanggaljam`, `namapezakat`, `alamat`, `jumlahjiwa`, `berupaberas`, `berupauang`, `fidyahberas`, `fidyahuang`, `infaq`, `zakatmal`, `totalberas`, `totaluang`, `panitiajaga`, `panitiajaga2`, `telahdiubahadmin`) VALUES
(31, '2021-04-22 03:24:45', 'bagas', 'th 9 no 14', 666, 13, 888, 0, 0, 100000, 0, 0, 0, '5', '', 'Ya'),
(32, '2021-04-22 15:22:42', 'ucokop', 'Jalan bojongnangka', 3, 10.5, 0, 0, 0, 0, 0, 0, 0, ' 5', '', 'Ya'),
(42, '2021-04-24 14:09:56', 'hasan', 'Cibogo Wetan Blok Danau Nomor ', 4, 14, 140, 0, 0, 30, 0, 0, 0, 'Admin', '', ''),
(43, '2021-04-27 06:23:11', 'Asep', 'Jalan Cikupa', 2, 7, 0, 0, 0, 0, 0, 0, 0, '', '', ''),
(44, '2021-04-27 07:23:13', 'sulthan', 'uf 3 no 99999', 30, 3.5, 20, 0, 0, 2, 0, 0, 0, '7', '', ''),
(45, '2021-04-27 07:17:20', 'sulthan', 'uf 3 no 11111', 30, 3.5, 1, 0, 0, 2, 0, 0, 0, '', '', ''),
(46, '2021-04-27 07:17:36', 'sulthan', 'CIPETE JAMAL', 30, 3.5, 1, 0, 0, 2, 0, 0, 0, '', '', ''),
(47, '2021-04-27 07:17:54', 'sulthan', 'jamalll', 30, 3.5, 1, 0, 0, 2, 0, 0, 0, '', '', ''),
(48, '2021-04-27 08:04:53', 'Sulthan', 'Jalan Bojongnangka', 2, 7, 70, 0, 0, 20, 0, 0, 0, ' 5', '', 'Ya'),
(49, '2021-05-06 15:32:16', 'Bpk Hasan', 'TC 2 No 3', 4, 0, 140, 0, 0, 10, 0, 0, 0, ' 6', '', ''),
(50, '2021-05-06 16:04:08', 'Bpk Farda', 'UB 2 No 1', 4, 0, 140, 0, 0, 10, 0, 0, 0, ' 6', '', ''),
(52, '2021-05-07 03:08:19', 'Test Nama', 'TD 2 No 4', 4, 14, 140, 14, 280, 20, 50, 0, 0, ' 5', ' 6', ''),
(53, '2021-05-07 03:10:01', 'Test Data Zakat', 'TA 10 No 2 Test', 3, 10.5, 105, 3.5, 70, 20, 10, 0, 0, ' 7', ' 6', ''),
(54, '2021-05-08 03:28:00', 'mamat', 'ta 2 no 3', 1, 23.2, 20000, 19.5, 20000, 10000, 300000, 42.7, 350000, ' 5', ' 6', 'Ya'),
(55, '2021-05-08 04:17:09', 'dapajamas', 'ta 9 no 2', 1, 3.5, 100000, 7, 20000, 25000, 10000, 10.5, 155000, ' 6', ' 5', ''),
(56, '2021-05-11 07:01:36', 'johanes', 'rw 1 bt', 1, 3.5, 0, 0, 0, 0, 0, 3.5, 0, ' 5', ' 6', ''),
(57, '2021-05-11 07:11:00', 'jackobus', 'tokyo', 2, 7, 0, 0, 0, 0, 0, 7, 0, '5', ' ', ''),
(58, '2021-05-25 08:54:49', 'Bpk Supardi', 'TD 2 No 14', 2, 7, 70000, 3.5, 100000, 20000, 10000, 10.5, 200000, ' 6', ' 7', ''),
(59, '2021-05-25 09:28:04', 'bapak joahanes', 'cikupa', 2, 3.5, 20000, 3.6, 100000, 5000, 20000, 7.1, 145000, ' 5', ' 6', ''),
(60, '2021-05-28 06:31:43', 'Master Joohanses', 'Ciputat', 2, 7, 35000, 3.5, 20000, 40000, 5000, 10.5, 100000, ' 6', ' 5', ''),
(61, '2021-05-28 07:27:46', 'Hiruman Johanes', 'Cipondoh', 2, 7, 70000, 3.5, 10000, 100000, 20000, 10.5, 200000, ' 5', 'jiyad', ''),
(64, '2021-05-28 08:16:58', 'master hilman', 'ciputattt', 2, 3.5, 70000, 3.5, 40000, 30000, 10000, 7, 150000, ' 6', '', ''),
(65, '2021-05-28 08:20:20', 'master sulthan', 'citra', 2, 3.5, 30000, 3.5, 10000, 20000, 40000, 7, 100000, ' 6', ' sultan', ''),
(66, '2021-05-28 08:22:19', 'farhan', 'bonang', 2, 7, 35000, 3.5, 20000, 50000, 45000, 10.5, 150000, ' 5', ' hiruman', ''),
(67, '2021-06-03 14:21:42', 'asep', 'bismillah', 3, 0, 0, 0, 0, 0, 0, 0, 0, ' 5', ' master john', ''),
(68, '2021-06-08 05:27:50', 'Hiruman Kun', 'Cipete', 1, 3.5, 35000, 3.5, 5000, 5000, 5000, 7, 50000, ' 5', ' master john', ''),
(69, '2021-06-11 09:16:20', 'Jackobus Johanes', 'MAster', 2, 7, 0, 0, 0, 0, 0, 7, 0, ' 5', ' master john', ''),
(70, '2021-06-11 09:48:23', 'Super JAck', 'Ciputat', 2, 13, 0, 0, 0, 0, 0, 13, 0, ' 5', ' hiruman', ''),
(71, '2021-06-14 13:22:43', 'Jojo', 'TD 2 No 21', 3, 10.5, 105000, 7, 50000, 5000, 40000, 17.5, 200000, ' 5', ' hiruman', ''),
(72, '2021-06-14 13:26:58', 'asepkuu maunya ku', 'tc 4 no 2', 4, 0, 140000, 0, 0, 0, 0, 0, 140000, ' 5', '', ''),
(73, '2021-06-15 06:39:36', 'sssdddd', 'ddd', 2, 0, 0, 0, 0, 0, 0, 0, 0, ' 5', '', ''),
(74, '2021-06-15 08:27:39', 'Johanes Hans', 'Ciputat', 4, 14, 0, 0, 0, 0, 0, 14, 0, ' 5', ' hiruman', ''),
(75, '2021-07-31 16:28:03', 'aassssssssssssssssssssssssssssssssssssssssssssssss', 'ssssssssssssssssssssssssssssssssssssssssssssssssss', 333, 88888, 444444444, 22222, 444444444, 333333333, 444444444, 111110, 1666666665, ' 7', ' Fajri', ''),
(76, '2021-08-27 14:32:49', 'Fajri', 'Bonang', 1, 2, 20000, 0, 0, 0, 0, 2, 20000, ' 6', ' master john', ''),
(77, '2021-08-27 14:35:09', 'Farhan', 'Binong', 1, 0, 10000, 0, 0, 0, 0, 0, 10000, ' 6', ' dapa', ''),
(78, '2021-09-08 07:47:35', 'Mustakim', 'UC 2 No 1', 5, 0, 175000, 0, 0, 5000, 0, 0, 180000, ' 5', ' hiruman', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`) VALUES
(5, 'Panitia', 'panitia@email.com', 'undraw_profile_21.jpg', '$2y$10$5y4drFrBOigZXdOZeft9HuynQzFawFsW19Kv4cmxffJBBzZrtKXT.', 2),
(6, 'Admin', 'admin@email.com', 'default.jpg', '$2y$10$zx7w0z8Wxvu2trEcdDNYaeoiu9tY9lA2/OiLQkcIdMGr37KY9TEiW', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datamustahik`
--
ALTER TABLE `datamustahik`
  ADD PRIMARY KEY (`kodemustahik`);

--
-- Indeks untuk tabel `datapanitia`
--
ALTER TABLE `datapanitia`
  ADD PRIMARY KEY (`kodepanitia`);

--
-- Indeks untuk tabel `datapezakat`
--
ALTER TABLE `datapezakat`
  ADD PRIMARY KEY (`kodezakat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datamustahik`
--
ALTER TABLE `datamustahik`
  MODIFY `kodemustahik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `datapanitia`
--
ALTER TABLE `datapanitia`
  MODIFY `kodepanitia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `datapezakat`
--
ALTER TABLE `datapezakat`
  MODIFY `kodezakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
