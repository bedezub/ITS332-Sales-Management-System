-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2020 at 07:05 PM
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
('123456', 'Abu', 197649482, '16 Jalan Kelubi 4/7A'),
('1500442', 'Kamal', 197649488, '14 Jalan Tenaga 5/6A'),
('1669906', 'Zub', 197649482, '14 Jalan Kelubi 4/7A'),
('2172912', 'Cincan', 184484392, '15 Jalan Limau 5/4A');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodid` varchar(10) NOT NULL,
  `prodname` varchar(50) NOT NULL,
  `prodcost` double NOT NULL,
  `prodprice` double NOT NULL,
  `prodtype` varchar(30) NOT NULL,
  `prodquantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodid`, `prodname`, `prodcost`, `prodprice`, `prodtype`, `prodquantity`) VALUES
('2020165', 'Caliburn', 20, 100, 'Mod', 250),
('2020475', 'Artery', 20, 50, 'Mod', 100);

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
('2022576456', '2020556291', 1),
('2022596811', '2020576646', 1),
('2022597121', '2020576646', 2),
('2022601775', '2020581610', 1),
('2022666338', '2020646173', 1),
('2022666648', '2020646173', 2),
('2022691607', '2020671442', 1),
('2022748938', '2020728773', 1),
('2022756001', '2020735836', 22);

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
('2020556291', '123456', '2020198436', '0', 0, '2020-06-12', 1),
('2020576646', '123456', '2020198436', '0', 0, '2020-06-12', 1),
('2020581610', '123456', '2020198436', '0', 0, '2020-06-12', 1),
('2020646173', '123456', '2020198436', '0', 0, '2020-06-12', 1),
('2020671442', '123456', '2020198436', '0', 0, '2020-06-12', 1),
('2020710889', '123456', '2020198436', '0', 0, '2020-06-12', 1),
('2020728773', '123456', '2020198436', '0', 0, '2020-06-12', 1),
('2020735836', '123456', '2020198436', '0', 0, '2020-06-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` varchar(10) NOT NULL,
  `staffname` varchar(50) NOT NULL,
  `staffphone` int(11) NOT NULL,
  `staffadd` varchar(50) NOT NULL,
  `staffsalary` double NOT NULL,
  `staffrole` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `staffname`, `staffphone`, `staffadd`, `staffsalary`, `staffrole`) VALUES
('2020198436', 'Siti', 197649482, '15 Jalan Batu 5/5A', 4000, 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodid`);

--
-- Indexes for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`psalesid`),
  ADD KEY `salesid` (`salesid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesid`),
  ADD KEY `custid` (`custid`),
  ADD KEY `staffid` (`staffid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD CONSTRAINT `salesid` FOREIGN KEY (`salesid`) REFERENCES `sales` (`salesid`);

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
