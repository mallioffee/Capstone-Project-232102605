-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2026 at 07:16 AM
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
-- Database: `db_spfc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$YourHashedPasswordHere', 'Administrator', 'admin@spfc.local', '2026-01-19 06:14:57', '2026-01-19 06:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `basis_aturan`
--

CREATE TABLE `basis_aturan` (
  `idaturan` int(11) NOT NULL,
  `idpenyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basis_aturan`
--

INSERT INTO `basis_aturan` (`idaturan`, `idpenyakit`) VALUES
(18, 13),
(19, 14),
(20, 15),
(21, 16),
(22, 17),
(23, 18),
(24, 19);

-- --------------------------------------------------------

--
-- Table structure for table `detail_basis_aturan`
--

CREATE TABLE `detail_basis_aturan` (
  `idaturan` int(11) NOT NULL,
  `idgejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_basis_aturan`
--

INSERT INTO `detail_basis_aturan` (`idaturan`, `idgejala`) VALUES
(18, 22),
(18, 23),
(18, 24),
(18, 25),
(18, 26),
(19, 30),
(19, 32),
(19, 31),
(19, 27),
(20, 22),
(20, 32),
(20, 33),
(20, 26),
(20, 34),
(21, 24),
(21, 35),
(21, 36),
(21, 37),
(22, 30),
(22, 25),
(22, 38),
(22, 39),
(23, 42),
(23, 40),
(23, 43),
(23, 41),
(24, 22),
(24, 26),
(24, 34),
(24, 45),
(24, 44);

-- --------------------------------------------------------

--
-- Table structure for table `detail_konsultasi`
--

CREATE TABLE `detail_konsultasi` (
  `idkonsultasi` int(11) NOT NULL,
  `idgejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_konsultasi`
--

INSERT INTO `detail_konsultasi` (`idkonsultasi`, `idgejala`) VALUES
(17, 40),
(17, 23),
(17, 33),
(17, 35),
(18, 42),
(18, 22),
(18, 23),
(18, 35),
(18, 25),
(18, 31),
(18, 39),
(18, 43),
(18, 36),
(18, 44),
(19, 32),
(19, 23),
(19, 30),
(19, 35),
(19, 26),
(19, 34),
(19, 38),
(19, 39),
(19, 36),
(19, 44),
(20, 32),
(20, 23),
(20, 30),
(20, 35),
(20, 26),
(20, 34),
(20, 38),
(20, 39),
(20, 36),
(20, 44),
(21, 42),
(21, 33),
(21, 31),
(21, 38),
(21, 45),
(22, 42),
(22, 33),
(23, 42),
(23, 40),
(23, 33),
(23, 30),
(23, 35),
(23, 25),
(23, 34),
(23, 39),
(23, 37),
(23, 45),
(23, 41),
(24, 40),
(24, 32),
(24, 24),
(24, 35),
(24, 36),
(25, 42),
(25, 40),
(25, 23),
(25, 24),
(25, 35),
(25, 25),
(25, 26),
(25, 27),
(26, 42),
(26, 22),
(26, 23),
(26, 35),
(26, 31),
(26, 38),
(26, 39);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penyakit`
--

CREATE TABLE `detail_penyakit` (
  `idkonsultasi` int(11) NOT NULL,
  `idpenyakit` int(11) NOT NULL,
  `persentase` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penyakit`
--

INSERT INTO `detail_penyakit` (`idkonsultasi`, `idpenyakit`, `persentase`) VALUES
(17, 16, 25),
(17, 15, 20),
(17, 13, 20),
(17, 18, 25),
(18, 16, 50),
(18, 17, 50),
(18, 19, 40),
(18, 15, 20),
(18, 14, 25),
(18, 13, 60),
(18, 18, 50),
(19, 16, 50),
(19, 17, 75),
(19, 19, 60),
(19, 15, 60),
(19, 14, 50),
(19, 13, 40),
(20, 16, 50),
(20, 17, 75),
(20, 19, 60),
(20, 15, 60),
(20, 14, 50),
(20, 13, 40),
(21, 17, 25),
(21, 19, 20),
(21, 15, 20),
(21, 14, 25),
(21, 18, 25),
(22, 15, 20),
(22, 18, 25),
(23, 16, 50),
(23, 17, 75),
(23, 19, 40),
(23, 15, 40),
(23, 14, 25),
(23, 13, 20),
(23, 18, 75),
(24, 16, 75),
(24, 15, 20),
(24, 14, 25),
(24, 13, 20),
(24, 18, 25),
(25, 16, 50),
(25, 17, 25),
(25, 19, 20),
(25, 15, 20),
(25, 14, 25),
(25, 13, 80),
(25, 18, 50),
(26, 16, 25),
(26, 17, 50),
(26, 19, 20),
(26, 15, 20),
(26, 14, 25),
(26, 13, 40),
(26, 18, 25);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `idgejala` int(11) NOT NULL,
  `nmgejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`idgejala`, `nmgejala`) VALUES
