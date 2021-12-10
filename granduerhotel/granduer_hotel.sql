-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 11:09 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `granduer_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Id` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phone` int(20) NOT NULL,
  `Roomtype` varchar(20) DEFAULT NULL,
  `Noofrooms` varchar(20) DEFAULT NULL,
  `Mealplan` varchar(20) DEFAULT NULL,
  `Checkin` varchar(20) NOT NULL,
  `Checkout` varchar(20) NOT NULL,
  `Addinfo` varchar(200) DEFAULT NULL,
  `Bookid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Id`, `Name`, `Email`, `Phone`, `Roomtype`, `Noofrooms`, `Mealplan`, `Checkin`, `Checkout`, `Addinfo`, `Bookid`) VALUES
(1, 'purity', 'purityruth09@gmail.c', 635, 'standard', '1', 'breakfast', '2021-04-10', '2021-04-11', NULL, 0),
(3, 'Rose', 'rosenyambura076@gmai', 6543, 'standard', '1', 'breakfast', '2021-04-10', '2021-04-17', NULL, 0),
(4, 'Elius', 'eli46@gmail.com', 8943487, 'standard', '1', 'breakfast', '2021-04-10', '2021-04-12', NULL, 0),
(6, 'purityruth', 'purityruth09@gmail.c', 6543, 'executive', '1', 'breakfast', '2021-04-10', '2021-04-15', NULL, 0),
(7, 'Joez', 'purityruth09@gmail.c', 6543, 'standard', '1', 'breakfast', '2021-04-10', '2021-04-17', NULL, 0),
(8, 'purityruthy', 'purityruth09@gmail.c', 6543, 'executive', '1', 'breakfast', '2021-04-10', '2021-04-15', NULL, 0),
(9, 'purityru', 'purityruth09@gmail.c', 6543, 'executive', '1', 'breakfast', '2021-04-10', '2021-04-15', NULL, 0),
(11, 'Joenb', 'purityruth09@gmail.c', 6543, 'standard', '1', 'breakfast', '2021-04-12', '2021-04-17', NULL, 38614137),
(12, 'Felixx', 'purityruth09@gmail.c', 635, 'standard', '1', 'breakfast', '2021-04-22', '2021-04-30', NULL, 1881461076),
(13, 'Peris Wambui', 'perisgwiji@gmail.com', 745364826, 'executive', '5', 'fullboard', '2021-04-15', '2021-04-18', NULL, 705664646),
(14, 'Felix Mbugua', 'felix63@gmail.com', 635, 'standard', '1', 'breakfast', '2021-04-13', '2021-04-15', 'fheruife', 236499965);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Id` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `Pnum` int(20) DEFAULT NULL,
  `Sms` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Id`, `Email`, `Mail`, `Pnum`, `Sms`) VALUES
(1, 'purityruth09@gmail.com', 'hsfgjdyukghcf', 0, ''),
(2, 'purityruth09@gmail.com', 'hvutyvt', 0, ''),
(3, '', '', 635, 'jkbgyt');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `Id` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phonenumber` varchar(20) NOT NULL,
  `Reservetype` varchar(20) DEFAULT NULL,
  `Noofguests` varchar(20) DEFAULT NULL,
  `Timereserve` varchar(20) NOT NULL,
  `Addinfo` varchar(200) DEFAULT NULL,
  `Reserveid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`Id`, `Name`, `Email`, `Phonenumber`, `Reservetype`, `Noofguests`, `Timereserve`, `Addinfo`, `Reserveid`) VALUES
(5, 'Felix', 'felix63@gmail.com', '345', 'conference', '1', '10:46', NULL, 480002902),
(7, 'Alex Mwaura', 'alemwaush@gmail.com', '07453648216', 'restaurant', '1', '17:00', NULL, 744157773),
(8, 'Peris Wambui', 'perisgwiji@gmail.com', '0745364826', 'restaurant', '1', '13:00', NULL, 1660653660),
(9, 'Kanye East', 'kanyes@gmail.com', '0364728', 'playground', '1', '17:00', NULL, 755377633),
(10, 'Kanye Easty', 'kanyes@gmail.com', '0745364826', 'conference', '1', '17:09', NULL, 1242935764),
(11, 'Masha', 'mash@gmail.com', '345', 'conference', '1', '03:07', 'rficuernfoekw', 3098382);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
