-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2019 at 12:45 PM
-- Server version: 5.7.28-0ubuntu0.16.04.2
-- PHP Version: 7.2.11-4+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_23_154451_laratrust_setup_tables', 1),
(4, '2018_03_10_065149_create_site_settings_table', 1),
(5, '2018_03_10_111754_create_sliders_table', 1),
(6, '2019_03_23_004509_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Users Create', 'Users Create', '2019-12-02 00:26:30', '2019-12-02 00:26:30'),
(2, 'users-read', 'Users Read', 'Users Read', '2019-12-02 00:26:30', '2019-12-02 00:26:30'),
(3, 'users-update', 'Users Update', 'Users Update', '2019-12-02 00:26:30', '2019-12-02 00:26:30'),
(4, 'users-delete', 'Users Delete', 'Users Delete', '2019-12-02 00:26:30', '2019-12-02 00:26:30'),
(5, 'permissions-create', 'Permissions Create', 'Permissions Create', '2019-12-02 00:26:30', '2019-12-02 00:26:30'),
(6, 'permissions-read', 'Permissions Read', 'Permissions Read', '2019-12-02 00:26:30', '2019-12-02 00:26:30'),
(7, 'permissions-update', 'Permissions Update', 'Permissions Update', '2019-12-02 00:26:30', '2019-12-02 00:26:30'),
(8, 'permissions-delete', 'Permissions Delete', 'Permissions Delete', '2019-12-02 00:26:30', '2019-12-02 00:26:30'),
(9, 'roles-create', 'Roles Create', 'Roles Create', '2019-12-02 00:26:30', '2019-12-02 00:26:30'),
(10, 'roles-read', 'Roles Read', 'Roles Read', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(11, 'roles-update', 'Roles Update', 'Roles Update', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(12, 'roles-delete', 'Roles Delete', 'Roles Delete', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(13, 'profile-read', 'Profile Read', 'Profile Read', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(14, 'profile-update', 'Profile Update', 'Profile Update', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(15, 'settings-create', 'Settings Create', 'Settings Create', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(16, 'settings-read', 'Settings Read', 'Settings Read', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(17, 'settings-update', 'Settings Update', 'Settings Update', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(18, 'settings-delete', 'Settings Delete', 'Settings Delete', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(19, 'site-settings-create', 'Site-settings Create', 'Site-settings Create', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(20, 'site-settings-read', 'Site-settings Read', 'Site-settings Read', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(21, 'site-settings-update', 'Site-settings Update', 'Site-settings Update', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(22, 'site-settings-delete', 'Site-settings Delete', 'Site-settings Delete', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(23, 'sliders-create', 'Sliders Create', 'Sliders Create', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(24, 'sliders-read', 'Sliders Read', 'Sliders Read', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(25, 'sliders-update', 'Sliders Update', 'Sliders Update', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(26, 'sliders-delete', 'Sliders Delete', 'Sliders Delete', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(27, 'schools-create', 'Schools Create', 'Schools Create', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(28, 'schools-read', 'Schools Read', 'Schools Read', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(29, 'schools-update', 'Schools Update', 'Schools Update', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(30, 'schools-delete', 'Schools Delete', 'Schools Delete', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(31, 'disciplines-create', 'Disciplines Create', 'Disciplines Create', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(32, 'disciplines-read', 'Disciplines Read', 'Disciplines Read', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(33, 'disciplines-update', 'Disciplines Update', 'Disciplines Update', '2019-12-02 00:26:31', '2019-12-02 00:26:31'),
(34, 'disciplines-delete', 'Disciplines Delete', 'Disciplines Delete', '2019-12-02 00:26:31', '2019-12-02 00:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `logo_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `type` enum('homepage_banner','testimonial','content','news','school_partner','recruiter_partner','student_partner','school_partner_service','recruiter_partner_service','student_partner_service','steps','teacher','courses','packages','services','pages') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `excerpt`, `image`, `logo_image`, `type`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Banner 1', NULL, 'Kids Are The Best <span>Explorers In The World</span>', '1QPckmXujEeKCCiWkTJw1S8ivnNY63GEPvwNTntI.jpeg', '', 'homepage_banner', 'banner-1', '2019-12-02 02:08:10', '2019-12-02 02:22:52'),
(2, 'Certified Teacher', NULL, 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', NULL, '', 'content', 'certified-teacher', '2019-12-02 02:56:05', '2019-12-02 02:56:05'),
(3, 'Special Education', NULL, 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', NULL, '', 'content', 'special-education', '2019-12-02 02:57:57', '2019-12-02 02:57:57'),
(4, 'Book & Library', NULL, 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', NULL, '', 'content', 'book-library', '2019-12-02 02:59:03', '2019-12-02 02:59:03'),
(5, 'Certification', NULL, 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', NULL, '', 'content', 'certification', '2019-12-02 02:59:59', '2019-12-02 02:59:59'),
(6, 'What We Offer', NULL, 'On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.', NULL, '', 'content', 'what-we-offer', '2019-12-02 03:06:57', '2019-12-02 03:06:57'),
(7, 'Welcome to Kiddos Learning School', NULL, 'On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.\r\n\r\nSeparated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. And if she hasn’t been rewritten, then they are still using her.', NULL, '', 'content', 'welcome-to-kiddos-learning-school', '2019-12-02 04:43:39', '2019-12-02 04:43:39'),
(8, 'Teaching Your Child Some Good Manners', NULL, 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'J1yQLvaQJkkjNxICKWNlTogm3kOsFKt4PtVkP6Cf.jpeg', '', 'content', 'teaching-your-child-some-good-manners', '2019-12-02 04:48:00', '2019-12-02 04:53:05'),
(9, 'Certified Teachers', NULL, 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country', NULL, '', 'content', 'certified-teachers-2', '2019-12-02 04:54:25', '2019-12-02 04:54:25'),
(10, 'Bianca Wilson', 'I am an ambitious workaholic, but apart from that, pretty simple person.', 'TEACHER', NULL, NULL, 'teacher', 'bianca-wilson', '2019-12-02 05:18:13', '2019-12-02 05:18:13'),
(11, 'Mitch Parker', 'I am an ambitious workaholic, but apart from that, pretty simple person.', 'ENGLISH TEACHER', NULL, NULL, 'teacher', 'mitch-parker', '2019-12-02 05:25:42', '2019-12-02 05:25:42'),
(12, 'Stella Smith', 'I am an ambitious workaholic, but apart from that, pretty simple person.', 'ART TEACHER', NULL, NULL, 'teacher', 'stella-smith', '2019-12-02 05:26:17', '2019-12-02 05:26:17'),
(13, 'Monshe Henderson', 'I am an ambitious workaholic, but apart from that, pretty simple person.', 'SCIENCE TEACHER', NULL, NULL, 'teacher', 'monshe-henderson', '2019-12-02 05:26:49', '2019-12-02 05:26:49'),
(14, 'Our Courses', NULL, 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country', NULL, '', 'content', 'our-courses', '2019-12-02 05:29:55', '2019-12-02 05:29:55'),
(15, 'Arts Lesson', 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country', 'Class time: 9:00am - 10am', NULL, NULL, 'courses', 'arts-lesson', '2019-12-02 06:20:59', '2019-12-02 06:20:59'),
(16, 'Language Lesson', 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country', 'Class time: 9:00am - 10am', NULL, NULL, 'courses', 'language-lesson', '2019-12-02 06:30:39', '2019-12-02 06:30:39'),
(17, 'Music Lesson', 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country<br>', 'Class time: 9:00am - 10am', NULL, NULL, 'courses', 'music-lesson', '2019-12-02 06:31:35', '2019-12-02 06:31:35'),
(18, 'Sports Lesson', 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country', 'Class time: 9:00am - 10am', NULL, NULL, 'courses', 'sports-lesson', '2019-12-02 06:32:07', '2019-12-02 06:32:07'),
(19, '20 Years of Experience', '<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">\r\n                            <div class="block-18">\r\n                                <div class="icon"><span class="flaticon-doctor"></span></div>\r\n                                <div class="text">\r\n                                    <strong class="number" data-number="18">0</strong>\r\n                                    <span>Certified Teachers</span>\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">\r\n                            <div class="block-18">\r\n                                <div class="icon"><span class="flaticon-doctor"></span></div>\r\n                                <div class="text">\r\n                                    <strong class="number" data-number="351">0</strong>\r\n                                    <span>Successful Kids</span>\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">\r\n                            <div class="block-18">\r\n                                <div class="icon"><span class="flaticon-doctor"></span></div>\r\n                                <div class="text">\r\n                                    <strong class="number" data-number="564">0</strong>\r\n                                    <span>Happy Parents</span>\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">\r\n                            <div class="block-18">\r\n                                <div class="icon"><span class="flaticon-doctor"></span></div>\r\n                                <div class="text">\r\n                                    <strong class="number" data-number="300">0</strong>\r\n                                    <span>Awards Won</span>\r\n                                </div>\r\n                            </div>\r\n                        </div>', 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country', NULL, '', 'content', '20-years-of-experience', '2019-12-02 06:53:08', '2019-12-02 07:17:30'),
(20, 'What Parents Says About Us', NULL, 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country', NULL, '', 'content', 'what-parents-says-about-us', '2019-12-02 07:20:02', '2019-12-02 07:20:02'),
(21, 'Racky Henderson', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'Father', NULL, '', 'testimonial', 'racky-henderson', '2019-12-02 07:26:12', '2019-12-02 07:26:12'),
(22, 'Henry Dee', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'Mother', NULL, '', 'testimonial', 'henry-dee', '2019-12-02 07:27:03', '2019-12-02 07:27:03'),
(23, 'Henry Dee', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'Mother', NULL, '', 'testimonial', 'henry-dee-2', '2019-12-02 07:33:02', '2019-12-02 07:33:02'),
(24, 'Request Quote Image', NULL, NULL, 'gs8tNZoouOsX2NyHs62XnR9rSjrqKYjjBXNjryo0.jpeg', '', 'content', 'request-quote-image', '2019-12-02 07:45:33', '2019-12-02 07:45:33'),
(25, 'Basic', NULL, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, NULL, 'packages', 'basic', '2019-12-02 08:33:24', '2019-12-02 08:33:24'),
(26, 'Standard', NULL, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, NULL, 'packages', 'standard', '2019-12-02 08:34:21', '2019-12-02 08:34:21'),
(27, 'Premium', NULL, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, NULL, 'packages', 'premium', '2019-12-02 08:34:45', '2019-12-02 08:34:45'),
(28, 'Platinum', NULL, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, NULL, 'packages', 'platinum', '2019-12-02 08:39:51', '2019-12-02 08:39:51'),
(29, 'Skills To Develop Your Child Memory', NULL, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, '', 'news', 'skills-to-develop-your-child-memory', '2019-12-02 10:04:42', '2019-12-02 10:04:42'),
(31, 'Skills To Develop Your Child Memory', NULL, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, '', 'news', 'skills-to-develop-your-child-memory-2', '2019-12-02 10:05:24', '2019-12-02 10:05:24'),
(32, 'Skills To Develop Your Child Memory', NULL, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, '', 'news', 'skills-to-develop-your-child-memory-3', '2019-12-02 10:06:23', '2019-12-02 10:06:23'),
(33, 'Safety First', 'Far far away, behind the word mountains, far from the countries Vokalia.', 'fas fa-allergies', '', '', 'services', '', '2019-12-07 09:28:50', '2019-12-07 09:28:50'),
(35, 'Regular Classes', '<div><div><div>Far far away, behind the word mountains, far from the countries Vokalia.</div></div></div><div><div><div></div></div></div>', 'fab fa-affiliatetheme', '', '', 'services', 'regular-classes-2', '2019-12-07 09:33:03', '2019-12-07 09:33:03'),
(36, 'Certified Teachers', 'Far far away, behind the word mountains, far from the countries Vokalia.', 'fab fa-algolia', '', '', 'services', 'certified-teachers', '2019-12-07 10:04:49', '2019-12-07 10:04:49'),
(37, 'Sufficient Classrooms', 'Far far away, behind the word mountains, far from the countries Vokalia.', 'fab fa-accessible-icon', '', '', 'services', 'sufficient-classrooms', '2019-12-07 10:05:22', '2019-12-07 10:05:22'),
(38, 'Creative Lessons', 'Far far away, behind the word mountains, far from the countries Vokalia.', 'fab fa-affiliatetheme', '', '', 'services', 'creative-lessons', '2019-12-07 10:05:48', '2019-12-07 10:05:48'),
(39, 'Sports Facilities', 'Far far away, behind the word mountains, far from the countries Vokalia.', 'fas fa-air-freshener', '', '', 'services', 'sports-facilities', '2019-12-07 10:06:19', '2019-12-07 10:06:19'),
(40, 'About', NULL, NULL, 'fsCVeYoTj86AWFWca53cMaAPB6A1JK0C0DpA7PcW.jpeg', NULL, 'pages', 'about', '2019-12-07 12:11:31', '2019-12-07 12:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'Administrator', 'Administrator', '2019-12-02 00:26:30', '2019-12-02 00:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\Auth\\User'),
(1, 2, 'App\\Models\\Auth\\User');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `display_name`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Site title', 'site_title', 'Elitekod', '2019-12-02 02:00:13', '2019-12-02 02:00:13'),
(2, 'Meta keyword', 'meta_keyword', NULL, '2019-12-02 02:00:13', '2019-12-02 02:00:13'),
(3, 'Meta description', 'meta_description', NULL, '2019-12-02 02:00:13', '2019-12-02 02:00:13'),
(4, 'Contact details', 'contact_details', NULL, '2019-12-02 02:00:13', '2019-12-02 02:00:13'),
(5, 'Social fb', 'social_fb', NULL, '2019-12-02 02:00:13', '2019-12-02 02:00:13'),
(6, 'Social twitter', 'social_twitter', NULL, '2019-12-02 02:00:13', '2019-12-02 02:00:13'),
(7, 'Social youtube', 'social_youtube', NULL, '2019-12-02 02:00:13', '2019-12-02 02:00:13'),
(8, 'Social google', 'social_google', NULL, '2019-12-02 02:00:13', '2019-12-02 02:00:13'),
(9, 'Social instagram', 'social_instagram', NULL, '2019-12-02 02:00:13', '2019-12-02 02:00:13'),
(10, 'Social mail', 'social_mail', NULL, '2019-12-02 02:00:13', '2019-12-02 02:00:13'),
(11, 'Social phone', 'social_phone', '+ 1235 2355 98', '2019-12-02 02:00:13', '2019-12-07 10:49:20'),
(12, 'Opening time', 'opening_time', NULL, '2019-12-02 02:00:13', '2019-12-02 02:00:13'),
(13, 'Footer', 'footer', NULL, '2019-12-02 02:00:13', '2019-12-02 02:00:13'),
(14, 'Footer info', 'footer_info', NULL, '2019-12-02 02:00:13', '2019-12-02 02:00:13'),
(15, 'Copy right', 'copy_right', NULL, '2019-12-02 02:00:13', '2019-12-02 02:00:13'),
(16, 'Location', 'location', 'Shankhamul,Baneshwor', '2019-12-02 02:00:13', '2019-12-07 10:48:22'),
(17, 'Email', 'email', 'youremail@email.com', NULL, '2019-12-07 10:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'draft',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'image',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `image`, `link`, `title`, `status`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Gallery', 'JK2Le36KJ0YuZ5rTyyPaQn4J6wmf1TOFELvy2aTd.jpeg', NULL, NULL, 'published', 'image', '2019-12-06 22:43:10', '2019-12-06 22:42:28', '2019-12-06 22:43:10'),
(2, 'Gallery 1', NULL, NULL, NULL, 'published', 'image', NULL, '2019-12-06 22:43:21', '2019-12-06 22:48:02'),
(3, 'Gallery 2', NULL, NULL, NULL, 'published', 'image', NULL, '2019-12-06 22:43:33', '2019-12-06 22:43:33'),
(4, 'Gallery 3', NULL, NULL, NULL, 'published', 'image', NULL, '2019-12-06 22:43:41', '2019-12-06 22:48:12'),
(5, 'Gallery 4', NULL, NULL, NULL, 'published', 'image', NULL, '2019-12-06 22:43:50', '2019-12-06 22:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `status` enum('active','in-active') COLLATE utf8mb4_unicode_ci DEFAULT 'in-active',
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `company_registration_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `vat_pan_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `contact_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `contact_mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `password_change_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `status`, `phone_number`, `mobile_number`, `address`, `state`, `postal_code`, `city`, `country`, `website`, `company_name`, `company_registration_number`, `vat_pan_no`, `contact_name`, `contact_email`, `contact_phone_number`, `contact_mobile_number`, `password`, `password_reference`, `password_change_code`, `image`, `provider`, `provider_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', 'administrator', 'admin@applyglobal.com', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '$2y$10$llPV/W0SmaKF0bq3EaET7ulgWJ9H1Jel5PVER0mI9zyAOg0fLB49u', '', '', '', NULL, NULL, NULL, '2019-12-02 00:26:33', '2019-12-02 00:26:33', NULL),
(2, 'Administrator', 'bajraprabin100', 'bajraprabin100@gmail.com', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '$2y$10$3WS0m1qUvWHaUiI.FAdSX.iPYHrOM48VtvjxwEy0VzkvOp4Ck1.uq', '', '', '', NULL, NULL, NULL, '2019-12-02 00:26:33', '2019-12-02 00:26:33', NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
