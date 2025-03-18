-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 08:46 AM
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
-- Table structure for table `jeno_ledger`
--

CREATE TABLE `jeno_ledger` (
  `led_id` int(11) NOT NULL,
  `led_type` varchar(100) NOT NULL,
  `led_center_id` int(11) NOT NULL,
  `led_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `led_created_by` int(11) NOT NULL,
  `led_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `led_updated_by` int(11) NOT NULL,
  `led_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_ledger`
--

INSERT INTO `jeno_ledger` (`led_id`, `led_type`, `led_center_id`, `led_created_at`, `led_created_by`, `led_updated_at`, `led_updated_by`, `led_status`) VALUES
(1, 'bill', 1, '2024-08-23 13:14:06', 3, '2024-08-23 11:08:59', 3, 'Active'),
(2, 'salary', 1, '2024-08-23 13:53:16', 3, '2024-08-23 08:50:13', 3, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jeno_ledger`
--
ALTER TABLE `jeno_ledger`
  ADD PRIMARY KEY (`led_id`),
  ADD UNIQUE KEY `led_type` (`led_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jeno_ledger`
--
ALTER TABLE `jeno_ledger`
  MODIFY `led_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
