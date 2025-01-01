-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2025 at 07:04 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_tiket`
--

CREATE TABLE `pemesanan_tiket` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tempat_wisata` varchar(100) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `pengunjung_dewasa` int NOT NULL,
  `pengunjung_anak` int NOT NULL,
  `harga_paket` decimal(10,2) NOT NULL,
  `total_bayar` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemesanan_tiket`
--

INSERT INTO `pemesanan_tiket` (`id`, `nama`, `no_identitas`, `no_hp`, `tempat_wisata`, `tanggal_kunjungan`, `pengunjung_dewasa`, `pengunjung_anak`, `harga_paket`, `total_bayar`) VALUES
(7, 'Zacky Hafsari', '234234234', '08973432232', 'paralayang', '2025-01-01', 1, 0, '50000.00', '50000.00'),
(8, 'Abrar Wahid', '454456456', '0876342562', 'panyaweuyan', '2025-01-24', 1, 1, '70000.00', '105000.00'),
(9, 'Ahmad Nurain', '686767867', '08123458978', 'kebun teh', '2025-01-31', 2, 1, '60000.00', '150000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
