-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 08:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coop-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `loan_history`
--

CREATE TABLE `loan_history` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `idNumber` varchar(255) NOT NULL,
  `tin` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `birthday` date NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `civilStatus` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `loanType` varchar(255) NOT NULL,
  `paymentTerm` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `co_maker_1` varchar(255) NOT NULL,
  `co_maker_2` varchar(255) NOT NULL,
  `co_maker_3` varchar(255) NOT NULL,
  `co_maker_4` varchar(255) NOT NULL,
  `co_maker_5` varchar(255) NOT NULL,
  `co_maker_6` varchar(255) NOT NULL,
  `co_maker_7` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loan_history`
--
ALTER TABLE `loan_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan_history`
--
ALTER TABLE `loan_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
