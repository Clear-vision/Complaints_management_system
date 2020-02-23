-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2020 at 12:01 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaints_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '$2y$10$o36aghOA/HlLO3rYMvRCbuho8tCsQ1XBtJXWiUz91WQ/r5iOvPn2a', '18-10-2016 04:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `complaintNumber` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `complaintNumber`, `status`, `remark`, `remarkDate`) VALUES
(5, 20, 'in process', 'OK you can go now for vacation.Only for three months not more than that.', '2018-09-14 04:58:09'),
(6, 20, 'closed', 'Permission Granted', '2018-09-14 04:59:16'),
(7, 21, 'in process', 'OK we are working on your vacation allowance ', '2018-09-14 05:27:39'),
(8, 24, 'in process', 'wait for the next budget', '2018-09-23 04:37:14'),
(9, 22, 'in process', 'complaint received', '2018-10-10 07:31:37'),
(10, 48, 'closed', 'yes keep learning', '2018-10-28 06:19:16'),
(11, 32, 'closed', 'yes keep learning ', '2018-10-28 06:22:26'),
(12, 50, 'closed', 'java is the language you will learn.', '2018-10-30 08:40:13'),
(13, 49, 'closed', 'very soon don\'t worry', '2018-10-30 08:42:02'),
(14, 51, 'closed', 'ok i will deal with that right away', '2018-10-31 09:14:34'),
(15, 26, 'closed', 'you will receive your money very soon', '2018-12-03 05:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `faculty_id`, `creationDate`, `updationDate`) VALUES
(3, 'Department of Examinations', NULL, '2018-09-14 02:45:26', '27-10-2018 05:13:06 AM'),
(4, ' Department of Computer Science', 8, '2018-09-23 05:00:42', '27-10-2018 04:59:43 AM'),
(5, ' Department of Information Technology', 8, '2018-09-23 05:01:21', '27-10-2018 05:05:38 AM'),
(6, 'Department of Register', NULL, '2018-12-03 02:17:09', '03-12-2018 02:17:22 AM');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `facultyName` varchar(255) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `facultyName`, `postingDate`, `updationDate`) VALUES
(7, 'Faculty of Accounting, Banking and Finance', '2018-09-14 02:46:30', '03-12-2018 02:51:40 AM'),
(8, 'computing, information system and mathematic', '2018-10-15 01:38:06', '03-12-2018 03:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `program_name` varchar(111) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `program_name`, `faculty_id`, `creationDate`, `updationDate`) VALUES
(6, 'Diploma in Computer Science', 8, '2018-12-03 02:42:37', '03-12-2018 02:43:58 AM'),
(7, 'Diploma in Banking', 7, '2018-12-03 02:54:24', '03-12-2018 02:54:49 AM');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(123) NOT NULL,
  `department_id` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `email`, `password`, `department_id`, `status`) VALUES
(3, 'staff', 'staff@gmail.com', '$2y$10$o36aghOA/HlLO3rYMvRCbuho8tCsQ1XBtJXWiUz91WQ/r5iOvPn2a', 3, 1),
(4, 'Dr. James Smith', 'smith@gmail.com', '$2y$10$NTDxlXzATDcJ02V/gVLUPOiKE0S68jDWfUzkduaa/W4c2VZfYHyTO', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `complaintType` varchar(255) NOT NULL,
  `complaintDetails` mediumtext NOT NULL,
  `complaintFile` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`complaintNumber`, `userId`, `department`, `complaintType`, `complaintDetails`, `complaintFile`, `regDate`, `status`, `lastUpdationDate`) VALUES
(25, 7, 5, 'General Query', 'no network connection every afternoon', '', '2018-09-23 05:07:39', NULL, '2020-02-07 22:47:49'),
(27, 7, 5, 'General Query', 'i need PHP books for advance web development', '', '2018-10-28 02:24:51', NULL, '2020-02-07 22:48:05'),
(49, 7, 3, 'General Query', 'when a we going  receive our 2 Semester result ?', '', '2018-10-30 08:20:33', 'closed', '2018-10-30 08:42:02'),
(50, 7, 4, 'General Query', 'in object oriented programming are we going to study java or C# program ? ', '', '2018-10-30 08:37:49', 'closed', '2020-02-07 22:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` varchar(16) DEFAULT NULL,
  `address` tinytext,
  `faculty` varchar(255) DEFAULT NULL,
  `program` varchar(255) DEFAULT NULL,
  `student_registration_no` varchar(255) DEFAULT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `address`, `faculty`, `program`, `student_registration_no`, `userImage`, `regDate`, `updationDate`, `status`) VALUES
