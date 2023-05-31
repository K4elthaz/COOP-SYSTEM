-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 08:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
-- Table structure for table `co_maker`
--

CREATE TABLE `co_maker` (
  `id` int(255) NOT NULL,
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
  `co_maker_1` varchar(255) DEFAULT '',
  `co_maker_2` varchar(255) DEFAULT '',
  `co_maker_3` varchar(255) DEFAULT '',
  `co_maker_4` varchar(255) DEFAULT '',
  `co_maker_5` varchar(255) DEFAULT '',
  `co_maker_6` varchar(255) DEFAULT '',
  `co_maker_7` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_maker`
--

INSERT INTO `co_maker` (`id`, `name`, `idNumber`, `tin`, `no`, `birthday`, `email`, `civilStatus`, `gender`, `loanType`, `paymentTerm`, `amount`, `co_maker_1`, `co_maker_2`, `co_maker_3`, `co_maker_4`, `co_maker_5`, `co_maker_6`, `co_maker_7`) VALUES
(1, 'AFRICA DIANA RIZA ALCANTARA', '09-443', '241-380-272', '', '1982-10-28', '', 'Single', 'Female', 'Special Promo', '123', '1234', '1', '2', '3', '4', '5', '6', '7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `co_maker`
--
ALTER TABLE `co_maker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `co_maker`
--
ALTER TABLE `co_maker`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
