-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2021 at 03:22 AM
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

CREATE TABLE `activity_logs` (
  `log_id` int(11) NOT NULL,
  `log_entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `employee_id` int(11) NOT NULL,
  `employee_role` varchar(255) NOT NULL,
  `log_type` varchar(255) NOT NULL,
  `log_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`log_id`, `log_entry_date`, `employee_id`, `employee_role`, `log_type`, `log_description`) VALUES
(222, '2021-11-21 15:28:29', 7, 'EIR', 'Login', 'Successfully logged in'),
(223, '2021-11-21 15:54:49', 2, 'HSO', 'Login', 'Successfully logged in'),
(224, '2021-11-21 15:57:54', 2, 'HSO', 'Logout', 'Successfully logged out'),
(225, '2021-11-21 15:58:11', 5, 'Screening', 'Login', 'Successfully logged in'),
(226, '2021-11-21 16:03:59', 5, 'Screening', 'Logout', 'Successfully logged out'),
(227, '2021-11-21 16:10:58', 6, 'Mayor\'s Office', 'Login', 'Successfully logged in'),
(228, '2021-11-21 16:43:27', 6, 'Mayor\'s Office', 'Logout', 'Successfully logged out'),
(229, '2021-11-21 16:43:52', 7, 'EIR', 'Login', 'Successfully logged in'),
(230, '2021-11-21 16:46:19', 7, 'EIR', 'Logout', 'Successfully logged out'),
(231, '2021-11-21 16:46:43', 6, 'Mayor\'s Office', 'Login', 'Successfully logged in'),
(232, '2021-11-21 16:47:04', 6, 'Mayor\'s Office', 'Logout', 'Successfully logged out'),
(233, '2021-11-21 16:47:13', 7, 'EIR', 'Login', 'Successfully logged in'),
(234, '2021-11-21 16:57:42', 7, 'EIR', 'Upload', 'Uploaded patient csv file'),
(235, '2021-11-21 17:23:32', 7, 'EIR', 'Logout', 'Successfully logged out'),
(236, '2021-11-21 17:23:40', 2, 'HSO', 'Login', 'Successfully logged in'),
(237, '2021-11-21 17:45:26', 2, 'HSO', 'Logout', 'Successfully logged out'),
(238, '2021-11-21 17:45:33', 1, 'Barangay', 'Login', 'Successfully logged in'),
(239, '2021-11-21 17:47:30', 1, 'Barangay', 'Logout', 'Successfully logged out'),
(240, '2021-11-21 18:22:31', 2, 'HSO', 'Login', 'Successfully logged in'),
(241, '2021-11-21 18:24:37', 2, 'HSO', 'Logout', 'Successfully logged out'),
(242, '2021-11-21 18:24:45', 3, 'SSD', 'Login', 'Successfully logged in'),
(243, '2021-11-21 18:54:33', 1, 'Barangay', 'Login', 'Successfully logged in'),
(244, '2021-11-21 18:55:00', 1, 'Barangay', 'Logout', 'Successfully logged out'),
(245, '2021-11-21 18:55:05', 3, 'SSD', 'Login', 'Successfully logged in'),
(246, '2021-11-21 19:04:20', 2, 'HSO', 'Login', 'Successfully logged in'),
(247, '2021-11-21 19:04:30', 2, 'HSO', 'Logout', 'Successfully logged out'),
(248, '2021-11-21 19:04:38', 2, 'HSO', 'Login', 'Successfully logged in'),
(249, '2021-11-21 19:09:55', 2, 'HSO', 'Logout', 'Successfully logged out'),
(250, '2021-11-21 19:13:09', 3, 'SSD', 'Logout', 'Successfully logged out'),
(251, '2021-11-21 19:13:16', 1, 'Barangay', 'Login', 'Successfully logged in'),
(252, '2021-11-21 19:13:44', 1, 'Barangay', 'Logout', 'Successfully logged out'),
(253, '2021-11-21 19:13:50', 3, 'SSD', 'Login', 'Successfully logged in'),
(254, '2021-11-21 19:20:27', 3, 'SSD', 'Logout', 'Successfully logged out'),
(255, '2021-11-21 19:20:37', 2, 'HSO', 'Login', 'Successfully logged in'),
(256, '2021-11-21 19:48:49', 2, 'HSO', 'Logout', 'Successfully logged out'),
(257, '2021-11-21 19:48:59', 1, 'Barangay', 'Login', 'Successfully logged in'),
(258, '2021-11-21 20:10:59', 1, 'Barangay', 'Logout', 'Successfully logged out'),
(259, '2021-11-21 20:11:07', 3, 'SSD', 'Login', 'Successfully logged in'),
(260, '2021-11-21 20:11:48', 2, 'HSO', 'Login', 'Successfully logged in'),
(261, '2021-11-21 20:21:12', 3, 'SSD', 'Logout', 'Successfully logged out'),
(262, '2021-11-21 20:21:21', 1, 'Barangay', 'Login', 'Successfully logged in'),
(263, '2021-11-21 20:23:55', 1, 'Barangay', 'Logout', 'Successfully logged out'),
(264, '2021-11-21 20:24:01', 3, 'SSD', 'Login', 'Successfully logged in');

-- --------------------------------------------------------

--
-- Table structure for table `allocated_drive`
--

