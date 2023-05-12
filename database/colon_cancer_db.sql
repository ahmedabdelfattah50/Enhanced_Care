-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 09:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `colon_cancer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alarm`
--

CREATE TABLE `alarm` (
  `id` int(11) NOT NULL,
  `Time` time NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Repeat` int(11) NOT NULL,
  `Patient_id` int(11) NOT NULL,
  `Medecine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `F_name` varchar(100) NOT NULL,
  `L_name` varchar(100) NOT NULL,
  `E_mail` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `Image_name` varchar(255) NOT NULL,
  `Image` text NOT NULL,
  `Patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `Image_name`, `Image`, `Patient_id`) VALUES
(6, 'Test', 'IMG-64599963be9523.23583611.jpg', 25),
(7, 'Uploading and Downloading', 'IMG-64599cd29e4389.18382032.jpg', 25);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `Name_of_medicine` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `Name_of_medicine`, `Description`, `Patient_id`) VALUES
(4, 'nmn', 'klkdsfdfsd fsd', 25);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `F_name` varchar(100) NOT NULL,
  `L_name` varchar(100) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `Gender` tinyint(1) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `E_mail` varchar(100) DEFAULT NULL,
  `Adress` text DEFAULT NULL,
  `Doctor_id` int(11) DEFAULT NULL,
  `Prediction_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `F_name`, `L_name`, `Birthdate`, `Gender`, `Phone`, `Password`, `E_mail`, `Adress`, `Doctor_id`, `Prediction_id`) VALUES
(2, 'Colette', 'Wynn ', '2005-10-03', 2, 1234567890, '$2y$10$pO.iMCzR.WwjIJ3CvyYm9.acZGikvD080qpe4/34MWbdXY2i5zgFK', 'test@gmail.com ', 'asdASDAS asda dsad asdas das asd asd سيسيبسيب سيب سيب سيبس يبس ي', NULL, NULL),
(11, 'Donna', 'Goff ', '2014-09-22', 1, 1012345678, '$2y$10$kbuSPvRmstngDcuBjOvWFOJSYXWJQyJUTtHnAd6A0UfPFi7NZxfw6', 'fixikagun@mailinator.com ', 'Tenetur ea nesciunt', NULL, NULL),
(25, 'Carl', 'Mason ', '2016-04-13', 1, 1012345678, '$2y$10$eP6o.ZoWpRdYsKROceEuoO/VBt1fFr0qp4GcOPdGTQC/VM/g.V21.', 'gifityt@mailinator.com ', 'Sunt perspiciatis ', NULL, NULL),
(26, 'Kylan', 'Bates ', '1997-09-04', 2, 1012345678, '$2y$10$SvuzYa.y8bWbY6mAXcb93eGRiizxiI82Z9KxjXvJHQXYzMhPgdxWO', 'qetyqyriba@mailinator.com ', 'Sed temporibus itaqu', NULL, NULL),
(28, 'Hamilton', 'Larson ', '2015-06-30', 2, 1012345678, '$2y$10$DAG.eAfXFXooLsSbnUYzqeK/Cn12PjdKNyj8CjmpVUbxEn.ColAYa', 'vaxesupe@mailinator.com ', 'Harum minim laboris ', NULL, NULL),
(30, 'Chloe', 'Harris ', '2015-04-26', 2, 1012345678, '$2y$10$1F3TLyb.iaxk2aldeLOuCew8C62.9ZIKMLmFbtNNfXlNuK4HlSmZi', 'peva@mailinator.com ', 'Sunt quod id quidem', NULL, NULL),
(31, 'Leonard', 'Yang ', '1978-04-26', 1, 1178954260, '$2y$10$DBpI5BH3YaOpb2dONZGrJudWxzvW5J3XL2FEZlkgB0xRpYS4dr5Ny', 'fykanabev@mailinator.com ', 'Nam nulla sapiente d', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prediction`
--

CREATE TABLE `prediction` (
  `id` int(11) NOT NULL,
  `Image_of_prediction` varchar(255) NOT NULL,
  `Result` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alarm`
--
ALTER TABLE `alarm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Patient_id` (`Patient_id`),
  ADD KEY `Medecine_id` (`Medecine_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Patient_id` (`Patient_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Patient_id` (`Patient_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Doctor_id` (`Doctor_id`),
  ADD KEY `Prediction_id` (`Prediction_id`);

--
-- Indexes for table `prediction`
--
ALTER TABLE `prediction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alarm`
--
ALTER TABLE `alarm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `prediction`
--
ALTER TABLE `prediction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alarm`
--
ALTER TABLE `alarm`
  ADD CONSTRAINT `alarm_ibfk_1` FOREIGN KEY (`Patient_id`) REFERENCES `patient` (`id`),
  ADD CONSTRAINT `alarm_ibfk_2` FOREIGN KEY (`Medecine_id`) REFERENCES `medicine` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`Patient_id`) REFERENCES `patient` (`id`);

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`Patient_id`) REFERENCES `patient` (`id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`Doctor_id`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`Prediction_id`) REFERENCES `prediction` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
