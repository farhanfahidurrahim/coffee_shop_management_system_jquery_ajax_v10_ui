-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2023 at 08:22 PM
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
-- Database: `coffee_shop_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
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
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Farhan', 'admin@gmail.com', NULL, '$2y$10$jyHsd3BGt00wbM.k4b07v.0UV3LzrhiEBB7tmKk3gHc2MzgnN.rYi', NULL, NULL, NULL),
(4, 'Tyler FF', 'jemodecuc@mailinator.com', NULL, '$2y$10$tOOgldgfLELiwmiycUiLpOPhzNPuRlxqjpLHxxT2aEY5.CddTtwN2', NULL, '2023-09-20 03:05:15', '2023-09-21 01:08:17'),
(5, 'Joyyyy', 'joy@gmail.com', NULL, '$2y$10$h24kMbeB3h8vzV7Wqtnc2eYk6Bv5Xu8jwp6BVt5ZdP9OozEpStVE.', NULL, '2023-09-20 04:22:54', '2023-09-20 04:22:54'),
(15, 'Olivia Bryan', 'nuki@mailinator.com', NULL, '$2y$10$kaA9NnNXc3QmWyJG9v2qquqhdpq.6C8Cj8B94iC.aM7l.AanjCsxK', NULL, '2023-09-20 05:18:55', '2023-09-20 05:18:55'),
(27, 'Kylee Curtis', 'zosofokuv@mailinator.com', NULL, '$2y$10$ntzDvjnr3cMYvMiV4ZVeq.MjDAIR97LCGNqXDeuo5usII/rXBD1sq', NULL, '2023-09-21 01:18:39', '2023-09-21 01:18:39'),
(28, 'Cherokee Jordan', 'zohazitip@mailinator.com', NULL, '$2y$10$9Ef5t2VDKRMj4p6MwS3Gi.V82wlrpDcSVDYsL/8v2MTtHwF4HKtQW', NULL, '2023-09-21 01:18:54', '2023-09-21 01:18:54'),
(30, 'Perry Faeyh', 'poqot@mailinator.com', NULL, '$2y$10$ZfB2jOtqYhTL4IMs7IuWiezsMAjQrWrbVumjJCzDex6cBqPbZ0Z3S', NULL, '2023-09-21 01:28:52', '2023-09-21 01:36:28'),
(33, 'Lenore Farrrr', 'linevoxa@mailinator.com', NULL, '$2y$10$WQZyapKvS3U.HrZKTnzdIupcS/FHKUeCXe2MUYlrPE3DwbTdvobwS', NULL, '2023-09-21 01:37:01', '2023-09-21 01:41:40'),
(34, 'Tasha Guthrie', 'hycicum@mailinator.com', NULL, '$2y$10$2iojLLhNpjDv0zJwBeO4/.RwSDPHTJLNJB4YTs1vN/zGKgpU/9POC', NULL, '2023-09-21 01:57:06', '2023-09-21 01:57:06'),
(35, 'asdasd', 'asd@asd', NULL, '$2y$10$UAyrgn2qe90KMfdtxi174.m7d4RI0LbPeZO2DJD9HwXD54Nse9O3q', NULL, '2023-09-21 02:46:13', '2023-09-21 02:46:13'),
(40, 'Maryam Bauer', 'gisofejes@mailinator.com', NULL, '$2y$10$nfNlK3Ye1iElgxyW8ifiH.BXUHCnhP8bZcroacT1gXMt9nkzTYvnu', NULL, '2023-09-21 02:51:48', '2023-09-21 02:51:48'),
(41, 'Shoshana Le', 'tudi@mailinator.com', NULL, '$2y$10$sUWdjwlPSvcPhPDAfijHYOQ/0NLJZTMmHJiyS4/4YI8Tboj07WLrC', NULL, '2023-09-21 02:52:52', '2023-09-21 02:52:52'),
(42, 'Jessamine Mullins', 'jefuka@mailinator.com', NULL, '$2y$10$rUM24M3cirDoLnWYtUSLy.mscZpZE3fir8ciFz/MVzjVgL0rrnivi', NULL, '2023-09-21 02:56:04', '2023-09-21 02:56:04'),
(43, 'Addison Anderson', 'cykowij@mailinator.com', NULL, '$2y$10$OytT0wzFEWMBfpojY.G4c.MggThtmnMHlV3UL/JTasOa4Q0FVetRS', NULL, '2023-09-21 02:56:28', '2023-09-21 02:56:28'),
(44, 'Simon Bradley', 'valaqeka@mailinator.com', NULL, '$2y$10$1W2Z0YYqm6JmwdApR2A2Hum57D1mraxLwMh7/d76cbZK5ahelx1rS', NULL, '2023-09-21 02:56:36', '2023-09-21 02:56:36'),
(45, 'Germane Burgess', 'riwegebi@mailinator.com', NULL, '$2y$10$iRdRpRrRM2kdbCF7fe/fG.uDZrj8gEYiLOsN9WL8VN3zStcE7cJbS', NULL, '2023-09-21 02:57:41', '2023-09-21 02:57:41'),
(46, 'Montana Barron', 'toqore@mailinator.com', NULL, '$2y$10$vL1aGwyqIqaQSm5J/XqU5.jgcL3Mc20byqLij3GJE7DngP7CsNyHm', NULL, '2023-09-21 03:01:24', '2023-09-21 03:01:24'),
(47, 'Lacey Bolton', 'vala@mailinator.com', NULL, '$2y$10$L9v52dC3ucUq.tvYptUoBevYq38QZDY6gWMXs3WlUUgeGTxUvncpe', NULL, '2023-09-21 03:01:31', '2023-09-21 03:01:31'),
(48, 'Ira Mckee', 'wytugyg@mailinator.com', NULL, '$2y$10$rFu6QmoBvDnQleSekrVx9.5c6rfadvLxoymmWaMl6zq.tCtQA3.OK', NULL, '2023-09-21 03:04:34', '2023-09-21 03:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `booktables`
--

CREATE TABLE `booktables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('processing','booked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booktables`
--

INSERT INTO `booktables` (`id`, `first_name`, `last_name`, `date`, `time`, `phone`, `message`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lilah', 'Guerra', '2006-04-21', '12:30am', '+1 (477) 229-8217', 'Earum voluptates eli', '1', 'processing', '2023-09-30 03:59:47', '2023-09-30 03:59:47'),
(2, 'Kai', 'Alvarez', '2005-03-01', '2:00am', '+1 (349) 338-2172', 'Voluptatem Ex maior', '1', 'booked', '2023-09-30 03:59:53', '2023-09-30 03:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `name`, `image`, `price`, `user_id`, `created_at`, `updated_at`) VALUES
(27, 6, 'Benedict Murray', 'benedict-murray-1695550469.jpg', '159.00', 1, '2023-09-28 23:00:46', '2023-09-28 23:00:46'),
(29, 17, 'Aidan Wyatt', 'aidan-wyatt-1695550594.jpg', '68.00', 1, '2023-09-28 23:01:29', '2023-09-28 23:01:29');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_19_164148_create_admins_table', 2),
(10, '2023_09_21_133151_create_products_table', 3),
(11, '2023_09_24_162813_create_carts_table', 4),
(18, '2023_09_25_074058_create_orders_table', 5),
(20, '2023_09_30_095340_create_reviews_table', 7),
(21, '2023_09_29_051649_create_booktables_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('processing','complete') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('drink','dessert') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'drink',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `image`, `price`, `description`, `type`, `created_at`, `updated_at`) VALUES
(6, 'Benedict Murray', 'benedict-murray', 'benedict-murray-1695550469.jpg', '159.00', 'Fugit sed numquam e', 'dessert', '2023-09-24 04:14:29', '2023-09-24 04:14:29'),
(7, 'Laura Farrell', 'laura-farrell', 'laura-farrell-1695550482.jpg', '251.00', 'Earum non nulla quis', 'dessert', '2023-09-24 04:14:42', '2023-09-24 04:14:42'),
(8, 'Clarke Mcgowan', 'clarke-mcgowan', 'clarke-mcgowan-1695550498.jpg', '432.00', 'Voluptatem Quidem n', 'drink', '2023-09-24 04:14:58', '2023-09-24 04:14:58'),
(9, 'Ila Joyner', 'ila-joyner', 'ila-joyner-1695550508.jpg', '852.00', 'Velit sapiente ipsum', 'dessert', '2023-09-24 04:15:08', '2023-09-24 04:15:08'),
(10, 'Emery Combs', 'emery-combs', 'emery-combs-1695550520.jpg', '596.00', 'Sequi velit id ipsum', 'drink', '2023-09-24 04:15:20', '2023-09-24 04:15:20'),
(11, 'Yuri Watkins', 'yuri-watkins', 'yuri-watkins-1695550532.jpg', '189.00', 'Consequuntur labore', 'drink', '2023-09-24 04:15:32', '2023-09-24 04:15:32'),
(12, 'Samson Pearson', 'samson-pearson', 'samson-pearson-1695550539.jpg', '474.00', 'Quis quam repellendu', 'drink', '2023-09-24 04:15:39', '2023-09-24 04:15:39'),
(13, 'Stewart Huff', 'stewart-huff', 'stewart-huff-1695550547.jpg', '181.00', 'Omnis quia anim aspe', 'drink', '2023-09-24 04:15:47', '2023-09-24 04:15:47'),
(14, 'Macon Golden', 'macon-golden', 'macon-golden-1695550557.jpg', '858.00', 'Et in perspiciatis', 'dessert', '2023-09-24 04:15:57', '2023-09-24 04:15:57'),
(16, 'Iris Flores', 'iris-flores', 'iris-flores-1695550588.jpg', '371.00', 'Animi enim maiores', 'drink', '2023-09-24 04:16:28', '2023-09-24 04:16:28'),
(17, 'Aidan Wyatt', 'aidan-wyatt', 'aidan-wyatt-1695550594.jpg', '68.00', 'Eligendi et inventor', 'drink', '2023-09-24 04:16:34', '2023-09-24 04:16:34'),
(18, 'Sybill Mcleod', 'sybill-mcleod', 'sybill-mcleod-1695550606.jpg', '631.00', 'Quia laborum consequ', 'dessert', '2023-09-24 04:16:46', '2023-09-24 04:16:46'),
(19, 'Kelly Lara', 'kelly-lara', 'kelly-lara-1695550617.jpg', '667.00', 'Dolore quam quis qui', 'dessert', '2023-09-24 04:16:57', '2023-09-24 04:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Farhan Fahidur Rahim', 'farhan@gmail.com', NULL, '$2y$10$jyHsd3BGt00wbM.k4b07v.0UV3LzrhiEBB7tmKk3gHc2MzgnN.rYi', NULL, '2023-09-19 03:46:58', '2023-09-19 03:46:58'),
(2, 'Rose Goodwin', 'pijucyb@mailinator.com', NULL, '$2y$10$at6QJ7BWNSU4gC2T0omiQ.35hoDPwd6MkBY4ofkj.Tx/ZpsO.olSW', NULL, '2023-09-19 10:21:56', '2023-09-19 10:21:56');

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
-- Indexes for table `booktables`
--
ALTER TABLE `booktables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `booktables`
--
ALTER TABLE `booktables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
