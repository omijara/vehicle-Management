-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 07:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_maintenance`
--

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `vehicle_no` varchar(100) NOT NULL,
  `driver_name` varchar(100) NOT NULL,
  `project` varchar(100) NOT NULL,
  `meter_reading` varchar(100) NOT NULL,
  `problems` varchar(100) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `vehicle_no`, `driver_name`, `project`, `meter_reading`, `problems`, `vendor`, `created_at`) VALUES
(2, 'Dhaka Metro-CHA-53-5300', 'Md. Belal', 'Uttoron', '4100', 'laptop', 'Probriddhi', '2022-03-30 16:16:33'),
(3, 'Dhaka Metro-CHA-52-0736', 'Md. Belal', 'Uttoron', '7100', 'speaker', 'B-skillfull', '2022-03-30 17:08:16'),
(4, 'Dhaka Metro-CHA-52-0736', 'Md. Belal', 'Uttoron', '10100', 'laptop', 'Probriddhi', '2022-03-30 17:08:54'),
(5, 'Dhaka Metro-CHA-53-5300', 'Monir Hossain', 'Astha', '7100', 'laptop', 'Astha', '2022-03-30 17:12:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
