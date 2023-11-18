-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 05:08 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studio c hair & beauty salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(5) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `client_id` int(5) NOT NULL,
  `employee_id` int(2) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_time_expected` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `canceled` tinyint(1) NOT NULL DEFAULT 0,
  `cancellation_reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `date_created`, `client_id`, `employee_id`, `start_time`, `end_time_expected`, `canceled`, `cancellation_reason`) VALUES
(11, '2021-03-20 08:22:00', 12, 3, '2021-03-22 06:00:00', '2021-03-22 06:20:00', 0, NULL),
(12, '2022-11-16 03:41:00', 13, 3, '2022-11-21 01:30:00', '2022-11-21 01:50:00', 0, NULL),
(13, '2022-11-16 03:52:00', 14, 2, '2022-11-26 01:45:00', '2022-11-26 02:05:00', 1, ''),
(14, '2022-11-16 03:53:00', 15, 1, '2022-11-21 01:15:00', '2022-11-21 01:30:00', 1, ''),
(15, '2022-11-16 03:54:00', 16, 1, '2022-11-21 02:00:00', '2022-11-21 02:20:00', 1, ''),
(17, '2022-11-16 03:56:00', 18, 1, '2022-11-17 01:45:00', '2022-11-17 02:05:00', 0, NULL),
(18, '2022-11-16 06:12:00', 19, 2, '2022-11-21 01:15:00', '2022-11-21 02:30:00', 0, NULL),
(19, '2022-11-16 06:36:00', 20, 2, '2022-11-26 09:30:00', '2022-11-26 09:50:00', 1, ''),
(20, '2022-11-16 07:12:00', 21, 1, '2022-11-22 07:00:00', '2022-11-22 07:25:00', 1, ''),
(21, '2022-11-16 07:15:00', 22, 1, '2022-11-17 01:00:00', '2022-11-17 01:20:00', 0, NULL),
(23, '2022-11-16 09:33:00', 24, 2, '2022-11-19 04:00:00', '2022-11-19 04:20:00', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `FK_client_appointment` (`client_id`),
  ADD KEY `FK_employee_appointment` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
