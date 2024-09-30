-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 12:28 PM
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
-- Database: `db_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `jeno_course`
--

CREATE TABLE `jeno_course` (
  `cou_id` int(11) NOT NULL,
  `cou_uni_id` int(11) NOT NULL,
  `cou_name` varchar(200) NOT NULL,
  `cou_medium` enum('Tamil','English','Both') NOT NULL,
  `cou_exam_type` enum('Year','Semester') NOT NULL,
  `cou_fees_type` enum('Year','Semester') NOT NULL,
  `cou_duration` int(11) NOT NULL,
  `cou_university_fess` varchar(200) NOT NULL,
  `cou_study_fees` varchar(200) NOT NULL,
  `cou_total_fees` varchar(200) NOT NULL,
  `cou_center_id` int(11) NOT NULL,
  `cou_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `cou_created_by` int(11) NOT NULL,
  `cou_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cou_updated_by` int(11) NOT NULL,
  `cou_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_course`
--

INSERT INTO `jeno_course` (`cou_id`, `cou_uni_id`, `cou_name`, `cou_medium`, `cou_exam_type`, `cou_fees_type`, `cou_duration`, `cou_university_fess`, `cou_study_fees`, `cou_total_fees`, `cou_center_id`, `cou_created_at`, `cou_created_by`, `cou_updated_at`, `cou_updated_by`, `cou_status`) VALUES
(1, 4, 'BBA', 'English', 'Semester', 'Year', 3, '[\"4000\",\"51515\",\"5551\"]', '[\"5151\",\"5152\",\"5151\"]', '[\"9151\",\"56667\",\"10702\"]', 1, '2024-07-17 11:01:55', 1, '2024-07-17 05:31:55', 0, 'Active'),
(2, 1, 'msc', 'Tamil', 'Semester', 'Year', 2, '[\"87848\",\"545\"]', '[\"545\",\"546\"]', '[\"88393\",\"1091\"]', 1, '2024-07-17 11:04:39', 1, '2024-07-17 05:34:39', 0, 'Active'),
(3, 4, 'aaaa', 'English', 'Semester', 'Year', 2, '[\"8484\",\"5645\"]', '[\"55\",\"243\"]', '[\"8539\",\"5888\"]', 1, '2024-07-17 11:15:19', 1, '2024-07-17 05:45:19', 0, 'Active'),
(4, 5, 'BBA', 'Tamil', 'Year', 'Year', 1, '[\"4354\"]', '[\"5435\"]', '[\"9789\"]', 1, '2024-07-17 11:17:05', 1, '2024-07-17 05:47:05', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `jeno_enquiry`
--

CREATE TABLE `jeno_enquiry` (
  `enq_id` int(11) NOT NULL,
  `enq_uni_id` int(11) NOT NULL,
  `enq_cou_id` int(11) NOT NULL,
  `enq_number` varchar(50) NOT NULL,
  `enq_stu_name` varchar(50) NOT NULL,
  `enq_email` varchar(50) NOT NULL,
  `enq_dob` varchar(20) NOT NULL,
  `enq_gender` enum('Male','Female','Transegender') NOT NULL,
  `enq_mobile` varchar(20) NOT NULL,
  `enq_address` varchar(150) NOT NULL,
  `enq_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `enq_created_by` int(11) NOT NULL,
  `enq_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `enq_updated_by` int(11) NOT NULL,
  `enq_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jeno_staff`
--

CREATE TABLE `jeno_staff` (
  `stf_id` int(11) NOT NULL,
  `stf_name` varchar(50) NOT NULL,
  `stf_birth` date NOT NULL,
  `stf_mobile` varchar(20) NOT NULL,
  `stf_email` varchar(50) NOT NULL,
  `stf_address` varchar(250) NOT NULL,
  `stf_gender` enum('Male','Female','Transgender','') NOT NULL,
  `stf_role` varchar(50) NOT NULL,
  `stf_salary` int(11) NOT NULL,
  `stf_joining_date` date NOT NULL,
  `stf_image` varchar(100) NOT NULL,
  `stf_username` varchar(50) NOT NULL,
  `stf_password` varchar(50) NOT NULL,
  `stf_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `stf_created_by` int(11) NOT NULL,
  `stf_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `stf_updated_by` int(11) NOT NULL,
  `stf_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jeno_university`
--

CREATE TABLE `jeno_university` (
  `uni_id` int(11) NOT NULL,
  `uni_study_code` int(11) NOT NULL,
  `uni_name` varchar(100) NOT NULL,
  `uni_department` varchar(200) NOT NULL,
  `uni_contact` varchar(200) NOT NULL,
  `uni_center_id` int(11) NOT NULL,
  `uni_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `uni_created_by` int(11) NOT NULL,
  `uni_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `uni_updated_by` int(11) NOT NULL,
  `uni_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_university`
--

INSERT INTO `jeno_university` (`uni_id`, `uni_study_code`, `uni_name`, `uni_department`, `uni_contact`, `uni_center_id`, `uni_created_at`, `uni_created_by`, `uni_updated_at`, `uni_updated_by`, `uni_status`) VALUES
(1, 5465, 'MS University v', '[\"b.sc computer \",\"b.com\",\"m.sc \"]', '[\"8789484\",\"5164478\",\"488\"]', 1, '2024-07-16 14:02:18', 1, '2024-07-16 08:32:18', 1, 'Active'),
(4, 64654, 'vasanth university', '[\"aaa\",\"bbb\",\"ccc\"]', '[\"94984\",\"654654\",\"6565465\"]', 1, '2024-07-16 14:49:32', 1, '2024-07-16 09:19:32', 0, 'Active'),
(5, 5465, 'raj kumar university', '[\"b.sc computer \"]', '[\"6565465\"]', 1, '2024-07-16 14:53:33', 1, '2024-07-16 09:23:33', 0, 'Active'),
(6, 5465, 'MS University', '[\"afadf\"]', '[\"654654\"]', 1, '2024-07-16 14:55:26', 1, '2024-07-16 09:25:26', 0, 'Active'),
(7, 5465, 'vasanth university', '[\"b.sc computer \"]', '[\"6565465\"]', 1, '2024-07-16 14:56:51', 1, '2024-07-16 09:26:51', 0, 'Active'),
(8, 5465, 'vasanth university', '[\"b.sc computer \"]', '[\"6565465\"]', 1, '2024-07-16 14:57:06', 1, '2024-07-16 09:27:06', 0, 'Active'),
(9, 64654, 'vasanth university', '[\"b.sc computer \"]', '[\"6565465\"]', 1, '2024-07-16 15:16:23', 1, '2024-07-16 09:46:23', 0, 'Active'),
(10, 5465, 'MS University', '[\"b.sc computer \"]', '[\"6565465\"]', 1, '2024-07-16 15:18:37', 1, '2024-07-16 09:48:37', 1, 'Active'),
(11, 5465, 'vasanth university', '[\"b.sc computer \"]', '[\"6565465\"]', 1, '2024-07-16 18:04:42', 1, '2024-07-16 12:34:42', 0, 'Active'),
(12, 5465, 'MS University', '[\"b.sc computer \"]', '[\"6565465\"]', 1, '2024-07-16 18:06:20', 1, '2024-07-16 12:36:20', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `jeno_user`
--

CREATE TABLE `jeno_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_role` enum('Admin','Staff') NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_created_by` int(11) NOT NULL,
  `user_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated_by` int(11) NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_user`
--

INSERT INTO `jeno_user` (`user_id`, `user_name`, `user_username`, `user_password`, `user_role`, `user_created_at`, `user_created_by`, `user_updated_at`, `user_updated_by`, `user_status`) VALUES
(1, 'admin', ' 	admin', 'admin', 'Admin', '2024-07-08 12:40:13', 0, '2024-07-17 10:14:18', 0, 'Active'),
(2, 'staff', 'staff', 'staff', 'Staff', '2024-07-08 12:43:52', 0, '2024-07-17 10:14:18', 0, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jeno_course`
--
ALTER TABLE `jeno_course`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `jeno_enquiry`
--
ALTER TABLE `jeno_enquiry`
  ADD PRIMARY KEY (`enq_id`);

--
-- Indexes for table `jeno_staff`
--
ALTER TABLE `jeno_staff`
  ADD PRIMARY KEY (`stf_id`);

--
-- Indexes for table `jeno_university`
--
ALTER TABLE `jeno_university`
  ADD PRIMARY KEY (`uni_id`);

--
-- Indexes for table `jeno_user`
--
ALTER TABLE `jeno_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jeno_course`
--
ALTER TABLE `jeno_course`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jeno_enquiry`
--
ALTER TABLE `jeno_enquiry`
  MODIFY `enq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jeno_staff`
--
ALTER TABLE `jeno_staff`
  MODIFY `stf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jeno_university`
--
ALTER TABLE `jeno_university`
  MODIFY `uni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jeno_user`
--
ALTER TABLE `jeno_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
