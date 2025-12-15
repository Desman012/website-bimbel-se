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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.absents: ~10 rows (approximately)
DELETE FROM `absents`;
INSERT INTO `absents` (`id`, `student_id`, `date`, `attendance_status`, `created_at`, `updated_at`) VALUES
	(1, 1, '2025-11-22', 'present', NULL, NULL),
	(2, 2, '2025-11-21', 'present', NULL, NULL),
	(3, 3, '2025-11-20', 'present', NULL, NULL),
	(4, 4, '2025-11-19', 'present', NULL, NULL),
	(5, 5, '2025-11-18', 'present', NULL, NULL),
	(6, 6, '2025-11-17', 'present', NULL, NULL),
	(7, 7, '2025-11-16', 'present', NULL, NULL),
	(8, 8, '2025-11-15', 'present', NULL, NULL),
	(9, 9, '2025-11-14', 'present', NULL, NULL),
	(10, 10, '2025-11-13', 'present', NULL, NULL);

-- Dumping structure for table website-bimbel.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  KEY `admins_role_id_foreign` (`role_id`),
  CONSTRAINT `admins_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.admins: ~5 rows (approximately)
DELETE FROM `admins`;
INSERT INTO `admins` (`id`, `role_id`, `full_name`, `address`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
	(2, 1, 'Cengkal Winarno', 'Ki. Imam Bonjol No. 346, Padangpanjang 92920, Kalteng', 'unjani.pratiwi@example.org', '$2y$12$UO6rj.M23snmAj6Hg1SNRObY9Clt7V.LZcAOM1IE52ONf55PWUFV2', 'active', NULL, NULL),
	(3, 1, 'Jaswadi Dariati Pratama S.Pd', 'Dk. Basmol Raya No. 145, Tomohon 39343, Bengkulu', 'dandriani@example.org', '$2y$12$W79/EuA9doczatjN3VEn0ugZcmyvvDQxRoIJcGFpv6Bnj0Eh56uB6', 'active', NULL, NULL),
	(4, 1, 'Devi Fujiati', 'Jr. HOS. Cjokroaminoto (Pasirkaliki) No. 814, Administrasi Jakarta Selatan 20848, Malut', 'dhabibi@example.org', '$2y$12$P4T4NNRDhlKTMjR8nmxi.uGzgeVeAYhw.1pOzOXsEJxUlvoNqpRhS', 'active', NULL, NULL),
	(5, 1, 'Kenes Mustofa', 'Gg. Ciumbuleuit No. 265, Batam 99924, NTB', 'titi64@example.com', '$2y$12$az2BMxxBIqt1kwFU3FEjXOZElOHuBJqn7iUieDFV6r2JEo1lW4qLK', 'active', NULL, NULL);

-- Dumping structure for table website-bimbel.classes
CREATE TABLE IF NOT EXISTS `classes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `level_id` bigint unsigned NOT NULL,
  `name_class` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_per_week` tinyint unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classes_level_id_foreign` (`level_id`),
  CONSTRAINT `classes_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.classes: ~12 rows (approximately)
DELETE FROM `classes`;
INSERT INTO `classes` (`id`, `level_id`, `name_class`, `meeting_per_week`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Kelas 1', 1, NULL, NULL),
	(2, 1, 'Kelas 2', 1, NULL, NULL),
	(3, 1, 'Kelas 3', 1, NULL, NULL),
	(4, 1, 'Kelas 4', 1, NULL, NULL),
	(5, 1, 'Kelas 5', 1, NULL, NULL),
	(6, 1, 'Kelas 6', 1, NULL, NULL),
	(7, 2, 'Kelas 1', 1, NULL, NULL),
	(8, 2, 'Kelas 2', 1, NULL, NULL),
	(9, 2, 'Kelas 3', 1, NULL, NULL),
	(10, 3, 'Kelas 1', 1, NULL, NULL),
	(11, 3, 'Kelas 2', 1, NULL, NULL),
	(12, 3, 'Kelas 3', 1, NULL, NULL);

-- Dumping structure for table website-bimbel.curriculums
CREATE TABLE IF NOT EXISTS `curriculums` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_curriculum` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.curriculums: ~4 rows (approximately)
DELETE FROM `curriculums`;
INSERT INTO `curriculums` (`id`, `name_curriculum`, `created_at`, `updated_at`) VALUES
	(1, 'K13', NULL, NULL),
	(2, 'K13 Revisi', NULL, NULL),
	(3, 'Merdeka', NULL, NULL),
	(4, 'Merdeka Revisi', NULL, NULL);

