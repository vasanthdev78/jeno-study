-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 02:01 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `role` enum('Admin','Staff') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`user_id`, `name`, `username`, `pass`, `role`, `created_date`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'Admin', '2024-07-08 12:40:13', 'Active'),
(2, 'staff', 'staff', 'staff', 'Staff', '2024-07-08 12:43:52', 'Active');

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

-- --------------------------------------------------------

--
-- Table structure for table `entity_tbl`
--

CREATE TABLE `entity_tbl` (
  `entity_id` int(11) NOT NULL,
  `entity_name` varchar(50) NOT NULL
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
(10, 5465, 'MS University', '[\"b.sc computer \"]', '[\"6565465\"]', 1, '2024-07-16 15:18:37', 1, '2024-07-16 09:48:37', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `stu_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `entity_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_month` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `stu_gender` enum('Male','Female','Other') NOT NULL,
  `stu_aadhar` varchar(50) NOT NULL,
  `stu_marksheet` varchar(50) NOT NULL,
  `stu_qrcode` varchar(50) NOT NULL,
  `stu_blood_group` varchar(10) NOT NULL,
  `stu_cast` varchar(20) NOT NULL,
  `stu_religion` varchar(20) NOT NULL,
  `stu_mother_tongue` varchar(50) NOT NULL,
  `stu_native` varchar(50) NOT NULL,
  `stu_image` varchar(50) NOT NULL,
  `registration_date` date NOT NULL,
  `stu_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `stu_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `stu_updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_user_name` (`username`);

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
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`stu_id`);

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
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entity_tbl`
--
ALTER TABLE `entity_tbl`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jeno_staff`
--
ALTER TABLE `jeno_staff`
  MODIFY `stf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jeno_university`
--
ALTER TABLE `jeno_university`
  MODIFY `uni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `syllabus_tbl`
--
ALTER TABLE `syllabus_tbl`
  MODIFY `syllabus_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
