-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2026 at 06:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1d_eqypriska`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mahasiswa`
--

CREATE TABLE `tabel_mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `semester` int NOT NULL,
  `tarif_ukt_nominal` decimal(12,2) NOT NULL,
  `jenis_pembiayaan` enum('Mandiri','Bidikmisi','Prestasi') NOT NULL,
  `golongan_ukt` varchar(10) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `nomor_kip_kuliah` varchar(30) DEFAULT NULL,
  `dana_saku_subsidi` decimal(12,2) DEFAULT NULL,
  `nama_instansi_beasiswa` varchar(100) DEFAULT NULL,
  `minimal_ipk_syarat` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_mahasiswa`
--

INSERT INTO `tabel_mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim`, `semester`, `tarif_ukt_nominal`, `jenis_pembiayaan`, `golongan_ukt`, `nama_wali`, `nomor_kip_kuliah`, `dana_saku_subsidi`, `nama_instansi_beasiswa`, `minimal_ipk_syarat`) VALUES
(1, 'Andi Saputra', '23110001', 4, '4500000.00', 'Mandiri', 'UKT 3', 'Budi Saputra', NULL, NULL, NULL, NULL),
(2, 'Siti Rahma', '23110002', 2, '5500000.00', 'Mandiri', 'UKT 4', 'Ahmad Rahma', NULL, NULL, NULL, NULL),
(3, 'Dewi Lestari', '23110003', 6, '6500000.00', 'Mandiri', 'UKT 5', 'Joko Lestari', NULL, NULL, NULL, NULL),
(4, 'Rizky Pratama', '23110004', 4, '3500000.00', 'Mandiri', 'UKT 2', 'Tono Pratama', NULL, NULL, NULL, NULL),
(5, 'Maya Putri', '23110005', 8, '7500000.00', 'Mandiri', 'UKT 6', 'Heri Putra', NULL, NULL, NULL, NULL),
(6, 'Arif Nugroho', '23110006', 2, '4500000.00', 'Mandiri', 'UKT 3', 'Slamet Nugroho', NULL, NULL, NULL, NULL),
(7, 'Nina Marlina', '23110007', 6, '5500000.00', 'Mandiri', 'UKT 4', 'Yusuf Marlina', NULL, NULL, NULL, NULL),
(8, 'Bagus Setiawan', '23110008', 4, '6500000.00', 'Mandiri', 'UKT 5', 'Darto Setiawan', NULL, NULL, NULL, NULL),
(9, 'Rina Oktavia', '23110009', 2, '0.00', 'Bidikmisi', NULL, NULL, 'KIP2023001', '700000.00', NULL, NULL),
(10, 'Fajar Hidayat', '23110010', 4, '0.00', 'Bidikmisi', NULL, NULL, 'KIP2023002', '700000.00', NULL, NULL),
(11, 'Lilis Handayani', '23110011', 6, '0.00', 'Bidikmisi', NULL, NULL, 'KIP2023003', '800000.00', NULL, NULL),
(12, 'Yoga Prakoso', '23110012', 2, '0.00', 'Bidikmisi', NULL, NULL, 'KIP2023004', '700000.00', NULL, NULL),
(13, 'Dinda Permata', '23110013', 4, '0.00', 'Bidikmisi', NULL, NULL, 'KIP2023005', '800000.00', NULL, NULL),
(14, 'Aldi Kurniawan', '23110014', 8, '0.00', 'Bidikmisi', NULL, NULL, 'KIP2023006', '900000.00', NULL, NULL),
(15, 'Cahya Ananda', '23110015', 2, '0.00', 'Prestasi', NULL, NULL, NULL, NULL, 'Bank Indonesia', '3.50'),
(16, 'Putri Ayu', '23110016', 4, '0.00', 'Prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', '3.75'),
(17, 'Galih Mahendra', '23110017', 6, '0.00', 'Prestasi', NULL, NULL, NULL, NULL, 'Bank Indonesia', '3.50'),
(18, 'Vina Amelia', '23110018', 4, '0.00', 'Prestasi', NULL, NULL, NULL, NULL, 'Pertamina Foundation', '3.60'),
(19, 'Reza Firmansyah', '23110019', 8, '0.00', 'Prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', '3.75'),
(20, 'Tika Maharani', '23110020', 2, '0.00', 'Prestasi', NULL, NULL, NULL, NULL, 'Pertamina Foundation', '3.60');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
