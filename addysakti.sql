-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 01:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addysakti`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_carts`
--

CREATE TABLE `add_to_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_to_carts`
--

INSERT INTO `add_to_carts` (`id`, `user_id`, `qty`, `coupon_id`, `created_at`, `updated_at`) VALUES
(8, 10, 1, 5, '2023-06-23 09:50:28', '2023-06-23 09:50:28'),
(12, 8, 1, 4, '2023-06-27 05:06:30', '2023-06-27 05:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `position`, `title`, `type`, `created_at`, `updated_at`) VALUES
(1, '2023-06-30-649ec594be4ad.png', '0', 'Hkk', NULL, '2023-06-26 14:16:13', '2023-06-30 06:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `basic_info`
--

CREATE TABLE `basic_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `info` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `basic_info`
--

INSERT INTO `basic_info` (`id`, `user_id`, `info`, `created_at`, `updated_at`) VALUES
(1, 2, '{\"_token\":\"w091ixWM3lyqEn0W7jkmYPR70r3U6TjGxaFsFpkS\",\"name\":\"Ajit\",\"contact\":\"6203291211\",\"email\":\"azeetkr549@gmail.com\",\"vehicle_no\":\"12345\",\"make_model\":\"Model\",\"IRD\":\"2023-07-07\",\"date_of_issue\":\"2023-06-30\"}', NULL, NULL),
(2, 2, '{\"_token\":\"w091ixWM3lyqEn0W7jkmYPR70r3U6TjGxaFsFpkS\",\"name\":\"Ajit\",\"contact\":\"6203291211\",\"email\":\"azeetkr549@gmail.com\",\"vehicle_no\":\"12345\",\"make_model\":\"Model\",\"IRD\":\"2023-07-07\",\"date_of_issue\":\"2023-06-30\"}', '2023-07-01 21:19:03', NULL),
(3, 2, '{\"_token\":\"w091ixWM3lyqEn0W7jkmYPR70r3U6TjGxaFsFpkS\",\"name\":\"Ajit\",\"contact\":\"6203291211\",\"email\":\"azeetkr549@gmail.com\",\"vehicle_no\":\"12345\",\"make_model\":\"Model\",\"IRD\":\"2023-07-19\",\"date_of_issue\":null}', '2023-07-01 21:29:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `position`, `image`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(19, 'Automobile', '0', NULL, '1', NULL, '2023-06-15 15:53:45', '2023-06-15 15:53:45'),
(20, 'Periodic Service Free ( Spare charge Will be extra)', '0', NULL, '1', 19, '2023-06-15 16:05:16', '2023-06-15 16:05:16'),
(21, 'Get 2 Second Periodic Service Free', '0', NULL, '1', 19, '2023-06-15 16:08:44', '2023-06-15 16:08:44'),
(22, 'Car Washing Free', '0', NULL, '1', 19, '2023-06-15 16:10:05', '2023-06-15 16:10:05'),
(23, 'Wheel alignment Free', '0', NULL, '1', 19, '2023-06-15 16:10:20', '2023-06-15 16:10:20'),
(24, 'Wheel balancing Free', '0', NULL, '1', 19, '2023-06-15 16:10:50', '2023-06-15 16:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_bundle_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext DEFAULT NULL,
  `term_conditions` varchar(255) DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `no_of_coupons` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `position`, `image`, `status`, `category_id`, `sub_category_id`, `coupon_bundle_id`, `description`, `term_conditions`, `price`, `no_of_coupons`, `code`, `discount`, `slug`, `created_by`, `created_at`, `updated_at`) VALUES
(6, 'D G Automobiles', 'Welcome offer', '2023-06-15-648b37173a1cf.png', '1', 19, 20, 4, 'line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards', NULL, 80.00, '0', '9837135637', NULL, 'd-g-automobiles-welcome-offer', 6, '2023-06-15 16:06:47', '2023-06-15 16:12:22'),
(7, 'D G Automobiles', 'Loyalty program offer', '2023-06-15-648b37bb5a30b.png', '1', 19, 21, 4, 'line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards', NULL, 80.00, '0', '8049692806', NULL, 'd-g-automobiles-loyalty-program-offer', 6, '2023-06-15 16:09:31', '2023-06-15 16:12:25'),
(8, 'D G Automobiles', 'Bonus Offer', '2023-06-15-648b3842aa811.png', '1', 19, 22, 4, 'line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards', NULL, 200.00, '0', '9099933335', NULL, 'd-g-automobiles-bonus-offer', 6, '2023-06-15 16:11:46', '2023-06-15 16:12:29'),
(9, 'null', 'Dhamaka offer', '2023-06-22-64943ed31e5ff.png', '1', 19, 20, 5, 'xsadcs', NULL, 500.00, 'admin', '60645', '0', '-4130124282', 6, '2023-06-22 12:30:11', '2023-06-22 12:30:11'),
(10, 'null', '5', '2023-06-24-6496853219b57.png', '1', 19, 22, 5, 'hja', NULL, 500.00, 'admin', '78989', '0', '-6967732932', 6, '2023-06-24 05:54:58', '2023-06-24 05:54:58'),
(11, 'null', '6', '2023-06-24-64970fdfc2fd2.png', '1', 19, 20, 5, 'Xdd', NULL, 500.00, 'admin', '55227', '0', '-8270844232', 6, '2023-06-24 15:46:39', '2023-06-24 15:46:39'),
(12, 'null', 'Dhamaka offer', '2023-07-01-649fd2c94ba55.png', '1', 19, 20, 5, '<p>Hello bro <strong>kaise ho tum </strong><i>mai theek hai tu bata&nbsp;</i></p><p>hb yu</p><p>jknk</p><p>jhbjbub</p><p>&nbsp;</p>', '<p>Hello bro <strong>kaise ho tum </strong><i>mai theek hai tu bata&nbsp;</i></p><p>hb yu</p><p>jknk</p><p>jhbjbub</p><p>&nbsp;</p>', 999.00, '3', '43655', '0', '-1768766528', 6, '2023-07-01 01:46:25', '2023-07-01 01:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_bundles`
--

CREATE TABLE `coupon_bundles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `no_of_coupons` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` int(11) DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_bundles`
--

INSERT INTO `coupon_bundles` (`id`, `title`, `position`, `image`, `status`, `category_id`, `description`, `price`, `no_of_coupons`, `code`, `discount`, `slug`, `created_by`, `created_at`, `updated_at`, `expiry_date`, `sub_category_id`, `video_link`) VALUES
(4, 'D G Automobiles', NULL, '2023-06-23-649560554338f.png', '1', 19, 'line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against saccount or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards', 999.00, 'admin', '61594', '6999', 'd-g-automobiles-arJVh', 6, '2023-06-15 16:00:52', '2023-06-26 14:15:45', 18, 20, 'https://www.youtube.com/embed/thBuZNmFrzs'),
(5, 'Gas company', NULL, '2023-06-22-64943c5a875b3.png', '1', 19, 'bn nb', 999.00, 'admin', '65700', '5999', 'gas-company-jw074', 6, '2023-06-22 12:19:38', '2023-06-26 14:14:49', 12, 20, 'https://www.youtube.com/embed/xSRMwwm9vlQ');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2023_04_29_132016_create_categories_table', 1),
(20, '2023_04_29_142020_create_vendors_table', 1),
(21, '2023_04_29_150121_create_coupon_bundles_table', 1),
(22, '2023_04_29_150122_create_coupons_table', 1),
(23, '2023_05_13_084539_create_add_to_carts_table', 1),
(24, '2023_05_16_114848_create_orders_table', 1),
(25, '2023_05_16_115008_create_order_details_table', 1),
(26, '2023_05_16_115018_create_transactions_table', 1),
(27, '2023_05_19_053226_create_redeem_coupons_table', 1),
(28, '2023_06_13_112338_create_subscribes_table', 1),
(30, '2023_06_15_075133_add_col_to_coupon_bundles_table', 2),
(31, '2023_06_16_015736_create_banners_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_bundle_id` bigint(20) UNSIGNED NOT NULL,
  `customer_type` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'unpaid',
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) DEFAULT NULL,
  `information` longtext DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `order_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `coupon_bundle_id`, `customer_type`, `payment_status`, `order_status`, `payment_method`, `information`, `expiry_date`, `order_amount`, `created_at`, `updated_at`) VALUES
(1, 8, 4, 'customer', 'paid', 'confirm', 'COD', '{\"_token\":\"XK3afShupOocMEpoYvUsGDF1PFw5pMgvSo00d5pC\",\"name\":\"Sunil Parmar\",\"contact\":\"7043012892\",\"email\":\"skparmar357@gmail.com\",\"vehicle_no\":\"Hajiwk\",\"make_model\":\"Nsk3k\",\"IRD\":\"2023-06-12\",\"date_of_issue\":\"2023-06-18\",\"payment_method\":\"COD\"}', '2024-05-22', 360.00, '2023-06-18 11:10:22', '2023-06-19 09:04:33'),
(2, 8, 4, 'customer', 'paid', 'confirm', 'COD', '{\"_token\":\"R9pOcHATEHRTWL6GfMXfjZ5WFge95CBuoulEsjye\",\"name\":\"Sunil\",\"contact\":\"7802930568\",\"email\":\"jiger123@gmail.com\",\"vehicle_no\":\"Fjjiguii\",\"make_model\":\"\\u0a9c\\u0ac1\\u0ab9\\u0ac0\",\"IRD\":\"2023-06-19\",\"date_of_issue\":\"2023-06-19\",\"payment_method\":\"COD\"}', '2023-06-30', 360.00, '2023-06-19 09:03:05', '2023-06-26 12:46:41'),
(3, 6, 4, 'customer', 'unpaid', 'confirm', 'COD', '{\"_token\":\"kd7yTvlkz7k5rrTXG8xTrxbKiGuCssLJMlOwX7nY\",\"name\":\"6203291214\",\"contact\":\"6200291214\",\"email\":\"6203291214@gmail.cim\",\"vehicle_no\":\"Uij\",\"make_model\":\"Hhjj\",\"IRD\":\"2023-06-24\",\"date_of_issue\":\"2023-06-30\",\"payment_method\":\"COD\"}', '2024-12-19', 999.00, '2023-06-19 10:44:39', '2023-06-19 10:45:52'),
(4, 9, 4, 'customer', 'paid', 'confirm', 'COD', '{\"_token\":\"JEx6whr1yj8ktbGSjwfdsbvQTp12XGDbY8r00q2n\",\"name\":\"Bhupendra\",\"contact\":\"8128422440\",\"email\":\"bhupenparethabhupen@gmail.com\",\"vehicle_no\":\"Bjkkk\",\"make_model\":\"Hjk\",\"IRD\":\"2023-06-21\",\"date_of_issue\":\"2023-06-21\",\"payment_method\":\"COD\"}', '2024-12-21', 999.00, '2023-06-21 09:12:20', '2023-06-21 09:13:10'),
(5, 10, 4, 'customer', 'paid', 'confirm', 'COD', '{\"_token\":\"AMuIMDjAUnRXXfBjPV2LuHMlAzAiHFtdaxmMjrnb\",\"name\":\"Ajit\",\"contact\":\"6203291215\",\"email\":\"kumar@gmail.com\",\"vehicle_no\":\"12345\",\"make_model\":\"Model\",\"IRD\":\"2023-06-24\",\"date_of_issue\":\"2023-06-24\",\"payment_method\":\"COD\"}', '2024-12-23', 999.00, '2023-06-23 09:39:24', '2023-06-23 14:25:08'),
(6, 11, 4, 'customer', 'paid', 'confirm', 'COD', '{\"_token\":\"74NuGLao5KdD6r2waPHZwMt6kmjwwaGDBmrjFjM9\",\"name\":\"Kiran\",\"contact\":\"6354104764\",\"email\":\"kdodiya767@gmail.com\",\"vehicle_no\":\"Gujjuy\",\"make_model\":\"Tuui\",\"IRD\":\"2023-06-24\",\"date_of_issue\":\"2023-06-24\",\"payment_method\":\"COD\"}', '2024-12-24', 999.00, '2023-06-24 15:42:55', '2023-06-24 15:43:59'),
(7, 8, 4, 'customer', 'paid', 'confirm', 'COD', '{\"_token\":\"5SuK611PXAnf02cAVLEqVAkXhVobBEaU1SM7GqRY\",\"name\":\"Sunil\",\"contact\":\"7802930568\",\"email\":\"jiger123@gmail.com\",\"vehicle_no\":\"Namqk\",\"make_model\":\"Nwnkqk\",\"IRD\":\"2023-06-26\",\"date_of_issue\":\"2023-06-26\",\"payment_method\":\"COD\"}', '2024-12-26', 999.00, '2023-06-26 12:48:34', '2023-06-26 12:51:12'),
(8, 8, 5, 'customer', 'paid', 'confirm', 'COD', '{\"_token\":\"5SuK611PXAnf02cAVLEqVAkXhVobBEaU1SM7GqRY\",\"name\":\"Sunil\",\"contact\":\"7802930568\",\"email\":\"jiger123@gmail.com\",\"vehicle_no\":\"Namqk\",\"make_model\":\"Nwnkqk\",\"IRD\":\"2023-06-26\",\"date_of_issue\":\"2023-06-26\",\"payment_method\":\"COD\"}', '2452-09-26', 500.00, '2023-06-26 12:48:34', '2023-06-26 12:49:58'),
(9, 8, 4, 'customer', 'paid', 'confirm', 'COD', '{\"_token\":\"5SuK611PXAnf02cAVLEqVAkXhVobBEaU1SM7GqRY\",\"name\":\"Sunil\",\"contact\":\"7802930568\",\"email\":\"jiger123@gmail.com\",\"vehicle_no\":\"Nsmskk\",\"make_model\":\"Hsjsj\",\"IRD\":\"2023-06-26\",\"date_of_issue\":\"2023-06-26\",\"payment_method\":\"COD\"}', '2024-12-26', 999.00, '2023-06-26 12:53:47', '2023-06-26 12:54:07'),
(10, 2, 4, 'customer', 'unpaid', 'confirm', 'COD', '{\"_token\":\"cunJx6l3aXBwS8ORV9JD4ow9tvtQEW5SCRiGLEap\",\"name\":\"Ajit\",\"contact\":\"6203291211\",\"email\":\"azeetkr549@gmail.com\",\"vehicle_no\":\"12345\",\"make_model\":\"Model\",\"IRD\":\"2023-07-01\",\"date_of_issue\":\"2023-07-08\",\"payment_method\":\"COD\"}', '2025-01-01', 999.00, '2023-07-01 03:31:52', '2023-07-01 03:31:52'),
(11, 2, 4, 'customer', 'unpaid', 'pending', 'COD', '{\"id\":1,\"user_id\":2,\"info\":\"{\\\"_token\\\":\\\"w091ixWM3lyqEn0W7jkmYPR70r3U6TjGxaFsFpkS\\\",\\\"name\\\":\\\"Ajit\\\",\\\"contact\\\":\\\"6203291211\\\",\\\"email\\\":\\\"azeetkr549@gmail.com\\\",\\\"vehicle_no\\\":\\\"12345\\\",\\\"make_model\\\":\\\"Model\\\",\\\"IRD\\\":\\\"2023-07-07\\\",\\\"date_of_issue\\\":\\\"2023-06-30\\\"}\",\"created_at\":null,\"updated_at\":null}', '2025-01-02', 999.00, '2023-07-02 01:41:15', '2023-07-02 01:41:15'),
(12, 2, 4, 'customer', 'unpaid', 'pending', 'COD', '{\"_token\":\"w091ixWM3lyqEn0W7jkmYPR70r3U6TjGxaFsFpkS\",\"name\":\"Ajit\",\"contact\":\"6203291211\",\"email\":\"azeetkr549@gmail.com\",\"vehicle_no\":\"12345\",\"make_model\":\"Model\",\"IRD\":\"2023-07-19\",\"date_of_issue\":null}', '2025-01-02', 999.00, '2023-07-02 01:42:54', '2023-07-02 01:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_details` longtext DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `use_coupon` int(11) NOT NULL DEFAULT 0,
  `price` double(8,2) NOT NULL,
  `tax` double(8,2) NOT NULL,
  `delivery_status` varchar(255) NOT NULL DEFAULT 'pending',
  `key_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `coupon_id`, `vendor_id`, `coupon_details`, `qty`, `use_coupon`, `price`, `tax`, `delivery_status`, `key_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 6, '{\"id\":6,\"title\":\"D G Automobiles\",\"position\":\"Welcome offer\",\"image\":\"2023-06-15-648b37173a1cf.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":20,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"9837135637\",\"discount\":null,\"slug\":\"d-g-automobiles-welcome-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:06:47.000000Z\",\"updated_at\":\"2023-06-15T16:12:22.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '1194528099', '2023-06-18 11:10:22', '2023-06-18 11:10:22'),
(2, 1, 7, 6, '{\"id\":7,\"title\":\"D G Automobiles\",\"position\":\"Loyalty program offer\",\"image\":\"2023-06-15-648b37bb5a30b.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":21,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"8049692806\",\"discount\":null,\"slug\":\"d-g-automobiles-loyalty-program-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:09:31.000000Z\",\"updated_at\":\"2023-06-15T16:12:25.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '6260874319', '2023-06-18 11:10:22', '2023-06-18 11:10:22'),
(3, 1, 8, 6, '{\"id\":8,\"title\":\"D G Automobiles\",\"position\":\"Bonus Offer\",\"image\":\"2023-06-15-648b3842aa811.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":22,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":200,\"no_of_coupons\":\"0\",\"code\":\"9099933335\",\"discount\":null,\"slug\":\"d-g-automobiles-bonus-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:11:46.000000Z\",\"updated_at\":\"2023-06-15T16:12:29.000000Z\"}', 1, 0, 200.00, 0.00, 'pending', '7404595669', '2023-06-18 11:10:22', '2023-06-18 11:10:22'),
(4, 2, 6, 6, '{\"id\":6,\"title\":\"D G Automobiles\",\"position\":\"Welcome offer\",\"image\":\"2023-06-15-648b37173a1cf.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":20,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"9837135637\",\"discount\":null,\"slug\":\"d-g-automobiles-welcome-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:06:47.000000Z\",\"updated_at\":\"2023-06-15T16:12:22.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '7516888061', '2023-06-19 09:03:05', '2023-06-19 09:03:05'),
(5, 2, 7, 6, '{\"id\":7,\"title\":\"D G Automobiles\",\"position\":\"Loyalty program offer\",\"image\":\"2023-06-15-648b37bb5a30b.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":21,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"8049692806\",\"discount\":null,\"slug\":\"d-g-automobiles-loyalty-program-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:09:31.000000Z\",\"updated_at\":\"2023-06-15T16:12:25.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '2019381800', '2023-06-19 09:03:05', '2023-06-19 09:03:05'),
(6, 2, 8, 6, '{\"id\":8,\"title\":\"D G Automobiles\",\"position\":\"Bonus Offer\",\"image\":\"2023-06-15-648b3842aa811.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":22,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":200,\"no_of_coupons\":\"0\",\"code\":\"9099933335\",\"discount\":null,\"slug\":\"d-g-automobiles-bonus-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:11:46.000000Z\",\"updated_at\":\"2023-06-15T16:12:29.000000Z\"}', 1, 0, 200.00, 0.00, 'pending', '7787445665', '2023-06-19 09:03:05', '2023-06-19 09:03:05'),
(7, 3, 6, 6, '{\"id\":6,\"title\":\"D G Automobiles\",\"position\":\"Welcome offer\",\"image\":\"2023-06-15-648b37173a1cf.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":20,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"9837135637\",\"discount\":null,\"slug\":\"d-g-automobiles-welcome-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:06:47.000000Z\",\"updated_at\":\"2023-06-15T16:12:22.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '68402', '2023-06-19 10:44:39', '2023-06-19 10:44:39'),
(8, 3, 7, 6, '{\"id\":7,\"title\":\"D G Automobiles\",\"position\":\"Loyalty program offer\",\"image\":\"2023-06-15-648b37bb5a30b.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":21,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"8049692806\",\"discount\":null,\"slug\":\"d-g-automobiles-loyalty-program-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:09:31.000000Z\",\"updated_at\":\"2023-06-15T16:12:25.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '68851', '2023-06-19 10:44:39', '2023-06-19 10:44:39'),
(9, 3, 8, 6, '{\"id\":8,\"title\":\"D G Automobiles\",\"position\":\"Bonus Offer\",\"image\":\"2023-06-15-648b3842aa811.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":22,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":200,\"no_of_coupons\":\"0\",\"code\":\"9099933335\",\"discount\":null,\"slug\":\"d-g-automobiles-bonus-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:11:46.000000Z\",\"updated_at\":\"2023-06-15T16:12:29.000000Z\"}', 1, 0, 200.00, 0.00, 'pending', '12095', '2023-06-19 10:44:39', '2023-06-19 10:44:39'),
(10, 4, 6, 6, '{\"id\":6,\"title\":\"D G Automobiles\",\"position\":\"Welcome offer\",\"image\":\"2023-06-15-648b37173a1cf.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":20,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"9837135637\",\"discount\":null,\"slug\":\"d-g-automobiles-welcome-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:06:47.000000Z\",\"updated_at\":\"2023-06-15T16:12:22.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '66091', '2023-06-21 09:12:20', '2023-06-21 09:12:20'),
(11, 4, 7, 6, '{\"id\":7,\"title\":\"D G Automobiles\",\"position\":\"Loyalty program offer\",\"image\":\"2023-06-15-648b37bb5a30b.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":21,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"8049692806\",\"discount\":null,\"slug\":\"d-g-automobiles-loyalty-program-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:09:31.000000Z\",\"updated_at\":\"2023-06-15T16:12:25.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '95497', '2023-06-21 09:12:20', '2023-06-21 09:12:20'),
(12, 4, 8, 6, '{\"id\":8,\"title\":\"D G Automobiles\",\"position\":\"Bonus Offer\",\"image\":\"2023-06-15-648b3842aa811.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":22,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":200,\"no_of_coupons\":\"0\",\"code\":\"9099933335\",\"discount\":null,\"slug\":\"d-g-automobiles-bonus-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:11:46.000000Z\",\"updated_at\":\"2023-06-15T16:12:29.000000Z\"}', 1, 0, 200.00, 0.00, 'pending', '29659', '2023-06-21 09:12:20', '2023-06-21 09:12:20'),
(13, 5, 6, 6, '{\"id\":6,\"title\":\"D G Automobiles\",\"position\":\"Welcome offer\",\"image\":\"2023-06-15-648b37173a1cf.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":20,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"9837135637\",\"discount\":null,\"slug\":\"d-g-automobiles-welcome-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:06:47.000000Z\",\"updated_at\":\"2023-06-15T16:12:22.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '59438', '2023-06-23 09:39:24', '2023-06-23 09:39:24'),
(14, 5, 7, 6, '{\"id\":7,\"title\":\"D G Automobiles\",\"position\":\"Loyalty program offer\",\"image\":\"2023-06-15-648b37bb5a30b.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":21,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"8049692806\",\"discount\":null,\"slug\":\"d-g-automobiles-loyalty-program-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:09:31.000000Z\",\"updated_at\":\"2023-06-15T16:12:25.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '23137', '2023-06-23 09:39:24', '2023-06-23 09:39:24'),
(15, 5, 8, 6, '{\"id\":8,\"title\":\"D G Automobiles\",\"position\":\"Bonus Offer\",\"image\":\"2023-06-15-648b3842aa811.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":22,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":200,\"no_of_coupons\":\"0\",\"code\":\"9099933335\",\"discount\":null,\"slug\":\"d-g-automobiles-bonus-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:11:46.000000Z\",\"updated_at\":\"2023-06-15T16:12:29.000000Z\"}', 1, 0, 200.00, 0.00, 'pending', '52371', '2023-06-23 09:39:24', '2023-06-23 09:39:24'),
(16, 6, 6, 6, '{\"id\":6,\"title\":\"D G Automobiles\",\"position\":\"Welcome offer\",\"image\":\"2023-06-15-648b37173a1cf.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":20,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"9837135637\",\"discount\":null,\"slug\":\"d-g-automobiles-welcome-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:06:47.000000Z\",\"updated_at\":\"2023-06-15T16:12:22.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '31772', '2023-06-24 15:42:55', '2023-06-24 15:42:55'),
(17, 6, 7, 6, '{\"id\":7,\"title\":\"D G Automobiles\",\"position\":\"Loyalty program offer\",\"image\":\"2023-06-15-648b37bb5a30b.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":21,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"8049692806\",\"discount\":null,\"slug\":\"d-g-automobiles-loyalty-program-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:09:31.000000Z\",\"updated_at\":\"2023-06-15T16:12:25.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '84523', '2023-06-24 15:42:55', '2023-06-24 15:42:55'),
(18, 6, 8, 6, '{\"id\":8,\"title\":\"D G Automobiles\",\"position\":\"Bonus Offer\",\"image\":\"2023-06-15-648b3842aa811.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":22,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":200,\"no_of_coupons\":\"0\",\"code\":\"9099933335\",\"discount\":null,\"slug\":\"d-g-automobiles-bonus-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:11:46.000000Z\",\"updated_at\":\"2023-06-15T16:12:29.000000Z\"}', 1, 0, 200.00, 0.00, 'pending', '83642', '2023-06-24 15:42:55', '2023-06-24 15:42:55'),
(19, 7, 6, 6, '{\"id\":6,\"title\":\"D G Automobiles\",\"position\":\"Welcome offer\",\"image\":\"2023-06-15-648b37173a1cf.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":20,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"9837135637\",\"discount\":null,\"slug\":\"d-g-automobiles-welcome-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:06:47.000000Z\",\"updated_at\":\"2023-06-15T16:12:22.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '81632', '2023-06-26 12:48:34', '2023-06-26 12:48:34'),
(20, 7, 7, 6, '{\"id\":7,\"title\":\"D G Automobiles\",\"position\":\"Loyalty program offer\",\"image\":\"2023-06-15-648b37bb5a30b.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":21,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"8049692806\",\"discount\":null,\"slug\":\"d-g-automobiles-loyalty-program-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:09:31.000000Z\",\"updated_at\":\"2023-06-15T16:12:25.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '32674', '2023-06-26 12:48:34', '2023-06-26 12:48:34'),
(21, 7, 8, 6, '{\"id\":8,\"title\":\"D G Automobiles\",\"position\":\"Bonus Offer\",\"image\":\"2023-06-15-648b3842aa811.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":22,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":200,\"no_of_coupons\":\"0\",\"code\":\"9099933335\",\"discount\":null,\"slug\":\"d-g-automobiles-bonus-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:11:46.000000Z\",\"updated_at\":\"2023-06-15T16:12:29.000000Z\"}', 1, 0, 200.00, 0.00, 'pending', '61224', '2023-06-26 12:48:34', '2023-06-26 12:48:34'),
(22, 8, 9, 6, '{\"id\":9,\"title\":\"null\",\"position\":\"Dhamaka offer\",\"image\":\"2023-06-22-64943ed31e5ff.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":20,\"coupon_bundle_id\":5,\"description\":\"xsadcs\",\"price\":500,\"no_of_coupons\":\"admin\",\"code\":\"60645\",\"discount\":\"0\",\"slug\":\"-4130124282\",\"created_by\":6,\"created_at\":\"2023-06-22T12:30:11.000000Z\",\"updated_at\":\"2023-06-22T12:30:11.000000Z\"}', 1, 0, 500.00, 0.00, 'pending', '37969', '2023-06-26 12:48:34', '2023-06-26 12:48:34'),
(23, 8, 10, 6, '{\"id\":10,\"title\":\"null\",\"position\":\"5\",\"image\":\"2023-06-24-6496853219b57.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":22,\"coupon_bundle_id\":5,\"description\":\"hja\",\"price\":500,\"no_of_coupons\":\"admin\",\"code\":\"78989\",\"discount\":\"0\",\"slug\":\"-6967732932\",\"created_by\":6,\"created_at\":\"2023-06-24T05:54:58.000000Z\",\"updated_at\":\"2023-06-24T05:54:58.000000Z\"}', 1, 0, 500.00, 0.00, 'pending', '93468', '2023-06-26 12:48:34', '2023-06-26 12:48:34'),
(24, 8, 11, 6, '{\"id\":11,\"title\":\"null\",\"position\":\"6\",\"image\":\"2023-06-24-64970fdfc2fd2.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":20,\"coupon_bundle_id\":5,\"description\":\"Xdd\",\"price\":500,\"no_of_coupons\":\"admin\",\"code\":\"55227\",\"discount\":\"0\",\"slug\":\"-8270844232\",\"created_by\":6,\"created_at\":\"2023-06-24T15:46:39.000000Z\",\"updated_at\":\"2023-06-24T15:46:39.000000Z\"}', 1, 0, 500.00, 0.00, 'pending', '28153', '2023-06-26 12:48:34', '2023-06-26 12:48:34'),
(25, 9, 6, 6, '{\"id\":6,\"title\":\"D G Automobiles\",\"position\":\"Welcome offer\",\"image\":\"2023-06-15-648b37173a1cf.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":20,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"9837135637\",\"discount\":null,\"slug\":\"d-g-automobiles-welcome-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:06:47.000000Z\",\"updated_at\":\"2023-06-15T16:12:22.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '36744', '2023-06-26 12:53:47', '2023-06-26 12:53:47'),
(26, 9, 7, 6, '{\"id\":7,\"title\":\"D G Automobiles\",\"position\":\"Loyalty program offer\",\"image\":\"2023-06-15-648b37bb5a30b.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":21,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"8049692806\",\"discount\":null,\"slug\":\"d-g-automobiles-loyalty-program-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:09:31.000000Z\",\"updated_at\":\"2023-06-15T16:12:25.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '93186', '2023-06-26 12:53:47', '2023-06-26 12:53:47'),
(27, 9, 8, 6, '{\"id\":8,\"title\":\"D G Automobiles\",\"position\":\"Bonus Offer\",\"image\":\"2023-06-15-648b3842aa811.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":22,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"price\":200,\"no_of_coupons\":\"0\",\"code\":\"9099933335\",\"discount\":null,\"slug\":\"d-g-automobiles-bonus-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T16:11:46.000000Z\",\"updated_at\":\"2023-06-15T16:12:29.000000Z\"}', 1, 0, 200.00, 0.00, 'pending', '50436', '2023-06-26 12:53:47', '2023-06-26 12:53:47'),
(28, 10, 6, 6, '{\"id\":6,\"title\":\"D G Automobiles\",\"position\":\"Welcome offer\",\"image\":\"2023-06-15-648b37173a1cf.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":20,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"term_conditions\":null,\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"9837135637\",\"discount\":null,\"slug\":\"d-g-automobiles-welcome-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T21:36:47.000000Z\",\"updated_at\":\"2023-06-15T21:42:22.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '92714', '2023-07-01 03:31:52', '2023-07-01 03:31:52'),
(29, 10, 7, 6, '{\"id\":7,\"title\":\"D G Automobiles\",\"position\":\"Loyalty program offer\",\"image\":\"2023-06-15-648b37bb5a30b.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":21,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"term_conditions\":null,\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"8049692806\",\"discount\":null,\"slug\":\"d-g-automobiles-loyalty-program-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T21:39:31.000000Z\",\"updated_at\":\"2023-06-15T21:42:25.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '82853', '2023-07-01 03:31:52', '2023-07-01 03:31:52'),
(30, 10, 8, 6, '{\"id\":8,\"title\":\"D G Automobiles\",\"position\":\"Bonus Offer\",\"image\":\"2023-06-15-648b3842aa811.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":22,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"term_conditions\":null,\"price\":200,\"no_of_coupons\":\"0\",\"code\":\"9099933335\",\"discount\":null,\"slug\":\"d-g-automobiles-bonus-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T21:41:46.000000Z\",\"updated_at\":\"2023-06-15T21:42:29.000000Z\"}', 1, 0, 200.00, 0.00, 'pending', '48878', '2023-07-01 03:31:52', '2023-07-01 03:31:52'),
(31, 11, 6, 6, '{\"id\":6,\"title\":\"D G Automobiles\",\"position\":\"Welcome offer\",\"image\":\"2023-06-15-648b37173a1cf.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":20,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"term_conditions\":null,\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"9837135637\",\"discount\":null,\"slug\":\"d-g-automobiles-welcome-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T21:36:47.000000Z\",\"updated_at\":\"2023-06-15T21:42:22.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '40780', '2023-07-02 01:41:15', '2023-07-02 01:41:15'),
(32, 11, 7, 6, '{\"id\":7,\"title\":\"D G Automobiles\",\"position\":\"Loyalty program offer\",\"image\":\"2023-06-15-648b37bb5a30b.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":21,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"term_conditions\":null,\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"8049692806\",\"discount\":null,\"slug\":\"d-g-automobiles-loyalty-program-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T21:39:31.000000Z\",\"updated_at\":\"2023-06-15T21:42:25.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '47716', '2023-07-02 01:41:15', '2023-07-02 01:41:15'),
(33, 11, 8, 6, '{\"id\":8,\"title\":\"D G Automobiles\",\"position\":\"Bonus Offer\",\"image\":\"2023-06-15-648b3842aa811.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":22,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"term_conditions\":null,\"price\":200,\"no_of_coupons\":\"0\",\"code\":\"9099933335\",\"discount\":null,\"slug\":\"d-g-automobiles-bonus-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T21:41:46.000000Z\",\"updated_at\":\"2023-06-15T21:42:29.000000Z\"}', 1, 0, 200.00, 0.00, 'pending', '37847', '2023-07-02 01:41:15', '2023-07-02 01:41:15'),
(34, 12, 6, 6, '{\"id\":6,\"title\":\"D G Automobiles\",\"position\":\"Welcome offer\",\"image\":\"2023-06-15-648b37173a1cf.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":20,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"term_conditions\":null,\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"9837135637\",\"discount\":null,\"slug\":\"d-g-automobiles-welcome-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T21:36:47.000000Z\",\"updated_at\":\"2023-06-15T21:42:22.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '33844', '2023-07-02 01:42:54', '2023-07-02 01:42:54'),
(35, 12, 7, 6, '{\"id\":7,\"title\":\"D G Automobiles\",\"position\":\"Loyalty program offer\",\"image\":\"2023-06-15-648b37bb5a30b.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":21,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"term_conditions\":null,\"price\":80,\"no_of_coupons\":\"0\",\"code\":\"8049692806\",\"discount\":null,\"slug\":\"d-g-automobiles-loyalty-program-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T21:39:31.000000Z\",\"updated_at\":\"2023-06-15T21:42:25.000000Z\"}', 1, 0, 80.00, 0.00, 'pending', '70464', '2023-07-02 01:42:54', '2023-07-02 01:42:54'),
(36, 12, 8, 6, '{\"id\":8,\"title\":\"D G Automobiles\",\"position\":\"Bonus Offer\",\"image\":\"2023-06-15-648b3842aa811.png\",\"status\":\"1\",\"category_id\":19,\"sub_category_id\":22,\"coupon_bundle_id\":4,\"description\":\"line with the new Regulatory guidelines, starting June 19, 2023, we can no longer provide immediate limit against shares sold from your demat account or from your unpaid share account. Stock sale proceeds will be available for trading from the next trading day onwards\",\"term_conditions\":null,\"price\":200,\"no_of_coupons\":\"0\",\"code\":\"9099933335\",\"discount\":null,\"slug\":\"d-g-automobiles-bonus-offer\",\"created_by\":6,\"created_at\":\"2023-06-15T21:41:46.000000Z\",\"updated_at\":\"2023-06-15T21:42:29.000000Z\"}', 1, 0, 200.00, 0.00, 'pending', '29926', '2023-07-02 01:42:54', '2023-07-02 01:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'azeetkr549@gmail.com', '73729', NULL),
(2, 'azeetkr549@gmail.com', '57541', NULL),
(3, 'azeetkr549@gmail.com', '77613', NULL),
(4, 'azeetkr549@gmail.com', '80026', NULL),
(5, 'azeetkr549@gmail.com', '87554', NULL),
(6, 'azeetkr549@gmail.com', '12003', NULL),
(7, 'azeetkr549@gmail.com', '44039', NULL),
(8, 'azeetkr549@gmail.com', '95846', NULL),
(9, 'azeetkr549@gmail.com', '13605', NULL),
(10, 'azeetkr549@gmail.com', '51278', NULL),
(11, 'azeetkr549@gmail.com', '70425', NULL),
(12, 'azeetkr549@gmail.com', '94240', NULL),
(13, 'azeetkr549@gmail.com', '39558', NULL),
(14, 'azeetkr549@gmail.com', '53917', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redeem_coupons`
--

CREATE TABLE `redeem_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_details_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_of_use_coupon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'azeetkr549@gmail.com', '2023-06-14 05:58:18', '2023-06-14 05:58:18'),
(2, 'skparmar357@gmail.com', '2023-06-14 06:46:48', '2023-06-14 06:46:48'),
(3, 'admin@gmail.com', '2023-06-14 11:18:03', '2023-06-14 11:18:03'),
(4, 'skparmar357@gmail.com', '2023-06-15 14:43:22', '2023-06-15 14:43:22'),
(5, 'skparmar357@gmail.com', '2023-06-19 09:11:09', '2023-06-19 09:11:09'),
(6, 'skparmar357@gmail.com', '2023-06-19 09:11:17', '2023-06-19 09:11:17'),
(7, 'skparmar357@gmail.com', '2023-06-19 09:11:24', '2023-06-19 09:11:24'),
(8, 'skparmar357@gmail.com', '2023-06-23 10:01:32', '2023-06-23 10:01:32'),
(9, 'skparmar357@gmail.com', '2023-06-23 10:01:37', '2023-06-23 10:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `foruser` enum('0','1') NOT NULL DEFAULT '0',
  `login_activision` enum('inactive','active') NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `roll` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `l_name`, `email`, `phone`, `foruser`, `login_activision`, `email_verified_at`, `password`, `roll`, `profile_photo`, `slug`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', 'admin@gmail.com', '000000000', '1', 'active', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Ajit', 'Kumar', 'azeetkr549@gmail.com', '6203291211', '0', 'active', NULL, '$2y$10$WmKWICYQPHcUJya/Zi5obO4wMEER4uHNsDlJ8/GJEyarDD3FflAJq', NULL, NULL, NULL, NULL, '2023-06-13 18:35:50', '2023-06-27 02:55:18'),
(3, 'Sunil', 'Parmar', 'skparmar357@gmail.com', '7043012892', '0', 'active', NULL, '$2y$10$ab/nIBuLIRN8QiBvexTyBO0PHZ/321sQD0P6lzpo4fxu7Y0h39fpi', NULL, '2023-06-14-64897a362bf8f.png', NULL, NULL, '2023-06-14 06:15:29', '2023-06-15 14:34:50'),
(4, 'Mehul', 'Patel', 'm.vadadoriya@yahoo.com', '9327093070', '0', 'active', NULL, '$2y$10$7T3S91bF0FYpVQAYgJCO8OV1UkDCqpuVCWmRoNh4erN.cnxrhNWJa', NULL, NULL, NULL, NULL, '2023-06-14 11:28:51', '2023-06-15 16:01:44'),
(5, 'Azeet Kumar', 'chaurasia', 'azeetkr49@gmail.com', '6203291214', '0', 'active', NULL, '$2y$10$OdrNlUW9rOdeYSGcli0pK.C0jHFMm0vOUiKS4DYqJ8cqq/fvYKmci', NULL, '2023-06-15-648b0f21c21bb.png', NULL, NULL, '2023-06-15 13:13:52', '2023-06-15 13:16:17'),
(6, '6203291214', '6203291214', '6203291214@gmail.cim', '6200291214', '0', 'active', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, '2023-06-15 16:07:53', '2023-06-16 07:18:20'),
(7, 'company_logo', 'company_logo', 'company_logo@gmail.com', '8520528526', '0', 'active', NULL, '$2y$10$UEStD7vRloGiFd49oqPH1.zFcqrIwz8m2JeHyQRPNWjLIqXjUkLWq', NULL, NULL, NULL, NULL, '2023-06-15 16:29:10', '2023-06-15 16:29:10'),
(8, 'Sunil', 'Parmar', 'jiger123@gmail.com', '7802930568', '0', 'active', NULL, '$2y$10$8x/WecW8.Sfb/dCDnZiSiugj.C.fv4fz/Mdq5zTXYtrIS1WEBqZPm', NULL, NULL, NULL, NULL, '2023-06-16 13:08:11', '2023-06-16 13:08:11'),
(9, 'Bhupendra', 'Patetha', 'bhupenparethabhupen@gmail.com', '8128422440', '0', 'active', NULL, '$2y$10$SMUuW1UbuFenSG9fd/B41eCCuApI4srwow3sA0MSS0Weif6jLA8Hm', NULL, NULL, NULL, NULL, '2023-06-21 09:10:49', '2023-06-21 09:10:49'),
(10, 'Ajit', 'Kumar', 'kumar@gmail.com', '6203291215', '0', 'active', NULL, '$2y$10$8t01Fk8s1Z2SxjN1cchFQepY8Xt03iByya4Mi9jRMHnr1tIsfCJIu', NULL, NULL, NULL, NULL, '2023-06-23 09:38:18', '2023-06-23 09:38:18'),
(11, 'Kiran', 'Dodiya', 'kdodiya767@gmail.com', '6354104764', '0', 'active', NULL, '$2y$10$084DYigyVIc0AGUu7SnmyulhdjQvK8F6Zs9ZYZVAaPYBMuvjj2mTC', NULL, NULL, NULL, NULL, '2023-06-24 15:42:07', '2023-06-24 15:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_gst` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `address_link` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `business_category` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `company_name`, `company_gst`, `company_address`, `address_link`, `fname`, `lname`, `email`, `business_category`, `phone`, `slug`, `status`, `password`, `logo`, `created_at`, `updated_at`) VALUES
(6, 'D G Automobiles', 'CWVPP2530B', 'Opp Tirthay 6 flat, Nr Nigam Bus Stand, Ahmedabad,Gujarat 380050', 'https://goo.gl/maps/ErGQX3LC5usngP3N6', 'Dhaval', 'Gajera', 'dgauto444@gmail.com', 19, '8490080009', 'dhaval-gajera', '1', '$2y$10$pZHJZ3G4H6g5o9l3Op5Mb.6y7Bl4iihWxQzJJJ3cB/MKTyQan4V3W', '2023-06-15-648b353ac2b37.png', '2023-06-15 15:58:50', '2023-06-15 15:59:32'),
(7, 'company_logo', 'company_logo', 'company_logo', 'https://goo.gl/maps/ErGQX3LC5usngP3N6', 'Ajit', 'Kumar', 'admin@gmail.com', 19, '1234565432', 'ajit-kumar-company-logo', '1', '$2y$10$DRiBlrdiArXuXQNVeSn7uuD6ihSAS2YBnGMCp6eV9zlXJ7mG5agHS', '2023-06-30-649ec5b53324a.png', '2023-06-26 08:35:29', '2023-06-30 06:38:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `add_to_carts_user_id_foreign` (`user_id`),
  ADD KEY `add_to_carts_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_info`
--
ALTER TABLE `basic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`),
  ADD KEY `coupons_category_id_foreign` (`category_id`),
  ADD KEY `coupons_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `coupons_coupon_bundle_id_foreign` (`coupon_bundle_id`),
  ADD KEY `coupons_created_by_foreign` (`created_by`);

--
-- Indexes for table `coupon_bundles`
--
ALTER TABLE `coupon_bundles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupon_bundles_code_unique` (`code`),
  ADD KEY `coupon_bundles_category_id_foreign` (`category_id`),
  ADD KEY `coupon_bundles_created_by_foreign` (`created_by`),
  ADD KEY `coupon_bundles_sub_category_id_foreign` (`sub_category_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_coupon_bundle_id_foreign` (`coupon_bundle_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_details_key_id_unique` (`key_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_coupon_id_foreign` (`coupon_id`),
  ADD KEY `order_details_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `redeem_coupons`
--
ALTER TABLE `redeem_coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redeem_coupons_order_details_id_foreign` (`order_details_id`),
  ADD KEY `redeem_coupons_user_id_foreign` (`user_id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendors_business_category_foreign` (`business_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `basic_info`
--
ALTER TABLE `basic_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coupon_bundles`
--
ALTER TABLE `coupon_bundles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redeem_coupons`
--
ALTER TABLE `redeem_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  ADD CONSTRAINT `add_to_carts_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupon_bundles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `add_to_carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupons_coupon_bundle_id_foreign` FOREIGN KEY (`coupon_bundle_id`) REFERENCES `coupon_bundles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupons_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `vendors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupons_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupon_bundles`
--
ALTER TABLE `coupon_bundles`
  ADD CONSTRAINT `coupon_bundles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_bundles_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `vendors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_bundles_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_coupon_bundle_id_foreign` FOREIGN KEY (`coupon_bundle_id`) REFERENCES `coupon_bundles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redeem_coupons`
--
ALTER TABLE `redeem_coupons`
  ADD CONSTRAINT `redeem_coupons_order_details_id_foreign` FOREIGN KEY (`order_details_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redeem_coupons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_business_category_foreign` FOREIGN KEY (`business_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
