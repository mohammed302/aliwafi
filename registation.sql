-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 17 أغسطس 2018 الساعة 14:31
-- إصدار الخادم: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registation`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `admins`
--

INSERT INTO `admins` (`id`, `type`, `name`, `branch`, `email`, `password`, `pass`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mohammed', 0, 'mohamad302@hotmail.com', '$2y$10$aTRMun9fg08SftVlOq2WdOB9xBQjjl5yAIshynmkFp6k2lBN2A202', '654321', 'PoYqvgUWLYXHcCBnrrrpWElhQeWY9i9a2UQPbmFGC7sTxfzotp1YQ2kYPaae', NULL, '2017-09-09 15:11:39'),
(8, 1, 'محمد الغزالي', 0, 'mohamad402@hotmail.com', '$2y$10$UUvNfgZhaGgg6k4qVD9ROe3AsPXHoXz3loCPvqiGB8ctNuS6rSrpO', '123456', NULL, '2018-06-27 12:30:33', '2018-06-27 12:30:33');

-- --------------------------------------------------------

--
-- بنية الجدول `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `areas`
--

INSERT INTO `areas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'مكة المكرمة', '2018-08-15 15:54:52', '2018-08-15 12:54:52'),
(5, 'الرياض', '2018-08-15 12:57:36', '2018-08-15 12:57:36');

-- --------------------------------------------------------

--
-- بنية الجدول `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `area_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `cities`
--

INSERT INTO `cities` (`id`, `name`, `area_id`, `created_at`, `updated_at`) VALUES
(19, 'الرياض', 5, '2018-08-15 14:39:07', '2018-08-15 14:39:07');

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_08_05_181512_create_admins_table', 0),
(2, '2018_08_05_181512_create_banks_table', 0),
(3, '2018_08_05_181512_create_charges_table', 0),
(4, '2018_08_05_181512_create_orders_table', 0),
(5, '2018_08_05_181512_create_payments_table', 0),
(6, '2018_08_05_181512_create_products_table', 0),
(7, '2018_08_05_181512_create_settings_table', 0),
(8, '2018_08_05_181512_create_states_table', 0),
(9, '2018_08_05_181512_create_stores_table', 0),
(10, '2018_08_05_181512_create_users_table', 0),
(11, '2018_08_15_190958_create_admins_table', 0),
(12, '2018_08_15_190958_create_areas_table', 0),
(13, '2018_08_15_190958_create_cities_table', 0),
(14, '2018_08_15_190958_create_orders_table', 0),
(15, '2018_08_15_190958_create_settings_table', 0),
(16, '2018_08_15_190958_create_users_table', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `area_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `nationalty` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `name`, `mobile`, `email`, `date`, `area_id`, `city_id`, `nationalty`, `created_at`, `updated_at`) VALUES
(2, 'ادارة الاتصالات الهاتفية', '1231222331', 'mohamad342@hotmail.com', '2018-08-16 18:26:33', 5, 19, 1, '2018-08-16 15:26:33', '2018-08-16 15:26:33'),
(3, 'محمد الغزالي', '0506341213', 'mohamad302@hotmail.com', '2018-08-17 07:49:29', 5, 19, 1, '2018-08-17 07:54:57', '2018-08-17 04:49:29');

-- --------------------------------------------------------

