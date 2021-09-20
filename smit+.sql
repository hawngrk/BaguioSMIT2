-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 20, 2021 at 04:08 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

DROP TABLE IF EXISTS `barangay`;
CREATE TABLE IF NOT EXISTS `barangay` (
  `barangay_id` int(11) NOT NULL AUTO_INCREMENT,
  `health_district_id` int(11) NOT NULL,
  `barangay_name` varchar(255) NOT NULL,
  PRIMARY KEY (`barangay_id`),
  KEY `health_district_id` (`health_district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`barangay_id`, `health_district_id`, `barangay_name`) VALUES
(1, 10, 'A. Bonifacio-Caguioa-Rimando (ABCR)'),
(2, 10, 'Alfonso Tabora'),
(3, 4, 'Ambiong'),
(4, 5, 'Andres Bonifacio'),
(5, 3, 'Apugan-Loakan'),
(6, 3, 'Atok Trail'),
(7, 4, 'Aurora Hill North Central'),
(8, 4, 'Aurora Hill Proper (Malvar-Sgt. Floresca)'),
(9, 4, 'Aurora Hill South Central'),
(10, 10, 'Bagong Lipunan (Market Area)'),
(11, 2, 'Bakakeng Central'),
(12, 2, 'Bakakeng North'),
(13, 7, 'Bal-Marcoville (Marcoville)'),
(14, 6, 'Balsigan'),
(15, 4, 'Bayan Park East'),
(16, 4, 'Bayan Park Village'),
(17, 4, 'Bayan Park West (Bayan Park)'),
(18, 7, 'BGH Compound'),
(19, 4, 'Brookside'),
(20, 4, 'Brookspoint'),
(21, 7, 'Cabinet Hill-Teacher\'s Camp'),
(22, 15, 'Camdas Subdivision'),
(23, 9, 'Camp 7'),
(24, 7, 'Camp 8'),
(25, 5, 'Camp Allen'),
(26, 5, 'Campo Filipino'),
(27, 6, 'City Camp Central'),
(28, 6, 'City Camp Proper'),
(29, 12, 'Country Club Village'),
(30, 5, 'Cresencia Village'),
(31, 16, 'Dagsian Lower'),
(32, 16, 'Dagsian Upper'),
(33, 15, 'Dizon Subdivision'),
(34, 6, 'Dominican Hill-Mirador'),
(35, 2, 'Dontogan'),
(36, 7, 'DPS Area'),
(37, 7, 'Engineers\' Hill'),
(38, 14, 'Fairview Village'),
(39, 6, 'Ferdinand (Happy Homes-Campo Sioco)'),
(40, 3, 'Fort del Pilar'),
(41, 16, 'Gabriela Silang'),
(42, 6, 'General Emilio F. Aguinaldo (Quirino-Magsaysay, Lower)'),
(44, 7, 'General Luna Upper'),
(45, 11, 'Gibraltar'),
(46, 7, 'Greenwater Village'),
(47, 13, 'Guisad Central'),
(48, 5, 'Guisad Sorong'),
(49, 16, 'Happy Hollow'),
(50, 10, 'Happy Homes (Happy Homes-Lucban)'),
(51, 10, 'Harrison-Claudio Carantes'),
(52, 16, 'Hillside Barangay'),
(53, 10, 'Holy Ghost Extension'),
(54, 10, 'Holy Ghost Proper'),
(55, 10, 'Honeymoon (Honeymoon-Holy Ghost)'),
(56, 6, 'Imelda R. Marcos (La Salle)'),
(57, 10, 'Imelda Village'),
(58, 8, 'Irisan'),
(59, 10, 'Kabayanihan'),
(60, 10, 'Kagitingan'),
(61, 6, 'Kayang Extension'),
(62, 10, 'Kayang-Hilltop'),
(63, 3, 'Kias'),
(64, 6, 'Legarda-Burnham-Kisad'),
(65, 9, 'Liwanag-Loakan'),
(66, 9, 'Loakan Proper'),
(67, 4, 'Lopez Jaena'),
(68, 6, 'Lourdes Subdivision Extension'),
(69, 6, 'Lourdes Subdivision Lower'),
(70, 6, 'Lourdes Subdivision Proper'),
(71, 12, 'Lualhati'),
(72, 11, 'Lucnab'),
(73, 10, 'Magsaysay Lower'),
(74, 10, 'Magsaysay Private Road'),
(75, 10, 'Magsaysay Upper'),
(76, 10, 'Malcolm Square-Perfecto (Jose Abad Santos)'),
(77, 12, 'Manuel A. Roxas'),
(78, 5, 'Market Subdivision Upper'),
(79, 14, 'Middle Quezon Hill Subdivision(Quezon Hill Middle)'),
(80, 7, 'Military Cut-off'),
(81, 11, 'Mines View Park'),
(82, 4, 'Modern Site East'),
(83, 4, 'Modern Site West'),
(84, 6, 'MRR-Queen of Peace'),
(85, 10, 'New Lucban'),
(86, 11, 'Outlook Drive'),
(87, 12, 'Pacdal'),
(88, 5, 'Padre Burgos'),
(89, 5, 'Padre Zamora'),
(90, 6, 'Palma-Urbano (Cariño-Palma)'),
(91, 7, 'Phil-Am'),
(92, 13, 'Pinget'),
(93, 13, 'Pinsao Pilot Project'),
(94, 13, 'Pinsao Proper'),
(95, 7, 'Poliwes'),
(96, 11, 'Pucsusan'),
(97, 14, 'Quezon Hill Proper'),
(98, 14, 'Quezon Hill Upper'),
(99, 15, 'Quirino Hill East'),
(100, 15, 'Quirino Hill Lower'),
(101, 15, 'Quirino Hill Middle'),
(102, 15, 'Quirino Hill West'),
(103, 6, 'Quirino-Magsaysay Upper (Upper QM)'),
(104, 10, 'Rizal Monument Area'),
(105, 6, 'Rock Quarry Lower'),
(106, 6, 'Rock Quarry Middle'),
(107, 6, 'Rock Quarry Upper'),
(108, 12, 'Saint Joseph Village'),
(109, 7, 'Salud Mitra'),
(110, 4, 'San Antonio Village'),
(111, 10, 'Sanitary Camp North'),
(112, 10, 'Sanitary Camp South'),
(113, 1, 'San Luis Village'),
(114, 1, 'San Roque Village'),
(115, 7, 'Santa Escolastica'),
(116, 2, 'Santo Rosario'),
(117, 2, 'Santo Tomas Proper'),
(118, 2, 'Santo Tomas School Area'),
(119, 7, 'San Vicente'),
(120, 16, 'Scout Barrio'),
(121, 10, 'Session Road Area'),
(122, 10, 'Slaughter House Area (Santo Niño Slaughter)'),
(123, 2, 'SLU-SVP Housing Village'),
(124, 12, 'South Drive'),
(125, 10, 'Teodora Alonzo'),
(126, 10, 'Trancoville'),
(127, 14, 'Victoria Village');

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
  KEY `barangay_id` (`barangay_id`),
  KEY `drive_id` (`drive_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangay_stubs`
--

INSERT INTO `barangay_stubs` (`barangay_id`, `drive_id`, `A1_stubs`, `A2_stubs`, `A3_stubs`, `A4_stubs`, `A5_stubs`, `A6_stubs`) VALUES
(3, 4, 50, 50, 50, 50, NULL, NULL),
(1, 4, 30, 30, 40, 50, 50, NULL),
(2, 4, 50, 25, 75, 25, 25, NULL),
(7, 4, 100, 75, 100, 75, 50, NULL),
(6, 5, 20, 20, 20, 20, 20, NULL),
(5, 5, 25, 25, 25, 25, 50, NULL),
(4, 5, 50, 50, 50, 50, 50, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `employee_account`;
CREATE TABLE IF NOT EXISTS `employee_account` (
  `employee_account_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `employee_username` varchar(255) NOT NULL,
  `employee_password` varchar(255) NOT NULL,
  `employee_account_type` varchar(255) NOT NULL,
  `employee_picture` blob DEFAULT NULL,
  PRIMARY KEY (`employee_account_id`),
  UNIQUE KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `health_district`;
CREATE TABLE IF NOT EXISTS `health_district` (
  `health_district_id` int(11) NOT NULL AUTO_INCREMENT,
  `health_district_name` varchar(255) NOT NULL,
  `hd_contact_number` char(11) NOT NULL,
  PRIMARY KEY (`health_district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

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
(4, 8),
(5, 16),
(4, 6),
(6, 7),
(6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `medical_background`
--

DROP TABLE IF EXISTS `medical_background`;
CREATE TABLE IF NOT EXISTS `medical_background` (
  `patient_id` int(11) NOT NULL,
  `skin_allergy` tinyint(1) NOT NULL,
  `food_allergy` tinyint(1) NOT NULL,
  `medication_allergy` tinyint(1) NOT NULL,
  `insect_allergy` tinyint(1) NOT NULL,
  `pollen_allergy` tinyint(1) NOT NULL,
  `bite_allergy` tinyint(1) NOT NULL,
  `latex_allergy` tinyint(1) NOT NULL,
  `mold_allergy` tinyint(1) NOT NULL,
  `pet_allergy` tinyint(1) NOT NULL,
  `hypertension` tinyint(1) NOT NULL,
  `heart_disease` tinyint(1) NOT NULL,
  `kidney_disease` tinyint(1) NOT NULL,
  `diabetes_mellitus` tinyint(1) NOT NULL,
  `bronchial_asthma` tinyint(1) NOT NULL,
  `immunodeficiency` tinyint(1) NOT NULL,
  `cancer` tinyint(1) NOT NULL,
  `other_commorbidity` varchar(255) DEFAULT NULL,
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_background`
--

INSERT INTO `medical_background` (`patient_id`, `skin_allergy`, `food_allergy`, `medication_allergy`, `insect_allergy`, `pollen_allergy`, `bite_allergy`, `latex_allergy`, `mold_allergy`, `pet_allergy`, `hypertension`, `heart_disease`, `kidney_disease`, `diabetes_mellitus`, `bronchial_asthma`, `immunodeficiency`, `cancer`, `other_commorbidity`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'NULL'),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'NULL'),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'NULL'),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'NULL'),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'NULL'),
(5, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, ''),
(5, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, ''),
(5, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, '');

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
  `queue_number` int(11) DEFAULT NULL,
  `notification` int(1) DEFAULT NULL,
  `first_dose_vaccinator` int(11) DEFAULT NULL,
  `second_dose_vaccinator` int(11) DEFAULT NULL,
  PRIMARY KEY (`patient_id`),
  KEY `patient_first_vaccinator` (`first_dose_vaccinator`),
  KEY `patient_second_vaccinator` (`second_dose_vaccinator`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_full_name`, `date_of_first_dosage`, `date_of_second_dosage`, `first_dose_vaccination`, `second_dose_vaccination`, `queue_number`, `notification`, `first_dose_vaccinator`, `second_dose_vaccinator`) VALUES
(1, 'Theodore Evelyn Mosby', '2021-07-20', '2021-08-03', 0, 0, 0, NULL, NULL, NULL),
(2, 'Marshall Ericksen', '2021-07-12', '2021-07-26', 0, 0, 0, NULL, NULL, NULL),
(3, 'Lili Aldrin', '2021-06-28', '2021-07-12', 0, 0, 0, NULL, NULL, NULL),
(4, 'Robin Scherbatsky ', '2021-07-01', '2021-07-15', 0, 0, 0, NULL, NULL, NULL),
(5, 'Barney Stinson', '2021-07-24', '2021-08-07', 0, 0, 0, NULL, NULL, NULL);

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
  `patient_picture` blob DEFAULT NULL,
  `patient_email` varchar(255) NOT NULL,
  PRIMARY KEY (`patient_account_id`),
  UNIQUE KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_account`
--

INSERT INTO `patient_account` (`patient_account_id`, `patient_id`, `patient_username`, `patient_password`, `patient_picture`, `patient_email`) VALUES
(1, 1, 'TedMosby', 'iGetVaxAndFreeDonat', NULL, 'theodoremosby@gmail.com'),
(2, 2, 'EricksenM', 'iGetVaxAndGetDiscount', NULL, 'theodoremosby@gmail.com'),
(3, 3, 'LilAldrin', 'iGetVaxAndGetEcoBag', NULL, 'theodoremosby@gmail.com'),
(4, 4, 'RobinSparkles', 'iGetVaxAndGotErectileDysfunction', NULL, 'theodoremosby@gmail.com'),
(5, 5, 'SwarleyB', 'iGetVaxAndStillGotCovid', NULL, 'theodoremosby@gmail.com');

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
  `patient_category_number` int(11) NOT NULL,
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

INSERT INTO `patient_details` (`patient_id`, `patient_first_name`, `patient_last_name`, `patient_middle_name`, `patient_suffix`, `patient_priority_group`, `patient_category_id`, `patient_category_number`, `patient_house_address`, `patient_barangay_address`, `patient_CM_address`, `patient_province`, `patient_region`, `patient_birthdate`, `patient_age`, `patient_gender`, `patient_contact_number`, `patient_occupation`, `Archived`) VALUES
(1, 'Theodore', 'Mosby', 'Evelyn', NULL, 'A1: Health Care Workers', 'Other ID', 2191057, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0),
(2, 'Marshall', 'Ericksen', NULL, NULL, 'A2: Senior Citizens', 'Other ID', 2191057, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0),
(3, 'Lili', 'Ericksen', 'Aldrin', NULL, 'A3: Adult with Comorbidity', 'Other ID', 2191057, '75-B Lot 4 Block 5', 'Irisan', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0),
(4, 'Robin', 'Scherbatsky', NULL, NULL, 'A4: Frontline Personnel in Essential Sector', 'Other ID', 2191057, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 1),
(5, 'Barney', 'Stinson', NULL, NULL, 'A5: Indigent Population', 'Other ID', 2191057, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_drive`
--

DROP TABLE IF EXISTS `patient_drive`;
CREATE TABLE IF NOT EXISTS `patient_drive` (
  `patient_id` int(11) NOT NULL,
  `drive_id` int(11) NOT NULL,
  `vaccine_batch_id` int(11) NOT NULL,
  KEY `patient_id` (`patient_id`),
  KEY `drive_id` (`drive_id`),
  KEY `vaccine_batch_id` (`vaccine_batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_drive`
--

INSERT INTO `patient_drive` (`patient_id`, `drive_id`, `vaccine_batch_id`) VALUES
(1, 1, 4),
(2, 2, 2),
(3, 3, 1),
(4, 4, 3),
(5, 5, 5);

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
  `stubs` int(11) NOT NULL,
  `priority_group` varchar(255) NOT NULL,
  `Archived` int(1) DEFAULT NULL,
  PRIMARY KEY (`drive_id`),
  KEY `vaccination_site_id` (`vaccination_site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccination_drive`
--

INSERT INTO `vaccination_drive` (`drive_id`, `vaccination_site_id`, `vaccination_date`, `stubs`, `priority_group`, `Archived`) VALUES
(1, 1, '2021-07-30', 1000, 'A1: Health Care Workers', 0),
(2, 2, '2021-07-30', 800, 'A3: Adult with Comorbidity', 0),
(3, 3, '2021-07-30', 700, 'A4: Frontline Personnel in Essential Sector', 0),
(4, 4, '2021-07-30', 1000, 'A2: Senior Citizens', 0),
(5, 5, '2021-07-30', 500, 'A1: Health Care Workers', 0),
(6, 3, '2021-09-21', 1500, 'A5: Indigent Population', 1);

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
-- Table structure for table `vaccine_deployment`
--

DROP TABLE IF EXISTS `vaccine_deployment`;
CREATE TABLE IF NOT EXISTS `vaccine_deployment` (
  `drive_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  KEY `drive_id` (`drive_id`),
  KEY `vaccine_id` (`vaccine_id`)
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
(6, 3);

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
-- Constraints for table `barangay`
--
ALTER TABLE `barangay`
  ADD CONSTRAINT `barangay_ibfk_1` FOREIGN KEY (`health_district_id`) REFERENCES `health_district` (`health_district_id`);

--
-- Constraints for table `barangay_stubs`
--
ALTER TABLE `barangay_stubs`
  ADD CONSTRAINT `barangay_stubs_ibfk_1` FOREIGN KEY (`barangay_id`) REFERENCES `barangay` (`barangay_id`),
  ADD CONSTRAINT `barangay_stubs_ibfk_2` FOREIGN KEY (`drive_id`) REFERENCES `vaccination_drive` (`drive_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `barangay_id` FOREIGN KEY (`barangay_id`) REFERENCES `barangay` (`barangay_id`);

--
-- Constraints for table `employee_account`
--
ALTER TABLE `employee_account`
  ADD CONSTRAINT `employee_account_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `health_district_drives`
--
ALTER TABLE `health_district_drives`
  ADD CONSTRAINT `health_district_drives_ibfk_1` FOREIGN KEY (`drive_id`) REFERENCES `vaccination_drive` (`drive_id`),
  ADD CONSTRAINT `health_district_drives_ibfk_2` FOREIGN KEY (`health_district_id`) REFERENCES `health_district` (`health_district_id`);

--
-- Constraints for table `medical_background`
--
ALTER TABLE `medical_background`
  ADD CONSTRAINT `medical_background_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_first_vaccinator` FOREIGN KEY (`first_dose_vaccinator`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `patient_second_vaccinator` FOREIGN KEY (`second_dose_vaccinator`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `patient_account`
--
ALTER TABLE `patient_account`
  ADD CONSTRAINT `patient_account_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON UPDATE CASCADE;

--
-- Constraints for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD CONSTRAINT `patient_id, patient_first_name` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON UPDATE CASCADE;

--
-- Constraints for table `patient_drive`
--
ALTER TABLE `patient_drive`
  ADD CONSTRAINT `drive_id_fk` FOREIGN KEY (`drive_id`) REFERENCES `vaccination_drive` (`drive_id`),
  ADD CONSTRAINT `patient_id_fk` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `vaccine_batch_id_fk` FOREIGN KEY (`vaccine_batch_id`) REFERENCES `vaccine_batch` (`vaccine_batch_id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `vaccination_drive`
--
ALTER TABLE `vaccination_drive`
  ADD CONSTRAINT `vaccination_drive_ibfk_1` FOREIGN KEY (`vaccination_site_id`) REFERENCES `vaccination_sites` (`vaccination_site_id`);

--
-- Constraints for table `vaccine_batch`
--
ALTER TABLE `vaccine_batch`
  ADD CONSTRAINT `vaccine_batch_ibfk_1` FOREIGN KEY (`vaccine_lot_id`) REFERENCES `vaccine_lot` (`vaccine_lot_id`),
  ADD CONSTRAINT `vaccine_batch_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccine` (`vaccine_id`);

--
-- Constraints for table `vaccine_deployment`
--
ALTER TABLE `vaccine_deployment`
  ADD CONSTRAINT `vaccine_deployment_ibfk_1` FOREIGN KEY (`drive_id`) REFERENCES `vaccination_drive` (`drive_id`),
  ADD CONSTRAINT `vaccine_deployment_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccine` (`vaccine_id`);

--
-- Constraints for table `vaccine_information`
--
ALTER TABLE `vaccine_information`
  ADD CONSTRAINT `vaccine_information_ibfk_1` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccine` (`vaccine_id`);

--
-- Constraints for table `vaccine_lot`
--
ALTER TABLE `vaccine_lot`
  ADD CONSTRAINT `vaccine_lot_ibfk_1` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccine` (`vaccine_id`),
  ADD CONSTRAINT `vaccine_lot_ibfk_2` FOREIGN KEY (`employee_account_id`) REFERENCES `employee` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
