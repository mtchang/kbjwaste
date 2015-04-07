-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2015 at 11:33 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kbjwaste`
--

-- --------------------------------------------------------

--
-- Table structure for table `garbagetruck_route`
--

CREATE TABLE IF NOT EXISTS `garbagetruck_route` (
  `gID` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `area` int(11) NOT NULL COMMENT '責任區',
  `trainNO` int(11) NOT NULL COMMENT '車次',
  `stayNO` int(11) NOT NULL COMMENT '停留點編號',
  `township` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '行政區',
  `hometown` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '里別',
  `stayaddress` int(30) NOT NULL COMMENT '停留地點',
  `RecyclingDay` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '回收日',
  `staytime` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '停留時間',
  `staytime_start` time NOT NULL COMMENT '停留時間_start',
  `staytime_end` time NOT NULL COMMENT '停留時間_end',
  `Longitude` double NOT NULL COMMENT '經度',
  `Latitude` double NOT NULL COMMENT '緯度',
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  UNIQUE KEY `gID` (`gID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='垃圾車路線資訊' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `garbagetruck_route`
--

INSERT INTO `garbagetruck_route` (`gID`, `area`, `trainNO`, `stayNO`, `township`, `hometown`, `stayaddress`, `RecyclingDay`, `staytime`, `staytime_start`, `staytime_end`, `Longitude`, `Latitude`, `updatetime`) VALUES
(1, 0, 0, 0, '', '', 0, '', '', '21:33:00', '00:00:00', 0, 0, '2015-04-05 15:42:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
