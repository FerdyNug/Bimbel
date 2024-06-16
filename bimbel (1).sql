-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2024 pada 13.27
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `highlight`
--

CREATE TABLE `highlight` (
  `id` int(11) NOT NULL,
  `banner1` varchar(255) NOT NULL,
  `banner2` varchar(255) NOT NULL,
  `banner3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `highlight`
--

INSERT INTO `highlight` (`id`, `banner1`, `banner2`, `banner3`) VALUES
(6, 'banner1.jpg', 'banner2.jpg', 'banner3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id`, `username`, `password`) VALUES
(6, 'ferdy', '$2y$10$G2kRHif771776RdfsiYm5OYZCSbgyhjsmHiDmxI6J7tKYj1yP8QT.'),
(7, 'admin', '$2y$10$1noV/0KYHB.FbmA6tdUL2e1X/K9UFXJ7/pFyIB5B9EptlNJz/pQbe'),
(8, 'uman', '$2y$10$Wne943pkw8AgmTIc74ih1.0RcbYDEK27ZbRZdyveH26Pbxjbaf44K'),
(9, 'fahry', '$2y$10$WGnNMpDAIgYKx6MHRG9.h.l.eq3MfeUXDPqqzPfTyHbQHk.CRT4JK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dptryout`
--

CREATE TABLE `t_dptryout` (
  `id` int(11) NOT NULL,
  `fitur` text NOT NULL,
  `acuan` varchar(255) NOT NULL,
  `materi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pbimbel`
--

CREATE TABLE `t_pbimbel` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `judul` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `peserta` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `t_pbimbel`
--

INSERT INTO `t_pbimbel` (`id`, `gambar`, `judul`, `rank`, `peserta`, `harga`) VALUES
(5, 'faa4f595d245fbc4e531e4905f0f2803.png', 'wefewfwwwwqeqwe', 2, 2142, 345345);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_ptryout`
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
-- Dumping data untuk tabel `t_ptryout`
--

INSERT INTO `t_ptryout` (`id`, `gambar`, `judul`, `rank`, `peserta`, `harga`) VALUES
(5, 'c9488db41bd58b6817deaaf2ded85af4.png', 'TKD ', 3, 20, 55),
(7, '19a3bea846b87b2e6ea383595a309175.png', 'TOEFL', 3, 221, 111);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_soal`
--

CREATE TABLE `t_soal` (
  `id_soal` int(11) NOT NULL,
  `soal` varchar(500) NOT NULL,
  `pil_a` varchar(100) NOT NULL,
  `pil_b` varchar(100) NOT NULL,
  `pil_c` varchar(100) NOT NULL,
  `pil_d` varchar(100) NOT NULL,
  `pil_e` varchar(100) NOT NULL,
  `kunci_jawaban` varchar(10) NOT NULL,
  `pembahasan` varchar(500) NOT NULL,
  `skor_a` varchar(10) NOT NULL,
  `skor_b` varchar(10) NOT NULL,
  `skor_c` varchar(10) NOT NULL,
  `skor_d` varchar(10) NOT NULL,
  `skor_e` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_soal`
--

INSERT INTO `t_soal` (`id_soal`, `soal`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `pil_e`, `kunci_jawaban`, `pembahasan`, `skor_a`, `skor_b`, `skor_c`, `skor_d`, `skor_e`) VALUES
(1, 'Kenapa bumi bulat?', 'A.', 'B.', 'C.', 'D.', 'E.', 'B', 'Karena tidak datar', '0', '5', '0', '0', '0'),
(2, 'Kenapa bumi berputar?', 'A. Gatau', 'B. Apa ya', 'C. Kayanya', 'D. Bukan', 'E. Iya', 'A', 'Karena tidak diam', '5', '0', '0', '0', '0'),
(3, 'Apa itu komputer?', 'A. Mainan', 'B. Perangkat', 'C. Digital', 'D. Elektronik', 'E. Barang', 'D', 'Komputer itu Alat Elektronik', '0', '0', '0', '5', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
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
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id`, `email`, `nama_panggilan`, `password`, `gambar`, `nama_lengkap`, `provinsi`, `kabupaten`) VALUES
(4, 'fahry@gmail.com', 'Fahry', '', '6669c38156d0d.png', 'Fahry Hidayah Rachmadi', 'DKI Jakarta', 'Jakarta Pusat'),
(5, 'nugrahaferdy68@gmail.com', '', '$2y$10$t2HrvYR2LQNOblTnQfKwruUf3dirIs5wWoVjb3uaGdEHqX9eFNsl6', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `highlight`
--
ALTER TABLE `highlight`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_dptryout`
--
ALTER TABLE `t_dptryout`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_pbimbel`
--
ALTER TABLE `t_pbimbel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_ptryout`
--
ALTER TABLE `t_ptryout`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_soal`
--
ALTER TABLE `t_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `highlight`
--
ALTER TABLE `highlight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_dptryout`
--
ALTER TABLE `t_dptryout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_pbimbel`
--
ALTER TABLE `t_pbimbel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_ptryout`
--
ALTER TABLE `t_ptryout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_soal`
--
ALTER TABLE `t_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
