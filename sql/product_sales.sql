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
-- Table structure for table `product_sales`
--

CREATE TABLE `product_sales` (
  `psalesid` varchar(10) NOT NULL,
  `salesid` varchar(10) NOT NULL,
  `psalesquantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sales`
--

INSERT INTO `product_sales` (`psalesid`, `salesid`, `psalesquantity`) VALUES
('2020917494', '2020917494', 20),
('2022128356', '2020108191', 20),
('2022388805', '2020367880', 5),
('2022390776', '2020370657', 5),
('2022390804', '2020370657', 4),
('2022437063', '2020416828', 4),
('2022481137', '2020460972', 50),
('2022583885', '2020563421', 30),
('2022649078', '2020628929', 3),
('2022681432', '2020661238', 20),
('2022681838', '2020661238', 2),
('2022836877', '2020816709', 3),
('2022837219', '2020816709', 2),
('2022937956', '2020917494', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`psalesid`),
  ADD KEY `salesid` (`salesid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD CONSTRAINT `salesid` FOREIGN KEY (`salesid`) REFERENCES `sales` (`salesid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
