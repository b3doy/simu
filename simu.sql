-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 02:57 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simu`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `no_akun` varchar(55) NOT NULL,
  `nama_konsumen` varchar(155) NOT NULL,
  `telpon` varchar(55) NOT NULL,
  `tanggal` datetime NOT NULL,
  `no_ba` text DEFAULT NULL,
  `simpan` float(10,2) DEFAULT NULL,
  `ambil` float(10,2) DEFAULT NULL,
  `saldo` float(10,2) DEFAULT NULL,
  `sisa_os` float(10,2) DEFAULT NULL,
  `angsuran_ke` varchar(55) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `konsumen_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `no_akun`, `nama_konsumen`, `telpon`, `tanggal`, `no_ba`, `simpan`, `ambil`, `saldo`, `sisa_os`, `angsuran_ke`, `keterangan`, `konsumen_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '18071304-0001', 'Marko', '089908990899', '2021-08-12 00:00:00', '0001', 850000.00, 850000.00, 0.00, 3150000.00, '1', 'DP + Angsuran Ke-1', 1, '2021-08-12 10:54:05', '2021-08-12 10:54:05', NULL),
(2, '18071304-0002', 'Andri', '08789234567', '2021-08-12 00:00:00', '0001', 650000.00, 650000.00, 0.00, 9100000.00, '1', 'Angsuran Ke-1', 2, '2021-08-12 10:54:30', '2021-08-12 10:54:30', NULL),
(4, '18071304-0003', 'Asep', '081923475890', '2021-08-12 00:00:00', '0001', 300000.00, 300000.00, 0.00, 3300000.00, '1', 'Angsuran Ke-1', 3, '2021-08-12 11:30:02', '2021-08-12 11:30:02', NULL),
(5, '18071304-0001', 'Marko', '089908990899', '2021-08-13 00:00:00', '0002', 400000.00, 350000.00, 50000.00, 2800000.00, '2', 'Simpan untuk angsuran ke 2', 1, '2021-08-12 13:08:16', '2021-08-12 13:08:16', NULL),
(6, '18071304-0004', 'Dayat', '088811112222', '2021-08-13 00:00:00', '0002', 250000.00, 250000.00, 0.00, 2750000.00, '1', 'Angsuran Ke-1', 4, '2021-08-12 23:07:07', '2021-08-12 23:07:07', NULL),
(7, '18071304-0005', 'Sumarno', '088899911123', '2021-08-13 00:00:00', '0002', 200000.00, 200000.00, 0.00, 1800000.00, '1', 'Angsuran Ke-1', 5, '2021-08-12 23:09:16', '2021-08-12 23:09:16', NULL),
(8, '18071304-0006', 'Suminta', '087654321098', '2021-08-13 00:00:00', '0002', 260000.00, 260000.00, 0.00, 2860000.00, '1', 'Angsuran Ke-1', 6, '2021-08-12 23:23:54', '2021-08-12 23:23:54', NULL),
(9, '18071304-0002', 'Andri', '08789234567', '2021-08-13 00:00:00', '0002', 500000.00, 0.00, 500000.00, 9100000.00, '1', 'Nabung Buat Angsuran ', 2, '2021-08-12 23:25:30', '2021-08-12 23:25:30', NULL),
(10, '18071304-0003', 'Asep', '081923475890', '2021-08-13 00:00:00', '0002', 150000.00, 0.00, 150000.00, 3300000.00, '1', 'Nabung Buat Angsuran  ', 3, '2021-08-12 23:26:21', '2021-08-12 23:26:21', NULL),
(11, '18071304-0002', 'Andri', '08789234567', '2021-08-13 00:00:00', '0003', 150000.00, 650000.00, 0.00, 8450000.00, '2', 'Lunas Angsuran ke 2', 2, '2021-08-12 23:28:38', '2021-08-12 23:28:38', NULL),
(12, '18071304-0003', 'Asep', '081923475890', '2021-08-13 00:00:00', '0003', 200000.00, 300000.00, 50000.00, 3000000.00, '2', 'Lunas Angsuran ke 2, Ambil dari Tabungan 100.000', 3, '2021-08-12 23:30:37', '2021-08-12 23:30:37', NULL),
(13, '18071304-0001', 'Marko', '089908990899', '2021-08-13 00:00:00', '0003', 300000.00, 350000.00, 0.00, 2450000.00, '3', 'Lunas Angsuran ke 3, Ambil saldo 50.000', 1, '2021-08-12 23:32:07', '2021-08-12 23:32:07', NULL),
(14, '18071304-0007', 'Roy', '085708570857', '2021-08-13 00:00:00', '0002', 375000.00, 375000.00, 0.00, 4125000.00, '1', 'Angsuran Ke-1', 7, '2021-08-12 23:44:00', '2021-08-12 23:44:00', NULL),
(15, '18071304-0007', 'Roy', '085708570857', '2021-08-13 00:00:00', '0002', 250000.00, 0.00, 250000.00, 4125000.00, '1', 'Sebagian Dulu', 7, '2021-08-12 23:46:15', '2021-08-12 23:46:15', NULL),
(16, '18071304-0008', 'Paul', '08765432112', '2021-08-13 00:00:00', '0003', 500000.00, 500000.00, 0.00, 2475000.00, '1', 'DP + Angsuran Ke-1', 8, '2021-08-13 00:31:02', '2021-08-13 00:31:02', NULL),
(17, '18071304-0009', 'Yanto', '082233445566', '2021-08-13 00:00:00', '0003', 550000.00, 550000.00, 0.00, 3850000.00, '1', 'DP + Angsuran Ke-1', 9, '2021-08-13 00:56:33', '2021-08-13 00:56:33', NULL),
(18, '18071304-0004', 'Dayat', '088811112222', '2021-08-13 00:00:00', '0003', 300000.00, 250000.00, 50000.00, 2500000.00, '2', 'Buat Angsuran ke2', 4, '2021-08-13 01:50:45', '2021-08-13 01:50:45', NULL),
(19, '18071304-0011', 'Bagya', '083335557770', '2021-08-13 00:00:00', '0003', 900000.00, 900000.00, 0.00, 800000.00, '1', 'DP + Angsuran Ke-1', 12, '2021-08-13 08:53:59', '2021-08-13 08:53:59', NULL),
(21, '18071304-0012', 'Makmur', '089089089089', '2021-08-17 00:00:00', NULL, 0.00, 0.00, 0.00, 5250000.00, NULL, NULL, 13, '2021-08-17 07:58:13', '2021-08-17 07:58:13', NULL),
(22, '18071304-0012', 'Makmur', '089089089089', '2021-08-17 00:00:00', '0005', 350000.00, 350000.00, 0.00, 4900000.00, '1', 'Angsuran 1', 13, '2021-08-17 07:59:27', '2021-08-17 07:59:27', NULL),
(23, '18071304-0014', 'Albertus', '0888', '2021-08-18 00:00:00', NULL, 0.00, 0.00, 0.00, 1870000.00, NULL, NULL, 15, '2021-08-18 02:20:35', '2021-08-18 02:20:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Owner', 1, '2021-07-03 23:08:11', 0),
(2, '::1', 'Owner', 1, '2021-07-03 23:08:11', 0),
(3, '::1', 'Owner', 1, '2021-07-03 23:08:54', 0),
(4, '::1', 'Admin', 3, '2021-07-03 23:09:08', 0),
(5, '::1', 'Owner', 1, '2021-07-03 23:34:15', 0),
(6, '::1', 'owner', 7, '2021-07-03 23:45:52', 0),
(7, '::1', 'owner', 7, '2021-07-03 23:46:19', 0),
(8, '::1', 'owner', 7, '2021-07-03 23:51:33', 0),
(9, '::1', 'Owner', NULL, '2021-07-03 23:51:47', 0),
(10, '::1', 'admin@mail.com', 8, '2021-07-03 23:55:18', 1),
(11, '::1', 'admin@mail.com', 8, '2021-07-03 23:59:43', 1),
(12, '::1', 'admin@mail.com', 8, '2021-07-04 00:00:40', 1),
(13, '::1', 'admin', NULL, '2021-07-05 18:29:09', 0),
(14, '::1', 'admin@mail.com', 8, '2021-07-05 18:29:49', 1),
(15, '::1', 'admin@mail.com', 8, '2021-07-05 18:31:29', 1),
(16, '::1', 'admin', NULL, '2021-07-05 18:33:55', 0),
(17, '::1', 'admin@mail.com', 8, '2021-07-05 18:34:04', 1),
(18, '::1', 'admin@mail.com', 8, '2021-07-05 18:36:54', 1),
(19, '::1', 'admin@mail.com', 8, '2021-07-05 18:38:18', 1),
(20, '::1', 'admin', NULL, '2021-07-06 21:52:08', 0),
(21, '::1', 'admin@mail.com', 8, '2021-07-06 21:52:17', 1),
(22, '::1', 'admin@mail.com', 8, '2021-07-11 19:25:54', 1),
(23, '::1', 'admin@mail.com', 8, '2021-07-11 20:41:19', 1),
(24, '::1', 'admin@mail.com', 8, '2021-07-20 20:55:09', 1),
(25, '::1', 'admin@mail.com', 8, '2021-07-21 21:35:50', 1),
(26, '::1', 'admin@mail.com', 8, '2021-07-24 00:51:42', 1),
(27, '::1', 'admin@mail.com', 8, '2021-07-24 21:25:42', 1),
(28, '::1', 'admin@mail.com', 8, '2021-07-27 11:46:14', 1),
(29, '::1', 'admin@mail.com', 8, '2021-07-28 01:39:03', 1),
(30, '::1', 'admin@mail.com', 8, '2021-07-28 21:27:29', 1),
(31, '::1', 'admin@mail.com', 8, '2021-07-31 05:26:50', 1),
(32, '::1', 'admin@mail.com', 8, '2021-08-01 08:10:12', 1),
(33, '::1', 'admin@mail.com', 8, '2021-08-01 21:37:59', 1),
(34, '::1', 'admin@mail.com', 8, '2021-08-02 07:57:56', 1),
(35, '::1', 'admin@mail.com', 8, '2021-08-04 20:37:10', 1),
(36, '::1', 'admin@mail.com', 8, '2021-08-04 21:29:52', 1),
(37, '::1', 'admin@mail.com', 8, '2021-08-06 23:01:27', 1),
(38, '::1', 'admin@mail.com', 8, '2021-08-07 00:38:21', 1),
(39, '::1', 'admin@mail.com', 8, '2021-08-07 00:40:33', 1),
(40, '::1', 'admin@mail.com', 8, '2021-08-07 01:13:08', 1),
(41, '::1', 'admin@mail.com', 8, '2021-08-07 04:39:27', 1),
(42, '::1', 'admin@mail.com', 8, '2021-08-08 20:29:35', 1),
(43, '::1', 'owner@mail.com', 9, '2021-08-08 21:21:15', 1),
(44, '::1', 'admin@mail.com', 8, '2021-08-08 21:40:09', 1),
(45, '::1', 'owner@mail.com', 9, '2021-08-08 21:41:59', 1),
(46, '::1', 'owner@mail.com', 9, '2021-08-08 21:50:10', 1),
(47, '::1', 'owner@mail.com', 9, '2021-08-08 22:21:12', 1),
(48, '::1', 'owner@mail.com', 9, '2021-08-08 22:43:33', 1),
(49, '::1', 'owner@mail.com', 9, '2021-08-08 22:59:22', 1),
(50, '::1', 'owner@mail.com', 9, '2021-08-09 07:41:52', 1),
(51, '::1', 'owner@mail.com', 9, '2021-08-09 17:51:18', 1),
(52, '::1', 'owner@mail.com', 9, '2021-08-10 09:00:46', 1),
(53, '::1', 'admin@mail.com', 8, '2021-08-10 10:58:17', 1),
(54, '::1', 'owner@mail.com', 9, '2021-08-10 11:05:29', 1),
(55, '::1', 'admin@mail.com', 8, '2021-08-10 11:34:50', 1),
(56, '::1', 'owner@mail.com', 9, '2021-08-10 21:03:27', 1),
(57, '::1', 'admin', NULL, '2021-08-10 21:04:23', 0),
(58, '::1', 'admin', NULL, '2021-08-10 21:04:36', 0),
(59, '::1', 'admin', NULL, '2021-08-10 21:04:48', 0),
(60, '::1', 'admin', NULL, '2021-08-10 21:05:06', 0),
(61, '::1', 'admin@mail.com', 8, '2021-08-10 21:05:58', 1),
(62, '::1', 'admin@mail.com', 8, '2021-08-10 23:32:31', 1),
(63, '::1', 'owner@mail.com', 9, '2021-08-11 23:12:33', 1),
(64, '::1', 'owner@mail.com', 9, '2021-08-12 09:09:58', 1),
(65, '::1', 'owner@mail.com', 9, '2021-08-12 18:36:24', 1),
(66, '::1', 'owner@mail.com', 9, '2021-08-13 07:46:16', 1),
(67, '::1', 'owner@mail.com', 9, '2021-08-13 09:41:40', 1),
(68, '::1', 'owner@mail.com', 9, '2021-08-13 20:04:39', 1),
(69, '::1', 'owner@mail.com', 9, '2021-08-14 23:12:38', 1),
(70, '::1', 'owner@mail.com', 9, '2021-08-16 10:57:38', 1),
(71, '::1', 'owner@mail.com', 9, '2021-08-16 22:00:11', 1),
(72, '::1', 'owner@mail.com', 9, '2021-08-17 05:30:21', 1),
(73, '::1', 'owner@mail.com', 9, '2021-08-17 21:22:31', 1),
(74, '::1', 'owner@mail.com', 9, '2021-08-19 00:31:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id` int(11) NOT NULL,
  `no_mitra` varchar(255) NOT NULL,
  `nama_konsumen` varchar(155) NOT NULL,
  `no_ktp` bigint(11) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(99) NOT NULL,
  `dp` float(10,2) DEFAULT NULL,
  `angsuran` float(10,2) NOT NULL,
  `tenor` int(11) NOT NULL,
  `os` float(10,2) NOT NULL,
  `total_penjualan` float(10,2) NOT NULL,
  `tanggal_datang` date NOT NULL,
  `tanggal_angsuran1` date NOT NULL,
  `tanggal_angsuran2` date DEFAULT NULL,
  `tanggal_jt` date NOT NULL,
  `skema` varchar(55) NOT NULL,
  `jumlah_barang` varchar(99) NOT NULL,
  `nama_barang1` varchar(255) DEFAULT NULL,
  `merk_barang1` varchar(155) DEFAULT NULL,
  `tipe_barang1` varchar(99) DEFAULT NULL,
  `warna_barang1` varchar(99) DEFAULT NULL,
  `imei1` varchar(155) DEFAULT NULL,
  `nama_barang2` varchar(155) DEFAULT NULL,
  `merk_barang2` varchar(155) DEFAULT NULL,
  `tipe_barang2` varchar(99) DEFAULT NULL,
  `warna_barang2` varchar(99) DEFAULT NULL,
  `imei2` varchar(155) DEFAULT NULL,
  `nama_barang3` varchar(155) DEFAULT NULL,
  `merk_barang3` varchar(155) DEFAULT NULL,
  `tipe_barang3` varchar(99) DEFAULT NULL,
  `warna_barang3` varchar(99) DEFAULT NULL,
  `imei3` varchar(155) DEFAULT NULL,
  `nama_barang4` varchar(255) DEFAULT NULL,
  `deskripsi_barang4` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id`, `no_mitra`, `nama_konsumen`, `no_ktp`, `alamat`, `telpon`, `dp`, `angsuran`, `tenor`, `os`, `total_penjualan`, `tanggal_datang`, `tanggal_angsuran1`, `tanggal_angsuran2`, `tanggal_jt`, `skema`, `jumlah_barang`, `nama_barang1`, `merk_barang1`, `tipe_barang1`, `warna_barang1`, `imei1`, `nama_barang2`, `merk_barang2`, `tipe_barang2`, `warna_barang2`, `imei2`, `nama_barang3`, `merk_barang3`, `tipe_barang3`, `warna_barang3`, `imei3`, `nama_barang4`, `deskripsi_barang4`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '18071304-0001', 'Marko', 3203041212880030, 'Cilaku', '089908990899', 500000.00, 350000.00, 10, 3500000.00, 4000000.00, '2021-08-12', '2021-08-12', NULL, '2022-06-12', 'Skema 1', '1', 'OPPO F16', 'Oppo', 'F16', 'Biru', 'OP666777888PO', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '2021-08-12 00:54:14', '2021-08-12 00:54:14', NULL),
(2, '18071304-0002', 'Andri', 32030310118900090, 'Cibeber', '08789234567', 0.00, 650000.00, 15, 9750000.00, 9750000.00, '2021-08-12', '2021-09-02', NULL, '2022-12-02', 'Skema 2', 'Lebih Dari 3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bahan Bangunan', '1. Keramik 60 x 60 = 100 Dus,\r\n2. Semen 20 Sack,\r\n3. Pasir 1 Engkel\r\n', '2021-08-12 09:29:02', '2021-08-12 09:29:02', NULL),
(3, '18071304-0003', 'Asep', 3203032307840001, 'Cibeber', '081923475890', 0.00, 300000.00, 12, 3600000.00, 3600000.00, '2021-08-12', '2021-08-12', NULL, '2022-08-12', 'Skema 1', '1', 'SAMSUNG A02', 'Samsung', 'A02', 'Hitam', 'SAM0987654127', '', '', '', '', '', '', '', '', '', '', '', '', '2021-08-12 11:29:36', '2021-08-12 11:29:36', NULL),
(4, '18071304-0004', 'Dayat', 3203052909770001, 'Ciranjang', '088811112222', 0.00, 250000.00, 12, 3000000.00, 3000000.00, '2021-07-29', '2021-08-12', NULL, '2022-08-12', 'Skema 2', '1', 'Springbed', 'President', '', 'Putih', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-08-12 11:45:09', '2021-08-12 11:45:09', NULL),
(5, '18071304-0005', 'Sumarno', 3203030507770090, 'Cilaku', '088899911123', 0.00, 200000.00, 10, 2000000.00, 2000000.00, '2021-07-31', '2021-08-12', NULL, '2022-06-12', 'Skema 2', '1', 'Mesin Cuci', 'LG', '', 'Hijau', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-08-12 11:47:41', '2021-08-12 11:48:40', NULL),
(6, '18071304-0006', 'Suminta', 3203030511750001, 'Cilaku', '087654321098', 0.00, 260000.00, 12, 3120000.00, 3120000.00, '2021-08-12', '2021-08-12', NULL, '2022-08-12', 'Skema 1', '1', 'Lemari Es ', 'Sharp', '1 Pintu', 'abu', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-08-12 11:50:31', '2021-08-12 11:50:31', NULL),
(7, '18071304-0007', 'Roy', 3203031311900005, 'Cilaku', '085708570857', 0.00, 375000.00, 12, 4500000.00, 4500000.00, '2021-08-12', '2021-08-13', NULL, '2022-08-13', 'Skema 1', '1', 'Xiaomi mi 11 Pro', 'Xiaomi', 'mi11 pro', 'Hitam', 'xiao887766609890', '', '', '', '', '', '', '', '', '', '', '', '', '2021-08-12 23:43:06', '2021-08-12 23:43:06', NULL),
(8, '18071304-0008', 'Paul', 3203030405850005, 'Cilaku', '08765432112', 275000.00, 225000.00, 12, 2700000.00, 2975000.00, '2021-08-13', '2021-08-13', NULL, '2022-08-13', 'Skema 1', '1', 'LED TV', 'Sony', '50 inch', 'Hitam', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-08-13 00:29:33', '2021-08-13 00:29:33', NULL),
(9, '18071304-0009', 'Yanto', 3203031509810010, 'Cilaku', '082233445566', 200000.00, 350000.00, 12, 4200000.00, 4400000.00, '2021-08-13', '2021-08-13', NULL, '2022-08-13', 'Skema 1', '1', 'OPPO F18', 'Oppo', 'F18', 'Gold', 'Op56663822372po', '', '', '', '', '', '', '', '', '', '', '', '', '2021-08-13 00:43:26', '2021-08-13 00:43:26', NULL),
(11, '18071304-0010', 'Indra', 3203032211880003, 'Cilaku', '088812345678', 0.00, 265000.00, 12, 3180000.00, 3180000.00, '2021-08-13', '2021-08-13', NULL, '2022-08-13', 'Skema 1', '1', 'SAMSUNG M16', 'Samsung', 'M16', 'Hitam', 'SAM098436372988', '', '', '', '', '', '', '', '', '', '', '', '', '2021-08-13 03:13:31', '2021-08-13 03:13:31', NULL),
(12, '18071304-0011', 'Bagya', 3203030303880030, 'Cilaku', '083335557770', 500000.00, 400000.00, 3, 1200000.00, 1700000.00, '2021-08-13', '2021-08-13', NULL, '2021-11-13', 'Skema 1', '1', 'Lemari Pakaian 2 Pintu', '', '', 'Coklat', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-08-13 08:52:51', '2021-08-13 08:52:51', NULL),
(13, '18071304-0012', 'Makmur', 3203032308760001, 'Cibeber', '089089089089', 0.00, 350000.00, 15, 5250000.00, 5250000.00, '2021-08-17', '2021-08-17', '2021-09-26', '2022-10-26', 'Skema 1', '1', 'SAMSUNG M40', 'Samsung', 'M40', 'Hitam', 'SAM08439539873', '', '', '', '', '', '', '', '', '', '', '', '', '2021-08-17 19:18:44', '2021-08-17 19:18:44', NULL),
(14, '18071304-0013', 'Ajat', 3203031809770001, 'Cibeber', '0898765432109', 0.00, 400000.00, 15, 6000000.00, 6000000.00, '2021-08-18', '2021-08-18', '0000-00-00', '2022-10-18', 'Skema 1', '2', 'Lemari Es 2 Pintu', 'Sharp', '', 'Abu', '', 'Mesin Cuci 10 Kg', 'Sharp', '', 'Hijau', '', '', '', '', '', '', '', '', '2021-08-18 10:51:05', '2021-08-18 10:51:05', NULL),
(15, '18071304-0014', 'Albertus', 3203030303830003, 'Cibeber', '0888', 500000.00, 187000.00, 10, 1870000.00, 2370000.00, '2021-08-18', '2021-08-18', '0000-00-00', '2022-05-18', 'Skema 1', '1', 'SMARTPHONE', 'VIVO', 'Y125', 'Hitam', '0874329874983742837', '', '', '', '', '', '', '', '', '', '', '', '', '2021-08-18 14:20:13', '2021-08-18 14:20:13', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1625327123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'admin@mail.com', 'admin', '$2y$10$YaFGXVKNoylj5uTrLDt6r.7tjFZJW/KfH6Np/pipqkW4xfyZgRncC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-07-03 23:55:10', '2021-07-03 23:55:10', NULL),
(9, 'owner@mail.com', 'owner', '$2y$10$qeIvw2rMI862o6hrst2Sa.akfWwk93fJHwvdImGU9sP0a0URFi9Aq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-08 21:21:07', '2021-08-08 21:21:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konsumen_id` (`konsumen_id`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
