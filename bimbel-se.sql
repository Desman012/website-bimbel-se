-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table website-bimbel.absents
CREATE TABLE IF NOT EXISTS `absents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint unsigned NOT NULL,
  `date` date NOT NULL,
  `attendance_status` enum('present','absent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `absents_student_id_foreign` (`student_id`),
  CONSTRAINT `absents_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.absents: ~0 rows (approximately)
DELETE FROM `absents`;
INSERT INTO `absents` (`id`, `student_id`, `date`, `attendance_status`, `created_at`, `updated_at`) VALUES
	(1, 6, '2025-10-14', 'absent', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(2, 10, '2025-11-05', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(3, 1, '2025-10-23', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(4, 11, '2025-10-15', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(5, 3, '2025-11-03', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(6, 4, '2025-10-21', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(7, 13, '2025-11-07', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(8, 14, '2025-10-16', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(9, 12, '2025-10-17', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(10, 3, '2025-11-09', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(11, 11, '2025-11-09', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(12, 15, '2025-10-19', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(13, 14, '2025-10-17', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(14, 6, '2025-10-30', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(15, 10, '2025-10-11', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(16, 8, '2025-11-09', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(17, 8, '2025-10-14', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(18, 7, '2025-10-29', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(19, 10, '2025-10-26', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(20, 11, '2025-10-24', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(21, 8, '2025-10-11', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(22, 10, '2025-10-22', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(23, 12, '2025-10-31', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(24, 4, '2025-10-30', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(25, 11, '2025-10-16', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(26, 6, '2025-11-01', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(27, 15, '2025-10-13', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(28, 11, '2025-11-09', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(29, 8, '2025-10-25', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(30, 1, '2025-11-03', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(31, 5, '2025-11-06', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(32, 7, '2025-10-16', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(33, 10, '2025-11-03', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(34, 9, '2025-11-05', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(35, 5, '2025-11-01', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(36, 2, '2025-10-27', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(37, 9, '2025-10-21', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(38, 14, '2025-10-27', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(39, 14, '2025-10-19', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(40, 9, '2025-11-01', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(41, 7, '2025-10-28', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(42, 12, '2025-11-01', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(43, 12, '2025-10-15', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(44, 3, '2025-11-02', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(45, 11, '2025-10-28', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(46, 4, '2025-10-19', 'present', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(47, 13, '2025-10-18', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(48, 4, '2025-10-28', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(49, 2, '2025-10-24', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(50, 11, '2025-11-02', 'absent', '2025-11-10 09:26:19', '2025-11-10 09:26:19'),
	(51, 14, '2025-11-01', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(52, 5, '2025-11-08', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(53, 13, '2025-11-01', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(54, 14, '2025-10-14', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(55, 10, '2025-10-14', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(56, 9, '2025-10-21', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(57, 1, '2025-11-03', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(58, 15, '2025-11-04', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(59, 1, '2025-10-16', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(60, 3, '2025-10-19', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(61, 15, '2025-10-26', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(62, 2, '2025-11-01', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(63, 6, '2025-11-05', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(64, 11, '2025-11-05', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(65, 14, '2025-10-13', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(66, 5, '2025-11-10', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(67, 4, '2025-10-15', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(68, 1, '2025-10-30', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(69, 13, '2025-10-20', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(70, 2, '2025-10-18', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(71, 8, '2025-10-12', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(72, 12, '2025-10-14', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(73, 6, '2025-10-12', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(74, 15, '2025-11-02', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(75, 7, '2025-10-14', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(76, 6, '2025-11-01', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(77, 14, '2025-10-28', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(78, 8, '2025-10-30', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(79, 2, '2025-11-06', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(80, 7, '2025-10-22', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(81, 13, '2025-10-16', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(82, 15, '2025-10-21', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(83, 6, '2025-10-17', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(84, 13, '2025-10-30', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(85, 11, '2025-10-17', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(86, 13, '2025-10-30', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(87, 2, '2025-10-27', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(88, 8, '2025-11-06', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(89, 4, '2025-10-23', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(90, 9, '2025-10-20', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(91, 14, '2025-10-20', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(92, 6, '2025-10-19', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(93, 10, '2025-10-30', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(94, 9, '2025-10-22', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(95, 11, '2025-10-17', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(96, 8, '2025-10-22', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(97, 11, '2025-10-20', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(98, 14, '2025-10-18', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(99, 9, '2025-10-30', 'present', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(100, 12, '2025-10-23', 'absent', '2025-11-10 09:27:44', '2025-11-10 09:27:44');

-- Dumping structure for table website-bimbel.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  KEY `admins_role_id_foreign` (`role_id`),
  CONSTRAINT `admins_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.admins: ~12 rows (approximately)
DELETE FROM `admins`;
INSERT INTO `admins` (`id`, `role_id`, `full_name`, `address`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Sadina Laksmiwati S.E.I', 'Jr. Baranang No. 558, Bima 18235, DKI', 'qprastuti@example.net', '$2y$12$OgCcZWGpg.z553xSDIeT0uAgLkdyoV18f6nFX7cdytanXQ4OKZXze', 'active', '2025-11-10 09:15:40', '2025-11-10 09:15:40'),
	(2, 1, 'Tasdik Marsudi Irawan', 'Gg. Bakhita No. 409, Pontianak 12501, Sulsel', 'zyulianti@example.com', '$2y$12$SBWH3tAKgWfi73.2jPmoCetBNlx9r1F.yuc7zZZGzV5Wxh/mUbU/W', 'active', '2025-11-10 09:15:41', '2025-11-10 09:15:41'),
	(3, 1, 'Faizah Puspita S.Gz', 'Psr. Abang No. 517, Bukittinggi 73349, Kalteng', 'wadriansyah@example.com', '$2y$12$zIOM1xGVVIHl/T0FvUZCY.V5V/56EH1dzif0sjyXV4NdB9OLkyCKq', 'active', '2025-11-10 09:15:41', '2025-11-10 09:15:41'),
	(4, 1, 'Rini Laila Kusmawati', 'Jln. Abdul Rahmat No. 7, Serang 22991, Lampung', 'betania.hasanah@example.net', '$2y$12$eL4W0bteCUUE/hydp5uoYOiWTOFVueaCuLbJzxbgNOv73J2NmaFhu', 'active', '2025-11-10 09:17:02', '2025-11-10 09:17:02'),
	(5, 1, 'Mulya Dwi Sinaga S.E.', 'Kpg. Bak Mandi No. 523, Solok 62291, Jambi', 'ibrani37@example.com', '$2y$12$5ZuVhT/CIbDUgMM.D4bUnOlxQhlXt/m9qU0XckXOD4H7BShJIh6Y6', 'active', '2025-11-10 09:17:02', '2025-11-10 09:17:02'),
	(6, 1, 'Queen Purwanti', 'Psr. Raya Ujungberung No. 713, Tangerang 30495, Jateng', 'karimah05@example.com', '$2y$12$ASfFaFmA0j878e7ENKDF4u7rTY77QX5/nGTo2IpAsc0ITdWnB.hrS', 'active', '2025-11-10 09:17:02', '2025-11-10 09:17:02'),
	(7, 1, 'Wasis Sihombing', 'Ds. Sentot Alibasa No. 148, Bontang 63430, Sulbar', 'hamima52@example.org', '$2y$12$tpOTr5zv6XQ4Unfol0QM6uMQokGV/nBJoy5NCiRfk3Galy9B3rwGq', 'active', '2025-11-10 09:26:10', '2025-11-10 09:26:10'),
	(8, 1, 'Warsa Firgantoro', 'Psr. Babadak No. 450, Manado 92371, Sumbar', 'cpadmasari@example.net', '$2y$12$Wmv.FRzFOvK1ykR45iMce.Bp8bo/vfYwUySeYpNIUUv3AzpCmMA86', 'active', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(9, 1, 'Daryani Rajata', 'Dk. Surapati No. 757, Blitar 91782, Kaltim', 'xmaryati@example.org', '$2y$12$5C3xe3xE6pYwjnkT6R2/iuD9ZJrQ.parJkPCSKtFWAuZIEQzRw2zu', 'active', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(10, 1, 'Mursinin Pratama', 'Psr. Bagas Pati No. 456, Administrasi Jakarta Selatan 32490, Sulsel', 'purwanti.harsanto@example.org', '$2y$12$eD9t0hAkGyAcLzlIuGdS3OCxCCMWlB5IwzFs2P.dcMKhzRjlKxw26', 'active', '2025-11-10 09:27:36', '2025-11-10 09:27:36'),
	(11, 1, 'Rini Nasyiah', 'Jr. Madrasah No. 9, Malang 51440, Kalsel', 'wpradipta@example.org', '$2y$12$mvDzY48Y54gve33Qh5nQFuemznYRUUO.oUUmF5kgqAHkRka4qUkpC', 'active', '2025-11-10 09:27:37', '2025-11-10 09:27:37'),
	(12, 1, 'Ifa Melinda Uyainah', 'Ds. Perintis Kemerdekaan No. 330, Gorontalo 96079, Sulsel', 'ynuraini@example.net', '$2y$12$gFvnldCQGKZS6ftN.K9abe65rVi.fQP/SlE/VgIyvsoYhOitWw68G', 'active', '2025-11-10 09:27:37', '2025-11-10 09:27:37');

-- Dumping structure for table website-bimbel.classes
CREATE TABLE IF NOT EXISTS `classes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `level_id` bigint unsigned NOT NULL,
  `name_class` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classes_level_id_foreign` (`level_id`),
  CONSTRAINT `classes_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.classes: ~6 rows (approximately)
DELETE FROM `classes`;
INSERT INTO `classes` (`id`, `level_id`, `name_class`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Kelas 1 SD', '2025-11-10 09:15:41', '2025-11-10 09:15:41'),
	(2, 1, 'Kelas 2 SD', '2025-11-10 09:15:41', '2025-11-10 09:15:41'),
	(3, 1, 'Kelas 3 SD', '2025-11-10 09:15:41', '2025-11-10 09:15:41'),
	(4, 1, 'Kelas 1 SD', '2025-11-10 09:17:02', '2025-11-10 09:17:02'),
	(5, 1, 'Kelas 2 SD', '2025-11-10 09:17:02', '2025-11-10 09:17:02'),
	(6, 1, 'Kelas 3 SD', '2025-11-10 09:17:02', '2025-11-10 09:17:02'),
	(7, 1, 'Kelas 1 SD', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(8, 1, 'Kelas 2 SD', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(9, 1, 'Kelas 3 SD', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(10, 2, 'Kelas 1 SMP', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(11, 2, 'Kelas 2 SMP', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(12, 2, 'Kelas 3 SMP', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(13, 3, 'Kelas 1 SMA', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(14, 3, 'Kelas 2 SMA', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(15, 3, 'Kelas 3 SMA', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(16, 4, 'Kelas 1 SD', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(17, 4, 'Kelas 2 SD', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(18, 4, 'Kelas 3 SD', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(19, 5, 'Kelas 1 SMP', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(20, 5, 'Kelas 2 SMP', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(21, 5, 'Kelas 3 SMP', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(22, 6, 'Kelas 1 SMA', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(23, 6, 'Kelas 2 SMA', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(24, 6, 'Kelas 3 SMA', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(25, 7, 'Kelas 1 SD', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(26, 7, 'Kelas 2 SD', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(27, 7, 'Kelas 3 SD', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(28, 8, 'Kelas 1 SMP', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(29, 8, 'Kelas 2 SMP', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(30, 8, 'Kelas 3 SMP', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(31, 9, 'Kelas 1 SMA', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(32, 9, 'Kelas 2 SMA', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(33, 9, 'Kelas 3 SMA', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(34, 1, 'Kelas 1 SD', '2025-11-10 09:27:37', '2025-11-10 09:27:37'),
	(35, 1, 'Kelas 2 SD', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(36, 1, 'Kelas 3 SD', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(37, 2, 'Kelas 1 SMP', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(38, 2, 'Kelas 2 SMP', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(39, 2, 'Kelas 3 SMP', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(40, 3, 'Kelas 1 SMA', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(41, 3, 'Kelas 2 SMA', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(42, 3, 'Kelas 3 SMA', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(43, 4, 'Kelas 1 SD', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(44, 4, 'Kelas 2 SD', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(45, 4, 'Kelas 3 SD', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(46, 5, 'Kelas 1 SMP', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(47, 5, 'Kelas 2 SMP', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(48, 5, 'Kelas 3 SMP', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(49, 6, 'Kelas 1 SMA', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(50, 6, 'Kelas 2 SMA', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(51, 6, 'Kelas 3 SMA', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(52, 7, 'Kelas 1 SD', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(53, 7, 'Kelas 2 SD', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(54, 7, 'Kelas 3 SD', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(55, 8, 'Kelas 1 SMP', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(56, 8, 'Kelas 2 SMP', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(57, 8, 'Kelas 3 SMP', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(58, 9, 'Kelas 1 SMA', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(59, 9, 'Kelas 2 SMA', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(60, 9, 'Kelas 3 SMA', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(61, 10, 'Kelas 1 SD', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(62, 10, 'Kelas 2 SD', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(63, 10, 'Kelas 3 SD', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(64, 11, 'Kelas 1 SMP', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(65, 11, 'Kelas 2 SMP', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(66, 11, 'Kelas 3 SMP', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(67, 12, 'Kelas 1 SMA', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(68, 12, 'Kelas 2 SMA', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(69, 12, 'Kelas 3 SMA', '2025-11-10 09:27:38', '2025-11-10 09:27:38');

-- Dumping structure for table website-bimbel.curriculums
CREATE TABLE IF NOT EXISTS `curriculums` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_curriculum` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.curriculums: ~0 rows (approximately)
DELETE FROM `curriculums`;
INSERT INTO `curriculums` (`id`, `name_curriculum`, `created_at`, `updated_at`) VALUES
	(1, 'K13', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(2, 'Merdeka Belajar', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(3, 'K13', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(4, 'Merdeka Belajar', '2025-11-10 09:27:38', '2025-11-10 09:27:38');

-- Dumping structure for table website-bimbel.facilities
CREATE TABLE IF NOT EXISTS `facilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_facilities` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.facilities: ~0 rows (approximately)
DELETE FROM `facilities`;
INSERT INTO `facilities` (`id`, `name_facilities`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Ruang Kelas Nyaman', 'Fasilitas Ruang Kelas Nyaman tersedia untuk mendukung proses belajar.', '2025-11-10 09:26:27', '2025-11-10 09:26:27'),
	(2, 'Perpustakaan Mini', 'Fasilitas Perpustakaan Mini tersedia untuk mendukung proses belajar.', '2025-11-10 09:26:27', '2025-11-10 09:26:27'),
	(3, 'Proyektor', 'Fasilitas Proyektor tersedia untuk mendukung proses belajar.', '2025-11-10 09:26:27', '2025-11-10 09:26:27'),
	(4, 'Pendingin Ruangan', 'Fasilitas Pendingin Ruangan tersedia untuk mendukung proses belajar.', '2025-11-10 09:26:27', '2025-11-10 09:26:27'),
	(5, 'Area Tunggu Orang Tua', 'Fasilitas Area Tunggu Orang Tua tersedia untuk mendukung proses belajar.', '2025-11-10 09:26:27', '2025-11-10 09:26:27'),
	(6, 'Ruang Kelas Nyaman', 'Fasilitas Ruang Kelas Nyaman tersedia untuk mendukung proses belajar.', '2025-11-10 09:27:53', '2025-11-10 09:27:53'),
	(7, 'Perpustakaan Mini', 'Fasilitas Perpustakaan Mini tersedia untuk mendukung proses belajar.', '2025-11-10 09:27:53', '2025-11-10 09:27:53'),
	(8, 'Proyektor', 'Fasilitas Proyektor tersedia untuk mendukung proses belajar.', '2025-11-10 09:27:53', '2025-11-10 09:27:53'),
	(9, 'Pendingin Ruangan', 'Fasilitas Pendingin Ruangan tersedia untuk mendukung proses belajar.', '2025-11-10 09:27:53', '2025-11-10 09:27:53'),
	(10, 'Area Tunggu Orang Tua', 'Fasilitas Area Tunggu Orang Tua tersedia untuk mendukung proses belajar.', '2025-11-10 09:27:53', '2025-11-10 09:27:53');

-- Dumping structure for table website-bimbel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table website-bimbel.levels
CREATE TABLE IF NOT EXISTS `levels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.levels: ~12 rows (approximately)
DELETE FROM `levels`;
INSERT INTO `levels` (`id`, `name_level`, `created_at`, `updated_at`) VALUES
	(1, 'SD', '2025-11-10 09:15:41', '2025-11-10 09:15:41'),
	(2, 'SMP', '2025-11-10 09:15:41', '2025-11-10 09:15:41'),
	(3, 'SMA', '2025-11-10 09:15:41', '2025-11-10 09:15:41'),
	(4, 'SD', '2025-11-10 09:17:02', '2025-11-10 09:17:02'),
	(5, 'SMP', '2025-11-10 09:17:02', '2025-11-10 09:17:02'),
	(6, 'SMA', '2025-11-10 09:17:02', '2025-11-10 09:17:02'),
	(7, 'SD', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(8, 'SMP', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(9, 'SMA', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(10, 'SD', '2025-11-10 09:27:37', '2025-11-10 09:27:37'),
	(11, 'SMP', '2025-11-10 09:27:37', '2025-11-10 09:27:37'),
	(12, 'SMA', '2025-11-10 09:27:37', '2025-11-10 09:27:37');

-- Dumping structure for table website-bimbel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.migrations: ~17 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2025_11_03_160727_roles', 1),
	(6, '2025_11_03_161410_admins', 1),
	(7, '2025_11_03_163423_levels', 1),
	(8, '2025_11_03_163700_programs', 1),
	(9, '2025_11_03_163916_classes', 1),
	(10, '2025_11_03_164216_prices', 1),
	(11, '2025_11_03_164538_times', 1),
	(12, '2025_11_03_164846_curriculums', 1),
	(13, '2025_11_03_164946_students', 1),
	(14, '2025_11_03_165058_payments', 1),
	(15, '2025_11_03_165220_absents', 1),
	(16, '2025_11_03_174918_regitrations', 1),
	(17, '2025_11_09_101518_create_table_reviews', 2),
	(18, '2025_11_09_182742_create_table_facilities', 2),
	(19, '2014_10_12_200000_add_two_factor_columns_to_users_table', 3),
	(20, '2025_11_10_161951_update_table_classes', 4);

-- Dumping structure for table website-bimbel.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping structure for table website-bimbel.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint unsigned NOT NULL,
  `admin_id` bigint unsigned DEFAULT NULL,
  `month` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','verified','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_student_id_foreign` (`student_id`),
  KEY `payments_admin_id_foreign` (`admin_id`),
  CONSTRAINT `payments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.payments: ~60 rows (approximately)
DELETE FROM `payments`;
INSERT INTO `payments` (`id`, `student_id`, `admin_id`, `month`, `amount_paid`, `payment_proof`, `status`, `created_at`, `updated_at`) VALUES
	(1, 9, 2, 'July', 322269.00, 'payment_1.jpg', 'rejected', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(2, 3, 1, 'November', 468525.00, 'payment_2.jpg', 'rejected', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(3, 10, 1, 'November', 465460.00, 'payment_3.jpg', 'pending', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(4, 15, 1, 'October', 664747.00, 'payment_4.jpg', 'rejected', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(5, 5, 1, 'February', 637279.00, 'payment_5.jpg', 'verified', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(6, 12, 1, 'August', 655236.00, 'payment_6.jpg', 'rejected', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(7, 9, 3, 'December', 376943.00, 'payment_7.jpg', 'rejected', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(8, 13, 2, 'February', 514998.00, 'payment_8.jpg', 'pending', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(9, 15, 2, 'October', 300301.00, 'payment_9.jpg', 'rejected', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(10, 6, 1, 'June', 547394.00, 'payment_10.jpg', 'verified', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(11, 13, 1, 'November', 643034.00, 'payment_11.jpg', 'verified', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(12, 11, 1, 'January', 512023.00, 'payment_12.jpg', 'pending', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(13, 5, 3, 'March', 444333.00, 'payment_13.jpg', 'pending', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(14, 2, 2, 'June', 372683.00, 'payment_14.jpg', 'pending', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(15, 2, 3, 'January', 395739.00, 'payment_15.jpg', 'verified', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(16, 9, 1, 'March', 478127.00, 'payment_16.jpg', 'rejected', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(17, 9, 2, 'March', 462231.00, 'payment_17.jpg', 'verified', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(18, 2, 2, 'December', 468094.00, 'payment_18.jpg', 'rejected', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(19, 8, 2, 'August', 527344.00, 'payment_19.jpg', 'verified', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(20, 6, 3, 'October', 484326.00, 'payment_20.jpg', 'rejected', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(21, 14, 2, 'March', 625839.00, 'payment_21.jpg', 'pending', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(22, 13, 2, 'October', 353529.00, 'payment_22.jpg', 'pending', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(23, 10, 1, 'December', 395182.00, 'payment_23.jpg', 'rejected', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(24, 12, 1, 'April', 401333.00, 'payment_24.jpg', 'verified', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(25, 9, 1, 'July', 408223.00, 'payment_25.jpg', 'rejected', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(26, 6, 3, 'April', 358427.00, 'payment_26.jpg', 'pending', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(27, 1, 3, 'November', 682171.00, 'payment_27.jpg', 'rejected', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(28, 15, 1, 'July', 557701.00, 'payment_28.jpg', 'rejected', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(29, 1, 2, 'November', 316908.00, 'payment_29.jpg', 'verified', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(30, 9, 1, 'October', 683399.00, 'payment_30.jpg', 'verified', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(31, 12, 2, 'June', 518149.00, 'payment_1.jpg', 'verified', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(32, 3, 3, 'May', 380954.00, 'payment_2.jpg', 'rejected', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(33, 5, 1, 'March', 623086.00, 'payment_3.jpg', 'rejected', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(34, 14, 1, 'January', 493036.00, 'payment_4.jpg', 'pending', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(35, 5, 2, 'April', 645171.00, 'payment_5.jpg', 'pending', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(36, 13, 3, 'March', 676487.00, 'payment_6.jpg', 'pending', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(37, 15, 2, 'January', 697410.00, 'payment_7.jpg', 'rejected', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(38, 13, 3, 'April', 363486.00, 'payment_8.jpg', 'verified', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(39, 9, 3, 'April', 603818.00, 'payment_9.jpg', 'verified', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(40, 14, 3, 'April', 583193.00, 'payment_10.jpg', 'rejected', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(41, 2, 2, 'December', 365579.00, 'payment_11.jpg', 'pending', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(42, 10, 2, 'October', 304564.00, 'payment_12.jpg', 'verified', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(43, 6, 3, 'May', 630583.00, 'payment_13.jpg', 'rejected', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(44, 3, 2, 'June', 459997.00, 'payment_14.jpg', 'verified', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(45, 1, 1, 'September', 388684.00, 'payment_15.jpg', 'rejected', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(46, 12, 1, 'November', 594110.00, 'payment_16.jpg', 'rejected', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(47, 14, 2, 'October', 467232.00, 'payment_17.jpg', 'verified', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(48, 7, 1, 'March', 617035.00, 'payment_18.jpg', 'verified', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(49, 13, 3, 'October', 417162.00, 'payment_19.jpg', 'pending', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(50, 13, 2, 'October', 310197.00, 'payment_20.jpg', 'verified', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(51, 1, 2, 'June', 419760.00, 'payment_21.jpg', 'pending', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(52, 15, 1, 'August', 597929.00, 'payment_22.jpg', 'verified', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(53, 8, 3, 'July', 523129.00, 'payment_23.jpg', 'pending', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(54, 12, 1, 'February', 532074.00, 'payment_24.jpg', 'pending', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(55, 12, 3, 'July', 384915.00, 'payment_25.jpg', 'verified', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(56, 12, 3, 'November', 542704.00, 'payment_26.jpg', 'verified', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(57, 3, 3, 'May', 625928.00, 'payment_27.jpg', 'pending', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(58, 4, 2, 'November', 586248.00, 'payment_28.jpg', 'rejected', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(59, 2, 2, 'November', 415481.00, 'payment_29.jpg', 'rejected', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(60, 1, 3, 'December', 386195.00, 'payment_30.jpg', 'rejected', '2025-11-10 09:27:44', '2025-11-10 09:27:44');

-- Dumping structure for table website-bimbel.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;

-- Dumping structure for table website-bimbel.prices
CREATE TABLE IF NOT EXISTS `prices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `level_id` bigint unsigned NOT NULL,
  `class_id` bigint unsigned DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prices_level_id_foreign` (`level_id`),
  KEY `prices_class_id_foreign` (`class_id`),
  CONSTRAINT `prices_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `prices_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.prices: ~0 rows (approximately)
DELETE FROM `prices`;
INSERT INTO `prices` (`id`, `level_id`, `class_id`, `price`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 679714.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(2, 1, 2, 301335.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(3, 1, 3, 358441.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(4, 1, 4, 567271.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(5, 1, 5, 363002.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(6, 1, 6, 365199.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(7, 1, 7, 629452.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(8, 1, 8, 459657.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(9, 1, 9, 408412.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(10, 2, 10, 388299.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(11, 2, 11, 670790.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(12, 2, 12, 467694.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(13, 3, 13, 322383.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(14, 3, 14, 409535.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(15, 3, 15, 449779.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(16, 4, 16, 639397.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(17, 4, 17, 626863.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(18, 4, 18, 550849.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(19, 5, 19, 597818.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(20, 5, 20, 681355.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(21, 5, 21, 316872.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(22, 6, 22, 305937.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(23, 6, 23, 685439.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(24, 6, 24, 667033.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(25, 7, 25, 434981.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(26, 7, 26, 376881.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(27, 7, 27, 347820.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(28, 8, 28, 570217.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(29, 8, 29, 300562.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(30, 8, 30, 632540.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(31, 9, 31, 380724.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(32, 9, 32, 304131.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(33, 9, 33, 616391.00, '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(34, 1, 1, 612592.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(35, 1, 2, 340478.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(36, 1, 3, 441295.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(37, 1, 4, 429706.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(38, 1, 5, 446941.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(39, 1, 6, 362642.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(40, 1, 7, 666115.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(41, 1, 8, 440747.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(42, 1, 9, 364692.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(43, 1, 34, 374393.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(44, 1, 35, 373363.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(45, 1, 36, 506824.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(46, 2, 10, 610684.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(47, 2, 11, 456262.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(48, 2, 12, 600291.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(49, 2, 37, 362236.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(50, 2, 38, 475218.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(51, 2, 39, 520552.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(52, 3, 13, 382290.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(53, 3, 14, 496282.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(54, 3, 15, 684943.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(55, 3, 40, 472460.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(56, 3, 41, 540653.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(57, 3, 42, 419227.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(58, 4, 16, 655539.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(59, 4, 17, 691249.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(60, 4, 18, 571184.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(61, 4, 43, 364652.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(62, 4, 44, 403573.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(63, 4, 45, 639583.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(64, 5, 19, 613136.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(65, 5, 20, 634645.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(66, 5, 21, 365640.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(67, 5, 46, 509964.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(68, 5, 47, 454408.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(69, 5, 48, 462782.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(70, 6, 22, 613872.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(71, 6, 23, 618907.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(72, 6, 24, 685983.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(73, 6, 49, 620665.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(74, 6, 50, 669802.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(75, 6, 51, 662823.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(76, 7, 25, 611113.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(77, 7, 26, 402933.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(78, 7, 27, 584663.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(79, 7, 52, 436588.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(80, 7, 53, 501117.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(81, 7, 54, 479993.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(82, 8, 28, 636591.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(83, 8, 29, 459154.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(84, 8, 30, 429262.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(85, 8, 55, 613719.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(86, 8, 56, 588447.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(87, 8, 57, 603400.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(88, 9, 31, 613497.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(89, 9, 32, 396126.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(90, 9, 33, 323907.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(91, 9, 58, 587726.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(92, 9, 59, 440516.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(93, 9, 60, 401546.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(94, 10, 61, 512899.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(95, 10, 62, 665696.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(96, 10, 63, 310469.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(97, 11, 64, 302364.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(98, 11, 65, 312558.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(99, 11, 66, 426063.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(100, 12, 67, 559880.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(101, 12, 68, 382649.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(102, 12, 69, 508419.00, '2025-11-10 09:27:38', '2025-11-10 09:27:38');

-- Dumping structure for table website-bimbel.programs
CREATE TABLE IF NOT EXISTS `programs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_program` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.programs: ~0 rows (approximately)
DELETE FROM `programs`;
INSERT INTO `programs` (`id`, `name_program`, `created_at`, `updated_at`) VALUES
	(1, 'Private', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(2, 'Bimbel', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(3, 'Try Out', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(4, 'Private', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(5, 'Bimbel', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(6, 'Try Out', '2025-11-10 09:27:38', '2025-11-10 09:27:38');

-- Dumping structure for table website-bimbel.registrations
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `levels_id` bigint unsigned NOT NULL,
  `class_id` bigint unsigned DEFAULT NULL,
  `programs_id` bigint unsigned NOT NULL,
  `_id` bigint unsigned NOT NULL,
  `time_les_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','active','inactive','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  UNIQUE KEY `registrations_student_email_unique` (`student_email`),
  KEY `registrations_role_id_foreign` (`role_id`),
  KEY `registrations_levels_id_foreign` (`levels_id`),
  KEY `registrations_class_id_foreign` (`class_id`),
  KEY `registrations_programs_id_foreign` (`programs_id`),
  KEY `registrations__id_foreign` (`_id`),
  KEY `registrations_time_les_id_foreign` (`time_les_id`),
  CONSTRAINT `registrations__id_foreign` FOREIGN KEY (`_id`) REFERENCES `curriculums` (`id`) ON DELETE CASCADE,
  CONSTRAINT `registrations_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `registrations_levels_id_foreign` FOREIGN KEY (`levels_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `registrations_programs_id_foreign` FOREIGN KEY (`programs_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `registrations_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `registrations_time_les_id_foreign` FOREIGN KEY (`time_les_id`) REFERENCES `times` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.registrations: ~0 rows (approximately)
DELETE FROM `registrations`;
INSERT INTO `registrations` (`id`, `role_id`, `full_name`, `address`, `phone_number`, `student_email`, `password`, `parent_name`, `parent_email`, `parent_phone`, `levels_id`, `class_id`, `programs_id`, `_id`, `time_les_id`, `created_at`, `updated_at`, `status`) VALUES
	(1, 2, 'Irsad Tasnim Mandala', 'Kpg. Lada No. 196, Surakarta 38767, Kalbar', '(+62) 847 3239 5563', 'wani76@example.com', '$2y$12$DBph9sahuBAztrh5S56R0OuMabkIZJbeKHEFEfVK1DFIjp22xds8e', 'Ganep Siregar', 'fyuniar@example.org', '0334 0008 479', 3, 21, 2, 2, 3, '2025-11-10 09:26:19', '2025-11-10 09:26:19', 'inactive'),
	(2, 2, 'Shania Karen Safitri', 'Ki. Muwardi No. 862, Payakumbuh 32616, DKI', '0266 7775 2240', 'rmangunsong@example.net', '$2y$12$kJCNcrQL46AQofMQZN1qwOquc4C8RmXt/T3ZzPK4Ei5QPIGY9V.n6', 'Kamila Raisa Suryatmi', 'titin.saputra@example.org', '0653 6510 507', 2, 25, 3, 1, 2, '2025-11-10 09:26:19', '2025-11-10 09:26:19', 'active'),
	(3, 2, 'Zahra Septi Permata', 'Jln. Bawal No. 471, Jayapura 83102, Kaltim', '(+62) 478 0857 048', 'emong.santoso@example.com', '$2y$12$NuRJqO07QKdpx3cf3qix6.tq6LqdgwhBgLHSqSaIxU2dI/a0rwZ12', 'Teguh Dongoran M.Farm', 'mulyanto.hidayanto@example.net', '(+62) 529 9337 5000', 3, 24, 2, 1, 3, '2025-11-10 09:26:20', '2025-11-10 09:26:20', 'ditolak'),
	(4, 2, 'Sidiq Simanjuntak S.IP', 'Ki. Cikutra Barat No. 736, Pekanbaru 18955, Kalteng', '(+62) 549 4594 640', 'ihandayani@example.net', '$2y$12$oATgKsFXg5BCeW4uA0jlQeozzQEjCvCl0pJnAe7Z3l2XEMB.f84iC', 'Cemeti Lasmono Pranowo', 'arahayu@example.net', '(+62) 248 2902 963', 2, 25, 2, 2, 1, '2025-11-10 09:26:20', '2025-11-10 09:26:20', 'inactive'),
	(5, 2, 'Dasa Wibisono', 'Ds. Nakula No. 145, Palembang 11468, Kaltim', '(+62) 267 6744 441', 'cmaryati@example.com', '$2y$12$VSk7jSfORURQfrpUzVcsZOrAn1/Bzvpwdohy7S5Yy9CQ4oWTfq2F6', 'Darsirah Nashiruddin', 'farida.ina@example.org', '0886 4459 885', 1, 15, 2, 2, 3, '2025-11-10 09:26:21', '2025-11-10 09:26:21', 'inactive'),
	(6, 2, 'Anggabaya Mahendra', 'Jr. Babadak No. 741, Palembang 99587, Sultra', '0867 4121 742', 'rahimah.darmana@example.net', '$2y$12$LVcKYFFzYti39OIGqM01n.tvq9a9396aVfaznCA03y3cRoMEM462W', 'Jefri Wibisono', 'kezia.puspasari@example.com', '0331 4237 011', 1, 28, 3, 2, 2, '2025-11-10 09:26:21', '2025-11-10 09:26:21', 'active'),
	(7, 2, 'Jamal Firmansyah', 'Dk. Yogyakarta No. 680, Tanjung Pinang 15944, Banten', '0430 0121 901', 'elma95@example.net', '$2y$12$oDdUCMBntEvo/nX9ds792uscu60ORSq4MzmsyRZAmS6s14PJ/q4CK', 'Ida Mayasari S.H.', 'zulkarnain.betania@example.com', '0277 0070 0026', 2, 9, 2, 1, 1, '2025-11-10 09:26:22', '2025-11-10 09:26:22', 'ditolak'),
	(8, 2, 'Pangestu Makuta Sitorus', 'Dk. Kiaracondong No. 866, Binjai 14891, Sulbar', '0709 9129 2796', 'tmandasari@example.org', '$2y$12$xNC.iNUd7JxfGj0e0k54huEqx4sSqfCeyY864uRminVFuo1n6HBfq', 'Hesti Usada S.IP', 'gsimanjuntak@example.com', '(+62) 843 085 761', 3, 28, 2, 2, 2, '2025-11-10 09:26:22', '2025-11-10 09:26:22', 'pending'),
	(9, 2, 'Usman Prakasa S.Ked', 'Jln. Bayan No. 159, Prabumulih 24372, Jabar', '0629 7635 8831', 'siska19@example.net', '$2y$12$ARf5K9nhXMVtC2/0gz0zUexavhs6eqwy9teAtckPlSoOXXm8OGTxC', 'Dinda Ifa Wijayanti S.H.', 'aisyah21@example.org', '(+62) 551 3053 2697', 3, 10, 3, 2, 2, '2025-11-10 09:26:22', '2025-11-10 09:26:22', 'pending'),
	(10, 2, 'Aris Damanik', 'Jln. Veteran No. 601, Lhokseumawe 98673, Papua', '0974 0401 8623', 'jagustina@example.org', '$2y$12$5/HzlsVaKOJK8hD8.I4yrOE8tzo0k8Xr/s1mcleEVSQPRgEqExMZ.', 'Harjaya Saputra', 'siregar.genta@example.com', '(+62) 947 7831 1003', 2, 22, 3, 1, 1, '2025-11-10 09:26:23', '2025-11-10 09:26:23', 'inactive'),
	(11, 2, 'Maryanto Rahman Thamrin M.Kom.', 'Gg. Jagakarsa No. 810, Subulussalam 96846, Aceh', '024 8539 528', 'melani.rudi@example.com', '$2y$12$7Ws1.zH5LSMa.3c7Me3KTOW9vPex7/0hQjsYEbtTIA6gTigmQ.kgi', 'Putri Intan Permata S.Gz', 'lurhur.pradipta@example.com', '(+62) 291 2722 874', 2, 21, 2, 2, 1, '2025-11-10 09:26:23', '2025-11-10 09:26:23', 'ditolak'),
	(12, 2, 'Bagas Saptono', 'Jln. Raden Saleh No. 127, Sawahlunto 51320, Kaltim', '0820 595 376', 'tampubolon.putri@example.com', '$2y$12$ZP.H0eF8jLZYquSTZqiKbelkiYP0/EeHWcryQK5x6i3ZZfNMlmsrK', 'Jamil Hidayanto', 'purnawati.putri@example.net', '(+62) 299 4869 4338', 3, 32, 2, 1, 1, '2025-11-10 09:26:24', '2025-11-10 09:26:24', 'ditolak'),
	(13, 2, 'Dono Kayun Waskita S.E.', 'Gg. Pasteur No. 854, Ternate 50285, NTT', '(+62) 879 6397 295', 'mnashiruddin@example.org', '$2y$12$xR1VpvHQg/eNrG0Wn5l4X.hjYz0odV2edtHku66mSAj36tyjOv1Ju', 'Tania Ida Mandasari', 'adika.gunawan@example.org', '0717 4237 655', 1, 32, 3, 2, 1, '2025-11-10 09:26:24', '2025-11-10 09:26:24', 'active'),
	(14, 2, 'Limar Mansur', 'Kpg. Dr. Junjunan No. 299, Surakarta 60511, Kaltim', '0921 3294 726', 'nurul34@example.com', '$2y$12$V0J3e9Ox4bCX35Gy.3PVLuiF7YIYtKrdce0oVZ0sJ/YekOZZ64GDu', 'Ani Pratiwi', 'asirwanda.putra@example.net', '(+62) 562 9695 617', 2, 26, 1, 1, 1, '2025-11-10 09:26:25', '2025-11-10 09:26:25', 'ditolak'),
	(15, 2, 'Eko Lazuardi S.Kom', 'Psr. Gardujati No. 502, Banjarmasin 88959, Kaltara', '029 0227 7415', 'suryono.hartana@example.org', '$2y$12$JQEXjGO/QM73kXpJNCup3OP49FSfv3JaKAb1K.ZWnxytiCpiok4jy', 'Candra Hardiansyah', 'qwinarsih@example.net', '0753 6154 147', 1, 17, 3, 2, 2, '2025-11-10 09:26:25', '2025-11-10 09:26:25', 'pending'),
	(16, 2, 'Ibun Hartaka Hutapea', 'Jr. Jagakarsa No. 940, Salatiga 45849, Pabar', '(+62) 501 0252 7608', 'isihombing@example.org', '$2y$12$ha/74kpVPiW/JeyyxJmIIOF4Ih58PrkHEjgdq7RZ3ev4VDGgRm11i', 'Ratih Hariyah', 'andriani.baktiono@example.org', '0919 6198 761', 1, 30, 2, 2, 2, '2025-11-10 09:26:25', '2025-11-10 09:26:25', 'pending'),
	(17, 2, 'Anita Nasyiah', 'Ds. Raden Saleh No. 183, Bontang 37255, Bali', '022 3079 829', 'gwinarno@example.org', '$2y$12$/807Vivhvvk3LcAvUmbqdehWAsh3LRWWNYT8xF9TCIp6hqSKUE.zC', 'Ibrani Wahyudin', 'anggriawan.raina@example.net', '(+62) 865 670 365', 3, 16, 2, 1, 3, '2025-11-10 09:26:26', '2025-11-10 09:26:26', 'ditolak'),
	(18, 2, 'Uli Puspita', 'Jln. Gading No. 734, Sorong 43024, Kaltim', '028 1370 8023', 'simanjuntak.jelita@example.org', '$2y$12$7Pb437Drh4qg/8P036GaYe4ST5hXqGnmft76NRLuCoMe8amao4i/u', 'Ajeng Purnawati', 'santoso.reksa@example.net', '(+62) 827 2407 946', 2, 16, 3, 1, 1, '2025-11-10 09:26:26', '2025-11-10 09:26:26', 'pending'),
	(19, 2, 'Alika Janet Hassanah S.Gz', 'Jln. Hayam Wuruk No. 895, Administrasi Jakarta Barat 72480, Kepri', '(+62) 438 5995 8134', 'maya.budiman@example.net', '$2y$12$cZnU2PR5Jmf3bpjXdsEvjOAKLvHVOEfrMTE8T86gQUvO8Eui1uHH2', 'Nasim Pangestu S.T.', 'koko.saputra@example.com', '(+62) 837 388 046', 3, 1, 2, 1, 3, '2025-11-10 09:26:27', '2025-11-10 09:26:27', 'active'),
	(20, 2, 'Alika Sudiati', 'Psr. Fajar No. 4, Pematangsiantar 42670, Jambi', '(+62) 224 4659 2877', 'shidayat@example.org', '$2y$12$WiefumSE1F5kWu7GSdSCVOn1wSM2BNIwKm.slFPfMSveOygP0qHRW', 'Sadina Hafshah Suartini M.TI.', 'ulya66@example.org', '(+62) 467 4293 144', 1, 32, 1, 1, 1, '2025-11-10 09:26:27', '2025-11-10 09:26:27', 'inactive'),
	(21, 2, 'Candrakanta Situmorang', 'Gg. Suniaraja No. 281, Kupang 76942, Kepri', '0936 5058 7826', 'otarihoran@example.net', '$2y$12$Kzzn4IgYhE7GTU3Lq9ksKe57mS1HB/rLJF8ypfivUqu.lLLgNbJGu', 'Hardana Jarwi Hidayat S.Psi', 'bakianto.novitasari@example.net', '(+62) 297 0674 4016', 1, 12, 3, 1, 3, '2025-11-10 09:27:45', '2025-11-10 09:27:45', 'ditolak'),
	(22, 2, 'Eka Hutagalung', 'Jln. Salatiga No. 387, Palopo 47765, Sultra', '(+62) 538 9434 7764', 'qori.saefullah@example.org', '$2y$12$78.oMXYKJwXzMiHHXXRl/./2uK/JB2WC.PUB1/1nLI8tNPaNaJJIG', 'Mustofa Mustika Napitupulu', 'waskita.kamidin@example.net', '0972 1615 5343', 1, 31, 3, 2, 2, '2025-11-10 09:27:45', '2025-11-10 09:27:45', 'inactive'),
	(23, 2, 'Talia Talia Wulandari S.E.I', 'Jln. Lumban Tobing No. 914, Salatiga 79091, Kalteng', '(+62) 726 5272 9050', 'jaiman.thamrin@example.org', '$2y$12$s1TvQuFVVw4ej8RlZaiJoe38SguEb9vDKuMEXYiLTt0AJbS89v39u', 'Bala Galih Siregar', 'cahyadi27@example.com', '0891 145 644', 2, 19, 1, 2, 1, '2025-11-10 09:27:45', '2025-11-10 09:27:45', 'active'),
	(24, 2, 'Victoria Siti Kusmawati', 'Ki. Bakin No. 426, Prabumulih 79163, Bengkulu', '0943 1787 423', 'xsuryono@example.org', '$2y$12$apalifNez7CQTj.SRWVDae1hmrxtscZgL7ektsR0lcu6pLnkw/M1S', 'Ade Oktaviani', 'jkuswandari@example.org', '(+62) 970 0699 111', 3, 67, 1, 2, 2, '2025-11-10 09:27:46', '2025-11-10 09:27:46', 'pending'),
	(25, 2, 'Suci Usyi Wastuti S.E.I', 'Dk. Salatiga No. 742, Kupang 51665, Aceh', '(+62) 21 5642 827', 'jabal93@example.org', '$2y$12$hRNuasMhtsbLTMHSc6Av9eD2ER3BLAEJBI5ylxro9hbW88ZXPFy3C', 'Daniswara Sitompul M.Kom.', 'xyolanda@example.net', '0695 4130 466', 1, 35, 3, 1, 1, '2025-11-10 09:27:46', '2025-11-10 09:27:46', 'inactive'),
	(26, 2, 'Rahmat Firgantoro', 'Ki. Basuki No. 642, Denpasar 76828, Sultra', '(+62) 542 0435 711', 'luwais@example.org', '$2y$12$MWfW.W1ejzMY.UFYUMpQveQDeuoXagSBt/e2t/SiizIM0Bbwq6PiK', 'Farhunnisa Hasanah', 'jais43@example.org', '0944 3729 202', 2, 11, 2, 2, 2, '2025-11-10 09:27:47', '2025-11-10 09:27:47', 'ditolak'),
	(27, 2, 'Lili Ana Pratiwi S.I.Kom', 'Dk. Bara No. 649, Bandar Lampung 66005, NTB', '0327 0645 6418', 'twaluyo@example.com', '$2y$12$86n15ttwXIUY6lLmGijDdO9V9R7FByDZ4x4GgHKn1Q3Pcsb8cMI8i', 'Maryanto Tarihoran S.Pt', 'laksmiwati.laras@example.net', '(+62) 414 6656 3209', 1, 31, 3, 1, 3, '2025-11-10 09:27:47', '2025-11-10 09:27:47', 'pending'),
	(28, 2, 'Uda Lurhur Budiyanto S.E.', 'Jln. Industri No. 522, Bekasi 87934, NTT', '(+62) 424 7987 8257', 'makara.natsir@example.net', '$2y$12$EW2JfnchgcbHFIToufnG3.TABd2A/PRm5xUtNQwByaBzOlYUPl6iK', 'Dartono Prayoga', 'jane.najmudin@example.org', '(+62) 796 1043 819', 2, 45, 2, 1, 1, '2025-11-10 09:27:47', '2025-11-10 09:27:47', 'active'),
	(29, 2, 'Safina Zelaya Sudiati S.Psi', 'Psr. Reksoninten No. 375, Batam 90710, Malut', '0557 8097 2662', 'sudiati.yessi@example.com', '$2y$12$1fvtx7C8Z0tn/VvrPEShDOZ9HnSnuo8UeUzEkLM47Oaj1Zn4xBaa6', 'Anastasia Safitri M.Farm', 'rahayu30@example.org', '(+62) 868 6810 4521', 1, 51, 3, 2, 2, '2025-11-10 09:27:48', '2025-11-10 09:27:48', 'active'),
	(30, 2, 'Karja Waluyo', 'Dk. Rumah Sakit No. 326, Bima 54002, Sulsel', '0611 4860 853', 'owahyuni@example.org', '$2y$12$wVCuVwqqDjHO30NNKmsBJujHCs38soyaDracGZQczX9b7k96aujcq', 'Gantar Olga Thamrin S.Pd', 'ksaragih@example.net', '(+62) 922 2334 8171', 1, 59, 1, 1, 3, '2025-11-10 09:27:48', '2025-11-10 09:27:48', 'ditolak'),
	(31, 2, 'Ella Andriani', 'Psr. Hang No. 99, Surakarta 30206, Sultra', '0252 9090 711', 'msuwarno@example.net', '$2y$12$4GtUjhbXFHkRyMyXSdGSoeVFpYwGM/DASlkjnWb9r0lrdHWhUrY76', 'Eko Darman Irawan', 'lanang12@example.net', '0959 1704 9856', 3, 11, 1, 2, 3, '2025-11-10 09:27:49', '2025-11-10 09:27:49', 'pending'),
	(32, 2, 'Vinsen Nababan', 'Gg. Pacuan Kuda No. 34, Parepare 68712, Bali', '(+62) 803 0497 729', 'kemba.saptono@example.com', '$2y$12$DfFt3Ohdkam9MGaJXEFFjeYu2Izjm1qzaQITAQYsbIeYNl9ccqj/a', 'Bakda Jasmani Setiawan S.IP', 'rahimah.kayla@example.org', '0579 9382 359', 1, 43, 2, 1, 1, '2025-11-10 09:27:49', '2025-11-10 09:27:49', 'active'),
	(33, 2, 'Imam Napitupulu S.Kom', 'Jln. Bakau No. 924, Banjar 19488, Riau', '(+62) 706 0239 2910', 'rachel.mardhiyah@example.org', '$2y$12$CUMHfs/oAhNp60AUjxpYieQcxIXfFjcvFDYAJRDM.SgQ.B1j6tLqC', 'Tania Suartini S.Psi', 'cakrajiya.firgantoro@example.net', '0676 1228 2326', 1, 65, 1, 2, 1, '2025-11-10 09:27:50', '2025-11-10 09:27:50', 'active'),
	(34, 2, 'Setya Wibowo', 'Kpg. Juanda No. 804, Magelang 44928, DKI', '0647 0064 603', 'maryanto.pertiwi@example.com', '$2y$12$87JNaMhtFSJDDyQX2tMTze/Q4rmGw3lvveVRwbXh9.X18l9lFyjNy', 'Harjasa Napitupulu', 'prasetyo.rahmawati@example.net', '0793 1573 951', 3, 35, 3, 2, 2, '2025-11-10 09:27:50', '2025-11-10 09:27:50', 'ditolak'),
	(35, 2, 'Eva Cinthia Winarsih S.Pd', 'Ds. Abdul. Muis No. 869, Parepare 30124, Riau', '0366 8365 860', 'clara10@example.net', '$2y$12$zYYPJKFRgCojg/EFNvbCiONwGG5GUfmPILJlMkId6cHTPStls4P2C', 'Azalea Ulva Laksmiwati S.Psi', 'siregar.vanesa@example.net', '(+62) 328 8705 249', 1, 32, 3, 1, 3, '2025-11-10 09:27:50', '2025-11-10 09:27:50', 'pending'),
	(36, 2, 'Tira Laksmiwati', 'Jr. Flores No. 558, Yogyakarta 89844, Sumut', '0505 3253 649', 'shania.anggraini@example.com', '$2y$12$Am3rlOl51X0tE63CB4TbdeWqqh/MqjaHKbE0S9QXmtmhfUx2AOFDq', 'Adhiarja Manullang S.Sos', 'gunarto.wahyu@example.net', '0356 3925 934', 1, 30, 3, 2, 1, '2025-11-10 09:27:51', '2025-11-10 09:27:51', 'active'),
	(37, 2, 'Dimaz Hidayat', 'Gg. Jamika No. 533, Pontianak 72574, Banten', '0811 9844 473', 'rahmi.rahimah@example.net', '$2y$12$FXabWlbaZGBkBAmZEg/u8efhb9EA4di9LbmKJNH7R.s5KjyEZbSFi', 'Mulya Mandala', 'jinawi.uwais@example.org', '0566 3483 040', 3, 56, 3, 1, 3, '2025-11-10 09:27:51', '2025-11-10 09:27:51', 'pending'),
	(38, 2, 'Amelia Maimunah Puspita M.TI.', 'Dk. Bambon No. 76, Probolinggo 55477, Malut', '0470 5554 752', 'manullang.natalia@example.net', '$2y$12$CigUklJqEuKUVKSkt60lTO0QfppRy9lTm38prkxJaLePF6oigc.PC', 'Hana Widiastuti S.H.', 'puti.riyanti@example.org', '0343 4687 624', 1, 32, 1, 2, 3, '2025-11-10 09:27:52', '2025-11-10 09:27:52', 'active'),
	(39, 2, 'Tami Maya Hastuti', 'Gg. Padang No. 622, Bukittinggi 31747, Jateng', '0457 6699 3368', 'susanti.aisyah@example.com', '$2y$12$6P4al.TiKnBe8ESQ5oSc9./eoCN.AeBa7hkUqc.qM6Po67NQsypmu', 'Nadine Padmasari', 'zrajasa@example.net', '029 1839 073', 2, 51, 2, 2, 3, '2025-11-10 09:27:52', '2025-11-10 09:27:52', 'active'),
	(40, 2, 'Kunthara Teguh Hutapea M.Kom.', 'Gg. Rajawali Timur No. 73, Dumai 37883, DKI', '0769 3980 487', 'daruna.sirait@example.net', '$2y$12$K4.SuBHRmEOiXMB9kztwI.TMdqhIDkduo6d0MC5Z0suSMIjWOK17.', 'Widya Nurdiyanti', 'wwibisono@example.com', '0668 6938 0108', 1, 45, 3, 1, 3, '2025-11-10 09:27:53', '2025-11-10 09:27:53', 'active');

-- Dumping structure for table website-bimbel.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `path_image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_student` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.reviews: ~0 rows (approximately)
DELETE FROM `reviews`;
INSERT INTO `reviews` (`id`, `path_image`, `name_student`, `school`, `review_text`, `created_at`, `updated_at`) VALUES
	(1, 'review1.jpg', 'Argono Hidayanto S.E.I', 'PJ Namaga Wahyuni', 'Voluptatum eligendi voluptatem facere ut quia possimus omnis nihil.', '2025-11-10 09:26:27', '2025-11-10 09:26:27'),
	(2, 'review2.jpg', 'Jaswadi Tampubolon', 'PD Latupono (Persero) Tbk', 'Aut harum aut voluptas quia soluta quidem qui quos rerum est ad.', '2025-11-10 09:26:27', '2025-11-10 09:26:27'),
	(3, 'review3.jpg', 'Panji Abyasa Saefullah', 'PJ Anggriawan Tbk', 'Neque voluptatem numquam qui accusamus facilis pariatur dolorum pariatur quia.', '2025-11-10 09:26:27', '2025-11-10 09:26:27'),
	(4, 'review4.jpg', 'Edi Siregar', 'Fa Melani Kusumo (Persero) Tbk', 'Vitae qui esse aut necessitatibus cum ratione eaque omnis et eius.', '2025-11-10 09:26:27', '2025-11-10 09:26:27'),
	(5, 'review5.jpg', 'Raisa Suryatmi', 'PT Suartini Hasanah', 'Est placeat rerum repellendus similique veniam voluptas provident nisi sed aspernatur.', '2025-11-10 09:26:27', '2025-11-10 09:26:27'),
	(6, 'review6.jpg', 'Jessica Puspasari', 'PT Mardhiyah Padmasari', 'Aliquid debitis autem consequatur qui odit magni.', '2025-11-10 09:26:27', '2025-11-10 09:26:27'),
	(7, 'review7.jpg', 'Talia Kusmawati S.Gz', 'PT Novitasari', 'Nam dicta sed quis amet illo ipsa est quasi quo sed qui qui.', '2025-11-10 09:26:27', '2025-11-10 09:26:27'),
	(8, 'review8.jpg', 'Latika Wulan Aryani', 'Perum Lailasari Safitri', 'Possimus dolorem quia molestiae consequatur aut possimus est quia reiciendis eius inventore debitis vel.', '2025-11-10 09:26:27', '2025-11-10 09:26:27'),
	(9, 'review9.jpg', 'Embuh Wahyudin', 'PT Irawan Tbk', 'At et a consequatur sunt soluta dolorum ut eveniet earum harum.', '2025-11-10 09:26:27', '2025-11-10 09:26:27');

-- Dumping structure for table website-bimbel.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.roles: ~0 rows (approximately)
DELETE FROM `roles`;
INSERT INTO `roles` (`id`, `name_role`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', '2025-11-10 09:15:39', '2025-11-10 09:15:39'),
	(2, 'Siswa', '2025-11-10 09:15:40', '2025-11-10 09:15:40'),
	(3, 'Admin', '2025-11-10 09:17:01', '2025-11-10 09:17:01'),
	(4, 'Siswa', '2025-11-10 09:17:01', '2025-11-10 09:17:01'),
	(5, 'Admin', '2025-11-10 09:26:10', '2025-11-10 09:26:10'),
	(6, 'Siswa', '2025-11-10 09:26:10', '2025-11-10 09:26:10'),
	(7, 'Admin', '2025-11-10 09:27:36', '2025-11-10 09:27:36'),
	(8, 'Siswa', '2025-11-10 09:27:36', '2025-11-10 09:27:36');

-- Dumping structure for table website-bimbel.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `levels_id` bigint unsigned NOT NULL,
  `class_id` bigint unsigned DEFAULT NULL,
  `programs_id` bigint unsigned NOT NULL,
  `_id` bigint unsigned NOT NULL,
  `time_les_id` bigint unsigned NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_student_email_unique` (`student_email`),
  KEY `students_role_id_foreign` (`role_id`),
  KEY `students_levels_id_foreign` (`levels_id`),
  KEY `students_class_id_foreign` (`class_id`),
  KEY `students_programs_id_foreign` (`programs_id`),
  KEY `students__id_foreign` (`_id`),
  KEY `students_time_les_id_foreign` (`time_les_id`),
  CONSTRAINT `students__id_foreign` FOREIGN KEY (`_id`) REFERENCES `curriculums` (`id`) ON DELETE CASCADE,
  CONSTRAINT `students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `students_levels_id_foreign` FOREIGN KEY (`levels_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `students_programs_id_foreign` FOREIGN KEY (`programs_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `students_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `students_time_les_id_foreign` FOREIGN KEY (`time_les_id`) REFERENCES `times` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.students: ~30 rows (approximately)
DELETE FROM `students`;
INSERT INTO `students` (`id`, `role_id`, `full_name`, `address`, `phone_number`, `student_email`, `password`, `parent_name`, `parent_email`, `parent_phone`, `levels_id`, `class_id`, `programs_id`, `_id`, `time_les_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Wadi Nainggolan', 'Ds. Abang No. 182, Binjai 52673, Jatim', '(+62) 422 6774 602', 'kyuniar@example.com', '$2y$12$l7bnijaWySFu/MjHw0qgQuOad94oaulu005O1sw9hCtgYb4/fyxgS', 'Taufan Mitra Salahudin', 'paulin.maryati@example.com', '(+62) 613 5507 5027', 1, 11, 1, 1, 2, 'active', '2025-11-10 09:26:12', '2025-11-10 09:26:12'),
	(2, 2, 'Melinda Gasti Hariyah S.I.Kom', 'Ki. Bara Tambar No. 715, Kendari 16229, Jabar', '(+62) 927 9582 756', 'marpaung.jumadi@example.net', '$2y$12$uGEO9.wvpDkU5s1MWTKSlOjz4LKk8AMrjzipEUPe1XUjwzLWFGzrC', 'Karma Januar', 'gaduh.hartati@example.org', '(+62) 618 5442 374', 1, 23, 2, 2, 3, 'active', '2025-11-10 09:26:13', '2025-11-10 09:26:13'),
	(3, 2, 'Janet Wijayanti', 'Ki. Katamso No. 242, Bontang 59963, Bali', '0580 1907 5088', 'anggraini.jarwa@example.org', '$2y$12$3pyw.Yav7hqpBcwr8chSoOqyv7.lrMZIzyWpkb3KZ08DHXU4/FJgm', 'Kurnia Sinaga', 'agnes.purwanti@example.net', '0527 7332 937', 2, 19, 2, 1, 2, 'active', '2025-11-10 09:26:13', '2025-11-10 09:26:13'),
	(4, 2, 'Tami Mulyani', 'Dk. Bank Dagang Negara No. 892, Palu 23337, Babel', '0246 9457 657', 'dwibisono@example.org', '$2y$12$M2IcE/QN6H2vsE1qCK7iHeMjQTNS/mwh.5jlDJXEygLcKOTbJoVmq', 'Ibrahim Jarwi Prasetya', 'yulianti.pangestu@example.org', '(+62) 597 5366 617', 2, 19, 1, 2, 1, 'inactive', '2025-11-10 09:26:13', '2025-11-10 09:26:13'),
	(5, 2, 'Radit Marpaung', 'Psr. Jayawijaya No. 581, Cirebon 79021, Kalbar', '0665 4933 7510', 'mwulandari@example.com', '$2y$12$Yef4he/Cm.dwjIAaqFtSUuk.CXG1TKpJ32YqD0elaRQLKbCh75z9O', 'Jais Ardianto', 'xsetiawan@example.net', '(+62) 475 7601 6748', 1, 20, 3, 1, 1, 'inactive', '2025-11-10 09:26:14', '2025-11-10 09:26:14'),
	(6, 2, 'Betania Patricia Andriani S.E.I', 'Dk. Gading No. 27, Tangerang Selatan 11690, Kalbar', '(+62) 920 6845 5884', 'farhunnisa.ramadan@example.net', '$2y$12$QsQLBzSaqU14cSoOFpmNzOYXU2da7VoLLThy2AdcLGnNxm8n.4tIK', 'Bagus Mansur', 'olivia57@example.net', '(+62) 678 7783 365', 2, 25, 1, 1, 1, 'inactive', '2025-11-10 09:26:14', '2025-11-10 09:26:14'),
	(7, 2, 'Zulaikha Najwa Hariyah S.Farm', 'Dk. Jend. A. Yani No. 356, Probolinggo 72049, NTT', '(+62) 893 5072 6688', 'kajen11@example.net', '$2y$12$VBUYEDlCX7Jx4p2WYv1f6OF8HG5of9SKvJRE8R6pGw9riXT1FqYhC', 'Hendri Manullang', 'tfirmansyah@example.com', '0447 0590 9782', 1, 18, 2, 1, 1, 'inactive', '2025-11-10 09:26:15', '2025-11-10 09:26:15'),
	(8, 2, 'Nurul Mardhiyah', 'Kpg. Bawal No. 362, Pasuruan 32065, Banten', '0929 0818 0839', 'harsaya22@example.com', '$2y$12$OQxmsVYwKr9aiukdl7S3MuSaaT9mTFepw4bp.Rah0aMzfd7MIRmWe', 'Digdaya Permadi', 'galiono97@example.net', '022 8924 1994', 3, 9, 1, 1, 3, 'inactive', '2025-11-10 09:26:15', '2025-11-10 09:26:15'),
	(9, 2, 'Salwa Hassanah', 'Psr. Bhayangkara No. 352, Kendari 67244, Kaltim', '(+62) 540 5387 974', 'dagel33@example.com', '$2y$12$HUiBh17ystOoLph2tBU3JOKR5291A6Y5PcK.Cn8xxgSGebAOx/2Lm', 'Jarwi Cawisadi Tarihoran M.Ak', 'cwaskita@example.org', '027 7729 3597', 3, 28, 3, 2, 2, 'active', '2025-11-10 09:26:16', '2025-11-10 09:26:16'),
	(10, 2, 'Tugiman Surya Prasasta S.Psi', 'Gg. Baranang Siang No. 49, Balikpapan 41402, Kepri', '(+62) 440 7520 409', 'estiono10@example.net', '$2y$12$czyLVMY95ia7cR0.pqQ3D.eHBo.iBJuhu/yvAOEtnIY5XtR39wapS', 'Embuh Nababan', 'lfarida@example.net', '(+62) 391 4087 2186', 3, 20, 3, 1, 2, 'inactive', '2025-11-10 09:26:16', '2025-11-10 09:26:16'),
	(11, 2, 'Kiandra Laila Hassanah S.T.', 'Gg. Pintu Besar Selatan No. 487, Kupang 48491, Kalbar', '(+62) 803 7852 316', 'kasiran86@example.net', '$2y$12$X0.ZcCAF90U8F5EAn7tNUOy/kqIUzlcM2wgSG7qGF9q2M8PHaiBVy', 'Kadir Sidiq Habibi', 'garan14@example.org', '0421 8345 7572', 2, 26, 1, 2, 3, 'inactive', '2025-11-10 09:26:16', '2025-11-10 09:26:16'),
	(12, 2, 'Nasrullah Nashiruddin', 'Dk. Siliwangi No. 895, Pekalongan 21698, Malut', '029 3885 6435', 'gwidiastuti@example.com', '$2y$12$SSO1QPkIeUYkmfnT5VyFy.aiMZ.cCdhMiKUBS/kjls7Y8lAx/ir7a', 'Ikin Winarno', 'zmandala@example.com', '0418 1344 591', 2, 20, 3, 2, 2, 'active', '2025-11-10 09:26:17', '2025-11-10 09:26:17'),
	(13, 2, 'Garda Tampubolon', 'Jr. Zamrud No. 696, Makassar 74472, Sulsel', '(+62) 986 7341 1040', 'rahayu.wahyu@example.org', '$2y$12$CDlweWeS1NcEfR6vhJFrcu/zyN7LQOJVMO6y/kJL.ZMcW5LKM24KK', 'Wage Sirait', 'hutapea.kawaya@example.org', '(+62) 461 5283 4694', 1, 20, 1, 1, 2, 'inactive', '2025-11-10 09:26:17', '2025-11-10 09:26:17'),
	(14, 2, 'Unjani Wulan Maryati S.Farm', 'Dk. Yap Tjwan Bing No. 59, Dumai 57231, Jateng', '(+62) 387 4401 0876', 'santoso.catur@example.net', '$2y$12$ggH1pXKGqVUsI3NgWaUq0epk/XHEE.3QkYRJE4jFgTX8DzAi2R0Ku', 'Muni Rajata', 'xdamanik@example.org', '(+62) 247 6733 046', 1, 28, 1, 2, 3, 'inactive', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(15, 2, 'Nugraha Sinaga', 'Dk. Gotong Royong No. 980, Kediri 21114, Banten', '(+62) 683 4823 998', 'lala75@example.net', '$2y$12$FQqZ7aA7jGUgn6Wtv2lw1OzbYUkr6.Vv9mZadUUNb/n9tu0PWdIP6', 'Kambali Estiono Latupono', 'ajiman.maryadi@example.com', '(+62) 748 6882 981', 3, 3, 2, 2, 2, 'active', '2025-11-10 09:26:18', '2025-11-10 09:26:18'),
	(16, 2, 'Karen Kartika Widiastuti', 'Gg. Yogyakarta No. 803, Banjarbaru 47853, Bengkulu', '0662 4842 6124', 'yuniar.nadia@example.com', '$2y$12$Rlk.Kr9QCvdd0205loZsYuHNcDf7pZPTiK7EZExRHRa0lkW4/W1I6', 'Cager Prabowo M.M.', 'anggabaya.wijaya@example.com', '(+62) 626 9566 7114', 3, 19, 3, 1, 3, 'inactive', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(17, 2, 'Belinda Melani', 'Ki. Nangka No. 509, Singkawang 79681, Riau', '0689 4690 7546', 'azalea69@example.com', '$2y$12$CyIW/IOmekP5yx7tAR/sq.E9TCGOMVZTd4qNmTLYTn8oMc7AW0eXi', 'Karma Mandala', 'karna.zulaika@example.net', '0797 3058 2704', 3, 56, 2, 2, 1, 'inactive', '2025-11-10 09:27:39', '2025-11-10 09:27:39'),
	(18, 2, 'Yuliana Laksmiwati', 'Dk. Basmol Raya No. 226, Sungai Penuh 38188, Sulsel', '(+62) 564 5875 2649', 'qsitumorang@example.com', '$2y$12$692Lh.XAXSe6K3EWQh27G.qTZhFKIWndKKEyPfUl2ObcsBdxuwhza', 'Gambira Eman Kusumo S.T.', 'mandasari.paulin@example.net', '(+62) 23 8738 225', 3, 26, 3, 1, 1, 'inactive', '2025-11-10 09:27:39', '2025-11-10 09:27:39'),
	(19, 2, 'Karimah Rahayu', 'Jr. Astana Anyar No. 763, Probolinggo 90987, Kalteng', '(+62) 713 2495 851', 'sabri04@example.net', '$2y$12$fAhW3B0yIpfjl5vHmhUzKelUT7gFTGaYk8RlkXVSmR5oLlwaejV6K', 'Adinata Irawan', 'vlatupono@example.com', '(+62) 586 6137 473', 2, 38, 3, 2, 3, 'active', '2025-11-10 09:27:39', '2025-11-10 09:27:39'),
	(20, 2, 'Ajeng Safitri', 'Ki. Sudirman No. 414, Denpasar 88877, Babel', '0872 3878 4169', 'devi04@example.net', '$2y$12$7BdTtwilGIAYqYuqRXi/nO8uTWTlTdb7sHoZ6xefTjGwKm4C2X192', 'Cahyanto Ismail Sihombing S.Ked', 'plailasari@example.org', '(+62) 468 5243 853', 1, 64, 1, 2, 2, 'inactive', '2025-11-10 09:27:40', '2025-11-10 09:27:40'),
	(21, 2, 'Bahuwarna Wibowo', 'Gg. Ekonomi No. 287, Denpasar 93321, Bali', '(+62) 897 757 440', 'prasetyo.mandasari@example.org', '$2y$12$sJ7qBK80/WRD1Anos3blueHbld8O4ATWm2cKkmNyql/PctqDHtrVC', 'Galih Anggriawan', 'raharja41@example.org', '(+62) 471 7853 7114', 1, 20, 2, 1, 2, 'active', '2025-11-10 09:27:40', '2025-11-10 09:27:40'),
	(22, 2, 'Kusuma Damanik', 'Ki. Kali No. 380, Palembang 24701, Papua', '(+62) 884 907 316', 'mujur27@example.com', '$2y$12$rRTUyoE5Sk.leRz9Rhrcp.5sMDXuW9GIxbUPRzbKvVWUsKm8W2C/m', 'Dacin Salahudin S.IP', 'zalindra.prabowo@example.net', '0396 9106 3827', 1, 55, 3, 1, 3, 'active', '2025-11-10 09:27:41', '2025-11-10 09:27:41'),
	(23, 2, 'Raina Gilda Safitri', 'Ds. Yogyakarta No. 218, Jambi 87362, Bengkulu', '(+62) 801 8282 4599', 'aisyah.hutagalung@example.org', '$2y$12$IZhklTVUHV.lXQkco0Co4O9y7zNWxb6xNqxr8A1OCKw5Npq7QGHBG', 'Embuh Hutapea', 'palastri.hartana@example.com', '0969 6463 8944', 2, 43, 2, 1, 3, 'inactive', '2025-11-10 09:27:41', '2025-11-10 09:27:41'),
	(24, 2, 'Jaswadi Widodo', 'Jr. Orang No. 69, Sabang 28847, Sumut', '0552 7476 3529', 'narpati.nugraha@example.org', '$2y$12$GVRQpv3MbLF7ZDWvTa.7ueR.IJ/hvoo3x0F4xsdvorjo16R1sbudy', 'Gambira Firmansyah', 'unjani.natsir@example.com', '(+62) 528 0025 4497', 3, 63, 3, 2, 2, 'inactive', '2025-11-10 09:27:42', '2025-11-10 09:27:42'),
	(25, 2, 'Emil Haryanto', 'Jln. Suryo Pranoto No. 976, Sorong 95363, Kaltim', '0991 3057 166', 'kamaria96@example.org', '$2y$12$N8b4AVYY0X4LLw1fYbr2SeVzK1yz5t8eTlLstvO7XJxJxsHGHF7yW', 'Umaya Daliman Hutagalung S.Sos', 'jaka.permata@example.org', '(+62) 944 2320 733', 3, 67, 1, 1, 2, 'inactive', '2025-11-10 09:27:42', '2025-11-10 09:27:42'),
	(26, 2, 'Baktianto Hutasoit S.Farm', 'Jr. Abdul. Muis No. 761, Payakumbuh 23768, DIY', '0525 9141 393', 'kamal.puspasari@example.net', '$2y$12$0hM54XNBLKirjU8qsUcuE.aNR8usHvDLtlGnPz8WhBderLs.TWBv6', 'Chandra Mulyanto Dabukke S.Gz', 'melani.silvia@example.com', '(+62) 723 2783 8412', 1, 19, 1, 1, 2, 'active', '2025-11-10 09:27:42', '2025-11-10 09:27:42'),
	(27, 2, 'Hana Oktaviani', 'Psr. Moch. Yamin No. 834, Ternate 73981, Sultra', '(+62) 331 8216 704', 'nyulianti@example.com', '$2y$12$CaJuoWR/f4nXUyPm4mJ82.VvlodOrtAMNPK3xbvz9Sns2tOqpYi5y', 'Cahyanto Sihombing S.Gz', 'jatmiko.haryanti@example.com', '0241 9729 3551', 3, 51, 1, 2, 3, 'inactive', '2025-11-10 09:27:43', '2025-11-10 09:27:43'),
	(28, 2, 'Ira Nuraini S.Sos', 'Kpg. Pacuan Kuda No. 887, Padang 88139, Sumut', '0466 6309 3515', 'wulandari.baktianto@example.org', '$2y$12$I1J.IrtiiTEFxbzegmsJ.erjFeFYUr.caj6Niwl3zRJOpyUFRUf2C', 'Bakiono Natsir', 'suci13@example.com', '0358 5509 624', 1, 12, 1, 1, 3, 'inactive', '2025-11-10 09:27:43', '2025-11-10 09:27:43'),
	(29, 2, 'Rini Zelda Puspita', 'Gg. BKR No. 548, Binjai 99618, Babel', '(+62) 797 6423 9506', 'yuliarti.qori@example.net', '$2y$12$nIHxPCy8FtqsljHCTQ6abOfHeWShDcq/jhOOPMqUDwuA3qeGhE45q', 'Kariman Salahudin', 'aris18@example.net', '(+62) 23 9667 5966', 1, 66, 2, 1, 1, 'inactive', '2025-11-10 09:27:44', '2025-11-10 09:27:44'),
	(30, 2, 'Zelda Hasanah', 'Jr. Yogyakarta No. 859, Pekalongan 46543, Lampung', '(+62) 719 8366 537', 'mardhiyah.mutia@example.net', '$2y$12$3UQCZAr3ysvRK3Uiddz16OhiJy.zxiJy2yQ4e4bK9qX7CnZcqLLWi', 'Dwi Rajata S.Sos', 'iprastuti@example.org', '0816 744 677', 3, 2, 2, 2, 2, 'active', '2025-11-10 09:27:44', '2025-11-10 09:27:44');

-- Dumping structure for table website-bimbel.times
CREATE TABLE IF NOT EXISTS `times` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.times: ~0 rows (approximately)
DELETE FROM `times`;
INSERT INTO `times` (`id`, `name_time`, `created_at`, `updated_at`) VALUES
	(1, 'Pagi (08:00-10:00)', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(2, 'Siang (13:00-15:00)', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(3, 'Sore (16:00-18:00)', '2025-11-10 09:26:11', '2025-11-10 09:26:11'),
	(4, 'Pagi (08:00-10:00)', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(5, 'Siang (13:00-15:00)', '2025-11-10 09:27:38', '2025-11-10 09:27:38'),
	(6, 'Sore (16:00-18:00)', '2025-11-10 09:27:38', '2025-11-10 09:27:38');

-- Dumping structure for table website-bimbel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.users: ~0 rows (approximately)
DELETE FROM `users`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
