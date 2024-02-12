-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 03:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects_jrspeed_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_feedback`
--

INSERT INTO `customer_feedback` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Devon Larrat', 'D.l@gmail.com', 'Email Not Received', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vitae gravida nisl. Praesent vitae interdum quam. Fusce a mauris vel ex ultricies ullamcorper. Phasellus sit amet urna ultricies, tempus orci ac, ultricies augue. Sed condimentum nunc vel pulvinar mollis. Nulla interdum vulputate justo id volutpat. Quisque vitae turpis eros.'),
(2, 'devon larrat', 'dl@gmail.com', 'sira yung bike', 'hindi na binalek pera ko '),
(3, 'devon larrat', 'kdlanguido@gmail.com', 'sira yung bike', 'test'),
(4, 'Josh lagare', 'joshlagare1@gmail.com', 'Hindi umiikot yung gulong', 'Sira yung bike niyo'),
(8, 'q', 'qwe@', 'qwe', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `order_no` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `user_info` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `order_no`, `date`, `user_info`, `status`) VALUES
(20, 'ORD.20230821874336', '2023-08-21', '::1', 'COMPLETED'),
(21, 'ORD.20230821284138', '2023-08-21', '::1', 'COMPLETED'),
(22, 'ORD.20230821447840', '2023-08-21', '::1', 'COMPLETED'),
(23, 'ORD.20230821835199', '2023-08-21', '::1', 'COMPLETED'),
(24, 'ORD.20230821403850', '2023-08-21', '::1', 'COMPLETED'),
(25, 'ORD.20230821777208', '2023-08-21', '::1', 'COMPLETED'),
(26, 'ORD.20230821804841', '2023-08-21', '::1', 'COMPLETED'),
(27, 'ORD.20230821213722', '2023-08-21', '::1', 'COMPLETED'),
(28, 'ORD.20230821450402', '2023-08-21', '::1', 'COMPLETED'),
(29, 'ORD.20230823740281', '2023-08-23', '::1', 'COMPLETED'),
(30, 'ORD.20230823854975', '2023-08-23', '::1', 'COMPLETED'),
(31, 'ORD.20230824224453', '2023-08-24', '::1', 'COMPLETED'),
(32, 'ORD.20230824890882', '2023-08-24', '::1', 'COMPLETED'),
(33, 'ORD.20230825968719', '2023-08-25', '::1', 'COMPLETED'),
(34, 'ORD.20230830311980', '2023-08-30', '::1', 'COMPLETED'),
(35, 'ORD.20230830660107', '2023-08-30', '::1', 'COMPLETED'),
(36, 'ORD.20230904173455', '2023-09-04', '::1', 'COMPLETED'),
(37, 'ORD.20230905844596', '2023-09-05', '10.10.90.11', 'COMPLETED'),
(38, 'ORD.20230905819230', '2023-09-05', '10.10.90.11', 'COMPLETED'),
(39, 'ORD.20230905352684', '2023-09-05', '10.10.90.15', 'PENDING'),
(40, 'ORD.20230905573700', '2023-09-05', '10.10.90.11', 'COMPLETED'),
(41, 'ORD.20230913208302', '2023-09-14', '::1', 'COMPLETED'),
(42, 'ORD.20230920905936', '2023-09-20', '::1', 'COMPLETED'),
(43, 'ORD.20230920939581', '2023-09-20', '::1', 'COMPLETED'),
(44, 'ORD.20230920333209', '2023-09-20', '::1', 'COMPLETED'),
(45, 'ORD.20230920970368', '2023-09-20', '::1', 'COMPLETED'),
(46, 'ORD.20230920402457', '2023-09-20', '::1', 'COMPLETED'),
(47, 'ORD.20230920273232', '2023-09-20', '::1', 'COMPLETED'),
(48, 'ORD.20230920818604', '2023-09-20', '::1', 'COMPLETED'),
(49, 'ORD.20230920648121', '2023-09-20', '::1', 'COMPLETED'),
(50, 'ORD.20230920851449', '2023-09-20', '::1', 'COMPLETED'),
(51, 'ORD.20230920180038', '2023-09-20', '::1', 'COMPLETED'),
(52, 'ORD.20240202124833', '2024-02-02', '::1', 'COMPLETED'),
(53, 'ORD.20240202832897', '2024-02-02', '::1', 'COMPLETED'),
(54, 'ORD.20240202201123', '2024-02-02', '::1', 'COMPLETED'),
(55, 'ORD.20240202168709', '2024-02-02', '::1', 'COMPLETED'),
(56, 'ORD.20240205745130', '2024-02-05', '::1', 'COMPLETED'),
(57, 'ORD.20240205610368', '2024-02-05', '::1', 'COMPLETED'),
(58, 'ORD.20240209322071', '2024-02-10', '::1', 'COMPLETED'),
(59, 'ORD.20240212468730', '2024-02-12', '::1', 'COMPLETED'),
(60, 'ORD.20240212557088', '2024-02-12', '::1', 'COMPLETED'),
(61, 'ORD.20240212887144', '2024-02-12', '::1', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_items`
--

