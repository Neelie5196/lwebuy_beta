-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2018 at 04:55 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lwe_beta`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `postcode` int(11) NOT NULL,
  `astatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `address`, `state`, `city`, `country`, `postcode`, `astatus`) VALUES
(1, 35, 'ww', 'Sarawak', 'kuching', 'Malaysia', 950, 'show'),
(3, 3, 'cityone megamall', 'Sarawak', 'kuching', 'Malaysia', 93350, 'show'),
(4, 29, '291, Lebuh Central No.21, Jalan Central Timur', 'Sarawak', 'Kuching', 'Malaysia', 93300, 'show'),
(5, 29, '291, Lebuh Central No.21, Jalan Central Timur', 'Sarawak', 'Kuching', 'Malaysia', 93300, 'show'),
(6, 12, '330ï¼Œ Jalan Kenny Hill 5A', 'Sarawak', 'KUCHING', 'Malaysia', 93350, 'show'),
(7, 12, '330ï¼Œ Jalan Kenny Hill 5A', 'Sarawak', 'KUCHING', 'Malaysia', 93350, 'show'),
(8, 16, 'Lotâ€™65 Taman Hingga', 'Sarawak', 'Kuching ', 'Malaysia', 95400, 'show'),
(9, 16, 'Lotâ€™65 Taman Hingga', 'Sarawak', 'Saratok ', 'Malaysia', 95400, 'show'),
(10, 40, 'Usa', 'Sarawak', 'New york', 'Malaysia', 777, 'show'),
(11, 42, 'tabuan laru', 'Sarawak', 'kuching', 'Malaysia', 93350, 'show'),
(12, 43, 'no 69, jalan merlin garden, lorong 22', 'Sarawak', 'Kuching', 'Malaysia', 90000, 'show'),
(13, 44, 'green hight', 'Sarawak', 'kuching', 'Malaysia', 93350, 'show'),
(14, 46, '22, Lot.889, Seng Goon Garden', 'Sarawak', 'Kuching', 'Malaysia', 93250, 'show'),
(15, 48, 'No.999, lol, otz', 'Kuala Lumpur', 'Kuala Lumpur', 'Malaysia', 93350, 'show'),
(16, 50, '1B lorong Setia 3', 'Sarawak', 'Sibu', 'Malaysia', 96000, 'show'),
(17, 1, '123', 'Sarawak', 'Kuching', 'Malaysia', 12345, 'hide'),
(18, 1, '321', 'Sarawak', 'Miri', 'Malaysia', 54321, 'show'),
(19, 3, 'stapok', 'Sarawak', 'kuching', 'Malaysia', 93450, 'show'),
(20, 3, 'Spring ', 'Sarawak', 'Kuching ', 'Malaysia', 93330, 'show'),
(21, 54, 'SARAWAK CAMPUS Swinburne University of Technology Sarawak Campus Jalan Simpang Tiga 93350 Kuching, S', 'Sarawak', 'Kuching', 'Malaysia', 93350, 'show'),
(22, 56, '16A, Lorong 24, Jalan Wong King Huo', 'Sarawak', 'Sibu', 'Malaysia', 96000, 'show'),
(23, 57, '1a, lorong kota kinabalu ', 'Sarawak', 'Ulu kapit', 'Malaysia', 12345, 'show'),
(24, 58, 'NO 46, LORONG DAHLIA 3, TAMAN WON, ', 'Sarawak', 'KUCHING ', 'Malaysia', 93050, 'show'),
(25, 52, 'tun jugah', 'Sarawak', 'kuching', 'Malaysia', 93350, 'show'),
(26, 62, 'Lot 1416 Taman Janting', 'Sarawak', 'Kuching', 'Malaysia', 93250, 'show'),
(27, 62, 'Lot 1416 Taman Janting', 'Sarawak', 'Kuching', 'Malaysia', 93250, 'show'),
(28, 62, 'Lot 1416 Taman Janting', 'Sarawak', 'Kuching', 'Malaysia', 93250, 'show'),
(29, 62, 'Lot 1416 Taman Janting', 'Sarawak', 'Kuching', 'Malaysia', 93250, 'show'),
(30, 62, 'Lot 1416 Taman Janting', 'Sarawak', 'Kuching', 'Malaysia', 93250, 'show'),
(31, 64, '222F, Lorong Kempas 3C, Jalan Kempas', 'Sarawak', 'KUCHING', 'Malaysia', 93250, 'show'),
(32, 63, 'No 1 taman orchard off jlnsong', 'Sarawak', 'kuching', 'Malaysia', 93350, 'show'),
(33, 63, 'No 1 taman orchard off jln song', 'Sarawak', 'kuching', 'Malaysia', 93350, 'show'),
(34, 65, '123', 'Sarawak', 'kuching', 'Malaysia', 93300, 'show'),
(35, 65, '123', 'Johor', '123', 'Malaysia', 213, 'show'),
(36, 60, 'green road', 'Sarawak', 'kuching', 'Malaysia', 93150, 'show'),
(37, 59, 'green height', 'Sarawak', 'kuching', 'Malaysia', 93250, 'show'),
(38, 61, 'onetj mall', 'Sarawak', 'kuching', 'Malaysia', 93350, 'show'),
(39, 71, 'cityone megamall', 'Sarawak', 'kuching', 'Malaysia', 93350, 'show'),
(40, 66, 'onetj mall', 'Sarawak', 'kuching', 'Malaysia', 93350, 'show'),
(41, 69, 'jalan stapok', 'Sarawak', 'kuching', 'Malaysia', 93450, 'show'),
(42, 37, 'Jalan Awan Hijau, Taman Overseas Union, 58200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', 'Johor', 'Kuala Lumpur', 'Malaysia', 58200, 'show'),
(43, 15, '100, Jln Desa, Tmn Desa', 'Kuala Lumpur', 'Kuala Lumpur', 'Malaysia', 58100, 'show'),
(44, 37, 'Jalan Awan Hijau, Taman Overseas Union, 58200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', 'Johor', 'Kuala Lumpur', 'Malaysia', 58200, 'show'),
(45, 1, '454534', 'Selangor', 'sgdb', 'Malaysia', 0, 'show'),
(46, 68, 'Jalan Stapok ', 'Sarawak', 'kuching', 'Malaysia', 93450, 'show'),
(47, 68, 'Jalan Stapok ', 'Sarawak', 'kuching', 'Malaysia', 93450, 'show'),
(48, 70, 'Jalan Stapok', 'Sarawak', 'kuching', 'Malaysia', 93450, 'show'),
(49, 67, 'Jalan Stapok Utama', 'Sarawak', 'kuching', 'Malaysia', 93450, 'show'),
(50, 72, 'happy', 'Labuan', 'sea', 'Malaysia', 0, 'show'),
(51, 74, 'a', 'Selangor', 'c', 'Malaysia', 0, 'show'),
(52, 75, '20, Jalan Pisang', 'Sarawak', 'kUCHING', 'Malaysia', 93400, 'show'),
(53, 76, 'Kenyalan Park', 'Sarawak', 'Kuching', 'Malaysia', 93300, 'show'),
(54, 33, '888', 'Sarawak', 'Kuching', 'Malaysia', 91000, 'show'),
(55, 77, '123, Jalan Syurga', 'Select a state', 'Kuching', 'Malaysia', 77777, 'show'),
(56, 78, 'Jalan Stapol Selatan', 'Sarawak', 'Kuching', 'Malaysia', 93250, 'show'),
(57, 79, 'test', 'Perak', 'sdfdsf', 'Malaysia', 0, 'show'),
(58, 81, 'Lot 960B Taman Indah, Jalan Sibukang', 'Sarawak', 'Limbang', 'Malaysia', 98700, 'show'),
(59, 82, '57, Jalan Ellis Road', 'Sarawak', 'Kuching', 'Malaysia', 93300, 'show'),
(60, 85, 'No 9, Jalan Ranyon', 'Select a state', 'Sarikei', 'Malaysia', 96100, 'show'),
(61, 87, '58,Taman Indah Jaya,Jalan penrissen', 'Sarawak', 'Kuching', 'Malaysia', 93250, 'show'),
(62, 86, 'No 100, Blessed Garden, Jalan Disneyland', 'Select a state', 'Wonderland', 'Malaysia', 26960, 'show'),
(63, 88, '123 Bukit Jalil', 'Select a state', 'kuching', 'Malaysia', 123456, 'show'),
(66, 1, 'ABC', 'Sarawak', 'Kuching', 'Malaysia', 12345, 'show'),
(67, 1, 'ABC', 'Sarawak', 'Kuching', 'Malaysia', 12345, 'show');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Electronic Devices'),
(2, 'Accessories'),
(3, 'TV& Home Appliances'),
(4, 'Health & Beauty'),
(5, 'Babies & Toys'),
(6, 'Women\'s Fashion'),
(7, 'Men\'s Fashion'),
(8, 'Sports & Travel'),
(9, 'Automotive '),
(10, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `m_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `trackcode` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`m_id`, `name`, `contact`, `email`, `subject`, `trackcode`, `message`, `datetime`, `status`) VALUES
(1, 'aqmar', '0133095483', 'aqmar.nordin@unixus.com', 'test', '', 'Testing purpose', '0000-00-00 00:00:00', 'unread'),
(2, 'aqmar', '0133095483', 'aqmar.nordin@unixus.com', 'test', '', 'TEST', '0000-00-00 00:00:00', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL,
  `country_currency` decimal(10,2) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `account_no` int(15) NOT NULL,
  `account_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_currency`, `bank`, `account_no`, `account_name`) VALUES
(1, 'Malaysia', '0.62', 'Maybank', 123456789, 'Logistics Worldwide Express(M) Sdn Bhd');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `from_order` varchar(20) NOT NULL,
  `item_description` varchar(50) NOT NULL,
  `order_code` varchar(25) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_id` int(11) DEFAULT NULL,
  `action` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `slot_id`, `from_order`, `item_description`, `order_code`, `weight`, `datetime`, `payment_id`, `action`) VALUES
