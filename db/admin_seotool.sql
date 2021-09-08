-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2021 at 07:25 PM
-- Server version: 5.7.35
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_seotool`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_config`
--

CREATE TABLE `tbl_config` (
  `config_id` int(11) NOT NULL,
  `config_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `config_port` int(11) NOT NULL DEFAULT '0',
  `config_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `config_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `config_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `config_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_config`
--

INSERT INTO `tbl_config` (`config_id`, `config_host`, `config_port`, `config_username`, `config_password`, `config_type`, `config_name`) VALUES
(1, 'web.p2b-gravel.com', 465, 'no-reply@tapchidangnho.com', 'L_c?fwLjCEZ+', 'ssl', 'LIFT SEO Tool');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `login_last_login` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `member_id`, `login_last_login`) VALUES
(4, 2, '1628105109'),
(5, 7, '1627663552'),
(6, 1, '1628105098'),
(7, 10, '1623777367'),
(8, 9, '1628018316'),
(9, 11, '1627588314'),
(10, 14, '1626724650'),
(11, 12, '1627927911');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `member_id` int(8) NOT NULL,
  `member_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `member_type` tinyint(1) NOT NULL,
  `member_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_info` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `member_fullname` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `member_temp_pass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`member_id`, `member_name`, `member_password`, `member_type`, `member_email`, `member_info`, `member_fullname`, `member_temp_pass`, `member_active`) VALUES
