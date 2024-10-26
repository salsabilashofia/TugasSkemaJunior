-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 06:28 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(900) DEFAULT NULL,
  `kategori` varchar(900) DEFAULT NULL,
  `nama_buku` varchar(900) DEFAULT NULL,
  `harga` varchar(900) DEFAULT NULL,
  `stok` int(255) DEFAULT NULL,
  `nama_penerbit` varchar(900) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kategori`, `nama_buku`, `harga`, `stok`, `nama_penerbit`) VALUES
('K1001', 'Keilmuan', 'Analisis & Perancangan Sistem Informasi', '50.000', 60, 'Penerbit Informatika'),
('K1002', 'Keilmuan', 'Artifical Intelligence', '45.000', 60, 'Penerbit Informatika'),
('K2003', 'Keilmuan', 'Autocad 3 Dimensi', '40.000', 25, 'Penerbit Informatika'),
('B1001', 'Bisnis', 'Bisnis Online', '75.000', 9, 'Penerbit Informatika'),
('K3004', 'Keilmuan', 'Cloud Computing Technology', '85.000', 15, 'Penerbit Informatika'),
('B1002', 'Bisnis', 'Etika Bisnis dan Tanggung Jawab Sosial', '67.500', 20, 'Penerbit Informatika'),
('N1001', 'Novel', 'Cahaya Di Penjuru Hati', '68.000', 10, 'Andi Offset'),
('N1002\r\n', 'Novel', 'Aku Ingin Cerita', '48.000', 12, 'Danendra');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(900) DEFAULT NULL,
  `nama_penerbit` varchar(900) DEFAULT NULL,
  `alamat_penerbit` varchar(900) DEFAULT NULL,
  `kota_penerbit` varchar(900) DEFAULT NULL,
  `telepon_penerbit` varchar(900) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `alamat_penerbit`, `kota_penerbit`, `telepon_penerbit`) VALUES
('SP01', 'Penerbit Informatika', 'Jl. Buah Batu No. 121', 'Bandung', '0813-2220-1946'),
('SP02', 'Andi Offset', 'Jl. Suryalaya IX  No. 3', 'Bandung', '0878-3903-1946'),
('SP03', 'Danendra', 'Jl Moch. Toha 44', 'Bandung', '022-5201215');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD UNIQUE KEY `id_buku` (`id_buku`) USING HASH;

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD UNIQUE KEY `nama_penerbit` (`nama_penerbit`) USING HASH;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
