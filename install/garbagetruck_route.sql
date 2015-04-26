-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2015 at 10:27 PM
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
  `stayaddress` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '停留地點',
  `RecyclingDay` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '回收日',
  `staytime` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '停留時間',
  `staytime_start` time NOT NULL COMMENT '停留時間_start',
  `staytime_end` time NOT NULL COMMENT '停留時間_end',
  `Longitude` double NOT NULL COMMENT '經度',
  `Latitude` double NOT NULL COMMENT '緯度',
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  UNIQUE KEY `gID` (`gID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='垃圾車路線資訊' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `garbagetruck_route`
--

INSERT INTO `garbagetruck_route` (`gID`, `area`, `trainNO`, `stayNO`, `township`, `hometown`, `stayaddress`, `RecyclingDay`, `staytime`, `staytime_start`, `staytime_end`, `Longitude`, `Latitude`, `updatetime`) VALUES
(1, 6, 2, 58, '仁武區', '八卦里', '京富路3號', '1,3,5', '21：36～21：37', '21:36:00', '21:37:00', 120.3396871, 22.6812452, '2015-04-20 14:27:00'),
(2, 6, 2, 57, '仁武區', '八卦里', '京富路29號', '1,3,5', '21：35～21：36', '21:35:00', '21:36:00', 120.3392053, 22.6811803, '2015-04-20 14:27:00'),
(3, 6, 2, 56, '仁武區', '八卦里', '京中一街53號', '1,3,5', '21：33～21：34', '21:33:00', '21:34:00', 120.3386563, 22.679862, '2015-04-20 14:27:00'),
(4, 6, 2, 55, '仁武區', '八卦里', '京中一街65號', '1,3,5', '21：32～21：33', '21:32:00', '21:33:00', 120.3381994, 22.6796393, '2015-04-20 14:27:00'),
(5, 6, 2, 54, '仁武區', '八卦里', '京中二街78號', '1,3,5', '21：31～21：32', '21:31:00', '21:32:00', 120.3366083, 22.6798077, '2015-04-20 14:27:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
