-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 01:10 PM
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
(36, 'John Paul', 'B.', 'Mabasa', 'Male', '32', 'Career Service Professional', 'Information Systems Analyst II', '16', 'Planning and Management Division, Regional Office 02', 'Permanent', 'BS Information Technology/ Master in Information Technology', '07/07/2015', '4.67', '500', '6 years & 7 months', 'OSEC-DENRB-SADOF-21-2014,OSEC-DENRB-ADAS1-66-2004,OSEC-DENRB-DMO2-51-2014,OSEC-DENRB-DMO3-43-2014,OSEC-DENRB-DMO1-32-2014,OSEC-DENRB-LAMO3-69-1998,OSEC-DENRB-DMO2-53-2014,OSEC-DENRB-ADAS1-63-2004,OSEC-DENRB-ENG2-218-1998,OSEC-DENRB-ECOMS2-144-1998,OSEC-DENRB-ENG1-81-1998');

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
(80620193, 'maengmanaligod56256@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular'),
(80620194, 'dacanaymarcos16@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular'),
(80620196, 'remediospauig@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular'),
(80620197, 'linganfe@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular'),
(80620198, 'eric_pasion36@live.com.ph', '81dc9bdb52d04dc20036dbd8313ed055', 'regular'),
(80620199, 'jsdaq18@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular'),
(80620200, 'patdliban@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular'),
(80620201, 'richardgaran@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular'),
(80620202, 'titapamela_edeasis@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular'),
(80620203, 'rsvaldez39@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular'),
(80620204, 'pattyincontrol0910@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular'),
(80620205, 'maryjoyceaquino17@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular'),
(80620206, 'remediospauig1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular'),
(80620207, 'linganfe1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'regular'),
(80620208, 'rondamapong@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'super_admin'),
(80620209, 'cagayan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'super_admin'),
(80620210, 'preciosa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'super_admin');

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
(2, 'test', 'admin', 'account', 'Administrative Regional Office', 'Regional Office', 'admin', 'test', 'test', '\"\"', 'secretariat', 2),
(16, 'Ismael', 'T.', 'Manaligod', 'ARED for Management Services', 'Regional Office', 'maengmanaligod56256@gmail.com', 'PENR Officer', 'OIC, ARED for Management Services', '[{\"province\":\"Regional Office\",\"office_name\":\"Office of the Regional Executive Director\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"PENRO Batanes\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Batanes\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Batanes\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"Regional Office\",\"office_name\":\"Finance Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Planning and Management Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Legal Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Administrative Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Enforcement Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Conservation and Development Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Surveys and Mapping Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Licenses Patents and Deeds Division\"},{\"province\":\"Regional Office\",\"office_name\":\"ARED for Technical Services\"},{\"province\":\"Regional Office\",\"office_name\":\"ARED for Management Services\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"CENRO Nagtipunan\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"CENRO Diffun\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"CENRO Dupax\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"CENRO Aritao\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO San Isidro\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO Palanan\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO Naguilian\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO Cauayan\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO Cabagan\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"CENRO Sanchez Mira\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"CENRO Solana\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"CENRO Aparri\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"CENRO Alcala\"}]', 'chairman', 80620193),
(17, 'Marcos', 'G.', 'Dacanay', 'ARED for Technical Services', 'Regional Office', 'dacanaymarcos16@gmail.com', 'Director III', 'ARED for Technical Services', '[{\"province\":\"Regional Office\",\"office_name\":\"Office of the Regional Executive Director\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"PENRO Batanes\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Batanes\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Batanes\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"Regional Office\",\"office_name\":\"Finance Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Planning and Management Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Legal Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Administrative Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Enforcement Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Conservation and Development Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Surveys and Mapping Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Licenses Patents and Deeds Division\"},{\"province\":\"Regional Office\",\"office_name\":\"ARED for Technical Services\"},{\"province\":\"Regional Office\",\"office_name\":\"ARED for Management Services\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"CENRO Nagtipunan\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"CENRO Diffun\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"CENRO Dupax\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"CENRO Aritao\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO San Isidro\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO Palanan\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO Naguilian\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO Cauayan\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO Cabagan\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"CENRO Sanchez Mira\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"CENRO Solana\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"CENRO Aparri\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"CENRO Alcala\"}]', 'viceChairman', 80620194),
(19, 'Remedios', 'C.', 'Pauig', 'Licenses Patents and Deeds Division', 'Regional Office', 'remediospauig@gmail.com', 'Engineer IV', 'In-Charge, Licenses, Patents and Deeds Division', '[{\"province\":\"Regional Office\",\"office_name\":\"Licenses Patents and Deeds Division\"}]', 'endUser', 80620196),
(20, 'Fe', 'c.', 'Lingan', 'Surveys and Mapping Division', 'Regional Office', 'linganfe@gmail.com', 'Engineer V', 'Chief, Surveys and Mapping Division', '[{\"province\":\"Regional Office\",\"office_name\":\"Surveys and Mapping Division\"}]', 'endUser', 80620197),
(21, 'Enrique', 'Q.', 'Pasion', 'Conservation and Development Division', 'Regional Office', 'eric_pasion36@live.com.ph', 'Development Management Officer V', 'Chief, Conservation and Development Division', '[{\"province\":\"Regional Office\",\"office_name\":\"Conservation and Development Division\"}]', 'endUser', 80620198),
(22, 'Joel', 'S.', 'Daquiaog', 'Enforcement Division', 'Regional Office', 'jsdaq18@yahoo.com', 'Development Management Officer V', 'Chief, Enforcement Division', '[{\"province\":\"Regional Office\",\"office_name\":\"Enforcement Division\"}]', 'endUser', 80620199),
(23, 'Patricia', 'D.', 'Liban', 'Administrative Division', 'Regional Office', 'patdliban@gmail.com', 'Chief Administrative Officer', 'Chief, Administrative Division', '[{\"province\":\"Regional Office\",\"office_name\":\"Office of the Regional Executive Director\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"PENRO Batanes\",\"office_name\":\"Technical Services Division\"},{\"province\":\"PENRO Batanes\",\"office_name\":\"Management Services Division\"},{\"province\":\"PENRO Batanes\",\"office_name\":\"Office of the PENR Officer\"},{\"province\":\"Regional Office\",\"office_name\":\"Finance Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Planning and Management Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Legal Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Administrative Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Enforcement Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Conservation and Development Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Surveys and Mapping Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Licenses Patents and Deeds Division\"},{\"province\":\"Regional Office\",\"office_name\":\"ARED for Technical Services\"},{\"province\":\"Regional Office\",\"office_name\":\"ARED for Management Services\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"CENRO Nagtipunan\"},{\"province\":\"PENRO Quirino\",\"office_name\":\"CENRO Diffun\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"CENRO Dupax\"},{\"province\":\"PENRO Nueva Vizcaya\",\"office_name\":\"CENRO Aritao\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO San Isidro\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO Palanan\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO Naguilian\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO Cauayan\"},{\"province\":\"PENRO Isabela\",\"office_name\":\"CENRO Cabagan\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"CENRO Sanchez Mira\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"CENRO Solana\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"CENRO Aparri\"},{\"province\":\"PENRO Cagayan\",\"office_name\":\"CENRO Alcala\"}]', 'member', 80620200),
(24, 'Richard Jayson', 'c.', 'Garan', 'Legal Division', 'Regional Office', 'richardgaran@gmail.com', 'Attorney V', 'Chief, Legal Division', '[{\"province\":\"Regional Office\",\"office_name\":\"Legal Division\"}]', 'endUser', 80620201),
(25, 'Tita Pamela', 'E.', 'De Asis', 'Planning and Management Division', 'Regional Office', 'titapamela_edeasis@yahoo.com', 'Planning Officer V', 'Chief, Planning and Management Division', '[{\"province\":\"Regional Office\",\"office_name\":\"Planning and Management Division\"}]', 'endUser', 80620202),
(26, 'Romel', 'S.', 'Valdez', 'Finance Division', 'Regional Office', 'rsvaldez39@yahoo.com', 'Chief Administrative Officer', 'Chief, Finance Division', '[{\"province\":\"Regional Office\",\"office_name\":\"Finance Division\"}]', 'endUser', 80620203),
(27, 'Patrick Alymer Harvey', 'C.', 'Paddayuman', 'Conservation and Development Division', 'Regional Office', 'pattyincontrol0910@gmail.com', 'Administrative Aide VI', '', '[{\"province\":\"Regional Office\",\"office_name\":\"Office of the Regional Executive Director\"},{\"province\":\"Regional Office\",\"office_name\":\"Finance Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Planning and Management Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Legal Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Administrative Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Enforcement Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Conservation and Development Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Surveys and Mapping Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Licenses Patents and Deeds Division\"},{\"province\":\"Regional Office\",\"office_name\":\"ARED for Technical Services\"},{\"province\":\"Regional Office\",\"office_name\":\"ARED for Management Services\"}]', 'k4Representative1stLevel', 80620204),
(28, 'Mary Joyce', 'R.', 'Aquino', 'Legal Division', 'Regional Office', 'maryjoyceaquino17@gmail.com', 'Land Management Inspector', '', '[{\"province\":\"Regional Office\",\"office_name\":\"Office of the Regional Executive Director\"},{\"province\":\"Regional Office\",\"office_name\":\"Finance Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Planning and Management Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Legal Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Administrative Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Enforcement Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Conservation and Development Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Surveys and Mapping Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Licenses Patents and Deeds Division\"},{\"province\":\"Regional Office\",\"office_name\":\"ARED for Technical Services\"},{\"province\":\"Regional Office\",\"office_name\":\"ARED for Management Services\"}]', 'gadRepresentative1stLevel', 80620205),
(29, 'Remedios gad', 'C.', 'Pauig', 'Licenses Patents and Deeds Division', 'Regional Office', 'remediospauig1@gmail.com', 'Engineer IV', 'In-Charge, Licenses, Patents and Deeds Division', '[{\"province\":\"Regional Office\",\"office_name\":\"Office of the Regional Executive Director\"},{\"province\":\"Regional Office\",\"office_name\":\"Finance Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Planning and Management Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Legal Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Administrative Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Enforcement Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Conservation and Development Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Surveys and Mapping Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Licenses Patents and Deeds Division\"},{\"province\":\"Regional Office\",\"office_name\":\"ARED for Technical Services\"},{\"province\":\"Regional Office\",\"office_name\":\"ARED for Management Services\"}]', 'gadRepresentative2ndLevel', 80620206),
(30, 'Fe', 'C.', 'Lingan', 'Surveys and Mapping Division', 'Regional Office', 'linganfe1@gmail.com', 'Engineer V', 'Chief, Surveys and Mapping Division', '[{\"province\":\"Regional Office\",\"office_name\":\"Office of the Regional Executive Director\"},{\"province\":\"Regional Office\",\"office_name\":\"Finance Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Planning and Management Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Legal Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Administrative Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Enforcement Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Conservation and Development Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Surveys and Mapping Division\"},{\"province\":\"Regional Office\",\"office_name\":\"Licenses Patents and Deeds Division\"},{\"province\":\"Regional Office\",\"office_name\":\"ARED for Technical Services\"},{\"province\":\"Regional Office\",\"office_name\":\"ARED for Management Services\"}]', 'k4Representative2ndLevel', 80620207),
(31, 'Mariflor', 'C.', 'Tumanguil', 'Administrative Division', 'Regional Office', 'rondamapong@yahoo.com', 'Administrative Officer V', 'Chief, Personnel Section', '[]', 'secretariat', 80620208),
(32, 'HR Cag', 'test', 'test', 'Management Services Division', 'PENRO Cagayan', 'cagayan@gmail.com', 'test', 'test', '[]', 'secretariat', 80620209),
(33, 'Preciosa', 'A.', 'test', 'Management Services Division', 'PENRO Cagayan', 'preciosa@gmail.com', 'yuytu', '34234324', '[]', 'secretariat', 80620210);

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `interview_id` int(65) NOT NULL,
  `interviewed_by` int(65) NOT NULL,
  `provincial_secretariat_id` int(65) NOT NULL,
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
  `is_completed` int(65) NOT NULL,
  `provincial_secretariat_completed` tinyint(1) NOT NULL,
  `rater_user_role` varchar(65) NOT NULL,
  `province_of_rater` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`interview_id`, `interviewed_by`, `provincial_secretariat_id`, `applicant_id`, `plantilla_item_no`, `total_score_a`, `total_score_b`, `total`, `answers`, `date_interviewed`, `applicant_info`, `dd_title`, `education`, `performance`, `training`, `experience`, `written_skill`, `total_added`, `awards`, `comprehensive_remarks`, `is_completed`, `provincial_secretariat_completed`, `rater_user_role`, `province_of_rater`) VALUES
(65, 16, 0, 36, 'OSEC-DENRB-SADOF-21-2014', 4, 6, 10, '{\"Conscientiousness\":\"1\",\"Extraversion\":\"1\",\"Agreeableness\":\"1\",\"Openness_to_experience\":\"1\",\"Emotional_Stability\":\"0\",\"On_devising_and_plan_or_any_activity\":\"1\",\"On_how_to_organize\":\"1\",\"On_implementing\":\"1\",\"On_monitoring\":\"1\",\"Knowledge_of_the_job\":\"1\",\"Logical_presentation_of_ideas\":\"1\",\"remarks\":\"\"}', '2022-03-06', '[{\"applicant_id\":\"36\",\"firstname\":\"John Paul\",\"middlename\":\"B.\",\"lastname\":\"Mabasa\",\"gender\":\"Male\",\"age\":\"32\",\"eligibility\":\"Career Service Professional\",\"position_designation\":\"Information Systems Analyst II\",\"salary_grade\":\"16\",\"place_of_assignment\":\"Planning and Management Division, Regional Office 02\",\"status_of_appointment\":\"Permanent\",\"education_attainment\":\"BS Information Technology\\/ Master in Information Technology\",\"date_of_last_promotion\":\"07\\/07\\/2015\",\"latest_IPCR_rating\":\"4.67\",\"relevant_training_hours\":\"500\",\"relevant_experience\":\"6 years & 7 months\",\"position_applied_for\":\"OSEC-DENRB-SADOF-21-2014,OSEC-DENRB-ADAS1-66-2004,OSEC-DENRB-DMO2-51-2014,OSEC-DENRB-DMO3-43-2014\"}]', 'Supervising Administrative Officer V  OSEC-DENRB-SADOF-21-2014  Technical Services Division - PENRO Cagayan', 2, 2, 2, 2, 2, 10, 2, '', 1, 0, 'chairman', 'Regional Office'),
(66, 21, 0, 36, 'OSEC-DENRB-DMO2-51-2014', 6, 10, 16, '{\"Conscientiousness\":\"1\",\"Extraversion\":\"1\",\"Agreeableness\":\"1\",\"Openness_to_experience\":\"1\",\"Emotional_Stability\":\"2\",\"On_devising_and_plan_or_any_activity\":\"1\",\"On_how_to_organize\":\"1\",\"On_implementing\":\"1\",\"On_monitoring\":\"1\",\"Knowledge_of_the_job\":\"3\",\"Logical_presentation_of_ideas\":\"3\",\"remarks\":\"\"}', '2022-03-06', '[{\"applicant_id\":\"36\",\"firstname\":\"John Paul\",\"middlename\":\"B.\",\"lastname\":\"Mabasa\",\"gender\":\"Male\",\"age\":\"32\",\"eligibility\":\"Career Service Professional\",\"position_designation\":\"Information Systems Analyst II\",\"salary_grade\":\"16\",\"place_of_assignment\":\"Planning and Management Division, Regional Office 02\",\"status_of_appointment\":\"Permanent\",\"education_attainment\":\"BS Information Technology\\/ Master in Information Technology\",\"date_of_last_promotion\":\"07\\/07\\/2015\",\"latest_IPCR_rating\":\"4.67\",\"relevant_training_hours\":\"500\",\"relevant_experience\":\"6 years & 7 months\",\"position_applied_for\":\"OSEC-DENRB-SADOF-21-2014,OSEC-DENRB-ADAS1-66-2004,OSEC-DENRB-DMO2-51-2014,OSEC-DENRB-DMO3-43-2014,OSEC-DENRB-DMO1-32-2014,OSEC-DENRB-LAMO3-69-1998,OSEC-DENRB-DMO2-53-2014,OSEC-DENRB-ADAS1-63-2004\"}]', 'Development Management Officer II  OSEC-DENRB-DMO2-51-2014  Conservation and Development Division - Regional Office', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 'endUser', 'Regional Office'),
(67, 16, 0, 36, 'OSEC-DENRB-DMO2-51-2014', 4, 3, 7, '{\"Conscientiousness\":\"0\",\"Extraversion\":\"1\",\"Agreeableness\":\"1\",\"Openness_to_experience\":\"1\",\"Emotional_Stability\":\"1\",\"On_devising_and_plan_or_any_activity\":\"0\",\"On_how_to_organize\":\"0\",\"On_implementing\":\"0\",\"On_monitoring\":\"0\",\"Knowledge_of_the_job\":\"3\",\"Logical_presentation_of_ideas\":\"0\",\"remarks\":\"\"}', '2022-03-06', '[{\"applicant_id\":\"36\",\"firstname\":\"John Paul\",\"middlename\":\"B.\",\"lastname\":\"Mabasa\",\"gender\":\"Male\",\"age\":\"32\",\"eligibility\":\"Career Service Professional\",\"position_designation\":\"Information Systems Analyst II\",\"salary_grade\":\"16\",\"place_of_assignment\":\"Planning and Management Division, Regional Office 02\",\"status_of_appointment\":\"Permanent\",\"education_attainment\":\"BS Information Technology\\/ Master in Information Technology\",\"date_of_last_promotion\":\"07\\/07\\/2015\",\"latest_IPCR_rating\":\"4.67\",\"relevant_training_hours\":\"500\",\"relevant_experience\":\"6 years & 7 months\",\"position_applied_for\":\"OSEC-DENRB-SADOF-21-2014,OSEC-DENRB-ADAS1-66-2004,OSEC-DENRB-DMO2-51-2014,OSEC-DENRB-DMO3-43-2014,OSEC-DENRB-DMO1-32-2014,OSEC-DENRB-LAMO3-69-1998,OSEC-DENRB-DMO2-53-2014,OSEC-DENRB-ADAS1-63-2004\"}]', 'Development Management Officer II  OSEC-DENRB-DMO2-51-2014  Conservation and Development Division - Regional Office', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 'chairman', 'Regional Office'),
(68, 17, 0, 36, 'OSEC-DENRB-DMO2-51-2014', 5, 6, 11, '{\"Conscientiousness\":\"1\",\"Extraversion\":\"1\",\"Agreeableness\":\"1\",\"Openness_to_experience\":\"1\",\"Emotional_Stability\":\"1\",\"On_devising_and_plan_or_any_activity\":\"1\",\"On_how_to_organize\":\"1\",\"On_implementing\":\"1\",\"On_monitoring\":\"1\",\"Knowledge_of_the_job\":\"1\",\"Logical_presentation_of_ideas\":\"1\",\"remarks\":\"\"}', '2022-03-06', '[{\"applicant_id\":\"36\",\"firstname\":\"John Paul\",\"middlename\":\"B.\",\"lastname\":\"Mabasa\",\"gender\":\"Male\",\"age\":\"32\",\"eligibility\":\"Career Service Professional\",\"position_designation\":\"Information Systems Analyst II\",\"salary_grade\":\"16\",\"place_of_assignment\":\"Planning and Management Division, Regional Office 02\",\"status_of_appointment\":\"Permanent\",\"education_attainment\":\"BS Information Technology\\/ Master in Information Technology\",\"date_of_last_promotion\":\"07\\/07\\/2015\",\"latest_IPCR_rating\":\"4.67\",\"relevant_training_hours\":\"500\",\"relevant_experience\":\"6 years & 7 months\",\"position_applied_for\":\"OSEC-DENRB-SADOF-21-2014,OSEC-DENRB-ADAS1-66-2004,OSEC-DENRB-DMO2-51-2014,OSEC-DENRB-DMO3-43-2014,OSEC-DENRB-DMO1-32-2014,OSEC-DENRB-LAMO3-69-1998,OSEC-DENRB-DMO2-53-2014,OSEC-DENRB-ADAS1-63-2004\"}]', 'Development Management Officer II  OSEC-DENRB-DMO2-51-2014  Conservation and Development Division - Regional Office', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 'viceChairman', 'Regional Office'),
(69, 23, 0, 36, 'OSEC-DENRB-DMO2-51-2014', 5, 6, 11, '{\"Conscientiousness\":\"1\",\"Extraversion\":\"1\",\"Agreeableness\":\"1\",\"Openness_to_experience\":\"1\",\"Emotional_Stability\":\"1\",\"On_devising_and_plan_or_any_activity\":\"1\",\"On_how_to_organize\":\"1\",\"On_implementing\":\"1\",\"On_monitoring\":\"1\",\"Knowledge_of_the_job\":\"1\",\"Logical_presentation_of_ideas\":\"1\",\"remarks\":\"\"}', '2022-03-06', '[{\"applicant_id\":\"36\",\"firstname\":\"John Paul\",\"middlename\":\"B.\",\"lastname\":\"Mabasa\",\"gender\":\"Male\",\"age\":\"32\",\"eligibility\":\"Career Service Professional\",\"position_designation\":\"Information Systems Analyst II\",\"salary_grade\":\"16\",\"place_of_assignment\":\"Planning and Management Division, Regional Office 02\",\"status_of_appointment\":\"Permanent\",\"education_attainment\":\"BS Information Technology\\/ Master in Information Technology\",\"date_of_last_promotion\":\"07\\/07\\/2015\",\"latest_IPCR_rating\":\"4.67\",\"relevant_training_hours\":\"500\",\"relevant_experience\":\"6 years & 7 months\",\"position_applied_for\":\"OSEC-DENRB-SADOF-21-2014,OSEC-DENRB-ADAS1-66-2004,OSEC-DENRB-DMO2-51-2014,OSEC-DENRB-DMO3-43-2014,OSEC-DENRB-DMO1-32-2014,OSEC-DENRB-LAMO3-69-1998,OSEC-DENRB-DMO2-53-2014,OSEC-DENRB-ADAS1-63-2004\"}]', 'Development Management Officer II  OSEC-DENRB-DMO2-51-2014  Conservation and Development Division - Regional Office', 1, 1, 1, 1, 1, 11, 1, 'trial', 1, 0, 'member', 'Regional Office'),
(70, 30, 33, 36, 'OSEC-DENRB-ENG1-81-1998', 10, 10, 20, '{\"Conscientiousness\":\"2\",\"Extraversion\":\"2\",\"Agreeableness\":\"2\",\"Openness_to_experience\":\"2\",\"Emotional_Stability\":\"2\",\"Knowledge_of_the_job\":\"7\",\"Logical_presentation_of_ideas\":\"3\",\"remarks\":\"test\"}', '2022-03-06', '[{\"applicant_id\":\"36\",\"firstname\":\"John Paul\",\"middlename\":\"B.\",\"lastname\":\"Mabasa\",\"gender\":\"Male\",\"age\":\"32\",\"eligibility\":\"Career Service Professional\",\"position_designation\":\"Information Systems Analyst II\",\"salary_grade\":\"16\",\"place_of_assignment\":\"Planning and Management Division, Regional Office 02\",\"status_of_appointment\":\"Permanent\",\"education_attainment\":\"BS Information Technology\\/ Master in Information Technology\",\"date_of_last_promotion\":\"07\\/07\\/2015\",\"latest_IPCR_rating\":\"4.67\",\"relevant_training_hours\":\"500\",\"relevant_experience\":\"6 years & 7 months\",\"position_applied_for\":\"OSEC-DENRB-SADOF-21-2014,OSEC-DENRB-ADAS1-66-2004,OSEC-DENRB-DMO2-51-2014,OSEC-DENRB-DMO3-43-2014,OSEC-DENRB-DMO1-32-2014,OSEC-DENRB-LAMO3-69-1998,OSEC-DENRB-DMO2-53-2014,OSEC-DENRB-ADAS1-63-2004,OSEC-DENRB-ENG2-218-1998,OSEC-DENRB-ECOMS2-144-1998,OSEC-DENRB-ENG1-81-1998\"}]', '', 3, 3, 3, 3, 3, 20, 3, '3', 1, 1, 'k4Representative2ndLevel', 'Regional Office');

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
(17, 'Licenses Patents and Deeds Division', 'Regional Office'),
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
(24, 'Supervising Administrative Officer V', 'OSEC-DENRB-SADOF-21-2014', 'Technical Services Division', 'PENRO Cagayan', 22, 'Bachelors degree relevant to the job', '16 hours of relevant training', '3 years of relevant experience', 'Career Service Professional / Second Level Eligibility', 'Has advanced knowledge in  general administrative concerns particularly human resource management, records, property, other forms of support to operations.', b'1', 1),
(25, 'Administrative Assistant I (Computer Operator I)', 'OSEC-DENRB-ADAS1-66-2004', 'Administrative Division', 'Regional Office', 7, 'Completion of two years studies in college', 'None Required', 'None Required', 'Career Service Subprofessional / Data Encoder (MC 11, s. 1996-Cat. I) / First Level Eligibility', 'Has basic knowledge of computer functions and strong computer operation skills and the ability to troubleshoot computer problems that may arise. \n', b'1', 1),
(26, 'Development Management Officer II', 'OSEC-DENRB-DMO2-51-2014', 'Conservation and Development Division', 'Regional Office', 15, 'Bachelors degree relevant to the job', '4 hours of relevant training', '1 year of relevant experience', 'Career Service Professional / Second Level Eligibility', 'Has intermediate knowledge in the formulation, application and implementation of Integrated Ecosystems Management (IEM)  and other related approaches to  Natural Resources Management (NRM) (FLUP, CRMP, ISWMP, PAMP, IRBM, IWRM) and integration to LGU plans; and can write technical reports and powerpoint presetations', b'1', 1),
(27, 'Development Management Officer III', 'OSEC-DENRB-DMO3-43-2014', 'Enforcement Division', 'Regional Office', 18, 'Bachelors degree relevant to the job', '8 hours of relevant training', '2 years of relevant experience', 'Career Service Professional / Second Level Eligibility', 'Has advanced knowledge and skills in the implementation of appropriate resource management, restoration of various ecosystems, preparation of Natural Resources Management-related plans such as FLUP, CMRP, ISWMP, PAMP, IRBM, IWRM and their integration to LGU plans and application of mitigating measures and evaluation of forest, water and wildlife resource utilization and regulation activities.', b'1', 1),
(28, 'Development Management Officer I', 'OSEC-DENRB-DMO1-32-2014', 'Enforcement Division', 'Regional Office', 11, 'Bachelors degree relevant to the job', 'None Required', 'None Required', 'Career Service Professional / Second Level Eligibility', 'Applies Integrated Ecosystems Management (IEM) and other related approaches to Natural Resources Management', b'1', 1),
(29, 'Attorney IV', 'OSEC-DENRB-ATY4-5-2014', 'Legal Division', 'Regional Office', 23, 'Bachelor of Laws', '8 hours of relevant training', '2 years of relevant experience', 'RA 1080 (BAR)', 'Has advanced skills and extensive experience in Legal Management; policy interpretation and implementation and can consistently apply technical skills and adapt to emerging technology.', b'1', 0),
(30, 'Land Management Officer III', 'OSEC-DENRB-LAMO3-69-1998', 'Licenses Patents and Deeds Division', 'Regional Office', 18, 'Bachelors degree relevant to the job', '8 hours of relevant training', '2 years of relevant experience', 'Career Service Professional / Second Level Eligibility', 'Has advanced knowledge and skills in the disposition of A&D lands and management of other government lands, processing and evaluation of public land applications, forest, water and wildlife resource utilization and regulation activities and in the preparation of tenurial instruments and permits for improved resource management.', b'1', 1),
(31, 'Development Management Officer II', 'OSEC-DENRB-DMO2-53-2014', 'Licenses Patents and Deeds Division', 'Regional Office', 15, 'Bachelors degree relevant to the job', '4 hours of relevant training', '1 year of relevant experience', 'Career Service Professional / Second Level Eligibility', 'Has intermediate knowledge in the formulation, application and implementation of Integrated Ecosystems Management (IEM)  and other related approaches to  Natural Resources Management (NRM) (FLUP, CRMP, ISWMP, PAMP, IRBM, IWRM) and integration to LGU plans; and can write technical reports and powerpoint presetations', b'1', 1),
(32, 'Administrative Assistant I (Computer Operator I)', 'OSEC-DENRB-ADAS1-63-2004', 'Licenses Patents and Deeds Division', 'Regional Office', 7, 'Completion of two years studies in college', 'None Required', 'None Required', 'Career Service Subprofessional / Data Encoder (MC 11, s. 1996-Cat. I) / First Level Eligibility', 'Has basic knowledge of computer functions and strong computer operation skills and the ability to troubleshoot computer problems that may arise. ', b'1', 1),
(33, 'Administrative Aide IV (Driver II)', 'OSEC-DENRB-ADA4-4-2014', 'Office of the Regional Executive Director', 'Regional Office', 4, 'Elementary School Graduate', 'None Required', 'None Required', 'Driver License (MC 11, s. 96 - Cat. II)', 'Has intermediate knowledge in driving government vehicle ;  Can work effectively with office head/supervisor and colleagues; Can carry out minor vehicle maintenance and servicing; and with 20/20 vision. ', b'1', 0),
(34, 'Statistician II', 'OSEC-DENRB-STAT2-13-2014', 'Planning & Management Division', 'Regional Office', 15, 'Bachelors degree relevant to the job', '4 hours of relevant training', '1 year of relevant experience', 'Career Service Professional / Second Level Eligibility', 'Has intermediate knowledge and skills in the analysis of spatial data and integration of statistical and spatial data for conversion to knowledge product.', b'1', 0),
(35, 'Planning Officer I', 'OSEC-DENRB-PLO1-11-2014', 'Planning & Management Division', 'Regional Office', 11, 'Bachelors degree ', 'None Required', 'None Required', 'Career Service Professional / Second Level Eligibility', 'Has intermediate knowledge and skills in the consolidation, review and analysis of local ENR-related proposals in accordance with the approved planning guidelines and preparation of regional budget proposals in accordance with the DBM Circulars and DENR policies.', b'1', 0),
(36, 'Planning Officer IV', 'OSEC-DENRB-PLO4-9-2014', 'Planning and Management Division', 'Regional Office', 22, 'Bachelors degree relevant to the job', '16 hours of relevant training', '3 years of relevant experience', 'Career Service Professional / Second Level Eligibility', 'Has advanced skills and knowledge in  organization development,  strategic planning, and monitoring and evaluation and has  demonstrated ability in conducting mid-year and year-end assessments and planning workshops.', b'1', 0),
(37, 'Cartographer II', 'OSEC-DENRB-CGR2-27-1998', 'Surveys & Mapping Division', 'Regional Office', 8, 'Completion of two years studies in college', '4 hours of relevant training', '1 year of relevant experience', '(MC 10, s. 2013 - Cat. II) / Career Service Subprofessional / First Level Eligibility', 'Has basic knowledge and skills in the provision of land surveying and mapping activities.', b'1', 0),
(38, 'Engineer II (Geodetic Engineer)', 'OSEC-DENRB-ENG2-218-1998', 'Surveys and Mapping Division', 'Regional Office', 16, 'Bachelors degree in Geodetic Engineering relevant to the job', '4 hours of relevant training', '1 year of relevant experience', 'RA 1080 (Geodetic Engineer)', 'Has advanced knowledge and skills in the conduct of surveying and mapping activities, implementation of GIS and LAMS application and development for resource mapping and land management activities.', b'1', 1),
(39, 'Ecosystems Management Specialist II', 'OSEC-DENRB-ECOMS2-144-1998', 'Surveys and Mapping Division', 'Regional Office', 15, 'Bachelors degree relevant to the job', '4 hours of relevant training', '1 year of relevant experience', 'Career Service Professional / Second Level Eligibility', 'Has intermediate knowledge and skills in the identification of appropriate resource management and restoration of various ecosystems; undertaking environmental governance activities that include transparency, accountability, participation, collaboration and functionality.', b'1', 1),
(40, 'Engineer I (Geodetic Engineer)', 'OSEC-DENRB-ENG1-81-1998', 'Surveys and Mapping Division', 'Regional Office', 12, 'Bachelors degree in Geodetic Engineering', 'None Required', 'None Required', 'RA 1080 (Geodetic Engineer)', 'Has intermediate knowledge and skills in the processing and evaluation of public land applications, forest, water and wildlife utilization and regulation activities and preparation of tenurial instruments and permits for improved resource management.', b'1', 1),
(41, 'Ecosystems Management Specialist I', 'OSEC-DENRB-ECOMS1-45-2014', 'Surveys and Mapping Division', 'Regional Office', 11, 'Bachelors degree relevant to the job', 'None Required', 'None Required', 'Career Service Professional / Second Level Eligibility', 'Has intermediate knowledge of the concepts and application of Integrated Ecosystems Management (IEM); identification of interventions and integration of strategies across sectors (Forestry, Coastal, Agriculture, Urban) and Zoning for Strategic Management; and  in Resource Management and Restoration/Rehabilitation \n', b'1', 0),
(42, 'Administrative Officer I (Records Officer I)', 'OSEC-DENRB-ADOF1-213-2004', 'Surveys and Mapping Division', 'Regional Office', 10, 'Bachelors degree ', 'None Required', 'None Required', 'Career Service Professional / Second Level Eligibility', 'Has intermediate knowledge and skills in the implementation of records management and improvements on records keeping.', b'1', 0);

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
(34, 16, 'Ismael T. Manaligod', 36, 'John Paul B. Mabasa', 'OSEC-DENRB-SADOF-21-2014', 'Supervising Administrative Officer V', 'PENRO Cagayan', 'Technical Services Division'),
(35, 16, 'Ismael T. Manaligod', 36, 'John Paul B. Mabasa', 'OSEC-DENRB-ADAS1-66-2004', 'Administrative Assistant I (Computer Operator I)', 'Regional Office', 'Administrative Division'),
(36, 21, 'Enrique Q. Pasion', 36, 'John Paul B. Mabasa', 'OSEC-DENRB-DMO2-51-2014', 'Development Management Officer II', 'Regional Office', 'Conservation and Development Division'),
(37, 16, 'Ismael T. Manaligod', 36, 'John Paul B. Mabasa', 'OSEC-DENRB-DMO2-51-2014', 'Development Management Officer II', 'Regional Office', 'Conservation and Development Division'),
(38, 17, 'Marcos G. Dacanay', 36, 'John Paul B. Mabasa', 'OSEC-DENRB-DMO2-51-2014', 'Development Management Officer II', 'Regional Office', 'Conservation and Development Division'),
(39, 23, 'Patricia D. Liban', 36, 'John Paul B. Mabasa', 'OSEC-DENRB-DMO2-51-2014', 'Development Management Officer II', 'Regional Office', 'Conservation and Development Division'),
(41, 30, 'Fe C. Lingan', 36, 'John Paul B. Mabasa', 'OSEC-DENRB-ENG1-81-1998', 'Engineer I (Geodetic Engineer)', 'Regional Office', 'Surveys and Mapping Division'),
(42, 30, 'Fe C. Lingan', 36, 'John Paul B. Mabasa', 'OSEC-DENRB-ENG1-81-1998', 'Engineer I (Geodetic Engineer)', 'Regional Office', 'Surveys and Mapping Division');

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
  MODIFY `applicant_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `credentials_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80620211;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `interview_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `rated_applicants`
--
ALTER TABLE `rated_applicants`
  MODIFY `rated_applicant_id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
