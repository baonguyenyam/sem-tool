-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2021 at 01:41 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `download`
--

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

DROP TABLE IF EXISTS `upload`;
CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `version` varchar(255) NOT NULL,
  `type` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `fname`, `name`, `version`, `type`) VALUES
(13, 'extensions_v1.0.0.zip', 'extensions.zip', '1.0.0', 1),
(14, 'lift-vc-addon_v4.0.0.zip', 'lift-vc-addon.zip', '4.0.0', 3),
(15, 'wp-lift_v2.3.0.zip', 'wp-lift.zip', '2.3.0', 2),
(16, 'wp-lift-blocks_v2.2.0.zip', 'wp-lift-blocks.zip', '2.2.0', 4),
(17, 'wp-lift-cleanup_v2.0.1.zip', 'wp-lift-cleanup.zip', '2.0.1', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
