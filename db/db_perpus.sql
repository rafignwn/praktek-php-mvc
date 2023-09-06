-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 08:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` varchar(100) NOT NULL,
  `judul` text NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `penerbit`, `pengarang`, `jumlah`, `deskripsi`, `createdAt`, `updatedAt`) VALUES
('bakhfsiuadgbads', 'Hemlet', 'Erlangga', 'Sujiwo Tejo', 10, 'Buku Sujiwo Tejo', '2023-08-04 01:39:10', '2023-08-04 01:39:10'),
('buku_64dcbb993fe95', 'kunci', 'macan', 'kucing', 12, 'macan vc kucing', '2023-08-16 12:05:45', '2023-08-16 12:05:45'),
('hewfjnlkaiwqo1290', 'Sang Pangeran', 'Setia Kawan', 'Aas ', 10, 'Buku tentang astronomi', '2023-08-04 01:43:19', '2023-08-04 01:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_buku` varchar(100) NOT NULL,
  `status` enum('kembali','dipinjam') NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