(7, 'John Lukondo', 'jlukondo5@gmail.com', '$2y$10$3M.sHMlmc/8VuImpHq5dOe5cqoxq8IlHtdNcatpSJW8KAOMDVDgEK', '0756731833', 'Tabata Segerea', 'computing, information system and mathematic', 'computer   science', 'UPA/DCS/17/92885', NULL, '2018-09-14 02:35:11', '0000-00-00 00:00:00', 1),
(8, 'Jane Doe', 'jane@gmail.com', '$2y$10$DeaLLG3OkfXL.u/ze4QoieK/ncv3zAuBFiF75Au25LrAElfmTaKXy', '0789673490', 'kisutu', 'Faculty of Accounting, Banking and Finance', 'Account', 'UPA/DAC/17/95880', NULL, '2018-10-31 08:27:36', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(22, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-09-14 02:35:32', '14-09-2018 08:10:03 AM', 1),
(23, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-09-14 02:47:22', '14-09-2018 08:22:40 AM', 1),
(24, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-09-14 05:17:06', '14-09-2018 11:32:31 AM', 1),
(25, 0, 'admin', 0x3132372e302e302e3100000000000000, '2018-09-22 09:13:01', '', 0),
(26, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-09-22 09:19:55', '22-09-2018 03:08:31 PM', 1),
(27, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-09-23 01:51:25', '23-09-2018 10:24:08 AM', 1),
(28, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-09-23 04:54:21', '', 1),
(29, 0, 'user', 0x3132372e302e302e3100000000000000, '2018-10-08 05:18:34', '', 0),
(30, 0, 'user', 0x3132372e302e302e3100000000000000, '2018-10-08 05:18:43', '', 0),
(31, 0, 'John Lukondo', 0x3132372e302e302e3100000000000000, '2018-10-08 05:21:44', '', 0),
(32, 0, 'John Lukondo', 0x3132372e302e302e3100000000000000, '2018-10-08 05:21:52', '', 0),
(33, 0, 'John Lukondo', 0x3132372e302e302e3100000000000000, '2018-10-08 05:22:47', '', 0),
(34, 0, 'John Lukondo', 0x3132372e302e302e3100000000000000, '2018-10-08 05:22:55', '', 0),
(35, 0, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-08 05:23:06', '', 0),
(36, 0, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-08 05:26:01', '', 0),
(37, 0, 'jlukondo5@gmail.com 	', 0x3132372e302e302e3100000000000000, '2018-10-08 05:27:00', '', 0),
(38, 0, 'John Lukondo', 0x3132372e302e302e3100000000000000, '2018-10-08 05:28:04', '', 0),
(39, 0, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-08 05:28:43', '', 0),
(40, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-08 05:31:21', '', 1),
(41, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-09 03:31:10', '09-10-2018 05:21:56 AM', 1),
(42, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-09 06:00:18', '09-10-2018 06:02:43 AM', 1),
(43, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-09 06:06:33', '09-10-2018 06:08:58 AM', 1),
(44, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-09 08:06:44', '09-10-2018 08:07:17 AM', 1),
(45, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-10 07:10:13', '10-10-2018 07:29:46 AM', 1),
(46, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-11 09:03:33', '11-10-2018 09:15:48 AM', 1),
(47, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-12 04:15:55', '12-10-2018 04:23:26 AM', 1),
(48, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-12 04:35:07', '12-10-2018 04:37:24 AM', 1),
(49, 0, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-14 05:33:01', '', 0),
(50, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-14 05:33:16', '14-10-2018 05:34:31 AM', 1),
(51, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-14 06:36:37', '14-10-2018 06:38:09 AM', 1),
(52, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-15 00:17:29', '15-10-2018 01:20:05 AM', 1),
(53, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-14 13:53:05', '14-10-2018 04:21:40 PM', 1),
(54, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-21 01:06:45', '21-10-2018 01:16:34 AM', 1),
(55, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-25 08:34:50', '25-10-2018 08:36:11 AM', 1),
(56, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-27 03:29:55', '27-10-2018 04:50:53 AM', 1),
(57, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-28 01:27:35', '28-10-2018 06:01:09 AM', 1),
(58, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-28 06:24:57', '28-10-2018 06:27:51 AM', 1),
(59, 0, 'ss', 0x3132372e302e302e3100000000000000, '2018-10-29 15:16:40', '', 0),
(60, 0, 'ss', 0x3132372e302e302e3100000000000000, '2018-10-29 15:17:24', '', 0),
(61, 0, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-29 15:17:39', '', 0),
(62, 7, 'jlukondo5@gmail.com', 0x3132372e302e302e3100000000000000, '2018-10-29 15:17:49', '29-10-2018 03:25:25 PM', 1),
(63, 7, '', 0x3132372e302e302e3100000000000000, '2018-10-29 15:58:14', '', 1),
(64, 7, '', 0x3132372e302e302e3100000000000000, '2018-10-29 16:05:12', '', 1),
(65, 7, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-10-29 16:06:16', '29-10-2018 04:12:04 PM', 1),
(66, 0, '', 0x3132372e302e302e3100000000000000, '2018-10-29 16:12:14', '', 0),
(67, 0, '', 0x3132372e302e302e3100000000000000, '2018-10-29 16:12:25', '', 0),
(68, 0, '', 0x3132372e302e302e3100000000000000, '2018-10-29 16:13:02', '', 0),
(69, 7, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-10-29 16:13:55', '29-10-2018 04:13:59 PM', 1),
(70, 7, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-10-29 16:14:09', '29-10-2018 04:27:50 PM', 1),
(71, 7, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-10-29 16:53:40', '30-10-2018 08:13:34 AM', 1),
(72, 7, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-10-30 08:13:43', '30-10-2018 08:15:13 AM', 1),
(73, 0, '', 0x3132372e302e302e3100000000000000, '2018-10-30 08:15:41', '', 0),
(74, 7, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-10-30 08:15:58', '30-10-2018 08:39:06 AM', 1),
(75, 0, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-10-30 08:42:46', '30-10-2018 08:49:05 AM', 1),
(76, 7, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-10-30 08:49:15', '30-10-2018 08:49:47 AM', 1),
(77, 0, '', 0x3132372e302e302e3100000000000000, '2018-10-31 05:01:13', '', 0),
(78, 7, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-10-31 05:01:25', '31-10-2018 05:14:26 AM', 1),
(79, 0, '', 0x3132372e302e302e3100000000000000, '2018-10-31 08:44:02', '', 0),
(80, 0, 'upa/dac/17/95880', 0x3132372e302e302e3100000000000000, '2018-10-31 08:44:51', '31-10-2018 09:03:07 AM', 1),
(81, 0, '', 0x3132372e302e302e3100000000000000, '2018-10-31 09:03:18', '', 0),
(82, 0, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-10-31 09:03:52', '31-10-2018 09:04:03 AM', 1),
(83, 0, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-10-31 09:04:15', '31-10-2018 09:08:09 AM', 1),
(84, 8, 'upa/dac/17/95880', 0x3132372e302e302e3100000000000000, '2018-10-31 09:10:42', '31-10-2018 09:11:01 AM', 1),
(85, 7, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-10-31 09:11:11', '31-10-2018 09:13:17 AM', 1),
(86, 8, 'upa/dac/17/95880', 0x3132372e302e302e3100000000000000, '2018-10-31 09:15:26', '31-10-2018 09:16:23 AM', 1),
(87, 7, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-11-01 07:28:02', '01-11-2018 07:28:58 AM', 1),
(88, 7, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-11-02 04:48:33', '02-11-2018 05:55:25 AM', 1),
(89, 7, 'upa/dcs/17/92885', 0x3a3a3100000000000000000000000000, '2018-11-06 03:59:33', '', 1),
(90, 7, 'upa/dcs/17/92885', 0x3a3a3100000000000000000000000000, '2018-11-10 05:49:30', '10-11-2018 05:49:49 AM', 1),
(91, 7, '', 0x3a3a3100000000000000000000000000, '2018-11-24 01:51:37', '', 1),
(92, 7, '', 0x3a3a3100000000000000000000000000, '2018-11-24 01:52:40', '', 1),
(93, 0, '', 0x3a3a3100000000000000000000000000, '2018-11-24 01:54:37', '', 0),
(94, 7, '', 0x3a3a3100000000000000000000000000, '2018-11-24 01:54:46', '', 1),
(95, 0, '', 0x3a3a3100000000000000000000000000, '2018-11-24 01:54:59', '', 0),
(96, 0, '', 0x3a3a3100000000000000000000000000, '2018-11-24 01:55:07', '', 0),
(97, 0, '', 0x3a3a3100000000000000000000000000, '2018-11-24 01:57:43', '', 0),
(98, 0, '', 0x3a3a3100000000000000000000000000, '2018-11-24 01:57:50', '', 0),
(99, 7, '', 0x3a3a3100000000000000000000000000, '2018-11-24 01:57:59', '', 1),
(100, 7, '', 0x3a3a3100000000000000000000000000, '2018-12-02 23:55:17', '', 1),
(101, 7, 'UPA/DCS/17/92885', 0x3a3a3100000000000000000000000000, '2018-12-03 00:00:16', '03-12-2018 12:04:15 AM', 1),
(102, 3, '', 0x3a3a3100000000000000000000000000, '2018-12-03 00:25:06', '', 1),
(103, 3, '', 0x3a3a3100000000000000000000000000, '2018-12-03 00:31:30', '', 1),
(104, 0, 'staff', 0x3a3a3100000000000000000000000000, '2018-12-03 00:36:14', '', 0),
(105, 0, 'staff', 0x3a3a3100000000000000000000000000, '2018-12-03 00:37:36', '', 0),
(106, 0, 'staff', 0x3a3a3100000000000000000000000000, '2018-12-03 00:39:35', '', 0),
(107, 0, 'staff', 0x3a3a3100000000000000000000000000, '2018-12-03 00:39:56', '', 0),
(108, 3, 'staff', 0x3a3a3100000000000000000000000000, '2018-12-03 00:40:05', '', 1),
(109, 3, '', 0x3a3a3100000000000000000000000000, '2018-12-03 00:40:22', '', 1),
(110, 3, '', 0x3a3a3100000000000000000000000000, '2018-12-03 00:44:39', '', 1),
(111, 7, 'UPA/DCS/17/92885', 0x3a3a3100000000000000000000000000, '2018-12-03 02:01:39', '03-12-2018 02:02:20 AM', 1),
(112, 4, '', 0x3a3a3100000000000000000000000000, '2018-12-03 03:35:20', '', 1),
(113, 4, '', 0x3a3a3100000000000000000000000000, '2018-12-03 04:37:31', '', 1),
(114, 4, '', 0x3a3a3100000000000000000000000000, '2018-12-03 04:39:26', '', 1),
(115, 4, '', 0x3a3a3100000000000000000000000000, '2018-12-03 05:16:06', '', 1),
(116, 3, '', 0x3a3a3100000000000000000000000000, '2018-12-03 05:24:46', '', 1),
(117, 7, 'UPA/DCS/17/92885', 0x3a3a3100000000000000000000000000, '2018-12-03 05:43:33', '03-12-2018 05:52:33', 1),
(118, 0, '', 0x3a3a3100000000000000000000000000, '2018-12-03 05:52:44', '', 0),
(119, 0, '', 0x3a3a3100000000000000000000000000, '2018-12-03 05:52:52', '', 0),
(120, 0, '', 0x3a3a3100000000000000000000000000, '2018-12-03 05:52:59', '', 0),
(121, 7, 'UPA/DCS/17/92885', 0x3a3a3100000000000000000000000000, '2018-12-03 05:57:09', '03-12-2018 05:57:56', 1),
(122, 0, '', 0x3a3a3100000000000000000000000000, '2018-12-03 05:58:06', '', 0),
(123, 0, '', 0x3a3a3100000000000000000000000000, '2018-12-03 05:59:54', '', 0),
(124, 7, 'UPA/DCS/17/92885', 0x3a3a3100000000000000000000000000, '2018-12-03 06:00:02', '03-12-2018 06:00:22', 1),
(125, 7, 'UPA/DCS/17/92885', 0x3a3a3100000000000000000000000000, '2018-12-03 06:00:32', '03-12-2018 06:52:06', 1),
(126, 3, '', 0x3a3a3100000000000000000000000000, '2018-12-03 06:33:56', '', 1),
(127, 4, '', 0x3a3a3100000000000000000000000000, '2018-12-03 06:41:14', '', 1),
(128, 4, '', 0x3a3a3100000000000000000000000000, '2018-12-03 06:41:56', '', 1),
(129, 4, 'Dr. Massa Dossa', 0x3a3a3100000000000000000000000000, '2018-12-03 06:52:41', '', 1),
(130, 7, 'UPA/DCS/17/92885', 0x3a3a3100000000000000000000000000, '2018-12-03 06:58:58', '03-12-2018 06:59:02', 1),
(131, 7, 'UPA/DCS/17/92885', 0x3a3a3100000000000000000000000000, '2018-12-03 06:59:37', '03-12-2018 06:59:42', 1),
(132, 7, 'UPA/DCS/17/92885', 0x3a3a3100000000000000000000000000, '2018-12-03 07:01:53', '03-12-2018 07:01:56', 1),
(133, 4, 'Dr. Massa Dossa', 0x3a3a3100000000000000000000000000, '2018-12-03 07:06:56', '', 1),
(134, 3, 'staff', 0x3a3a3100000000000000000000000000, '2018-12-03 07:07:22', '', 1),
(135, 7, 'UPA/DCS/17/92885', 0x3a3a3100000000000000000000000000, '2018-12-03 07:08:42', '03-12-2018 07:08:45', 1),
(136, 3, 'staff', 0x3a3a3100000000000000000000000000, '2018-12-03 07:10:39', '', 1),
(137, 3, 'staff', 0x3a3a3100000000000000000000000000, '2018-12-03 07:10:55', '', 1),
(138, 3, 'staff', 0x3a3a3100000000000000000000000000, '2018-12-03 07:11:37', '', 1),
(139, 3, 'staff', 0x3a3a3100000000000000000000000000, '2018-12-03 07:11:54', '', 1),
(140, 3, 'staff', 0x3a3a3100000000000000000000000000, '2018-12-03 07:12:28', '', 1),
(141, 3, 'staff', 0x3a3a3100000000000000000000000000, '2018-12-03 07:13:11', '03-12-2018 07:13:15', 1),
(142, 7, 'UPA/DCS/17/92885', 0x3a3a3100000000000000000000000000, '2018-12-04 01:08:20', '04-12-2018 01:17:52', 1),
(143, 7, 'UPA/DCS/17/92885', 0x3a3a3100000000000000000000000000, '2018-12-04 07:40:12', '04-12-2018 07:40:36', 1),
(144, 3, 'staff', 0x3a3a3100000000000000000000000000, '2018-12-04 07:41:02', '04-12-2018 07:41:44', 1),
(145, 7, 'upa/dcs/17/92885', 0x3a3a3100000000000000000000000000, '2019-03-06 03:27:38', '', 1),
(146, 7, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2020-02-07 21:58:09', '07-02-2020 10:01:06', 1),
(147, 7, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2020-02-07 22:09:07', '07-02-2020 10:26:01', 1),
(148, 3, 'staff', 0x3132372e302e302e3100000000000000, '2020-02-07 22:26:18', '07-02-2020 10:32:12', 1),
(149, 7, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2020-02-07 22:55:04', '07-02-2020 10:55:31', 1),
(150, 3, 'staff', 0x3132372e302e302e3100000000000000, '2020-02-07 22:58:25', '07-02-2020 10:59:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
