-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2021 at 07:59 AM
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
-- Database: `smit`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `barangay_id` int(11) NOT NULL,
  `health_district_id` int(11) NOT NULL,
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
(2, 'Monica', 'Bing', 'Geller', NULL, 'Transponster', NULL, '09217532942'),
(3, 'Ross', 'Geller', NULL, NULL, 'Transponster', NULL, '09217532942'),
(4, 'Joseph', 'Tribbiani', 'Francis', 'Jr.', 'Transponster', NULL, '09217532942'),
(5, 'Rachel', 'Geller', 'Green', NULL, 'Transponster', NULL, '09217532942'),
(6, 'Phoebe', 'Buffay', NULL, NULL, 'Transponster', NULL, '09217532942');

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
  `employee_picture` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_account`
--

INSERT INTO `employee_account` (`employee_account_id`, `employee_id`, `employee_username`, `employee_password`, `employee_account_type`, `employee_picture`) VALUES
(1, 1, 'CMBing', 'WriteFromYourFullSizedAorticPump', 'Admin', NULL),
(2, 2, 'Harmonica', 'YourLittleHarmonicaIsHammered', 'Client', NULL),
(3, 3, 'SandwichGuy', 'WeWereOnABreak', 'Client', NULL),
(4, 4, 'KenAdams', 'YepThatsOneNakedHooker', 'Client', NULL),
(5, 5, 'RachGreen', 'WentBackpackingThroughWesternEurope', 'Client', NULL),
(6, 6, 'ReginaPhalange', 'SheCringes_ThisIsHowILookedWhenImTurnedOn', 'Client', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `health_district`
--

CREATE TABLE `health_district` (
  `health_district_id` int(11) NOT NULL,
  `health_district_name` varchar(255) NOT NULL,
  `hd_contact_number` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `health_district_drives` (
  `drive_id` int(11) NOT NULL,
  `health_district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_district_drives`
--

INSERT INTO `health_district_drives` (`drive_id`, `health_district_id`) VALUES
(4, 8),
(5, 16),
(4, 6),
(6, 7),
(6, 12),
(7, 4),
(7, 6),
(8, 6),
(9, 13),
(10, 11),
(11, 11),
(12, 2),
(13, 2),
(13, 1),
(14, 2),
(14, 12),
(15, 14),
(16, 10),
(17, 10),
(18, 16),
(19, 15),
(20, 4),
(6, 12),
(21, 10),
(22, 9),
(23, 11),
(24, 10),
(25, 12),
(26, 10),
(27, 11),
(28, 9),
(29, 14),
(30, 9),
(31, 10),
(32, 12),
(33, 11),
(34, 10),
(35, 12),
(36, 11),
(37, 15),
(38, 9),
(39, 9),
(40, 1),
(41, 12),
(42, 9),
(43, 9),
(44, 9),
(45, 9),
(46, 9),
(47, 15),
(48, 15),
(49, 9),
(50, 11),
(51, 11),
(52, 14),
(53, 10),
(54, 15),
(55, 11),
(56, 10),
(21, 11),
(57, 9),
(58, 9),
(59, 12),
(60, 13),
(61, 9),
(62, 14),
(63, 10),
(64, 13),
(65, 9),
(66, 12),
(67, 11),
(68, 10),
(69, 12),
(70, 12),
(71, 13),
(72, 14),
(72, 9),
(72, 13),
(71, 10),
(73, 9),
(74, 1),
(75, 9),
(76, 9),
(77, 9),
(78, 9),
(79, 12),
(80, 11),
(81, 9),
(82, 9),
(83, 14),
(84, 9),
(6, 1),
(7, 9),
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
(24, 9);

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
(8, 0, 0, 0, 0, 0, 0, 1, 0, ''),
(9, 0, 0, 0, 0, 0, 0, 0, 0, '');

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
  `second_dose_vaccinator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_full_name`, `date_of_first_dosage`, `date_of_second_dosage`, `first_dose_vaccination`, `second_dose_vaccination`, `for_queue`, `notification`, `first_dose_vaccinator`, `second_dose_vaccinator`) VALUES
(1, 'Theodore Evelyn Mosby', '2021-07-20', '2021-08-03', 1, 1, 1, NULL, NULL, NULL),
(2, 'Marshall Ericksen', '2021-07-12', NULL, 1, 0, 0, NULL, NULL, NULL),
(3, 'Lili Aldrin', '2021-10-09', '2021-10-30', 0, 0, 0, NULL, NULL, NULL),
(4, 'Robin Scherbatsky ', '2021-10-15', '2021-11-05', 0, 0, 0, NULL, NULL, NULL),
(5, 'Barney Stinson', NULL, NULL, 0, 0, 0, NULL, NULL, NULL),
(8, 'Adriel Gaviola', NULL, NULL, 0, 0, 0, NULL, NULL, NULL),
(9, 'Hudson Natividad', NULL, NULL, 0, 0, 0, NULL, NULL, NULL);

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
(8, 8, 'AdrielGaviola', '$2y$10$IWUX25IDKI7zoYBfPouDsOv/qG/iUb1HwQdm.Rl7tKmHKy0Lhiyq.', NULL, '2191057@slu.edu.ph'),
(9, 9, 'HudsonNatividad', '$2y$10$x6VlGS1W3XAcMDFghjMP.Oo731T0I89HEkpe9T7w523vmWEI6Q5aS', NULL, 'hudsonkit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patient_barangay_queue`
--

