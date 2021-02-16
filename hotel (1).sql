-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2020 pada 07.05
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
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `kd_booking` varchar(128) NOT NULL,
  `no_kamar` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `harga` varchar(16) NOT NULL,
  `checkIn` date DEFAULT NULL,
  `checkOut` date DEFAULT NULL,
  `ket` varchar(128) DEFAULT NULL,
  `status` enum('active','non') NOT NULL DEFAULT 'active',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`booking_id`, `kd_booking`, `no_kamar`, `type`, `harga`, `checkIn`, `checkOut`, `ket`, `status`, `created`) VALUES
(195, 'GN2020-12-21d3c477dd1d', '107', 'VIP A', '350000', '2020-11-21', '2020-11-23', 'Menginap', 'active', '2020-11-21 11:47:52'),
(196, 'GN2020-12-2167771e7440', '112', 'DELUXE A', '245000', '2020-11-21', '2020-11-25', 'Menginap', 'active', '2020-11-21 12:00:57'),
(197, 'GN2020-12-214cdcc6e303', '113', 'VIP A', '350000', '2020-10-21', '2020-10-26', 'Menginap', 'active', '2020-10-21 12:03:18'),
(198, 'GN2020-12-21c67efd195e', '116', 'VIP A', '350000', '2020-09-21', '2020-09-22', 'Menginap', 'active', '2020-09-21 12:05:49'),
(199, 'GN2020-12-21835f09a3df', '105', 'STANDAR B', '170000', '2020-09-21', '2020-09-23', 'Menginap', 'active', '2020-09-21 12:10:34'),
(200, 'GN2020-12-21c8fef39fdf', '114', 'STANDAR C', '155000', '2020-09-21', '2020-09-23', 'Menginap', 'active', '2020-09-21 12:12:28'),
(201, 'GN2020-12-215104889296', '108', 'DELUXE B', '195000', '2020-12-18', '2020-12-21', 'Menginap', 'active', '2020-12-18 12:15:28'),
(202, 'GN2020-12-2126a7f9791d', '112', 'DELUXE A', '245000', '2020-09-21', '2020-09-23', 'Menginap', 'active', '2020-09-21 12:18:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `kamar_id` int(11) NOT NULL,
  `no_kamar` varchar(16) NOT NULL,
  `type_id` int(8) NOT NULL,
  `fasilitas` varchar(128) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `status` varchar(32) NOT NULL,
  `foto` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`kamar_id`, `no_kamar`, `type_id`, `fasilitas`, `harga`, `status`, `foto`) VALUES
