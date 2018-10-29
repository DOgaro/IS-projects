-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 10:46 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kejamanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `Bid` int(250) NOT NULL,
  `blockname` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`Bid`, `blockname`, `description`) VALUES
(1, 'Block 1', '5 Houses'),
(2, 'Block 2', '5 houses'),
(3, 'Block 3', '5 houses'),
(4, 'Block 4', '5 houses'),
(5, 'Block 5', '6 houses'),
(6, 'Block 6', '7 houses');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `Hid` int(250) NOT NULL,
  `blockname` varchar(100) NOT NULL,
  `house` varchar(100) NOT NULL,
  `rent` int(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`Hid`, `blockname`, `house`, `rent`, `type`, `status`) VALUES
(1, 'Block 1', 'House 1A', 20000, '1 Bedroom', 'Vacant'),
(2, 'Block 1', 'House 2A', 20000, '1 Bedroom', 'Vacant'),
(3, 'Block 1', 'House 3A', 20000, '1 Bedroom', 'Vacant'),
(4, 'Block 1', 'House 4A', 20000, '1 Bedroom', 'Vacant'),
(5, 'Block 1', 'House 5A', 20000, '1 Bedroom', 'Occupied'),
(6, 'Block 2', 'House 1B', 30000, '2 Bedroom', 'Vacant'),
(7, 'Block 2', 'House 2B', 30000, '2 Bedroom', 'Vacant'),
(8, 'Block 2', 'House 3B', 30000, '2 Bedroom', 'Occupied');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(30, 0, '  hello', 'Stephen Wanjiku', '2018-10-16 14:06:38'),
(31, 0, '  hello', 'Stephen Wanjiku', '2018-10-16 14:08:36'),
(32, 28, '  tomorrow', 'Ian', '2018-10-16 15:24:54'),
(33, 30, '  kesho', 'james', '2018-10-17 06:59:10'),
(34, 33, '  okay', 'james', '2018-10-17 07:01:05'),
(35, 0, '  rent due on 20th november', 'Stephen', '2018-10-22 06:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(250) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Contact` int(200) NOT NULL,
  `access_level` int(10) NOT NULL,
  `blockname` varchar(200) NOT NULL,
  `house` varchar(200) NOT NULL,
  `rent` varchar(200) NOT NULL,
  `Equipments` varchar(200) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `name`, `username`, `Email`, `password`, `Contact`, `access_level`, `blockname`, `house`, `rent`, `Equipments`, `date`) VALUES
(1, 'Derdus', 'Ogaro', 'carlos@hotmail.com', '', 700340019, 3, 'Block 2', 'House 2B', '30000', 'dispenser', '2018-10-26 08:39:29.516270'),
(2, 'Dennis', 'Mbiraru', 'hatrick3@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 756789546, 3, 'Block 2', 'House 2B', '20000', 'fridge', '2018-10-24 07:30:30.260981'),
(3, 'Ian', 'Kiplel', 'georgekafoca@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 713168684, 3, 'Block 1', 'House 2A', '20000', 'fridge', '2018-10-24 07:32:48.773614'),
(4, 'James', 'Boro', 'danb@hotmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 713168684, 3, 'Block 1', 'House 3A', '20000', 'cooker', '2018-10-24 07:37:00.546308'),
(5, 'Solomon', 'Tuitoek', 'davyr4@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 700340020, 3, 'Block 3', 'House 2C', '21000', 'fridge', '2018-10-26 08:56:12.145680'),
(6, 'Aubrey', 'Kajiji', 'hatrick3@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 756789546, 3, 'Block 2', 'House 5B', '20000', 'cooker', '2018-10-26 08:43:34.382510');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Contact` int(100) NOT NULL,
  `access_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `Email`, `password`, `Contact`, `access_level`) VALUES
(11, 'samuel', 'benson', 'hatrick3@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 713168684, ''),
(3, 'Me', 'kafoca', 'kilosh@kafoca.com', '827ccb0eea8a706c4c34a16891f84e7b', 713168684, '1'),
(12, 'Lorna', 'Kariuki', 'georgekafoca@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 756789546, '1'),
(15, 'Wanjiku', 'Kimama', 'bencarson45@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 713168684, '1'),
(10, 'tyuvyibunlk', 'Lorna', 'hatrick3@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 713168684, ''),
(6, 'ola', 'mide', 'dkenga@strathmore.edu', 'e10adc3949ba59abbe56e057f20f883e', 713168684, '1'),
(14, 'Derdus', 'Motanya', 'derdusm@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 713168684, '2'),
(2, 'Sam', 'Mulwa', 'sammulwa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 713168684, '2'),
(5, 'Owen', 'Mutua', 'bencarson45@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 713168684, '1'),
(1, 'George', 'Mwaniki', 'georgekafoca@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 700340019, '1'),
(4, 'Ian', 'Njuguna', 'iankiragu@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 713168684, ''),
(8, 'Qwerty', 'Qwerty', 'bencarson45@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 713168684, '1'),
(13, 'Lorna', 'Wambui', 'hatrick3@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 700340019, '2'),
(7, 'ola', 'wole', 'georgekafoca@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 713168684, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`Bid`),
  ADD KEY `id` (`Bid`),
  ADD KEY `blockname` (`blockname`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`Hid`),
  ADD KEY `blockname` (`blockname`),
  ADD KEY `house` (`house`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `Bid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `Hid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`blockname`) REFERENCES `block` (`blockname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
