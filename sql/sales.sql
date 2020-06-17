-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2020 at 07:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesid` varchar(10) NOT NULL,
  `custid` varchar(10) NOT NULL,
  `staffid` varchar(10) NOT NULL,
  `psalesid` varchar(10) DEFAULT NULL,
  `salesquantity` int(11) DEFAULT NULL,
  `salesdate` date DEFAULT NULL,
  `salesprofit` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesid`, `custid`, `staffid`, `psalesid`, `salesquantity`, `salesdate`, `salesprofit`) VALUES
('2020108191', '1120', '2020198', '2022128666', 2000, '2020-06-17', 80),
('2020367880', '1129', '2020198', '2022388805', 2750, '2020-06-16', 150),
('2020370657', '1120', '2020482', '2022390804', 1450, '2020-06-16', 120),
('2020416828', '1122', '2020482', '2022437063', 600, '2020-06-16', 50),
('2020460972', '1218', '2020198', '2022481137', 5000, '2020-06-16', 80),
('2020563421', '1121', '2020198', '2022583885', 3600, '2020-06-16', 20),
('2020628929', '1130', '2020198', '2022649078', 60, '2020-06-16', 5),
('2020661238', '1130', '2020198', '2022681838', 3200, '2020-06-16', 60),
('2020816709', '1121', '2020482', '2022837219', 474, '2020-06-16', 32),
('2020917494', '1120', '2020198', '2022937956', 5000, '2020-06-16', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesid`),
  ADD KEY `custid` (`custid`),
  ADD KEY `staffid` (`staffid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `custid` FOREIGN KEY (`custid`) REFERENCES `customer` (`custid`),
  ADD CONSTRAINT `staffid` FOREIGN KEY (`staffid`) REFERENCES `staff` (`staffid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
