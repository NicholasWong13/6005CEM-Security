-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 04:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
(23, '2022-11-16 09:33:00', 24, 2, '2022-11-19 04:00:00', '2022-11-19 04:20:00', 0, NULL),
(24, '2022-11-17 09:47:00', 24, 7, '2022-11-19 08:30:00', '2022-11-19 08:50:00', 0, NULL),
(25, '2022-11-18 04:02:00', 28, 1, '2022-11-22 05:00:00', '2022-11-22 05:20:00', 1, 'Busy'),
(26, '2022-11-18 04:02:00', 29, 7, '2022-11-26 09:00:00', '2022-11-26 09:10:00', 0, NULL),
(27, '2022-11-18 04:02:00', 2, 7, '2022-11-26 09:00:00', '2022-11-26 09:10:00', 0, NULL),
(28, '2022-11-18 04:03:00', 30, 6, '2022-11-23 03:30:00', '2022-11-23 06:15:00', 0, NULL),
(29, '2022-11-19 07:03:00', 31, 1, '2022-11-21 03:00:00', '2022-11-21 04:15:00', 0, NULL),
(30, '2022-11-19 07:03:00', 3, 1, '2022-11-21 03:00:00', '2022-11-21 04:15:00', 0, NULL),
(31, '2022-11-20 06:50:00', 32, 6, '2022-11-24 08:30:00', '2022-11-24 08:50:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barber_admin`
--

CREATE TABLE `barber_admin` (
  `admin_id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barber_admin`
--

INSERT INTO `barber_admin` (`admin_id`, `username`, `email`, `full_name`, `password`) VALUES
(1, 'admin', 'administrator1@gmail.com', 'Administrator', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(2, 'Admin2', 'administrator@gmail.com', 'Administrator', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'Shampoo', 'shampoo'),
(2, 'Conditioner', 'conditioner'),
(3, 'Mens', 'mens');

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
(28, 'Nicholas', 'Wong', '0104412818', 'nick@gmail.com'),
(29, 'John', 'Luke', '0123456789', 'john@gmail.com'),
(30, 'Ran', 'Singh', '0128271625', 'Singh@gmail.com'),
(31, 'Heloo', 'PPL', '0123948624', 'hello@gmail.com'),
(32, 'Alice', 'Lim', '0196583612', 'alice@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `msg`) VALUES
(5, 'Jack', 'Jack@email.com', 'Whats up'),
(16, 'Carrie', 'carrie@gmail.com', 'Hello there, do you open on Sunday?'),
(17, 'Nicholas', 'nicholaswong613@gmail.com', 'Hi'),
(18, 'Alice', 'alice@gmail.com', 'Hi');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(14, 9, 11, 2),
(15, 9, 13, 5),
(16, 9, 3, 2),
(17, 9, 1, 3),
(18, 10, 13, 3),
(19, 10, 2, 4),
(20, 10, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(2) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `phone_number`, `email`) VALUES
(1, 'OSCAR', 'MBO', '0123456789', 'Oscar@Studioc.com.my'),
(4, 'MIKE', 'ROSS', '0125874991', 'Mike@Studioc.com.my'),
(6, 'JESSICA', 'RIDER', '0129874563', 'Rider@Studioc.com.my'),
(7, 'ALICE YIE', 'YEE', '0178964124', 'YY@Studioc.com.my');

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
(70, 1, 2, '13:00:00', '17:00:00'),
(71, 1, 3, '23:00:00', '15:00:00'),
(72, 1, 4, '13:00:00', '17:00:00'),
(73, 1, 5, '23:00:00', '15:00:00'),
(74, 1, 6, '15:00:00', '15:00:00'),
(75, 1, 7, '15:00:00', '15:00:00'),
(76, 4, 6, '11:00:00', '17:00:00'),
(77, 4, 7, '11:00:00', '17:00:00'),
(78, 6, 3, '11:00:00', '17:00:00'),
(79, 6, 4, '09:00:00', '18:00:00'),
(80, 6, 5, '11:00:00', '15:00:00'),
(81, 7, 6, '11:00:00', '18:00:00'),
(82, 7, 7, '11:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(13) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `age`, `email`, `phone`, `grade`, `msg`) VALUES
(11, 'Huvan Darvend', 25, 'Huvan@gmail.com', 192133111, 'Very Good', 'Very Good services; I am very happy with my hair cut choice. Recommended by my barber'),
(13, 'Matthew', 21, 'matt@gmail.com', 123436414, 'Good', 'Very good service; very timely done'),
(14, 'Alex', 21, 'matt@gmail.com', 123436414, 'Very Good', 'Very good service; i like the new barber styling '),
(16, 'Carrie', 21, 'carrie@gmail.com', 123411131, 'Good', 'I like the service, nice people'),
(0, 'Nick', 16, 'nicholaswong613@gmail.com', 10, 'Excellent', '123'),
(0, 'Nick', 16, 'nicholaswong613@gmail.com', 10, 'Excellent', '123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `subtotal` float(6,2) NOT NULL DEFAULT 0.00,
  `order_status` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `email`, `address`, `address2`, `country`, `state`, `zipcode`, `subtotal`, `order_status`, `created_at`, `updated_at`) VALUES
(4, 'Nicholas', 'Wong', 'nicholaswongkx@gmail.com', 'Penang', 'Penang', 'Malaysia', 'Penang', '11900', 0.00, 'confirmed', '2022-11-19 08:19:04', '2022-11-19 08:19:04'),
(5, 'Nicholas', 'Wong', 'nicholaswongkx@gmail.com', 'Penang', 'Penang', 'Malaysia', 'Penang', '11900', 0.00, 'confirmed', '2022-11-19 08:20:32', '2022-11-19 08:20:32'),
(6, 'Nicholas', 'Wong', 'nicholaswongkx@gmail.com', 'Penang', 'Penang', 'Malaysia', 'Penang', '11900', 0.00, 'confirmed', '2022-11-19 08:26:45', '2022-11-19 08:26:45'),
(7, 'Nicholas', 'Wong', 'nicholaswongkx@gmail.com', 'Penang', 'Penang', 'Malaysia', 'Penang', '11900', 0.00, 'confirmed', '2022-11-19 08:27:06', '2022-11-19 08:27:06'),
(8, 'Nicholas', 'Wong', 'nicholaswongkx@gmail.com', 'Penang', 'Penang', 'Malaysia', 'Penang', '11900', 0.00, 'confirmed', '2022-11-19 08:27:44', '2022-11-19 08:27:44'),
(9, 'Nicholas', 'Wong', 'nicholaswongkx@gmail.com', 'Penang', 'Penang', 'Malaysia', 'Penang', '11900', 0.00, 'confirmed', '2022-11-19 08:32:58', '2022-11-19 08:32:58'),
(10, 'Nicholas', 'Wong', 'nicholaswongkx@gmail.com', 'Penang', 'Penang', 'Malaysia', 'Penang', '11900', 0.00, 'confirmed', '2022-11-19 08:34:04', '2022-11-19 08:34:04'),
(11, 'Nicholas', 'Wong', 'nicholaswongkx@gmail.com', 'Penang', 'Penang', 'Malaysia', 'Penang', '11900', 0.00, 'confirmed', '2022-11-19 08:34:42', '2022-11-19 08:34:42'),
(12, 'Nicholas', 'Wong', 'nicholaswongkx@gmail.com', 'Penang', 'Penang', 'Malaysia', 'Penang', '11900', 0.00, 'confirmed', '2022-11-19 08:35:07', '2022-11-19 08:35:07'),
(13, 'Ran', 'Singh', 'hello@gmail.com', 'Penang', 'Penang', 'Malaysia', 'Penang', '11700', 0.00, 'confirmed', '2022-11-19 14:58:52', '2022-11-19 14:58:52'),
(14, 'Nicholas', 'Wong', 'nicholaswongkx@gmail.com', 'Penang', 'Penang', 'Malaysia', 'Penang', '11900', 0.00, 'confirmed', '2022-11-20 10:52:31', '2022-11-20 10:52:31'),
(15, 'Ran', 'Singh', 'ran@gmail.com', 'Penang', 'Penang', 'Malaysia', 'Penang', '11900', 0.00, 'confirmed', '2022-11-20 14:54:02', '2022-11-20 14:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_price` float(6,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` double(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `qty`, `subtotal`) VALUES
(4, 4, NULL, NULL, NULL, NULL, NULL),
(5, 5, NULL, NULL, NULL, NULL, NULL),
(6, 6, NULL, NULL, NULL, NULL, NULL),
(7, 7, NULL, NULL, NULL, NULL, NULL),
(8, 8, NULL, NULL, NULL, NULL, NULL),
(9, 9, NULL, NULL, NULL, NULL, NULL),
(10, 11, NULL, NULL, NULL, NULL, NULL),
(11, 12, NULL, NULL, NULL, NULL, NULL),
(12, 13, NULL, NULL, NULL, NULL, NULL),
(13, 14, NULL, NULL, NULL, NULL, NULL),
(14, 15, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `code` varchar(255) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `discount` decimal(7,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `code`, `photo`, `date_view`, `discount`, `quantity`, `counter`) VALUES
(1, 1, 'Biolage Color Last Shampoo', 'Biolage Colorlast Shampoo by Matrix gently cleanses your hair while helping you maintain the depth and tone of your beautiful salon color. This low pH formula protects your color for up to nine weeks.', 'Biolage-Color-Last-Shampoo', 80, 'S01', 'assets/img/product_images/biolagecolorshampoo.jpg', '2022-11-19', '0.00', 10, 1),
(2, 1, 'Biolage Hydra Source Shampoo', 'Hydrate your hair with Biolage Hydrasource Shampoo by Matrix, adding more moisture with just one application. This moisturizing shampoo is inspired by natures aloe plant to protect against dryness and leave hair feeling soft and manageable.', 'Biolage-Hydra-Source-Shampoo', 70, 'S02', 'assets/img/product_images/biolagehydrashampoo.jpg', '2022-11-20', '0.00', 10, 3),
(3, 1, 'Paul Mitchell Tea Tree Special Shampoo', 'Get a refreshing start with Paul Mitchell Tea Tree Special Shampoo. This fragrant cleanser gets rid of impurities and treats your senses to invigorating peppermint and tea tree oil.', 'Paul-Mitchell-Tea-Tree-Special-Shampoo', 90, 'S03', 'assets/img/product_images/paulmitchellteatreeshampoo.jpg', '2022-11-20', '0.00', 10, 2),
(4, 1, 'Redken Color Extend Shampoo For Color-Treated Hair', 'Redken Color Extend Shampoo for Color-Treated Hair gently cleanses and protects to leave hair manageable, refreshed and shiny.', 'Redken-Color-Extend-Shampoo-For-Color-Treated-Hair', 40, 'S04', 'assets/img/product_images/redkencolorshampoo.jpg', '2022-11-02', '0.00', 10, 1),
(5, 1, 'Biolage Volume Bloom Shampoo', 'Turn up the volume on fine hair by as much as 70 percent using Biolage Volumebloom Shampoo by Matrix that gently cleanses fine hair while giving it some \"oomph\".', 'Biolage-Hydra-Source-Shampoo', 70, 'S05', 'assets/img/product_images/biolagehydrashampoo.jpg', '2022-11-02', '0.00', 10, 1),
(6, 1, 'TIGI Bed Head Oh Bee Hive! Matte Dry Shampoo', 'TIGI Bed Head Oh Bee Hive! Matte Dry Shampoo creates volume and adds texture to hair. Perfect for styling any up-do!', 'TIGI-Bed-Head-Oh-Bee-Hive!-Matte-Dry-Shampoo', 20, 'S06', 'assets/img/product_images/mattedryshampoo-tigibed.jpg', '2022-11-02', '0.00', 10, 1),
(7, 1, 'Joico K-PAK Color Therapy Shampoo', 'Joico K-PAK Color Therapy Shampoo helps to gently cleanse multi-processed hair.', 'Joico-K-PAK-Color-Therapy-Shampoo', 75, 'S07', 'assets/img/product_images/joico-colortherapyshampoo.jpg', '2022-11-02', '0.00', 10, 1),
(8, 1, 'Joico Moisture Recovery Moisturizing Shampoo', 'When your hair is thirsty and parched, it will literally lap up the hydration that our Moisture Recovery Shampoo pours into each and every strand. Our rich, luxurious formula actually restores smoothness and elasticity to dehydrated hair.', 'Joico-Moisture-Recovery-Moisturizing-Shampoo', 75, 'S08', 'assets/img/product_images/joico-recoveryshampoo.jpg', '2022-11-02', '0.00', 10, 1),
(9, 1, 'Joico Defy Damage Protective Shampoo', 'Joico Defy Damage Protective Shampoo is a rich shampoo that gently cleanses away impurities while helping boost hairs natural defense against all types of daily damage.', 'Joico-Defy-Damage-Protective-Shampoo', 75, 'S09', 'assets/img/product_images/joico-damageprotectiveshampoo.jpg', '2022-11-02', '0.00', 10, 1),
(10, 1, 'Matrix Total Results Mega Sleek Shampoo', 'Matrix Total Results Mega Sleek Shampoo is infused with shea butter to provide up to five times smoother hair. Gently cleanse your locks with the shampoo, and gain all-day humidity protection.', 'Matrix-Total-Results-Mega-Sleek-Shampoo', 50, 'S10', 'assets/img/product_images/matrix-megasleekshampoo.jpg', '2022-11-02', '0.00', 10, 1),
(11, 1, 'Hempz Triple Moisture Moisture-Rich Daily Herbal Replenishing Shampoo', 'Moisturize and replenish your hair with the Hempz Triple Moisture Moisture-rich Daily Herbal Replenishing Shampoo.', 'Hempz-Triple-Moisture-Moisture-Rich-Daily-Herbal-Replenishing-Shampoo', 45, 'S11', 'assets/img/product_images/hempz-replenishingshampoo.jpg', '2022-11-02', '0.00', 10, 1),
(12, 1, 'Hempz Sweet Pineapple And Honey Melon Herbal Volumizing Shampoo', 'Breathe new life into fine, life-less hair by creating thick, voluminous body with Hempz Sweet Pineapple and Honey Melon Herbal Volumizing Shampoo.', 'Hempz-Sweet-Pineapple-And-Honey-Melon-Herbal-Volumizing-Shampoo', 30, 'S12', 'assets/img/product_images/hempz-volumizingshampoo.jpg', '2022-11-02', '0.00', 10, 1),
(13, 1, 'Kenra Shampoo - Volumizing', 'Kenra Shampoo - Volumizing is Volume Spray 25s best friend - use together for maximum volume!', 'Kenra-Shampoo-Volumizing', 45, 'S13', 'assets/img/product_images/kenrashampoo.jpg', '2022-11-02', '0.00', 10, 1),
(14, 1, 'Brocato Cloud 9 Daily Restoring Shampoo', 'Brocato Cloud 9 Daily Restoring Shampoo reinvigorates dry, frequently processed and fragile hair, and with its ingenious Cloud 9 Miracle Repair Complex, this gentle shampoo prevents further damage and keeps hair looking and feeling healthy.', 'Brocato-Cloud-9-Daily-Restoring-Shampoo', 100, 'S14', 'assets/img/product_images/cloud9restoringshampoo.jpg', '2022-11-02', '0.00', 10, 1),
(15, 1, 'Joico Blonde Life Violet Shampoo', 'Joico Blonde Life Violet Shampoo is a cool tone-perfecting shampoo that gently cleanses while neutralizing brassy, yellow hues to maintain brilliantly bright blondes. Nutrient-rich Tamanu and Monoi oils help restore strenhth, softness and shine.', 'Joico-Blonde-Life-Violet-Shampoo', 75, 'S15', 'assets/img/product_images/joico-violetshampoo.jpg', '2022-11-02', '0.00', 10, 1),
(16, 1, 'Joico JoiFULL Volumizing Shampoo', 'Joico JoiFULL Volumizing Shampoo has gentle cleanser that wash away excess oil and impurities that can weigh hair down, while Bamboo Extract, Rice Protein and Lotus Flower add airy body and fullness.', 'Joico-JoiFULL-Volumizing-Shampoo', 75, 'S16', 'assets/img/product_images/joico-volumizingshampoo.jpg', '2022-11-02', '0.00', 10, 1),
(17, 1, 'Redken Extreme Strengthening Shampoo', 'Fortify, cleanse, strengthen and restore distressed hair with Redken Extreme Strengthening Shampoo.', 'Redken-Extreme-Strengthening-Shampoo', 85, 'S17', 'assets/img/product_images/redkenstrengtheningshampoo.jpg', '2022-11-02', '0.00', 10, 1),
(18, 1, 'Matrix Total Results Color Obsessed So Silver Toning Shampoo', 'With Matrix Total Results Color Obsessed So Silver Toning Shampoo, enhance the brightness of grey, white or blonde color-treated hair. And, neutralize unappealing brassiness and dull, yellow tones with the gentle cleanser.', 'Matrix-Total-Results-Color-Obsessed-So-Silver-Toning-Shampoo', 35, 'S18', 'assets/img/product_images/matrix-toningshampoo.jpg', '2022-11-18', '0.00', 10, 1),
(19, 1, 'Matrix Total Results High Amplify Shampoo', 'Matrix Total Results High Amplify Shampoo rescues fine, limp hair. The volumizing shampoo fortifies the structure of hair fibers, and delivers instant lift.', 'Matrix-Total-Results-High-Amplify-Shampoo', 35, 'S19', 'assets/img/product_images/matrix-amplifyshampoo.jpg', '2022-11-02', '0.00', 10, 1),
(20, 1, 'TIGI Bed Head Recovery Moisture Rush Shampoo', 'This hydrating shampoo, with cactus water, gives a hit of moisture and a boost of shine! Perfect for dry, damaged tresses that need a moisture hit!', 'TIGI-Bed-Head-Recovery-Moisture-Rush-Shampoo', 25, 'S20', 'assets/img/product_images/tigi-moisturerushshampoo.jpg', '2022-11-02', '0.00', 10, 1),
(21, 2, 'Redken All Soft Softening Conditioner', 'Detangle, condition and soften dry, brittle hair with Redken All Soft Softening Conditioner.', 'Redken-All-Soft-Softening-Conditioner', 65, 'C01', 'assets/img/product_images/redkensofteningconditioner.jpg', '2022-11-02', '0.00', 10, 1),
(22, 2, 'Biolage Hydra Source Conditioner', 'Drench your hair in luxurious moisture using Biolage Hydrasource Conditioner by Matrix. Inspired by the aloe plant, this hydrating formula seals in moisture while adding shine and manageability.', 'Biolage-Hydra-Source-Conditioner', 60, 'C02', 'assets/img/product_images/biolagesourceconditioner.jpg', '2022-11-20', '0.00', 10, 1),
(23, 2, 'Paul Mitchell The Conditioner', 'Paul Mitchell The Conditioner is a leave-in moisturizer that smoothes strands. Apply this conditioning formula to enhance hairs texture and prevent dryness.', 'Paul-Mitchell-The-Conditioner', 60, 'C03', 'assets/img/product_images/paulmitchelltheconditioner.jpg', '2022-11-20', '0.00', 10, 1),
(24, 2, 'Biolage Scalpsync Cooling Mint Conditioner', 'Biolage Scalpsync Cooling Mint Conditioner promotes healthy looking hair and scalp by balancing the scalp with mint and peppermint leaf extract and leaves hair clean and healthy.', 'Biolage-Scalpsync-Cooling-Mint-Conditioner', 70, 'C04', 'assets/img/product_images/biolagecoolingmintconditioner.jpg', '2022-11-02', '0.00', 10, 1),
(25, 2, 'Aluram Moisturizing Conditioner', 'Aluram Moisturizing Conditioner has a lush, silicone-free formula which helps strengthen & soften hair while replenishing essential moisture. Recommended Hair Type: Medium to Coarse Hair', 'Aluram-Moisturizing-Conditioner', 35, 'C05', 'assets/img/product_images/aluramconditioner.jpg', '2022-11-02', '0.00', 10, 1),
(26, 2, 'Keratin Complex Color Care Smoothing Conditioner', 'Keratin Complex Smoothing Therapy Keratin Color Care Conditioner is a hydrating conditioner formulated to smooth, soften and protect color-treated hair.', 'Keratin-Complex-Color-Care-Smoothing-Conditioner', 38, 'C06', 'assets/img/product_images/keratinsmoothingconditioner.jpg', '2022-11-02', '0.00', 10, 1),
(27, 2, 'Joico Color Balance Purple Conditioner', 'The Joico Color Balance Purple Conditioner nourishes and protects while neutralizing yellow tones to maintain beautiful blonde/gray hair.', 'Joico-Color-Balance-Purple-Conditioner', 58, 'C07', 'assets/img/product_images/joico-colorpurpleconditioner.jpg', '2022-11-02', '0.00', 10, 1),
(28, 2, 'Abba Pure Moisture Conditioner', 'Abba Pure Moisture Conditioner is a natural solution that helps repair and hydrate dry, stressed hair and scalp.', 'Abba-Pure-Moisture-Conditioner', 20, 'C08', 'assets/img/product_images/abbamoistureconditioner.jpg', '2022-11-02', '0.00', 10, 1),
(29, 2, 'Redken All Soft Mega Conditioner', 'Redken All Soft Mega Conditioner contains hydrating properties that brings mega moisture to severely dry, coarse hair.', 'Redken-All-Soft-Mega-Conditioner', 45, 'C09', 'assets/img/product_images/redkenmegaconditioner.jpg', '2022-11-02', '0.00', 10, 1),
(30, 2, 'Joico Colorful Anti-Fade Conditioner', 'Dye-ing to preserve that fierce, fabulous, vibrant color long after your salon visit? Commit for the long haul with this anti-fade home care line.', 'Joico-Colorful-Anti-Fade-Conditioner', 30, 'C10', 'assets/img/product_images/joico-antifadeconditioner.jpg', '2022-11-02', '0.00', 10, 1),
(31, 3, 'American Crew Firm Hold Styling Gel', 'American Crew Firm Hold Styling Gel is superior in hold and shine. This gel provides styles that will last all day.', 'American-Crew-Firm-Hold-Styling-Gel', 44, 'M01', 'assets/img/product_images/americancrew-firmholdstylinggel.jpg', '2022-11-20', '0.00', 15, 1),
(32, 3, 'American Crew Fiber', 'American Crew Fiber is a strong yet pliable hold styling aid with a matte finish. Fiber helps thicken and texturize hair.', 'American-Crew-Fiber', 30, 'M02', 'assets/img/product_images/americancrew-fiber.jpg', '2022-11-02', '0.00', 10, 1),
(33, 3, 'American Crew Forming Cream', 'American Crew Forming Cream provides hold, excellent pliability, and a natural shine. This cream works well with all hair types.', 'American-Crew-Forming-Cream', 30, 'M03', 'assets/img/product_images/americancrew-formingcream.jpg', '2022-11-02', '0.00', 10, 1),
(34, 3, 'American Crew Pomade', 'American Crew Pomade is a medium hold styling aid. This pomade leaves a high shine finish.', 'American-Crew-Pomade', 30, 'M04', 'assets/img/product_images/americancrew-pomade.jpg', '2022-11-02', '0.00', 10, 1),
(35, 3, 'American Crew 3 In 1 Travel Size', 'American Crew 3-in-1 Travel Size makes cleansing easy. This all-in-one shampoo, conditioner and body wash revitalizes and restores hair while conditioning skin.', 'American-Crew-3-In-1-Travel-Size', 10, 'M05', 'assets/img/product_images/americancrew-3in1travelsize.jpg', '2022-11-02', '0.00', 10, 1),
(36, 3, 'American Crew Grooming Spray', 'American Crew Grooming Spray is a finishing spray with a buildable hold. This spray can be used alone or with other styling aids.', 'American-Crew-Grooming-Spray', 18.9, 'M06', 'assets/img/product_images/americancrew-groomingspray.jpg', '2022-11-02', '0.00', 10, 1),
(37, 3, 'American Crew Light Hold Styling Gel', 'American Crew Light Hold Styling Gel is an airy, non-flaking formula styling aid. This gel adds body, shine and light control to hair.', 'American-Crew-Light-Hold-Styling-Gel', 20, 'M07', 'assets/img/product_images/americancrew-lightholdstylinggel.jpg', '2022-11-02', '0.00', 10, 1),
(38, 3, 'American Crew Medium Hold Spray Gel', 'American Crew Medium Hold Spray Gel leaves hair with a natural look and feel. This gel is great for all hair types. Size: 5 oz', 'American-Crew-Medium-Hold-Spray-Gel', 22, 'M08', 'assets/img/product_images/americancrew-mediumholdspraygel.jpg', '2022-11-02', '0.00', 10, 1),
(39, 3, 'Paul Mitchell Mitch Reformer Texturizer', 'Paul Mitchell Mitch Reformer Texturizer provides fullness, powerful hold and texture. It is a hair-thickening paste that gives styles a healthy-looking, matte finish.', 'Paul-Mitchell-Mitch-Reformer-Texturizer', 25, 'M09', 'assets/img/product_images/paulmitchellreformertexturizer.jpg', '2022-11-02', '0.00', 10, 1),
(40, 3, 'American Crew Heavy Hold Pomade', 'American Crew Heavy Hold Pomade provides maximum hold with a high shine.', 'American-Crew-Heavy-Hold-Pomade', 35, 'M10', 'assets/img/product_images/americancrew-heavyholdpomade.jpg', '2022-11-02', '0.00', 10, 1),
(41, 3, 'American Crew Defining Paste', 'American Crew Defining Paste offers a medium hold with low shine finish. This paste works well with all hair types.', 'American-Crew-Defining-Paste', 35, 'M11', 'assets/img/product_images/americancrew-definingpaste.jpg', '2022-11-02', '0.00', 10, 1),
(42, 3, 'American Crew Alternator', 'American Crew Alternator provides flexible styling and restyling power. It gives you control of your image. Size: 3.3 oz', 'American-Crew-Alternator', 50, 'M12', 'assets/img/product_images/americancrew-alternator.jpg', '2022-11-02', '0.00', 10, 1),
(43, 3, 'American Crew Grooming Cream', 'American Crew Grooming Cream provides hair with excellent hold and high shine. This cream also conditions hair.', 'American-Crew-Grooming-Cream', 30, 'M13', 'assets/img/product_images/americancrew-groomingcream.jpg', '2022-11-02', '0.00', 10, 1),
(44, 3, 'American Crew Boost Powder', 'Get gravity-defying volume with American Crew Boost Powder. This styling powder offers body and a matte finish.', 'American-Crew-Boost-Powder', 38, 'M14', 'assets/img/product_images/americancrew-boostpowder.jpg', '2022-11-02', '0.00', 10, 1),
(45, 3, 'American Crew Regimen 3-In-1 & Fiber Cream Duo', 'This Men Fiber Duo Gift Set features two American Crew favorites, Fiber Cream and 3-in-1 Men Shampoo, Conditioner and Body Wash.', 'American-Crew-Regimen-3-In-1-&-Fiber-Cream-Duo', 40, 'M15', 'assets/img/product_images/americancrew-regimen3in1&fibercream.jpg', '2022-11-02', '0.00', 10, 1),
(46, 3, 'American Crew Prep And Prime Tonic', 'American Crew Prep and Prime Tonic is a lightly-moisturizing and refreshing hair tonic that prepares the hair for cutting and styling, by adding a light hold and texture for increased control and manageability.', 'American-Crew-Prep-And-Prime-Tonic', 20.9, 'M16', 'assets/img/product_images/americancrew-prep&primetonic.jpg', '2022-11-02', '0.00', 10, 1),
(47, 3, '18.21 Man Made Wax', 'Precisely manipulate hair to your liking with this pliable, high hold, low sheen texturizing balm. 18.21 Man Made Wax lends a touchable and natural feel.', '18.21-Man-Made-Wax', 28, 'M17', 'assets/img/product_images/18.21manmadewax.jpg', '2022-11-02', '0.00', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(6, 'John Smith', 4, 'Nice Product, Value for money', 1621935691),
(7, 'Peter Parker', 5, 'Nice Product with Good Feature.', 1621939888),
(8, 'Donna Hubber', 1, 'Worst Product, lost my money.', 1621940010),
(25, 'Nicholas', 4, 'Good!!!', 1667806040),
(28, 'Alice', 5, 'Best Services In Town !', 1668952115);

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
(5, 'Hair Cut &amp; Beard', 'Providing the fresher styles &amp; cuts for your needs along with beard trimming services or shaving', '30.00', 30, 2, 'hairbeard.jpg'),
(6, 'Smooth Shave', 'Grew a long beard during the MCO period? We will help you clean shave that beard right off', '15.00', 10, 10, 'shave.jpeg'),
(7, 'Beard Trimming', 'Want to keep the beard but style? Then come on over and get the fresher styles for your beard', '16.00', 15, 10, 'beard-trimming.jpg'),
(8, 'Hair Treatment', 'In Studio C Hair &amp; Beauty Salon, we offer a free thorough consultation and a variety of hair and scalp treatments to suit your hair and scalp needs because we understand how important it is to keep our hair well and healthy.', '20.00', 20, 3, 'treatment.jpg'),
(9, 'Hair Colouring', 'We understand that sometimes you just have to get that transformation. Whether it’s just a simple touch up or a whole dramatic makeover, our colorists will make sure to achieve the result that you want, making all the heads turn for you', '14.00', 30, 3, 'colouring.jpg'),
(11, 'Hair Washing', 'No water at home? House flooded? Then come and wash your hair at our studio', '10.00', 10, 9, 'washing.jpg'),
(12, 'Hair Wash &amp; Blow', 'Our goal is to make Client have a Dancing hair and Refresh scalp, We provide a Blow Straight, Iron Curl. We also provide a luxury shampoo &amp; Conditional. Montibello from Spain ask our hair stylist to know more the Montibello shampoo features.', '30.00', 30, 9, 'wash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services_booked`
--

CREATE TABLE `services_booked` (
  `appointment_id` int(5) NOT NULL,
  `service_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services_booked`
--

INSERT INTO `services_booked` (`appointment_id`, `service_id`) VALUES
(11, 9),
(12, 9),
(13, 1),
(14, 2),
(15, 1),
(17, 6),
(18, 1),
(18, 6),
(18, 7),
(18, 9),
(19, 1),
(20, 2),
(20, 3),
(21, 9),
(22, 1),
(22, 3),
(22, 6),
(23, 6),
(25, 4),
(26, 6),
(27, 6),
(28, 4),
(28, 5),
(28, 6),
(28, 7),
(28, 8),
(28, 9),
(28, 11),
(28, 12),
(29, 7),
(29, 9),
(29, 12),
(30, 7),
(30, 9),
(30, 12),
(31, 4);

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`category_id`, `category_name`) VALUES
(2, 'Hair Cutting Services'),
(3, 'Hair Treatment'),
(9, 'Other Service'),
(10, 'Beard Services'),
(11, 'Hair Washing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `date_joined`) VALUES
(1, 'testuser', 'testuser', 'testuser@gmail.com', 'Test', 'User', '2022-11-18'),
(2, 'Nicholas', 'nick123', 'nicholaswongkx@gmail.com', 'Nicholas', 'Wong', '2022-11-18'),
(3, 'Ran', 'Ran123', 'ran@gmail.com', 'Ran', 'Singh', '2022-11-19');

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
-- Indexes for table `barber_admin`
--
ALTER TABLE `barber_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_email` (`client_email`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employees_schedule`
--
ALTER TABLE `employees_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_emp` (`employee_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `FK_service_category` (`category_id`);

--
-- Indexes for table `services_booked`
--
ALTER TABLE `services_booked`
  ADD PRIMARY KEY (`appointment_id`,`service_id`),
  ADD KEY `FK_SB_service` (`service_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `barber_admin`
--
ALTER TABLE `barber_admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees_schedule`
--
ALTER TABLE `employees_schedule`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
