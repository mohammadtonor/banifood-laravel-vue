-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 11:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banifood`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meal` tinyint(4) NOT NULL COMMENT '1: diner, 0: lunch, 3: breakfast',
  `image` varchar(2083) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `title`, `meal`, `image`, `meal_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 'قیمه بادنجان', 0, NULL, 1, 40000, '2022-01-12 04:48:10', '2022-01-12 04:48:10'),
(2, 'قرمه سبزی', 0, NULL, 1, 50000, '2022-01-18 06:06:58', '2022-01-18 06:06:58'),
(3, 'سالاد سزار', 0, NULL, 7, 30000, '2022-01-18 06:07:24', '2022-01-18 06:07:24'),
(4, 'کارامل', 0, NULL, 6, 18000, '2022-01-18 06:07:45', '2022-01-18 06:07:45'),
(5, 'جوجه کباب', 0, NULL, 1, 45000, '2022-01-18 06:08:10', '2022-01-18 06:08:10'),
(6, 'پیتزا پپرونی', 1, NULL, 1, 50000, '2022-01-18 06:08:36', '2022-01-18 06:08:36'),
(7, 'ناشف گوشت', 0, NULL, 1, 60000, '2022-01-18 06:08:55', '2022-01-18 06:08:55'),
(8, 'نوشیدنی یک نیم لیتری کوکا کولا', 0, NULL, 8, 15000, '2022-01-18 06:09:33', '2022-01-18 06:09:33'),
(9, 'آب معدنی', 0, NULL, 8, 10000, '2022-01-18 06:09:53', '2022-01-18 06:09:53'),
(10, 'چیزبرگر', 1, NULL, 4, 35000, '2022-01-18 06:10:21', '2022-01-18 06:10:21'),
(11, 'کباب کوبیده', 0, NULL, 1, 40000, '2022-01-18 06:10:41', '2022-01-18 06:10:41'),
(12, 'تیرامیسو', 0, NULL, 6, 20000, '2022-01-18 06:11:20', '2022-01-18 06:11:20'),
(13, 'برنج سفید', 0, NULL, 2, 25000, '2022-01-18 06:13:12', '2022-01-18 06:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(14, 'شعبه جین وست', 0, '2022-01-08 03:20:27', '2022-01-08 03:20:27'),
(15, 'انبار بانی مد', 0, '2022-01-08 03:22:12', '2022-01-08 03:22:12'),
(16, 'ستاد مرکزی بانی مد', 0, '2022-01-08 03:32:08', '2022-01-08 03:32:08'),
(17, 'مجتمع حدادی', 15, '2022-01-08 05:14:01', '2022-01-08 05:14:01'),
(18, 'اپال', 14, '2022-01-08 05:15:58', '2022-01-08 05:15:58'),
(19, 'مگامال', 14, '2022-01-14 03:32:59', '2022-01-14 03:32:59'),
(20, 'ایران مال', 14, '2022-01-14 03:35:10', '2022-01-14 03:35:10'),
(24, 'ساختمان رویال', 14, '2022-02-01 16:15:50', '2022-02-01 16:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'غذای اصلی', '2022-01-12 04:08:35', '2022-01-12 04:08:35'),
(2, 'اضافات', '2022-01-14 02:24:21', '2022-01-14 02:24:21'),
(3, 'خوراک', '2022-01-14 02:33:19', '2022-01-14 02:33:19'),
(4, 'ساندویج', '2022-01-14 02:33:34', '2022-01-14 02:33:34'),
(5, 'گیاهی', '2022-01-14 02:33:55', '2022-01-14 02:33:55'),
(6, 'دسر', '2022-01-14 02:34:06', '2022-01-14 02:34:06'),
(7, 'سالاد', '2022-01-14 02:34:13', '2022-01-14 02:34:13'),
(8, 'نوشیدنی', '2022-01-14 02:34:25', '2022-01-14 02:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `food_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `date` date NOT NULL,
  `dishes` tinyint(4) NOT NULL COMMENT '0 : lunch , 1 : dinner , 3 : breakfast',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meal_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `food_id`, `date`, `dishes`, `created_at`, `updated_at`, `meal_id`) VALUES
