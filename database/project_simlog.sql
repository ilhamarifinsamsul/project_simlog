-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 06:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_simlog`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(142, '2023-10-22-011355', 'App\\Database\\Migrations\\TbRole', 'default', 'App', 1705300263, 1),
(143, '2023-10-22-011955', 'App\\Database\\Migrations\\TbUser', 'default', 'App', 1705300263, 1),
(144, '2023-10-22-013533', 'App\\Database\\Migrations\\TbBarangKategori', 'default', 'App', 1705300263, 1),
(145, '2023-10-22-014050', 'App\\Database\\Migrations\\TbBarangSatuan', 'default', 'App', 1705300263, 1),
(146, '2023-10-22-014528', 'App\\Database\\Migrations\\TbBarang', 'default', 'App', 1705300263, 1),
(147, '2023-10-22-015707', 'App\\Database\\Migrations\\TbPenerimaanBarang', 'default', 'App', 1705300263, 1),
(148, '2023-10-22-020328', 'App\\Database\\Migrations\\TbPengeluaranBarang', 'default', 'App', 1705300263, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) UNSIGNED NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `id_kategori`, `stok`, `id_satuan`, `kondisi`, `created_at`, `updated_at`) VALUES
(1, 'Kecap', 2, 90, 1, 'Baik', '2024-01-15 06:35:08', '2024-01-17 05:32:51'),
(2, 'Matras', 3, 50, 1, 'Baik', '2024-01-15 06:35:38', '2024-01-15 06:37:21'),
(3, 'Tenda', 3, 0, 1, 'Baik', '2024-01-15 06:36:05', '2024-01-15 06:36:05'),
(4, 'Mie Instan', 2, 0, 1, 'Baik', '2024-01-15 06:36:22', '2024-01-15 06:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sandang'),
(2, 'Pangan'),
(3, 'Perlengkapan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerimaan`
--

CREATE TABLE `tb_penerimaan` (
  `id_penerimaan` int(11) UNSIGNED NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_penerimaan`
--

INSERT INTO `tb_penerimaan` (`id_penerimaan`, `id_barang`, `jumlah`, `tanggal`, `id_status`, `created_at`, `updated_at`) VALUES
(1, 1, 100, '2024-01-15 00:00:00', 2, '2024-01-15 06:36:58', '2024-01-17 05:35:00'),
(2, 2, 50, '2024-01-15 00:00:00', 2, '2024-01-15 06:37:21', '2024-01-17 05:35:08'),
(3, 1, 40, '2024-01-15 00:00:00', 2, '2024-01-15 06:37:50', '2024-01-17 05:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` int(11) UNSIGNED NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_penerima` varchar(256) DEFAULT NULL,
  `alamat` varchar(256) DEFAULT NULL,
  `jenis_bencana` varchar(256) DEFAULT NULL,
  `keterangan` varchar(256) NOT NULL,
  `gambar` varchar(256) DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `id_barang`, `jumlah`, `tanggal`, `nama_penerima`, `alamat`, `jenis_bencana`, `keterangan`, `gambar`, `id_status`, `created_at`, `updated_at`) VALUES
(1, 1, 50, '2024-01-17', 'Fahrul', 'Subang', 'Rumah Roboh', 'Tersalurkan', '1705469571_ebd737df5314e212e3bf.png', 2, '2024-01-17 05:32:51', '2024-01-17 05:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) UNSIGNED NOT NULL,
  `nama_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `nama_role`) VALUES
(1, 'staff'),
(2, 'kasi'),
(3, 'kabid'),
(4, 'kadis');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) UNSIGNED NOT NULL,
  `nama_satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Pcs'),
(2, 'Dus'),
(3, 'Kaleng');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `nama_status`) VALUES
(1, 'Belum Verifikasi'),
(2, 'Sudah Verifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id_role` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `nama_lengkap`, `password`, `id_role`, `created_at`, `updated_at`) VALUES
(1, 'staff', 'Kunkun', '$2y$10$7hShlvHwustlwmv0JSq.TOAfscdADr4G.6UyEInjstI/xjQDMCPo6', 1, '2023-10-22 14:15:00', '2023-10-22 14:15:00'),
(2, 'kasi', 'H. Nana', '$2y$10$bZT/6CgSFePmDcpddxljZe.odRIoanYnxZ2MmTaFkrpPIjyYS463q', 2, '2023-10-22 14:15:00', '2024-01-17 05:48:49'),
(3, 'kabid', 'Deni', '$2y$10$W2wo0rgQeMfInh8T4S0LaOit0VILS.6YX0JEBX1Lp4EtDEQY/lSFq', 3, '2023-10-22 14:15:00', '2023-10-22 14:15:00'),
(4, 'kadis', 'Deden', '$2y$10$uJWRcv2g/bEN2krVrn3s8uczO4Ano7iluFwKQhJ/YRyz/m..uochO', 4, '2023-10-22 14:15:00', '2023-10-22 14:15:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_penerimaan`
--
ALTER TABLE `tb_penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_penerimaan`
--
ALTER TABLE `tb_penerimaan`
  MODIFY `id_penerimaan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  MODIFY `id_pengeluaran` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
