-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2015 at 01:25 AM
-- Server version: 5.5.44-0ubuntu0.12.04.1
-- PHP Version: 5.6.13-1+deb.sury.org~precise+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_ast`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_languages`
--

CREATE TABLE IF NOT EXISTS `app_languages` (
  `id` int(10) unsigned NOT NULL,
  `language_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(4) NOT NULL,
  `lack` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_languages`
--

INSERT INTO `app_languages` (`id`, `language_name`, `code`, `is_default`, `lack`, `total`) VALUES
(2, 'English', 'en', 1, 0, 0),
(3, 'Japanese', 'jp', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_blogs`
--

CREATE TABLE IF NOT EXISTS `category_blogs` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `feauture_image` text COLLATE utf8_unicode_ci NOT NULL,
  `user_created` text COLLATE utf8_unicode_ci NOT NULL,
  `properties` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_blogs`
--

INSERT INTO `category_blogs` (`id`, `parent_id`, `order`, `is_active`, `feauture_image`, `user_created`, `properties`, `created_at`, `updated_at`) VALUES
(9, 0, 0, 1, '', '1', '', '2015-10-09 07:12:08', '2015-10-09 07:12:08'),
(11, 9, 0, 1, '', '1', '', '2015-10-09 07:13:12', '2015-10-09 07:13:12'),
(12, 9, 0, 1, '', '1', '', '2015-10-09 07:13:35', '2015-10-09 07:13:35'),
(13, 9, 0, 1, '', '1', '', '2015-10-09 07:29:23', '2015-10-09 07:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `category_blogs_data`
--

CREATE TABLE IF NOT EXISTS `category_blogs_data` (
  `id` int(10) unsigned NOT NULL,
  `category_blogs_id` int(10) unsigned NOT NULL,
  `language_code` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_alias` text COLLATE utf8_unicode_ci NOT NULL,
  `category_name` text COLLATE utf8_unicode_ci NOT NULL,
  `category_content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_blogs_data`
--

INSERT INTO `category_blogs_data` (`id`, `category_blogs_id`, `language_code`, `category_alias`, `category_name`, `category_content`, `created_at`, `updated_at`) VALUES
(1, 9, 'en', 'name-category-for-english-9', 'Name category for english', '', '2015-10-09 07:12:08', '2015-10-09 07:12:08'),
(2, 9, 'jp', '9', 'おはよございます。', '', '2015-10-09 07:12:08', '2015-10-09 07:12:08'),
(3, 9, 'vi', 'ten-danh-muc-tieng-viet-9', 'Tên danh mục tiếng việt', '', '2015-10-09 07:12:08', '2015-10-09 07:12:08'),
(7, 11, 'en', 'name-category-for-english-11', 'Name category for english', '', '2015-10-09 07:13:12', '2015-10-09 07:13:12'),
(8, 11, 'jp', '11', 'おはよございます。', '', '2015-10-09 07:13:12', '2015-10-09 07:13:12'),
(9, 11, 'vi', 'ten-danh-muc-tieng-viet-11', 'Tên danh mục tiếng việt', '', '2015-10-09 07:13:12', '2015-10-09 07:13:12'),
(10, 12, 'en', 'sub-2-12', 'sub 2', '', '2015-10-09 07:13:35', '2015-10-09 07:13:35'),
(11, 12, 'jp', 'sub-2-12', 'sub 2', '', '2015-10-09 07:13:35', '2015-10-09 07:13:35'),
(12, 12, 'vi', 'sub-2-12', 'sub 2', '', '2015-10-09 07:13:35', '2015-10-09 07:13:35'),
(13, 13, 'en', 'asdad-13', 'asdad', '', '2015-10-09 07:29:24', '2015-10-09 07:29:24'),
(14, 13, 'jp', 'asda-13', 'asda', '', '2015-10-09 07:29:24', '2015-10-09 07:29:24'),
(15, 13, 'vi', 'queqeas-13', 'qưeqeas', '', '2015-10-09 07:29:24', '2015-10-09 07:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL,
  `company_name` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `attachment` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `company_name`, `name`, `email`, `attachment`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(22, '', '', '', '', '', '', '2015-10-21 01:02:30', '2015-10-21 01:02:30'),
(23, '', '', '', '', '', '', '2015-10-21 01:02:31', '2015-10-21 01:02:31'),
(24, '', '', '', '', '', '', '2015-10-21 01:02:31', '2015-10-21 01:02:31'),
(25, '', '', '', '', '', '', '2015-10-21 01:02:31', '2015-10-21 01:02:31'),
(26, '', '', '', '', '', '', '2015-10-21 01:02:32', '2015-10-21 01:02:32'),
(27, '', '', '', '', '', '', '2015-10-21 01:02:33', '2015-10-21 01:02:33'),
(28, '', '', '', '', '', '', '2015-10-21 01:02:33', '2015-10-21 01:02:33'),
(29, '', '', '', '', '', '', '2015-10-21 01:03:52', '2015-10-21 01:03:52'),
(30, 'asda', 'asffad', 'asd@asd.cas', '', 'adfsdf', '', '2015-10-21 01:04:47', '2015-10-21 01:04:47'),
(31, 'asda', 'asffad', 'asd@asd.cas', '', 'adfsdf', '', '2015-10-21 01:05:21', '2015-10-21 01:05:21'),
(32, 'Asian Tech Inc.', 'NguyenVQ', 'abc@abc.com', '', 'asda', '', '2015-10-21 01:06:06', '2015-10-21 01:06:06'),
(33, '', '', '', '', '', '', '2015-10-21 08:26:44', '2015-10-21 08:26:44'),
(34, 'asd', 'asd', 'admin@asiantech.vn', '', 'asdasd', '', '2015-10-21 08:47:40', '2015-10-21 08:47:40'),
(35, 'asd', 'asd', 'abc@abc.com', '', 'asd', '', '2015-10-21 08:53:10', '2015-10-21 08:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `languages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `languages`, `is_active`, `order`) VALUES
(1, 'af', 'Afrikaans', 0, 0),
(2, 'sq', 'Albanian', 0, 0),
(3, 'ar', 'Arabic', 0, 0),
(4, 'hy', 'Armenian', 0, 0),
(5, 'eu', 'Basque', 0, 0),
(6, 'bn', 'Bengali', 0, 0),
(7, 'bg', 'Bulgarian', 0, 0),
(8, 'ca', 'Catalan', 0, 0),
(9, 'km', 'Cambodian', 0, 0),
(10, 'zh', 'Chinese (Mandarin)', 0, 0),
(11, 'hr', 'Croatian', 0, 0),
(12, 'cs', 'Czech', 0, 0),
(13, 'da', 'Danish', 0, 0),
(14, 'nl', 'Dutch', 0, 0),
(15, 'en', 'English', 1, 0),
(16, 'et', 'Estonian', 0, 0),
(17, 'fj', 'Fiji', 0, 0),
(18, 'fi', 'Finnish', 0, 0),
(19, 'fr', 'French', 1, 1),
(20, 'ka', 'Georgian', 0, 0),
(21, 'de', 'German', 1, 0),
(22, 'el', 'Greek', 0, 0),
(23, 'gu', 'Gujarati', 0, 0),
(24, 'he', 'Hebrew', 0, 0),
(25, 'hi', 'Hindi', 0, 0),
(26, 'hu', 'Hungarian', 0, 0),
(27, 'is', 'Icelandic', 0, 0),
(28, 'id', 'Indonesian', 0, 0),
(29, 'ga', 'Irish', 0, 0),
(30, 'it', 'Italian', 0, 0),
(31, 'jp', 'Japanese', 0, 0),
(32, 'jw', 'Javanese', 0, 0),
(33, 'ko', 'Korean', 0, 0),
(34, 'la', 'Latin', 0, 0),
(35, 'lv', 'Latvian', 0, 0),
(36, 'lt', 'Lithuanian', 0, 0),
(37, 'mk', 'Macedonian', 0, 0),
(38, 'ms', 'Malay', 0, 0),
(39, 'ml', 'Malayalam', 0, 0),
(40, 'mt', 'Maltese', 0, 0),
(41, 'mi', 'Maori', 0, 0),
(42, 'mr', 'Marathi', 0, 0),
(43, 'mn', 'Mongolian', 0, 0),
(44, 'ne', 'Nepali', 0, 0),
(45, 'no', 'Norwegian', 0, 0),
(46, 'fa', 'Persian', 0, 0),
(47, 'pl', 'Polish', 0, 0),
(48, 'pt', 'Portuguese', 0, 0),
(49, 'pa', 'Punjabi', 0, 0),
(50, 'qu', 'Quechua', 0, 0),
(51, 'ro', 'Romanian', 0, 0),
(52, 'ru', 'Russian', 0, 0),
(53, 'sm', 'Samoan', 0, 0),
(54, 'sr', 'Serbian', 0, 0),
(55, 'sk', 'Slovak', 0, 0),
(56, 'sl', 'Slovenian', 0, 0),
(57, 'es', 'Spanish', 0, 0),
(58, 'sw', 'Swahili', 0, 0),
(59, 'sv', 'Swedish ', 0, 0),
(60, 'ta', 'Tamil', 0, 0),
(61, 'tt', 'Tatar', 0, 0),
(62, 'te', 'Telugu', 0, 0),
(63, 'th', 'Thai', 0, 0),
(64, 'bo', 'Tibetan', 0, 0),
(65, 'to', 'Tonga', 0, 0),
(66, 'tr', 'Turkish', 0, 0),
(67, 'uk', 'Ukrainian', 0, 0),
(68, 'ur', 'Urdu', 0, 0),
(69, 'uz', 'Uzbek', 0, 0),
(70, 'vi', 'Vietnamese', 0, 0),
(71, 'cy', 'Welsh', 0, 0),
(72, 'xh', 'Xhosa', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) unsigned NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci NOT NULL,
  `team` text COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `author_id` text COLLATE utf8_unicode_ci NOT NULL,
  `properties` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fullname`, `team`, `avatar`, `author_id`, `properties`, `created_at`, `updated_at`) VALUES
(13, 'Shiruka', '3', '991cfd2cd1157b1397003849512722dbbe3d22f5.png', '', '', '2015-10-20 08:55:49', '2015-10-20 08:55:49'),
(14, 'rwe', '', 'f6f3567b92027a71349b9ccaa33a5d5758ea65e2.png', '', '', '2015-10-20 08:57:01', '2015-10-29 08:54:23'),
(15, 'Shiruka', '', '8734fc152f44020a685b8c68c8a75187130c4297.jpg', '', '', '2015-10-26 04:33:59', '2015-10-26 04:33:59'),
(16, 'ád', '5', '9de87d38ab9e48fa70f7cc90b7eb2f98a3d36978.jpg', '', '', '2015-10-26 04:43:41', '2015-10-26 04:43:41'),
(17, 'しぬ', '3', '58b1547462d6fb4f70762f6e104e8f33beff7388.jpg', '', '', '2015-10-26 04:53:43', '2015-10-26 04:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `member_details`
--

CREATE TABLE IF NOT EXISTS `member_details` (
  `id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `language_code` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member_details`
--

INSERT INTO `member_details` (`id`, `member_id`, `language_code`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(106, 13, 'en', 'Question 1', 'Answer1', '2015-10-20 08:55:49', '2015-10-20 08:55:49'),
(107, 13, 'en', 'Question 2', 'Answer 2', '2015-10-20 08:55:49', '2015-10-20 08:55:49'),
(108, 13, 'en', 'Question 3', 'Answer 3', '2015-10-20 08:55:49', '2015-10-20 08:55:49'),
(109, 13, 'en', 'Question 4', 'Answer 4', '2015-10-20 08:55:49', '2015-10-20 08:55:49'),
(110, 13, 'en', 'Question 5', 'Answer 5', '2015-10-20 08:55:49', '2015-10-20 08:55:49'),
(111, 13, 'jp', 'Question 1', 'Answer 1', '2015-10-20 08:55:49', '2015-10-20 08:55:49'),
(112, 13, 'jp', 'Question 2', 'Answer 1', '2015-10-20 08:55:49', '2015-10-20 08:55:49'),
(113, 13, 'jp', 'Question 3', 'Answer 1', '2015-10-20 08:55:49', '2015-10-20 08:55:49'),
(114, 13, 'jp', 'Question 4', 'Answer 1', '2015-10-20 08:55:49', '2015-10-20 08:55:49'),
(115, 13, 'jp', 'Question 5', 'Answer 1', '2015-10-20 08:55:49', '2015-10-20 08:55:49'),
(116, 14, 'en', 'asd', 'asd', '2015-10-20 08:57:01', '2015-10-20 08:57:01'),
(117, 14, 'en', 'asd', 'asd', '2015-10-20 08:57:01', '2015-10-20 08:57:01'),
(118, 14, 'en', 'asd', 'asdd', '2015-10-20 08:57:01', '2015-10-20 08:57:01'),
(119, 14, 'en', 'ew', 'wer', '2015-10-20 08:57:01', '2015-10-29 08:55:04'),
(120, 14, 'en', 'wer', 'wer', '2015-10-20 08:57:01', '2015-10-29 08:55:04'),
(121, 14, 'jp', '1231', '123', '2015-10-20 08:57:01', '2015-10-29 08:55:04'),
(122, 14, 'jp', '234', '42', '2015-10-20 08:57:01', '2015-10-29 08:55:04'),
(123, 14, 'jp', '3434', '3434', '2015-10-20 08:57:01', '2015-10-29 08:55:04'),
(124, 14, 'jp', '434343', '4343', '2015-10-20 08:57:01', '2015-10-29 08:55:05'),
(125, 14, 'jp', '5453', '54354', '2015-10-20 08:57:01', '2015-10-29 08:55:05'),
(126, 16, 'en', '', '', '2015-10-26 04:43:41', '2015-10-26 04:43:41'),
(127, 16, 'en', '', '', '2015-10-26 04:43:41', '2015-10-26 04:43:41'),
(128, 16, 'en', '', '', '2015-10-26 04:43:41', '2015-10-26 04:43:41'),
(129, 16, 'en', '', '', '2015-10-26 04:43:41', '2015-10-26 04:43:41'),
(130, 16, 'en', '', '', '2015-10-26 04:43:41', '2015-10-26 04:43:41'),
(131, 16, 'jp', '', '', '2015-10-26 04:43:41', '2015-10-26 04:43:41'),
(132, 16, 'jp', '', '', '2015-10-26 04:43:41', '2015-10-26 04:43:41'),
(133, 16, 'jp', '', '', '2015-10-26 04:43:41', '2015-10-26 04:43:41'),
(134, 16, 'jp', '', '', '2015-10-26 04:43:41', '2015-10-26 04:43:41'),
(135, 16, 'jp', '', '', '2015-10-26 04:43:41', '2015-10-26 04:43:41'),
(136, 17, 'en', '', '', '2015-10-26 04:53:43', '2015-10-26 04:53:43'),
(137, 17, 'en', '', '', '2015-10-26 04:53:43', '2015-10-26 04:53:43'),
(138, 17, 'en', '', '', '2015-10-26 04:53:43', '2015-10-26 04:53:43'),
(139, 17, 'en', '', '', '2015-10-26 04:53:43', '2015-10-26 04:53:43'),
(140, 17, 'en', '', '', '2015-10-26 04:53:43', '2015-10-26 04:53:43'),
(141, 17, 'jp', '', '', '2015-10-26 04:53:43', '2015-10-26 04:53:43'),
(142, 17, 'jp', '', '', '2015-10-26 04:53:43', '2015-10-26 04:53:43'),
(143, 17, 'jp', '', '', '2015-10-26 04:53:43', '2015-10-26 04:53:43'),
(144, 17, 'jp', '', '', '2015-10-26 04:53:43', '2015-10-26 04:53:43'),
(145, 17, 'jp', '', '', '2015-10-26 04:53:43', '2015-10-26 04:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_10_06_044920_create_languages_table', 1),
('2015_10_07_075529_category', 2),
('2015_10_07_075535_categoryData', 3),
('2015_10_09_040757_create_posts_table', 4),
('2015_10_09_041021_create_post_datas_table', 4),
('2015_10_11_214905_create_static_pages_table', 5),
('2015_10_11_214937_create_static_page_datas_table', 5),
('2015_10_12_012005_create_members_table', 6),
('2015_10_12_012016_create_member_details_table', 6),
('2015_10_12_054638_create_services_table', 6),
('2015_10_12_054730_create_service_details_table', 6),
('2015_10_14_072619_create_timelines_table', 7),
('2015_10_14_072650_create_timeline_details_table', 7),
('2015_10_14_110814_create_teams_table', 8),
('2015_10_20_094917_create_contacts_table', 9),
('2015_10_20_182437_create_roles_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `feauture_image` text COLLATE utf8_unicode_ci NOT NULL,
  `author_id` text COLLATE utf8_unicode_ci NOT NULL,
  `properties` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `is_active`, `order`, `feauture_image`, `author_id`, `properties`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 0, '98f85d6327cfdadb00174ab048b5ce40df0dd8d4.jpg', '1', '', '2015-10-09 08:22:11', '2015-10-11 19:52:04'),
(2, 12, 1, 0, '9f22f4bf661db0770c97f32f87bc027a333a2180.jpg', '1', '', '2015-10-11 18:17:33', '2015-10-11 18:17:44'),
(3, 12, 1, 0, '', '1', '', '2015-10-11 19:15:12', '2015-10-11 19:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `post_datas`
--

CREATE TABLE IF NOT EXISTS `post_datas` (
  `id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `language_code` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_alias` text COLLATE utf8_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8_unicode_ci NOT NULL,
  `post_descriptions` text COLLATE utf8_unicode_ci NOT NULL,
  `post_contents` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_datas`
--

INSERT INTO `post_datas` (`id`, `post_id`, `language_code`, `post_alias`, `post_title`, `post_descriptions`, `post_contents`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'tieu-de-tieng-anh-vsdf-1', 'Tiêu đề tiếng anh vsdf', 'Mô tả tiếng anhsdfsd<br>', 'Nội dung tiếng anhsdfdsd<br>', '2015-10-09 08:22:11', '2015-10-11 19:51:03'),
(2, 1, 'jp', 'tieu-de-tieng-1', 'Tiêu đề tiếng ', '<p>Mô tả tiếng nhật&nbsp;&nbsp; sss<br></p>', 'Nội dung tiếng nhậtsdfsd<br>', '2015-10-09 08:22:11', '2015-10-11 19:52:04'),
(3, 1, 'vi', 'bai-viet-tieng-1', 'Bài viết tiếng ', 'Mô tả tiếng việtfsdfsdfasd<br>', 'Nội dung tiếng việtsdfsdf<br>', '2015-10-09 08:22:11', '2015-10-11 19:52:04'),
(4, 2, 'en', 'news-test-2', 'news test', 'news test', 'news test', '2015-10-11 18:17:33', '2015-10-11 18:17:33'),
(5, 2, 'jp', '2', 'おはよございます', 'おはよございます', 'おはよございます', '2015-10-11 18:17:33', '2015-10-11 18:17:33');
INSERT INTO `post_datas` (`id`, `post_id`, `language_code`, `post_alias`, `post_title`, `post_descriptions`, `post_contents`, `created_at`, `updated_at`) VALUES
(6, 2, 'vi', 'tin-tuc-abcd-cac-kieu-2', 'Tin tức abcd các kiểu', 'Tin tức abcd các kiểu', '<p>Tin tức abcd các kiểu</p><img data-filename="php-developer-04.jpg" src="data:image/jpeg;base64,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', '2015-10-11 18:17:33', '2015-10-11 18:17:33');
INSERT INTO `post_datas` (`id`, `post_id`, `language_code`, `post_alias`, `post_title`, `post_descriptions`, `post_contents`, `created_at`, `updated_at`) VALUES
(7, 3, 'en', 'test-new-post-3', 'Test new post', 'Test new post', 'Test new post', '2015-10-11 19:15:13', '2015-10-11 19:15:13'),
(8, 3, 'jp', 'test-new-post-3', 'Test new post', 'Test new post', 'Test new post', '2015-10-11 19:15:13', '2015-10-11 19:15:13'),
(9, 3, 'vi', 'test-new-post-3', 'Test new post', 'Test new post', 'Test new post', '2015-10-11 19:15:13', '2015-10-11 19:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `route_key`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Root', '', 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.', '2015-10-21 22:45:47', '2015-10-21 22:45:47'),
(2, 'Administrator', '', 'Full access to create, edit, and update companies, and orders.', '2015-10-21 22:45:47', '2015-10-21 22:45:47'),
(3, 'Manager', '', 'Ability to create new companies and orders, or edit and update any existing ones.', '2015-10-21 22:45:47', '2015-10-21 22:45:47'),
(4, 'Company Manager', '', 'Able to manage the company that the user belongs to, including adding sites, creating new users and assigning licences.', '2015-10-21 22:45:47', '2015-10-21 22:45:47'),
(5, 'User', '', 'A standard user that can have a licence assigned to them. No administrative features.', '2015-10-21 22:45:47', '2015-10-21 22:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) unsigned NOT NULL,
  `is_active` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `feauture_image` text COLLATE utf8_unicode_ci NOT NULL,
  `service_url` text COLLATE utf8_unicode_ci NOT NULL,
  `app_url_ios` text COLLATE utf8_unicode_ci NOT NULL,
  `app_url_android` text COLLATE utf8_unicode_ci NOT NULL,
  `app_url_windows` text COLLATE utf8_unicode_ci NOT NULL,
  `gallery` text COLLATE utf8_unicode_ci NOT NULL,
  `author_id` text COLLATE utf8_unicode_ci NOT NULL,
  `properties` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `is_active`, `order`, `feauture_image`, `service_url`, `app_url_ios`, `app_url_android`, `app_url_windows`, `gallery`, `author_id`, `properties`, `created_at`, `updated_at`) VALUES
(47, 0, 0, '07f16e51f48fdaaa9d7febf4aa3b75d5f525353e.png', 'http://go1.com', 'http://go2.com', 'http://go3.com', 'http://go4.com', '90a83a5f79b355230e3d03e0d3acf7ca8e5d667f.png,934b974d04e57fb90db3d2e406bd915f3f491e45.png', '1', '1', '2015-10-19 13:43:16', '2015-10-29 09:02:25'),
(48, 1, 0, '30e0db9ce354cd81777d0a1bcfbaafca6b898555.png', 'http://go1.com', 'http://go2.com', 'http://go3.com', 'http://go4.com', 'c4dc99af9e81ee583d19c999c8c74dc7563d1b07.png,b57b7caaac385db8cc8c208f59333b2a7106fcdb.png', '1', '1', '2015-10-19 13:43:19', '2015-10-19 13:43:19'),
(49, 1, 0, '43c09311a99c97c762ea20c055953fcc7f7f8622.png', 'http://go1.com', 'http://go2.com', 'http://go3.com', 'http://go4.com', 'dbc9bc78e42363d67f4a7af4ddbd7a79a30eb2da.png,1b88573a66536fb3207d14d8e31eaa4c686a0416.png', '1', '2', '2015-10-19 13:43:52', '2015-10-19 13:43:52'),
(50, 1, 0, '5415ba786778bfb7f570ece7473e7c4bef1aa9db.png', 'http://go1.com', 'http://go2.com', 'http://go3.com', 'http://go4.com', 'f0f94745f126bc0c7e288cf6409a75bac99f9fba.png,5364252c5470b5cf0bc4154b2ff0788a7c73dedc.png', '1', '2', '2015-10-19 13:43:54', '2015-10-19 13:43:54'),
(51, 1, 0, '87c85786de118130c1fe13d4a69cccd10a515851.png', 'http://go1.com', 'http://go2.com', 'http://go3.com', 'http://go4.com', '697642dfba3d4616c48bf6c91e36a477c1d76979.png,5afb25058e20dc14031d01dad180524ab0f7d9ae.png', '1', '3', '2015-10-19 13:44:22', '2015-10-19 13:44:22'),
(52, 1, 0, '4609ac11fc5f15f0f0319115f5c0418d11339a3f.png', 'http://go1.com', 'http://go2.com', 'http://go3.com', 'http://go4.com', '0b1a785c1dc79bb0c66992c2432fb29c68ef6058.png,1d3ec4b7f367bab7dc3ad484b5c95ea0d302612b.png', '1', '3', '2015-10-19 13:44:25', '2015-10-19 13:44:25'),
(53, 1, 0, '34236f14ebc24c9e2bf7ceb11e2aa8ee1344087d.png', 'http://go1.com', 'http://go2.com', 'http://go3.com', 'http://go4.com', 'af9064952e897ed82be5cef22dafc46c7d937c2a.png,137ddb2e024b2a5280e2c8ee9ede6868970e5da2.png', '1', '4', '2015-10-19 13:44:41', '2015-10-19 13:44:41'),
(54, 1, 0, '530c9772a4e6876e68a418acc517cab6dc56806a.png', 'http://go1.com', 'http://go2.com', 'http://go3.com', 'http://go4.com', '8435cfa5678942629f82e2bf4051dcee9f30131d.png,58d6a6b49024d9da68e89cd9af95eb2c13061579.png', '1', '4', '2015-10-19 13:44:43', '2015-10-19 13:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `service_details`
--

CREATE TABLE IF NOT EXISTS `service_details` (
  `id` int(10) unsigned NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `language_code` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_name` text COLLATE utf8_unicode_ci NOT NULL,
  `service_alias` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_details`
--

INSERT INTO `service_details` (`id`, `service_id`, `language_code`, `service_name`, `service_alias`, `description`, `content`, `created_at`, `updated_at`) VALUES
(114, 47, 'en', 'Barneys New York', 'barneys-new-york-47', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:43:16', '2015-10-19 13:43:16'),
(115, 47, 'jp', 'Barneys New York', 'barneys-new-york-47', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:43:16', '2015-10-19 13:43:16'),
(116, 47, 'vi', 'Barneys New York', 'barneys-new-york-47', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:43:16', '2015-10-19 13:43:16'),
(117, 48, 'en', 'Barneys New York', 'barneys-new-york-48', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:43:19', '2015-10-19 13:43:19'),
(118, 48, 'jp', 'Barneys New York', 'barneys-new-york-48', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:43:19', '2015-10-19 13:43:19'),
(119, 48, 'vi', 'Barneys New York', 'barneys-new-york-48', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:43:19', '2015-10-19 13:43:19'),
(120, 49, 'en', 'Barneys New York', 'barneys-new-york-49', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:43:52', '2015-10-19 13:43:52'),
(121, 49, 'jp', 'Barneys New York', 'barneys-new-york-49', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:43:52', '2015-10-19 13:43:52'),
(122, 49, 'vi', 'Barneys New York', 'barneys-new-york-49', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:43:52', '2015-10-19 13:43:52'),
(123, 50, 'en', 'Barneys New York', 'barneys-new-york-50', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:43:54', '2015-10-19 13:43:54'),
(124, 50, 'jp', 'Barneys New York', 'barneys-new-york-50', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:43:55', '2015-10-19 13:43:55'),
(125, 50, 'vi', 'Barneys New York', 'barneys-new-york-50', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:43:55', '2015-10-19 13:43:55'),
(126, 51, 'en', 'Barneys New York', 'barneys-new-york-51', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:44:22', '2015-10-19 13:44:22'),
(127, 51, 'jp', 'Barneys New York', 'barneys-new-york-51', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:44:22', '2015-10-19 13:44:22'),
(128, 51, 'vi', 'Barneys New York', 'barneys-new-york-51', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:44:22', '2015-10-19 13:44:22'),
(129, 52, 'en', 'Barneys New York', 'barneys-new-york-52', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:44:25', '2015-10-19 13:44:25'),
(130, 52, 'jp', 'Barneys New York', 'barneys-new-york-52', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:44:25', '2015-10-19 13:44:25'),
(131, 52, 'vi', 'Barneys New York', 'barneys-new-york-52', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:44:25', '2015-10-19 13:44:25'),
(132, 53, 'en', 'Barneys New York', 'barneys-new-york-53', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:44:41', '2015-10-19 13:44:41'),
(133, 53, 'jp', 'Barneys New York', 'barneys-new-york-53', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:44:41', '2015-10-19 13:44:41'),
(134, 53, 'vi', 'Barneys New York', 'barneys-new-york-53', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:44:41', '2015-10-19 13:44:41'),
(135, 54, 'en', 'Barneys New York', 'barneys-new-york-54', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:44:43', '2015-10-19 13:44:43'),
(136, 54, 'jp', 'Barneys New York', 'barneys-new-york-54', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:44:43', '2015-10-19 13:44:43'),
(137, 54, 'vi', 'Barneys New York', 'barneys-new-york-54', 'Ui & Ux Design, Planning, Technical Planning,', '', '2015-10-19 13:44:43', '2015-10-19 13:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE IF NOT EXISTS `static_pages` (
  `id` int(10) unsigned NOT NULL,
  `is_active` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `feauture_image` text COLLATE utf8_unicode_ci NOT NULL,
  `author_id` text COLLATE utf8_unicode_ci NOT NULL,
  `properties` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`id`, `is_active`, `order`, `feauture_image`, `author_id`, `properties`, `created_at`, `updated_at`) VALUES
(11, 1, 0, '', '1', '', '2015-10-11 23:43:14', '2015-10-11 23:59:53'),
(12, 1, 0, '', '1', '', '2015-10-19 13:24:56', '2015-10-19 13:24:56'),
(13, 1, 0, '', '1', '', '2015-10-19 13:25:42', '2015-10-19 13:25:42'),
(14, 1, 0, '', '1', '', '2015-10-19 16:59:37', '2015-10-19 16:59:37'),
(15, 1, 0, '', '1', '', '2015-10-20 23:52:39', '2015-10-20 23:52:39'),
(16, 1, 0, '', '1', '', '2015-10-20 23:54:34', '2015-10-20 23:54:34'),
(17, 1, 0, '', '1', '', '2015-10-21 00:03:56', '2015-10-21 00:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `static_page_datas`
--

CREATE TABLE IF NOT EXISTS `static_page_datas` (
  `id` int(10) unsigned NOT NULL,
  `static_page_id` int(10) unsigned NOT NULL,
  `language_code` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_alias` text COLLATE utf8_unicode_ci NOT NULL,
  `page_title` text COLLATE utf8_unicode_ci NOT NULL,
  `page_contents` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `static_page_datas`
--

INSERT INTO `static_page_datas` (`id`, `static_page_id`, `language_code`, `page_alias`, `page_title`, `page_contents`, `created_at`, `updated_at`) VALUES
(8, 11, 'vi', 'what-is-offshore-development-11', 'What is offshore  development?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit, sed do eiusmod tempor ', '2015-10-11 23:43:14', '2015-10-19 13:23:16'),
(9, 11, 'en', 'what-is-offshore-development-11', 'What is offshore  development?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit, sed do eiusmod tempor ', '2015-10-11 23:43:14', '2015-10-19 13:23:16'),
(10, 11, 'jp', '11', 'オフショア開発とは何ですか？', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ', '2015-10-11 23:43:14', '2015-10-19 13:23:16'),
(11, 12, 'vi', 'laboratory-12', 'Laboratory', '<p class="text_content">Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore \r\nmagna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco\r\n laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor \r\nin reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla \r\npariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa \r\nqui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit </p>', '2015-10-19 13:24:56', '2015-10-19 13:24:56'),
(12, 12, 'en', 'laboratory-12', 'Laboratory', '<p class="text_content">Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore \r\nmagna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco\r\n laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor \r\nin reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla \r\npariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa \r\nqui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit </p>', '2015-10-19 13:24:56', '2015-10-19 13:24:56'),
(13, 12, 'jp', '12', 'ラボラトリー', '<p class="text_content">Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore \r\nmagna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco\r\n laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor \r\nin reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla \r\npariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa \r\nqui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit </p>', '2015-10-19 13:24:56', '2015-10-19 13:24:56'),
(14, 13, 'vi', 'package-13', 'Package', '<p class="text_content">Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore \r\nmagna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco\r\n laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor \r\nin reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla \r\npariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa \r\nqui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit </p>', '2015-10-19 13:25:42', '2015-10-19 13:25:42'),
(15, 13, 'en', 'package-13', 'Package', '<p class="text_content">Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore \r\nmagna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco\r\n laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor \r\nin reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla \r\npariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa \r\nqui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit </p>', '2015-10-19 13:25:42', '2015-10-19 13:25:42'),
(16, 13, 'jp', '13', 'パッケージ', '<p class="text_content">Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore \r\nmagna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco\r\n laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor \r\nin reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla \r\npariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa \r\nqui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit </p>', '2015-10-19 13:25:42', '2015-10-19 13:25:42'),
(17, 14, 'vi', 'privacy-policy-14', '  Privacy policy', '<div class="privacy_content_above">          <p>Asian Tech inc.（以下「当社」といいます。）は個人情報保護を当社の重要な社会的責務と認識し、当社が提供するインターネットサイト「Asian Tech」に係るサービス（以下「本サービス」といいます）を本サービスを利用する方（以下「ユーザ」といいます）が 安心してご利用いただける環境を構築するため、当社が保有する個人情報を適切に管理運用するために遵守するべき基本的事項として本保護方針を以下の通り定めます</p>        </div>        <div class="privacy_content_below">          <h4 class="block">第１条　個人情報とは</h4>          <p>本サービスにおいて、住所・氏名・電話番号・電子メールアドレス、銀行口座番号などユーザ個人を識別できる情報を指します。</p>          <h4 class="block">第２条　個人情報の取得・利用目的</h4>          <p>本サービスにおいて、当社は以下の目的のため、個人情報を適法かつ公正な手段で取得・利用させていただきます。当社は、ユーザ本人の同意がある場合を除き、以下の目的達成に必要な範囲を超えて、取得した個人情報を利用しません。</p>          <ul>            <li>（１） 本サービスを提供・運営・管理等するため</li>            <li>（２） 本サービスを安心してご利用いただける環境整備等のため</li>            <li>（３） 本サービス、その他当社のサービスについての調査・データ集積・分析・サービス向上等のため</li>            <li>（４） 当社又は当社と提携する第三者のサービスの新サービスやおすすめ情報などのご案内・情報等を送信・送付等するため</li>            <li>（５） 当社とユーザの間での必要な連絡等を行うため</li>            <li>（６） その他、ユーザの同意を得た目的のため</li>            <li>（７） 上記（１）から（６）に附随する目的のため</li>          </ul>          <h4 class="block">第３条　個人情報の共有及び第三者への提供</h4>          <p>当社は、以下のいずれかに該当する場合に限り、法令の範囲内で、個人情報を第三者に提供する場合があります。</p>          <ul>            <li>              ・ユーザ本人の同意がある場合（本サービスを利用してユーザが取引を行う場合の相手方に対する個人情報の開示については、ユーザの同意があるものとみなされます）            </li>            <li>              ・個人を識別し得ない「統計データ」として開示する場合            </li>            <li>              ・申し出が、裁判所、検察庁、もしくは行政機関の命令に基づく場合、または警察等の公的機関もしくはそれらの委託を受けた者より、開示請求を受領した場合。            </li>            <li>              ・第三者に対し、本サービスの運営に必要な業務の一部もしくは一切を委託する場合。            </li>            <li>              ・生命や財産に危機が生じ、緊急に開示する必要があり、当該ユーザの同意を得るのが困難な場合。            </li>          </ul>          <h4 class="block">第４条　個人情報の確認・訂正・削除</h4>          <p>当社は、ユーザ本人から個人情報の確認、内容の訂正・追加・削除を求められた場合には適切にこれに対応します。</p>          <h4 class="block">第５条　個人情報の改定</h4>          <p>本保護方針は、当社の判断によりユーザの同意なしに全部又は一部の改訂を行うことができるものとし、本保護方針改訂後にユーザが本サービスを利用した場合には、当該改訂に同意したものとみなします。 重要な変更がある場合については本サービス上でお知らせいたします。          </p>        </div>', '2015-10-19 16:59:37', '2015-10-19 16:59:37'),
(18, 14, 'en', 'privacy-policy-14', '  Privacy policy', '<div class="privacy_content_above">          <p>Asian Tech inc.（以下「当社」といいます。）は個人情報保護を当社の重要な社会的責務と認識し、当社が提供するインターネットサイト「Asian Tech」に係るサービス（以下「本サービス」といいます）を本サービスを利用する方（以下「ユーザ」といいます）が 安心してご利用いただける環境を構築するため、当社が保有する個人情報を適切に管理運用するために遵守するべき基本的事項として本保護方針を以下の通り定めます</p>        </div>        <div class="privacy_content_below">          <h4 class="block">第１条　個人情報とは</h4>          <p>本サービスにおいて、住所・氏名・電話番号・電子メールアドレス、銀行口座番号などユーザ個人を識別できる情報を指します。</p>          <h4 class="block">第２条　個人情報の取得・利用目的</h4>          <p>本サービスにおいて、当社は以下の目的のため、個人情報を適法かつ公正な手段で取得・利用させていただきます。当社は、ユーザ本人の同意がある場合を除き、以下の目的達成に必要な範囲を超えて、取得した個人情報を利用しません。</p>          <ul>            <li>（１） 本サービスを提供・運営・管理等するため</li>            <li>（２） 本サービスを安心してご利用いただける環境整備等のため</li>            <li>（３） 本サービス、その他当社のサービスについての調査・データ集積・分析・サービス向上等のため</li>            <li>（４） 当社又は当社と提携する第三者のサービスの新サービスやおすすめ情報などのご案内・情報等を送信・送付等するため</li>            <li>（５） 当社とユーザの間での必要な連絡等を行うため</li>            <li>（６） その他、ユーザの同意を得た目的のため</li>            <li>（７） 上記（１）から（６）に附随する目的のため</li>          </ul>          <h4 class="block">第３条　個人情報の共有及び第三者への提供</h4>          <p>当社は、以下のいずれかに該当する場合に限り、法令の範囲内で、個人情報を第三者に提供する場合があります。</p>          <ul>            <li>              ・ユーザ本人の同意がある場合（本サービスを利用してユーザが取引を行う場合の相手方に対する個人情報の開示については、ユーザの同意があるものとみなされます）            </li>            <li>              ・個人を識別し得ない「統計データ」として開示する場合            </li>            <li>              ・申し出が、裁判所、検察庁、もしくは行政機関の命令に基づく場合、または警察等の公的機関もしくはそれらの委託を受けた者より、開示請求を受領した場合。            </li>            <li>              ・第三者に対し、本サービスの運営に必要な業務の一部もしくは一切を委託する場合。            </li>            <li>              ・生命や財産に危機が生じ、緊急に開示する必要があり、当該ユーザの同意を得るのが困難な場合。            </li>          </ul>          <h4 class="block">第４条　個人情報の確認・訂正・削除</h4>          <p>当社は、ユーザ本人から個人情報の確認、内容の訂正・追加・削除を求められた場合には適切にこれに対応します。</p>          <h4 class="block">第５条　個人情報の改定</h4>          <p>本保護方針は、当社の判断によりユーザの同意なしに全部又は一部の改訂を行うことができるものとし、本保護方針改訂後にユーザが本サービスを利用した場合には、当該改訂に同意したものとみなします。 重要な変更がある場合については本サービス上でお知らせいたします。          </p>        </div>', '2015-10-19 16:59:37', '2015-10-19 16:59:37'),
(19, 14, 'jp', 'privacy-policy-14', '  Privacy policy', '<div class="privacy_content_above">\r\n          <p>Asian Tech inc.（以下「当社」といいます。）は個人情報保護を当社の重要な社会的責務と認識し、当社が提供するインターネットサイト「Asian Tech」に係るサービス（以下「本サービス」といいます）を本サービスを利用する方（以下「ユーザ」といいます）が 安心してご利用いただける環境を構築するため、当社が保有する個人情報を適切に管理運用するために遵守するべき基本的事項として本保護方針を以下の通り定めます</p>\r\n        </div>\r\n        <div class="privacy_content_below">\r\n          <h4 class="block">第１条　個人情報とは</h4>\r\n          <p>本サービスにおいて、住所・氏名・電話番号・電子メールアドレス、銀行口座番号などユーザ個人を識別できる情報を指します。</p>\r\n          <h4 class="block">第２条　個人情報の取得・利用目的</h4>\r\n          <p>本サービスにおいて、当社は以下の目的のため、個人情報を適法かつ公正な手段で取得・利用させていただきます。当社は、ユーザ本人の同意がある場合を除き、以下の目的達成に必要な範囲を超えて、取得した個人情報を利用しません。</p>\r\n          <ul>\r\n            <li>（１） 本サービスを提供・運営・管理等するため</li>\r\n            <li>（２） 本サービスを安心してご利用いただける環境整備等のため</li>\r\n            <li>（３） 本サービス、その他当社のサービスについての調査・データ集積・分析・サービス向上等のため</li>\r\n            <li>（４） 当社又は当社と提携する第三者のサービスの新サービスやおすすめ情報などのご案内・情報等を送信・送付等するため</li>\r\n            <li>（５） 当社とユーザの間での必要な連絡等を行うため</li>\r\n            <li>（６） その他、ユーザの同意を得た目的のため</li>\r\n            <li>（７） 上記（１）から（６）に附随する目的のため</li>\r\n          </ul>\r\n          <h4 class="block">第３条　個人情報の共有及び第三者への提供</h4>\r\n          <p>当社は、以下のいずれかに該当する場合に限り、法令の範囲内で、個人情報を第三者に提供する場合があります。</p>\r\n          <ul>\r\n            <li>\r\n              ・ユーザ本人の同意がある場合（本サービスを利用してユーザが取引を行う場合の相手方に対する個人情報の開示については、ユーザの同意があるものとみなされます）\r\n            </li>\r\n            <li>\r\n              ・個人を識別し得ない「統計データ」として開示する場合\r\n            </li>\r\n            <li>\r\n              ・申し出が、裁判所、検察庁、もしくは行政機関の命令に基づく場合、または警察等の公的機関もしくはそれらの委託を受けた者より、開示請求を受領した場合。\r\n            </li>\r\n            <li>\r\n              ・第三者に対し、本サービスの運営に必要な業務の一部もしくは一切を委託する場合。\r\n            </li>\r\n            <li>\r\n              ・生命や財産に危機が生じ、緊急に開示する必要があり、当該ユーザの同意を得るのが困難な場合。\r\n            </li>\r\n          </ul>\r\n          <h4 class="block">第４条　個人情報の確認・訂正・削除</h4>\r\n          <p>当社は、ユーザ本人から個人情報の確認、内容の訂正・追加・削除を求められた場合には適切にこれに対応します。</p>\r\n          <h4 class="block">第５条　個人情報の改定</h4>\r\n          <p>本保護方針は、当社の判断によりユーザの同意なしに全部又は一部の改訂を行うことができるものとし、本保護方針改訂後にユーザが本サービスを利用した場合には、当該改訂に同意したものとみなします。 重要な変更がある場合については本サービス上でお知らせいたします。\r\n          </p>\r\n        </div>', '2015-10-19 16:59:37', '2015-10-19 16:59:37'),
(20, 15, 'en', 'about-service-15', 'About service', 'We at AsianTech want to be at the forefront of the IT revolution in \r\nVietnam. Our engineers work not only for professional and technological \r\ndevelopment, but also aspire to be part of an internationally expanding \r\neconomy that is shaping the future of their country.\r\n                        <br>At our current speed of growth, we see \r\nourselves to be the biggest and most successful company in Vietnam by \r\n2020. But for us, it’s about more than just numbers. We want to create a\r\n dynamic environment where all our employees have the opportunity to \r\nexpand their horizons globally and to use their experience at AsianTech \r\nto shape their career path, wherever it may lead.', '2015-10-20 23:52:40', '2015-10-20 23:52:40'),
(21, 15, 'jp', 'about-service-15', 'About service', 'We at AsianTech want to be at the forefront of the IT revolution in \r\nVietnam. Our engineers work not only for professional and technological \r\ndevelopment, but also aspire to be part of an internationally expanding \r\neconomy that is shaping the future of their country.\r\n                        <br>At our current speed of growth, we see \r\nourselves to be the biggest and most successful company in Vietnam by \r\n2020. But for us, it’s about more than just numbers. We want to create a\r\n dynamic environment where all our employees have the opportunity to \r\nexpand their horizons globally and to use their experience at AsianTech \r\nto shape their career path, wherever it may lead.', '2015-10-20 23:52:40', '2015-10-20 23:52:40'),
(22, 16, 'en', 'why-vietnam-16', 'Why Vietnam?', '<p class="text_information">Soon to be south-east Asia’s fastest growing\r\n economy, scientific development and application has become one of \r\nVietnam’s top national priorities. With a youthful average population \r\nage of 28 and an abundant supply of skilled labour, the country has put \r\nthe development of quality human resources with scientific and \r\ntechnological advances as a top priority. Vietnam enjoys major \r\ngovernment sponsorship and investment in the IT sector; with many \r\nmultinational companies such as Microsoft, IBM and Sony already \r\noutsourcing here, it has built a strong reputation for safe, reliable \r\nand cost-effective business. </p>', '2015-10-20 23:54:34', '2015-10-20 23:54:34'),
(23, 16, 'jp', 'why-vietnam-16', 'Why Vietnam?', '<p class="text_information">Soon to be south-east Asia’s fastest growing\r\n economy, scientific development and application has become one of \r\nVietnam’s top national priorities. With a youthful average population \r\nage of 28 and an abundant supply of skilled labour, the country has put \r\nthe development of quality human resources with scientific and \r\ntechnological advances as a top priority. Vietnam enjoys major \r\ngovernment sponsorship and investment in the IT sector; with many \r\nmultinational companies such as Microsoft, IBM and Sony already \r\noutsourcing here, it has built a strong reputation for safe, reliable \r\nand cost-effective business. </p>', '2015-10-20 23:54:34', '2015-10-20 23:54:34'),
(24, 17, 'en', 'message-from-the-ceo-17', 'Message from the CEO', '<h2 class="name_ceo">Truong Dinh Hoang</h2>                <i class="icons_caret">&nbsp;</i>                    <h3 class="title_text">What is the key to AsianTech’s success?</h3>                <div class="success_key">                    <p class="content_text">Our principle is simple - our people are our greatest assets. We all work together as one big AsianTech family. How can every employee grow to his or her maximum potential? How can the lives of all the employees’ families be improved? It is with these questions in mind that I enter the office everyday.                        <br> The answers to these questions are what fuels engineer motivation and drives every project at AsianTech forward. We want to engage with our clients both professionally and personally, working on every project together as a team, step-by-step. This is the way in which we treat our clients’ ideas as our own and complete the development process from start to finish with great care and pride. These values will remain at the heart of every AsianTech engineer for years to come: we never want to stop learning and growing.</p>                </div>                <div class="work_experience">                    <i class="icons_caret">&nbsp;</i>                    <h3 class="title_text">How has your experience in Japan influenced your work at AsianTech?</h3>                    <p class="content_text">My 10 years’ experience living in Japan, 8 of which I worked at a Japanese IT company, were invaluable to the development of the AsianTech ethos.                        <br>What inspired me daily whilst working alongside my Japanese colleagues is that they always work with the greatest pride and professionalism, no matter how small or insignificant the task. However, there were problems that I encountered daily, too. The inefficiency and ineffectiveness of management methods wasted a lot of skilled resources, further accentuated by the lack of professional and skilled engineers in Japan in the first place.                        <br>In my management of AsianTech, I want to inspire the Vietnamese engineers with the hard work, professionalism and eye for detail of the Japanese working style. But more importantly, I want every engineer to combine these qualities with their world class technological skills and with their inherent passion for learning and self-development. </p>                </div>', '2015-10-21 00:03:56', '2015-10-21 00:03:56'),
(25, 17, 'jp', 'message-from-the-ceo-17', 'Message from the CEO', '<h2 class="name_ceo">Truong Dinh Hoang</h2>\r\n                <i class="icons_caret">&nbsp;</i>\r\n                    <h3 class="title_text">What is the key to AsianTech’s success?</h3>\r\n                <div class="success_key">\r\n                    <p class="content_text">Our principle is simple - our people are our greatest assets. We all work together as one big AsianTech family. How can every employee grow to his or her maximum potential? How can the lives of all the employees’ families be improved? It is with these questions in mind that I enter the office everyday.\r\n                        <br /> The answers to these questions are what fuels engineer motivation and drives every project at AsianTech forward. We want to engage with our clients both professionally and personally, working on every project together as a team, step-by-step. This is the way in which we treat our clients’ ideas as our own and complete the development process from start to finish with great care and pride. These values will remain at the heart of every AsianTech engineer for years to come: we never want to stop learning and growing.</p>\r\n                </div>\r\n                <div class="work_experience">\r\n                    <i class="icons_caret">&nbsp;</i>\r\n                    <h3 class="title_text">How has your experience in Japan influenced your work at AsianTech?</h3>\r\n                    <p class="content_text">My 10 years’ experience living in Japan, 8 of which I worked at a Japanese IT company, were invaluable to the development of the AsianTech ethos.\r\n                        <br />What inspired me daily whilst working alongside my Japanese colleagues is that they always work with the greatest pride and professionalism, no matter how small or insignificant the task. However, there were problems that I encountered daily, too. The inefficiency and ineffectiveness of management methods wasted a lot of skilled resources, further accentuated by the lack of professional and skilled engineers in Japan in the first place.\r\n                        <br />In my management of AsianTech, I want to inspire the Vietnamese engineers with the hard work, professionalism and eye for detail of the Japanese working style. But more importantly, I want every engineer to combine these qualities with their world class technological skills and with their inherent passion for learning and self-development. </p>\r\n                </div>', '2015-10-21 00:03:56', '2015-10-21 00:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(10) unsigned NOT NULL,
  `team_name` text COLLATE utf8_unicode_ci NOT NULL,
  `images` text COLLATE utf8_unicode_ci NOT NULL,
  `properties` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `images`, `properties`, `created_at`, `updated_at`) VALUES
(3, 'PHP', '80b7d2f06eaa750df6cb742e8d369b18c916dfc8.png', '', '2015-10-19 14:56:22', '2015-10-19 14:56:22'),
(4, 'PHP', '4ffd36516dd6684c59feca0334b5cadc2fb6ffe0.png', '', '2015-10-19 14:56:23', '2015-10-19 14:56:23'),
(5, 'PHP', '566e68d3b5fe8767d1cd117029fca0e7af04db4d.png', '', '2015-10-19 14:56:24', '2015-10-19 14:56:24'),
(6, 'PHP', '566e68d3b5fe8767d1cd117029fca0e7af04db4d.png', '', '2015-10-19 14:56:24', '2015-10-19 14:56:24'),
(7, 'PHP', '4c3cfda2ae49e1ac8f46862b69aba5ad418eb141.png', '', '2015-10-19 14:56:25', '2015-10-19 14:56:25'),
(8, 'PHP', '8cf8fd7a1990779ebb3fb99fe166466e09a2a86b.png', '', '2015-10-19 14:56:26', '2015-10-19 14:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE IF NOT EXISTS `timelines` (
  `id` int(10) unsigned NOT NULL,
  `time_sheet` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(10) unsigned NOT NULL,
  `properties` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `timelines`
--

INSERT INTO `timelines` (`id`, `time_sheet`, `order`, `properties`, `created_at`, `updated_at`) VALUES
(27, '10/01/2013', 7, '', '2015-10-19 09:35:21', '2015-10-29 08:21:46'),
(28, '11/15/2013', 3, '', '2015-10-19 09:36:02', '2015-10-29 08:21:46'),
(29, '10/21/2015', 5, '', '2015-10-21 01:41:44', '2015-10-29 08:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `timeline_details`
--

CREATE TABLE IF NOT EXISTS `timeline_details` (
  `id` int(10) unsigned NOT NULL,
  `timeline_id` int(10) unsigned NOT NULL,
  `language_code` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `timeline_details`
--

INSERT INTO `timeline_details` (`id`, `timeline_id`, `language_code`, `content`, `created_at`, `updated_at`) VALUES
(44, 27, 'en', 'OK Web Services Development tantou', '2015-10-19 09:35:21', '2015-10-19 09:35:21'),
(45, 27, 'jp', 'OK Web Services Development tantou', '2015-10-19 09:35:21', '2015-10-19 09:35:21'),
(46, 27, 'vi', 'OK Web Services Development tantou', '2015-10-19 09:35:21', '2015-10-19 09:35:21'),
(47, 28, 'en', 'Company was born in Ho Chi Minh', '2015-10-19 09:36:02', '2015-10-19 09:36:02'),
(48, 28, 'jp', 'Company was born in Ho Chi Minh', '2015-10-19 09:36:02', '2015-10-19 09:36:02'),
(49, 28, 'vi', 'Company was born in Ho Chi Minh', '2015-10-19 09:36:02', '2015-10-19 09:36:02'),
(50, 29, 'en', ' fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd  fafd ', '2015-10-21 01:41:44', '2015-10-21 01:41:44'),
(51, 29, 'jp', ' ', '2015-10-21 01:41:44', '2015-10-21 01:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Võ Quốc Nguyên', 'abc@abc.com', '$2y$10$QYVV1wcTwoTK5dUquNvXueCxLYe8Kif0crP4GMOoICpe5fGxrKj3y', 0, 'R6fjZVvXxD9OnvtafshFbK46rYgFEsn4Zqs9kvXVnqDxT5wv58M40o7ogNfF', '2015-10-07 08:09:17', '2015-10-22 05:59:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_languages`
--
ALTER TABLE `app_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_blogs`
--
ALTER TABLE `category_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_blogs_data`
--
ALTER TABLE `category_blogs_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_blogs_data_category_blogs_id_foreign` (`category_blogs_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_details`
--
ALTER TABLE `member_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_details_member_id_foreign` (`member_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_datas`
--
ALTER TABLE `post_datas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_datas_post_id_foreign` (`post_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_details`
--
ALTER TABLE `service_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_details_service_id_foreign` (`service_id`);

--
-- Indexes for table `static_pages`
--
ALTER TABLE `static_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_page_datas`
--
ALTER TABLE `static_page_datas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `static_page_datas_static_page_id_foreign` (`static_page_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timelines`
--
ALTER TABLE `timelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeline_details`
--
ALTER TABLE `timeline_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timeline_details_timeline_id_foreign` (`timeline_id`);

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
-- AUTO_INCREMENT for table `app_languages`
--
ALTER TABLE `app_languages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category_blogs`
--
ALTER TABLE `category_blogs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `category_blogs_data`
--
ALTER TABLE `category_blogs_data`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `member_details`
--
ALTER TABLE `member_details`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post_datas`
--
ALTER TABLE `post_datas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `service_details`
--
ALTER TABLE `service_details`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `static_pages`
--
ALTER TABLE `static_pages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `static_page_datas`
--
ALTER TABLE `static_page_datas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `timeline_details`
--
ALTER TABLE `timeline_details`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_blogs_data`
--
ALTER TABLE `category_blogs_data`
  ADD CONSTRAINT `category_blogs_data_category_blogs_id_foreign` FOREIGN KEY (`category_blogs_id`) REFERENCES `category_blogs` (`id`);

--
-- Constraints for table `member_details`
--
ALTER TABLE `member_details`
  ADD CONSTRAINT `member_details_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `post_datas`
--
ALTER TABLE `post_datas`
  ADD CONSTRAINT `post_datas_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `service_details`
--
ALTER TABLE `service_details`
  ADD CONSTRAINT `service_details_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `static_page_datas`
--
ALTER TABLE `static_page_datas`
  ADD CONSTRAINT `static_page_datas_static_page_id_foreign` FOREIGN KEY (`static_page_id`) REFERENCES `static_pages` (`id`);

--
-- Constraints for table `timeline_details`
--
ALTER TABLE `timeline_details`
  ADD CONSTRAINT `timeline_details_timeline_id_foreign` FOREIGN KEY (`timeline_id`) REFERENCES `timelines` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