CREATE TABLE `patient_barangay_queue` (
  `patient_id` int(11) NOT NULL,
  `barangay_id` int(11) NOT NULL,
  `queue_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_barangay_queue`
--

INSERT INTO `patient_barangay_queue` (`patient_id`, `barangay_id`, `queue_number`) VALUES
(1, 113, 1);

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
  `Archived` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`patient_id`, `patient_first_name`, `patient_last_name`, `patient_middle_name`, `patient_suffix`, `patient_priority_group`, `patient_category_id`, `patient_category_number`, `patient_philHealth`, `patient_pwd`, `patient_house_address`, `patient_barangay_address`, `patient_CM_address`, `patient_province`, `patient_region`, `patient_birthdate`, `patient_age`, `patient_gender`, `patient_contact_number`, `patient_occupation`, `Archived`) VALUES
(1, 'Theodore', 'Mosby', 'Evelyn', NULL, 'A1: Health Care Workers', 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0),
(2, 'Marshall', 'Ericksen', NULL, NULL, 'A2: Senior Citizens', 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0),
(3, 'Lili', 'Ericksen', 'Aldrin', NULL, 'A3: Adult with Comorbidity', 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'Irisan', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0),
(4, 'Robin', 'Scherbatsky', NULL, NULL, 'A4: Frontline Personnel in Essential Sector', 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 1),
(5, 'Barney', 'Stinson', NULL, NULL, 'A5: Indigent Population', 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0),
(8, 'Adriel', 'Gaviola', 'Miguel', 'jr', 'A3: Adult with Comorbidity', 'other', '214123', '123123', '123123', 'Tacay Road', '15', 'Baguio City', 'Benguet', 'Cordillera Administrative Region ', '1999-12-07', 21, 'male', '09215732334', 'Student', NULL),
(9, 'Hudson', 'Natividad', 'Pasalo', 'sr', 'A3: Adult with Comorbidity', 'other', '214123', '123123', '123123', 'Eagle Crest', '12', 'Baguio City', 'Benguet', 'Cordillera Administrative Region ', '1999-10-13', 22, 'male', '09215732334', 'Miguel', NULL);

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
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `report_status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `vaccination_drive` (
  `drive_id` int(11) NOT NULL,
  `vaccination_site_id` int(11) NOT NULL,
  `vaccination_date` date NOT NULL,
  `stubs` int(11) NOT NULL,
  `priority_group` varchar(255) NOT NULL,
  `Archived` int(1) DEFAULT NULL,
  `notif_opened` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccination_drive`
--