(1, 1, '2022-01-14', 0, '2022-01-14 03:31:56', '2022-01-14 03:31:56', 1),
(2, 13, '2022-01-14', 0, '2022-01-18 06:22:22', '2022-01-18 06:22:22', 2),
(3, 4, '2022-01-14', 0, '2022-01-18 06:23:00', '2022-01-18 06:23:00', 6),
(4, 8, '2022-01-14', 0, '2022-01-18 06:23:18', '2022-01-18 06:23:18', 4),
(5, 11, '2022-01-14', 0, '2022-01-18 06:23:56', '2022-01-18 06:23:56', 1),
(6, 2, '2022-01-15', 0, '2022-01-18 06:27:14', '2022-01-18 06:27:14', 1),
(7, 13, '2022-01-15', 0, '2022-01-18 06:28:15', '2022-01-18 06:28:15', 1),
(8, 7, '2022-01-15', 0, '2022-01-18 06:28:44', '2022-01-18 06:28:44', 1),
(9, 3, '2022-01-15', 0, '2022-01-18 06:29:02', '2022-01-18 06:29:02', 7),
(10, 8, '2022-01-15', 0, '2022-01-18 06:29:14', '2022-01-18 06:29:14', 8),
(11, 11, '2022-01-16', 0, '2022-01-18 06:30:48', '2022-01-18 06:30:48', 1),
(12, 12, '2022-01-16', 0, '2022-01-18 06:31:20', '2022-01-18 06:31:20', 6),
(13, 8, '2022-01-16', 0, '2022-01-18 06:31:31', '2022-01-18 06:31:31', 8),
(14, 4, '2022-01-16', 0, '2022-01-18 06:31:49', '2022-01-18 06:31:49', 6),
(15, 9, '2022-01-16', 0, '2022-01-18 06:32:06', '2022-01-18 06:32:06', 8),
(21, 9, '2022-01-25', 1, '2022-01-31 21:21:16', '2022-01-31 21:21:16', 8),
(22, 11, '2022-01-25', 0, '2022-02-02 03:31:08', '2022-02-02 03:31:08', 1),
(23, 3, '2022-01-25', 0, '2022-02-02 03:31:33', '2022-02-02 03:31:33', 7),
(24, 7, '2022-01-26', 0, '2022-02-02 03:32:01', '2022-02-02 03:32:01', 1),
(137, 7, '2022-02-07', 0, '2022-02-05 23:54:09', '2022-02-05 23:54:09', 1),
(138, 13, '2022-02-07', 0, '2022-02-05 23:54:09', '2022-02-05 23:54:09', 2),
(139, 10, '2022-02-07', 0, '2022-02-05 23:54:09', '2022-02-05 23:54:09', 4),
(140, 12, '2022-02-07', 0, '2022-02-05 23:54:09', '2022-02-05 23:54:09', 6),
(141, 3, '2022-02-07', 0, '2022-02-05 23:54:09', '2022-02-05 23:54:09', 7),
(142, 8, '2022-02-07', 0, '2022-02-06 03:11:06', '2022-02-06 03:11:06', 8),
(143, 4, '2022-02-08', 0, '2022-02-06 03:14:55', '2022-02-06 03:14:55', 6),
(144, 9, '2022-02-07', 0, '2022-02-06 03:16:25', '2022-02-06 03:16:25', 8);

-- --------------------------------------------------------

--
-- Table structure for table `menu_order`
--

