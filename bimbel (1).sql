-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 06:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbel`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id`, `username`, `password`) VALUES
(6, 'ferdy', '$2y$10$G2kRHif771776RdfsiYm5OYZCSbgyhjsmHiDmxI6J7tKYj1yP8QT.'),
(7, 'admin', '$2y$10$1noV/0KYHB.FbmA6tdUL2e1X/K9UFXJ7/pFyIB5B9EptlNJz/pQbe'),
(8, 'uman', '$2y$10$Wne943pkw8AgmTIc74ih1.0RcbYDEK27ZbRZdyveH26Pbxjbaf44K');

-- --------------------------------------------------------

--
-- Table structure for table `t_pbimbel`
--

CREATE TABLE `t_pbimbel` (
  `id` int(11) NOT NULL,
  `gambar` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `judul` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `peserta` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t_pbimbel`
--

INSERT INTO `t_pbimbel` (`id`, `gambar`, `judul`, `rank`, `peserta`, `harga`) VALUES
(1, 'wefwef', 'weffe', 2, 222, 20);

-- --------------------------------------------------------

--
-- Table structure for table `t_ptryout`
--

CREATE TABLE `t_ptryout` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `judul` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `peserta` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t_ptryout`
--

INSERT INTO `t_ptryout` (`id`, `gambar`, `judul`, `rank`, `peserta`, `harga`) VALUES
(1, 'adas', 'TKD CPNS', 5, 111, 90);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_panggilan` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `email`, `nama_panggilan`, `password`, `gambar`, `nama_lengkap`, `provinsi`, `kabupaten`) VALUES
(4, 'fahry@gmail.com', 'Fahry', '', '6669c38156d0d.png', 'Fahry Hidayah Rachmadi', 'DKI Jakarta', 'Jakarta Pusat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pbimbel`
--
ALTER TABLE `t_pbimbel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_ptryout`
--
ALTER TABLE `t_ptryout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_pbimbel`
--
ALTER TABLE `t_pbimbel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_ptryout`
--
ALTER TABLE `t_ptryout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
