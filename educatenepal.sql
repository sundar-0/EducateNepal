-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 04:40 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educatenepal`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(11) NOT NULL,
  `catname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`) VALUES
(1, 'physics'),
(2, 'programming'),
(3, 'chemistry'),
(4, 'mathematics'),
(5, 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `friendrequest`
--

CREATE TABLE `friendrequest` (
  `userA` varchar(30) NOT NULL,
  `userB` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendrequest`
--

INSERT INTO `friendrequest` (`userA`, `userB`, `status`) VALUES
('himal12', 'sujanbhusal', 'Approved'),
('himal12', 'sundar', 'Approved'),
('himal12', 'nishac', 'Approved'),
('sabina', 'sundar', 'Approved'),
('himal12', 'sabina', 'Approved'),
('sabina', 'nishac', 'pending'),
('sujanbhusal', 'sundar', 'Approved'),
('', 'himal12', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `username`, `status`) VALUES
(2, 'himal12', 'logedin'),
(3, 'sundar', 'logedin'),
(4, 'sujanbhusal', 'loggedout'),
(1, 'nishac', 'loggedout'),
(6, 'sabina', 'loggedout'),
(7, 'yajju12', 'loggedout');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post` longtext NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) DEFAULT NULL,
  `catidfk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `username`, `post`, `postdate`, `image`, `catidfk`) VALUES
(1, 'sundar', 'hello this is the sample text of physics', '2020-01-30 08:00:55', NULL, 1),
(2, 'sundar', 'This is another test of chemistry', '2020-01-30 11:54:18', NULL, 3),
(3, 'sundar', 'hello', '2020-01-30 03:15:30', NULL, 2),
(4, 'sundar', 'hy this is sundar don.', '2020-01-30 03:23:50', '1580371730.jpg', 2),
(5, 'himal12', 'hy this is himal don', '2020-01-30 04:19:03', '1580375043.jpg', 2),
(6, 'sujanbhusal', 'can anyone explain this dd flow?', '2020-01-31 05:24:13', '1580465353.jpg', 2),
(7, 'sujanbhusal', 'hello physics', '2020-01-31 00:00:00', NULL, 1),
(8, 'sujanbhusal', 'why sky is blue?', '2020-02-01 06:26:10', NULL, 1),
(9, 'sujanbhusal', 'can anyone tell the scope of civil engineering', '2020-02-01 01:40:20', NULL, 5),
(10, 'sundar', 'hello this is the sample test of engineering', '2020-02-03 07:10:46', '1580730946.jpg', 5),
(11, 'sundar', 'helllo...', '2020-02-02 21:13:03', NULL, 2),
(13, 'nishac', 'sundar don', '2020-02-02 21:21:58', NULL, 2),
(14, 'yajju12', 'hello educate nepal', '2020-02-03 00:49:16', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`userid`, `username`, `email`, `password`, `dob`, `gender`, `image`) VALUES
(1, 'nishac', 'nishachapagain69@gmail.com', 'a45d8e2546865fda42b753d20e7d2d32', '1999-01-01', 'female', '1580299826.jpg'),
(2, 'himal12', 'himalpandey@gmail.com', '7015958ffe1907ceb3bd540223b3703a', '1998-12-12', 'male', NULL),
(3, 'sundar', 'sundardumre69@gmail.com', 'b2a4e41bed1b425d5d37fee827902d40', '1999-12-12', 'male', '1580363523.jpg'),
(4, 'sujanbhusal', 'sujanbhusal@gmail.com', 'ea75d73f71d9f5d8fea916472105453d', '1999-12-12', 'male', NULL),
(6, 'sabina', 'sabina@gmail.com', '3f06c9f725627d1686d9a7bd0c2ec0cd', '1998-07-30', 'female', NULL),
(7, 'yajju12', 'yajju@gmail.com', 'f56b98028f9119d24a09424a0a0f729f', '2012-12-12', 'male', NULL),
(8, 'user12', 'user12@g.com', 'b5b73fae0d87d8b4e2573105f8fbe7bc', '1999-12-12', 'male', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `catidfk` (`catidfk`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `registration` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`catidfk`) REFERENCES `category` (`catid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
