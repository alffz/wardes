-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 06:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wardes`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_keluarga`
--

CREATE TABLE `anggota_keluarga` (
  `id_ak` varchar(50) NOT NULL,
  `id_kk` varchar(50) NOT NULL,
  `nomor_urut` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` int(20) NOT NULL,
  `kelamin` enum('P','W') NOT NULL,
  `tmpt_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tanggal_pencatatan` date NOT NULL,
  `agama` enum('Islam','Kristen','Protestan','Hindu','Budha','Konghucu') NOT NULL,
  `id_pendidikan` int(4) NOT NULL,
  `id_pekerjaan` int(4) NOT NULL,
  `status_perkawinan` enum('k','bk','jd') NOT NULL,
  `id_hub_keluarga` int(2) NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL,
  `NamaAyah` varchar(50) NOT NULL,
  `NamaIbu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota_keluarga`
--

INSERT INTO `anggota_keluarga` (`id_ak`, `id_kk`, `nomor_urut`, `nama`, `nik`, `kelamin`, `tmpt_lahir`, `tanggal_lahir`, `tanggal_pencatatan`, `agama`, `id_pendidikan`, `id_pekerjaan`, `status_perkawinan`, `id_hub_keluarga`, `kewarganegaraan`, `NamaAyah`, `NamaIbu`) VALUES
('1', '60b20e4fd9853', 0, 'ijol', 1, 'P', '', '0000-00-00', '2021-06-09', '', 1, 0, 'bk', 0, 'WNI', 'entah', 'entah2'),
('2', '60b35b9601773', 0, 'habib', 2, 'P', '', '0000-00-00', '2021-06-15', '', 2, 0, 'k', 0, 'WNI', 'jumari', 'al ifran'),
('60b9a81058721', '60b6596228de2', 0, 'akbar', 120726, 'P', '', '0000-00-00', '2021-06-01', '', 2, 2, 'bk', 4, 'WNA', 'subagyo', 'lub'),
('60b9a8bd056f0', '60b20e4fd9853', 0, 'habib', 1212, 'P', '', '0000-00-00', '2021-06-01', '', 2, 2, 'bk', 4, 'WNA', 'sumarsono', 'pohan'),
('60b9adda14c33', '60b20e4fd9853', 0, 'dayat', 1207266654, 'P', 'kampung kolam', '2021-06-04', '2021-06-03', '', 2, 5, 'bk', 11, 'WNI', 'sunarto', 'ponimijem'),
('60bd85821b181', '60b35b9601773', 0, 'wak leng', 1321, 'P', 'medan', '2021-06-07', '2021-06-03', 'Islam', 1, 2, 'bk', 4, 'WNI', 'sukijan', 'sukirman');

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id_desa` varchar(50) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `kode_pos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `nama_desa`, `kode_pos`) VALUES
('1', 'bandar setia', '20371'),
('2', 'tembung', '20371'),
('3', 'bandar khalipah', '20371');

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `id_dusun` varchar(50) NOT NULL,
  `id_desa` varchar(50) NOT NULL,
  `nama_dusun` int(50) NOT NULL,
  `kepala_dusun` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `id_desa`, `nama_dusun`, `kepala_dusun`) VALUES
('60595beb3e591', '3', 1, ''),
('60595c017b832', '3', 2, ''),
('60595c2635465', '3', 3, ''),
('60595c6241a8e', '3', 7, ''),
('60595c9f2e849', '3', 4, ''),
('60595ca1de655', '3', 6, ''),
('60595ca5e50f4', '3', 8, ''),
('60595cab950cc', '3', 9, ''),
('60595cb07d6c1', '3', 5, ''),
('60595cb316442', '3', 10, ''),
('60595cb6be6bc', '3', 11, ''),
('60595cba533fb', '3', 12, ''),
('60595cbe532fb', '3', 13, ''),
('60595cc2e8a9f', '3', 14, ''),
('60595cc833db2', '3', 15, ''),
('60595ccc5b8ec', '3', 16, ''),
('60595cd18e739', '3', 17, '');

-- --------------------------------------------------------

--
-- Table structure for table `gang`
--

CREATE TABLE `gang` (
  `id_gang` varchar(50) NOT NULL,
  `id_jalan` varchar(50) NOT NULL,
  `nama_gang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gang`
--

INSERT INTO `gang` (`id_gang`, `id_jalan`, `nama_gang`) VALUES
('60597ace0b466', '60595daecc84d', 'kitab'),
('60599cce3570b', '60595daecc84d', 'kenari'),
('60599ce517575', '60595daecc84d', 'mustika'),
('60599cf831623', '60595daecc84d', 'mufakat'),
('60599d4911762', '60595da2ad9b1', 'rezeki'),
('60599d5a3c9fd', '60595da2ad9b1', 'Lapangan'),
('606147e6336c7', '60595daecc84d', 'Jaguar'),
('606b2be3bc4bf', '606b2379e2e7e', 'gg rambutan'),
('606b323f82f6d', '60595dbf3ff1b', 'merpati'),
('606b3b9d63ca6', '60595da2ad9b1', 'sandal'),
('607ad7f9bf268', '607abcccaa37e', 'nokia'),
('607b9d642d36a', '606b2379e2e7e', 'kita');

-- --------------------------------------------------------

--
-- Table structure for table `hubungan_keluarga`
--

CREATE TABLE `hubungan_keluarga` (
  `id_hubungan` int(2) NOT NULL,
  `status_hubungan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hubungan_keluarga`
--

INSERT INTO `hubungan_keluarga` (`id_hubungan`, `status_hubungan`) VALUES
(1, 'Ayah'),
(2, 'Ibu'),
(3, 'Adik'),
(4, 'Anak Kandung'),
(5, 'Anak Angkat'),
(6, 'Anak Tiri'),
(7, 'Cucu'),
(8, 'Famili Lain'),
(9, 'Istri'),
(10, 'Kakak'),
(11, 'Kepala Keluarga'),
(12, 'Keponakan'),
(13, 'Lainnya'),
(14, 'Menantu'),
(15, 'Mertua'),
(16, 'Nenek'),
(17, 'Paman'),
(18, 'Sepupu'),
(19, 'Suami'),
(20, 'Tante'),
(21, 'Teman');

-- --------------------------------------------------------

--
-- Table structure for table `jalan`
--

CREATE TABLE `jalan` (
  `id_jalan` varchar(50) NOT NULL,
  `nama_jalan` varchar(50) NOT NULL,
  `id_dusun` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jalan`
--

INSERT INTO `jalan` (`id_jalan`, `nama_jalan`, `id_dusun`) VALUES
('60595da2ad9b1', 'Jl. Kenari', '60595beb3e591'),
('60595daecc84d', 'JL. Bersama', '60595beb3e591'),
('60595dbf3ff1b', 'Jl. kutilang', '60595beb3e591'),
('60595debd66ef', 'Jl. Mangga', '60595c017b832'),
('60595e031b96e', 'Jl. Terusan', '60595c017b832'),
('60595e21468e3', 'Jl . Hidup', '60595c017b832'),
('606b2379e2e7e', 'jl. kapok', '60595c2635465'),
('606b30875d485', 'jl. durian', '60595c6241a8e'),
('607abcccaa37e', 'hp', '60595beb3e591'),
('607ac2d6eb22a', 'jl kipas', '60595c017b832'),
('608e582ab51b0', 'jl. ke surga', '60595c017b832'),
('60b70de153c86', 'jakarta', '60595c9f2e849'),
('60b70de9c3d18', 'jakarta', '60595c9f2e849'),
('60b70e1fc36ef', 'bekasi', '60595c9f2e849'),
('60b70e4fac3b1', 'marjuana', '60595c9f2e849');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_keluarga`
--

CREATE TABLE `kartu_keluarga` (
  `id_kk` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_kk` varchar(50) NOT NULL,
  `id_desa` varchar(50) DEFAULT NULL,
  `id_dusun` varchar(50) NOT NULL,
  `id_jalan` varchar(50) NOT NULL,
  `id_gang` varchar(50) NOT NULL,
  `Latitude` varchar(20) DEFAULT NULL,
  `Longitude` varchar(20) DEFAULT NULL,
  `date` int(10) DEFAULT NULL,
  `waktu` int(20) NOT NULL,
  `pengisi` varchar(25) DEFAULT NULL,
  `keterangan` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartu_keluarga`
--

INSERT INTO `kartu_keluarga` (`id_kk`, `nik`, `nama_kk`, `id_desa`, `id_dusun`, `id_jalan`, `id_gang`, `Latitude`, `Longitude`, `date`, `waktu`, `pengisi`, `keterangan`) VALUES
('60b206701ca88', '3', 'regar', '3', '60595beb3e591', '60595da2ad9b1', '60599d4911762', '', '', 290521, 1622279792, 'id_user607fa945cbbd2', 'selop'),
('60b20e4fd9853', '3', 'arpan ', '3', '60595c2635465', '606b2379e2e7e', '606b2be3bc4bf', '', '', 290521, 1622281807, 'id_user607fa945cbbd2', 'tetangga'),
('60b35b9601773', '2', 'rian', '3', '60595beb3e591', '60595daecc84d', '60597ace0b466', '', '', 300521, 1622367126, 'id_user607fa945cbbd2', ''),
('60b505f16770a', '5', 'buku', '3', '60595beb3e591', '607abcccaa37e', '607ad7f9bf268', '', '', 310521, 1622476273, 'id_user607fa945cbbd2', ''),
('60b6440e5a7c1', '6', 'pak jol', '3', '60595beb3e591', '607abcccaa37e', '607ad7f9bf268', '', '', 10621, 1622557710, 'id_user607fa945cbbd2', ''),
('60b644469cfbe', '8', 'bu ', '3', '60595beb3e591', '607abcccaa37e', '607ad7f9bf268', '', '', 10621, 1622557766, 'id_user607fa945cbbd2', ''),
('60b644d88ec70', '7', 'apasin', '3', '60595beb3e591', '607abcccaa37e', '607ad7f9bf268', '', '', 10621, 1622557912, 'id_user607fa945cbbd2', ''),
('60b6458d9e5ae', '10', 'jdf', '3', '60595beb3e591', '607abcccaa37e', '607ad7f9bf268', '', '', 10621, 1622558093, 'id_user607fa945cbbd2', ''),
('60b6596228de2', '12', 'kucing', '3', '60595beb3e591', '607abcccaa37e', '607ad7f9bf268', '', '', 10621, 1622563170, 'id_user607fa945cbbd2', ''),
('60b9b55320742', '120982', 'rian', '3', '60595beb3e591', '60595daecc84d', '60597ace0b466', '21', 'f', 40621, 1622783315, 'id_user607fa945cbbd2', 'df');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(50) NOT NULL,
  `nama_pekerjaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`) VALUES
(1, 'Akuntan'),
(2, 'Buruh Harian Lepas'),
(3, 'Kontraktor'),
(4, 'Nelayan'),
(5, 'Pedagang Keliling');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(50) NOT NULL,
  `nama_pendidikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `nama_pendidikan`) VALUES
