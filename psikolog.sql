-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 03 Tem 2024, 15:29:44
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `psikolog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_questions`
--

CREATE TABLE `admin_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `admin_questions`
--

INSERT INTO `admin_questions` (`id`, `question`, `answer`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Deneme', 'Deneme', 1, '2024-06-14 07:38:17', '2024-06-14 07:38:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_settings`
--

CREATE TABLE `admin_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `phone`, `email`, `logo`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'storage/logo/1718366610_Psi2.svg', '2024-06-14 08:20:33', '2024-07-02 23:14:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `applications`
--

INSERT INTO `applications` (`id`, `name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'Moxo', NULL, 1, '2024-06-14 12:06:59', '2024-06-14 12:06:59'),
(5, 'Cas', NULL, 1, '2024-06-14 12:07:03', '2024-06-14 12:07:03'),
(6, 'Denver', NULL, 1, '2024-06-14 12:07:07', '2024-06-14 12:07:07'),
(7, 'Mini Mental Test', NULL, 1, '2024-06-14 12:07:14', '2024-06-14 12:07:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_number` varchar(255) DEFAULT NULL,
  `partners_name` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `payment_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `hour` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `room_id`, `client_name`, `client_number`, `partners_name`, `client_email`, `type_id`, `price`, `payment_type_id`, `date`, `hour`, `note`, `created_at`, `updated_at`) VALUES
(11, 3, 2, 'Ege Yapıcı', '05511494774', 'Deneme2 Es', 'yapiciege45@gmail.com', 3, 2000, 1, '2024-07-03', '08:00', NULL, '2024-07-03 08:27:20', '2024-07-03 08:54:08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `appointment_application`
--

CREATE TABLE `appointment_application` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('ofisadmin@gmail.com|127.0.0.1', 'i:1;', 1720004976),
('ofisadmin@gmail.com|127.0.0.1:timer', 'i:1720004976;', 1720004976);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `days`
--

INSERT INTO `days` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pazartesi', NULL, NULL),
(2, 'Salı', NULL, NULL),
(3, 'Çarşamba', NULL, NULL),
(4, 'Perşembe', NULL, NULL),
(5, 'Cuma', NULL, NULL),
(6, 'Cumartesi', NULL, NULL),
(7, 'Pazar', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
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
-- Tablo için tablo yapısı `jobs`
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
-- Tablo için tablo yapısı `job_batches`
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
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_offices_table', 1),
(2, '0001_01_01_000001_create_users_table', 1),
(3, '0001_01_01_000002_create_cache_table', 1),
(4, '0001_01_01_000003_create_jobs_table', 1),
(5, '2024_06_09_140230_create_office_branches_table', 1),
(6, '2024_06_09_142221_create_office_branch_psychologist_table', 1),
(7, '2024_06_09_174631_create_admin_questions_table', 1),
(8, '2024_06_09_174809_create_packages_table', 1),
(9, '2024_06_09_174814_create_package_features_table', 1),
(10, '2024_06_09_174827_create_package_package_feature__table', 1),
(11, '2024_06_09_183449_create_contacts_table', 1),
(12, '2024_06_13_140026_add_phone_to_users_table', 2),
(13, '2024_06_14_110824_create_admin_settings_table', 3),
(14, '2024_06_14_122257_create_room_table', 4),
(15, '2024_06_14_122304_create_application_table', 4),
(16, '2024_06_14_122310_create_appointment_table', 4),
(17, '2024_06_14_122313_create_appointment_room_table', 4),
(18, '2024_06_14_122325_create_appointment_application_table', 5),
(19, '2024_06_14_122337_create_days_table', 5),
(20, '2024_06_14_122346_create_user_off_days_table', 5),
(21, '2024_06_14_140903_create_type_table', 6),
(22, '2024_06_14_140915_add_partners_name_and_type_id_to_appointments_table', 7),
(23, '2024_06_14_141812_add_client_email_to_appointments_table', 8),
(24, '2024_06_14_142744_drop_appointment_room_table', 9),
(26, '2024_06_14_142838_add_room_id_to_appointments_table', 10),
(30, '2024_07_03_014618_create_payment_types_table', 11),
(34, '2024_07_03_014719_add_price_and_payment_type_id_to_appointments_table', 12),
(35, '2024_07_03_020314_create_office_settings_table', 12),
(38, '2024_07_03_102700_create_sms_table', 13);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `offices`
--

INSERT INTO `offices` (`id`, `name`, `slug`, `image`, `email`, `location`, `created_at`, `updated_at`) VALUES
(2, 'Napelda Psikoloji', 'napelda', 'storage/images/offices/1718377474_Napelda_seffaf-1024x1024-2.webp', 'yapiciege45@gmail.com', 'https://maps.app.goo.gl/d26qc2eHCMfSU1du9', '2024-06-13 09:41:26', '2024-06-14 12:04:34'),
(3, 'Deneme Ofis', 'cube', 'storage/images/offices/1718282575_8e9cc0e093f1458d9a61eab43d49f3f0.jpg', 'yapiciege45@gmail.com', 'https://www.google.com/maps/place/Cube+Incubation/@40.9231543,29.3131923,17z/data=!3m1!4b1!4m6!3m5!1s0x14cadb4c1db7c6d3:0x88d0040ec76ad0fb!8m2!3d40.9231503!4d29.3157672!16s%2Fg%2F11h8brlc98?entry=ttu', '2024-06-13 09:42:55', '2024-06-13 10:57:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `office_branches`
--

CREATE TABLE `office_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `office_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `office_branches`
--

INSERT INTO `office_branches` (`id`, `office_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 3, 'Pendik', '2024-06-13 09:43:09', '2024-06-13 10:57:06'),
(3, 2, 'Pendik', '2024-06-13 09:43:25', '2024-06-13 09:43:25'),
(4, 3, 'Maltepe', '2024-06-13 10:50:21', '2024-06-13 10:50:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `office_branch_psychologist`
--

CREATE TABLE `office_branch_psychologist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `office_branch_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `office_branch_psychologist`
--

INSERT INTO `office_branch_psychologist` (`id`, `office_branch_id`, `user_id`, `created_at`, `updated_at`) VALUES
(17, 1, 5, NULL, NULL),
(18, 4, 5, NULL, NULL),
(33, 3, 3, NULL, NULL),
(37, 3, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `office_settings`
--

CREATE TABLE `office_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `office_id` bigint(20) UNSIGNED NOT NULL,
  `opening_hour` varchar(255) NOT NULL,
  `closing_hour` varchar(255) NOT NULL,
  `tax` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `office_settings`
--

INSERT INTO `office_settings` (`id`, `office_id`, `opening_hour`, `closing_hour`, `tax`, `created_at`, `updated_at`) VALUES
(1, 2, '08:00', '22:00', 30, '2024-07-02 23:14:23', '2024-07-02 23:14:23'),
(2, 2, '09:00', '22:00', 30, '2024-07-02 23:14:51', '2024-07-02 23:18:37'),
(3, 3, '08:00', '22:00', 30, '2024-07-03 01:13:51', '2024-07-03 01:13:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `package_features`
--

CREATE TABLE `package_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `package_package_feature`
--

CREATE TABLE `package_package_feature` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `package_feature_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nakit', NULL, NULL),
(2, 'Kart', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Büyük Oda', 'Büyük Oda', 1, '2024-06-14 11:33:50', '2024-06-14 12:00:42'),
(3, 'Orta Oda', 'Orta Oda', 1, '2024-06-14 12:00:50', '2024-06-14 12:00:50'),
(4, 'Küçük Oda', NULL, 1, '2024-06-14 12:00:57', '2024-06-14 12:00:57');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
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
-- Tablo döküm verisi `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9WQlZcHaVsPKBG0AMBMEuRr2xRitYdpgbNaWPu0I', 3, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVVY5YmV4N0FOYzhlTmwzWTUwOHc0M05JUUNkbllZSUdpSU5uNDBmZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1720008359),
('iH3gH6TPQzYTq8jSHuH1hF8M7ZyYYMf7xkm8MfXA', 3, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidFN1eFF2U0RETlJmQWJnTlVrcHRzNHU3ZjhoZmtPQUNzUDN2eDlXayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1720008312),
('pryrsNcj7ntLbXc8CiAwHrvVAbeiFWfHwLyHRuQf', 8, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid1hFWW1aRlpVckdOQ0hPdUZrQm1uOXBRNXNHR3huSUJoOWZSUVFYWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9vZmZpY2UvbmFwZWxkYS9kYXNoYm9hcmQvYXBwb2ludG1lbnQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo4O30=', 1719980698),
('VTGTHMWtQ8qamGVaf10aKC0Ttfhd1vppvQiUG57g', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGh3QUx4TlNhNjZsMmQ3Z3lPZm56OWtwQWJ4MmFoaXcwUW9ySk00WCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1720008458);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sms`
--

CREATE TABLE `sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `number` varchar(255) NOT NULL,
  `is_sended` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sms`
--

INSERT INTO `sms` (`id`, `date`, `number`, `is_sended`, `created_at`, `updated_at`) VALUES
(1, '2024-07-24', '05511494774', 0, '2024-07-03 08:27:20', '2024-07-03 08:27:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Yetişkin', '2024-06-14 11:17:21', '2024-06-14 11:17:21'),
(4, 'Bireysel', '2024-06-14 12:08:50', '2024-06-14 12:08:50'),
(6, 'Çocuk', '2024-06-14 12:09:01', '2024-06-14 12:09:01'),
(7, 'Ergen', '2024-06-14 12:09:09', '2024-06-14 12:09:09'),
(8, 'Çift', '2024-06-14 12:09:16', '2024-06-14 12:09:16'),
(10, 'Aile', '2024-06-14 13:34:15', '2024-06-14 13:34:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_office_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_psychologist` tinyint(1) NOT NULL DEFAULT 0,
  `is_assistant` tinyint(1) NOT NULL DEFAULT 0,
  `office_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `is_admin`, `is_office_admin`, `is_psychologist`, `is_assistant`, `office_id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 0, 0, 1, 0, 2, 'Ege Yapıcı', 'yapiciege45@gmail.com', '5511494774', NULL, '$2y$12$iqW2r6iRKm39robudYVg0.ACQ2uvJnpHl14dhM14NEVpgJX5Jd13C', NULL, '2024-06-14 06:55:41', '2024-06-14 10:03:39'),
(5, 0, 0, 0, 1, 3, 'Ege Yapıcı', 'deneme@gmail.com', '5511494775', NULL, '$2y$12$X3tliMVK.NfMS4817.FDpOxfzfsletob9A.uP6j/k2nX3sg6sbcvC', NULL, '2024-06-14 07:01:16', '2024-06-14 07:01:16'),
(8, 0, 1, 0, 0, 2, 'Ofis Admin', 'ofisadmin2@gmail.com', '5511494771', NULL, '$2y$12$Awg2.gw8Rae905Tknkv2WuQMn5r9ofHBFo1JAfafaata4wXbI5sjS', NULL, '2024-06-14 09:11:47', '2024-06-14 09:11:47'),
(14, 0, 0, 1, 0, 2, 'Deneme2', 'deneme2@gmail.com', '12322223333', NULL, '$2y$12$/7N2YLeb.kdkVW7xr3QMiOirE8.Kyb6Wu9usY3x1i8.rcFiRUdmpO', NULL, '2024-06-14 10:13:44', '2024-06-14 10:13:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_off_days`
--

CREATE TABLE `user_off_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `user_off_days`
--

INSERT INTO `user_off_days` (`id`, `day_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 14, NULL, NULL),
(2, 2, 14, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin_questions`
--
ALTER TABLE `admin_questions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_type_id_foreign` (`type_id`),
  ADD KEY `appointments_room_id_foreign` (`room_id`),
  ADD KEY `appointments_payment_type_id_foreign` (`payment_type_id`);

--
-- Tablo için indeksler `appointment_application`
--
ALTER TABLE `appointment_application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_application_appointment_id_foreign` (`appointment_id`),
  ADD KEY `appointment_application_application_id_foreign` (`application_id`);

--
-- Tablo için indeksler `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Tablo için indeksler `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Tablo için indeksler `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Tablo için indeksler `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `office_branches`
--
ALTER TABLE `office_branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `office_branches_office_id_foreign` (`office_id`);

--
-- Tablo için indeksler `office_branch_psychologist`
--
ALTER TABLE `office_branch_psychologist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `office_branch_psychologist_office_branch_id_foreign` (`office_branch_id`),
  ADD KEY `office_branch_psychologist_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `office_settings`
--
ALTER TABLE `office_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `office_settings_office_id_foreign` (`office_id`);

--
-- Tablo için indeksler `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `package_features`
--
ALTER TABLE `package_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_features_package_id_foreign` (`package_id`);

--
-- Tablo için indeksler `package_package_feature`
--
ALTER TABLE `package_package_feature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_package_feature_package_id_foreign` (`package_id`),
  ADD KEY `package_package_feature_package_feature_id_foreign` (`package_feature_id`);

--
-- Tablo için indeksler `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Tablo için indeksler `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_office_id_foreign` (`office_id`);

--
-- Tablo için indeksler `user_off_days`
--
ALTER TABLE `user_off_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_off_days_day_id_foreign` (`day_id`),
  ADD KEY `user_off_days_user_id_foreign` (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin_questions`
--
ALTER TABLE `admin_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `appointment_application`
--
ALTER TABLE `appointment_application`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Tablo için AUTO_INCREMENT değeri `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `office_branches`
--
ALTER TABLE `office_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `office_branch_psychologist`
--
ALTER TABLE `office_branch_psychologist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Tablo için AUTO_INCREMENT değeri `office_settings`
--
ALTER TABLE `office_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `package_features`
--
ALTER TABLE `package_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `package_package_feature`
--
ALTER TABLE `package_package_feature`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `sms`
--
ALTER TABLE `sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `user_off_days`
--
ALTER TABLE `user_off_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_payment_type_id_foreign` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `appointment_application`
--
ALTER TABLE `appointment_application`
  ADD CONSTRAINT `appointment_application_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_application_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `office_branches`
--
ALTER TABLE `office_branches`
  ADD CONSTRAINT `office_branches_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `office_branch_psychologist`
--
ALTER TABLE `office_branch_psychologist`
  ADD CONSTRAINT `office_branch_psychologist_office_branch_id_foreign` FOREIGN KEY (`office_branch_id`) REFERENCES `office_branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `office_branch_psychologist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `office_settings`
--
ALTER TABLE `office_settings`
  ADD CONSTRAINT `office_settings_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `package_features`
--
ALTER TABLE `package_features`
  ADD CONSTRAINT `package_features_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `package_package_feature`
--
ALTER TABLE `package_package_feature`
  ADD CONSTRAINT `package_package_feature_package_feature_id_foreign` FOREIGN KEY (`package_feature_id`) REFERENCES `package_features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_package_feature_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE SET NULL;

--
-- Tablo kısıtlamaları `user_off_days`
--
ALTER TABLE `user_off_days`
  ADD CONSTRAINT `user_off_days_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_off_days_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
