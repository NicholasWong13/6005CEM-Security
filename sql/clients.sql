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
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `client_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `first_name`, `last_name`, `phone_number`, `client_email`) VALUES
(1, 'Dennis', 'S Embry', '651-779-6791', 'dennis_embry@gmail.com'),
(2, 'Bonnie', 'A Rivera', '714-327-5825', 'bonnie_rivera@yahoo.fr'),
(3, 'Keltoum', 'Adrar', '0634355566', 'ad.keltoum@gmail.com'),
(4, 'Hachemi', 'Jairi', '03033346655', 'jairi.hachemi123@gmail.com'),
(5, 'Idriss', 'Jairi', '0634308303', 'jairiidriss@gmail.com'),
(7, 'Arabi', 'Adarar', '033201039290', 'arabi.adrar@gmial.com'),
(8, 'dqsd', 'qsdqsd', '030300303', 'qsdqsdqs@d.ss'),
(12, 'fdhghdfyh', 'dfhdfh', '1234567890', 'asdas@asfds.sdf'),
(13, 'Jason', 'Bourne', '0173436514', 'jason@gmail.com'),
(14, 'Matt', 'Dick', '0173436513', 'matt@gmail.com'),
(15, 'Ran', 'Singh', '0123456789', 'singh@gmail.com'),
(16, 'SD', 'SD', '0123456789', 'SD@gmail.com'),
(18, 'KJ', 'Pen', '0123456987', 'kj@gmail.com'),
(19, 'A', 'S', '0123654789', 'as@gmail.com'),
(20, 'SA', 'AS', '0123645478', 'ASAW@gmail.com'),
(21, 'Mick', 'Furry', '0123654789', 'furry@gmail.com'),
(22, 'Since', 'You', '0123845697', 'you@gmail.com'),
(23, 'Kill', 'Joy', '0123654789', 'joy@gmail.com'),
(24, 'GG', 'WP', '0321456978', 'ggwp@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_email` (`client_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(5) NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
