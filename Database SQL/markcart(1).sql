-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 02:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `markcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `logo`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'logo/usvU0J3tGMmI4ZJpjWHzgB5yrCjezMlIkHhQ6yPS.png', 'MarkCart.com@21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `mobile`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Shaki Test', 'shakihusain4@gmail.com', '01738849556', '12345', 1, '2021-03-26 09:49:18', NULL),
(2, 'Hello5', 'shakihusain@gmail.com', '01773837332', '12345', 2, '2021-03-26 09:54:22', NULL),
(4, 'hussaintt', 'shakib@gmail.com', '017388495565', '12345', 1, '2021-03-31 02:40:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(23, 22, 2, NULL, NULL),
(25, 20, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Television', NULL, NULL),
(2, 'Shoes', NULL, NULL),
(3, 'Mobile', NULL, NULL),
(4, 'Laptop', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `product_id`, `photos`, `created_at`, `updated_at`) VALUES
(17, 20, 'gallery/nFjaQwWEKX4l0BVAANXOgKmyd4CGgd4mvMPc97cS.jpg', NULL, NULL),
(18, 20, 'gallery/pz7SQW9qlqlnpyvkDIaxQEjZUYvRIcAI7pIJqilm.png', NULL, NULL),
(19, 20, 'gallery/HGo5VfcjNjYn8wnZ1RiIaJvcJ1V1i67xGW96HNXn.jpg', NULL, NULL),
(20, 20, 'egallery/UWvXKfAA8g0oMnyD1qQXDtgEfCiDTLllsEJeYyc6.jpg', NULL, '2021-04-04 23:34:38'),
(21, 21, 'gallery/LGyTD41jy2las2UpB5Rfend2jSBRmYGCOkaKzScD.png', NULL, NULL),
(22, 21, 'gallery/ATA4msitc1pbuXG0Ei2erTz2b4VUDRj5ZJXOQquw.png', NULL, NULL),
(23, 22, 'gallery/jxH3OZGmpnNTEGO9tdLnmmkEWhD04nrdNm0RyJ2a.jpg', NULL, NULL),
(24, 22, 'gallery/ajG59xaLo0pbxL9LcRceEcq3FQgW9YsM4Qj33TGk.jpg', NULL, NULL),
(25, 22, 'gallery/4vMFuWT9OM7RKlie3FQtj02o1TCcvfWZBCq3Rxfe.jpg', NULL, NULL),
(26, 20, 'egallery/DNe1p7XurELk6qhLK2RoxEFHDlF5Dg1zo9A8qBWX.webp', NULL, NULL),
(31, 23, 'gallery/BNyh61e6s7DXZYux67vmTW7k477ohA02G2sNeZep.jpg', NULL, NULL),
(32, 23, 'gallery/Mnafu21eg7BiLvvQrAAHeOCO0hZXUmnTrkJdjeu7.jpg', NULL, NULL),
(33, 23, 'gallery/Ma8Eramdt6tZtMoKmMEhl1ucQdolAOYIKMPkBeRN.jpg', NULL, NULL),
(34, 24, 'gallery/kNWWPHcL5s1tc0UlN1s7YIRbEoZRS3UNu74wYE6g.png', NULL, NULL),
(35, 24, 'gallery/escsug8s0NvThUAaUrOO7htbHUND3UujqqzzuLeF.png', NULL, NULL),
(36, 24, 'gallery/jJF5RXU4y3ZYL72u8DdapXE3nXlShEuyWd3Ib6ya.png', NULL, NULL),
(37, 25, 'gallery/RhvHlvVDBr9gy1GOSvxyuDVcrSUCP3h1UaL7I8va.jpg', NULL, NULL),
(38, 25, 'gallery/sY6a6OH6aZL7ALZ3uC0pcEA76PX3NKJbj6oa4aIa.png', NULL, NULL),
(39, 25, 'gallery/F0fEcZxw7sTQg3NaAiWPgDV2EXIaFNwjB2ew0R9h.png', NULL, NULL);

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
(3, '2021_03_20_103310_create_users_table', 1),
(4, '2021_03_21_004343_create_products_table', 1),
(5, '2021_03_21_100414_create_cart_table', 2),
(6, '2021_03_24_150357_create_orders_table', 3),
(7, '2021_03_26_005813_create_admin_table', 4),
(8, '2021_04_01_041509_create_actions_table', 5),
(9, '2021_04_02_101551_create_gallery_table', 6),
(10, '2021_04_06_003856_create_category_table', 7),
(11, '2021_04_08_055210_create_slide_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ammout` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qantity` int(11) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` varchar(211) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `product_name`, `ammout`, `address`, `user_name`, `email`, `city`, `order_status`, `payment_status`, `payment_method`, `phone`, `qantity`, `size`, `color`, `order_number`, `created_at`, `updated_at`) VALUES
(13, 500, 21, 'Television samsang New Brand', 410, 'Goalgram, Daulatpur, Kushtia, Dhaka Bangladesh', 'Hussain Al Mahmud', 'hussainn@gmail.com', 'Kushtia', 'Pending', 'Pending', 'Online', '018394838893', 2, NULL, NULL, '1617606725', '2021-04-05 01:12:05', '2021-04-05 01:12:05'),
(14, 5, 20, 'Brand New Vision Mobile', 18008, 'shakisk23@gmail.com', 'shahariar', 'shakisk23@gmail.com', 'Meherpur', 'Canceled', 'Pending', 'COD', '01771893984', 2, NULL, NULL, '1617614735', '2021-04-05 03:25:35', '2021-04-05 03:35:26'),
(15, 5, 20, 'Brand New Vision Mobile', 8999, 'shakisk23@gmail.com', 'shahariar', 'shakisk23@gmail.com', 'Kushtia', 'Canceled', 'Pending', 'Online', '01771893984', 1, NULL, NULL, '1617614794', '2021-04-05 03:26:34', '2021-04-22 00:33:21'),
(16, 5, 21, 'Television samsang New Brand', 200, 'shakisk23@gmail.com', 'shahariar', 'shakisk23@gmail.com', 'Kushtia', 'Canceled', 'Pending', 'Online', '01771893984', 1, NULL, NULL, '1617614794', '2021-04-05 03:26:34', '2021-04-05 03:34:30'),
(17, 5, 22, 'Master Watch Brand New', 700, 'shakisk23@gmail.com', 'shahariar', 'shakisk23@gmail.com', 'Meherpur', 'Canceled', 'Pending', 'COD', '01771893984', 2, NULL, NULL, '1617864157', '2021-04-08 00:42:37', '2021-04-22 00:33:51'),
(18, 5, 21, 'Television samsang New Brand', 200, 'shakisk23@gmail.com', 'shahariar', 'shakisk23@gmail.com', 'Kushtia', 'Canceled', 'Pending', 'Online', '01771893984', 1, NULL, NULL, '1619073164', '2021-04-22 00:32:44', '2021-04-22 00:33:04'),
(19, 5, 20, 'Brand New Vision Mobile', 8999, 'shakisk23@gmail.com', 'shahariar', 'shakisk23@gmail.com', 'New York', 'Pending', 'Pending', 'Online', '01771893984', 1, NULL, NULL, '1619074246', '2021-04-22 00:50:46', '2021-04-22 00:50:46'),
(20, 5, 24, 'Master Watch2 Brand New', 8210, 'shakisk23@gmail.com', 'shahariar', 'shakisk23@gmail.com', 'Kushtia', 'Pending', 'Pending', 'Online', '01771893984', 1, NULL, NULL, '1619074287', '2021-04-22 00:51:27', '2021-04-22 00:51:27'),
(21, 2, 22, 'Master Watch Brand New', 345, 'Goalgram, Daulatpur, Kushtia, Dhaka Bangladesh', 'Shakib', 'hussain@gmail.com', 'Kushtia', 'Pending', 'Pending', 'Online', '01738849556', 1, NULL, NULL, '1625662198', '2021-07-07 06:49:58', '2021-07-07 06:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'New Product',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Defined',
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Defined',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Defined',
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `description`, `gallery`, `color`, `size`, `stock`, `discount`, `created_at`, `updated_at`, `status`) VALUES
(20, 'Brand New Vision Mobile', '8999', 'Laptop', 'Brand New mobile of itel company, Very low cost but premium featured mobile phoneBrand New mobile of itel company, Very low cost but premium featured mobile phone', 'ddckdcmd', 'Perpule', '6.1 Inch', '11Pc', 99, NULL, NULL, 'Top'),
(21, 'Television samsang New Brand', '200', 'Television', 'Brand New mobile of itel company, Very low cost but premium featured mobile phone\r\nBrand New mobile of itel company, Very low cost but premium featured mobile phone', 'ddckdcmd', 'Red', NULL, '22Pc', 20, NULL, NULL, 'Top'),
(22, 'Master Watch Brand New', '345', 'Mobile', 'Brand New mobile of itel company, Very low cost but premium featured mobile phone\r\nBrand New mobile of itel company, Very low cost but premium featured mobile phone\r\nBrand New mobile of itel company, Very low cost but premium featured mobile phone', 'ddckdcmd', 'Red', '2.2 Inch', '43', 22, NULL, NULL, 'Top'),
(23, 'New Shows For men 2021', '2000', 'Shoes', 'New Shows For men 2021New Shows For men 2021New Shows For men 2021New Shows For men 2021New Shows For men 2021New Shows For men 2021New Shows For men 2021New Shows For men 2021New Shows For men 2021New Shows For men 2021New Shows For men 2021New Shows For men 2021', 'ddckdcmd', 'White, Red, Bue', '32,33,34,54', '10 PC', 100, NULL, NULL, 'Top'),
(24, 'Master Watch2 Brand New', '8200', 'Mobile', 'Master Watch2 Brand NewMaster Watch2 Brand NewMaster Watch2 Brand NewMaster Watch2 Brand NewMaster Watch2 Brand NewMaster Watch2 Brand NewMaster Watch2 Brand NewMaster Watch2 Brand NewMaster Watch2 Brand NewMaster Watch2 Brand NewMaster Watch2 Brand NewMaster Watch2 Brand NewMaster Watch2 Brand NewMaster Watch2 Brand New', 'ddckdcmd', 'red', '12in', '11pc', 211, NULL, NULL, 'Top');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slide` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `slide`, `created_at`, `updated_at`) VALUES
(2, 'slider/xdx4zIQflot9zDtRCZt048b5fZVmKfKX9uW1Y6BH.png', NULL, NULL),
(3, 'slider/tOPGWZmA610wS6EEKR7HuPIjOIVBU9rPxuRSEvnu.jpg', NULL, NULL),
(4, 'slider/S4CxvxBpzn0pccK15jLsDtA9vHSAvCbyv932bpFV.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(2, 'Shakib', 'hussain@gmail.com', '$2y$10$1HammDdqY5jDii53Y5F8JeK2lmRbFgG4UtzZ5/Ix4USxbBCiwvptS', '', '', NULL, NULL),
(5, 'shahariar', 'shakisk23@gmail.com', '$2y$10$EXS7kURLe.dW36F3CGufPeFNaxMDd1.OrcnlmQn89C0.wSSaCjoRK', '01771893984', 'shakisk23@gmail.com', '2021-03-25 05:13:24', '2021-03-25 05:13:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`),
  ADD UNIQUE KEY `admin_mobile_unique` (`mobile`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
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
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