CREATE TABLE `allocated_drive` (
  `drive_id` int(11) NOT NULL,
  `barangay_id` int(11) NOT NULL,
  `allocation1` longtext COLLATE utf8_unicode_ci NOT NULL,
  `allocation2` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `allocated_drive`
--

INSERT INTO `allocated_drive` (`drive_id`, `barangay_id`, `allocation1`, `allocation2`) VALUES
(27, 113, '\n                            <thead>\n                                <tr>\n                                    <th> Vaccines </th><th> A1 </th>\n                                </tr>\n                            </thead>\n                <tbody>            <tr>\n                                <th scope=\"row\"> Pfizer/BioNTech</th><td><input class=\"A1: Health Care Workers\" type=\"text\" onchange=\"countStubs(this.value, this.oldValue, this, &quot;Pfizer/BioNTech&quot;); this.oldValue = this.value\" oninput=\"this.value = this.value.replace(/[^0-9.\\%]/g, &quot;&quot;).replace(/(..*)./g, &quot;$1&quot;);\" size=\"1\" value=\"1\" disabled=\"true\"><span id=\"percent\" style=\"display: none\">%</span></td></tr>             \n             </tbody>\n             ', '\n                            <thead>\n                                <tr>\n                                    <th> Vaccines </th>\n                                    <th> Number of Stubs </th>\n                                </tr>\n                            </thead>\n                <tbody><tr>\n                                <th scope=\"row\"> Novavax</th>\n                                <td><input type=\"text\" onchange=\"countStubs2(this.value, this.oldValue, this, &quot;Novavax&quot;); this.oldValue = this.value\" oninput=\"this.value = this.value.replace(/[^0-9.\\%]/g, &quot;&quot;).replace(/(..*)./g, &quot;$1&quot;);\" size=\"1\" value=\"1\" disabled=\"true\"><span id=\"percent\" style=\"display: none\">%</span></td>\n                         </tr>             \n             </tbody>\n             '),
(27, 114, '\n                            <thead>\n                                <tr>\n                                    <th> Vaccines </th><th> A1 </th>\n                                </tr>\n                            </thead>\n                <tbody>            <tr>\n                                <th scope=\"row\"> Pfizer/BioNTech</th><td><input class=\"A1: Health Care Workers\" type=\"text\" onchange=\"countStubs(this.value, this.oldValue, this, &quot;Pfizer/BioNTech&quot;); this.oldValue = this.value\" oninput=\"this.value = this.value.replace(/[^0-9.\\%]/g, &quot;&quot;).replace(/(..*)./g, &quot;$1&quot;);\" size=\"1\" value=\"0\" disabled=\"true\"><span id=\"percent\" style=\"display: none\">%</span></td></tr>             \n             </tbody>\n             ', '\n                            <thead>\n                                <tr>\n                                    <th> Vaccines </th>\n                                    <th> Number of Stubs </th>\n                                </tr>\n                            </thead>\n                <tbody><tr>\n                                <th scope=\"row\"> Novavax</th>\n                                <td><input type=\"text\" onchange=\"countStubs2(this.value, this.oldValue, this, &quot;Novavax&quot;); this.oldValue = this.value\" oninput=\"this.value = this.value.replace(/[^0-9.\\%]/g, &quot;&quot;).replace(/(..*)./g, &quot;$1&quot;);\" size=\"1\" value=\"0\" disabled=\"true\"><span id=\"percent\" style=\"display: none\">%</span></td>\n                         </tr>             \n             </tbody>\n             ');

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
  `ROAP` int(11) NOT NULL,
  `A3_Pedia` int(11) NOT NULL,
  `ROPP` int(11) NOT NULL,
  `second_dose` int(11) NOT NULL,
  `notif_opened` int(1) NOT NULL,
  `sent_stubs` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangay_stubs`
--

INSERT INTO `barangay_stubs` (`barangay_id`, `drive_id`, `A1_stubs`, `A2_stubs`, `A3_stubs`, `A4_stubs`, `A5_stubs`, `ROAP`, `A3_Pedia`, `ROPP`, `second_dose`, `notif_opened`, `sent_stubs`) VALUES
(113, 27, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(114, 27, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(1, 'Chandler', 'Bing', 'Muriel', NULL, 'Barangay', 113, '09217532942'),
(2, 'Monica', 'Bing', 'Geller', NULL, 'HSO', NULL, '09217532942'),
(3, 'Ross', 'Geller', NULL, NULL, 'SSD', NULL, '09217532942'),
(4, 'Joseph', 'Tribbiani', 'Francis', 'Jr.', 'Monitoring', NULL, '09217532942'),
(5, 'Rachel', 'Geller', 'Green', NULL, 'Screening', NULL, '09217532942'),
(6, 'Phoebe', 'Buffay', NULL, NULL, 'Mayor\'s Office', NULL, '09217532942'),
(7, 'James Michael', 'Tyler', NULL, NULL, 'EIR', NULL, '09643674543'),
(8, 'Krisha', 'Artbog', 'Macatulad', 'none', 'Mayor\'s Office', 9, '09534623523'),
(9, 'Jecelito', 'Batac', 'Artbog', 'jr', 'Vaccinator', 12, '09534623523'),
(10, 'Hassan', 'Bortag', 'Cruz', '', 'Vaccinator', 12, '9323464332'),
(11, 'Art', 'Bogues', '', '', 'Screening', 5, '9532324123'),
(12, 'Frankie', 'De donna', '', '', 'Monitoring', 6, '9773464542'),
(13, 'Dick', 'Grayson', 'Wayne', '', 'Vaccinator', 31, '9213465732'),
(14, 'Damian', 'Wayne', '', '', 'Mayor\'s Office', 8, '9083464332');

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
  `employee_picture` blob,
  `disabled` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_account`
--

INSERT INTO `employee_account` (`employee_account_id`, `employee_id`, `employee_username`, `employee_password`, `employee_account_type`, `employee_picture`, `disabled`) VALUES
(1, 1, 'employeeChandler', '$2y$10$0KYcxfbe/./5GmMe5wACreXslYxnUjYu1dfbT0teA3z0Ox.eWrNR2', 'Employee', NULL, 0),
(2, 2, 'employeeMonica', '$2y$10$nJQxcgx82/fVgbJUwBfhFOgYu6.bLPetbTCVg8.hEJigOGMVN5Sbe', 'Admin', NULL, 0),
(3, 3, 'employeeRoss', '$2y$10$CtcJbNJzobzRg1zQ5EOSFe9.NmVNabOMNgvSIFy8S1fUa4WmcbfIm', 'Employee', NULL, 0),
(4, 4, 'employeeJoseph', '$2y$10$H9kXw0D9droZJgbQv8PJK.zCU.pLgvjYfZZjB9s3jpxomUOTdJy5i', 'Employee', NULL, 0),
(5, 5, 'employeeRachel', '$2y$10$qo7wgN83bP16qdPq0mEVY.HVT9oaV86srAsDyPjySy3hSdD3IAYu2', 'Employee', NULL, 0),
(6, 6, 'employeeRegina', '$2y$10$.VBmCSuW3PobYiPJoulvweZ0KCm8nBV7Kf6lLxwdl0JmKrnNi5K2e', 'Admin', NULL, 0),
(7, 7, 'employeeGunther', '$2y$10$x3R9loc9XCXHiFKOtuA93uBK/sqIXJvGmJrrfko4cflJ6RhtEd23W', 'Employee', NULL, 0),
(8, 8, 'employeeKrisha', '$2y$10$L5gPkHKbg54ZTFWIDx5GhOln8P36cQ2s4iE4z3iM6BlaBAA4H/BwW', 'Employee', NULL, 0),
(9, 9, 'employeeJecelito', '$2y$10$4ZC/bwBF8j9Zl6YEUdPNZOyxKSaGHXyH0ILP9bhlIM8SWZjyhdMbu', 'Employee', NULL, 0),
(10, 10, 'employeeHassan', '$2y$10$FCXwS5Q2oN76GQL4Hrjm6eouqp9latX3I0F.EOFOrkhfqkfxzdayy', 'Employee', NULL, 0),
(11, 11, 'employeeArt', '$2y$10$31YhnydAKznKb5ZOiuYkXOTtIogjXC6LWZmh8z6aisdEk0KcnIlcq', 'Employee', NULL, 0),
(12, 12, 'employeeFrankie', '$2y$10$Bqq7Bdj3TkeQykOGq1yPT.KRE44E9tXnTC0IpDU6XuIZds9fEE5w.', 'Employee', NULL, 0),
(13, 13, 'employeeDick', '$2y$10$olcSfkbFGcGMiEfX9zih2eHeUCzH17gqpz0zBcipChtrdWeqS.ewS', 'Employee', NULL, 0),
(14, 14, 'employeeDamian', '$2y$10$lviPnkKsuWxOqy4KW0Zay.RALsobgpFJwkl6BaVWSfTZCjbajzzcW', 'Admin', NULL, 0);

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
(1, 'Asin Health Center', '09930711958', 0),
(2, 'Atab health Center', '09541549066', 0),
(3, 'Atok Trail Health Center', '09606891274', 0),
(4, 'Aurora Hill Health Center', '09088117675', 0),
(5, 'Campo Filipino Health Center', '09945392343', 0),
(6, 'City Camp Health Center', '09150522277', 1),
(7, 'Engineers Hill Health Center', '09562802014', 0),
(8, 'Irisan Health Center', '09562802014', 0),
(9, 'Loakan Health Center', '09562802014', 0),
(10, 'Lucban Health Center', '09492527664', 0),
(11, 'Mines View Health Center', '09545410136', 1),
(12, 'Pacdal Health Center', '09327633281', 1),
(13, 'Pinsao Health Center', '09327633281', 1),
(14, 'Quezon Hill Health Center', '09741945463', 1),
(15, 'Quirino Center', '09350692877', 1),
(16, 'Scount Barrio Center', '09262163933', 1);

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
(1, 2),
(1, 1),
(2, 4),
(2, 10),
(3, 14),
(3, 15),
(3, 3),
(4, 6),
(4, 4),
(4, 10),
(5, 16),
(5, 15),
(5, 11),
(5, 12),
(6, 11),
(6, 15),
(6, 9),
(7, 8),
(7, 9),
(7, 3),
(8, 6),
(9, 9),
(9, 11),
(9, 14),
(10, 3),
(10, 16),
(10, 12),
(11, 2),
(11, 10),
(11, 11),
(11, 4),
(12, 2),
(12, 9),
(13, 3),
(13, 8),
(13, 15),
(14, 4),
(14, 11),
(15, 1),
(15, 11),
(15, 16),
(15, 14),
(16, 4),
(16, 8),
(16, 9),
(17, 14),
(17, 2),
(17, 12),
(18, 2),
(18, 4),
(18, 3),
(19, 2),
(19, 11),
(19, 6),
(19, 15),
(20, 2),
(20, 10),
(21, 2),
(21, 11),
(21, 12),
(22, 10),
(22, 16),
(22, 6),
(23, 10),
(23, 15),
(23, 5),
(23, 2),
(24, 3),
(24, 9),
(24, 16),
(24, 11),
(25, 2),
(25, 10),
(25, 16),
(25, 6),
(26, 2),
(26, 12),
(26, 16),
(27, 1),
(28, 2),
(28, 9),
(29, 4),
(29, 1);

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
(1, 0, 1, 0, 0, 0, 0, 0, 0, 'None'),
(2, 1, 0, 0, 0, 0, 0, 1, 0, 'None'),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 'None'),
(6, 0, 1, 0, 0, 0, 1, 0, 0, ' '),
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
  `first_dose_vaccination` int(1) DEFAULT '0',
  `second_dose_vaccination` int(1) DEFAULT '0',
  `for_queue` int(1) DEFAULT '0',
  `notification` int(1) DEFAULT '0',
  `first_dose_vaccinator` int(11) DEFAULT '0',
  `second_dose_vaccinator` int(11) DEFAULT '0',
  `token` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_full_name`, `date_of_first_dosage`, `date_of_second_dosage`, `first_dose_vaccination`, `second_dose_vaccination`, `for_queue`, `notification`, `first_dose_vaccinator`, `second_dose_vaccinator`, `token`) VALUES
(1, 'Theodore Evelyn Mosby', '2021-10-12', NULL, 1, 0, 1, 0, NULL, NULL, 'fyf-sgNlQ_Kw1TddEd2s2j:APA91bF0BW9XKla9r-IWJ7tYZrmUUHgxX9CJpGuuRg1kyQgWiNHa9OFJLk_kt3mIT-QGqviIVWsuyRYwrZDRFTfDl8jccrGWVrmZ8JP8h9DAFiFtZmgOTrpX9-5Kyc_b-xThv9Ur8ozg'),
(2, 'Marshall Ericksen', NULL, NULL, 0, 0, 1, 0, NULL, NULL, 'cLFJPkuRT5OD8ffSAwaQlM:APA91bF_K89vpsHuiaAmFB5-Q573XhC9ZEzNz3CBGEgnXbMeamalTuBctHeAC1uxoXZqWLxmYsrMM8OllTqJ341qJL0851yyHyRnjhiBJVZfbXtTR1eMXY4jLD3y_0V4LlAq7UgZL3vQ'),
(3, 'Lili Aldrin', '2021-09-17', '2021-10-26', 1, 1, 0, 0, NULL, NULL, '0'),
(4, 'Robin Scherbatsky ', NULL, NULL, 1, 0, 1, 0, NULL, NULL, '0'),
(5, 'Barney Stinson', NULL, NULL, 1, 0, 0, 0, NULL, NULL, '0'),
(6, 'Gaviola, Adriel Miguel', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(7, 'Kit, Hudson Pasalo', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(8, 'Del-Ong, Kilrone Honkai', NULL, NULL, 1, 1, 0, NULL, NULL, NULL, '0'),
(9, 'Batac, Jecelito Artbog', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(10, 'Grey, Meredith  Pompeo', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(11, 'Yang, Cristina Oh', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(12, 'Karev, Alex Chambers', NULL, NULL, 1, 1, 0, NULL, NULL, NULL, '0'),
(13, 'Bacasen, Marissa Johnson', NULL, NULL, 1, 1, 0, NULL, NULL, NULL, '0'),
(14, 'Rafael, Eddie Lim Sr.', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(15, 'Johnson, Kryzzylle Anne Mateo', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(16, 'Sicat, Dominic Austin Igop Jr.', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(17, 'Guzman, Christian Pedro', NULL, NULL, 1, 1, 0, NULL, NULL, NULL, '0'),
(18, 'Banaag, James Palma', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(19, 'Bangon, Logan Natividad', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(20, 'Baquiran, Daniel Batac', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(21, 'Basa, Ryan Diaz', NULL, NULL, 1, 1, 0, NULL, NULL, NULL, '0'),
(22, 'Batungbakal, Aaron Santos Sr.', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(23, 'Catacutan, Oliver Reyes', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(24, 'Dagohoy, Liam Cruz', NULL, NULL, 1, 1, 0, NULL, NULL, NULL, '0'),
(25, 'Dalisay, Jamie Ocampo', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(26, 'Del Rosario, Ethan Gonzales III', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(27, 'Lardizabal, Alexander Aquino', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(28, 'Mabini, Cameron Ramos', NULL, NULL, 1, 1, 0, NULL, NULL, NULL, '0'),
(29, 'Magsaysay, Finlay Garcia', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(30, 'Laxamana, Kyle Lopez', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(31, 'Salvador, Tabitha Castillo', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(32, 'Suarez, Kyndra Diaz', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(33, 'Sulu, Kesley Villanueva', NULL, NULL, 1, 1, 0, NULL, NULL, NULL, '0'),
(34, 'Tolentino, Caryl Abalos', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(35, 'Trinidad, Krisha Abadiano', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(36, 'Tibayan, Myra Abella', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(37, 'Santos, Roda Agustin', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(38, 'Reyes, Christine Aranda', NULL, NULL, 1, 1, 0, NULL, NULL, NULL, '0'),
(39, 'Cruz, Sandra Basilio', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(40, 'Bautista, Sarah Bayani', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(41, 'Ocampo, Ivy Belmonte', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(42, 'Aquino, Rhea Bonilla', NULL, NULL, 1, 1, 0, NULL, NULL, NULL, '0'),
(43, 'Ramos, Erica Briones', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(44, 'Garcia, Osiana Castro', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(45, 'Mendoza, Steven Esguerra', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(46, 'Pascual, Joe Estrella', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(47, 'Castillo, Lennon Espino', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(48, 'Villanueva, Patrick Famorca', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(49, 'Diaz, Jason Javier', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(50, 'Rodriquez, Louis Nicolas', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(51, 'Marquez, Olly Navarro Jr.', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(52, 'Mercado, Bailey Padilla', NULL, NULL, 1, 1, 0, NULL, NULL, NULL, '0'),
(53, 'Gonzales, Marcus Peralta', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(54, 'Lopez, Peter Rimas', NULL, NULL, 1, 1, 0, NULL, NULL, NULL, '0'),
(55, 'Dante, Nero', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0'),
(56, 'Hassan, Artbog Cruz ', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(57, 'Athens, Kassandra', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '0'),
(58, 'Caesar, Julius Gaius ', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `patient_account`
--

CREATE TABLE `patient_account` (
  `patient_account_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_username` varchar(255) NOT NULL,
  `patient_password` varchar(255) NOT NULL,
  `patient_picture` blob,
  `patient_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_account`
--

INSERT INTO `patient_account` (`patient_account_id`, `patient_id`, `patient_username`, `patient_password`, `patient_picture`, `patient_email`) VALUES
(1, 1, 'TedMosby', '$2y$10$WfeTqaD11EK1IGl9.gO.e.dl1wuUgASeQRlokkAbFwtzM4RA3o4Hi', NULL, 'theodoremosby@gmail.com'),
(2, 2, 'EricksenM', 'iGetVaxAndGetDiscount', NULL, 'EricksenM@gmail.com'),
(3, 3, 'LilAldrin', 'iGetVaxAndGetEcoBag', NULL, 'LilAldrin@gmail.com'),
(4, 4, 'RobinSparkles', 'iGetVaxAndGotErectileDysfunction', NULL, 'RobinSparkles@gmail.com'),
(5, 5, 'SwarleyB', 'iGetVaxAndStillGotCovid', NULL, 'SwarleyB@gmail.com'),
(425, 6, 'patientGaviola', '$2y$10$JSYmZQY9OwBQH9zKKFiWkukB3TbKT2Ry0qAb1NPx4/1gvDkxxUI7m', NULL, 'Adriel.Gaviola@gmail.com'),
(426, 7, 'HudsonKit', '$2y$10$.HUj.GfAK8o08D0WBzvoqeha2FkVDiFLfWSbBUsq3nRj3kcORD2Hy', NULL, 'Hudson.Kit@gmail.com'),
(427, 8, 'patientArtbog', '$2y$10$4sJjB4r5wroon/IOYljh8uE1jeNJpkcMinabqWIBKQh4fouu7CrMG', NULL, 'Kilrone.Del-Ong@gmail.com'),
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
(1, 113, 0, 1),
(2, 113, 2, 0);

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
  `patient_birthdate` date NOT NULL,
  `patient_age` int(11) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
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

INSERT INTO `patient_details` (`patient_id`, `patient_first_name`, `patient_last_name`, `patient_middle_name`, `patient_suffix`, `patient_category_id`, `patient_category_number`, `patient_philHealth`, `patient_pwd`, `patient_house_address`, `patient_birthdate`, `patient_age`, `civil_status`, `patient_gender`, `patient_contact_number`, `patient_occupation`, `Archived`, `barangay_id`, `priority_group_id`) VALUES
(1, 'Theodore', 'Mosby', 'Evelyn', NULL, 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', '1999-04-01', 21, '', 'Male', '9216357642', 'Nurse', 0, 113, 1),
(2, 'Marshall', 'Ericksen', NULL, NULL, 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', '1999-04-01', 21, '', 'Male', '9216357642', 'Nurse', 0, 113, 1),
(3, 'Lili', 'Ericksen', 'Aldrin', NULL, 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', '1999-04-01', 21, '', 'Male', '9216357642', 'Nurse', 0, 58, 3),
(4, 'Robin', 'Scherbatsky', NULL, NULL, 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', '1999-04-01', 21, '', 'Male', '9216357642', 'Nurse', 0, 113, 2),
(5, 'Barney', 'Stinson', NULL, NULL, 'Other ID', '2191057', NULL, NULL, '75-B Lot 4 Block 5', '1999-04-01', 21, '', 'Male', '9216357642', 'Nurse', 0, 113, 5),
(6, 'Adriel', 'Gaviola', 'Miguel', '', 'Other', '2191057', '5361', '1212312', '15 Tacay Road.', '1970-01-01', 51, '', 'Male', '9217357942', 'Student', 0, 98, 3),
(7, 'Hudson', 'Kit', 'Pasalo', '', 'Other', '2191057', '4057', '1212312', '15 Tacay Road.', '1970-01-01', 51, '', 'Male', '9217357942', 'Student', 0, 98, 3),
(8, 'Kilrone', 'Del-Ong', 'Honkai', '', '', '2191057', '', '1212312', '15 Tacay Road.', '1970-01-01', 51, '', 'Male', '9217357942', 'Student', 0, 98, 3),
(9, 'Jecelito', 'Batac', 'Artbog', '', 'Other', '2191057', '6065', '1212312', '15 Tacay Road.', '1970-01-01', 51, '', 'Male', '9217357942', 'Student', 0, 98, 3),
(10, 'Meredith ', 'Grey', 'Pompeo', '', 'Facility ', '2167809', '7556', '', '76-A Liteng', '1970-01-01', 51, '', 'Female', '9456987632', 'Doctor', 0, 12, 1),
(11, 'Cristina', 'Yang', 'Oh', '', 'Facility', '2156789', '1428', '', '98-B ', '1970-01-01', 51, '', 'Female', '9087345632', 'Doctor', 0, 86, 1),
(12, 'Alex', 'Karev', 'Chambers', '', 'Facility ', '2159876', '9651', '', '12 Lower Kayo', '1989-06-03', 32, '', 'Male', '9087547853', 'Doctor', 0, 25, 1),
(13, 'Marissa', 'Bacasen', 'Johnson', '', 'Other', '2037221', '6345', '', '22 Upper Mangga', '1970-01-01', 51, '', 'Female', '9123456789', 'Teacher', 0, 14, 6),
(14, 'Eddie', 'Rafael', 'Lim', 'Sr.', 'Office of Senior Citizen Affairs', '2072565', '2755', '', '55-B West Slide', '1970-01-01', 51, '', 'Male', '9987654321', 'Student', 0, 71, 2),
(15, 'Kryzzylle Anne', 'Johnson', 'Mateo', '', 'Other', '2051306', '2176', '', 'Purok 7', '1970-01-01', 51, '', 'Female', '9345876123', 'Student', 0, 124, 7),
(16, 'Dominic Austin', 'Sicat', 'Igop', 'Jr.', 'Other', '2102299', '4693', '', '65 Naiba', '1970-01-01', 51, '', 'Male', '9500876123', 'Student', 0, 119, 6),
(17, 'Christian', 'Guzman', 'Pedro', '', 'Other', '2082489', '1781', '', '58F', '1974-09-07', 47, '', 'Male', '9402368492', 'Street Vendor', 0, 7, 4),
(18, 'James', 'Banaag', 'Palma', '', 'Other', '8783960', '4621', '', '47 Upper Monterazas', '1970-01-01', 51, '', 'Male', '9667555424', 'Farmer', 0, 2, 5),
(19, 'Logan', 'Bangon', 'Natividad', '', 'Other', '1597428', '9012', '', '15 Beleng', '1970-01-01', 51, '', 'Male', '9202171640', 'Waiter', 0, 3, 4),
(20, 'Daniel', 'Baquiran', 'Batac', '', 'Professional Regulation  Commission ', '3416270', '2137', '', '3B - Cuenca', '1991-08-12', 30, '', 'Male', '9425356690', 'Paramedic', 0, 4, 1),
(21, 'Ryan', 'Basa', 'Diaz', '', 'Other', '1604357', '5129', '', '89 - San Luis Road', '1970-01-01', 51, '', 'Male', '9873825289', 'Jeep Conductor', 0, 5, 4),
(22, 'Aaron', 'Batungbakal', 'Santos', 'Sr.', 'Other', '6790334', '7982', '', '79 - Mabini Street', '1983-09-08', 38, '', 'Male', '9886284130', 'Electrician', 0, 4, 4),
(23, 'Oliver', 'Catacutan', 'Reyes', '', 'Professional Regulation  Commission ', '9484497', '1564', '', '39 - Assumptiion Rd', '1975-08-08', 46, '', 'Male', '9703029461', 'Doctor', 0, 4, 1),
(24, 'Liam', 'Dagohoy', 'Cruz', '', 'Office of Senior Citizen Affairs', '2752453', '2990', '', '82 Mamaga', '1955-03-03', 66, '', 'Male', '9874069918', 'Businessman', 0, 4, 4),
(25, 'Jamie', 'Dalisay', 'Ocampo', '', 'Other', '1674720', '7581', '4545654', '17 Balilo', '1970-01-01', 51, '', 'Male', '9804881607', 'Student', 0, 10, 3),
(26, 'Ethan', 'Del Rosario', 'Gonzales', 'III', 'Professional Regulation  Commission ', '8768583', '8485', '', '80F - Palma Street', '1968-01-04', 53, '', 'Male', '9849427233', 'Sugeon', 0, 1, 1),
(27, 'Alexander', 'Lardizabal', 'Aquino', '', 'Facility', '9793318', '4217', '', '62A - Delong rd', '1974-02-07', 47, '', 'Male', '9664932091', 'Secretary', 0, 1, 1),
(28, 'Cameron', 'Mabini', 'Ramos', '', 'Professional Regulation  Commission ', '8807939', '9578', '', '41- Lower Batac', '1984-01-05', 37, '', 'Male', '9898213006', 'Soldier', 0, 1, 1),
(29, 'Finlay', 'Magsaysay', 'Garcia', '', 'Other', '2199487', '2628', '', '25C - East Gavioli', '1982-06-01', 39, '', 'Male', '9598015136', 'Repairman', 0, 1, 1),
(30, 'Kyle', 'Laxamana', 'Lopez', '', 'Facility', '9517279', '3519', '', '85A - Circle', '1970-01-01', 51, '', 'Male', '9901480444', 'Reporter', 0, 1, 1),
(31, 'Tabitha', 'Salvador', 'Castillo', '', 'Other', '8109756', '7174', '', '90G - Navy Road', '1989-05-06', 32, '', 'Female', '9540164037', 'Construction Worker', 0, 1, 1),
(32, 'Kyndra', 'Suarez', 'Diaz', '', 'Professional Regulation  Commission ', '3006499', '6730', '', '77 - Pico Street', '1970-01-01', 51, '', 'Female', '9704230263', 'Professor', 0, 1, 1),
(33, 'Kesley', 'Sulu', 'Villanueva', '', 'Facility', '6511829', '7152', '', '12 - Otek road', '1984-02-04', 37, '', 'Female', '9337991402', 'Postman', 0, 1, 1),
(34, 'Caryl', 'Tolentino', 'Abalos', '', 'Facility', '2325387', '8559', '', 'Mabini Road', '1970-01-01', 51, '', 'Female', '9199686580', 'Photographer', 0, 1, 1),
(35, 'Krisha', 'Trinidad', 'Abadiano', '', 'Professional Regulation  Commission ', '5255679', '5584', '', '4F - Lamtang Road', '1970-01-01', 51, '', 'Female', '9968838166', 'Pilot', 0, 1, 1),
(36, 'Myra', 'Tibayan', 'Abella', '', 'Other', '5047268', '7125', '', '72- Maria Bassa', '1970-01-01', 51, '', 'Female', '9413165408', 'Catholic Nun', 0, 1, 1),
(37, 'Roda', 'Santos', 'Agustin', '', 'Other', '5856031', '5819', '', '26 - Pink Castle', '1994-03-03', 27, '', 'Female', '9851903805', 'Painter', 0, 1, 1),
(38, 'Christine', 'Reyes', 'Aranda', '', 'Other', '8873969', '9049', '', '43 - Lower Bua', '1970-01-01', 51, '', 'Female', '9184380320', 'Mechanic', 0, 1, 1),
(39, 'Sandra', 'Cruz', 'Basilio', '', 'Other', '7237155', '6221', '', '95- Upper Cuenca', '1970-01-01', 51, '', 'Female', '9319504468', 'Clown', 0, 1, 1),
(40, 'Sarah', 'Bautista', 'Bayani', '', 'Other', '8638076', '9304', '', '40 -  Casilagan Norte', '1986-03-10', 35, '', 'Female', '9371148514', 'Housekeeper', 0, 1, 1),
(41, 'Ivy', 'Ocampo', 'Belmonte', '', 'Other', '1834905', '6212', '', '87 - Ambalite Sur', '1970-01-01', 51, '', 'Female', '9255474127', 'Gardener', 0, 1, 1),
(42, 'Rhea', 'Aquino', 'Bonilla', '', 'Other', '1058615', '2475', '', '93 - Monterazas Village', '1970-01-01', 51, '', 'Female', '9316197334', 'Builder', 0, 1, 1),
(43, 'Erica', 'Ramos', 'Briones', '', 'Other', '2903359', '1969', '', '71B - Mirhea Residences', '1970-01-01', 51, '', 'Female', '9480878459', 'Foreman', 0, 1, 1),
(44, 'Osiana', 'Garcia', 'Castro', '', 'Other', '6888261', '4272', '', '49L - San Lorenzo Residences', '1970-01-01', 51, '', 'Female', '9245469986', 'Farmer', 0, 1, 1),
(45, 'Steven', 'Mendoza', 'Esguerra', '', 'Other', '8377165', '9899', '', '17N - Poso ', '1970-01-01', 51, '', 'Male', '9624831879', 'Singer', 0, 1, 1),
(46, 'Joe', 'Pascual', 'Estrella', '', 'Facility', '6444601', '2413', '', '63O - Amyanan Road', '1993-12-03', 27, '', 'Male', '9508249241', 'Saleman', 0, 1, 1),
(47, 'Lennon', 'Castillo', 'Espino', '', 'Facility', '8412294', '8512', '', '13A - Bokawpan', '1970-01-01', 51, '', 'Male', '9351256726', 'Librarian', 0, 1, 1),
(48, 'Patrick', 'Villanueva', 'Famorca', '', 'Other', '1807742', '8013', '', '86F - Sinipsop ', '1970-01-01', 51, '', 'Male', '9671757640', 'Priest', 0, 1, 1),
(49, 'Jason', 'Diaz', 'Javier', '', 'Other', '3363284', '3945', '', '11A - Silangob Road', '1970-01-01', 51, '', 'Male', '9517652197', 'Driver', 0, 1, 1),
(50, 'Louis', 'Rodriquez', 'Nicolas', '', 'Other', '5850780', '1775', '', '68B - Pilando Road', '1970-01-01', 51, '', 'Male', '9820221363', 'Waiter', 0, 1, 1),
(51, 'Olly', 'Marquez', 'Navarro', 'Jr.', 'Other', '7068178', '2247', '', '6W - Residence Building', '1970-01-01', 51, '', 'Male', '9123204573', 'Security Guard', 0, 1, 1),
(52, 'Bailey', 'Mercado', 'Padilla', '', 'Professional Regulation  Commission ', '8318841', '3775', '', '46 - North Road', '1970-01-01', 51, '', 'Male', '9307814440', 'Police Officer', 0, 1, 1),
(53, 'Marcus', 'Gonzales', 'Peralta', '', 'Professional Regulation  Commission ', '6030757', '3906', '', '9D - South Residences', '1970-01-01', 51, '', 'Male', '9416438823', 'Surgeon', 0, 1, 1),
(54, 'Peter', 'Lopez', 'Rimas', '', 'Professional Regulation  Commission ', '4110345', '9406', '', '78  - West Road ', '2000-04-03', 21, '', 'Male', '9806080574', 'Nurse', 0, 1, 1),
(55, 'Nero', 'Dante', '', '', 'Other', '2191217', '1231', '1212312', '15 Tacay Road.', '1999-09-17', 22, '', 'Male', '9634212543', 'Student', 0, 1, 1),
(56, 'Artbog', 'Hassan', 'Cruz', '', 'others', '2191563', '321233', '323414', 'Bortag Village', '1992-10-05', 29, '', 'male', '', '', 0, 1, 1),
(57, 'Kassandra', 'Athens', '', '', 'Other', '2191217', '1231', '1212312', '15 Tacay Road.', '1999-12-07', 21, '', 'Femail', '9634212543', 'Student', 0, 1, 1),
(58, 'Julius', 'Caesar', 'Gaius', '', 'others', '2195523', '', '', 'Bortag Village', '1978-08-18', 43, '', 'male', '09217357942', 'General', 0, 1, 1);

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
(1, 15, 7),
(3, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_vitals`
--

