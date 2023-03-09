-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 06:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--
CREATE DATABASE IF NOT EXISTS `db_hotel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_hotel`;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

DROP TABLE IF EXISTS `fasilitas`;
CREATE TABLE `fasilitas` (
  `id_fasilitas` int(10) NOT NULL,
  `nama_fasilitas` varchar(25) NOT NULL,
  `ket_fasilitas` text NOT NULL,
  `gambar_fasilitas` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `ket_fasilitas`, `gambar_fasilitas`) VALUES
(2, 'kolam renang couple', 'private pool', '63ec654da3bc0.jpg'),
(3, 'Restaurant', 'selamat menikmati makanan asia eropa di restaurant ini', '63f35d7e29b18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

DROP TABLE IF EXISTS `kamar`;
CREATE TABLE `kamar` (
  `id_kamar` int(5) NOT NULL,
  `nama_kamar` varchar(20) NOT NULL,
  `fasilitas_kamar` text NOT NULL,
  `jumlah_kamar` varchar(2) NOT NULL,
  `harga` int(7) NOT NULL,
  `gambar_kamar` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama_kamar`, `fasilitas_kamar`, `jumlah_kamar`, `harga`, `gambar_kamar`) VALUES
(3, 'couple', 'ac, kulkas, kamar', '1', 0, '63f1ca39c2b2c.jpg'),
(4, 'Exclusive Room', 'ac, heather', '5', 0, '63f1cc2401a9e.jpg'),
(5, 'Exclusive Room', 'kamar mandi dalam, ac, pemanas, kulkas', '1', 900000, '6406dbf77bc17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE `pemesanan` (
  `id_pemesanan` int(4) NOT NULL,
  `nama_pemesan` varchar(20) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `nama_tamu` varchar(20) NOT NULL,
  `check_in` varchar(11) NOT NULL,
  `check_out` varchar(11) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `tipe_kamar` varchar(30) NOT NULL,
  `id_kamar` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `nama_pemesan`, `no_hp`, `email`, `nama_tamu`, `check_in`, `check_out`, `jumlah`, `tipe_kamar`, `id_kamar`, `status`) VALUES
(4, 'pp', 9990999, 'pp@gmail.com', 'ha', '02/23/2023', '02/24/2023', 2, '1', NULL, 0),
(5, 'haura archia', 987890, 'hauraarchia@gmail.co', 'haura', '02/15/2023', '02/17/2023', 1, '4', NULL, 0),
(6, 'ads', 8123456, 'pp@gmail.com', 'ambarsari', '02/22/2023', '02/23/2023', 2, '1', NULL, 0),
(7, 'arifin abinaya', 98765489, 'arfn@gmail.com', 'arifin', '02/16/2023', '02/17/2023', 1, '2', NULL, 0),
(8, 'hh', 2147483647, 'hauraarchia@gmail.co', 'ura', '03/25/2023', '03/20/2023', 2, 'Exclusive Room', NULL, 1),
(9, 'dasd', 2147483647, 'hauraarchia@gmail.co', 'ura', '03/13/2023', '03/14/2023', 4, '', NULL, 1),
(10, 'Nisrina', 2147483647, 'hauraarchia@gmail.co', 'Nisaria', '03/14/2023', '03/15/2023', 6, '4', NULL, 2),
(11, 'Nisrina', 2147483647, 'hauraarchia@gmail.co', 'Nisaria', '03/14/2023', '03/15/2023', 5, '', 4, 2);

--
-- Triggers `pemesanan`
--
DROP TRIGGER IF EXISTS `check_in`;
DELIMITER $$
CREATE TRIGGER `check_in` AFTER UPDATE ON `pemesanan` FOR EACH ROW BEGIN
	IF new.status = 1 THEN
    UPDATE kamar 
    SET jumlah_kamar = jumlah_kamar - old.jumlah
    WHERE id_kamar = old.id_kamar;
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `check_out`;
DELIMITER $$
CREATE TRIGGER `check_out` AFTER UPDATE ON `pemesanan` FOR EACH ROW BEGIN
	IF new.status = 2 THEN
    UPDATE kamar 
    SET jumlah_kamar = jumlah_kamar + old.jumlah
    WHERE id_kamar = old.id_kamar;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id_petugas` int(4) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `level` enum('admin','resepsionis','','') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `level`, `username`, `password`) VALUES
(5, 'putri kresna', 'admin', '', 0),
(6, 'haura archia', 'admin', '', 0),
(7, 'kresna kresna', 'admin', '', 0),
(8, 'arfn abny', 'resepsionis', 'arfn', 44444),
(9, 'hhh', 'admin', 'yy', 0),
(10, 'haura archia', 'admin', 'admin', 827),
(11, 'putri', 'resepsionis', 'p', 0),
(12, 'kresna', 'admin', 'k', 99999),
(13, 'haura', 'resepsionis', 'archia', 11111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
