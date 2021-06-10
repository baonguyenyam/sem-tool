-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 10, 2021 at 11:48 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `admin_seotool`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `login_last_login` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(2, 'admin', '$2y$10$bLsQBXIy8kWli6/N6UFmEelBbf8wSZpfDk3SQLxjBUBolaK3kUphO', 1, 'baonguyenyam@gmail.com', '', 'Nguyen Pham', NULL, 1),
(7, 'demo', '$2y$10$RHnaJS220vCPsGbhWkm6POf/fyIo.46neXz0TtJ1mcRSzqLWBi2Py', 0, 'demo@demo.com', '', 'Demo', NULL, 1);

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
(16, '2021-06-09 14:03:53', 'wp-lift-blocks_v2.2.0.zip', 'wp-lift-blocks.zip', '2.2.0', 4),
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
(41, '2021-06-09 14:03:53', 'extensions_v2.0.4.zip', 'extensions.zip', '2.0.4', 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `member_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_token_auth`
--
ALTER TABLE `tbl_token_auth`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
