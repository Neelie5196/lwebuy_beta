-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 05:49 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.15

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
CREATE DATABASE IF NOT EXISTS `lwe_beta`;
USE `lwe_beta`;
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
(50, 1, 'cityone', 'Sarawak', 'kuching', 'Malaysia', 93350);

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
(1, 1, 'Order Item', 'casing', '12345', '4.20', '2018-03-24 09:29:54', NULL, 'In'),
(2, 3, 'Order Item', 'casing', '12345', '4.20', '2018-03-25 09:18:15', NULL, 'In');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_item` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` int(15) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `order_code` varchar(25) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `payment_id`, `user_id`, `order_item`, `link`, `category`, `quantity`, `remark`, `price`, `status`, `order_code`, `comment`, `datetime`) VALUES
(46, NULL, 1, 'test1', 'http://localhost/lwebuy_beta/user/main.php#purchase', 'Others', 2, 'lwe', NULL, 'Request', NULL, NULL, '2018-03-25 07:32:16'),
(47, 761872, 1, 'test2', 'https://github.com/Neelie5196/lwebuy_beta', 'Others', 4, 'git', '50.00', 'paid', NULL, NULL, '2018-03-25 04:01:55'),
(49, 761871, 1, 'test3', 'https://stackoverflow.com/questions/19633983/how-to-open-a-link-in-new-windownot-in-new-tab-in-html-css', 'Others', 1, 'google', '32.00', 'Paid', NULL, NULL, '2018-03-25 04:00:11'),
(50, 761872, 1, 'test4', 'www.youtube.com', 'Others', 2, 'youtube', '25.00', 'Proceed', '345', NULL, '2018-03-27 14:57:37'),
(51, NULL, 1, 'test5', 'www.facebook.com', 'Others', 2, 'facebook', NULL, 'declined', NULL, 'declined', '2018-03-25 09:12:29'),
(52, NULL, 1, 'Test6', 'https://www.google.com/search?rlz=1C1CHBF_enMY773MY773&ei=ZCa1WqbpMsnJvgSS2oGYAw&q=close+popup+window+and+refresh+parent+page&oq=close+popup+window+then+re&gs_l=psy-ab.3.0.0i22i30k1l10.87706.93941.0.97809.11.10.1.0.0.0.214.1490.0j9j1.10.0....0...1c.1.64.p', 'Others', 1, 'search', '12.00', 'received', NULL, NULL, '2018-03-25 09:14:24');

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
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `datetime`, `title`, `amount`, `file`, `type`, `status`) VALUES
(761871, 1, '2018-03-25 03:32:11', 'Pay Order', '32.00', '77664-receipt.jpg', 'image/jpeg', 'Completed'),
(761872, 1, '2018-03-25 03:45:37', 'Pay Order', '25.00', '11224-receipt.jpg', 'image/jpeg', 'Completed');

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
(1, 1, '9775.00');

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
(2, 1, 'test1', '123', 'Request', '2018-03-27 14:57:22', 'blue');

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
  `topup` decimal(10,2) DEFAULT NULL,
  `destination_station` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `user_id`, `recipient_name`, `recipient_contact`, `remark`, `address_id`, `weight`, `price`, `status`, `datetime`, `tracking_code`, `payment_id`, `review`, `topup`, `destination_station`) VALUES
(1, 2, 'sdg', 'ewt', '', 50, '12.00', '123', 'Proceed', '2018-03-27 15:48:25', '2345', 2, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(3, 1, 'dfghj', '124', NULL, 50, '2.00', '124', 'Proceed', '2018-03-27 15:48:37', '345672', 0, NULL, NULL, ' KUALA LUMPUR (LOGISTICS HUB), MALAYSIA'),
(5, 1, 'Test1', '12345', '4.2', 50, '4.20', '225.00', 'Proceed', '2018-03-27 15:48:33', '1234', 363171, NULL, NULL, 'SHENZHEN (LOGISTICS HUB), CHINA');

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
(1, 1, 1, 'In Use', 1),
(2, 1, 2, 'Not In Use', NULL),
(3, 1, 3, 'In Use', 2),
(4, 1, 4, 'Not In Use', NULL),
(5, 1, 5, 'Not In Use', NULL),
(6, 1, 6, 'Not In Use', NULL),
(7, 1, 7, 'Not In Use', NULL),
(8, 1, 8, 'Not In Use', NULL),
(9, 1, 9, 'Not In Use', NULL),
(10, 1, 10, 'Not In Use', NULL);

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
(1, 'clement', 'chuo', '0123456789', 'clement@email.com', '$2y$10$yG7C0WYk8rXQto6qF2sZo..3v0vy14./JXjRrRQQZz7dax695zIHy', 'admin', '', 0, 'Online'),
(2, 'janice', 'low', '1234567', 'janice@email.com', '$2y$10$85paok2VnAH3rM8k1trOLeodixrMtDj1cOrRtV.mok.PrS5JxmeHW', 'customer', '', 0, 'Online');

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
(1, 1, 1),
(2, 2, 1);

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `point_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping_update_details`
--
ALTER TABLE `shipping_update_details`
  MODIFY `sud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `shipping_update_summary`
--
ALTER TABLE `shipping_update_summary`
  MODIFY `sum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