(1, 1, 'Purchase Request', 'jacket', '122', '2.00', '2018-04-17 06:28:24', 6326435, 'Out'),
(2, 2, 'Purchase Request', 'jacket', '111', '5.00', '2018-04-17 07:05:15', NULL, 'In'),
(3, 3, 'Inventory Request', 'Shipping Item test', '987654', '1.00', '2018-04-19 07:38:07', 769391, 'Out'),
(4, 4, 'Purchase Request', 'xiaomiå°ç±³å®˜æ–¹æ——èˆ°åº—ç§»åŠ¨ç”µæº2 10000å……ç', '6087', '0.60', '2018-04-29 15:42:05', 6723416, 'Out'),
(5, 5, 'Purchase Request', 'arenaæ³³é•œé˜²é›¾å‰‚ æ¸¸æ³³çœ¼é•œè¿åŠ¨VRé•œç‰‡è¿‘', '456', '0.20', '2018-05-04 08:46:56', 284961, 'Out'),
(6, 6, 'Purchase Request', 'ohç»¿æ¤ èŠ±å›­ç§‹åƒæž¶ å¤å¤å’–è‰²ç®€æ˜“èŠ±æž¶æ', '5', '0.40', '2018-04-25 08:07:42', NULL, 'In'),
(7, 7, 'Purchase Request', 'æ‰‹æœºåŒ…å°åŒ…åŒ…å¥³2017æ–°æ¬¾è¿·ä½ æ–œæŒŽåŒ…æ—¥é', 'AB123', '0.20', '2018-04-25 08:11:31', NULL, 'In'),
(8, 7, 'Purchase Request', 'Qi Wireless Charger Power Bank For iPhone X 8 Plus', '123', '1.10', '2018-04-26 03:12:12', NULL, 'In'),
(9, 7, 'Purchase Request', 'Qi Wireless Charger Power Bank For iPhone X 8 Plus', '123', '1.10', '2018-04-26 03:12:17', NULL, 'In'),
(10, 10, 'Purchase Request', 'æ‰‹æœºåŒ…å°åŒ…åŒ…å¥³2017æ–°æ¬¾è¿·ä½ æ–œæŒŽåŒ…æ—¥é', 'AB123', '0.50', '2018-04-27 03:05:35', NULL, 'In'),
(11, 10, 'Purchase Request', 'æ‰‹æœºåŒ…å°åŒ…åŒ…å¥³2017æ–°æ¬¾è¿·ä½ æ–œæŒŽåŒ…æ—¥é', 'AB123', '0.80', '2018-04-27 03:05:35', NULL, 'In'),
(12, 10, 'Purchase Request', 'æ‰‹æœºåŒ…å°åŒ…åŒ…å¥³2017æ–°æ¬¾è¿·ä½ æ–œæŒŽåŒ…æ—¥é', 'AB123', '0.70', '2018-04-27 03:05:51', NULL, 'In'),
(13, 10, 'Purchase Request', 'æ‰‹æœºåŒ…å°åŒ…åŒ…å¥³2017æ–°æ¬¾è¿·ä½ æ–œæŒŽåŒ…æ—¥é', 'AB123', '0.80', '2018-04-27 03:05:51', NULL, 'In'),
(14, 13, 'Purchase Request', 'Cassa Eames Rectangular White Dining Table Only Wi', '153457892745', '2.00', '2018-05-05 12:01:59', 9795837, 'Out'),
(15, 13, 'Purchase Request', 'Cassa Eames Rectangular White Dining Table Only Wi', '153457892745', '2.00', '2018-04-27 03:39:39', NULL, 'In'),
(16, 12, 'Purchase Request', 'å¤©å¤©ç‰¹ä»·é«˜è…°æ ¼å­ç™¾è¤¶è£™æ¸¯å‘³çŸ­è£™éŸ©ç‰', '4896', '0.90', '2018-04-27 15:46:48', 1449229, 'Out'),
(17, 12, 'Purchase Request', 'æ°´å¢¨é’åŽå¤è£…æ–°æ¬¾å¥³è£…æ°”è´¨æ—¶å°šé€šå‹¤çŸ', '8929', '1.00', '2018-04-27 15:46:48', 1449229, 'Out'),
(18, 11, 'Purchase Request', 'Yvonne', '013', '40.00', '2018-05-05 12:43:18', 5946112, 'Out'),
(19, 7, 'Purchase Request', 'Qi Wireless Charger Power Bank For iPhone X 8 Plus', '123', '12.00', '2018-04-27 17:00:04', NULL, 'In'),
(20, 11, 'Inventory Request', 'EBON', '00000', '12.00', '2018-04-27 17:12:15', 5756412, 'In'),
(21, 11, 'Inventory Request', 'Yvonne', '123456', '12.00', '2018-04-27 17:31:08', 6665612, 'Out'),
(22, 14, 'Purchase Request', 'Sneakers', '1120', '0.50', '2018-04-28 05:32:34', 6751640, 'Out'),
(23, 9, 'Purchase Request', 'å¤–å• ç³–æžœè‰²å¯æŠ˜å ä¾¿æºé˜²æ°´èƒŒåŒ… åŒè‚©', '9283741', '0.98', '2018-04-29 04:55:59', 8481342, 'Out'),
(24, 9, 'Inventory Request', 'shoes', '736412', '2.10', '2018-04-29 04:55:59', 8481342, 'Out'),
(25, 7, 'Purchase Request', 'æžåœ°ç«2016æ­£å“å¸ç¯·æˆ·å¤–3-4äººéœ²è¥é˜²é›¨å', '463457', '5.00', '2018-04-29 05:34:26', 355873, 'Out'),
(26, 7, 'Purchase Request', 'æžåœ°ç«æˆ·å¤–æŠ“ç»’ç¡è¢‹å†…èƒ†è¶…è½»å¤æ˜¥ç§‹æˆ', '634522', '2.00', '2018-04-29 05:34:26', 355873, 'Out'),
(27, 7, 'Inventory Request', 'bbq set', '7653495', '10.00', '2018-04-29 05:34:26', 355873, 'Out'),
(28, 8, 'Purchase Request', 'knit stitch', '5853378', '1.10', '2018-04-29 09:07:59', 2351743, 'In'),
(29, 8, 'Inventory Request', 'knit string', '5554', '1.20', '2018-04-29 11:45:37', 9062843, 'Out'),
(30, 8, 'Inventory Request', 'knit knit', '5556', '0.70', '2018-04-29 11:45:37', 9062843, 'Out'),
(31, 21, 'Purchase Request', '2018æ˜¥å­£å¤–å¥—ç”·å¤¹å…‹æ—¥ç³»é’å°‘å¹´å¤§ç å®½æ', '3655134', '1.80', '2018-04-29 15:42:05', 1131944, 'Out'),
(32, 21, 'Purchase Request', '2018æ˜¥å­£å¤–å¥—ç”·å¤¹å…‹æ—¥ç³»é’å°‘å¹´å¤§ç å®½æ', '3655134', '1.80', '2018-04-29 15:42:05', 1131944, 'Out'),
(33, 21, 'Inventory Request', 'sport shoes', '4864212', '2.30', '2018-04-29 15:42:05', 1131944, 'Out'),
(34, 20, 'Purchase Request', 'Acustop', '6687', '100.00', '2018-05-01 13:14:37', 5237946, 'Out'),
(35, 17, 'Purchase Request', 'Ting Lee Ting', '45678', '12.00', '2018-05-01 14:56:30', 9083948, 'Out'),
(36, 5, 'Purchase Request', 'Test Flow', '5196', '12.00', '2018-05-06 13:29:48', 255071, 'Out'),
(37, 5, 'Inventory Request', 'quote\'s test', '9984503', '21.00', '2018-05-06 09:03:43', 912111, 'Out'),
(38, 18, 'Purchase Request', 'Birkenstock', '3638', '20.00', '2018-05-07 13:25:08', 6987150, 'In'),
(39, 5, 'Inventory Request', 'test shipping request', '34636', '20.00', '2018-05-05 07:57:43', 823761, 'Out'),
(40, 5, 'Inventory Request', 'Test shipping on phone', '2747', '20.00', '2018-05-05 07:57:43', 979771, 'Out'),
(41, 22, 'Purchase Request', 'TestName', '3456234', '1.10', '2018-05-04 02:53:54', NULL, 'In'),
(42, 15, 'Purchase Request', 'reverb pedal', '4739', '1000.00', '2018-05-04 08:22:06', 6272454, 'Out'),
(43, 19, 'Purchase Request', 'Huawei P20 pro', '3568', '184.00', '2018-05-04 08:47:11', 9156156, 'Out'),
(44, 16, 'Purchase Request', 'Plus Size Korean Style V-neck Silk Blouse Pullover', '4829', '1.00', '2018-05-04 08:50:39', 9400557, 'Out'),
(45, 23, 'Purchase Request', 'ç‹¬å®¶åŽŸåˆ›æ³°å›½æ½®ç‰Œ2017å¤å­£æ–°æ¬¾é»‘ç™½å°è', '75846365', '0.50', '2018-05-04 10:55:55', 6372658, 'In'),
(46, 23, 'Inventory Request', 'ç‹¬å®¶åŽŸåˆ›æ³°å›½æ½®ç‰Œ', '123456789', '0.20', '2018-05-04 10:55:55', 6372658, 'In'),
(47, 24, 'Purchase Request', ' ç³–å®æ¬§æ´²æ­£å“ä»£è´­KENZOé«˜ç”°è´¤ä¸‰Peace Wo', '2341241', '1.12', '2018-05-04 11:04:26', 2782052, 'Out'),
(48, 24, 'Inventory Request', 'cap', '73407234', '0.30', '2018-05-04 11:04:26', 2782052, 'Out'),
(49, 25, 'Purchase Request', '2 in 1 iphone android phone USB charge cable 1.5m ', '32412', '0.40', '2018-05-04 12:58:58', NULL, 'In'),
(50, 25, 'Inventory Request', 'Android usb cable 1.5m', 'AO675HJ', '0.20', '2018-05-04 12:58:58', NULL, 'In'),
(51, 25, 'Inventory Request', 'Poodle', 'PY81A00', '1.10', '2018-05-04 12:47:23', 9891362, 'Out'),
(52, 26, 'Purchase Request', 'Raymond', '4563', '5.00', '2018-05-04 13:29:12', 1031264, 'Out'),
(53, 25, 'Inventory Request', 'Huawei p20', 'IRH865', '456.00', '2018-05-04 13:26:27', NULL, 'In'),
(54, 29, 'Purchase Request', 'iPad ', '67431', '1.00', '2018-05-04 13:44:20', 7355263, 'Out'),
(55, 28, 'Inventory Request', 'anything item', 'code', '3.00', '2018-05-05 00:58:32', 3546565, 'Out'),
(56, 28, 'Purchase Request', 'T-Shirt', '7538526', '0.50', '2018-05-05 00:58:32', 3546565, 'Out'),
(57, 27, 'Purchase Request', 'æ ¼å­è¡¬è¡«ç”·çŸ­è¢–å¤å­£çº¯æ£‰é’å¹´ä¼‘é—²æ—¶å°', '4638743', '0.30', '2018-05-05 04:48:34', 2837659, 'Out'),
(58, 27, 'Inventory Request', 'car accssories', '7832494', '5.00', '2018-05-05 04:48:34', 2837659, 'Out'),
(59, 31, 'Purchase Request', 'çº¢ç±³5plusæ‰‹æœºå£³ å°ç±³redmi5é•œé¢å¥—äº”é‡‘å±', '645353', '0.20', '2018-05-05 04:48:34', 1636761, 'Out'),
(60, 30, 'Inventory Request', 'shoes', '231531224', '2.00', '2018-05-05 04:48:34', 4203860, 'Out'),
(61, 31, 'Inventory Request', 'redmi5é˜²çˆ†è†œ', '2355524', '0.10', '2018-05-05 04:48:34', 1636761, 'Out'),
(62, 30, 'Purchase Request', 'è¿žè¡£è£™2018æ˜¥å¤æ–°æ¬¾å¥³è£…éŸ©ç‰ˆæ°”è´¨ååª›ä', '45134', '1.00', '2018-05-05 04:46:38', NULL, 'In'),
(63, 32, 'Inventory Request', 'high heel', 'AS89234', '5.00', '2018-05-05 07:57:49', 4288966, 'Out'),
(64, 7, 'Purchase Request', 'Test1', '1234', '1.00', '2018-05-05 07:57:49', 212443, 'Out'),
(65, 7, 'Purchase Request', 'Test2', '2345', '2.00', '2018-05-06 05:49:15', 424153, 'Out'),
(66, 7, 'Purchase Request', 'Test3', '3456', '3.00', '2018-05-05 05:29:43', NULL, 'In'),
(67, 7, 'Purchase Request', 'Test4', '4567', '4.00', '2018-05-05 05:29:43', NULL, 'In'),
(68, 36, 'Inventory Request', 'è¡Œè½¦è®°å½•ä»ª', 'RJ8746782', '1.30', '2018-05-05 12:19:36', 5492767, 'Out'),
(69, 34, 'Inventory Request', '2018æ˜¥å¤é£žç»‡è¿åŠ¨å¥³éž‹', 'KA2374886', '2.10', '2018-05-05 12:08:59', 9804768, 'Out'),
(70, 35, 'Inventory Request', 'powerbank', 'i846234', '1.30', '2018-05-05 07:57:49', 4671769, 'Out'),
(71, 37, 'Inventory Request', 'sport bagpack', '1734752', '0.60', '2018-05-05 12:17:07', 5304370, 'Out'),
(72, 33, 'Inventory Request', 'high heel', 'QY387493', '2.20', '2018-05-05 07:37:17', 1425171, 'Out'),
(73, 33, 'Purchase Request', 'è£™å­å¥³å¤æ— è¢–å¤å¤å­¦é™¢é£Žå°‘å¥³æ£‰ç«‹æ–¹20', '7482382', '0.60', '2018-05-05 07:36:58', NULL, 'In'),
(74, 10, 'Purchase Request', 'asdf', 'HJ78826367', '1.00', '2018-05-05 12:13:00', NULL, 'In'),
(75, 38, 'Purchase Request', 'Oece2018å¤è£…æ–°æ¬¾å¥³è£… åœ†é¢†ä¸Šè¡£åŠè¢–æ—¶å°', '18490', '1.00', '2018-05-05 12:38:28', 2413172, 'Out'),
(76, 38, 'Inventory Request', 'Priscilla Yong', 'qwertyuiop', '1.00', '2018-05-05 12:20:41', 4761872, 'Out'),
(77, 38, 'Purchase Request', 'ä¸Šæµ·æ•…äº‹çœŸä¸ä¸å·¾å¥³ç™¾æ­æ­å·žä¸ç»¸å¤å­', 'KJ987654', '1.00', '2018-05-05 12:45:53', NULL, 'In'),
(78, 11, 'Purchase Request', 'æ‰«åœ°ç‹— æ‰«åœ°æ‹–åœ°æœºå™¨äººä¸€ä½“æœº å¾·å›½æ™º', '6639', '1.00', '2018-05-05 12:45:53', NULL, 'In'),
(79, 40, 'Purchase Request', 'æ­£å“å¡å¸ä¹é³„é±¼é•¿æ¬¾é’±åŒ…ç”·çœŸçš®é’å¹´å¤', '9862653', '1.00', '2018-05-05 12:46:57', NULL, 'In'),
(80, 41, 'Purchase Request', 'å¸ƒæœ—ç†Šå¯å¦®å…”iphone xæƒ…ä¾£æ‰‹æœºå£³ é˜²æ‘”åŠ', 'JJ87632748', '1.00', '2018-05-05 12:46:57', NULL, 'In'),
(81, 39, 'Purchase Request', 'Plus Size Korean Style V-neck Silk Blouse Pullover', '4829', '1.00', '2018-05-05 12:46:57', NULL, 'In'),
(82, 42, 'Purchase Request', 'ã€è‡ªè¥ã€‘æš´èµ°çš„èèŽ‰è¿åŠ¨è®­ç»ƒç‘œä¼½é•¿è£', '12423', '1.00', '2018-05-05 12:57:28', 5333274, 'Out'),
(83, 43, 'Purchase Request', 'Sony 55\'\' UHD Smart LED TV KD55X7000E (2 Years Son', '7210', '10.00', '2018-05-05 15:27:59', 3690775, 'Out'),
(84, 44, 'Purchase Request', 'Used - Canon Speedlite 320EX', '323067', '10.00', '2018-05-05 15:27:59', 9026276, 'Out'),
(85, 45, 'Purchase Request', 'test', '1890', '3.00', '2018-05-06 03:38:12', NULL, 'In'),
(86, 46, 'Purchase Request', 'Cute Phone Casing Handphone Cover Mobile Phone Cas', '6431', '12.00', '2018-05-06 10:38:10', 8689033, 'Out'),
(87, 47, 'Purchase Request', 'Ammeltz Yoko Yoko Stiff Shoulder Muscular Aches 48', '34694', '1.00', '2018-05-06 12:17:35', 2142977, 'Out'),
(88, 28, 'Purchase Request', 'Multi cooker', '124', '12.00', '2018-05-06 15:05:12', 3332478, 'Out'),
(89, 15, 'Purchase Request', 'testing', '129', '10.00', '2018-05-06 15:14:08', 8068679, 'Out'),
(90, 7, 'Purchase Request', 'Qi Wireless Charger Power Bank For iPhone X 8 Plus', '123', '1.00', '2018-05-07 02:29:44', NULL, 'In'),
(91, 42, 'Inventory Request', 'Sink', 'Test', '1.00', '2018-05-07 02:29:44', NULL, 'In'),
(92, 26, 'Inventory Request', 'In The Fall Of The New South Korean Baby With Todd', '12345', '1.00', '2018-05-07 02:41:25', 9419781, 'Out'),
(93, 15, 'Purchase Request', 'Michelle', '14567', '1.00', '2018-05-07 07:08:12', 7412782, 'Out'),
(94, 7, 'Purchase Request', 'Qi Wireless Charger Power Bank For iPhone X 8 Plus', '123', '1.00', '2018-05-07 07:11:11', NULL, 'In'),
(95, 7, 'Purchase Request', 'Qi Wireless Charger Power Bank For iPhone X 8 Plus', '123', '1.00', '2018-05-07 07:13:57', NULL, 'In'),
(96, 36, 'Purchase Request', 'Mini boarding box', '5643864', '1.00', '2018-05-07 07:20:59', 4785883, 'Out'),
(97, 44, 'Purchase Request', 'Retro Eiffel Tower Pen Pencil Case Holder Statione', '123', '1.00', '2018-05-07 12:28:52', 3656085, 'Out'),
(98, 26, 'Purchase Request', 'Elleen', '51264', '1.00', '2018-05-07 13:43:31', 2139787, 'In'),
(99, 26, 'Purchase Request', 'Elleen', '163642', '1.00', '2018-05-07 13:43:31', 2139787, 'In'),
(100, 27, 'Purchase Request', 'æƒ æ™®å°å°sprocket', '43543', '1.00', '2018-05-07 13:53:19', NULL, 'In'),
(101, 19, 'Purchase Request', 'shoe', '23570', '1.00', '2018-05-08 06:14:19', 6983188, 'Out'),
(102, 4, 'Purchase Request', 'Test update inventory purchase', '12526', '1.00', '2018-05-16 09:35:14', 779751, 'Out'),
(103, 4, 'Inventory Request', 'Test update inventory', '12356', '1.00', '2018-05-16 09:35:14', 779751, 'Out'),
(105, 31, 'Inventory Request', 'Test shipping detail', '123456789', '1.00', '2018-05-21 13:11:52', 698311, 'Out'),
(106, 35, 'Inventory Request', 'Testing 123', '8851028001812', '1.00', '2018-05-21 14:11:00', NULL, 'In'),
(107, 35, 'Inventory Request', 'Testing barcode', '9556156009110', '1.00', '2018-05-22 01:45:32', NULL, 'In'),
(108, 35, 'Inventory Request', 'Testing barcode', '9556156009110', '1.00', '2018-05-22 01:47:14', NULL, 'In'),
(109, 35, 'Inventory Request', 'Testing barcode', '9556156009110', '1.00', '2018-05-22 01:48:25', NULL, 'In'),
(110, 35, 'Inventory Request', 'Ice lemon tea', '9556570501337', '2.00', '2018-05-22 01:48:25', NULL, 'In');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(20) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `user_id`, `action`, `created_at`) VALUES
(1, 0, 'designated Array', '2018-05-16 18:06:01'),
(2, 0, 'designated Array', '2018-05-16 18:06:01'),
(3, 1, 'received Array', '2018-05-20 23:37:54'),
(4, 0, 'registered LWE1526908305MY', '2018-05-21 13:11:52'),
(5, 0, 'send OUT 105', '2018-05-21 13:11:52'),
(6, 0, 'cleared 31', '2018-05-21 13:11:52'),
(7, 1, 'received Array', '2018-05-21 14:11:00'),
(8, 1, 'received 9556156009110', '2018-05-22 01:48:25'),
(9, 1, 'received 9556570501337', '2018-05-22 01:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_item` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` int(15) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `order_code` varchar(25) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `top_up_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `payment_id`, `user_id`, `order_item`, `link`, `category`, `quantity`, `remark`, `price`, `status`, `order_code`, `comment`, `datetime`, `top_up_id`) VALUES
(1, NULL, 5, 'International Waterproof 36H Eyeliner Liquid Pen Long Lasting Drawing Makeup', 'https://www.lazada.com.my/products/international-waterproof-36h-eyeliner-liquid-pen-long-lasting-drawing-makeup-i234067775-s305510359.html?spm=a2o4k.searchlistcategory.list.2.43974d60Cvb8cX&search=1', 'Health & Beauty', 1, 'test', NULL, 'Declined', NULL, 'Hi, we provide cross-border services. For Lazada Malaysia, you can order directly from them.', '2018-04-11 05:11:01', NULL),
(4, NULL, 4, 'International Waterproof 36H Eyeliner Liquid Pen Long Lasting Drawing Makeup', 'https://www.lazada.com.my/products/international-waterproof-36h-eyeliner-liquid-pen-long-lasting-drawing-makeup-i234067775-s305510359.html?spm=a2o4k.searchlistcategory.list.2.43974d60Cvb8cX&search=1', 'Health & Beauty', 1, 'test', '9.30', 'Ready to Pay', NULL, NULL, '2018-04-11 05:11:09', NULL),
(5, NULL, 6, 'JP', 'https://www.amazon.co.jp/gp/product/B01FWACWJY/ref=s9u_qpp_gw_i2?ie=UTF8&pd_rd_i=B01FWACWJY&pd_rd_r=31d178ce-3d41-11e8-bcb7-f56cd324eb66&pd_rd_w=KB17Q&pd_rd_wg=aa0W6&pf_rd_m=AN1VRQENFRJN5&pf_rd_s=&pf_rd_r=D6FM9H2YVSGS4XV0JBF6&pf_rd_t=36701&pf_rd_p=dff3a06', 'Others', 1, 'n/a', '74.40', 'Ready to Pay', NULL, NULL, '2018-04-11 05:13:52', NULL),
(6, NULL, 7, 'ç®€çº¦çŽ°ä»£é“è‰ºå®žæœ¨è½åœ°èŠ±æž¶èŠ±ç›†æž¶å®¢åŽ…é˜³å°ç»¿èèŠ±æž¶é˜¶æ¢¯å¤šå±‚èŠ±æž¶', 'https://detail.tmall.com/item.htm?id=541229464693&spm=a21wu.241046-my.4691948847.5.41cacaa39Y6x2G&scm=1007.15423.84311.100200300000001&pvid=a9e6fea3-0982-4e20-ab32-83262d680d79&skuId=3412258794469', 'Others', 1, '30x30x60', '62.00', 'Ready to Pay', NULL, NULL, '2018-04-12 05:40:34', NULL),
(8, 862821, 1, 'arenaæ³³é•œé˜²é›¾å‰‚ æ¸¸æ³³çœ¼é•œè¿åŠ¨VRé•œç‰‡è¿‘è§†æ³³é•œä¸“ä¸šæ¶‚æŠ¹é˜²é›¾æ¶²å–·å‰‚', 'https://detail.tmall.com/item.htm?spm=a230r.1.14.69.68d9176cn8fQcA&id=557600506772&ns=1&abbucket=13&skuId=3623153122524', 'Others', 1, ' ', '37.20', 'Received', '456', NULL, '2018-04-25 08:05:46', NULL),
(9, 9504814, 14, 'HSU GOPRO HERO 6/5 RECHARGEABLE KIT (2018 VERSION)', 'https://www.lazada.com.my/products/hsu-gopro-hero-65-rechargeable-kit-2018-version-i235221991-s307363586.html?spm=a2o4k.searchlist.list.5.61355961lGBd1y&search=1', 'Electronic Devices', 1, 'please deliver nicely', '93.00', 'Ready to Pay', NULL, NULL, '2018-04-27 00:44:03', NULL),
(11, NULL, 4, 'makeup brush', 'https://www.lazada.com.my/products/sinma-20-pcsset-make-up-brush-set-makeup-brush-set-tools-makeup-toiletry-kit-pink-black-i106802270-s108552092.html?spm=a2o4k.home.just4u.1.61a724f6fJbJZI&abtest=&pvid=04beabf9-0862-42b9-aba0-4e8b4a724e40&pos=1&abbucket=&', 'Health & Beauty', 1, 'test', '24.80', 'Ready to Pay', NULL, NULL, '2018-04-12 05:30:42', NULL),
(15, 6228015, 15, 'æ‰‹æœºåŒ…å°åŒ…åŒ…å¥³2017æ–°æ¬¾è¿·ä½ æ–œæŒŽåŒ…æ—¥éŸ©ç‰ˆæ½®å°æ¸…æ–°æ—¶å°šç™¾æ­é›¶é’±åŒ…', 'https://item.taobao.com/item.htm?spm=a21wu.241046-my.4691948847.135.41cacaa3BYi2Nq&scm=1007.15423.84311.100200300000005&id=565828747165&pvid=5f2850c2-50b8-4796-94d5-5dcc3ec12455', 'Others', 2, 'bag', '31.00', 'Received', 'AB123', NULL, '2018-04-27 03:05:35', NULL),
(16, 9626917, 17, 'KONG CHOON HONG', 'https://www.senheng.com.my/microsoft-surface-book2?gclid=EAIaIQobChMIrc6s84i02gIVGR4rCh1sEQ9iEAAYASAAEgIXfPD_BwE', 'Electronic Devices', 1, 'Microsoft Surface Book2', '11346.00', 'Ready to Pay', NULL, NULL, '2018-04-26 11:20:24', NULL),
(17, 714403, 3, 'Qi Wireless Charger Power Bank For iPhone X 8 Plusæ— çº¿å……ç”µå®', 'https://item.taobao.com/item.htm?spm=a230r.1.14.1.4ec94664XvdOmP&id=563075813502&ns=1&abbucket=1#detail', 'Electronic Devices', 1, 'white color', '136.40', 'Received', '123', NULL, '2018-04-26 03:12:12', NULL),
(19, 7092316, 16, 'xiaomiå°ç±³å®˜æ–¹æ——èˆ°åº—ç§»åŠ¨ç”µæº2 10000å……ç”µå®è¶…è–„ä¾¿æºå¤§å®¹é‡é‡‘å±ž', 'https://detail.tmall.com/item.htm?spm=a230r.1.14.91.3aa43204oU1TUW&id=540269011112&ns=1&abbucket=14&skuId=3706751054828', 'Electronic Devices', 1, 'power bank', '68.20', 'Received', '6087', NULL, '2018-04-25 03:54:21', NULL),
(21, 4507515, 15, 'Camel Slipper\'s pink;', 'https://detail.tmall.com/item.htm?id=567103718093&ali_refid=a3_430583_1006:1106112993:N:%E9%AA%86%E9%A9%BC%E5%A5%B3%E5%87%89%E9%9E%8B:824a5ff24f67f3d6af282690b1faa0db&ali_trackid=1_824a5ff24f67f3d6af282690b1faa0db&spm=a230r.1.14.1', 'Men\'s Fashion', 2, '##', '124.00', 'Received', 'DV33442', NULL, '2018-04-27 03:06:24', NULL),
(22, 4551013, 13, 'ohç»¿æ¤ èŠ±å›­ç§‹åƒæž¶ å¤å¤å’–è‰²ç®€æ˜“èŠ±æž¶æœ¨æž¶æˆ·å¤–ç½®ç‰©æž¶åŒ…é‚® ', 'https://item.taobao.com/item.htm?id=564912547858&ns=1&abbucket=18#detail', 'Others', 1, ' ', '51.46', 'Received', '5', NULL, '2018-04-25 08:07:42', NULL),
(23, NULL, 25, 'æˆ·å¤–é˜²è…å°åž‹å¤šå±‚å®žæœ¨èŠ±æž¶å­å®žæœ¨èŠ±å›­åº­é™¢é˜³å°ç½®ç‰©æž¶åŠå…°ç»¿èæœ¨æž¶ ', 'https://item.taobao.com/item.htm?id=560970610081&ns=1&abbucket=18#detail', 'Others', 1, ' ', '52.64', 'Ready to Pay', NULL, NULL, '2018-04-13 10:34:09', NULL),
(24, NULL, 27, 'IPHONE', 'http://test-buy.lwe.com.my/user/main.php#purchase', 'Electronic Devices', 10, 'TEST', '4960.00', 'Ready to Pay', NULL, NULL, '2018-04-13 10:34:30', NULL),
(25, 9010128, 28, 'TestName', 'www.TestURL.com', 'Electronic Devices', 1, 'Test Remarks', '62.00', 'Received', '3456234', NULL, '2018-05-04 02:53:54', NULL),
(26, 3923312, 12, 'Yvonne', 'https://detail.tmall.com/item.htm?id=563123007135&ns=1&abbucket=5&skuId=3709003747081', 'Women\'s Fashion', 1, 'XL Apricot color', '33.48', 'Received', '013', NULL, '2018-04-27 16:31:58', NULL),
(27, 7712129, 29, 'å¤©å¤©ç‰¹ä»·é«˜è…°æ ¼å­ç™¾è¤¶è£™æ¸¯å‘³çŸ­è£™éŸ©ç‰ˆå‡é¾„å­¦é™¢é£ŽulzzangåŠèº«è£™å¥³', 'https://item.taobao.com/item.htm?spm=a21wu.241046-my.4691948847.47.37cdcaa3xZCyxU&scm=1007.15423.84311.100200300000005&id=559577671153&pvid=e525d54a-73f9-450d-b0c1-e6a3670ffec7', 'Others', 1, 'colour: blue+khaki', '31.00', 'Received', '4896', NULL, '2018-04-27 15:33:00', NULL),
(29, NULL, 30, 'Asus Zenwatch 3 Strap', 'https://l.facebook.com/l.php?u=https%3A%2F%2Fitem.taobao.com%2Fitem.htm%3Fspm%3Da230r.1.14.39.50506dbeZASIwX%26id%3D562397987000%26ns%3D1%26abbucket%3D4%23detail&h=ATOHZcJFVs95X8SaL7iRWMCbCigmhgbR1iR3lnzhSqg2vhJTfjaVKPjdtinVg0UZW2H-kX5obxkdrYvc_Pg8-LReKE1', 'Electronic Devices', 1, 'black colours', '31.00', 'Ready to Pay', NULL, NULL, '2018-04-13 10:35:35', NULL),
(31, 6071635, 35, 'jacket', 'https://www.taobao.com/markets/tbhome/yhh-detail?contentId=2500000200517331119', 'Men\'s Fashion', 1, 'black', '62.00', 'Received', '122', NULL, '2018-04-17 06:23:19', NULL),
(32, 9846935, 35, 'jacket', 'https://www.taobao.com/markets/tbhome/yhh-detail?spm=a21wu.241046-my.2350523827.5.41cacaa3MyAJD2&contentId=2500000200517331119', 'Men\'s Fashion', 1, 'BLACK', '7378.00', 'Ready to Pay', NULL, NULL, '2018-04-17 06:58:12', NULL),
(33, 3113035, 35, 'jacket', 'https://www.taobao.com/markets/tbhome/yhh-detail?spm=a21wu.241046-my.2350523827.5.41cacaa3MyAJD2&contentId=2500000200517331119', 'Men\'s Fashion', 1, 'b', '7378.00', 'Received', '111', NULL, '2018-04-17 07:05:15', NULL),
(34, NULL, 5, 'Bag', 'https://detail.tmall.com/item.htm?spm=a230r.1.14.1.2b6049dfupRUz4&id=527573120870&cm_id=140105335569ed55e27b&abbucket=6', 'Others', 100, 'Pink colour', '85.56', 'Ready to Pay', NULL, NULL, '2018-04-20 01:35:07', NULL),
(35, 1951515, 15, 'Robot toy', 'https://item.taobao.com/item.htm?spm=a230r.1.14.37.68f47680u0uZ0U&id=561491968944&ns=1&abbucket=19#detail', 'Babies & Toys', 1, '1', '71.92', 'Received', 'AB123', NULL, '2018-04-27 03:05:35', NULL),
(36, 7997815, 15, 'asdf', 'asdf', 'Electronic Devices', 1, 'ads', '18.60', 'Received', 'HJ78826367', NULL, '2018-05-05 12:13:00', NULL),
(37, 5216736, 36, 'Coach Delancey Slim ', 'https://www.ebay.com/itm/Coach-Delancey-Slim-Silver-Dial-Ladies-Rose-Gold-tone-Watch-14502783/173249742930?_trkparms=%26rpp_cid%3D5ab29a07ca72460832e327e1%26rpp_icid%3D5ac3df98ebbb8c6dc68d5533', 'Men\'s Fashion', 1, 'buy this', '545.83', 'Ready to Pay', NULL, NULL, '2018-04-30 02:44:26', NULL),
(38, 4062737, 37, 'Cassa Eames Rectangular White Dining Table Only With Natural Wood Legs (120x60cm)', 'https://www.lazada.com.my/products/cassa-eames-rectangular-white-dining-table-only-with-natural-wood-legs-120x60cm-i122129665-s133884454.html?spm=a2o4k.product-not-exist-m.just4u.5.1ab5268dDPBbaZ&abtest=&pos=5&abbucket=&clickTrackInfo=ab75bcbb-9df9-4f41-9', 'TV& Home Appliances', 1, 'white colour', '274.02', 'Received', '153457892745', NULL, '2018-04-27 03:39:32', NULL),
(40, NULL, 38, 'Raspberry Pi 3 Model B Bluetooth 4.1 Wireless LAN 1 GB Ram with WiFi and 4 USB 2.0 Ports', 'https://www.lazada.com.my/products/raspberry-pi-3-model-b-bluetooth-41-wireless-lan-1-gb-ram-with-wifi-and-4-usb-20-ports-i11272332-s13888269.html?spm=a2o4k.searchlist.list.4.741c26dc5mHIKr&search=1', 'Electronic Devices', 1, ':)', '164.36', 'Ready to Pay', NULL, NULL, '2018-04-27 02:32:49', NULL),
(41, NULL, 20, 'Camera Tripot', 'https://www.lazada.com.my/products/weifeng-wt-3110a-lightweight-aluminum-camera-tripod-with-mobile-phone-holder-tripod-carry-case-i100013391-s100017456.html?spm=a2o4k.searchlist.list.1.119a71d5UPKJ3p&search=1', 'Accessories', 1, 'CYS', NULL, 'Declined', NULL, 'Hi, we provide cross-border services. For Lazada Malaysia, you can order directly from them.', '2018-04-27 04:22:52', NULL),
(42, 713525, 5, 'Cute u-type pillow children\'s head pillow sleep pillow cloth car computer chair pillow car doll pillow bed', 'https://item.taobao.com/item.htm?spm=a230r.1.14.152.13977f1ax2mf3z&id=568550686471&ns=1&abbucket=6#detail', 'Accessories', 10, 'Red stawberry u', '15.70', 'Ready to Pay', NULL, NULL, '2018-04-27 04:57:16', NULL),
(43, 725255, 5, 'Cute u-type pillow children\'s head pillow sleep pillow cloth car computer chair pillow car doll pillow bed', 'https://item.taobao.com/item.htm?spm=a230r.1.14.152.13977f1ax2mf3z&id=568550686471&ns=1&abbucket=6#detail', 'Others', 30, 'set of brown bears', '9.73', 'Top-up', NULL, NULL, '2018-04-27 04:50:04', NULL),
(44, 1164811, 11, 'test', 'www.google.com', 'Electronic Devices', 1, 'ok', '62.00', 'Received', '1890', NULL, '2018-05-06 03:38:12', NULL),
(45, 7712129, 29, 'æ°´å¢¨é’åŽå¤è£…æ–°æ¬¾å¥³è£…æ°”è´¨æ—¶å°šé€šå‹¤çŸ­è¢–ä¿®èº«ä¸­é•¿æ¬¾å°èŠ±è¿žè¡£è£™', 'https://detail.tmall.com/item.htm?abtest=_AB-LR32-PR32&pvid=7f277e48-4771-4e55-9c4d-6ac94c90bb96&pos=2&abbucket=_AB-M32_B4&acm=03054.1003.1.2768562&id=552917921504&scm=1007.16862.95220.23864_0', 'Women\'s Fashion', 1, 'M size', '265.36', 'Received', '8929', NULL, '2018-04-27 15:33:00', NULL),
(46, 8342412, 12, 'Yvonne', 'https://detail.tmall.com/item.htm?id=563123007135&ns=1&abbucket=5&sku_properties=1627207:30155', 'Women\'s Fashion', 1, 'Black', '7.44', 'Received', '123', NULL, '2018-04-27 17:00:04', NULL),
(47, 4411240, 40, 'Sneakers', 'https://www.nike.com/t/air-max-270-mens-shoe-DNTBjl4e/AH8050-002', 'Sports & Travel', 1, 'Black and White', '62.00', 'Received', '1120', NULL, '2018-04-28 03:38:37', NULL),
(48, NULL, 40, 'Sneakers', 'https://www.nike.com/t/air-max-270-mens-shoe-DNTBjl4e/AH8050-002', 'Sports & Travel', 1, 'Black and White', NULL, 'Declined', NULL, '-', '2018-04-28 05:40:34', NULL),
(49, 4224342, 42, 'å¤–å• ç³–æžœè‰²å¯æŠ˜å ä¾¿æºé˜²æ°´èƒŒåŒ… åŒè‚©åŒ… ä¹¦åŒ… è¿åŠ¨ä¼‘é—²åŒ… çš®è‚¤åŒ…', 'https://item.taobao.com/item.htm?spm=a21wu.241046-my.4691948847.47.41cacaa3w0QxUl&scm=1007.15423.84311.100200300000005&id=557513057671&pvid=681e5046-d7c0-428e-b0f9-b6b22f121909', 'Women\'s Fashion', 1, 'blue', '18.48', 'Received', '9283741', NULL, '2018-04-29 04:51:53', NULL),
(50, 366793, 3, 'æžåœ°ç«2016æ­£å“å¸ç¯·æˆ·å¤–3-4äººéœ²è¥é˜²é›¨å®¶åº­é‡Žè¥å…¨è‡ªåŠ¨å¸ç¯·å¥—è£…', 'https://item.taobao.com/item.htm?spm=a21wu.241046-my.4691948847.83.41cacaa39jS0FX&scm=1007.15423.84311.100200300000005&id=540106590164&pvid=60ccca34-d3f0-4f0a-9013-f419c81dc728', 'Accessories', 1, 'green', '319.30', 'Received', '463457', NULL, '2018-04-29 05:31:43', NULL),
(51, 366793, 3, 'æžåœ°ç«æˆ·å¤–æŠ“ç»’ç¡è¢‹å†…èƒ†è¶…è½»å¤æ˜¥ç§‹æˆ·å¤–éœ²è¥é‡Žè¥ç¡è¢‹åŠ åŽšä¿æš–', 'https://item.taobao.com/item.htm?spm=2013.1.20141003.8.661812a8pb65hM&scm=1007.10011.70203.100200300000001&id=526248403234&pvid=35a00220-871b-4e3b-81f7-472a5cf24eb6', 'Accessories', 1, 'green', '68.20', 'Received', '634522', NULL, '2018-04-29 05:31:43', NULL),
(52, 5215743, 43, 'knit stitch', 'https://item.taobao.com/item.htm?spm=a21wu.241046-my.4691948847.11.41cacaa3ywccEf&scm=1007.15423.84311.100200300000005&id=537344067098&pvid=1f0b84b1-5e94-4d12-9513-8e611ec33df2', 'Others', 1, 'good', '11.16', 'Received', '5853378', NULL, '2018-04-29 09:03:32', NULL),
(53, 8116444, 44, '2018æ˜¥å­£å¤–å¥—ç”·å¤¹å…‹æ—¥ç³»é’å°‘å¹´å¤§ç å®½æ¾è¿žå¸½è¡«æ½®æµéŸ©ç‰ˆå­¦ç”Ÿå¤–è¡£æœ', 'https://detail.tmall.com/item.htm?spm=a230r.1.14.77.15582a54PlaDxc&id=565358415486&ns=1&abbucket=8&sku_properties=1627207:28341', 'Men\'s Fashion', 1, 'l size, black', '85.56', 'Received', '3655134', NULL, '2018-04-29 13:03:55', NULL),
(54, 3074346, 46, 'Acustop', 'http://m.11street.my/productdetail/1-set-x-acustop-cataplasma-patch-6pcs-flurbiprofen-63059927', 'Health & Beauty', 1, '-', '620.00', 'Received', '6687', NULL, '2018-05-01 13:03:29', NULL),
(55, 6588348, 48, 'Ting Lee Ting', 'https://www.thebagstreet.com/collections/kanken/products/kanken-deep-red-folk', 'Accessories', 1, 'handle it with care', '62.00', 'Received', '45678', NULL, '2018-05-01 14:45:30', NULL),
(56, 332211, 1, 'Test Flow', 'test-buy.lwe.com.my/test-single-quote%27s/tests', 'Women\'s Fashion', 2, 'Single quote\'s test', '74.71', 'Received', '5196', NULL, '2018-05-02 06:37:11', NULL),
(57, NULL, 49, 'idontknow', 'http://www.lmall.my/aukey-cb-d16-apple-mfi-ultra-durable-nylon-lightning-cable-aukey-F513574-2007-01-Sale-I.htm?list_type=bs&_ga=2.39775331.1508911716.1525266394-1849773718.1512738147&_gac=1.123405689.1524669504.CjwKCAjwzoDXBRBbEiwAGZRIeJjMMkovcP3Ntd4KJ-R', 'Accessories', 1, 'hi', '6.20', 'Ready to Pay', NULL, NULL, '2018-05-02 13:44:07', NULL),
(58, 9664550, 50, 'Birkenstock', 'https://www.birkenstock.com.my/men/men-thong/men-thong-gizeh', 'Others', 1, '1', '12.40', 'Received', '3638', NULL, '2018-05-02 15:56:11', NULL),
(59, 5220151, 51, 'purchase1', 'facebook.com', 'Accessories', 1, 'testing purchase', '43.40', 'Ready to Pay', NULL, NULL, '2018-05-03 02:36:09', NULL),
(60, NULL, 51, 'chair', 'https://item.taobao.com/item.htm?scm=1007.15423.84311.100200300000005&id=543944563864&pvid=99b39a5d-7532-4208-b77b-4bc29818b272', 'Others', 1, 'furniture', '18.60', 'Ready to Pay', NULL, NULL, '2018-05-03 02:39:37', NULL),
(61, 6700652, 52, ' ç³–å®æ¬§æ´²æ­£å“ä»£è´­KENZOé«˜ç”°è´¤ä¸‰Peace World é»‘è‰²æ—…æ¸¸åŒè‚©åŒ…ä¹¦åŒ…', 'https://item.taobao.com/item.htm?id=556956913535&ali_trackid=2:mm_97357640_16312669_60996665:1525413640_331_479119169&spm=a21bo.7925826.192013.3.bfe04c0dQnLyV2', 'Men\'s Fashion', 1, 'black', '6.20', 'Received', '2341241', NULL, '2018-05-04 11:01:03', NULL),
(64, NULL, 55, 'Cute Cartoon Brown Bear Coin Saving Box', 'https://ezbuy.my/product/50955987.html', 'Accessories', 1, 'N/A', NULL, 'Declined', NULL, '1000', '2018-05-04 06:54:24', NULL),
(66, 9843754, 54, 'reverb pedal', 'https://www.lazada.com.my/products/eno-reverb-guitar-effect-pedal-true-bypass-i154872930-s183123656.html?spm=a2o4k.searchlist.list.1.2bb94478A1cH9K&search=1', 'Electronic Devices', 100, 'hello', '620.00', 'Received', '4739', NULL, '2018-05-04 08:14:05', NULL),
(67, 6648456, 56, 'Huawei P20 pro', 'https://www.lazada.com.my/products/huawei-p20-pro-61-6gb-ram-128gb-rom-leica-triple-optics-lens-exclusive-free-gifts-worth-rm-259-i324035957-s448222866.html?spm=a2o4k.searchlist.list.1.7aa241e6cN1SDV&search=1', 'Electronic Devices', 1, 'Blue', '62.00', 'Received', '3568', NULL, '2018-05-04 08:38:24', NULL),
(68, 4191157, 57, 'Plus Size Korean Style V-neck Silk Blouse Pullover Office Blouses Ladies Shirts', 'https://shopee.com.my/Plus-Size-Korean-Style-V-neck-Silk-Blouse-Pullover-Office-Blouses-Ladies-Shirts-i.39235442.780996547', 'Women\'s Fashion', 1, 'White ', '62.00', 'Received', '4829', NULL, '2018-05-04 08:44:29', NULL),
(69, 2916358, 58, 'ç‹¬å®¶åŽŸåˆ›æ³°å›½æ½®ç‰Œ2017å¤å­£æ–°æ¬¾é»‘ç™½å°èŠ±çœ¼ç›äº®ç‰‡å–‡å­è¢–ä¸ªæ€§åœ†é¢†T', 'https://item.taobao.com/item.htm?spm=a21bo.7929913.198967.22.2fb34174XF3ipZ&id=551310855838', 'Women\'s Fashion', 1, 'Black color ', '61.38', 'Received', '75846365', NULL, '2018-05-04 10:54:10', NULL),
(70, 8449859, 59, 'æ ¼å­è¡¬è¡«ç”·çŸ­è¢–å¤å­£çº¯æ£‰é’å¹´ä¼‘é—²æ—¶å°šæ ¼çº¹è¡¬è¡£è–„æ¬¾å¯¸ä¿®èº«æ½®æµç¾Žå¼', 'https://detail.tmall.com/item.htm?id=567804527314&ali_refid=a3_430583_1006:1102350103:N:%E7%94%B7%E8%A1%AC%E8%A1%AB:c7a6a9c2e2c951e1a596f262c9cfd790&ali_trackid=1_c7a6a9c2e2c951e1a596f262c9cfd790&spm=a230r.1.14.1', 'Men\'s Fashion', 1, '40, red blue', '7.44', 'Received', '4638743', NULL, '2018-05-05 00:54:54', NULL),
(71, 3946060, 60, 'è¿žè¡£è£™2018æ˜¥å¤æ–°æ¬¾å¥³è£…éŸ©ç‰ˆæ°”è´¨ååª›ä¸è§„åˆ™å‰çŸ­åŽé•¿ä¸­é•¿æ¬¾è•¾ä¸è£™', 'https://item.taobao.com/item.htm?spm=a230r.1.14.72.31b32140INmLY3&id=566676241575&ns=1&abbucket=1#detail', 'Women\'s Fashion', 1, 'm size, black colour', '19.84', 'Received', '45134', NULL, '2018-05-05 04:46:38', NULL),
(72, 6151461, 61, 'çº¢ç±³5plusæ‰‹æœºå£³ å°ç±³redmi5é•œé¢å¥—äº”é‡‘å±žè¾¹æ¡†æ—¥éŸ©ç”·å¥³æ½®ä¸ªæ€§åˆ›æ„', 'https://detail.tmall.com/item.htm?spm=a230r.1.14.6.7a5d7dd4yXKxyl&id=547659801296&cm_id=140105335569ed55e27b&abbucket=1', 'Accessories', 2, 'redmi 5 rose gold', '280.86', 'Received', '645353', NULL, '2018-05-05 00:58:10', NULL),
(73, 5140062, 62, '2 in 1 iphone android phone USB charge cable 1.5m stretch', 'https://m.intl.taobao.com/detail/detail.html?spm=a21wu.11154615-my.list.1&id=563529611440', 'Accessories', 1, 'Usb cable android', '9.30', 'Received', '32412', NULL, '2018-05-04 12:30:10', NULL),
(74, 8160463, 63, 'iPad ', 'https://www.mudah.my', 'Electronic Devices', 1, 'Eileen', '2762.72', 'Received', '67431', NULL, '2018-05-04 13:32:19', NULL),
(75, 3131764, 64, 'Raymond', 'https://www.lazada.com.my/products/i9876235-s12227078.html?spm=a2o4k.cart.0.0.25de49fbTFZPny&urlFlag=true&mp=1', 'Health & Beauty', 1, 'hi', '76.26', 'Received', '4563', NULL, '2018-05-04 13:18:16', NULL),
(76, 9710365, 65, 'T-Shirt', 'https://detail.tmall.com/item.htm?spm=a230r.1.14.14.7c527420kvu1hV&id=528622610754&cm_id=140105335569ed55e27b&abbucket=19&skuId=3473317628866', 'Men\'s Fashion', 1, 'æµ…ç°è‰²ä¸Žéº»ç°è‰²', '42.16', 'Received', '7538526', NULL, '2018-05-04 15:10:37', NULL),
(77, 3088166, 66, 'ä¸Šæµ·æ•…äº‹çœŸä¸ä¸å·¾å¥³ç™¾æ­æ­å·žä¸ç»¸å¤å­£100%æ¡‘èš•ä¸å›´å·¾æŠ«è‚©ä¸“æŸœæ­£å“', 'https://detail.tmall.com/item.htm?spm=a230r.1.14.14.cb225bfbL2u0ZM&id=530633776552&cm_id=140105335569ed55e27b&abbucket=1', 'Women\'s Fashion', 1, 'å‡¡å°”èµ›ç²‰è‰²', '6.20', 'Received', 'KJ987654', NULL, '2018-05-05 12:45:53', NULL),
(78, 818613, 3, 'Test1', '1', 'Electronic Devices', 1, '1', '0.62', 'Received', '1234', NULL, '2018-05-05 05:29:43', NULL),
(79, 818613, 3, 'Test2', '2', 'Accessories', 2, '2', '1.24', 'Received', '2345', NULL, '2018-05-05 05:29:43', NULL),
(80, 882743, 3, 'Test3', '3', 'TV& Home Appliances', 3, '3', '1.86', 'Received', '3456', NULL, '2018-05-05 05:29:43', NULL),
(81, 882743, 3, 'Test4', '4', 'Health & Beauty', 4, '4', '2.48', 'Received', '4567', NULL, '2018-05-05 05:29:43', NULL),
(82, 7334967, 67, 'æ‰«åœ°ç‹— æ‰«åœ°æ‹–åœ°æœºå™¨äººä¸€ä½“æœº å¾·å›½æ™ºèƒ½å¸å°˜å™¨å®¶ç”¨å…¨è‡ªåŠ¨æ´—æ“¦åœ°æœº', 'https://detail.tmall.com/item.htm?spm=a230r.1.14.3.652644c6Qtbkqj&id=551511531249&cm_id=140105335569ed55e27b&abbucket=1&skuId=3534547303357', 'Electronic Devices', 1, 'gold', '867.38', 'Received', '6639', NULL, '2018-05-05 12:45:53', NULL),
(83, 1714068, 68, 'æ­£å“å¡å¸ä¹é³„é±¼é•¿æ¬¾é’±åŒ…ç”·çœŸçš®é’å¹´å¤´å±‚ç‰›çš®é’±å¤¹ç”·å£«é’±åŒ…æ‹‰é“¾çš®å¤¹', 'https://detail.tmall.com/item.htm?spm=a230r.1.14.14.46b71b0aF1GTpj&id=561448399273&cm_id=140105335569ed55e27b&abbucket=1', 'Women\'s Fashion', 1, 'type 6, black color', '123.38', 'Received', '9862653', NULL, '2018-05-05 12:46:57', NULL),
(84, 7592869, 69, 'å¸ƒæœ—ç†Šå¯å¦®å…”iphone xæƒ…ä¾£æ‰‹æœºå£³ é˜²æ‘”åŠ åŽšé€æ˜Žè½¯å£³è‹¹æžœ6/7/8plus', 'https://item.taobao.com/item.htm?id=564001457900&ali_refid=a3_430582_1006:1123815852:N:%E8%8B%B9%E6%9E%9Cx%E9%80%8F%E6%98%8E%E5%A3%B3:8218e0ec5d701faccf7cd6c101cda023&ali_trackid=1_8218e0ec5d701faccf7cd6c101cda023&spm=a230r.1.14.1#detail', 'Accessories', 1, 'å¸ƒæœ—ç†Šiphone x', '13.02', 'Received', 'JJ87632748', NULL, '2018-05-05 12:46:57', NULL),
(85, 6432470, 70, 'Wireless Bluetooth Speaker Selfie Stick/Power Bank/Phone', 'https://item.taobao.com/item.htm?spm=a230r.1.14.38.139d4664tvRsWn&id=568990062603&ns=1&abbucket=1#detail', 'Accessories', 1, 'white color', '79.98', 'Received', '4829', NULL, '2018-05-05 12:46:57', NULL),
(86, 5481371, 71, 'è£™å­å¥³å¤æ— è¢–å¤å¤å­¦é™¢é£Žå°‘å¥³æ£‰ç«‹æ–¹2018æ–°æ¬¾å¥³è£…æ¡çº¹ä¸€å­—è‚©è¿žè¡£è£™', 'https://detail.tmall.com/item.htm?spm=a230r.1.14.15.3f6b2140DaCaor&id=566954323444&cm_id=140105335569ed55e27b&abbucket=1', 'Women\'s Fashion', 1, 'xl, whilte', '54.56', 'Received', '7482382', NULL, '2018-05-05 07:36:58', NULL),
(87, 6148172, 72, 'Oece2018å¤è£…æ–°æ¬¾å¥³è£… åœ†é¢†ä¸Šè¡£åŠè¢–æ—¶å°šå­¦ç”ŸéŸ©ç‰ˆç»å…¸æ¡çº¹çŸ­è¢–Tæ¤', 'https://detail.tmall.com/item.htm?id=566243503593&ns=1&abbucket=10', 'Women\'s Fashion', 1, 'S size', '169.88', 'Received', '18490', NULL, '2018-05-05 12:14:16', NULL),
(88, 2374974, 74, 'ã€è‡ªè¥ã€‘æš´èµ°çš„èèŽ‰è¿åŠ¨è®­ç»ƒç‘œä¼½é•¿è£¤å¥³ç´§èº«å¼¹åŠ›é€æ°”è·‘æ­¥å¥èº«è£¤å­', 'https://detail.tmall.com/item.htm?id=563510696854', 'Women\'s Fashion', 1, '-', '62.00', 'Received', '12423', NULL, '2018-05-05 12:54:07', NULL),
(89, 6095375, 75, 'Sony 55\'\' UHD Smart LED TV KD55X7000E (2 Years Sony Malaysia Warranty)', 'https://www.lazada.com.my/products/sony-55-uhd-smart-led-tv-kd55x7000e-2-years-sony-malaysia-warranty-i204334104-s252826472.html?search=1', 'TV& Home Appliances', 1, 'Home TV', '6.20', 'Received', '7210', NULL, '2018-05-05 15:22:02', NULL),
(90, 4343776, 76, 'Used - Canon Speedlite 320EX', 'http://www.kldslr.com/Used-Canon-Speedlite-320EX-400.00.html-18032923712', 'Electronic Devices', 1, 'Please use DHL', '620.00', 'Received', '323067', NULL, '2018-05-05 15:24:17', NULL),
(91, 5630033, 33, 'Cute Phone Casing Handphone Cover Mobile Phone Case for VIVO V5s (V5)', 'https://www.lazada.com.my/products/cute-phone-casing-handphone-cover-mobile-phone-case-for-vivo-v5s-v5-i147015964-s172056514.html?', 'Accessories', 1, 'Pink colour', '620.00', 'Received', '6431', NULL, '2018-05-06 10:33:02', NULL),
(92, 7335677, 77, 'Ammeltz Yoko Yoko Stiff Shoulder Muscular Aches 48ml', 'https://www.lazada.com.my/products/ammeltz-yoko-yoko-stiff-shoulder-muscular-aches-48ml-i16776405-s20663806.html?spm=a2o4k.home.just4u.7.75f824f69NS6Nu&abtest=&pvid=12df58a0-7bab-421d-9a86-49225ebedff4&pos=7&abbucket=&clickTrackInfo=pvid%3A12df58a0-7bab-4', 'Health & Beauty', 1, 'Testing', '6.20', 'Received', '34694', NULL, '2018-05-06 12:12:12', NULL),
(93, 9892678, 78, 'Multi cooker', 'https://www.lazada.com.my/products/khind-multi-cooker-mc12s-i217737218-s275769946.html?spm=a2o4k.home.flashSale.6.75f824f6Fk9a3L&search=1&mp=1&scm=1003.4.icms-zebra-5000130-2723038.ITEM_217737218_2380777', 'Electronic Devices', 1, 'steel', '6.20', 'Received', '124', NULL, '2018-05-06 14:58:35', NULL),
(94, 3906579, 79, 'testing', 'testing.com', 'TV& Home Appliances', 5, 'some request', '7.44', 'Received', '129', NULL, '2018-05-06 15:10:48', NULL),
(95, 2440181, 81, 'In The Fall Of The New South Korean Baby With Toddlers Single Baby Shoes Manufacturer 0 And 1 Year Old Baby A16 Denim Blue', 'https://www.lazada.com.my/products/in-the-fall-of-the-new-south-korean-baby-with-toddlers-single-baby-shoes-manufacturer-0-and-1-year-old-baby-a16-denim-blue-i18324000-s22540056.html?spm=a2o4k.searchlist.list.1.75b84fdbJBZTg2&search=1', 'Babies & Toys', 1, 'This is a gift', '6.20', 'Received', '123', NULL, '2018-05-07 02:29:44', NULL),
(96, 3490282, 82, 'Michelle', 'https://www.lazada.com.my/products/yousiju-bathroom-multi-layered-wall-mounted-rack-i176665737-s209853520.html?spm=a2o4k.pdp.recommendation_1.5.54574c99Y0KYPZ&mp=1&scm=1007.16389.99110.0&clickTrackInfo=21a5c1d2-d7bc-47a5-bfad-50b98eb30238__176665737__1000', 'Others', 1, 'Home & Living', '0.62', 'Received', '14567', NULL, '2018-05-07 07:03:46', NULL),
(97, 7563283, 83, 'Mini boarding box', 'Www.lazanda.com.my', 'Sports & Travel', 1, 'Ok ', '0.62', 'Received', '5643864', NULL, '2018-05-07 07:15:42', NULL),
(98, NULL, 84, 'Dennis', 'https://item.taobao.com/item.htm?spm=a230r.1.14.15.13fc6db8iKpAEx&id=544587154104&ns=1&abbucket=13#detail', 'Men\'s Fashion', 1, 'Special arrangement', '7.44', 'Ready to Pay', NULL, NULL, '2018-05-07 09:52:28', NULL),
(99, 5504585, 85, 'Retro Eiffel Tower Pen Pencil Case Holder Stationery Storage Wooden Box', 'https://www.lazada.com.my/products/retro-eiffel-tower-pen-pencil-case-holder-stationery-storage-wooden-box-i123630874-s135834303.html?spm=a2o4k.searchlist.list.1.4eb72f40i3clrV&search=1', 'Others', 1, '-', '7.44', 'Received', '123', NULL, '2018-05-07 12:23:06', NULL),
(100, 3955687, 87, 'Elleen', ' https://shopee.com.my/bodystore.my/16954460', 'Health & Beauty', 1, 'Nothing to remark', '6.20', 'Received', '51264', NULL, '2018-05-07 13:41:37', NULL),
(101, 4815386, 86, 'æƒ æ™®å°å°sprocket', 'https://m.intl.taobao.com/detail/detail.html?spm=a21wu.11154615-my.list.4&id=543800840466', 'Electronic Devices', 1, 'black', '6.20', 'Received', '43543', NULL, '2018-05-07 13:53:19', NULL),
(102, 3955687, 87, 'Elleen', ' https://shopee.com.my/bodystore.my/16954460', 'Women\'s Fashion', 1, 'Nothing to remark', '6.20', 'Received', '163642', NULL, '2018-05-07 13:41:37', NULL),
(104, 1090888, 88, 'shoe', 'https://detail.tmall.com/item.htm?id=543787157958&spm=a21bo.7925826.192013.4.7e264c0dLrsKwd&spm=a21bo.7925826.192013.4.7e264c0dLrsKwd&track_params={\"jpFeedId\":\"1200163064257\"}&track_params={\"jpFeedId\":\"1200163064257\"}&scm=1007.12846.65991.999999999999999&', 'Men\'s Fashion', 1, 'send me on time', '7.44', 'Received', '23570', NULL, '2018-05-08 06:10:31', NULL),
(105, 915281, 1, 'Test update inventory purchase', 'ww.google.com', 'Electronic Devices', 1, 'none', '0.62', 'Received', '12526', NULL, '2018-05-14 13:08:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(45) NOT NULL,
  `amount` decimal(50,2) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `top_up_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `datetime`, `title`, `amount`, `file`, `type`, `status`, `top_up_id`) VALUES
(212443, 3, '2018-05-05 05:30:44', 'Pay Order by MOLPay', '15.00', NULL, NULL, 'Waiting for Accept', NULL),
(284961, 1, '2018-05-03 02:27:59', 'Pay Shipping', '3.00', '88761-35703-paper-sheet-hand-drawn-interface-file-symbol.png', 'image/png', 'Completed', NULL),
(332211, 1, '2018-05-02 04:49:21', 'Pay Order', '149.00', '41149-35703-paper-sheet-hand-drawn-interface-file-symbol.png', 'image/png', 'Completed', NULL),
(355873, 3, '2018-04-29 05:34:03', 'Pay Shipping', '255.00', '4084-receipt.jpg', 'image/jpeg', 'Completed', NULL),
(366793, 3, '2018-04-29 05:29:03', 'Pay Order', '388.00', '29605-money.jpg', 'image/jpeg', 'Completed', NULL),
(424153, 3, '2018-05-06 05:49:04', 'Pay Order by MOLPay', '30.00', NULL, NULL, 'Completed', NULL),
(467743, 3, '2018-05-05 06:14:36', 'Pay Order by MOLPay', '500.00', NULL, NULL, 'Waiting for Accept', NULL),
(585605, 5, '2018-04-27 04:44:22', 'Pay Order', '0.00', '78825-receipt.png', 'image/png', 'Declined', NULL),
(698311, 1, '2018-05-21 13:11:39', 'Pay Shipping', '15.00', '12689-91750-200.png', 'image/png', 'Completed', NULL),
(714403, 3, '2018-04-25 10:53:58', 'Pay Order by MOLPay', '136.00', NULL, NULL, 'Completed', NULL),
(725255, 5, '2018-04-27 04:48:50', 'Pay Order', '292.00', '16268-receipt.png', 'image/png', 'Waiting for Accept', NULL),
(769391, 1, '2018-04-19 07:37:46', 'Pay Shipping', '15.00', '35299-27797449_10213134876103884_3891458820462469613_o.jpg', 'image/jpeg', 'Completed', NULL),
(779751, 1, '2018-05-16 09:35:03', 'Pay Shipping', '30.00', '2131-170px-receiptswiss.jpg', 'image/jpeg', 'Completed', NULL),
(818613, 3, '2018-05-05 05:28:26', 'Pay Order by MOLPay', '3.00', NULL, NULL, 'Completed', NULL),
(823761, 1, '2018-05-03 02:28:17', 'Pay Shipping', '300.00', '19839-35703-paper-sheet-hand-drawn-interface-file-symbol.png', 'image/png', 'Completed', NULL),
(837413, 3, '2018-05-05 06:15:25', 'Pay Order by MOLPay', '100.00', NULL, NULL, 'Waiting for Accept', NULL),
(840352, 2, '2018-05-09 10:25:01', 'Reload Point', '1234.00', '12730-target-receipt.jpg', 'image/jpeg', 'Completed', NULL),
(862821, 1, '2018-04-25 03:53:28', 'Pay Order', '37.00', '31529-170px-receiptswiss.jpg', 'image/jpeg', 'Completed', NULL),
(882743, 3, '2018-05-05 05:28:42', 'Pay Order by MOLPay', '16.00', NULL, NULL, 'Completed', NULL),
(912111, 1, '2018-05-06 09:03:31', 'Pay Shipping', '315.00', '94259-35703-paper-sheet-hand-drawn-interface-file-symbol.png', 'image/png', 'Completed', NULL),
(915281, 1, '2018-05-14 13:08:25', 'Pay Order', '1.00', '49241-170px-receiptswiss.jpg', 'image/jpeg', 'Completed', NULL),
(930643, 3, '2018-04-29 05:33:23', 'Reload Point', '70.00', '71742-Moneys.jpg', 'image/jpeg', 'Completed', NULL),
(979771, 1, '2018-05-04 13:25:40', 'Pay Shipping', '300.00', '20940-screen-shot-2018-05-04-at-9.23.39-pm.png', 'image/png', 'Waiting for Accept', NULL),
(1031264, 64, '2018-05-04 13:27:32', 'Pay Shipping', '75.00', '39124-print_payment_receipt.jpg', 'image/jpeg', 'Completed', NULL),
(1069243, 43, '2018-04-29 11:43:30', 'Reload Point', '60.00', '57455-fox.jpg', 'image/jpeg', 'Completed', NULL),
(1090888, 88, '2018-05-08 06:04:35', 'Pay Order', '7.00', '21102-a-bornean-fantasie_fb_v3.jpg', 'image/jpeg', 'Completed', NULL),
(1131944, 44, '2018-04-29 13:07:01', 'Pay Shipping', '89.00', '90633-pjatteryd.jpg', 'image/jpeg', 'Completed', NULL),
(1164811, 11, '2018-05-06 03:26:53', 'Pay Order by MOLPay', '62.00', NULL, NULL, 'Completed', NULL),
(1169442, 42, '2018-04-29 04:55:24', 'Reload Point', '100.00', '29053-receiptss.png', 'image/png', 'Completed', NULL),
(1244081, 81, '2018-05-07 03:28:34', 'Reload Point', '2000.00', '14949-main-qimg-8aa597ee2d773fce151545846c9d08a0.png', 'image/png', 'Completed', NULL),
(1247244, 44, '2018-04-29 13:02:02', 'Reload Point', '30.00', '55628-solar eclipse.jpg', 'image/jpeg', 'Completed', NULL),
(1425171, 71, '2018-05-05 07:36:34', 'Pay Shipping', '33.00', '74042-lipstick1.jpg', 'image/jpeg', 'Completed', NULL),
(1449229, 29, '2018-04-27 15:46:37', 'Pay Shipping', '29.00', '26661-received_10213768832832406.png', 'image/png', 'Completed', NULL),
(1636761, 61, '2018-05-05 04:46:08', 'Pay Shipping', '5.00', '9121-star3.jpg', 'image/jpeg', 'Completed', NULL),
(1714068, 68, '2018-05-05 12:07:59', 'Pay Order', '123.00', '23150-bag1.jpg', 'image/jpeg', 'Completed', NULL),
(1951515, 15, '2018-04-27 02:38:25', 'Pay Order by MOLPay', '72.00', NULL, NULL, 'Completed', NULL),
(2046974, 74, '2018-05-05 12:57:14', 'Reload Point', '1000.00', '49382-download.png', 'image/png', 'Completed', NULL),
(2075568, 68, '2018-05-05 06:45:50', 'Reload Point', '30.00', '34355-bag.jpg', 'image/jpeg', 'Completed', NULL),
(2139364, 64, '2018-05-04 13:34:17', 'Reload Point', '1000.00', '85353-Print_Payment_Receipt.JPG', 'image/jpeg', 'Completed', NULL),
(2142977, 77, '2018-05-06 12:17:13', 'Pay Shipping', '15.00', '54076-20170212_195412.jpg', 'image/jpeg', 'Completed', NULL),
(2374974, 74, '2018-05-05 12:53:32', 'Pay Order', '62.00', '13162-download.png', 'image/png', 'Completed', NULL),
(2399177, 77, '2018-05-06 12:22:27', 'Reload Point', '1000.00', '52129-20170212_195406.jpg', 'image/jpeg', 'Completed', NULL),
(2413172, 72, '2018-05-05 12:17:45', 'Pay Shipping', '15.00', '19582-35703-paper-sheet-hand-drawn-interface-file-symbol.png', 'image/png', 'Completed', NULL),
(2435660, 60, '2018-05-04 12:59:14', 'Reload Point', '12.00', '32406-shirt.jpg', 'image/jpeg', 'Completed', NULL),
(2440181, 81, '2018-05-07 02:28:34', 'Pay Order', '6.00', '69349-main-qimg-8aa597ee2d773fce151545846c9d08a0.png', 'image/png', 'Completed', NULL),
(2593958, 58, '2018-05-04 10:55:35', 'Reload Point', '60.00', '59108-Amazing-Computer-Backgrounds-wallpaper-background-photos-download-hd-free-windows-wallpaper-samsung-iphone-1920x1080.jpg', 'image/jpeg', 'Completed', NULL),
(2605959, 59, '2018-05-04 12:59:21', 'Reload Point', '45.00', '79106-bmw.jpg', 'image/jpeg', 'Completed', NULL),
(2748382, 82, '2018-05-07 07:38:06', 'Reload Point', '2000.00', '58541-daily-to-do-list-portrait.png', 'image/png', 'Completed', NULL),
(2782052, 52, '2018-05-04 11:03:47', 'Pay Shipping', '21.00', '37131-dota1.jpg', 'image/jpeg', 'Completed', NULL),
(2837659, 59, '2018-05-05 04:45:57', 'Pay Shipping', '80.00', '58981-x6.jpg', 'image/jpeg', 'Completed', NULL),
(2916358, 58, '2018-05-04 10:53:13', 'Pay Order', '61.00', '40605-2xqqpwg.jpg', 'image/jpeg', 'Completed', NULL),
(2948662, 62, '2018-05-04 12:28:48', 'Pay Order', '9.00', '13082-tmpdoodle1525436883147.jpg', 'image/jpeg', 'Completed', NULL),
(3035671, 71, '2018-05-05 07:14:00', 'Reload Point', '70.00', '23758-lipstick.jpg', 'image/jpeg', 'Completed', NULL),
(3074346, 46, '2018-05-01 13:03:01', 'Pay Order', '620.00', '25287-32cf81ba-1990-4c76-bfdf-4312b5183eab.jpeg', 'image/jpeg', 'Completed', NULL),
(3088166, 66, '2018-05-05 07:54:06', 'Pay Order', '6.00', '10220-disney.jpg', 'image/jpeg', 'Completed', NULL),
(3113035, 35, '2018-04-17 07:04:36', 'Pay Order', '7378.00', '11317-rnog6uyu_400x400.jpg', 'image/jpeg', 'Completed', NULL),
(3131764, 64, '2018-05-04 13:17:16', 'Pay Order', '76.00', '4672-print_payment_receipt.jpg', 'image/jpeg', 'Completed', NULL),
(3325035, 35, '2018-04-17 06:54:24', 'Pay Order', '7378.00', '61796-rnog6uyu_400x400.jpg', 'image/jpeg', 'Declined', NULL),
(3332478, 78, '2018-05-06 15:04:58', 'Pay Shipping', '180.00', '36565-0435727_l.jpg', 'image/jpeg', 'Completed', NULL),
(3353888, 88, '2018-05-09 10:25:10', 'Reload Point', '1234.00', '12779-A Bornean Fantasie_FB_v3.jpg', 'image/jpeg', 'Completed', NULL),
(3490282, 82, '2018-05-07 07:03:22', 'Pay Order', '1.00', '79007-daily-to-do-list-portrait.png', 'image/png', 'Completed', NULL),
(3546565, 65, '2018-05-04 15:16:15', 'Pay Shipping', '53.00', '29074-14463761_1103752033049851_345280147_n.jpg', 'image/jpeg', 'Completed', NULL),
(3559361, 61, '2018-05-04 12:59:28', 'Reload Point', '564.00', '52995-kim soo hyun.jpg', 'image/jpeg', 'Completed', NULL),
(3656085, 85, '2018-05-07 12:28:25', 'Pay Shipping', '15.00', '75320-001.jpg', 'image/jpeg', 'Completed', NULL),
(3690775, 75, '2018-05-05 15:27:24', 'Pay Shipping', '150.00', '96530-tb15byfh4ri8kjjy0fpxxb5hvxa-200-200.png', 'image/png', 'Completed', NULL),
(3735585, 85, '2018-05-07 12:31:56', 'Reload Point', '1000.00', '49988-002.jpg', 'image/jpeg', 'Completed', NULL),
(3745062, 62, '2018-05-04 12:58:51', 'Pay Shipping', '9.00', '49678-tmpdoodle1525437355501.jpg', 'image/jpeg', 'Declined', NULL),
(3783262, 62, '2018-05-04 13:00:01', 'Pay Order by MOLPay', '5000.00', NULL, NULL, 'Waiting for Accept', NULL),
(3906579, 79, '2018-05-06 15:02:29', 'Pay Order', '37.00', '77966-pdf-sample.pdf', 'application/pdf', 'Completed', NULL),
(3923312, 12, '2018-04-27 16:31:16', 'Pay Order', '33.00', '73976-whatsapp-image-2018-04-28-at-12.27.20-am.jpeg', 'image/jpeg', 'Completed', NULL),
(3946060, 60, '2018-05-05 04:45:25', 'Pay Order', '20.00', '63479-shirt1.jpg', 'image/jpeg', 'Completed', NULL),
(3955687, 87, '2018-05-07 13:40:01', 'Pay Order', '12.00', '23201-download.png', 'image/png', 'Completed', NULL),
(4062737, 37, '2018-04-27 03:04:03', 'Pay Order', '274.00', '62936-1238.jpg', 'image/jpeg', 'Completed', NULL),
(4191157, 57, '2018-05-04 08:43:04', 'Pay Order', '62.00', '47736-write-a-receipt-step-9-version-2.jpg', 'image/jpeg', 'Completed', NULL),
(4203860, 60, '2018-05-05 04:45:45', 'Pay Shipping', '30.00', '85059-fashion.jpg', 'image/jpeg', 'Completed', NULL),
(4224342, 42, '2018-04-29 04:51:08', 'Pay Order', '18.00', '10008-receipt.png', 'image/png', 'Completed', NULL),
(4288966, 66, '2018-05-05 07:42:00', 'Pay Shipping', '75.00', '34371-disney1.jpg', 'image/jpeg', 'Waiting for Accept', NULL),
(4343776, 76, '2018-05-05 15:23:55', 'Pay Order', '620.00', '86437-170px-receiptswiss.jpg', 'image/jpeg', 'Completed', NULL),
(4411240, 40, '2018-04-28 03:37:27', 'Pay Order', '62.00', '88640-screenshot_20180428-114055.png', 'image/png', 'Completed', NULL),
(4507515, 15, '2018-04-12 08:29:03', 'Pay Order', '248.00', '43791-c_users_daphne_appdata_local_packages_microsoft.skypeapp_kzf8qxf38zg5c_localstate_30e273d1-7038-4f11-9219-6680cfa28af0.png', 'image/png', 'Completed', NULL),
(4525616, 16, '2018-04-28 03:22:53', 'Pay Shipping', '9.00', '49750-b4520d4a-a345-4993-aee1-3de9dbe4e13a.png', 'image/png', 'Declined', NULL),
(4551013, 13, '2018-04-25 03:58:18', 'Pay Order', '51.00', '89601-images.jpeg', 'image/jpeg', 'Completed', NULL),
(4671769, 69, '2018-05-05 07:46:36', 'Pay Shipping', '20.00', '45423-graph-e.jpg', 'image/jpeg', 'Waiting for Accept', NULL),
(4701469, 69, '2018-05-05 06:46:22', 'Reload Point', '88.00', '30807-draw.jpg', 'image/jpeg', 'Completed', NULL),
(4761872, 72, '2018-05-05 12:20:27', 'Pay Shipping', '15.00', '86019-35703-paper-sheet-hand-drawn-interface-file-symbol.png', 'image/png', 'Completed', NULL),
(4785883, 83, '2018-05-07 07:20:05', 'Pay Shipping', '15.00', '72471-img-20180507-wa0043.jpg', 'image/jpeg', 'Completed', NULL),
(4815386, 86, '2018-05-07 13:52:58', 'Pay Order', '6.00', '58834-12565635601173193823eye.svg.hi.png', 'image/png', 'Completed', NULL),
(4912657, 57, '2018-05-04 08:52:18', 'Reload Point', '484.00', '39750-Write-a-Receipt-Step-9-Version-2.jpg', 'image/jpeg', 'Completed', NULL),
(5085548, 48, '2018-05-01 15:00:59', 'Reload Point', '200.00', '80372-TestingReceipt.txt', 'text/plain', 'Completed', NULL),
(5140062, 62, '2018-05-04 12:28:53', 'Pay Order', '9.00', '5073-tmpdoodle1525436883147.jpg', 'image/jpeg', 'Waiting for Accept', NULL),
(5215743, 43, '2018-04-29 08:57:01', 'Pay Order', '11.00', '10999-restaurant-cutlery-circular-symbol-of-a-spoon-and-a-fork-in-a-circle_318-61086.jpg', 'image/jpeg', 'Completed', NULL),
(5237946, 46, '2018-05-01 13:14:19', 'Pay Shipping', '1500.00', '28094-1bc46358-d949-445c-8b70-7c9dbd3e3632.jpeg', 'image/jpeg', 'Completed', NULL),
(5304370, 70, '2018-05-05 12:13:19', 'Pay Shipping', '9.00', '6425-medical1.jpg', 'image/jpeg', 'Completed', NULL),
(5333274, 74, '2018-05-05 12:56:56', 'Pay Shipping', '15.00', '75534-download.png', 'image/png', 'Completed', NULL),
(5481371, 71, '2018-05-05 07:36:13', 'Pay Order', '55.00', '65640-lipstick2.jpg', 'image/jpeg', 'Completed', NULL),
(5492767, 67, '2018-05-05 12:18:48', 'Pay Shipping', '20.00', '95113-q.jpg', 'image/jpeg', 'Completed', NULL),
(5504585, 85, '2018-05-07 12:18:34', 'Pay Order', '7.00', '77021-001.jpg', 'image/jpeg', 'Completed', NULL),
(5566816, 16, '2018-04-29 16:00:10', 'Reload Point', '631.00', '25291-30715491_10210889630297087_1437263664045359104_n.jpg', 'image/jpeg', 'Completed', NULL),
(5630033, 33, '2018-05-06 10:31:58', 'Pay Order', '620.00', '94251-download.png', 'image/png', 'Completed', NULL),
(5702279, 79, '2018-05-06 15:15:43', 'Reload Point', '30000.00', '42121-pdf-sample.pdf', 'application/pdf', 'Completed', NULL),
(5756412, 12, '2018-04-27 17:18:58', 'Pay Shipping', '180.00', '36431-whatsapp-image-2018-04-28-at-12.27.20-am.jpeg', 'image/jpeg', 'Completed', NULL),
(5855965, 65, '2018-05-04 15:17:29', 'Reload Point', '85.00', '14804-14463761_1103752033049851_345280147_n.jpg', 'image/jpeg', 'Completed', NULL),
(5920775, 75, '2018-05-05 15:27:37', 'Reload Point', '10000.00', '17107-TB15BYfh4rI8KJjy0FpXXb5hVXa-200-200.png', 'image/png', 'Completed', NULL),
(5946112, 12, '2018-04-27 16:44:41', 'Pay shipping by Points', '300.00', NULL, NULL, 'Completed', NULL),
(6071635, 35, '2018-04-17 06:22:05', 'Pay Order', '62.00', '65882-170px-receiptswiss.jpg', 'image/jpeg', 'Completed', NULL),
(6095375, 75, '2018-05-05 15:21:08', 'Pay Order', '6.00', '82974-tb15byfh4ri8kjjy0fpxxb5hvxa-200-200.png', 'image/png', 'Completed', NULL),
(6148172, 72, '2018-05-05 12:10:53', 'Pay Order', '170.00', '51860-35703-paper-sheet-hand-drawn-interface-file-symbol.png', 'image/png', 'Completed', NULL),
(6151461, 61, '2018-05-05 00:54:09', 'Pay Order', '562.00', '99726-star.jpg', 'image/jpeg', 'Completed', NULL),
(6228015, 15, '2018-04-12 07:59:15', 'Pay Order', '62.00', '31632-payment-daphne@unixus.com.my.png', 'image/png', 'Completed', NULL),
(6272454, 54, '2018-05-04 08:19:58', 'Pay Shipping', '15000.00', '6254-123456.jpg', 'image/jpeg', 'Completed', NULL),
(6304856, 56, '2018-05-04 08:52:44', 'Reload Point', '4838.00', '97370-image.jpg', 'image/jpeg', 'Completed', NULL),
(6326435, 35, '2018-04-17 06:27:50', 'Pay Shipping', '30.00', '50032-170px-receiptswiss.jpg', 'image/jpeg', 'Completed', NULL),
(6372658, 58, '2018-05-04 10:57:49', 'Pay Shipping', '11.00', '19188-1920x1080-wallpapers10.jpg', 'image/jpeg', 'Completed', NULL),
(6432470, 70, '2018-05-05 12:11:09', 'Pay Order', '80.00', '57929-medical3.jpg', 'image/jpeg', 'Completed', NULL),
(6588348, 48, '2018-05-01 14:44:47', 'Pay Order', '62.00', '76739-testingreceipt.txt', 'text/plain', 'Completed', NULL),
(6648456, 56, '2018-05-04 08:29:28', 'Pay Order', '62.00', '33160-123456.jpg', 'image/jpeg', 'Completed', NULL),
(6665612, 12, '2018-04-27 17:30:47', 'Pay Shipping', '180.00', '98757-whatsapp-image-2018-04-28-at-12.27.20-am.jpeg', 'image/jpeg', 'Completed', NULL),
(6700652, 52, '2018-05-04 10:59:31', 'Pay Order', '6.00', '30558-dota2.jpg', 'image/jpeg', 'Completed', NULL),
(6723416, 16, '2018-04-29 15:41:18', 'Pay Shipping', '9.00', '97543-30715491_10210889630297087_1437263664045359104_n.jpg', 'image/jpeg', 'Completed', NULL),
(6751640, 40, '2018-04-28 05:32:22', 'Pay Shipping', '8.00', '66108-screenshot_20180428-133948.png', 'image/png', 'Completed', NULL),
(6908878, 78, '2018-05-06 15:11:25', 'Reload Point', '20000.00', '37580-0435727_l.jpg', 'image/jpeg', 'Completed', NULL),
(6927633, 33, '2018-05-06 10:39:18', 'Reload Point', '1.00', '32432-download.png', 'image/png', 'Completed', NULL),
(6983188, 88, '2018-05-08 06:14:09', 'Pay Shipping', '15.00', '30752-a-bornean-fantasie_fb_v3.jpg', 'image/jpeg', 'Completed', NULL),
(6987150, 50, '2018-05-07 13:25:30', 'Pay Shipping', '300.00', '29992-0e31a0e9-5a1c-4213-a866-98bffe8638ff.png', 'image/png', 'Completed', NULL),
(7092316, 16, '2018-04-25 02:30:07', 'Pay Order', '68.00', '51250-30715491_10210889630297087_1437263664045359104_n.jpg', 'image/jpeg', 'Completed', NULL),
(7334967, 67, '2018-05-05 12:16:04', 'Pay Order', '867.00', '78322-m.jpg', 'image/jpeg', 'Completed', NULL),
(7335677, 77, '2018-05-06 12:11:16', 'Pay Order', '6.00', '15890-20170212_195359.jpg', 'image/jpeg', 'Completed', NULL),
(7347270, 70, '2018-05-05 06:46:03', 'Reload Point', '42.00', '28447-bed.jpg', 'image/jpeg', 'Completed', NULL),
(7355263, 63, '2018-05-04 13:43:36', 'Pay Shipping', '15.00', '18508-12.jpg', 'image/jpeg', 'Completed', NULL),
(7412782, 82, '2018-05-07 07:07:49', 'Pay Shipping', '15.00', '60566-daily-to-do-list-portrait.png', 'image/png', 'Completed', NULL),
(7513229, 29, '2018-04-27 15:54:06', 'Reload Point', '100.00', '73396-received_10213768832832406.png', 'image/png', 'Completed', NULL),
(7554472, 72, '2018-05-05 12:22:14', 'Reload Point', '1030300200.00', '68964-35703-paper-sheet-hand-drawn-interface-file-symbol.png', 'image/png', 'Completed', NULL),
(7559840, 40, '2018-04-28 05:37:40', 'Reload Point', '10.00', '15754-Screenshot_20180428-134440.png', 'image/png', 'Completed', NULL),
(7563283, 83, '2018-05-07 07:07:00', 'Pay Order', '1.00', '51541-img-20180507-wa0038.jpg', 'image/jpeg', 'Completed', NULL),
(7592869, 69, '2018-05-05 07:54:28', 'Pay Order', '13.00', '16833-graph.jpg', 'image/jpeg', 'Completed', NULL),
(7607854, 54, '2018-05-04 08:21:29', 'Reload Point', '467.00', '16418-123456.jpg', 'image/jpeg', 'Completed', NULL),
(7712129, 29, '2018-04-27 15:32:01', 'Pay Order', '296.00', '60436-received_10213768832832406.png', 'image/png', 'Completed', NULL),
(7811383, 83, '2018-05-07 07:25:39', 'Reload Point', '10000.00', '42295-IMG-20180507-WA0047.jpg', 'image/jpeg', 'Completed', NULL),
(7904766, 66, '2018-05-05 04:46:20', 'Reload Point', '20.00', '9291-winnie.jpg', 'image/jpeg', 'Completed', NULL),
(7958662, 62, '2018-05-04 13:06:29', 'Reload Point', '59.00', '36960-TMPDOODLE1525439143869.jpg', 'image/jpeg', 'Completed', NULL),
(7997815, 15, '2018-05-05 07:54:45', 'Pay Order by MOLPay', '19.00', NULL, NULL, 'Completed', NULL),
(8068679, 79, '2018-05-06 15:13:48', 'Pay Shipping', '150.00', '36187-pdf-sample.pdf', 'application/pdf', 'Completed', NULL),
(8116444, 44, '2018-04-29 13:02:11', 'Pay Order', '86.00', '45828-astronomer.jpg', 'image/jpeg', 'Completed', NULL),
(8160463, 63, '2018-05-04 13:31:42', 'Pay Order', '2763.00', '49544-12.jpg', 'image/jpeg', 'Completed', NULL),
(8240963, 63, '2018-05-04 13:55:50', 'Reload Point', '10000.00', '78084-12.jpg', 'image/jpeg', 'Completed', NULL),
(8318576, 76, '2018-05-05 15:27:44', 'Reload Point', '10000.00', '38260-170px-ReceiptSwiss.jpg', 'image/jpeg', 'Completed', NULL),
(8342412, 12, '2018-04-27 16:59:37', 'Pay order by Points', '4.00', NULL, NULL, 'Completed', NULL),
(8441012, 12, '2018-04-27 16:42:42', 'Reload Point', '1000.00', '19217-WhatsApp Image 2018-04-28 at 12.27.20 AM.jpeg', 'image/jpeg', 'Completed', NULL),
(8449859, 59, '2018-05-05 00:54:26', 'Pay Order', '7.00', '96124-bmw-i8.jpg', 'image/jpeg', 'Completed', NULL),
(8481342, 42, '2018-04-29 04:55:05', 'Pay Shipping', '46.00', '94581-receipts.png', 'image/png', 'Completed', NULL),
(8534946, 46, '2018-05-01 13:36:49', 'Reload Point', '100.00', '41256-CC300280-B012-4B6A-8D5F-04AA5F979C0D.jpeg', 'image/jpeg', 'Completed', NULL),
(8689033, 33, '2018-05-06 10:36:11', 'Pay Shipping', '180.00', '10361-download.png', 'image/png', 'Completed', NULL),
(8999311, 11, '2018-05-06 03:07:58', 'Pay Order by MOLPay', '300.00', NULL, NULL, 'Waiting for Accept', NULL),
(9010128, 28, '2018-05-04 02:52:57', 'Pay Order by MOLPay', '62.00', NULL, NULL, 'Completed', NULL),
(9026276, 76, '2018-05-05 15:26:58', 'Pay Shipping', '150.00', '56077-170px-receiptswiss.jpg', 'image/jpeg', 'Completed', NULL),
(9062843, 43, '2018-04-29 11:43:12', 'Pay Shipping', '29.00', '69178-face.jpg', 'image/jpeg', 'Completed', NULL),
(9083948, 48, '2018-05-01 14:55:53', 'Pay Shipping', '180.00', '9638-testingreceipt.txt', 'text/plain', 'Completed', NULL),
(9156156, 56, '2018-05-04 08:46:12', 'Pay Shipping', '2760.00', '65499-image.jpg', 'image/jpeg', 'Completed', NULL),
(9400557, 57, '2018-05-04 08:50:05', 'Pay Shipping', '15.00', '92243-write-a-receipt-step-9-version-2.jpg', 'image/jpeg', 'Completed', NULL),
(9419781, 81, '2018-05-07 02:40:59', 'Pay Shipping', '15.00', '17837-main-qimg-8aa597ee2d773fce151545846c9d08a0.png', 'image/png', 'Completed', NULL),
(9612850, 50, '2018-05-07 13:49:55', 'Reload Point', '12.00', '36204-ED27CE35-6B1F-413B-BB22-3C223905E4B0.png', 'image/png', 'Completed', NULL),
(9664550, 50, '2018-05-02 15:55:36', 'Pay Order', '12.00', '94397-5cff6b76-867f-4b74-be64-f9ae327f50d7.png', 'image/png', 'Completed', NULL),
(9710365, 65, '2018-05-04 15:03:40', 'Pay Order', '42.00', '49793-14463761_1103752033049851_345280147_n.jpg', 'image/jpeg', 'Completed', NULL),
(9726667, 67, '2018-05-05 06:46:13', 'Reload Point', '435.00', '86087-china.jpg', 'image/jpeg', 'Completed', NULL),
(9794352, 52, '2018-05-04 11:01:19', 'Reload Point', '50.00', '30129-dota.jpg', 'image/jpeg', 'Completed', NULL),
(9795837, 37, '2018-05-05 09:03:31', 'Pay Shipping', '30.00', '83925-1238.jpg', 'image/jpeg', 'Completed', NULL),
(9804768, 68, '2018-05-05 12:08:29', 'Pay Shipping', '32.00', '25101-bag3.jpg', 'image/jpeg', 'Completed', NULL),
(9843754, 54, '2018-05-04 08:13:29', 'Pay Order', '62000.00', '22540-123456.jpg', 'image/jpeg', 'Completed', NULL),
(9846935, 35, '2018-04-17 06:57:39', 'Pay Order', '7378.00', '40483-rnog6uyu_400x400.jpg', 'image/jpeg', 'Declined', NULL),
(9891362, 62, '2018-05-04 12:46:51', 'Pay Shipping', '17.00', '90142-tmpdoodle1525437828957.jpg', 'image/jpeg', 'Completed', NULL),
(9892678, 78, '2018-05-06 14:58:11', 'Pay Order', '6.00', '8013-0435727_l.jpg', 'image/jpeg', 'Completed', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `point_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`point_id`, `user_id`, `point`) VALUES
(1, 29, '50.00'),
(2, 12, '196.28'),
(3, 40, '5.00'),
(4, 42, '50.00'),
(5, 3, '35.00'),
(6, 43, '30.00'),
(7, 44, '15.00'),
(8, 16, '315.50'),
(9, 46, '50.00'),
(10, 48, '100.00'),
(11, 54, '233.50'),
(12, 57, '242.00'),
(13, 56, '2419.00'),
(14, 58, '30.00'),
(15, 52, '25.00'),
(16, 60, '6.00'),
(17, 59, '22.50'),
(18, 61, '282.00'),
(19, 62, '29.50'),
(20, 64, '500.00'),
(21, 63, '5000.00'),
(22, 65, '42.50'),
(23, 66, '10.00'),
(24, 68, '15.00'),
(25, 70, '21.00'),
(26, 67, '217.50'),
(27, 69, '44.00'),
(28, 71, '35.00'),
(29, 72, '99999999.99'),
(30, 74, '500.00'),
(31, 75, '5000.00'),
(32, 76, '5000.00'),
(33, 33, '0.50'),
(34, 77, '500.00'),
(35, 78, '10000.00'),
(36, 79, '15000.00'),
(37, 81, '1000.00'),
(38, 83, '5000.00'),
(39, 82, '1000.00'),
(40, 85, '500.00'),
(41, 50, '6.00'),
(42, 2, '617.00'),
(43, 88, '617.00');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rate_id` int(11) NOT NULL,
  `rate_name` varchar(15) NOT NULL,
  `rate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rate_id`, `rate_name`, `rate`) VALUES
(1, 'LWE point', '0.50'),
(2, '1kg', '15.00');

-- --------------------------------------------------------

--
-- Table structure for table `recipient_contact`
--

CREATE TABLE `recipient_contact` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipient_contact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipient_contact`
--

INSERT INTO `recipient_contact` (`contact_id`, `user_id`, `recipient_contact`) VALUES
(2, 1, '0109800578'),
(3, 1, '082456145'),
(4, 1, '082456145');

-- --------------------------------------------------------

--
-- Table structure for table `recipient_names`
--

CREATE TABLE `recipient_names` (
  `name_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipient_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipient_names`
--

INSERT INTO `recipient_names` (`name_id`, `user_id`, `recipient_name`) VALUES
(1, 1, 'Kho'),
(4, 1, 'Ting');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `refund_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `refund_amount` varchar(50) NOT NULL,
  `admin_charge` varchar(50) NOT NULL,
  `refund_reason` varchar(255) NOT NULL,
  `transaction_code` varchar(50) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `rstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_item` varchar(50) NOT NULL,
  `order_code` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `user_id`, `order_item`, `order_code`, `status`, `datetime`, `remark`) VALUES
(3, 1, 'Shipping Item test', '987654', 'Received', '2018-04-19 07:35:28', ''),
(4, 12, 'EBON', '00000', 'Received', '2018-04-27 17:09:18', ''),
(5, 12, 'Yvonne', '123456', 'Received', '2018-04-27 17:29:09', ''),
(6, 42, 'shoes', '736412', 'Received', '2018-04-29 04:51:53', ''),
(7, 3, 'bbq set', '7653495', 'Received', '2018-04-29 05:31:43', 'iron'),
(8, 43, 'knit string', '5554', 'Received', '2018-04-29 11:39:58', 'wow'),
(11, 43, 'knit knit', '5556', 'Received', '2018-04-29 11:40:14', 'wowww'),
(12, 44, 'sport shoes', '4864212', 'Received', '2018-04-29 13:04:19', 'careful'),
(13, 1, 'quote\'s test', '9984503', 'Received', '2018-05-02 06:46:59', 'quote\'s test'),
(14, 1, 'test shipping request', '34636', 'Received', '2018-05-02 16:30:40', 'none'),
(15, 1, 'Test shipping on phone', '2747', 'Received', '2018-05-03 02:02:26', 'None'),
(18, 52, 'cap', '73407234', 'Received', '2018-05-04 11:01:03', '1234'),
(19, 58, 'ç‹¬å®¶åŽŸåˆ›æ³°å›½æ½®ç‰Œ', '123456789', 'Received', '2018-05-04 10:54:18', 'black color '),
(20, 60, 'shoes', '231531224', 'Received', '2018-05-05 00:58:10', ''),
(21, 59, 'car accssories', '7832494', 'Received', '2018-05-05 00:55:39', 'careful'),
(22, 61, 'redmi5é˜²çˆ†è†œ', '2355524', 'Received', '2018-05-05 00:58:10', 'é˜²çˆ†è†œ'),
(23, 62, 'Android usb cable 1.5m', 'AO675HJ', 'Received', '2018-05-04 12:30:22', 'Usb cable'),
(24, 62, 'Poodle', 'PY81A00', 'Received', '2018-05-04 12:41:12', 'Dog'),
(25, 62, 'Huawei p20', 'IRH865', 'Received', '2018-05-04 13:26:27', 'Huawei'),
(26, 65, 'anything item', 'code', 'Received', '2018-05-04 15:10:21', 'shirt'),
(27, 66, 'high heel', 'AS89234', 'Received', '2018-05-05 04:47:25', ''),
(28, 67, 'è¡Œè½¦è®°å½•ä»ª', 'RJ8746782', 'Received', '2018-05-05 06:49:13', ''),
(29, 68, '2018æ˜¥å¤é£žç»‡è¿åŠ¨å¥³éž‹', 'KA2374886', 'Received', '2018-05-05 06:49:42', ''),
(30, 69, 'powerbank', 'i846234', 'Received', '2018-05-05 06:49:42', ''),
(31, 70, 'sport bagpack', '1734752', 'Received', '2018-05-05 06:49:42', ''),
(32, 71, 'high heel', 'QY387493', 'Received', '2018-05-05 07:14:25', ''),
(33, 72, 'Priscilla Yong', 'qwertyuiop', 'Received', '2018-05-05 12:19:16', 'jshfjd'),
(34, 7, 'Sink', 'Test', 'Received', '2018-05-07 02:29:44', 'att to Kent'),
(35, 81, 'In The Fall Of The New South Korean Baby With Todd', '12345', 'Received', '2018-05-07 02:36:22', 'This is a gift'),
(36, 1, 'Test update inventory', '12356', 'Received', '2018-05-14 13:16:53', 'Test'),
(37, 1, 'Test shipping detail', '123456789', 'Received', '2018-05-20 23:37:54', '-'),
(38, 1, 'Testing 123', '8851028001812', 'Received', '2018-05-21 14:11:00', 'tsting'),
(39, 1, 'Testing barcode', '9556156009110', 'Received', '2018-05-22 01:45:32', '-'),
(40, 1, 'Ice lemon tea', '9556570501337', 'Received', '2018-05-22 01:48:25', '-');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipient_name` varchar(50) NOT NULL,
  `recipient_contact` varchar(15) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `address_id` int(11) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `price` varchar(20) NOT NULL,
  `status` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tracking_code` varchar(25) DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `review` text,
  `top_up_id` varchar(11) DEFAULT NULL,
  `destination_station` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `user_id`, `recipient_name`, `recipient_contact`, `remark`, `address_id`, `weight`, `price`, `status`, `datetime`, `tracking_code`, `payment_id`, `review`, `top_up_id`, `destination_station`) VALUES
(1, 35, 'sam', '10209393', 'fragile', 1, '2.00', '30', 'DELIVERED', '2018-05-02 06:44:34', '39367', 6326435, 'good', NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(2, 1, 'Eileen', '123456', '', 2, '1.00', '15', 'DELIVERED', '2018-05-06 12:26:52', '86527', 769391, 'good', NULL, ''),
(3, 29, 'Ting Jia Hie', '016-5896877', 'Hi', 4, '1.90', '28.5', 'DELIVERED', '2018-04-27 15:51:41', '63367', 1449229, 'Fast processing and delivery. Very satisfied with the service. Thank you.', NULL, ''),
(6, 12, 'EBON', '0128863906', '', 6, '12.00', '180', 'DELIVERED', '2018-04-27 17:33:17', '55133', 6665612, 'Nice', NULL, ''),
(8, 40, 'è€å¤§', '777', 'I m a good boy', 10, '0.50', '7.5', 'DELIVERED', '2018-04-28 05:36:10', '54459', 6751640, 'Niceeee', NULL, ''),
(9, 16, 'Vincent Ho', '010-9866620', '', 8, '0.60', '9', 'DELIVERED', '2018-04-29 15:54:33', '98013', 6723416, 'service is excellent, receive the parcel within 3 days', NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(10, 42, 'janice', '0168748224', '', 11, '3.08', '46.2', 'DELIVERED', '2018-04-29 04:58:02', '92965', 8481342, 'not bad, quite fast', NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(11, 3, 'clement', '01110521019', '', 3, '17.00', '255', 'DELIVERED', '2018-04-29 05:37:22', '77153', 355873, 'fast and easy', NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(12, 43, 'dianne', '0129933456', '', 12, '1.90', '28.5', 'DELIVERED', '2018-04-29 11:46:33', '60882', 9062843, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(13, 44, 'Ah hong', '0137843219', '', 13, '5.90', '88.5', 'DELIVERED', '2018-04-29 15:43:54', '26836', 1131944, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(14, 46, 'Wong Ting', '01111433196', '-', 14, '100.00', '1500', 'DELIVERED', '2018-05-01 13:17:53', '54738', 5237946, 'Excellent shopping experience!! Thanks!!', NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(15, 48, 'TING LEE TING', '0165768838', 'Handle it extremely with care.', 15, '12.00', '180', 'DELIVERED', '2018-05-01 15:01:37', '83458', 9083948, 'wow fantastic', NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(16, 1, 'EIleen', '0109800578', 'none', 2, '0.20', '3', 'DELIVERED', '2018-05-06 09:44:37', '25870', 284961, NULL, NULL, ''),
(17, 1, 'EIleen', '0109800578', 'none', 2, '20.00', '300', 'DELIVERED', '2018-05-06 09:44:37', '71414', 823761, NULL, NULL, ''),
(18, 54, 'Isaac Lau', '0168743193', 'hello', 21, '1000.00', '15000', 'DELIVERED', '2018-05-04 08:31:08', '37368', 6272454, 'pedal is in good condition (5 star)', NULL, 'SHENZHEN'),
(19, 56, 'Gordon', '0128533296', '', 22, '184.00', '2760', 'DELIVERED', '2018-05-04 08:50:47', '33488', 9156156, 'æœ‰å¾ˆå¤§çš„è¿›æ­¥ç©ºé—´', NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(20, 57, 'Simon Yii', '0167029535', 'Fragile', 23, '1.00', '15', 'DELIVERED', '2018-05-04 08:52:35', '71732', 9400557, 'very good', NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(22, 52, 'Jeffindon', '016239123', '', 25, '1.42', '21.3', 'DELIVERED', '2018-05-04 11:05:17', '49086', 2782052, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(24, 62, 'Alexzander', '0109770390', 'Poodle', 26, '1.10', '16.5', 'DELIVERED', '2018-05-04 12:47:57', '94997', 9891362, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(25, 1, 'Eileen', '15017', 'sgdkj', 2, '20.00', '300', 'DELIVERED', '2018-05-06 09:44:37', '36267', 979771, NULL, NULL, ''),
(26, 64, 'Raymond', '0168822172', '', 31, '5.00', '75', 'DELIVERED', '2018-05-04 13:29:50', '77271', 1031264, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(27, 63, 'daniel chin ', '0168717928', 'eileen', 32, '1.00', '15', 'DELIVERED', '2018-05-04 13:46:58', '87977', 7355263, 'so far so good', NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(28, 65, 'vic', '123456', 'test', 34, '3.50', '52.5', 'DELIVERED', '2018-05-05 00:59:30', '19390', 3546565, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(29, 60, 'hui chee ', '01126820816', '', 36, '2.00', '30', 'DELIVERED', '2018-05-05 04:50:04', '89556', 4203860, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(30, 59, 'mark low', '0192705934', '', 37, '5.30', '79.5', 'DELIVERED', '2018-05-05 04:50:04', '42169', 2837659, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(31, 61, 'Gwen Chan', '0146840471', '', 38, '0.30', '4.5', 'DELIVERED', '2018-05-05 04:50:04', '86300', 1636761, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(32, 3, 'test', '1', '', 3, '1.00', '15.00', 'DELIVERED', '2018-05-05 12:07:56', '94189', 212443, NULL, NULL, ''),
(33, 71, 'artika', '134785871', '', 39, '2.20', '33', 'DELIVERED', '2018-05-05 07:37:47', '28936', 1425171, NULL, NULL, 'SHENZHEN'),
(34, 66, 'emily khoo', '0172323452', '', 40, '5.00', '75', 'DELIVERED', '2018-05-05 12:07:56', '79827', 4288966, NULL, NULL, ''),
(35, 69, 'lishyuan', '0197238742', '', 41, '1.30', '19.5', 'DELIVERED', '2018-05-05 12:07:56', '59134', 4671769, NULL, NULL, ''),
(36, 37, 'CHAN WAN KIT', '0174777863', '', 42, '2.00', '30', 'DELIVERED', '2018-05-05 12:07:56', '93922', 9795837, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(37, 68, 'Lina', '0197672892', '', 46, '2.10', '31.5', 'DELIVERED', '2018-05-05 12:10:42', '80454', 9804768, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(38, 70, 'Louis Chou', '0162397872', '', 48, '0.60', '9', 'DELIVERED', '2018-05-05 12:26:33', '93509', 5304370, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(39, 67, 'Kwong Ming ', '0192869836', '', 49, '1.30', '19.5', 'DELIVERED', '2018-05-05 12:26:47', '83566', 5492767, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(41, 72, 'Priscilla Yong', '0192880270', 'uvtf', 50, '1.00', '15', 'DELIVERED', '2018-05-05 12:22:37', '66297', 4761872, 'good', NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(42, 74, 'WOng', '123456789', '-', 51, '1.00', '15', 'DELIVERED', '2018-05-05 12:59:00', '16883', 5333274, 'great service', NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(43, 76, 'Eeric', '0168168316', 'Test', 53, '10.00', '150', 'DELIVERED', '2018-05-05 15:30:56', '94858', 9026276, 'well done', NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(44, 75, 'ANTHONY YII', '016-8657210', '', 52, '10.00', '150', 'DELIVERED', '2018-05-05 15:31:50', '98424', 3690775, 'Sleepy', NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(45, 3, 'clement', '0112312412', 'try molpay', 19, '2.00', '30.00', 'DELIVERED', '2018-05-06 05:52:16', '13810', 424153, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(46, 1, 'Eileen\'', '0109800578', 'quote\'s test', 2, '21.00', '315', 'DELIVERED', '2018-05-06 12:07:10', '15551', 912111, NULL, NULL, 'KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(47, 33, 'Grace', '0165790196', '', 54, '12.00', '180', 'DELIVERED', '2018-05-06 10:39:58', '89113', 8689033, 'Okkkk', NULL, 'KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(48, 77, 'Edward Lai', '0123456789', '', 55, '1.00', '15', 'DELIVERED', '2018-05-06 12:24:41', '62877', 2142977, 'God Bless You', NULL, 'KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(49, 1, 'EIleen', '1234', '-', 2, '12.00', '180.00', 'In Transit', '2018-05-16 18:04:14', '25436', 255071, NULL, NULL, 'SHENZHEN (LOGISTICS HUB), CHINA'),
(50, 78, 'ELEANOR ANNE AYU', '0168716570', '12345', 56, '12.00', '180', 'DELIVERED', '2018-05-06 15:08:55', '93902', 3332478, 'interesting and simple software to be used.', NULL, 'KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(51, 79, 'dfgdfgdf', 'dfgdfgg', 'cvbcvb', 57, '10.00', '150', 'DELIVERED', '2018-05-06 15:15:26', '15149', 8068679, 'some review', NULL, 'KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(52, 81, 'Emilia Ting Ing Chieh', '0128787501', '', 58, '1.00', '15', 'DELIVERED', '2018-05-07 02:44:49', '54456', 9419781, 'Thank you, very good and efficient service!', NULL, 'KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(53, 82, 'Michelle', '016-8781648', 'Office Hours sent', 59, '1.00', '15', 'DELIVERED', '2018-05-07 07:42:40', '66238', 7412782, 'Thank You Very Much=)', NULL, 'KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(54, 83, 'William', '0198164385', '', 59, '1.00', '15', 'DELIVERED', '2018-05-07 07:26:31', '29834', 4785883, 'Very good', NULL, 'KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(55, 85, 'Eileen Kong', '0128501299', '', 60, '1.00', '15', 'DELIVERED', '2018-05-07 12:32:02', '47461', 3656085, 'Nice.', NULL, 'KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(56, 50, 'Jonathan loh', '0109806413', '1', 16, '20.00', '300', 'DELIVERED', '2018-05-07 13:43:34', '42590', 6987150, NULL, NULL, 'KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(57, 87, 'Elleen', '0146925309', '', 61, '2.00', '30.00', 'DELIVERED', '2018-05-07 13:51:09', NULL, 2139787, 'Not bad, but if can automatically process to next step more easy to use', NULL, 'SHENZHEN (LOGISTICS HUB), CHINA'),
(58, 88, 'shoe', '0168609779', '', 63, '1.00', '15', 'DELIVERED', '2018-05-08 06:15:03', '37747', 6983188, NULL, NULL, 'KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(59, 1, 'Eileen', '123456', '-', 2, '2.00', '30', 'In Transit', '2018-05-16 18:06:01', '58584', 779751, NULL, NULL, 'KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(60, 1, 'Jing', '082456145', '-', 66, '1.00', '15', 'SHIPMENT REGISTERED', '2018-05-21 13:11:52', 'LWE1526908305MY', 698311, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_update_details`
--

CREATE TABLE `shipping_update_details` (
  `sud_id` int(11) NOT NULL,
  `HawbNo` varchar(20) NOT NULL,
  `TransactionDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `StationCode` varchar(10) NOT NULL,
  `StationDescription` varchar(50) NOT NULL,
  `CountryCode` varchar(10) NOT NULL,
  `CountryDescription` varchar(50) NOT NULL,
  `EventCode` varchar(10) NOT NULL,
  `EventDescription` varchar(1000) NOT NULL,
  `ReasonCode` varchar(10) NOT NULL,
  `ReasonDescription` varchar(100) NOT NULL,
  `Remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_update_details`
--

INSERT INTO `shipping_update_details` (`sud_id`, `HawbNo`, `TransactionDate`, `StationCode`, `StationDescription`, `CountryCode`, `CountryDescription`, `EventCode`, `EventDescription`, `ReasonCode`, `ReasonDescription`, `Remark`) VALUES
(1, '39367', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(2, '39367', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(3, '39367', NULL, '', '', '', '', 'DST', 'Shipment designated to pos laju.', 'IS', 'Is Shipping', ''),
(4, '39367', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(5, '86527', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(6, '63367', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(7, '63367', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(8, '63367', NULL, '', '', '', '', 'DST', 'Shipment designated to Poslaju.', 'IS', 'Is Shipping', ''),
(9, '63367', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by Poslaju.', 'IS', 'Is Shipping', ''),
(10, '63367', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(11, '55133', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(12, '55133', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(13, '55133', NULL, '', '', '', '', 'DST', 'Shipment designated to FeDex.', 'IS', 'Is Shipping', ''),
(14, '55133', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by Fedex.', 'IS', 'Is Shipping', ''),
(15, '55133', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(16, '54459', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(17, '86527', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(18, '54459', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(19, '54459', NULL, '', '', '', '', 'DST', 'Shipment designated to Abx.', 'IS', 'Is Shipping', ''),
(20, '54459', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by abx.', 'IS', 'Is Shipping', ''),
(21, '54459', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(22, '54459', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(23, '92965', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(24, '92965', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(25, '92965', NULL, '', '', '', '', 'DST', 'Shipment designated to abx.', 'IS', 'Is Shipping', ''),
(26, '92965', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(27, '77153', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(28, '77153', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(29, '77153', NULL, '', '', '', '', 'DST', 'Shipment designated to poslaju.', 'IS', 'Is Shipping', ''),
(30, '77153', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(31, '60882', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(32, '60882', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(33, '60882', NULL, '', '', '', '', 'DST', 'Shipment designated to gdex.', 'IS', 'Is Shipping', ''),
(34, '60882', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(35, '98013', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(36, '26836', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(37, '98013', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(38, '26836', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(39, '98013', NULL, '', '', '', '', 'DST', 'Shipment designated to citylink.', 'IS', 'Is Shipping', ''),
(40, '26836', NULL, '', '', '', '', 'DST', 'Shipment designated to Poslaju.', 'IS', 'Is Shipping', ''),
(41, '98013', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by citylink.', 'IS', 'Is Shipping', ''),
(42, '26836', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by poslaju.', 'IS', 'Is Shipping', ''),
(43, '98013', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(44, '26836', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(45, '54738', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(46, '54738', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(47, '54738', NULL, '', '', '', '', 'DST', 'Shipment designated to Poslaju.', 'IS', 'Is Shipping', ''),
(48, '54738', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by Poslaju.', 'IS', 'Is Shipping', ''),
(49, '54738', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(50, '83458', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(51, '83458', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(52, '83458', NULL, '', '', '', '', 'DST', 'Shipment designated to abx.', 'IS', 'Is Shipping', ''),
(53, '83458', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by abx.', 'IS', 'Is Shipping', ''),
(54, '83458', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(55, '37368', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(56, '37368', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(57, '37368', NULL, '', '', '', '', 'DST', 'Shipment designated to Poslaju.', 'IS', 'Is Shipping', ''),
(58, '37368', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by Abx.', 'IS', 'Is Shipping', ''),
(59, '37368', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(60, '25870', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(61, '33488', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(62, '33488', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(63, '33488', NULL, '', '', '', '', 'DST', 'Shipment designated to 3839.', 'IS', 'Is Shipping', ''),
(64, '33488', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by Poslaju.', 'IS', 'Is Shipping', ''),
(65, '33488', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(66, '71732', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(67, '71732', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(68, '71732', NULL, '', '', '', '', 'DST', 'Shipment designated to Abx.', 'IS', 'Is Shipping', ''),
(69, '71732', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by Abx.', 'IS', 'Is Shipping', ''),
(70, '71732', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(71, '49086', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(72, '49086', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(73, '49086', NULL, '', '', '', '', 'DST', 'Shipment designated to poslaju.', 'IS', 'Is Shipping', ''),
(74, '49086', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(75, '94997', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(76, '94997', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(77, '94997', NULL, '', '', '', '', 'DST', 'Shipment designated to abx.', 'IS', 'Is Shipping', ''),
(78, '94997', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(79, '77271', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(80, '77271', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(81, '77271', NULL, '', '', '', '', 'DST', 'Shipment designated to abx.', 'IS', 'Is Shipping', ''),
(82, '77271', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by abx.', 'IS', 'Is Shipping', ''),
(83, '77271', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(84, '87977', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(85, '87977', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(86, '87977', NULL, '', '', '', '', 'DST', 'Shipment designated to Poslaju.', 'IS', 'Is Shipping', ''),
(87, '87977', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by Poslaju.', 'IS', 'Is Shipping', ''),
(88, '87977', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(89, '19390', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(90, '19390', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(91, '19390', NULL, '', '', '', '', 'DST', 'Shipment designated to CityLink.', 'IS', 'Is Shipping', ''),
(92, '19390', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by 19390.', 'IS', 'Is Shipping', ''),
(93, '19390', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(94, '89556', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(95, '42169', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(96, '86300', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(97, '89556', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(98, '42169', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(99, '86300', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(100, '89556', NULL, '', '', '', '', 'DST', 'Shipment designated to abx.', 'IS', 'Is Shipping', ''),
(101, '42169', NULL, '', '', '', '', 'DST', 'Shipment designated to abx.', 'IS', 'Is Shipping', ''),
(102, '86300', NULL, '', '', '', '', 'DST', 'Shipment designated to abx.', 'IS', 'Is Shipping', ''),
(103, '89556', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by abx.', 'IS', 'Is Shipping', ''),
(104, '42169', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by abx.', 'IS', 'Is Shipping', ''),
(105, '86300', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by abx.', 'IS', 'Is Shipping', ''),
(106, '89556', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(107, '42169', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(108, '86300', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(109, '28936', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(110, '28936', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(111, '28936', NULL, '', '', '', '', 'DST', 'Shipment designated to fdex.', 'IS', 'Is Shipping', ''),
(112, '28936', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(113, '71414', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(114, '36267', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(115, '94189', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(116, '79827', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(117, '59134', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(118, '93922', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(119, '94189', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(120, '79827', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(121, '59134', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(122, '93922', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(123, '94189', NULL, '', '', '', '', 'DST', 'Shipment designated to A.', 'IS', 'Is Shipping', ''),
(124, '94189', NULL, '', '', '', '', 'DST', 'Shipment designated to B.', 'IS', 'Is Shipping', ''),
(125, '79827', NULL, '', '', '', '', 'DST', 'Shipment designated to E.', 'IS', 'Is Shipping', ''),
(126, '59134', NULL, '', '', '', '', 'DST', 'Shipment designated to D.', 'IS', 'Is Shipping', ''),
(127, '93922', NULL, '', '', '', '', 'DST', 'Shipment designated to C.', 'IS', 'Is Shipping', ''),
(128, '94189', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by L.', 'IS', 'Is Shipping', ''),
(129, '79827', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by A.', 'IS', 'Is Shipping', ''),
(130, '59134', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by J.', 'IS', 'Is Shipping', ''),
(131, '93922', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by U.', 'IS', 'Is Shipping', ''),
(132, '94189', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(133, '79827', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(134, '59134', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(135, '93922', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(136, '80454', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(137, '80454', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(138, '80454', NULL, '', '', '', '', 'DST', 'Shipment designated to O.', 'IS', 'Is Shipping', ''),
(139, '80454', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by O.', 'IS', 'Is Shipping', ''),
(140, '80454', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(141, '93509', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(142, '93509', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(143, '83566', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(144, '66297', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(145, '66297', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(146, '66297', NULL, '', '', '', '', 'DST', 'Shipment designated to 3.', 'IS', 'Is Shipping', ''),
(147, '66297', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by K.', 'IS', 'Is Shipping', ''),
(148, '66297', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(149, '83566', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(150, '93509', NULL, '', '', '', '', 'DST', 'Shipment designated to Asdf.', 'IS', 'Is Shipping', ''),
(151, '83566', NULL, '', '', '', '', 'DST', 'Shipment designated to Fjfhehh.', 'IS', 'Is Shipping', ''),
(152, '93509', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by Dhsjfb.', 'IS', 'Is Shipping', ''),
(153, '83566', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by Fjeld.', 'IS', 'Is Shipping', ''),
(154, '93509', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(155, '83566', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(156, '16883', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(157, '16883', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(158, '16883', NULL, '', '', '', '', 'DST', 'Shipment designated to a.', 'IS', 'Is Shipping', ''),
(159, '16883', NULL, '', '', '', '', 'DST', 'Shipment designated to z.', 'IS', 'Is Shipping', ''),
(160, '16883', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by d.', 'IS', 'Is Shipping', ''),
(161, '16883', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(162, '94858', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(163, '98424', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(164, '94858', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(165, '98424', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(166, '94858', NULL, '', '', '', '', 'DST', 'Shipment designated to DHL.', 'IS', 'Is Shipping', ''),
(167, '98424', NULL, '', '', '', '', 'DST', 'Shipment designated to Poslaju.', 'IS', 'Is Shipping', ''),
(168, '94858', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by DHL.', 'IS', 'Is Shipping', ''),
(169, '98424', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by Poslaju.', 'IS', 'Is Shipping', ''),
(170, '94858', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(171, '98424', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(172, '13810', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(173, '13810', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(174, '13810', NULL, '', '', '', '', 'DST', 'Shipment designated to DHL.', 'IS', 'Is Shipping', ''),
(175, '13810', NULL, '', '', '', '', 'DST', 'Shipment designated to DHL.', 'IS', 'Is Shipping', ''),
(176, '13810', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by DHL.', 'IS', 'Is Shipping', ''),
(177, '13810', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(178, '15551', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(179, '25870', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(180, '71414', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(181, '36267', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(182, '15551', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(183, '25870', NULL, '', '', '', '', 'DST', 'Shipment designated to Poslaju.', 'IS', 'Is Shipping', ''),
(184, '71414', NULL, '', '', '', '', 'DST', 'Shipment designated to DHL.', 'IS', 'Is Shipping', ''),
(185, '36267', NULL, '', '', '', '', 'DST', 'Shipment designated to ABX.', 'IS', 'Is Shipping', ''),
(186, '15551', NULL, '', '', '', '', 'DST', 'Shipment designated to Fdex.', 'IS', 'Is Shipping', ''),
(187, '25870', NULL, '', '', '', '', 'DPT', 'Shipment arrived at A.', 'IS', 'Is Shipping', ''),
(188, '71414', NULL, '', '', '', '', 'DPT', 'Shipment arrived at B.', 'IS', 'Is Shipping', ''),
(189, '36267', NULL, '', '', '', '', 'DPT', 'Shipment arrived at C.', 'IS', 'Is Shipping', ''),
(190, '15551', NULL, '', '', '', '', 'DPT', 'Shipment arrived at D.', 'IS', 'Is Shipping', ''),
(191, '15551', NULL, '', '', '', '', 'DST', 'Shipment designated to .', 'IS', 'Is Shipping', ''),
(192, '15551', NULL, '', '', '', '', 'DPT', 'Shipment arrived at .', 'IS', 'Is Shipping', ''),
(193, '25870', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(194, '71414', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(195, '36267', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(196, '89113', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(197, '89113', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(198, '89113', NULL, '', '', '', '', 'DST', 'Shipment designated to .', 'IS', 'Is Shipping', ''),
(199, '89113', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by DHL.', 'IS', 'Is Shipping', ''),
(200, '89113', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(201, '15551', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(202, '15551', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(203, '62877', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(204, '62877', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(205, '62877', NULL, '', '', '', '', 'DST', 'Shipment designated to .', 'IS', 'Is Shipping', ''),
(206, '62877', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by sgkdjbg.', 'IS', 'Is Shipping', ''),
(207, '62877', NULL, '', '', '', '', 'ITS', 'Shipment departed from/to .', 'IS', 'Is Shipping', ''),
(208, '62877', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by asdf.', 'IS', 'Is Shipping', ''),
(209, '62877', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(210, '25436', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(211, '93902', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(212, '93902', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(213, '93902', NULL, '', '', '', '', 'DST', 'Shipment designated to .', 'IS', 'Is Shipping', ''),
(214, '93902', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by DHL.', 'IS', 'Is Shipping', ''),
(215, '93902', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(216, '15149', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(217, '15149', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(218, '15149', NULL, '', '', '', '', 'DST', 'Shipment designated to .', 'IS', 'Is Shipping', ''),
(219, '15149', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by DHl.', 'IS', 'Is Shipping', ''),
(220, '15149', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(221, '54456', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(222, '54456', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(223, '54456', NULL, '', '', '', '', 'DST', 'Shipment designated to .', 'IS', 'Is Shipping', ''),
(224, '54456', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by B.', 'IS', 'Is Shipping', ''),
(225, '54456', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(226, '66238', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(227, '66238', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(228, '66238', NULL, '', '', '', '', 'DST', 'Shipment designated to .', 'IS', 'Is Shipping', ''),
(229, '66238', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by 66238.', 'IS', 'Is Shipping', ''),
(230, '66238', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(231, '29834', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(232, '29834', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(233, '29834', NULL, '', '', '', '', 'DST', 'Shipment designated to .', 'IS', 'Is Shipping', ''),
(234, '29834', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by Poslaju.', 'IS', 'Is Shipping', ''),
(235, '29834', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(236, '47461', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(237, '47461', NULL, '', '', '', '', 'PKI', 'Pickup shipment checked in at .', 'IS', 'Is Shipping', ''),
(238, '47461', NULL, '', '', '', '', 'DST', 'Shipment designated to .', 'IS', 'Is Shipping', ''),
(239, '47461', NULL, '', '', '', '', 'ITS', 'Shipment out for despatch by Poslaju.', 'IS', 'Is Shipping', ''),
(240, '47461', NULL, '', '', '', '', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(241, '37747', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(242, '37747', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'PKI', 'Pickup shipment checked in at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(243, '37747', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DST', 'Shipment designated to .', 'IS', 'Is Shipping', ''),
(244, '37747', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'ITS', 'Shipment out for despatch by Poslaju.', 'IS', 'Is Shipping', ''),
(245, '37747', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DLV', 'SHIPMENT DELIVERED', 'DL', 'Delivered', ''),
(246, '58584', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(247, '25436', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'PKI', 'Pickup shipment checked in at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(248, '58584', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'PKI', 'Pickup shipment checked in at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', ''),
(249, '25436', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DST', 'Shipment designated to .', 'IS', 'Is Shipping', ''),
(250, '25436', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DST', 'Shipment designated to .', 'IS', 'Is Shipping', ''),
(251, '58584', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DST', 'Shipment designated to .', 'IS', 'Is Shipping', ''),
(252, 'LWE1526908305MY', NULL, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'RDL', 'Shipment info registered at  KUALA LUMPUR (LOGISTICS HUB), MALAYSIA.', 'IS', 'Is Shipping', '');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_update_summary`
--

CREATE TABLE `shipping_update_summary` (
  `sum_id` int(11) NOT NULL,
  `HawbNo` varchar(20) NOT NULL,
  `XR1` varchar(20) NOT NULL,
  `XR2` varchar(20) NOT NULL,
  `ShipmentDate` datetime DEFAULT NULL,
  `DeliveryDate` datetime DEFAULT NULL,
  `RecipientName` varchar(50) NOT NULL,
  `SignedName` varchar(50) NOT NULL,
  `OriginStationCode` varchar(10) NOT NULL,
  `OriginStationDescription` varchar(50) NOT NULL,
  `OriginCountryCode` varchar(10) NOT NULL,
  `OriginCountryDescription` varchar(50) NOT NULL,
  `DestinationStationCode` varchar(10) NOT NULL,
  `DestinationStationDescription` varchar(50) NOT NULL,
  `DestinationCountryCode` varchar(10) NOT NULL,
  `DestinationCountryDescription` varchar(50) NOT NULL,
  `EventCode` varchar(10) NOT NULL,
  `EventDescription` varchar(1000) NOT NULL,
  `ReasonCode` varchar(10) NOT NULL,
  `ReasonDescription` varchar(1000) NOT NULL,
  `Remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_update_summary`
--

INSERT INTO `shipping_update_summary` (`sum_id`, `HawbNo`, `XR1`, `XR2`, `ShipmentDate`, `DeliveryDate`, `RecipientName`, `SignedName`, `OriginStationCode`, `OriginStationDescription`, `OriginCountryCode`, `OriginCountryDescription`, `DestinationStationCode`, `DestinationStationDescription`, `DestinationCountryCode`, `DestinationCountryDescription`, `EventCode`, `EventDescription`, `ReasonCode`, `ReasonDescription`, `Remark`) VALUES
(1, '39367', '', '', '2018-04-17 06:28:24', '2018-04-17 06:33:20', 'sam', 'ong', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(2, '86527', '', '', '2018-04-19 07:38:07', '0000-00-00 00:00:00', '', '', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'IP', 'In Proceed', 'IS', 'Is Shipping', ''),
(3, '63367', '', '', '2018-04-27 15:46:48', '2018-04-27 15:48:11', '', 'Patricia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(4, '55133', '', '', '2018-04-27 17:31:08', '2018-04-27 17:32:11', '', 'Yvonne', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(5, '54459', '', '', '2018-04-28 05:32:34', '2018-04-28 05:33:42', '', 'è€å¤§', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(6, '92965', '', '', '2018-04-29 04:55:59', '2018-04-29 04:57:31', 'janice', 'janice', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(7, '77153', '', '', '2018-04-29 05:34:26', '2018-04-29 05:36:42', 'clement', 'clement', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(8, '60882', '', '', '2018-04-29 11:45:37', '2018-04-29 11:46:33', 'dianne', 'dianne', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(9, '98013', '', '', '2018-04-29 15:42:05', '2018-04-29 15:43:54', 'Vincent Ho', 'Vincent', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(10, '26836', '', '', '2018-04-29 15:42:05', '2018-04-29 15:43:54', 'Ah hong', 'Ah Hong', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(11, '54738', '', '', '2018-05-01 13:14:37', '2018-05-01 13:15:28', 'Wong Ting', 'Kelly', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(12, '83458', '', '', '2018-05-01 14:56:30', '2018-05-01 14:57:13', 'TING LEE TING', 'Ting', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(13, '37368', '', '', '2018-05-04 08:22:06', '2018-05-04 08:26:19', 'Isaac Lau', 'Isaac', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'SZX', 'SHENZHEN', 'CN', 'China', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(14, '25870', '', '', '2018-05-04 08:46:56', '2018-05-06 09:44:37', '', 'Eil', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(15, '33488', '', '', '2018-05-04 08:47:11', '2018-05-04 08:48:30', 'Gordon', 'Gordon', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(16, '71732', '', '', '2018-05-04 08:50:39', '2018-05-04 08:52:00', 'Simon Yii', 'Simon', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(17, '49086', '', '', '2018-05-04 11:04:26', '2018-05-04 11:05:17', 'Jeffindon', 'jeffindon', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(18, '94997', '', '', '2018-05-04 12:47:23', '2018-05-04 12:47:57', 'Alexzander', 'alex', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(19, '77271', '', '', '2018-05-04 13:29:12', '2018-05-04 13:29:50', 'Raymond', 'Raymond', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(20, '87977', '', '', '2018-05-04 13:44:20', '2018-05-04 13:45:30', 'daniel chin ', 'Daniel', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(21, '19390', '', '', '2018-05-05 00:58:32', '2018-05-05 00:59:30', 'vic', 'Vic', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(22, '89556', '', '', '2018-05-05 04:48:34', '2018-05-05 04:50:04', 'hui chee ', 'Hui Chee', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(23, '42169', '', '', '2018-05-05 04:48:34', '2018-05-05 04:50:04', 'mark low', 'Mark Low', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(24, '86300', '', '', '2018-05-05 04:48:34', '2018-05-05 04:50:04', 'Gwen Chan', 'Gwen Chan', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(25, '28936', '', '', '2018-05-05 07:37:17', '2018-05-05 07:37:47', 'artika', 'artika', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'SZX', 'SHENZHEN', 'CN', 'China', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(26, '71414', '', '', '2018-05-05 07:57:43', '2018-05-06 09:44:37', '', 'E', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(27, '36267', '', '', '2018-05-05 07:57:43', '2018-05-06 09:44:37', '', 'Eileen', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(28, '94189', '', '', '2018-05-05 07:57:49', '2018-05-05 12:07:56', '', 'Test', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(29, '79827', '', '', '2018-05-05 07:57:49', '2018-05-05 12:07:56', '', 'Emily', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(30, '59134', '', '', '2018-05-05 07:57:49', '2018-05-05 12:07:56', '', 'Lisyuan', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(31, '93922', '', '', '2018-05-05 12:01:59', '2018-05-05 12:07:56', 'CHAN WAN KIT', 'Chan wan kit', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(32, '80454', '', '', '2018-05-05 12:08:59', '2018-05-05 12:10:42', 'Lina', 'O', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(33, '93509', '', '', '2018-05-05 12:17:07', '2018-05-05 12:26:33', 'Louis Chou', 'Louis', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(34, '83566', '', '', '2018-05-05 12:19:36', '2018-05-05 12:26:47', 'Kwong Ming ', 'Kwong', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(35, '66297', '', '', '2018-05-05 12:20:41', '2018-05-05 12:21:51', 'Priscilla Yong', 'Priscilla', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(36, '16883', '', '', '2018-05-05 12:57:28', '2018-05-05 12:58:24', 'WOng', 'Wong', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(37, '94858', '', '', '2018-05-05 15:27:59', '2018-05-05 15:30:17', 'Eeric', 'Eeric', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(38, '98424', '', '', '2018-05-05 15:27:59', '2018-05-05 15:30:17', 'ANTHONY YII', 'Anthony', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(39, '13810', '', '', '2018-05-06 05:49:15', '2018-05-06 05:52:16', 'clement', 'Clement', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(40, '15551', '', '', '2018-05-06 09:03:43', '2018-05-06 12:09:55', '', '', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(41, '89113', '', '', '2018-05-06 10:38:10', '2018-05-06 10:39:08', '', 'Grace', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(42, '62877', '', '', '2018-05-06 12:17:35', '2018-05-06 12:19:10', '', '', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(43, '25436', '', '', '2018-05-06 14:03:49', '0000-00-00 00:00:00', '', '', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'IP', 'In Proceed', 'IS', 'Is Shipping', ''),
(44, '93902', '', '', '2018-05-06 15:05:12', '2018-05-06 15:06:20', '', '', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(45, '15149', '', '', '2018-05-06 15:14:08', '2018-05-06 15:14:59', '', '', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(46, '54456', '', '', '2018-05-07 02:41:25', '2018-05-07 02:42:33', '', '', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(47, '66238', '', '', '2018-05-07 07:08:12', '2018-05-07 07:08:54', '', '', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(48, '29834', '', '', '2018-05-07 07:20:59', '2018-05-07 07:21:35', '', '', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(49, '47461', '', '', '2018-05-07 12:28:52', '2018-05-07 12:31:33', '', '', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(50, '37747', '', '', '2018-05-08 06:14:19', '2018-05-08 06:15:03', '', '', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'DL', 'Delivered', 'DL', 'Delivered', ''),
(51, '58584', '', '', '2018-05-16 09:35:14', '0000-00-00 00:00:00', '', '', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', '', '', '', '', 'IP', 'In Proceed', 'IS', 'Is Shipping', ''),
(52, 'LWE1526908305MY', '', '', '2018-05-21 13:11:52', '0000-00-00 00:00:00', 'Jing', '', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'IP', 'In Proceed', 'IS', 'Is Shipping', '');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slot_id` int(11) NOT NULL,
  `slot_aisle` int(100) NOT NULL,
  `slot_num` int(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slot_id`, `slot_aisle`, `slot_num`, `status`, `user_id`) VALUES
(2, 2, 2, 'In Use', 35),
(4, 3, 5, 'Not In Use', NULL),
(5, 1, 1, 'Not In Use', NULL),
(6, 1, 2, 'In Use', 13),
(7, 2, 1, 'In Use', 3),
(8, 1, 3, 'In Use', 43),
(9, 1, 4, 'Not In Use', NULL),
(10, 1, 5, 'In Use', 15),
(11, 1, 6, 'In Use', 67),
(12, 1, 7, 'Not In Use', NULL),
(13, 1, 8, 'In Use', 37),
(14, 1, 9, 'Not In Use', NULL),
(15, 1, 4, 'Not In Use', NULL),
(16, 1, 7, 'Not In Use', NULL),
(17, 1, 9, 'Not In Use', NULL),
(18, 1, 10, 'In Use', 50),
(19, 1, 11, 'Not In Use', NULL),
(20, 1, 12, 'Not In Use', NULL),
(21, 1, 13, 'Not In Use', NULL),
(22, 1, 14, 'In Use', 28),
(23, 1, 15, 'In Use', 58),
(24, 1, 16, 'Not In Use', NULL),
(25, 1, 17, 'In Use', 62),
(26, 5, 1, 'In Use', 87),
(27, 5, 2, 'In Use', 86),
(28, 5, 3, 'Not In Use', NULL),
(29, 5, 4, 'Not In Use', NULL),
(30, 5, 4, 'In Use', 60),
(31, 5, 6, 'Not In Use', NULL),
(32, 3, 1, 'Not In Use', NULL),
(33, 1, 25, 'In Use', 71),
(34, 3, 42, 'Not In Use', NULL),
(35, 5, 13, 'In Use', 1),
(36, 3, 23, 'Not In Use', NULL),
(37, 1, 24, 'Not In Use', NULL),
(38, 6, 1, 'In Use', 66),
(39, 10, 1, 'In Use', 57),
(40, 9, 1, 'In Use', 68),
(41, 9, 2, 'In Use', 69),
(42, 9, 3, 'In Use', 7),
(43, 9, 9, 'Not In Use', NULL),
(44, 9, 10, 'Not In Use', NULL),
(45, 4, 9, 'In Use', 11),
(46, 5, 1, 'Not In Use', NULL),
(47, 8, 1, 'Not In Use', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Selangor'),
(2, 'Kuala Lumpur'),
(3, 'Sarawak'),
(4, 'Johor'),
(5, 'Penang'),
(6, 'Sabah'),
(7, 'Perak'),
(8, 'Pahang'),
(9, 'Negeri Sembilan'),
(10, 'Kedah'),
(11, 'Melaka'),
(12, 'Terengganu'),
(13, 'Kelantan'),
(14, 'Labuan'),
(15, 'Perlis');

-- --------------------------------------------------------

--
-- Table structure for table `top_up`
--

CREATE TABLE `top_up` (
  `top_up_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `top_up_amount` decimal(10,2) NOT NULL,
  `top_up_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `top_up`
--

INSERT INTO `top_up` (`top_up_id`, `payment_id`, `paid_amount`, `top_up_amount`, `top_up_reason`) VALUES
(1, 725255, '291.90', '50.00', 'SALE ENDED');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `country_id` int(11) NOT NULL,
  `statuss` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `forgot_pass_identity` varchar(100) NOT NULL,
  `verify` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `contact`, `email`, `password`, `type`, `image`, `country_id`, `statuss`, `created`, `modified`, `forgot_pass_identity`, `verify`) VALUES
(0, 'Admin', 'admin', '123456789', 'admin@email.com', '$2y$10$8F.4cJe7IlO0ooO0SvDjz.4BeA6FiRmbeaDBtV.7rvfW1SSHLyInK', 'admin', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(1, 'Eileen', 'Kho', '0109800578', 'neelie0501@gmail.com', '$2y$10$ufJWRC6Fa8BGmomrxImRi.jjH09e3i8N70uTtnZ6LHRcCq5D3LOu6', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '2018-05-21 02:38:35', 'bd53d0d191e77c50604983b7ae0bcf95', 'yes'),
(2, 'Samuel ', 'Hii', '0165520808', 'wosamuelh.t.o@hotmail.my', '$2y$10$sFnwdUfoQaTeyA5rGvLvfezfQkSekAs49h/mNYzsdTHMospZ/TknO', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '2018-04-16 03:39:36', '', 'yes'),
(3, 'clement', 'chuo hui', '01110521019', 'clementchuo@gmail.com', '$2y$10$p/j/FBePTYwB7PYJGaIYfud42pmIJ3rGs0ZOvX4GlMG6KLCWP4Jla', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(4, 'aqmar', 'nordin', '0133095483', 'aqmar.nordin@unixus.com', '$2y$10$NQfSjt983MCwPUBelpFAeOoVWYPZZeFEBfhvunmNIfrhnGRROUvX.', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(5, 'aqmar', 'nordin', '0133095483', 'zatieyl@gmail.com', '$2y$10$/Jy81dzvXtWOe6gstIXcruYN1xJpnwaHFpfAtMprNPWmD4FeBPn/u', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '2018-04-20 02:19:26', '83591bb9696e5f09670e094fe193b2a2', 'yes'),
(6, 'VERN SHEARN', 'ONG', '0122323115', 'vernshearn.ong@etailergateway.com.my', '$2y$10$x/VYg88rDF9xlgXDEIsejeDbf.O5RYiYI8y4XtPNsMuvwG7Cur.2C', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(7, 'Kent', 'Tan', '0174033422', 'kent@etailergateway.com.my', '$2y$10$ctIcC2eaFgGrElsHVgWGouaPHN1PONKNeUlTXtdCZiDPzWaLLR5kG', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(8, 'cecilia', 'lee', '0182353238', 'cecilia@etailergateway.com.my', '$2y$10$J..ZYxQPR2VUPSUf/Tr7COG5c0M6XjTHunVGtQ6Zab6CSbdKxI22q', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(9, 'ym', 'c', '11111111', 'yingming@unixus.com.my', '$2y$10$oYcaSoWQCBZgmlHzJZrEc.1O2oN/nDtqPStYeViAYrkpazRRAaqaW', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(10, 'RIDHWAN', 'RAZALI', '0179571329', 'ridhwan.razali@unixus.com.my', '$2y$10$nUjJyyK1k3hNhX7tT8pj9uEOqMjZgDcltK0MVfYFX2dhZbaWHZRSG', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(11, 'Fahmi', 'mohd', '601866652314', 'zinkronz@gmail.com', '$2y$10$MSDTH.eM38IQ/TPHHBNEuuUh3oqGB6fCRkrOAi.BMxu9t/51AjcGO', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(12, 'Ebon', 'Wong', '', 'ebonwong@gmail.com', '$2y$10$H3toTQy5.5BgSNZY/tx/Seheee1bC3smQJN0amL72S5mcnWE4/Zhi', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(13, 'Michelle', 'Kho', '0109682208', 'michelle87wt@gmail.com', '$2y$10$FYqhnWGSQlUXrTkWOEXMfe1A49P4WPV6TTRBSAW.uhJZ7VW92nhyW', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(14, 'Ridhwan', 'Razali', '0179571329', 'muhamadridhwan48@gmail.com', '$2y$10$4CL9l2kb9z1soj.HidD69uPwV2ureHrjIZ664tzpmtm8O10W2msL2', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(15, 'Daphne', 'Choong', '012-3668290', 'daphne@unixus.com.my', '$2y$10$CrELO5SkEk04Vn69cRlfj.J4NEOyKC3bmGLFy74x09YtQtwEBPKOy', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '2018-05-21 07:52:08', '4f467b11443f3d3d98234c8689108006', 'yes'),
(16, 'Ho Vincent', 'Dek Seng', '010-9826087', 'vincentho96@outlook.com', '$2y$10$FUl.DZLKkCJ2ubqPABCGfets8HJGhkxQedjfKYtZtEBbsWtzuXPMS', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(17, 'kong', 'choon hong', '0149002572', 'c_hong89@hotmail.com', '$2y$10$jRewf7KzWG/UGkBruXsC0uSydK0/nnq1KxwYG1Lon9yE3mRf6O0Zi', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(18, 'Austin Low', 'Ming Xiang', '', 'austin_lmx@hotmail.com', '$2y$10$DX.czxJyMnprKg3g7q.VWunjfKPfcdSOModhWY3tEJhvOarbXQzCO', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(19, 'Douglas', 'Chong ', '0102156638', 'douglas@lwe.com.my', '$2y$10$H0wIK.rtv81wn/W5rEvZL.qcePzAOT3Xk23Ml40oZf0KJJpk0uC3y', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(20, 'Yin Shan', 'Lai', '0149854624', 'yinshan@lwe.com.my', '$2y$10$EwPJrqw3VnqFkJ5IRr/HLO7M0eQ.jmcDiDBLgc1wIqjNXBxPvp546', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(21, 'Chen Ning', 'Clarence Leong', '0126101340', 'clarence@o2o.my', '$2y$10$eO4E74lgyhdtw/FMlO/ymuhAPx4Vk8IY6RBh/uHkjDc2ImSe7ExKC', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(22, 'Aqmar', 'Nordin', '0388008838x813', 'aqmar.nordin@unixus.com.my', '$2y$10$rXP2R2ETeivt8O1vDrrZZeMCGNoXqhbWf02HFuqEE.AJcnW2xavy2', 'staff', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(23, 'Justin', 'Ng', '+60163837857', 'nyk2000m@gmail.com', '$2y$10$iyfBZcy2UgJ1l5dfmPSEk.gB0V2tplH4jyKvmbLcJUjYADimKHEvu', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(24, 'JAGAN', 'MAHADEVAN', '0177427305', 'jayguru45@gmail.com', '$2y$10$1guQbx.ms8Ns6yNFHzEx2.vgEQpoNTJ/URJabQ6JCAbG38KUPSqbK', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(25, 'Jackson', 'Ting', '0176138021', 'ngeezai@gmail.com', '$2y$10$39jg.nmDPAtvz2TIjo/lmeARJGkgEQ4zWRkirV39F5jgDGV8kOA.i', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(26, 'Surendran', 'Govindaraju', '0174969605', 'surendrangovindaraju@gmail.com', '$2y$10$sEl7qeABtoS2BoATiXF.i.rUyQ6kP7Yr0UPV1JZGwLbAMttkU8yQ6', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(27, 'Surendran', 'Govindaraju', '0174969605', 'surendran.govindaraju@lwe.com.my', '$2y$10$400Q/kXRpNJEbhl5wKa9y.0bHfYlUBP/5OJwWpCEnLwPDYrJbiS/a', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(28, 'Boon Han', 'Lee', '0123456789', 'boonhan.lee@unixus.com.my', '$2y$10$i7O754wMmZH6dTltaYCPLukPYVba9MkX5sA60fXhyyqX/tUixRW5.', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '2018-04-26 12:38:26', '81f33d3f406b115a50db03017d81bd3f', 'yes'),
(29, 'Patricia', 'Ting', '016-5896877', 'patricia.hikari@gmail.com', '$2y$10$y6CPQb2v4tlpN117nCvpxOjWSnZxagfpvV2UPB2U8Bbto4i3PIAqS', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(30, 'Jesse', 'Sii', '60146817578', 'mrzeals93@gmail.com', '$2y$10$tFdKuY3ToSumKsmy3sIRtONMndt.mOkIG95JS1cuJ2IoAbnE7T49m', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(32, 'Yek', 'Peter Nai Xin', '0198259711', 'peterynx@hotmail.com', '$2y$10$RUerKSzRmz.UDH2kV3Bsz.E5tIAkViVRIrzkj225WPcUCGYHshGhC', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(33, 'Grace', 'Kho', '+60165790196', 'dreamlover_1290@yahoo.com', '$2y$10$S7yeu0p3IA.aKg8jCpbse.Lzus13yplw34r.tUWH6/ok6Nj7SBMjm', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(35, 'hii', 'samuel', '0123456789', 'wosamuelh.t.o@gmail.com', '$2y$10$ySzKYHUpTWr/fbyAm4oNk.81AHb1CY8MoFshn2isDBf7RxCkbozqO', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(36, 'ren', 'jin', '0162071228', 'renjin21@gmail.com', '$2y$10$ki05yjcrwCUGe3mIiYXDg.cE80YmFkw1wTYmOL2oONp8PjRhjQ8du', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(37, 'Wan Kit', 'Chan', '0174777862', 'chanwankit@gmail.com', '$2y$10$TWNEMbzlgPvidvJ8Kg7.muZKr18V4c5rpMl4evmuA9IBqoz9MsIpG', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(38, 'b', 'panther', '101', 'ksloke@swinburne.edu.my', '$2y$10$RBg6/OUo2HhUl7srqq0bouhnwDymmUhR119MvC5e4U.lEeTEU3p9G', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(39, 'Steve', 'Choong', '0123396621', 'ste8118@hotmail.com', '$2y$10$aW3iHuYCClkNyUB1xwQxsuBktgKaCZhv1JZ9.GcL/eDA.2F9Jty0i', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(40, 'Xavier', 'Wong', '01110583371', 'WongKS07@hotmail.com', '$2y$10$WyrJX4VF9vPX6XT0K0MBfue62kw3MQhCWPPAVld77.r5gtpXtZ2cO', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(41, 'phoebe ', 'Tiang', '0166671014', 'phoebetiang@outlook.com', '$2y$10$LC4iEkDUPRFwOcxILsLZEe//XHgY8StWR9qTAoP58LzYLJI7O0ARW', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(42, 'janice', 'low', '0168748224', 'cathrynlow72@gmail.com', '$2y$10$ngwNTUt90BnPMymgnJKz2.OmtXYOZhuLInN04AhwwXTPTnImKX/Hi', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(43, 'Isabelle', 'Lim', '378586478534', 'diannelim96@hotmail.com', '$2y$10$0YL4eZKJNt6LJOuCr5x22euXRxlGkm1L6pjzXjcByddpH7mlevI7W', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(44, 'Long', 'Lim', '01120311765', 'Ahhong9018@gmail.com', '$2y$10$RB3dsYIv0xh9o3KvvXHf3enWiRQKLs2QgXoRIZBJ3Z8pdaM8jRd5e', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(45, 'Esther Ho ', 'Siew yii', '0109808269', 'siewyii97@gmail.com', '$2y$10$NabV/EUgvUImz8wPt44v4eXrWcoGWLlkviH7ADVwH/OREycRKTx76', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(46, 'Wong', 'Ting', '01111433196', 'doublemoon331@hotmail.com', '$2y$10$jblqPkS0szfhXsSqV82X9eFjNMod2lHWhq2abdXMWS1J9.HrzB1nq', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(48, 'Ting ', 'Lee Ting', '0165768838', 'lol@gmail.com', '$2y$10$YdmWAKVtV5Q7g4Th/Y6BIOSrojlROJA3SDjEwfxIpCPpeVZXEc/3e', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(49, 'bla bla bla', 'lul ulul', '0123456789', 'idontknowxdlul@gmail.com', '$2y$10$S8zNJe/dmjqoa75Gw99J/ecK9h3ZQT7jsIEd.3k5as02b11XuLJ4.', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(50, 'Jonathan', 'Loh Tuong Seng ', '0109806413', 'jonathanloh0820@gmail.com', '$2y$10$ssrhi6i1iMFLKHkVeDh5KOcu9A9ciWyB8YRa5UJugFwR11a9YxjmS', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(51, 'alex', 'lim', '+60177253631', 'lim_sang_ching@hotmail.com', '$2y$10$vx0pRnewRPr0EaAuOWEE5OlCqQbrwbWIklxP7LTa5TmnKRrKPiOza', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(52, 'Jeffindon Chan', 'Ting Yue', '0107932298', 'jeffindon_95@outlook.com', '$2y$10$fZGKRYSnN7DdZs4nOrVDOep5H7dNxCGFlWqNut9jATPEPs/cktz.O', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(54, 'Isaac', 'Lau Jik Hui', '0168743193', 'isaaclau0110@hotmail.com', '$2y$10$ZRTdvzF9LiJPVQpC/zijv.NgW9jizjO88Z.0r4LqJ3QaQqdQ7lZDG', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(55, 'Felix', 'Kok', '0182996162', 'vitaskok93@outlook.com', '$2y$10$MXR2Y4uhAf4urqDkDIQqwuSXeOgYXn1zmIqr8jm/AH2YXhKxDg74K', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(56, 'Sung', 'Gordon', '0128533296', 'mhp2g6177@gmail.com', '$2y$10$6u4HaltgT4UdBAdGBWlJye48ORalZgKKsWgkd0CmeSIdPQPyKWAqW', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(57, 'Simon Yii', 'Tiong Wei', '0167029535', 'sytw9535@gmail.com', '$2y$10$6xGKjFwinm94rum1iZW45uCMutFsLpY5JhZ4U5N/jH6301kKBRSZm', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(58, 'Siong Hau ', 'Wong ', '0138026881', 'kevinwong_93@hotmail.com', '$2y$10$PAQiueVFgOkdcr3kcSmo7OhN3ftgNpYTZP4H7fny5zhY/i2XdTFR.', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(59, 'Low', 'Son Fat', '0192705934', 'marklow70@gmail.com', '$2y$10$IUtEWTkn7Hzz25McJk.aTu2iF1kea8Ld/J/UUPAgwNEhwuct51bHm', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(60, 'Kho', 'Hui Chee', '01126820816', 'huichee122196@gmail.com', '$2y$10$C1aKE1T4dF3XiG9u27EwbunQ1z0uztRqfZudxBnXwJLDHg5Qb5dmq', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(61, 'Gwen', 'Chan', '0128351323', 'snsdfanclub7@gmail.com', '$2y$10$S02umC7rMIct4pGoeQbroOr58qVTovBwcBlW6sc7e.IRFNXPIzIpO', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(62, 'Alexzander', 'Chong', '0109770380', 'asaracrescent@gmail.com', '$2y$10$Px3XkbhUemxywbVovAitE.2tU73yQ02E/8rpzc1ruZKGRwt7ObQPe', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(63, 'daniel', 'chin', '0168717928', 'chinsh986@gmail.com', '$2y$10$tpDGHhhthrS3OueWlu1oDOGc.ufD8VsoVjqhCsddj82Wqd0.wXzSS', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(64, 'Raymond', 'Ting', '0168822172', 'imraymondting@gmail.com', '$2y$10$D0N8RnwlmBLlO9HeITz3xOh6hzcFFjAcwkc8PYdG28RsbpVU6gdP6', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(65, 'Victor', 'Chin', '0168883813', '4330870@students.swinburne.edu.my', '$2y$10$71A076nwvjWvtfAGpM/UkeSNzJhBn1MA/Q3YRGhfOYG1pwofturXW', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(66, 'Emily', 'Khoo', '0168885846', 'emilykhoo9281@gmail.com', '$2y$10$0y3FxKdMB2vQazRBZM3b5.Czgp3upZh3ouS4nGl6aV/KZ6Dp4wIcS', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(67, 'kwong', 'ming', '0198567212', 'kmchuo65@gmail.com', '$2y$10$hOi8F9AInsDN4c5phigYtOEKM2BtFz7erGoC8aOLhKklh14iKaHg6', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(68, 'Lina ', 'yee', '0198882364', 'yylin6868@gmail.com', '$2y$10$vNLzDplI6I5EzLQ.GZtm2.OOTzAbWGTtH0Gtrk1svj/pIRxx.mHx.', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(69, 'lishyuan', 'chuo', '0192228367', 'lishyuan0522@gmail.com', '$2y$10$fMnXt.BH4XDOIrHZVcu1Fu9OY5zbEPvxmdl./Sf2Z02fFLCiioQhm', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(70, 'louis', 'chuo', '0168923423', 'louischuo92@gmail.com', '$2y$10$uhgSoTli6bJmF9PExMXIiuzHaBsEwrw2LKng5Kbu/E8aPpo7SE4ii', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(71, 'artika', 'liana jun', '0128804673', 'ikalianajun95@gmail.com', '$2y$10$m6kul4FavmumnXplpocXeuN5umauHNmCBMfolUYLjsMJC8Hw95Vvm', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(72, 'Priscilla', 'Yong', '0192880270', 'priscilla_yong@hotmail.com', '$2y$10$ZFnma.xosPwQwj9HRcvnzOPAkoHMR8I8WBreM2AnP61QgofI8Mj0a', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(74, 'Wong', 'Hie Ing', '0168734689', 'hieingwong@hotmail.com', '$2y$10$86R03zg1rArhy.cuZrNYv.uZBepCWWrSgw/j00wUXOHGlPMGAzdo2', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(75, 'ANTHONY YII', 'LEE KIM', '60168657210', 'mryii88@hotmail.com', '$2y$10$u7tYzgD.JX.GrPjM7wH4iuBjcNnPLFUo5nCb1rcNcLoqjWDb/7/8i', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(76, 'Eeric', 'Sing Sing', '0168168316', 'eric910628@gmail.com', '$2y$10$JzQzgYWwiIbuiXDLMvN.meVhzh73vg72lNCwCwXQAR.2RHLtYwR6i', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(77, 'Edwin', 'Lai', '016-5793099', 'edwin856@hotmail.com', '$2y$10$43fssFT4hW6jlyEwJYpjVO3ZhQGAr/k7iUthyKrf.MSaUjKVPhyDi', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(78, 'ELEANOR', 'AYU', '0168716570', 'anne_eleanor@hotmail.com', '$2y$10$ZHbWci2N9CXkMhvh9bm9TuF0VyeZUxJ8Hv.SMXpoDENXmA5Rcp34e', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(79, 'testing', 'testing', 'aasdasdasdsdasd', 'testing@email.com', '$2y$10$2DUcbQGkW59WBZ5mreCMauxipbxPjg118XJw5EPwR0YBFKg8Rt93i', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(80, 'Yeo ', 'Yvonne Ying Ying ', '0162100314', 'yvonneyeo1996@gmail.com', '$2y$10$ZFC6yxlmIoPANgls.QtUKeT26dnO1br.1g4PGlSZFCPi4bWqXJ/sG', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(81, 'Emilia Ting', 'Ing Chieh', '0128787501', 'yuandingzhongsheng@hotmail.com', '$2y$10$scUIbJagGGtbHlKXiRANuu3OZlHdbhauZhIxpHEunFyx40OMcE/fu', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(82, 'Michelle', 'Chen', '016-8781648', 'piggypianist@gmail.com', '$2y$10$tMdI3DgRXzCsJvzGKlgbW.aslO8IkBTTQX139m23JJ0V3Fc2V9g1e', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(83, 'William', 'Ting', '+60198164385', 'williamtingdauhu@gmail.com', '$2y$10$.CA/rYkb7YFLL.Gxu7YGeeMfmaXppNNdmN4V.lAAkEZ3HehSUXM9W', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(84, 'Tan', 'Dennis', '0132077761', 'dennis@aventa.my', '$2y$10$rwvgiH4IUzYeicS/ehoNju9ojEYthyml2Sx66ivUJ.yXtqG2aH7B6', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(85, 'alex', 'lau', '0178022187', 'alexlau9191@gmail.com', '$2y$10$G8sBx3dg4QCxBciu/I7nG.nP0aSai4PdihfR4nTzH3KeOsHnX9Qtq', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(86, 'Mandy', 'Sim', '013 888 9897', 'mandysim@yahoo.com', '$2y$10$n0mSmrTbgKGe39vh8CIeSOoTPsKmEHMlh2NZWQi5ZWBOyRt4FqOum', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(87, 'Bong', 'Elleen', '0146925309', 'elleenbong1007@gmail.com', '$2y$10$v10zz0bCKvSWJL.u3Pe1Ou8UQ.WVN2JTL0nQC3k5bbFNZxS1zyw4.', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes'),
(88, 'Jonathan', 'Lao', '0168609779', 'jonathanlao@tek.com.my', '$2y$10$SuIkw2loMjSFfXqdevTlmOMfYlCFvB6KJoqY0GGelwMt8KkbHP0Zm', 'customer', '', 0, 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `ware_id` int(11) NOT NULL,
  `station_code` varchar(10) NOT NULL,
  `station_name` text NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `country_name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`ware_id`, `station_code`, `station_name`, `country_code`, `country_name`, `address`) VALUES
(1, 'KUL', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA', 'MY', 'Malaysia', 'No.4, (Block B) Lorong SS 13/6C\r\nSubang Jaya Industrial Estate\r\n47500 Subang\r\nSelangor Darul Ehsan, Malaysia'),
(2, 'SZX', 'SHENZHEN', 'CN', 'China', '7th, Second Road, Industrial Estate in Xin Mu Old Village, Ping Hu Town,\r\nLoggang District, Shenzhen, Guangdong, \r\n518111, China');

-- --------------------------------------------------------

--
-- Table structure for table `work_station`
--

CREATE TABLE `work_station` (
  `work_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ware_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_station`
--

INSERT INTO `work_station` (`work_id`, `user_id`, `ware_id`) VALUES
(1, 0, 1),
(2, 22, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`point_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `recipient_contact`
--
ALTER TABLE `recipient_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `recipient_names`
--
ALTER TABLE `recipient_names`
  ADD PRIMARY KEY (`name_id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`refund_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `shipping_update_details`
--
ALTER TABLE `shipping_update_details`
  ADD PRIMARY KEY (`sud_id`);

--
-- Indexes for table `shipping_update_summary`
--
ALTER TABLE `shipping_update_summary`
  ADD PRIMARY KEY (`sum_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `top_up`
--
ALTER TABLE `top_up`
  ADD PRIMARY KEY (`top_up_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`ware_id`);

--
-- Indexes for table `work_station`
--
ALTER TABLE `work_station`
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `point_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recipient_contact`
--
ALTER TABLE `recipient_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recipient_names`
--
ALTER TABLE `recipient_names`
  MODIFY `name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `refund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `shipping_update_details`
--
ALTER TABLE `shipping_update_details`
  MODIFY `sud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `shipping_update_summary`
--
ALTER TABLE `shipping_update_summary`
  MODIFY `sum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `top_up`
--
ALTER TABLE `top_up`
  MODIFY `top_up_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `ware_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work_station`
--
ALTER TABLE `work_station`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
