-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 09:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `UserName`, `Email`, `Password`) VALUES
(1, 'admin1', 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `ParentID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `MobileNum` int(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`ParentID`, `UserName`, `FullName`, `Email`, `Password`, `MobileNum`, `Address`, `City`) VALUES
(1, 'ahmed', 'ahmedd', 'ahmed@yahoo.com', '12345', 1112234545, 'street44', 'cairo'),
(2, 'soha', 'soha hamed', 'so@yahoo.com', '1234', 111433423, 'street6', 'cairo');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `tutor_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `subj_id` int(11) DEFAULT NULL,
  `request_status` varchar(255) DEFAULT '0',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`tutor_id`, `parent_id`, `subj_id`, `request_status`, `date`) VALUES
(4, 2, 5, '1', '2020-12-30'),
(4, 2, 5, '2', '2020-12-30'),
(1, 1, 6, '2', '2020-12-30'),
(1, 2, 4, '2', '2020-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `Subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `euro` varchar(255) DEFAULT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`Subject_id`, `subject_name`, `euro`, `tutor_id`, `parent_id`) VALUES
(4, 'is', '45', 1, NULL),
(5, 'math', '52', 4, NULL),
(6, 'or', '50', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `TutorID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `MobileNum` int(255) NOT NULL,
  `SchoolName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`TutorID`, `UserName`, `FullName`, `Email`, `Password`, `MobileNum`, `SchoolName`, `Address`, `City`) VALUES
(1, 'ali', 'ali ahmed', 'a@yahoo.com', 'd1RMVFdkTUtoYW5QSDlRZG9ORXJ0QT09OjquoyYabUOePjXziF6g0oaf', 111276488, 'fcicu', 'street4', 'cairo'),
(3, 'mahmoud', 'mahmoud ahmed', 'm@y.com', 'VW9senRLbTZndFJhWmdQQ0kwVk54dz09Ojr9pKy6Rztc9gBActFBKvGu', 2234444, 'el nour', 'GG', 'GG'),
(4, 'mo', 'mohammed', 'm@gmail.com', 'bkJyUWp0NG5jaklUV1pOSVRqMWhEUT09Ojpt0911NBZYm2BsuGLPPpkQ', 112323342, 'fciu', 'street5', 'giza');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`ParentID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD KEY `tutor` (`tutor_id`),
  ADD KEY `parent` (`parent_id`),
  ADD KEY `subject` (`subj_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`Subject_id`),
  ADD KEY `Parents` (`parent_id`),
  ADD KEY `Tutors` (`tutor_id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`TutorID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `TutorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `parent` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`ParentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject` FOREIGN KEY (`subj_id`) REFERENCES `subjects` (`Subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tutor` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`TutorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `Parents` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`ParentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Tutors` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`TutorID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
