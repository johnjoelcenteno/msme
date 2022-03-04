-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 05:30 PM
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
  `position_applied_for` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_id`, `firstname`, `middlename`, `lastname`, `gender`, `age`, `eligibility`, `position_designation`, `salary_grade`, `place_of_assignment`, `status_of_appointment`, `education_attainment`, `date_of_last_promotion`, `latest_IPCR_rating`, `relevant_training_hours`, `relevant_experience`, `position_applied_for`) VALUES
(33, 'test', 'applicant', 'account', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'plantillaItemNomber');

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
(2, 'superadmin', '81dc9bdb52d04dc20036dbd8313ed055', 'super_admin'),
(80620179, 'joel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'super_admin'),
(80620180, 'rater@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular');

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
(1, 'test', 'secretariat', 'account', '\"\"', '\"\"', 'secretariat@gmail.com', 'test', 'test', '\"\"', 'secretariat', 1),
(2, 'test', 'admin', 'account', 'test', 'test', 'admin', 'test', 'test', '\"\"', 'secretariat', 2),
(3, 'Joel', 'John', 'Centeno', 'Management Sersvices Division', 'PENRO Cagayan', 'joel@gmail.com', 'positions', 'designation', '[{\"province\":\"Regional Office\",\"office_name\":\"Legal Division\"}]', 'secretariat', 80620179),
(4, 'test', 'rater', 'account', 'Legal Division', 'Regional Office', 'rater@gmail.com', '', 'test', '[{\"province\":\"Regional Office\",\"office_name\":\"Legal Division\"}]', 'endUser', 80620180);

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `interview_id` int(65) NOT NULL,
  `interviewed_by` int(65) NOT NULL,
  `applicant_id` int(65) NOT NULL,
  `plantilla_item_no` varchar(65) NOT NULL,
  `total_score_a` int(65) NOT NULL,
  `total_score_b` int(65) NOT NULL,
  `total` int(65) NOT NULL,
  `answers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`answers`)),
  `date_interviewed` varchar(65) DEFAULT NULL,
  `applicant_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`applicant_info`)),
  `dd_title` longtext NOT NULL,
  `education` int(65) NOT NULL,
  `performance` int(65) NOT NULL,
  `training` int(65) NOT NULL,
  `experience` int(65) NOT NULL,
  `written_skill` int(65) NOT NULL,
  `total_added` int(65) NOT NULL,
  `awards` int(65) NOT NULL,
  `comprehensive_remarks` text NOT NULL,
  `is_completed` int(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`interview_id`, `interviewed_by`, `applicant_id`, `plantilla_item_no`, `total_score_a`, `total_score_b`, `total`, `answers`, `date_interviewed`, `applicant_info`, `dd_title`, `education`, `performance`, `training`, `experience`, `written_skill`, `total_added`, `awards`, `comprehensive_remarks`, `is_completed`) VALUES
(40, 4, 33, 'plantillaItemNomber', 10, 10, 20, '{\"Conscientiousness\":\"2\",\"Extraversion\":\"2\",\"Agreeableness\":\"2\",\"Openness_to_experience\":\"2\",\"Emotional_Stability\":\"2\",\"On_devising_and_plan_or_any_activity\":\"1\",\"On_how_to_organize\":\"1\",\"On_implementing\":\"1\",\"On_monitoring\":\"1\",\"Knowledge_of_the_job\":\"3\",\"Logical_presentation_of_ideas\":\"3\",\"remarks\":\"test\"}', '2022-03-04', '[{\"applicant_id\":\"33\",\"firstname\":\"test\",\"middlename\":\"applicant\",\"lastname\":\"account\",\"gender\":\"1\",\"age\":\"1\",\"eligibility\":\"1\",\"position_designation\":\"1\",\"salary_grade\":\"1\",\"place_of_assignment\":\"1\",\"status_of_appointment\":\"1\",\"education_attainment\":\"1\",\"date_of_last_promotion\":\"1\",\"latest_IPCR_rating\":\"1\",\"relevant_training_hours\":\"1\",\"relevant_experience\":\"1\",\"position_applied_for\":\"plantillaItemNomber\"}]', 'positions title here  plantillaItemNomber  Legal Division - Regional Office', 0, 0, 0, 0, 0, 0, 0, '', 1),
(41, 4, 33, 'plantillaItemNomber', 10, 10, 20, '{\"Conscientiousness\":\"2\",\"Extraversion\":\"2\",\"Agreeableness\":\"2\",\"Openness_to_experience\":\"2\",\"Emotional_Stability\":\"2\",\"On_devising_and_plan_or_any_activity\":\"1\",\"On_how_to_organize\":\"1\",\"On_implementing\":\"1\",\"On_monitoring\":\"1\",\"Knowledge_of_the_job\":\"3\",\"Logical_presentation_of_ideas\":\"3\",\"remarks\":\"test\"}', '2022-03-04', '[{\"applicant_id\":\"33\",\"firstname\":\"test\",\"middlename\":\"applicant\",\"lastname\":\"account\",\"gender\":\"1\",\"age\":\"1\",\"eligibility\":\"1\",\"position_designation\":\"1\",\"salary_grade\":\"1\",\"place_of_assignment\":\"1\",\"status_of_appointment\":\"1\",\"education_attainment\":\"1\",\"date_of_last_promotion\":\"1\",\"latest_IPCR_rating\":\"1\",\"relevant_training_hours\":\"1\",\"relevant_experience\":\"1\",\"position_applied_for\":\"plantillaItemNomber\"}]', 'positions title here  plantillaItemNomber  Legal Division - Regional Office', 0, 0, 0, 0, 0, 0, 0, '', 0),
(42, 4, 33, 'plantillaItemNomber', 10, 10, 20, '{\"Conscientiousness\":\"2\",\"Extraversion\":\"2\",\"Agreeableness\":\"2\",\"Openness_to_experience\":\"2\",\"Emotional_Stability\":\"2\",\"On_devising_and_plan_or_any_activity\":\"1\",\"On_how_to_organize\":\"1\",\"On_implementing\":\"1\",\"On_monitoring\":\"1\",\"Knowledge_of_the_job\":\"3\",\"Logical_presentation_of_ideas\":\"3\",\"remarks\":\"test\"}', '2022-03-04', '[{\"applicant_id\":\"33\",\"firstname\":\"test\",\"middlename\":\"applicant\",\"lastname\":\"account\",\"gender\":\"1\",\"age\":\"1\",\"eligibility\":\"1\",\"position_designation\":\"1\",\"salary_grade\":\"1\",\"place_of_assignment\":\"1\",\"status_of_appointment\":\"1\",\"education_attainment\":\"1\",\"date_of_last_promotion\":\"1\",\"latest_IPCR_rating\":\"1\",\"relevant_training_hours\":\"1\",\"relevant_experience\":\"1\",\"position_applied_for\":\"plantillaItemNomber\"}]', 'positions title here  plantillaItemNomber  Legal Division - Regional Office', 0, 0, 0, 0, 0, 0, 0, '', 0);

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
  `is_vacant` bit(1) NOT NULL,
  `is_for_interview` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_title`, `plantilla_item_no`, `office_name`, `province`, `Salary_job_pay_scale`, `education`, `training`, `expirience`, `eligibility`, `competency`, `is_vacant`, `is_for_interview`) VALUES
