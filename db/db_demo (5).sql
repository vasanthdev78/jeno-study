-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 06:31 AM
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
-- Table structure for table `jeno_book`
--

CREATE TABLE `jeno_book` (
  `book_id` int(11) NOT NULL,
  `book_stu_id` int(11) NOT NULL,
  `book_issued` longtext NOT NULL,
  `book_id_card` longtext NOT NULL,
  `book_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `book_created_by` int(11) NOT NULL,
  `book_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `book_updated_by` int(11) NOT NULL,
  `book_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_book`
--

INSERT INTO `jeno_book` (`book_id`, `book_stu_id`, `book_issued`, `book_id_card`, `book_created_at`, `book_created_by`, `book_updated_at`, `book_updated_by`, `book_status`) VALUES
(1, 1, '0', '0', '2024-07-19 16:52:04', 2, '2024-07-19 11:22:04', 0, 'Active'),
(2, 2, '0', '0', '2024-07-19 17:05:26', 2, '2024-07-19 11:35:26', 0, 'Active'),
(3, 3, '0', '0', '2024-07-19 17:19:13', 2, '2024-07-20 12:03:51', 0, 'Inactive'),
(4, 4, '0', '0', '2024-07-19 17:20:50', 2, '2024-07-19 11:50:50', 0, 'Active'),
(5, 5, '0', '0', '2024-07-19 17:21:46', 2, '2024-07-19 11:51:46', 0, 'Active'),
(6, 14, '0', '0', '2024-07-22 18:47:38', 2, '2024-07-22 13:18:22', 0, 'Inactive'),
(7, 15, '0', '0', '2024-07-23 09:54:29', 2, '2024-07-23 04:24:29', 0, 'Active'),
(8, 16, '0', '0', '2024-07-23 09:56:00', 2, '2024-07-23 04:26:00', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `jeno_document`
--

CREATE TABLE `jeno_document` (
  `doc_id` int(11) NOT NULL,
  `doc_stu_id` int(11) NOT NULL,
  `doc_sslc` varchar(100) NOT NULL,
  `doc_hsc` varchar(100) NOT NULL,
  `doc_community` varchar(100) NOT NULL,
  `doc_tc` varchar(100) NOT NULL,
  `doc_aadhar` varchar(100) NOT NULL,
  `doc_photo` varchar(100) NOT NULL,
  `doc_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `doc_created_by` int(11) NOT NULL,
  `doc_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `doc_updated_by` int(11) NOT NULL,
  `doc_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_document`
--

INSERT INTO `jeno_document` (`doc_id`, `doc_stu_id`, `doc_sslc`, `doc_hsc`, `doc_community`, `doc_tc`, `doc_aadhar`, `doc_photo`, `doc_created_at`, `doc_created_by`, `doc_updated_at`, `doc_updated_by`, `doc_status`) VALUES
(1, 1, 'u3.png', 'uni4.png', 'fef.png', 'u2.png', 'madaras.png', 'duj.png', '2024-07-19 16:52:04', 2, '2024-07-22 10:37:17', 2, 'Active'),
(2, 2, '', '', '', '', '', 'course-20.jpg', '2024-07-19 17:05:26', 2, '2024-07-22 10:18:28', 2, 'Active'),
(3, 3, '', '', '', '', '', '', '2024-07-19 17:19:13', 2, '2024-07-20 12:03:51', 2, 'Inactive'),
(4, 4, '', '', '', '', '', 'a1.jpg', '2024-07-19 17:20:50', 2, '2024-07-22 10:17:03', 2, 'Active'),
(5, 5, 'u2.png', 'mano.png', '', 'u3.png', 'uni4.png', '', '2024-07-19 17:21:46', 2, '2024-07-19 11:51:46', 0, 'Active'),
(6, 6, '', '', '', '', '', '', '2024-07-22 17:46:20', 2, '2024-07-22 13:18:34', 0, 'Inactive'),
(7, 7, '', '', '', '', '', '', '2024-07-22 18:40:41', 2, '2024-07-22 13:18:32', 0, 'Inactive'),
(8, 8, '', '', '', '', '', '', '2024-07-22 18:40:44', 2, '2024-07-22 13:18:29', 0, 'Inactive'),
(9, 9, '', '', '', '', '', '', '2024-07-22 18:43:11', 2, '2024-07-22 13:18:27', 0, 'Inactive'),
(10, 10, '', '', '', '', '', '', '2024-07-22 18:44:35', 2, '2024-07-22 13:18:19', 0, 'Inactive'),
(11, 11, '', '', '', '', '', '', '2024-07-22 18:45:17', 2, '2024-07-22 13:18:15', 0, 'Inactive'),
(12, 12, '', '', '', '', '', '', '2024-07-22 18:45:45', 2, '2024-07-22 13:18:17', 0, 'Inactive'),
(13, 13, '', '', '', '', '', '', '2024-07-22 18:46:02', 2, '2024-07-22 13:18:25', 0, 'Inactive'),
(14, 14, '', '', '', '', '', '', '2024-07-22 18:47:38', 2, '2024-07-22 13:18:22', 0, 'Inactive'),
(15, 15, '', '', '', '', '', '', '2024-07-23 09:54:29', 2, '2024-07-23 04:24:29', 0, 'Active'),
(16, 16, '', '', '', '', '', '', '2024-07-23 09:56:00', 2, '2024-07-23 04:26:00', 0, 'Active');

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
  `stf_userId` int(11) NOT NULL,
  `stf_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `stf_created_by` int(11) NOT NULL,
  `stf_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stf_updated_by` int(11) NOT NULL,
  `stf_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_staff`
--

INSERT INTO `jeno_staff` (`stf_id`, `stf_name`, `stf_birth`, `stf_mobile`, `stf_email`, `stf_address`, `stf_gender`, `stf_role`, `stf_salary`, `stf_joining_date`, `stf_image`, `stf_userId`, `stf_created_at`, `stf_created_by`, `stf_updated_at`, `stf_updated_by`, `stf_status`) VALUES
(1, 'Rajkumar', '2024-07-02', '9789867842', 'riyainfosystemswork@gmail.com', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', 'Male', 'HOD', 50000, '2024-07-08', '20240717_123653.png', 3, '2024-07-17 16:06:53', 1, '2024-07-17 10:36:53', 0, 'Active'),
(2, 'Vasanth', '2024-07-01', '9789867842', 'riyainfosystemswork@gmail.com', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', 'Male', 'HOD', 40000, '2024-07-02', '20240717_124147.png', 4, '2024-07-17 16:11:47', 1, '2024-07-17 10:41:47', 1, 'Active'),
(3, 'Riya Infosystems', '2024-07-15', '9789867842', 'riyainfosystemswork@gmail.com', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', 'Male', '', 0, '2024-07-10', '20240717_125840.png', 5, '2024-07-17 16:28:40', 1, '2024-07-17 10:58:40', 1, 'Active'),
(4, 'petchi', '2024-07-02', '9789867842', 'riyainfosystemswork@gmail.com', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', 'Male', '', 0, '2024-07-10', '20240717_130252.png', 6, '2024-07-17 16:32:52', 1, '2024-07-17 11:02:52', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `jeno_student`
--

CREATE TABLE `jeno_student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(50) NOT NULL,
  `stu_phone` varchar(20) NOT NULL,
  `stu_email` varchar(60) NOT NULL,
  `stu_uni_id` int(11) NOT NULL,
  `stu_cou_id` int(11) NOT NULL,
  `stu_medium_id` int(11) NOT NULL,
  `stu_apply_no` varchar(20) NOT NULL,
  `stu_enroll` varchar(30) NOT NULL,
  `stu_study_year` varchar(20) NOT NULL,
  `stu_aca_year` varchar(20) NOT NULL,
  `stu_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `stu_created_by` int(11) NOT NULL,
  `stu_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stu_updated_by` int(11) NOT NULL,
  `stu_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_student`
--

INSERT INTO `jeno_student` (`stu_id`, `stu_name`, `stu_phone`, `stu_email`, `stu_uni_id`, `stu_cou_id`, `stu_medium_id`, `stu_apply_no`, `stu_enroll`, `stu_study_year`, `stu_aca_year`, `stu_created_at`, `stu_created_by`, `stu_updated_at`, `stu_updated_by`, `stu_status`) VALUES
(1, 'Rajkumar', '6669867842', 'rajatemswork@gmail.com', 4, 1, 2, '24AC001', '456789321456', '1 st year', 'Jan-2024', '2024-07-19 16:52:04', 2, '2024-07-22 11:50:45', 2, 'Active'),
(2, 'Vasanth', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24AC002', '', '1 st year', 'Jan-2024', '2024-07-19 17:05:26', 2, '2024-07-22 11:50:52', 2, 'Active'),
(3, 'Anushiya', '9789867842', 'riyainfosystemswork@gmail.com', 4, 3, 1, '24AC003', '', '1 st year', 'July-2024', '2024-07-19 17:19:13', 2, '2024-07-22 11:50:56', 2, 'Inactive'),
(4, 'Anushiya', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA001', '', '1 st year', 'July-2024', '2024-07-19 17:20:50', 2, '2024-07-22 11:51:16', 2, 'Active'),
(5, 'Anushiya', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 2, '24CA002', '', '1 st year', 'June-2024', '2024-07-19 17:21:46', 2, '2024-07-22 11:51:27', 2, 'Active'),
(6, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 5, 4, 2, '24AC004', '', '1 st year', 'June-2024', '2024-07-22 17:46:20', 2, '2024-07-22 13:18:34', 0, 'Inactive'),
(7, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA0011', '', '1 st year', 'July-2024', '2024-07-22 18:40:41', 2, '2024-07-22 13:18:32', 0, 'Inactive'),
(8, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA0010', '', '1 st year', 'July-2024', '2024-07-22 18:40:44', 2, '2024-07-22 13:18:29', 0, 'Inactive'),
(9, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 4, 1, 2, '24CA003', '', '1 st year', 'July-2024', '2024-07-22 18:43:11', 2, '2024-07-22 13:18:27', 0, 'Inactive'),
(10, 'fhdgh', '0789867842', 'riyainfosystemswork@gmail.com', 4, 3, 2, '24CA009', '', '1 st year', 'July-2024', '2024-07-22 18:44:35', 2, '2024-07-22 13:18:19', 0, 'Inactive'),
(11, 'fu', '0978967842', 'riyainfosystemswork@gmail.com', 4, 1, 1, '24AC0015', '', '1 st year', 'July-2024', '2024-07-22 18:45:17', 2, '2024-07-22 13:18:15', 0, 'Inactive'),
(12, 'xjdfj', '8956778978', 'riyainfosystemswork@gmail.com', 4, 1, 1, '24CA0019', '', '1 st year', 'July-2024', '2024-07-22 18:45:45', 2, '2024-07-22 13:18:17', 0, 'Inactive'),
(13, 'xjdfj', '8956778978', 'riyainfosystemswork@gmail.com', 4, 1, 1, '24CA0019', '', '1 st year', 'July-2024', '2024-07-22 18:46:02', 2, '2024-07-22 13:18:25', 0, 'Inactive'),
(14, 'Riya Infosystems', '0978986784', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA00155', '', '1 st year', 'July-2024', '2024-07-22 18:47:38', 2, '2024-07-22 13:18:22', 0, 'Inactive'),
(15, 'Rajkumar', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA0018', '', '1 st year', 'July-2024', '2024-07-23 09:54:29', 2, '2024-07-23 04:24:29', 0, 'Active'),
(16, 'vasanth', '9876543210', 'riyainfosystemswork@gmail.com', 4, 3, 1, '24AC0013', '', '1 st year', 'July-2024', '2024-07-23 09:56:00', 2, '2024-07-23 04:26:00', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `jeno_stu_additional`
--

CREATE TABLE `jeno_stu_additional` (
  `add_id` int(11) NOT NULL,
  `add_stu_id` int(11) NOT NULL,
  `add_year_type` enum('Academic Year','Calander Year') NOT NULL,
  `add_language` int(11) NOT NULL,
  `add_digilocker` varchar(200) NOT NULL,
  `add_admit_date` date NOT NULL,
  `add_dob` date NOT NULL,
  `add_gender` enum('Male','Female','Transgender') NOT NULL,
  `add_address` longtext NOT NULL,
  `add_pincode` int(11) NOT NULL,
  `add_father_name` varchar(30) NOT NULL,
  `add_mother_name` varchar(30) NOT NULL,
  `add_aadhar_no` int(11) NOT NULL,
  `add_nationality` varchar(30) NOT NULL,
  `add_mother_tongue` varchar(30) NOT NULL,
  `add_religion` varchar(30) NOT NULL,
  `add_caste` varchar(30) NOT NULL,
  `add_community` varchar(30) NOT NULL,
  `add_marital_status` enum('Single','Married') NOT NULL,
  `add_employed` enum('Employed','Unemployed') NOT NULL,
  `add_qualifiaction` enum('Diploma','12','UG','PG') NOT NULL,
  `add_institute` varchar(255) NOT NULL,
  `add_comp_year` varchar(20) NOT NULL,
  `add_study_field` varchar(30) NOT NULL,
  `add_grade` varchar(20) NOT NULL,
  `add_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `add_created_by` int(11) NOT NULL,
  `add_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `add_updated_by` int(11) NOT NULL,
  `add_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_stu_additional`
--

INSERT INTO `jeno_stu_additional` (`add_id`, `add_stu_id`, `add_year_type`, `add_language`, `add_digilocker`, `add_admit_date`, `add_dob`, `add_gender`, `add_address`, `add_pincode`, `add_father_name`, `add_mother_name`, `add_aadhar_no`, `add_nationality`, `add_mother_tongue`, `add_religion`, `add_caste`, `add_community`, `add_marital_status`, `add_employed`, `add_qualifiaction`, `add_institute`, `add_comp_year`, `add_study_field`, `add_grade`, `add_created_at`, `add_created_by`, `add_updated_at`, `add_updated_by`, `add_status`) VALUES
(1, 1, 'Calander Year', 2, 'sdsjh21423djd', '2024-07-10', '2024-07-01', 'Male', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', 627108, 'Muthu', 'dghk', 2147483647, 'sdfbs', 'adfg', 'sdvbs', 'sdfh', 'dfhsgdh', 'Married', 'Unemployed', 'UG', 'adfhadhdgh', '2023-2024', 'fhlfhl', '454548', '2024-07-19 16:52:04', 2, '2024-07-22 10:47:28', 2, 'Active'),
(2, 2, 'Academic Year', 7, 'sdsjh21423djd', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-19 17:05:26', 2, '2024-07-20 11:38:09', 2, 'Active'),
(3, 3, 'Academic Year', 3, 'sdsjh21423djd', '2024-07-17', '2024-07-07', 'Male', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', 627108, 'hkr', 'dghk', 2147483647, 'sdfbs', 'adfg', 'sdvbs', 'sdfh', 'dfhsgdh', 'Single', 'Employed', '12', 'adfhadhdgh', '2023-2024', 'fhlfhl', '454548', '2024-07-19 17:19:13', 2, '2024-07-20 12:03:51', 2, 'Inactive'),
(4, 4, 'Academic Year', 4, 'sdsjh21423djd', '2024-07-17', '2024-07-07', 'Male', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', 627108, 'hkr', 'dghk', 2147483647, 'sdfbs', 'adfg', 'sdvbs', 'sdfh', 'dfhsgdh', 'Single', 'Employed', '12', 'adfhadhdgh', '2023-2024', 'fhlfhl', '454548', '2024-07-19 17:20:50', 2, '2024-07-22 10:17:03', 2, 'Active'),
(5, 5, 'Academic Year', 4, 'sdsjh21423djd', '2024-07-17', '2024-07-07', 'Male', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', 627108, 'ghkdjghk', 'fyuorhj', 2147483647, 'sdfbs', 'adfg', 'sdvbs', 'sdfh', 'dfhsgdh', 'Single', 'Employed', '12', 'adfhadhdgh', '2023-2024', 'fhlfhl', '454548', '2024-07-19 17:21:46', 2, '2024-07-22 10:35:33', 2, 'Active'),
(6, 6, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 17:46:20', 2, '2024-07-22 13:18:34', 0, 'Inactive'),
(7, 7, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:40:41', 2, '2024-07-22 13:18:32', 0, 'Inactive'),
(8, 8, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:40:44', 2, '2024-07-22 13:18:29', 0, 'Inactive'),
(9, 9, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:43:11', 2, '2024-07-22 13:18:27', 0, 'Inactive'),
(10, 10, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:44:35', 2, '2024-07-22 13:18:19', 0, 'Inactive'),
(11, 11, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:45:17', 2, '2024-07-22 13:18:15', 0, 'Inactive'),
(12, 12, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:45:45', 2, '2024-07-22 13:18:17', 0, 'Inactive'),
(13, 13, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:46:02', 2, '2024-07-22 13:18:25', 0, 'Inactive'),
(14, 14, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:47:38', 2, '2024-07-22 13:18:22', 0, 'Inactive'),
(15, 15, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-23 09:54:29', 2, '2024-07-23 04:24:29', 0, 'Active'),
(16, 16, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-23 09:56:00', 2, '2024-07-23 04:26:00', 0, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jeno_book`
--
ALTER TABLE `jeno_book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `jeno_document`
--
ALTER TABLE `jeno_document`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `jeno_staff`
--
ALTER TABLE `jeno_staff`
  ADD PRIMARY KEY (`stf_id`);

--
-- Indexes for table `jeno_student`
--
ALTER TABLE `jeno_student`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `jeno_stu_additional`
--
ALTER TABLE `jeno_stu_additional`
  ADD PRIMARY KEY (`add_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jeno_book`
--
ALTER TABLE `jeno_book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jeno_document`
--
ALTER TABLE `jeno_document`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jeno_staff`
--
ALTER TABLE `jeno_staff`
  MODIFY `stf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jeno_student`
--
ALTER TABLE `jeno_student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jeno_stu_additional`
--
ALTER TABLE `jeno_stu_additional`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
