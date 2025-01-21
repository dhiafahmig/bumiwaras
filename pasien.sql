-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2025 at 07:16 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bumi_waras`
--

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `status_pernikahan` enum('Belum Menikah','Menikah','Cerai Hidup','Cerai Mati') NOT NULL,
  `nama_keluarga` varchar(100) NOT NULL,
  `hubungan_keluarga` varchar(50) NOT NULL,
  `kontak_keluarga` varchar(15) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `waktu_daftar` time NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_identitas`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `status_pernikahan`, `nama_keluarga`, `hubungan_keluarga`, `kontak_keluarga`, `tanggal_daftar`, `waktu_daftar`, `created_at`, `updated_at`) VALUES
(1, '1871112308010001', 'Ami', 'Bandar Lampung', '8221-01-23', 'L', 'jejamo', 'Belum Menikah', 'Asnawati', 'Ibu', '082279063167', '0000-00-00', '00:00:00', '2025-01-20 20:26:25', '2025-01-21 06:53:43'),
(7, '1871112308010012', 'Laily', 'Lampung', '2001-08-23', 'P', 'Kedaton', 'Belum Menikah', 'Mama', 'Ibu', '082279063167', '0000-00-00', '00:00:00', '2025-01-20 23:57:22', '2025-01-21 06:57:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `no_identitas` (`no_identitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
