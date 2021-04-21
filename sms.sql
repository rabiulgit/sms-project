-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sms_db
CREATE DATABASE IF NOT EXISTS `sms_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `sms_db`;

-- Dumping structure for table sms_db.classes
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sms_db.classes: ~4 rows (approximately)
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` (`id`, `name`, `status`, `is_archive`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'VI', 1, 0, NULL, 0, '2021-04-19 20:11:38', 0),
	(2, 'VII', 1, 0, NULL, 0, '2021-04-19 20:11:56', 0),
	(3, 'VIII', 1, 0, NULL, 0, '2021-04-19 20:12:07', 0),
	(4, 'IX', 1, 0, NULL, 0, '2021-04-19 20:12:30', 0),
	(5, 'X', 1, 0, NULL, 0, '2021-04-19 20:12:36', 0);
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;

-- Dumping structure for table sms_db.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sms_db.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table sms_db.fees_book
CREATE TABLE IF NOT EXISTS `fees_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL DEFAULT 1,
  `student_id` int(11) NOT NULL DEFAULT 1,
  `cat_id` int(11) NOT NULL DEFAULT 1,
  `value` int(11) NOT NULL DEFAULT 1,
  `month` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sms_db.fees_book: ~0 rows (approximately)
/*!40000 ALTER TABLE `fees_book` DISABLE KEYS */;
INSERT INTO `fees_book` (`id`, `session_id`, `student_id`, `cat_id`, `value`, `month`, `status`, `created_at`, `is_archive`, `created_by`, `updated_at`, `updated_by`) VALUES
	(12, 1, 6, 1, 5000, 'January', 1, '2021-04-20 09:33:36', 0, 0, '2021-04-20 09:33:36', 0),
	(13, 1, 6, 3, 500, 'March', 1, '2021-04-20 09:33:47', 0, 0, '2021-04-20 09:33:47', 0),
	(14, 1, 6, 2, 950, 'January', 1, '2021-04-20 09:34:10', 0, 0, '2021-04-20 09:34:10', 0),
	(15, 1, 6, 2, 950, 'February', 1, '2021-04-20 09:34:26', 0, 0, '2021-04-20 09:34:26', 0);
/*!40000 ALTER TABLE `fees_book` ENABLE KEYS */;

-- Dumping structure for table sms_db.fees_category
CREATE TABLE IF NOT EXISTS `fees_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sms_db.fees_category: ~3 rows (approximately)
/*!40000 ALTER TABLE `fees_category` DISABLE KEYS */;
INSERT INTO `fees_category` (`id`, `name`, `status`, `created_at`, `is_archive`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'Admission Fee', 1, NULL, 0, 0, '2021-04-20 13:31:51', 0),
	(2, 'Tuition Fee', 1, NULL, 0, 0, '2021-04-20 13:31:53', 0),
	(3, 'Sports Fee', 1, NULL, 0, 0, '2021-04-20 13:31:58', 0);
/*!40000 ALTER TABLE `fees_category` ENABLE KEYS */;

-- Dumping structure for table sms_db.fees_setup
CREATE TABLE IF NOT EXISTS `fees_setup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL DEFAULT 1,
  `cat_id` int(11) NOT NULL DEFAULT 1,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `month` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sms_db.fees_setup: ~3 rows (approximately)
/*!40000 ALTER TABLE `fees_setup` DISABLE KEYS */;
INSERT INTO `fees_setup` (`id`, `session_id`, `cat_id`, `type`, `value`, `month`, `status`, `created_at`, `is_archive`, `created_by`, `updated_at`, `updated_by`) VALUES
	(10, 1, 1, 'Annual', '5000', 'January', 1, '2021-04-19 17:44:15', 0, 0, '2021-04-20 13:32:04', 0),
	(11, 1, 2, 'Monthly', '950', 'January', 1, '2021-04-19 17:44:26', 0, 0, '2021-04-20 13:32:07', 0),
	(12, 1, 3, 'One Time', '500', 'March', 1, '2021-04-19 17:44:40', 0, 0, '2021-04-20 13:32:11', 0);
/*!40000 ALTER TABLE `fees_setup` ENABLE KEYS */;

-- Dumping structure for table sms_db.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sms_db.groups: ~2 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `status`, `is_archive`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'Science', 1, 0, NULL, 0, '2021-04-19 20:20:23', 0),
	(2, 'Business Studies', 1, 0, NULL, 0, '2021-04-19 20:32:09', 0),
	(3, 'Humanities', 1, 0, NULL, 0, '2021-04-19 20:23:09', 0);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping structure for table sms_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sms_db.migrations: ~3 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table sms_db.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sms_db.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table sms_db.sections
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sms_db.sections: ~2 rows (approximately)
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` (`id`, `name`, `status`, `is_archive`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'A', 1, 0, NULL, 0, '2021-04-19 20:22:21', 0),
	(2, 'B', 1, 0, NULL, 0, '2021-04-19 20:22:30', 0),
	(3, 'C', 1, 0, NULL, 0, '2021-04-19 20:22:36', 0);
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;

