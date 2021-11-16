-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2021 at 07:01 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smit.`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `log_id` int(11) NOT NULL,
  `log_entry_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `employee_id` int(11) NOT NULL,
  `employee_role` varchar(255) NOT NULL,
  `log_type` varchar(255) NOT NULL,
  `log_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(14, '2021-10-28 15:19:15', 7, 'EIR', 'Add', 'Added patient ID: 58'),
(15, '2021-11-06 15:03:27', 2, 'HSO', 'Login', 'Successfully logged in'),
(16, '2021-11-06 15:03:35', 2, 'HSO', 'Logout', 'Successfully logged out'),
(17, '2021-11-06 15:04:01', 2, 'HSO', 'Login', 'Successfully logged in'),
(18, '2021-11-06 15:06:45', 2, 'HSO', 'Logout', 'Successfully logged out'),
(19, '2021-11-06 15:09:38', 2, 'HSO', 'Login', 'Successfully logged in'),
(20, '2021-11-09 17:32:02', 1, 'Barangay', 'Logout', 'Successfully logged out'),
(21, '2021-11-09 18:32:48', 2, 'HSO', 'Login', 'Successfully logged in'),
(22, '2021-11-09 18:32:52', 2, 'HSO', 'Login', 'Successfully logged in'),
(23, '2021-11-09 18:32:54', 2, 'HSO', 'Login', 'Successfully logged in'),
(24, '2021-11-09 18:32:54', 2, 'HSO', 'Login', 'Successfully logged in'),
(25, '2021-11-09 18:32:55', 2, 'HSO', 'Login', 'Successfully logged in'),
(26, '2021-11-09 18:32:55', 2, 'HSO', 'Login', 'Successfully logged in'),
(27, '2021-11-09 18:32:55', 2, 'HSO', 'Login', 'Successfully logged in'),
(28, '2021-11-09 18:32:56', 2, 'HSO', 'Login', 'Successfully logged in'),
(29, '2021-11-09 18:32:57', 2, 'HSO', 'Login', 'Successfully logged in'),
(30, '2021-11-09 18:33:13', 2, 'HSO', 'Login', 'Successfully logged in');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `barangay_id` int(11) NOT NULL,
  `health_district_id` int(11) DEFAULT NULL,
  `barangay_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `barangay_stubs` (
  `barangay_id` int(11) NOT NULL,
  `drive_id` int(11) NOT NULL,
  `A1_stubs` int(11) DEFAULT NULL,
  `A2_stubs` int(11) DEFAULT NULL,
  `A3_stubs` int(11) DEFAULT NULL,
  `A4_stubs` int(11) DEFAULT NULL,
  `A5_stubs` int(11) DEFAULT NULL,
  `A6_stubs` int(11) DEFAULT NULL,
  `A7_stubs` int(11) NOT NULL,
  `second_dose` int(11) NOT NULL,
  `notif_opened` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_first_name` varchar(255) NOT NULL,
  `employee_last_name` varchar(255) NOT NULL,
  `employee_middle_name` varchar(255) DEFAULT NULL,
  `employee_suffix` varchar(255) DEFAULT NULL,
  `employee_role` varchar(255) NOT NULL,
  `barangay_id` int(11) DEFAULT NULL,
  `employee_contact_number` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `employee_account` (
  `employee_account_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employee_username` varchar(255) NOT NULL,
  `employee_password` varchar(255) NOT NULL,
  `employee_account_type` varchar(255) NOT NULL,
  `employee_picture` blob DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `health_district` (
  `health_district_id` int(11) NOT NULL,
  `health_district_name` varchar(255) NOT NULL,
  `hd_contact_number` char(11) NOT NULL,
  `Archived` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `health_district`
--

INSERT INTO `health_district` (`health_district_id`, `health_district_name`, `hd_contact_number`, `Archived`) VALUES
(1, 'Asin Health Center', '6204798', 0),
(2, 'Atab health Center', '4209087', 0),
(3, 'Atok Trail Health Center', '6205395', 0),
(4, 'Aurora Hill Health Center', '09088117675', 0),
(5, 'Campo Filipino Health Center', '4420031', 0),
(6, 'City Camp Health Center', '09150522277', 0),
(7, 'Engineers Hill Health Center', '09562802014', 0),
(8, 'Irisan Health Center', '09562802014', 0),
(9, 'Loakan Health Center', '09562802014', 1),
(10, 'Lucban Health Center', '09492527664', 1),
(11, 'Mines View Health Center', '6658702', 1),
(12, 'Pacdal Health Center', '6658104', 1),
(13, 'Pinsao Health Center', '6657805', 1),
(14, 'Quezon Hill Health Center', '65205469', 1),
(15, 'Quirino Center', '09350692877', 1),
(16, 'Scount Barrio Center', '09262163933', 0);

-- --------------------------------------------------------

--
-- Table structure for table `health_district_drives`
--

CREATE TABLE `health_district_drives` (
  `drive_id` int(11) NOT NULL,
  `health_district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_district_drives`
--

INSERT INTO `health_district_drives` (`drive_id`, `health_district_id`) VALUES
(28, 1),
(29, 2),
(30, 1),
(31, 11),
(32, 1),
(38, 1),
(39, 9),
(40, 1),
(41, 1),
(42, 9),
(43, 1),
(44, 10),
(45, 1),
(46, 9),
(47, 9),
(48, 11),
(49, 1),
(50, 10),
(51, 10),
(51, 11),
(52, 9),
(53, 2),
(54, 3),
(55, 1),
(56, 2),
(56, 3);

-- --------------------------------------------------------

--
-- Table structure for table `medical_background`
--

CREATE TABLE `medical_background` (
  `patient_id` int(11) NOT NULL,
  `allergy_to_vaccine` tinyint(4) NOT NULL,
  `hypertension` tinyint(4) NOT NULL,
  `heart_disease` tinyint(4) NOT NULL,
  `kidney_disease` tinyint(4) NOT NULL,
  `diabetes_mellitus` tinyint(4) NOT NULL,
  `bronchial_asthma` tinyint(4) NOT NULL,
  `immunodeficiency` tinyint(4) NOT NULL,
  `cancer` tinyint(4) NOT NULL,
  `other_commorbidity` varchar(255) DEFAULT NULL
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

CREATE TABLE `patient` (
  `patient_id` int(255) NOT NULL,
  `patient_full_name` varchar(255) NOT NULL,
  `date_of_first_dosage` date DEFAULT NULL,
  `date_of_second_dosage` date DEFAULT NULL,
  `first_dose_vaccination` int(1) DEFAULT NULL,
  `second_dose_vaccination` int(1) DEFAULT NULL,
  `for_queue` int(1) DEFAULT NULL,
  `notification` int(1) DEFAULT NULL,
  `first_dose_vaccinator` int(11) DEFAULT NULL,
  `second_dose_vaccinator` int(11) DEFAULT NULL,
  `token` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(58, 'Caesar, Julius Gaius ', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(59, ',   ', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `patient_account`
--

CREATE TABLE `patient_account` (
  `patient_account_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_username` varchar(255) NOT NULL,
  `patient_password` varchar(255) NOT NULL,
  `patient_picture` blob DEFAULT NULL,
  `patient_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `patient_barangay_queue` (
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

CREATE TABLE `patient_details` (
  `patient_id` int(11) NOT NULL,
  `patient_first_name` varchar(255) NOT NULL,
  `patient_last_name` varchar(255) NOT NULL,
  `patient_middle_name` varchar(255) DEFAULT NULL,
  `patient_suffix` varchar(255) DEFAULT NULL,
  `patient_category_id` varchar(255) NOT NULL,
  `patient_category_number` varchar(255) NOT NULL,
  `patient_philHealth` varchar(255) DEFAULT NULL,
  `patient_pwd` varchar(255) DEFAULT NULL,
  `patient_house_address` varchar(255) NOT NULL,
  `patient_CM_address` varchar(255) NOT NULL,
  `patient_province` varchar(255) NOT NULL,
  `patient_region` varchar(255) NOT NULL,
  `patient_birthdate` date NOT NULL,
  `patient_age` int(11) NOT NULL,
  `patient_gender` varchar(255) NOT NULL,
  `patient_contact_number` char(11) NOT NULL,
  `patient_occupation` varchar(255) NOT NULL,
  `Archived` int(1) DEFAULT NULL,
  `barangay_id` int(11) DEFAULT NULL,
  `priority_group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`patient_id`, `patient_first_name`, `patient_last_name`, `patient_middle_name`, `patient_suffix`, `patient_category_id`, `patient_category_number`, `patient_philHealth`, `patient_pwd`, `patient_house_address`, `patient_CM_address`, `patient_province`, `patient_region`, `patient_birthdate`, `patient_age`, `patient_gender`, `patient_contact_number`, `patient_occupation`, `Archived`, `barangay_id`, `priority_group_id`) VALUES
(1, 'Theodore', 'Mosby', 'Evelyn', NULL, 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0, 113, 1),
(2, 'Marshall', 'Ericksen', NULL, NULL, 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0, 113, 1),
(3, 'Lili', 'Ericksen', 'Aldrin', NULL, 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0, 58, 3),
(4, 'Robin', 'Scherbatsky', NULL, NULL, 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0, 1, 113),
(5, 'Barney', 'Stinson', NULL, NULL, 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0, 113, 5),
(6, 'Adriel', 'Gaviola', 'Miguel', '', 'Other', '2191057', '5361', '1212312', '15 Tacay Road.', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9217357942', 'Student', 0, 98, 3),
(7, 'Hudson', 'Kit', 'Pasalo', '', 'Other', '2191057', '4057', '1212312', '15 Tacay Road.', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9217357942', 'Student', 0, 98, 3),
(8, 'Kilrone', 'Del-Ong', 'Honkai', '', '', '2191057', '', '1212312', '15 Tacay Road.', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9217357942', 'Student', 0, 98, 3),
(9, 'Jecelito', 'Batac', 'Artbog', '', 'Other', '2191057', '6065', '1212312', '15 Tacay Road.', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9217357942', 'Student', 0, 98, 3),
(10, 'Meredith ', 'Grey', 'Pompeo', '', 'Facility ', '2167809', '7556', '', '76-A Liteng', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9456987632', 'Doctor', 0, 12, 1),
(11, 'Cristina', 'Yang', 'Oh', '', 'Facility', '2156789', '1428', '', '98-B ', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9087345632', 'Doctor', 0, 86, 1),
(12, 'Alex', 'Karev', 'Chambers', '', 'Facility ', '2159876', '9651', '', '12 Lower Kayo', 'Baguio City', 'Benguet', 'CAR', '1989-06-03', 32, 'Male', '9087547853', 'Doctor', 0, 25, 1),
(13, 'Marissa', 'Bacasen', 'Johnson', '', 'Other', '2037221', '6345', '', '22 Upper Mangga', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9123456789', 'Teacher', 0, 14, 6),
(14, 'Eddie', 'Rafael', 'Lim', 'Sr.', 'Office of Senior Citizen Affairs', '2072565', '2755', '', '55-B West Slide', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9987654321', 'Student', 0, 71, 2),
(15, 'Kryzzylle Anne', 'Johnson', 'Mateo', '', 'Other', '2051306', '2176', '', 'Purok 7', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9345876123', 'Student', 0, 124, 7),
(16, 'Dominic Austin', 'Sicat', 'Igop', 'Jr.', 'Other', '2102299', '4693', '', '65 Naiba', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9500876123', 'Student', 0, 119, 6),
(17, 'Christian', 'Guzman', 'Pedro', '', 'Other', '2082489', '1781', '', '58F', 'Baguio City', 'Benguet', 'CAR', '1974-09-07', 47, 'Male', '9402368492', 'Street Vendor', 0, 7, 4),
(18, 'James', 'Banaag', 'Palma', '', 'Other', '8783960', '4621', '', '47 Upper Monterazas', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9667555424', 'Farmer', 0, 2, 5),
(19, 'Logan', 'Bangon', 'Natividad', '', 'Other', '1597428', '9012', '', '15 Beleng', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9202171640', 'Waiter', 0, 3, 4),
(20, 'Daniel', 'Baquiran', 'Batac', '', 'Professional Regulation  Commission ', '3416270', '2137', '', '3B - Cuenca', 'Baguio City', 'Benguet', 'CAR', '1991-08-12', 30, 'Male', '9425356690', 'Paramedic', 0, 4, 1),
(21, 'Ryan', 'Basa', 'Diaz', '', 'Other', '1604357', '5129', '', '89 - San Luis Road', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9873825289', 'Jeep Conductor', 0, 5, 4),
(22, 'Aaron', 'Batungbakal', 'Santos', 'Sr.', 'Other', '6790334', '7982', '', '79 - Mabini Street', 'Baguio City', 'Benguet', 'CAR', '1983-09-08', 38, 'Male', '9886284130', 'Electrician', 0, 4, 4),
(23, 'Oliver', 'Catacutan', 'Reyes', '', 'Professional Regulation  Commission ', '9484497', '1564', '', '39 - Assumptiion Rd', 'Baguio City', 'Benguet', 'CAR', '1975-08-08', 46, 'Male', '9703029461', 'Doctor', 0, 4, 1),
(24, 'Liam', 'Dagohoy', 'Cruz', '', 'Office of Senior Citizen Affairs', '2752453', '2990', '', '82 Mamaga', 'Baguio City', 'Benguet', 'CAR', '1955-03-03', 66, 'Male', '9874069918', 'Businessman', 0, 4, 4),
(25, 'Jamie', 'Dalisay', 'Ocampo', '', 'Other', '1674720', '7581', '4545654', '17 Balilo', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9804881607', 'Student', 0, 10, 3),
(26, 'Ethan', 'Del Rosario', 'Gonzales', 'III', 'Professional Regulation  Commission ', '8768583', '8485', '', '80F - Palma Street', 'Baguio City', 'Benguet', 'CAR', '1968-01-04', 53, 'Male', '9849427233', 'Sugeon', 0, 1, 1),
(27, 'Alexander', 'Lardizabal', 'Aquino', '', 'Facility', '9793318', '4217', '', '62A - Delong rd', 'Baguio City', 'Benguet', 'CAR', '1974-02-07', 47, 'Male', '9664932091', 'Secretary', 0, 1, 1),
(28, 'Cameron', 'Mabini', 'Ramos', '', 'Professional Regulation  Commission ', '8807939', '9578', '', '41- Lower Batac', 'Baguio City', 'Benguet', 'CAR', '1984-01-05', 37, 'Male', '9898213006', 'Soldier', 0, 1, 1),
(29, 'Finlay', 'Magsaysay', 'Garcia', '', 'Other', '2199487', '2628', '', '25C - East Gavioli', 'Baguio City', 'Benguet', 'CAR', '1982-06-01', 39, 'Male', '9598015136', 'Repairman', 0, 1, 1),
(30, 'Kyle', 'Laxamana', 'Lopez', '', 'Facility', '9517279', '3519', '', '85A - Circle', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9901480444', 'Reporter', 0, 1, 1),
(31, 'Tabitha', 'Salvador', 'Castillo', '', 'Other', '8109756', '7174', '', '90G - Navy Road', 'Baguio City', 'Benguet', 'CAR', '1989-05-06', 32, 'Female', '9540164037', 'Construction Worker', 0, 1, 1),
(32, 'Kyndra', 'Suarez', 'Diaz', '', 'Professional Regulation  Commission ', '3006499', '6730', '', '77 - Pico Street', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9704230263', 'Professor', 0, 1, 1),
(33, 'Kesley', 'Sulu', 'Villanueva', '', 'Facility', '6511829', '7152', '', '12 - Otek road', 'Baguio City', 'Benguet', 'CAR', '1984-02-04', 37, 'Female', '9337991402', 'Postman', 0, 1, 1),
(34, 'Caryl', 'Tolentino', 'Abalos', '', 'Facility', '2325387', '8559', '', 'Mabini Road', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9199686580', 'Photographer', 0, 1, 1),
(35, 'Krisha', 'Trinidad', 'Abadiano', '', 'Professional Regulation  Commission ', '5255679', '5584', '', '4F - Lamtang Road', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9968838166', 'Pilot', 0, 1, 1),
(36, 'Myra', 'Tibayan', 'Abella', '', 'Other', '5047268', '7125', '', '72- Maria Bassa', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9413165408', 'Catholic Nun', 0, 1, 1),
(37, 'Roda', 'Santos', 'Agustin', '', 'Other', '5856031', '5819', '', '26 - Pink Castle', 'Baguio City', 'Benguet', 'CAR', '1994-03-03', 27, 'Female', '9851903805', 'Painter', 0, 1, 1),
(38, 'Christine', 'Reyes', 'Aranda', '', 'Other', '8873969', '9049', '', '43 - Lower Bua', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9184380320', 'Mechanic', 0, 1, 1),
(39, 'Sandra', 'Cruz', 'Basilio', '', 'Other', '7237155', '6221', '', '95- Upper Cuenca', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9319504468', 'Clown', 0, 1, 1),
(40, 'Sarah', 'Bautista', 'Bayani', '', 'Other', '8638076', '9304', '', '40 -  Casilagan Norte', 'Baguio City', 'Benguet', 'CAR', '1986-03-10', 35, 'Female', '9371148514', 'Housekeeper', 0, 1, 1),
(41, 'Ivy', 'Ocampo', 'Belmonte', '', 'Other', '1834905', '6212', '', '87 - Ambalite Sur', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9255474127', 'Gardener', 0, 1, 1),
(42, 'Rhea', 'Aquino', 'Bonilla', '', 'Other', '1058615', '2475', '', '93 - Monterazas Village', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9316197334', 'Builder', 0, 1, 1),
(43, 'Erica', 'Ramos', 'Briones', '', 'Other', '2903359', '1969', '', '71B - Mirhea Residences', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9480878459', 'Foreman', 0, 1, 1),
(44, 'Osiana', 'Garcia', 'Castro', '', 'Other', '6888261', '4272', '', '49L - San Lorenzo Residences', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Female', '9245469986', 'Farmer', 0, 1, 1),
(45, 'Steven', 'Mendoza', 'Esguerra', '', 'Other', '8377165', '9899', '', '17N - Poso ', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9624831879', 'Singer', 0, 1, 1),
(46, 'Joe', 'Pascual', 'Estrella', '', 'Facility', '6444601', '2413', '', '63O - Amyanan Road', 'Baguio City', 'Benguet', 'CAR', '1993-12-03', 27, 'Male', '9508249241', 'Saleman', 0, 1, 1),
(47, 'Lennon', 'Castillo', 'Espino', '', 'Facility', '8412294', '8512', '', '13A - Bokawpan', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9351256726', 'Librarian', 0, 1, 1),
(48, 'Patrick', 'Villanueva', 'Famorca', '', 'Other', '1807742', '8013', '', '86F - Sinipsop ', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9671757640', 'Priest', 0, 1, 1),
(49, 'Jason', 'Diaz', 'Javier', '', 'Other', '3363284', '3945', '', '11A - Silangob Road', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9517652197', 'Driver', 0, 1, 1),
(50, 'Louis', 'Rodriquez', 'Nicolas', '', 'Other', '5850780', '1775', '', '68B - Pilando Road', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9820221363', 'Waiter', 0, 1, 1),
(51, 'Olly', 'Marquez', 'Navarro', 'Jr.', 'Other', '7068178', '2247', '', '6W - Residence Building', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9123204573', 'Security Guard', 0, 1, 1),
(52, 'Bailey', 'Mercado', 'Padilla', '', 'Professional Regulation  Commission ', '8318841', '3775', '', '46 - North Road', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9307814440', 'Police Officer', 0, 1, 1),
(53, 'Marcus', 'Gonzales', 'Peralta', '', 'Professional Regulation  Commission ', '6030757', '3906', '', '9D - South Residences', 'Baguio City', 'Benguet', 'CAR', '1970-01-01', 51, 'Male', '9416438823', 'Surgeon', 0, 1, 1),
(54, 'Peter', 'Lopez', 'Rimas', '', 'Professional Regulation  Commission ', '4110345', '9406', '', '78  - West Road ', 'Baguio City', 'Benguet', 'CAR', '2000-04-03', 21, 'Male', '9806080574', 'Nurse', 0, 1, 1),
(55, 'Nero', 'Dante', '', '', 'Other', '2191217', '1231', '1212312', '15 Tacay Road.', 'Baguio City', 'Benguet', 'CAR', '1999-09-17', 22, 'Male', '9634212543', 'Student', 0, 1, 1),
(56, 'Artbog', 'Hassan', 'Cruz', '', 'others', '2191563', '321233', '323414', 'Bortag Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region ', '1992-10-05', 29, 'male', '', '', 0, 1, 1),
(57, 'Kassandra', 'Athens', '', '', 'Other', '2191217', '1231', '1212312', '15 Tacay Road.', 'Baguio City', 'Benguet', 'CAR', '1999-12-07', 21, 'Femail', '9634212543', 'Student', 0, 1, 1),
(58, 'Julius', 'Caesar', 'Gaius', '', 'others', '2195523', '', '', 'Bortag Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region ', '1978-08-18', 43, 'male', '09217357942', 'General', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_drive`
--

CREATE TABLE `patient_drive` (
  `patient_id` int(11) NOT NULL,
  `drive_id` int(11) NOT NULL,
  `vaccine_lot_id` int(11) NOT NULL
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

CREATE TABLE `patient_vitals` (
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
  `post_vital_bpSystolic_2nd_dose` varchar(18) DEFAULT NULL
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

CREATE TABLE `priority_drive` (
  `drive_id` int(11) NOT NULL,
  `priority_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `priority_drive`
--

INSERT INTO `priority_drive` (`drive_id`, `priority_id`) VALUES
(33, 1),
(33, 2),
(33, 3),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(37, 2),
(38, 1),
(39, 1),
(40, 1),
(41, 6),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 6),
(47, 5),
(48, 5),
(49, 5),
(49, 2),
(50, 7),
(51, 1),
(52, 2),
(53, 1),
(54, 3),
(55, 1),
(56, 1),
(56, 2);

-- --------------------------------------------------------

--
-- Table structure for table `priority_groups`
--

CREATE TABLE `priority_groups` (
  `priority_group_id` int(11) NOT NULL,
  `priority_group` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `report_type` char(20) NOT NULL,
  `report_details` varchar(255) NOT NULL,
  `vaccine_symptoms_reported` varchar(255) NOT NULL,
  `COVID19_symptoms_reported` varchar(255) NOT NULL,
  `date_last_out` date NOT NULL,
  `date_reported` date NOT NULL,
  `report_status` char(20) NOT NULL,
  `Archived` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `patient_id`, `report_type`, `report_details`, `vaccine_symptoms_reported`, `COVID19_symptoms_reported`, `date_last_out`, `date_reported`, `report_status`, `Archived`) VALUES
(1, 1, 'Smit+ App', 'I\'m currently experiencing other side effects after vaccination, specifically vomiting and diarrhea. ', 'Fever, Headache, Tiredness, Vomiting, Diarrhea', 'Vomiting, Diarrhea', '2021-07-13', '2021-07-14', 'Verified', 0),
(2, 2, 'SMS', 'I\'m experiencing bothering symptoms, such as diarrhea, vomiting and headaches.', '', '', '2021-07-10', '2021-07-13', 'Pending', 0),
(3, 3, 'Smit+ App', '...', 'sick', 'sick', '2021-07-13', '2021-07-14', 'Invalidated', 0),
(4, 4, 'Smit+ App', 'Ako ay nilalagnat, parang pagod palagi, at walang pang lasa', '', 'Fever, Tiredness, Loss of taste', '2021-07-13', '2021-07-14', 'Verified', 0),
(5, 5, 'SMS', 'After vaccination, I noticed that I feel some side effects, such as tiredness, headache, lost of taste', '', '', '2021-07-13', '2021-07-14', 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_drive`
--

CREATE TABLE `vaccination_drive` (
  `drive_id` int(11) NOT NULL,
  `vaccination_site_id` int(11) NOT NULL,
  `vaccination_date` date NOT NULL,
  `Archived` int(1) DEFAULT NULL,
  `notif_opened` int(1) DEFAULT NULL,
  `allocated` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccination_drive`
--

INSERT INTO `vaccination_drive` (`drive_id`, `vaccination_site_id`, `vaccination_date`, `Archived`, `notif_opened`, `allocated`) VALUES
(55, 5, '2021-11-22', 0, 0, 0),
(56, 7, '2021-11-29', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_sites`
--

CREATE TABLE `vaccination_sites` (
  `vaccination_site_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `vaccine` (
  `vaccine_id` int(11) NOT NULL,
  `vaccine_name` varchar(255) NOT NULL,
  `vaccine_type` varchar(255) NOT NULL,
  `vaccine_efficacy` int(11) NOT NULL,
  `vaccine_lifespan_in_months` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(7, 'test', 'Inactivated Virus', 90, 7),
(8, 'sfasf', 'Inactivated Virus', 70, 33),
(9, 'jhsavff', 'Inactivated Virus', 70, 2),
(10, 'testing', 'Inactivated Virus', 90, 5),
(11, 'please', 'Inactivated Virus', 90, 7),
(12, 'last', 'Inactivated Virus', 90, 33);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_batch`
--

CREATE TABLE `vaccine_batch` (
  `vaccine_batch_id` int(11) NOT NULL,
  `vaccine_lot_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `vaccine_quantity` int(11) NOT NULL,
  `date_manufactured` date NOT NULL,
  `date_of_expiration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `vaccine_drive_1` (
  `drive_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `stubs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccine_drive_1`
--

INSERT INTO `vaccine_drive_1` (`drive_id`, `vaccine_id`, `stubs`) VALUES
(1, 5, 0),
(2, 4, 0),
(3, 4, 0),
(4, 1, 0),
(5, 2, 0),
(6, 3, 0),
(7, 5, 0),
(8, 6, 0),
(9, 6, 0),
(10, 4, 0),
(11, 5, 0),
(12, 5, 0),
(13, 2, 0),
(14, 1, 0),
(15, 1, 0),
(16, 1, 0),
(17, 1, 0),
(18, 1, 0),
(19, 1, 0),
(20, 1, 0),
(6, 1, 0),
(21, 1, 0),
(22, 2, 0),
(23, 1, 0),
(24, 1, 0),
(25, 1, 0),
(26, 1, 0),
(27, 1, 0),
(28, 1, 0),
(29, 1, 0),
(30, 1, 0),
(31, 1, 0),
(32, 1, 0),
(33, 1, 0),
(34, 1, 0),
(35, 1, 0),
(36, 1, 0),
(37, 1, 0),
(38, 1, 0),
(39, 1, 0),
(40, 1, 0),
(41, 1, 0),
(42, 1, 0),
(43, 1, 0),
(44, 1, 0),
(45, 1, 0),
(46, 1, 0),
(47, 1, 0),
(48, 1, 0),
(49, 1, 0),
(50, 1, 0),
(51, 1, 0),
(52, 1, 0),
(53, 1, 0),
(54, 1, 0),
(55, 1, 0),
(56, 1, 0),
(21, 1, 0),
(57, 1, 0),
(58, 1, 0),
(59, 1, 0),
(60, 1, 0),
(61, 1, 0),
(62, 1, 0),
(63, 1, 0),
(64, 1, 0),
(65, 1, 0),
(66, 1, 0),
(67, 1, 0),
(68, 1, 0),
(69, 1, 0),
(70, 1, 0),
(71, 1, 0),
(72, 1, 0),
(72, 1, 0),
(71, 1, 0),
(73, 1, 0),
(74, 1, 0),
(75, 1, 0),
(76, 1, 0),
(77, 1, 0),
(78, 1, 0),
(79, 1, 0),
(80, 1, 0),
(81, 1, 0),
(82, 1, 0),
(83, 1, 0),
(84, 1, 0),
(6, 1, 0),
(7, 1, 0),
(8, 1, 0),
(9, 1, 0),
(10, 1, 0),
(11, 1, 0),
(12, 1, 0),
(13, 1, 0),
(14, 1, 0),
(15, 1, 0),
(16, 1, 0),
(17, 1, 0),
(18, 1, 0),
(19, 1, 0),
(20, 1, 0),
(21, 1, 0),
(22, 1, 0),
(23, 1, 0),
(24, 1, 0),
(25, 1, 0),
(26, 1, 0),
(27, 1, 0),
(28, 1, 0),
(29, 1, 0),
(30, 1, 0),
(31, 1, 0),
(32, 1, 0),
(33, 2, 0),
(33, 5, 0),
(34, 1, 0),
(35, 3, 0),
(35, 5, 0),
(36, 1, 0),
(37, 1, 0),
(37, 3, 0),
(38, 1, 0),
(39, 2, 0),
(40, 2, 0),
(41, 4, 0),
(42, 5, 0),
(43, 2, 0),
(44, 1, 0),
(45, 2, 0),
(46, 2, 0),
(47, 2, 0),
(48, 2, 0),
(49, 1, 0),
(49, 11, 0),
(50, 1, 0),
(51, 2, 0),
(52, 2, 0),
(53, 2, 0),
(54, 6, 0),
(55, 1, 22),
(56, 1, 33),
(56, 2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_drive_2`
--

CREATE TABLE `vaccine_drive_2` (
  `drive_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `first_dose_date` date NOT NULL,
  `stubs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_drive_2`
--

INSERT INTO `vaccine_drive_2` (`drive_id`, `vaccine_id`, `first_dose_date`, `stubs`) VALUES
(33, 5, '2021-08-18', 0),
(33, 5, '2021-08-05', 0),
(33, 5, '2021-09-08', 0),
(33, 4, '2021-08-18', 0),
(33, 4, '2021-08-05', 0),
(33, 4, '2021-09-08', 0),
(33, 1, '2021-08-18', 0),
(33, 1, '2021-08-05', 0),
(33, 1, '2021-09-08', 0),
(34, 4, '2021-10-08', 0),
(34, 4, '2021-10-18', 0),
(34, 4, '2021-10-07', 0),
(34, 3, '2021-10-08', 0),
(34, 3, '2021-10-18', 0),
(34, 3, '2021-10-07', 0),
(34, 4, '2021-10-08', 0),
(34, 4, '2021-10-18', 0),
(34, 4, '2021-10-07', 0),
(35, 4, '2021-10-25', 0),
(35, 4, '2021-10-11', 0),
(35, 4, '2021-10-11', 0),
(35, 3, '2021-10-25', 0),
(35, 3, '2021-10-11', 0),
(35, 3, '2021-10-11', 0),
(35, 6, '2021-10-25', 0),
(35, 6, '2021-10-11', 0),
(35, 6, '2021-10-11', 0),
(36, 5, '2021-10-12', 0),
(36, 5, '2021-10-01', 0),
(36, 5, '2021-10-07', 0),
(36, 3, '2021-10-12', 0),
(36, 3, '2021-10-01', 0),
(36, 3, '2021-10-07', 0),
(36, 2, '2021-10-12', 0),
(36, 2, '2021-10-01', 0),
(36, 2, '2021-10-07', 0),
(37, 5, '2021-10-06', 0),
(37, 5, '2021-10-08', 0),
(37, 5, '2021-10-02', 0),
(37, 3, '2021-10-06', 0),
(37, 3, '2021-10-08', 0),
(37, 3, '2021-10-02', 0),
(37, 3, '2021-10-06', 0),
(37, 3, '2021-10-08', 0),
(37, 3, '2021-10-02', 0),
(49, 5, '2021-11-02', 0),
(49, 5, '2021-11-22', 0),
(49, 5, '2021-11-15', 0),
(50, 3, '2021-11-01', 0),
(51, 4, '2021-11-23', 0),
(51, 4, '2021-11-30', 0),
(51, 4, '2021-11-15', 0),
(52, 4, '2021-11-09', 0),
(53, 4, '2021-11-22', 0),
(54, 1, '2021-12-01', 0),
(55, 6, '2021-11-15', 55),
(56, 5, '2021-11-22', 33);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_information`
--

CREATE TABLE `vaccine_information` (
  `vaccine_id` int(11) NOT NULL,
  `vaccine_manufacturer` varchar(255) NOT NULL,
  `vaccine_description` longtext NOT NULL,
  `vaccine_dosage_required` int(11) NOT NULL,
  `vaccine_dosage_interval` int(11) NOT NULL,
  `vaccine_minimum_temperature` int(11) NOT NULL,
  `vaccine_maximum_temperature` int(11) NOT NULL
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
(6, 'Test', 'test', 2, 10, 8, 8),
(8, 'asfasfasf', 'asfasfasf', 2, 2, 22, 33),
(9, 'asfasfasfg', 'asgasgasg', 2, 2, 2, 2),
(10, 'asfasfasfg', 'asfasfasf', 3, 2, 22, 2),
(11, 'please', 'please', 7, 7, 7, 77),
(12, 'last', 'last', 2, 4, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_lot`
--

CREATE TABLE `vaccine_lot` (
  `vaccine_lot_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `employee_account_id` int(11) NOT NULL,
  `date_stored` date NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `total_vaccine_vial_quantity` int(11) NOT NULL,
  `vaccine_expiration` date DEFAULT NULL,
  `Archived` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccine_lot`
--

INSERT INTO `vaccine_lot` (`vaccine_lot_id`, `vaccine_id`, `employee_account_id`, `date_stored`, `source`, `total_vaccine_vial_quantity`, `vaccine_expiration`, `Archived`) VALUES
(1, 2, 1, '2021-08-02', 'National Government', 5000, '2022-08-08', 0),
(2, 1, 4, '2021-07-14', 'National Government', 5000, '2022-07-14', 0),
(3, 5, 1, '2020-11-25', 'National Government', 3000, '2021-09-15', 0),
(4, 2, 4, '2020-12-29', 'Department Of Health', 4000, '2021-09-27', 0),
(5, 4, 4, '2021-04-20', 'Department Of Health', 6000, '2021-09-05', 1),
(6, 3, 1, '2021-09-22', 'Department Of Health', 3000, '2022-10-26', 1),
(7, 6, 1, '2021-09-28', 'National Government', 10000, '2023-01-18', 0),
(8, 4, 1, '2021-09-08', 'Department Of Health', 10000, '2021-09-23', 0),
(9, 5, 1, '2021-11-17', 'National Government', 555, '2021-11-23', 0),
(10, 3, 1, '2021-11-24', 'National Government', 66, '2021-12-01', 0),
(11, 4, 1, '2021-11-17', 'National Government', 77, '2021-11-23', 0),
(12, 4, 1, '2021-11-23', 'Department Of Health', 668, '2021-11-29', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `employee_id_activity` (`employee_id`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`barangay_id`),
  ADD KEY `health_district_id` (`health_district_id`);

--
-- Indexes for table `barangay_stubs`
--
ALTER TABLE `barangay_stubs`
  ADD KEY `barangay_id` (`barangay_id`),
  ADD KEY `drive_id` (`drive_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `barangay_id` (`barangay_id`);

--
-- Indexes for table `employee_account`
--
ALTER TABLE `employee_account`
  ADD PRIMARY KEY (`employee_account_id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indexes for table `health_district`
--
ALTER TABLE `health_district`
  ADD PRIMARY KEY (`health_district_id`);

--
-- Indexes for table `health_district_drives`
--
ALTER TABLE `health_district_drives`
  ADD KEY `drive_id` (`drive_id`),
  ADD KEY `health_district_id` (`health_district_id`);

--
-- Indexes for table `medical_background`
--
ALTER TABLE `medical_background`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `patient_first_vaccinator` (`first_dose_vaccinator`),
  ADD KEY `patient_second_vaccinator` (`second_dose_vaccinator`);

--
-- Indexes for table `patient_account`
--
ALTER TABLE `patient_account`
  ADD PRIMARY KEY (`patient_account_id`),
  ADD KEY `patient_id_account` (`patient_id`);

--
-- Indexes for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD UNIQUE KEY `patient_id_patient_first_name` (`patient_id`),
  ADD KEY `barangay_id` (`barangay_id`),
  ADD KEY `priority_group_id` (`priority_group_id`);

--
-- Indexes for table `patient_drive`
--
ALTER TABLE `patient_drive`
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `drive_id` (`drive_id`),
  ADD KEY `vaccine_lot_id` (`vaccine_lot_id`);

--
-- Indexes for table `patient_vitals`
--
ALTER TABLE `patient_vitals`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `priority_groups`
--
ALTER TABLE `priority_groups`
  ADD PRIMARY KEY (`priority_group_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD UNIQUE KEY `patient_id` (`patient_id`);

--
-- Indexes for table `vaccination_drive`
--
ALTER TABLE `vaccination_drive`
  ADD PRIMARY KEY (`drive_id`),
  ADD KEY `vaccination_site_id` (`vaccination_site_id`);

--
-- Indexes for table `vaccination_sites`
--
ALTER TABLE `vaccination_sites`
  ADD PRIMARY KEY (`vaccination_site_id`),
  ADD UNIQUE KEY `vaccination_site_id` (`vaccination_site_id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`vaccine_id`);

--
-- Indexes for table `vaccine_batch`
--
ALTER TABLE `vaccine_batch`
  ADD PRIMARY KEY (`vaccine_batch_id`),
  ADD KEY `vaccine_lot_id` (`vaccine_lot_id`),
  ADD KEY `vaccine_id` (`vaccine_id`);

--
-- Indexes for table `vaccine_drive_1`
--
ALTER TABLE `vaccine_drive_1`
  ADD KEY `drive_id` (`drive_id`),
  ADD KEY `vaccine_id` (`vaccine_id`);

--
-- Indexes for table `vaccine_information`
--
ALTER TABLE `vaccine_information`
  ADD UNIQUE KEY `vaccine_id` (`vaccine_id`);

--
-- Indexes for table `vaccine_lot`
--
ALTER TABLE `vaccine_lot`
  ADD PRIMARY KEY (`vaccine_lot_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `employee_account_id` (`employee_account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `barangay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_account`
--
ALTER TABLE `employee_account`
  MODIFY `employee_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `health_district`
--
ALTER TABLE `health_district`
  MODIFY `health_district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `patient_account`
--
ALTER TABLE `patient_account`
  MODIFY `patient_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=478;

--
-- AUTO_INCREMENT for table `priority_groups`
--
ALTER TABLE `priority_groups`
  MODIFY `priority_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vaccination_drive`
--
ALTER TABLE `vaccination_drive`
  MODIFY `drive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `vaccination_sites`
--
ALTER TABLE `vaccination_sites`
  MODIFY `vaccination_site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vaccine_batch`
--
ALTER TABLE `vaccine_batch`
  MODIFY `vaccine_batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vaccine_lot`
--
ALTER TABLE `vaccine_lot`
  MODIFY `vaccine_lot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
