-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 01:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rev_web_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_habis`
--

CREATE TABLE `barang_habis` (
  `habis_id` int(11) NOT NULL,
  `habis_namabarang` varchar(255) NOT NULL,
  `habis_sudahdibeli` tinyint(1) DEFAULT 0,
  `habis_date` date NOT NULL,
  `habis_catatan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_habis`
--

INSERT INTO `barang_habis` (`habis_id`, `habis_namabarang`, `habis_sudahdibeli`, `habis_date`, `habis_catatan`, `created_at`, `updated_at`) VALUES
(1, 'buku', 0, '2022-12-08', 'belom dibeli ya 0', '2022-12-25 05:00:09', '2022-12-25 05:07:48'),
(4, 'kayu bakar', 0, '2022-12-01', 'korek gas', '2022-12-26 17:34:58', '2022-12-26 17:34:58'),
(5, 'keramik', 1, '2022-12-09', 'lantai', '2022-12-26 17:35:40', '2022-12-26 17:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `hutang_pelanggan`
--

CREATE TABLE `hutang_pelanggan` (
  `hutang_id` int(11) NOT NULL,
  `hutang_nama` varchar(255) NOT NULL,
  `hutang_alamat` varchar(255) NOT NULL,
  `hutang_telp` varchar(15) DEFAULT NULL,
  `hutang_date` date NOT NULL,
  `hutang_nominal` bigint(20) NOT NULL,
  `hutang_catatan` varchar(255) DEFAULT NULL,
  `hutang_islunas` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hutang_pelanggan`
--

