-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 28, 2021 at 05:59 AM
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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangay`
--
ALTER TABLE `barangay`
  ADD CONSTRAINT `barangay_ibfk_1` FOREIGN KEY (`health_district_id`) REFERENCES `health_district` (`health_district_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
