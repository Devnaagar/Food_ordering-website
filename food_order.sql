-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 12:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'devnaagar12@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `cafeteria`
--

CREATE TABLE `cafeteria` (
  `caf_id` int(11) NOT NULL,
  `caf_name` varchar(100) NOT NULL,
  `status` tinyint(10) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `location_ref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cafeteria`
--

INSERT INTO `cafeteria` (`caf_id`, `caf_name`, `status`, `createdat`, `updatedat`, `location_ref`) VALUES
(1, '8 A', 0, '2024-05-27 16:44:34', '2024-05-27 16:44:34', 4),
(2, 'sdjndsjncksd', 0, '2024-05-27 18:01:22', '2024-05-27 18:01:22', 3),
(4, 'rctfvbhbn', 0, '2024-05-28 17:06:25', '2024-05-28 17:06:25', 7),
(5, 'trdcvbhuytfdcvb', 0, '2024-05-28 17:06:30', '2024-05-28 17:06:30', 9),
(6, 'jhgfcvbhjfdcv', 0, '2024-05-28 17:06:38', '2024-05-28 17:06:38', 6),
(7, 'kugfvbjiuytfcv', 0, '2024-05-28 17:06:43', '2024-05-28 17:06:43', 7),
(8, 'ertyuiopoiuytr', 0, '2024-05-28 17:06:49', '2024-05-28 17:06:49', 8),
(9, 'iuytrertyuikjhvbnm', 0, '2024-05-28 17:06:56', '2024-05-28 17:06:56', 1),
(10, 'jfvhtyhbnhfdfrdfgv', 0, '2024-05-28 17:07:03', '2024-05-28 17:07:03', 3),
(11, 'kutddfghjk', 0, '2024-05-28 17:07:08', '2024-05-28 17:07:08', 4),
(12, 'uytfvbhjuytffghn', 0, '2024-05-28 17:07:13', '2024-05-28 17:07:13', 7),
(13, 'tfvfrfvgfth', 0, '2024-05-28 17:07:19', '2024-05-28 17:07:19', 8),
(14, 'qwdvbfrtghnmjuk', 0, '2024-05-28 17:07:26', '2024-05-28 17:07:26', 9);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `deli_id` int(11) NOT NULL,
  `user_id_ref` int(11) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_mobile` bigint(11) NOT NULL,
  `house_no` varchar(10) NOT NULL,
  `landmark` varchar(80) NOT NULL,
  `street` varchar(80) NOT NULL,
  `pincode` int(10) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_address`
--

INSERT INTO `delivery_address` (`deli_id`, `user_id_ref`, `user_name`, `user_mobile`, `house_no`, `landmark`, `street`, `pincode`, `createdat`, `updatedat`, `status`) VALUES
(6, 27, 'pankaj', 9968182940, 'h-263', 'Near primary school', 'Tehsildar niwas', 110091, '2024-06-04 16:22:00', '2024-06-04 16:22:00', 0),
(8, 46, 'hiiiiii', 9632587410, 'H.NO-263 K', 'Near primary school', 'htyuiolkjhg', 110025, '2024-06-04 16:49:38', '2024-06-04 16:49:38', 0),
(10, 19, 'Dev naagar', 9582812111, 'House No. ', 'Khichripur ', 'Tehsildar niwas', 110091, '2024-06-04 18:08:13', '2024-06-04 18:08:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `Loca_name` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `Loca_name`, `status`, `createdat`, `updatedat`) VALUES
(1, 'noida', 0, '2024-05-27 15:25:39', '2024-05-27 15:25:39'),
(3, 'Greater Noida , Uttar pradesh', 0, '2024-05-27 15:41:54', '2024-05-27 15:41:54'),
(4, 'Greater Noida , Uttar pradesh', 0, '2024-05-27 15:43:17', '2024-05-27 15:43:17'),
(6, 'delhi', 0, '2024-05-28 12:43:19', '2024-05-28 12:43:19'),
(7, 'Kanpau ,U.P', 0, '2024-05-28 12:43:34', '2024-05-28 12:43:34'),
(8, 'Kondli,Delhi', 0, '2024-05-28 12:43:49', '2024-05-28 12:43:49'),
(9, 'Khichripur,delhi', 0, '2024-05-28 12:44:00', '2024-05-28 12:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `meal_id` int(11) NOT NULL,
  `meal_name` varchar(50) NOT NULL,
  `status` tinyint(10) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`meal_id`, `meal_name`, `status`, `createdat`, `updatedat`) VALUES
(1, 'Breakfast', 0, '2024-05-28 12:07:35', '2024-05-28 12:07:35'),
(2, 'Lunch', 0, '2024-05-28 12:08:10', '2024-05-28 12:08:10'),
(4, 'Dinner', 0, '2024-05-28 12:08:31', '2024-05-28 12:08:31'),
(5, 'Brunch', 0, '2024-05-28 12:10:10', '2024-05-28 12:10:10'),
(6, 'Supper', 0, '2024-05-28 12:10:28', '2024-05-28 12:10:28'),
(7, 'Salad', 0, '2024-05-28 12:10:58', '2024-05-28 12:10:58'),
(8, 'Soups', 0, '2024-05-28 12:11:22', '2024-05-28 12:11:22'),
(9, 'Afternoon Tea', 0, '2024-05-28 12:17:32', '2024-05-28 12:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `dish_id` int(11) NOT NULL,
  `dish_name` varchar(50) NOT NULL,
  `price` int(4) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `meal_ref` int(11) NOT NULL,
  `caf_ref` int(11) NOT NULL,
  `locat_ref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`dish_id`, `dish_name`, `price`, `createdat`, `updatedat`, `meal_ref`, `caf_ref`, `locat_ref`) VALUES
(1, 'Pasta', 45, '2024-05-28 18:10:50', '2024-05-28 18:10:50', 4, 2, 3),
(3, 'pizzaa', 150, '2024-05-28 18:14:57', '2024-05-28 18:14:57', 4, 9, 1),
(4, 'burger', 50, '2024-05-29 11:47:37', '2024-05-29 11:47:37', 2, 8, 8),
(6, 'Roti ', 8, '2024-05-29 12:27:21', '2024-05-29 12:30:32', 4, 6, 6),
(7, 'Kadhai Paneer', 230, '2024-06-04 18:14:03', '2024-06-04 18:14:03', 2, 1, 4),
(8, 'Chaap', 180, '2024-06-04 18:14:27', '2024-06-04 18:14:27', 7, 9, 1),
(9, 'Cut fruits', 50, '2024-06-04 18:14:51', '2024-06-04 18:14:51', 7, 14, 9),
(10, 'Milk', 30, '2024-06-04 18:15:13', '2024-06-04 18:15:13', 1, 6, 6),
(11, 'Naan', 35, '2024-06-04 18:18:09', '2024-06-04 18:18:09', 4, 11, 4),
(12, 'Dal Makhani', 120, '2024-06-04 18:18:30', '2024-06-04 18:18:30', 4, 8, 8),
(13, 'Grill sandwich', 75, '2024-06-06 10:18:00', '2024-06-06 10:18:00', 4, 10, 3),
(14, 'Thali', 160, '2024-06-06 10:45:17', '2024-06-06 10:45:17', 4, 12, 7),
(15, 'Shahi Paneer', 230, '2024-06-06 16:01:04', '2024-06-06 16:01:04', 4, 12, 7),
(16, 'Tandori Roti', 21, '2024-06-06 16:01:22', '2024-06-06 16:01:22', 4, 12, 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(25) NOT NULL,
  `order_amt` int(50) NOT NULL,
  `order_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_refer` int(11) NOT NULL,
  `meal_id_ref` int(11) DEFAULT NULL,
  `loc_id_ref` int(11) DEFAULT NULL,
  `caf_id_ref` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_no`, `order_amt`, `order_at`, `user_refer`, `meal_id_ref`, `loc_id_ref`, `caf_id_ref`) VALUES
(41, 'znj6k3Ps', 320, '2024-06-06 14:45:23', 19, 4, 7, 12),
(43, '0akQ5tYG', 160, '2024-06-06 14:48:33', 19, 4, 7, 12),
(45, 'EfUSn88E', 960, '2024-06-06 15:01:07', 19, 4, 7, 12),
(46, 'z6TQjSDy', 864, '2024-06-06 16:01:55', 27, 4, 7, 12);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_ref` int(10) DEFAULT NULL,
  `dish_id_ref` int(10) NOT NULL,
  `dish_name` text NOT NULL,
  `rate` int(10) NOT NULL,
  `quantity` int(4) DEFAULT NULL,
  `price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_ref`, `dish_id_ref`, `dish_name`, `rate`, `quantity`, `price`) VALUES
(18, 41, 14, '.Thali', 160, 2, 320),
(19, 43, 14, '.Thali', 160, 1, 160),
(20, 45, 14, '.Thali', 160, 6, 960),
(21, 46, 15, 'Shahi Paneer', 230, 2, 460),
(22, 46, 16, 'Tandori Roti', 21, 4, 84),
(23, 46, 14, 'Thali', 160, 2, 320);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `mobile` bigint(11) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `otp` int(4) DEFAULT NULL,
  `createdat` datetime DEFAULT current_timestamp(),
  `updatedat` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `mobile`, `password`, `otp`, `createdat`, `updatedat`, `status`) VALUES
(13, 'cdscsx', 4567456567, 'rgrtgdff', NULL, '2024-05-27 13:00:49', '2024-05-27 14:34:36', NULL),
(16, 'dev naagar', 3495934856, 'dfgvcsfg', NULL, '2024-05-27 14:13:58', '2024-05-27 14:13:58', NULL),
(17, 'Sunny', 3495935856, 'dfcvghbn', NULL, '2024-05-29 14:07:13', '2024-05-30 17:26:02', NULL),
(18, 'hero ', 4567867890, 'drfftygu', NULL, '2024-05-29 14:07:29', '2024-05-29 14:07:29', NULL),
(19, 'Dev naagar', 9582812111, '12345', NULL, '2024-05-30 12:13:22', '2024-05-30 12:13:22', NULL),
(20, 'chandan Thakur', 9212597996, 'chandan@12', NULL, '2024-05-30 16:31:25', '2024-05-30 16:31:25', NULL),
(24, 'batman', 1234567890, 'qwerty', NULL, '2024-05-30 16:42:41', '2024-05-30 16:42:41', NULL),
(27, 'pankaj', 9968182940, '101010', 1893, '2024-05-31 14:08:23', '2024-05-31 14:08:43', NULL),
(28, 'hero honda', 7894561230, '654321', 3998, '2024-05-31 14:11:52', '2024-05-31 14:13:18', NULL),
(29, 'hello', 1472583690, 'hello123', 5681, '2024-05-31 14:16:14', '2024-05-31 14:16:43', NULL),
(46, 'hiiiiii', 9632587410, '123123', 8924, '2024-05-31 15:00:02', '2024-05-31 15:00:39', NULL),
(55, 'Sherr singh', 7211424256, 'sher123', 1938, '2024-06-04 15:10:03', '2024-06-04 15:10:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cafeteria`
--
ALTER TABLE `cafeteria`
  ADD PRIMARY KEY (`caf_id`),
  ADD KEY `location_ref` (`location_ref`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`deli_id`),
  ADD KEY `user_id_ref` (`user_id_ref`),
  ADD KEY `user_mobile` (`user_mobile`),
  ADD KEY `user_id_ref_2` (`user_id_ref`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`meal_id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`dish_id`),
  ADD KEY `meal_ref` (`meal_ref`),
  ADD KEY `caf_ref` (`caf_ref`),
  ADD KEY `locat_ref` (`locat_ref`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_no` (`order_no`),
  ADD KEY `user_refer` (`user_refer`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_ref` (`order_ref`),
  ADD KEY `dish_id_ref` (`dish_id_ref`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `otp` (`otp`),
  ADD UNIQUE KEY `mobile_3` (`mobile`),
  ADD UNIQUE KEY `mobile_4` (`mobile`),
  ADD KEY `mobile` (`mobile`),
  ADD KEY `mobile_2` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cafeteria`
--
ALTER TABLE `cafeteria`
  MODIFY `caf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `deli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `dish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cafeteria`
--
ALTER TABLE `cafeteria`
  ADD CONSTRAINT `connect` FOREIGN KEY (`location_ref`) REFERENCES `locations` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD CONSTRAINT `user_ref` FOREIGN KEY (`user_id_ref`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `caf_con` FOREIGN KEY (`caf_ref`) REFERENCES `cafeteria` (`caf_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `loca_ref` FOREIGN KEY (`locat_ref`) REFERENCES `locations` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `meal_conn` FOREIGN KEY (`meal_ref`) REFERENCES `meals` (`meal_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `user_refer` FOREIGN KEY (`user_refer`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `dish_refer` FOREIGN KEY (`dish_id_ref`) REFERENCES `menu_items` (`dish_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ref_id` FOREIGN KEY (`order_ref`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
