-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 10:59 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `smtpHost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setFrom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senderName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`id`, `smtpHost`, `email`, `password`, `type`, `port`, `setFrom`, `senderName`, `created_at`, `updated_at`) VALUES
(14, 'sandbox.smtp.mailtrap.io', 'e68f91daa3e806', '83978972bcf76c', 'tls', '2525', NULL, NULL, '2023-06-01 07:06:07', '2023-06-01 07:06:07');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2023_05_20_182106_create_posts_table', 1),
(15, '2023_05_22_170804_add_slug_to_posts_table', 1),
(16, '2023_05_23_215245_create_email_settings_table', 1);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(4, 'App\\Models\\User', 2, 'GURU Developers Token Login', 'c648545477d076722ec8c644412cf1a3a0252665bc7e24bf850b3cd5b61aed09', '[\"*\"]', '2023-05-28 14:55:23', NULL, '2023-05-28 12:00:24', '2023-05-28 14:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_insertion` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `featured_image`, `user_id`, `slug`, `api_insertion`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Claim Policy', 'HI', 'upload/post_images/1766977586472379.png', 1, 'http://127.0.0.1:8000/post/claim_policy', 0, '2023-05-27 09:57:49', '2023-05-26 17:12:22', '2023-05-27 09:57:49'),
(2, 'aaa', 'ffff', NULL, 1, 'http://127.0.0.1:8000/post/aaa', 1, '2023-05-27 08:22:41', '2023-05-26 18:09:12', '2023-05-27 08:22:41'),
(3, 'Mahmood', 'Raja', NULL, 1, 'http://127.0.0.1:8000/post/mahmood', 1, NULL, '2023-05-27 08:19:52', '2023-05-27 08:19:52'),
(4, 'Mahmood', 'Raja', NULL, 1, 'http://127.0.0.1:8000/post/mahmood', 1, NULL, '2023-05-27 08:57:10', '2023-05-27 08:57:10'),
(5, 'Mahmood Hassan', 'Raja Parkaash', NULL, 1, 'http://127.0.0.1:8000/post/mahmood_hassan', 1, NULL, '2023-05-27 08:57:35', '2023-05-27 08:57:35'),
(6, 'Hassan Naqvi', 'Munsi Jae paal', NULL, 2, 'http://127.0.0.1:8000/post/hassan_naqvi', 1, NULL, '2023-05-27 09:02:16', '2023-05-27 09:02:16'),
(7, 'Heroshima Japan check done', 'Nagasaki Death check done', 'upload/post_images/1767040664474906.png', 1, 'http://127.0.0.1:8000/post/heroshima_japan_check_done', 0, '2023-05-27 09:55:57', '2023-05-27 09:51:56', '2023-05-27 09:55:57'),
(8, 'Kill', 'Attack', 'upload/post_images/1767040700974253.png', 1, 'http://127.0.0.1:8000/post/kill', 0, '2023-05-27 09:55:38', '2023-05-27 09:55:32', '2023-05-27 09:55:38'),
(9, 'Nabi', 'Flower', 'upload/post_images/1767040857361974.png', 1, 'http://127.0.0.1:8000/post/nabi', 0, '2023-05-27 10:00:47', '2023-05-27 09:57:43', '2023-05-27 10:00:47'),
(10, 'Hand Sign', 'Death Seal', 'upload/post_images/1767041074113826.png', 1, 'http://127.0.0.1:8000/post/hand_sign', 0, '2023-05-27 10:01:38', '2023-05-27 10:01:28', '2023-05-27 10:01:38'),
(11, 'Dark', 'Body', 'upload/post_images/1767041145638869.jpg', 1, 'http://127.0.0.1:8000/post/dark', 0, '2023-05-27 10:02:53', '2023-05-27 10:02:36', '2023-05-27 10:02:53'),
(12, 'JAM', 'hI ban long time no see', 'upload/post_images/1767121768699199.jpg', 1, 'http://127.0.0.1:8000/post/jam', 0, '2023-05-28 08:28:24', '2023-05-28 07:24:05', '2023-05-28 08:28:24'),
(13, 'Dump', 'Student By ID', 'upload/post_images/1767125353177251.png', 1, 'http://127.0.0.1:8000/post/dump', 0, '2023-05-28 08:28:42', '2023-05-28 07:24:26', '2023-05-28 08:28:42'),
(15, 'Great Muhammad', 'Superb', 'upload/post_images/1767124569476874.jpg', 1, 'http://127.0.0.1:8000/post/great_muhammad', 0, '2023-05-28 08:29:10', '2023-05-28 07:37:41', '2023-05-28 08:29:10'),
(16, 'New Comers', 'asd', 'upload/post_images/1767125108357262.png', 1, 'http://127.0.0.1:8000/post/new_comers', 0, '2023-05-28 08:38:39', '2023-05-28 08:14:43', '2023-05-28 08:38:39'),
(17, 'asaan', 'easy way', 'upload/post_images/1767485222069836.jpeg', 1, 'http://127.0.0.1:8000/post/asaan', 0, '2023-06-01 07:59:28', '2023-05-28 08:18:16', '2023-06-01 07:59:28'),
(18, 'Haji Habib Jee s', 'Bullae Shah DON e', 'upload/post_images/1767126400006712.jpg', 1, 'http://127.0.0.1:8000/post/haji_habib_jee_s', 0, '2023-05-28 08:37:53', '2023-05-28 08:29:39', '2023-05-28 08:37:53'),
(19, 'Finisher mesoor', 'Higj risk octane', 'upload/post_images/1767126536235877.png', 1, 'http://127.0.0.1:8000/post/finisher_mesoor', 0, '2023-05-28 08:39:59', '2023-05-28 08:39:27', '2023-05-28 08:39:59'),
(20, 'Huwai', 'Mobile', 'upload/post_images/1767130366009698.png', 1, 'http://127.0.0.1:8000/post/huwai', 0, '2023-05-28 09:42:57', '2023-05-28 09:40:44', '2023-05-28 09:42:57'),
(21, 'Cache', 'JK', 'upload/post_images/1767130395309762.jpg', 1, 'http://127.0.0.1:8000/post/cache', 0, NULL, '2023-05-28 09:41:11', '2023-05-28 09:41:11'),
(22, 'Ya Allah a', 'Al Madaad al azeez', 'upload/post_images/1767486323996101.jpeg', 1, 'http://127.0.0.1:8000/post/ya_allah_a', 0, NULL, '2023-05-28 09:42:25', '2023-06-01 07:58:31'),
(23, 'Num', 'Rm', 'upload/post_images/1767130499995849.jpg', 1, 'http://127.0.0.1:8000/post/num', 0, '2023-05-28 09:43:06', '2023-05-28 09:42:51', '2023-05-28 09:43:06'),
(24, 'Edit Title', 'Edit Body', NULL, 2, 'http://127.0.0.1:8000/post/edit_title', 1, '2023-05-28 12:06:29', '2023-05-28 12:02:39', '2023-05-28 12:06:29'),
(25, 'Higher', 'Studies Abroad', 'upload/post_images/1767139928912293.png', 1, 'http://127.0.0.1:8000/post/higher', 0, '2023-05-28 12:12:52', '2023-05-28 12:12:24', '2023-05-28 12:12:52'),
(26, 'Hello', 'Clash ht', 'upload/post_images/1767148881635169.jpg', 1, 'http://127.0.0.1:8000/post/hello', 0, '2023-05-28 14:35:19', '2023-05-28 14:34:49', '2023-05-28 14:35:19'),
(27, 'Edit Title', 'Edit Body', NULL, 2, 'http://127.0.0.1:8000/post/edit_title', 1, NULL, '2023-05-28 14:54:39', '2023-05-28 14:54:39'),
(28, 'Huwai', 'Controller', 'upload/post_images/1767482879267845.jpeg', 1, 'http://127.0.0.1:8000/post/huwai', 0, NULL, '2023-06-01 07:03:47', '2023-06-01 07:03:47'),
(29, 'New Content', 'Body', 'upload/post_images/1767484667183146.jpeg', 1, 'http://127.0.0.1:8000/post/new_content', 0, '2023-06-01 07:32:17', '2023-06-01 07:32:11', '2023-06-01 07:32:17');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mahmood', 'mahmood.zia.uppal@gmail.com', NULL, '$2y$10$S94pEDviyZLkHi92ss.SPOR76ADp6QYXWZzKxhm9baCFLIxNnBwMu', NULL, '2023-05-26 17:11:54', '2023-05-26 17:11:54'),
(2, 'tokeen', '2015ce8@student.uet.edu.pk', NULL, '$2y$10$SMsLNQWOnRu9SaBcBcqbReou/iCxEJoRDi0BIq5jC9EQ/5u/jyQBC', NULL, '2023-05-27 08:52:09', '2023-05-27 08:52:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
