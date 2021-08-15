-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 15, 2021 at 01:15 PM
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
-- Table structure for table `barangay`
--

DROP TABLE IF EXISTS `barangay`;
CREATE TABLE IF NOT EXISTS `barangay` (
  `barangay_id` int(11) NOT NULL AUTO_INCREMENT,
  `health_district_id` int(11) NOT NULL,
  `barangay_name` varchar(255) NOT NULL,
  PRIMARY KEY (`barangay_id`),
  KEY `health_district_id` (`health_district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`barangay_id`, `health_district_id`, `barangay_name`) VALUES
(1, 8, 'San Luis Village'),
(2, 8, 'San Rogue Village'),
(3, 8, 'Irisan'),
(4, 15, 'Upper Dagsian'),
(5, 15, 'Lower Dagsian'),
(6, 15, 'Scout Barrio');

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
  `employee_contact_number` char(11) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_first_name`, `employee_last_name`, `employee_middle_name`, `employee_suffix`, `employee_role`, `employee_contact_number`) VALUES
(1, 'Chandler', 'Bing', 'Muriel', NULL, 'Transponster', '09217532942'),
(2, 'Monica', 'Bing', 'Geller', NULL, 'Transponster', '09217532942'),
(3, 'Ross', 'Geller', NULL, NULL, 'Transponster', '09217532942'),
(4, 'Joseph', 'Tribbiani', 'Francis', 'Jr.', 'Transponster', '09217532942'),
(5, 'Rachel', 'Geller', 'Green', NULL, 'Transponster', '09217532942'),
(6, 'Phoebe', 'Buffay', NULL, NULL, 'Transponster', '09217532942');

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
  `health_disctrict_id` int(11) NOT NULL AUTO_INCREMENT,
  `health_district_name` varchar(255) NOT NULL,
  `hd_contanct_number` char(11) NOT NULL,
  PRIMARY KEY (`health_disctrict_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `health_district`
--

INSERT INTO `health_district` (`health_disctrict_id`, `health_district_name`, `hd_contanct_number`) VALUES
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
  UNIQUE KEY `patient_id` (`patient_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_background`
--

INSERT INTO `medical_background` (`patient_id`, `skin_allergy`, `food_allergy`, `medication_allergy`, `insect_allergy`, `pollen_allergy`, `bite_allergy`, `latex_allergy`, `mold_allergy`, `pet_allergy`, `hypertension`, `heart_disease`, `kidney_disease`, `diabetes_mellitus`, `bronchial_asthma`, `immunodeficiency`, `cancer`, `other_commorbidity`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'NULL'),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'NULL'),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'NULL'),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'NULL'),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'NULL');

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
  `vaccination_status` varchar(255) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_full_name`, `date_of_first_dosage`, `date_of_second_dosage`, `vaccination_status`) VALUES
(1, 'Theodore Evelyn Mosby', '2021-07-20', '2021-08-03', 'Not Vaccinated'),
(2, 'Marshall Ericksen', '2021-07-12', '2021-07-26', 'Completed 1st dose'),
(3, 'Lili Aldrin', '2021-06-28', '2021-07-12', 'Completed 2nd dose'),
(4, 'Robin Scherbatsky ', '2021-07-01', '2021-07-15', 'Completed 1st dose'),
(5, 'Barney Stinson', '2021-07-24', '2021-08-07', 'Not vaccinated');

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
  UNIQUE KEY `patient_id` (`patient_id`),
  UNIQUE KEY `patient_username` (`patient_username`),
  UNIQUE KEY `patient_email` (`patient_email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_account`
--

INSERT INTO `patient_account` (`patient_account_id`, `patient_id`, `patient_username`, `patient_password`, `patient_picture`, `patient_email`) VALUES
(1, 1, 'TedMosby', 'iGetVaxAndFreeDonat', NULL, 'theodoremosby@gmail.com'),
(2, 2, 'EricksenM', 'iGetVaxAndGetDiscount', NULL, 'MEricksen@gmail.com'),
(3, 3, 'LilAldrin', 'iGetVaxAndGetEcoBag', NULL, 'lilyaldrinericksen@gmail.com'),
(4, 4, 'RobinSparkles', 'iGetVaxAndGotErectileDysfunction', NULL, 'scherbatsky_robin@gmail.com'),
(5, 5, 'SwarleyB', 'iGetVaxAndStillGotCovid', NULL, 'swarleybarney@gmail.com');

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
  UNIQUE KEY `patient_id_patient_first_name` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`patient_id`, `patient_first_name`, `patient_last_name`, `patient_middle_name`, `patient_suffix`, `patient_priority_group`, `patient_category_id`, `patient_category_number`, `patient_house_address`, `patient_barangay_address`, `patient_CM_address`, `patient_province`, `patient_region`, `patient_birthdate`, `patient_age`, `patient_gender`, `patient_contact_number`, `patient_occupation`) VALUES
(1, 'Theodore', 'Mosby', 'Evelyn', NULL, 'A1: Health Care Workers', 'Other ID', 2191057, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse'),
(2, 'Marshall', 'Ericksen', NULL, NULL, 'A2: Senior Citizens', 'Other ID', 2191057, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse'),
(3, 'Lili', 'Ericksen', 'Aldrin', NULL, 'A3: Adult with Comorbidity', 'Other ID', 2191057, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse'),
(4, 'Robin', 'Scherbatsky', NULL, NULL, 'A4: Frontline Personnel in Essential Sector', 'Other ID', 2191057, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse'),
(5, 'Barney', 'Stinson', NULL, NULL, 'A5: Indigent Population', 'Other ID', 2191057, '75-B Lot 4 Block 5', 'San Luis Village', 'Baguio City', 'Benguet', 'Cordillera Administrative Region', '1999-04-01', 21, 'Male', '09216357642', 'Nurse');

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
  `date_reported` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report_status` char(20) NOT NULL,
  PRIMARY KEY (`report_id`),
  KEY `patient_id` (`patient_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `patient_id`, `report_type`, `report_details`, `vaccine_symptoms_reported`, `COVID19_symptoms_reported`, `date_last_out`, `date_reported`, `report_status`) VALUES
(1, 1, 'Smit+ App', 'I\'m currently experiencing other side effects after vaccination, specifically vomiting and diarrhea. ', 'Fever, Headache, Tiredness, Vomiting, Diarrhea', 'Vomiting, Diarrhea', '2021-07-13', '2021-07-13 16:00:00', 'Verified'),
(2, 2, 'SMS', 'I\'m experiencing bothering symptoms, such as diarrhea, vomiting and headaches.', '', '', '2021-07-10', '2021-07-12 16:00:00', 'Pending'),
(3, 3, 'Smit+ App', '...', 'sick', 'sick', '2021-07-13', '2021-07-13 16:00:00', 'Invalidated'),
(4, 4, 'Smit+ App', 'Ako ay nilalagnat, parang pagod palagi, at walang pang lasa', '', 'Fever, Tiredness, Loss of taste', '2021-07-13', '2021-07-13 16:00:00', 'Verified'),
(5, 5, 'SMS', 'After vaccination, I noticed that I feel some side effects, such as tiredness, headache, lost of taste', '', '', '2021-07-13', '2021-07-13 16:00:00', 'Pending'),
(6, 1, 'Smit+ App', 'The Quick Browner Fox Jumps Over ', 'a:6:{i:0;s:7:\"Chills,\";i:1;s:1:\",\";i:2;s:12:\"Muscle pain,\";i:3;s:7:\"Nausea,\";i:4;s:10:\"Tiredness,\";i:5;s:31:\"Other:Eye Redness, Stomach Pain\";}', 'a:10:{i:0;s:6:\"Fever,\";i:1;s:10:\"Dry Cough,\";i:2;s:8:\"Fatigue,\";i:3;s:16:\"Aches and Pains,\";i:4;s:11:\"Runny Rose,\";i:5;s:12:\"Sore throat,\";i:6;s:20:\"Shortness of breath,\";i:7;s:9:\"Diarrhea,\";i:8;s:1:\",\";i:9;s:23:\"Loss of smell and taste\";}', '2021-08-05', '2021-08-10 07:49:48', 'Pending'),
(7, 1, 'Smit+ App', 'The Quick Browner Fox Jumps Over ', 'a:6:{i:0;s:7:\"Chills,\";i:1;s:1:\",\";i:2;s:12:\"Muscle pain,\";i:3;s:7:\"Nausea,\";i:4;s:10:\"Tiredness,\";i:5;s:31:\"Other:Eye Redness, Stomach Pain\";}', 'a:10:{i:0;s:6:\"Fever,\";i:1;s:10:\"Dry Cough,\";i:2;s:8:\"Fatigue,\";i:3;s:16:\"Aches and Pains,\";i:4;s:11:\"Runny Rose,\";i:5;s:12:\"Sore throat,\";i:6;s:20:\"Shortness of breath,\";i:7;s:9:\"Diarrhea,\";i:8;s:1:\",\";i:9;s:23:\"Loss of smell and taste\";}', '2021-08-01', '2021-08-10 07:51:08', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_drive`
--

DROP TABLE IF EXISTS `vaccination_drive`;
CREATE TABLE IF NOT EXISTS `vaccination_drive` (
  `drive_id` int(11) NOT NULL AUTO_INCREMENT,
  `health_district_id` int(11) NOT NULL,
  `vaccination_location` varchar(255) NOT NULL,
  `vaccination_date` date NOT NULL,
  PRIMARY KEY (`drive_id`),
  KEY `health_district_id` (`health_district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccination_drive`
--

INSERT INTO `vaccination_drive` (`drive_id`, `health_district_id`, `vaccination_location`, `vaccination_date`) VALUES
(1, 4, 'Aurora Hill Covered Court', '2021-07-30'),
(2, 15, 'Public Park', '2021-07-30'),
(3, 7, 'Barangay Hall', '2021-07-30'),
(4, 9, 'Health Center', '2021-07-30'),
(5, 6, 'Covered Court', '2021-07-30');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`vaccine_id`, `vaccine_name`, `vaccine_type`, `vaccine_efficacy`, `vaccine_lifespan_in_months`) VALUES
(1, 'BNT162b2', 'mRNA', 95, 1),
(2, 'mRNA-1273', 'mRNA', 95, 6),
(3, 'JNJ-78436735', 'Viral Vector', 95, 3),
(4, 'ChAdOx1 nCoV-19', 'Viral Vector', 95, 6),
(5, 'Coronovac', 'Inactivated Virus', 100, 24);

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
  `date_stored` date NOT NULL,
  PRIMARY KEY (`vaccine_batch_id`),
  KEY `vaccine_lot_id` (`vaccine_lot_id`),
  KEY `vaccine_id` (`vaccine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccine_batch`
--

INSERT INTO `vaccine_batch` (`vaccine_batch_id`, `vaccine_lot_id`, `vaccine_id`, `vaccine_quantity`, `date_stored`) VALUES
(1, 3, 5, 5000, '2021-07-14'),
(2, 3, 5, 5000, '2021-07-14'),
(3, 3, 5, 5000, '2021-07-14'),
(4, 3, 5, 5000, '2021-07-14'),
(5, 3, 5, 5000, '2021-07-14'),
(6, 1, 2, 1000, '2021-08-04'),
(7, 2, 1, 2000, '2021-08-01'),
(8, 4, 3, 1000, '2021-08-01'),
(9, 5, 4, 5000, '2021-07-01');

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
(5, 3);

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
(5, 'Coronavac', 'Sinovac Biotech Ltd. CoronaVac COVID-19 Vaccine is based on an inactivated pathogen made by growing the whole virus in a lab and then killing it. Sinovac\'s strategy contrasts with many other COVID-19 vaccine development efforts involving their vaccine candidates\' RNA.', 2, 2, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_lot`
--

DROP TABLE IF EXISTS `vaccine_lot`;
CREATE TABLE IF NOT EXISTS `vaccine_lot` (
  `vaccine_lot_id` int(11) NOT NULL AUTO_INCREMENT,
  `vaccine_id` int(11) NOT NULL,
  `employee_account_id` int(11) NOT NULL,
  `vaccine_batch_quantity` int(11) NOT NULL,
  `date_vaccine_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_manufactured` date NOT NULL,
  `date_of_expiration` date NOT NULL,
  PRIMARY KEY (`vaccine_lot_id`),
  KEY `vaccine_id` (`vaccine_id`),
  KEY `employee_account_id` (`employee_account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccine_lot`
--

INSERT INTO `vaccine_lot` (`vaccine_lot_id`, `vaccine_id`, `employee_account_id`, `vaccine_batch_quantity`, `date_vaccine_added`, `date_manufactured`, `date_of_expiration`) VALUES
(1, 2, 1, 1, '2021-07-14 15:33:41', '2021-08-02', '2022-08-08'),
(2, 1, 4, 1, '2021-07-14 15:33:41', '2021-07-06', '2022-07-01'),
(3, 5, 1, 5, '2021-07-14 15:33:41', '2021-05-08', '2022-05-04'),
(4, 3, 4, 1, '2021-07-14 15:33:41', '2021-06-08', '2022-06-01'),
(5, 4, 4, 1, '2021-07-14 15:33:41', '2021-06-01', '2021-06-03');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangay`
--
ALTER TABLE `barangay`
  ADD CONSTRAINT `barangay_ibfk_1` FOREIGN KEY (`health_district_id`) REFERENCES `health_district` (`health_disctrict_id`);

--
-- Constraints for table `employee_account`
--
ALTER TABLE `employee_account`
  ADD CONSTRAINT `employee_account_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `medical_background`
--
ALTER TABLE `medical_background`
  ADD CONSTRAINT `medical_background_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `vaccination_drive_ibfk_1` FOREIGN KEY (`health_district_id`) REFERENCES `health_district` (`health_disctrict_id`);

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
