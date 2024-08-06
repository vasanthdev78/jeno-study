-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2024 at 09:36 AM
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
-- Table structure for table `jeno_opening`
--

CREATE TABLE `jeno_opening` (
  `open_id` int(11) NOT NULL,
  `open_date` date NOT NULL,
  `open_open_online` int(11) NOT NULL,
  `open_open_cash` int(11) NOT NULL,
  `open_close_online` int(11) NOT NULL,
  `open_close_cash` int(11) NOT NULL,
  `open_create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `open_update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `open_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeno_opening`
--

INSERT INTO `jeno_opening` (`open_id`, `open_date`, `open_open_online`, `open_open_cash`, `open_close_online`, `open_close_cash`, `open_create_at`, `open_update_at`, `open_status`) VALUES
(1, '2024-08-05', 0, 0, 5300, 6200, '2024-08-06 11:43:07', '2024-08-06 06:22:04', 'Active'),
(2, '2024-08-06', 5300, 6200, 10300, 10955, '2024-08-06 11:52:20', '2024-08-06 06:28:58', 'Active'),
(6, '2024-08-07', 10300, 10955, 0, 0, '2024-08-06 11:58:58', '2024-08-06 06:28:58', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jeno_opening`
--
ALTER TABLE `jeno_opening`
  ADD PRIMARY KEY (`open_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jeno_opening`
--
ALTER TABLE `jeno_opening`
  MODIFY `open_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
