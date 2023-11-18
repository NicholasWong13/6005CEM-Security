-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 05:09 PM
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
-- Table structure for table `employees_schedule`
--

CREATE TABLE `employees_schedule` (
  `id` int(5) NOT NULL,
  `employee_id` int(2) NOT NULL,
  `day_id` tinyint(1) NOT NULL,
  `from_hour` time NOT NULL,
  `to_hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees_schedule`
--

INSERT INTO `employees_schedule` (`id`, `employee_id`, `day_id`, `from_hour`, `to_hour`) VALUES
(49, 3, 6, '11:00:00', '17:00:00'),
(50, 3, 7, '11:00:00', '17:00:00'),
(51, 2, 1, '13:00:00', '17:00:00'),
(52, 2, 2, '11:00:00', '17:00:00'),
(53, 2, 3, '10:00:00', '17:00:00'),
(54, 2, 4, '01:00:00', '17:00:00'),
(55, 2, 5, '02:00:00', '17:00:00'),
(56, 4, 6, '11:00:00', '17:00:00'),
(57, 4, 7, '11:00:00', '17:00:00'),
(58, 1, 1, '11:00:00', '15:00:00'),
(59, 1, 2, '13:00:00', '17:00:00'),
(60, 1, 3, '23:00:00', '15:00:00'),
(61, 1, 4, '13:00:00', '17:00:00'),
(62, 1, 5, '23:00:00', '15:00:00'),
(63, 1, 6, '15:00:00', '15:00:00'),
(64, 1, 7, '15:00:00', '15:00:00'),
(65, 6, 1, '11:00:00', '15:00:00'),
(66, 6, 3, '11:00:00', '17:00:00'),
(67, 6, 5, '11:00:00', '15:00:00'),
(68, 7, 6, '11:00:00', '18:00:00'),
(69, 7, 7, '11:00:00', '18:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees_schedule`
--
ALTER TABLE `employees_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_emp` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees_schedule`
--
ALTER TABLE `employees_schedule`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
