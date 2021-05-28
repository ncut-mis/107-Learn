-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `areas` (`id`, `name`) VALUES
(1,	'會計學'),
(2,	'統計學'),
(3,	'計算機概論');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comments` (`id`, `content`, `question_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1,	'因為，N的次方',	21,	1,	'2021-04-12 16:46:47',	NULL),
(3,	'太誇張',	20,	1,	'2021-04-12 16:47:10',	NULL),
(4,	'不對，是因為1/N',	21,	2,	'2021-04-12 10:54:09',	'2021-04-12 10:54:09'),
(5,	'會嗎',	20,	2,	'2021-04-12 10:57:32',	'2021-04-12 10:57:32'),
(6,	'我覺得還好阿',	20,	2,	'2021-04-12 10:57:34',	'2021-04-12 10:57:34'),
(7,	'答案是10~~',	22,	1,	'2021-04-12 11:09:00',	'2021-04-12 11:09:00'),
(8,	'謝謝你!',	22,	2,	'2021-04-12 11:11:09',	'2021-04-12 11:11:09'),
(9,	'CPU是Central Processing Unit的縮寫，中文通常稱為中央處理器。',	11,	1,	'2021-04-12 11:14:42',	'2021-04-12 11:14:42'),
(10,	'OK',	22,	2,	'2021-04-12 18:18:14',	'2021-04-12 18:18:14');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` bigint(20) NOT NULL,
  `to` bigint(20) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `messages` (`id`, `question_id`, `from`, `to`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1,	'22',	1,	2,	'ewqe',	1,	'2021-04-16 22:42:15',	'2021-05-03 09:01:03'),
(2,	'22',	2,	1,	'Hi',	1,	'2021-04-16 23:14:10',	'2021-05-03 08:02:36'),
(3,	'22',	1,	2,	'k',	1,	'2021-04-16 23:15:05',	'2021-05-03 09:01:03'),
(51,	'22',	1,	2,	'一定沒問題',	1,	'2021-04-26 11:16:32',	'2021-05-03 09:01:03'),
(52,	'22',	1,	2,	'嗨你好',	1,	'2021-04-26 11:16:51',	'2021-05-03 09:01:03'),
(53,	'22',	1,	2,	'OK',	1,	'2021-04-26 11:19:04',	'2021-05-03 09:01:03'),
(54,	'22',	1,	2,	'最後測試',	1,	'2021-04-26 11:50:03',	'2021-05-03 09:01:03'),
(55,	'22',	1,	2,	'OK',	1,	'2021-04-26 11:51:25',	'2021-05-03 09:01:03'),
(56,	'22',	1,	2,	'OP',	1,	'2021-04-26 11:54:56',	'2021-05-03 09:01:03'),
(57,	'22',	1,	2,	'56',	1,	'2021-04-26 11:55:14',	'2021-05-03 09:01:03'),
(58,	'22',	2,	6,	'0502-1',	1,	'2021-05-02 14:29:28',	'2021-05-03 19:51:55'),
(59,	'22',	1,	2,	'wqewq',	1,	'2021-05-03 05:38:00',	'2021-05-03 09:01:03'),
(60,	'22',	1,	2,	'qq',	1,	'2021-05-03 05:45:27',	'2021-05-03 09:01:03'),
(61,	'22',	1,	2,	'測試資料0503',	1,	'2021-05-03 05:46:35',	'2021-05-03 09:01:03'),
(62,	'22',	6,	2,	'QWE',	1,	'2021-05-03 05:53:49',	'2021-05-03 07:41:06'),
(63,	'22',	2,	1,	'您好',	1,	'2021-05-03 06:08:26',	'2021-05-03 08:02:36'),
(70,	'22',	1,	2,	'Hi',	1,	'2021-05-03 08:01:44',	'2021-05-03 09:01:03'),
(71,	'22',	1,	2,	'hi',	1,	'2021-05-03 08:01:48',	'2021-05-03 09:01:03'),
(72,	'22',	1,	2,	'可是',	1,	'2021-05-03 08:02:28',	'2021-05-03 09:01:03'),
(73,	'22',	1,	2,	'DD',	1,	'2021-05-03 08:02:48',	'2021-05-03 09:01:03'),
(74,	'22',	1,	2,	'嗨',	1,	'2021-05-03 08:07:12',	'2021-05-03 09:01:03'),
(75,	'22',	1,	2,	'嗨',	1,	'2021-05-03 08:07:12',	'2021-05-03 09:01:03'),
(76,	'22',	1,	2,	'OK?',	1,	'2021-05-03 08:08:24',	'2021-05-03 09:01:03'),
(77,	'22',	1,	2,	'KK',	1,	'2021-05-03 08:12:51',	'2021-05-03 09:01:03'),
(78,	'22',	1,	2,	'TTTY',	1,	'2021-05-03 08:16:08',	'2021-05-03 09:01:03'),
(79,	'22',	1,	2,	'PLPL',	1,	'2021-05-03 08:16:49',	'2021-05-03 09:01:03'),
(80,	'22',	1,	2,	'IO',	1,	'2021-05-03 08:20:42',	'2021-05-03 09:01:03'),
(81,	'22',	1,	2,	'qw',	1,	'2021-05-03 08:22:51',	'2021-05-03 09:01:03'),
(82,	'22',	1,	2,	'QW',	1,	'2021-05-03 08:23:59',	'2021-05-03 09:01:03'),
(83,	'23',	1,	6,	'你好',	1,	'2021-05-03 18:29:13',	'2021-05-03 19:51:55'),
(84,	'23',	1,	6,	'test',	1,	'2021-05-03 18:29:39',	'2021-05-03 19:51:55'),
(85,	'23',	6,	1,	'OK',	0,	'2021-05-03 18:39:17',	'2021-05-03 18:39:17');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2021_02_08_141528_create_sessions_table',	1),
(7,	'2021_03_03_131556_create_questions_table',	2),
(8,	'2021_03_07_125906_create_areas_table',	3),
(9,	'2021_03_28_151650_create_comments_table',	4),
(10,	'2019_09_01_091245_create_messages_table',	5);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(800) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `questions` (`id`, `title`, `content`, `user`, `area`, `status`, `created_at`, `updated_at`) VALUES
(11,	'請問CPU是什麼東西？',	'<p>如題，想知道CPU是什麼東西</p>ss',	'zhenyu',	'計算機概論',	0,	'2021-03-28 06:57:02',	'2021-03-28 06:57:02'),
(15,	'請問損益是什麼?',	'<p>損益</p>',	'zhenyu',	'會計學',	0,	'2021-03-29 08:21:28',	'2021-03-29 08:21:28'),
(16,	'該影片中的內容是什麼意思',	'<figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=X4QQNEhKRzI\"></oembed></figure>',	'zhenyu',	'統計學',	0,	'2021-03-29 08:39:18',	'2021-03-29 08:39:18'),
(20,	'如何將2進制轉為10進制',	'<p>想知道</p><p>1010 轉成10進制會等於多少</p>',	'zhenyu',	'計算機概論',	0,	'2021-04-12 08:04:57',	'2021-04-12 08:04:57'),
(21,	'想請問影片中的公式，為什麼是長這樣子',	'<p><iframe allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/OVacTpGgBVM?rel=0&amp;start=0\" width=\"640\"></iframe></p>',	'zhenyu',	'統計學',	0,	'2021-04-12 10:26:46',	'2021-04-12 10:26:46'),
(22,	'進制轉換',	'<p>(1010)<sub>2</sub>&nbsp;= ( )<sub>10</sub> ?</p>',	'小明',	'計算機概論',	0,	'2021-04-12 11:06:35',	'2021-04-12 11:06:35'),
(23,	'測試用',	'<p>測試用資料</p>',	'陣雨',	'會計學',	0,	'2021-05-02 06:25:44',	'2021-05-02 06:25:44');

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('M39gJP0I955628mkKxdVH4iJZKIdbFiTiX1FfHll',	1,	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36',	'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUVdWR0hqbXJnRnA3WTlFQlZLSFk4bFNKdnhkT1l4UUY1YVpjRm5VWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQud1lVRC5CQUEwV0JNWUFPTDRpcUR1bEM0WGZkN3FIcnpCVWVqL0tPNnNMb3hUcG90NDAxZSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkLndZVUQuQkFBMFdCTVlBT0w0aXFEdWxDNFhmZDdxSHJ6QlVlai9LTzZzTG94VHBvdDQwMWUiO30=',	1620099586),
('Uct8r7IzSOr5h1oxZTuLHT0kvoDar24yMNZN5Mcw',	6,	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36',	'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiejVkMDFYNUdSQXEwZ2FUd2JhUUt1ck1SVjFkSTU4d1VFRDhZWjZocSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRBakV5WXdHVHFoTFU1dnJ3dThvbE5POGUuNTZxMXhyZGVVWUk0Qk14aWhaT1l3N1dRbC50VyI7fQ==',	1620100315),
('uuZKrXuwfdzP8yue1ts5ElfJE1oS9n2nMvX4paYm',	1,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36',	'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZE51cENENFpBTlhweHZ1OGxpQUg0NlZLNFNlcVFPTWZoSFlLZmpUbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQud1lVRC5CQUEwV0JNWUFPTDRpcUR1bEM0WGZkN3FIcnpCVWVqL0tPNnNMb3hUcG90NDAxZSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkLndZVUQuQkFBMFdCTVlBT0w0aXFEdWxDNFhmZDdxSHJ6QlVlai9LTzZzTG94VHBvdDQwMWUiO30=',	1620093432),
('yctDDBrFybEy4FJDamMWTKMN8lu1dLMDVrMyixBz',	NULL,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamRPZTVaY0hmeFFtaXRQeVRPeFo4S1hubWd2YlFrQW9vVlYyeWk4YyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1620092332),
('zHrfjrNxT6KGMcUx1klA9VHTDuXOpGpyB39BRTEg',	6,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36',	'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRnduVnVsUWlEdjdhVGtPeHdGWEZIUTFoZEJYNE1zaU56c25nY01LcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRBakV5WXdHVHFoTFU1dnJ3dThvbE5POGUuNTZxMXhyZGVVWUk0Qk14aWhaT1l3N1dRbC50VyI7fQ==',	1620093432);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1,	'zhenyu',	'asdfg10510588@gmail.com',	NULL,	'$2y$10$.wYUD.BAA0WBMYAOL4iqDulC4Xfd7qHrzBUej/KO6sLoxTpot401e',	NULL,	NULL,	'bi3eXpOpAIScBBbTBO7ltDZQlzcAypyaPxKQzQVPj4bZy5BbP90W3PcsGgm5',	NULL,	NULL,	'2021-02-08 06:22:43',	'2021-02-08 06:22:43'),
(2,	'小明',	'12345678@gmail.com',	NULL,	'$2y$10$7QAh8G9tYO1RmTpg2v1VtuEztfwSHU2aUWitkdUsNsSNsSarmN4tq',	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-04-12 10:41:25',	'2021-04-12 10:41:25'),
(6,	'陣雨',	'987654321@gmail.com',	NULL,	'$2y$10$AjEyYwGTqhLU5vrwu8olNO8e.56q1xrdeUYI4BMxihZOYw7WQl.tW',	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-05-02 06:14:15',	'2021-05-02 06:14:15');

-- 2021-05-10 12:08:17
