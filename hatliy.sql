-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 06 أغسطس 2018 الساعة 10:49
-- إصدار الخادم: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hatliy`
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
-- بنية الجدول `banks`
--

DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `banks`
--

INSERT INTO `banks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'الراجحي', '2018-07-13 06:00:12', '2018-07-13 08:30:42');

-- --------------------------------------------------------

--
-- بنية الجدول `charges`
--

DROP TABLE IF EXISTS `charges`;
CREATE TABLE IF NOT EXISTS `charges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(10, '2018_08_05_181512_create_users_table', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `whatsup` bigint(12) NOT NULL,
  `address` varchar(500) NOT NULL,
  `link` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `order` int(11) NOT NULL,
  `charge` int(11) NOT NULL,
  `purshase_cost` int(11) NOT NULL,
  `charge_cost` int(11) NOT NULL,
  `commission` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `store`, `name`, `whatsup`, `address`, `link`, `date`, `order`, `charge`, `purshase_cost`, `charge_cost`, `commission`, `total`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'محمد الغزالي', 972595444872, 'gaza', '', '2018-08-05 06:42:23', 0, 0, 200, 20, 20, 240, 5, '2018-08-05 17:18:29', '2018-08-05 14:18:29'),
(2, 1, 'sabi', 972595444872, 'gaza', '', '2018-08-05 07:23:06', 0, 0, 260, 22, 11, 999, 5, '2018-08-05 16:25:55', '2018-08-05 13:25:55'),
(3, 3, 'حازم', 972595444872, 'gaza', '', '2018-08-05 14:28:40', 12, 0, 200, 30, 10, 240, 5, '2018-08-06 06:24:38', '2018-08-06 03:24:38');

-- --------------------------------------------------------

--
-- بنية الجدول `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `order_id` int(11) NOT NULL,
  `bank_from` varchar(250) NOT NULL,
  `bank_to` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(250) NOT NULL,
  `color` varchar(250) NOT NULL,
  `size` varchar(250) NOT NULL,
  `count` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `link`, `color`, `size`, `count`, `order_id`, `created_at`, `updated_at`) VALUES
(10, 'https://khamsat.com/', 'احمر', 'كبير', 44, 3, '2018-08-05 11:28:47', '2018-08-05 11:28:47'),
(9, 'https://khamsat.com/', 'احمر', 'كبير', 44, 2, '2018-08-05 04:24:45', '2018-08-05 04:24:45'),
(7, 'https://khamsat.com/', 'احمر', 'كبير', 2, 1, '2018-08-05 03:42:56', '2018-08-05 03:42:56'),
(8, 'http://jsfiddle.net/U6N3R/', 'ازرق', 'صغير', 1, 1, '2018-08-05 03:42:56', '2018-08-05 03:42:56'),
(11, 'https://khamsat.com/', 'احمر', 'كبير', 2, 4, '2018-08-06 03:25:37', '2018-08-06 03:25:37'),
(12, 'https://khamsat.com/', 'احمر', 'كبير', 1, 4, '2018-08-06 03:25:37', '2018-08-06 03:25:37');

-- --------------------------------------------------------

--
-- بنية الجدول `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `freelancer_link` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pay_message` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ss',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `settings`
--

INSERT INTO `settings` (`id`, `freelancer_link`, `name`, `link`, `google`, `pay_message`, `created_at`, `updated_at`, `color`) VALUES
(1, 0, 'hatliy', 'https://www.youtube.com/embed/WO7lAf-0XeE', 'تم استقبال طلبك بنجاح, وسيتم التواصل معك خلال 12 ساعه القادمه', 'تم بنجاح', NULL, '2018-08-04 11:04:54', 'blue-rtl.min.css');

-- --------------------------------------------------------

--
-- بنية الجدول `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'جديد', '2018-06-29 08:17:34', '2018-06-29 06:17:34'),
(5, 'تم الحساب', '2018-08-05 14:34:24', '2018-08-05 11:34:24'),
(6, 'انتظار التحويل', '2018-06-29 06:15:52', '2018-06-29 06:15:52'),
(7, 'تم التحويل', '2018-06-29 06:16:09', '2018-06-29 06:16:09'),
(8, 'تم الطلب', '2018-06-29 06:16:15', '2018-06-29 06:16:15'),
(9, 'تم الشحن', '2018-06-29 06:16:19', '2018-06-29 06:16:19'),
(10, 'مكتمل', '2018-06-29 08:30:08', '2018-06-29 06:30:08'),
(11, 'ملغي', '2018-08-05 14:34:45', '2018-08-05 11:34:45'),
(12, 'لم يتم التحويل', '2018-07-02 14:28:11', '2018-07-02 14:28:11'),
(13, 'تم التواصل', '2018-08-05 11:35:41', '2018-08-05 11:35:41'),
(14, 'test2', '2018-08-06 10:46:52', '2018-08-06 07:46:52'),
(15, 'محمد الغزالي', '2018-08-06 07:48:10', '2018-08-06 07:48:10');

-- --------------------------------------------------------

--
-- بنية الجدول `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `stores`
--

INSERT INTO `stores` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'YesStyle', '2018-08-05 07:20:24', '2018-08-05 07:20:24'),
(5, 'AliExpress', '2018-08-05 07:20:24', '2018-08-05 07:20:24'),
(4, 'neweeg', '2018-08-05 07:20:24', '2018-08-05 07:20:24'),
(3, 'iherb', '2018-08-05 07:20:24', '2018-08-05 07:20:24'),
(2, 'amazon', '2018-08-05 07:20:24', '2018-08-05 07:20:24'),
(1, 'zaful', '2018-08-05 07:20:24', '2018-08-05 07:20:24'),
(7, 'asos', '2018-08-05 07:20:24', '2018-08-05 07:20:24'),
(8, 'JollyChic', '2018-08-05 07:20:24', '2018-08-05 07:20:24'),
(9, 'CocoonCenter', '2018-08-05 07:20:24', '2018-08-05 07:20:24');

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
