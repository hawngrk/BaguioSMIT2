-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2021 at 02:48 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_first_name` varchar(255) NOT NULL,
  `employee_last_name` varchar(255) NOT NULL,
  `employee_middle_name` varchar(255) NOT NULL,
  `employee_suffix` varchar(255) NOT NULL,
  `employee_role` varchar(255) NOT NULL,
  `employee_contact_number` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `employee_picture` blob NOT NULL,
  PRIMARY KEY (`employee_account_id`),
  UNIQUE KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `health_district`
--

DROP TABLE IF EXISTS `health_district`;
CREATE TABLE IF NOT EXISTS `health_district` (
  `health_disctrict_id` int(255) NOT NULL AUTO_INCREMENT,
  `health_district_name` varchar(255) NOT NULL,
  PRIMARY KEY (`health_disctrict_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `other_commorbidity` varchar(255) NOT NULL,
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` int(255) NOT NULL AUTO_INCREMENT,
  `patient_full_name` varchar(255) NOT NULL,
  `date_of_first_dosage` date NOT NULL,
  `date_of_second_dosage` date NOT NULL,
  `vaccination_status` varchar(255) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_account`
--

DROP TABLE IF EXISTS `patient_account`;
CREATE TABLE IF NOT EXISTS `patient_account` (
  `patient_account_id` int(255) NOT NULL AUTO_INCREMENT,
  `patient_id` int(255) NOT NULL,
  `patient_username` varchar(255) NOT NULL,
  `patient_password` varchar(255) NOT NULL,
  `patient_picture` blob NOT NULL,
  `patient_email` varchar(255) NOT NULL,
  PRIMARY KEY (`patient_account_id`),
  UNIQUE KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

DROP TABLE IF EXISTS `patient_details`;
CREATE TABLE IF NOT EXISTS `patient_details` (
  `patient_details_id` int(255) NOT NULL,
  `patient_first_name` varchar(255) NOT NULL,
  `patient_last_name` varchar(255) NOT NULL,
  `patient_middle_name` varchar(255) NOT NULL,
  `patient_suffix` varchar(255) NOT NULL,
  `patient_category` varchar(255) NOT NULL,
  `patient_address` varchar(255) NOT NULL,
  `patient_birthdate` date NOT NULL,
  `patient_age` int(11) NOT NULL,
  `patient_gender` varchar(255) NOT NULL,
  `patient_contact_number` int(255) NOT NULL,
  `patient_occupation` varchar(255) NOT NULL,
  UNIQUE KEY `patient_id_patient_first_name` (`patient_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(255) NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `report_details` varchar(255) NOT NULL,
  `vaccine_symptoms_reported` varchar(255) NOT NULL,
  `COVID19_symptoms_reported` varchar(255) NOT NULL,
  `date_last_out` date NOT NULL,
  `date_reported` date NOT NULL,
  `report_verified` varchar(255) NOT NULL,
  PRIMARY KEY (`report_id`),
  UNIQUE KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_drive`
--

DROP TABLE IF EXISTS `vaccination_drive`;
CREATE TABLE IF NOT EXISTS `vaccination_drive` (
  `drive_id` int(255) NOT NULL AUTO_INCREMENT,
  `health_district_id` int(255) NOT NULL,
  `vaccination_location` varchar(255) NOT NULL,
  `vaccination_date` date NOT NULL,
  PRIMARY KEY (`drive_id`),
  KEY `health_district_id` (`health_district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

DROP TABLE IF EXISTS `vaccine`;
CREATE TABLE IF NOT EXISTS `vaccine` (
  `vaccine_id` int(255) NOT NULL AUTO_INCREMENT,
  `vaccine_name` varchar(255) NOT NULL,
  `vaccine_desc` varchar(255) NOT NULL,
  `vaccine_type` varchar(255) NOT NULL,
  `vaccine_efficacy` int(255) NOT NULL,
  `vaccine_lifespan` int(255) NOT NULL,
  PRIMARY KEY (`vaccine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `date_manufactured` date NOT NULL,
  `date_of_expiration` date NOT NULL,
  PRIMARY KEY (`vaccine_batch_id`),
  KEY `vaccine_lot_id` (`vaccine_lot_id`),
  KEY `vaccine_id` (`vaccine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_information`
--

DROP TABLE IF EXISTS `vaccine_information`;
CREATE TABLE IF NOT EXISTS `vaccine_information` (
  `vaccine_information_id` int(255) NOT NULL,
  `vaccine_manufacturer` int(255) NOT NULL,
  `vaccine_description` varchar(255) NOT NULL,
  `vaccine_dosage_required` int(255) NOT NULL,
  `vaccine_dosage_interval` varchar(255) NOT NULL,
  `vaccine_minimum_temperature` int(255) NOT NULL,
  `vaccine_maximum_temperature` int(255) NOT NULL,
  UNIQUE KEY `vaccine_id` (`vaccine_information_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`vaccine_lot_id`),
  KEY `vaccine_id` (`vaccine_id`),
  KEY `employee_account_id` (`employee_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD CONSTRAINT `medical_background_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `patient_account`
--
ALTER TABLE `patient_account`
  ADD CONSTRAINT `patient_account_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON UPDATE CASCADE;

--
-- Constraints for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD CONSTRAINT `patient_id, patient_first_name` FOREIGN KEY (`patient_details_id`) REFERENCES `patient` (`patient_id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `vaccine_information_ibfk_1` FOREIGN KEY (`vaccine_information_id`) REFERENCES `vaccine` (`vaccine_id`);

--
-- Constraints for table `vaccine_lot`
--
ALTER TABLE `vaccine_lot`
  ADD CONSTRAINT `vaccine_lot_ibfk_1` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccine_batch` (`vaccine_id`),
  ADD CONSTRAINT `vaccine_lot_ibfk_2` FOREIGN KEY (`employee_account_id`) REFERENCES `employee` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