-- Dumping structure for table website-bimbel.days
CREATE TABLE IF NOT EXISTS `days` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.days: ~6 rows (approximately)
DELETE FROM `days`;
INSERT INTO `days` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Senin', NULL, NULL),
	(2, 'Selasa', NULL, NULL),
	(3, 'Rabu', NULL, NULL),
	(4, 'Kamis', NULL, NULL),
	(5, 'Jumat', NULL, NULL),
	(6, 'Sabtu', NULL, NULL);

-- Dumping structure for table website-bimbel.day_time
CREATE TABLE IF NOT EXISTS `day_time` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_class` bigint unsigned DEFAULT NULL,
  `day_id` bigint unsigned NOT NULL,
  `time_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `day_time_day_id_foreign` (`day_id`),
  KEY `day_time_time_id_foreign` (`time_id`),
  KEY `day_time_id_class_foreign` (`id_class`),
  CONSTRAINT `day_time_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE,
  CONSTRAINT `day_time_id_class_foreign` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `day_time_time_id_foreign` FOREIGN KEY (`time_id`) REFERENCES `times` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.day_time: ~18 rows (approximately)
DELETE FROM `day_time`;
INSERT INTO `day_time` (`id`, `id_class`, `day_id`, `time_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, NULL, NULL),
	(2, 12, 1, 2, NULL, NULL),
	(3, 3, 1, 3, NULL, NULL),
	(4, 12, 2, 1, NULL, NULL),
	(5, 2, 2, 2, NULL, NULL),
	(6, 11, 2, 3, NULL, NULL),
	(7, 9, 3, 1, NULL, NULL),
	(8, 4, 3, 2, NULL, NULL),
	(9, 7, 3, 3, NULL, NULL),
	(10, 7, 4, 1, NULL, NULL),
	(11, 2, 4, 2, NULL, NULL),
	(12, 12, 4, 3, NULL, NULL),
	(13, 1, 5, 1, NULL, NULL),
	(14, 3, 5, 2, NULL, NULL),
	(15, 5, 5, 3, NULL, NULL),
	(16, 7, 6, 1, NULL, NULL),
	(17, 7, 6, 2, NULL, NULL),
	(18, 9, 6, 3, NULL, NULL);

