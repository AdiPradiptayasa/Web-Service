-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2024 at 11:55 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas-sister`
--

-- --------------------------------------------------------

--
-- Table structure for table `bengkels`
--

CREATE TABLE `bengkels` (
  `id` bigint UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bengkel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bengkels`
--

INSERT INTO `bengkels` (`id`, `foto`, `kategori`, `nama_bengkel`, `deskripsi`, `lokasi`, `jam_buka`, `jam_tutup`, `created_at`, `updated_at`) VALUES
(1, '1720259554.jpg', 'Motor', 'Edie Arta Motor Imam Bonjol', 'Edie Arta Motor adalah perusahaan yang bergerak di bidang penjualan dan servis motor, terutama di daerah Bandung. Mereka dikenal karena menyediakan berbagai jenis motor baru dan bekas dengan harga yang kompetitif, serta menawarkan layanan perbaikan dan pemeliharaan motor. Perusahaan ini juga terkenal dengan reputasi yang baik dalam memberikan layanan pelanggan yang ramah dan profesional.', 'Jl. Hasanudin No.1, Banjar Bali, Kec. Buleleng, Kabupaten Buleleng, Bali 81113', '08:00:00', '20:00:00', '2024-07-06 01:41:48', '2024-07-06 01:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id_bengkel` bigint UNSIGNED NOT NULL,
  `koordinatX` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinatY` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`id_bengkel`, `koordinatX`, `koordinatY`, `created_at`, `updated_at`) VALUES
(1, '-8.107791189727182', '115.08989227941743', '2024-07-06 02:45:44', '2024-07-06 02:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_06_080924_bengkel', 1),
(6, '2024_07_06_080930_map', 1),
(7, '2024_07_06_104129_rename', 2),
(8, '2024_07_06_104433_rename1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'myAppToken', '948958cc068b241c9938eb9a6b3fc0ecd599dfeb671059391532f9dbd1ff9970', '[\"*\"]', NULL, NULL, '2024-07-06 03:02:14', '2024-07-06 03:02:14'),
(2, 'App\\Models\\User', 1, 'myAppToken', 'b67a335e2199d5f510a4c05974f53a60aaa98518c2cf11a0776b857208f8e5ca', '[\"*\"]', NULL, NULL, '2024-07-06 03:04:11', '2024-07-06 03:04:11'),
(3, 'App\\Models\\User', 1, 'myAppToken', 'b4172322b4c65ad720034fdc43207fb6548625887442d9cf512da7e3fe5326aa', '[\"*\"]', '2024-07-06 03:06:28', NULL, '2024-07-06 03:04:31', '2024-07-06 03:06:28'),
(4, 'App\\Models\\User', 1, 'myAppToken', '7e789506092e4ad9fae81372b9cbb88679ac93db6c4cec45994bcc3a2aef287d', '[\"*\"]', NULL, NULL, '2024-07-06 03:16:43', '2024-07-06 03:16:43'),
(5, 'App\\Models\\User', 1, 'myAppToken', '02089e87f6119e314c8cace8415e55cb08a5c84c27ab817566e6d9b87c862be7', '[\"*\"]', '2024-07-06 03:20:13', NULL, '2024-07-06 03:16:52', '2024-07-06 03:20:13'),
(6, 'App\\Models\\User', 1, 'myAppToken', '3f92817f1923d11707109c69bc9640b123c7cebc21fcbab429b0cbdb342bfa71', '[\"*\"]', '2024-07-07 00:14:59', NULL, '2024-07-06 03:26:27', '2024-07-07 00:14:59'),
(7, 'App\\Models\\User', 1, 'myAppToken', 'eae34f27bddd53fb53a7fd8f67c1afba28a3aece252401dca1c0ba2a3b4eaf04', '[\"*\"]', NULL, NULL, '2024-07-07 00:15:33', '2024-07-07 00:15:33'),
(8, 'App\\Models\\User', 1, 'myAppToken', '4232711a445605920107a4bb65355ae76b31e60e77a1f43e54474b8fe589d178', '[\"*\"]', NULL, NULL, '2024-07-07 00:15:38', '2024-07-07 00:15:38'),
(9, 'App\\Models\\User', 1, 'myAppToken', 'b39340eb89fc6a22c1d8dd50b5cd99d1f50df3c29ccce409ab9dd835bec15d5d', '[\"*\"]', NULL, NULL, '2024-07-07 00:15:57', '2024-07-07 00:15:57'),
(10, 'App\\Models\\User', 1, 'myAppToken', 'cb30b957a8af500db5e17c3232e1163205e388f128366f2d71c46e22d146bd07', '[\"*\"]', NULL, NULL, '2024-07-07 00:16:07', '2024-07-07 00:16:07'),
(11, 'App\\Models\\User', 1, 'myAppToken', 'cdec813e26ba1851a3699a556dbc0890e198c8338b8a326be6c855d7388cdfb3', '[\"*\"]', NULL, NULL, '2024-07-07 00:21:16', '2024-07-07 00:21:16'),
(12, 'App\\Models\\User', 1, 'myAppToken', 'd7df56df514903275c29644c90f6ad076229967c67ad41d16255b3045dc65e9c', '[\"*\"]', NULL, NULL, '2024-07-07 00:31:31', '2024-07-07 00:31:31'),
(13, 'App\\Models\\User', 1, 'myAppToken', 'a05859d6c8e6cbee5719ea43f02d420076350c1b98601f82d47ca14ac66bcbc8', '[\"*\"]', NULL, NULL, '2024-07-07 01:49:09', '2024-07-07 01:49:09'),
(14, 'App\\Models\\User', 1, 'myAppToken', '323effc4247bbcd79b5441b5b6f117f968023abb7c8265228cd7a385534a313e', '[\"*\"]', NULL, NULL, '2024-07-07 02:05:28', '2024-07-07 02:05:28'),
(15, 'App\\Models\\User', 1, 'myAppToken', 'cbad5bb2f059a33da1b74a852680cfc6e8d38c806841b66c548197e425233746', '[\"*\"]', NULL, NULL, '2024-07-07 02:18:07', '2024-07-07 02:18:07'),
(16, 'App\\Models\\User', 1, 'myAppToken', '55015df199aad54a522bf0ad79fc3f9116aca61e80c3ac4dcf14d20b95807290', '[\"*\"]', NULL, NULL, '2024-07-07 23:22:02', '2024-07-07 23:22:02'),
(17, 'App\\Models\\User', 1, 'myAppToken', 'aca914ca50118028b67de54e10f042360999a2bf48aade4975e218f016720ce5', '[\"*\"]', NULL, NULL, '2024-07-07 23:24:34', '2024-07-07 23:24:34'),
(18, 'App\\Models\\User', 1, 'myAppToken', '1e447d2c60348d66b100183b48a2dd16e969d13762d5d0d92b599bad0fefc5d5', '[\"*\"]', NULL, NULL, '2024-07-07 23:26:35', '2024-07-07 23:26:35'),
(19, 'App\\Models\\User', 1, 'myAppToken', 'f53dd42875cd5b356cf2fc038bee4382ed224e8bcbed88c0b7d2e48edc6dd521', '[\"*\"]', NULL, NULL, '2024-07-07 23:55:30', '2024-07-07 23:55:30'),
(20, 'App\\Models\\User', 1, 'myAppToken', '14a611f4fbd37a98a4af672e6ed17c562451262a89330600ceb9db8ab43cbab9', '[\"*\"]', NULL, NULL, '2024-07-08 00:00:07', '2024-07-08 00:00:07'),
(21, 'App\\Models\\User', 1, 'myAppToken', 'cdb99c503a91ed361a02b60c4268402a2c4f41f9a8f4ead1bb89b5b580d96722', '[\"*\"]', NULL, NULL, '2024-07-08 00:13:23', '2024-07-08 00:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Haryaka', 'Haryaka@gmail.com', NULL, '$2y$12$OydZi1xU7cL/fATu/.y1BO4k5NUIKgvDh8h3HHNcqoBjP9bdkEg9a', NULL, '2024-07-06 03:02:14', '2024-07-08 01:55:38'),
(2, 'adi', 'adi@gmail.com', NULL, '$2y$12$a4KGV3UCkUyd1J/hPNmAf.kkCkxMpoXq3keUAqqViWyAWBxre5Z2G', NULL, '2024-07-08 01:22:11', '2024-07-08 01:53:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bengkels`
--
ALTER TABLE `bengkels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id_bengkel`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `bengkels`
--
ALTER TABLE `bengkels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id_bengkel` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `maps`
--
ALTER TABLE `maps`
  ADD CONSTRAINT `maps_ibfk_1` FOREIGN KEY (`id_bengkel`) REFERENCES `bengkels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
