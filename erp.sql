-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2020 at 06:36 AM
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
  `c_deliv_add` varchar(100) NOT NULL,
  `b_date` datetime NOT NULL DEFAULT current_timestamp(),
  `b_lr_no` varchar(20) NOT NULL,
  `b_veh_no` varchar(20) NOT NULL,
  `b_amount` int(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`b_id`, `b_invoice`, `c_id`, `c_deliv_add`, `b_date`, `b_lr_no`, `b_veh_no`, `b_amount`, `created_at`, `status`) VALUES
(2, 'PCPL/20200116/84', 1, '', '2020-01-16 12:52:25', '', '', 0, '2020-01-16 00:52:25', 'Pending'),
(3, 'PCPL/20200116/66', 4, '', '2020-01-16 12:55:51', '', '', 0, '2020-01-16 00:55:51', 'Pending'),
(4, 'PCPL/20200116/18', 1, '', '2020-01-16 12:56:10', '', '', 0, '2020-01-16 00:56:10', 'Pending'),
(5, 'PCPL/20200116/24', 2, '', '2020-01-16 12:57:22', '', '', 0, '2020-01-16 00:57:22', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `bill_items`
--

CREATE TABLE `bill_items` (
  `bi_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_rate` int(11) NOT NULL,
  `p_amount` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_items`
--

INSERT INTO `bill_items` (`bi_id`, `b_id`, `p_id`, `p_quantity`, `p_rate`, `p_amount`, `status`) VALUES
(4, 5, 1, 2, 1200, 2400, 1);

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
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_address`, `c_deliv_add`, `c_mob`, `c_gst_no`, `status`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'Abcd', 'jdskah k', '', '9876466377', '8972984723', 1, NULL, '2020-01-13 17:44:58', '2020-01-13 17:44:58'),
(2, 'Sidd', 'kasjlksfalkjlkj', '', '8237492834', '9035734987234', 1, NULL, '2020-01-15 21:32:22', '2020-01-15 21:32:22'),
(3, 'danny', 'dsjafalsfh', '', '249387293', '9432978', 1, NULL, '2020-01-15 21:37:41', '2020-01-15 21:37:41'),
(4, 'abhay', 'sdfhjdsfjkhk', '', '734897298', '239753', 1, NULL, '2020-01-15 21:38:44', '2020-01-15 21:38:44'),
(5, 'Ritu', 'dfhskjh', '', '8932579', '239847', 1, NULL, '2020-01-15 21:40:15', '2020-01-15 21:40:15');

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
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_num`, `p_qantity`, `p_qnt_type`, `status`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'M S Plate', '7208', 2, 'MT', 1, NULL, '2020-01-13 17:53:04', '2020-01-13 17:53:04');

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
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bill_items`
--
ALTER TABLE `bill_items`
  MODIFY `bi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
