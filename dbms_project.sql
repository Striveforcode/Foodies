-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 10:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone_number` text NOT NULL,
  `address` text NOT NULL,
  `shop_number` int(10) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `qr_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `password`, `phone_number`, `address`, `shop_number`, `shop_name`, `qr_img`) VALUES
('yuvi', 'iit2021161@iiita.ac.in', '123456', '6280147330', 'IIITA hostel', 1, 'CHILL OUT', 'qr.jpeg'),
('milan', 'iit2021121@iiita.ac.in', '12', '9327397406', 'iiita', 2, 'kings', 'qr.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `email` varchar(30) NOT NULL,
  `shop_number` int(10) NOT NULL,
  `food_id` int(10) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login-signup`
--

CREATE TABLE `login-signup` (
  `name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int(10) NOT NULL DEFAULT 0,
  `phone_number` text NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login-signup`
--

INSERT INTO `login-signup` (`name`, `email`, `password`, `date`, `verification_code`, `is_verified`, `phone_number`, `profile_pic`, `address`) VALUES
('Yuvraj jindal', 'jindalyuvraj2@gmail.com', '12345', '2023-04-30 01:02:57', '81ecf67f3ea0d214670b5e7a94baeb00', 1, '6280196754', '12345.jpeg', 'Sardulgarh'),
('yuvi', 'iit2021161@iiita.ac.in', '123456', '2023-05-03 18:09:44', '68268b04bc64eec86253348ea23d70c6', 1, '6280147330', '', ''),
('milan', 'iit2021121@iiita.ac.in', '12', '2023-05-10 20:56:53', 'fdbe066713dfd5abedfa8e2629cbcd6b', 1, '9327397406', '', 'IIITA HOSTEL'),
('tomar', 'ahscahc@gmail.com', '1', '2023-05-10 21:01:23', 'b8e997eaf5269f8d3aab96d4e158bc58', 0, '2345678912', '', 'IIITA HOSTEL');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(30) NOT NULL,
  `shop_number` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `img` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'unavailable = 0,availible = 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `shop_number`, `name`, `description`, `price`, `img`, `status`) VALUES
(1, 1, 'Food Menu Item 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,quae.', 250, 'default.jpg', 1),
(2, 1, 'Pizza', 'loemr ksdivc msdvi jskdhvi dcvhsvdics dh sjydhv cskdv cksdhvisk dkvcsi d', 100, 'default.jpg', 1),
(3, 1, 'Burger', 'burger, is a sandwich consisting of fillings—usually a patty of ground meat, typically beef —placed inside a sliced bun or bread roll.', 70, 'default.jpg', 1),
(4, 1, 'Cold Coffee', 'Frosty and satisfying Cold Coffee is a fantastic treat to enjoy on a warm day.', 120, 'default.jpg', 1),
(5, 1, 'Fries', ' frites, side dish or snack typically made from deep-fried potatoes that have been cut into various shapes', 50, 'default.jpg', 1),
(6, 2, 'Fries', '', 30, 'default.jpg', 1),
(7, 2, 'Chocalate Shake', '', 150, 'default.jpg', 1),
(8, 2, 'Panner', '', 90, 'default.jpg', 1),
(27, 1, 'cheese garlic bread', 'its stuffed with cheese and garlic and its taste like your ex-milk', 149, 'default.jpg', 1),
(29, 1, 'brownie', 'the brown is ready', 34, 'default.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `shop_number` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pay_img` varchar(255) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0 COMMENT 'pending = 0,confrim = 1,delevired = 2;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `shop_number`, `email`, `pay_img`, `status`) VALUES
(1, 1, 'jindalyuvraj2@gmail.com', '', 1),
(2, 1, 'jindalyuvraj2@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `food_id` int(30) NOT NULL,
  `count` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `food_id`, `count`) VALUES
(1, 1, 2, 2),
(2, 1, 3, 2),
(3, 2, 2, 1),
(4, 2, 3, 1),
(5, 2, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `shop-list`
--

CREATE TABLE `shop-list` (
  `shop_number` int(10) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_description` text NOT NULL,
  `shop_address` text NOT NULL,
  `shop_img` varchar(255) NOT NULL,
  `open_close` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop-list`
--

INSERT INTO `shop-list` (`shop_number`, `shop_name`, `shop_description`, `shop_address`, `shop_img`, `open_close`) VALUES
(1, 'CHILL OUT', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit sed hic voluptatum! Cumque magni dicta nobis est recusandae quam quia? Quae quidem laborum molestiae distinctio quisquam magnam sint sapiente sequi!', 'Side street IIITA Boys hostel', 'shop2.png', '1'),
(2, 'Kings', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit sed hic voluptatum! Cumque magni dicta nobis est recusandae quam quia? Quae quidem laborum molestiae distinctio quisquam magnam sint sapiente sequi!', 'Side street IIITA Boys hostel', '123771-OQ7GEF-118-removebg-preview.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(10) NOT NULL,
  `email` varchar(300) NOT NULL,
  `shop_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `email`, `shop_number`) VALUES
(1, 'jindalyuvraj2@gmail.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop-list`
--
ALTER TABLE `shop-list`
  ADD PRIMARY KEY (`shop_number`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shop-list`
--
ALTER TABLE `shop-list`
  MODIFY `shop_number` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