CREATE TABLE `patient_vitals` (
  `patient_id` int(11) NOT NULL,
  `pre_vital_pulse_rate_1st_dose` varchar(18) DEFAULT NULL,
  `pre_vital_temp_rate_1st_dose` varchar(18) DEFAULT NULL,
  `pre_oxygen_saturation_1st_dose` varchar(18) DEFAULT NULL,
  `pre_vital_bpDiastolic_1st_dose` varchar(18) DEFAULT NULL,
  `pre_vital_bpSystolic_1st_dose` varchar(18) DEFAULT NULL,
  `post_vital_pulse_rate_1st_dose` varchar(18) DEFAULT NULL,
  `post_vital_temp_rate_1st_dose` varchar(18) DEFAULT NULL,
  `post_oxygen_saturation_1st_dose` varchar(18) DEFAULT NULL,
  `post_vital_bpDiastolic_1st_dose` varchar(18) DEFAULT NULL,
  `post_vital_bpSystolic_1st_dose` varchar(18) DEFAULT NULL,
  `pre_vital_pulse_rate_2nd_dose` varchar(18) DEFAULT NULL,
  `pre_vital_temp_rate_2nd_dose` varchar(18) DEFAULT NULL,
  `pre_oxygen_saturation_2nd_dose` varchar(18) DEFAULT NULL,
  `pre_vital_bpDiastolic_2nd_dose` varchar(18) DEFAULT NULL,
  `pre_vital_bpSystolic_2nd_dose` varchar(18) DEFAULT NULL,
  `post_vital_pulse_rate_2nd_dose` varchar(18) DEFAULT NULL,
  `post_vital_temp_rate_2nd_dose` varchar(18) DEFAULT NULL,
  `post_oxygen_saturation_2nd_dose` varchar(18) DEFAULT NULL,
  `post_vital_bpDiastolic_2nd_dose` varchar(18) DEFAULT NULL,
  `post_vital_bpSystolic_2nd_dose` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_vitals`
--

INSERT INTO `patient_vitals` (`patient_id`, `pre_vital_pulse_rate_1st_dose`, `pre_vital_temp_rate_1st_dose`, `pre_oxygen_saturation_1st_dose`, `pre_vital_bpDiastolic_1st_dose`, `pre_vital_bpSystolic_1st_dose`, `post_vital_pulse_rate_1st_dose`, `post_vital_temp_rate_1st_dose`, `post_oxygen_saturation_1st_dose`, `post_vital_bpDiastolic_1st_dose`, `post_vital_bpSystolic_1st_dose`, `pre_vital_pulse_rate_2nd_dose`, `pre_vital_temp_rate_2nd_dose`, `pre_oxygen_saturation_2nd_dose`, `pre_vital_bpDiastolic_2nd_dose`, `pre_vital_bpSystolic_2nd_dose`, `post_vital_pulse_rate_2nd_dose`, `post_vital_temp_rate_2nd_dose`, `post_oxygen_saturation_2nd_dose`, `post_vital_bpDiastolic_2nd_dose`, `post_vital_bpSystolic_2nd_dose`) VALUES
(1, '', '', '', '', '', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '90', '34.5', '90', '120', '80', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(3, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(4, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(5, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(6, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(7, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(8, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(9, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(10, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(11, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(12, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(13, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(14, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(15, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(16, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(17, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(18, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(19, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(20, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(21, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(22, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(23, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(24, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(25, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(26, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(27, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(28, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(29, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(30, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(31, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(32, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(33, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(34, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(35, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(36, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(37, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(38, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(39, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(40, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(41, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(42, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(43, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(44, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(45, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(46, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(47, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(48, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(49, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(50, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(51, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(52, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(53, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(54, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(55, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(56, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(57, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(58, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL);

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
(1, 1),
(1, 2),
(2, 3),
(2, 2),
(3, 2),
(3, 1),
(4, 1),
(4, 3),
(5, 2),
(5, 3),
(6, 4),
(6, 1),
(6, 3),
(7, 3),
(7, 1),
(8, 1),
(8, 2),
(9, 3),
(9, 4),
(10, 1),
(10, 2),
(11, 2),
(11, 1),
(11, 4),
(12, 4),
(12, 3),
(13, 2),
(13, 1),
(13, 3),
(14, 2),
(14, 1),
(15, 1),
(15, 4),
(15, 3),
(16, 3),
(16, 4),
(17, 3),
(17, 1),
(18, 1),
(18, 4),
(18, 3),
(18, 5),
(19, 5),
(19, 6),
(20, 3),
(20, 2),
(21, 1),
(21, 6),
(21, 5),
(22, 3),
(22, 2),
(22, 4),
(23, 2),
(23, 6),
(23, 5),
(24, 2),
(24, 6),
(24, 5),
(25, 2),
(25, 4),
(26, 2),
(26, 3),
(27, 1),
(28, 1),
(28, 2);

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
(6, 'Rest of Adult Population'),
(7, 'A3. Pedia: 12-17 Years Old with Commorbidity'),
(8, 'Rest of Pedia Population');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` varchar(9) DEFAULT NULL,
  `patient_id` varchar(10) DEFAULT NULL,
  `report_details` varchar(144) DEFAULT NULL,
  `vaccine_symptoms_reported` varchar(46) DEFAULT NULL,
  `COVID19_symptoms_reported` varchar(52) DEFAULT NULL,
  `date_last_out` varchar(13) DEFAULT NULL,
  `date_reported` varchar(13) DEFAULT NULL,
  `report_status` varchar(13) DEFAULT NULL,
  `Archived` varchar(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `patient_id`, `report_details`, `vaccine_symptoms_reported`, `COVID19_symptoms_reported`, `date_last_out`, `date_reported`, `report_status`, `Archived`) VALUES
('1', '1', 'I\'m currently experiencing other side effects after vaccination, specifically vomiting and diarrhea. ', 'Fever, Headache, Tiredness, Vomiting, Diarrhea', 'Vomiting, Diarrhea', '2021-07-13', '2021-07-14', 'Verified', '0'),
('2', '2', 'I\'m experiencing bothering symptoms, such as diarrhea, vomiting and headaches.', '', '', '2021-07-10', '2021-07-13', 'Pending', '0'),
('3', '3', '...', 'sick', 'sick', '2021-07-13', '2021-07-14', 'Invalidated', '0'),
('4', '4', 'Ako ay nilalagnat, parang pagod palagi, at walang pang lasa', '', 'Fever, Tiredness, Loss of taste', '2021-07-13', '2021-07-14', 'Verified', '0'),
('5', '5', 'After vaccination, I noticed that I feel some side effects, such as tiredness, headache, lost of taste', 'Tiredness, Headache, Lost of Taste', 'Fever, Cough, Tiredness, Loss of taste or smell', '2021-07-13', '2021-07-14', 'Pending', '1'),
('6', '6', 'After vaccination, I noticed that I feel some side effects, such as tiredness, and muscle pain', 'Tiredness, Muscle pain', '', '2021-10-23', '2021-10-31', 'Pending', '0'),
('7', '7', 'After vaccination, I noticed that I feel some side effects, such as Fever, Nausea,  and Cough. After 2 days I felt that my throat is being sore,', 'Fever, Nausea, Cough', 'Fever, Nausea, Cough, Sore Throat', '2021-10-03', '2021-11-03', 'Verified', '0'),
('8', '8', '2 hours after leaving the vaccination site, I felt feverish and was having chills 4 hours later.', 'Fever, Chills', '', '2021-10-11', '2021-11-06', 'Pending', '1'),
('9', '9', 'I feel pain and sweeling the the injected area on my arm', 'Pain, Swelling', '', '2021-10-04', '2021-11-07', 'Pending', '0'),
('10', '10', 'I felt feverish an hour after leaving the vaccination site and had chills three hours later.', 'Headache, Chills', '', '2021-11-05', '2021-11-01', 'Pending', '0'),
('11', '11', 'The injected location on my arm causes pain and swelling.', 'Tiredness, Muscle pain', '', '2021-10-27', '2021-11-02', 'Pending', '0'),
('12', '12', 'I started to feel feverish an hour after leaving the vaccination place, and I started to have chills two hours later. ', 'Headache, Chills, Fever, Nausea', 'difficulty breathing or shortness of breath', '2021-11-04', '2021-11-05', 'Verified', '0'),
('13', '13', 'The injected location on my arm causes me discomfort and swelling.', 'Joint pain ', '', '2021-10-15', '2021-11-04', 'Pending', '0'),
('14', '14', 'After coming home from the vaccination site, I felt tired and dizzy.', 'Feeling tired (fatigue)', '', '2021-10-25', '2021-11-08', 'Verified', '0'),
('15', '15', 'After coming home from the vaccination site, maybe 2 hours after leaving the vaccination site,  I felt weak and nauseous', 'Feeling of weakness, Diarrhea', '', '2021-10-06', '2021-11-01', 'Verified', '0'),
('16', '16', 'I feel tired and muscle pain after 4 hours', 'Fatigue, Joint Pain', '', '2021-10-05', '2021-11-04', 'Pending', '0'),
('17', '17', 'After 4 hours, I\'m fatigued and have muscle soreness.', 'Joint pain, Swelling', '', '2021-10-14', '2021-11-03', 'Pending', '0'),
('18', '18', 'I began to feel feverish an hour after leaving the immunization location, and three hours later, I began shiver', 'Fever, Headache, Vomiting', '', '2021-11-01', '2021-10-31', 'Pending', '0'),
('19', '19', 'The night of my first vaccination, i felt very tired and has an upset stomach', 'Tiredness, Diarrhea', 'a rash on skin, or discolouration of fingers or toes', '2021-10-28', '2021-11-04', 'Verified', '0'),
('20', '20', 'My arm is swollen and painful where the injection was administered.', 'Itching, Swelling', 'red or irritated eyes', '2021-11-01', '2021-10-31', 'Verified', '0');

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
(1, 3, '2021-09-14', 1, 1, 0),
(2, 1, '2021-09-14', 0, 1, 0),
(3, 2, '2021-09-14', 0, 1, 0),
(4, 1, '2021-09-16', 0, 1, 0),
(5, 3, '2021-09-16', 0, 1, 0),
(6, 5, '2021-09-17', 0, 1, 0),
(7, 3, '2021-09-17', 0, 1, 0),
(8, 2, '2021-09-21', 0, 1, 0),
(9, 1, '2021-09-21', 0, 1, 0),
(10, 3, '2021-09-21', 0, 1, 0),
(11, 1, '2021-09-27', 0, 1, 0),
(12, 2, '2021-10-06', 0, 1, 0),
(13, 3, '2021-10-06', 0, 1, 0),
(14, 3, '2021-10-12', 0, 1, 0),
(15, 1, '2021-10-12', 0, 1, 0),
(16, 1, '2021-10-26', 0, 1, 0),
(17, 3, '2021-10-26', 0, 1, 0),
(18, 1, '2021-11-02', 0, 1, 0),
(19, 2, '2021-11-02', 0, 1, 0),
(20, 3, '2021-11-04', 0, 1, 0),
(21, 1, '2021-11-08', 0, 1, 0),
(22, 2, '2021-11-08', 0, 1, 0),
(23, 3, '2021-11-15', 0, 1, 0),
(24, 2, '2021-11-18', 0, 1, 0),
(25, 1, '2021-11-21', 0, 1, 0),
(26, 3, '2021-11-21', 0, 1, 0),
(27, 3, '2021-11-25', 0, 1, 1),
(28, 2, '2021-11-26', 0, 1, 0);

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
(1, 'Pfizer/BioNTech', 'mRNA', 95, 1),
(2, 'Moderna', 'mRNA', 95, 6),
(3, 'Janssen', 'Viral Vector', 95, 3),
(4, 'AstraZeneca', 'Viral Vector', 95, 6),
(5, 'Coronovac', 'Inactivated Virus', 100, 24),
(6, 'Novavax', 'Protein Subunit', 93, 12),
(7, 'Sputnik V', 'Viral Vector', 92, 6);

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
  `drive_id` int(11) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `stubs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccine_drive_1`
--

INSERT INTO `vaccine_drive_1` (`drive_id`, `vaccine_id`, `stubs`) VALUES
(1, 1, 1000),
(1, 2, 500),
(2, 2, 1200),
(2, 4, 1000),
(3, 2, 1500),
(3, 4, 1000),
(4, 2, 2000),
(4, 4, 1000),
(5, 1, 800),
(5, 2, 2500),
(6, 4, 1000),
(6, 5, 1000),
(7, 1, 1000),
(7, 2, 1000),
(8, 2, 1000),
(8, 3, 500),
(9, 1, 1000),
(9, 4, 1000),
(10, 2, 800),
(10, 5, 1200),
(11, 2, 1000),
(11, 4, 1200),
(12, 1, 500),
(12, 4, 2000),
(13, 3, 1000),
(13, 5, 1500),
(14, 1, 1500),
(14, 6, 500),
(15, 1, 900),
(15, 7, 500),
(16, 3, 3000),
(17, 2, 1000),
(17, 5, 2500),
(18, 3, 1000),
(18, 5, 1000),
(19, 3, 900),
(19, 4, 1200),
(20, 1, 1000),
(20, 7, 800),
(21, 1, 3000),
(22, 2, 2000),
(22, 5, 500),
(23, 2, 1000),
(23, 3, 500),
(23, 4, 2000),
(24, 2, 1200),
(24, 5, 1300),
(25, 2, 1000),
(25, 3, 600),
(26, 1, 1000),
(26, 2, 2500),
(27, 1, 1),
(28, 1, 2000),
(28, 4, 1000),
(29, 2, 2000),
(29, 2, 897);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_drive_2`
--

CREATE TABLE `vaccine_drive_2` (
  `drive_id` int(11) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `first_dose_date` date DEFAULT NULL,
  `stubs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_drive_2`
--

INSERT INTO `vaccine_drive_2` (`drive_id`, `vaccine_id`, `first_dose_date`, `stubs`) VALUES
(18, 1, '2021-09-16', 800),
(18, 2, '2021-09-14', 1000),
(19, 4, '2021-11-14', 1000),
(19, 5, '2021-09-17', 500),
(20, 4, '2021-11-14', 900),
(21, 2, '2021-09-16', 1000),
(21, 5, '2021-09-17', 900),
(22, 4, '2021-11-16', 2000),
(23, 1, '2021-09-21', 1000),
(23, 2, '2021-11-17', 2000),
(24, 1, '2021-09-21', 1500),
(24, 2, '2021-09-21', 1000),
(24, 4, '2021-09-21', 1000),
(25, 2, '2021-09-27', 2000),
(25, 4, '2021-10-06', 2000),
(26, 4, '2021-10-06', 2000),
(27, 6, '2021-10-12', 1),
(28, 2, '2021-10-26', 1500),
(28, 7, '2021-10-12', 1000),
(29, 4, '2021-11-17', 1000),
(29, 3, '2021-11-02', 6);

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
(6, 'Bharat Biotech', 'The COVID-19 vaccine from Novavax contains a protein (produced from moth cells) as well as an adjuvant (made from tree bark). An adjuvant is a substance that is added to a vaccine to increase the immune response and produce more antibodies. ', 2, 21, 8, 2),
(7, 'Gamaleya Research Institute of Epidemiology and Microbiology', 'It\'s an adenovirus-based vector vaccination with the SARS-CoV-2 coronavirus gene incorporated. Adenovirus is utilized as a \"container\" to transfer the coronavirus gene to cells and begin building the new coronavirus\'s envelope proteins, thereby \"introducing\" a potential enemy to the immune system. The gene will be used by the cells to make the spike protein. The immune system will recognize this spike protein as alien and develop natural defenses, such as antibodies and T cells, to combat it.', 2, 42, 8, 2);

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
(12, 4, 1, '2021-11-23', 'Department Of Health', 668, '2021-11-29', 0),
(13, 1, 1, '2021-07-14', 'World Health Organization', 5000, '2022-03-17', NULL);

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
-- Indexes for table `allocated_drive`
--
ALTER TABLE `allocated_drive`
  ADD KEY `drive_id` (`drive_id`),
  ADD KEY `barangay_id` (`barangay_id`);

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
-- Indexes for table `priority_drive`
--
ALTER TABLE `priority_drive`
  ADD KEY `drive_id_priority` (`drive_id`),
  ADD KEY `priority_id_priority` (`priority_id`);

--
-- Indexes for table `priority_groups`
--
ALTER TABLE `priority_groups`
  ADD PRIMARY KEY (`priority_group_id`);

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
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `barangay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee_account`
--
ALTER TABLE `employee_account`
  MODIFY `employee_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `health_district`
--
ALTER TABLE `health_district`
  MODIFY `health_district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `patient_account`
--
ALTER TABLE `patient_account`
  MODIFY `patient_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=479;

--
-- AUTO_INCREMENT for table `priority_groups`
--
ALTER TABLE `priority_groups`
  MODIFY `priority_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vaccination_drive`
--
ALTER TABLE `vaccination_drive`
  MODIFY `drive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `vaccine_lot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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

--
-- Constraints for table `priority_drive`
--
ALTER TABLE `priority_drive`
  ADD CONSTRAINT `drive_id_priority` FOREIGN KEY (`drive_id`) REFERENCES `vaccination_drive` (`drive_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `priority_id_priority` FOREIGN KEY (`priority_id`) REFERENCES `priority_groups` (`priority_group_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