(1, 'Sd '),
(2, 'Smp'),
(3, 'Sma'),
(4, 'D3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_dusun` varchar(50) DEFAULT NULL,
  `nama` varchar(30) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `no_hp` int(17) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `id_dusun`, `nama`, `gambar`, `no_hp`, `alamat`, `role_id`, `is_active`, `date`) VALUES
('id_user607fa8961fd8a', 'alfriansyah0408@gmail.com', '1234', 'asd', 'alfri ansyah', 'default.png', 1111, 'medan', 1, 1, 421),
('id_user607fa945cbbd2', 'akbar@gam.com', '1111', '60595c2635465', 'akbar', 'default.png', 0, '', 2, 0, 21),
('id_user6092c018f1ac5', 'ri@ri.com', '12332111', '60595beb3e591', 'rian', 'gambar/default.png', 0, '', 2, 0, 50521);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_user_access` int(3) NOT NULL,
  `role_access` varchar(50) NOT NULL,
  `role_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_user_access`, `role_access`, `role_menu`) VALUES
(17, '1', '1'),
(29, '1', '6'),
(1593, '2', '2'),
(1592, '2', '5'),
(1585, '2', '6'),
(1590, '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(50) NOT NULL,
  `role_menu` int(1) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `role_menu`, `menu`) VALUES
(2, 1, 'Sekdes'),
(4, 2, 'kadus'),
(5, 3, 'Tamu'),
(6, 4, 'Profil'),
(7, 5, 'Tambah'),
(8, 6, 'Data');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(2) NOT NULL,
  `menu_role` int(2) NOT NULL,
  `title` varchar(20) NOT NULL,
  `url` varchar(20) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_role`, `title`, `url`, `icon`, `is_active`) VALUES
