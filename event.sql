-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 07:09 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Event_Count` ()  NO SQL
select count(*) from userlog having count(*)>0$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `adminname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`adminname`, `password`) VALUES
('benaka', 'meghana'),
('meghana', 'benaka');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `dte` date NOT NULL,
  `noofpr` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `uid`, `uname`, `dte`, `noofpr`, `amount`) VALUES
(1, 1, 'jeeva', '2019-11-30', 20, 20000),
(4, 2, 'benaka', '2019-11-30', 20, 20000);

--
-- Triggers `booking`
--
DELIMITER $$
CREATE TRIGGER `gst` AFTER INSERT ON `booking` FOR EACH ROW insert into gst values(NEW.bid, NEW.uid, NEW.amount+(NEW.amount*0.08))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `evid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `etype` varchar(10) NOT NULL,
  `eaddress` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`evid`, `uid`, `etype`, `eaddress`) VALUES
(1, 1, 'birthday', 'pune'),
(4, 2, 'birthday', 'mysuru');

-- --------------------------------------------------------

--
-- Table structure for table `gst`
--

CREATE TABLE `gst` (
  `bid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `gst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gst`
--

INSERT INTO `gst` (`bid`, `uid`, `gst`) VALUES
(1, 1, 21600),
(4, 2, 21600);

-- --------------------------------------------------------

--
-- Table structure for table `timings`
--

CREATE TABLE `timings` (
  `uid` int(11) NOT NULL,
  `dateandtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timings`
--

INSERT INTO `timings` (`uid`, `dateandtime`) VALUES
(1, '2019-11-30 05:32:55'),
(2, '2019-11-30 05:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uphone` varchar(10) NOT NULL,
  `uaddress` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uphone`, `uaddress`) VALUES
(1, '9902602113', 'mysuru'),
(2, '6362789920', 'ranchi');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `uid` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`uid`, `uname`, `password`) VALUES
(1, 'jeeva', 'jeeva'),
(2, 'benaka', 'benaka');

--
-- Triggers `userlog`
--
DELIMITER $$
CREATE TRIGGER `dateandtime` AFTER INSERT ON `userlog` FOR EACH ROW insert into timings values(NEW.uid, NOW())
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`evid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `gst`
--
ALTER TABLE `gst`
  ADD KEY `uid` (`bid`,`uid`),
  ADD KEY `uid_2` (`uid`);

--
-- Indexes for table `timings`
--
ALTER TABLE `timings`
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `evid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `userlog` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `userlog` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gst`
--
ALTER TABLE `gst`
  ADD CONSTRAINT `gst_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `booking` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gst_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `userlog` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timings`
--
ALTER TABLE `timings`
  ADD CONSTRAINT `timings_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `userlog` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `userlog` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
