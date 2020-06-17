-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2020 at 07:07 AM
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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custid` varchar(10) NOT NULL,
  `custname` varchar(50) NOT NULL,
  `custphone` int(15) NOT NULL,
  `custadd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custid`, `custname`, `custphone`, `custadd`) VALUES
('1120', 'Acap', 188884747, '17 Jalan MU10 19/1'),
('1121', 'Sanjut', 198884747, '16 Jalan MU10 19/1'),
('1122', 'Zikri', 178884747, '15 Jalan MU10 19/1'),
('1129', 'Cincan', 158884747, '13 Jalan MU10 19/1'),
('1130', 'Azim', 198784747, '14 Jalan MU10 19/1'),
('1218', 'Zub', 178884844, '18 Jalan MU10 19/1'),
('2112', 'Karim', 198884747, '16 Jalan MU10 19/1'),
('2122', 'Fatimah', 178884747, '15 Jalan MU10 19/1'),
('2129', 'Kamarul', 158884747, '13 Jalan MU10 19/1'),
('2130', 'Abu', 198784747, '14 Jalan MU10 19/1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
