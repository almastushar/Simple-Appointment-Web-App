-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2019 at 02:17 PM
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
-- Database: `cbc`
--

-- --------------------------------------------------------

--
-- Table structure for table `callloglist`
--

CREATE TABLE `callloglist` (
  `CallLogListID` int(11) NOT NULL,
  `ContactListID` int(11) NOT NULL,
  `CallLogType` varchar(50) NOT NULL,
  `NextStep` varchar(50) NOT NULL,
  `Note` varchar(500) NOT NULL,
  `NextBDDT` datetime NOT NULL,
  `CallBDDT` datetime NOT NULL,
  `UserID` int(11) NOT NULL,
  `NextStepStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `callloglist`
--

INSERT INTO `callloglist` (`CallLogListID`, `ContactListID`, `CallLogType`, `NextStep`, `Note`, `NextBDDT`, `CallBDDT`, `UserID`, `NextStepStatus`) VALUES
(1, 3, 'Call Dropped', 'Office Visit', 'Bingo', '2018-09-30 00:00:00', '2018-09-28 17:04:27', 1, 1),
(2, 6, 'Picked', 'Office Visit', 'Will come tomorrow!', '2018-09-29 00:00:00', '2018-09-28 18:53:50', 1, 0),
(3, 3, 'Call Dropped', 'Closed', '', '0000-00-00 00:00:00', '2018-09-28 18:57:32', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactlist`
--

CREATE TABLE `contactlist` (
  `ContactListID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `PhoneNumber` text NOT NULL,
  `PrimaryQuery` varchar(500) NOT NULL,
  `Closed` tinyint(1) NOT NULL,
  `Existence` tinyint(1) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BDDT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactlist`
--

INSERT INTO `contactlist` (`ContactListID`, `Name`, `PhoneNumber`, `PrimaryQuery`, `Closed`, `Existence`, `UserID`, `BDDT`) VALUES
(1, 'Tamim', '01700000000', 'Personal', 0, 1, 3, '2018-09-28 15:26:43'),
(2, 'Shakib', '01680000000', 'Others', 0, 1, 3, '2018-09-28 15:52:31'),
(3, 'Fahad', '01520000000', 'Official', 1, 1, 3, '2018-09-28 15:54:07'),
(4, 'Rased', '01970000000', 'Personal', 0, 1, 1, '2018-09-28 17:06:34'),
(5, 'Mashrafi', '01830000000', 'Emergency', 0, 1, 1, '2018-09-28 18:51:20'),
(6, 'Ding Dong', '880123456789', 'Others', 0, 1, 1, '2018-09-28 18:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Password` text NOT NULL,
  `UserType` varchar(10) NOT NULL,
  `Existence` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`UserID`, `UserName`, `Password`, `UserType`, `Existence`) VALUES
(1, 'Almas', '1865a6728540cf99c56127f798fdd62e', '1', 1),
(2, 'Tushar', '1865a6728540cf99c56127f798fdd62e', '2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `callloglist`
--
ALTER TABLE `callloglist`
  ADD PRIMARY KEY (`CallLogListID`);

--
-- Indexes for table `contactlist`
--
ALTER TABLE `contactlist`
  ADD PRIMARY KEY (`ContactListID`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `callloglist`
--
ALTER TABLE `callloglist`
  MODIFY `CallLogListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactlist`
--
ALTER TABLE `contactlist`
  MODIFY `ContactListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
