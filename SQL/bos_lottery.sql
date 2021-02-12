-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2021 at 09:25 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bos_lottery`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `lottery_date` varchar(50) NOT NULL,
  `lottery_time` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `lottery_date`, `lottery_time`, `user_id`, `created_at`, `updated_at`) VALUES
(12, '01 มกราคม 2021', '12:00', NULL, '2021-01-15 06:24:59', '2021-01-15 07:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `bet_temps`
--

CREATE TABLE `bet_temps` (
  `id` int(11) NOT NULL,
  `bet_number` varchar(6) NOT NULL,
  `amount_baht` decimal(10,2) NOT NULL,
  `bet_type` varchar(50) NOT NULL,
  `bet_type_id` int(11) NOT NULL,
  `amount_reward` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bet_transactions`
--

CREATE TABLE `bet_transactions` (
  `id` int(11) NOT NULL,
  `bet_customer_name` varchar(100) DEFAULT NULL,
  `bet_customer_mobile` varchar(40) DEFAULT NULL,
  `bet_number` varchar(6) DEFAULT NULL,
  `bet_amount` decimal(10,2) DEFAULT NULL,
  `separate_bet_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `old_bet_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `bet_type_id` int(11) DEFAULT NULL,
  `payment_status` varchar(3) DEFAULT NULL,
  `flag_is_correct` varchar(3) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_amount` decimal(10,2) DEFAULT NULL,
  `separate_payment_amount` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bet_transactions`
--

INSERT INTO `bet_transactions` (`id`, `bet_customer_name`, `bet_customer_mobile`, `bet_number`, `bet_amount`, `separate_bet_amount`, `old_bet_amount`, `bet_type_id`, `payment_status`, `flag_is_correct`, `created_at`, `updated_at`, `payment_amount`, `separate_payment_amount`) VALUES
(1, 'xoftspace', '0987654321', '03', '700.00', '0.00', '0.00', 3, 'NO', NULL, '2021-01-31 07:02:13', '2021-01-31 07:02:13', NULL, '0.00'),
(2, 'xoftspace', '0987654321', '30', '700.00', '0.00', '0.00', 3, 'NO', NULL, '2021-01-31 07:02:13', '2021-01-31 07:02:13', NULL, '0.00'),
(3, 'xoftspace1', '0987654322', '03', '900.00', '0.00', '0.00', 3, 'NO', NULL, '2021-01-31 07:02:39', '2021-01-31 07:02:39', NULL, '0.00'),
(4, 'xoftspace1', '0987654322', '30', '900.00', '0.00', '0.00', 3, 'NO', NULL, '2021-01-31 07:02:39', '2021-01-31 07:02:39', NULL, '0.00'),
(5, 'xoftspace', '', '778', '50.00', '0.00', '0.00', 1, 'NO', NULL, '2021-01-31 10:39:54', '2021-01-31 10:39:54', NULL, '0.00'),
(6, 'xoftspace', '', '778', '50.00', '0.00', '0.00', 2, 'NO', NULL, '2021-01-31 10:39:54', '2021-01-31 10:39:54', NULL, '0.00'),
(7, 'xoftspace', '', '787', '50.00', '0.00', '0.00', 1, 'NO', NULL, '2021-01-31 10:39:54', '2021-01-31 10:39:54', NULL, '0.00'),
(8, 'xoftspace', '', '787', '50.00', '0.00', '0.00', 2, 'NO', NULL, '2021-01-31 10:39:54', '2021-01-31 10:39:54', NULL, '0.00'),
(9, 'xoftspace', '', '877', '50.00', '0.00', '0.00', 1, 'NO', NULL, '2021-01-31 10:39:54', '2021-01-31 10:39:54', NULL, '0.00'),
(10, 'xoftspace', '', '877', '50.00', '0.00', '0.00', 2, 'NO', NULL, '2021-01-31 10:39:54', '2021-01-31 10:39:54', NULL, '0.00'),
(11, 'xoftspace', '', '675', '65.00', '0.00', '0.00', 1, 'NO', NULL, '2021-01-31 10:52:09', '2021-01-31 10:52:09', NULL, '0.00'),
(12, 'xoftspace', '', '675', '65.00', '0.00', '0.00', 11, 'NO', NULL, '2021-01-31 10:52:09', '2021-01-31 10:52:09', NULL, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `bet_transactions_separate`
--

CREATE TABLE `bet_transactions_separate` (
  `id` int(11) NOT NULL,
  `bet_customer_name` varchar(100) DEFAULT NULL,
  `bet_customer_mobile` varchar(40) DEFAULT NULL,
  `bet_number` varchar(6) DEFAULT NULL,
  `bet_amount` decimal(10,2) DEFAULT NULL,
  `bet_type_id` int(11) DEFAULT NULL,
  `payment_status` varchar(3) DEFAULT NULL,
  `flag_is_correct` varchar(3) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bet_types`
--

CREATE TABLE `bet_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `flag_calculate` varchar(30) DEFAULT NULL,
  `flag_code` varchar(20) DEFAULT NULL,
  `reward_amount_baht` decimal(10,2) DEFAULT NULL,
  `payment_limit` decimal(10,2) DEFAULT 0.00,
  `cal_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bet_types`
--

INSERT INTO `bet_types` (`id`, `name`, `created_at`, `updated_at`, `flag_calculate`, `flag_code`, `reward_amount_baht`, `payment_limit`, `cal_type`) VALUES
(1, '3 ตัวบน', '2020-12-19 16:48:39', '2021-01-15 07:18:20', 'YES', 'three_top', '900.00', '200.00', 'cal_three_digit_top'),
(2, '3 ตัวล่าง', '2020-12-19 16:48:49', '2021-01-15 10:02:32', 'YES', 'three_bottom', '450.00', '99999999.00', 'cal_three_digit_bottom'),
(3, '2 ตัวบน', '2020-12-19 16:48:58', '2021-01-15 07:19:13', 'YES', 'two_top', '90.00', '1500.00', 'cal_two_digit_top'),
(4, '2 ตัวล่าง', '2020-12-19 16:49:05', '2021-01-15 07:19:24', 'YES', 'two_bottom', '90.00', '2000.00', 'cal_two_digit_bottom'),
(5, 'วิ่งบน', '2020-12-19 16:53:13', '2021-01-15 10:02:47', 'YES', 'run_top', '3.20', '99999999.00', 'cal_run_top'),
(6, 'วิ่งล่าง', '2020-12-19 16:53:13', '2021-01-15 10:02:55', 'YES', 'run_bottom', '3.20', '99999999.00', 'cal_run_bottom'),
(9, 'เลข 19 ประตู (บน)', '2020-12-19 16:54:04', '2021-01-15 10:03:03', 'YES', 'bet_19_door_top', '45.00', '99999999.00', 'cal_two_digit_top'),
(10, 'เลข 19 ประตู (ล่าง)', '2020-12-19 17:34:11', '2021-01-15 10:03:13', 'YES', 'bet_19_door_bottom', '45.00', '99999999.00', 'cal_two_digit_bottom'),
(11, '3 ตัวโต๊ด', '2020-12-20 07:29:42', '2021-01-15 07:18:52', 'YES', 'three_tod', '30.00', '500.00', 'cal_tod'),
(12, '3 ตัวบน/ล่าง', '2020-12-23 15:28:46', '2020-12-23 15:28:46', 'NO', 'three_couple', '0.00', '0.00', NULL),
(13, '2 ตัวบน/ล่าง', '2020-12-23 15:29:10', '2020-12-23 15:29:10', 'NO', 'two_couple', '0.00', '0.00', NULL),
(14, '3 ตัวโต๊ด/ตรง', '2021-01-31 10:47:03', '2021-01-31 10:47:03', '์NO', 'three_couple_specail', '0.00', '0.00', NULL);

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
-- Table structure for table `government_lotterys`
--

CREATE TABLE `government_lotterys` (
  `id` int(11) NOT NULL,
  `first_prize` varchar(6) DEFAULT NULL,
  `three_digit_prefix_1` varchar(3) DEFAULT NULL,
  `three_digit_prefix_2` varchar(3) DEFAULT NULL,
  `three_digit_suffix_1` varchar(3) DEFAULT NULL,
  `three_digit_suffix_2` varchar(3) DEFAULT NULL,
  `two_digit_suffix` varchar(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `government_lotterys`
--

INSERT INTO `government_lotterys` (`id`, `first_prize`, `three_digit_prefix_1`, `three_digit_prefix_2`, `three_digit_suffix_1`, `three_digit_suffix_2`, `two_digit_suffix`, `created_at`, `updated_at`) VALUES
(1, '201303', '455', '454', '434', '333', '50', '2021-01-31 07:01:25', '2021-01-31 07:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `lottery_bets`
--

CREATE TABLE `lottery_bets` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `number_bet` varchar(3) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_12_11_060955_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `number_limits`
--

CREATE TABLE `number_limits` (
  `id` int(11) NOT NULL,
  `number_limit` varchar(6) NOT NULL,
  `payment_amount_percent` double DEFAULT NULL,
  `payment_amount_baht` double DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_setups`
--

CREATE TABLE `price_setups` (
  `id` int(11) NOT NULL,
  `three_top_baht` decimal(10,2) NOT NULL,
  `three_tod_baht` decimal(10,2) NOT NULL,
  `three_bottom_baht` decimal(10,2) NOT NULL,
  `three_prefix_baht` decimal(10,2) NOT NULL,
  `two_top_baht` decimal(10,2) NOT NULL,
  `two_bottom_baht` decimal(10,2) NOT NULL,
  `run_top_baht` decimal(10,2) NOT NULL,
  `run_bottom_baht` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lY05Iw43NdRJif3jg6ix1LErKqCYgSSSEvuAXGBb', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiVHJEOFpjSHJFWjNZSk1PbUZnOHp5SlNWckdzVTZoVHNJUWZXUkRxZCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbG90dGVyeS1iZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkVGJ1TzJpWmdveUxVa2suME1JSmhMLjdWc2JySWJNb0R0R2xaZEFiSnpYQm1wbU91NFg5TksiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFRidU8yaVpnb3lMVWtrLjBNSUpoTC43VnNickliTW9EdEdsWmRBYkp6WEJtcG1PdTRYOU5LIjt9', 1612090329),
('N2yTn8ILKo77TUt6CD7JwwbVz1JozCgS0j8cOsuM', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWjROSmxGbHdudHB6UnRwczNzcm8xQVNiSEtUNjhhZkx4ZkJsNTBJdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zdW1tYXJ5LWJ5LXR5cGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkVGJ1TzJpWmdveUxVa2suME1JSmhMLjdWc2JySWJNb0R0R2xaZEFiSnpYQm1wbU91NFg5TksiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFRidU8yaVpnb3lMVWtrLjBNSUpoTC43VnNickliTW9EdEdsWmRBYkp6WEJtcG1PdTRYOU5LIjt9', 1612087673);

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'xoftspace', 'lottery@gmail.com', NULL, '$2y$10$TbuO2iZgoyLUkk.0MIJhL.7VsbrIbMoDtGlZdAbJzXBmpmOu4X9NK', NULL, NULL, NULL, NULL, NULL, '2020-12-10 23:14:20', '2020-12-10 23:14:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bet_temps`
--
ALTER TABLE `bet_temps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bet_transactions`
--
ALTER TABLE `bet_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bet_transactions_separate`
--
ALTER TABLE `bet_transactions_separate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bet_types`
--
ALTER TABLE `bet_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `government_lotterys`
--
ALTER TABLE `government_lotterys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lottery_bets`
--
ALTER TABLE `lottery_bets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `number_limits`
--
ALTER TABLE `number_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `price_setups`
--
ALTER TABLE `price_setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bet_temps`
--
ALTER TABLE `bet_temps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `bet_transactions`
--
ALTER TABLE `bet_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bet_transactions_separate`
--
ALTER TABLE `bet_transactions_separate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `bet_types`
--
ALTER TABLE `bet_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `government_lotterys`
--
ALTER TABLE `government_lotterys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lottery_bets`
--
ALTER TABLE `lottery_bets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `number_limits`
--
ALTER TABLE `number_limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_setups`
--
ALTER TABLE `price_setups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
