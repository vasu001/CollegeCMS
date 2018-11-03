-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2018 at 12:15 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccms`
--
DROP DATABASE `ccms`;
CREATE DATABASE IF NOT EXISTS `ccms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ccms`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--
-- Creation: Nov 03, 2018 at 11:13 AM
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Admin''s ID',
  `Name` varchar(255) NOT NULL COMMENT 'Admin''s Name',
  `Email` varchar(255) NOT NULL COMMENT 'Admin''s Email',
  `Password` varchar(255) NOT NULL COMMENT 'Admin''s Password',
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'ID Creation Date',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Admin Table';

--
-- RELATIONSHIPS FOR TABLE `admins`:
--

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `Name`, `Email`, `Password`, `Created_At`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$GotwohgFtcFFqmBBuFYvfuYoK0uQQrbPtYNHdEotOo6jJp7Nu/vQO', '2018-09-11 08:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--
-- Creation: Nov 03, 2018 at 11:13 AM
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Specialization''s ID',
  `Name` varchar(255) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Specialization Table';

--
-- RELATIONSHIPS FOR TABLE `branch`:
--

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`ID`, `Name`, `Created_At`) VALUES
(1, 'CSE', '2018-09-11 08:18:52'),
(2, 'ECE', '2018-09-11 08:18:54'),
(3, 'ME', '2018-09-11 08:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--
-- Creation: Nov 03, 2018 at 11:13 AM
--

DROP TABLE IF EXISTS `career`;
CREATE TABLE IF NOT EXISTS `career` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Message ID',
  `Name` varchar(255) NOT NULL COMMENT 'Messenger''s Name',
  `Email ID` varchar(255) NOT NULL COMMENT 'Messenger''s Email ID',
  `Contact Number` varchar(10) NOT NULL COMMENT 'Messenger''s Phone Number',
  `Date` date NOT NULL COMMENT 'Message Date',
  `Current Organisation` varchar(100) NOT NULL COMMENT 'Messenger''s Current Organisation',
  `Message` varchar(500) NOT NULL COMMENT 'Messenger''s Query',
  `Permanent Address` varchar(255) NOT NULL COMMENT 'Messenger''s Address',
  `Pincode` varchar(6) NOT NULL COMMENT 'Messenger''s Pincode',
  `Current CTC` varchar(15) NOT NULL COMMENT 'Messenger''s Current CTC',
  `Expected CTC` varchar(15) NOT NULL COMMENT 'Messenger''s Expected CTC',
  `Gender` varchar(10) NOT NULL COMMENT 'Messenger''s Gender',
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time of Message',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Messages';

--
-- RELATIONSHIPS FOR TABLE `career`:
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--
-- Creation: Nov 03, 2018 at 11:13 AM
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Contact ID',
  `Name` varchar(255) NOT NULL COMMENT 'Contact''s Name',
  `Email ID` varchar(255) NOT NULL COMMENT 'Contact''s Email ID',
  `Contact Number` varchar(10) NOT NULL COMMENT 'Contact''s Number',
  `Course` varchar(10) NOT NULL COMMENT 'Contact''s Enrolled Course',
  `Message` varchar(500) NOT NULL COMMENT 'Contact''s Message',
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time of Message',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contact Messages';

--
-- RELATIONSHIPS FOR TABLE `contact`:
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--
-- Creation: Nov 03, 2018 at 11:13 AM
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Courses Table';

--
-- RELATIONSHIPS FOR TABLE `courses`:
--

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `Name`, `Created_At`) VALUES
(1, 'B.Tech', '2018-09-11 08:18:52'),
(2, 'BCA', '2018-09-11 08:18:54'),
(3, 'M.Tech', '2018-09-11 08:18:56'),
(4, 'MCA', '2018-09-11 08:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--
-- Creation: Nov 03, 2018 at 11:13 AM
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Student''s ID',
  `Name` varchar(255) NOT NULL COMMENT 'Student''s Name',
  `Email ID` varchar(50) NOT NULL COMMENT 'Student''s Email ID',
  `Password` varchar(255) NOT NULL COMMENT 'Student''s Password',
  `Hash` varchar(32) DEFAULT NULL COMMENT 'Verification Hash',
  `Active` tinyint(1) DEFAULT '0' COMMENT 'Account Verification',
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Activated Date & Time',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email ID` (`Email ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Student Table';

--
-- RELATIONSHIPS FOR TABLE `students`:
--

--
-- Triggers `students`
--
DROP TRIGGER IF EXISTS `after_register`;
DELIMITER $$
CREATE TRIGGER `after_register` AFTER INSERT ON `students` FOR EACH ROW BEGIN
  INSERT INTO `students_info`(`Student ID`) VALUES(NEW.`ID`);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `students_info`
--
-- Creation: Nov 03, 2018 at 11:13 AM
--

DROP TABLE IF EXISTS `students_info`;
CREATE TABLE IF NOT EXISTS `students_info` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Student''s Info ID',
  `Student ID` int(11) NOT NULL COMMENT 'Student''s ID',
  `Roll Number` int(11) DEFAULT NULL COMMENT 'Student''s ID',
  `DOB` date DEFAULT NULL COMMENT 'Student''s DOB',
  `Mobile` int(11) DEFAULT NULL COMMENT 'Student''s Mobile',
  `Gender` varchar(10) DEFAULT NULL COMMENT 'Student''s Gender',
  `Address` varchar(255) DEFAULT NULL COMMENT 'Student''s Address',
  `City` varchar(100) DEFAULT NULL COMMENT 'Student''s City',
  `State` varchar(100) DEFAULT NULL COMMENT 'Student''s State',
  `Pincode` varchar(6) DEFAULT NULL COMMENT 'Student''s Pincode',
  `Course` varchar(10) DEFAULT NULL COMMENT 'Student''s Course',
  `Year` varchar(10) DEFAULT NULL COMMENT 'Student''s Year',
  `Specialization` varchar(255) DEFAULT NULL COMMENT 'Student''s Specialization',
  `Photo ID` varchar(255) DEFAULT NULL COMMENT 'Student''s Photo ID',
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Info Added On',
  PRIMARY KEY (`ID`),
  KEY `students_info_ibfk_1` (`Student ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Student Table';

--
-- RELATIONSHIPS FOR TABLE `students_info`:
--   `Student ID`
--       `students` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--
-- Creation: Nov 03, 2018 at 11:13 AM
--

DROP TABLE IF EXISTS `student_marks`;
CREATE TABLE IF NOT EXISTS `student_marks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Student Marks ID',
  `Student ID` int(11) NOT NULL,
  `Course ID` int(11) NOT NULL,
  `Branch ID` int(11) NOT NULL,
  `Subject ID` int(11) NOT NULL,
  `Marks` int(11) NOT NULL,
  `is_declared` tinyint(1) DEFAULT '0',
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `student_marks_ibfk_1` (`Student ID`),
  KEY `student_marks_ibfk_2` (`Subject ID`),
  KEY `student_marks_ibfk_4` (`Branch ID`),
  KEY `student_marks_ibfk_3` (`Course ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Student''s Marks';

--
-- RELATIONSHIPS FOR TABLE `student_marks`:
--   `Student ID`
--       `students` -> `ID`
--   `Subject ID`
--       `subjects` -> `ID`
--   `Course ID`
--       `courses` -> `ID`
--   `Branch ID`
--       `branch` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--
-- Creation: Nov 03, 2018 at 11:13 AM
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='Subjects';

--
-- RELATIONSHIPS FOR TABLE `subjects`:
--

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`ID`, `Name`, `Created_At`) VALUES
(1, 'Engineering Physics', '2018-09-11 08:38:36'),
(2, 'Engineering Chemistry', '2018-09-11 08:38:36'),
(3, 'Engineering Mathematics-1', '2018-09-11 08:38:36'),
(4, 'Engineering Mathematics-2', '2018-09-11 08:38:36'),
(5, 'Engineering Drawing', '2018-09-11 08:38:36'),
(6, 'Workshop Practice', '2018-09-11 08:38:36'),
(7, 'Soft Skills', '2018-09-11 08:38:36'),
(8, 'Programming in C', '2018-09-11 08:38:36'),
(9, 'Programming in C++', '2018-09-11 08:38:36'),
(10, 'Basics of Electrical Engineering', '2018-09-11 08:38:36'),
(11, 'Basics of Electronics Engineering', '2018-09-11 08:38:36'),
(12, 'Basics of Mechanical Engineering', '2018-09-11 08:38:36'),
(13, 'Professional Communication', '2018-09-11 08:38:36'),
(14, 'Theory of Computation', '2018-09-11 08:38:36'),
(15, 'Data Structures', '2018-09-11 08:38:36'),
(16, 'Computer Networks', '2018-09-11 08:38:36'),
(17, 'Computer Based Numerical and Statistical Techniques', '2018-09-11 08:38:36'),
(18, 'Discrete Mathematics', '2018-09-11 08:38:36'),
(19, 'Linux OS', '2018-09-11 08:38:36'),
(20, 'Microprocessors', '2018-09-11 08:38:36'),
(21, 'Database Management', '2018-09-11 08:38:36'),
(22, 'Programming with Java', '2018-09-11 08:38:36'),
(23, 'Web Technology', '2018-09-11 08:38:36'),
(24, 'Digital System Design', '2018-09-11 08:38:36'),
(25, 'Computer Organization', '2018-09-11 08:38:36'),
(26, 'Probability and Random Variables', '2018-09-11 08:38:36'),
(27, 'Operating Systems', '2018-09-11 08:38:36'),
(28, 'Algorithms:Design and Analysis', '2018-09-11 08:38:36'),
(29, 'Principles of Management', '2018-09-11 08:38:36'),
(30, 'Aptitude Building', '2018-09-11 08:38:36'),
(31, 'Computer Graphics', '2018-09-11 08:38:36'),
(32, 'Dot Net Technologies', '2018-09-11 08:38:36'),
(33, 'Essentials of Software Engineering', '2018-09-11 08:38:36'),
(34, 'Compiler Design', '2018-09-11 08:38:36'),
(35, 'Engineering Economics', '2018-09-11 08:38:36'),
(36, 'Security Access Management', '2018-09-11 08:38:36'),
(37, 'Aptitude Building-2', '2018-09-11 08:38:36'),
(38, 'Distributed Computing', '2018-09-11 08:38:36'),
(39, 'Advanced Computer Architecture', '2018-09-11 08:38:36'),
(40, 'Cryptography and Network Security', '2018-09-11 08:38:36'),
(41, 'Data Warehousing and Mining', '2018-09-11 08:38:36'),
(42, 'Security Identity Management', '2018-09-11 08:38:36'),
(43, 'Advanced RDBMS', '2018-09-11 08:38:36'),
(44, 'Business Intelligence', '2018-09-11 08:38:36'),
(45, 'Real Time Systems', '2018-09-11 08:38:36'),
(46, 'Cyber Law and IPR', '2018-09-11 08:38:36'),
(47, 'Application Security', '2018-09-11 08:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `sycss`
--
-- Creation: Nov 03, 2018 at 11:13 AM
--

DROP TABLE IF EXISTS `sycss`;
CREATE TABLE IF NOT EXISTS `sycss` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `Year ID` int(11) NOT NULL,
  `Course ID` int(11) NOT NULL,
  `Specialization ID` int(11) NOT NULL,
  `Subject ID` int(11) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `sycss_ibfk_1` (`Course ID`),
  KEY `sycss_ibfk_2` (`Subject ID`),
  KEY `sycss_ibfk_3` (`Year ID`),
  KEY `sycss_ibfk_4` (`Specialization ID`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='Relation between Year, Course, Specialization, Subject';

--
-- RELATIONSHIPS FOR TABLE `sycss`:
--   `Course ID`
--       `courses` -> `ID`
--   `Subject ID`
--       `subjects` -> `ID`
--   `Year ID`
--       `year` -> `ID`
--   `Specialization ID`
--       `branch` -> `ID`
--

--
-- Dumping data for table `sycss`
--

INSERT INTO `sycss` (`ID`, `Year ID`, `Course ID`, `Specialization ID`, `Subject ID`, `Created_At`) VALUES
(1, 1, 1, 1, 1, '2018-10-28 06:01:07'),
(2, 1, 1, 1, 2, '2018-10-28 06:01:07'),
(3, 1, 1, 1, 3, '2018-10-28 06:01:07'),
(4, 1, 1, 1, 4, '2018-10-28 06:01:07'),
(5, 1, 1, 1, 5, '2018-10-28 06:01:07'),
(6, 1, 1, 1, 6, '2018-10-28 06:01:07'),
(7, 1, 1, 1, 7, '2018-10-28 06:01:07'),
(8, 1, 1, 1, 8, '2018-10-28 06:01:07'),
(9, 1, 1, 1, 9, '2018-10-28 06:01:07'),
(10, 1, 1, 1, 10, '2018-10-28 06:01:07'),
(11, 1, 1, 1, 11, '2018-10-28 06:01:07'),
(12, 1, 1, 1, 12, '2018-10-28 06:01:07'),
(13, 2, 1, 1, 13, '2018-10-28 06:01:07'),
(14, 2, 1, 1, 14, '2018-10-28 06:01:07'),
(15, 2, 1, 1, 15, '2018-10-28 06:01:07'),
(16, 2, 1, 1, 16, '2018-10-28 06:01:07'),
(17, 2, 1, 1, 17, '2018-10-28 06:01:07'),
(18, 2, 1, 1, 18, '2018-10-28 06:01:07'),
(19, 2, 1, 1, 19, '2018-10-28 06:01:07'),
(20, 2, 1, 1, 20, '2018-10-28 06:01:07'),
(21, 2, 1, 1, 21, '2018-10-28 06:01:07'),
(22, 2, 1, 1, 22, '2018-10-28 06:01:07'),
(23, 2, 1, 1, 23, '2018-10-28 06:01:07'),
(24, 2, 1, 1, 24, '2018-10-28 06:01:07'),
(25, 3, 1, 1, 25, '2018-10-28 06:01:07'),
(26, 3, 1, 1, 26, '2018-10-28 06:01:07'),
(27, 3, 1, 1, 27, '2018-10-28 06:01:07'),
(28, 3, 1, 1, 28, '2018-10-28 06:01:07'),
(29, 3, 1, 1, 29, '2018-10-28 06:01:07'),
(30, 3, 1, 1, 30, '2018-10-28 06:01:07'),
(31, 3, 1, 1, 31, '2018-10-28 06:01:07'),
(32, 3, 1, 1, 32, '2018-10-28 06:01:07'),
(33, 3, 1, 1, 33, '2018-10-28 06:01:07'),
(34, 3, 1, 1, 34, '2018-10-28 06:01:07'),
(35, 3, 1, 1, 35, '2018-10-28 06:01:07'),
(36, 3, 1, 1, 36, '2018-10-28 06:01:07'),
(37, 4, 1, 1, 37, '2018-10-28 06:01:07'),
(38, 4, 1, 1, 38, '2018-10-28 06:01:07'),
(39, 4, 1, 1, 39, '2018-10-28 06:01:07'),
(40, 4, 1, 1, 40, '2018-10-28 06:01:07'),
(41, 4, 1, 1, 41, '2018-10-28 06:01:07'),
(42, 4, 1, 1, 42, '2018-10-28 06:01:07'),
(43, 4, 1, 1, 43, '2018-10-28 06:01:07'),
(44, 4, 1, 1, 44, '2018-10-28 06:01:07'),
(45, 4, 1, 1, 45, '2018-10-28 06:01:07'),
(46, 4, 1, 1, 46, '2018-10-28 06:01:07'),
(47, 4, 1, 1, 47, '2018-10-28 06:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--
-- Creation: Nov 03, 2018 at 11:13 AM
--

DROP TABLE IF EXISTS `year`;
CREATE TABLE IF NOT EXISTS `year` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(10) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Years';

--
-- RELATIONSHIPS FOR TABLE `year`:
--

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`ID`, `Name`, `Created_At`) VALUES
(1, 'First', '2018-09-11 08:21:56'),
(2, 'Second', '2018-09-11 08:21:56'),
(3, 'Third', '2018-09-11 08:21:56'),
(4, 'Fourth', '2018-09-11 08:21:56');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students_info`
--
ALTER TABLE `students_info`
  ADD CONSTRAINT `students_info_ibfk_1` FOREIGN KEY (`Student ID`) REFERENCES `students` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD CONSTRAINT `student_marks_ibfk_1` FOREIGN KEY (`Student ID`) REFERENCES `students` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_marks_ibfk_2` FOREIGN KEY (`Subject ID`) REFERENCES `subjects` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_marks_ibfk_3` FOREIGN KEY (`Course ID`) REFERENCES `courses` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_marks_ibfk_4` FOREIGN KEY (`Branch ID`) REFERENCES `branch` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `sycss`
--
ALTER TABLE `sycss`
  ADD CONSTRAINT `sycss_ibfk_1` FOREIGN KEY (`Course ID`) REFERENCES `courses` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `sycss_ibfk_2` FOREIGN KEY (`Subject ID`) REFERENCES `subjects` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `sycss_ibfk_3` FOREIGN KEY (`Year ID`) REFERENCES `year` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `sycss_ibfk_4` FOREIGN KEY (`Specialization ID`) REFERENCES `branch` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
