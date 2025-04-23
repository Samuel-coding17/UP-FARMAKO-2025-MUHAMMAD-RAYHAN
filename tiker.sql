-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2025 at 11:57 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiker`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int NOT NULL,
  `id_kereta` int NOT NULL,
  `asal` varchar(150) NOT NULL,
  `tujuan` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_berangkat` time NOT NULL,
  `waktu_tiba` time NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kereta`, `asal`, `tujuan`, `tanggal`, `waktu_berangkat`, `waktu_tiba`, `harga`) VALUES
(2, 2, 'jakartaq', 'bogore', '2025-04-19', '20:59:00', '23:59:00', 3200008),
(3, 5, 'bogor', 'semarang', '2025-04-20', '14:50:00', '16:50:00', 400000),
(4, 6, 'bogor', 'surabaya', '2025-04-21', '14:51:00', '16:51:00', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `kereta`
--

CREATE TABLE `kereta` (
  `id_kereta` int NOT NULL,
  `nama_kereta` varchar(150) NOT NULL,
  `kelas` enum('ekonomi','vip','bisnis') NOT NULL,
  `kapasitas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kereta`
--

INSERT INTO `kereta` (`id_kereta`, `nama_kereta`, `kelas`, `kapasitas`) VALUES
(2, 'thomas', 'ekonomi', 50),
(3, 'satibi', 'ekonomi', 12),
(4, 'kai', 'bisnis', 50),
(5, 'gaya bebas', 'vip', 20),
(6, 'malam santai', 'vip', 200),
(7, 'dai', 'vip', 100);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_pemesanan` int NOT NULL,
  `metode_bayar` varchar(50) NOT NULL,
  `bukti` varchar(150) NOT NULL,
  `waktu_bayar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `metode_bayar`, `bukti`, `waktu_bayar`) VALUES
(1, 2, 'cash', 'DEPAG TRANSFARAN.bmp', '2025-04-20 08:01:53'),
(2, 3, 'cash', 'foto srgm kkm.jpeg', '2025-04-20 14:13:36'),
(3, 2, 'cash', '0f37f04db6a4b91f24d8338afdded17c.jpg', '2025-04-21 03:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int NOT NULL,
  `id_user` int NOT NULL,
  `id_jadwal` int NOT NULL,
  `jumlah_tiket` int NOT NULL,
  `total_bayar` int NOT NULL,
  `status_bayar` enum('belum bayar','sudah bayar') NOT NULL,
  `waktu_pemesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `id_jadwal`, `jumlah_tiket`, `total_bayar`, `status_bayar`, `waktu_pemesanan`) VALUES
(2, 2, 3, 1, 400000, 'belum bayar', '2025-04-20 07:53:17'),
(3, 2, 2, 1, 3200008, 'sudah bayar', '2025-04-20 14:13:11'),
(4, 2, 2, 1, 1000000, 'sudah bayar', '2025-04-21 01:49:55'),
(5, 2, 2, 1, 1000000, 'belum bayar', '2025-04-21 05:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` int NOT NULL,
  `id_pemesanan` int NOT NULL,
  `nama_penumpang` varchar(150) NOT NULL,
  `no_kursi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'rayhan', 'mhmmdrayhan175@gmail.com', '111', 'admin', '2025-04-19 04:25:28'),
(2, 'usu', 'usu@gmail.com', 'cc25dddbb8e44fbd804322fd50d2620f', 'user', '2025-04-20 01:26:17'),
(3, 'alif', 'aku@gmail.com', '698d51a19d8a121ce581499d7b701668', 'admin', '2025-04-21 09:52:55'),
(4, 'alif yuri', 'alif@gmail.com', '111', 'admin', '2025-04-21 23:26:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kereta` (`id_kereta`);

--
-- Indexes for table `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`id_kereta`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kereta`
--
ALTER TABLE `kereta`
  MODIFY `id_kereta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `id_penumpang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_kereta`) REFERENCES `kereta` (`id_kereta`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`);

--
-- Constraints for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD CONSTRAINT `penumpang_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