CREATE TABLE `menu_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) NOT NULL
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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_12_31_080936_create_locations_table', 1),
(4, '2021_12_31_090645_create_food_table', 1),
(5, '2022_01_03_070418_create_meals_table', 1),
(6, '2022_01_03_071131_create_menus_table', 2),
(7, '2022_01_03_071301_create_food_table', 2),
(8, '2022_01_03_072037_create_orders_table', 3),
(9, '2022_01_03_072227_create_peyments_table', 3),
(10, '2022_01_03_072700_create_order_menu_table', 4),
(11, '2022_01_03_073357_create_order_menu_table', 5),
(12, '2022_01_03_084001_add_foreign_key_on_user_id_into_orders_table', 6),
(13, '2022_01_03_085542_add_foreign_key_on_order_id_into_peyment_table', 7),
(14, '2022_01_03_091232_add_foreign_key_on_meal_id_into_foods_table', 8),
(15, '2022_01_03_091537_create_food_table', 9),
(16, '2022_01_03_091750_add_foreign_key_on_meal_id_into_foods_table', 10),
(17, '2022_01_03_092056_add_foreign_key_on_location_id_into_users_table', 11),
(18, '2022_01_04_062823_add_foreign_key_on_food_id_into_menus_table', 12),
(19, '2022_01_07_061405_add_foreign_key_on_parent_id_into_locations_table', 13),
(20, '2022_01_07_065034_create_users_table', 14),
(21, '2022_01_07_065052_create_orders_table', 14),
(22, '2022_01_07_065935_create_users_table', 15),
(23, '2022_01_07_065946_create_locations_table', 15),
(24, '2022_01_07_070000_create_orders_table', 15),
(25, '2022_01_07_070014_create_peyments_table', 15),
(26, '2022_01_07_071143_add_foreign_key_on_parent_id_into_locations_table', 16),
(27, '2022_01_07_071415_add_foreign_key_on_location_id_into_users_table', 17),
(28, '2022_01_07_071642_add_foreign_key_on_user_id_into_orders_table', 18),
(29, '2022_01_07_071758_add_foreign_key_on_order_id_into_peyments_table', 19),
(30, '2022_01_07_072109_create_menu_order_location_table', 20),
(31, '2022_01_07_093639_add_foreign_key_on_parent_id_into_locations_table', 21),
(32, '2022_01_14_063003_add_dishes_into_menus_table', 22),
(33, '2022_01_26_231258_create_order_menu_table', 23),
(34, '2014_10_12_100000_create_password_resets_table', 24),
(35, '2022_01_28_013242_create_order_menu_table', 25),
(36, '2022_01_28_013923_create_menu_order_table', 26),
(37, '2022_01_30_200819_add_wallet_into_payment_table', 27),
(38, '2022_02_10_060340_add_phone_number_to_users_table', 28),
(39, '2022_02_10_063207_create_two_factor_table', 29);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `peyments`
--

CREATE TABLE `peyments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet` int(11) DEFAULT 0,
  `gateway` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 : Incomplete , 1 : Complete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `two_factor`
--

CREATE TABLE `two_factor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet` bigint(20) NOT NULL,
  `isadmin` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_two_factor` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `family`, `email`, `wallet`, `isadmin`, `type`, `location_id`, `email_verified_at`, `password`, `phone_number`, `has_two_factor`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mohammad', 'tonor', 'm.tonor@banimode.com', 2500000, 1, 0, 17, '2022-01-16 07:59:01', '123456', NULL, 1, NULL, '2022-01-10 05:24:46', '2022-01-16 04:29:01'),
(2, 'mohammad', 'Tonor', 'Mtonor1368@gmail.com', 105000, 0, 1, 19, '2022-02-21 09:06:54', '$2y$10$Mj3V.d4TC.eDsYYTz5m1LuRmacIhQPEM5llFiaG4iR1hjfxQG31M6', '09173623364', 1, '0EbLTGRYArxFn4e4Obba5JEzMDdZkonm7n6c9p23zfS18f4vDt7Kin6kv9uM', '2022-01-26 23:11:49', '2022-02-21 04:16:28'),
(3, 'امیر', 'غلامی', 'a.gholami@banimode.com', 250000, 1, 1, 16, '2022-02-21 08:39:30', '$2y$10$rZej6R0r1COewmOXItGiUOYYLYp.lHuadrUmbFK8sT5DGqtJEMeIi', '09373352733', 1, NULL, '2022-02-21 04:50:24', '2022-02-21 05:09:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foods_meal_id_foreign` (`meal_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id_menus` (`food_id`);

--
-- Indexes for table `menu_order`
--
ALTER TABLE `menu_order`
  ADD KEY `menu_order_order_id_foreign` (`order_id`),
  ADD KEY `menu_order_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_code_unique` (`code`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peyments`
--
ALTER TABLE `peyments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peyments_order_id_foreign` (`order_id`);

--
-- Indexes for table `two_factor`
--
ALTER TABLE `two_factor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `two_factor_user_id_unique` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_location_id_foreign` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100150;

--
-- AUTO_INCREMENT for table `peyments`
--
ALTER TABLE `peyments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `two_factor`
--
ALTER TABLE `two_factor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_meal_id_foreign` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `food_id_menus` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`);

--
-- Constraints for table `menu_order`
--
ALTER TABLE `menu_order`
  ADD CONSTRAINT `menu_order_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `peyments`
--
ALTER TABLE `peyments`
  ADD CONSTRAINT `peyments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