(13, '107', 5, 'Late Single Bed, Tv LED 32&quot;, AC 1 Pk, Bathtub, Closet Duduk, Water Heater, Wastafel, Kursi + Meja, Lemari', '350000', 'Kosong', 'kamar-201014-fe152ecf9f.jpg'),
(14, '113', 5, 'Late Single Bed, Tv LED 32&quot;, AC 1 Pk, Bathtub, Closet Duduk, Water Heater, Wastafel, Kursi + Meja, Lemari', '350000', 'Kosong', 'kamar-201018-c5e2363fb0.jpg'),
(16, '116', 5, 'Late Single Bed, Tv LED 32&quot;, AC 1 Pk, Bathtub, Closet Duduk, Water Heater, Wastafel, Kursi + Meja, Lemari', '350000', 'Kosong', 'kamar-201014-e3cbab2968.jpg'),
(17, '213', 6, 'Late Single Bed 160cm x 200cm, Tv LED 32&quot;, AC 1 Pk, Bathtub, Closet Duduk, Water Heater, Wastafel, Kursi + Meja, Lemari', '320000', 'Kosong', 'kamar-201014-682147edf5.jpg'),
(19, '222', 7, 'Double Bed 100cm x 200cm, Tv LED 32&quot;, AC 1 Pk, Closet Duduk, Wastafel, Kursi + Meja Set, Exhause Fan', '285000', 'Kosong', 'kamar-201014-07fdced458.png'),
(20, '223', 7, 'Late Single Bed 160cm x 200cm, Tv LED 32&quot;, AC 1 Pk, Bathtub, Closet Duduk, Water Heater, Wastafel, Kursi + Meja, Lemari', '285000', 'Kosong', 'kamar-201014-26c6bc7db5.png'),
(21, '224', 7, 'Double Bed 100cm x 200cm, Tv LED 32&quot;, AC 1 Pk, Closet Duduk, Wastafel, Kursi + Meja Set, Exhause Fan', '285000', 'Kosong', 'kamar-201014-b210b23695.png'),
(22, '225', 7, 'Double Bed 100cm x 200cm, Tv LED 32&quot;, AC 1 Pk, Closet Duduk, Wastafel, Kursi + Meja Set, Exhause Fan', '285000', 'Kosong', 'kamar-201014-9e0383640a.png'),
(25, '109', 8, 'Single Bed 160cm x 200cm, Tv LED 32&quot;, AC 1 Pk, Closet Duduk, Wastafel, Kursi + Meja Set', '260000', 'Kosong', 'kamar-201014-27ec1e677d.jpg'),
(34, '112', 9, 'Single Bed 160cm x 200cm, Tv LED 32&quot;, AC 1 Pk, Closet Duduk, Wastafel, Kursi + Meja Set', '245000', 'Kosong', 'kamar-201014-81e3a06fa5.jpg'),
(36, '210', 9, 'Single Bed 160cm x 200cm, Tv LED 32&quot;, AC 1 Pk, Closet Duduk, Wastafel, Kursi + Meja Set', '245000', 'Kosong', 'kamar-201014-d1ee5b5772.jpg'),
(37, '211', 9, 'Single Bed 160cm x 200cm, Tv LED 32&quot;, AC 1 Pk, Closet Duduk, Wastafel, Kursi + Meja Set', '245000', 'Kosong', 'kamar-201014-36ccf3e52d.jpg'),
(38, '211', 9, 'Single Bed 160cm x 200cm, Tv LED 32&quot;, AC 1 Pk, Closet Duduk, Wastafel, Kursi + Meja Set', '245000', 'Kosong', 'kamar-201014-3c7b038931.jpg'),
(39, '212', 9, 'Single Bed 160cm x 200cm, Tv LED 32&quot;, AC 1 Pk, Closet Duduk, Wastafel, Kursi + Meja Set', '245000', 'Kosong', 'kamar-201014-e07473eec6.jpg'),
(40, '108', 10, 'Single Bed 160cm x 200cm, AC 1 Pk, Closet Duduk, Wastafel, Kursi + Meja Set', '195000', 'Kosong', 'kamar-201018-09dbbfbc29.jpg'),
(41, '208', 10, 'Single Bed 160cm x 200cm, Tv LED 32&quot;, AC 1 Pk, Closet Duduk, Wastafel, Kursi + Meja Set', '195000', 'Kosong', 'kamar-201014-f25f3c15dc.jpg'),
(49, '215', 11, 'Single Bed 160cm x 200cm, Tv LED 32&quot;, Closet Jongkok, Shower Washer, Kursi + Meja Set, Exhause Fan', '180000', 'Kosong', 'kamar-201014-c8ec8801b5.jpg'),
(57, '105', 4, 'Single Bed 160cm x 200cm, Closet Jongkok, Shower Washer, Kursi + Meja Set, Exhause Fan', '170000', 'Kosong', 'kamar-201014-522e9aaf7c.jpg'),
(59, '220', 2, 'Single Bed 120cm x 200cm, Closet Jongkok, Shower Washer, Kursi + Meja Set, Exhause Fan', '155000', 'Kosong', 'kamar-201014-f4f2c856bd.jpg'),
(62, '114', 2, 'Single Bed 120cm x 200cm, Closet Jongkok, Shower Washer, Kursi + Meja Set, Exhause Fan', '155000', 'Kosong', 'kamar-201014-b8d6556a28.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatan`
--

CREATE TABLE `pendapatan` (
  `pendapatan_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `pendapatan` varchar(128) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendapatan`
--

INSERT INTO `pendapatan` (`pendapatan_id`, `booking_id`, `pendapatan`, `created`) VALUES
(186, 195, '700000', '2020-11-23 00:00:00'),
(187, 196, '980000', '2020-11-25 00:00:00'),
(188, 197, '1750000', '2020-10-26 00:00:00'),
(189, 198, '350000', '2020-09-22 00:00:00'),
(190, 199, '340000', '2020-09-23 00:00:00'),
(191, 200, '310000', '2020-09-23 00:00:00'),
(192, 201, '585000', '2020-12-21 00:00:00'),
(193, 202, '490000', '2020-09-23 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `pengunjung_id` int(11) NOT NULL,
  `kd_booking` varchar(128) NOT NULL,
  `nama_pengunjung` varchar(128) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `telepone` varchar(32) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `foto_ktp` varchar(128) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`pengunjung_id`, `kd_booking`, `nama_pengunjung`, `gender`, `telepone`, `alamat`, `foto_ktp`, `created`) VALUES
(191, 'GN2020-12-21d3c477dd1d', 'Eko Purnomo', 'L', '089890897897', 'Karawang', 'ktp-201221-54a8342cce.PNG', '2020-11-21'),
(192, 'GN2020-12-2167771e7440', 'Intan', 'P', '089890897897', 'Warung Bambu', 'ktp-201221-0bbf61769c.PNG', '2020-11-21'),
(193, 'GN2020-12-214cdcc6e303', 'Joko', 'L', '089890897897', 'Karawang', 'ktp-201221-5e4d9b3292.PNG', '2020-10-21'),
(194, 'GN2020-12-21c67efd195e', 'Joni', 'L', '089890897897', 'Teluk Jambe', 'ktp-201221-0c6325d83a.PNG', '2020-09-21'),
(195, 'GN2020-12-21835f09a3df', 'Yuni Sulis', 'P', '089890897897', 'Nagasari', 'ktp-201221-b2817a4ac1.PNG', '2020-09-21'),
(196, 'GN2020-12-21c8fef39fdf', 'Ismi Ayu Mulia', 'P', '089890897897', 'Adiarsa', 'ktp-201221-948067f211.PNG', '2020-09-21'),
(197, 'GN2020-12-215104889296', 'Sarbini', 'L', '089890897897', 'Warung Bambu', 'ktp-201221-b1fad0a97e.PNG', '2020-12-18'),
(198, 'GN2020-12-2126a7f9791d', 'Fuad Tri Rahman', 'L', '089890897897', 'Karawang', 'ktp-201221-4d7ba17faf.PNG', '2020-09-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap`
--

CREATE TABLE `rekap` (
  `rekap_id` int(11) NOT NULL,
  `type_kamar` varchar(32) NOT NULL,
  `rekap` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekap`
--

INSERT INTO `rekap` (`rekap_id`, `type_kamar`, `rekap`, `date`) VALUES
(28, 'VIP A', 1, '2020-11-21'),
(29, 'DELUXE A', 1, '2020-11-21'),
(30, 'VIP A', 1, '2020-10-21'),
(31, 'VIP A', 1, '2020-09-21'),
(32, 'STANDAR B', 1, '2020-09-21'),
(33, 'STANDAR C', 1, '2020-09-21'),
(34, 'DELUXE B', 1, '2020-12-18'),
(35, 'DELUXE A', 1, '2020-09-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `type`
--

INSERT INTO `type` (`type_id`, `type`) VALUES
(2, 'STANDAR C'),
(4, 'STANDAR B'),
(5, 'VIP A'),
(6, 'VIP B'),
(7, 'EXECUTIVE'),
(8, 'SUITE'),
(9, 'DELUXE A'),
(10, 'DELUXE B'),
(11, 'STANDAR A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `nama_user`, `password`, `level`) VALUES
(2, 'admin', 'Intan', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(3, 'Eko', 'Eko Purnomo', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD UNIQUE KEY `kd_booking` (`kd_booking`),
  ADD KEY `booking_ibfk_1` (`no_kamar`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`kamar_id`),
  ADD KEY `type` (`type_id`),
  ADD KEY `no_kamar` (`no_kamar`);

--
-- Indeks untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`pendapatan_id`),
  ADD KEY `pendapatan_ibfk_1` (`booking_id`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`pengunjung_id`),
  ADD KEY `pengunjung_ibfk_1` (`kd_booking`);

--
-- Indeks untuk tabel `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`rekap_id`);

--
-- Indeks untuk tabel `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `kamar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `pendapatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT untuk tabel `rekap`
--
ALTER TABLE `rekap`
  MODIFY `rekap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`no_kamar`) REFERENCES `kamar` (`no_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD CONSTRAINT `pendapatan_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD CONSTRAINT `pengunjung_ibfk_1` FOREIGN KEY (`kd_booking`) REFERENCES `booking` (`kd_booking`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
