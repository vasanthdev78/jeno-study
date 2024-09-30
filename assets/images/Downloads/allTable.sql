-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 02:36 PM
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
(5, 5, '0', '0', '2024-07-19 17:21:46', 2, '2024-07-19 11:51:46', 0, 'Active');

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
  `cou_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
(4, 5, 'BBA', 'Tamil', 'Year', 'Year', 1, '[\"4354\"]', '[\"5435\"]', '[\"9789\"]', 1, '2024-07-17 11:17:05', 1, '2024-07-17 05:47:05', 1, 'Active'),
(5, 1, 'vasanth', 'English', 'Year', 'Year', 1, '[\"435653\"]', '[\"435\"]', '[\"436088\"]', 1, '2024-07-17 18:12:42', 2, '2024-07-17 12:42:42', 0, 'Active');

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

-- --------------------------------------------------------

--
-- Table structure for table `jeno_elective`
--

CREATE TABLE `jeno_elective` (
  `ele_id` int(11) NOT NULL,
  `ele_cou_id` int(11) NOT NULL,
  `ele_elective` varchar(100) NOT NULL,
  `ele_lag_elec` enum('L','E') NOT NULL,
  `ele_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `ele_created_by` int(11) NOT NULL,
  `ele_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ele_updated_by` int(11) NOT NULL,
  `ele_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_elective`
--

INSERT INTO `jeno_elective` (`ele_id`, `ele_cou_id`, `ele_elective`, `ele_lag_elec`, `ele_created_at`, `ele_created_by`, `ele_updated_at`, `ele_updated_by`, `ele_status`) VALUES
(1, 1, 'Tamil', 'E', '2024-07-17 17:52:45', 1, '2024-07-19 07:24:09', 1, 'Inactive'),
(2, 1, 'Tamil', 'E', '2024-07-18 10:03:10', 1, '2024-07-19 07:24:12', 2, 'Active'),
(3, 1, 'English', 'E', '2024-07-18 10:03:30', 1, '2024-07-19 07:23:49', 1, 'Active'),
(4, 1, 'English', 'E', '2024-07-18 10:03:45', 1, '2024-07-19 07:24:05', 1, 'Active'),
(5, 2, 'Maths', 'E', '2024-07-18 10:43:39', 1, '2024-07-19 07:11:59', 0, 'Active'),
(6, 3, 'malayalam', 'L', '2024-07-18 10:53:25', 1, '2024-07-20 07:15:19', 1, 'Active'),
(7, 3, 'hindi', 'L', '2024-07-18 10:57:19', 1, '2024-07-20 06:10:16', 2, 'Active');

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
  `enq_gender` enum('Male','Female','Transgender') NOT NULL,
  `enq_mobile` varchar(20) NOT NULL,
  `enq_address` longtext NOT NULL,
  `enq_medium` enum('Tamil','English') NOT NULL,
  `enq_adminsion_status` enum('Pending','Complete') NOT NULL DEFAULT 'Pending',
  `enq_center_id` int(11) NOT NULL,
  `enq_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `enq_created_by` int(11) NOT NULL,
  `enq_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `enq_updated_by` int(11) NOT NULL,
  `enq_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_enquiry`
--