INSERT INTO `hutang_pelanggan` (`hutang_id`, `hutang_nama`, `hutang_alamat`, `hutang_telp`, `hutang_date`, `hutang_nominal`, `hutang_catatan`, `hutang_islunas`, `created_at`, `updated_at`) VALUES
(1, 'pelanggan 1', 'wedoro', '08492348293', '2022-12-14', 2000000, 'beli permen', 0, NULL, NULL),
(4, '', 'wedoro', '', '2022-11-29', 2000000, '', 1, '2022-12-26 07:20:59', '2022-12-26 07:20:59'),
(5, 'bertemankan', 'oiajfe', '', '2022-11-30', 4155000, '', 1, '2022-12-26 07:21:37', '2022-12-26 07:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `item_notapembelian`
--

CREATE TABLE `item_notapembelian` (
  `itemnota_id` int(11) NOT NULL,
  `itemnota_notaid` int(11) NOT NULL,
  `itemnota_date` date DEFAULT NULL,
  `itemnota_namabarang` varchar(255) NOT NULL,
  `itemnota_jumlahbarang` varchar(255) NOT NULL,
  `itemnota_nominaltransaksi` bigint(20) NOT NULL,
  `itemnota_catatan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_notapembelian`
--

INSERT INTO `item_notapembelian` (`itemnota_id`, `itemnota_notaid`, `itemnota_date`, `itemnota_namabarang`, `itemnota_jumlahbarang`, `itemnota_nominaltransaksi`, `itemnota_catatan`, `created_at`, `updated_at`) VALUES
(1, 979, '2022-12-07', 'bedak', '3 dus', 2000000, 'bedak warna putih', NULL, NULL),
(2, 7996, NULL, '', '', 0, NULL, NULL, NULL),
(3, 67654, NULL, 'nasi bakar', '3 bungkus', 1000000, 'helo bandung', NULL, NULL),
(4, 0, NULL, '', '', 0, NULL, NULL, NULL),
(5, 1, '0000-00-00', 'asdd', 'asda', 1000, '', '2022-12-26 02:52:12', '2022-12-26 02:52:12'),
(7, 1, '0000-00-00', 'qwerg', '2', 9223372036854775807, 'sendiri', '2022-12-26 03:01:13', '2022-12-26 03:59:00'),
(9, 2, '0000-00-00', 'oi9hdurg', 'rfedsa', 3000000, '', '2022-12-26 07:59:29', '2022-12-26 07:59:43'),
(11, 2, '2022-12-21', 'NASI PADANG', '4 plastik', 2345000, 'KUmpulan nasi padd', '2022-12-26 08:43:57', '2022-12-26 11:13:47'),
(12, 2, '2022-12-15', 'padang', '4 plastik', 1234000, 'nasi padangggg', '2022-12-26 09:40:37', '2022-12-26 11:10:25'),
(13, 5, '2022-12-01', 'kojihu', 'koj', 567890000, '', '2022-12-26 17:53:50', '2022-12-26 17:53:50'),
(14, 5, '2022-12-09', 'kukukukukuk', 'babababab', 70000000, '', '2022-12-26 17:54:08', '2022-12-26 17:54:38'),
(16, 5, '2022-12-10', 'kayu', '4', 5000000, '', '2022-12-26 20:07:52', '2022-12-26 20:07:52'),
(17, 5, '2022-12-09', 'kebab', 'kebab', 32000000, 'kebab', '2022-12-26 20:08:18', '2022-12-26 20:08:18'),
(18, 11, '2023-01-13', 'okjin', 'oij', 23452000, 'oij', '2023-01-23 22:17:56', '2023-01-23 22:17:56'),
(19, 11, '2023-01-14', 'jihuyu', 'iu', 23500000, '', '2023-01-23 22:20:28', '2023-01-23 22:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `nota_pelanggan`
--

CREATE TABLE `nota_pelanggan` (
  `notapel_id` int(11) NOT NULL,
  `notapel_date` date DEFAULT NULL,
  `notapel_namapelanggan` varchar(255) DEFAULT NULL,
  `notapel_ismain` tinyint(1) NOT NULL DEFAULT 0,
  `subnotapel_idstokbarang` int(11) DEFAULT NULL,
  `subnotapel_namabarang` varchar(255) DEFAULT NULL,
  `subnotapel_jumlahpembelian` int(11) DEFAULT 1,
  `subnotapel_notapelid` int(11) DEFAULT NULL,
  `subnotapel_totalharga` bigint(20) DEFAULT 0,
  `notapel_grandtotal` bigint(20) DEFAULT 0,
  `notapel_catatan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nota_pembelian`
--

CREATE TABLE `nota_pembelian` (
  `nota_id` int(11) NOT NULL,
  `nota_date` date NOT NULL,
  `nota_tempatbeli` varchar(255) NOT NULL,
  `nota_catatan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota_pembelian`
--

INSERT INTO `nota_pembelian` (`nota_id`, `nota_date`, `nota_tempatbeli`, `nota_catatan`, `created_at`, `updated_at`) VALUES
(1, '2022-12-02', 'grosir', 'nota 1', '2022-12-25 22:00:07', '2022-12-25 22:03:25'),
(2, '2022-12-07', 'grosir 2', 'nota 2', '2022-12-25 22:03:51', '2022-12-25 22:03:51'),
(5, '2022-11-30', 'parap', '', '2022-12-26 17:53:27', '2022-12-26 17:53:27'),
(6, '2023-01-12', 'jakarta', 'oaisdjf', '2023-01-19 07:12:59', '2023-01-19 07:12:59'),
(7, '2023-01-26', 'coba', 'cobacoba\r\n', '2023-01-23 21:42:12', '2023-01-23 21:42:12'),
(8, '2023-01-06', 'bersama', 'bersama', '2023-01-23 22:11:04', '2023-01-23 22:11:04'),
(9, '2023-01-06', 'bersama', 'bersama', '2023-01-23 22:12:00', '2023-01-23 22:12:00'),
(10, '2022-12-09', 'lama', 'lama', '2023-01-23 22:14:14', '2023-01-23 22:14:14'),
(11, '2022-12-01', 'ro', 'ror', '2023-01-23 22:17:24', '2023-01-23 22:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `omzet_harian`
--

CREATE TABLE `omzet_harian` (
  `omzet_id` int(11) NOT NULL,
  `omzet_date` date NOT NULL,
  `omzet_nominal` bigint(20) NOT NULL,
  `omzet_catatan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `omzet_harian`
--

INSERT INTO `omzet_harian` (`omzet_id`, `omzet_date`, `omzet_nominal`, `omzet_catatan`, `created_at`, `updated_at`) VALUES
(2, '2022-10-01', 10000000, '1 oktober', NULL, NULL),
(5, '2022-12-07', 2000, 'UNTUKUPPhu', '2022-12-24 19:12:17', '2023-01-24 04:55:47'),
(6, '2022-12-13', 1000, '', '2022-12-26 04:07:33', '2022-12-26 04:13:37'),
(8, '2022-12-03', 54000000, '', '2022-12-26 17:22:58', '2022-12-26 17:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE `stok_barang` (
  `stok_id` int(11) NOT NULL,
  `stok_jumlah` int(11) NOT NULL DEFAULT 0,
  `stok_namabarang` varchar(255) NOT NULL,
  `stok_satuan` varchar(255) DEFAULT NULL,
  `stok_harga` bigint(20) NOT NULL,
  `stok_deskripsi` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`stok_id`, `stok_jumlah`, `stok_namabarang`, `stok_satuan`, `stok_harga`, `stok_deskripsi`, `created_at`, `updated_at`) VALUES
(1, 888, 'buku', 'satuan', 15000, 'adalah sebuah barang buku', '2023-01-24 04:34:19', '2023-01-24 04:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_contact`
--

CREATE TABLE `supplier_contact` (
  `supp_id` int(11) NOT NULL,
  `supp_nama` varchar(255) NOT NULL,
  `supp_jenisproduk` varchar(255) DEFAULT NULL,
  `supp_namaproduk` varchar(255) DEFAULT NULL,
  `supp_catatanproduk` varchar(255) DEFAULT NULL,
  `supp_nomorwa` varchar(15) DEFAULT NULL,
  `supp_telp1` varchar(15) DEFAULT NULL,
  `supp_telp2` varchar(15) DEFAULT NULL,
  `supp_catatantambahan` varchar(255) DEFAULT NULL,
  `supp_alamat` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_contact`
--

INSERT INTO `supplier_contact` (`supp_id`, `supp_nama`, `supp_jenisproduk`, `supp_namaproduk`, `supp_catatanproduk`, `supp_nomorwa`, `supp_telp1`, `supp_telp2`, `supp_catatantambahan`, `supp_alamat`, `created_at`, `updated_at`) VALUES
(1, 'john', 'minuman', 'aqua', 'bersih', '08258664476', '421', '0841', 'cleo orange dengan kemasan dan diantar dengan truk dari semalam hingga minggu depan', 'jalan mahemayo', '2022-12-25 09:52:40', '2022-12-26 17:40:50'),
(4, 'Eko SutiDJO', 'cleo', 'air', '', '1238', '87654321', '', '', 'jakarta', '2022-12-26 17:38:52', '2022-12-26 17:38:52'),
(7, 'njuhygtfc vnjko', '', '', '', '', '', '', '', '', '2022-12-26 17:44:20', '2022-12-26 17:44:20'),
(8, 'dedi', 'buku', 'kertas', 'kertas buku', '08091283', '', '', '', '', '2023-01-24 00:11:00', '2023-01-24 00:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(10) NOT NULL,
  `user_isowner` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_isowner`, `created_at`, `updated_at`) VALUES
(2, 'jika', 'jika', 0, '2022-12-22 17:26:46', '2022-12-22 17:26:46'),
(3, 'ononno', 'kau', 0, '2022-12-22 17:46:27', '2022-12-22 21:06:51'),
(6, 'madara', 'madara', 1, '2022-12-23 08:13:58', '2022-12-23 08:13:58'),
(8, 'yuyu', 'jika', 1, '2022-12-26 04:06:28', '2022-12-26 04:06:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_habis`
--
ALTER TABLE `barang_habis`
  ADD PRIMARY KEY (`habis_id`);

--
-- Indexes for table `hutang_pelanggan`
--
ALTER TABLE `hutang_pelanggan`
  ADD PRIMARY KEY (`hutang_id`);

--
-- Indexes for table `item_notapembelian`
--
ALTER TABLE `item_notapembelian`
  ADD PRIMARY KEY (`itemnota_id`);

--
-- Indexes for table `nota_pelanggan`
--
ALTER TABLE `nota_pelanggan`
  ADD PRIMARY KEY (`notapel_id`);

--
-- Indexes for table `nota_pembelian`
--
ALTER TABLE `nota_pembelian`
  ADD PRIMARY KEY (`nota_id`);

--
-- Indexes for table `omzet_harian`
--
ALTER TABLE `omzet_harian`
  ADD PRIMARY KEY (`omzet_id`);

--
-- Indexes for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`stok_id`);

--
-- Indexes for table `supplier_contact`
--
ALTER TABLE `supplier_contact`
  ADD PRIMARY KEY (`supp_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_habis`
--
ALTER TABLE `barang_habis`
  MODIFY `habis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hutang_pelanggan`
--
ALTER TABLE `hutang_pelanggan`
  MODIFY `hutang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_notapembelian`
--
ALTER TABLE `item_notapembelian`
  MODIFY `itemnota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nota_pelanggan`
--
ALTER TABLE `nota_pelanggan`
  MODIFY `notapel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nota_pembelian`
--
ALTER TABLE `nota_pembelian`
  MODIFY `nota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `omzet_harian`
--
ALTER TABLE `omzet_harian`
  MODIFY `omzet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `stok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier_contact`
--
ALTER TABLE `supplier_contact`
  MODIFY `supp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
