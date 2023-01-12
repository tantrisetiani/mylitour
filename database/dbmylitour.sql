-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 03:03 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmylitour`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `kode_admin` varchar(10) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `foto_admin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `kode_admin`, `nama_admin`, `foto_admin`, `username`, `password`) VALUES
(1, 'ADM01', 'Dinas Perpustakaan dan Kearsipan', '488d7af2b3a9197d827ef2c350abb62d.png', 'dispusipmadiun', 'dispusipmadiun');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `jenis_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis_kategori`) VALUES
(1, 'Kearifan Lokal'),
(2, 'Caruban Literasi Hub'),
(3, 'Naskah Kuno');

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_kritik_saran` int(11) NOT NULL,
  `nama_pengunjung` varchar(100) NOT NULL,
  `email_pengunjung` varchar(50) NOT NULL,
  `kritik_saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `potensi`
--

CREATE TABLE `potensi` (
  `id_potensi` int(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `nama_potensi` varchar(100) NOT NULL,
  `slug` varchar(1024) NOT NULL,
  `informasi` varchar(10000) NOT NULL,
  `video_youtube` varchar(1500) DEFAULT NULL,
  `tanggal_update` date NOT NULL,
  `foto_potensi` varchar(100) NOT NULL,
  `referensi` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potensi`
--

INSERT INTO `potensi` (`id_potensi`, `id_kategori`, `id_wilayah`, `nama_potensi`, `slug`, `informasi`, `video_youtube`, `tanggal_update`, `foto_potensi`, `referensi`) VALUES
(1, 1, 10, 'Masjid Quba Madiun', 'masjid-quba-madiun', '<p>Masjid Quba Madiun terletak di Kecamatan Mejayan, Kabupaten Madiun.</p>', 'https://youtu.be/hXGvBkpGu6E', '2022-10-19', '1118e85f25feea36561486a725c38d30.jpg', ''),
(2, 1, 12, 'Waduk Widas', 'waduk-widas', '<p>Waduk Widas terletak di Kecamatan Saradan, Kabupaten Madiun..</p>', 'https://youtu.be/QZa5WljYPWQ', '2022-10-19', 'ca8204b6c8de2fbeb26a173a5880a96c.jpg', ''),
(3, 3, 10, 'Naskah Gajah Mada', 'naskah-gajah-mada', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'https://youtu.be/EM6yn9iJoOc', '2022-10-20', 'ed7c0899cc86ce7f23d7d47d2d2e0486.jpg', ''),
(4, 1, 15, 'Monumen Kresek Madiun', 'monumen-kresek-madiun', '<p>Monumen Kresek</p>', 'https://youtu.be/b0bL__h5m3U', '2022-10-21', 'bba246f80ebae0c3ca3584ef55b978b1.jpg', ''),
(5, 2, 10, 'Pengembangan Literasi Berbasis Inklusi Sosial – Pelatihan Merajut', 'pengembangan-literasi-berbasis-inklusi-sosial--pelatihan-merajut', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'https://youtu.be/TQoHBbEQfLk', '2022-10-23', '30453666ca552de7ab7f3bab71491829.jpg', ''),
(6, 3, 10, 'Serat Ramayana Koleksi Museum Mpu Tantular', 'serat-ramayana-koleksi-museum-mpu-tantular', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry.</p>', 'https://youtu.be/SNWJ4ujZFUc', '2022-10-23', '0c7203e7be16f1140667be6fb8ae2204.jpg', 'https://khastara.perpusnas.go.id/landing/detail/1539724'),
(7, 2, 10, 'Pelatihan Blender 3D', 'pelatihan-blender-3d', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'https://youtu.be/TQoHBbEQfLk', '2022-10-24', 'e0b4cd0efc543973d6fedbef0fc1417c.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `statistik_pengunjung`
--

CREATE TABLE `statistik_pengunjung` (
  `tanggal` date NOT NULL,
  `ipAddress` text NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statistik_pengunjung`
--

INSERT INTO `statistik_pengunjung` (`tanggal`, `ipAddress`, `jumlah`) VALUES
('2022-10-30', '{\"ip_address\":[\"::1\",\"::1\"]}', 2),
('2022-10-31', '{\"ip_address\":[\"::1\",\"::1\",\"::1\",\"::1\",\"::1\",\"::1\",\"::1\",\"::1\",\"::1\"]}', 9),
('2022-11-01', '{\"ip_address\":[\"::1\",\"::1\",\"::1\",\"::1\",\"::1\",\"::1\",\"::1\",\"::1\",\"::1\",\"::1\"]}', 10),
('2022-11-02', '{\"ip_address\":[\"::1\",\"::1\",\"::1\"]}', 3),
('2022-11-04', '{\"ip_address\":[\"::1\"]}', 1),
('2022-11-05', '{\"ip_address\":[\"::1\",\"::1\",\"::1\",\"::1\",\"::1\"]}', 5),
('2022-11-06', '{\"ip_address\":[\"::1\"]}', 1),
('2022-11-07', '{\"ip_address\":[\"::1\",\"::1\",\"::1\",\"::1\",\"::1\"]}', 5),
('2022-11-08', '{\"ip_address\":[\"::1\",\"::1\",\"127.0.0.1\",\"::1\"]}', 4),
('2022-11-10', '{\"ip_address\":[\"::1\"]}', 1),
('2022-11-11', '{\"ip_address\":[\"::1\",\"::1\",\"::1\"]}', 3);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`) VALUES
(1, 'Balerejo'),
(2, 'Dagangan'),
(3, 'Dolopo'),
(4, 'Geger'),
(5, 'Gemarang'),
(6, 'Jiwan'),
(7, 'Kare'),
(8, 'Kebonsari'),
(9, 'Madiun'),
(10, 'Mejayan'),
(11, 'Pilangkenceng'),
(12, 'Saradan'),
(13, 'Sawahan'),
(14, 'Wonoasri'),
(15, 'Wungu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_kritik_saran`);

--
-- Indexes for table `potensi`
--
ALTER TABLE `potensi`
  ADD PRIMARY KEY (`id_potensi`),
  ADD KEY `id_wilayah` (`id_wilayah`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `statistik_pengunjung`
--
ALTER TABLE `statistik_pengunjung`
  ADD PRIMARY KEY (`tanggal`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_kritik_saran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `potensi`
--
ALTER TABLE `potensi`
  MODIFY `id_potensi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `potensi`
--
ALTER TABLE `potensi`
  ADD CONSTRAINT `potensi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `potensi_ibfk_2` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
