-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2022 at 10:36 AM
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
  `time_of_the_day` varchar(100) NOT NULL,
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
(11, 8, 4170, 'LIQUI D3 CAP 4S', 241, 'Empty stomach,Bed time', 'month', 1),
(13, 8, 4189, 'Kabibite Disket Disk', 100, 'Before lunch', 'day', 12),
(14, 8, 4189, '4U-Q10 PLUS Capsule ', 100, 'Before lunch', 'day', 12),
(15, 8, 4193, 'Arachitol 3L INJ 1s', 12, 'After breakfast,Before lunch', 'day', 12),
(16, 8, 4194, 'Amlokind Tablet 5 MG', 222, 'Empty stomach,Before breakfast', 'day', 12),
(17, 8, 4194, 'Amlokind-AT Table 10', 12, 'Before breakfast,Before lunch', 'month', 1),
(18, 8, 4194, 'A To Z Gold Capsule ', 12, 'Empty stomach,After breakfast,After lunch', 'day', 12);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `doc_id` int(10) NOT NULL,
  `report_name` varchar(20) NOT NULL,
  `report` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `patient_id`, `doc_id`, `report_name`, `report`) VALUES
(5, 4187, 8, ' Blood TEST Report', '2326.8208.2584550791663684514 (1).pdf'),
(6, 4186, 8, ' Blood TEST Report', '3986.8208.2584550791663684514 (1).pdf'),
(7, 4185, 8, ' Blood TEST Report', '8676.Dm-assignment2.pdf'),
(8, 4184, 8, ' Blood TEST Report', '1653.3021.2584550791663684514.pdf'),
(10, 4193, 8, ' Blood TEST Report', '8833.8492.Muhammad_rafi_resume2.pdf'),
(11, 4194, 8, ' Blood TEST Report', '9996.8492.Muhammad_rafi_resume2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `visit_notes`
--

CREATE TABLE `visit_notes` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(20) NOT NULL,
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
  `prescription` varchar(70) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit_notes`
--

INSERT INTO `visit_notes` (`id`, `doc_id`, `patient_id`, `patient_name`, `examination`, `blood_pressure`, `blood_pulse`, `spo2`, `fasting_blood_sugar`, `random_blood_sugar`, `hbaic`, `creatinine`, `urine_macr`, `bun`, `vit_d3`, `vit_b12`, `uric_acid`, `sgot`, `sgpt`, `father_condition`, `mother_condition`, `brother_condition`, `sister_condition`, `provisional_diagnosis`, `investigation`, `referral`, `advise_for_procedure`, `repeat_visit`, `repeat_visit_date`, `prescription`, `created_at`) VALUES
(15, 8, 4187, 'Casey Washington', 'Test 2nd Update2', '12', 2, 1, 1, 1, 1, 121, 111, 21, 0, 12, 12, 1, 1, 'Type 2 Diabetes', 'Type 1 Diabetes', 'Type 2 Diabetes', 'Type 2 Diabetes', 'Arthritis', 'Appendectomy', 'Cardiologist', 'Similique tempora qu', 'Month', 12, 'Lifestyle modification', '2022-10-08'),
(16, 8, 4186, 'Tatiana Mclean', 'Data 2', '1.2', 2, 1, 1, 22, 1, 121, 12, 21, 12, 12, 12, 1, 2, 'Type 1 Diabetes', 'Type 2 Diabetes', 'Type 1 Diabetes', 'Type 2 Diabetes', 'Ankle osteoarthritis', 'Artificial insemination', 'Footcare Specialist', 'Suscipit quae perfer', 'Month', 12, 'Lifestyle modification', '2022-10-08'),
(17, 8, 4185, 'Austin Matthews', ' the lore of religious architecture.\r\n', '1.2', 2, 12, 1, 22, 1, 121, 12, 1, 12, 12, 12, 1, 12, 'Eye issue', 'Eye issue', 'Cholesterol issue', 'High Blood pressure', 'Acid reflux', 'Artificial urinary sphincter surgery', 'Nephrologist', 'Nam ullam amet est', 'Month ', 12, 'Lifestyle modification', '2022-10-08'),
(18, 8, 4184, 'Stephanie Pickett', '  HTML entities', '1', 2, 1, 12, 1, 1, 1, 12, 0, 12, 12, 12, 12, 2, 'Type 1 Diabetes', 'High Blood pressure', 'Type 1 Diabetes', 'High Blood pressure', 'Anorexia nervosa', 'Angioplasty', 'Ophthalmologist', 'Similique tempora qu', 'Day ', 12, 'Lifestyle modification', '2022-10-08'),
(19, 8, 4189, 'Kabir-122', ' Blood testu', '1.2', 1.11, 1.2, 1.3, 1, 1.1, 1, 111, 12, 12, 2, 1, 2, 1, 'Type 2 Diabetes', 'High Blood pressure', 'Type 1 Diabetes', 'High Blood pressure', 'Arthritis', 'Appendectomy', 'Cardiologist', 'Similique tempora qu', 'Month', 15, 'Lifestyle modification', '2022-10-08'),
(20, 8, 4189, 'Kabir-122', ' Blood suger', '12', 12, 12, 12, 12, 12, 121, 12, 21, 12, 12, 12, 1, 1, 'Type 1 Diabetes', 'Type 1 Diabetes', 'Type 1 Diabetes', 'Type 1 Diabetes', 'Appendicitis', 'Artificial insemination', 'Ophthalmologist', 'Nam ullam amet est', 'Day ', 15, 'Lifestyle modification', '2022-10-08'),
(21, 8, 4189, 'Kabir-122', ' Test update', '1.2', 2, 12, 12, 22, 1, 121, 12, 1, 12, 12, 12, 12, 12, 'Type 1 Diabetes', 'Type 1 Diabetes', 'High Blood pressure', 'Type 1 Diabetes', 'Acute lymphoblastic leukemia', 'Dialysis', 'Nephrologist', 'Test', 'Month', 12, 'Lifestyle modification', '2022-10-10'),
(22, 8, 4187, 'Casey Washington', ' 2nd Data', '1.2', 2, 12, 12, 22, 12, 121, 12, 12, 1, 12, 12, 12, 12, 'Type 2 Diabetes', 'Type 2 Diabetes', 'Type 2 Diabetes', 'Type 2 Diabetes', 'Anorexia nervosa', 'Artificial insemination', 'Ophthalmologist', 'Suscipit quae perfer', 'Day ', 2, 'Dietary modification;Lifestyle', '2022-10-10'),
(23, 8, 4193, 'abc', 'Hello world', '1.2', 12, 12, 12, 1, 12, 121, 12, 12, 12, 12, 1, 12, 2, 'High Blood pressure', 'High Blood pressure', 'Type 1 Diabetes', 'Type 2 Diabetes', 'Ankle osteoarthritis', 'Artificial insemination', 'Ophthalmologist', 'Eum voluptatibus con', 'Month', 12, 'Lifestyle modification', '2022-10-17'),
(24, 8, 4193, 'abc', ' New Visit', '12', 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 21, 12, 12, 'Type 2 Diabetes', 'Type 2 Diabetes', 'Type 2 Diabetes', 'Type 2 Diabetes', 'Appendicitis', 'Artificial urinary sphincter surgery', 'Nephrologist', 'Maxime qui aut elige', 'Month ', 1, 'Blood sugar charting', '2022-10-19'),
(25, 8, 4194, 'Regina Thornton', ' LOrekjkiNHDIOfaoshoifgawf', '1.2', 2, 12, 12, 22, 1, 121, 111, 21, 12, 12, 12, 12, 12, 'Type 2 Diabetes', 'Type 2 Diabetes', 'Type 2 Diabetes', 'Type 1 Diabetes', 'Anorexia nervosa', 'Artificial insemination', 'Ophthalmologist', 'Maxime qui aut elige', 'Month ', 12, 'Dietary modification', '2022-10-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `visit_notes`
--
ALTER TABLE `visit_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
