-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2021 at 03:56 PM
-- Server version: 5.7.34
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
(4, 2, '1624684136'),
(5, 7, '1624894283'),
(6, 1, '1624894666'),
(7, 10, '1623777367'),
(8, 9, '1624469576'),
(9, 11, '1624735964');

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
(2, 'admin', '$2y$10$4uXN4aGK00U2ivvvI/SZcuRzgha.A4t8jRzqrB447CJWt9IXDO3Ii', 1, 'nguyen@liftcreations.com', '', 'Nguyen Pham', NULL, 1),
(7, 'demo', '$2y$10$RHnaJS220vCPsGbhWkm6POf/fyIo.46neXz0TtJ1mcRSzqLWBi2Py', 0, 'demo@demo.com', '', 'Demo', NULL, 1),
(8, 'michaellift', '$2y$10$.D4CP0Q1cB8ZiQjxlAHVsO/P358K94yMEfo.LChjgdzf4xzrtp.2W', 1, 'michael@liftcreations.com', '', 'Michael Dickens', NULL, 1),
(9, 'kevin', '$2y$10$KfKhZzU2rfs2wkhrylIkuOBpKQ9lADZrkyskj0azIADLIR05jMWyK', 1, 'kevin@liftcreations.com', '', 'Kevin Le', NULL, 1),
(10, 'heloo', '$2y$10$QlfcRF0Gx9PwXmKUlszK/.TKaSK849bx5n1HYfaiuNM/ZCe5IztLe', 3, 'hellodfkjdfh@dff.com', '', '', NULL, 1),
(11, 'james.krahula', '$2y$10$ZfRvTdaYbkKeCCPTJo0iIu18s/Mkrx9zssVrub1i/vUQr06u0Gsze', 1, 'james.krahula@gmail.com', '', 'James Krahula', NULL, 1);

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
(2, 'admin', '$2y$10$NYWbVB6KrnE/I.hCxIKDm.HnKOqyyLRppIth9KbPDhFwi1tPIY/MS', '$2y$10$WWcSCbzRzwH0EJarlhsHR.FQZmPoHlemScNJWgzrsk1d99u7Hc9LG', 1, '2021-06-11 13:11:54'),
(3, 'admin', '$2y$10$CcXEqgsl4/tiO7l1ZydEquGnYKm8RmHzAnKWOleho0i9TRrxX3wiS', '$2y$10$E5bdyi83ecYV5smii/1D4OvnflI8PgCJhNhTOuQCAUTIX.hsucojW', 1, '2021-06-11 15:09:35'),
(4, 'admin', '$2y$10$8tVAtiZPnZs6YIZMWQlx6en3Hqbaw7IpOFCqimv2iavlJf9iIPEuy', '$2y$10$S8zSgNe5AVWAowhEMHuhyepbPlnakTG7bOur/khpcGEFQqlWnfm5O', 1, '2021-06-11 15:30:40'),
(5, 'admin', '$2y$10$hq5Da1lH8Y/P84L4EHcTe.LfuKxF1k3h23R6DieTCCbmsTzLbJo/6', '$2y$10$1UdrM4Ngq1ObMKq.jJRCBe.x8JgiCdeIzAzGfQe4Wn1fjVSeNfTYe', 1, '2021-06-11 17:14:56'),
(6, 'root', '$2y$10$jOtXnB1RX6WxUCSYpBk1ROxqcx0QHGHs1J7sXwfO8iFIfRsGNcKny', '$2y$10$P3YCV9i9qbgyqdCQ5Cyl0u.ubTOF8CVMz8IEuY1hKAz1Fub9bcqaC', 1, '2021-06-13 04:36:50'),
(7, 'admin', '$2y$10$HCLfwNaxFzwHoPF7wz.9U.qLXCeqz3sNT7FrK4I8bYZsKEttakqHS', '$2y$10$4Dns2dyNcgWtxjiGMtlum.N7cld7a4UfE.VzmGnLdrT97CE/zRTwK', 1, '2021-06-15 18:22:00'),
(8, 'root', '$2y$10$dU4vt8b.M2KAhq5/.v9O8exCNGReQ3OVS7/ilr51oUPVCuteiqc3u', '$2y$10$lomuFXItOrS1e34zVYPs..ivhOMwIY0TILR66hcGJ42a2erMXPFEu', 1, '2021-06-13 17:41:54'),
(9, 'root', '$2y$10$KJg7JUUsGUmOvYQSSADQne9aQGv7tTbMVFB0V5XRyF53EHwQwW/.K', '$2y$10$d/iKqMxn3BcTUMcRtHpNPeo8oVoDl7bFlHIInj1XoUqyUEV7Uqe6G', 1, '2021-06-14 17:06:26'),
(10, 'demo', '$2y$10$JklmSq.t8m6uH0nK.UI4A.lyFfngj81KF2nH4Nx0jqDpMW0.O7WYq', '$2y$10$0E0YhrtpYNQP7lOLu7NHIez.2JCtzJFIPmicWF1eGqd/DIpxtSCzW', 1, '2021-06-26 04:31:54'),
(11, 'root', '$2y$10$Tc7KURUumt.y.De292G9De146w7L04H8PaQ/A.NRQBavw2llxU7AO', '$2y$10$qQmMfqVchCG5sUFY7UwTe.KIHs8f9cPBqmrRkwoh6Y1KigNwA.T4O', 1, '2021-06-15 03:57:48'),
(12, 'root', '$2y$10$V0fVS2v4qbx5VhVvLR7AXu4Kle509DiVc2fGpmvb4f2ktTq0CtIgO', '$2y$10$qjsn4npdbkJxzVUofHeU0.HLwTTT/UMvfrZhZ9MiVT8x3OPVDr9dq', 1, '2021-06-21 13:28:21'),
(13, 'kevin', '$2y$10$rwifjlQHcq2u4DodeoYJYul6WlEzMzpoXwa4SpsmYiBQwLlncWj/2', '$2y$10$iqw0e5DGK6i9ir./.F6GFuvSz/TcS5ROVHXSq7FRoqN/NZ8voK6nm', 0, '2021-07-15 18:23:23'),
(14, 'root', '$2y$10$lvySUAmP1ZMB5ToIx.0LTe5eBoP43rkQhpkMULJG9o8ImMVgyx8lO', '$2y$10$rINbsioj55JdHXm/9PIa0uLpFG/KpaELlxMtAx9HPKScSrYufLAz2', 1, '2021-06-24 04:16:33'),
(15, 'root', '$2y$10$.RS7xNX9Tu4TyHqyQ/xJj.taFVrUMt1nhxkauwyHp7s789R49FPTe', '$2y$10$fjLGGRpBJmQg2YLNGL7I7ujcjey60N7Kl2/2Mop9t9tojOiQ8ZFZi', 1, '2021-06-24 13:06:59'),
(16, 'root', '$2y$10$zaDTt.XS6HVeYkl7oASZLOARpYJCeucX5TI2/kv9CHpFpulBuqYci', '$2y$10$0Mw5Yo5eM3WCrDblSdImhu37/JVQJsPZr81wuGx9Kiv7j3l9eU4Ra', 1, '2021-06-25 13:23:01'),
(17, 'root', '$2y$10$9XNIBCRnvZG/JN5nhWUlFesATuNbp8M6NCyR605H1dE5SVEDHwZqC', '$2y$10$YtWw1Co8oWivd.h5M9vi5uYCscqldxlxDG/xtxO.0y7M1Is/Ao5la', 1, '2021-06-26 02:41:47'),
(18, 'root', '$2y$10$LGDxzzSgW/tWvI87DHivpujSSmq5XxwA2Y7jsmDBxOxwqNGVbEoPi', '$2y$10$v/lTmquWbq2ysonGm5m8w.sZtghSmR4L/FuUwzdv3xtXn1gsd3OaC', 1, '2021-06-28 14:11:42'),
(19, 'demo', '$2y$10$XhYd.3GWMZFpZcezFSuSh.vfi8dPq53xve/HTt/PHgyp8lZUnjJ8m', '$2y$10$oYGiITZAyPvFK8Qf5GWmMOAl1fQEw08YNQFfkxxr5c7xbl35RuxY2', 0, '2021-07-26 04:31:54'),
(20, 'james.krahula', '$2y$10$sEclb4LK5ulVH2QY7PhLU.8h97bfTx89wTlAeYXUDojf5XG.LyJ0K', '$2y$10$7NkvUy2fShfioA88Hiy8KuFR7ljOguwskZOVGUl5Y98nD9UcezCCq', 0, '2021-07-26 14:07:09'),
(21, 'root', '$2y$10$IjVlZ5dwDRspwHLG3d.MZenhpxc0qxzUlVRYg1MqH/Mt1gW3mDMmu', '$2y$10$9Iz3rtfzAZen9.8bPH0qveLd2/ZikCe2.nQdMDFw4SuH1brNScQsi', 0, '2021-07-28 14:11:55');

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
(54, '2021-06-28 01:52:56', 'wp-lift-chat_v2.2.5.zip', 'wp-lift-chat.zip', '2.2.5', 6);

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
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `member_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_token_auth`
--
ALTER TABLE `tbl_token_auth`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
