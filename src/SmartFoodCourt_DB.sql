-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2020 at 06:52 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SmartFoodCourt_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(4, 'BREAKFAST'),
(5, 'LUNCH'),
(6, 'DINNER'),
(7, 'BEVERAGES');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantily` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(1) NOT NULL,
  `productname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(150) CHARACTER SET utf8 NOT NULL,
  `vendor` int(11) NOT NULL,
  `is_ready` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `productname`, `price`, `photo`, `vendor`, `is_ready`) VALUES
(14, 5, 'Com Suon', 40, 'upload/com-suong.jpg', 0, 0),
(15, 5, 'Pho', 45, 'upload/pho.jpg', 0, 0),
(16, 5, 'Bun Bo Hue', 45, 'upload/bun-bo-hue.jpg', 0, 0),
(18, 7, 'Mojito', 200, 'upload/http _cdn.cnn.com_cnnnext_dam_assets_170224172523-mojito_1539097580.jpg', 0, 0),
(19, 7, 'Sex On The Beach', 250, 'upload/http _cdn.cnn.com_cnnnext_dam_assets_170227111426-sex-on-the-beach-cocktail_1539097662.jpg', 0, 0),
(20, 6, 'Com Chien', 450, 'upload/com-chien.jpg', 0, 0),
(21, 4, 'Chao', 30, 'upload/chao.jpg', 0, 0),
(22, 4, 'Bun Rieu', 35, 'upload/bun-rieu.jpeg', 0, 0),
(23, 7, 'Coca-Cola', 80, 'upload/cocacola_1539097796.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `customer`, `total`, `date_purchase`) VALUES
(8, 'Neovic', 600, '2017-12-06 15:29:00'),
(9, 'demo', 450, '2018-10-09 20:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pdid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pdid`, `purchaseid`, `productid`, `quantity`) VALUES
(13, 8, 15, 2),
(14, 8, 17, 2),
(15, 8, 18, 2),
(16, 9, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `email`, `sdt`, `role`) VALUES
(9, 'admin', 'Admin', '$2y$10$CWK209WNP7Jv6QogS4JTZuh9afycGiHogHd8LnJq0P0nhYs4V77iW', 'admin@gmail.com', '1234123', 0),
(10, 'khang', 'Khang', '$2y$10$pZSacUocfjC6r07yQKuSFeb0MoDxZ.YTe6zRXBzZNHI/m9069N.cG', 'khang@gmail.com', '123456', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role` int(11) NOT NULL,
  `role_name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role`, `role_name`) VALUES
(0, 'It Staff'),
(1, 'Manager'),
(2, 'Vendor Owner'),
(3, 'Cook'),
(4, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
