-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 05:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denr`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `applicant_id` int(65) NOT NULL,
  `firstname` varchar(65) NOT NULL,
  `middlename` varchar(65) NOT NULL,
  `lastname` varchar(65) NOT NULL,
  `gender` varchar(65) NOT NULL,
  `age` varchar(65) NOT NULL,
  `eligibility` text NOT NULL,
  `position_designation` text NOT NULL,
  `salary_grade` varchar(65) NOT NULL,
  `place_of_assignment` varchar(65) NOT NULL,
  `status_of_appointment` text NOT NULL,
  `education_attainment` text NOT NULL,
  `date_of_last_promotion` varchar(65) NOT NULL,
  `latest_IPCR_rating` varchar(65) NOT NULL,
  `relevant_training_hours` varchar(65) NOT NULL,
  `relevant_experience` text NOT NULL,
  `position_title` varchar(65) NOT NULL,
  `plantilla_item_no` text NOT NULL,
  `office_name` varchar(65) NOT NULL,
  `province` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_id`, `firstname`, `middlename`, `lastname`, `gender`, `age`, `eligibility`, `position_designation`, `salary_grade`, `place_of_assignment`, `status_of_appointment`, `education_attainment`, `date_of_last_promotion`, `latest_IPCR_rating`, `relevant_training_hours`, `relevant_experience`, `position_title`, `plantilla_item_no`, `office_name`, `province`) VALUES
(20, 'test', 'test', 'test', 'test', 'test', 'test', 'test', '1', 'test', 'test', 'tes', 'test', 'test', '1', 'test', 'test', 'testing', 'Office of the PENR Officer', 'PENRO Isabela');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `credentials_id` int(65) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` text NOT NULL,
  `user_type` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`credentials_id`, `username`, `password`, `user_type`) VALUES
(2, 'superadmin', '81dc9bdb52d04dc20036dbd8313ed055', 'super_admin'),
(15, 'email@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `division_id` int(11) NOT NULL,
  `division_name` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`division_id`, `division_name`) VALUES
(1, 'Technical Services Division'),
(2, 'Manage Services Division'),
(3, 'Office of the PENR Officer');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(65) NOT NULL,
  `firstname` varchar(65) NOT NULL,
  `middlename` varchar(65) NOT NULL,
  `lastname` varchar(65) NOT NULL,
  `office_name` varchar(65) NOT NULL,
  `province` varchar(65) NOT NULL,
  `email_address` varchar(65) NOT NULL,
  `position` varchar(65) NOT NULL,
  `designation` varchar(65) NOT NULL,
  `vacant_position_to_rate` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`vacant_position_to_rate`)),
  `user_role` varchar(65) NOT NULL,
  `credentials_id` int(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `firstname`, `middlename`, `lastname`, `office_name`, `province`, `email_address`, `position`, `designation`, `vacant_position_to_rate`, `user_role`, `credentials_id`) VALUES
(2, 'super', '', 'admin', '0', '0', 'superadmin@gmail.com', '0', '0', '\"[]\"', '0', 2),
(16, 'joel', 'john', 'centeno', 'PENRO Batanes', 'PENRO Batanes', 'email@gmail.com', 'position', '', '[]', 'viceChairman', 15);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `office_id` int(65) NOT NULL,
  `office_name` varchar(65) NOT NULL,
  `province` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`office_id`, `office_name`, `province`) VALUES
(2, 'CENRO Alcala', 'PENRO Cagayan'),
(3, 'CENRO Aparri', 'PENRO Cagayan'),
(4, 'CENRO Solana', 'PENRO Cagayan'),
(5, 'CENRO Sanchez Mira', 'PENRO Cagayan'),
(6, 'CENRO Cabagan', 'PENRO Isabela'),
(7, 'CENRO Cauayan', 'PENRO Isabela'),
(8, 'CENRO Naguilian', 'PENRO Isabela'),
(9, 'CENRO Palanan', 'PENRO Isabela'),
(10, 'CENRO San Isidro', 'PENRO Isabela'),
(11, 'CENRO Aritao', 'PENRO Nueva Vizcaya'),
(12, 'CENRO Dupax', 'PENRO Nueva Vizcaya'),
(13, 'CENRO Diffun', 'PENRO Quirino'),
(14, 'CENRO Nagtipunan', 'PENRO Quirino'),
(15, 'ARED for Management Services', 'Regional Office'),
(16, 'ARED for Technical Services', 'Regional Office'),
(17, 'Licenses, Patents and Deeds Division', 'Regional Office'),
(18, 'Surveys and Mapping Division', 'Regional Office'),
(19, 'Conservation and Development Division', 'Regional Office'),
(20, 'Enforcement Division', 'Regional Office'),
(21, 'Administrative Division', 'Regional Office'),
(22, 'Legal Division', 'Regional Office'),
(23, 'Planning and Management Division', 'Regional Office'),
(24, 'Finance Division', 'Regional Office'),
(30, 'Office of the PENR Officer', 'PENRO Batanes'),
(31, 'Management Services Division', 'PENRO Batanes'),
(32, 'Technical Services Division', 'PENRO Batanes'),
(33, 'Office of the PENR Officer', 'PENRO Cagayan'),
(34, 'Management Services Division', 'PENRO Cagayan'),
(35, 'Technical Services Division', 'PENRO Cagayan'),
(36, 'Office of the PENR Officer', 'PENRO Isabela'),
(37, 'Management Services Division', 'PENRO Isabela'),
(38, 'Technical Services Division', 'PENRO Isabela'),
(39, 'Office of the PENR Officer', 'PENRO Nueva Vizcaya'),
(40, 'Management Services Division', 'PENRO Nueva Vizcaya'),
(41, 'Technical Services Division', 'PENRO Nueva Vizcaya'),
(42, 'Office of the PENR Officer', 'PENRO Quirino'),
(43, 'Management Services Division', 'PENRO Quirino'),
(44, 'Technical Services Division', 'PENRO Quirino'),
(45, 'Office of the Regional Executive Director', 'Regional Office');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(65) NOT NULL,
  `position_title` text NOT NULL,
  `plantilla_item_no` varchar(65) NOT NULL,
  `office_name` varchar(65) NOT NULL,
  `province` varchar(65) NOT NULL,
  `Salary_job_pay_scale` int(65) NOT NULL,
  `education` text NOT NULL,
  `training` text NOT NULL,
  `expirience` text NOT NULL,
  `eligibility` text NOT NULL,
  `competency` text NOT NULL,
  `is_vacant` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_title`, `plantilla_item_no`, `office_name`, `province`, `Salary_job_pay_scale`, `education`, `training`, `expirience`, `eligibility`, `competency`, `is_vacant`) VALUES
(10, 'test', 'testing', 'Office of the PENR Officer', 'PENRO Isabela', 1, 'test', 'test', 'test', 'test', 'test', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`credentials_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `applicant_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `credentials_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
