-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 06, 2024 at 04:13 PM
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
-- Database: `malatang`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `queue` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`queue`) VALUES
(1),
(2),
(3),
(4),
(5),
(6);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients_types`
--

CREATE TABLE `ingredients_types` (
  `ing_type` varchar(50) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients_types`
--

INSERT INTO `ingredients_types` (`ing_type`, `type_name`) VALUES
('d', 'dip'),
('m', 'meat'),
('n', 'noodles'),
('so', 'soup'),
('sp', 'spice'),
('v', 'vegetable');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(5) NOT NULL,
  `queue` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `queue`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(5) NOT NULL,
  `soup` varchar(50) NOT NULL,
  `meat` varchar(50) NOT NULL,
  `vegetable` varchar(50) NOT NULL,
  `noodles` varchar(50) NOT NULL,
  `dip` varchar(50) NOT NULL,
  `spice` varchar(50) NOT NULL,
  `quantity` int(5) NOT NULL,
  `serve_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `soup`, `meat`, `vegetable`, `noodles`, `dip`, `spice`, `quantity`, `serve_status`) VALUES
(41, 'pork bone soup', 'soft marinated chicken,beef slice', 'baby corn,tofu skin', 'veggie noodles', 'suki dip', '20%', 3, 'served'),
(42, 'mala dry pot', 'beef slice,sausage', 'bokchoy,baby corn', 'sweet potato noodles', 'suki dip', '20%', 2, 'served'),
(43, 'pork bone soup', 'soft marinated pork', 'bokchoy', 'glass noodles', 'bean dip', '50%', 3, 'served'),
(44, 'mala soup', 'beef slice', 'golden needle mushroom,baby corn', 'veggie noodles', 'suki dip', '20%', 3, 'served');

-- --------------------------------------------------------

--
-- Table structure for table `order_ingredients`
--

CREATE TABLE `order_ingredients` (
  `ing_id` int(5) DEFAULT NULL,
  `order_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(5) NOT NULL,
  `methods` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `order_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `methods`, `amount`, `order_id`) VALUES
(12, 'cash', '210', 41),
(13, 'cash', '210', 41),
(14, 'Bank Transfer', '120', 42),
(15, 'cash', '105', 43),
(16, 'cash', '150', 44);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ing_id` int(5) NOT NULL,
  `ing_name` varchar(50) NOT NULL,
  `ing_quantity` int(5) NOT NULL,
  `price` int(5) NOT NULL,
  `ing_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ing_id`, `ing_name`, `ing_quantity`, `price`, `ing_type`) VALUES
(1, 'beef slice', 47, 20, 'm'),
(2, 'soft marinated pork', 50, 15, 'm'),
(3, 'soft marinated chicken', 50, 15, 'm'),
(4, 'sausage', 50, 10, 'm'),
(5, 'bokchoy', 50, 10, 'v'),
(6, 'golden needle mushroom', 47, 10, 'v'),
(7, 'baby corn', 50, 10, 'v'),
(8, 'tofu skin', 50, 15, 'v'),
(9, 'glass noodles', 50, 10, 'n'),
(10, 'sweet potato noodles', 50, 10, 'n'),
(11, 'veggie noodles', 47, 10, 'n'),
(12, 'mala soup', 47, 0, 'so'),
(13, 'mala dry pot', 50, 0, 'so'),
(14, 'pork bone soup', 50, 0, 'so'),
(15, 'suki dip', 47, 0, 'd'),
(16, 'bean dip', 50, 0, 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`queue`);

--
-- Indexes for table `ingredients_types`
--
ALTER TABLE `ingredients_types`
  ADD PRIMARY KEY (`ing_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `Queue` (`queue`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ing_id`),
  ADD KEY `ing_type` (`ing_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `queue` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `ing_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`order_id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`ing_type`) REFERENCES `ingredients_types` (`ing_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
