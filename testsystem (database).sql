-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2017 at 05:42 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(255) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_phone` varchar(12) NOT NULL,
  `cust_track_no` varchar(20) NOT NULL,
  `cust_courier` varchar(30) NOT NULL,
  `cust_del_add` varchar(255) NOT NULL,
  `cust_state` varchar(255) NOT NULL,
  `cust_det_loc` varchar(255) NOT NULL,
  `cust_status` varchar(50) NOT NULL,
  `cust_order_date` date NOT NULL,
  `cust_deliver_date` date NOT NULL,
  `tot_paid` decimal(10,0) NOT NULL,
  `balance` decimal(10,0) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_phone`, `cust_track_no`, `cust_courier`, `cust_del_add`, `cust_state`, `cust_det_loc`, `cust_status`, `cust_order_date`, `cust_deliver_date`, `tot_paid`, `balance`, `company`) VALUES
(16, 'Muhammad Nadzrisha Bin Sapari', '', '', 'POSLAJU', 'Blok B, No 0-14,  Jalan 4/1,\r\nTaman Sri Indah. 43200,\r\nCheras', 'Pahang', 'Hulu Langat', 'Delivered', '2016-01-01', '0000-00-00', '0', '-1100', 'tshirtme'),
(17, 'february', '', '', 'POSLAJU', '', 'Pahang', 'Hulu Langat', 'Delivered', '2016-02-01', '0000-00-00', '350', '-150', 'tshirtme'),
(18, 'march', '', '', 'POSLAJU', '', 'Pahang', 'Hulu Langat', 'Delivered', '2016-03-01', '0000-00-00', '0', '-900', 'tshirtme'),
(19, 'april', '', '', 'POSLAJU', '', 'Pahang', 'Hulu Langat', 'Delivered', '2016-04-01', '0000-00-00', '450', '0', 'tshirtme'),
(20, 'may', '', '', 'POSLAJU', '', 'Perak', 'Hulu Langat', 'Delivered', '2016-05-01', '0000-00-00', '0', '-100', 'tshirtme'),
(21, 'january2', '', '', 'POSLAJU', '', 'Pahang', 'Hulu Langat', 'Delivered', '2016-01-15', '0000-00-00', '0', '-500', 'tshirtme'),
(22, 'september', '', '', 'POSLAJU', '', 'Selangor', 'Hulu Langat', 'Delivered', '2016-09-15', '0000-00-00', '0', '-800', 'tshirtme'),
(23, 'qwe', '', '', 'none', '', 'none', 'none', 'none', '2016-10-12', '0000-00-00', '0', '-200', 'test'),
(24, '10', '', '', 'none', '', 'none', 'none', 'none', '0000-00-00', '0000-00-00', '0', '0', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `item_price` decimal(10,0) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_other_chrge` decimal(10,0) NOT NULL,
  `item_disc` decimal(10,0) NOT NULL,
  `item_tot_price` decimal(10,0) NOT NULL,
  `item_tot_cost` decimal(10,0) NOT NULL,
  `item_profit` decimal(10,0) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_desc`, `item_price`, `item_qty`, `item_other_chrge`, `item_disc`, `item_tot_price`, `item_tot_cost`, `item_profit`, `cust_id`, `company`) VALUES
(82, 'Mouse', '', '0', 0, '0', '0', '0', '0', '0', 17, 'tshirtme'),
(83, 'Mouse', '', '10', 10, '0', '0', '100', '0', '100', 16, 'tshirtme'),
(84, 'Mouse', '', '20', 20, '0', '0', '400', '0', '400', 17, 'tshirtme'),
(85, 'Mouse', '', '10', 15, '0', '0', '150', '0', '150', 18, 'tshirtme'),
(86, 'Mouse', '', '15', 30, '0', '0', '450', '300', '150', 19, 'tshirtme'),
(87, 'Mouse', '', '10', 10, '0', '0', '100', '0', '100', 20, 'tshirtme'),
(88, 'Keyboard', '', '100', 10, '0', '0', '1000', '0', '1000', 16, 'tshirtme'),
(89, 'Keyboard', '', '25', 20, '0', '0', '500', '400', '100', 21, 'tshirtme'),
(105, 'Keyboard', '', '25', 30, '0', '0', '750', '0', '750', 18, 'tshirtme'),
(106, 'Keyboard', '', '20', 40, '0', '0', '800', '0', '800', 22, 'tshirtme'),
(110, 'Keyboard', '', '10', 10, '0', '0', '100', '0', '100', 17, 'tshirtme'),
(113, 'test', '', '20', 10, '0', '0', '200', '0', '200', 23, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` varchar(11) DEFAULT NULL,
  `product_qty` decimal(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_qty`) VALUES
