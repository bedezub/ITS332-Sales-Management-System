-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 03:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `custphone` int(11) NOT NULL,
  `custadd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptid` varchar(10) NOT NULL,
  `deptname` varchar(50) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('2020119883', 'Smok Morph 219', 100, 170, 'Mod', 50),
('2020135390', 'Asap Grape', 50, 70, 'Flavour', 10),
('2020147176', 'Pasito', 100, 150, 'Mod', 50),
('2020149967', 'Catridge', 15, 20, 'Equipement', 30),
('2020165761', 'Cloudy Heaven Space Mango', 70, 100, 'Flavour', 10),
('2020168228', 'Throne the Blacksmith', 120, 150, 'Flavour', 10),
('2020194627', 'Aegis Mini', 120, 150, 'Mod', 50),
('2020235436', 'Horny Pombery', 100, 150, 'Flavour', 10),
('2020282111', 'Fcukin Munkey ', 50, 70, 'Flavour', 20),
('2020306320', 'Mango Blackcurrant', 50, 80, 'Flavour', 20),
('2020393829', 'Thirsty-Juice', 100, 120, 'Flavour', 10),
('2020436835', 'Bangsawan Manggo Grape', 20, 40, 'Flavour', 20),
('2020462979', 'Aspire Dynamo 220', 200, 250, 'Mod', 20),
('2020464722', 'Nos G-Force', 100, 120, 'Flavour', 10),
('2020510520', 'Type-C charger', 10, 12, 'Equipement', 100),
('2020600770', 'Vintage Classic', 70, 100, 'Flavour', 20),
('2020602302', 'Caliburn', 70, 100, 'Mod', 50),
('2020615012', 'Lemon Mojito', 50, 70, 'Flavour', 20),
('2020732439', 'Voo Poo Drag 2', 150, 200, 'Mod', 50),
('2020752285', 'Smoant Ranker', 100, 150, 'Mod', 50),
('2020771973', 'Coil 0.6', 2, 5, 'Equipement', 50),
('2020814445', 'Coil 0.8', 2, 5, 'Equipement', 20),
('2020829338', 'Geek Vape Aegis X', 80, 120, 'Mod', 20),
('2020846427', 'Jac Vapour S22', 50, 70, 'Mod', 50),
('2020866758', 'OCC', 10, 15, 'Equipement', 30),
('2020925597', 'Geek Vape NOVA Kit', 400, 550, 'Mod', 50),
('2020942457', 'Aspire Dynamo 220', 200, 250, 'Mod', 20),
('2020945796', 'Vaporesso Mini 2', 120, 150, 'Mode', 50),
('2020950771', 'Horny Mango', 30, 50, 'Flavour', 20),
('2020954000', 'Orange Soda', 100, 120, 'Flavour', 10);

-- --------------------------------------------------------

--
-- Table structure for table `psales`
--

CREATE TABLE `psales` (
  `psalesid` varchar(10) NOT NULL,
  `salesid` varchar(10) NOT NULL,
  `prodid` varchar(10) NOT NULL,
  `psalesquantity` int(11) NOT NULL,
  `psalesname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `salesid` varchar(10) NOT NULL,
  `custid` varchar(10) NOT NULL,
  `staffid` varchar(10) NOT NULL,
  `psalesid` varchar(10) NOT NULL,
  `salesquantity` int(11) NOT NULL,
  `salesdate` date NOT NULL,
  `salesprofit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `deptid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodid`);

--
-- Indexes for table `psales`
--
ALTER TABLE `psales`
  ADD PRIMARY KEY (`psalesid`),
  ADD KEY `salesid` (`salesid`),
  ADD KEY `prodid` (`prodid`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`salesid`),
  ADD KEY `custid` (`custid`),
  ADD KEY `staffid` (`staffid`),
  ADD KEY `psalesid` (`psalesid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`),
  ADD KEY `deptid` (`deptid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `psales`
--
ALTER TABLE `psales`
  ADD CONSTRAINT `psales_ibfk_1` FOREIGN KEY (`salesid`) REFERENCES `sale` (`salesid`),
  ADD CONSTRAINT `psales_ibfk_2` FOREIGN KEY (`prodid`) REFERENCES `product` (`prodid`);

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`custid`) REFERENCES `customer` (`custid`),
  ADD CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`staffid`) REFERENCES `staff` (`staffid`),
  ADD CONSTRAINT `sale_ibfk_3` FOREIGN KEY (`psalesid`) REFERENCES `psales` (`psalesid`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`deptid`) REFERENCES `department` (`deptid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
