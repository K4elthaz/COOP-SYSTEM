-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 06:08 PM
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
-- Table structure for table `dailytransact`
--

CREATE TABLE `dailytransact` (
  `id` int(11) NOT NULL,
  `memberID` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `paymentType` varchar(255) NOT NULL,
  `transactionDate` varchar(255) NOT NULL,
  `referenceNo` int(255) NOT NULL,
  `transactionRemarks` varchar(255) NOT NULL,
  `collector` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dailytransact`
--

INSERT INTO `dailytransact` (`id`, `memberID`, `name`, `paymentType`, `transactionDate`, `referenceNo`, `transactionRemarks`, `collector`) VALUES
(1, '69-420', 'james bryan', 'Cash', '3/04/2023', 231465, 'CBS-IANBROVIN', 'Ian Brovin Lumawag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dailytransact`
--
ALTER TABLE `dailytransact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dailytransact`
--
ALTER TABLE `dailytransact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
