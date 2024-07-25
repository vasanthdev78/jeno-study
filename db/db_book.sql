-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 08:29 AM
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
(1, 1, 'Not Received', '0', 'Not Issued', '2024-07-19 16:52:04', 2, '2024-07-23 12:12:48', 0, 'Active'),
(2, 2, 'Not Received', '0', 'Not Issued', '2024-07-19 17:05:26', 2, '2024-07-19 11:35:26', 0, 'Active'),
(3, 3, 'Not Received', '0', 'Not Issued', '2024-07-19 17:19:13', 2, '2024-07-20 12:03:51', 0, 'Inactive'),
(4, 4, 'Not Received', '0', 'Not Issued', '2024-07-19 17:20:50', 2, '2024-07-19 11:50:50', 0, 'Active'),
(5, 5, 'Not Received', '0', 'Not Issued', '2024-07-19 17:21:46', 2, '2024-07-19 11:51:46', 0, 'Active'),
(6, 14, 'Not Received', '0', 'Not Issued', '2024-07-22 18:47:38', 2, '2024-07-22 13:18:22', 0, 'Inactive'),
(7, 15, 'Not Received', '0', 'Not Issued', '2024-07-23 09:54:29', 2, '2024-07-23 04:24:29', 0, 'Active'),
(8, 16, 'Not Received', '0', 'Not Issued', '2024-07-23 09:56:00', 2, '2024-07-23 04:26:00', 0, 'Active'),
(9, 17, 'Not Received', '0', 'Not Issued', '2024-07-23 14:46:12', 2, '2024-07-23 09:16:12', 0, 'Active'),
(10, 18, 'Not Received', '0', 'Not Issued', '2024-07-23 15:48:40', 2, '2024-07-23 10:18:40', 0, 'Active'),
(11, 19, 'Not Received', '0', 'Not Issued', '2024-07-23 16:25:30', 2, '2024-07-23 10:55:30', 0, 'Active'),
(12, 20, 'Not Received', '0', 'Not Issued', '2024-07-23 17:43:47', 2, '2024-07-23 12:14:38', 0, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jeno_book`
--
ALTER TABLE `jeno_book`
  ADD PRIMARY KEY (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jeno_book`
--
ALTER TABLE `jeno_book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
