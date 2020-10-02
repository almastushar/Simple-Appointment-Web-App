-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 07:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment`
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
(2, 'Tushar', '1865a6728540cf99c56127f798fdd62e', '2', 1),
(3, 'danialmas', '1865a6728540cf99c56127f798fdd62e', '1', 1),
(4, 'sumaiya', '25d55ad283aa400af464c76d713c07ad', '1', 1);

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
  MODIFY `CallLogListID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactlist`
--
ALTER TABLE `contactlist`
  MODIFY `ContactListID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
