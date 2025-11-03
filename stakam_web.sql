-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20251011.967007883e
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2025 at 03:09 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stakam_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'adminSTAKAM@gmail.com', '$2y$12$XG.l4sA3ceRaIak.kGbCu.17ffmL8QxwVX5unUEapY995WpMU9GnO', '2025-11-02 10:01:36', '2025-11-02 10:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `konten_heroes`
--

CREATE TABLE `konten_heroes` (
  `id` bigint UNSIGNED NOT NULL,
  `judul_utama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Judul Default',
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambar_utama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_latar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konten_heroes`
--

INSERT INTO `konten_heroes` (`id`, `judul_utama`, `deskripsi`, `gambar_utama`, `gambar_latar`, `created_at`, `updated_at`) VALUES
(1, 'Membentuk Hamba Tuhan & Pemimpin Kristen Unggul', 'Menjadi terang dan garam dunia melalui pendidikan teologi yang Alkitabiah, relevan, dan transformatif di STAKAM Apollos Manado.', NULL, NULL, '2025-11-02 10:01:40', '2025-11-02 17:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `konten_profils`
--

CREATE TABLE `konten_profils` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Selamat Datang di STAKAM',
  `paragraf_satu` text COLLATE utf8mb4_unicode_ci,
  `paragraf_dua` text COLLATE utf8mb4_unicode_ci,
  `gambar_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kartu1_judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Akreditasi',
  `kartu1_deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Terakreditasi BAN-PT',
  `kartu2_judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dosen Kompeten',
  `kartu2_deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Praktisi & Akademisi Ahli',
  `kartu3_judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Lingkungan Belajar',
  `kartu3_deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kondusif & Spiritual',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konten_profils`
--

INSERT INTO `konten_profils` (`id`, `judul`, `paragraf_satu`, `paragraf_dua`, `gambar_profil`, `kartu1_judul`, `kartu1_deskripsi`, `kartu2_judul`, `kartu2_deskripsi`, `kartu3_judul`, `kartu3_deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Selamat Datang di STAKAM', 'Sekolah Tinggi Agama Kristen Apollos Manado (STAKAM) adalah lembaga pendidikan tinggi teologi yang berkomitmen untuk memperlengkapi para mahasiswa dengan pengetahuan Alkitab yang mendalam, karakter rohani yang kokoh, dan keterampilan pelayanan yang efektif.', 'Dengan visi untuk menghasilkan lulusan yang berdampak bagi gereja dan masyarakat, kami mengintegrasikan keunggulan akademik dengan pembinaan spiritual yang intensif.', NULL, 'Akreditasi', 'Terakreditasi BAN-PT', 'Dosen Kompeten', 'Praktisi & Akademisi Ahli', 'Lingkungan Belajar', 'Kondusif & Spiritual', '2025-11-02 10:01:40', '2025-11-02 10:01:40');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_02_121025_create_admins_table', 1),
(5, '2025_11_02_163054_create_konten_heroes_table', 1),
(6, '2025_11_02_165038_create_konten_profils_table', 1),
(7, '2025_11_02_171125_create_program_studis_table', 1),
(8, '2025_11_02_173327_create_pimpinans_table', 1),
(9, '2025_11_02_180731_create_testimonis_table', 2),
(10, '2025_11_03_093750_create_pendaftars_table', 3),
(11, '2025_11_03_135453_add_nomor_pendaftaran_to_pendaftars_table', 4);

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
-- Table structure for table `pendaftars`
--

CREATE TABLE `pendaftars` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_pendaftaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_tinggal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_gereja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lulus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_sekolah_sd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lulus_sd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_sekolah_smp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lulus_smp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_sekolah_sma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lulus_sma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_ijazah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pas_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_khs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu Verifikasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pimpinans`
--

CREATE TABLE `pimpinans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pimpinans`
--

INSERT INTO `pimpinans` (`id`, `nama`, `jabatan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Pdt. Herry Dahlan, M.Th, M.Mis', 'Ketua', 'pimpinan/HEJz00EDkUt1XHuiMBLhIYbbPTSJw0x86qVkYOBj.png', '2025-11-02 10:01:40', '2025-11-02 10:05:19'),
(2, 'Dr. Alfrets Daleno, M.Pdk', 'Wakil Ketua I', 'pimpinan/tGubGC85KrKI2I2k2oZKO9OEz6lf8kX9CRUedsSk.png', '2025-11-02 10:01:40', '2025-11-02 10:05:30'),
(3, 'Dr. Trevor Watulingas, M.Pdk', 'Wakil Ketua II', 'pimpinan/xzho8V9PBfJTwqjRr3D8R2ALEULRn7PRfYYF1WAY.png', '2025-11-02 10:01:40', '2025-11-02 10:05:40'),
(4, 'Dr. Royke Rumangkang', 'Wakil Ketua III', 'pimpinan/RL6DPCO1aFdv3PrDtNMTWHA4sorTDLIedHpnmU79.png', '2025-11-02 10:01:40', '2025-11-02 10:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `program_studis`
--

CREATE TABLE `program_studis` (
  `id` bigint UNSIGNED NOT NULL,
  `jenjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_studis`
--

INSERT INTO `program_studis` (`id`, `jenjang`, `nama_prodi`, `deskripsi`, `link_detail`, `created_at`, `updated_at`) VALUES
(1, 'Sarjana', 'S1 Pendidikan Agama Kristen', 'Mempersiapkan calon guru agama Kristen yang profesional dan berkarakter.', '#', '2025-11-02 10:01:40', '2025-11-02 10:01:40'),
(2, 'Sarjana', 'S1 Teologi', 'Membekali mahasiswa dengan pemahaman teologi yang mendalam untuk pelayanan.', '#', '2025-11-02 10:01:40', '2025-11-02 10:01:40'),
(3, 'Magister', 'S2 Pendidikan Agama Kristen', 'Program lanjut untuk menjadi pemimpin dan inovator pendidikan Kristen.', '#', '2025-11-02 10:01:40', '2025-11-02 10:01:40'),
(4, 'Magister', 'S2 Teologi', 'Memperdalam kajian teologi secara kritis dan konstruktif untuk tantangan zaman.', '#', '2025-11-02 10:01:40', '2025-11-02 10:01:40'),
(5, 'Doktor', 'S3 Teologi', 'Menghasilkan teolog dan peneliti Kristen yang orisinal dan kontributif.', '#', '2025-11-02 10:01:40', '2025-11-02 10:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('94IopLo2Gc57fwxuGr3xtJOjl5L5GJ5EsmvuoCtW', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiajUwMnZTcjNNR3JhU05OWXpmN0N1Q1Y4T1pJVUxkbWpYenQ2VHdTNSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjtzOjU6InJvdXRlIjtzOjk6ImRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1762182309);

-- --------------------------------------------------------

--
-- Table structure for table `testimonis`
--

CREATE TABLE `testimonis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimoni` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonis`
--

INSERT INTO `testimonis` (`id`, `nama`, `jabatan`, `testimoni`, `created_at`, `updated_at`) VALUES
(1, 'Maria Lumentut', 'Alumni S1 Teologi, 2022', 'STAKAM tidak hanya memberi saya ilmu, tetapi juga membentuk karakter saya sebagai hamba Tuhan. Dosen-dosennya sangat membimbing dan komunitasnya begitu hangat.', '2025-11-02 10:14:42', '2025-11-02 10:14:42'),
(2, 'Pdt. Yohanes Simanjuntak', 'Mahasiswa S2 PAK', 'Studi S2 di STAKAM membuka wawasan saya lebih luas. Diskusi di kelas sangat mendalam dan relevan dengan tantangan pelayanan yang saya hadapi saat ini.', '2025-11-02 10:14:42', '2025-11-02 10:14:42'),
(3, 'Dr. (Cand.) Sarah T.', 'Mahasiswi S3 Teologi', 'Sebagai pendidik, saya bangga bisa melanjutkan studi di program doktoral STAKAM. Riset saya didukung penuh dan saya bisa berkontribusi bagi ilmu teologi.', '2025-11-02 10:14:42', '2025-11-02 10:14:42');

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
(1, 'Test User', 'test@example.com', '2025-11-02 10:01:36', '$2y$12$bqG66y3K.2wAnEAtMkGjteY9PQwvqmoAXEav3fZbND50FHBvrQFYC', 'xUDh3MPUB4', '2025-11-02 10:01:36', '2025-11-02 10:01:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `konten_heroes`
--
ALTER TABLE `konten_heroes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konten_profils`
--
ALTER TABLE `konten_profils`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pendaftars`
--
ALTER TABLE `pendaftars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendaftars_nik_ktp_unique` (`nik_ktp`),
  ADD UNIQUE KEY `pendaftars_email_unique` (`email`),
  ADD UNIQUE KEY `pendaftars_nomor_pendaftaran_unique` (`nomor_pendaftaran`);

--
-- Indexes for table `pimpinans`
--
ALTER TABLE `pimpinans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_studis`
--
ALTER TABLE `program_studis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `testimonis`
--
ALTER TABLE `testimonis`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konten_heroes`
--
ALTER TABLE `konten_heroes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konten_profils`
--
ALTER TABLE `konten_profils`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pendaftars`
--
ALTER TABLE `pendaftars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pimpinans`
--
ALTER TABLE `pimpinans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program_studis`
--
ALTER TABLE `program_studis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
