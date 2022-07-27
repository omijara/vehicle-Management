-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2022 at 09:51 AM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `approver`
--

CREATE TABLE `approver` (
  `approver_id` int NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_designation` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `approver`
--

INSERT INTO `approver` (`approver_id`, `a_name`, `a_designation`) VALUES
(1, 'Md. Khaleduzzaman', 'Manager- Admin & External Relations'),
(2, 'Shohidul Alam', 'Manager – Business Administration'),
(3, 'Liton Michael Cruze', 'Manager - Administration & Finance'),
(4, 'Joynal Abedin', 'Manager - Business Administration'),
(5, 'Syed Ashraf Hussain', 'Coordinator - Procurement and Logistic	'),
(6, 'Ishrat Fatema', 'Team Leader'),
(7, 'Rabiul Islam', 'Finance and Admin Coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int NOT NULL,
  `driver_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `driver_name`) VALUES
(1, 'Ananda Mankin'),
(2, 'Monir Hossain'),
(3, 'Md. Belal'),
(4, 'Sayed Monirul Hossain'),
(5, 'Milon Shah'),
(6, 'Nipu Hazra'),
(7, 'Shahidul Islam'),
(8, 'Saiful Islam Milon'),
(9, 'Tutul Roy'),
(10, 'Zakir Hossain'),
(11, 'Sanaul Haque'),
(12, 'Syeed Kabir');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_forms`
--

CREATE TABLE `fuel_forms` (
  `id` int NOT NULL,
  `vehicle_id` int NOT NULL,
  `driver_id` int NOT NULL,
  `project_id` int NOT NULL,
  `previous_reading` varchar(100) NOT NULL,
  `current_reading` varchar(100) NOT NULL,
  `current_quantity` varchar(100) NOT NULL,
  `previous_quantity` varchar(100) NOT NULL,
  `fuel_vendor` varchar(100) NOT NULL,
  `memo_no` varchar(100) NOT NULL,
  `last_date` varchar(100) NOT NULL,
  `cur_date` varchar(100) NOT NULL,
  `recommender_id` varchar(100) NOT NULL,
  `approver_id` varchar(100) NOT NULL,
  `submit_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fuel_forms`
--

INSERT INTO `fuel_forms` (`id`, `vehicle_id`, `driver_id`, `project_id`, `previous_reading`, `current_reading`, `current_quantity`, `previous_quantity`, `fuel_vendor`, `memo_no`, `last_date`, `cur_date`, `recommender_id`, `approver_id`, `submit_at`) VALUES
(70, 9, 6, 8, '60136', '60541', '40', '40', 'Gulshan Service Station', '2838', '2022-05-25', '2022-06-05', '4', '1', '2022-06-11 09:01:59'),
(71, 8, 11, 5, '160221', '160417', '49', '44', 'Gulshan Service Station', '3016', '2022-05-22', '2022-06-01', '3', '3', '2022-06-11 09:06:53'),
(72, 10, 9, 7, '73447', '73579', '35', '47', 'Gulshan Service Station', '2687', '2022-05-22', '2022-06-02', '4', '1', '2022-06-11 09:09:09'),
(73, 11, 7, 1, '122371', '122534', '41', '38', 'Gulshan Service Station', '2890', '2022-06-05', '2022-06-09', '4', '1', '2022-06-12 07:13:17'),
(74, 5, 8, 4, '88814', '89053', '44', '49', 'Gulshan Service Station', '2076', '2022-05-18', '2022-06-01', '5', '6', '2022-06-13 04:26:47'),
(75, 12, 5, 6, '75270', '75350', '45', '58', 'Gulshan Service Station', '2964', '2022-05-19', '2022-05-29', '4', '5', '2022-06-12 06:14:27'),
(76, 7, 10, 1, '104846', '104968', '33', '44', 'Gulshan Service Station', '2299', '2022-05-26', '2022-06-09', '4', '1', '2022-06-12 06:20:32'),
(77, 15, 1, 2, '53986', '54128', '40', '47', 'Gulshan Service Station', '3057', '2022-05-29', '2022-06-02', '4', '4', '2022-06-12 06:32:16'),
(78, 14, 7, 1, '48553', '48734', '51', '46', 'Gulshan Service Station', '2790', '2022-06-05', '2022-06-12', '4', '1', '2022-06-12 06:38:21'),
(80, 12, 5, 6, '75350', '75739', '57', '45', 'Gulshan Service Station', '2965', '2022-05-29', '2022-06-12', '4', '5', '2022-06-12 07:24:17'),
(81, 10, 9, 7, '73579', '73699', '35', '35', 'Gulshan Service Station', '2688', '2022-06-02', '2022-06-11', '4', '1', '2022-06-12 08:48:20'),
(82, 5, 8, 4, '89053', '89274', '39', '44', 'Gulshan Service Station', '2078', '2022-06-01', '2022-06-13', '5', '6', '2022-06-12 06:10:44'),
(83, 9, 6, 8, '60541', '60721', '33', '40', 'Gulshan Service Station', '2839', '2022-06-05', '2022-06-09', '4', '1', '2022-06-13 06:55:48'),
(84, 15, 1, 2, '54128', '54315', '45', '40', 'Gulshan Service Station', '3058', '2022-06-02', '2022-06-12', '4', '4', '2022-06-13 08:46:12'),
(85, 16, 12, 3, '115798', '116159', '54.52', '33.44', 'TMSS CNG Limited', '641', '2022-06-01', '2022-06-11', '1', '2', '2022-06-14 05:29:47'),
(86, 6, 4, 3, '146098', '146243', '27', '44', 'Mintu Mia Filling Station, Bhairab', '2441', '2022-06-06', '2022-06-09', '2', '2', '2022-06-14 09:37:03'),
(91, 13, 3, 9, '25989', '26199', '29', '35', 'Gulshan Service Station', '2940', '2022-05-22', '2022-06-19', '4', '1', '19-Jun-22 08:42 am'),
(92, 6, 4, 3, '146243', '146602', '59', '27', 'Gulshan Service Station', '3109', '2022-06-09', '2022-06-16', '2', '2', '19-Jun-22 10:33 am'),
(93, 9, 6, 8, '60721', '60952', '38', '33', 'Gulshan Service Station', '2840', '2022-06-09', '2022-06-19', '4', '1', '19-Jun-22 12:10 pm'),
(94, 12, 5, 6, '75739', '76123', '55', '57', 'Gulshan Service Station', '2966', '2022-06-12', '2022-06-19', '4', '5', '19-Jun-22 03:49 pm'),
(95, 8, 11, 5, '160417', '160585', '48', '49', 'Gulshan Service Station', '3017', '2022-06-01', '2022-06-19', '3', '3', '19-Jun-22 04:28 pm'),
(96, 5, 8, 4, '89274', '89570', '50', '39', 'Gulshan Service Station', '2079', '2022-06-13', '2022-06-20', '4', '7', '20-Jun-22 03:59 pm'),
(97, 14, 7, 1, '48734', '48902', '38', '51', 'Gulshan Service Station', '2791', '2022-06-12', '2022-06-21', '4', '1', '21-Jun-22 09:38 am'),
(98, 15, 1, 2, '54315', '54490', '42', '45', 'Gulshan Service Station', '3059', '2022-06-12', '2022-06-21', '4', '4', '22-Jun-22 09:47 am'),
(99, 11, 2, 1, '122534', '122611', '29', '41', 'Gulshan Service Station', '2891', '2022-06-09', '2022-06-12', '4', '1', '23-Jun-22 04:24 pm'),
(100, 11, 2, 1, '122611', '122873', '39', '29', 'TMSS CNG Limited', '4537', '2022-06-12', '2022-06-14', '4', '1', '23-Jun-22 04:31 pm'),
(101, 11, 2, 1, '122873', '123030', '25', '39', 'TMSS CNG Limited', '165', '2022-06-14', '2022-06-16', '4', '1', '23-Jun-22 04:33 pm'),
(102, 11, 2, 1, '123030', '123320', '40', '25', 'Gulshan Service Station', '2892', '2022-06-16', '2022-06-17', '4', '1', '23-Jun-22 04:35 pm'),
(103, 11, 10, 1, '123320', '123495', '45', '40', 'Gulshan Service Station', '2893', '2022-06-17', '2022-06-25', '4', '1', '25-Jun-22 01:28 pm'),
(104, 10, 9, 7, '73699', '73813', '35', '35', 'Gulshan Service Station', '2689', '2022-06-11', '2022-06-26', '4', '1', '26-Jun-22 09:19 am'),
(105, 9, 6, 8, '60952', '61135', '34', '38', 'Gulshan Service Station', '2841', '2022-06-19', '2022-06-26', '4', '1', '26-Jun-22 09:21 am'),
(106, 13, 3, 9, '26199', '26382', '34', '29', 'Gulshan Service Station', '2941', '2022-06-19', '2022-06-26', '4', '1', '26-Jun-22 09:22 am'),
(107, 5, 8, 4, '89570', '89796', '40', '50', 'Gulshan Service Station', '2080', '2022-06-20', '2022-06-26', '4', '7', '27-Jun-22 09:39 am'),
(109, 14, 7, 1, '48902', '49099', '40', '38', 'Gulshan Service Station', '2792', '2022-06-21', '2022-06-28', '4', '1', '28-Jun-22 08:56 am'),
(110, 6, 4, 3, '146602', '146812', '53', '59', 'Gulshan Service Station', '3110', '2022-06-16', '2022-06-28', '2', '2', '28-Jun-22 09:03 am'),
(111, 11, 10, 1, '123495', '123642', '44', '45', 'Gulshan Service Station', '2894', '2022-06-25', '2022-06-29', '4', '1', '30-Jun-22 09:22 am'),
(112, 9, 6, 8, '61135', '61350', '38', '34', 'Gulshan Service Station', '2842', '2022-06-26', '2022-06-30', '4', '1', '30-Jun-22 10:15 am'),
(119, 16, 12, 3, '116159', '116424', '33.70', '54.52', 'M/S Riyaz and co CNG filling station, Gazipur', '48807', '2022-06-11', '2022-06-16', '1', '2', '03-Jul-22 10:48 am'),
(120, 16, 12, 3, '116424', '116630', '45.20', '33.70', 'TMSS CNG Limited', '642', '2022-06-16', '2022-06-20', '1', '2', '03-Jul-22 10:53 am'),
(121, 5, 8, 4, '89796', '90146', '47', '40', 'M/S A B Khan', '12135', '2022-06-26', '2022-06-29', '4', '7', '03-Jul-22 10:59 am'),
(123, 16, 12, 3, '116630', '116927', '33.44', '45.20', 'Rowshon & Rojob Full Station', '126574', '2022-06-20', '2022-06-22', '1', '2', '03-Jul-22 11:01 am'),
(124, 16, 12, 3, '116927', '117168', '48', '33.44', 'TMSS CNG Limited', '643', '2022-06-22', '2022-06-27', '1', '2', '03-Jul-22 11:04 am'),
(125, 16, 12, 3, '117168', '117566', '25', '48', 'M/s Hoque Full Station', '3476', '2022-06-27', '2022-06-30', '1', '2', '03-Jul-22 11:09 am'),
(126, 5, 8, 4, '90146', '90510', '53', '47', 'Gulshan Service Station', '2081', '2022-06-29', '2022-07-03', '4', '7', '03-Jul-22 03:49 pm'),
(127, 15, 1, 2, '54490', '54708', '50', '42', 'Gulshan Service Station', '3060', '2022-06-21', '2022-07-03', '6', '4', '04-Jul-22 10:20 am'),
(128, 14, 7, 1, '49099', '49296', '36', '40', 'Gulshan Service Station', '2793', '2022-06-28', '2022-07-06', '4', '1', '06-Jul-22 09:40 am'),
(129, 7, 2, 1, '104968', '105115', '40', '33', 'Gulshan Service Station', '2300', '2022-06-09', '2022-06-23', '4', '1', '06-Jul-22 10:17 am'),
(131, 11, 10, 1, '123642', '123803', '45', '44', 'Gulshan Service Station', '2895', '2022-06-29', '2022-07-06', '4', '1', '07-Jul-22 09:40 am'),
(132, 15, 1, 2, '54708', '54920', '51', '50', 'Gulshan Service Station', '3061', '2022-07-03', '2022-07-14', '6', '4', '14-Jul-22 11:15 am'),
(133, 11, 10, 1, '123803', '123938', '35', '45', 'Gulshan Service Station', '2896', '2022-07-06', '2022-07-14', '4', '1', '14-Jul-22 11:17 am'),
(134, 10, 9, 7, '73813', '73940', '40', '35', 'Gulshan Service Station', '2690', '2022-06-26', '2022-07-14', '4', '1', '14-Jul-22 11:18 am'),
(135, 9, 6, 8, '61350', '61533', '33', '38', 'Gulshan Service Station', '2842', '2022-06-30', '2022-07-06', '4', '1', '17-Jul-22 09:55 am'),
(136, 9, 6, 8, '61533', '61767', '41', '33', 'Gulshan Service Station', '2844', '2022-07-06', '2022-07-18', '4', '1', '18-Jul-22 09:28 am'),
(137, 5, 8, 4, '90510', '90758', '45', '53', 'Gulshan Service Station', '2082', '2022-07-03', '2022-07-18', '4', '7', '18-Jul-22 10:09 am'),
(138, 8, 11, 5, '160585', '160753', '39', '48', 'Gulshan Service Station', '3018', '2022-06-19', '2022-07-18', '3', '3', '18-Jul-22 02:17 pm'),
(139, 14, 10, 1, '49296', '49463', '44', '36', 'Gulshan Service Station', '2794', '2022-07-06', '2022-07-20', '4', '1', '21-Jul-22 09:10 am'),
(140, 6, 4, 3, '146812', '147008', '43', '53', 'Gulshan Service Station', '3111', '2022-06-28', '2022-07-19', '2', '2', '24-Jul-22 09:23 am'),
(141, 12, 5, 6, '76123', '76376', '57', '55', 'Gulshan Service Station', '2967', '2022-06-19', '2022-07-24', '4', '5', '24-Jul-22 04:44 pm'),
(142, 9, 6, 8, '61767', '62020', '43', '41', 'Gulshan Service Station', '2845', '2022-07-18', '2022-07-26', '4', '1', '26-Jul-22 09:23 am'),
(143, 6, 4, 3, '147008', '147320', '59', '43', 'Gulshan Service Station', '3112', '2022-07-19', '2022-07-24', '2', '2', '26-Jul-22 10:50 am'),
(144, 5, 8, 4, '90758', '90977', '41', '45', 'Gulshan Service Station', '2083', '2022-07-18', '2022-07-27', '4', '7', '27-Jul-22 10:20 am'),
(145, 8, 11, 5, '160753', '160944', '51', '39', 'Gulshan Service Station', '3019', '2022-07-18', '2022-07-27', '3', '3', '27-Jul-22 10:21 am'),
(146, 11, 2, 1, '123938', '124138', '47', '35', 'Gulshan Service Station', '2897', '2022-07-14', '2022-07-25', '4', '1', '27-Jul-22 10:41 am'),
(147, 13, 3, 9, '26382', '26588', '36', '34', 'Gulshan Service Station', '2942', '2022-06-26', '2022-07-03', '4', '1', '27-Jul-22 10:54 am'),
(148, 13, 3, 9, '26588', '26754', '29', '36', 'Gulshan Service Station', '2943', '2022-07-03', '2022-07-06', '4', '1', '27-Jul-22 10:56 am'),
(149, 13, 3, 9, '26754', '26966', '34', '29', 'Gulshan Service Station', '2944', '2022-07-06', '2022-07-27', '4', '1', '27-Jul-22 10:59 am');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_vendor`
--