CREATE TABLE `tbl_cart_items` (
  `id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart_items`
--

INSERT INTO `tbl_cart_items` (`id`, `order_no`, `product_id`, `qty`) VALUES
(40, 'ORD.20230821874336', 12, 1),
(41, 'ORD.20230821874336', 13, 1),
(42, 'ORD.20230821874336', 14, 1),
(43, 'ORD.20230821874336', 26, 1),
(44, 'ORD.20230821284138', 12, 1),
(45, 'ORD.20230821284138', 26, 1),
(46, 'ORD.20230821284138', 13, 1),
(47, 'ORD.20230821284138', 14, 1),
(48, 'ORD.20230821447840', 12, 1),
(49, 'ORD.20230821447840', 13, 1),
(50, 'ORD.20230821835199', 12, 1),
(51, 'ORD.20230821403850', 12, 1),
(52, 'ORD.20230821403850', 26, 1),
(53, 'ORD.20230821777208', 13, 1),
(54, 'ORD.20230821804841', 14, 1),
(55, 'ORD.20230821213722', 13, 1),
(56, 'ORD.20230821450402', 14, 1),
(57, 'ORD.20230823740281', 26, 1),
(58, 'ORD.20230823854975', 26, 1),
(61, 'ORD.20230824224453', 26, 1),
(62, 'ORD.20230824224453', 12, 10),
(63, 'ORD.20230824890882', 12, 10),
(64, 'ORD.20230824890882', 26, 1),
(65, 'ORD.20230825968719', 26, 1),
(66, 'ORD.20230825968719', 12, 2),
(67, 'ORD.20230830311980', 12, 1),
(68, 'ORD.20230830660107', 12, 37),
(98, 'ORD.20230905844596', 12, 1),
(99, 'ORD.20230905819230', 14, 1),
(100, 'ORD.20230905352684', 24, 1),
(101, 'ORD.20230905573700', 26, 1),
(102, 'ORD.20230904173455', 12, 1),
(105, 'ORD.20230913208302', 12, 1),
(106, 'ORD.20230920905936', 12, 2),
(107, 'ORD.20230920939581', 12, 2),
(108, 'ORD.20230920333209', 12, 1),
(109, 'ORD.20230920970368', 12, 1),
(110, 'ORD.20230920402457', 12, 1),
(111, 'ORD.20230920273232', 13, 1),
(112, 'ORD.20230920818604', 13, 1),
(113, 'ORD.20230920648121', 13, 1),
(114, 'ORD.20230920851449', 14, 10),
(124, 'ORD.20230920180038', 12, 1),
(125, 'ORD.20240202124833', 12, 1),
(126, 'ORD.20240202832897', 12, 1),
(127, 'ORD.20240202201123', 12, 1),
(129, 'ORD.20240202168709', 12, 1),
(130, 'ORD.20240205745130', 15, 1),
(133, 'ORD.20240205610368', 12, 6),
(134, 'ORD.20240209322071', 14, 1),
(137, 'ORD.20240212468730', 24, 1),
(139, 'ORD.20240212887144', 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`id`, `question`, `answer`) VALUES
(3, 'Sample question test', '	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin ornare elit, vel tempor odio laoreet sit amet. Mauris tempor nunc eu augue feugiat, eget convallis metus blandit. Maecenas venenatis nisl nisi, sed luctus metus lacinia ac. Fusce ac magna vitae eros consectetur elementum sed et felis. Donec ac ex id eros facilisis euismod vitae ac magna. Nunc rhoncus dolor turpis. Sed varius, erat nec tempus condimentum, odio nibh egestas erat, sed lobortis risus metus non mauris.'),
(4, 'Sample Question 2', '	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin ornare elit, vel tempor odio laoreet sit amet. Mauris tempor nunc eu augue feugiat, eget convallis metus blandit. Maecenas venenatis nisl nisi, sed luctus metus lacinia ac. Fusce ac magna vitae eros consectetur elementum sed et felis. Donec ac ex id eros facilisis euismod vitae ac magna. Nunc rhoncus dolor turpis. Sed varius, erat nec tempus condimentum, odio nibh egestas erat, sed lobortis risus metus non mauris.'),
(5, 'Sample Question 3', '	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin ornare elit, vel tempor odio laoreet sit amet. Mauris tempor nunc eu augue feugiat, eget convallis metus blandit. Maecenas venenatis nisl nisi, sed luctus metus lacinia ac. Fusce ac magna vitae eros consectetur elementum sed et felis. Donec ac ex id eros facilisis euismod vitae ac magna. Nunc rhoncus dolor turpis. Sed varius, erat nec tempus condimentum, odio nibh egestas erat, sed lobortis risus metus non mauris.'),
(6, 'Tanong', 'sagot');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'PENDING',
  `date_updated` date DEFAULT NULL,
  `tracking_no` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `order_no`, `date`, `user_id`, `status`, `date_updated`, `tracking_no`) VALUES