INSERT INTO `jeno_enquiry` (`enq_id`, `enq_uni_id`, `enq_cou_id`, `enq_number`, `enq_stu_name`, `enq_email`, `enq_dob`, `enq_gender`, `enq_mobile`, `enq_address`, `enq_medium`, `enq_adminsion_status`, `enq_center_id`, `enq_created_at`, `enq_created_by`, `enq_updated_at`, `enq_updated_by`, `enq_status`) VALUES
(1, 4, 1, '', 'vasanth v', 'vasanth@gmail.com', '2001-11-02', 'Male', '9894688091', 'kallikulam', 'Tamil', 'Pending', 1, '2024-07-18 10:10:19', 2, '2024-07-18 06:54:55', 2, 'Active'),
(2, 1, 2, '', 'raj', 'vasanth@gmail.com', '2001-11-03', 'Male', '9894688091', 'kalakad', 'English', 'Pending', 1, '2024-07-18 12:00:11', 2, '2024-07-18 07:04:50', 2, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `jeno_fees`
--

CREATE TABLE `jeno_fees` (
  `fee_id` int(11) NOT NULL,
  `fee_stu_id` int(11) NOT NULL,
  `fee_uni_fee` varchar(10) NOT NULL,
  `fee_sty_fee` varchar(10) NOT NULL,
  `fee_paid_date` date NOT NULL,
  `fee_method` int(11) NOT NULL,
  `fee_trans_id` varchar(100) NOT NULL,
  `fee_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `fee_created_by` int(11) NOT NULL,
  `fee_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fee_updated_by` int(11) NOT NULL,
  `fee_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_fees`
--

INSERT INTO `jeno_fees` (`fee_id`, `fee_stu_id`, `fee_uni_fee`, `fee_sty_fee`, `fee_paid_date`, `fee_method`, `fee_trans_id`, `fee_created_at`, `fee_created_by`, `fee_updated_at`, `fee_updated_by`, `fee_status`) VALUES
(1, 1, '0', '0', '0000-00-00', 0, '0', '2024-07-19 16:52:04', 2, '2024-07-19 11:22:04', 0, 'Active'),
(2, 2, '0', '0', '0000-00-00', 0, '0', '2024-07-19 17:05:26', 2, '2024-07-19 11:35:26', 0, 'Active'),
(3, 3, '0', '0', '0000-00-00', 0, '0', '2024-07-19 17:19:13', 2, '2024-07-20 12:03:51', 0, 'Inactive'),
(4, 4, '0', '0', '0000-00-00', 0, '0', '2024-07-19 17:20:50', 2, '2024-07-19 11:50:50', 0, 'Active'),
(5, 5, '0', '0', '0000-00-00', 0, '0', '2024-07-19 17:21:46', 2, '2024-07-19 11:51:46', 0, 'Active');

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
  `stf_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stf_updated_by` int(11) NOT NULL,
  `stf_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `stu_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `stu_created_by` int(11) NOT NULL,
  `stu_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stu_updated_by` int(11) NOT NULL,
  `stu_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jeno_stu_additional`
--

CREATE TABLE `jeno_stu_additional` (
  `add_id` int(11) NOT NULL,
  `add_stu_id` int(11) NOT NULL,
  `add_year_type` int(11) NOT NULL,
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
  `add_marital_status` int(11) NOT NULL,
  `add_empoloyed` int(11) NOT NULL,
  `add_qualifiaction` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `jeno_subject`
--

CREATE TABLE `jeno_subject` (
  `sub_id` int(11) NOT NULL,
  `sub_uni_id` int(11) NOT NULL,
  `sub_cou_id` int(11) NOT NULL,
  `sub_ele_id` int(11) NOT NULL,
  `sub_exam_patten` int(11) NOT NULL,
  `sub_subject_code` longtext NOT NULL,
  `sub_subject_name` longtext NOT NULL,
  `sub_addition_lag_name` longtext NOT NULL,
  `sub_addition_sub_code` longtext NOT NULL,
  `sub_addition_sub_name` longtext NOT NULL,
  `sub_type` enum('Elective','Language') NOT NULL,
  `sub_center_id` int(11) NOT NULL,
  `sub_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `sub_created_by` int(11) NOT NULL,
  `sub_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sub_updated_by` int(11) NOT NULL,
  `sub_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_subject`
--

INSERT INTO `jeno_subject` (`sub_id`, `sub_uni_id`, `sub_cou_id`, `sub_ele_id`, `sub_exam_patten`, `sub_subject_code`, `sub_subject_name`, `sub_addition_lag_name`, `sub_addition_sub_code`, `sub_addition_sub_name`, `sub_type`, `sub_center_id`, `sub_created_at`, `sub_created_by`, `sub_updated_at`, `sub_updated_by`, `sub_status`) VALUES
(1, 1, 2, 5, 1, '[\"001\"]', '[\"tamil\"]', '', '', '', 'Elective', 1, '2024-07-19 16:55:48', 2, '2024-07-20 12:27:28', 1, 'Active'),
(2, 1, 2, 5, 1, '[\"001\"]', '[\"tamil\"]', '', 'Array', 'Array', 'Elective', 1, '2024-07-19 16:57:41', 2, '2024-07-19 11:27:41', 0, 'Active'),
(3, 1, 2, 5, 1, '[\"001\"]', '[\"tamil\"]', '', '[\"101\"]', '[\"maths\"]', 'Elective', 1, '2024-07-19 17:00:44', 2, '2024-07-19 11:30:44', 0, 'Active'),
(4, 1, 2, 5, 1, '[\"001\"]', '[\"tamil\"]', '', '[\"101\"]', '[\"maths\"]', 'Elective', 1, '2024-07-19 17:06:03', 2, '2024-07-19 11:36:03', 0, 'Active'),
(5, 1, 5, 0, 1, '[\"001\"]', '[\"tamil\"]', '[\"2\"]', '[\"56\"]', '[\"tamil\"]', 'Language', 1, '2024-07-19 17:24:17', 2, '2024-07-19 11:54:17', 0, 'Active'),
(6, 1, 5, 0, 1, '[\"001\"]', '[\"tamil\"]', '[\"2\"]', '[\"56\"]', '[\"tamil\"]', 'Language', 1, '2024-07-19 17:26:24', 2, '2024-07-19 11:56:24', 0, 'Active'),
(7, 1, 2, 5, 1, 'null', 'null', '', 'null', 'null', 'Elective', 1, '2024-07-20 09:32:09', 1, '2024-07-20 04:02:09', 0, 'Active'),
(8, 1, 2, 5, 1, '[\"001\",\"001\"]', '[\"tamil v\",\"tamil v\"]', '', '[\"101\",\"101\"]', '[\"maths v\",\"maths v\"]', 'Elective', 1, '2024-07-20 09:32:27', 1, '2024-07-20 07:36:34', 1, 'Active'),
(9, 4, 3, 0, 1, '[\"001\",\"001\",\"001\"]', '[\"tamil\",\"tamil\",\"tamil\"]', 'null', '[\"56\",\"56\",\"56\"]', '[\"tamil\",\"tamil\",\"tamil\"]', 'Language', 1, '2024-07-20 12:50:02', 1, '2024-07-20 07:20:02', 0, 'Active'),
(10, 4, 3, 0, 1, '[\"001\",\"001\"]', '[\"tamil\",\"tamil\"]', 'null', '[\"56\",\"56\"]', '[\"tamil\",\"tamil\"]', 'Language', 1, '2024-07-20 12:51:44', 1, '2024-07-20 07:21:44', 0, 'Active'),
(11, 4, 3, 0, 2, '[\"001\",\"001\"]', '[\"tamil\",\"tamil\"]', 'null', '[\"56\",\"56\"]', '[\"tamil\",\"tamil\"]', 'Language', 1, '2024-07-20 12:54:09', 1, '2024-07-20 07:24:09', 0, 'Active'),
(12, 4, 3, 0, 1, '[\"001\",\"001\"]', '[\"tamil\",\"tamil\"]', '[\"6\",\"7\"]', '[\"56\",\"56\"]', '[\"tamil\",\"tamil\"]', 'Language', 1, '2024-07-20 12:57:22', 1, '2024-07-20 07:27:22', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `jeno_transaction`
--

CREATE TABLE `jeno_transaction` (
  `tran_id` int(11) NOT NULL,
  `tran_category` enum('Income','Expense') NOT NULL,
  `tran_date` date NOT NULL,
  `tran_amount` int(11) NOT NULL,
  `tran_method` enum('Online','Cash') NOT NULL,
  `tran_transaction_id` varchar(50) NOT NULL,
  `tran_description` varchar(100) NOT NULL,
  `tran_reason` varchar(100) NOT NULL,
  `tran_center_id` int(11) NOT NULL,
  `tran_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `tran_created_by` int(11) NOT NULL,
  `tran_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tran_updated_by` int(11) NOT NULL,
  `tran_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_transaction`
--

INSERT INTO `jeno_transaction` (`tran_id`, `tran_category`, `tran_date`, `tran_amount`, `tran_method`, `tran_transaction_id`, `tran_description`, `tran_reason`, `tran_center_id`, `tran_created_at`, `tran_created_by`, `tran_updated_at`, `tran_updated_by`, `tran_status`) VALUES
(1, 'Expense', '2024-07-18', 5000, 'Cash', '6546545', 'havbhsgflk', 'billl', 1, '2024-07-18 16:44:44', 2, '2024-07-18 12:38:56', 1, 'Active'),
(2, 'Income', '2024-07-11', 5000, 'Online', '646465sa', 'BILL', '', 1, '2024-07-19 10:14:32', 2, '2024-07-19 04:44:32', 0, 'Active'),
(3, 'Income', '2024-07-11', 5000, 'Online', '646465sa', 'BILL', '', 1, '2024-07-19 10:14:49', 2, '2024-07-19 04:44:49', 0, 'Active'),
(4, 'Income', '2024-07-19', 500, 'Online', '646465sa', 'bill ', '', 1, '2024-07-19 10:17:17', 2, '2024-07-19 04:47:17', 0, 'Active'),
(5, 'Expense', '2024-07-19', 500, 'Online', '646465sa', 'bill ', '', 1, '2024-07-19 10:18:25', 2, '2024-07-19 04:48:25', 0, 'Active'),
(6, 'Income', '2024-07-19', 1000, 'Online', '646465sa', 'bill', '', 1, '2024-07-19 10:21:55', 2, '2024-07-19 04:51:55', 0, 'Active'),
(7, 'Income', '2024-07-19', 4000, 'Cash', '646465sa', 'dafsad', 'fees ', 1, '2024-07-19 10:56:56', 2, '2024-07-19 05:26:56', 0, 'Active');

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
  `uni_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `user_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_updated_by` int(11) NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_user`
--

INSERT INTO `jeno_user` (`user_id`, `user_name`, `user_username`, `user_password`, `user_role`, `user_created_at`, `user_created_by`, `user_updated_at`, `user_updated_by`, `user_status`) VALUES
(1, 'admin', 'admin', 'admin', 'Admin', '2024-07-08 12:40:13', 0, '2024-07-18 11:30:45', 0, 'Active'),
(2, 'staff', 'staff', 'staff', 'Staff', '2024-07-08 12:43:52', 0, '2024-07-17 10:14:18', 0, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jeno_book`
--
ALTER TABLE `jeno_book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `jeno_course`
--
ALTER TABLE `jeno_course`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `jeno_document`
--
ALTER TABLE `jeno_document`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `jeno_elective`
--
ALTER TABLE `jeno_elective`
  ADD PRIMARY KEY (`ele_id`);

--
-- Indexes for table `jeno_enquiry`
--
ALTER TABLE `jeno_enquiry`
  ADD PRIMARY KEY (`enq_id`);

--
-- Indexes for table `jeno_fees`
--
ALTER TABLE `jeno_fees`
  ADD PRIMARY KEY (`fee_id`);

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
-- Indexes for table `jeno_subject`
--
ALTER TABLE `jeno_subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `jeno_transaction`
--
ALTER TABLE `jeno_transaction`
  ADD PRIMARY KEY (`tran_id`);

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
-- AUTO_INCREMENT for table `jeno_book`
--
ALTER TABLE `jeno_book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jeno_course`
--
ALTER TABLE `jeno_course`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jeno_document`
--
ALTER TABLE `jeno_document`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jeno_elective`
--
ALTER TABLE `jeno_elective`
  MODIFY `ele_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jeno_enquiry`
--
ALTER TABLE `jeno_enquiry`
  MODIFY `enq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jeno_fees`
--
ALTER TABLE `jeno_fees`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jeno_staff`
--
ALTER TABLE `jeno_staff`
  MODIFY `stf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jeno_student`
--
ALTER TABLE `jeno_student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jeno_stu_additional`
--
ALTER TABLE `jeno_stu_additional`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jeno_subject`
--
ALTER TABLE `jeno_subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jeno_transaction`
--
ALTER TABLE `jeno_transaction`
  MODIFY `tran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
