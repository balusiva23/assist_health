-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2024 at 04:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assist_health_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultations_1`
--

CREATE TABLE `consultations_1` (
  `id` int(11) NOT NULL,
  `medical_history_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `treating_doctor` varchar(255) DEFAULT NULL,
  `hospital` varchar(255) DEFAULT NULL,
  `speciality` varchar(255) NOT NULL,
  `treatment_date` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultations_1`
--

INSERT INTO `consultations_1` (`id`, `medical_history_id`, `member_id`, `treating_doctor`, `hospital`, `speciality`, `treatment_date`, `is_active`) VALUES
(67, 5, 2, 'Doc 1', 'Hospital 1', 'Speciality 1', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `consultations_2`
--

CREATE TABLE `consultations_2` (
  `id` int(11) NOT NULL,
  `medical_history_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `complaints` varchar(255) DEFAULT NULL,
  `investigation` varchar(255) DEFAULT NULL,
  `diagnosis` varchar(255) DEFAULT NULL,
  `advised` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT 1,
  `specialist_details` varchar(255) NOT NULL,
  `treatment_date` varchar(255) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultations_2`
--

INSERT INTO `consultations_2` (`id`, `medical_history_id`, `member_id`, `complaints`, `investigation`, `diagnosis`, `advised`, `is_active`, `specialist_details`, `treatment_date`, `remarks`) VALUES
(9, 5, 2, NULL, NULL, NULL, NULL, 1, 'Tower 7, 1001, L&T Raintree', '2024-07-24', 'Tower 7, 1001, L&T Raintree Boulevard, Sahakar Nagar, Bangalore - 560064');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultations_1`
--
ALTER TABLE `consultations_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultations_2`
--
ALTER TABLE `consultations_2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultations_1`
--
ALTER TABLE `consultations_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `consultations_2`
--
ALTER TABLE `consultations_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