(1, 'apple', '10', '30'),
(2, 'banana', '10', '30'),
(3, 'cow', '30', '30'),
(4, 'Apple', '10', '30'),
(5, 'labu', '5', '10'),
(6, 'tembikai buah paling comel', '40243', '20'),
(8, 'asd', '123', '123'),
(9, 'xzc', '213', '123'),
(10, 'dfs', '543', '234'),
(11, 'fwe', '243', '432'),
(12, 'xvdsf', '213', '23'),
(13, 'poi', '345', '345');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_name` varchar(255) NOT NULL,
  `purchase_desc` varchar(255) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_tot_price` decimal(10,0) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `purchase_name`, `purchase_desc`, `purchase_date`, `purchase_tot_price`, `company`) VALUES
(12, 'Restock for October', 'test', '2016-10-01', '5000', 'tshirtme'),
(13, 'Restock for October2', '', '2016-10-19', '500', 'tshirtme'),
(14, 'JANUARY STOCK', '', '2016-01-21', '5000', 'tshirtme'),
(15, 'MARCH', '', '2016-03-19', '500', 'tshirtme'),
(16, 'AUGUST', '', '2016-08-11', '1000', 'tshirtme'),
(18, 'first Item', 'qwe', '2016-09-25', '300', 'test'),
(19, 'JANUARY STOCK2', '', '2016-01-13', '1000', 'tshirtme'),
(20, '1', '', '0000-00-00', '0', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pur_det_id` int(11) NOT NULL,
  `pur_det_name` varchar(255) NOT NULL,
  `pur_det_desc` varchar(255) NOT NULL,
  `pur_det_price` decimal(10,0) NOT NULL,
  `pur_det_quantity` int(11) NOT NULL,
  `pur_det_oth_chr` decimal(10,0) NOT NULL,
  `pur_det_disc` decimal(10,0) NOT NULL,
  `pur_det_tot_price` decimal(10,0) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pur_det_id`, `pur_det_name`, `pur_det_desc`, `pur_det_price`, `pur_det_quantity`, `pur_det_oth_chr`, `pur_det_disc`, `pur_det_tot_price`, `purchase_id`, `company`) VALUES