(3, 1, 'Hak Akses', 'sekdes/hakAkses', 'fas fa-tachometer-alt', 0),
(5, 1, 'Kadus', 'sekdes/kadus', 'fas fa-user-edit', 0),
(7, 5, 'Tambah KK', 'tambah/kartukeluarga', 'fas fw fa-plus', 1),
(8, 5, 'Tambah Dusun', 'tambah/dusun', 'fas fw fa-plus', 1),
(9, 5, 'Tambah Jalan', 'tambah/jalan', 'fas fw fa-plus', 1),
(10, 5, 'Tambah Gang', 'tambah/gang', 'fas fw fa-plus', 1),
(12, 6, 'Data Penduduk', 'data/penduduk', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD PRIMARY KEY (`id_ak`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `nama_desa` (`nama_desa`);

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id_dusun`),
  ADD KEY `id_desa` (`id_desa`);

--
-- Indexes for table `gang`
--
ALTER TABLE `gang`
  ADD PRIMARY KEY (`id_gang`),
  ADD KEY `id_jalan` (`id_jalan`);

--
-- Indexes for table `hubungan_keluarga`
--
ALTER TABLE `hubungan_keluarga`
  ADD PRIMARY KEY (`id_hubungan`);

--
-- Indexes for table `jalan`
--
ALTER TABLE `jalan`
  ADD PRIMARY KEY (`id_jalan`),
  ADD KEY `id_dusun` (`id_dusun`);

--
-- Indexes for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`id_kk`),
  ADD KEY `id_desa_2` (`id_desa`,`id_dusun`,`id_jalan`),
  ADD KEY `id_jalan` (`id_jalan`),
  ADD KEY `id_dusun` (`id_dusun`),
  ADD KEY `id_gang` (`id_gang`),
  ADD KEY `id_desa_4` (`id_desa`),
  ADD KEY `Latitude` (`Latitude`),
  ADD KEY `Latitude_2` (`Latitude`),
  ADD KEY `keterangan` (`keterangan`);
ALTER TABLE `kartu_keluarga` ADD FULLTEXT KEY `id_desa_3` (`id_desa`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_user_access`),
  ADD KEY `role_id` (`role_access`,`role_menu`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hubungan_keluarga`
--
ALTER TABLE `hubungan_keluarga`
  MODIFY `id_hubungan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_user_access` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1594;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD CONSTRAINT `anggota_keluarga_ibfk_1` FOREIGN KEY (`id_kk`) REFERENCES `kartu_keluarga` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gang`
--
ALTER TABLE `gang`
  ADD CONSTRAINT `gang_ibfk_1` FOREIGN KEY (`id_jalan`) REFERENCES `jalan` (`id_jalan`) ON DELETE CASCADE;

--
-- Constraints for table `jalan`
--
ALTER TABLE `jalan`
  ADD CONSTRAINT `jalan_ibfk_1` FOREIGN KEY (`id_dusun`) REFERENCES `dusun` (`id_dusun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD CONSTRAINT `kartu_keluarga_ibfk_2` FOREIGN KEY (`id_jalan`) REFERENCES `jalan` (`id_jalan`) ON DELETE CASCADE,
  ADD CONSTRAINT `kartu_keluarga_ibfk_3` FOREIGN KEY (`id_dusun`) REFERENCES `dusun` (`id_dusun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kartu_keluarga_ibfk_4` FOREIGN KEY (`id_gang`) REFERENCES `gang` (`id_gang`) ON DELETE CASCADE,
  ADD CONSTRAINT `kartu_keluarga_ibfk_5` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