(22, 'Batang Lunak'),
(23, 'Bau tidak sedap'),
(24, 'Bercak basah hitam'),
(25, 'Bercak membesar'),
(26, 'Berlendir'),
(27, 'Layu'),
(30, 'Bercak kering hitam'),
(31, 'Bercak menyebar'),
(32, 'Batang Mengkerut'),
(33, 'Berair'),
(34, 'Klorosis batang'),
(35, 'Bercak meluas'),
(36, 'Retakan pada kaktus'),
(37, 'Pertumbuhan terhambat'),
(38, 'Luka seperti arang'),
(39, 'Penyebaran bercak hitam'),
(40, 'Batang memanjang'),
(41, 'Warna memucat'),
(42, 'Batang kurus'),
(43, 'Pertumbuhan tidak merata'),
(44, 'Tumbuh jamur kapas putih'),
(45, 'Tanaman miring atau rebah');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `idkonsultasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`idkonsultasi`, `tanggal`, `nama`) VALUES
(17, '2026-01-01', 'Ariocarpus'),
(18, '2026-01-01', 'Melocactus'),
(19, '2026-01-01', 'Kaktus Mini Astrophytum'),
(20, '2026-01-02', 'Rasio'),
(21, '2026-01-04', 'Keras'),
(22, '2026-01-04', 'Keras'),
(23, '2026-01-08', 'Astrophytum Asteria'),
(24, '2026-01-08', 'Astrophytum Asteria'),
(25, '2026-01-08', 'Astrophytum Asteria'),
(26, '2026-01-19', 'Astrophytum Asteria');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `idpenyakit` int(11) NOT NULL,
  `nmpenyakit` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`idpenyakit`, `nmpenyakit`, `keterangan`, `solusi`) VALUES
(13, 'Busuk Lunak', 'penyakit bakteri pada kaktus yang menyebabkan jaringan tanaman mengalami pelunakan, pembusukan basah, serta perubahan warna disertai bau tidak sedap.', 'memotong bagian terinfeksi, mengeringkan luka, serta mengurangi kelembapan dan penyiraman.'),
(14, 'Busuk Kering', 'penyakit jamur yang ditandai oleh jaringan kaktus yang mengering, mengerut, dan berubah warna menjadi cokelat atau keabu-abuan tanpa menghasilkan lendir.', 'Media tanam perlu diganti dengan yang lebih porous dan memiliki drainase baik. Penggunaan fungisida sesuai dosis dianjurkan, serta memastikan tanaman tidak berada di lingkungan yang terlalu lembap.'),
(15, 'Busuk Batang', 'kondisi kerusakan jaringan pada batang kaktus akibat infeksi jamur atau bakteri yang menyebabkan batang melunak, berubah warna, dan mengalami kerusakan progresif dari bagian bawah ke atas. ', 'memotong bagian batang yang terinfeksi dan mengisolasi tanaman dari kaktus lain untuk mencegah penyebaran. Luka potongan harus dikeringkan sebelum ditanam kembali.'),
(16, 'Antranoksa Kaktus', 'penyakit jamur yang menimbulkan bercak-bercak hitam atau cokelat pada permukaan batang kaktus, yang akhirnya menyebabkan nekrosis atau kematian jaringan pada area yang terinfeksi. ', 'Tanaman disemprot fungisida secara berkala sesuai anjuran. Lingkungan tanam harus memiliki sirkulasi udara baik dan tidak terlalu lembap untuk menghambat pertumbuhan jamur.'),
(17, 'Bercak arang', 'penyakit berupa noda hitam seperti jelaga pada permukaan kaktus yang disebabkan oleh jamur saprofit, biasanya berkembang pada cairan manis yang dihasilkan oleh serangga pengisap seperti kutu putih.', 'membersihkan permukaan kaktus menggunakan kain lembap atau air bersih untuk menghilangkan lapisan hitam. Serangga pengisap seperti kutu putih harus dikendalikan menggunakan insektisida ringan.'),
(18, 'Etiolasi', 'kondisi abnormal pada kaktus ketika tanaman tumbuh memanjang, pucat, dan melemah akibat kekurangan cahaya, sehingga pertumbuhan menjadi tidak proporsional dan struktur tanaman rapuh. ', 'Pertumbuhan yang sudah memanjang tidak dapat kembali normal, namun pencahayaan yang tepat akan mencegah kondisi memburuk. Pemangkasan dapat dilakukan jika diperlukan untuk estetika.'),
(19, 'Busuk Akar', 'penyakit pada sistem perakaran kaktus yang disebabkan oleh jamur tanah akibat media yang terlalu basah, sehingga akar membusuk, menghitam, dan gagal menyerap nutrisi maupun air secara optimal.', 'membersihkan akar, dan memotong akar yang membusuk. Setelah itu, kaktus dikeringkan selama beberapa hari sebelum ditanam kembali menggunakan media tanam baru yang kering dan berdrainase baik.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `basis_aturan`
--
ALTER TABLE `basis_aturan`
  ADD PRIMARY KEY (`idaturan`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`idgejala`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`idkonsultasi`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`idpenyakit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `basis_aturan`
--
ALTER TABLE `basis_aturan`
  MODIFY `idaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `idgejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `idkonsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `idpenyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
