-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 05:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bi_trading`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  `balance` int(100) NOT NULL,
  `photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fname`, `lname`, `address`, `phone`, `role`, `balance`, `photo`) VALUES
(1, 'guru@tellusglint.com', '$2y$10$884XY1DmjA1IZl5bODm9yePpEwD6rcpXO.ric5rojnS9lKvSFyHdO', 'Guru', 'Prasad', '', '9611494673', 'user', 980474, ''),
(5, 'guruprasad@tellusglint.com', '$2y$10$wbGN686scsbhzObe8JdpjuTV45xQYauL.u9LbZbXIISq3aMzJgNUO', 'Guru', 'Prasad', '', '8722858560', 'user', 1000000, NULL),
(6, 'gurup@tellusglint.com', '$2y$10$YnE0Fry66wqSnFbGqITtwOwtBSXHcPH3r1XEIQUxkhS./4hmuQk2O', 'Guru', 'Prasad', '', '9342402278', 'user', 1000000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_stock`
--

CREATE TABLE `user_stock` (
  `id` int(11) NOT NULL,
  `stock_type` varchar(255) NOT NULL,
  `stock_symbol` varchar(255) NOT NULL,
  `stock_price` varchar(255) NOT NULL,
  `stock_qty` varchar(255) NOT NULL,
  `stock_tprice` varchar(255) NOT NULL,
  `stock_date` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_stock`
--

INSERT INTO `user_stock` (`id`, `stock_type`, `stock_symbol`, `stock_price`, `stock_qty`, `stock_tprice`, `stock_date`, `user_id`) VALUES
(2, 'BUY', 'GOLDSHARE.NS', '4428.65', '10', '44286.5', '26-11-20 04:42:52', 'guru@tellusglint.com'),
(3, 'BUY', 'RELIANCE.NS', '1952.60', '10', '19526', '26-11-20 04:50:28', 'guru@tellusglint.com'),
(5, 'BUY', 'TATAMOTORS.NS', '173.75', '10', '1737.5', '26-11-20 04:56:23', 'guruprasad@tellusglint.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_stock`
--
ALTER TABLE `user_stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_stock`
--
ALTER TABLE `user_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