-- Dumping structure for table website-bimbel.facilities
CREATE TABLE IF NOT EXISTS `facilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_facilities` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.facilities: ~5 rows (approximately)
DELETE FROM `facilities`;
INSERT INTO `facilities` (`id`, `name_facilities`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Ruang Kelas Nyaman', 'Fasilitas Ruang Kelas Nyaman tersedia untuk mendukung proses belajar.', '2025-11-23 22:43:10', '2025-11-23 22:43:10'),
	(2, 'Perpustakaan Mini', 'Fasilitas Perpustakaan Mini tersedia untuk mendukung proses belajar.', '2025-11-23 22:43:10', '2025-11-23 22:43:10'),
	(3, 'Proyektor', 'Fasilitas Proyektor tersedia untuk mendukung proses belajar.', '2025-11-23 22:43:10', '2025-11-23 22:43:10'),
	(4, 'Pendingin Ruangan', 'Fasilitas Pendingin Ruangan tersedia untuk mendukung proses belajar.', '2025-11-23 22:43:10', '2025-11-23 22:43:10'),
	(5, 'Area Tunggu Orang Tua', 'Fasilitas Area Tunggu Orang Tua tersedia untuk mendukung proses belajar.', '2025-11-23 22:43:10', '2025-11-23 22:43:10');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.levels: ~4 rows (approximately)
DELETE FROM `levels`;
INSERT INTO `levels` (`id`, `name_level`, `created_at`, `updated_at`) VALUES
	(1, 'SD', NULL, NULL),
	(2, 'SMP', NULL, NULL),
	(3, 'SMA', NULL, NULL),
	(4, 'TKA', NULL, NULL);

-- Dumping structure for table website-bimbel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.migrations: ~0 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2025_11_03_160727_roles', 1),
	(7, '2025_11_03_161410_admins', 1),
	(8, '2025_11_03_163423_levels', 1),
	(9, '2025_11_03_163700_programs', 1),
	(10, '2025_11_03_163916_classes', 1),
	(11, '2025_11_03_164216_prices', 1),
	(12, '2025_11_03_164538_times', 1),
	(13, '2025_11_03_164846_curriculums', 1),
	(14, '2025_11_03_164946_students', 1),
	(15, '2025_11_03_165058_payments', 1),
	(16, '2025_11_03_165220_absents', 1),
	(17, '2025_11_03_174918_regitrations', 1),
	(18, '2025_11_09_101518_create_table_reviews', 1),
	(19, '2025_11_09_182742_create_table_facilities', 1),
	(20, '2025_11_10_161951_update_table_classes', 1),
	(21, '2025_11_10_185430_make_password_nullable_in_admins_table', 1),
	(22, '2025_11_11_002850_update_registration_add_column_payment', 1),
	(23, '2025_11_20_023236_create_password_resets_table', 1),
	(24, '2025_11_23_142705_add_times_in_out_to_times_table', 1),
	(25, '2025_11_23_143824_days', 1),
	(26, '2025_11_23_144035_day_time', 1),
	(27, '2025_11_23_144228_create_student_schedules', 1),
	(28, '2025_11_23_144835_add_meeting_per_week_to_classes_table', 1),
	(29, '2025_11_23_145510_update_status_enum_in_payments_table', 1),
	(30, '2025_11_23_152445_change_column_curriculum_students_table', 1),
	(31, '2025_11_23_160624_remove_times_les_id_from_students_table', 1),
	(32, '2025_11_23_161116_change_table_registration', 1),
	(33, '2025_11_23_162320_remove_times_les_id_from_registrations_table', 1),
	(34, '2025_11_23_184741_add_column_day_time_table', 1),
	(35, '2025_11_28_133945_add_column_reason_registrations_table', 2),
	(36, '2025_11_28_134646_create_schedule_registrations_student_table', 2),
	(37, '2025_11_30_220848_delete_column_path_image_reviews_table', 3);

-- Dumping structure for table website-bimbel.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.password_resets: ~1 rows (approximately)
DELETE FROM `password_resets`;

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
  `status` enum('unpaid','pending','verified','rejected') COLLATE utf8mb4_unicode_ci DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_student_id_foreign` (`student_id`),
  KEY `payments_admin_id_foreign` (`admin_id`),
  CONSTRAINT `payments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.payments: ~11 rows (approximately)
DELETE FROM `payments`;
INSERT INTO `payments` (`id`, `student_id`, `admin_id`, `month`, `amount_paid`, `payment_proof`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, 'Januari', 276635.00, 'proof.jpg', 'verified', NULL, NULL),
	(2, 2, NULL, 'Januari', 316793.00, 'proof.jpg', 'verified', NULL, NULL),
	(3, 3, NULL, 'Januari', 209621.00, 'proof.jpg', 'verified', NULL, NULL),
	(4, 4, NULL, 'Januari', 270668.00, 'proof.jpg', 'verified', NULL, NULL),
	(5, 5, NULL, 'Januari', 232375.00, 'proof.jpg', 'verified', NULL, NULL),
	(6, 6, NULL, 'Januari', 321906.00, 'proof.jpg', 'verified', NULL, NULL),
	(7, 7, NULL, 'Januari', 294918.00, 'proof.jpg', 'verified', NULL, NULL),
	(8, 8, NULL, 'Januari', 250808.00, 'proof.jpg', 'verified', NULL, NULL),
	(9, 9, NULL, 'Januari', 202082.00, 'proof.jpg', 'verified', NULL, NULL),
	(10, 10, NULL, 'Januari', 300991.00, 'proof.jpg', 'verified', NULL, NULL),
	(21, 26, 2, 'November', 200000.00, 'payment_proofs/c81IHA8ZB5AQhoKXtzxXDMTK5s9F98ojwqv0ATN0.png', 'verified', '2025-11-28 11:01:50', '2025-11-28 11:01:50'),
	(22, 1, 2, 'November 2025', 200000.00, 'bukti_pembayaran/aCLDLGNG8CLXairXysm2EIpsy18LWGYW1JIiyqUW.png', 'pending', '2025-11-30 14:16:45', '2025-12-01 22:21:42');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.prices: ~13 rows (approximately)
DELETE FROM `prices`;
INSERT INTO `prices` (`id`, `level_id`, `class_id`, `price`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 200000.00, NULL, NULL),
	(2, 1, 2, 200000.00, NULL, NULL),
	(3, 1, 3, 200000.00, NULL, NULL),
	(4, 1, 4, 200000.00, NULL, NULL),
	(5, 1, 5, 250000.00, NULL, NULL),
	(6, 1, 6, 250000.00, NULL, NULL),
	(7, 2, 7, 300000.00, NULL, NULL),
	(8, 2, 8, 300000.00, NULL, NULL),
	(9, 2, 9, 300000.00, NULL, NULL),
	(10, 3, 10, 350000.00, NULL, NULL),
	(11, 3, 11, 350000.00, NULL, NULL),
	(12, 3, 12, 350000.00, NULL, NULL),
	(13, 4, NULL, 200000.00, NULL, NULL);

-- Dumping structure for table website-bimbel.programs
CREATE TABLE IF NOT EXISTS `programs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_program` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.programs: ~3 rows (approximately)
DELETE FROM `programs`;
INSERT INTO `programs` (`id`, `name_program`, `created_at`, `updated_at`) VALUES
	(1, 'Bimbel', NULL, NULL),
	(2, 'Private', NULL, NULL),
	(3, 'Try Out', NULL, NULL);

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
  `curriculum_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','active','inactive','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `month` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_paid` decimal(8,2) DEFAULT NULL,
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `registrations_student_email_unique` (`student_email`),
  KEY `registrations_role_id_foreign` (`role_id`),
  KEY `registrations_levels_id_foreign` (`levels_id`),
  KEY `registrations_class_id_foreign` (`class_id`),
  KEY `registrations_programs_id_foreign` (`programs_id`),
  KEY `registrations__id_foreign` (`curriculum_id`),
  CONSTRAINT `registrations__id_foreign` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculums` (`id`) ON DELETE CASCADE,
  CONSTRAINT `registrations_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `registrations_levels_id_foreign` FOREIGN KEY (`levels_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `registrations_programs_id_foreign` FOREIGN KEY (`programs_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `registrations_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.registrations: ~11 rows (approximately)
DELETE FROM `registrations`;
INSERT INTO `registrations` (`id`, `role_id`, `full_name`, `address`, `phone_number`, `student_email`, `password`, `parent_name`, `parent_email`, `parent_phone`, `levels_id`, `class_id`, `programs_id`, `curriculum_id`, `created_at`, `updated_at`, `status`, `month`, `amount_paid`, `payment_proof`, `reason`) VALUES
	(1, 2, 'Rachel Farhunnisa Nurdiyanti S.H.', 'Gg. Achmad Yani No. 715, Tasikmalaya 52915, Kepri', '08634895382', 'alika09@example.net', '$2y$12$CNjoYXovZu8QGfbqjhovReXMDQLmCWr/VuXtIkxJlEvktXniFB5E6', 'Zulfa Astuti', 'hfirmansyah@example.org', '08349742845', 3, 2, 3, 3, NULL, NULL, 'pending', 'Januari', 276635.00, NULL, NULL),
	(2, 2, 'Vivi Anggraini', 'Ds. Gardujati No. 677, Padangsidempuan 12682, Sulut', '08443057087', 'nabila44@example.com', '$2y$12$IluQZgYeRV8GxshkfYSLS.A3/OuYehgCOmrb3ONMK.1HnxRD4PlD2', 'Rini Agustina', 'chutagalung@example.com', '08880313018', 4, 11, 3, 4, NULL, NULL, 'pending', 'Januari', 276635.00, NULL, NULL),
	(3, 2, 'Galang Cakrabirawa Prasasta S.Psi', 'Kpg. Badak No. 231, Singkawang 17981, NTB', '08121908812', 'harjo46@example.net', '$2y$12$0tOZ7rohuAN1Hc9q2by26.LGs.U7FIHlT2ayubAKNwghT3ViDMNR2', 'Ismail Natsir S.Pd', 'bala00@example.net', '08061556029', 3, 11, 1, 4, NULL, NULL, 'pending', 'Januari', 321906.00, NULL, NULL),
	(4, 2, 'Maria Nasyidah', 'Kpg. Untung Suropati No. 522, Lubuklinggau 17108, Malut', '08086260177', 'hardiansyah.nadine@example.org', '$2y$12$5BH9WjcDlrHdGXp5AhAWVurRh2REjgTF5Ffu6A/ZwuvVf8zGfSqOm', 'Azalea Nurdiyanti', 'raina35@example.org', '08541804885', 1, 1, 1, 1, NULL, NULL, 'pending', 'Januari', 209621.00, NULL, NULL),
	(5, 2, 'Sidiq Kamidin Samosir', 'Psr. Baranang Siang No. 881, Kupang 60248, Lampung', '08460643826', 'ylestari@example.org', '$2y$12$IlpAFq38qDjrXCSYqz7SY.RH1tgwazWcb7.JxqNRnM0jO5nV7Oycm', 'Ajiono Kanda Situmorang', 'hesti.sinaga@example.net', '08823874675', 1, 5, 3, 4, NULL, NULL, 'pending', 'Januari', 276635.00, NULL, NULL),
	(6, 2, 'Jumari Nainggolan', 'Gg. Raya Setiabudhi No. 825, Cimahi 22020, Kaltara', '08789436424', 'prastuti.rahmat@example.net', '$2y$12$h7DH7m7WC2.BhRtLYGAQ8uZwUlmK1tVpzGWfbjobdgcRSF8j4aN/2', 'Cakrawala Ridwan Budiman', 'tomi16@example.com', '08928152314', 1, 12, 2, 4, NULL, NULL, 'pending', 'Januari', 300991.00, NULL, NULL),
	(7, 2, 'Ibrani Jatmiko Lazuardi', 'Psr. Bah Jaya No. 340, Blitar 17527, Bengkulu', '08067765701', 'syahrini.wibisono@example.org', '$2y$12$RGsbfmGTbXjdXlMBQYARluXSuiljows2UXlbdAFx7c9OdhOYKpA/G', 'Zamira Agustina', 'prastuti.winda@example.net', '08967482337', 3, 11, 1, 4, NULL, NULL, 'pending', 'Januari', 270668.00, NULL, NULL),
	(8, 2, 'Hartaka Hutasoit', 'Dk. Flora No. 928, Jambi 94367, Jabar', '08655971875', 'efirgantoro@example.org', '$2y$12$h8i7WyD0dExfQDf8cgZOPeGLBlLt26lHVNexG0tiFG62EXokRnBUK', 'Farah Sudiati', 'xmarpaung@example.org', '08545285638', 1, 11, 2, 1, NULL, NULL, 'pending', 'Januari', 321906.00, NULL, NULL),
	(9, 2, 'Empluk Simbolon', 'Ki. Astana Anyar No. 399, Banjar 90173, Riau', '08768296894', 'ulva62@example.org', '$2y$12$4cHiDZjs/1pvgy5KMranju.rwvdGOlo0KWI0nnG1rKdya9wE4tLci', 'Marsito Jati Hutapea', 'wpadmasari@example.com', '08507496173', 2, 10, 2, 2, NULL, NULL, 'pending', 'Januari', 316793.00, NULL, NULL),
	(10, 2, 'Carla Haryanti', 'Jln. Bakhita No. 127, Jambi 60568, Kepri', '08834833128', 'hputra@example.net', '$2y$12$HXJlBwfg5EH.CuwD3fc53eRrYL3CgC276qn2EjgyxwupyL5pD7/Te', 'Prayitna Kasim Saptono S.H.', 'nashiruddin.farhunnisa@example.net', '08556594270', 4, 6, 1, 4, NULL, NULL, 'pending', 'Januari', 209621.00, NULL, NULL),
	(19, 2, 'desman', 'Jl Raya', '08558589536', 'desmandwisaputra@gmail.com', '$2y$12$snxN09tiBBGT5NOWusAzieikS9Gfzxy/3v4FtiKQ4izQl.krF.b06', 'Budi', 'des@mail.com', '08787182816', 1, 2, 1, 1, '2025-11-23 14:58:47', '2025-11-28 03:36:39', 'active', 'November', 200000.00, 'payment_proofs/i4CVdLcE1j2UDnrsCOda1SROnxaLP4G02UmuOhIO.jpg', NULL),
	(27, 2, 'Juan Sinegar', 'Jl Raya Merdeka', '08558589536', '2310631170071@student.unsika.ac.id', '$2y$12$H3YHwEIY0Jh56T.zFiROteP8FwChXHTwG1bqh2E4PH6Wp8Gf4XOPG', 'Budi', 'des@gmail.com', '08787182816', 1, 4, 1, 1, '2025-11-28 10:35:48', '2025-11-28 11:01:50', 'active', 'November', 200000.00, 'payment_proofs/c81IHA8ZB5AQhoKXtzxXDMTK5s9F98ojwqv0ATN0.png', NULL),
	(28, 2, 'jijijij jijoijoijooij', 'yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', '08543234567', 'uglnkugiugk@gjhb.mm', '$2y$12$1RIeTIWUMolCbfMmI3N3tOiRXxnAcfdkcIc1ku89x3lc/XTXtc5Ty', 'eeeeeeiiiiiiiiiiiiiiiii', 'bkggknjijlki@hgkuh.v', '0000098765432', 1, 3, 3, 2, '2025-12-01 04:04:59', '2025-12-01 04:04:59', 'pending', 'December', 200000.00, 'payment_proofs/pLjn16oxrQRc5NNdmOu7OHsp5Oo1kEfS19G4nxjW.jpg', NULL);

-- Dumping structure for table website-bimbel.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_student` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.reviews: ~9 rows (approximately)
DELETE FROM `reviews`;
INSERT INTO `reviews` (`id`, `name_student`, `school`, `review_text`, `created_at`, `updated_at`) VALUES
	(2, 'Nilam Zulfa Wijayanti', 'PT Nainggolan Riyanti Tbk', 'Libero aut dolorem voluptas et aut eius ad corporis.', '2025-11-23 22:43:10', '2025-11-23 22:43:10'),
	(3, 'Mutia Mulyani', 'Yayasan Dongoran (Persero) Tbk', 'Pariatur dolor sint earum adipisci provident placeat voluptas vel cupiditate beatae error voluptates.', '2025-11-23 22:43:10', '2025-11-23 22:43:10'),
	(4, 'Nadia Salimah Hariyah S.Farm', 'Yayasan Yuliarti Tbk', 'Quaerat eos ab error nam sequi repellat aliquam atque molestias.', '2025-11-23 22:43:10', '2025-11-23 22:43:10'),
	(5, 'Jamil Kenari Firgantoro', 'PD Namaga Widiastuti', 'Ratione totam enim ea necessitatibus unde dignissimos deserunt quia consequatur inventore.', '2025-11-23 22:43:10', '2025-11-23 22:43:10'),
	(6, 'Bakiadi Prasetyo', 'PT Hariyah Kurniawan', 'Modi aspernatur eligendi sed molestiae aliquid saepe excepturi ab soluta.', '2025-11-23 22:43:10', '2025-11-23 22:43:10'),
	(7, 'Rendy Pradana M.Farm', 'Fa Hassanah', 'Debitis reiciendis vitae et qui deserunt doloremque et.', '2025-11-23 22:43:10', '2025-11-23 22:43:10'),
	(8, 'Indra Xanana Winarno', 'CV Rahimah Sihotang (Persero) Tbk', 'Voluptatem consequatur velit id et veniam ipsum magnam ut consequatur nesciunt nam.', '2025-11-23 22:43:10', '2025-11-23 22:43:10'),
	(9, 'Maya Widiastuti', 'PJ Gunarto', 'Molestiae tempora dolorem non illo dolores voluptatum labore porro.', '2025-11-23 22:43:10', '2025-11-23 22:43:10'),
	(10, 'Zalindra Febi Suryatmi M.TI.', 'UD Mandasari Tbk', 'Velit quia sint similique ut rem sed deleniti.', '2025-11-23 22:43:10', '2025-11-23 22:43:10');

-- Dumping structure for table website-bimbel.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.roles: ~2 rows (approximately)
DELETE FROM `roles`;
INSERT INTO `roles` (`id`, `name_role`, `created_at`, `updated_at`) VALUES
	(1, 'admin', NULL, NULL),
	(2, 'siswa', NULL, NULL);

-- Dumping structure for table website-bimbel.schedule_registrations_student
CREATE TABLE IF NOT EXISTS `schedule_registrations_student` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `registration_id` bigint unsigned NOT NULL,
  `day_id` bigint unsigned NOT NULL,
  `time_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedule_registrations_student_registration_id_foreign` (`registration_id`),
  KEY `schedule_registrations_student_day_id_foreign` (`day_id`),
  KEY `schedule_registrations_student_time_id_foreign` (`time_id`),
  CONSTRAINT `schedule_registrations_student_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE,
  CONSTRAINT `schedule_registrations_student_registration_id_foreign` FOREIGN KEY (`registration_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `schedule_registrations_student_time_id_foreign` FOREIGN KEY (`time_id`) REFERENCES `times` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.schedule_registrations_student: ~3 rows (approximately)
DELETE FROM `schedule_registrations_student`;
INSERT INTO `schedule_registrations_student` (`id`, `registration_id`, `day_id`, `time_id`, `created_at`, `updated_at`) VALUES
	(1, 27, 3, 2, '2025-11-28 10:35:48', '2025-11-28 10:35:48'),
	(2, 28, 5, 2, '2025-12-01 04:05:00', '2025-12-01 04:05:00'),
	(3, 28, 1, 3, '2025-12-01 04:05:00', '2025-12-01 04:05:00');

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
  `curriculum_id` bigint unsigned NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_student_email_unique` (`student_email`),
  KEY `students_role_id_foreign` (`role_id`),
  KEY `students_levels_id_foreign` (`levels_id`),
  KEY `students_class_id_foreign` (`class_id`),
  KEY `students_programs_id_foreign` (`programs_id`),
  KEY `students__id_foreign` (`curriculum_id`),
  CONSTRAINT `students__id_foreign` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculums` (`id`) ON DELETE CASCADE,
  CONSTRAINT `students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `students_levels_id_foreign` FOREIGN KEY (`levels_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `students_programs_id_foreign` FOREIGN KEY (`programs_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `students_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.students: ~11 rows (approximately)
DELETE FROM `students`;
INSERT INTO `students` (`id`, `role_id`, `full_name`, `address`, `phone_number`, `student_email`, `password`, `parent_name`, `parent_email`, `parent_phone`, `levels_id`, `class_id`, `programs_id`, `curriculum_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Endah Novitasari', 'Jln. Pasir Koja No. 793, Pematangsiantar 92739, Gorontalo', '08590505342', 'vicky31@example.com', '$2y$12$1rq3yH3N0MXmN5DS0p5aW.9/Z1gCDh61q2ohRf05JvGXWHJDKAzDm', 'Kezia Lailasari', 'irfan93@example.com', '08101036172', 1, 1, 2, 4, 'active', NULL, NULL),
	(2, 2, 'Keisha Astuti', 'Ki. Soekarno Hatta No. 265, Mojokerto 30073, Bali', '08273869912', 'raisa.anggraini@example.org', '$2y$12$LgJR/FVI1CHOVFdfpg9JkeIRAZmXeDR2BCgNQUoxFP6B3xuY99OxS', 'Nyana Napitupulu', 'darijan.marpaung@example.org', '08249638794', 4, 8, 3, 3, 'active', NULL, NULL),
	(3, 2, 'Maimunah Astuti', 'Ds. Sampangan No. 179, Dumai 99445, NTB', '08118097488', 'wawan21@example.org', '$2y$12$X/vU05vrVH9/N9Abqgy5g.njINlOY8cuxHlyKjzfCi8OghQOEOGzm', 'Putri Puspita', 'megantara.kanda@example.org', '08748806295', 1, 8, 2, 1, 'active', NULL, NULL),
	(4, 2, 'Dinda Haryanti', 'Jr. Ciumbuleuit No. 491, Singkawang 18840, Sumsel', '08084317699', 'wulan.astuti@example.com', '$2y$12$aQy8bFhhg0iHKGR7UOgQ1uT/QiCgfFqaWmcD1uw4E44koS2Mx4PBG', 'Devi Nasyidah', 'handayani.emil@example.net', '08884730480', 3, 9, 3, 3, 'active', NULL, NULL),
	(5, 2, 'Ellis Indah Widiastuti S.Gz', 'Ki. Basuki Rahmat  No. 433, Binjai 85555, Riau', '08266884864', 'agustina.mursita@example.com', '$2y$12$EkrfywNnTbjf4KdMWjBSmOtsGURgoVs31QVjFwAvHS0efdi3ryEvS', 'Rika Melani', 'irawan.harjo@example.org', '08345959430', 2, 7, 1, 1, 'active', NULL, NULL),
	(6, 2, 'Salsabila Palastri', 'Dk. Baja No. 198, Palembang 11068, NTB', '08656040923', 'heryanto29@example.com', '$2y$12$q0XbP9p6t6p.YRxBwPCqf.WJO4WjdQwxgXwgo5gGv.aNswBKDsWge', 'Saka Maulana S.Pd', 'padriansyah@example.net', '08832071049', 2, 2, 2, 3, 'active', NULL, NULL),
	(7, 2, 'Olga Hasta Natsir', 'Psr. K.H. Maskur No. 878, Payakumbuh 22801, Gorontalo', '08992263084', 'nasim.wijayanti@example.com', '$2y$12$b5hDytDYoY/.h63jen/9VOL73Rrx4zc0aB3WZ4tavPFU9H8mYeHQu', 'Cahyadi Pranowo', 'ihasanah@example.net', '08311260857', 1, 11, 1, 2, 'active', NULL, NULL),
	(8, 2, 'Ina Purwanti', 'Jln. Salak No. 48, Sibolga 38463, Kepri', '08753078582', 'langgeng16@example.org', '$2y$12$bFNx/uvh1fniZaymSaZEMerQiJxGf1ylUKkk5Nmi1CDpr.7KdONiW', 'Dono Hidayanto S.I.Kom', 'sitorus.omar@example.net', '08507525677', 3, 4, 2, 4, 'active', NULL, NULL),
	(9, 2, 'Belinda Ellis Oktaviani', 'Ki. Cokroaminoto No. 937, Magelang 36410, Bali', '08662552309', 'sinaga.restu@example.org', '$2y$12$wHK.Zd/Rod1/lcgbM.4xcOSSxYSCnFh.344IW0StbMnOyWnQmo.H.', 'Empluk Wibisono', 'rahimah.imam@example.org', '08253867507', 3, 10, 2, 2, 'active', NULL, NULL),
	(10, 2, 'Farah Wijayanti', 'Ds. S. Parman No. 747, Malang 41576, DIY', '08172562667', 'vera.agustina@example.org', '$2y$12$j8HlXsq6BNUOXSJRnYq8AeQp9sm9pprqsyCweXupzQYQsNQkhuqte', 'Reza Saefullah M.Ak', 'kuswoyo.gaduh@example.com', '08748249142', 2, 2, 2, 4, 'active', NULL, NULL),
	(26, 2, 'Juan Sinegar', 'Jl Raya Merdeka', '08558589536', '2310631170071@student.unsika.ac.id', '$2y$12$hNVc/7wAwZs.bzc8KlGnX.ShyJwb35ADFCbjOa1tafUg8rUwV6c0W', 'Budi', 'des@gmail.com', '08787182816', 1, 4, 1, 1, 'active', '2025-11-28 11:01:50', '2025-12-01 04:57:20');

-- Dumping structure for table website-bimbel.student_schedules
CREATE TABLE IF NOT EXISTS `student_schedules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint unsigned NOT NULL,
  `day_id` bigint unsigned NOT NULL,
  `time_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_schedules_student_id_foreign` (`student_id`),
  KEY `student_schedules_day_id_foreign` (`day_id`),
  KEY `student_schedules_time_id_foreign` (`time_id`),
  CONSTRAINT `student_schedules_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE,
  CONSTRAINT `student_schedules_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  CONSTRAINT `student_schedules_time_id_foreign` FOREIGN KEY (`time_id`) REFERENCES `times` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.student_schedules: ~10 rows (approximately)
DELETE FROM `student_schedules`;
INSERT INTO `student_schedules` (`id`, `student_id`, `day_id`, `time_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 4, 2, NULL, NULL),
	(2, 2, 2, 2, NULL, NULL),
	(3, 3, 3, 3, NULL, NULL),
	(4, 4, 1, 1, NULL, NULL),
	(5, 5, 1, 3, NULL, NULL),
	(6, 6, 4, 2, NULL, NULL),
	(7, 7, 5, 2, NULL, NULL),
	(8, 8, 4, 3, NULL, NULL),
	(9, 9, 1, 3, NULL, NULL),
	(10, 10, 3, 2, NULL, NULL),
	(11, 26, 3, 2, '2025-11-28 11:01:50', '2025-11-28 11:01:50');

-- Dumping structure for table website-bimbel.times
CREATE TABLE IF NOT EXISTS `times` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `times_in` time DEFAULT NULL,
  `times_out` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website-bimbel.times: ~3 rows (approximately)
DELETE FROM `times`;
INSERT INTO `times` (`id`, `name_time`, `times_in`, `times_out`, `created_at`, `updated_at`) VALUES
	(1, 'Pagi (Sesi 1)', '10:00:00', '12:00:00', NULL, NULL),
	(2, 'Siang (Sesi 2)', '13:00:00', '15:00:00', NULL, NULL),
	(3, 'Sore (Sesi 3)', '16:00:00', '18:00:00', NULL, NULL);

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
