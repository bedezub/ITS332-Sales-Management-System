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
('2020119', 'Smok Morph 219', 100, 170, 'Mod', 45),
('2020135', 'Asap Grape', 50, 70, 'Flavour', 10),
('2020147', 'Pasito', 100, 150, 'Mod', 91),
('2020149', 'Catridge', 15, 20, 'Others', 27),
('2020165', 'Caliburn', 20, 100, 'Mod', 174),
('2020168', 'Throne the Blacksmith', 120, 150, 'Flavour', 7),
('2020169', 'Cloudy Heaven Space Mango', 70, 100, 'Flavour', 10),
('2020194', 'Aegis Mini', 120, 150, 'Mod', 30),
('2020235', 'Horny Pombery', 100, 150, 'Flavour', 6),
('2020282', 'Fcukin Munkey ', 50, 70, 'Flavour', 20),
('2020306', 'Mango Blackcurrant', 50, 80, 'Flavour', 20),
('2020393', 'Thirsty-Juice', 100, 120, 'Flavour', 10),
('2020436', 'Bangsawan Manggo Grape', 20, 40, 'Flavour', 20),
('2020462', 'Aspire Dynamo 220', 200, 250, 'Mod', 0),
('2020464', 'Nos G-Force', 100, 120, 'Flavour', -20),
('2020475', 'Artery', 20, 50, 'Mod', 88),
('2020510', 'Type-C charger', 10, 12, 'Others', 105),
('2020600', 'Vintage Classic', 70, 100, 'Flavour', 48),
('2020602', 'Caliburn', 70, 100, 'Mod', 50),
('2020615', 'Lemon Mojito', 50, 70, 'Flavour', 20),
('2020732', 'Voo Poo Drag 2', 150, 200, 'Mod', 50),
('2020741', 'Apa apa jerrr', 20, 50, 'Flavour', 100),
('2020752', 'Smoant Ranker', 100, 150, 'Mod', 50),
('2020771', 'Coil 0.6', 2, 5, 'Others', 50),
('2020814', 'Coil 0.8', 2, 5, 'Others', 20),
('2020829', 'Geek Vape Aegis X', 80, 120, 'Mod', 20),
('2020846', 'Jac Vapour S22', 50, 70, 'Mod', 50),
('2020866', 'OCC', 10, 15, 'Others', 30),
('2020925', 'Geek Vape NOVA Kit', 400, 550, 'Mod', 45),
('2020942', 'Aspire Dynamo 220', 200, 250, 'Mod', 20),
('2020945', 'Vaporesso Mini 2', 120, 150, 'Mode', 50),
('2020950', 'Horny Mango', 30, 50, 'Flavour', 20),
('2020954', 'Orange Soda', 100, 120, 'Flavour', 10),
('2020978', 'Apa apa jerr 2', 20, 300, 'Mod', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
