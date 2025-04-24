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
