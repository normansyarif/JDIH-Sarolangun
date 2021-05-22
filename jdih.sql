-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2021 at 03:28 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisataun_aaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum Dolor', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '1.jpeg', '2021-05-22 08:48:11', NULL),
(2, 'Lorem Ipsum Dolor', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2.jpeg', '2021-05-22 08:48:11', NULL),
(4, 'Lorem Ipsum Dolor', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '3.jpg', '2021-05-22 08:48:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_22_074533_create_news_table', 2),
(5, '2021_05_22_074547_create_peraturan_daerah_table', 2),
(6, '2021_05_22_074601_create_peraturan_bupati_table', 2),
(7, '2021_05_22_074614_create_sk_bupati_table', 2),
(8, '2021_05_22_084501_create_carousel_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Potret Maskapai Mikro yang Mampu Bertahan Selama 75 Tahun', 'Mekah - Syeikh Bandar Al Baleelah hendak diserang oleh seorang pria bertongkat saat menjadi khatib salat Jumat di Masjidil Haram, Mekah, Arab Saudi. Syekh Baleelah sendiri dikenal sebagai salah satu imam di Masjidil Haram.\r\nDikutip dari Manarat Al-Haramain, situs komunikasi pemerintah Arab Saudi, Syeikh Baleelah lahir di Mekah Al-Mukarramah pada tahun 1395 H.\r\n\r\nSyeikh Baleelah menyelesaikan semua jenjang akademiknya di Mekah dan lulus dari Universitas Umm Al-Qura. Dia kemudian memperoleh gelar master di bidang yurisprudensi dari Sekolah Tinggi Syariah dan Kajian Islam pada tahun 1422 H.', '1.jpeg', '2021-05-22 07:53:04', NULL),
(3, 'Wajib Coba Weekend Ini! Daftar Wahana Seru Trans Studio Cibubur', 'Mekah - Syeikh Bandar Al Baleelah hendak diserang oleh seorang pria bertongkat saat menjadi khatib salat Jumat di Masjidil Haram, Mekah, Arab Saudi. Syekh Baleelah sendiri dikenal sebagai salah satu imam di Masjidil Haram.\r\nDikutip dari Manarat Al-Haramain, situs komunikasi pemerintah Arab Saudi, Syeikh Baleelah lahir di Mekah Al-Mukarramah pada tahun 1395 H.\r\n\r\nSyeikh Baleelah menyelesaikan semua jenjang akademiknya di Mekah dan lulus dari Universitas Umm Al-Qura. Dia kemudian memperoleh gelar master di bidang yurisprudensi dari Sekolah Tinggi Syariah dan Kajian Islam pada tahun 1422 H.', '2.jpeg', '2021-05-22 07:53:04', NULL),
(4, 'Hasil Pertemuan BPJS-Kominfo Terkait Kebocoran Data WNI', 'Mekah - Syeikh Bandar Al Baleelah hendak diserang oleh seorang pria bertongkat saat menjadi khatib salat Jumat di Masjidil Haram, Mekah, Arab Saudi. Syekh Baleelah sendiri dikenal sebagai salah satu imam di Masjidil Haram.\r\nDikutip dari Manarat Al-Haramain, situs komunikasi pemerintah Arab Saudi, Syeikh Baleelah lahir di Mekah Al-Mukarramah pada tahun 1395 H.\r\n\r\nSyeikh Baleelah menyelesaikan semua jenjang akademiknya di Mekah dan lulus dari Universitas Umm Al-Qura. Dia kemudian memperoleh gelar master di bidang yurisprudensi dari Sekolah Tinggi Syariah dan Kajian Islam pada tahun 1422 H.', '3.jpeg', '2021-05-22 07:53:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peraturan_bupati`
--

CREATE TABLE `peraturan_bupati` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peraturan_bupati`
--

INSERT INTO `peraturan_bupati` (`id`, `title`, `no`, `year`, `link`, `created_at`, `updated_at`) VALUES
(1, 'PERLINDUNGAN DAN PEMBERDAYAAN BAGI LANJUT USIA DAN PENYANDANG DISABILITAS', '1', '2020', 'file.pdf', '2021-05-22 11:03:39', NULL),
(2, 'PENYELENGGARAAN PENDIDIKAN KEPRAMUKAAN', '2', '2020', 'file.pdf', '2021-05-22 11:03:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `peraturan_daerah`
--

CREATE TABLE `peraturan_daerah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peraturan_daerah`
--

INSERT INTO `peraturan_daerah` (`id`, `title`, `no`, `year`, `link`, `created_at`, `updated_at`) VALUES
(1, 'PENYELENGGARAAN SMART CITY', '1', '2019', 'file.pdf', '2021-05-22 10:30:07', NULL),
(2, 'PERLINDUNGAN DAN PEMBERDAYAAN BAGI LANJUT USIA DAN PENYANDANG DISABILITAS', '2', '2019', 'file.pdf', '2021-05-22 10:30:07', NULL),
(3, 'PENYELENGGARAAN PENDIDIKAN KEPRAMUKAAN', '3', '2019', 'file.pdf', '2021-05-22 10:30:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sk_bupati`
--

CREATE TABLE `sk_bupati` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sk_bupati`
--

INSERT INTO `sk_bupati` (`id`, `title`, `no`, `year`, `link`, `created_at`, `updated_at`) VALUES
(1, 'PERLINDUNGAN DAN PEMBERDAYAAN BAGI LANJUT USIA DAN PENYANDANG DISABILITAS', '1', '2021', 'file.pdf', NULL, NULL),
(2, 'PENYELENGGARAAN PENDIDIKAN KEPRAMUKAAN', '2', '2021', 'file.pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peraturan_bupati`
--
ALTER TABLE `peraturan_bupati`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peraturan_daerah`
--
ALTER TABLE `peraturan_daerah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sk_bupati`
--
ALTER TABLE `sk_bupati`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peraturan_bupati`
--
ALTER TABLE `peraturan_bupati`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peraturan_daerah`
--
ALTER TABLE `peraturan_daerah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sk_bupati`
--
ALTER TABLE `sk_bupati`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
