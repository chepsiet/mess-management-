-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2021 at 01:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_name`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(15) NOT NULL,
  `student_id` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `student_id`, `amount`, `date`) VALUES
(1, 11, 980, '2020-11-25'),
(2, 10, 590, '2020-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `pf` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `first_name`, `last_name`, `email`, `photo`, `pf`, `phone`, `password`) VALUES
(3, 'amigo', 'amigo', 'amigo', 'example@gmail.com', '', 'PF number', 2147483647, '22222');

-- --------------------------------------------------------

--
-- Table structure for table `cartegory`
--

CREATE TABLE `cartegory` (
  `cartegory_id` int(15) NOT NULL,
  `cartegory_name` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cartegory`
--

INSERT INTO `cartegory` (`cartegory_id`, `cartegory_name`, `date`) VALUES
(20, 'breakfast', '2020-12-06'),
(21, 'supper', '2020-12-06'),
(22, 'lunch', '2020-12-06'),
(23, 'drinks', '2020-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact-id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact-id`, `name`, `email`, `phone`, `message`, `date`) VALUES
(3, 'Kenneth ouko', 'kenogot@gmail.com', 719601928, 'Please help me reset my password', '2020-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `cartegory_name` varchar(50) NOT NULL,
  `item_image` varchar(200) NOT NULL,
  `quantity` int(50) NOT NULL,
  `unit_price` int(50) NOT NULL,
  `total_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `item_name`, `cartegory_name`, `item_image`, `quantity`, `unit_price`, `total_price`) VALUES
(57, 'ugali', 'breakfast', 'm5.jpg', 187, 10, 1870),
(58, 'juice', 'drinks', 'juice.jpg', 185, 30, 5550),
(63, 'grams', 'supper', 'image5.jpg', 197, 20, 2955),
(64, 'mursik', 'drinks', 'k4.jpg', 197, 40, 7880),
(67, 'keke', 'breakfast', 'page1-img4.jpg', 38, 20, 760);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `total` int(11) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `email`, `date`, `total`, `status`) VALUES
(1041, 11, 'paul', 'paul@gmail.com', '2020-12-03 05:41:32', 50, 1),
(1042, 11, 'paul', 'paul@gmail.com', '2020-12-03 05:42:49', 100, 1),
(1043, 11, 'paul', 'paul@gmail.com', '2020-12-03 05:44:00', 50, 1),
(1044, 11, 'paul', 'paul@gmail.com', '2020-12-03 05:48:32', 20, 0),
(1045, 11, 'paul', 'paul@gmail.com', '2020-12-03 05:48:53', 20, 0),
(1046, 11, 'paul', 'paul@gmail.com', '2020-12-03 05:50:53', 70, 1),
(1047, 11, 'paul', 'paul@gmail.com', '2020-12-03 05:51:21', 70, 0),
(1048, 11, 'paul', 'paul@gmail.com', '2020-12-03 05:51:42', 50, 0),
(1049, 11, 'paul', 'paul@gmail.com', '2020-12-03 05:52:14', 40, 0),
(1050, 11, 'paul', 'paul@gmail.com', '2020-12-03 05:52:52', 45, 0),
(1051, 11, 'paul', 'paul@gmail.com', '2020-12-03 05:53:07', 45, 0),
(1052, 11, 'paul', 'paul@gmail.com', '2020-12-03 05:53:16', 45, 0),
(1053, 11, 'paul', 'paul@gmail.com', '2020-12-03 05:59:21', 115, 0),
(1054, 11, 'paul', 'paul@gmail.com', '2020-12-03 06:54:04', 50, 0),
(1055, 11, 'paul', 'paul@gmail.com', '2020-12-03 12:55:23', 70, 0),
(1056, 11, 'paul', 'paul@gmail.com', '2020-12-06 12:00:34', 20, 0),
(1057, 11, 'paul', 'paul@gmail.com', '2020-12-06 12:06:52', 20, 0),
(1058, 11, 'paul', 'paul@gmail.com', '2020-12-06 12:08:31', 20, 0),
(1059, 11, 'paul', 'paul@gmail.com', '2020-12-06 12:14:34', 20, 0),
(1068, 11, 'paul', 'paul@gmail.com', '2020-12-06 17:21:20', 65, 0),
(1069, 11, 'paul', 'paul@gmail.com', '2020-12-06 17:25:49', 65, 0),
(1070, 11, 'paul', 'paul@gmail.com', '2020-12-06 18:03:35', 30, 0),
(1071, 11, 'paul', 'paul@gmail.com', '2020-12-06 18:05:35', 50, 0),
(1072, 11, 'paul', 'paul@gmail.com', '2020-12-06 18:08:30', 50, 0),
(1073, 11, 'paul', 'paul@gmail.com', '2020-12-06 18:12:15', 50, 0),
(1074, 10, 'Petronila', 'petronila@gmail.com', '2020-12-06 18:19:05', 20, 0),
(1075, 11, 'paul', 'paul@gmail.com', '2020-12-06 18:49:28', 50, 0),
(1076, 10, 'Petronila', 'petronila@gmail.com', '2020-12-06 20:15:03', 10, 0),
(1077, 10, 'Petronila', 'petronila@gmail.com', '2020-12-06 20:16:29', 10, 0),
(1078, 11, 'paul', 'paul@gmail.com', '2020-12-10 11:56:52', 20, 0),
(1079, 11, 'paul', 'paul@gmail.com', '2020-12-13 18:05:32', 10, 0),
(1080, 11, 'paul', 'paul@gmail.com', '2020-12-13 19:15:48', 40, 0),
(1081, 11, 'paul', 'paul@gmail.com', '2020-12-13 19:17:48', 40, 0),
(1082, 11, 'paul', 'paul@gmail.com', '2020-12-13 21:44:57', 40, 0),
(1083, 11, 'paul', 'paul@gmail.com', '2020-12-13 23:23:29', 92, 0),
(1084, 11, 'paul', 'paul@gmail.com', '2020-12-13 23:24:01', 52, 0),
(1085, 11, 'paul', 'paul@gmail.com', '2020-12-28 16:46:40', 60, 0),
(1086, 10, 'Petronila', 'petronila@gmail.com', '2020-12-28 17:33:54', 10, 0),
(1087, 11, 'paul', 'paul@gmail.com', '2020-12-28 17:35:23', 10, 0),
(1088, 11, 'paul', 'paul@gmail.com', '2020-12-28 19:38:17', 40, 0),
(1089, 11, 'paul', 'paul@gmail.com', '2020-12-28 19:41:44', 40, 0),
(1090, 11, 'paul', 'paul@gmail.com', '2020-12-28 20:01:18', 40, 0),
(1091, 11, 'paul', 'paul@gmail.com', '2020-12-28 20:02:20', 40, 0),
(1092, 11, 'paul', 'paul@gmail.com', '2020-12-28 21:01:40', 10, 0),
(1093, 11, 'paul', 'paul@gmail.com', '2020-12-28 21:27:00', 10, 0),
(1094, 11, 'paul', 'paul@gmail.com', '2020-12-28 21:33:13', 10, 0),
(1095, 11, 'paul', 'paul@gmail.com', '2020-12-28 21:33:33', 10, 0),
(1096, 11, 'paul', 'paul@gmail.com', '2020-12-28 21:34:01', 10, 0),
(1097, 11, 'paul', 'paul@gmail.com', '2020-12-29 07:05:10', 10, 0),
(1098, 11, 'paul', 'paul@gmail.com', '2020-12-29 07:07:03', 40, 0),
(1099, 11, 'paul', 'paul@gmail.com', '2021-03-08 19:16:51', 30, 0),
(1100, 11, 'paul', 'paul@gmail.com', '2021-03-09 01:05:04', 40, 0),
(1101, 11, 'paul', 'paul@gmail.com', '2021-03-09 01:08:24', 40, 0),
(1102, 11, 'paul', 'paul@gmail.com', '2021-03-09 01:19:17', 40, 0),
(1103, 11, 'paul', 'paul@gmail.com', '2021-03-09 01:27:13', 40, 0),
(1104, 11, 'paul', 'paul@gmail.com', '2021-03-09 03:59:14', 10, 0),
(1105, 11, 'paul', 'paul@gmail.com', '2021-03-09 14:03:03', 10, 0),
(1106, 11, 'paul', 'paul@gmail.com', '2021-03-10 07:38:37', 10, 0),
(1107, 11, 'paul', 'paul@gmail.com', '2021-03-12 04:05:26', 10, 0),
(1108, 11, 'paul', 'paul@gmail.com', '2021-03-13 09:54:08', 104, 0),
(1109, 11, 'paul', 'paul@gmail.com', '2021-03-13 10:04:59', 104, 0),
(1110, 11, 'paul', 'paul@gmail.com', '2021-03-13 10:15:12', 104, 0),
(1111, 11, 'paul', 'paul@gmail.com', '2021-03-13 10:16:18', 104, 0),
(1112, 11, 'paul', 'paul@gmail.com', '2021-03-13 10:26:19', 104, 0),
(1113, 11, 'paul', 'paul@gmail.com', '2021-03-13 10:30:11', 104, 0),
(1114, 11, 'paul', 'paul@gmail.com', '2021-03-13 10:41:06', 104, 0),
(1115, 11, 'paul', 'paul@gmail.com', '2021-03-13 15:12:16', 104, 0),
(1116, 11, 'paul', 'paul@gmail.com', '2021-03-13 15:52:19', 104, 0),
(1117, 11, 'paul', 'paul@gmail.com', '2021-03-13 15:53:04', 104, 0),
(1118, 11, 'paul', 'paul@gmail.com', '2021-03-14 04:31:04', 90, 0),
(1119, 11, 'paul', 'paul@gmail.com', '2021-03-14 04:34:46', 90, 0),
(1120, 11, 'paul', 'paul@gmail.com', '2021-03-14 04:35:51', 90, 0),
(1121, 11, 'paul', 'paul@gmail.com', '2021-03-14 04:37:07', 90, 0),
(1122, 11, 'paul', 'paul@gmail.com', '2021-03-14 04:37:49', 90, 0),
(1123, 11, 'paul', 'paul@gmail.com', '2021-03-14 04:42:42', 90, 0),
(1124, 11, 'paul', 'paul@gmail.com', '2021-03-14 04:43:01', 90, 0),
(1125, 11, 'paul', 'paul@gmail.com', '2021-03-14 04:44:52', 90, 0),
(1126, 11, 'paul', 'paul@gmail.com', '2021-03-14 04:45:00', 90, 0),
(1127, 11, 'paul', 'paul@gmail.com', '2021-03-14 04:45:03', 90, 0),
(1128, 11, 'paul', 'paul@gmail.com', '2021-03-14 04:46:45', 90, 0),
(1129, 11, 'paul', 'paul@gmail.com', '2021-03-14 05:06:33', 90, 0),
(1130, 11, 'paul', 'paul@gmail.com', '2021-03-14 05:09:06', 90, 0),
(1131, 11, 'paul', 'paul@gmail.com', '2021-03-14 05:11:14', 90, 0),
(1132, 11, 'paul', 'paul@gmail.com', '2021-03-14 05:12:06', 90, 0),
(1133, 11, 'paul', 'paul@gmail.com', '2021-03-14 05:19:10', 90, 0),
(1134, 11, 'paul', 'paul@gmail.com', '2021-03-14 05:21:45', 90, 0),
(1135, 11, 'paul', 'paul@gmail.com', '2021-03-14 05:23:37', 90, 0),
(1136, 11, 'paul', 'paul@gmail.com', '2021-03-14 05:25:21', 90, 0),
(1137, 11, 'paul', 'paul@gmail.com', '2021-03-14 06:29:06', 90, 0),
(1138, 11, 'paul', 'paul@gmail.com', '2021-03-14 06:30:32', 90, 0),
(1139, 11, 'paul', 'paul@gmail.com', '2021-03-14 08:12:20', 110, 0),
(1140, 11, 'paul', 'paul@gmail.com', '2021-03-14 08:13:15', 110, 0),
(1141, 11, 'paul', 'paul@gmail.com', '2021-03-14 08:13:21', 110, 0),
(1142, 11, 'paul', 'paul@gmail.com', '2021-03-14 09:06:51', 75, 0),
(1143, 11, 'paul', 'paul@gmail.com', '2021-03-14 09:08:07', 75, 0),
(1144, 11, 'paul', 'paul@gmail.com', '2021-03-14 09:08:11', 75, 0),
(1145, 11, 'paul', 'paul@gmail.com', '2021-03-14 09:26:25', 50, 0),
(1146, 11, 'paul', 'paul@gmail.com', '2021-03-14 10:37:42', 70, 0),
(1147, 11, 'paul', 'paul@gmail.com', '2021-03-14 10:38:51', 70, 0),
(1148, 11, 'paul', 'paul@gmail.com', '2021-03-14 10:40:15', 70, 0),
(1149, 11, 'paul', 'paul@gmail.com', '2021-03-14 15:25:48', 52, 0),
(1150, 11, 'paul', 'paul@gmail.com', '2021-03-14 15:54:00', 10, 0),
(1151, 11, 'paul', 'paul@gmail.com', '2021-03-18 04:10:35', 90, 0),
(1152, 11, 'paul', 'paul@gmail.com', '2021-03-21 13:15:22', 30, 0),
(1153, 11, 'paul', 'paul@gmail.com', '2021-03-24 11:46:27', 10, 0),
(1154, 11, 'paul', 'paul@gmail.com', '2021-03-24 11:52:08', 10, 0),
(1155, 11, 'paul', 'paul@gmail.com', '2021-05-28 03:05:43', 10, 0),
(1156, 11, 'paul', 'paul@gmail.com', '2021-05-29 10:41:15', 40, 0),
(1157, 11, 'paul', 'paul@gmail.com', '2021-05-29 12:01:43', 50, 0),
(1158, 11, 'paul', 'paul@gmail.com', '2021-05-29 12:48:19', 50, 0),
(1159, 11, 'paul', 'paul@gmail.com', '2021-05-29 13:55:36', 50, 0),
(1160, 11, 'paul', 'paul@gmail.com', '2021-05-29 13:57:16', 50, 0),
(1161, 11, 'paul', 'paul@gmail.com', '2021-05-29 13:58:14', 50, 0),
(1162, 11, 'paul', 'paul@gmail.com', '2021-05-29 13:59:21', 50, 0),
(1163, 11, 'paul', 'paul@gmail.com', '2021-05-29 14:43:12', 50, 0),
(1164, 11, 'paul', 'paul@gmail.com', '2021-05-29 14:54:44', 60, 0),
(1165, 11, 'paul', 'paul@gmail.com', '2021-05-30 11:32:04', 40, 0),
(1166, 11, 'paul', 'paul@gmail.com', '2021-05-30 11:34:32', 40, 0),
(1167, 11, 'paul', 'paul@gmail.com', '2021-05-30 11:43:15', 40, 0),
(1168, 11, 'paul', 'paul@gmail.com', '2021-05-30 11:51:16', 40, 0),
(1169, 11, 'paul', 'paul@gmail.com', '2021-05-30 11:56:33', 40, 0),
(1170, 11, 'paul', 'paul@gmail.com', '2021-05-30 14:26:22', 10, 0),
(1171, 11, 'paul', 'paul@gmail.com', '2021-05-30 14:42:06', 10, 0),
(1172, 11, 'paul', 'paul@gmail.com', '2021-05-31 02:12:20', 10, 0),
(1173, 11, 'paul', 'kenogot2018@gmail.com', '2021-05-31 02:18:04', 10, 0),
(1174, 11, 'paul', 'kenogot2018@gmail.com', '2021-05-31 02:20:35', 10, 0),
(1175, 11, 'paul', 'kenogot2018@gmail.com', '2021-05-31 02:29:02', 10, 0),
(1176, 11, 'paul', 'kenogot02018@gmail.com', '2021-05-31 02:43:36', 40, 0),
(1177, 11, 'paul', 'kenogot02018@gmail.com', '2021-05-31 04:19:18', 40, 0),
(1178, 11, 'paul', 'kenogot02018@gmail.com', '2021-06-01 11:57:07', 30, 0),
(1179, 11, 'paul', 'kenogot02018@gmail.com', '2021-06-02 06:01:11', 120, 0),
(1180, 11, 'paul', 'kenogot02018@gmail.com', '2021-06-08 11:58:26', 20, 0),
(1181, 11, 'paul', 'kenogot02018@gmail.com', '2021-06-08 12:15:10', 60, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `item_id`, `quantity`, `price`) VALUES
(8, 1083, 59, 1, 12),
(9, 1084, 59, 1, 12),
(10, 1085, 63, 1, 20),
(24, 1114, 59, 2, 12),
(28, 1144, 62, 5, 15),
(30, 1149, 59, 1, 12),
(39, 1150, 63, 7, 20),
(40, 1150, 62, 4, 15),
(64, 1157, 63, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `quantity`, `price`) VALUES
(1, 1076, 57, 1, 10),
(2, 1077, 57, 1, 10),
(3, 1078, 57, 2, 10),
(4, 1079, 57, 1, 10),
(5, 1080, 64, 1, 40),
(6, 1081, 64, 1, 40),
(7, 1082, 64, 1, 40),
(8, 1083, 59, 1, 12),
(9, 1084, 59, 1, 12),
(10, 1085, 63, 1, 20),
(11, 1086, 57, 1, 10),
(12, 1087, 57, 1, 10),
(13, 1088, 58, 1, 30),
(14, 1089, 58, 1, 30),
(15, 1090, 58, 1, 30),
(16, 1091, 58, 1, 30),
(17, 1092, 57, 1, 10),
(18, 1093, 57, 1, 10),
(19, 1094, 57, 1, 10),
(20, 1095, 57, 1, 10),
(21, 1096, 57, 1, 10),
(22, 1097, 57, 1, 10),
(23, 1098, 58, 1, 30),
(24, 1114, 59, 2, 12),
(25, 1127, 58, 2, 30),
(28, 1144, 62, 5, 15),
(29, 1145, 58, 1, 30),
(30, 1149, 59, 1, 12),
(31, 1149, 57, 1, 10),
(32, 1150, 57, 1, 10),
(33, 1150, 57, 1, 10),
(34, 1150, 57, 1, 10),
(35, 1150, 57, 1, 10),
(36, 1150, 64, 10, 40),
(37, 1150, 64, 10, 40),
(38, 1150, 64, 10, 40),
(39, 1150, 63, 7, 20),
(40, 1150, 62, 4, 15),
(42, 1150, 58, 1, 30),
(43, 1150, 58, 1, 30),
(44, 1150, 58, 1, 30),
(49, 1151, 57, 1, 10),
(50, 1152, 58, 1, 30),
(51, 1153, 57, 1, 10),
(52, 1154, 57, 1, 10),
(53, 1155, 57, 1, 10),
(54, 1156, 58, 1, 30),
(55, 1157, 58, 1, 30),
(56, 1158, 58, 1, 30),
(57, 1159, 58, 1, 30),
(58, 1160, 58, 1, 30),
(59, 1161, 58, 1, 30),
(60, 1162, 58, 1, 30),
(61, 1163, 58, 1, 30),
(62, 1164, 58, 2, 30),
(63, 1165, 58, 1, 30),
(64, 1166, 58, 1, 30),
(65, 1167, 58, 1, 30),
(66, 1168, 58, 1, 30),
(67, 1169, 58, 1, 30),
(68, 1170, 57, 1, 10),
(69, 1171, 57, 1, 10),
(70, 1172, 57, 1, 10),
(71, 1173, 57, 1, 10),
(72, 1174, 57, 1, 10),
(73, 1175, 57, 1, 10),
(74, 1176, 58, 1, 30),
(75, 1177, 58, 1, 30),
(76, 1178, 58, 1, 30),
(77, 1179, 58, 4, 30),
(78, 1180, 63, 1, 20),
(79, 1181, 57, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post-id` int(15) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` varchar(200) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post-id`, `title`, `body`, `date`) VALUES
(2, 'Operation Hours', 'Mess will be operational from 0700hrs to 1800hrs daily. Except on weekends that we are only able to provide breakfast and Lunch.', '2020-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `regNumber` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `year_of_study` int(10) NOT NULL,
  `department` varchar(20) NOT NULL,
  `place_of_residence` varchar(50) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `regNumber`, `school`, `email`, `year_of_study`, `department`, `place_of_residence`, `phone_number`, `username`, `password`) VALUES
(10, 'Petronila', 'com/12/1733', 'biological', 'petronila@gmail.com', 2, 'statistics&computer ', 'hostel c', 2020202020, 'pet', '1233'),
(11, 'paul', 'com/10/17', 'biological', 'kenogot02018@gmail.com', 3, 'computer science', 'havana', 713831830, 'paul', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `regNumber` (`student_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cartegory`
--
ALTER TABLE `cartegory`
  ADD PRIMARY KEY (`cartegory_id`),
  ADD UNIQUE KEY `cartegory_name` (`cartegory_name`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact-id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD UNIQUE KEY `name` (`item_name`),
  ADD UNIQUE KEY `id` (`menu_id`),
  ADD KEY `menu_ibfk_1` (`cartegory_name`),
  ADD KEY `item_name` (`item_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post-id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cartegory`
--
ALTER TABLE `cartegory`
  MODIFY `cartegory_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1182;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post-id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`cartegory_name`) REFERENCES `cartegory` (`cartegory_name`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
