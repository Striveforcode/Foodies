-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 08:58 PM
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
('yuvi', 'iit2021161@iiita.ac.in', '123456', '6280147330', 'IIITA hostel', 1, 'CHILL OUT', '1_qr_img.png');

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
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`) VALUES
(1, 'Beverages'),
(3, 'Best Sellers'),
(4, 'Meals'),
(5, 'Snacks');

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
  `address` text NOT NULL DEFAULT 'IIITA HOSTEL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login-signup`
--

INSERT INTO `login-signup` (`name`, `email`, `password`, `date`, `verification_code`, `is_verified`, `phone_number`, `profile_pic`, `address`) VALUES
('Yuvraj jindal', 'jindalyuvraj2@gmail.com', '1234', '2023-04-30 01:02:57', '81ecf67f3ea0d214670b5e7a94baeb00', 1, '00009990909', 'pexels-wolfgang-2747449.jpg', 'rajkot'),
('yuvi', 'iit2021161@iiita.ac.in', '123456', '2023-05-03 18:09:44', '68268b04bc64eec86253348ea23d70c6', 1, '6280147330', '', '');

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
(1, 1, 'Food Menu Item 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,quae.', 250, 'fatima-akram-uU0Anw-8Vsg-unsplash.jpg', 1),
(2, 1, 'Pizza', 'loemr ksdivc msdvi jskdhvi dcvhsvdics dh sjydhv cskdv cksdhvisk dkvcsi d', 100, 'fatima-akram-uU0Anw-8Vsg-unsplash.jpg', 1),
(3, 1, 'Burger', 'burger, is a sandwich consisting of fillings—usually a patty of ground meat, typically beef —placed inside a sliced bun or bread roll.', 70, 'burger.jpg', 1),
(4, 1, 'Cold Coffee', 'Frosty and satisfying Cold Coffee is a fantastic treat to enjoy on a warm day.', 120, 'cold-coffee.jpg', 1),
(5, 1, 'Fries', ' frites, side dish or snack typically made from deep-fried potatoes that have been cut into various shapes', 50, 'fries.jpg', 1),
(6, 2, 'Fries', '', 30, 'fries2.jpg', 1),
(7, 2, 'Chocalate Shake', '', 150, 'chocalate-shake.jpg', 1),
(8, 2, 'Panner', '', 90, 'paneer-tikka.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `shop_number` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0 COMMENT 'pending = 0,confrim = 1,delevired = 2;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `img_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= unavailable, 2 Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `name`, `description`, `price`, `img_path`, `status`) VALUES
(1, 3, 'Diet Coke', 'In Can', 20, '1600652160_diet_coke.jpg', 1),
(3, 3, 'Lemon Iced Tea', 'Sample', 15, '1600652520_lemon iced tea.jpg', 1),
(4, 4, 'Chicken', 'Sample only', 150, '1600652880_chicken.jpg', 1),
(5, 3, 'Steak', 'Sample 2', 200, '1600652880_steak.jpg', 1),
(6, 3, 'Chicken2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 250, '1600656600_checken2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop-list`
--

CREATE TABLE `shop-list` (
  `shop_number` int(10) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_description` text NOT NULL,
  `shop_address` text NOT NULL DEFAULT 'Side street IIITA Boys hostel',
  `shop_img` varchar(255) NOT NULL,
  `open_close` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop-list`
--

INSERT INTO `shop-list` (`shop_number`, `shop_name`, `shop_description`, `shop_address`, `shop_img`, `open_close`) VALUES
(1, 'CHILL OUT', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit sed hic voluptatum! Cumque magni dicta nobis est recusandae quam quia? Quae quidem laborum molestiae distinctio quisquam magnam sint sapiente sequi!', 'Side street IIITA Boys hostel', 'shop2.png', '1'),
(2, 'Shop Name', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit sed hic voluptatum! Cumque magni dicta nobis est recusandae quam quia? Quae quidem laborum molestiae distinctio quisquam magnam sint sapiente sequi!', 'Side street IIITA Boys hostel', '123771-OQ7GEF-118-removebg-preview.png', '1'),
(3, 'Shop Name', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit sed hic voluptatum! Cumque magni dicta nobis est recusandae quam quia? Quae quidem laborum molestiae distinctio quisquam magnam sint sapiente sequi!', 'Side street IIITA Boys hostel', '3979438-removebg-preview.png', '1'),
(4, 'Shop Name', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit sed hic voluptatum! Cumque magni dicta nobis est recusandae quam quia? Quae quidem laborum molestiae distinctio quisquam magnam sint sapiente sequi!', 'Side street IIITA Boys hostel', '8274985_3873446-removebg-preview.png', '1'),
(5, 'Shop Name', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit sed hic voluptatum! Cumque magni dicta nobis est recusandae quam quia? Quae quidem laborum molestiae distinctio quisquam magnam sint sapiente sequi!', 'Side street IIITA Boys hostel', '3901287-removebg-preview.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Online Food Ordering System', 'info@sample.com', '+6948 8542 623', '1600654680_photo-1504674900247-0877df9cc836.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;ABOUT US&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Lorem Ipsum&lt;/b&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#x2019;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;h2 style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;Where does it come from?&lt;/h2&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400;&quot;&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/p&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', 'admin123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`) VALUES
(1, 'James', 'Smith', 'jsmith@sample.com', '1254737c076cf867dc53d60a0364f38e', '4756463215', 'adasdasd asdadasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop-list`
--
ALTER TABLE `shop-list`
  ADD PRIMARY KEY (`shop_number`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shop-list`
--
ALTER TABLE `shop-list`
  MODIFY `shop_number` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
