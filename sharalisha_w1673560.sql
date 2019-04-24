-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 06:58 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharalisha_w1673560`
--

-- --------------------------------------------------------

--
-- Table structure for table `w1673560_company`
--

CREATE TABLE `w1673560_company` (
  `w1673560_compCode` int(10) NOT NULL,
  `w1673560_compName` varchar(50) NOT NULL,
  `w1673560_compDescription` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w1673560_company`
--

INSERT INTO `w1673560_company` (`w1673560_compCode`, `w1673560_compName`, `w1673560_compDescription`) VALUES
(10, '99x Technology', 'A global software company with offices in Europe, Its a place to convene and a place for ideas'),
(20, 'IFS', 'IFS develops and delivers enterprise software from customers around the world who manufacture and distribute goods, maintain assets and manage service focus on operation'),
(30, 'WSo2', 'An open source technology provider. It offers an enterprise platform for integrating APIs applications, and web services locally and across Internet.'),
(40, 'Sysco Labs', 'Is a testament to technology disrupting and re-imagining industries. They believe in the power that technology has to change the world.');

-- --------------------------------------------------------

--
-- Table structure for table `w1673560_employee`
--

CREATE TABLE `w1673560_employee` (
  `w1673560_empId` int(10) NOT NULL,
  `w1673560_empFullName` varchar(70) NOT NULL,
  `w1673560_empPosition` varchar(50) NOT NULL,
  `w1673560_empEmail` varchar(50) NOT NULL,
  `w1673560_compCode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w1673560_employee`
--

INSERT INTO `w1673560_employee` (`w1673560_empId`, `w1673560_empFullName`, `w1673560_empPosition`, `w1673560_empEmail`, `w1673560_compCode`) VALUES
(1, 'Shara', 'BA', 'sara@gmail.com', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `w1673560_company`
--
ALTER TABLE `w1673560_company`
  ADD PRIMARY KEY (`w1673560_compCode`);

--
-- Indexes for table `w1673560_employee`
--
ALTER TABLE `w1673560_employee`
  ADD PRIMARY KEY (`w1673560_empId`),
  ADD KEY `fk_emp` (`w1673560_compCode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `w1673560_employee`
--
ALTER TABLE `w1673560_employee`
  ADD CONSTRAINT `fk_emp` FOREIGN KEY (`w1673560_compCode`) REFERENCES `w1673560_company` (`w1673560_compCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
