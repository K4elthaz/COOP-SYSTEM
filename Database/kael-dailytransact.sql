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
-- Table structure for table `dailytransact`
--

CREATE TABLE `dailytransact` (
  `id` int(11) NOT NULL,
  `memberID` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `paymentType` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `transactionDate` varchar(255) NOT NULL,
  `referenceNo` int(255) NOT NULL,
  `transactionRemarks` varchar(255) NOT NULL,
  `paymentMethod` varchar(255) NOT NULL,
  `collector` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dailytransact`
--

INSERT INTO `dailytransact` (`id`, `memberID`, `name`, `paymentType`, `amount`, `transactionDate`, `referenceNo`, `transactionRemarks`, `paymentMethod`, `collector`) VALUES
(1, '69-42065464', 'Kenneth Oliva', 'Withdraw', 123, '2023-05-30', 2147483647, 'Emergency Loan', 'E-Wallet', 'james@gmail.com'),
(2, '97-001', 'AALA LUISA PANGANIBAN', 'Deposit', 100, '2023-06-01', 2147483647, 'Regular Loan', 'Cash', 'james@gmail.com'),
(3, '97-001', 'AALA LUISA PANGANIBAN', 'Withdraw', 100, '2023-06-01', 2147483647, 'Regular Loan', 'Cash', 'james@gmail.com'),
(4, '97-001', 'AALA LUISA PANGANIBAN', 'Withdraw', 100, '2023-06-01', 2147483647, 'Regular Loan', 'Cash', 'james@gmail.com'),
(5, '97-001', 'AALA LUISA PANGANIBAN', 'Deposit', 100, '2023-06-07', 2147483647, 'Regular Loan', 'Cash', 'james@gmail.com'),
(6, '97-001', 'AALA LUISA PANGANIBAN', 'Deposit', 100, '2023-06-07', 2147483647, 'Regular Loan', 'Cash', 'james@gmail.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
