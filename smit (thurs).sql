-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2021 at 03:32 PM
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
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE IF NOT EXISTS `activity_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `employee_id` int(11) NOT NULL,
  `employee_role` varchar(255) NOT NULL,
  `log_type` varchar(255) NOT NULL,
  `log_description` varchar(255) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `employee_id_activity` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`log_id`, `log_entry_date`, `employee_id`, `employee_role`, `log_type`, `log_description`) VALUES
(1, '2021-10-28 06:56:58', 1, 'Barangay', 'Login', 'Successfully logged in'),
(2, '2021-10-28 06:57:34', 1, 'Barangay', 'Login', 'Successfully logged in'),
(3, '2021-10-28 06:57:51', 2, 'HSO', 'Login', 'Successfully logged in'),
(4, '2021-10-28 06:58:01', 5, 'Screening', 'Login', 'Successfully logged in'),
(5, '2021-10-28 06:58:15', 3, 'SSD', 'Login', 'Successfully logged in'),
(6, '2021-10-28 06:58:36', 4, 'Monitoring', 'Login', 'Successfully logged in'),
(7, '2021-10-28 13:46:26', 2, 'HSO', 'Login', 'Successfully logged in'),
(8, '2021-10-28 13:52:14', 2, 'HSO', 'Upload', 'Uploaded patient csv file'),
(9, '2021-10-28 14:05:42', 2, 'HSO', 'Archive', 'Archived patient ID: 1'),
(10, '2021-10-28 14:05:45', 2, 'HSO', 'Unarchive', 'Unarchived patient ID: 1'),
(11, '2021-10-28 15:06:47', 2, 'HSO', 'Add', 'Added patient ID: 56'),
(12, '2021-10-28 15:14:42', 7, 'EIR', 'Login', 'Successfully logged in'),
(13, '2021-10-28 15:17:06', 7, 'EIR', 'Upload', 'Uploaded patient csv file'),
(14, '2021-10-28 15:19:15', 7, 'EIR', 'Add', 'Added patient ID: 58');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

DROP TABLE IF EXISTS `barangay`;
CREATE TABLE IF NOT EXISTS `barangay` (
  `barangay_id` int(11) NOT NULL AUTO_INCREMENT,
  `health_district_id` int(11) NOT NULL,
  `barangay_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  PRIMARY KEY (`barangay_id`),
  KEY `health_district_id` (`health_district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`barangay_id`, `health_district_id`, `barangay_name`, `city`, `province`, `region`) VALUES
(1, 10, 'A. Bonifacio-Caguioa-Rimando (ABCR)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(2, 10, 'Alfonso Tabora', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(3, 4, 'Ambiong', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(4, 5, 'Andres Bonifacio', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(5, 3, 'Apugan-Loakan', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(6, 3, 'Atok Trail', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(7, 4, 'Aurora Hill North Central', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(8, 4, 'Aurora Hill Proper (Malvar-Sgt. Floresca)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(9, 4, 'Aurora Hill South Central', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(10, 10, 'Bagong Lipunan (Market Area)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(11, 2, 'Bakakeng Central', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(12, 2, 'Bakakeng North', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(13, 7, 'Bal-Marcoville (Marcoville)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(14, 6, 'Balsigan', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(15, 4, 'Bayan Park East', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(16, 4, 'Bayan Park Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(17, 4, 'Bayan Park West (Bayan Park)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(18, 7, 'BGH Compound', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(19, 4, 'Brookside', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(20, 4, 'Brookspoint', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(21, 7, 'Cabinet Hill-Teacher\'s Camp', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(22, 15, 'Camdas Subdivision', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(23, 9, 'Camp 7', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(24, 7, 'Camp 8', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(25, 5, 'Camp Allen', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(26, 5, 'Campo Filipino', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(27, 6, 'City Camp Central', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(28, 6, 'City Camp Proper', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(29, 12, 'Country Club Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(30, 5, 'Cresencia Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(31, 16, 'Dagsian Lower', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(32, 16, 'Dagsian Upper', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(33, 15, 'Dizon Subdivision', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(34, 6, 'Dominican Hill-Mirador', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(35, 2, 'Dontogan', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(36, 7, 'DPS Area', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(37, 7, 'Engineers\' Hill', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(38, 14, 'Fairview Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(39, 6, 'Ferdinand (Happy Homes-Campo Sioco)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(40, 3, 'Fort del Pilar', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(41, 16, 'Gabriela Silang', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(42, 6, 'General Emilio F. Aguinaldo (Quirino-Magsaysay, Lower)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(44, 7, 'General Luna Upper', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(45, 11, 'Gibraltar', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(46, 7, 'Greenwater Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(47, 13, 'Guisad Central', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(48, 5, 'Guisad Sorong', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(49, 16, 'Happy Hollow', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(50, 10, 'Happy Homes (Happy Homes-Lucban)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(51, 10, 'Harrison-Claudio Carantes', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(52, 16, 'Hillside Barangay', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(53, 10, 'Holy Ghost Extension', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(54, 10, 'Holy Ghost Proper', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(55, 10, 'Honeymoon (Honeymoon-Holy Ghost)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(56, 6, 'Imelda R. Marcos (La Salle)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(57, 10, 'Imelda Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(58, 8, 'Irisan', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(59, 10, 'Kabayanihan', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(60, 10, 'Kagitingan', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(61, 6, 'Kayang Extension', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(62, 10, 'Kayang-Hilltop', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(63, 3, 'Kias', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(64, 6, 'Legarda-Burnham-Kisad', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(65, 9, 'Liwanag-Loakan', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(66, 9, 'Loakan Proper', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(67, 4, 'Lopez Jaena', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(68, 6, 'Lourdes Subdivision Extension', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(69, 6, 'Lourdes Subdivision Lower', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(70, 6, 'Lourdes Subdivision Proper', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(71, 12, 'Lualhati', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(72, 11, 'Lucnab', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(73, 10, 'Magsaysay Lower', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(74, 10, 'Magsaysay Private Road', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(75, 10, 'Magsaysay Upper', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(76, 10, 'Malcolm Square-Perfecto (Jose Abad Santos)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(77, 12, 'Manuel A. Roxas', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(78, 5, 'Market Subdivision Upper', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(79, 14, 'Middle Quezon Hill Subdivision(Quezon Hill Middle)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(80, 7, 'Military Cut-off', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(81, 11, 'Mines View Park', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(82, 4, 'Modern Site East', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(83, 4, 'Modern Site West', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(84, 6, 'MRR-Queen of Peace', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(85, 10, 'New Lucban', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(86, 11, 'Outlook Drive', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(87, 12, 'Pacdal', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(88, 5, 'Padre Burgos', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(89, 5, 'Padre Zamora', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(90, 6, 'Palma-Urbano (Cariño-Palma)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(91, 7, 'Phil-Am', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(92, 13, 'Pinget', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(93, 13, 'Pinsao Pilot Project', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(94, 13, 'Pinsao Proper', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(95, 7, 'Poliwes', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(96, 11, 'Pucsusan', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(97, 14, 'Quezon Hill Proper', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(98, 14, 'Quezon Hill Upper', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(99, 15, 'Quirino Hill East', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(100, 15, 'Quirino Hill Lower', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(101, 15, 'Quirino Hill Middle', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(102, 15, 'Quirino Hill West', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(103, 6, 'Quirino-Magsaysay Upper (Upper QM)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(104, 10, 'Rizal Monument Area', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(105, 6, 'Rock Quarry Lower', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(106, 6, 'Rock Quarry Middle', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(107, 6, 'Rock Quarry Upper', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(108, 12, 'Saint Joseph Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(109, 7, 'Salud Mitra', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(110, 4, 'San Antonio Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(111, 10, 'Sanitary Camp North', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(112, 10, 'Sanitary Camp South', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(113, 1, 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(114, 1, 'San Roque Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(115, 7, 'Santa Escolastica', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(116, 2, 'Santo Rosario', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(117, 2, 'Santo Tomas Proper', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(118, 2, 'Santo Tomas School Area', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(119, 7, 'San Vicente', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(120, 16, 'Scout Barrio', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(121, 10, 'Session Road Area', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(122, 10, 'Slaughter House Area (Santo Niño Slaughter)', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(123, 2, 'SLU-SVP Housing Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(124, 12, 'South Drive', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(125, 10, 'Teodora Alonzo', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(126, 10, 'Trancoville', 'Baguio City', 'Benguet', 'Cordillera Administrative Region '),
(127, 14, 'Victoria Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region ');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_stubs`
--

DROP TABLE IF EXISTS `barangay_stubs`;
CREATE TABLE IF NOT EXISTS `barangay_stubs` (
  `barangay_id` int(11) NOT NULL,
  `drive_id` int(11) NOT NULL,
  `A1_stubs` int(11) DEFAULT NULL,
  `A2_stubs` int(11) DEFAULT NULL,
  `A3_stubs` int(11) DEFAULT NULL,
  `A4_stubs` int(11) DEFAULT NULL,
  `A5_stubs` int(11) DEFAULT NULL,
  `A6_stubs` int(11) DEFAULT NULL,
  `notif_opened` int(1) NOT NULL,
  KEY `barangay_id` (`barangay_id`),
  KEY `drive_id` (`drive_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangay_stubs`
--

INSERT INTO `barangay_stubs` (`barangay_id`, `drive_id`, `A1_stubs`, `A2_stubs`, `A3_stubs`, `A4_stubs`, `A5_stubs`, `A6_stubs`, `notif_opened`) VALUES
(113, 28, 20, 0, 0, 0, 0, 0, 1),
(114, 28, 80, 0, 0, 0, 0, 0, 1),
(113, 30, 1, 0, 0, 0, 0, 0, 1),
(114, 30, 99, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_first_name` varchar(255) NOT NULL,
  `employee_last_name` varchar(255) NOT NULL,
  `employee_middle_name` varchar(255) DEFAULT NULL,
  `employee_suffix` varchar(255) DEFAULT NULL,
  `employee_role` varchar(255) NOT NULL,
  `barangay_id` int(11) DEFAULT NULL,
  `employee_contact_number` char(11) NOT NULL,
  PRIMARY KEY (`employee_id`),
  KEY `barangay_id` (`barangay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_first_name`, `employee_last_name`, `employee_middle_name`, `employee_suffix`, `employee_role`, `barangay_id`, `employee_contact_number`) VALUES
(1, 'Chandler', 'Bing', 'Muriel', NULL, 'Barangay', 1, '09217532942'),
(2, 'Monica', 'Bing', 'Geller', NULL, 'HSO', NULL, '09217532942'),
(3, 'Ross', 'Geller', NULL, NULL, 'SSD', NULL, '09217532942'),
(4, 'Joseph', 'Tribbiani', 'Francis', 'Jr.', 'Monitoring', NULL, '09217532942'),
(5, 'Rachel', 'Geller', 'Green', NULL, 'Screening', NULL, '09217532942'),
(6, 'Phoebe', 'Buffay', NULL, NULL, 'Mayor\'s Office', NULL, '09217532942'),
(7, 'James Michael', 'Tyler', NULL, NULL, 'EIR', NULL, '09643674543');

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
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`employee_account_id`),
  UNIQUE KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_account`
--

INSERT INTO `employee_account` (`employee_account_id`, `employee_id`, `employee_username`, `employee_password`, `employee_account_type`, `employee_picture`, `disabled`) VALUES
(1, 1, 'employeeChandler', '$2y$10$0KYcxfbe/./5GmMe5wACreXslYxnUjYu1dfbT0teA3z0Ox.eWrNR2', 'Employee', NULL, 0),
(2, 2, 'employeeMonica', '$2y$10$nJQxcgx82/fVgbJUwBfhFOgYu6.bLPetbTCVg8.hEJigOGMVN5Sbe', 'Employee', NULL, 0),
(3, 3, 'employeeRoss', '$2y$10$CtcJbNJzobzRg1zQ5EOSFe9.NmVNabOMNgvSIFy8S1fUa4WmcbfIm', 'Employee', NULL, 0),
(4, 4, 'employeeJoseph', '$2y$10$H9kXw0D9droZJgbQv8PJK.zCU.pLgvjYfZZjB9s3jpxomUOTdJy5i', 'Employee', NULL, 0),
(5, 5, 'employeeRachel', '$2y$10$qo7wgN83bP16qdPq0mEVY.HVT9oaV86srAsDyPjySy3hSdD3IAYu2', 'Employee', NULL, 0),
(6, 6, 'employeeRegina', '$2y$10$.VBmCSuW3PobYiPJoulvweZ0KCm8nBV7Kf6lLxwdl0JmKrnNi5K2e', 'Employee', NULL, 0),
(7, 7, 'employeeGunther', '$2y$10$x3R9loc9XCXHiFKOtuA93uBK/sqIXJvGmJrrfko4cflJ6RhtEd23W', 'Employee', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `health_district`
--

DROP TABLE IF EXISTS `health_district`;
CREATE TABLE IF NOT EXISTS `health_district` (
  `health_district_id` int(11) NOT NULL AUTO_INCREMENT,
  `health_district_name` varchar(255) NOT NULL,
  `hd_contact_number` char(11) NOT NULL,
  PRIMARY KEY (`health_district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `health_district`
--

INSERT INTO `health_district` (`health_district_id`, `health_district_name`, `hd_contact_number`) VALUES
(1, 'Asin Health Center', '6204798'),
(2, 'Atab health Center', '4209087'),
(3, 'Atok Trail Health Center', '6205395'),
(4, 'Aurora Hill Health Center', '09088117675'),
(5, 'Campo Filipino Health Center', '4420031'),
(6, 'City Camp Health Center', '09150522277'),
(7, 'Engineers Hill Health Center', '09562802014'),
(8, 'Irisan Health Center', '09562802014'),
(9, 'Loakan Health Center', '09562802014'),
(10, 'Lucban Health Center', '09492527664'),
(11, 'Mines View Health Center', '6658702'),
(12, 'Pacdal Health Center', '6658104'),
(13, 'Pinsao Health Center', '6657805'),
(14, 'Quezon Hill Health Center', '65205469'),
(15, 'Quirino Center', '09350692877'),
(16, 'Scount Barrio Center', '09262163933');

-- --------------------------------------------------------

--
-- Table structure for table `health_district_drives`
--

DROP TABLE IF EXISTS `health_district_drives`;
CREATE TABLE IF NOT EXISTS `health_district_drives` (
  `drive_id` int(11) NOT NULL,
  `health_district_id` int(11) NOT NULL,
  KEY `drive_id` (`drive_id`),
  KEY `health_district_id` (`health_district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_district_drives`
--

INSERT INTO `health_district_drives` (`drive_id`, `health_district_id`) VALUES
(28, 1),
(29, 2),
(30, 1),
(31, 11),
(32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medical_background`
--

DROP TABLE IF EXISTS `medical_background`;
CREATE TABLE IF NOT EXISTS `medical_background` (
  `patient_id` int(11) NOT NULL,
  `allergy_to_vaccine` tinyint(4) NOT NULL,
  `hypertension` tinyint(4) NOT NULL,
  `heart_disease` tinyint(4) NOT NULL,
  `kidney_disease` tinyint(4) NOT NULL,
  `diabetes_mellitus` tinyint(4) NOT NULL,
  `bronchial_asthma` tinyint(4) NOT NULL,
  `immunodeficiency` tinyint(4) NOT NULL,
  `cancer` tinyint(4) NOT NULL,
  `other_commorbidity` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_background`
--

INSERT INTO `medical_background` (`patient_id`, `allergy_to_vaccine`, `hypertension`, `heart_disease`, `kidney_disease`, `diabetes_mellitus`, `bronchial_asthma`, `immunodeficiency`, `cancer`, `other_commorbidity`) VALUES
(6, 0, 0, 0, 0, 0, 1, 0, 0, 'PM'),
(7, 0, 0, 0, 0, 0, 1, 0, 0, 'None'),
(8, 0, 0, 0, 0, 0, 1, 0, 0, 'None'),
(9, 0, 0, 0, 0, 0, 1, 0, 0, 'None'),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(11, 0, 0, 0, 0, 0, 1, 0, 0, 'None'),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(13, 0, 0, 0, 1, 0, 0, 0, 0, 'None'),
(14, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(15, 0, 0, 0, 0, 0, 1, 0, 0, 'None'),
(16, 0, 0, 0, 1, 1, 0, 0, 0, 'None'),
(17, 0, 0, 0, 0, 1, 0, 0, 0, 'None'),
(18, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(19, 0, 0, 1, 0, 0, 0, 0, 0, 'None'),
(20, 0, 0, 1, 0, 0, 0, 0, 0, 'None'),
(21, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(22, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(23, 0, 0, 0, 0, 1, 0, 0, 0, 'None'),
(24, 0, 1, 0, 0, 0, 0, 0, 0, 'None'),
(25, 0, 0, 0, 0, 1, 0, 0, 0, 'None'),
(26, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(27, 0, 1, 0, 0, 0, 0, 0, 0, 'None'),
(28, 0, 0, 0, 0, 1, 0, 0, 0, 'None'),
(29, 0, 0, 1, 0, 0, 0, 0, 0, 'None'),
(30, 0, 0, 0, 0, 0, 1, 0, 0, 'None'),
(31, 0, 0, 0, 0, 0, 1, 0, 0, 'None'),
(32, 0, 0, 1, 0, 0, 0, 0, 0, 'None'),
(33, 0, 0, 0, 0, 1, 0, 0, 0, 'None'),
(34, 1, 1, 0, 0, 0, 0, 0, 0, 'None'),
(35, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(36, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(37, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(38, 1, 0, 0, 0, 0, 0, 0, 0, 'None'),
(39, 0, 1, 0, 0, 0, 0, 0, 0, 'None'),
(40, 0, 0, 0, 0, 1, 0, 0, 0, 'None'),
(41, 0, 0, 1, 0, 0, 1, 0, 0, 'None'),
(42, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(43, 0, 0, 0, 0, 0, 1, 0, 0, 'None'),
(44, 0, 0, 1, 0, 0, 0, 0, 0, 'None'),
(45, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(46, 0, 0, 0, 0, 1, 0, 0, 0, 'None'),
(47, 0, 0, 0, 0, 1, 0, 0, 0, 'None'),
(48, 0, 1, 0, 0, 0, 0, 0, 0, 'None'),
(49, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(50, 0, 0, 1, 0, 0, 0, 0, 0, 'None'),
(51, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(52, 0, 0, 1, 0, 0, 0, 0, 0, 'None'),
(53, 0, 1, 0, 0, 0, 0, 0, 0, 'None'),
(54, 0, 0, 1, 0, 0, 0, 0, 0, 'None'),
(55, 0, 0, 0, 0, 0, 1, 0, 0, 'PM'),
(56, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(57, 0, 0, 0, 0, 0, 1, 0, 0, 'PM'),
(58, 0, 0, 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` int(255) NOT NULL AUTO_INCREMENT,
  `patient_full_name` varchar(255) NOT NULL,
  `date_of_first_dosage` date DEFAULT NULL,
  `date_of_second_dosage` date DEFAULT NULL,
  `first_dose_vaccination` int(1) DEFAULT NULL,
  `second_dose_vaccination` int(1) DEFAULT NULL,
  `for_queue` int(1) DEFAULT NULL,
  `notification` int(1) DEFAULT NULL,
  `first_dose_vaccinator` int(11) DEFAULT NULL,
  `second_dose_vaccinator` int(11) DEFAULT NULL,
  `token` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`patient_id`),
  KEY `patient_first_vaccinator` (`first_dose_vaccinator`),
  KEY `patient_second_vaccinator` (`second_dose_vaccinator`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_full_name`, `date_of_first_dosage`, `date_of_second_dosage`, `first_dose_vaccination`, `second_dose_vaccination`, `for_queue`, `notification`, `first_dose_vaccinator`, `second_dose_vaccinator`, `token`) VALUES
(1, 'Theodore Evelyn Mosby', NULL, NULL, 0, 0, 1, 0, NULL, NULL, '0'),
(2, 'Marshall Ericksen', NULL, NULL, 0, 0, 1, 0, NULL, NULL, 'cLFJPkuRT5OD8ffSAwaQlM:APA91bF_K89vpsHuiaAmFB5-Q573XhC9ZEzNz3CBGEgnXbMeamalTuBctHeAC1uxoXZqWLxmYsrMM8OllTqJ341qJL0851yyHyRnjhiBJVZfbXtTR1eMXY4jLD3y_0V4LlAq7UgZL3vQ'),
(3, 'Lili Aldrin', NULL, NULL, 0, 0, 1, 0, NULL, NULL, '0'),
(4, 'Robin Scherbatsky ', NULL, NULL, 0, 0, 0, 0, NULL, NULL, '0'),
(5, 'Barney Stinson', NULL, NULL, 0, 0, 0, 0, NULL, NULL, '0'),
(6, 'Gaviola, Adriel Miguel', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(7, 'Kit, Hudson Pasalo', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(8, 'Del-Ong, Kilrone Honkai', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(9, 'Batac, Jecelito Artbog', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(10, 'Grey, Meredith  Pompeo', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(11, 'Yang, Cristina Oh', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(12, 'Karev, Alex Chambers', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(13, 'Bacasen, Marissa Johnson', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(14, 'Rafael, Eddie Lim Sr.', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(15, 'Johnson, Kryzzylle Anne Mateo', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(16, 'Sicat, Dominic Austin Igop Jr.', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(17, 'Guzman, Christian Pedro', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(18, 'Banaag, James Palma', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(19, 'Bangon, Logan Natividad', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(20, 'Baquiran, Daniel Batac', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(21, 'Basa, Ryan Diaz', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(22, 'Batungbakal, Aaron Santos Sr.', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(23, 'Catacutan, Oliver Reyes', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(24, 'Dagohoy, Liam Cruz', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(25, 'Dalisay, Jamie Ocampo', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(26, 'Del Rosario, Ethan Gonzales III', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(27, 'Lardizabal, Alexander Aquino', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(28, 'Mabini, Cameron Ramos', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(29, 'Magsaysay, Finlay Garcia', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(30, 'Laxamana, Kyle Lopez', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(31, 'Salvador, Tabitha Castillo', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(32, 'Suarez, Kyndra Diaz', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(33, 'Sulu, Kesley Villanueva', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(34, 'Tolentino, Caryl Abalos', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(35, 'Trinidad, Krisha Abadiano', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(36, 'Tibayan, Myra Abella', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(37, 'Santos, Roda Agustin', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(38, 'Reyes, Christine Aranda', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(39, 'Cruz, Sandra Basilio', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(40, 'Bautista, Sarah Bayani', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(41, 'Ocampo, Ivy Belmonte', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(42, 'Aquino, Rhea Bonilla', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(43, 'Ramos, Erica Briones', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(44, 'Garcia, Osiana Castro', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(45, 'Mendoza, Steven Esguerra', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(46, 'Pascual, Joe Estrella', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(47, 'Castillo, Lennon Espino', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(48, 'Villanueva, Patrick Famorca', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(49, 'Diaz, Jason Javier', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(50, 'Rodriquez, Louis Nicolas', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(51, 'Marquez, Olly Navarro Jr.', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(52, 'Mercado, Bailey Padilla', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(53, 'Gonzales, Marcus Peralta', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(54, 'Lopez, Peter Rimas', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(55, 'Dante, Nero', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(56, 'Hassan, Artbog Cruz ', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(57, 'Athens, Kassandra', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(58, 'Caesar, Julius Gaius ', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `patient_account`
--

DROP TABLE IF EXISTS `patient_account`;
CREATE TABLE IF NOT EXISTS `patient_account` (
  `patient_account_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `patient_username` varchar(255) NOT NULL,
  `patient_password` varchar(255) NOT NULL,
  `patient_picture` blob,
  `patient_email` varchar(255) NOT NULL,
  PRIMARY KEY (`patient_account_id`),
  KEY `patient_id_account` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=478 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_account`
--

INSERT INTO `patient_account` (`patient_account_id`, `patient_id`, `patient_username`, `patient_password`, `patient_picture`, `patient_email`) VALUES
(1, 1, 'TedMosby', 'iGetVaxAndFreeDonat', NULL, 'theodoremosby@gmail.com'),
(2, 2, 'EricksenM', 'iGetVaxAndGetDiscount', NULL, 'theodoremosby@gmail.com'),
(3, 3, 'LilAldrin', 'iGetVaxAndGetEcoBag', NULL, 'theodoremosby@gmail.com'),
(4, 4, 'RobinSparkles', 'iGetVaxAndGotErectileDysfunction', NULL, 'theodoremosby@gmail.com'),
(5, 5, 'SwarleyB', 'iGetVaxAndStillGotCovid', NULL, 'theodoremosby@gmail.com'),
(425, 6, 'AdrielGaviola', '$2y$10$wRwFesr9TAkEyJKTnOz3FOwQd76C1IglUJguCEq4KPfMWS9uHvznO', NULL, 'Adriel.Gaviola@gmail.com'),
(426, 7, 'HudsonKit', '$2y$10$.HUj.GfAK8o08D0WBzvoqeha2FkVDiFLfWSbBUsq3nRj3kcORD2Hy', NULL, 'Hudson.Kit@gmail.com'),
(427, 8, 'KilroneDel-Ong', '$2y$10$IY9CP8i3lDqQybHSRJ5HnOxb6RT/5.6BgopXI.QVbxrbH.jC9sLrC', NULL, 'Kilrone.Del-Ong@gmail.com'),
(428, 9, 'JecelitoBatac', '$2y$10$Zdyk6eo0qjNgmoN1SkpQH.7/HgzWQfKIWv.oXcNC4ftF9Fyu14mqW', NULL, 'Jecelito.Batac@gmail.com'),
(429, 10, 'Meredith Grey', '$2y$10$l84ASDiQo0G/vzi9OxRCCubsxwQ/DzaL2uppco6DAhLYRCStwHfJ.', NULL, 'Meredith .Grey@gmail.com'),
(430, 11, 'CristinaYang', '$2y$10$dSGm98m3XaTKvZILzjnNlOd4DAbOcB3ACgvkueH41BcT2/TNlIlVm', NULL, 'Cristina.Yang@gmail.com'),
(431, 12, 'AlexKarev', '$2y$10$bnjZTwNHIbCkedB4pgOGiuEYt7M9Bqb5tYvke87h1iVNJZB9g1.9C', NULL, 'Alex.Karev@gmail.com'),
(432, 13, 'MarissaBacasen', '$2y$10$ZIU6MIA693vgMYjKsdfoV.VFrj3JU0DNDywpnZq1vLGdXxDxsXt8i', NULL, 'Marissa.Bacasen@gmail.com'),
(433, 14, 'EddieRafael', '$2y$10$6cbWFHsUrDyPv/IOnV.BveQHX0QVwlVPjVY5uoonvKu5jhIOd2QRu', NULL, 'Eddie.Rafael@gmail.com'),
(434, 15, 'Kryzzylle AnneJohnson', '$2y$10$8ydpRAnstNIWZajtgpOOculOV1E65ZGN/C4nqhflJVR.4nPAC8kJG', NULL, 'Kryzzylle Anne.Johnson@gmail.com'),
(435, 16, 'Dominic AustinSicat', '$2y$10$XSR8ajAQWprgSxcDhP6qZ.Iy5Kw/pI98MRb2O0di6TNU7GLY7e5/O', NULL, 'Dominic Austin.Sicat@gmail.com'),
(436, 17, 'ChristianGuzman', '$2y$10$o0krAIErovCvFQiU45dqkOUE2dp7sYOS39tDq2TcrcdKvEcyu6Gba', NULL, 'Christian.Guzman@gmail.com'),
(437, 18, 'JamesBanaag', '$2y$10$3ZjybvY.Ad9m1T5rO7yonetCExDXCfKna2L7iF79r7P0AAk/TsPZS', NULL, 'James.Banaag@gmail.com'),
(438, 19, 'LoganBangon', '$2y$10$CBpHLxerC/vhXnDTzw9oRuw10TT0Bgyol3dS/.cSx2vo8UCLXO.ty', NULL, 'Logan.Bangon@gmail.com'),
(439, 20, 'DanielBaquiran', '$2y$10$RALbg1ybcinmdWdPr3pmXeAUMHPpHAEfaj5MKxomu/ke1L0XvQaye', NULL, 'Daniel.Baquiran@gmail.com'),
(440, 21, 'RyanBasa', '$2y$10$CaogsxA6YW1N.WUNo4Z3a.ZgYBsjaJsZXFGFGcxaOnq6LBq/k1JaS', NULL, 'Ryan.Basa@gmail.com'),
(441, 22, 'AaronBatungbakal', '$2y$10$LS0ZhQniCNF69mDoujvqdOoL9xc5iFd4TaOwgoTeM5EI.Gcm6uoJy', NULL, 'Aaron.Batungbakal@gmail.com'),
(442, 23, 'OliverCatacutan', '$2y$10$KMgcNAx2h5.87kyUymXGiOi7ojXYRQmUNqjPeLs5PdLwhDXPnpQ4G', NULL, 'Oliver.Catacutan@gmail.com'),
(443, 24, 'LiamDagohoy', '$2y$10$4dq5rn3LJjWB/iNkbzdzyu8Xvbt42Zl.S8WXyISYREDgkwEw.QRrC', NULL, 'Liam.Dagohoy@gmail.com'),
(444, 25, 'JamieDalisay', '$2y$10$kQdwv0JLoeJk9tVdDgx8uOd/JduTrgn8Yzk5YQFb3Clmr.5T2ZWuC', NULL, 'Jamie.Dalisay@gmail.com'),
(445, 26, 'EthanDel Rosario', '$2y$10$bKZu8E3EDoX/3QoO595/3upBET0X3Uatzp6FHdnTCHec3CXvpOEAe', NULL, 'Ethan.Del Rosario@gmail.com'),
(446, 27, 'AlexanderLardizabal', '$2y$10$gw0wxfsHEYqIV.9nNOBC4.N8V50e9RL07AWtct/y.CH.Vkvsdj9WC', NULL, 'Alexander.Lardizabal@gmail.com'),
(447, 28, 'CameronMabini', '$2y$10$p5m0/RL8T8kYBu9FN15KquXH7IPVkBTlxzWmeEQvtFbWpeFiezpAa', NULL, 'Cameron.Mabini@gmail.com'),
(448, 29, 'FinlayMagsaysay', '$2y$10$UFIouc4OidBoUzig1oBsYO6F1UcI3Qw/ADEgGnFtcsITzi1q.qKum', NULL, 'Finlay.Magsaysay@gmail.com'),
(449, 30, 'KyleLaxamana', '$2y$10$HsznS4hdBlUtEIBrOqU77e5Mjxj72CO4ZB4uWzuO2exdisxuf78.m', NULL, 'Kyle.Laxamana@gmail.com'),
(450, 31, 'TabithaSalvador', '$2y$10$6lsoxD5t5mj/y4RmyenG4OwtcrfRYzOOheLQi9YU7ygOficdPeKpm', NULL, 'Tabitha.Salvador@gmail.com'),
(451, 32, 'KyndraSuarez', '$2y$10$CClDEpO1fK/b/BneZT0/6.h2DnAADzL59254flCMMIFApmlJ.n/nO', NULL, 'Kyndra.Suarez@gmail.com'),
(452, 33, 'KesleySulu', '$2y$10$uvfAWsTP1ss3punnqtTrLuY3jovNhAKncvsEt9i2QTVEZRQItaMNC', NULL, 'Kesley.Sulu@gmail.com'),
(453, 34, 'CarylTolentino', '$2y$10$982ZECsKMtpqmd7c83HLA.TJnFJlU3K/o2HrYeTOMe7znQPryUuda', NULL, 'Caryl.Tolentino@gmail.com'),
(454, 35, 'KrishaTrinidad', '$2y$10$UAQIrbVudtX6.SuaVJMyYOKG47YS4rIWmLe48qN8Xxmu7.8rMpbui', NULL, 'Krisha.Trinidad@gmail.com'),
(455, 36, 'MyraTibayan', '$2y$10$qeK/kBeQLnrQy.bJ6Tozsuhp4sGGu3RvplHpeGRhSCrPLGjNEqq7W', NULL, 'Myra.Tibayan@gmail.com'),
(456, 37, 'RodaSantos', '$2y$10$HCnz0dtWezE6eXdeMbvDO.DRjVZq5EHukXx.iQ8BupET73Q86Qrsq', NULL, 'Roda.Santos@gmail.com'),
(457, 38, 'ChristineReyes', '$2y$10$VRsudTVrFhZ8kC9ZlnQ2ZOEPxn23TxVkTWdqCclOyxq5zHxnyReZ2', NULL, 'Christine.Reyes@gmail.com'),
(458, 39, 'SandraCruz', '$2y$10$ML1GcHtnJxXZkRt1G5dCQO7GPW7zGns1rx8f83fYv4VPQDJx7d6ce', NULL, 'Sandra.Cruz@gmail.com'),
(459, 40, 'SarahBautista', '$2y$10$Ib21xvpupmWkpADETQ6Y8eG2wkU9bqcCzzaHyKciLAeFaw4lXkxw2', NULL, 'Sarah.Bautista@gmail.com'),
(460, 41, 'IvyOcampo', '$2y$10$X/Z9PD2Q8i/2gebqeTbZDuPjuohb2bJGb4fPzf84/wRnX3MkhEW8C', NULL, 'Ivy.Ocampo@gmail.com'),
(461, 42, 'RheaAquino', '$2y$10$kd6Pce2j9GfIHZ.8aWLt6eMgpsLubIZ1.tjaM0YCN9p/Jen8v7URO', NULL, 'Rhea.Aquino@gmail.com'),
(462, 43, 'EricaRamos', '$2y$10$emPCuvq/xAM9Mkou7x1KB.Lq1fjWmYaDmSkNe8QQhidu7eDyz0iXC', NULL, 'Erica.Ramos@gmail.com'),
(463, 44, 'OsianaGarcia', '$2y$10$3obepPdz5DDpcze1D0tVc.QXVQ8oIUbwSILMItQ/ARJ9Y8Y/dM8Ne', NULL, 'Osiana.Garcia@gmail.com'),
(464, 45, 'StevenMendoza', '$2y$10$v16e4V0KYDiX.PbYkHPGWuWn6rkVbYPsE/DoLSqOEEXH3Q5J9H42q', NULL, 'Steven.Mendoza@gmail.com'),
(465, 46, 'JoePascual', '$2y$10$tykoVsuBiKXvKr5Jrk9bzuP3K/T9iKlxS/zF0P/hOr0IQ9stO8khC', NULL, 'Joe.Pascual@gmail.com'),
(466, 47, 'LennonCastillo', '$2y$10$CLpBG3FS.9mqe4IMTT.njuf5Ndt8c8aTsZUVgWXeWwBurM7aJB6zm', NULL, 'Lennon.Castillo@gmail.com'),
(467, 48, 'PatrickVillanueva', '$2y$10$VHuPMvQw/.GttP/2PcgP0uDyhWXWUD484n7lxZ9DkMS3ltZCmM.vy', NULL, 'Patrick.Villanueva@gmail.com'),
(468, 49, 'JasonDiaz', '$2y$10$UKmrfqdDHwQhSuUPyCOMouBUzK5BczPQ5ey6HmbygHZYe0ma5o3Xy', NULL, 'Jason.Diaz@gmail.com'),
(469, 50, 'LouisRodriquez', '$2y$10$0rlgH5ObHbBcHTL4wAxJ3eg7S9yQ5YKu1KZrM1103TFX1fC96ODsq', NULL, 'Louis.Rodriquez@gmail.com'),
(470, 51, 'OllyMarquez', '$2y$10$NmVRUu.nhgt6ar13fDMGieHG8cba6oi0M.JxkQYnKB.ciEx7kVehi', NULL, 'Olly.Marquez@gmail.com'),
(471, 52, 'BaileyMercado', '$2y$10$OvbMLOKjELYrs.U9cb1PouDaVz71JehcxU92pSxTDncVpG/Cmq/Le', NULL, 'Bailey.Mercado@gmail.com'),
(472, 53, 'MarcusGonzales', '$2y$10$Ud8yY2KwNW.0fEQBtdJEOu/E9pmMWQoVZIagxnAG4Q4xqLmKG1sbS', NULL, 'Marcus.Gonzales@gmail.com'),
(473, 54, 'PeterLopez', '$2y$10$ySP/cqxu4143L5tEw98EKe4Obk8c1/dh7SmxorMZ0W3tX5/jhDXhy', NULL, 'Peter.Lopez@gmail.com'),
(474, 55, 'NeroDante', '$2y$10$mTpZ4tY6AzIU1tcopi24yeErxtvi25gxHd9z4q7AXomd8vQ8IwYve', NULL, '2191057@slu.edu.ph'),
(475, 56, 'ArtbogHassan', '$2y$10$.Hv9AAsZb8/oxXMx1sp70umsDuSdT3fhpbg4az9fbMaVxVVsmmDPm', NULL, 'Artbogart@gmail.com'),
(476, 57, 'KassandraAthens', '$2y$10$nYSHuK8Bg5AJNjtJCMetd.wp5d6fiF/iSzVEETCPxgLlTiZL95t1a', NULL, '2191057@slu.edu.ph'),
(477, 58, 'JuliusCaesar', '$2y$10$VFuvl9MLbTURQD3e3D1ti.JeJjFCJ1QNvUPjOwR5nyNlbxCLhsXnK', NULL, 'GaiusJuliusCaesar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patient_barangay_queue`
--

DROP TABLE IF EXISTS `patient_barangay_queue`;
CREATE TABLE IF NOT EXISTS `patient_barangay_queue` (
  `patient_id` int(11) NOT NULL,
  `barangay_id` int(11) NOT NULL,
  `first_dose_queue` int(11) NOT NULL,
  `second_dose_queue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_barangay_queue`
--

INSERT INTO `patient_barangay_queue` (`patient_id`, `barangay_id`, `first_dose_queue`, `second_dose_queue`) VALUES
(3, 58, 1, 0),
(2, 113, 1, 0),
(1, 113, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

DROP TABLE IF EXISTS `patient_details`;
CREATE TABLE IF NOT EXISTS `patient_details` (
  `patient_id` int(11) NOT NULL,
  `patient_first_name` varchar(255) NOT NULL,
  `patient_last_name` varchar(255) NOT NULL,
  `patient_middle_name` varchar(255) DEFAULT NULL,
  `patient_suffix` varchar(255) DEFAULT NULL,
  `patient_priority_group` varchar(255) NOT NULL,
  `patient_category_id` varchar(255) NOT NULL,
  `patient_category_number` varchar(255) NOT NULL,
  `patient_philHealth` varchar(255) DEFAULT NULL,
  `patient_pwd` varchar(255) DEFAULT NULL,
  `patient_house_address` varchar(255) NOT NULL,
  `patient_barangay_address` varchar(255) NOT NULL,
  `patient_CM_address` varchar(255) NOT NULL,
  `patient_province` varchar(255) NOT NULL,
  `patient_region` varchar(255) NOT NULL,
  `patient_birthdate` date NOT NULL,
  `patient_age` int(11) NOT NULL,
  `patient_gender` varchar(255) NOT NULL,
  `patient_contact_number` char(11) NOT NULL,
  `patient_occupation` varchar(255) NOT NULL,
  `Archived` int(1) DEFAULT NULL,
  UNIQUE KEY `patient_id_patient_first_name` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`patient_id`, `patient_first_name`, `patient_last_name`, `patient_middle_name`, `patient_suffix`, `patient_priority_group`, `patient_category_id`, `patient_category_number`, `patient_philHealth`, `patient_pwd`, `patient_house_address`, `patient_barangay_address`, `patient_CM_address`, `patient_province`, `patient_region`, `patient_birthdate`, `patient_age`, `patient_gender`, `patient_contact_number`, `patient_occupation`, `Archived`) VALUES
(1, 'Theodore', 'Mosby', 'Evelyn', NULL, 'A1: Health Care Workers', 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0),
(2, 'Marshall', 'Ericksen', NULL, NULL, 'A1: Health Care Workers', 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0),
(3, 'Lili', 'Ericksen', 'Aldrin', NULL, 'A3: Adult with Comorbidity', 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'Irisan', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0),
(4, 'Robin', 'Scherbatsky', NULL, NULL, 'A4: Frontline Personnel in Essential Sector', 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0),
(5, 'Barney', 'Stinson', NULL, NULL, 'A5: Indigent Population', 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0),
(6, 'Adriel', 'Gaviola', 'Miguel', '', 'A3: Person with Commorbidity', 'Other', '2191057', '5361', '1212312', '15 Tacay Road.', 'Quezon Hill', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9217357942', 'Student', NULL),
(7, 'Hudson', 'Kit', 'Pasalo', '', 'A3: Person with Commorbidity', 'Other', '2191057', '4057', '1212312', '15 Tacay Road.', 'Quezon Hill', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9217357942', 'Student', NULL),
(8, 'Kilrone', 'Del-Ong', 'Honkai', '', 'A3: Person with Commorbidity', 'Other', '2191057', '5971', '1212312', '15 Tacay Road.', 'Quezon Hill', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9217357942', 'Student', NULL),
(9, 'Jecelito', 'Batac', 'Artbog', '', 'A3: Person with Commorbidity', 'Other', '2191057', '6065', '1212312', '15 Tacay Road.', 'Quezon Hill', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9217357942', 'Student', NULL),
(10, 'Meredith ', 'Grey', 'Pompeo', '', 'A1: Health Care Workers', 'Facility ', '2167809', '7556', '', '76-A Liteng', 'Pacdal', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9456987632', 'Doctor', NULL),
(11, 'Cristina', 'Yang', 'Oh', '', 'A1: Health Care Workers', 'Facility', '2156789', '1428', '', '98-B ', 'Outlook Drive', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9087345632', 'Doctor', NULL),
(12, 'Alex', 'Karev', 'Chambers', '', 'A1: Health Care Workers', 'Facility ', '2159876', '9651', '', '12 Lower Kayo', 'Camp Allen', 'Baguio City', 'Benguet', 'CAR', '1989-06-03', 32, 'Male', '9087547853', 'Doctor', NULL),
(13, 'Marissa', 'Bacasen', 'Johnson', '', 'A6: Rest of the Population', 'Other', '2037221', '6345', '', '22 Upper Mangga', 'Balsigan', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9123456789', 'Teacher', NULL),
(14, 'Eddie', 'Rafael', 'Lim', 'Sr.', 'A2: Senior Citizen', 'Office of Senior Citizen Affairs', '2072565', '2755', '', '55-B West Slide', 'Lualhati', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9987654321', 'Student', NULL),
(15, 'Kryzzylle Anne', 'Johnson', 'Mateo', '', 'A7: 12-17 Years Old', 'Other', '2051306', '2176', '', 'Purok 7', 'South Drive', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9345876123', 'Student', NULL),
(16, 'Dominic Austin', 'Sicat', 'Igop', 'Jr.', 'A6: Rest of the Population', 'Other', '2102299', '4693', '', '65 Naiba', 'San Vicente', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9500876123', 'Student', NULL),
(17, 'Christian', 'Guzman', 'Pedro', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '2082489', '1781', '', '58F', 'Aurora Hill', 'Baguio City', 'Benguet', 'CAR', '1974-09-07', 47, 'Male', '9402368492', 'Street Vendor', NULL),
(18, 'James', 'Banaag', 'Palma', '', 'A5: Indigent Population', 'Other', '8783960', '4621', '', '47 Upper Monterazas', 'Alfonso Tabora', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9667555424', 'Farmer', NULL),
(19, 'Logan', 'Bangon', 'Natividad', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '1597428', '9012', '', '15 Beleng', 'Ambiong', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9202171640', 'Waiter', NULL),
(20, 'Daniel', 'Baquiran', 'Batac', '', 'A1: Health Care Workers', 'Professional Regulation  Commission ', '3416270', '2137', '', '3B - Cuenca', 'Andres Bonifacio', 'Baguio City', 'Benguet', 'CAR', '1991-08-12', 30, 'Male', '9425356690', 'Paramedic', NULL),
(21, 'Ryan', 'Basa', 'Diaz', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '1604357', '5129', '', '89 - San Luis Road', 'Apugan-Loakan', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9873825289', 'Jeep Conductor', NULL),
(22, 'Aaron', 'Batungbakal', 'Santos', 'Sr.', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '6790334', '7982', '', '79 - Mabini Street', 'Aurora Hill Proper (Malvar-Sgt. Floresca)', 'Baguio City', 'Benguet', 'CAR', '1983-09-08', 38, 'Male', '9886284130', 'Electrician', NULL),
(23, 'Oliver', 'Catacutan', 'Reyes', '', 'A1: Health Care Workers', 'Professional Regulation  Commission ', '9484497', '1564', '', '39 - Assumptiion Rd', 'Aurora Hill South Central', 'Baguio City', 'Benguet', 'CAR', '1975-08-08', 46, 'Male', '9703029461', 'Doctor', NULL),
(24, 'Liam', 'Dagohoy', 'Cruz', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Office of Senior Citizen Affairs', '2752453', '2990', '', '82 Mamaga', 'Aurora Hill North Central', 'Baguio City', 'Benguet', 'CAR', '1955-03-03', 66, 'Male', '9874069918', 'Businessman', NULL),
(25, 'Jamie', 'Dalisay', 'Ocampo', '', 'A3: Person with Commorbidity', 'Other', '1674720', '7581', '4545654', '17 Balilo', 'Bagong Lipunan (Market Area)', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9804881607', 'Student', NULL),
(26, 'Ethan', 'Del Rosario', 'Gonzales', 'III', 'A1: Health Care Workers', 'Professional Regulation  Commission ', '8768583', '8485', '', '80F - Palma Street', 'Bakakeng Central', 'Baguio City', 'Benguet', 'CAR', '1968-01-04', 53, 'Male', '9849427233', 'Sugeon', NULL),
(27, 'Alexander', 'Lardizabal', 'Aquino', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Facility', '9793318', '4217', '', '62A - Delong rd', 'Bakakeng North', 'Baguio City', 'Benguet', 'CAR', '1974-02-07', 47, 'Male', '9664932091', 'Secretary', NULL),
(28, 'Cameron', 'Mabini', 'Ramos', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Professional Regulation  Commission ', '8807939', '9578', '', '41- Lower Batac', 'Bal-Marcoville (Marcoville)', 'Baguio City', 'Benguet', 'CAR', '1984-01-05', 37, 'Male', '9898213006', 'Soldier', NULL),
(29, 'Finlay', 'Magsaysay', 'Garcia', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '2199487', '2628', '', '25C - East Gavioli', 'Balsigan', 'Baguio City', 'Benguet', 'CAR', '1982-06-01', 39, 'Male', '9598015136', 'Repairman', NULL),
(30, 'Kyle', 'Laxamana', 'Lopez', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Facility', '9517279', '3519', '', '85A - Circle', 'Bayan Park East', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9901480444', 'Reporter', NULL),
(31, 'Tabitha', 'Salvador', 'Castillo', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '8109756', '7174', '', '90G - Navy Road', 'Bayan Park Village', 'Baguio City', 'Benguet', 'CAR', '1989-05-06', 32, 'Female', '9540164037', 'Construction Worker', NULL),
(32, 'Kyndra', 'Suarez', 'Diaz', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Professional Regulation  Commission ', '3006499', '6730', '', '77 - Pico Street', 'Bayan Park West (Bayan Park)', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9704230263', 'Professor', NULL),
(33, 'Kesley', 'Sulu', 'Villanueva', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Facility', '6511829', '7152', '', '12 - Otek road', 'BGH Compound', 'Baguio City', 'Benguet', 'CAR', '1984-02-04', 37, 'Female', '9337991402', 'Postman', NULL),
(34, 'Caryl', 'Tolentino', 'Abalos', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Facility', '2325387', '8559', '', 'Mabini Road', 'Brookside', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9199686580', 'Photographer', NULL),
(35, 'Krisha', 'Trinidad', 'Abadiano', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Professional Regulation  Commission ', '5255679', '5584', '', '4F - Lamtang Road', 'Brookspoint', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9968838166', 'Pilot', NULL),
(36, 'Myra', 'Tibayan', 'Abella', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '5047268', '7125', '', '72- Maria Bassa', 'Cabinet Hill-Teacher\'s Camp', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9413165408', 'Catholic Nun', NULL),
(37, 'Roda', 'Santos', 'Agustin', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '5856031', '5819', '', '26 - Pink Castle', 'Camdas Subdivision', 'Baguio City', 'Benguet', 'CAR', '1994-03-03', 27, 'Female', '9851903805', 'Painter', NULL),
(38, 'Christine', 'Reyes', 'Aranda', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '8873969', '9049', '', '43 - Lower Bua', 'Camp 7', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9184380320', 'Mechanic', NULL),
(39, 'Sandra', 'Cruz', 'Basilio', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '7237155', '6221', '', '95- Upper Cuenca', 'Camp 8', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9319504468', 'Clown', NULL),
(40, 'Sarah', 'Bautista', 'Bayani', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '8638076', '9304', '', '40 -  Casilagan Norte', 'Camp Allen', 'Baguio City', 'Benguet', 'CAR', '1986-03-10', 35, 'Female', '9371148514', 'Housekeeper', NULL),
(41, 'Ivy', 'Ocampo', 'Belmonte', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '1834905', '6212', '', '87 - Ambalite Sur', 'Campo Filipino', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9255474127', 'Gardener', NULL),
(42, 'Rhea', 'Aquino', 'Bonilla', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '1058615', '2475', '', '93 - Monterazas Village', 'City Camp Central', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9316197334', 'Builder', NULL),
(43, 'Erica', 'Ramos', 'Briones', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '2903359', '1969', '', '71B - Mirhea Residences', 'City Camp Proper', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9480878459', 'Foreman', NULL),
(44, 'Osiana', 'Garcia', 'Castro', '', 'A5: Indigent Population', 'Other', '6888261', '4272', '', '49L - San Lorenzo Residences', 'Country Club Village', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9245469986', 'Farmer', NULL),
(45, 'Steven', 'Mendoza', 'Esguerra', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '8377165', '9899', '', '17N - Poso ', 'Cresencia Village', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9624831879', 'Singer', NULL),
(46, 'Joe', 'Pascual', 'Estrella', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Facility', '6444601', '2413', '', '63O - Amyanan Road', 'Dagsian Lower', 'Baguio City', 'Benguet', 'CAR', '1993-12-03', 27, 'Male', '9508249241', 'Saleman', NULL),
(47, 'Lennon', 'Castillo', 'Espino', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Facility', '8412294', '8512', '', '13A - Bokawpan', 'Dagsian Upper', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9351256726', 'Librarian', NULL),
(48, 'Patrick', 'Villanueva', 'Famorca', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '1807742', '8013', '', '86F - Sinipsop ', 'Dizon Subdivision', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9671757640', 'Priest', NULL),
(49, 'Jason', 'Diaz', 'Javier', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '3363284', '3945', '', '11A - Silangob Road', 'Dominican Hill-Mirador', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9517652197', 'Driver', NULL),
(50, 'Louis', 'Rodriquez', 'Nicolas', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '5850780', '1775', '', '68B - Pilando Road', 'Dontogan', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9820221363', 'Waiter', NULL),
(51, 'Olly', 'Marquez', 'Navarro', 'Jr.', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Other', '7068178', '2247', '', '6W - Residence Building', 'DPS Area', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9123204573', 'Security Guard', NULL),
(52, 'Bailey', 'Mercado', 'Padilla', '', 'A4: Frontline Personnel in Essential Sector, including Uniformed Other', 'Professional Regulation  Commission ', '8318841', '3775', '', '46 - North Road', 'Engineers\' Hill', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9307814440', 'Police Officer', NULL),
(53, 'Marcus', 'Gonzales', 'Peralta', '', 'A1: Health Care Workers', 'Professional Regulation  Commission ', '6030757', '3906', '', '9D - South Residences', 'Fairview Village', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9416438823', 'Surgeon', NULL),
(54, 'Peter', 'Lopez', 'Rimas', '', 'A1: Health Care Workers', 'Professional Regulation  Commission ', '4110345', '9406', '', '78  - West Road ', 'Greenwater Village', 'Baguio City', 'Benguet', 'CAR', '2000-04-03', 21, 'Male', '9806080574', 'Nurse', NULL),
(55, 'Nero', 'Dante', '', '', 'A3: Person with Commorbidity', 'Other', '2191217', '1231', '1212312', '15 Tacay Road.', 'Quezon Hill', 'Baguio City', 'Benguet', 'CAR', '1999-09-17', 22, 'Male', '9634212543', 'Student', NULL),
(56, 'Artbog', 'Hassan', 'Cruz', '', 'A3: Adult with Comorbidity', 'others', '2191563', '321233', '323414', 'Bortag Village', '4', 'Baguio City', 'Benguet', 'Cordillera Administrative Region ', '1992-10-05', 29, 'male', '', '', NULL),
(57, 'Kassandra', 'Athens', '', '', 'A4: Frontline Personnel in Essential Sector', 'Other', '2191217', '1231', '1212312', '15 Tacay Road.', 'Quezon Hill', 'Baguio City', 'Benguet', 'CAR', '1999-12-07', 21, 'Femail', '9634212543', 'Student', NULL),
(58, 'Julius', 'Caesar', 'Gaius', '', 'A2: Senior Citizens', 'others', '2195523', '', '', 'Bortag Village', '18', 'Baguio City', 'Benguet', 'Cordillera Administrative Region ', '1978-08-18', 43, 'male', '09217357942', 'General', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_drive`
--

DROP TABLE IF EXISTS `patient_drive`;
CREATE TABLE IF NOT EXISTS `patient_drive` (
  `patient_id` int(11) NOT NULL,
  `drive_id` int(11) NOT NULL,
  `vaccine_lot_id` int(11) NOT NULL,
  KEY `patient_id` (`patient_id`),
  KEY `drive_id` (`drive_id`),
  KEY `vaccine_lot_id` (`vaccine_lot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_drive`
--

INSERT INTO `patient_drive` (`patient_id`, `drive_id`, `vaccine_lot_id`) VALUES
(1, 1, 4),
(2, 2, 2),
(3, 3, 1),
(4, 4, 3),
(5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `patient_vitals`
--

DROP TABLE IF EXISTS `patient_vitals`;
CREATE TABLE IF NOT EXISTS `patient_vitals` (
  `patient_id` int(11) NOT NULL,
  `pre_vital_pulse_rate_1st_dose` varchar(18) DEFAULT NULL,
  `pre_vital_temp_rate_1st_dose` varchar(18) DEFAULT NULL,
  `pre_vital_bpDiastolic_1st_dose` varchar(18) DEFAULT NULL,
  `pre_vital_bpSystolic_1st_dose` varchar(18) DEFAULT NULL,
  `post_vital_pulse_rate_1st_dose` varchar(18) DEFAULT NULL,
  `post_vital_temp_rate_1st_dose` varchar(18) DEFAULT NULL,
  `post_vital_bpDiastolic_1st_dose` varchar(18) DEFAULT NULL,
  `post_vital_bpSystolic_1st_dose` varchar(18) DEFAULT NULL,
  `pre_vital_pulse_rate_2nd_dose` varchar(18) DEFAULT NULL,
  `pre_vital_temp_rate_2nd_dose` varchar(18) DEFAULT NULL,
  `pre_vital_bpDiastolic_2nd_dose` varchar(18) DEFAULT NULL,
  `pre_vital_bpSystolic_2nd_dose` varchar(18) DEFAULT NULL,
  `post_vital_pulse_rate_2nd_dose` varchar(18) DEFAULT NULL,
  `post_vital_temp_rate_2nd_dose` varchar(18) DEFAULT NULL,
  `post_vital_bpDiastolic_2nd_dose` varchar(18) DEFAULT NULL,
  `post_vital_bpSystolic_2nd_dose` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_vitals`
--

INSERT INTO `patient_vitals` (`patient_id`, `pre_vital_pulse_rate_1st_dose`, `pre_vital_temp_rate_1st_dose`, `pre_vital_bpDiastolic_1st_dose`, `pre_vital_bpSystolic_1st_dose`, `post_vital_pulse_rate_1st_dose`, `post_vital_temp_rate_1st_dose`, `post_vital_bpDiastolic_1st_dose`, `post_vital_bpSystolic_1st_dose`, `pre_vital_pulse_rate_2nd_dose`, `pre_vital_temp_rate_2nd_dose`, `pre_vital_bpDiastolic_2nd_dose`, `pre_vital_bpSystolic_2nd_dose`, `post_vital_pulse_rate_2nd_dose`, `post_vital_temp_rate_2nd_dose`, `post_vital_bpDiastolic_2nd_dose`, `post_vital_bpSystolic_2nd_dose`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '90', '35', '120', '80'),
(2, NULL, NULL, NULL, NULL, '90', '35', '120', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `priority_drive`
--

DROP TABLE IF EXISTS `priority_drive`;
CREATE TABLE IF NOT EXISTS `priority_drive` (
  `drive_id` int(11) NOT NULL,
  `priority_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `priority_groups`
--

DROP TABLE IF EXISTS `priority_groups`;
CREATE TABLE IF NOT EXISTS `priority_groups` (
  `priority_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `priority_group` varchar(255) NOT NULL,
  PRIMARY KEY (`priority_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `priority_groups`
--

INSERT INTO `priority_groups` (`priority_group_id`, `priority_group`) VALUES
(1, 'A1: Health Care Workers'),
(2, 'A2: Senior Citizens'),
(3, 'A3: Adult with Comorbidity'),
(4, 'A4: Frontline Personnel in Essential Sector'),
(5, 'A5: Indigent Population'),
(6, 'A6: Rest Of The Population'),
(7, 'A7: 12-17 Years Old');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `report_type` char(20) NOT NULL,
  `report_details` varchar(255) NOT NULL,
  `vaccine_symptoms_reported` varchar(255) NOT NULL,
  `COVID19_symptoms_reported` varchar(255) NOT NULL,
  `date_last_out` date NOT NULL,
  `date_reported` date NOT NULL,
  `report_status` char(20) NOT NULL,
  PRIMARY KEY (`report_id`),
  UNIQUE KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `patient_id`, `report_type`, `report_details`, `vaccine_symptoms_reported`, `COVID19_symptoms_reported`, `date_last_out`, `date_reported`, `report_status`) VALUES
(1, 1, 'Smit+ App', 'I\'m currently experiencing other side effects after vaccination, specifically vomiting and diarrhea. ', 'Fever, Headache, Tiredness, Vomiting, Diarrhea', 'Vomiting, Diarrhea', '2021-07-13', '2021-07-14', 'Verified'),
(2, 2, 'SMS', 'I\'m experiencing bothering symptoms, such as diarrhea, vomiting and headaches.', '', '', '2021-07-10', '2021-07-13', 'Pending'),
(3, 3, 'Smit+ App', '...', 'sick', 'sick', '2021-07-13', '2021-07-14', 'Invalidated'),
(4, 4, 'Smit+ App', 'Ako ay nilalagnat, parang pagod palagi, at walang pang lasa', '', 'Fever, Tiredness, Loss of taste', '2021-07-13', '2021-07-14', 'Verified'),
(5, 5, 'SMS', 'After vaccination, I noticed that I feel some side effects, such as tiredness, headache, lost of taste', '', '', '2021-07-13', '2021-07-14', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_drive`
--

DROP TABLE IF EXISTS `vaccination_drive`;
CREATE TABLE IF NOT EXISTS `vaccination_drive` (
  `drive_id` int(11) NOT NULL AUTO_INCREMENT,
  `vaccination_site_id` int(11) NOT NULL,
  `vaccination_date` date NOT NULL,
  `Archived` int(1) DEFAULT NULL,
  `notif_opened` int(1) DEFAULT NULL,
  `first_dose_stubs` int(11) NOT NULL,
  `second_dose_stubs` int(11) NOT NULL,
  PRIMARY KEY (`drive_id`),
  KEY `vaccination_site_id` (`vaccination_site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccination_drive`
--

INSERT INTO `vaccination_drive` (`drive_id`, `vaccination_site_id`, `vaccination_date`, `Archived`, `notif_opened`, `first_dose_stubs`, `second_dose_stubs`) VALUES
(28, 1, '2021-10-08', 0, 1, 0, 0),
(29, 1, '2021-10-01', 0, 1, 0, 0),
(30, 1, '2021-10-31', 0, 1, 0, 0),
(31, 1, '2021-11-04', 0, 1, 0, 0),
(32, 1, '2021-10-08', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_sites`
--

DROP TABLE IF EXISTS `vaccination_sites`;
CREATE TABLE IF NOT EXISTS `vaccination_sites` (
  `vaccination_site_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`vaccination_site_id`),
  UNIQUE KEY `vaccination_site_id` (`vaccination_site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccination_sites`
--

INSERT INTO `vaccination_sites` (`vaccination_site_id`, `location`) VALUES
(1, 'Saint Louis University Gym'),
(2, 'University Of Baguio Gym'),
(3, 'SM Baguio City'),
(4, 'Saint Vincent Gym'),
(5, 'Baguio Country Club'),
(7, 'City Hall'),
(8, 'Baguio Public Market'),
(9, 'Pines National Highschool');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

DROP TABLE IF EXISTS `vaccine`;
CREATE TABLE IF NOT EXISTS `vaccine` (
  `vaccine_id` int(11) NOT NULL AUTO_INCREMENT,
  `vaccine_name` varchar(255) NOT NULL,
  `vaccine_type` varchar(255) NOT NULL,
  `vaccine_efficacy` int(11) NOT NULL,
  `vaccine_lifespan_in_months` int(11) NOT NULL,
  PRIMARY KEY (`vaccine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`vaccine_id`, `vaccine_name`, `vaccine_type`, `vaccine_efficacy`, `vaccine_lifespan_in_months`) VALUES
(1, 'BNT162b2', 'mRNA', 95, 1),
(2, 'mRNA-1273', 'mRNA', 95, 6),
(3, 'JNJ-78436735', 'Viral Vector', 95, 3),
(4, 'ChAdOx1 nCoV-19', 'Viral Vector', 95, 6),
(5, 'Coronovac', 'Inactivated Virus', 100, 24),
(6, 'test', 'Inactivated Virus', 90, 7),
(7, 'test', 'Inactivated Virus', 90, 7);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_batch`
--

DROP TABLE IF EXISTS `vaccine_batch`;
CREATE TABLE IF NOT EXISTS `vaccine_batch` (
  `vaccine_batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `vaccine_lot_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `vaccine_quantity` int(11) NOT NULL,
  `date_manufactured` date NOT NULL,
  `date_of_expiration` date NOT NULL,
  PRIMARY KEY (`vaccine_batch_id`),
  KEY `vaccine_lot_id` (`vaccine_lot_id`),
  KEY `vaccine_id` (`vaccine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccine_batch`
--

INSERT INTO `vaccine_batch` (`vaccine_batch_id`, `vaccine_lot_id`, `vaccine_id`, `vaccine_quantity`, `date_manufactured`, `date_of_expiration`) VALUES
(1, 1, 5, 5000, '2021-06-01', '2022-06-01'),
(2, 2, 3, 5000, '2021-06-01', '2022-06-01'),
(3, 3, 3, 5000, '2021-06-01', '2022-06-01'),
(4, 4, 2, 5000, '2021-06-01', '2022-06-01'),
(5, 5, 5, 5000, '2021-06-01', '2022-06-01'),
(6, 1, 5, 5000, '2021-06-01', '2022-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_drive_1`
--

DROP TABLE IF EXISTS `vaccine_drive_1`;
CREATE TABLE IF NOT EXISTS `vaccine_drive_1` (
  `drive_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  KEY `drive_id` (`drive_id`),
  KEY `vaccine_id` (`vaccine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccine_drive_1`
--

INSERT INTO `vaccine_drive_1` (`drive_id`, `vaccine_id`) VALUES
(1, 5),
(2, 4),
(3, 4),
(4, 1),
(5, 2),
(6, 3),
(7, 5),
(8, 6),
(9, 6),
(10, 4),
(11, 5),
(12, 5),
(13, 2),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(6, 1),
(21, 1),
(22, 2),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(21, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(72, 1),
(71, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_drive_2`
--

DROP TABLE IF EXISTS `vaccine_drive_2`;
CREATE TABLE IF NOT EXISTS `vaccine_drive_2` (
  `drive_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `first_dose_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_information`
--

DROP TABLE IF EXISTS `vaccine_information`;
CREATE TABLE IF NOT EXISTS `vaccine_information` (
  `vaccine_id` int(11) NOT NULL,
  `vaccine_manufacturer` varchar(255) NOT NULL,
  `vaccine_description` longtext NOT NULL,
  `vaccine_dosage_required` int(11) NOT NULL,
  `vaccine_dosage_interval` int(11) NOT NULL,
  `vaccine_minimum_temperature` int(11) NOT NULL,
  `vaccine_maximum_temperature` int(11) NOT NULL,
  UNIQUE KEY `vaccine_id` (`vaccine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccine_information`
--

INSERT INTO `vaccine_information` (`vaccine_id`, `vaccine_manufacturer`, `vaccine_description`, `vaccine_dosage_required`, `vaccine_dosage_interval`, `vaccine_minimum_temperature`, `vaccine_maximum_temperature`) VALUES
(1, 'Pfizer, Inc., and BioNTech', 'In clinical trials, the Pfizer-BioNTech vaccine was also highly effective at preventing laboratory-confirmed COVID-19 infection in adolescents 12–15 years old, and the immune response in people 12–15 years old was at least as strong as the immune response in people 16–25 years old.', 2, 21, -80, -20),
(2, 'ModernaTX, Inc.', 'In clinical trials, reactogenicity symptoms (side effects that happen within 7 days of getting vaccinated) were common but were mostly mild to moderate. Few people had reactions that affected their ability to do daily activities.', 2, 28, -25, -15),
(3, 'Janssen Pharmaceuticals Companies of Johnson & Johnson', 'The J&J/Janssen COVID-19 Vaccine was 66.3% effective in clinical trials (efficacy) at preventing laboratory-confirmed COVID-19 infection in people who received the vaccine and had no evidence of being previously infected. People had the most protection 2 weeks after getting vaccinated.', 1, 0, -8, -2),
(4, 'Oxford Astrazeneca', 'The ChAdOx1 nCoV-19 vaccine was developed by the University of Oxford and AstraZeneca. The vaccine works by delivering the genetic code of the SARS-CoV-2 spike protein to the body’s cells, similarly to the BNT162b2 vaccine. Once inside the body, the spike protein is produced, causing the immune system to recognise it and initiate an immune response. This means that if the body later encounters the spike protein of the coronavirus, the immune system will recognise it and destroy it before causing infection.', 2, 21, 8, 2),
(5, 'Coronavac', 'Sinovac Biotech Ltd. CoronaVac COVID-19 Vaccine is based on an inactivated pathogen made by growing the whole virus in a lab and then killing it. Sinovac\'s strategy contrasts with many other COVID-19 vaccine development efforts involving their vaccine candidates\' RNA.', 2, 2, 8, 2),
(6, 'Test', 'test', 2, 10, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_lot`
--

DROP TABLE IF EXISTS `vaccine_lot`;
CREATE TABLE IF NOT EXISTS `vaccine_lot` (
  `vaccine_lot_id` int(11) NOT NULL AUTO_INCREMENT,
  `vaccine_id` int(11) NOT NULL,
  `employee_account_id` int(11) NOT NULL,
  `date_stored` date NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `total_vaccine_vial_quantity` int(11) NOT NULL,
  `vaccine_expiration` date DEFAULT NULL,
  `Archived` int(1) DEFAULT NULL,
  PRIMARY KEY (`vaccine_lot_id`),
  KEY `vaccine_id` (`vaccine_id`),
  KEY `employee_account_id` (`employee_account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccine_lot`
--

INSERT INTO `vaccine_lot` (`vaccine_lot_id`, `vaccine_id`, `employee_account_id`, `date_stored`, `source`, `total_vaccine_vial_quantity`, `vaccine_expiration`, `Archived`) VALUES
(1, 2, 1, '2021-08-02', 'National Government', 5000, '2022-08-08', 0),
(2, 1, 4, '2021-07-14', 'National Government', 5000, '2022-07-14', 0),
(3, 5, 1, '2020-11-25', 'National Government', 3000, '2021-09-15', 0),
(4, 2, 4, '2020-12-29', 'Department Of Health', 4000, '2021-09-27', 0),
(5, 4, 4, '2021-04-20', 'Department Of Health', 6000, '2021-09-05', 0),
(6, 3, 1, '2021-09-22', 'Department Of Health', 3000, '2022-10-26', 0),
(7, 6, 1, '2021-09-28', 'National Government', 10000, '2023-01-18', 0),
(8, 4, 1, '2021-09-08', 'Department Of Health', 10000, '2021-09-23', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `employee_id_activity` FOREIGN KEY (`employee_id`) REFERENCES `employee_account` (`employee_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `barangay`
--
ALTER TABLE `barangay`
  ADD CONSTRAINT `barangay_ibfk_1` FOREIGN KEY (`health_district_id`) REFERENCES `health_district` (`health_district_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `barangay_id` FOREIGN KEY (`barangay_id`) REFERENCES `barangay` (`barangay_id`);

--
-- Constraints for table `employee_account`
--
ALTER TABLE `employee_account`
  ADD CONSTRAINT `employe_id_account` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medical_background`
--
ALTER TABLE `medical_background`
  ADD CONSTRAINT `patient_id_medical` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_account`
--
ALTER TABLE `patient_account`
  ADD CONSTRAINT `patient_id_account` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD CONSTRAINT `patient_id_details` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_vitals`
--
ALTER TABLE `patient_vitals`
  ADD CONSTRAINT `patient_id_vitals` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