-- Dumping structure for table sms_db.session
CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_start` date NOT NULL,
  `session_end` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sms_db.session: ~1 rows (approximately)
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` (`id`, `session_start`, `session_end`, `status`, `is_archive`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, '2021-01-01', '2021-12-31', 1, 0, NULL, 0, '2021-04-19 20:54:06', 0);
/*!40000 ALTER TABLE `session` ENABLE KEYS */;

-- Dumping structure for table sms_db.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `session_id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Male',
  `dob` date NOT NULL,
  `present_address` text COLLATE utf8_unicode_ci NOT NULL,
  `sms_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL DEFAULT 0,
  `group_id` int(11) NOT NULL DEFAULT 0,
  `section_id` int(11) NOT NULL DEFAULT 0,
  `roll` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sms_db.students: ~6 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `student_id`, `session_id`, `first_name`, `last_name`, `gender`, `dob`, `present_address`, `sms_no`, `class_id`, `group_id`, `section_id`, `roll`, `status`, `is_archive`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(6, '19042100001', 1, 'Imran', 'Sazzad', 'Male', '1970-01-01', 'House-443, Road-07, Baridhara DOHS', '01710622883', 1, 1, 1, 0, 1, 0, '2021-04-19 15:19:13', 0, '2021-04-19 21:19:13', 0),
	(7, '19042100002', 1, 'Imran', 'Sazzad', 'Male', '2021-04-19', 'House-443, Road-07, Baridhara DOHS', '01710622883', 1, 1, 1, 0, 1, 0, '2021-04-19 15:23:04', 0, '2021-04-19 21:23:04', 0),
	(8, '21212121040400001', 1, 'Imran', 'Sazzad', 'Male', '2021-04-19', 'House-443, Road-07, Baridhara DOHS', '01710622883', 1, 1, 1, 0, 1, 0, '2021-04-19 15:24:17', 0, '2021-04-19 21:24:17', 0),
	(9, '20210400001', 1, 'Imran', 'Sazzad', 'Male', '2021-04-19', 'House-443, Road-07, Baridhara DOHS', '01710622883', 1, 1, 1, 0, 1, 0, '2021-04-19 15:25:12', 0, '2021-04-19 21:25:12', 0),
	(10, '2021040002', 1, 'Imran', 'Sazzad', 'Male', '2021-04-19', 'House-443, Road-07, Baridhara DOHS', '01710622883', 1, 1, 1, 0, 1, 0, '2021-04-19 15:26:34', 0, '2021-04-19 21:26:34', 0),
	(11, '2021040003', 1, 'Imran', 'Sazzad', 'Male', '2021-04-05', 'House-443, Road-07, Baridhara DOHS', '01710622883', 1, 1, 1, 0, 1, 0, '2021-04-19 16:24:18', 0, '2021-04-19 22:24:18', 0);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table sms_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sms_db.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Web Team', 'admin@gmail.com', NULL, '$2y$10$sPjwQxTYdN1eeNy05L5OleDEgSFe79bATrtE0ZLKUp5ga8Gpr5cz2', NULL, '2021-04-18 19:26:37', '2021-04-18 20:26:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
