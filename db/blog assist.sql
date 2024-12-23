-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 03:43 AM
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
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `thumnail` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `isActive` int(11) DEFAULT 1,
  `slug` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `thumnail`, `content`, `isActive`, `slug`, `date`) VALUES
(15, 'Test 1', '1.jpg', 'When it comes to your healthcare needs, finding the right specialist is crucial. That\'s why AssistHealth offers an exclusive service for our registered members – we help you discover the best specialists.\r\n\r\nAs a registered member of AssistHealth, you\'ll gain access to a network of highly skilled and reputable specialists in your area. Our dedicated team, composed of doctors and navigators, will closely collaborate with you to understand your specific medical requirements. This ensures that you receive the personalized care you truly deserve.\r\n\r\nWith our extensive knowledge, expertise, and constant tracking of your health records, we excel at finding the ideal specialist for you. We carefully evaluate your needs and match you with the most suitable expert who specializes in your specific condition. Whether you need a renowned cardiologist, an experienced orthopedic surgeon, or any other specialist, we have you covered.\r\n\r\nAt AssistHealth, we are committed to excellence. We only recommend specialists who have a proven track record of delivering exceptional care and positive patient outcomes. Your well-being is our top priority, and we strive to connect you with doctors who possess the skills and expertise necessary to address your unique medical concerns.\r\n\r\nBid farewell to the hassle of researching and contacting friends, social groups, and specialists on your own. AssistHealth simplifies the process, saving you valuable time and effort. We handle all the coordination and appointment booking, ensuring a seamless experience from start to finish.\r\n\r\nYour health and peace of mind matter to us. With AssistHealth, you can confidently embark on your journey to better health, knowing that you have a dedicated team supporting you every step of the way.\r\n\r\nJoin AssistHealth today and allow us to connect you with the best specialists who will provide the exceptional care you truly deserve. Your health is worth it.\r\n', 1, NULL, '2024-07-07 21:40:44'),
(16, 'Test 2', '2.jpg', 'Lorem ipsum dolor sit amet, eum at error nonumy, mel agam dictas praesent no. Id vide ignota it concl udatu rque mea. Veritus fierent ex quo, per cu elit prima. Ius impedit nominati et, suas heu quidam mei ea. Sit erant at populo suavitate an, eu est pericula persecuti, sea...', 1, NULL, '2024-07-07 21:41:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