CREATE TABLE `fuel_vendor` (
  `fv_id` int NOT NULL,
  `fv_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fuel_vendor`
--

INSERT INTO `fuel_vendor` (`fv_id`, `fv_name`) VALUES
(1, 'Gulshan Service Station'),
(2, 'TMSS CNG Limited');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_cost`
--

CREATE TABLE `maintenance_cost` (
  `m_cost_id` int NOT NULL,
  `maintenance_forms_id` int NOT NULL,
  `cost` varchar(255) NOT NULL,
  `vendor_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `maintenance_cost`
--

INSERT INTO `maintenance_cost` (`m_cost_id`, `maintenance_forms_id`, `cost`, `vendor_name`) VALUES
(14, 176, '5002', 'Prime Auto Care');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_forms`
--

CREATE TABLE `maintenance_forms` (
  `id` int NOT NULL,
  `vehicle_id` int NOT NULL,
  `driver_id` int NOT NULL,
  `project_id` int NOT NULL,
  `type_id` int NOT NULL,
  `previous_reading` varchar(100) NOT NULL,
  `current_reading` varchar(100) NOT NULL,
  `problems` longtext NOT NULL,
  `previous_date` varchar(100) NOT NULL,
  `curr_date` varchar(100) NOT NULL,
  `recommender_id` int NOT NULL,
  `approver_id` int NOT NULL,
  `repair_cost` varchar(100) DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `submit_at` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `maintenance_forms`
--

INSERT INTO `maintenance_forms` (`id`, `vehicle_id`, `driver_id`, `project_id`, `type_id`, `previous_reading`, `current_reading`, `problems`, `previous_date`, `curr_date`, `recommender_id`, `approver_id`, `repair_cost`, `vendor`, `submit_at`) VALUES
(151, 5, 8, 4, 1, '84245', '86227', 'suspension check, break pad servicing, door sound problem, First aid box 1 pcs, Need tool box', '2021-06-29', '2022-02-07', 5, 6, NULL, NULL, '2022-06-13 10:40:58'),
(152, 6, 4, 3, 1, '142936', '146069', 'Engine Oil, Water Wash, Flushing Oil, oil filter, break chekcing & servicing, Engine head gasket leak', '2022-03-06', '2022-06-02', 2, 2, NULL, NULL, '2022-06-12 11:14:53'),
(153, 15, 1, 2, 1, '50212', '53722', 'General Servicing', '2021-12-21', '2022-05-17', 4, 4, NULL, NULL, '2022-06-12 11:05:26'),
(154, 9, 6, 8, 1, '57141', '59792', 'WIpper blade 3 pcs, Duster, Towel, Wheel Aligenment', '2022-01-06', '2022-05-12', 4, 1, NULL, NULL, '2022-06-12 11:15:38'),
(155, 10, 9, 7, 1, '69860', '73233', 'Car Wash Shampoo, Ignition coil malfunctioning, car shiner', '2022-03-07', '2022-04-26', 4, 1, NULL, NULL, '2022-06-12 11:15:27'),
(156, 13, 3, 9, 1, '20565', '23896', 'Engine Oil, Air Filter, Water Wash, Oil filter', '2022-01-11', '2022-03-28', 4, 1, NULL, NULL, '2022-06-12 11:15:18'),
(157, 12, 5, 6, 1, '72679', '75673', 'Engine Oil, Air Filter, Water Wash, A/C Filter, Spark plug problem', '2022-03-05', '2022-06-09', 4, 5, NULL, NULL, '2022-06-13 10:42:19'),
(158, 14, 10, 1, 1, '43835', '47891', 'front Left door lock problem', '2022-03-29', '2022-05-29', 4, 1, NULL, NULL, '2022-06-12 11:05:00'),
(160, 8, 11, 5, 1, '156081', '158416', 'Car Wash Shampoo, Flushing Oil, Engine vibration problem, Break checking', '2022-01-25', '2022-04-13', 4, 3, NULL, NULL, '2022-06-16 06:13:22'),
(164, 5, 8, 4, 1, '86227', '89331', 'Car key Battery Problem, Chassis Rubber Bush problem, Stearing Bad Sound Please Check, Break Servicing', '2022-02-07', '2022-06-13', 5, 6, NULL, NULL, '2022-06-13 10:44:28'),
(165, 8, 11, 5, 2, '160209', '160247', 'Wheel Alingment check, Wheel balancing check, Interior wash, Car wash', '2022-05-22', '2022-05-24', 3, 3, NULL, NULL, '2022-06-16 06:13:26'),
(166, 16, 12, 3, 2, '113348', '115239', 'Engine Oil, 4 pcs coil', '2022-04-17', '2022-05-29', 1, 2, NULL, NULL, '2022-06-14 05:15:53'),
(167, 14, 7, 1, 2, '48752', '48775', 'front left side door lock problem', '2022-06-13', '2022-06-15', 4, 1, NULL, NULL, '2022-06-15 04:42:20'),
(169, 8, 11, 5, 2, '160247', '160566', 'Suspension problem', '2022-04-13', '2022-06-16', 3, 3, NULL, NULL, '2022-06-16 06:10:03'),
(172, 7, 7, 1, 1, '101347', '104347', 'Engine Oil, Air Filter, Oil Filter', '2021-12-15', '2022-03-08', 4, 1, NULL, NULL, '19-Jun-22 11:39 am'),
(173, 11, 10, 1, 2, '122151', '123522', 'Spark plug problem, Engine Belt replace, Horn, Fuel system servicing', '2022-05-25', '2022-06-26', 4, 1, NULL, NULL, '26-Jun-22 06:24 pm'),
(174, 16, 12, 3, 1, '110665', '113348', 'Engine Oil, Air Filter, Mobil Filter, Car Wash Shampoo, Four Wheel Brake Servicing, Flushing Oil, AC filter, Duster cleaner, Front Break pad', '2022-02-22', '2022-04-17', 1, 2, NULL, NULL, '29-Jun-22 01:31 pm'),
(175, 14, 7, 1, 1, '46150', '49195', 'Engine Oil, Air Filter, Water Wash, Mobil Filter, Flushing Oil, AC filter', '2022-06-15', '2022-06-30', 4, 1, NULL, NULL, '29-Jun-22 04:11 pm'),
(176, 7, 2, 1, 1, '104347', '105252', 'Four Wheel Brake Servicing', '2022-03-08', '2022-06-30', 4, 1, NULL, NULL, '30-Jun-22 09:57 am'),
(178, 16, 12, 3, 1, '113348', '117775', 'Engine Oil, Air Filter, Water Wash, Mobil Filter, Car Wash Shampoo, Four Wheel Brake Servicing, Flushing Oil, AC filter, Oil Filter, Oiper biades', '2022-04-17', '2022-07-03', 1, 2, NULL, NULL, '03-Jul-22 11:36 am'),
(179, 16, 12, 3, 2, '115239', '116710', 'Car Engine Wash', '2022-05-29', '2022-06-20', 1, 2, NULL, NULL, '03-Jul-22 12:14 pm'),
(180, 16, 12, 3, 2, '116710', '117524', 'Tyres Linkes', '2022-06-20', '2022-06-30', 1, 2, NULL, NULL, '03-Jul-22 12:21 pm'),
(181, 11, 10, 1, 1, '123522', '123784', 'Engine Oil, Air Filter, Water Wash, Mobil Filter, Flushing Oil, AC filter', '2022-06-26', '2022-07-05', 4, 1, NULL, NULL, '05-Jul-22 09:18 am'),
(182, 16, 12, 3, 2, '117524', '118427', 'battery Prob', '2022-06-30', '2022-07-18', 1, 2, NULL, NULL, '19-Jul-22 02:36 pm'),
(183, 6, 4, 3, 2, '146069', '147248', 'Steering Wheel is Shaking', '2022-06-02', '2022-07-21', 2, 2, NULL, NULL, '21-Jul-22 09:06 am'),
(185, 13, 3, 9, 1, '23896', '26878', 'Four Wheel Brake Servicing', '2022-03-28', '2022-07-24', 4, 1, NULL, NULL, '24-Jul-22 10:57 am');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `id` int NOT NULL,
  `problem_list` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `problem_list`) VALUES
(1, 'AC filter'),
(2, 'Engine Oil'),
(3, 'Air Filter'),
(5, 'Water Wash'),
(6, 'Mobil Filter'),
(7, 'Car Wash Shampoo'),
(8, 'Oil Filter'),
(9, 'Four Wheel Brake Servicing'),
(10, 'Flushing Oil'),
(11, 'Headlight problem'),
(12, 'Indicator light problem'),
(13, 'Parking light problem'),
(14, 'Vibration problem'),
(15, 'Ignition coil malfunctioning'),
(16, 'car shiner'),
(17, 'Spark plug problem'),
(18, 'Steering Issues'),
(19, 'Steering Wheel is Shaking'),
(20, 'Brake Pads are Worn'),
(21, 'Tyres are Flat'),
(22, 'Starter Motor is Failing'),
(23, 'Sensors Are Malfunctioning'),
(24, 'Window Problems'),
(25, 'Faulty Starter'),
(26, 'Rust'),
(27, 'Car Keeps Overheating'),
(28, 'Brakes Squeaking or Grinding'),
(30, 'Dents And Scratches'),
(31, 'Paint Problems'),
(32, 'Cracked Or Loose Fuel Cap'),
(33, 'Streaky Windshields');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int NOT NULL,
  `project_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `project_cat` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_cat`) VALUES
(1, 'ASTHA', 1),
(2, 'BMMDP', 3),
(3, 'B-SkillFUL', 2),
(4, 'DBLP', 4),
(5, 'M4C', 5),
(6, 'PRABRIDDHI', 6),
(7, 'CoOf', 1),
(8, 'SARATHI', 1),
(9, 'UTTORON', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recommender`
--

CREATE TABLE `recommender` (
  `recommender_id` int NOT NULL,
  `r_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `designation` varchar(100) NOT NULL,
  `project` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recommender`
--

INSERT INTO `recommender` (`recommender_id`, `r_name`, `designation`, `project`, `created_on`) VALUES
(1, 'Naznin Akhtar', 'Officer - Business Administration', 'B-SkillfuL', '2022-04-24 04:04:32'),
(2, 'Samaun Bhuiyan', 'Coordinator Procurement & Logistics', 'B-SkillfuL', '2022-04-25 04:59:52'),
(3, 'Farzana Boby', 'Senior Officer - Business Administration', 'M4C', '2022-04-26 02:39:01'),
(4, 'N/A', 'N/A', '', '2022-05-17 04:07:19'),
(5, 'Rabiul Islam', 'Finance and Admin Coordinator', 'DBLP', '2022-06-13 04:24:11'),
(6, 'Tonmoy Hasan', 'Finance & Administration Officer', 'BMMDP', '2022-07-03 07:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `repair_vendor`
--

CREATE TABLE `repair_vendor` (
  `rv_id` int NOT NULL,
  `rv_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `repair_vendor`
--

INSERT INTO `repair_vendor` (`rv_id`, `rv_name`) VALUES
(1, 'Prime Auto Care'),
(2, 'Excellent Automobile'),
(3, 'Mahi Engineering Workshop');

-- --------------------------------------------------------

--
-- Table structure for table `requisition`
--

CREATE TABLE `requisition` (
  `requisition_id` int NOT NULL,
  `vehicle_id` int NOT NULL,
  `driver_id` int NOT NULL,
  `project_id` int NOT NULL,
  `recommender_id` int NOT NULL,
  `approver_id` int NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `submit_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `requisition`
--

INSERT INTO `requisition` (`requisition_id`, `vehicle_id`, `driver_id`, `project_id`, `recommender_id`, `approver_id`, `remarks`, `submit_at`) VALUES
(5, 14, 7, 1, 4, 1, 'Towel 1 Pcs', '2022-06-15 08:32:36'),
(6, 6, 4, 3, 2, 2, 'Vehicle document Expire date 29/06/2022', '2022-06-15 10:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `requisition_items`
--

CREATE TABLE `requisition_items` (
  `item_id` int NOT NULL,
  `item_list` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `requisition_items`
--

INSERT INTO `requisition_items` (`item_id`, `item_list`, `created_on`) VALUES
(1, 'Towel', '2022-06-15 07:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `type_id` int NOT NULL,
  `type_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`type_id`, `type_name`, `created_at`) VALUES
(1, 'General Servicing', '2022-06-12 16:55:46'),
(2, 'Maintenance', '2022-06-12 16:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `user_level`) VALUES
(1, 'ba.bsk', 'scbd123', 'B-SkillFul', 'bsk'),
(2, 'admin', '$wiSS@33', 'Admin', 'ba'),
(3, 'ba.coof', 'scbd123', 'CoOf', 'coof'),
(4, 'scbd_dr', 'scbd123', 'Drivers', 'driver'),
(5, 'ba.dblp', 'scbd123', 'DBLP', 'dblp'),
(6, 'ba.m4c', 'scbd123', 'M4C', 'm4c'),
(7, 'ba.led', 'scbd123', 'PRABRIDDHI', 'led'),
(8, 'ba.badip', 'scbd123', 'BMMDP', 'badip');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_no`
--

CREATE TABLE `vehicle_no` (
  `vehicle_id` int NOT NULL,
  `vehicle_num` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehicle_no`
--

INSERT INTO `vehicle_no` (`vehicle_id`, `vehicle_num`) VALUES
(5, 'DM-CHA-52-0736'),
(6, 'DM-CHA-53-6527'),
(7, 'DM-CHA-53-5300'),
(8, 'DM-CHA-53-6837'),
(9, 'DM-CHA-56-3756'),
(10, 'DM-GHA-13-2865'),
(11, 'DM-GHA-15-0436'),
(12, 'DM-GHA-17-7422'),
(13, 'DM-GHA-18-4839'),
(14, 'DM-GHA-18-2585'),
(15, 'DM-GHA-18-4019'),
(16, 'DM-CHA-52-0446');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approver`
--
ALTER TABLE `approver`
  ADD PRIMARY KEY (`approver_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `fuel_forms`
--
ALTER TABLE `fuel_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_vendor`
--
ALTER TABLE `fuel_vendor`
  ADD PRIMARY KEY (`fv_id`);

--
-- Indexes for table `maintenance_cost`
--
ALTER TABLE `maintenance_cost`
  ADD PRIMARY KEY (`m_cost_id`);

--
-- Indexes for table `maintenance_forms`
--
ALTER TABLE `maintenance_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `recommender`
--
ALTER TABLE `recommender`
  ADD PRIMARY KEY (`recommender_id`);

--
-- Indexes for table `repair_vendor`
--
ALTER TABLE `repair_vendor`
  ADD PRIMARY KEY (`rv_id`);

--
-- Indexes for table `requisition`
--
ALTER TABLE `requisition`
  ADD PRIMARY KEY (`requisition_id`);

--
-- Indexes for table `requisition_items`
--
ALTER TABLE `requisition_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `vehicle_no`
--
ALTER TABLE `vehicle_no`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approver`
--
ALTER TABLE `approver`
  MODIFY `approver_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fuel_forms`
--
ALTER TABLE `fuel_forms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `fuel_vendor`
--
ALTER TABLE `fuel_vendor`
  MODIFY `fv_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `maintenance_cost`
--
ALTER TABLE `maintenance_cost`
  MODIFY `m_cost_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `maintenance_forms`
--
ALTER TABLE `maintenance_forms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `recommender`
--
ALTER TABLE `recommender`
  MODIFY `recommender_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `repair_vendor`
--
ALTER TABLE `repair_vendor`
  MODIFY `rv_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requisition`
--
ALTER TABLE `requisition`
  MODIFY `requisition_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `requisition_items`
--
ALTER TABLE `requisition_items`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle_no`
--
ALTER TABLE `vehicle_no`
  MODIFY `vehicle_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
