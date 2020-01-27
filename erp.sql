-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 05:30 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `name`, `email`, `password`) VALUES
(1, 'Unique Sidd', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `b_id` int(11) NOT NULL,
  `b_invoice` varchar(20) NOT NULL,
  `c_id` int(20) NOT NULL,
  `b_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `b_lr_no` varchar(20) DEFAULT NULL,
  `b_veh_no` varchar(20) DEFAULT NULL,
  `b_amount` decimal(20,0) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`b_id`, `b_invoice`, `c_id`, `b_date`, `b_lr_no`, `b_veh_no`, `b_amount`, `created_at`, `status`) VALUES
(2, 'PCPL/20200116/84', 1, '2020-01-16 07:22:25', '', '', '0', '2020-01-15 19:22:25', '0'),
(3, 'PCPL/20200116/66', 4, '2020-01-16 07:25:51', '', '', '0', '2020-01-15 19:25:51', '0'),
(4, 'PCPL/20200116/18', 1, '2020-01-16 07:26:10', '', '', '0', '2020-01-15 19:26:10', '0'),
(5, 'PCPL/20200116/24', 2, '2020-01-16 07:27:22', '', '', '0', '2020-01-15 19:27:22', '0'),
(6, 'PCPL/20200127/34', 2, '2020-01-27 06:48:09', 'LR-1234', 'mh01hg4321', '106', '2020-01-26 18:48:09', 'completed'),
(7, 'PCPL/20200127/79', 7, '2020-01-26 20:19:29', '10', '10', '24', '2020-01-26 20:19:29', 'completed'),
(8, 'PCPL/20200127/25', 7, '2020-01-26 20:46:01', NULL, NULL, '0', '2020-01-26 20:46:01', 'Pending'),
(9, 'PCPL/20200127/95', 3, '2020-01-26 20:51:11', NULL, NULL, '0', '2020-01-26 20:51:11', 'Pending'),
(10, 'PCPL/20200127/36', 3, '2020-01-27 04:10:05', NULL, NULL, '0', '2020-01-27 04:10:05', 'Pending'),
(11, 'PCPL/20200127/28', 2, '2020-01-27 04:10:19', NULL, NULL, '0', '2020-01-27 04:10:19', 'Pending'),
(12, 'PCPL/20200127/21', 2, '2020-01-27 04:11:29', NULL, NULL, '0', '2020-01-27 04:11:29', 'Pending'),
(13, 'PCPL/20200127/74', 6, '2020-01-27 04:11:45', NULL, NULL, '0', '2020-01-27 04:11:45', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `bill_items`
--

CREATE TABLE `bill_items` (
  `bi_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_rate` decimal(11,0) NOT NULL,
  `p_amount` decimal(11,0) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_items`
--

INSERT INTO `bill_items` (`bi_id`, `b_id`, `p_id`, `p_quantity`, `p_rate`, `p_amount`, `status`) VALUES
(4, 5, 1, 2, '1200', '2400', 0),
(5, 6, 1, 2, '50', '100', 0),
(6, 6, 2, 3, '10', '30', 0),
(7, 6, 2, 10, '5', '50', 1),
(8, 6, 1, 1, '10', '10', 0),
(9, 6, 1, 2, '20', '40', 1),
(10, 7, 1, 2, '10', '20', 1),
(11, 7, 1, 0, '0', '0', 0),
(12, 7, 1, 0, '20', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `c_deliv_add` varchar(100) NOT NULL,
  `c_mob` varchar(20) NOT NULL,
  `c_gst_no` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_address`, `c_deliv_add`, `c_mob`, `c_gst_no`, `status`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'Abcd', 'jdskah k', '', '9876466377', '8972984723', 0, '2020-01-22 06:34:09', '2020-01-13 12:14:58', '2020-01-13 12:14:58'),
(2, 'Sidd', 'kasjlksfalkjlkj', 'oprew', '8237492834', '9035734987234', 1, NULL, '2020-01-26 06:17:58', '2020-01-15 16:02:22'),
(3, 'danny', 'dsjafalsfh', 'abcd', '249387293', '9432978w', 1, NULL, '2020-01-26 06:29:44', '2020-01-15 16:07:41'),
(4, 'abhay', 'sdfhjdsfjkhk', 'deli_abhay', '734897298', '239753', 1, NULL, '2020-01-26 06:08:15', '2020-01-15 16:08:44'),
(5, 'Ritu', 'dfhskjh', '', '8932579', '239847', 0, '2020-01-26 06:03:03', '2020-01-15 16:10:15', '2020-01-15 16:10:15'),
(6, 'cust_22', '22APt', 'Deli_22', '2222222222', 'gst22', 1, NULL, '2020-01-26 17:46:59', '2020-01-26 17:46:59'),
(7, 'Abhay Sakpal', 'asdas', 'as', '8693069388', '121', 1, NULL, '2020-01-26 20:19:07', '2020-01-26 20:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_num` varchar(10) NOT NULL,
  `p_qantity` int(20) NOT NULL,
  `p_qnt_type` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_num`, `p_qantity`, `p_qnt_type`, `status`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'M S Plate', '720834', 0, 'MT', 1, NULL, '2020-01-26 05:43:55', '2020-01-13 12:23:04'),
(2, 'Product_5', '1234', 12, 'KG', 1, NULL, '2020-01-26 05:44:30', '2020-01-26 17:44:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `fk_c_id` (`c_id`);

--
-- Indexes for table `bill_items`
--
ALTER TABLE `bill_items`
  ADD PRIMARY KEY (`bi_id`),
  ADD KEY `fk_b_id` (`b_id`),
  ADD KEY `fk_p_id` (`p_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bill_items`
--
ALTER TABLE `bill_items`
  MODIFY `bi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_c_id` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`);

--
-- Constraints for table `bill_items`
--
ALTER TABLE `bill_items`
  ADD CONSTRAINT `fk_b_id` FOREIGN KEY (`b_id`) REFERENCES `bill` (`b_id`),
  ADD CONSTRAINT `fk_p_id` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
