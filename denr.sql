-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 02:52 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

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
(1, 'tst-rsecretariat@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'regular'),
(2, 'superadmin', '81dc9bdb52d04dc20036dbd8313ed055', 'super_admin');

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
  `office_id` int(65) NOT NULL,
  `province` varchar(65) NOT NULL,
  `email_address` varchar(65) NOT NULL,
  `position_id` int(65) NOT NULL,
  `designation` varchar(65) NOT NULL,
  `vacant_position_to_rate` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`vacant_position_to_rate`)),
  `user_role_id` decimal(65,0) NOT NULL,
  `credentials_id` int(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `firstname`, `middlename`, `lastname`, `office_id`, `province`, `email_address`, `position_id`, `designation`, `vacant_position_to_rate`, `user_role_id`, `credentials_id`) VALUES
(1, 'tst', 'secretariat', '', 0, '0', 'tst-secretariat@gmail.com', 0, '0', '\"[]\"', '0', 1),
(2, 'super', '', 'admin', 0, '0', 'superadmin@gmail.com', 0, '0', '\"[]\"', '0', 2);

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
(1, 'PENRO Batanes', 'PENRO Batanes'),
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
(25, 'PENRO Cagayan', 'PENRO Cagayan'),
(26, 'PENRO Isabela', 'PENRO Isabela'),
(27, 'PENRO Nueva Vizcaya', 'PENRO Nueva Vizcaya'),
(28, 'PENRO Nueva Vizcaya', 'PENRO Nueva Vizcaya'),
(29, 'PENRO Quirino', 'PENRO Quirino');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(65) NOT NULL,
  `position_title` text NOT NULL,
  `plantilla_item_no` varchar(65) NOT NULL,
  `office_id` int(65) NOT NULL,
  `Salary_job_pay_scale` int(65) NOT NULL,
  `education` text NOT NULL,
  `training` text NOT NULL,
  `expirience` text NOT NULL,
  `eligibility` text NOT NULL,
  `competency` text NOT NULL,
  `division_id` int(65) NOT NULL,
  `is_vacant` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_title`, `plantilla_item_no`, `office_id`, `Salary_job_pay_scale`, `education`, `training`, `expirience`, `eligibility`, `competency`, `division_id`, `is_vacant`) VALUES
(7, 'Planning Officer III', 'PLO3-28-2014', 26, 18, 'Bachelor\'s Degree', '40 Hours ', '1 Year relevant Expirience', 'Second Level', 'Second Level', 2, b'0'),
(8, 'test', 'test', 1, 1, 'test', 'test', 'test', 'test', 'test', 3, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role_id` int(65) NOT NULL,
  `user_role_name` varchar(65) NOT NULL,
  `user_role_division` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_role_name`, `user_role_division`) VALUES
(1, 'first level primary', 'k4'),
(2, 'first level alternate', 'k4'),
(3, 'second level primary', 'k4'),
(4, 'second level alternate', 'k4'),
(5, 'first level primary', 'gad'),
(6, 'first level alternate', 'gad'),
(7, 'second level primary', 'gad'),
(8, 'second level alternate', 'gad'),
(9, 'chairman', 'hrmpsb_regular_members'),
(10, 'vice_chairman', 'hrmpsb_regular_members'),
(11, 'chief_admin', 'hrmpsb_regular_members'),
(12, 'end_user', 'end_user'),
(13, 'hrmpsb_secretariat', 'hrmpsb_secretariat');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `credentials_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `user_role_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