(61, 'Mouse', '', '10', 100, '0', '0', '1000', 12, 'tshirtme'),
(62, 'Keyboard', '', '20', 200, '0', '0', '4000', 12, 'tshirtme'),
(63, 'Headphone', '', '10', 50, '0', '0', '500', 13, 'tshirtme'),
(64, 'Keyboard', '', '100', 50, '0', '0', '5000', 14, 'tshirtme'),
(65, 'Mouse', '', '10', 50, '0', '0', '500', 15, 'tshirtme'),
(66, 'Keyboard', '', '20', 50, '0', '0', '1000', 16, 'tshirtme'),
(69, 'test', '', '10', 30, '0', '0', '300', 18, 'test'),
(70, 'Keyboard', '', '20', 50, '0', '0', '1000', 19, 'tshirtme'),
(71, '1', '', '0', 12, '0', '0', '0', 20, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `setup_courier`
--

CREATE TABLE `setup_courier` (
  `courier_id` int(11) NOT NULL,
  `courier_name` varchar(100) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_courier`
--

INSERT INTO `setup_courier` (`courier_id`, `courier_name`, `company`) VALUES
(3, 'POSLAJU', 'tshirtme'),
(4, 'GDEX', 'tshirtme');

-- --------------------------------------------------------

--
-- Table structure for table `setup_cust_item`
--

CREATE TABLE `setup_cust_item` (
  `cust_item_id` int(11) NOT NULL,
  `cust_item_name` varchar(255) NOT NULL,
  `cust_item_desc` varchar(255) NOT NULL,
  `cust_item_price` decimal(10,0) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_cust_item`
--

INSERT INTO `setup_cust_item` (`cust_item_id`, `cust_item_name`, `cust_item_desc`, `cust_item_price`, `company`) VALUES
(4, 'Mouse', 'Branded Mouse', '20', 'tshirtme'),
(5, 'Keyboard', 'Branded Keyboard', '30', 'tshirtme'),
(6, 'Headphone', 'Branded Headphone', '50', 'tshirtme'),
(7, 'testqqweqwe', 'testingwqeqwe', '50', 'test'),
(8, '1', '', '0', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `setup_cust_stat`
--

CREATE TABLE `setup_cust_stat` (
  `cust_stat_id` int(11) NOT NULL,
  `cust_stat_name` varchar(1000) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_cust_stat`
--

INSERT INTO `setup_cust_stat` (`cust_stat_id`, `cust_stat_name`, `company`) VALUES
(2, 'Delivered', 'tshirtme'),
(3, 'Processing', 'tshirtme'),
(4, 'Pending', 'tshirtme'),
(5, 'Others', 'tshirtme');

-- --------------------------------------------------------

--
-- Table structure for table `setup_det_loc`
--

CREATE TABLE `setup_det_loc` (
  `det_loc_id` int(11) NOT NULL,
  `det_loc_name` varchar(100) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_det_loc`
--

INSERT INTO `setup_det_loc` (`det_loc_id`, `det_loc_name`, `company`) VALUES
(2, 'Hulu Langat', 'tshirtme'),
(3, 'Kajang', 'tshirtme'),
(4, 'Kuala Lumpur', 'tshirtme');

-- --------------------------------------------------------

--
-- Table structure for table `setup_state`
--

CREATE TABLE `setup_state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_state`
--

INSERT INTO `setup_state` (`state_id`, `state_name`, `company`) VALUES
(1, 'Selangor', 'tshirtme'),
(4, 'Pahang', 'tshirtme'),
(5, 'Perak', 'tshirtme');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_name` varchar(255) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_name`, `stock_quantity`, `company`) VALUES
(19, 'Mouse', 150, 'tshirtme'),
(20, 'Keyboard', 350, 'tshirtme'),
(21, 'Headphone', 50, 'tshirtme'),
(22, 'test', 20, 'test'),
(23, '1', 12, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `remember_token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `company`, `password`, `updated_at`, `created_at`, `remember_token`) VALUES
(3, 'Sales System Admin', 'salessystemadmin@ssa.com', 'tshirtme', '$2y$10$ETWySxJwmYvA6HlU.7cG2uiWgil2lFe3kdS2/Tvtw2RTtXUbSLOEy', '2016-10-30', '2016-10-12', 0),
(7, 'Muhammad Nadzrisha Bin Sapari', 'nadzrishaqwe', 'test', '$2y$10$TMwBqy.2RuA7mfNsU59AZu.pN4A50Teoqe9RZ02Mj1YCMsob6/nXS', '2016-10-23', '0000-00-00', 0),
(8, 'admin', 'admin', 'admin', '$2y$10$NqaAm5U49KymLJekq/41ce51L5zxfXG7suIMk4a4SblUtMMB/K186', '2017-02-27', '0000-00-00', 0),
(9, 'demouser', 'demo', 'demo', '$2y$10$KSKd8ILsNSz2GQpRcE/JSOlIJlzhdAaU78/lD1CGBEgq6sfWKNCua', '2016-10-30', '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pur_det_id`);

--
-- Indexes for table `setup_courier`
--
ALTER TABLE `setup_courier`
  ADD PRIMARY KEY (`courier_id`);

--
-- Indexes for table `setup_cust_item`
--
ALTER TABLE `setup_cust_item`
  ADD PRIMARY KEY (`cust_item_id`);

--
-- Indexes for table `setup_cust_stat`
--
ALTER TABLE `setup_cust_stat`
  ADD PRIMARY KEY (`cust_stat_id`);

--
-- Indexes for table `setup_det_loc`
--
ALTER TABLE `setup_det_loc`
  ADD PRIMARY KEY (`det_loc_id`);

--
-- Indexes for table `setup_state`
--
ALTER TABLE `setup_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pur_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `setup_courier`
--
ALTER TABLE `setup_courier`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `setup_cust_item`
--
ALTER TABLE `setup_cust_item`
  MODIFY `cust_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `setup_cust_stat`
--
ALTER TABLE `setup_cust_stat`
  MODIFY `cust_stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `setup_det_loc`
--
ALTER TABLE `setup_det_loc`
  MODIFY `det_loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `setup_state`
--
ALTER TABLE `setup_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