(23, 'ORD.20230824890882', '2023-10-24', 20, 'COMPLETED', '2023-08-24', 'Wv9au29Ziwkl'),
(24, 'ORD.20230825968719', '2023-08-25', 21, 'TO_RECEIVE', '2023-08-25', 'qwe123'),
(25, 'ORD.20230830311980', '2023-11-30', 22, 'COMPLETED', '2023-08-30', '55559123'),
(26, 'ORD.20230830660107', '2023-08-30', 22, 'COMPLETED', '2023-08-30', 'Wv9au29Ziwkl'),
(27, 'ORD.20230905844596', '2023-09-05', 23, 'CANCELLED', '2023-09-05', NULL),
(28, 'ORD.20230905819230', '2023-09-05', 23, 'TO_PAY', '2024-02-02', NULL),
(29, 'ORD.20230905573700', '2023-12-05', 24, 'COMPLETED', '2023-09-05', '55559123'),
(30, 'ORD.20230904173455', '2023-09-05', 24, 'TO_RECEIVE', '2023-09-05', '123'),
(31, 'ORD.20230913208302', '2023-09-14', 1, 'COMPLETED', '2023-09-14', '123123'),
(37, 'ORD.20230920402457', '2023-09-20', 25, 'TO_PAY', '2023-09-20', NULL),
(38, 'ORD.20230920273232', '2023-09-20', 25, 'TO_RECEIVE', '2023-09-20', '6699872'),
(39, 'ORD.20230920818604', '2023-09-20', 25, 'TO_RECEIVE', '2023-09-20', '11'),
(40, 'ORD.20230920648121', '2023-09-20', 26, 'COMPLETED', '2023-09-20', '6969'),
(41, 'ORD.20230920851449', '2023-09-20', 26, 'COMPLETED', '2023-09-20', '5598'),
(42, 'ORD.20230920180038', '2024-02-02', 36, 'COMPLETED', '2024-01-02', NULL),
(43, 'ORD.20230920180038', '2024-02-02', 36, 'CANCELLED', '2024-02-02', NULL),
(44, 'ORD.20240202124833', '2024-02-02', 36, 'CANCELLED', '2024-02-02', NULL),
(45, 'ORD.20240202832897', '2024-02-02', 36, 'CANCELLED', '2024-02-02', NULL),
(46, 'ORD.20240202201123', '2024-02-02', 36, 'CANCELLED', '2024-02-02', NULL),
(47, 'ORD.20240202168709', '2024-01-02', 36, 'COMPLETED', '2024-02-02', 'wiwiwi181818'),
(48, 'ORD.20240205745130', '2024-02-05', 36, 'COMPLETED', '2024-03-05', 'qpwoek'),
(49, 'ORD.20240205610368', '2024-02-06', 36, 'PENDING', NULL, NULL),
(50, 'ORD.20240209322071', '2024-02-10', 36, 'PENDING', NULL, NULL),
(51, 'ORD.20240212468730', '2024-02-12', 36, 'COMPLETED', '2024-02-12', 'qweqwe'),
(52, 'ORD.20240212557088', '2024-02-12', 36, 'PENDING', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order_items`
--

INSERT INTO `tbl_order_items` (`id`, `order_no`, `product_id`, `qty`) VALUES
(44, 'ORD.20230824890882', 12, 10),
(45, 'ORD.20230824890882', 26, 1),
(46, 'ORD.20230825968719', 26, 1),
(47, 'ORD.20230825968719', 12, 2),
(48, 'ORD.20230830311980', 12, 1),
(49, 'ORD.20230830660107', 12, 37),
(50, 'ORD.20230905844596', 12, 1),
(51, 'ORD.20230905819230', 14, 1),
(52, 'ORD.20230905573700', 26, 1),
(60, 'ORD.20230920402457', 12, 1),
(61, 'ORD.20230920273232', 13, 1),
(62, 'ORD.20230920818604', 13, 1),
(63, 'ORD.20230920648121', 13, 1),
(64, 'ORD.20230920851449', 14, 10),
(65, 'ORD.20230920180038', 12, 1),
(66, 'ORD.20230920180038', 12, 1),
(67, 'ORD.20240202124833', 12, 1),
(68, 'ORD.20240202832897', 12, 1),
(69, 'ORD.20240202201123', 12, 1),
(70, 'ORD.20240202168709', 12, 1),
(71, 'ORD.20240205745130', 15, 1),
(72, 'ORD.20240205610368', 12, 6),
(73, 'ORD.20240209322071', 14, 1),
(74, 'ORD.20240212468730', 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_payment`
--

CREATE TABLE `tbl_order_payment` (
  `id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(50) NOT NULL,
  `total_amount` float NOT NULL,
  `discount` float NOT NULL,
  `payment_amount` float NOT NULL,
  `shipping_fee` float NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'UNPAID',
  `payment_proof` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `payment_received_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order_payment`
--

INSERT INTO `tbl_order_payment` (`id`, `order_no`, `date`, `payment_method`, `total_amount`, `discount`, `payment_amount`, `shipping_fee`, `status`, `payment_proof`, `reference_no`, `payment_received_date`) VALUES
(14, 'ORD.20230824890882', '2023-08-24', 'cod', 0, 0, 0, 150, 'UNPAID', NULL, NULL, NULL),
(15, 'ORD.20230825968719', '2023-08-25', 'gcash', 0, 0, 0, 200, 'PAID', 'src/public/payment_proofs/p_8144pic2.png', '9800', '2023-08-25'),
(16, 'ORD.20230830311980', '2023-08-30', 'gcash', 0, 0, 0, 200, 'PAID', 'src/public/payment_proofs/p_2019accessory.png', '569876', '2023-08-30'),
(17, 'ORD.20230830660107', '2023-08-30', 'cod', 0, 0, 0, 500, 'UNPAID', NULL, NULL, NULL),
(18, 'ORD.20230905844596', '2023-09-05', 'gcash', 0, 0, 0, 0, 'UNPAID', NULL, NULL, NULL),
(19, 'ORD.20230905819230', '2023-09-05', 'gcash', 0, 0, 0, 300, 'UNPAID', NULL, NULL, NULL),
(20, 'ORD.20230905573700', '2023-09-05', 'gcash', 0, 0, 0, 900, 'PAID', 'src/public/payment_proofs/p_2288qwe.png', '28831', '2023-09-05'),
(21, 'ORD.20230904173455', '2023-09-05', 'gcash', 0, 0, 0, 123, 'PAID', 'src/public/payment_proofs/p_3809qwe.png', '9800', '2023-09-05'),
(22, 'ORD.20230913208302', '2023-09-14', 'gcash', 0, 0, 0, 200, 'PAID', 'src/public/payment_proofs/p_1254Untitled.png', '929292', '2023-09-14'),
(23, 'ORD.20230920905936', '2023-09-20', 'gcash', 0, 0, 0, 0, 'UNPAID', NULL, NULL, NULL),
(24, 'ORD.20230920905936', '2023-09-20', 'gcash', 0, 0, 0, 0, 'UNPAID', NULL, NULL, NULL),
(25, 'ORD.20230920939581', '2023-09-20', 'gcash', 0, 0, 0, 0, 'UNPAID', NULL, NULL, NULL),
(26, 'ORD.20230920333209', '2023-09-20', 'gcash', 0, 0, 0, 0, 'UNPAID', NULL, NULL, NULL),
(27, 'ORD.20230920970368', '2023-09-20', 'gcash', 0, 0, 0, 0, 'UNPAID', NULL, NULL, NULL),
(28, 'ORD.20230920402457', '2023-09-20', 'gcash', 0, 0, 0, 500, 'UNPAID', NULL, NULL, NULL),
(29, 'ORD.20230920273232', '2023-09-20', 'cod', 0, 0, 0, 690, 'UNPAID', NULL, NULL, NULL),
(30, 'ORD.20230920818604', '2023-09-20', 'gcash', 0, 0, 0, 1111, 'PAID', 'src/public/payment_proofs/p_9343straps.jpg', '66982', '2023-09-20'),
(31, 'ORD.20230920648121', '2023-09-20', 'cod', 0, 0, 0, 100, 'UNPAID', NULL, NULL, NULL),
(32, 'ORD.20230920851449', '2023-09-20', 'gcash', 0, 0, 0, 500, 'PAID', 'src/public/payment_proofs/p_4105qwe.png', '668469872', '2023-09-20'),
(33, 'ORD.20230920180038', '2024-02-02', 'gcash', 0, 0, 0, 0, 'UNPAID', NULL, NULL, NULL),
(34, 'ORD.20230920180038', '2024-02-02', 'gcash', 0, 0, 0, 0, 'UNPAID', NULL, NULL, NULL),
(35, 'ORD.20240202124833', '2024-02-02', 'gcash', 0, 0, 0, 0, 'UNPAID', NULL, NULL, NULL),
(36, 'ORD.20240202832897', '2024-02-02', 'gcash', 0, 0, 0, 0, 'UNPAID', NULL, NULL, NULL),
(37, 'ORD.20240202201123', '2024-02-02', 'gcash', 0, 0, 0, 0, 'UNPAID', NULL, NULL, NULL),
(38, 'ORD.20240202168709', '2024-02-02', 'gcash', 0, 0, 0, 100, 'PAID', 'src/public/payment_proofs/p_5244memes.jpg', '1092929', '2024-02-02'),
(39, 'ORD.20240205745130', '2024-02-05', 'cod', 0, 0, 0, 200, 'UNPAID', NULL, NULL, NULL),
(40, 'ORD.20240205610368', '2024-02-06', 'gcash', 0, 0, 0, 0, 'UNPAID', NULL, NULL, NULL),
(41, 'ORD.20240209322071', '2024-02-10', 'gcash', 0, 0, 0, 0, 'UNPAID', NULL, NULL, NULL),
(42, 'ORD.20240212468730', '2024-02-12', 'gcash', 0, 0, 0, 200, 'PAID', 'src/public/payment_proofs/p_5254PIN - Copy.png', 'ouy123981y983', '2024-02-12'),
(43, 'ORD.20240212557088', '2024-02-12', 'gcash', 0, 0, 0, 0, 'UNPAID', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `id` int(11) NOT NULL,
  `otp` text NOT NULL,
  `status` int(11) NOT NULL,
  `request_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `category` varchar(50) NOT NULL,
  `sub_category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `product_tag` varchar(50) NOT NULL,
  `is_featured` int(11) NOT NULL,
  `is_archived` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product_name`, `price`, `category`, `sub_category`, `description`, `product_tag`, `is_featured`, `is_archived`) VALUES
(12, 'Sigma Lithium Battery', 100, 'ELECTRONICS', 'Batteries', 'Sigma Lithium Batteries for electronics.', 'accessories', 1, 1),
(13, 'SRAM eTap Blip Box', 5000, 'ELECTRONICS', 'Computers', 'BlipBox is the control module that turns your triathlon or time trial bike into a sleek machine. Connected to SRAM eTap¬Æ Blip‚Ñ¢ remote shifters, the BlipBox‚Ñ¢ manages the wireless shifting via AIREA‚Ñ¢, SRAM‚Äôs proprietary communication protocol, allowing immediate shifts from nearly any aero position.', 'accessories', 1, 0),
(14, 'Lezyne Phone Holder', 2000, 'ELECTRONICS', 'Phone Accessories', 'Can\'t wait another minute to get your hands on the latest gear?', 'accessories', 1, 0),
(15, 'Electra Bell Universal Fit Pinger Bell', 5000, 'SAFETY / SECURITY', 'Bells / Horns', 'The Pinger Bell provides big sound in a small package.', 'accessories', 1, 0),
(16, 'Fox MY21 Mud Guard 36-38 Blk AM', 5000, 'SAFETY / SECURITY', 'Fenders', 'The Mudguard fender mounts easily and cleanly to your fork; a direct-mount design eliminates the need for fork-scratching zip ties and ensures your line of sight stays clear. It also reduces maintenance downtime by minimizing the amount of debris hitting your stanchions and fork seals.', 'accessories', 1, 0),
(18, 'Specialized Stumpjumper Alloy', 15000, 'Mountain Bikes', '', 'THE TRAIL BENCHMARK — When we set out to design the all-new Stumpjumper, we pursued some hefty goals. It had to excel on any kind of trail, for every style of rider. To achieve that, we went after serious weight reduction without sacrificing durability, a stiff, responsive chassis that still rides light and lively, geometry that improves everyone’s riding, and the best suspension kinematics we know how to design. Turns out, you can have your cake and eat it too with the new Stumpjumper.', 'bikes', 0, 0),
(19, 'SKS X-Mud Downtube Fender', 900, 'WHEELS / TIRES', 'Accessories', 'Suitable for both mountain and road applications.', 'components', 1, 0),
(20, 'Stacyc Bar Riser Kit Blk', 5000, 'Controls', 'BMX Bars', 'STACYC Bar Riser Kit\r\nThe Handlebar Riser Kit for STACYC eDrive balance bikes gives your growing rider 4\" of additional vertical rise at the bars. Kit includes everything necessary for a safe, secure installation with basic hand tools.  The Bar Riser Kit helps riders get the most from their eDrive bike - until the 75 pound weight capacity is reached - and makes for a smoother transition to small displacement motorbikes.   ', 'components', 1, 0),
(21, 'Cervelo \"e\" Logo Handlebar Tape Black w/opkge', 1000, 'Controls', 'Bar Tape', 'Experience comfort like never before with Cervelo\'s comfortable and grippy handlebar tape', 'components', 1, 0),
(22, 'Specialized Comp Alloy Short Reach Road Bar', 5000, 'Controls', 'Drop Bars', 'As their name implies, the Short Reach handlebars are designed for those that require a shorter reach in order to obtain the optimal bike fit. Along these lines, they feature a 65mm reach (which is about 10 to 15mm shorter than \"average\") and a shallow 125mm drop. This also comes with the added benefit of increased control at the hoods and levers. And for the construction, we selected a lightweight, yet highly durable, 6061 Premium Butted Aluminum that\'s sure to stand up to years of hard riding. ', 'components', 1, 0),
(23, '2021 Cannondale 700 M Synapse 105', 9000, 'ROAD BIKES', 'Endurance', 'A road bike that’s light, stiff, fast and surprisingly comfortable. Your rides will go longer. You\'ll barely notice. ALLOY FRAME D', 'bikes', 0, 0),
(24, 'SE Bikes Everyday', 9000, 'ACTIVE / CRUISER / BMX', 'BMX Bikes', 'The Everyday is the perfect bike to thrash on. It comes equipped with tapered fork legs, 3-piece cranks, mid-bottom bracket, and extra-wide 2.3\" tires. Whether riding the trails, street, or park, this bike is ready to get rad. Every day.', 'bikes', 0, 0),
(25, 'Electra Cruiser Lux 3i Men\'s 26', 9000, 'ACTIVE / CRUISER / BMX', 'Cruiser Bikes', 'The Cruiser Lux elevates the basic Cruiser to the next level with modern refinements like a lightweight aluminum frame, custom components and, of course, Electra’s patented Flat Foot Technology®. With a 3-speed internal hub, it\'s practical yet eye-catching, making it perfect for cruising in style year round.', 'bikes', 0, 0),
(26, 'Specialized Rockhopper 29', 9000, 'Mountain Bikes', 'Hardtails', 'Better performance. Better value. Better Rockhopper. By tapping the fit and handling advantages of pairing each rider with their ideal wheel size and suspension that works its hardest for everyone thanks to our size-specific Rx Tune, we’ve baked in added performance to the all-new Rockhopper without dialing up the price.Shimano and MicroSHIFT team up for drivetrain duties with a robust 2x8 drivetrain that can handle everything you’re throw down while confident braking from Radius CX7 mechanical disc brakes seals the deal of the century.', 'bikes', 0, 0),
(28, 'Armwrestling Strap', 1000, 'Armwrestling', 'Accessory', 'blablabla', 'accessories', 1, 0),
(29, 'Black Bmx Bar', 100, 'Controls', 'BMX Bars', 'testtestt', 'components', 0, 0),
(30, 'Specialized Stumpjumper Alloy', 50000, 'Mountain Bikes', 'Full Suspension', 'test', 'bikes', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_img`
--

CREATE TABLE `tbl_product_img` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `dir` text NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_img`
--

INSERT INTO `tbl_product_img` (`id`, `product_id`, `dir`, `type`, `name`) VALUES
(13, 6, 'src/public/products/u_8939exploro-ultra-force-d1eagle-axs-1x.png', 1, 'exploro-ultra-force-d1eagle-axs-1x.png'),
(14, 12, 'src/public/products/u_1545qwe.png', 1, 'qwe.png'),
(15, 13, 'src/public/products/u_6115image.png', 1, 'image.png'),
(16, 14, 'src/public/products/u_3703image (1).png', 1, 'image (1).png'),
(19, 26, 'src/public/products/u_8857testb.png', 1, 'testb.png'),
(20, 26, 'src/public/products/u_5807exploro-ultra-force-d1eagle-axs-1x.png', 0, 'exploro-ultra-force-d1eagle-axs-1x.png'),
(21, 26, 'src/public/products/u_7054exploro-ultra-rival-1x11_650b.png', 0, 'exploro-ultra-rival-1x11_650b.png'),
(22, 16, 'src/public/products/u_8227fender.png', 1, 'fender.png'),
(23, 16, 'src/public/products/u_8000fender.png', 0, 'fender.png'),
(24, 22, 'src/public/products/u_9537qwesp.png', 1, 'qwesp.png'),
(25, 18, 'src/public/products/u_8826qweqweqwe.png', 1, 'qweqweqwe.png'),
(26, 15, 'src/public/products/u_5330qwe.png', 1, 'qwe.png'),
(27, 21, 'src/public/products/u_4711qwe.png', 1, 'qwe.png'),
(28, 20, 'src/public/products/u_3060qwe.png', 1, 'qwe.png'),
(29, 25, 'src/public/products/u_7781qwe.png', 1, 'qwe.png'),
(30, 19, 'src/public/products/u_7168qwe.png', 1, 'qwe.png'),
(31, 24, 'src/public/products/u_2903qwe.png', 1, 'qwe.png'),
(32, 23, 'src/public/products/u_3346qwe.png', 1, 'qwe.png'),
(33, 28, 'src/public/products/u_8772straps.jpg', 1, 'straps.jpg'),
(34, 28, 'src/public/products/u_9714bobet.png', 0, 'bobet.png'),
(35, 29, 'src/public/products/u_4295test_bmx_bar.png', 1, 'test_bmx_bar.png'),
(36, 30, 'src/public/products/u_6724test_bmx_bar.png', 1, 'test_bmx_bar.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_variations`
--

CREATE TABLE `tbl_product_variations` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `availability` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stocks`
--

CREATE TABLE `tbl_stocks` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_count` int(11) NOT NULL,
  `low_ind` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stocks`
--

INSERT INTO `tbl_stocks` (`id`, `product_id`, `stock_count`, `low_ind`) VALUES
(1, 26, 6, 1),
(2, 21, 5, 3),
(3, 12, 6, 1),
(5, 13, 46, 5),
(6, 14, 39, 1),
(7, 25, 50, 5),
(8, 24, 49, 5),
(9, 28, 10, 1),
(10, 30, 10, 1),
(11, 15, 9, 5),
(12, 16, 10, 1),
(13, 18, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `mobile_no` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `is_archived` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `user_type`, `mobile_no`, `email`, `first_name`, `last_name`, `address`, `is_archived`) VALUES
(1, 'harri', '1', 1, '0987', 'harri@sie.com', 'Akimbo', 'Akimbo', '', 1),
(2, 'admin', '1', 2, '0987', 'admin@sie.com', 'Devon', 'Larrat', '', 0),
(4, NULL, '1', 1, '0987', 'test@gmail.com', 'Yokihiro', 'Sanahira', '', 0),
(7, NULL, 'r8ynuMBQhu', 1, '0987', 'qwe21@sie.com', 'Dao Ming', 'Si', '213 test st test village test city', 0),
(8, NULL, 'JUn5s0yJVP', 1, '09056879879', 'juandelacruz@gmail.com', 'Le Si', 'Tao', '225 mabini lohang birwan batangas city', 0),
(9, NULL, 'NfWvyUUEa5', 1, '09088798789', 'jd@gmail.com', 'Ja Gai', 'Xian', 'Blk 24 lot 2 mabini lingayen pangasinan ', 0),
(10, NULL, 'WCjQQtQV1i', 1, '090887987892', 'weqwe@gmail.com', 'Aaron', 'Yan', 'Other address', 0),
(11, 'qwe', 'yRik4rG2vv', 2, 'wwww', 'eewwqwe', 'qweweqwe', 'qwqwewqe', 'qweqwe', 1),
(16, 'wqeqw', 'qeqwe', 1, '123', 'qwqqq@gmail.com', 'qweqwe', 'qweqwe', 'qweqwe', 0),
(18, NULL, 'HDO1XUGSqh', 1, '0987', 'test@tweety.com', 'Devon', 'Larrat', 'test', 0),
(20, 'test2', 'qwe', 1, '09288928191', 'dancemonkey@gmail.com', 'Papa', 'Roach', 'Makati', 0),
(21, NULL, 'bl0aXc2ivn', 1, '09878798', 'aki@gmail.com', 'Akihiro', 'Tobata', '298 Mt Balungao st. Marikina City', 0),
(22, NULL, 'qwe', 1, '09099289380', 'jb@gmail.com', 'John', 'Brenzk', '223 Alakdan St. Phase 2 Village Makati City', 0),
(23, 'myaccount', 'AdMIhn8X4L', 1, '123', '123@gmail.com', 'test', 'test', 'test', 0),
(24, NULL, 'GRUxhPvHNP', 1, '09199287580', 'mikelo@gmail.com', 'Michael', 'Lopez', '110 Alakdan St. Magnolia Village Dasmarinas City', 0),
(25, 'cashier', '1', 3, '091827837281', 'qweqweo2', 'King', 'Languido', '225 scorpion st', 0),
(26, NULL, '1', 1, '094555987912', 'joshlagare1@gmail.com', 'Josh', 'Lagare', 'Test ', 0),
(27, 'admin2', 'PNb7BrBs2E', 2, '096874987', 'iqjhweij@gmail.com', 'iqjwoiejhqw0oep', 'poquhweuqhwe', 'teqweqwe', 0),
(34, 'Teqqwoiej', 'qwe', 1, '09891988502', 'kdkw@gmail.com', 'test', 'test', 'undefined', 0),
(36, 'shanti', '2', 1, '09171077263', 'kdlanguido@gmail.com', 'Klumcee', 'akapale', 'qweqweqwe', 0),
(38, 'admin', 'test123', 1, '09120199283', 'test@qwe.com', 'iqwjeoiwqeu', 'qwoeiuqwe', 'undefined', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_payment`
--
ALTER TABLE `tbl_order_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_img`
--
ALTER TABLE `tbl_product_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_variations`
--
ALTER TABLE `tbl_product_variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stocks`
--
ALTER TABLE `tbl_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbl_order_payment`
--
ALTER TABLE `tbl_order_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_product_img`
--
ALTER TABLE `tbl_product_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_product_variations`
--
ALTER TABLE `tbl_product_variations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stocks`
--
ALTER TABLE `tbl_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
