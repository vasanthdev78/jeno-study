-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 08:27 AM
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
(4, 1, '2024-08-09', 'Afternoon', '12-04', 3, '[\"gkgk\",\"ghkgl\",\"fgkgk\"]', '2024-07-26 10:22:51', 2, '2024-07-26 04:52:51', 0, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jeno_faculty`
--
ALTER TABLE `jeno_faculty`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `jeno_schedule`
--
ALTER TABLE `jeno_schedule`
  ADD PRIMARY KEY (`sch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jeno_faculty`
--
ALTER TABLE `jeno_faculty`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jeno_schedule`
--
ALTER TABLE `jeno_schedule`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
