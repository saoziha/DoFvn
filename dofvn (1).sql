-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2019 at 07:12 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dofvn`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linked` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `email`, `address`, `phone`, `facebook`, `instagram`, `skype`, `linked`, `website`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Trần Viết Thành', 'info@dofvn.com', '	108A Le loi, Da Nang, Viet Nam\r\n', '84 123456789\r\n', 'https://www.facebook.com/viet.thanh.3767', '#', '#', NULL, NULL, NULL, '2019-07-03 07:10:10', '2019-07-03 07:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Administrator', 'admin@gmail.com', NULL, '2019-07-03 07:10:10', '$2y$10$ndZP2PZm97KTg3tumFTuz.Ckcf6/KVnaxyy0SP1Tv.qplWX9zV8MK', 'bJLfdvU6PcpBdPVlWdXqNks24OaVgVi8ZqQ4EfOdWossONX7zuu2ztm08u8p', '2019-07-03 07:10:10', '2019-07-17 15:56:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

CREATE TABLE `archives` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archives`
--

INSERT INTO `archives` (`id`, `name`, `month`, `status`, `created_at`, `updated_at`) VALUES
(1, 'January', 1, 0, NULL, '2019-07-08 07:39:05'),
(2, 'February', 2, 0, NULL, '2019-07-08 07:39:01'),
(3, 'March', 3, 0, NULL, '2019-07-08 07:39:08'),
(4, 'April', 4, 0, NULL, '2019-07-08 07:39:12'),
(5, 'May', 5, 0, NULL, '2019-07-08 07:39:16'),
(6, 'June', 6, 0, NULL, '2019-07-08 07:39:20'),
(7, 'July', 7, 0, NULL, '2019-07-08 07:39:25'),
(8, 'August', 8, 0, NULL, '2019-07-08 07:39:29'),
(9, 'September', 9, 1, NULL, '2019-07-05 19:54:42'),
(10, 'October', 10, 1, NULL, '2019-07-05 19:54:58'),
(11, 'November', 11, 1, NULL, '2019-07-05 19:57:03'),
(12, 'December', 12, 1, NULL, '2019-07-05 19:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'sport', '0', 1, '2019-07-06 02:58:40', '2019-07-06 02:58:40'),
(3, 'movie', '0', 1, '2019-07-08 09:02:33', '2019-07-08 09:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `reply_id` int(11) DEFAULT '0',
  `reply` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `content`, `post_id`, `reply_id`, `reply`, `created_at`, `updated_at`, `status`) VALUES
(33, 2, 'hay', 5, 0, NULL, '2019-07-17 16:09:06', '2019-07-17 16:09:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `mail`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Nguyễn Thành Lâm', 'lnguyen24794@gmail.com', 'Xin chao', 'Xin chao', 0, '2019-07-16 15:07:26', '2019-07-16 15:07:26'),
(4, 'Nguyễn Thành Lâm', 'lnguyen24794@gmail.com', 'Xin chao', 'asdadasdas', 0, '2019-07-16 15:09:07', '2019-07-16 15:09:07'),
(6, 'Nguyễn Thành Lâm', 'lnguyen24794@gmail.com', 'Xin chao', 'asdasdasdas', 0, '2019-07-16 15:12:49', '2019-07-17 16:42:47'),
(7, 'Nguyễn Thành Lâm', 'lnguyen24794@gmail.com', 'Xin chao', '12312312321', 1, '2019-07-16 15:13:56', '2019-07-17 17:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 'movie1', 1, 1, '2019-07-06 03:42:36', '2019-07-06 04:20:14'),
(6, 'November', 3, 1, '2019-07-16 16:55:14', '2019-07-16 16:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gallery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `link`, `status`, `created_at`, `updated_at`, `gallery_id`) VALUES
(10, 'user/2019_07_07_14_01_03_84706916.jpg', 1, '2019-07-07 07:00:38', '2019-07-07 07:01:03', 5),
(11, 'gallery/2019_07_08_14_17_46_16156853.jpg', 1, '2019-07-08 07:17:46', '2019-07-08 07:17:46', 5),
(12, 'gallery/2019_07_08_14_18_00_99093784.jpg', 1, '2019-07-08 07:18:00', '2019-07-08 07:18:00', 5),
(13, 'gallery/2019_07_08_14_18_20_64027441.jpg', 1, '2019-07-08 07:18:20', '2019-07-08 07:18:20', 5),
(14, 'gallery/2019_07_16_23_55_14_13439469.jpg', 1, '2019-07-16 16:55:14', '2019-07-16 16:55:14', 6),
(15, 'gallery/2019_07_16_23_55_14_55788966.jpg', 1, '2019-07-16 16:55:14', '2019-07-16 16:55:14', 6),
(16, 'gallery/2019_07_16_23_55_14_59451371.jpg', 1, '2019-07-16 16:55:14', '2019-07-16 16:55:14', 6),
(17, 'gallery/2019_07_16_23_55_14_6744505.jpg', 1, '2019-07-16 16:55:14', '2019-07-16 16:55:14', 6);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_07_03_071103_create_admin_table', 1),
(2, '2019_07_03_071122_create_category_table', 1),
(3, '2019_07_03_071215_create_comment_table', 1),
(4, '2019_07_03_071237_create_about_table', 1),
(5, '2019_07_03_071347_create_contact_table', 1),
(6, '2019_07_03_071412_create_tag_table', 1),
(7, '2019_07_03_071430_create_archives_table', 1),
(8, '2019_07_03_071449_create_posts_table', 1),
(9, '2019_07_03_071541_create_gallery_table', 1),
(10, '2019_07_03_125913_create_subscribe_table', 1),
(11, '2019_07_03_134034_create_user_table', 1),
(12, '2019_07_04_133424_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `create_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `tags` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `top` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `title`, `category_id`, `content`, `image`, `comments`, `create_by`, `user_id`, `tags`, `status`, `top`, `created_at`, `updated_at`) VALUES
(3, 'Blog Single', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 3, '<p><img alt=\"\" src=\"http://localhost:8000/userfiles/files/41315586_1855559994563891_5593444494943977472_n.jpg\" style=\"width: 200px; height: 267px; border-width: 1px; border-style: solid;\" /></p>\r\n\r\n<p>Love you very much</p>', 'posts/2019_07_15_13_13_19_26144665.jpg', '0', 'admin', 0, '1,3', 1, 2, '2019-07-07 09:35:53', '2019-07-17 15:56:25'),
(5, 'Nguyễn Thành Lâm123', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 2, '<p><img alt=\"\" src=\"http://localhost:8000/userfiles/files/56795702_2154794164640471_6035470988471173120_o.jpg\" style=\"width: 1600px; height: 900px;\" /></p>', 'posts/2019_07_16_22_57_49_19041749.jpg', '1', 'lnguyen24794', 2, '1,3', 1, 10, '2019-07-16 15:57:49', '2019-07-17 16:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sport', 1, '2019-07-04 06:07:39', '2019-07-04 07:31:56'),
(3, 'movie', 1, '2019-07-04 07:32:57', '2019-07-07 09:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'lnguyen24794', 'lnguyen24794@gmail.com', 'user/2019_07_06_07_04_20_27150162.jpg', NULL, '$2y$10$xQfW0l/aIEdfliXRFHu/TOP8dFigekORAQWZCBQ4OeRz48E/AHvpy', 1, 'cfMoIXiiM6AsrKivT580ePyt0alu3x0V8INi8BxsUoqQnC8IsZO5istpvFi7', '2019-07-05 23:32:36', '2019-07-17 15:34:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribe_email_unique` (`email`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `archives`
--
ALTER TABLE `archives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
