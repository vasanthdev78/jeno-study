-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 02:49 PM
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
  `book_received` enum('Received','Not Received') NOT NULL DEFAULT 'Not Received',
  `book_issued` longtext NOT NULL,
  `book_id_card` enum('Issued','Not Issued') NOT NULL DEFAULT 'Not Issued',
  `book_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `book_created_by` int(11) NOT NULL,
  `book_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `book_updated_by` int(11) NOT NULL,
  `book_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_book`
--

INSERT INTO `jeno_book` (`book_id`, `book_stu_id`, `book_received`, `book_issued`, `book_id_card`, `book_created_at`, `book_created_by`, `book_updated_at`, `book_updated_by`, `book_status`) VALUES
(1, 5, 'Not Received', '[\"tamil\",\"tamil\"]', 'Not Issued', '2024-07-25 17:30:14', 2, '2024-07-25 12:46:50', 2, 'Active');

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

--
-- Dumping data for table `jeno_document`
--

INSERT INTO `jeno_document` (`doc_id`, `doc_stu_id`, `doc_sslc`, `doc_hsc`, `doc_community`, `doc_tc`, `doc_aadhar`, `doc_photo`, `doc_created_at`, `doc_created_by`, `doc_updated_at`, `doc_updated_by`, `doc_status`) VALUES
(1, 1, '', '', '', '', '', '', '2024-07-25 15:48:08', 2, '2024-07-25 10:18:08', 0, 'Active'),
(2, 2, '', '', '', '', '', '', '2024-07-25 15:48:19', 2, '2024-07-25 10:18:19', 0, 'Active'),
(3, 3, '', '', '', '', '', '', '2024-07-25 17:26:09', 2, '2024-07-25 11:56:09', 0, 'Active'),
(4, 4, '', '', '', '', '', '', '2024-07-25 17:28:38', 2, '2024-07-25 11:58:38', 0, 'Active'),
(5, 5, '', '', '', '', '', '', '2024-07-25 17:30:14', 2, '2024-07-25 12:00:14', 0, 'Active');

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
(2, 1, 2, '', 'raj', 'vasanth@gmail.com', '2001-11-03', 'Male', '9894688091', 'kalakad', 'English', 'Pending', 1, '2024-07-18 12:00:11', 2, '2024-07-18 07:04:50', 2, 'Active'),
(3, 4, 1, '', 'dan', 'vasanth@gmail.com', '2001-11-02', 'Male', '7896541354', 'kallikulam', 'English', 'Pending', 1, '2024-07-23 10:06:55', 2, '2024-07-23 04:36:55', 0, 'Active'),
(4, 4, 3, '', 'dan', 'fhjl@gmail.com', '2000-12-03', 'Female', '7896541389', 'agsfdgagasd', 'English', 'Pending', 1, '2024-07-23 10:08:19', 2, '2024-07-23 04:38:19', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `jeno_faculty`
--

CREATE TABLE `jeno_faculty` (
  `fac_id` int(11) NOT NULL,
  `fac_name` varchar(100) NOT NULL,
  `fac_dob` date NOT NULL,
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
  `fac_subject_id` varchar(150) NOT NULL,
  `fac_center_id` int(11) NOT NULL,
  `fac_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `fac_created_by` int(11) NOT NULL,
  `fac_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fac_updated_by` int(11) NOT NULL,
  `fac_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jeno_fees`
--

CREATE TABLE `jeno_fees` (
  `fee_id` int(11) NOT NULL,
  `fee_admision_id` varchar(20) NOT NULL,
  `fee_stu_id` int(11) NOT NULL,
  `fee_uni_fee_total` int(11) NOT NULL,
  `fee_uni_fee` varchar(10) NOT NULL,
  `fee_sdy_fee_total` int(11) NOT NULL,
  `fee_sty_fee` varchar(10) NOT NULL,
  `fee_stu_year` varchar(50) NOT NULL,
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
(1, '2024a001', 1, 3900, '2400', 5051, '1898', '', '2024-07-19 16:52:04', 2, '2024-07-22 13:06:08', 1, 'Active'),
(7, '', 5, 0, '0', 0, '0', '', '2024-07-25 17:30:14', 2, '2024-07-25 12:00:14', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `jeno_payment_history`
--

CREATE TABLE `jeno_payment_history` (
  `pay_id` int(11) NOT NULL,
  `pay_admission_id` varchar(50) NOT NULL,
  `pay_student_name` varchar(50) NOT NULL,
  `pay_year` varchar(20) NOT NULL,
  `pay_paid_method` enum('Online','Cash') NOT NULL,
  `pay_transaction_id` varchar(30) NOT NULL,
  `pay_description` varchar(100) NOT NULL,
  `pay_university_fees` int(11) NOT NULL,
  `pay_study_fees` int(11) NOT NULL,
  `pay_total_amount` int(11) NOT NULL,
  `pay_balance` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `pay_created_by` int(11) NOT NULL,
  `pay_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pay_updated_by` int(11) NOT NULL,
  `pay_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_payment_history`
--

INSERT INTO `jeno_payment_history` (`pay_id`, `pay_admission_id`, `pay_student_name`, `pay_year`, `pay_paid_method`, `pay_transaction_id`, `pay_description`, `pay_university_fees`, `pay_study_fees`, `pay_total_amount`, `pay_balance`, `pay_date`, `pay_created_at`, `pay_created_by`, `pay_updated_at`, `pay_updated_by`, `pay_status`) VALUES
(1, '2024a001', 'Rajkumar', '1st Year', 'Online', '646465sa', 'Phone Pay', 200, 198, 398, 0, '2024-07-22', '2024-07-22 15:09:06', 1, '2024-07-22 09:39:06', 0, 'Active'),
(2, '2024a001', 'Rajkumar', '1st Year', 'Cash', '646465sa', '', 100, 100, 200, 0, '2024-07-22', '2024-07-22 15:11:23', 1, '2024-07-22 10:36:32', 0, 'Active'),
(3, '2024a001', 'Rajkumar', '1st Year', 'Online', '646465sa', 'dnh', 100, 100, 200, 0, '2024-07-22', '2024-07-22 15:14:10', 1, '2024-07-22 13:08:57', 1, 'Active');

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
  `stu_study_year` int(20) NOT NULL,
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
(1, 'vasanth', '9894688091', 'vasanth@gmail.com', 4, 3, 2, '2024A001', '', 1, '2024', '2024-07-25 15:48:08', 2, '2024-07-25 10:26:32', 2, 'Active'),
(3, 'kows', '9894688091', 'vasanth@gmail.com', 4, 3, 2, '2024A002', '', 1, '2024', '2024-07-25 17:26:09', 2, '2024-07-25 11:56:09', 0, 'Active'),
(4, 'vasanth', '9894688091', 'fhjl@gmail.com', 4, 1, 2, '2024A003', '', 1, '2024', '2024-07-25 17:28:38', 2, '2024-07-25 11:58:38', 0, 'Active'),
(5, 'Jon Stewart Doe', '6019521325', 'test@example.us', 4, 3, 2, '2024A004', '', 1, '2024', '2024-07-25 17:30:14', 2, '2024-07-25 12:00:14', 0, 'Active');

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
(1, 1, 'Academic Year', 6, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-25 15:48:08', 2, '2024-07-25 10:26:32', 2, 'Active'),
(2, 2, '', 0, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-25 15:48:19', 2, '2024-07-25 10:18:19', 0, 'Active'),
(3, 3, '', 6, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-25 17:26:09', 2, '2024-07-25 11:56:09', 0, 'Active'),
(4, 4, '', 3, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-25 17:28:38', 2, '2024-07-25 11:58:38', 0, 'Active'),
(5, 5, '', 7, '', '0000-00-00', '0000-00-00', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '2024-07-25 17:30:14', 2, '2024-07-25 12:00:14', 0, 'Active');

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
(1, 1, 3, 0, 1, '[\"001\",\"001\"]', '[\"tamil\",\"tamil\"]', '[\"6\",\"7\"]', '[\"56\",\"56\"]', '[\"tamil\",\"tamil\"]', 'Language', 1, '2024-07-25 15:43:18', 2, '2024-07-25 10:40:14', 0, 'Active');

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
-- Indexes for table `jeno_payment_history`
--
ALTER TABLE `jeno_payment_history`
  ADD PRIMARY KEY (`pay_id`);

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jeno_course`
--
ALTER TABLE `jeno_course`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jeno_document`
--
ALTER TABLE `jeno_document`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jeno_elective`
--
ALTER TABLE `jeno_elective`
  MODIFY `ele_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jeno_enquiry`
--
ALTER TABLE `jeno_enquiry`
  MODIFY `enq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jeno_faculty`
--
ALTER TABLE `jeno_faculty`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jeno_fees`
--
ALTER TABLE `jeno_fees`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jeno_payment_history`
--
ALTER TABLE `jeno_payment_history`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jeno_staff`
--
ALTER TABLE `jeno_staff`
  MODIFY `stf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jeno_student`
--
ALTER TABLE `jeno_student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jeno_stu_additional`
--
ALTER TABLE `jeno_stu_additional`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jeno_subject`
--
ALTER TABLE `jeno_subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
