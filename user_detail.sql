-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Feb 2022 pada 02.15
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kotaquran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_detail`
--

CREATE TABLE `user_detail` (
  `email` varchar(128) NOT NULL,
  `nickname` varchar(128) DEFAULT NULL,
  `nik` varchar(155) DEFAULT NULL,
  `tempat_lahir` varchar(15) DEFAULT NULL,
  `tgl_lahir` int(11) DEFAULT NULL,
  `hobi` varchar(255) DEFAULT NULL,
  `suku` varchar(128) DEFAULT NULL,
  `sifat_menonjol` text DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `kendaraan` varchar(256) DEFAULT NULL,
  `pekerjaan` varchar(256) DEFAULT NULL,
  `tempat_kerja` varchar(256) DEFAULT NULL,
  `alamat_kerja` text DEFAULT NULL,
  `penghasilan` int(11) DEFAULT NULL,
  `reff` varchar(255) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `agama` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