(1, 'root', '$2y$10$zSmnwKXVRdzpqeUK9WkJdeSe3E2bs7V87nFurG.kPOjlAIlAcePTK', 1, 'baonguyenyam@gmail.com', '', 'Nguyen Pham', NULL, 1),
(2, 'admin', '$2y$10$cWQUuub9z8/8OrAlv9KZiOBEvCQGxqy.30imTDK8EPoD5QDJT3cLu', 1, 'hello@liftcreations.com', '', 'LIFT Creations', NULL, 1),
(7, 'demo', '$2y$10$RHnaJS220vCPsGbhWkm6POf/fyIo.46neXz0TtJ1mcRSzqLWBi2Py', 0, 'demo@liftcreations.com', '', 'LIFT DEMO', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `post_id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_status` int(11) NOT NULL DEFAULT '0',
  `post_del` int(11) NOT NULL DEFAULT '0',
  `post_title` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_type` varchar(50) NOT NULL DEFAULT 'posts',
  `post_options` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token_auth`
--

CREATE TABLE `tbl_token_auth` (
  `auth_id` int(11) NOT NULL,
  `auth_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_selector_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_is_expired` int(11) NOT NULL DEFAULT '0',
  `auth_expiry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_token_auth`
--

INSERT INTO `tbl_token_auth` (`auth_id`, `auth_username`, `auth_password_hash`, `auth_selector_hash`, `auth_is_expired`, `auth_expiry_date`) VALUES
(2, 'admin', '$2y$10$NYWbVB6KrnE/I.hCxIKDm.HnKOqyyLRppIth9KbPDhFwi1tPIY/MS', '$2y$10$WWcSCbzRzwH0EJarlhsHR.FQZmPoHlemScNJWgzrsk1d99u7Hc9LG', 1, '2021-06-11 13:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upload`
--

CREATE TABLE `tbl_upload` (
  `upload_id` int(11) NOT NULL,
  `upload_date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upload_fname` text NOT NULL,
  `upload_name` varchar(200) NOT NULL,
  `upload_version` varchar(255) NOT NULL,
  `upload_type` int(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_upload`
--

INSERT INTO `tbl_upload` (`upload_id`, `upload_date_update`, `upload_fname`, `upload_name`, `upload_version`, `upload_type`) VALUES
(13, '2021-06-09 14:03:53', 'extensions_v1.0.0.zip', 'extensions.zip', '1.0.0', 1),
(14, '2021-06-09 14:03:53', 'lift-vc-addon_v4.0.0.zip', 'lift-vc-addon.zip', '4.0.0', 3),
(15, '2021-06-09 14:03:53', 'wp-lift_v2.3.0.zip', 'wp-lift.zip', '2.3.0', 2),
(16, '2021-06-09 14:03:53', 'wp-lift-blocks_v1.0.0.zip', 'wp-lift-blocks.zip', '1.0.0', 4),
(17, '2021-06-09 14:03:53', 'wp-lift-cleanup_v2.0.1.zip', 'wp-lift-cleanup.zip', '2.0.1', 5),
(18, '2021-06-09 14:03:53', 'wp-lift-cleanup_v2.1.1.zip', 'wp-lift-cleanup.zip', '2.1.1', 5),
(19, '2021-06-09 14:03:53', 'wp-lift_v2.4.0.zip', 'wp-lift.zip', '2.4.0', 2),
(20, '2021-06-09 14:03:53', 'lift-vc-addon_v4.5.0.zip', 'lift-vc-addon.zip', '4.5.0', 3),
(21, '2021-06-09 14:03:53', 'wp-lift-vc-addon_v4.7.0.zip', 'wp-lift-vc-addon.zip', '4.7.0', 3),
(22, '2021-06-09 14:03:53', 'wp-lift-vc-addon_v4.8.0.zip', 'wp-lift-vc-addon.zip', '4.8.0', 3),
(24, '2021-06-09 14:03:53', 'wp-lift-vc-addon_v4.9.0.zip', 'wp-lift-vc-addon.zip', '4.9.0', 3),
(25, '2021-06-09 14:03:53', 'wp-lift-vc-addon_v5.0.0.zip', 'wp-lift-vc-addon.zip', '5.0.0', 3),
(26, '2021-06-09 14:03:53', 'wp-lift-core_v2.4.1.zip', 'wp-lift-core.zip', '2.4.1', 2),
(27, '2021-06-09 14:03:53', 'wp-lift-vc-addon_v5.1.0.zip', 'wp-lift-vc-addon.zip', '5.1.0', 3),
(28, '2021-06-09 14:03:53', 'wp-lift-vc-addon_v5.1.1.zip', 'wp-lift-vc-addon.zip', '5.1.1', 3),
(29, '2021-06-09 14:03:53', 'wp-lift-core_v2.4.2.zip', 'wp-lift-core.zip', '2.4.2', 2),
(30, '2021-06-09 14:03:53', 'wp-lift-cleanup_v2.1.2.zip', 'wp-lift-cleanup.zip', '2.1.2', 5),
(31, '2021-06-09 14:03:53', 'wp-lift-core_v2.4.3.zip', 'wp-lift-core.zip', '2.4.3', 2),
(32, '2021-06-09 14:03:53', 'wp-lift-core_v2.5.0.zip', 'wp-lift-core.zip', '2.5.0', 2),
(33, '2021-06-09 14:03:53', 'wp-lift-vc-addon_v5.2.0.zip', 'wp-lift-vc-addon.zip', '5.2.0', 3),
(34, '2021-06-09 14:03:53', 'wp-lift-core_v2.7.0.zip', 'wp-lift-core.zip', '2.7.0', 2),
(35, '2021-06-09 14:03:53', 'wp-lift-core_v2.7.1.zip', 'wp-lift-core.zip', '2.7.1', 2),
(36, '2021-06-09 14:03:53', 'wp-lift-core_v2.7.2.zip', 'wp-lift-core.zip', '2.7.2', 2),
(37, '2021-06-09 14:03:53', 'extensions_v2.0.3.zip', 'extensions.zip', '2.0.3', 1),
(39, '2021-06-09 14:03:53', 'wp-lift-core_v2.7.3.zip', 'wp-lift-core.zip', '2.7.3', 2),
(40, '2021-06-09 14:03:53', 'wp-lift-cleanup_v2.1.3.zip', 'wp-lift-cleanup.zip', '2.1.3', 5),
(41, '2021-06-09 14:03:53', 'extensions_v2.0.4.zip', 'extensions.zip', '2.0.4', 1),
(42, '2021-06-20 05:25:08', 'wp-lift-chat_v1.0.6.zip', 'wp-lift-chat.zip', '1.0.6', 6),
(43, '2021-06-21 14:57:08', 'wp-lift-chat_v1.0.7.zip', 'wp-lift-chat.zip', '1.0.7', 6),
(44, '2021-06-22 13:36:05', 'wp-lift-chat_v1.2.0.zip', 'wp-lift-chat.zip', '1.2.0', 6),
(45, '2021-06-22 14:11:24', 'wp-lift-chat_v1.2.1.zip', 'wp-lift-chat.zip', '1.2.1', 6),
(46, '2021-06-22 16:59:18', 'wp-lift-chat_v2.0.0.zip', 'wp-lift-chat.zip', '2.0.0', 6),
(47, '2021-06-22 17:02:28', 'wp-lift-chat_v2.0.1.zip', 'wp-lift-chat.zip', '2.0.1', 6),
(48, '2021-06-23 15:22:40', 'wp-lift-chat_v2.1.3.zip', 'wp-lift-chat.zip', '2.1.3', 6),
(49, '2021-06-23 15:58:09', 'wp-lift-chat_v2.2.0.zip', 'wp-lift-chat.zip', '2.2.0', 6),
(50, '2021-06-23 16:18:52', 'wp-lift-chat_v2.2.1.zip', 'wp-lift-chat.zip', '2.2.1', 6),
(51, '2021-06-23 16:32:38', 'wp-lift-chat_v2.2.2.zip', 'wp-lift-chat.zip', '2.2.2', 6),
(52, '2021-06-23 16:54:44', 'wp-lift-chat_v2.2.3.zip', 'wp-lift-chat.zip', '2.2.3', 6),
(53, '2021-06-26 02:47:39', 'wp-lift-chat_v2.2.4.zip', 'wp-lift-chat.zip', '2.2.4', 6),
(54, '2021-06-28 01:52:56', 'wp-lift-chat_v2.2.5.zip', 'wp-lift-chat.zip', '2.2.5', 6),
(55, '2021-06-29 14:13:29', 'wp-lift-core_v2.7.4.zip', 'wp-lift-core.zip', '2.7.4', 2),
(56, '2021-07-01 13:47:38', 'lift-theme_v0.1.1.zip', 'lift-theme.zip', '0.1.1', 7),
(57, '2021-07-02 14:45:04', 'wp-lift-vc-addon_v5.2.1.zip', 'wp-lift-vc-addon.zip', '5.2.1', 3),
(58, '2021-07-02 15:09:51', 'wp-lift-vc-addon_v5.2.2.zip', 'wp-lift-vc-addon.zip', '5.2.2', 3),
(59, '2021-07-02 15:17:03', 'wp-lift-vc-addon_v5.2.3.zip', 'wp-lift-vc-addon.zip', '5.2.3', 3),
(60, '2021-07-03 18:30:25', 'lift-theme_v1.0.0.zip', 'lift-theme.zip', '1.0.0', 7),
(61, '2021-07-05 03:01:43', 'wp-lift-core_v2.8.0.zip', 'wp-lift-core.zip', '2.8.0', 2),
(62, '2021-07-05 03:53:28', 'wp-lift-core_v2.8.1.zip', 'wp-lift-core.zip', '2.8.1', 2),
(63, '2021-07-05 03:53:54', 'wp-lift-chat_v2.2.6.zip', 'wp-lift-chat.zip', '2.2.6', 6),
(64, '2021-07-05 04:53:09', 'wp-lift-core_v2.8.2.zip', 'wp-lift-core.zip', '2.8.2', 2),
(65, '2021-07-05 12:36:43', 'wp-lift-vc-addon_v5.2.5.zip', 'wp-lift-vc-addon.zip', '5.2.5', 3),
(66, '2021-07-05 15:17:12', 'wp-lift-theme_v1.0.5.zip', 'wp-lift-theme.zip', '1.0.5', 7),
(67, '2021-07-10 02:20:04', 'wp-lift-chat_v2.3.0.zip', 'wp-lift-chat.zip', '2.3.0', 6),
(68, '2021-07-13 16:31:23', 'wp-lift-chat_v2.4.0.zip', 'wp-lift-chat.zip', '2.4.0', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_config`
--
ALTER TABLE `tbl_config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_token_auth`
--
ALTER TABLE `tbl_token_auth`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  ADD PRIMARY KEY (`upload_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_config`
--
ALTER TABLE `tbl_config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `member_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_token_auth`
--
ALTER TABLE `tbl_token_auth`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
