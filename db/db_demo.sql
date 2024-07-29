-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2024 at 01:21 PM
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
(14, '24AC0040', 24, 87848, 87848, 545, 634, 1, '2024-07-26 15:23:35', 2, '2024-07-27 09:38:41', 2, 'Inactive'),
(15, '24AC0048', 25, 51515, 51515, 5152, 5152, 2, '2024-07-26 15:25:27', 2, '2024-07-27 10:56:21', 2, 'Inactive'),
(16, '24CA00154', 26, 87848, 87848, 545, 545, 1, '2024-07-26 15:30:52', 2, '2024-07-27 10:56:24', 2, 'Inactive'),
(17, '24AC003435', 27, 6000, 6000, 2000, 3980, 1, '2024-07-27 14:07:53', 2, '2024-07-27 09:38:35', 2, 'Inactive'),
(18, '24AC00343', 28, 6000, 5000, 2000, 3000, 1, '2024-07-27 14:27:13', 2, '2024-07-27 11:15:59', 2, 'Inactive'),
(19, '24AC0034', 29, 6000, 6000, 2000, 2000, 1, '2024-07-27 14:30:01', 2, '2024-07-27 09:09:10', 2, 'Active'),
(20, '24AC00340', 30, 6000, 6000, 2000, -8700, 1, '2024-07-27 15:24:19', 2, '2024-07-27 10:35:11', 2, 'Inactive'),
(21, '24AC003400', 31, 8000, 8000, 4000, 4000, 1, '2024-07-27 16:05:49', 2, '2024-07-27 10:37:15', 2, 'Active'),
(22, '', 25, 7000, 0, 1000, 0, 3, '2024-07-27 16:18:54', 0, '2024-07-27 10:56:21', 0, 'Inactive'),
(23, '', 26, 3000, 0, 1000, 0, 2, '2024-07-27 16:22:55', 0, '2024-07-27 10:56:24', 0, 'Inactive'),
(24, '24AC00343', 28, 5000, 5000, 3000, 3000, 2, '2024-07-27 16:23:45', 0, '2024-07-27 11:15:59', 2, 'Inactive'),
(25, '24AC0034', 29, 5000, 0, 3000, 0, 2, '2024-07-27 16:24:14', 0, '2024-07-27 10:54:14', 0, 'Active'),
(26, '24AC003400', 31, 10000, 0, 3000, 0, 2, '2024-07-27 16:25:30', 2, '2024-07-27 10:55:30', 0, 'Active'),
(27, '24AC0687', 32, 6000, 0, 2000, 0, 1, '2024-07-27 16:27:02', 2, '2024-07-27 10:57:02', 0, 'Active'),
(28, '24AC00343', 28, 7000, 0, 1000, 0, 3, '2024-07-27 16:37:32', 2, '2024-07-27 11:15:59', 0, 'Inactive'),
(29, '24AC00343', 28, 5000, 0, 3000, 0, 2, '2024-07-27 16:42:04', 2, '2024-07-27 11:15:59', 0, 'Inactive'),
(30, '24AC00343', 28, 5000, 0, 3000, 0, 2, '2024-07-27 16:43:18', 2, '2024-07-27 11:15:59', 0, 'Inactive'),
(31, '24AC00343', 28, 5000, 0, 3000, 0, 2, '2024-07-27 16:44:17', 2, '2024-07-27 11:15:59', 0, 'Inactive'),
(32, '24AC00343', 28, 5000, 0, 3000, 0, 2, '2024-07-27 16:45:15', 2, '2024-07-27 11:15:59', 0, 'Inactive'),
(33, '24AC04365', 33, 6000, 0, 2000, 0, 1, '2024-07-27 16:46:37', 2, '2024-07-27 11:16:37', 0, 'Active');

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
(1, '24CA00154', 'raja', '1', 'Cash', 'uhdefr878', '', 87848, 545, 88393, 0, '2024-07-27', '2024-07-27 12:45:48', 2, '2024-07-27 07:15:48', 0, 'Active'),
(2, '24AC0048', 'Riya Infosystems', '2', 'Cash', 'jytdekie', '', 51515, 5152, 56667, 0, '2024-07-27', '2024-07-27 12:51:15', 2, '2024-07-27 07:21:15', 0, 'Active'),
(3, '24AC0040', 'Riya Infosystems', '1', 'Cash', 'trjrtu65', '', 87848, 456, 88304, 0, '2024-07-27', '2024-07-27 12:53:46', 2, '2024-07-27 07:23:46', 0, 'Active'),
(4, '24AC003435', 'rdad', '1', 'Cash', 'uhdefr878rtu', '', 6000, 20, 6020, 0, '2024-07-27', '2024-07-27 14:09:35', 2, '2024-07-27 08:39:35', 0, 'Active'),
(5, '24AC003435', 'rdad', '1', 'Cash', 'jytdekie78te', '', 0, 1980, 1980, 0, '2024-07-27', '2024-07-27 14:10:01', 2, '2024-07-27 08:40:01', 0, 'Active'),
(6, '24AC003435', 'rdad', '1', 'Cash', 'jytdekie78te', '', 0, 1980, 1980, 0, '2024-07-27', '2024-07-27 14:10:18', 2, '2024-07-27 08:40:18', 0, 'Active'),
(7, '24AC0040', 'Riya Infosystems', '1', 'Cash', 'uhdefr878', '', 0, 89, 89, 0, '2024-07-27', '2024-07-27 14:22:15', 2, '2024-07-27 08:52:15', 0, 'Active'),
(8, '24AC0040', 'Riya Infosystems', '1', 'Cash', 'uhdefr878', '', 0, 89, 89, 0, '2024-07-27', '2024-07-27 14:22:22', 2, '2024-07-27 08:52:22', 0, 'Active'),
(9, '24AC00343', 'wretwre', '1', 'Cash', 'uhdefr87866', '', 600, 2000, 2600, 0, '2024-07-27', '2024-07-27 14:27:54', 2, '2024-07-27 08:57:54', 0, 'Active'),
(10, '24AC00343', 'wretwre', '1', 'Cash', 'ghf4657', '', 5400, 0, 5400, 0, '2024-07-26', '2024-07-27 14:28:50', 2, '2024-07-27 08:58:50', 0, 'Active'),
(11, '24AC0034', 'dfgdef', '1', 'Online', 'dsgsfgsdfgdfgdf', 'dsfg', 6000, 43, 6043, 0, '2024-07-27', '2024-07-27 14:30:31', 2, '2024-07-27 09:00:31', 0, 'Active'),
(12, '24AC0034', 'dfgdef', '1', 'Cash', 'eyrt', '', 0, 0, 0, 0, '2024-07-27', '2024-07-27 14:32:17', 2, '2024-07-27 09:02:17', 0, 'Active'),
(13, '24AC0034', 'dfgdef', '1', 'Online', 'eryery', 'erye', 0, 0, 0, 0, '2024-07-26', '2024-07-27 14:32:50', 2, '2024-07-27 09:02:50', 0, 'Active'),
(14, '24AC0034', 'dfgdef', '1', 'Online', 'srytrey', 'erye', 0, 0, 0, 0, '2024-07-26', '2024-07-27 14:33:20', 2, '2024-07-27 09:03:20', 0, 'Active'),
(15, '24AC0034', 'dfgdef', '1', 'Cash', '456ery', '', 0, 0, 0, 0, '2024-07-26', '2024-07-27 14:35:08', 2, '2024-07-27 09:05:08', 0, 'Active'),
(16, '24AC0034', 'dfgdef', '1', 'Cash', 'deyrt645', '', 0, 456, 456, 0, '2024-07-28', '2024-07-27 14:38:46', 2, '2024-07-27 09:08:46', 0, 'Active'),
(17, '24AC0034', 'dfgdef', '1', 'Cash', 'ytr', '', 0, 1501, 1501, 0, '2024-08-07', '2024-07-27 14:39:10', 2, '2024-07-27 09:09:10', 0, 'Active'),
(18, '24AC00340', 'ewrtret', '1', 'Cash', 'uhdefr878', '', 6000, -8700, -2700, 0, '2024-07-27', '2024-07-27 15:26:05', 2, '2024-07-27 09:56:05', 0, 'Active'),
(19, '24AC003400', 'erytre', '1', 'Cash', 'eryete', '', 8000, 4000, 12000, 0, '2024-07-27', '2024-07-27 16:07:15', 2, '2024-07-27 10:37:15', 0, 'Active'),
(20, '24AC00343', 'wretwre', '2', 'Online', 'uhdefr878', 'ewrt', 5000, 3000, 8000, 0, '2024-07-27', '2024-07-27 16:36:57', 2, '2024-07-27 11:06:57', 0, 'Active');

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
  `stu_join_year` int(11) NOT NULL,
  `stu_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `stu_created_by` int(11) NOT NULL,
  `stu_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stu_updated_by` int(11) NOT NULL,
  `stu_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_student`
--

INSERT INTO `jeno_student` (`stu_id`, `stu_name`, `stu_phone`, `stu_email`, `stu_uni_id`, `stu_cou_id`, `stu_medium_id`, `stu_apply_no`, `stu_enroll`, `stu_aca_year`, `stu_join_year`, `stu_created_at`, `stu_created_by`, `stu_updated_at`, `stu_updated_by`, `stu_status`) VALUES
(1, 'Rajkumar', '6669867842', 'rajatemswork@gmail.com', 4, 1, 2, '24AC001', '456789321456', 'Jan-2024', 0, '2024-07-19 16:52:04', 2, '2024-07-26 09:07:32', 2, 'Inactive'),
(2, 'Vasanth', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24AC002', '', 'Jan-2024', 0, '2024-07-19 17:05:26', 2, '2024-07-26 09:07:34', 2, 'Inactive'),
(3, 'Anushiya', '9789867842', 'riyainfosystemswork@gmail.com', 4, 3, 1, '24AC003', '', 'July-2024', 0, '2024-07-19 17:19:13', 2, '2024-07-22 11:50:56', 2, 'Inactive'),
(4, 'Anushiya', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA001', '', 'July-2024', 0, '2024-07-19 17:20:50', 2, '2024-07-26 09:07:36', 2, 'Inactive'),
(5, 'Anushiya', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 2, '24CA002', '', 'June-2024', 0, '2024-07-19 17:21:46', 2, '2024-07-26 09:07:37', 2, 'Inactive'),
(6, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 5, 4, 2, '24AC004', '', 'June-2024', 0, '2024-07-22 17:46:20', 2, '2024-07-22 13:18:34', 0, 'Inactive'),
(7, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA0011', '', 'July-2024', 0, '2024-07-22 18:40:41', 2, '2024-07-22 13:18:32', 0, 'Inactive'),
(8, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA0010', '', 'July-2024', 0, '2024-07-22 18:40:44', 2, '2024-07-22 13:18:29', 0, 'Inactive'),
(9, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 4, 1, 2, '24CA003', '', 'July-2024', 0, '2024-07-22 18:43:11', 2, '2024-07-22 13:18:27', 0, 'Inactive'),
(10, 'fhdgh', '0789867842', 'riyainfosystemswork@gmail.com', 4, 3, 2, '24CA009', '', 'July-2024', 0, '2024-07-22 18:44:35', 2, '2024-07-22 13:18:19', 0, 'Inactive'),
(11, 'fu', '0978967842', 'riyainfosystemswork@gmail.com', 4, 1, 1, '24AC0015', '', 'July-2024', 0, '2024-07-22 18:45:17', 2, '2024-07-22 13:18:15', 0, 'Inactive'),
(12, 'xjdfj', '8956778978', 'riyainfosystemswork@gmail.com', 4, 1, 1, '24CA0019', '', 'July-2024', 0, '2024-07-22 18:45:45', 2, '2024-07-22 13:18:17', 0, 'Inactive'),
(13, 'xjdfj', '8956778978', 'riyainfosystemswork@gmail.com', 4, 1, 1, '24CA0019', '', 'July-2024', 0, '2024-07-22 18:46:02', 2, '2024-07-22 13:18:25', 0, 'Inactive'),
(14, 'Riya Infosystems', '0978986784', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA00155', '', 'July-2024', 0, '2024-07-22 18:47:38', 2, '2024-07-22 13:18:22', 0, 'Inactive'),
(15, 'Rajkumar', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA0018', '', 'July-2024', 0, '2024-07-23 09:54:29', 2, '2024-07-26 09:07:38', 0, 'Inactive'),
(16, 'vasanth', '9876543210', 'riyainfosystemswork@gmail.com', 4, 3, 1, '24AC0013', '', 'July-2024', 0, '2024-07-23 09:56:00', 2, '2024-07-26 09:07:38', 0, 'Inactive'),
(17, 'ajay', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA0016', '', '', 0, '2024-07-23 14:46:12', 2, '2024-07-26 09:07:39', 0, 'Inactive'),
(18, 'rewqasdf', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA00199', '', '1 Year', 0, '2024-07-23 15:48:40', 2, '2024-07-26 09:07:39', 0, 'Inactive'),
(19, 'magesh', '9789867842', 'riyainfosystemswork@gmail.com', 4, 3, 1, '24CA0029', '456789321456', 'July-2024', 0, '2024-07-23 16:25:30', 2, '2024-07-26 09:07:40', 2, 'Inactive'),
(20, 'Hello', '9789867842', 'riyainfosystemswork@gmail.com', 5, 4, 1, '24CA0030', '', 'July-2024', 0, '2024-07-23 17:43:47', 2, '2024-07-26 09:07:41', 0, 'Inactive'),
(21, 'rajaaa', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA00111', '', '1st Year', 0, '2024-07-26 12:45:16', 2, '2024-07-26 09:07:42', 0, 'Inactive'),
(22, 'raj', '9894688091', 'riyainfosystemswork@gmail.com', 1, 2, 2, '24CA001111', '', '1st Year', 0, '2024-07-26 12:46:58', 2, '2024-07-26 09:07:30', 0, 'Inactive'),
(23, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 2, '24CA00135', '456789321456', '1', 0, '2024-07-26 14:04:41', 2, '2024-07-26 10:28:22', 2, 'Inactive'),
(24, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24AC0040', '', '1', 0, '2024-07-26 15:23:35', 2, '2024-07-27 09:38:41', 0, 'Inactive'),
(25, 'Riya Infosystems', '9789867842', 'riyainfosystemswork@gmail.com', 4, 1, 1, '24AC0048', '', '3', 0, '2024-07-26 15:25:27', 2, '2024-07-27 10:56:21', 0, 'Inactive'),
(26, 'raja', '9789867842', 'riyainfosystemswork@gmail.com', 1, 2, 1, '24CA00154', '', '2', 0, '2024-07-26 15:30:52', 2, '2024-07-27 10:56:24', 0, 'Inactive'),
(27, 'rdad', '7845593579', 'roririsoftpvtltd@gmail.com', 1, 1, 1, '24AC003435', '', '1', 0, '2024-07-27 14:07:53', 2, '2024-07-27 09:38:35', 0, 'Inactive'),
(28, 'wretwre', '0784559357', 'roririsoftpvtltd@gmail.com', 1, 1, 1, '24AC00343', '', '2', 0, '2024-07-27 14:27:13', 2, '2024-07-27 11:15:59', 0, 'Inactive'),
(29, 'dfgdef', '0784559357', 'roririsoftpvtltd@gmail.com', 1, 1, 2, '24AC0034', '', '2', 0, '2024-07-27 14:30:01', 2, '2024-07-27 10:54:14', 0, 'Active'),
(30, 'ewrtret', '7845593579', 'roririsoftpvtltd@gmail.com', 1, 1, 1, '24AC00340', '', '1', 0, '2024-07-27 15:24:19', 2, '2024-07-27 10:35:11', 0, 'Inactive'),
(31, 'erytre', '7845593579', 'roririsoftpvtltd@gmail.com', 1, 3, 1, '24AC003400', '', '2', 0, '2024-07-27 16:05:49', 2, '2024-07-27 10:55:30', 0, 'Active'),
(32, 'yuwet', '0784559357', 'roririsoftpvtltd@gmail.com', 1, 1, 2, '24AC0687', '', '1', 0, '2024-07-27 16:27:02', 2, '2024-07-27 10:57:02', 0, 'Active'),
(33, 'eytret', '0784559357', 'roririsoftpvtltd@gmail.com', 1, 1, 1, '24AC04365', '', '1', 0, '2024-07-27 16:46:37', 2, '2024-07-27 11:16:37', 0, 'Active');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `jeno_student`
--
ALTER TABLE `jeno_student`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jeno_fees`
--
ALTER TABLE `jeno_fees`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `jeno_payment_history`
--
ALTER TABLE `jeno_payment_history`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jeno_student`
--
ALTER TABLE `jeno_student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
