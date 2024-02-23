-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 07:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuckshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_storage`
--

CREATE TABLE `account_storage` (
  `storage_id` int(11) NOT NULL,
  `admission_number` text NOT NULL,
  `amount_query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_storage`
--

INSERT INTO `account_storage` (`storage_id`, `admission_number`, `amount_query`) VALUES
(3, 'DLHS/ENU/0001', '7450'),
(5, 'DLHS/ENU/0002', '232'),
(10, 'DLHS/ENU/0004', '500'),
(11, 'DLHS/ENU/0003', '5000'),
(12, 'DLHS/ENU/0006', '10000'),
(13, 'random', '9600');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `time_in` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `item_id`, `user_id`, `quantity`, `time_in`) VALUES
(41, 19, 2, 1, '1631607550');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` text NOT NULL,
  `viewed` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `user_id`, `content`, `time`, `viewed`) VALUES
(3, 2, 'my money has finish', '1631607693', '1'),
(4, 1, 'I have not gotten the goods i paid for', '1631607775', '0'),
(5, 1, 'view me', '1631608167', '0');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` text NOT NULL,
  `picture` text NOT NULL,
  `deleted` enum('0','1') NOT NULL,
  `available` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `price`, `picture`, `deleted`, `available`) VALUES
(1, 'Purebliss (wafers cream)', '100', 'purebliss_wafers.jpg', '0', '1'),
(2, 'Mirinda (orange)', '150', 'mirinda_orange.jpg', '0', '1'),
(3, 'Peak milk (powder)', '70', 'peak_milk.jpg', '0', '1'),
(4, 'Oat and milk', '60', 'oat and milk.jpg', '0', '1'),
(5, 'Fanta (orange)', '200', 'fanta.jpg', '0', '1'),
(6, 'Munchit', '50', 'munchit.jpg', '0', '1'),
(7, 'Cheeseballs', '50', 'cheeseballs.jpg', '0', '1'),
(8, 'Gala', '50', 'gala.png', '0', '1'),
(9, 'Milo (satchet)', '70', 'Milo.jpg', '0', '1'),
(10, 'Custard cream', '50', 'custard_cream.jpg', '0', '1'),
(11, 'Mathset', '300', 'mathset.jpg', '0', '1'),
(12, 'Noreos (biscuit)', '50', 'download (1).jpg', '0', '1'),
(13, 'Tom Tom (lemon)', '20', 'download (5).jpg', '0', '1'),
(14, 'Avanti (pen)', '30', 'download (3).jpg', '0', '1'),
(15, 'Eraser', '50', 'download (4).jpg', '0', '1'),
(16, 'Lucky (pen)', '30', 'download (2).jpg', '0', '1'),
(17, 'Pinic (biscuit)', '50', 'download.jpg', '0', '1'),
(18, 'Tom Tom', '50', 'download (6).jpg', '0', '1'),
(19, 'Cup cake (chocolate)', '100', 'download (7).jpg', '0', '1'),
(20, 'OHHH (biscuit)', '50', 'download (8).jpg', '0', '1'),
(21, 'Corn Rings', '50', 'download (9).jpg', '0', '1'),
(22, 'Minimie (chin chin)', '50', 'download (10).jpg', '0', '1'),
(23, 'Coca Cola', '150', 'download (11).jpg', '0', '1'),
(24, 'Key Holder', '100', 'download (12).jpg', '0', '1'),
(25, 'Key holder', '100', 'download (13).jpg', '0', '1'),
(26, 'Coca pops', '50', 'download (14).jpg', '0', '1'),
(27, 'Wafer', '50', 'images (1).jpg', '0', '1'),
(28, 'Cup Cake', '100', 'images (2).jpg', '0', '1'),
(29, 'Fiber Active', '50', 'images (3).jpg', '0', '1'),
(30, 'Wafer Sticks (biscuit)', '50', 'images.jpg', '0', '1'),
(32, 'face book', '10', '../item_images/Screenshot (7).png150921062759pm', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `noti_id` int(11) NOT NULL,
  `admission_number` text NOT NULL,
  `content` text NOT NULL,
  `time` text NOT NULL,
  `viewed` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`noti_id`, `admission_number`, `content`, `time`, `viewed`) VALUES
(4, 'DLHS/ENU/0004', 'The sum of 500 was added to this account', '1631620094', '0'),
(5, 'DLHS/ENU/0003', 'The sum of 5000 was added to this account', '1631620099', '0'),
(6, 'DLHS/ENU/0001', 'The sum of 479 was added to this account', '1631620289', '0'),
(7, 'DLHS/ENU/0001', 'The sum of 011 was added to this account', '1631620387', '0'),
(8, 'DLHS/ENU/0002', 'The sum of 222 was added to this account', '1631620410', '0'),
(9, 'DLHS/ENU/0001', 'The sum of 200 was added to this account', '1631620423', '0'),
(10, 'DLHS/ENU/0001', 'The sum of 789 was added to this account', '1631620464', '0'),
(11, 'DLHS/ENU/0001', 'The sum of 500 was added to this account', '1631620510', '0'),
(12, 'DLHS/ENU/0006', 'The sum of 10000 was added to this account', '1631985752', '0'),
(13, 'random', 'The sum of 10000 was added to this account', '1631985827', '0');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `record_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `recieved` enum('0','1') NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`record_id`, `item_id`, `user_id`, `price`, `quantity`, `recieved`, `time`) VALUES
(8, 7, 1, '50', 10, '0', '1631537552'),
(9, 8, 1, '50', 5, '1', '1631538125'),
(10, 17, 1, '50', 2, '1', '1631549516'),
(11, 27, 1, '50', 1, '1', '1631549516'),
(12, 30, 1, '50', 4, '0', '1631549517'),
(13, 5, 1, '200', 4, '0', '1631549517'),
(14, 23, 1, '150', 2, '0', '1631563711'),
(15, 1, 1, '100', 10, '0', '1631563711'),
(16, 26, 1, '50', 1, '1', '1631605148'),
(17, 26, 1, '50', 1, '0', '1631724902'),
(18, 7, 7, '50', 5, '1', '1631985930'),
(19, 2, 7, '150', 1, '0', '1631985930');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `admission_number` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `class` text NOT NULL,
  `class_arm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `admission_number`, `username`, `password`, `class`, `class_arm`) VALUES
(1, 'DLHS/ENU/0001', 'Divine-Vessel', '1234', 'SS3', 'Diamond'),
(2, 'DLHS/ENU/0002', 'Godslight', '12345678', 'JS2', 'Gold'),
(3, 'DLHS/ENU/0003', 'zukoife', '12345678', 'SS1', 'Gold'),
(4, 'DLHS/ENU/0004', 'junior', '12345678', 'JS3', 'Jasper'),
(5, 'DLHS/ENU/0005', 'oroma', '12345678', 'SS3', 'Gold'),
(6, 'DLHS/ENU/0006', 'testing', '12345678', 'SS3', 'Diamond'),
(7, 'random', 'random', 'random', 'SS1', 'Diamond');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_storage`
--
ALTER TABLE `account_storage`
  ADD PRIMARY KEY (`storage_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`noti_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_storage`
--
ALTER TABLE `account_storage`
  MODIFY `storage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
