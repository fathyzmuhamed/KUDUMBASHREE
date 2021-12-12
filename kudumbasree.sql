-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 04:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kudumbasree`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attid` int(11) NOT NULL,
  `meetid` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `present` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attid`, `meetid`, `user`, `present`) VALUES
(5, 4, 'leela@gmail.com', 0),
(6, 4, 'nandana@gmail.com', 1),
(7, 4, 'fathima@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `compid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `reply` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`compid`, `username`, `subject`, `description`, `date`, `reply`, `status`) VALUES
(1, 'nandana@gmail.com', 'rgwe', 'afafaf asf af \r\nf aa sfa ', '2021-11-22', 'adas ads assd', 3),
(2, 'nandana@gmail.com', 'dsad', ' asdaasd ad  dasd adasd', '2021-11-22', 'dafaf asdasd', 2),
(4, 'nandana@gmail.com', 'rgwe', 'afafaf asf af \r\nf aa sfa ', '2021-11-22', '', 0),
(5, 'leela@gmail.com', 'gsfd', 'afs sd fdsf s', '2021-12-09', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `fineid` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `cause` varchar(200) NOT NULL,
  `amount` decimal(7,2) NOT NULL,
  `cleardate` date DEFAULT NULL,
  `mode` int(11) NOT NULL,
  `finestatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`fineid`, `user`, `date`, `cause`, `amount`, `cleardate`, `mode`, `finestatus`) VALUES
(3, 'leela@gmail.com', '2021-11-28', 'Absent in meeting on 25-11-2021', '5.00', '2021-12-05', 1, 1),
(4, 'nandana@gmail.com', '2021-11-28', 'Absent in meeting on 25-11-2021', '5.00', '2021-12-06', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gid`, `title`, `pic`) VALUES
(1, 'efasd', 'g1.jpg'),
(3, 'xcvxv', 'g3.jpg'),
(4, 'hgj', 'g4.jpg'),
(5, 'uyk', 'g5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jagratha`
--

CREATE TABLE `jagratha` (
  `requestid` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `reply` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jagratha`
--

INSERT INTO `jagratha` (`requestid`, `user`, `subject`, `description`, `reply`, `status`, `date`) VALUES
(2, 'nandana@gmail.com', 'asdadsad', 'fbgfsdf', 'sadad as', 0, '2021-12-06'),
(3, 'leela@gmail.com', 'asdasd', 'asdasdasd a as ', '', 1, '2021-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loanid` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `tenure` int(11) NOT NULL DEFAULT 6,
  `date` date DEFAULT NULL,
  `approveddate` date DEFAULT NULL,
  `expclosedate` date DEFAULT NULL,
  `closedate` date DEFAULT NULL,
  `reason` varchar(100) NOT NULL,
  `totalamount` decimal(8,2) NOT NULL,
  `paidamount` decimal(8,2) NOT NULL,
  `lstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loanid`, `user`, `tenure`, `date`, `approveddate`, `expclosedate`, `closedate`, `reason`, `totalamount`, `paidamount`, `lstatus`) VALUES
(2, 'nandana@gmail.com', 6, '2021-12-08', '2021-12-09', '2022-06-09', NULL, '', '1000.00', '150.00', 1),
(5, 'nandana@gmail.com', 6, '2021-12-08', NULL, NULL, NULL, 'adaf', '500.00', '0.00', -1),
(6, 'fathima@gmail.com', 6, '2021-12-09', '2021-12-10', '2022-06-10', '2021-12-11', '', '1000.00', '1060.00', 2),
(7, 'leela@gmail.com', 6, '2021-12-09', NULL, NULL, NULL, 'asdsad', '2000.00', '0.00', -1),
(8, 'fathima@gmail.com', 6, '2021-12-09', '2021-12-10', '2022-06-10', '2021-12-11', '', '1000.00', '1060.00', 2),
(9, 'nandana@gmail.com', 6, '2021-12-09', NULL, NULL, NULL, '', '1000.00', '0.00', 0),
(10, 'fathima@gmail.com', 6, '2021-12-12', NULL, NULL, NULL, '', '200.00', '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loaninstallment`
--

CREATE TABLE `loaninstallment` (
  `installmentid` int(11) NOT NULL,
  `loanid` int(11) NOT NULL,
  `pamount` decimal(8,2) NOT NULL,
  `paiddate` date NOT NULL,
  `mode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaninstallment`
--

INSERT INTO `loaninstallment` (`installmentid`, `loanid`, `pamount`, `paiddate`, `mode`) VALUES
(2, 2, '100.00', '2021-12-09', 2),
(3, 2, '50.00', '2021-12-09', 2),
(4, 6, '50.00', '2021-12-11', 2),
(5, 6, '500.00', '2021-12-11', 2),
(7, 6, '510.00', '2021-12-11', 2),
(9, 8, '100.00', '2021-12-11', 1),
(10, 8, '960.00', '2021-12-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `type`) VALUES
('aswathy@gmail.com', '123', 'm'),
('surya@gmail.com', '123', 'a'),
('leela@gmail.com', '123', 'p'),
('fathima@gmail.com', '123', 's'),
('nandana@gmail.com', '123', 'm'),
('remani@gmail.com', '123', 'm'),
('usha@gmail.com', '123', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `meetid` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `place` varchar(50) NOT NULL,
  `details` varchar(500) NOT NULL,
  `minutes` varchar(500) NOT NULL,
  `attstatus` int(11) NOT NULL DEFAULT 0,
  `thriftstatus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`meetid`, `date`, `time`, `place`, `details`, `minutes`, `attstatus`, `thriftstatus`) VALUES
(1, '2021-12-16', '21:39:00', 'fathima@gmail.com', 'sdad', '', 0, 0),
(2, '2021-12-09', '21:00:00', 'leela@gmail.com', 'sdad', '2.pdf', 0, 0),
(3, '2021-11-04', '11:36:00', 'nandana@gmail.com', 'Sasa A\r\nAsa\r\nA S ', '', 0, 1),
(4, '2021-11-25', '12:11:00', 'fathima@gmail.com', 'as s ad ds as \r\n d ad ', '4.pdf', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `monthly`
--

CREATE TABLE `monthly` (
  `mcid` int(11) NOT NULL,
  `date` date NOT NULL,
  `user` varchar(50) NOT NULL,
  `amount` decimal(5,2) NOT NULL,
  `paiddate` date DEFAULT NULL,
  `mstatus` int(11) NOT NULL,
  `mode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monthly`
--

INSERT INTO `monthly` (`mcid`, `date`, `user`, `amount`, `paiddate`, `mstatus`, `mode`) VALUES
(1, '2021-01-12', 'aswathy@gmail.com', '132.00', '2021-12-08', 1, 1),
(2, '2021-11-10', 'leela@gmail.com', '34.00', '2021-12-07', 1, 1),
(3, '2020-11-16', 'aswathy@gmail.com', '13.00', '2021-12-15', 1, 1),
(16, '2021-12-01', 'aswathy@gmail.com', '5.00', NULL, 0, 0),
(17, '2021-12-01', 'leela@gmail.com', '5.00', '2021-12-06', 1, 2),
(18, '2021-12-01', 'nandana@gmail.com', '5.00', '2021-12-06', 1, 2),
(19, '2021-12-01', 'fathima@gmail.com', '5.00', '2021-12-05', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `house` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `username`, `name`, `contact`, `dob`, `house`, `street`, `city`, `pic`, `status`) VALUES
(1, 'surya@gmail.com', 'Surya', '9644231044', '1989-11-09', 'sd', 'asdq', 'fsd', 'surya.jpg', 1),
(2, 'aswathy@gmail.com', 'Aswathy', '6647270294', '1991-11-09', 'adss', 'gfhf', 'ddsd', 'aswathy.jpg', 1),
(4, 'leela@gmail.com', 'Leela', '9997270294', '1994-08-11', 'sdfs', 'assa', 'Ernakulam', 'leela.jpg', 1),
(5, 'remani@gmail.com', 'Remani', '9845872467', '1980-11-09', 'sss', 'sss', 'ss', 'remani.jpg', 0),
(6, 'nandana@gmail.com', 'Nandana', '8781234527', '1985-11-09', 'asdwe', 'adfdf', 'waa', 'nandana.jpg', 1),
(7, 'fathima@gmail.com', 'Fathima', '8267235427', '1998-11-09', 'asdwe', '234', 'sd', 'fathima.jpg', 1),
(11, 'usha@gmail.com', 'Usha', '8288888427', '1988-12-02', 'dads', 'weqe', 'fef', 'usha.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `thrift`
--

CREATE TABLE `thrift` (
  `thriftid` int(11) NOT NULL,
  `meetid` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `mode` int(11) NOT NULL,
  `amount` decimal(5,2) NOT NULL,
  `date` date NOT NULL,
  `paydate` date DEFAULT NULL,
  `tstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thrift`
--

INSERT INTO `thrift` (`thriftid`, `meetid`, `user`, `mode`, `amount`, `date`, `paydate`, `tstatus`) VALUES
(8, 4, 'leela@gmail.com', 1, '50.00', '2021-11-28', '2021-11-28', 1),
(9, 4, 'nandana@gmail.com', 2, '50.00', '2021-11-28', '2021-12-06', 1),
(10, 4, 'fathima@gmail.com', 0, '50.00', '2021-11-28', NULL, 0),
(15, 3, 'aswathy@gmail.com', 1, '50.00', '2021-12-11', '2021-12-11', 1),
(16, 3, 'leela@gmail.com', 1, '50.00', '2021-12-11', '2021-12-11', 1),
(17, 3, 'nandana@gmail.com', 0, '50.00', '2021-12-11', NULL, 0),
(18, 3, 'fathima@gmail.com', 0, '50.00', '2021-12-11', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE `variables` (
  `thrift` decimal(5,2) NOT NULL,
  `monthly` decimal(5,2) NOT NULL,
  `attfine` decimal(5,2) NOT NULL,
  `bankbal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`thrift`, `monthly`, `attfine`, `bankbal`) VALUES
('50.00', '5.00', '5.00', '12000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attid`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`compid`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`fineid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `jagratha`
--
ALTER TABLE `jagratha`
  ADD PRIMARY KEY (`requestid`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loanid`);

--
-- Indexes for table `loaninstallment`
--
ALTER TABLE `loaninstallment`
  ADD PRIMARY KEY (`installmentid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`meetid`);

--
-- Indexes for table `monthly`
--
ALTER TABLE `monthly`
  ADD PRIMARY KEY (`mcid`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thrift`
--
ALTER TABLE `thrift`
  ADD PRIMARY KEY (`thriftid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `compid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fine`
--
ALTER TABLE `fine`
  MODIFY `fineid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jagratha`
--
ALTER TABLE `jagratha`
  MODIFY `requestid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `loaninstallment`
--
ALTER TABLE `loaninstallment`
  MODIFY `installmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `meetid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `monthly`
--
ALTER TABLE `monthly`
  MODIFY `mcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `thrift`
--
ALTER TABLE `thrift`
  MODIFY `thriftid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
