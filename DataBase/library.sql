-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 10:22 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookId` int(11) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `bookRFID` varchar(255) NOT NULL,
  `bookInfo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `bookName`, `bookRFID`, `bookInfo`) VALUES
(2, 'Zero to Hero', '0012326938', ''),
(3, 'Malgudi Days', '0012659703', ''),
(4, 'Let us C ', '0001232113', 'C block, 3rd row'),
(5, 'asas', 'asas', 'saa'),
(6, 'asas', 'sas', 'asas'),
(7, 'xyz', '0001233621', 'asasasas'),
(8, 'fff', '0001232731', 'www');

-- --------------------------------------------------------

--
-- Table structure for table `issuerecord`
--

CREATE TABLE `issuerecord` (
  `issueId` int(11) NOT NULL,
  `issueBookId` varchar(11) NOT NULL,
  `issueStudentId` varchar(10) NOT NULL,
  `issueStatus` int(11) NOT NULL DEFAULT '0',
  `issueDate` varchar(255) NOT NULL,
  `returnDate` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuerecord`
--

INSERT INTO `issuerecord` (`issueId`, `issueBookId`, `issueStudentId`, `issueStatus`, `issueDate`, `returnDate`) VALUES
(1, '0001232113', '0001232113', 1, '2019-04-14 15:15:03', '2019-04-14 15:16:59'),
(2, '', '0001232113', 1, '2019-04-14 15:15:13', '2019-04-14 16:07:05'),
(3, '0001232113', '0001232113', 1, '2019-04-14 15:17:10', '2019-04-14 15:17:51'),
(4, '0001232113', '0001232113', 1, '2019-04-14 15:43:12', '2019-04-14 16:06:31'),
(5, '0001232113', '0001232113', 1, '2019-04-14 16:06:56', '2019-04-14 16:07:07'),
(6, '0001232113', '0001232113', 1, '2019-04-14 16:08:04', '2019-04-14 16:08:21'),
(7, '', '0001232113', 0, '2019-04-14 16:08:14', '0'),
(8, '0001232113', '0001232113', 1, '2019-04-14 16:09:53', '2019-04-14 16:11:27'),
(9, '0001232113', '0001232113', 1, '2019-04-14 16:13:58', '2019-04-14 17:28:19'),
(10, '0001233621', '0001233445', 1, '2019-04-24 08:58:44', '2019-04-24 08:59:29'),
(11, '0001233621', '0001233445', 1, '2019-04-24 09:16:26', '2019-04-24 09:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentId` int(11) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `studentEmail` varchar(255) NOT NULL,
  `studentMobile` varchar(255) NOT NULL,
  `studentRFID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentId`, `studentName`, `studentEmail`, `studentMobile`, `studentRFID`) VALUES
(1, 'asas', '78887', 'aaa', '0012659703'),
(2, 'Anuj Rajak', 'mr.anujrajak@gmail.com', '8889262677', '0001232113'),
(3, 'Rupendra', '7788994455', 'xyz@gmail.com', '0001233445'),
(4, 'bbb', '77777777', 'ghh', '0001233003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `issuerecord`
--
ALTER TABLE `issuerecord`
  ADD PRIMARY KEY (`issueId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `issuerecord`
--
ALTER TABLE `issuerecord`
  MODIFY `issueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
