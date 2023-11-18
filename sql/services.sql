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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(5) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_description` varchar(255) NOT NULL,
  `service_price` decimal(6,2) NOT NULL,
  `service_duration` int(5) NOT NULL,
  `category_id` int(2) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_description`, `service_price`, `service_duration`, `category_id`, `img`) VALUES
(4, 'Hair Cutting', 'We specialize in all types of latest haircut. Our skillful hairstylists are aware of fashion trend and are willing to share their opinion with you on which hairstyle is the best for you.', '20.00', 20, 2, 'haircut.jpg'),
(5, 'Hair Cut &amp; Beard', 'Providing the fresher styles &amp; cuts for your needs along with beard trimming services or shaving', '30.00', 30, 2,'hairbeard.jpg'),
(6, 'Smooth Shave', 'Grew a long beard during the MCO period? We will help you clean shave that beard right off', '15.00', 10, 10,'shave.jpeg'),
(7, 'Beard Trimming', 'Want to keep the beard but style? Then come on over and get the fresher styles for your beard', '16.00', 15, 10,'beard-trimming'),
(8, 'Hair Treatment', 'In Studio C Hair &amp; Beauty Salon, we offer a free thorough consultation and a variety of hair and scalp treatments to suit your hair and scalp needs because we understand how important it is to keep our hair well and healthy.', '20.00', 20, 3,'treatment.jpg'),
(9, 'Hair Colouring', 'We understand that sometimes you just have to get that transformation. Whether it’s just a simple touch up or a whole dramatic makeover, our colorists will make sure to achieve the result that you want, making all the heads turn for you', '14.00', 30, 3,'colouring.jpg'),
(11, 'Hair Washing', 'No water at home? House flooded? Then come and wash your hair at our studio', '10.00', 10, 9,'washing.jpg'),
(12, 'Hair Wash &amp; Blow', 'Our goal is to make Client have a Dancing hair and Refresh scalp, We provide a Blow Straight, Iron Curl. We also provide a luxury shampoo &amp; Conditional. Montibello from Spain ask our hair stylist to know more the Montibello shampoo features.', '30.00', 30, 9,'wash.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `FK_service_category` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `FK_service_category` FOREIGN KEY (`category_id`) REFERENCES `service_categories` (`category_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
