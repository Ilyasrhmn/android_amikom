-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2026 at 10:09 AM
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
-- Database: `android_amikom`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nik_guru` varchar(15) NOT NULL,
  `nama_guru` varchar(20) NOT NULL,
  `password_guru` varchar(50) NOT NULL,
  `wa_guru` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nik_guru`, `nama_guru`, `password_guru`, `wa_guru`) VALUES
('19030246', 'Irma Rofni W.', '1sampai3', '081283748675'),
('19030284', 'Arif Nur Rohman', 'rahasia', '081727191675'),
('19123203', 'Ilyas Nur Rohman', 'ilyas3203', '088899917171');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `nik_guru` varchar(15) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL DEFAULT 'ganjil'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_mapel`, `nik_guru`, `nama_guru`, `tahun_ajaran`, `semester`) VALUES
(1, 'XP8BF', 'Bahasa Pemrograman 2', '19030284', 'Arif Nur Rohman', '2025/2026', 'ganjil'),
(2, 'JP4SX', 'Pemrograman Web Lanjut', '19030246', 'Irma Rofni Wulandari', '2025/2026', 'ganjil'),
(3, 'YNTOS', 'Sistem Rekomendasi', '19030284', 'Arif Nur Rohman', '2025/2026', 'ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `judul_materi` varchar(255) NOT NULL,
  `isi_materi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_kelas`, `judul_materi`, `isi_materi`) VALUES
(1, 1, 'Pengenalan Android Kotlin', ''),
(2, 1, 'Eksplisit Intent dan Implisit Intent', ''),
(3, 2, 'Pengenalan Bahasa Pemrograman PHP', ''),
(4, 2, 'Mengenal Array dan function di PHP', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul_pengumuman` varchar(255) NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `tanggal_pengumuman` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul_pengumuman`, `isi_pengumuman`, `tanggal_pengumuman`) VALUES
(1, 'Jadwal UTS Ganjil 2025/2026', '', '2025-10-23'),
(2, 'Jadwal Pembayaran 2025/2026', '', '2025-10-23'),
(3, 'Libur Natal dan Tahun Baru', '', '2025-10-23'),
(4, 'Acara Gelar Karya Mahasiswa Sistem informasi', '', '2025-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `id_kelas`, `nis`) VALUES
(1, 1, '24.12.3194'),
(2, 1, '24.12.3195'),
(3, 1, '24.12.3196'),
(4, 1, '24.12.3197'),
(5, 1, '24.12.3198'),
(6, 1, '24.12.3199'),
(7, 1, '24.12.3200'),
(8, 1, '24.12.3201'),
(9, 1, '24.12.3202'),
(10, 1, '24.12.3203'),
(11, 1, '24.12.3204'),
(12, 1, '24.12.3206'),
(13, 1, '24.12.3207'),
(14, 1, '24.12.3208'),
(15, 1, '24.12.3209'),
(16, 1, '24.12.3210'),
(17, 2, '24.12.3194'),
(18, 2, '24.12.3195'),
(19, 2, '24.12.3196'),
(20, 2, '24.12.3197'),
(21, 2, '24.12.3198'),
(22, 2, '24.12.3199'),
(23, 2, '24.12.3200'),
(24, 2, '24.12.3201'),
(25, 2, '24.12.3202'),
(26, 2, '24.12.3203'),
(27, 2, '24.12.3204'),
(28, 2, '24.12.3206'),
(29, 2, '24.12.3207'),
(30, 2, '24.12.3208'),
(31, 2, '24.12.3209'),
(32, 2, '24.12.3210');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `id_sesi` int(11) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_sesi`, `nis`, `waktu`) VALUES
(4, 11, '24.12.3194', '2025-12-29 14:21:53'),
(5, 11, '24.12.3203', '2025-12-29 14:25:52'),
(6, 11, '24.12.3204', '2025-12-29 14:37:42'),
(7, 13, '24.12.3203', '2025-12-29 22:25:57'),
(8, 13, '24.12.3204', '2025-12-29 22:27:39'),
(9, 13, '24.12.3206', '2025-12-29 22:28:35'),
(10, 13, '24.12.3207', '2025-12-29 22:29:16'),
(11, 14, '24.12.3203', '2026-01-26 23:40:51'),
(16, 16, '24.12.3203', '2026-01-27 01:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `sesi`
--

CREATE TABLE `sesi` (
  `id_sesi` int(11) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `materi_sesi` text NOT NULL,
  `bahasan_sesi` text NOT NULL,
  `kode_sesi` varchar(5) NOT NULL,
  `ke_sesi` int(3) NOT NULL DEFAULT 1,
  `tanggal_sesi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sesi`
--

INSERT INTO `sesi` (`id_sesi`, `kode_kelas`, `materi_sesi`, `bahasan_sesi`, `kode_sesi`, `ke_sesi`, `tanggal_sesi`) VALUES
(1, 'JP4SX', 'Membuat Web Dinamis', 'Membuat Web Dinamis Menggunakan PHP', 'bbgyv', 1, '2025-11-13 16:11:37'),
(2, 'JP4SX', 'Membuat Web dengan JavaScript', 'Pengenalan JavaScript', 'HgkaP', 2, '2025-11-13 19:32:18'),
(3, 'JP4SX', 'Membuat Web denganTypeScript', 'mengenal typescript', 'Z63N0', 3, '2025-11-13 20:30:57'),
(4, 'JP4SX', 'Membuat Web dengan Golang', 'Pengenalan Golang', 'PhBt1', 4, '2025-11-18 21:41:34'),
(5, 'XP8BF', 'Belajar Membuat Aplikasi Presensi', 'Membuat Frontend & Backend di android studio', 'n6EoS', 1, '2025-12-11 19:10:57'),
(6, 'XP8BF', 'Belajar Membuat Aplikasi Presensi', 'Demo Aplikasi', 'ogyCR', 2, '2025-12-11 19:23:56'),
(7, 'XP8BF', 'Belajar Membuat Aplikasi Presensi', 'demo aplikasi', 'yDWr7', 2, '2025-12-11 19:25:01'),
(11, 'JP4SX', 'coba presensi', '1234', 'w9lGq', 4, '2025-12-29 14:21:43'),
(12, 'JP4SX', 'Belajar Membuat Aplikasi Presensi', 'qwerty', '7SEbz', 2, '2025-12-29 21:40:43'),
(13, 'JP4SX', 'Belajar Membuat Aplikasi Presensi', 'scan code qr absen', 'GeI5R', 4, '2025-12-29 22:24:46'),
(14, 'JP4SX', 'Coba Presensi 3203', 'Melakukan Demo Aplikasi Guru', 'HUUZE', 8, '2026-01-26 21:35:05'),
(15, 'XP8BF', 'Belajar Membuat Aplikasi Presensi', 'Coba Presensi', 'yUI0Z', 4, '2026-01-27 00:42:39'),
(16, 'XP8BF', 'Belajar Membuat Aplikasi Presensi', 'Coba Presensi', 'KgidB', 5, '2026-01-27 00:59:27'),
(17, 'XP8BF', 'Coba Presensi 3203', '666', 'shUYW', 6, '2026-03-03 14:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(10) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `password_siswa` varchar(50) NOT NULL,
  `foto_siswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `password_siswa`, `foto_siswa`) VALUES
('24.12.3194', 'FARELL PERNANDA MAURIEL', 'b7f22d3d63a3d232958c7980d722d11d000c7c5e', 'default.jpg'),
('24.12.3195', 'AULIYA SULTHAN ANGKAWIJAYA', 'e778ec1fc52f6f9fd8e7d8080431357ce82393cb', 'default.jpg'),
('24.12.3196', 'TRI HAPSARI', '72d03b514230526c6ae8e08c2259457cb50f948e', 'default.jpg'),
('24.12.3197', 'AHMAD ZAENURI ZAFA MUZAKY', '8056f7a7717b0e8128c77f74f0501647e881760b', 'default.jpg'),
('24.12.3198', 'DZAKI RIAN WIBAWA', 'cfe3680b5558b3ab8f99a1ff2fc5089817b06a03', 'default.jpg'),
('24.12.3199', 'ACHMED MORENO SAPUTRA', 'c012144e8cf0b350fe3d98631de446ad905ea07c', 'default.jpg'),
('24.12.3200', 'MUHAMMAD FARUQ SULAIMAN', '1a72c7291ad1aa29c718795037787decfed9e155', 'default.jpg'),
('24.12.3201', 'BIMA RIZAL JUNIOR', '504658078d71facb9b11ee1e4940820d257e1011', 'default.jpg'),
('24.12.3202', 'MUHAMMAD ZIAUDIN ROBBANI', '181a29a8a9ef8f726801eb94202cb4ed66153aa0', 'default.jpg'),
('24.12.3203', 'ILYAS NUR ROHMAN', 'aad7388397ceef73cec7e236c5bdc2f82f6adfb0', 'default.jpg'),
('24.12.3204', 'M NAUFAL FAZANI', '7ca7117f25ad0421a063637ebb9bd6a3abca507e', 'default.jpg'),
('24.12.3206', 'NAURA ISMENA DEWI RAHAJENG', '07711dbb51440479ab94d8e99c75bf08cedbcdca', 'default.jpg'),
('24.12.3207', 'GILANG SATYA KADARMA', 'e524f46f62c25bf5fb71b13fbea1a8af505c48e6', 'default.jpg'),
('24.12.3208', 'DEDEK GUNATA SAPUTRA', '36134b92c6347d4f2cdd6ade0dbdd3287bd4f12c', 'default.jpg'),
('24.12.3209', 'RANGGA PERMANA MOKOAGOW', 'e43ab3bd33596fa5772be3052da7b3bd0f0633fd', 'default.jpg'),
('24.12.3210', 'DZAKY IDZAA SYIKTA', '6c84b12cb10d6ec0107a2863f64dee6cc9dbb8fd', 'default.jpg'),
('2412', 'FARELL PERNANDA MAURIEL', 'b7f22d3d63a3d232958c7980d722d11d000c7c5e', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nik_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indexes for table `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`id_sesi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sesi`
--
ALTER TABLE `sesi`
  MODIFY `id_sesi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
