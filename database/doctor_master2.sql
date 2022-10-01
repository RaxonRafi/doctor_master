-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 12:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_master2`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medicine_name` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `time_of_the_day` varchar(30) NOT NULL,
  `continue_till` varchar(6) NOT NULL,
  `continue_till_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `doc_id`, `patient_id`, `medicine_name`, `quantity`, `time_of_the_day`, `continue_till`, `continue_till_date`) VALUES
(4, 8, 4164, '3-EFA Softgel Capsul', 100, 'Before bre', 'day', 7),
(5, 8, 4164, 'Arkamin Tablet 30s', 222, 'Before bre', 'month', 1),
(6, 8, 4164, 'Ajaduo Tablet 10/5 M', 2, 'Empty stom', 'day', 12),
(7, 8, 4164, 'AFOGLIP TAB 20MG 10S', 500, 'After brea', 'day', 7),
(8, 8, 4164, 'Ajaduo Tablet 10/5 M', 222, 'After breakfast', 'day', 12),
(9, 8, 4170, 'Ajaduo Tablet 10/5 M', 2, 'Empty stomach', 'day', 12),
(10, 8, 4170, 'AFOGLIP TAB 20MG 10S', 100, 'Before lunch', 'day', 20),
(11, 8, 4170, 'LIQUI D3 CAP 4S', 241, 'Empty stomach,Bed time', 'month', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visit_notes`
--

CREATE TABLE `visit_notes` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `blood_test_report` varchar(30) NOT NULL,
  `report_name` varchar(20) NOT NULL,
  `examination` varchar(50) NOT NULL,
  `blood_pressure` varchar(30) DEFAULT NULL,
  `blood_pulse` float NOT NULL,
  `spo2` float NOT NULL,
  `fasting_blood_sugar` float NOT NULL,
  `random_blood_sugar` float NOT NULL,
  `hbaic` float NOT NULL,
  `creatinine` float NOT NULL,
  `urine_macr` float NOT NULL,
  `bun` float NOT NULL,
  `vit_d3` float NOT NULL,
  `vit_b12` float NOT NULL,
  `uric_acid` float NOT NULL,
  `sgot` float NOT NULL,
  `sgpt` float NOT NULL,
  `father_condition` varchar(50) NOT NULL,
  `mother_condition` varchar(50) NOT NULL,
  `brother_condition` varchar(50) NOT NULL,
  `sister_condition` varchar(50) NOT NULL,
  `provisional_diagnosis` varchar(30) NOT NULL,
  `investigation` varchar(50) NOT NULL,
  `referral` varchar(30) NOT NULL,
  `advise_for_procedure` varchar(20) NOT NULL,
  `repeat_visit` varchar(10) NOT NULL,
  `repeat_visit_date` int(10) NOT NULL,
  `prescription` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit_notes`
--

INSERT INTO `visit_notes` (`id`, `doc_id`, `patient_id`, `blood_test_report`, `report_name`, `examination`, `blood_pressure`, `blood_pulse`, `spo2`, `fasting_blood_sugar`, `random_blood_sugar`, `hbaic`, `creatinine`, `urine_macr`, `bun`, `vit_d3`, `vit_b12`, `uric_acid`, `sgot`, `sgpt`, `father_condition`, `mother_condition`, `brother_condition`, `sister_condition`, `provisional_diagnosis`, `investigation`, `referral`, `advise_for_procedure`, `repeat_visit`, `repeat_visit_date`, `prescription`) VALUES
(3, 8, 4163, '', 'Gisela Cunningham ', ' fghjkfghfg', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '', '', '0', '0', '0', '0', 'Day ', 15, 'Lifestyle modification'),
(4, 8, 4162, '', 'Gisela Cunningham ', ' fdhgndjmfhygjdxtrjyd', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '', '', '0', '0', '0', '0', 'Month ', 10, 'Dietary modification'),
(5, 8, 4161, '', ' ', ' ', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '0', '0', '0', '0', '--Select d', 0, 'Lifestyle modification'),
(6, 8, 4160, '', 'Quintessa Maddox ', ' fghbncvhbnmcghvjnmfgchyj', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '', '', 'Arthritis;Appendicit', 'Artificial inseminat', 'Cardiologist', 'Similique tempora qu', 'Day ', 8, 'Dietary modification'),
(7, 8, 4159, '', 'Quintessa Maddox ', ' xdfghbsdfghbsdftghsedrtghaetgyyt5', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '', '', 'Arthritis;Anorexia n', 'Artificial urinary s', 'Ophthalmologist', 'Suscipit quae perfer', 'Month ', 8, 'Lifestyle modification'),
(8, 0, 0, '', ' ', ' ', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', ' ', 0, ''),
(9, 8, 4158, '7616398361662216577.pdf', 'Gisela Cunningham ', ' ZDcxfvsDZGfvASFdrtgwrTYQ3E5RTGYERGFDRG', '12', 12, 12, 12, 12, 12, 121, 12, 12, 12, 12, 12, 12, 12, '', '', '', '', 'Ankle osteoarthritis', 'Artificial urinary s', 'Ophthalmologist', 'Ea debitis harum pro', 'Day ', 14, 'Lifestyle modification'),
(10, 8, 4164, '11795988631662376007.pdf', 'Gisela Cunningham ', ' asfgavsf', '120/70', 60, 99, 170, 200, 6.7, 2.1, 2001.3, 45.5, 70, 500, 5.2, 30.5, 30.5, '', '', '', '', 'Arthritis', 'Artificial urinary s', 'Ophthalmologist', 'Ea debitis harum pro', 'Day ', 7, 'Lifestyle modification'),
(11, 8, 4170, '13200812681662818294.pdf', 'Quintessa Maddox ', ' dfdfghsdfhsdghsdghtrhrtbgtgsr', '120/70', 60, 99, 170, 200, 6.7, 2.1, 2001.3, 45.5, 70, 500, 5.2, 35.5, 35.5, '', '', '', '', 'Arthritis', 'Artificial urinary sphincter s', 'Footcare Specialist', '', 'Day ', 20, 'Dietary modification'),
(12, 8, 4187, '', 'Gisela Cunningham ', ' fghfgjfgjfh', '1.2', 2, 1, 12, 22, 12, 1, 111, 12, 12, 1, 12, 12, 12, 'Type 1 Diabetes', 'Type 2 Diabetes', 'Type 2 Diabetes', 'Type 1 Diabetes', 'Ankle osteoarthritis', 'Angioplasty', 'Footcare Specialist', 'Suscipit quae perfer', 'Day ', 1, 'Lifestyle modification'),
(13, 8, 4187, '', 'Gisela Cunningham ', ' fghfgjfgjfh', '1.2', 2, 1, 12, 22, 12, 1, 111, 12, 12, 1, 12, 12, 12, 'Type 1 Diabetes', 'Type 2 Diabetes', 'Type 2 Diabetes', 'Type 1 Diabetes', 'Ankle osteoarthritis', 'Angioplasty', 'Footcare Specialist', 'Suscipit quae perfer', 'Day ', 1, 'Lifestyle modification');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit_notes`
--
ALTER TABLE `visit_notes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `visit_notes`
--
ALTER TABLE `visit_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