--
-- بنية الجدول `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `home_text` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ss',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `settings`
--

INSERT INTO `settings` (`id`, `name`, `msg`, `img`, `home_text`, `created_at`, `updated_at`, `color`) VALUES
(1, 'زوار', 'تم تسجيل بيانات بنجاح', '1534360853.jpg', 'قم بتسجيل بياناتك', NULL, '2018-08-15 17:28:37', 'default-rtl.min.css');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_token` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `date_end` date NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `email_verification` int(11) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `email_token`, `name`, `email`, `address`, `tel`, `password`, `pass`, `about`, `image`, `type`, `date_end`, `verified`, `status`, `email_verification`, `remember_token`, `created_at`, `updated_at`, `last_login`) VALUES
(1, 'ss', 'mohammad alghazali', 'mohamad302@hotmail.com', 'gaza                                                    ', 2147483647, '$2y$10$ZhV5cVyn7HYxro6SAnQtJe.aOSBFjojn2.dkk..NAhaJPOafo7a2.', 'ss', 'ss', '1515357969.jpg', 1, '0000-00-00', 0, 1, NULL, 'RCs92slV5QRyRDvvTqpkVRrFunibMlBl5vNjxE2KcoRGtFvgQ2vV6oL1SaBn', NULL, '2018-05-06 12:04:10', '2017-12-11 08:06:31'),
(2, '', 'محمد الغزالي', 'mohamad302@outlook.sa', '', 0, '$2y$10$Qqx3Ra8VxcNlBymAoZZp5usJb..TOxZD4lHPcrM1VZiop5HR6ShYe', '', '', 'user-profile-avatar.jpg', 2, '0000-00-00', 0, 1, 0, 'pLjxmA67Fl70gYv3YETJmDRKMuFJzWLvsPv5wk61uYT9KQf5EzyEzTEflFCt', '2018-01-07 22:37:09', '2018-01-24 13:36:39', '2018-01-07 16:37:09'),
(3, '', 'صالح باسبيت', 's2sd@hotmail.com', '', 2147483647, '$2y$10$JPb2vlPLhg3wpDWdZpAKeufZ4TqQXD9cG83vvw7ATrUzvkMd04Gqq', '', '', 'user-profile-avatar.jpg', 2, '0000-00-00', 0, 1, 0, NULL, '2018-01-14 11:13:48', '2018-04-25 03:52:12', '2018-01-14 05:13:48'),
(4, '', 'osama', 'qais@outlook.sa', '', 0, '$2y$10$f/N1UF7gEA9eHCWnLtkbqujyV.ewSqREoXA66c11pXj/bj0cxDgZG', '', '', '', 2, '0000-00-00', 0, 1, 0, NULL, '2018-01-18 14:59:36', '2018-01-18 14:59:36', '2018-01-18 08:59:36'),
(5, '', 'admin', 'admin@demo.com', '', 0, '$2y$10$bMNgJ2FBBN20RZiN2Tklp.n7TyN/.wkjL2sxRb1zXONON37yyFQP.', '', '', 'user-profile-avatar.jpg', 1, '0000-00-00', 0, 1, 0, 'r263VlqTfNSHNGWOphXY6TIPrsKoVZZ5CdF1bCXzzgnczDzy3OXLdgxR8fKc', '2018-01-24 14:31:06', '2018-01-24 14:31:06', '2018-01-24 08:31:06'),
(6, '', 'صالح علي', 'Saleh2all@gmail.com', '', 0, '$2y$10$TlSTWVW1rRqh.7chBDl8Qe0zguBsZCCA7m8AZNqGK/bbyCxskyW7m', '', '', 'user-profile-avatar.jpg', 1, '0000-00-00', 0, 1, 0, 'y9Dli9XbjjCowwxqpVI3wXsAUxROjAJGAkaoO8IKhgl4wCh51LXJwrFU4tCF', '2018-02-06 03:31:40', '2018-02-06 03:31:40', '2018-02-05 21:31:40'),
(7, '', 'هاني', 'sssssss@ss.com', '', 0, '$2y$10$AAv.D5B6yp4SS9KPqo4YMuD8KsEsn11E16JL39L9sk1fhQfQK/ts6', '', '', 'user-profile-avatar.jpg', 2, '0000-00-00', 0, 1, 0, 'CP7jbhpnluadz5gCXE207udygPpONT42wgSgAx49bT86Mh573rBvORmH021d', '2018-02-06 19:31:50', '2018-02-06 20:05:58', '2018-02-06 13:31:50'),
(8, '', 'ماجد العوشن', 'majedsaud2@hotmail.com', '', 0, '$2y$10$MZOu0IVsYsz9njHIkeTlKezIj7UINJAnwDu6VYqacyyF96XYqA7jW', '', '', '', 2, '0000-00-00', 0, 1, 0, NULL, '2018-02-06 20:02:11', '2018-02-06 20:02:11', '2018-02-06 14:02:11'),
(10, '', 'osama33', 'mohamad30222@hotmail.com', '', 1234567890, '$2y$10$HbeduNKZLmR2F18iGBdZIOm9GdqlWWl4KTCk3.TgzPPbPQ3daRenq', '', '', '', 1, '0000-00-00', 0, 1, 0, NULL, '2018-04-25 03:38:07', '2018-04-25 03:41:02', '2018-04-25 06:38:07'),
(11, '', 'صهيب', 'mohamad402@hotmail.com', 'gaza            2                 ', 0, '$2y$10$Egeb8sgSK5pSupg.aN/xA.Bzmx56gaXd7YlEvNzNxhjk3rYBtWnPa', '', '', 'user-profile-avatar.jpg', 1, '0000-00-00', 0, 1, 0, 'XgC8NL9XQKwIPgFOApZVWYIu7pZzGJ2LE55V8S7DuJprqZ0G1xsdzA9IYDqU', '2018-05-04 10:09:27', '2018-05-06 03:31:10', '2018-05-04 13:09:27'),
(12, '', 'sabi', 'mohamad303@hotmail.com', '', 0, '$2y$10$aWq83nlIa1nCHO8nMXIQveEzBifXdvutCOwhIvZJMjxvPykxAtdAa', '', '', 'user-profile-avatar.jpg', 1, '0000-00-00', 0, 1, 0, 'wz1Gy6EnZKRsXnv6muBdbyX0lPpkHZZjdGs9tXB99rZk1Al1B6eySHbes6rM', '2018-05-05 05:01:44', '2018-05-05 05:01:44', '2018-05-05 08:01:44'),
(13, '', 'Noor madhon', 'noor335@outlook.sa', 'ss22', 12312, '$2y$10$zxJuY.de0f.aD5Ut7wRQxOP/oo1yadSxc.0MY3mEgfgbt4qYu0Rji', '', '', '', 1, '0000-00-00', 0, 1, 0, NULL, '2018-05-06 03:53:18', '2018-05-06 03:54:27', '2018-05-06 06:53:18'),
(14, '', 'alaa', 'mohamad505@hotmail.com', '', 0, '$2y$10$lS1dSBK.tz8bn7.hgVxMe.TR8tOeOEpnnYjlHkG1yggjkDwBwMBlO', '', '', 'user-profile-avatar.jpg', 1, '0000-00-00', 0, 1, 0, NULL, '2018-05-08 03:14:46', '2018-05-08 03:14:46', '2018-05-08 06:14:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
