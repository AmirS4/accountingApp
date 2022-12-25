-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 25, 2022 at 11:03 AM
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
-- Database: `accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `number` varchar(15) NOT NULL,
  `status` varchar(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `name`, `number`, `status`, `date`) VALUES
(1, 'AmirhosseinFarsadrooh', '09456713245', '1', '2022-10-04 12:50:57'),
(2, 'RezaJamshidi', '09178765678', '2', '2022-10-04 12:51:33'),
(3, 'MaryamTeymori', '09199876787', '3', '2022-10-04 12:52:08'),
(4, 'JamshidHashemi', '09229345123', '2', '2022-10-04 12:52:39'),
(5, 'Hamed', '09673891253', '1', '2022-10-04 12:55:12'),
(6, 'Ali', '09518134587', '2', '2022-10-04 12:55:55'),
(7, 'Danial', '09468765678', '1', '2022-10-08 14:01:05'),
(8, 'sara', '09447685647', '1', '2022-10-08 14:01:31'),
(9, 'daryosh', '09245677898', '1', '2022-11-07 14:37:35'),
(46, 'niayesh', '09245677895', '1', '2022-11-05 00:00:00'),
(55, 'Arash', '09156788765', '1', '2022-11-04 00:00:00'),
(56, 'roya', '09168764535', '1', '2022-06-17 00:00:00'),
(57, 'saeed', '09119872938', '1', '2022-11-03 00:00:00'),
(58, 'mahdi', '09567475689', '1', '2022-11-16 00:00:00'),
(69, 'sima', '09117658675', '1', '2022-12-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `trades`
--

CREATE TABLE `trades` (
  `tradeID` int(11) NOT NULL,
  `customername` varchar(256) DEFAULT NULL,
  `type` varchar(15) NOT NULL,
  `amount` varchar(11) NOT NULL,
  `total` varchar(11) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trades`
--

INSERT INTO `trades` (`tradeID`, `customername`, `type`, `amount`, `total`, `customerID`, `date`) VALUES
(1, 'AmirhosseinFarsadrooh', '1', '200', '6,433,400', 1, '2022-10-04 12:56:13'),
(2, 'RezaJamshidi', '1', '153', '4,921,551', 2, '2022-10-04 12:56:28'),
(3, 'Hamed', '2', '300', '9,046,800', 5, '2022-10-04 12:57:11'),
(4, 'Ali', '1', '1050', '33,775,350', 6, '2022-10-04 12:57:47'),
(5, 'sara', '1', '200', '6,433,400', 8, '2022-10-09 12:11:14'),
(6, 'RezaJamshidi', '1', '400', '12,866,800', 2, '2022-10-09 12:30:07'),
(7, 'AmirhosseinFarsadrooh', '1', '100', '3,216,700', 1, '2022-10-09 12:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionID` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `customerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `trades`
--
ALTER TABLE `trades`
  ADD PRIMARY KEY (`tradeID`),
  ADD KEY `trades_ibfk_1` (`customerID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionID`),
  ADD KEY `customerID` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `trades`
--
ALTER TABLE `trades`
  MODIFY `tradeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trades`
--
ALTER TABLE `trades`
  ADD CONSTRAINT `trades_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
