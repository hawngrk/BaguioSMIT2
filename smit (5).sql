-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 28, 2021 at 05:49 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smit+`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_account`
--

DROP TABLE IF EXISTS `employee_account`;
CREATE TABLE IF NOT EXISTS `employee_account` (
  `employee_account_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `employee_username` varchar(255) NOT NULL,
  `employee_password` varchar(255) NOT NULL,
  `employee_account_type` varchar(255) NOT NULL,
  `employee_picture` blob,
  PRIMARY KEY (`employee_account_id`),
  UNIQUE KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_account`
--

INSERT INTO `employee_account` (`employee_account_id`, `employee_id`, `employee_username`, `employee_password`, `employee_account_type`, `employee_picture`) VALUES
(1, 1, 'employeeChandler', '$2y$10$0KYcxfbe/./5GmMe5wACreXslYxnUjYu1dfbT0teA3z0Ox.eWrNR2', 'Admin', NULL),
(2, 2, 'employeeMonica', '$2y$10$nJQxcgx82/fVgbJUwBfhFOgYu6.bLPetbTCVg8.hEJigOGMVN5Sbe', 'Client', NULL),
(3, 3, 'employeeRoss', '$2y$10$CtcJbNJzobzRg1zQ5EOSFe9.NmVNabOMNgvSIFy8S1fUa4WmcbfIm', 'Client', NULL),
(4, 4, 'employeeJoseph', '$2y$10$H9kXw0D9droZJgbQv8PJK.zCU.pLgvjYfZZjB9s3jpxomUOTdJy5i', 'Client', NULL),
(5, 5, 'employeeRachel', '$2y$10$qo7wgN83bP16qdPq0mEVY.HVT9oaV86srAsDyPjySy3hSdD3IAYu2', 'Client', NULL),
(6, 6, 'employeeRegina', '$2y$10$.VBmCSuW3PobYiPJoulvweZ0KCm8nBV7Kf6lLxwdl0JmKrnNi5K2e', 'Client', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
