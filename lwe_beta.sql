-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 08:50 AM
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
  `postcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `address`, `state`, `city`, `country`, `postcode`) VALUES
(50, 1, 'cityone', 'Sarawak', 'kuching', 'Malaysia', 93350),
(51, 2, 'cityone megamall', 'Sarawak', 'kuching', 'Malaysia', 93330),
(52, 3, 'spring', 'Sarawak', 'kuching', 'Malaysia', 93350);

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
(1, 'Bag'),
(2, 'Clothes'),
(3, 'Others');

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
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 2, 'Order Item', 'è‹¹æžœxæ‰‹æœºå£³8xéšå½¢æŒ‡çŽ¯ä¸€ä½“10æ”¯æž¶è½¯iph', '123', '0.20', '2018-03-29 09:03:58', 877923, 'In'),
(4, 10, 'Order Item', 'é”èˆžiPhoneXæ‰‹æœºå£³è‹¹æžœXæ–°æ¬¾é€æ˜Žå¥—ç¡…èƒ¶', '546', '0.30', '2018-03-29 07:57:02', 168112, 'In'),
(5, 2, 'Order Item', 'è‹¹æžœ6æ‰‹æœºå£³æŒ‚ç»³å¥³æ¬¾éŸ©å›½å¡é€šé•¶é’»å¸¦ç', '71523875', '0.50', '2018-03-29 09:03:58', 877923, 'In'),
(6, 10, 'Order Item', 'vivox20æ‰‹æœºå£³x20plusè¶…è–„ç£¨ç ‚å£³vivo x9så…¨å', '762345871', '0.80', '2018-03-29 07:57:02', 168112, 'In'),
(7, 10, 'Order Item', 'ç«‹ä½“å¯çˆ±å¡é€šè¶´è¶´è“å…‰é•œé¢iphoneX/6sæ‰‹æ', '238468753', '0.30', '2018-03-30 08:42:59', NULL, 'In'),
(8, 2, 'Receive Request', 'iphone casing', '1237634', '0.20', '2018-03-29 09:03:58', 877923, 'In'),
(9, 10, 'Order Item', 'test1', '13647', '23.00', '2018-03-29 09:27:21', 496642, 'In'),
(10, 10, 'Purchase Request', 'test1', '6152374', '1.20', '2018-03-30 06:32:51', NULL, 'In'),
(11, 2, 'Purchase Request', 'bagpack', '12345', '1.30', '2018-04-01 05:28:26', 163783, 'In'),
(12, 2, 'Purchase Request', 't-shirt', '12365', '0.20', '2018-04-01 05:28:26', 163783, 'In');

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
(55, 684783, 3, 'è‹¹æžœ6æ‰‹æœºå£³æŒ‚ç»³å¥³æ¬¾éŸ©å›½å¡é€šé•¶é’»å¸¦ç±³å¥‡æ½®å¥³iphone6splusæ‰‹æœºå£³', 'https://detail.tmall.com/item.htm?spm=a230r.1.14.23.655d24997niGCK&id=543254012847&ns=1&abbucket=1&skuId=3432786071448', 'Others', 1, 'pink', '23.56', 'Received', '71523875', NULL, '2018-03-29 07:13:52', NULL),
(56, 291973, 3, 'è‹¹æžœxæ‰‹æœºå£³8xéšå½¢æŒ‡çŽ¯ä¸€ä½“10æ”¯æž¶è½¯iphonexé˜²æ‘”ç¡…èƒ¶è½¯å£³ç”·å¥³x', 'https://detail.tmall.com/item.htm?id=566735439335&ali_refid=a3_430583_1006:1110869209:N:%E6%89%8B%E6%9C%BA%E5%A3%B3:3ec633ca32bd3bff47143aed7523ec2c&ali_trackid=1_3ec633ca32bd3bff47143aed7523ec2c&spm=a230r.1.14.1&skuId=3766516107594', 'Others', 1, 'red', '17.36', 'Received', '123', NULL, '2018-03-29 07:13:11', 1),
(57, NULL, 3, 'iphone8plusä¿„ç½—æ–¯æ–¹å—æ‰‹æœºå£³è‹¹æžœ7æ¸¸æˆæœº6sæ–°æ¬¾åˆ›æ„6på¤å¤å…¨åŒ…X', 'https://detail.tmall.com/item.htm?spm=a230r.1.14.57.655d24997niGCK&id=565360139675&ns=1&abbucket=1', 'Others', 1, '6 black', NULL, 'Declined', NULL, 'cancel', '2018-03-29 04:55:30', NULL),
(58, 431582, 2, 'vivox20æ‰‹æœºå£³x20plusè¶…è–„ç£¨ç ‚å£³vivo x9så…¨åŒ…é˜²æ‘”x9æ½®ç”·å¥³æ¬¾è½¯å¥—', 'https://item.taobao.com/item.htm?spm=a230r.1.14.141.655d24997niGCK&id=562155765683&ns=1&abbucket=1#detail', 'Others', 1, 'x20 black', '17.36', 'Received', '762345871', NULL, '2018-03-29 07:14:10', NULL),
(59, 431582, 2, 'ç«‹ä½“å¯çˆ±å¡é€šè¶´è¶´è“å…‰é•œé¢iphoneX/6sæ‰‹æœºå£³è‹¹æžœ7/8plusæƒ…ä¾£è½¯å£³', 'https://item.taobao.com/item.htm?spm=a230r.1.14.176.655d24997niGCK&id=563036514616&ns=1&abbucket=1#detail', 'Others', 2, '6 bear', '17.98', 'Received', '238468753', NULL, '2018-03-29 07:20:13', NULL),
(60, 710602, 2, 'é”èˆžiPhoneXæ‰‹æœºå£³è‹¹æžœXæ–°æ¬¾é€æ˜Žå¥—ç¡…èƒ¶é˜²æ‘”iPhone Xå¥³8Xæ½®ç‰Œè¶…è–„', 'https://detail.tmall.com/item.htm?spm=a230r.1.14.117.655d24997niGCK&id=558190398563&ns=1&abbucket=1', 'Others', 1, 'x transparent', '21.70', 'Received', '546', NULL, '2018-03-29 07:13:37', 2),
(61, 864932, 2, 'test1', 'http://localhost/lwebuy_beta/user/main.php#purchase', 'Others', 2, 'try', '14.26', 'Received', '13647', NULL, '2018-03-29 09:26:46', 8),
(62, 626932, 2, 'test1', '1234', 'Clothes', 2, '63', '6.20', 'Received', '6152374', NULL, '2018-03-30 06:33:11', 9),
(63, 631612, 2, 'test2', '752378', 'Others', 1, '53', '2.48', 'Ready to Pay', NULL, NULL, '2018-03-30 07:34:04', 10),
(64, 412293, 3, 'bagpack', 'http://localhost/lwebuy_beta/user/main.php#purchase', 'Bag', 1, 'blue', '21.08', 'Received', '12345', NULL, '2018-04-01 05:27:27', NULL),
(65, 433243, 3, 't-shirt', 'http://localhost/lwebuy_beta/user/main.php#purchase', 'Clothes', 1, 'red', '6.20', 'Received', '12365', NULL, '2018-04-01 05:27:39', 11);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(45) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `file` varchar(150) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `top_up_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `datetime`, `title`, `amount`, `file`, `type`, `status`, `top_up_id`) VALUES
(111193, 3, '2018-04-01 05:26:01', 'Top-Up payment 433243', '1.20', '78808-receipt1.jpg', 'image/jpeg', 'Completed', 11),
(161732, 2, '2018-03-29 10:43:25', 'Top-Up payment 168112', '5.00', '98577-receipt.jpg', 'image/jpeg', 'Completed', 5),
(163783, 3, '2018-04-01 05:55:26', 'Pay Shipping', '75.00', '78525-receipt.jpg', 'image/jpeg', 'Completed', NULL),
(164332, 2, '2018-03-29 06:46:48', 'Top-Up payment ', '3.70', '60456-receipt.jpg', 'image/jpeg', 'Completed', 2),
(168112, 2, '2018-03-29 10:43:21', 'Pay Shipping', '75.00', '86743-receipt1.jpg', 'image/jpeg', 'Completed', NULL),
(291973, 3, '2018-03-29 06:43:03', 'Pay Order', '17.36', '22046-receipt.jpg', 'image/jpeg', 'Completed', NULL),
(316542, 2, '2018-03-30 05:09:08', 'Top-Up payment 626932', '1.40', '42782-receipt.jpg', 'image/jpeg', 'Completed', 9),
(320183, 3, '2018-04-01 05:55:30', 'Top-Up payment 163783', '7.00', '94497-receipt1.jpg', 'image/jpeg', 'Completed', 12),
(382662, 2, '2018-03-29 09:26:05', 'Top-Up payment 864932', '0.52', '76267-receipt.jpg', 'image/jpeg', 'Completed', 8),
(412293, 3, '2018-04-01 05:22:27', 'Pay Order', '21.08', '78539-receipt1.jpg', 'image/jpeg', 'Completed', NULL),
(427063, 3, '2018-03-29 06:43:11', 'Top-Up payment 291973', '2.36', '41498-receipt.jpg', 'image/jpeg', 'Completed', 1),
(431582, 2, '2018-03-29 04:57:16', 'Pay Order', '53.32', '79069-receipt.jpg', 'image/jpeg', 'Completed', NULL),
(433243, 3, '2018-04-01 05:25:58', 'Pay Order', '6.2', '44216-receipt.jpg', 'image/jpeg', 'Completed', NULL),
(457173, 3, '2018-04-01 04:57:02', 'Top-Up payment 877923', '12.00', '64682-receipt1.jpg', 'image/jpeg', 'Waiting for Accept', 6),
(474272, 2, '2018-03-30 06:00:52', 'Top-Up payment 631612', '0.48', '99039-receipt.jpg', 'image/jpeg', 'Declined', 10),
(488042, 2, '2018-03-30 08:03:40', 'Top-Up payment 512612', '25.00', '97315-receipt.jpg', 'image/jpeg', 'Declined', 7),
(496642, 2, '2018-03-29 09:28:47', 'Pay Shipping', '1150.00', '28131-receipt.jpg', 'image/jpeg', 'Completed', NULL),
(512612, 2, '2018-03-30 08:41:43', 'Pay Shipping', '50.00', '5246-receipt1.jpg', 'image/jpeg', 'Declined', NULL),
(626932, 2, '2018-03-30 05:09:03', 'Pay Order', '12.40', '45590-receipt1.jpg', 'image/jpeg', 'Completed', NULL),
(631612, 2, '2018-03-30 07:33:45', 'Pay Order', '2.48', '81055-receipt1.jpg', 'image/jpeg', 'Declined', NULL),
(684783, 3, '2018-03-29 04:57:20', 'Pay Order', '23.56', '37041-receipt.jpg', 'image/jpeg', 'Completed', NULL),
(710602, 2, '2018-03-29 06:46:54', 'Pay Order', '21.70', '62355-receipt.jpg', 'image/jpeg', 'Completed', NULL),
(864932, 2, '2018-03-29 09:26:02', 'Pay Order', '28.52', '65750-receipt1.jpg', 'image/jpeg', 'Completed', NULL),
(877923, 3, '2018-03-29 09:03:58', 'Pay Shipping', '50.00', '94883-receipt.jpg', 'image/jpeg', 'Waiting for Accept', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `point_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, '1kg', '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `refund_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `refund_amount` decimal(10,2) NOT NULL,
  `admin_charge` decimal(10,2) NOT NULL,
  `refund_reason` varchar(255) NOT NULL,
  `transaction_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`refund_id`, `user_id`, `total_amount`, `refund_amount`, `admin_charge`, `refund_reason`, `transaction_code`) VALUES
(1, 2, '2.00', '1.80', '0.20', 'test', '12635'),
(2, 2, '30.00', '22.00', '8.00', 'try', NULL);

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
(3, 3, 'iphone casing', '1237634', 'Received', '2018-03-29 07:24:15', '');

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
(6, 2, 'janice', '121242', '2nd floor', 51, '1.10', '75.00', 'Proceed', '2018-03-29 10:43:28', NULL, 168112, NULL, '5', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(7, 3, 'test', '753265', 'careful', 52, '0.90', '50.00', 'Request', '2018-04-01 04:57:02', NULL, 877923, NULL, '6', ''),
(9, 2, 'Janice', '146134', 'try', 51, '23.00', '1150.00', 'Proceed', '2018-03-29 09:28:49', NULL, 496642, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(10, 3, 'Test1', '172853764', 'try', 52, '1.50', '75.00', 'Proceed', '2018-04-01 05:55:33', NULL, 163783, NULL, '12', ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_update_details`
--

CREATE TABLE `shipping_update_details` (
  `sud_id` int(11) NOT NULL,
  `HawbNo` varchar(20) NOT NULL,
  `TransactionDate` datetime NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `shipping_update_summary`
--

CREATE TABLE `shipping_update_summary` (
  `sum_id` int(11) NOT NULL,
  `HawbNo` varchar(20) NOT NULL,
  `XR1` varchar(20) NOT NULL,
  `XR2` varchar(20) NOT NULL,
  `ShipmentDate` datetime NOT NULL,
  `DeliveryDate` datetime NOT NULL,
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
(1, 1, 1, 'Not In Use', NULL),
(2, 1, 2, 'In Use', 3),
(3, 1, 3, 'Not In Use', NULL),
(4, 1, 4, 'Not In Use', NULL),
(5, 1, 5, 'Not In Use', NULL),
(6, 1, 6, 'Not In Use', NULL),
(7, 1, 7, 'Not In Use', NULL),
(8, 1, 8, 'Not In Use', NULL),
(9, 1, 9, 'Not In Use', NULL),
(10, 1, 10, 'In Use', 2);

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
(1, 291973, '15.00', '2.36', 'not enough'),
(2, 710602, '18.00', '3.70', 'please top-up'),
(5, 168112, '70.00', '5.00', 'please top-up'),
(6, 877923, '38.00', '12.00', 'not enough'),
(7, 512612, '25.00', '25.00', 'top-up'),
(8, 864932, '25.00', '0.52', 'topup'),
(9, 626932, '11.00', '1.40', 'not enough'),
(10, 631612, '2.00', '0.48', '123'),
(11, 433243, '5.00', '1.20', 'topup'),
(12, 163783, '68.00', '7.00', 'not enough');

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
  `login_status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `contact`, `email`, `password`, `type`, `image`, `country_id`, `login_status`) VALUES
(1, 'clement', 'chuo', '0123456789', 'clement@email.com', '$2y$10$RSPgYoYQrM.1zCX1ft74uejCBPhvkF185q5nqJMd7i6CJ7zwHS.Eq', 'admin', '', 0, 'Online'),
(2, 'janice', 'low', '1234567', 'janice@email.com', '$2y$10$85paok2VnAH3rM8k1trOLeodixrMtDj1cOrRtV.mok.PrS5JxmeHW', 'customer', '', 0, 'Online'),
(3, 'test', '1', '123412', 'test@email.com', '$2y$10$JvxI/iUlAE6iXeDj0t7rWO/8LsQJC2xFiuYlh6RJ6jY1s0yYA/Vvm', 'customer', '', 0, 'Online');

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
(1, 1, 1);

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
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `point_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `refund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shipping_update_details`
--
ALTER TABLE `shipping_update_details`
  MODIFY `sud_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_update_summary`
--
ALTER TABLE `shipping_update_summary`
  MODIFY `sum_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `top_up`
--
ALTER TABLE `top_up`
  MODIFY `top_up_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `ware_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work_station`
--
ALTER TABLE `work_station`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
