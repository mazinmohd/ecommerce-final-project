-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 13, 2026 at 12:27 AM
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
-- Database: `laptop_store2`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'mazen', 'mazenomermazen2002@gmail.com', NULL, 'Nice things\r\n', '2026-06-11 12:12:42'),
(2, 'eslam', 'esljfdl@gm.dlld', NULL, 'nice items i like it\r\n', '2026-06-11 21:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `address`) VALUES
(1, 'Jonas', 'jooollll@gmail.com', '0735568559', 'Rebero'),
(2, 'Mazen Omer', 'mazenomermazen2002@gmail.com', '0793753602', 'kk10'),
(3, 'saied', 'saied@gmail.com', '079564556662', 'Down Town'),
(4, 'motaz ', 'mo@gmail.com', '0758952236', 'giproso'),
(5, 'eslam ', 'seels@gm.com', '0725648001', 'unilak');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_amount`, `order_date`) VALUES
(1, 1, 7350.00, '2026-06-11 12:09:06'),
(2, 2, 3650.00, '2026-06-11 12:30:33'),
(3, 3, 10000.00, '2026-06-11 18:36:03'),
(4, 4, 5600.00, '2026-06-11 18:43:17'),
(5, 5, 6800.00, '2026-06-11 21:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`, `description`) VALUES
(1, 'Dell XPS 15', 'Business', 1200.00, 'Dell.avif', 'Dell XPS 15 is a premium ultra-performance business laptop featuring a powerful processor, high-resolution display, and sleek aluminum design. Ideal for professionals, developers, and creative work.'),
(2, 'Lenovo ThinkPad', 'Business', 1000.00, 'Lenovo.avif', 'Lenovo ThinkPad is a durable and reliable business laptop known for its strong build quality, excellent keyboard, and long battery life, perfect for office and enterprise use.'),
(3, 'HP Pavilion', 'Student', 850.00, 'HP.avif', 'HP Pavilion is a balanced everyday laptop designed for students, offering smooth performance for study, browsing, and multimedia tasks at an affordable price.'),
(4, 'Asus ROG', 'Gaming', 1500.00, 'Asus.avif', 'Asus ROG is a high-performance gaming laptop built for heavy games and demanding applications, featuring advanced cooling, strong graphics performance, and fast refresh rate display.'),
(5, 'MSI Gaming Laptop', 'Gaming', 1300.00, 'msi.avif', 'MSI Gaming Laptop delivers powerful gaming performance with dedicated graphics, fast processing speed, and optimized cooling system for long gaming sessions.'),
(6, 'Acer Nitro', 'Student', 550.00, 'Acer.avif', 'Acer Nitro is an affordable entry-level laptop suitable for students, offering decent performance for school work, basic applications, and light gaming.'),
(7, 'MacBook Air M2', 'Student', 1400.00, 'Mac1.Avif', 'Apple MacBook Air with M2 chip, ultra-thin design, 13.6-inch display, 8GB RAM, 256GB SSD. Perfect for students and professionals.'),
(8, 'MacBook Pro 14 M3', 'Business', 2200.00, 'Mac2.avif', 'Apple MacBook Pro 14-inch with M3 chip, high performance for developers and designers, 16GB RAM, 512GB SSD, Liquid Retina XDR display.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
