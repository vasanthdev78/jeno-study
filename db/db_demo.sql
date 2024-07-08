-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 06:52 AM
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
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `role` enum('Super Admin','Admin','MD','Team Leader','Jr.Developer','Student','Sr.Developer','HR','CEO','UI/UX Designer') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`user_id`, `name`, `username`, `pass`, `role`, `created_date`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'Super Admin', '2024-06-10 10:10:48', 'Active'),
(2, 'vasnth M', 'vasnthM', 'vasnthM482', 'Jr.Developer', '2024-06-10 10:35:22', 'Active'),
(3, 'Yesu Balan', 'YesuBalan', 'YesuBalan539', 'Student', '2024-06-10 12:13:30', 'Active'),
(4, 'Gnana Jebastin', 'GnanaJebastin', 'GnanaJebastin915', 'Student', '2024-06-15 14:18:09', 'Active'),
(5, 'Asha T', 'AshaT', 'AshaT306', 'Jr.Developer', '2024-06-17 14:53:01', 'Active'),
(6, 'Jebarlin Dania', 'JebarlinDania', 'JebarlinDania564', 'Student', '2024-06-18 12:40:58', 'Active'),
(7, 'Jebarathi S', 'JebarathiS', 'JebarathiS676', 'Student', '2024-06-18 12:44:43', 'Active'),
(8, 'KingJohn Nicks', 'KingJohnNicks', 'KingJohnNicks252', 'Student', '2024-06-18 12:55:11', 'Active'),
(9, 'Jebarli Dania', 'JebarliDania', 'JebarliDania902', 'Student', '2024-06-18 13:01:58', 'Active'),
(10, 'Uma Saraswathi', 'UmaSaraswathi', 'UmaSaraswathi689', 'Student', '2024-06-18 13:02:37', 'Inactive'),
(11, 'KingJohn N', 'KingJohnN', 'KingJohnN966', 'Student', '2024-06-18 14:57:20', 'Active'),
(15, 'Asha1 T', 'Asha1T', 'Asha1T265', 'Student', '2024-06-18 15:09:02', 'Active'),
(17, 'Asha12 T', 'Asha12T', 'Asha12T818', 'Student', '2024-06-18 15:09:44', 'Active'),
(18, 'Bala Ajinika', 'BalaAjinika', 'BalaAjinika121', 'Student', '2024-06-18 16:08:41', 'Inactive'),
(19, 'Jebarlin  Dania', 'Jebarlin Dania732', 'Jebarlin Dania292', 'Jr.Developer', '2024-06-19 12:55:01', 'Active'),
(20, 'Dania J', 'DaniaJ', 'DaniaJ610', 'Student', '2024-06-20 14:20:16', 'Active'),
(21, 'Raj Kumar', 'RajKumar', 'RajKumar803', 'Team Leader', '2024-06-25 09:39:03', 'Active'),
(25, 'Asha 1 T', 'Asha 1T', 'Asha 1T435', 'Jr.Developer', '2024-06-25 09:45:32', 'Active'),
(26, 'Jebarli J', 'JebarliJ', 'JebarliJ297', 'Jr.Developer', '2024-06-26 09:59:00', 'Active'),
(27, 'Jebarlij dania', 'Jebarlijdania', 'Jebarlijdania302', 'Student', '2024-06-26 10:41:42', 'Active'),
(28, 'Jebarlij dania', 'Jebarlijdania514', 'Jebarlijdania270', 'Student', '2024-06-26 10:41:44', 'Inactive'),
(29, 'Jebarlij dania', 'Jebarlijdania956', 'Jebarlijdania961', 'Student', '2024-06-26 10:41:44', 'Inactive'),
(30, 'Jebarlij dania', 'Jebarlijdania747', 'Jebarlijdania631', 'Student', '2024-06-26 10:41:46', 'Inactive'),
(31, 'Jebarlij dania', 'Jebarlijdania978', 'Jebarlijdania581', 'Student', '2024-06-26 10:41:48', 'Inactive'),
(32, 'kavi s', 'kavis', 'kavis481', 'Student', '2024-06-26 10:50:49', 'Active'),
(33, 'Jons J', 'JonsJ', 'JonsJ288', 'Student', '2024-06-26 11:02:09', 'Active'),
(34, 'Durga s', 'Durgas', 'Durgas930', 'Jr.Developer', '2024-06-28 14:21:31', 'Active'),
(35, 'Durga s', 'Durgas139', 'Durgas312', 'Student', '2024-06-28 14:32:38', 'Active');

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

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`stu_id`, `user_id`, `entity_id`, `course_id`, `course_month`, `first_name`, `last_name`, `stu_gender`, `stu_aadhar`, `stu_marksheet`, `stu_qrcode`, `stu_blood_group`, `stu_cast`, `stu_religion`, `stu_mother_tongue`, `stu_native`, `stu_image`, `registration_date`, `stu_status`, `stu_created_date`, `stu_updated_date`, `client_id`) VALUES
(1, 3, 3, 2, 12, 'Yesu', 'Balan', 'Male', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-10 12:13:30', '2024-06-25 07:27:34', 0),
(2, 4, 1, 1, 3, 'Gnana', 'Jebastin', 'Male', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-15 14:18:09', '2024-06-19 07:40:43', 0),
(3, 6, 3, 3, 12, 'Jebarlin', 'Dania', 'Female', 'JebarlinDania_aadhar.jpeg', 'JebarlinDania_marksheet.jpg', '', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 12:40:58', '2024-06-25 07:10:12', 0),
(4, 7, 3, 2, 12, 'Jebarathi', 'S', 'Female', '', '', 'JebarathiS_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 12:44:43', '2024-06-20 11:11:03', 0),
(5, 8, 3, 2, 6, 'KingJohn', 'Nicks', 'Male', '', '', 'KingJohnNicks_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 12:55:11', '2024-06-26 05:33:57', 0),
(6, 9, 1, 1, 3, 'Jebarlin', 'Dania', 'Female', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 13:01:58', '2024-06-20 11:11:07', 0),
(7, 10, 3, 2, 6, 'Uma', 'Saraswathi', 'Female', '', '', 'UmaSaraswathi_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Inactive', '2024-06-18 13:02:37', '2024-06-25 04:20:57', 0),
(8, 11, 3, 2, 6, 'KingJohn', 'N', 'Male', 'KingJohnN_aadhar.jpeg', 'KingJohnN_marksheet.webp', 'KingJohnN_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 14:57:20', '2024-06-18 09:29:34', 0),
(9, 15, 1, 1, 3, 'Asha1', 'T', 'Female', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 15:09:02', '2024-06-20 11:11:11', 0),
(10, 17, 1, 1, 3, 'Asha12', 'T', 'Female', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 15:09:44', '2024-06-20 11:11:15', 0),
(11, 18, 3, 3, 3, 'Bala', 'Ajinika', 'Female', '', '', 'BalaAjinika_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 16:08:41', '2024-06-27 11:07:16', 0),
(12, 20, 3, 2, 3, 'Dania', 'J', 'Female', '', '', 'DaniaJ_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-20 14:20:17', '2024-06-26 05:19:48', 0),
(13, 27, 3, 3, 3, 'Jebarlij', 'dania', 'Female', '', '', 'Jebarlijdania_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-26 10:41:42', '2024-06-26 05:11:43', 0),
(14, 28, 3, 3, 3, 'Jebarlij', 'dania', 'Female', '', '', 'Jebarlijdania_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Inactive', '2024-06-26 10:41:44', '2024-06-26 05:12:46', 0),
(15, 29, 3, 3, 3, 'Jebarlij', 'dania', 'Female', '', '', 'Jebarlijdania_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Inactive', '2024-06-26 10:41:44', '2024-06-26 05:12:43', 0),
(16, 30, 3, 3, 3, 'Jebarlij', 'dania', 'Female', '', '', 'Jebarlijdania_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Inactive', '2024-06-26 10:41:46', '2024-06-26 05:19:31', 0),
(17, 31, 3, 3, 3, 'Jebarlij', 'dania', 'Female', '', '', 'Jebarlijdania_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Inactive', '2024-06-26 10:41:48', '2024-06-26 05:19:24', 0),
(18, 32, 3, 1, 6, 'kavi', 's', 'Female', '', '', 'kavis_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-26 10:50:49', '2024-06-26 05:20:49', 0),
(19, 33, 1, 1, 6, 'Jons', 'J', 'Female', '', '', 'JonsJ_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-26 11:02:09', '2024-06-28 09:54:42', 0),
(20, 35, 3, 3, 6, 'Durga', 's', 'Female', 'Durgas139_aadhar.jpg', 'Durgas139_marksheet.jpg', 'Durgas_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-28 14:32:38', '2024-06-28 09:06:47', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_user_name` (`username`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
