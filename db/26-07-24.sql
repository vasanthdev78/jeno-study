-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 01:34 PM
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
-- Table structure for table `jeno_faculty`
--

CREATE TABLE `jeno_faculty` (
  `fac_id` int(11) NOT NULL,
  `fac_name` varchar(100) NOT NULL,
  `fac_gender` enum('Male','Female','Transgender') NOT NULL,
  `fac_mobile` varchar(20) NOT NULL,
  `fac_email` varchar(50) NOT NULL,
  `fac_address` varchar(250) NOT NULL,
  `fac_date_of_join` date NOT NULL,
  `fac_salary` varchar(50) NOT NULL,
  `fac_qualification` varchar(50) NOT NULL,
  `fac_clg` varchar(150) NOT NULL,
  `fac_aadhar` varchar(50) NOT NULL,
  `fac_cou_id` int(11) NOT NULL,
  `fac_center_id` int(11) NOT NULL,
  `fac_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `fac_created_by` int(11) NOT NULL,
  `fac_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fac_updated_by` int(11) NOT NULL,
  `fac_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_faculty`
--

INSERT INTO `jeno_faculty` (`fac_id`, `fac_name`, `fac_gender`, `fac_mobile`, `fac_email`, `fac_address`, `fac_date_of_join`, `fac_salary`, `fac_qualification`, `fac_clg`, `fac_aadhar`, `fac_cou_id`, `fac_center_id`, `fac_created_at`, `fac_created_by`, `fac_updated_at`, `fac_updated_by`, `fac_status`) VALUES
(1, 'Vasanth', 'Male', '9789867842', 'riyainfosystemswork@gmail.com', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', '2024-07-01', '6959859', 'fgjhefrgj', 'sfjwfgj', '20240725_111438.png', 2, 0, '2024-07-25 13:11:31', 2, '2024-07-25 09:21:01', 2, 'Active'),
(2, 'Raja', 'Male', '9789867845', 'riyainfosystemswork@gmail.com', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', '2024-07-09', '77777', 'gggg', 'yyyyyyyy', '20240725_113916.png', 4, 0, '2024-07-25 15:09:16', 2, '2024-07-25 09:39:35', 2, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `jeno_fees`
--

CREATE TABLE `jeno_fees` (
  `fee_id` int(11) NOT NULL,
  `fee_admision_id` varchar(20) NOT NULL,
  `fee_stu_id` int(11) NOT NULL,
  `fee_uni_fee_total` int(11) NOT NULL,
  `fee_uni_fee` int(10) NOT NULL,
  `fee_sdy_fee_total` int(11) NOT NULL,
  `fee_sty_fee` int(10) NOT NULL,
  `fee_stu_year` int(11) NOT NULL,
  `fee_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `fee_created_by` int(11) NOT NULL,
  `fee_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fee_updated_by` int(11) NOT NULL,
  `fee_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_fees`
--

INSERT INTO `jeno_fees` (`fee_id`, `fee_admision_id`, `fee_stu_id`, `fee_uni_fee_total`, `fee_uni_fee`, `fee_sdy_fee_total`, `fee_sty_fee`, `fee_stu_year`, `fee_created_at`, `fee_created_by`, `fee_updated_at`, `fee_updated_by`, `fee_status`) VALUES
(1, '2024a001', 1, 3900, 2400, 5051, 1898, 0, '2024-07-19 16:52:04', 2, '2024-07-26 09:07:32', 1, 'Inactive'),
(7, '', 17, 0, 0, 0, 0, 0, '2024-07-23 14:46:12', 2, '2024-07-26 09:07:39', 0, 'Inactive'),
(8, '', 18, 0, 0, 0, 0, 0, '2024-07-23 15:48:40', 2, '2024-07-26 09:07:39', 0, 'Inactive'),
(9, '', 19, 0, 0, 0, 0, 0, '2024-07-23 16:25:30', 2, '2024-07-26 09:07:40', 0, 'Inactive'),
(10, '', 20, 0, 0, 0, 0, 0, '2024-07-23 17:43:47', 2, '2024-07-26 09:07:41', 0, 'Inactive'),
(11, '', 21, 0, 0, 0, 0, 0, '2024-07-26 12:45:16', 2, '2024-07-26 09:07:42', 0, 'Inactive'),
(12, '', 22, 0, 0, 0, 0, 0, '2024-07-26 12:46:58', 2, '2024-07-26 09:07:30', 0, 'Inactive'),
(13, '', 23, 0, 0, 0, 0, 0, '2024-07-26 14:04:41', 2, '2024-07-26 10:28:22', 0, 'Inactive'),
(14, '24AC0040', 24, 87848, 0, 545, 0, 0, '2024-07-26 15:23:35', 2, '2024-07-26 09:55:03', 0, 'Active'),
(15, '24AC0048', 25, 51515, 0, 5152, 0, 0, '2024-07-26 15:25:27', 2, '2024-07-26 09:55:27', 0, 'Active'),
(16, '24CA00154', 26, 87848, 0, 545, 0, 1, '2024-07-26 15:30:52', 2, '2024-07-26 10:00:52', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `jeno_schedule`
--

CREATE TABLE `jeno_schedule` (
  `sch_id` int(11) NOT NULL,
  `sch_fac_id` int(11) NOT NULL,
  `sch_date` date NOT NULL,
  `sch_session` enum('Morning','Afternoon','Full Day') NOT NULL,
  `sch_timing` varchar(20) NOT NULL,
  `sch_cou_id` int(11) NOT NULL,
  `sch_sub_id` varchar(50) NOT NULL,
  `sch_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `sch_created_by` int(11) NOT NULL,
  `sch_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sch_updated_by` int(11) NOT NULL,
  `sch_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_schedule`
--

INSERT INTO `jeno_schedule` (`sch_id`, `sch_fac_id`, `sch_date`, `sch_session`, `sch_timing`, `sch_cou_id`, `sch_sub_id`, `sch_created_at`, `sch_created_by`, `sch_updated_at`, `sch_updated_by`, `sch_status`) VALUES
(1, 1, '2024-07-26', 'Morning', '10-12', 3, '[\"gkgk\",\"fgkgk\",\"jjjjjj\"]', '2024-07-25 17:03:35', 2, '2024-07-25 11:34:52', 0, 'Active'),
(2, 2, '2024-07-27', 'Afternoon', '12-02', 1, '[\"sdfhsgh\",\"dytietyietyi\"]', '2024-07-25 17:04:30', 2, '2024-07-25 12:08:27', 0, 'Active'),
(3, 2, '2024-07-31', 'Full Day', '10-04', 5, '[\"sdfhsgh\",\"HSGH\",\"adfhgadfh\"]', '2024-07-25 17:06:01', 2, '2024-07-25 12:08:32', 0, 'Active'),
(4, 1, '2024-08-09', 'Afternoon', '12-04', 3, '[\"ghkgl\",\"fgkgk\"]', '2024-07-26 10:22:51', 2, '2024-07-26 06:51:48', 2, 'Active');

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

INSERT INTO `jeno_student` (`stu_id`, `stu_name`, `stu_phone`, `stu_email`, `stu_uni_id`, `stu_cou_id`, `stu_medium_id`, `stu_apply_no`, `stu_enroll`, `stu_aca_year`, `stu_created_at`, `stu_created_by`, `stu_updated_at`, `stu_updated_by`, `stu_status`) VALUES
(1, 'Rajkumar', '6669867842', 'rajatemswork@gmail.com', 4, 1, 2, '24AC001', '456789321456', 'Jan-2024', '2024-07-19 16:52:04', 2, '2024-07-26 09:07:32', 2, 'Inactive'),
(2, 'Vasanth', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24AC002', '', 'Jan-2024', '2024-07-19 17:05:26', 2, '2024-07-26 09:07:34', 2, 'Inactive'),
(3, 'Anushiya', '9789867842', 'riyainfosystemswork@gmail.com', 4, 3, 1, '24AC003', '', 'July-2024', '2024-07-19 17:19:13', 2, '2024-07-22 11:50:56', 2, 'Inactive'),
(4, 'Anushiya', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA001', '', 'July-2024', '2024-07-19 17:20:50', 2, '2024-07-26 09:07:36', 2, 'Inactive'),
(5, 'Anushiya', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 2, '24CA002', '', 'June-2024', '2024-07-19 17:21:46', 2, '2024-07-26 09:07:37', 2, 'Inactive'),
(6, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 5, 4, 2, '24AC004', '', 'June-2024', '2024-07-22 17:46:20', 2, '2024-07-22 13:18:34', 0, 'Inactive'),
(7, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA0011', '', 'July-2024', '2024-07-22 18:40:41', 2, '2024-07-22 13:18:32', 0, 'Inactive'),
(8, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA0010', '', 'July-2024', '2024-07-22 18:40:44', 2, '2024-07-22 13:18:29', 0, 'Inactive'),
(9, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 4, 1, 2, '24CA003', '', 'July-2024', '2024-07-22 18:43:11', 2, '2024-07-22 13:18:27', 0, 'Inactive'),
(10, 'fhdgh', '0789867842', 'riyainfosystemswork@gmail.com', 4, 3, 2, '24CA009', '', 'July-2024', '2024-07-22 18:44:35', 2, '2024-07-22 13:18:19', 0, 'Inactive'),
(11, 'fu', '0978967842', 'riyainfosystemswork@gmail.com', 4, 1, 1, '24AC0015', '', 'July-2024', '2024-07-22 18:45:17', 2, '2024-07-22 13:18:15', 0, 'Inactive'),
(12, 'xjdfj', '8956778978', 'riyainfosystemswork@gmail.com', 4, 1, 1, '24CA0019', '', 'July-2024', '2024-07-22 18:45:45', 2, '2024-07-22 13:18:17', 0, 'Inactive'),
(13, 'xjdfj', '8956778978', 'riyainfosystemswork@gmail.com', 4, 1, 1, '24CA0019', '', 'July-2024', '2024-07-22 18:46:02', 2, '2024-07-22 13:18:25', 0, 'Inactive'),
(14, 'Riya Infosystems', '0978986784', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA00155', '', 'July-2024', '2024-07-22 18:47:38', 2, '2024-07-22 13:18:22', 0, 'Inactive'),
(15, 'Rajkumar', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA0018', '', 'July-2024', '2024-07-23 09:54:29', 2, '2024-07-26 09:07:38', 0, 'Inactive'),
(16, 'vasanth', '9876543210', 'riyainfosystemswork@gmail.com', 4, 3, 1, '24AC0013', '', 'July-2024', '2024-07-23 09:56:00', 2, '2024-07-26 09:07:38', 0, 'Inactive'),
(17, 'ajay', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA0016', '', '', '2024-07-23 14:46:12', 2, '2024-07-26 09:07:39', 0, 'Inactive'),
(18, 'rewqasdf', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA00199', '', '1 Year', '2024-07-23 15:48:40', 2, '2024-07-26 09:07:39', 0, 'Inactive'),
(19, 'magesh', '9789867842', 'riyainfosystemswork@gmail.com', 4, 3, 1, '24CA0029', '456789321456', 'July-2024', '2024-07-23 16:25:30', 2, '2024-07-26 09:07:40', 2, 'Inactive'),
(20, 'Hello', '9789867842', 'riyainfosystemswork@gmail.com', 5, 4, 1, '24CA0030', '', 'July-2024', '2024-07-23 17:43:47', 2, '2024-07-26 09:07:41', 0, 'Inactive'),
(21, 'rajaaa', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA00111', '', '1st Year', '2024-07-26 12:45:16', 2, '2024-07-26 09:07:42', 0, 'Inactive'),
(22, 'raj', '9894688091', 'riyainfosystemswork@gmail.com', 1, 2, 2, '24CA001111', '', '1st Year', '2024-07-26 12:46:58', 2, '2024-07-26 09:07:30', 0, 'Inactive'),
(23, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 2, '24CA00135', '456789321456', '1', '2024-07-26 14:04:41', 2, '2024-07-26 10:28:22', 2, 'Inactive'),
(24, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24AC0040', '', '1', '2024-07-26 15:23:35', 2, '2024-07-26 09:53:35', 0, 'Active'),
(25, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 4, 1, 1, '24AC0048', '', '2', '2024-07-26 15:25:27', 2, '2024-07-26 09:55:27', 0, 'Active'),
(26, 'raja', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA00154', '', '1', '2024-07-26 15:30:52', 2, '2024-07-26 10:00:52', 0, 'Active');

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
(1, 1, 'Calander Year', 2, 'sdsjh21423djd', '2024-07-10', '2024-07-01', 'Male', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', 627108, 'Muthu', 'dghk', 2147483647, 'sdfbs', 'adfg', 'sdvbs', 'sdfh', 'dfhsgdh', 'Married', 'Unemployed', 'UG', 'adfhadhdgh', '2023-2024', 'fhlfhl', '454548', '2024-07-19 16:52:04', 2, '2024-07-26 09:07:32', 2, 'Inactive'),
(2, 2, 'Academic Year', 7, 'sdsjh21423djd', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-19 17:05:26', 2, '2024-07-26 09:07:34', 2, 'Inactive'),
(3, 3, 'Academic Year', 3, 'sdsjh21423djd', '2024-07-17', '2024-07-07', 'Male', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', 627108, 'hkr', 'dghk', 2147483647, 'sdfbs', 'adfg', 'sdvbs', 'sdfh', 'dfhsgdh', 'Single', 'Employed', '12', 'adfhadhdgh', '2023-2024', 'fhlfhl', '454548', '2024-07-19 17:19:13', 2, '2024-07-20 12:03:51', 2, 'Inactive'),
(4, 4, 'Academic Year', 4, 'sdsjh21423djd', '2024-07-17', '2024-07-07', 'Male', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', 627108, 'hkr', 'dghk', 2147483647, 'sdfbs', 'adfg', 'sdvbs', 'sdfh', 'dfhsgdh', 'Single', 'Employed', '12', 'adfhadhdgh', '2023-2024', 'fhlfhl', '454548', '2024-07-19 17:20:50', 2, '2024-07-26 09:07:36', 2, 'Inactive'),
(5, 5, 'Academic Year', 4, 'sdsjh21423djd', '2024-07-17', '2024-07-07', 'Male', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', 627108, 'ghkdjghk', 'fyuorhj', 2147483647, 'sdfbs', 'adfg', 'sdvbs', 'sdfh', 'dfhsgdh', 'Single', 'Employed', '12', 'adfhadhdgh', '2023-2024', 'fhlfhl', '454548', '2024-07-19 17:21:46', 2, '2024-07-26 09:07:37', 2, 'Inactive'),
(6, 6, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 17:46:20', 2, '2024-07-22 13:18:34', 0, 'Inactive'),
(7, 7, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:40:41', 2, '2024-07-22 13:18:32', 0, 'Inactive'),
(8, 8, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:40:44', 2, '2024-07-22 13:18:29', 0, 'Inactive'),
(9, 9, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:43:11', 2, '2024-07-22 13:18:27', 0, 'Inactive'),
(10, 10, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:44:35', 2, '2024-07-22 13:18:19', 0, 'Inactive'),
(11, 11, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:45:17', 2, '2024-07-22 13:18:15', 0, 'Inactive'),
(12, 12, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:45:45', 2, '2024-07-22 13:18:17', 0, 'Inactive'),
(13, 13, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:46:02', 2, '2024-07-22 13:18:25', 0, 'Inactive'),
(14, 14, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-22 18:47:38', 2, '2024-07-22 13:18:22', 0, 'Inactive'),
(15, 15, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-23 09:54:29', 2, '2024-07-26 09:07:38', 0, 'Inactive'),
(16, 16, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-23 09:56:00', 2, '2024-07-26 09:07:38', 0, 'Inactive'),
(17, 17, '', 5, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-23 14:46:12', 2, '2024-07-26 09:07:39', 0, 'Inactive'),
(18, 18, '', 5, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-23 15:48:40', 2, '2024-07-26 09:07:39', 0, 'Inactive'),
(19, 19, 'Academic Year', 6, 'helllooooo', '2024-07-10', '0000-00-00', 'Female', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', 627108, 'muthu', 'veni', 2147483647, 'inrfs', 'tafgmsghj', 'hindzgh', 'sfdhadf', 'adhadfh', 'Single', 'Employed', '12', 'adfhadhd', '2023-2024', 'fhlfhl', '454548', '2024-07-23 16:25:30', 2, '2024-07-26 09:07:40', 2, 'Inactive'),
(20, 20, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-23 17:43:47', 2, '2024-07-26 09:07:41', 0, 'Inactive'),
(21, 21, '', 5, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-26 12:45:16', 2, '2024-07-26 09:07:42', 0, 'Inactive'),
(22, 22, '', 5, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-26 12:46:58', 2, '2024-07-26 09:07:30', 0, 'Inactive'),
(23, 23, 'Academic Year', 5, 'sdsjh21423djd', '2024-07-26', '2001-02-06', 'Male', '1/117 D vadukachiMathil\r\nOochikulam , Nanguneri Road', 627108, 'Muthu', 'veni', 2147483647, 'sdfbs', 'adfg', 'sdvbs', 'sdfh', 'adhadfh', 'Single', 'Employed', '12', 'adfhadhdgh', '2023-2024', 'fhlfhl', '454548', '2024-07-26 14:04:41', 2, '2024-07-26 10:28:22', 2, 'Inactive'),
(24, 24, '', 5, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-26 15:23:35', 2, '2024-07-26 09:53:35', 0, 'Active'),
(25, 25, '', 3, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-26 15:25:27', 2, '2024-07-26 09:55:27', 0, 'Active'),
(26, 26, '', 5, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-26 15:30:52', 2, '2024-07-26 10:00:52', 0, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jeno_faculty`
--
ALTER TABLE `jeno_faculty`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `jeno_fees`
--
ALTER TABLE `jeno_fees`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `jeno_schedule`
--
ALTER TABLE `jeno_schedule`
  ADD PRIMARY KEY (`sch_id`);

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
-- AUTO_INCREMENT for table `jeno_faculty`
--
ALTER TABLE `jeno_faculty`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jeno_fees`
--
ALTER TABLE `jeno_fees`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jeno_schedule`
--
ALTER TABLE `jeno_schedule`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jeno_student`
--
ALTER TABLE `jeno_student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jeno_stu_additional`
--
ALTER TABLE `jeno_stu_additional`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
