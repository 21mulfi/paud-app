-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 03:13 PM
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
-- Database: `paud`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id_aktivitas` int(10) NOT NULL,
  `siswa` int(10) NOT NULL COMMENT 'FK ke id siswa',
  `tanggal` date NOT NULL,
  `aktivitas_siswa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`id_aktivitas`, `siswa`, `tanggal`, `aktivitas_siswa`) VALUES
(3, 5, '2024-07-10', 'aktif sekali bund'),
(4, 1, '2024-07-10', 'malesin anaknya'),
(5, 6, '2024-07-10', 'aktif bgt bund'),
(6, 1, '2024-07-10', 'cek ombak'),
(7, 5, '2024-07-10', 'ingfo kegiatan negatif'),
(8, 6, '2024-07-10', 'ingfo diterima'),
(9, 1, '2024-07-11', 'asd'),
(10, 7, '2024-07-11', 'selamat anak ana menjadi wibu'),
(11, 8, '2024-07-11', 'Hari ini belajar menulis\r\nyans sudha bisa mencoret coret');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_aktivitas`
--

CREATE TABLE `detail_aktivitas` (
  `id` int(10) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `id_siswa` int(10) NOT NULL COMMENT 'FK ke id_siswa',
  `tanggal` date NOT NULL,
  `perkembangan_kognitif` varchar(255) NOT NULL,
  `perkembangan_montorik` varchar(255) NOT NULL,
  `perkembangan_sosial` varchar(255) NOT NULL,
  `catatan_harian` text NOT NULL,
  `penilai` int(10) NOT NULL COMMENT 'FK ke id_guru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_orangtua`
--