(14, 'positions title here', 'plantillaItemNomber', 'Legal Division', 'Regional Office', 15, 'e', 'e', 'e', 'e', 'e', b'1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rated_applicants`
--

CREATE TABLE `rated_applicants` (
  `rated_applicant_id` int(65) NOT NULL,
  `employee_id` int(65) NOT NULL,
  `employee_fullname` varchar(65) NOT NULL,
  `applicant_id` int(65) NOT NULL,
  `applicant_fullname` varchar(65) NOT NULL,
  `plantilla_item_no` varchar(65) NOT NULL,
  `position_title` varchar(65) NOT NULL,
  `employee_province` varchar(65) NOT NULL,
  `employee_office_name` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rated_applicants`
--

INSERT INTO `rated_applicants` (`rated_applicant_id`, `employee_id`, `employee_fullname`, `applicant_id`, `applicant_fullname`, `plantilla_item_no`, `position_title`, `employee_province`, `employee_office_name`) VALUES
(11, 4, 'test rater account', 33, 'test applicant account', 'plantillaItemNomber', 'positions title here', 'PENRO Cagayan', 'Legal Division'),
(12, 4, 'test rater account', 33, 'test applicant account', 'plantillaItemNomber', 'positions title here', 'Regional Office\r\n', 'Legal Division'),
(13, 4, 'test rater account', 33, 'test applicant account', 'plantillaItemNomber', 'positions title here', 'PENRO Cagayan', 'Legal Division');

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
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`interview_id`);

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
-- Indexes for table `rated_applicants`
--
ALTER TABLE `rated_applicants`
  ADD PRIMARY KEY (`rated_applicant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `applicant_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `credentials_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80620181;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `interview_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rated_applicants`
--
ALTER TABLE `rated_applicants`
  MODIFY `rated_applicant_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
