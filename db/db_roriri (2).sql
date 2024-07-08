-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 06:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_roriri`
--

-- --------------------------------------------------------

--
-- Table structure for table `academy_detail_tbl`
--

CREATE TABLE `academy_detail_tbl` (
  `academy_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `academy_year` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `academy_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `academy_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `additional_details_tbl`
--

CREATE TABLE `additional_details_tbl` (
  `ad_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `additional_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `aditional_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `additional_details_tbl`
--

INSERT INTO `additional_details_tbl` (`ad_id`, `entity_id`, `stu_id`, `dob`, `email`, `phone`, `address`, `aadhar`, `additional_created_date`, `aditional_status`) VALUES
(1, 0, 1, '2001-01-17', 'yesubalans@roririsoft.com', '9344995037', 'Kalakad', '463689346511', '2024-06-10 12:13:30', 'Inactive'),
(2, 0, 2, '2002-01-24', 'jebastin@gmail.com', '9874563214', 'Kela Kalladi', '989745632146', '2024-06-15 14:18:09', 'Active'),
(3, 0, 3, '1995-02-14', 'jebarlin@gmail.com', '9789867842', 'kalakad', '5342465657567', '2024-06-18 12:40:58', 'Inactive'),
(4, 0, 4, '1997-07-06', 'jebarathi@gmail.com', '9789867842', 'kalakad', '275861786592', '2024-06-18 12:44:43', 'Inactive'),
(5, 0, 5, '2001-07-18', 'nicks@gmail.com', '9789867842', 'kalakad', '125478548665', '2024-06-18 12:55:11', 'Inactive'),
(6, 0, 6, '2003-03-20', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-18 13:01:58', 'Inactive'),
(7, 0, 7, '2002-07-01', 'dghkgh@gmail.com', '9789867842', 'kalakad', '457812458956', '2024-06-18 13:02:37', 'Inactive'),
(8, 0, 8, '2001-07-10', 'nicks@gmail.com', '9789867842', 'kalakad', '125478548665', '2024-06-18 14:57:20', 'Active'),
(9, 0, 9, '2004-03-18', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-18 15:09:02', 'Inactive'),
(10, 0, 10, '2024-06-18', 'dania@roriri.com', '67876856676575', 'Kalakad', '576876978945', '2024-06-18 15:09:44', 'Inactive'),
(11, 0, 11, '2003-03-20', 'roriri@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-18 16:08:41', 'Inactive'),
(12, 0, 12, '2024-06-01', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-20 14:20:17', 'Active'),
(13, 0, 13, '2024-06-11', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-26 10:41:42', 'Active'),
(14, 0, 14, '2024-06-11', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-26 10:41:44', 'Inactive'),
(15, 0, 15, '2024-06-11', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-26 10:41:44', 'Inactive'),
(16, 0, 16, '2024-06-11', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-26 10:41:46', 'Inactive'),
(17, 0, 17, '2024-06-11', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-26 10:41:48', 'Inactive'),
(18, 0, 18, '2024-06-01', 'roriri@roriri.com', '6787685667435', 'Kalakad', '57687697894545', '2024-06-26 10:50:49', 'Active'),
(19, 0, 19, '2024-06-04', 'uma@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-26 11:02:09', 'Active'),
(20, 0, 20, '2024-06-07', 'durga@gmail.com', '5246434558', 'kalakad', '545424548517', '2024-06-28 14:32:38', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `course_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_fees_3` int(11) NOT NULL,
  `course_fees_6` int(11) NOT NULL,
  `course_fees_12` int(11) NOT NULL,
  `course_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `course_created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`course_id`, `entity_id`, `course_name`, `course_fees_3`, `course_fees_6`, `course_fees_12`, `course_status`, `course_created_date`) VALUES
(1, 1, 'Internship', 15000, 30000, 0, 'Active', '2024-06-06 13:27:48'),
(2, 3, 'Full Stack Development', 20000, 45000, 90000, 'Active', '2024-06-06 13:28:15'),
(3, 3, 'Testing', 15000, 25000, 0, 'Active', '2024-06-06 13:28:56'),
(4, 3, 'Devops', 15000, 30000, 0, 'Active', '2024-06-06 13:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `entity_tbl`
--

CREATE TABLE `entity_tbl` (
  `entity_id` int(11) NOT NULL,
  `entity_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entity_tbl`
--

INSERT INTO `entity_tbl` (`entity_id`, `entity_name`) VALUES
(1, 'RORIRI SOFTWARE SOLUTIONS '),
(2, 'NEXGEN IT COLLEGE'),
(3, 'NEXGEN IT ACADEMY'),
(4, 'RORIRI FOUNDATION'),
(5, 'RORIRI GROUPS'),
(6, 'RIYA IAS ACADEMY'),
(7, 'ROSHAN TILES'),
(8, 'RITHISH FARMS'),
(9, 'RIYA INFO SYSTEM');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_tbl`
--

CREATE TABLE `syllabus_tbl` (
  `syllabus_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `syllabus_name` varchar(50) NOT NULL,
  `syllabus_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `syllabus_updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `syllabus_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `syllabus_tbl`
--

INSERT INTO `syllabus_tbl` (`syllabus_id`, `entity_id`, `course_id`, `syllabus_name`, `syllabus_created_date`, `syllabus_updated_date`, `syllabus_status`) VALUES
(1, 3, 2, 'HTML', '2024-06-17 11:45:56', '2024-06-17 06:15:56', 'Active'),
(2, 3, 2, 'CSS', '2024-06-17 11:46:06', '2024-06-17 06:16:06', 'Active'),
(3, 3, 3, 'JavaScript', '2024-06-17 11:46:30', '2024-06-28 06:47:31', 'Active'),
(4, 3, 2, 'demo', '2024-06-17 11:46:55', '2024-06-28 06:41:24', 'Inactive'),
(5, 3, 3, 'PHP', '2024-06-17 11:47:07', '2024-06-26 07:26:17', 'Active'),
(6, 3, 2, 'MySQL', '2024-06-17 11:47:21', '2024-06-17 06:17:21', 'Active'),
(8, 3, 3, 'JSON', '2024-06-28 11:04:35', '2024-06-28 06:54:10', 'Inactive'),
(9, 3, 3, 'HTML', '2024-06-28 12:23:52', '2024-06-28 06:54:05', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academy_detail_tbl`
--
ALTER TABLE `academy_detail_tbl`
  ADD PRIMARY KEY (`academy_id`);

--
-- Indexes for table `additional_details_tbl`
--
ALTER TABLE `additional_details_tbl`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `entity_tbl`
--
ALTER TABLE `entity_tbl`
  ADD PRIMARY KEY (`entity_id`);

--
-- Indexes for table `syllabus_tbl`
--
ALTER TABLE `syllabus_tbl`
  ADD PRIMARY KEY (`syllabus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academy_detail_tbl`
--
ALTER TABLE `academy_detail_tbl`
  MODIFY `academy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `additional_details_tbl`
--
ALTER TABLE `additional_details_tbl`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `entity_tbl`
--
ALTER TABLE `entity_tbl`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `syllabus_tbl`
--
ALTER TABLE `syllabus_tbl`
  MODIFY `syllabus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