CREATE TABLE `group_orangtua` (
  `id` int(10) NOT NULL,
  `nama_group` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_kelas` int(10) NOT NULL COMMENT 'FK ke id_kelas - tbl_kelas',
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`, `id_kelas`, `tanggal_lahir`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(3, 'mulfi', 1, '1999-01-10', 'cimahi', '089766543364', '2024-07-10 07:21:36', '2024-07-11 04:34:35'),
(4, 'alex', 4, '2024-02-13', 'jl kebonjati', '11111122222', '2024-07-11 04:48:01', '2024-07-11 04:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `kapasitas_maks` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kapasitas_maks`, `created_at`, `updated_at`) VALUES
(1, 'mawar', '10', NULL, NULL),
(3, 'aman', '10', NULL, NULL),
(4, 'melati', '10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(31, '0001_01_01_000000_create_users_table', 1),
(32, '0001_01_01_000001_create_cache_table', 1),
(33, '0001_01_01_000002_create_jobs_table', 1),
(34, '2024_06_21_190643_existing_tables', 1),
(35, '2024_06_22_093948_tbl_aktivitas', 1),
(36, '2024_06_22_094016_tbl_detail_aktivitas', 1),
(37, '2024_06_22_094047_tbl_group_orang_tua', 1),
(38, '2024_06_22_094102_tbl_guru', 1),
(39, '2024_06_22_094109_tbl_kelas', 1),
(40, '2024_06_22_094117_tbl_siswa', 1),
(41, '2024_06_22_094143_tbl_orangtua', 1),
(42, '2024_06_22_094215_tbl_pendaftaran', 1),
(43, '2024_06_22_094231_tbl_pengguna', 1),
(44, '2024_06_22_094254_tbl_pengumuman', 1),
(45, '2024_06_22_094626_tbl_pembayaran', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orangtua`
--

CREATE TABLE `orangtua` (
  `id_orangtua` int(10) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `no_telp_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `no_telp_ibu` varchar(100) NOT NULL,
  `group_orang_tua` int(10) DEFAULT NULL COMMENT 'Fk ke di Group orang tua',
  `id_pendaftaran` int(10) DEFAULT NULL COMMENT 'Fk ke id_pendaftaran'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orangtua`
--

INSERT INTO `orangtua` (`id_orangtua`, `alamat`, `nama_ayah`, `no_telp_ayah`, `nama_ibu`, `no_telp_ibu`, `group_orang_tua`, `id_pendaftaran`) VALUES
(1, 'bandung', 'harun', '089765432988', 'firsta', '087964567866', NULL, NULL),
(4, 'cimahi', 'harun x', '089765432988', 'firsta x', '087964567866', NULL, NULL),
(5, 'bandung', 'harun y', '089765432988', 'firsta y', '087964567866', NULL, NULL),
(6, 'cimahi', 'harun z', '089765432988', 'firsta z', '087964567866', NULL, NULL),
(7, 'jl. bancey', 'harun', '123456788', 'firsta', '1234567899', NULL, NULL),
(8, 'jl. sindang', 'asep', '1223334455', 'clara', '1234555677', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL COMMENT 'FK ke id siswa',
  `nama_siswa` varchar(255) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `jumlah_pembayaran` int(100) NOT NULL,
  `mulai_bulan` date NOT NULL,
  `sampai_bulan` date NOT NULL,
  `tahun_pembayaran` int(10) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(10) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `telp_ayah` varchar(30) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `telp_ibu` varchar(30) NOT NULL,
  `sumber_info` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `approve` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `agama`, `nama_ayah`, `telp_ayah`, `nama_ibu`, `telp_ibu`, `sumber_info`, `catatan`, `approve`, `created_at`, `updated_at`) VALUES
(4, 'ucup sky', 'bandung', '2024-07-10', 'Laki-laki', 'jl. bancey', 'islam', 'harun', '123456788', 'firsta', '1234567899', 'iklan', 'anak saya suka anime', NULL, '2024-07-11 04:27:50', '2024-07-11 04:27:50'),
(5, 'ucup sky', 'bandung', '2024-07-10', 'Laki-laki', 'jl. bancey', 'islam', 'harun', '123456788', 'firsta', '1234567899', 'iklan', 'anak saya suka anime', NULL, '2024-07-11 04:27:58', '2024-07-11 04:27:58'),
(6, 'yans', 'tokyo', '2024-07-03', 'Laki-laki', 'jl. sindang', 'islam', 'asep', '1223334455', 'clara', '1234555677', 'sosmed', 'anak saya kpop dari lahir', NULL, '2024-07-11 04:44:07', '2024-07-11 04:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(10) NOT NULL,
  `pengirim` int(10) NOT NULL COMMENT 'FK ke id guru',
  `penerima` int(10) NOT NULL COMMENT 'FK ke id orang tua',
  `judul` varchar(255) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rUhg5zezahbstvInTLdgExmA3TiPPHhO2W3mUjiK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQThIWTVnVXB4b09QdUU0bnI1R2FxaHNCMjcza3FZVjI5N3hTWUF2YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1721046767);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `id_orangtua` int(10) DEFAULT NULL COMMENT 'FK ke id orang tua',
  `id_kelas` int(10) DEFAULT NULL COMMENT 'fk ke id kelas',
  `id_pendaftaran` int(10) DEFAULT NULL COMMENT 'Fk ke id_pendaftaran'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `agama`, `catatan`, `id_orangtua`, `id_kelas`, `id_pendaftaran`) VALUES
(1, 'rayan', '2024-07-01', 'bandung', 'Laki-laki', 'islam', 'aktif', 5, 3, NULL),
(5, 'fatih', '2024-06-25', 'bandung', 'Laki-laki', 'islam', 'pendiam', 5, 3, NULL),
(6, 'neo', '2024-07-02', 'cimahi', 'Laki-laki', 'islam', 'aneh', 6, 3, NULL),
(7, 'ucup sky', '2024-07-10', 'jl. bancey', 'Laki-laki', 'islam', 'anak saya suka anime', 1, 1, NULL),
(8, 'yans', '2024-07-03', 'jl. sindang', 'Laki-laki', 'islam', 'anak saya suka baca quran', 8, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `gender`) VALUES
(3, 'Yana Rayana', 'yana@gmail.com', NULL, '$2y$12$yMxWO1VoJoTE8p7wiTF8aeJGRzsdinuvKrspq12eZ100bIQXf42my', NULL, '2024-06-30 00:42:11', '2024-07-01 06:58:31', 'admin', 'Perempuan'),
(4, 'Harun Mubarok', 'harun@gmail.com', NULL, '$2y$12$zwcd9yWi6DxLfpU5o.OkBOOGTWQVHny4XFQ6jz3FcIzDBZYdRTY9G', NULL, '2024-07-01 06:58:15', '2024-07-01 06:58:15', 'guru', 'laki-laki'),
(5, 'admin', 'admin@gmail.com', NULL, '$2y$12$8lKE2I2h9mGKgHCqbhLNzeGesQOxSYswnHT/hbdAuB8gMVVSvJJ/C', NULL, '2024-07-09 06:37:27', '2024-07-09 06:37:27', 'admin', 'Laki-laki'),
(6, 'mulfi', 'mulfi@gmail.com', NULL, '$2y$12$GaU8pxakS4EfbBEDtMMkrusIQsiwqc9DvMh61xqAqVl8.7calWvRW', NULL, '2024-07-10 07:22:13', '2024-07-10 07:22:13', 'guru', 'Laki-laki'),
(9, 'firsta', 'firsta@gmail.com', NULL, '$2y$12$ukiRbisreOPClPfpZf4GXuxcpHEdcTviBM1TivLT37PxNY4hRmS5O', NULL, '2024-07-11 04:31:25', '2024-07-11 04:31:25', 'orangtua', 'Perempuan'),
(10, 'alex', 'alex@gmail.com', NULL, '$2y$12$NMsnz8Ep9YWMQm.kYwXEcuTCrLfcJmKowM5xcDGxMJVQlUSn1FklC', NULL, '2024-07-11 04:49:54', '2024-07-11 04:49:54', 'guru', 'Laki-laki'),
(11, 'clara', 'clara@gmail.com', NULL, '$2y$12$U2ignPIM0MbqBYlYjTgCpu5c3v6AwnumtcSfUfMF4pWBj/laXdsjm', NULL, '2024-07-11 04:51:01', '2024-07-11 04:51:01', 'orangtua', 'Perempuan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`),
  ADD KEY `tbl_aktivitas_ibfk_1` (`siswa`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `detail_aktivitas`
--
ALTER TABLE `detail_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `tbl_detail_aktivitas_ibfk_2` (`penilai`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `group_orangtua`
--
ALTER TABLE `group_orangtua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`id_orangtua`),
  ADD KEY `Group_orang_tua` (`group_orang_tua`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `Siswa` (`id_siswa`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `Pengirim` (`pengirim`),
  ADD KEY `Penerima` (`penerima`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `Orang_tua` (`id_orangtua`),
  ADD KEY `Kelas` (`id_kelas`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id_aktivitas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_orangtua`
--
ALTER TABLE `group_orangtua`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_orangtua` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD CONSTRAINT `aktivitas_ibfk_1` FOREIGN KEY (`siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `detail_aktivitas`
--
ALTER TABLE `detail_aktivitas`
  ADD CONSTRAINT `detail_aktivitas_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `detail_aktivitas_ibfk_2` FOREIGN KEY (`penilai`) REFERENCES `guru` (`id_guru`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD CONSTRAINT `orangtua_ibfk_1` FOREIGN KEY (`group_orang_tua`) REFERENCES `group_orangtua` (`id`),
  ADD CONSTRAINT `orangtua_ibfk_2` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`pengirim`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `pengumuman_ibfk_2` FOREIGN KEY (`penerima`) REFERENCES `orangtua` (`id_orangtua`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_orangtua`) REFERENCES `orangtua` (`id_orangtua`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