INSERT INTO `vaccination_drive` (`drive_id`, `vaccination_site_id`, `vaccination_date`, `stubs`, `priority_group`, `Archived`, `notif_opened`) VALUES
(1, 1, '2021-07-30', 1000, 'A1: Health Care Workers', 0, 1),
(2, 2, '2021-07-30', 800, 'A3: Adult with Comorbidity', 0, 1),
(3, 3, '2021-07-30', 700, 'A4: Frontline Personnel in Essential Sector', 0, 1),
(4, 4, '2021-07-30', 1000, 'A2: Senior Citizens', 0, 1),
(5, 5, '2021-07-30', 500, 'A1: Health Care Workers', 0, 1),
(6, 1, '2021-10-14', 100, 'A1: Health Care Workers', 0, 1),
(7, 1, '2021-10-08', 9000, 'A1: Health Care Workers', 0, 1),
(8, 1, '2021-10-09', 1, 'A1: Health Care Workers', 0, 1),
(9, 1, '2021-10-01', 8, 'A1: Health Care Workers', 0, 1),
(10, 1, '2021-10-01', 2, 'A1: Health Care Workers', 0, 1),
(11, 1, '2021-10-07', 4, 'A1: Health Care Workers', 0, 1),
(12, 1, '2021-10-07', 3, 'A1: Health Care Workers', 0, 1),
(13, 1, '2021-10-08', 10, 'A1: Health Care Workers', 0, 1),
(14, 1, '2021-10-16', 15, 'A1: Health Care Workers', 0, 1),
(15, 1, '2021-10-09', 22, 'A1: Health Care Workers', 0, 1),
(16, 1, '2021-10-08', 66, 'A1: Health Care Workers', 0, 1),
(17, 1, '2021-10-08', 101, 'A1: Health Care Workers', 0, 1),
(18, 1, '2021-10-06', 11, 'A1: Health Care Workers', 0, 1),
(19, 1, '2021-10-13', 13, 'A1: Health Care Workers', 0, 1),
(20, 1, '2021-10-14', 17, 'A1: Health Care Workers', 0, 1),
(21, 1, '2021-10-01', 17, 'A1: Health Care Workers', 0, 1),
(22, 1, '2021-10-08', 55, 'A1: Health Care Workers', 0, 1),
(23, 1, '2021-10-08', 99, 'A1: Health Care Workers', 0, 1),
(24, 1, '2021-10-14', 7000, 'A1: Health Care Workers', 0, 1);

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
(7, 'test', 'Inactivated Virus', 90, 7);

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
-- Table structure for table `vaccine_deployment`
--

CREATE TABLE `vaccine_deployment` (
  `drive_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccine_deployment`
--

INSERT INTO `vaccine_deployment` (`drive_id`, `vaccine_id`) VALUES
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
(24, 1);

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
(6, 'Test', 'test', 2, 10, 8, 8);

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
(5, 4, 4, '2021-04-20', 'Department Of Health', 6000, '2021-09-05', 0),
(6, 3, 1, '2021-09-22', 'Department Of Health', 3000, '2022-10-26', 0),
(7, 6, 1, '2021-09-28', 'National Government', 10000, '2023-01-18', 0),
(8, 4, 1, '2021-09-08', 'Department Of Health', 10000, '2021-09-23', 1);

--
-- Indexes for dumped tables
--

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
  ADD UNIQUE KEY `patient_id_patient_first_name` (`patient_id`);

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
-- Indexes for table `vaccine_deployment`
--
ALTER TABLE `vaccine_deployment`
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
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `barangay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_account`
--
ALTER TABLE `employee_account`
  MODIFY `employee_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `health_district`
--
ALTER TABLE `health_district`
  MODIFY `health_district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient_account`
--
ALTER TABLE `patient_account`
  MODIFY `patient_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vaccination_drive`
--
ALTER TABLE `vaccination_drive`
  MODIFY `drive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vaccination_sites`
--
ALTER TABLE `vaccination_sites`
  MODIFY `vaccination_site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vaccine_batch`
--
ALTER TABLE `vaccine_batch`
  MODIFY `vaccine_batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vaccine_lot`
--
ALTER TABLE `vaccine_lot`
  MODIFY `vaccine_lot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

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
