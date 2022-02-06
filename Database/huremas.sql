-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 26, 2022 at 01:53 AM
-- Server version: 10.5.13-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u418351397_huremas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `default_password` varchar(60) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `employee_id`, `username`, `password`, `default_password`, `type`, `date_created`) VALUES
(1, 'CVSUEJT052613497', 'admin', '$2y$10$QVz9YLnUli42vjPBwD2HQeFvqanf4U/EDfVbqwXe6bvyQLYWDdig6', 'admin123', 'admin', '2021-12-12 16:15:30'),
(60, 'CVSUGAX328615479', 'ong.francis_5479', '$2y$10$vT202qAglrka1z3oB/WbSOfGAFipb3tXlJNE0gw4MCIAvRjweoFTC', '7A593F4I0162', 'employee', '2022-01-25 02:49:17'),
(62, 'CVSUNOU746588823', 'pangilinan.ken_8823', '$2y$10$lNhM917BvIiM4wslk2EJ.eVVaHH7anPsmbg6NDpHD65XaZLpC4n.6', 'Y1685307OG29', 'employee', '2022-01-25 04:40:59'),
(63, 'CVSUIAO469172580', 'cruz.juan_2580', '$2y$10$ZayBzzmFBlLQq9OKzl96eeFxliHydSullsLSq/K5GwBBGsrDdkLBa', '589E7436S12O', 'employee', '2022-01-25 04:44:34'),
(64, 'CVSUPOB591062721', 'villanueva.mark_2721', '$2y$10$E6WnGIE65DmrSqG.42l6VOcmPbmwhfKlxPHvybR/OkLfm5C.hZiFq', '764S03281K5M', 'employee', '2022-01-25 05:22:00'),
(65, 'CVSUJMV260851479', 'howard.klaus_1479', '$2y$10$F//VCDwxcPA/INa0pGKAFOsNMxxMyGLX592QTM5DQQ4pDicKnzhxK', '91M72654B3H0', 'employee', '2022-01-25 06:14:23'),
(66, 'CVSUUFR643709143', 'poli.denzel_9143', '$2y$10$wFeuGYsziOMzFMkdETelzukrlekbujXbgp4LdxLv0nYotHmNtr8Ly', '2I64H95Y7013', 'employee', '2022-01-25 06:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `admin_document_request`
--

CREATE TABLE `admin_document_request` (
  `id` int(11) NOT NULL,
  `reference_id` int(50) NOT NULL,
  `name` int(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `employee_id` varchar(50) NOT NULL,
  `internal_note` text NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `validate` int(11) NOT NULL DEFAULT 0 COMMENT '0-pending\r\n0-validated',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0-pending\r\n1-replied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `allowance`
--

CREATE TABLE `allowance` (
  `id` int(30) NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `details` text NOT NULL,
  `status` varchar(3) NOT NULL COMMENT '0=pending;1=approved;2=rejected	',
  `evaluated_by` varchar(50) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allowance`
--

INSERT INTO `allowance` (`id`, `employee_id`, `date`, `start`, `end`, `details`, `status`, `evaluated_by`, `cash`, `notes`) VALUES
(1, 'CVSUNOU746588823', '2022-01-28', '00:00:00', '12:00:00', 'Kenskie Birthday', '1', 'Ran Taken', '100.00', ''),
(2, 'CVSUNOU746588823', '2022-01-25', '13:02:00', '14:02:00', 'Defense Schedule', '0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(11) NOT NULL,
  `applicant_no` bigint(20) NOT NULL,
  `job_code` varchar(100) NOT NULL,
  `application_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `stage` varchar(50) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `applicant_no`, `job_code`, `application_date`, `first_name`, `middle_name`, `last_name`, `email`, `contact`, `attachment`, `stage`, `notes`) VALUES
(1, 2022753694208, 'CVSUJOBAQM86914', '2022-01-25 04:34:08', 'Ken', '', 'Pangilinan', 'kriegberg37@gmail.com', '4763233', '2022753694208.pdf', 'On-Board', ''),
(2, 2022743896520, 'CVSUJOBAQM86914', '2022-01-25 04:35:41', 'JOel', '', 'Sanpablo', 'kriegberg37@gmail.com', '4751243', '2022743896520.pdf', 'New Candidates', ''),
(3, 2022418762905, 'CVSUJOBUQN52409', '2022-01-25 05:15:23', 'Mark', 'Jason', 'Villanueva', 'francis.ong25@gmail.com', '03243857435', '2022418762905.pdf', 'On-Board', 'sample'),
(4, 2022869124570, 'CVSUJOBPUY92714', '2022-01-25 06:41:26', 'Denzel', '', 'Poli', 'randolf.bellon@cvsu.edu.ph', '476323322', '2022869124570.pdf', 'On-Board', '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(30) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `time_in` datetime NOT NULL DEFAULT current_timestamp(),
  `time_out` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `date_created`, `time_in`, `time_out`) VALUES
(1, 'CVSUGAX328615479', '2022-01-25 03:09:05', '2022-01-25 03:09:00', '2022-01-25 15:09:00'),
(2, 'CVSUIAO469172580', '2022-01-25 04:56:53', '2022-01-24 00:56:00', '2022-01-24 12:56:00'),
(4, 'CVSUNOU746588823', '2022-01-25 04:58:56', '2022-01-25 00:58:00', '2022-01-25 12:58:00'),
(5, 'CVSUGAX328615479', '2022-01-25 04:59:40', '2022-01-23 00:59:00', '2022-01-23 12:59:00'),
(6, 'CVSUGAX328615479', '2022-01-25 05:00:13', '2022-01-22 00:59:00', '2022-01-22 12:59:00'),
(7, 'CVSUGAX328615479', '2022-01-25 05:18:09', '2022-01-24 05:18:00', '2022-01-24 17:18:00'),
(8, 'CVSUGAX328615479', '2022-01-25 07:14:47', '2022-01-25 07:14:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_correction`
--

CREATE TABLE `attendance_correction` (
  `id` int(30) NOT NULL,
  `attendance_id` int(30) NOT NULL,
  `req_in` datetime DEFAULT NULL,
  `req_out` datetime DEFAULT NULL,
  `status` varchar(2) NOT NULL COMMENT '0=pending;1=approved;2=rejected',
  `reason` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `reviewed_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_correction`
--

INSERT INTO `attendance_correction` (`id`, `attendance_id`, `req_in`, `req_out`, `status`, `reason`, `date_created`, `reviewed_by`) VALUES
(1, 1, '2022-01-25 03:09:00', '2022-01-25 15:09:00', '1', 'Wrong submition', '2022-01-25 03:09:31', 'Ran Taken'),
(2, 7, '2022-01-24 05:18:00', '2022-01-24 17:18:00', '1', 'misclick', '2022-01-25 05:18:35', 'Ran Taken');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id` int(11) NOT NULL,
  `benefit_id` varchar(20) NOT NULL,
  `benefit_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `benefit_id`, `benefit_name`, `description`) VALUES
(1, 'CVSUBENCGK906257138', '13th Month Pay', 'Receive 13th Month Pay');

-- --------------------------------------------------------

--
-- Table structure for table `benefit_record`
--

CREATE TABLE `benefit_record` (
  `id` int(11) NOT NULL,
  `benefit_id` varchar(100) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `date_applied` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benefit_record`
--

INSERT INTO `benefit_record` (`id`, `benefit_id`, `employee_id`, `date_applied`) VALUES
(1, 'CVSUBENCGK906257138', 'CVSUBXP304892576', '2022-01-25'),
(2, 'CVSUBENCGK906257138', 'CVSUPOB591062721', '2022-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `cash_advance`
--

CREATE TABLE `cash_advance` (
  `id` int(11) NOT NULL,
  `reference_id` varchar(20) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `req_date` date NOT NULL,
  `ca_type` varchar(20) NOT NULL,
  `ca_reason` varchar(100) NOT NULL,
  `ca_account` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reviewed_by` varchar(100) DEFAULT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash_advance`
--

INSERT INTO `cash_advance` (`id`, `reference_id`, `employee_id`, `req_date`, `ca_type`, `ca_reason`, `ca_account`, `amount`, `status`, `reviewed_by`, `notes`) VALUES
(1, 'CAXUT746520913', 'CVSUNOU746588823', '2022-01-25', 'Cash', 'Need bgl', '', '10000', 'Pending', NULL, ''),
(2, 'CAJIY923408157', 'CVSUNOU746588823', '2022-01-25', 'Cash', 'Bgl', '', '817', 'Rejected', 'Ran Taken', 'asd'),
(3, 'CAOWN094218567', 'CVSUNOU746588823', '2022-01-25', 'Cash', 'Pang date', '', '10000', 'Pending', NULL, ''),
(4, 'CAUFK160745328', 'CVSUNOU746588823', '2022-01-25', 'Cheque', 'Buy House And Lot', '', '10500', 'Pending', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE `deduction` (
  `id` int(11) NOT NULL,
  `deduction_code` varchar(25) NOT NULL,
  `deduction_name` varchar(50) NOT NULL,
  `deduction_type` varchar(50) NOT NULL,
  `deduction_desc` text NOT NULL,
  `deduction_vendor` int(11) NOT NULL,
  `amount_rate` double NOT NULL,
  `deduction_limit` double NOT NULL,
  `deduction_period` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`id`, `deduction_code`, `deduction_name`, `deduction_type`, `deduction_desc`, `deduction_vendor`, `amount_rate`, `deduction_limit`, `deduction_period`) VALUES
(1, 'CVSUDTIJZT3281', 'SSS', 'Fixed Amount', 'sample', 1, 50, 0, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `deduction_employee`
--

CREATE TABLE `deduction_employee` (
  `id` int(30) NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `deduction_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deduction_vendor`
--

CREATE TABLE `deduction_vendor` (
  `id` int(11) NOT NULL,
  `vendor_code` varchar(25) NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `vendor_address` varchar(255) NOT NULL,
  `vendor_type` varchar(25) NOT NULL,
  `vendor_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deduction_vendor`
--

INSERT INTO `deduction_vendor` (`id`, `vendor_code`, `account_id`, `vendor_name`, `vendor_address`, `vendor_type`, `vendor_details`) VALUES
(1, 'CVSUVENMKR30867', 'Sample', 'BIR', 'Sample', 'Government', 'Sample');

-- --------------------------------------------------------

--
-- Table structure for table `department_category`
--

CREATE TABLE `department_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_category`
--

INSERT INTO `department_category` (`id`, `title`, `code`) VALUES
(1, 'Department of Information Technology', 'DIT'),
(2, 'Department of Natural Science', 'NatSci'),
(3, 'Non - Academics', 'NAcads'),
(4, 'Department of Business Management', 'DBM'),
(5, 'Department of Social Science and Humanities', 'DSSH'),
(6, 'Department of Physical Education', 'DPE'),
(7, 'Department of Hospitality Management', 'DHM');

-- --------------------------------------------------------

--
-- Table structure for table `disciplinary_action`
--

CREATE TABLE `disciplinary_action` (
  `id` int(11) NOT NULL,
  `reference_id` varchar(50) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `issued_date` date NOT NULL DEFAULT current_timestamp(),
  `reason` int(11) NOT NULL,
  `internal_note` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `explanation` text NOT NULL,
  `action` varchar(500) NOT NULL,
  `action_details` text NOT NULL,
  `issued_by` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disciplinary_action`
--

INSERT INTO `disciplinary_action` (`id`, `reference_id`, `employee_id`, `issued_date`, `reason`, `internal_note`, `attachment`, `explanation`, `action`, `action_details`, `issued_by`, `state`) VALUES
(1, 'CVSUDAMIG39867', 'CVSUGAX328615479', '2022-01-25', 1, 'Too much noise', 'CVSUDAMIG39867.pdf', 'Sample', '', '', 'Ran Taken', 'Responded');

-- --------------------------------------------------------

--
-- Table structure for table `disciplinary_category`
--

CREATE TABLE `disciplinary_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(20) NOT NULL,
  `cat_type` varchar(100) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disciplinary_category`
--

INSERT INTO `disciplinary_category` (`id`, `title`, `code`, `cat_type`, `details`) VALUES
(1, 'Verbal Abuse', '', 'Serious', 'Too much words');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `document_id` varchar(50) NOT NULL,
  `document_name` varchar(50) NOT NULL,
  `document_type` varchar(20) NOT NULL,
  `document_owner` varchar(50) DEFAULT NULL,
  `document_folder` varchar(50) NOT NULL,
  `document_date` date NOT NULL DEFAULT current_timestamp(),
  `document_details` text NOT NULL,
  `document_created` varchar(50) NOT NULL,
  `document_status` int(11) DEFAULT 0 COMMENT '	0 -> unlock 1 -> locked	',
  `document_file` varchar(255) NOT NULL,
  `document_archive` int(11) NOT NULL DEFAULT 0 COMMENT '0 -> active\r\n1 -> acthive',
  `document_starred` int(11) NOT NULL DEFAULT 0 COMMENT '0->star 1->starred'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `document_id`, `document_name`, `document_type`, `document_owner`, `document_folder`, `document_date`, `document_details`, `document_created`, `document_status`, `document_file`, `document_archive`, `document_starred`) VALUES
(1, 'CVSUDOXCJUY824390', 'Testings', 'document', '', 'CVSUFOLDZVS612895', '2022-01-25', 'Sample', 'CVSUEJT052613497', 0, 'file.png', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `document_folder`
--

CREATE TABLE `document_folder` (
  `id` int(11) NOT NULL,
  `folder_id` varchar(50) NOT NULL,
  `folder_name` varchar(100) NOT NULL,
  `folder_date` date NOT NULL DEFAULT current_timestamp(),
  `folder_details` text NOT NULL,
  `folder_created_by` varchar(50) NOT NULL,
  `folder_archive` int(11) NOT NULL DEFAULT 0 COMMENT '0 -> active\r\n1->archive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document_folder`
--

INSERT INTO `document_folder` (`id`, `folder_id`, `folder_name`, `folder_date`, `folder_details`, `folder_created_by`, `folder_archive`) VALUES
(1, 'CVSUFOLDQRM164983', 'sample', '2021-12-13', 'sample details', 'CVSUEJT052613497', 0),
(2, 'CVSUFOLDRVA914207', 'edited', '2021-12-13', 'edited details\r\n', 'CVSUEJT052613497', 0),
(3, 'CVSUFOLDUGH894672', 'hahah123', '2021-12-13', 'ahahaha123', 'CVSUEJT052613497', 1),
(7, 'CVSUFOLDWGR654029', 'sample archive 2', '2021-12-13', 'xd111', 'CVSUEJT052613497', 1),
(8, 'CVSUFOLDMFZ079283', 'archive sample', '2021-12-13', '1111', 'CVSUEJT052613497', 1),
(9, 'CVSUFOLDWRK269834', 'Sample Folder', '2021-12-13', 'Sample Folder', 'CVSUEJT052613497', 0),
(10, 'CVSUFOLDHTR701459', 'otherss', '2021-12-14', 'sdad', 'CVSUEJT052613497', 0),
(11, 'CVSUFOLDIKN368025', 'Employee Diplomas', '2021-12-14', 'Employee Diplomas', 'CVSUEJT052613497', 0),
(12, 'CVSUFOLDRCW703614', 'Educ Dept Folder', '2021-12-26', 'Educ Dept Folder', 'CVSUEJT052613497', 0),
(13, 'CVSUFOLDXTH612374', 'IT Dept Folder', '2022-01-24', 'IT Dept Folder', 'CVSUEJT052613497', 0),
(14, 'CVSUFOLDZVS612895', 'Testing', '2022-01-25', 'Test', 'CVSUEJT052613497', 0);

-- --------------------------------------------------------

--
-- Table structure for table `document_request`
--

CREATE TABLE `document_request` (
  `id` int(11) NOT NULL,
  `reference_id` varchar(50) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp(),
  `request_name` varchar(100) NOT NULL,
  `request_note` text NOT NULL,
  `request_file` varchar(100) DEFAULT NULL,
  `request_status` int(11) NOT NULL DEFAULT 0 COMMENT '0-pending 1-replied 2-rejected 3-validated\r\n1-replied\r\n2-rejected',
  `request_comment` text DEFAULT NULL,
  `request_by` varchar(10) NOT NULL,
  `folder_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document_request`
--

INSERT INTO `document_request` (`id`, `reference_id`, `employee_id`, `request_date`, `request_name`, `request_note`, `request_file`, `request_status`, `request_comment`, `request_by`, `folder_id`) VALUES
(0, 'CVSUREQAGMS257908', 'CVSUNOU746588823', '2022-01-25', 'Growpedia', 'Hello', 'pdf.png', 1, 'he', 'employee', NULL),
(0, 'CVSUREQAEAZ580492', 'CVSUNOU746588823', '2022-01-25', 'BirtCertificate', 'I request BirthCertificate', NULL, 0, NULL, 'employee', NULL),
(0, 'CVSUREQAORX746139', 'CVSUGAX328615479', '2022-01-25', 'sample Request', 'sample note', 'csv.png', 1, 'asd', 'admin', NULL),
(0, 'CVSUREQAVMW426397', 'CVSUGAX328615479', '2022-01-25', 'Need file', 'sample', NULL, 0, NULL, 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `contact_info` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `position_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date_hired` date DEFAULT NULL,
  `sss_id` varchar(50) DEFAULT NULL,
  `pagibig_id` varchar(50) DEFAULT NULL,
  `philhealth_id` varchar(50) DEFAULT NULL,
  `tin_num` varchar(50) DEFAULT NULL,
  `sss_prem` decimal(10,2) DEFAULT NULL,
  `philhealth_prem` decimal(10,2) DEFAULT NULL,
  `pagibig_prem` decimal(10,2) DEFAULT NULL,
  `created_date` date NOT NULL,
  `employee_archive` int(11) DEFAULT 0 COMMENT '0- active 1-archved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `firstname`, `middlename`, `lastname`, `suffix`, `address`, `birthdate`, `mobile_no`, `contact_info`, `email`, `sex`, `photo`, `position_id`, `department_id`, `schedule_id`, `category_id`, `date_hired`, `sss_id`, `pagibig_id`, `philhealth_id`, `tin_num`, `sss_prem`, `philhealth_prem`, `pagibig_prem`, `created_date`, `employee_archive`) VALUES
(3, 'CVSUEJT052613497', 'Ran', 'Was', 'Taken', 'XD', 'Salina', '2002-11-15', '09262487125', '4763233', 'dr.ranzkie99@gmail.com', 'Male', 'Untitled9.png', 7, 2, 3, 1, '2013-06-04', '34-6581234-4', '121253674428', '082504598536', '439-126-266-0488', '338.00', '112.50', '100.00', '2021-10-04', 0),
(65, 'CVSUGAX328615479', 'Francis', 'Condino', 'Ong', '', 'Bacoor City', '0000-00-00', '09991234567', '136-1321', 'francis.ong25@gmail.com', 'Male', 'faq_man.png', 9, 1, 0, 2, '2022-01-25', '439-126-456-0475', '439-126-456-0475', '439-126-456-0475', '439-126-456-0475', NULL, NULL, NULL, '2022-01-25', 0),
(66, 'CVSUIAO469172580', 'Juan', 'Dela', 'Cruz', '', 'Salinas 1', '0000-00-00', '09991234567', '136-1321', 'randolf.bellon@cvsu.edu.ph', 'Male', 'avatar-2.jpg', 9, 1, 0, 2, '2022-01-25', '439-126-456-0475', '439-126-456-0475', '439-126-456-0475', '439-126-456-0475', NULL, NULL, NULL, '2022-01-25', 0),
(67, 'CVSUBXP304892576', 'David', '', 'Estacion', '', 'Molino', '0000-00-00', '09262198154', '09121353153', 'kriegberg37@gmail.com', 'Male', 'avatar-3.jpg', 9, 1, 0, 2, '2022-01-25', '', '', '', '339-684-148-0003', NULL, NULL, NULL, '2022-01-25', 0),
(68, 'CVSUNOU746588823', 'Ken', '', 'Pangilinan', '', 'Salinas', '1996-06-04', '09262198123', '4763233', 'kriegberg37@gmail.com', 'Male', 'CVSUCVSUNOU746588823.jpg', 9, 1, 0, 2, '2022-01-25', '34-6451234-0', '121256374429', '2424234', '439-126-456-0475', NULL, NULL, NULL, '2022-01-25', 0),
(69, 'CVSUPOB591062721', 'Mark', 'Jason', 'Villanueva', 'Jr.', 'Salinas 1', '1999-06-08', '0354523', '03243857435', 'francis.ong25@gmail.com', 'Male', 'CVSUCVSUPOB591062721.jpg', 3, 3, 0, 1, '2022-01-25', '439-126-456-0475', '439-126-456-0475', '3123-12312-32', '1231-2312321', NULL, NULL, NULL, '2022-01-25', 0),
(70, 'CVSUJMV260851479', 'Klaus', '', 'Howard', '', 'Sample', '1999-12-15', '09262198154', '09121353153', 'kriegberg37@gmail.com', 'Male', '996.jpg', 9, 1, 0, 2, '2022-01-25', '', '', '', '339-684-148-0000', NULL, NULL, NULL, '2022-01-25', 0),
(71, 'CVSUUFR643709143', 'Denzel', '', 'Poli', '', 'Sample', '1998-03-11', '09262198154', '476323322', 'randolf.bellon@cvsu.edu.ph', 'Male', 'CVSUCVSUUFR643709143.jpg', 1, 1, 0, 1, '2022-01-25', '34-6451234-0', '121253674428', '2424234', '439-126-456-0475', NULL, NULL, NULL, '2022-01-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_document_request`
--

CREATE TABLE `employee_document_request` (
  `id` int(11) NOT NULL,
  `reference_id` varchar(50) NOT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp(),
  `name` varchar(100) NOT NULL,
  `internal_note` text NOT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0-pending\r\n1-replied\r\n2-rejected',
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employment_category`
--

CREATE TABLE `employment_category` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employment_category`
--

INSERT INTO `employment_category` (`id`, `code`, `cat`) VALUES
(1, 'CNT', 'Contractual'),
(2, 'JO', 'Job Order');

-- --------------------------------------------------------

--
-- Table structure for table `emp_max_hours`
--

CREATE TABLE `emp_max_hours` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `Monday` decimal(10,2) NOT NULL,
  `Tuesday` decimal(10,2) NOT NULL,
  `Wednesday` decimal(10,2) NOT NULL,
  `Thursday` decimal(10,2) NOT NULL,
  `Friday` decimal(10,2) NOT NULL,
  `Saturday` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_max_hours`
--

INSERT INTO `emp_max_hours` (`id`, `employee_id`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`) VALUES
(1, 'CVSUEJT052613497', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(25, 'CVSUGAX328615479', '6.00', '6.00', '6.50', '9.00', '6.50', '6.00'),
(26, 'CVSUIAO469172580', '4.00', '4.50', '4.00', '8.00', '3.00', '4.50'),
(27, 'CVSUBXP304892576', '3.00', '2.00', '3.00', '2.00', '1.50', '1.50'),
(28, 'CVSUNOU746588823', '4.00', '3.50', '3.00', '3.00', '2.00', '4.00'),
(29, 'CVSUPOB591062721', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(30, 'CVSUJMV260851479', '3.00', '2.50', '2.00', '1.50', '2.00', '2.50'),
(31, 'CVSUUFR643709143', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `reference_id` varchar(50) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `display_image` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_from` time NOT NULL,
  `event_to` time NOT NULL,
  `event_venue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `reference_id`, `event_name`, `display_image`, `event_date`, `event_from`, `event_to`, `event_venue`) VALUES
(1, 'CVSUEVBEO3682', 'Chart day', 'CVSUEVBEO3682.png', '2022-01-25', '11:41:00', '23:41:00', 'Cvsu Imus'),
(2, 'CVSUEVHKS7425', 'IT day', 'CVSUEVHKS7425.jpg', '2022-02-05', '07:40:00', '20:40:00', 'CVSU Imus'),
(3, 'CVSUEVRTE0684', 'CVSU Event 2021', 'CVSUEVRTE0684.jpg', '2022-02-03', '01:43:00', '13:43:00', 'CVSu Imus Covered Court');

-- --------------------------------------------------------

--
-- Table structure for table `event_request`
--

CREATE TABLE `event_request` (
  `id` int(11) NOT NULL,
  `reference_id` varchar(50) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `display_image` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_from` time NOT NULL,
  `event_to` time NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `request_status` int(11) NOT NULL DEFAULT 0,
  `employee_id` varchar(100) NOT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp(),
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_request`
--

INSERT INTO `event_request` (`id`, `reference_id`, `event_name`, `display_image`, `event_date`, `event_from`, `event_to`, `event_venue`, `request_status`, `employee_id`, `request_date`, `details`) VALUES
(1, 'CVSUEVLKG1026', 'IT Event', 'CVSUEVLKG1026.jpg', '2022-02-03', '01:40:00', '13:40:00', 'CVSU Covered Court', 2, 'CVSUGAX328615479', '2022-01-25', 'CVSu event 2022'),
(2, 'CVSUEVHKS7425', 'IT day', 'CVSUEVHKS7425.jpg', '2022-02-05', '07:40:00', '20:40:00', 'CVSU Imus', 1, 'CVSUGAX328615479', '2022-01-25', 'A day for IT Students'),
(3, 'CVSUEVRTE0684', 'CVSU Event 2021', 'CVSUEVRTE0684.jpg', '2022-02-03', '01:43:00', '13:43:00', 'CVSu Imus Covered Court', 1, 'CVSUGAX328615479', '2022-01-25', 'CVSu Event for 3rd Years');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `job_code` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_position` int(11) NOT NULL,
  `job_recruit` int(11) NOT NULL,
  `job_dept` int(11) NOT NULL,
  `job_term` varchar(50) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `job_exp` varchar(50) NOT NULL,
  `job_grade` int(11) NOT NULL,
  `job_desc` text NOT NULL,
  `job_status` varchar(50) NOT NULL,
  `job_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `job_code`, `job_title`, `job_position`, `job_recruit`, `job_dept`, `job_term`, `job_type`, `job_exp`, `job_grade`, `job_desc`, `job_status`, `job_date`) VALUES
(1, 'CVSUJOBAQM86914', 'IT Instructor', 1, 8, 1, 'Contract', 'null', 'Atleast One (1) Year of Experience', 10, 'Teach IT', 'active', '2022-01-25 04:32:37'),
(2, 'CVSUJOBUQN52409', 'Janitor with 10k signing BONUS', 3, 3, 3, 'Contract', 'null', 'No Experience Needed', 10, 'Benefits: 13th Month Pay etc.', 'active', '2022-01-25 05:11:32'),
(3, 'CVSUJOBPUY92714', 'Sample', 1, 4, 1, 'Temporary', 'null', '2 Years + of Experience', 11, 'Smaple', 'active', '2022-01-25 06:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `reference_id` varchar(50) NOT NULL,
  `news_date` date NOT NULL DEFAULT current_timestamp(),
  `news_headline` varchar(255) NOT NULL,
  `display_image` varchar(255) NOT NULL,
  `news_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `reference_id`, `news_date`, `news_headline`, `display_image`, `news_details`) VALUES
(1, 'CVSUNEWSZWQ594826730', '2022-01-25', 'UK Day', 'CVSUNEWSZWQ594826730.jpg', 'UK day celebration'),
(2, 'CVSUNEWSLUD547213806', '2022-01-25', 'PH Day', 'CVSUNEWSLUD547213806.png', 'Sample');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `link` varchar(50) NOT NULL,
  `open` int(11) NOT NULL DEFAULT 0 COMMENT '0 ->not yet open\r\n1 opened',
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `employee_id`, `title`, `date`, `link`, `open`, `type`) VALUES
(1, 'CVSUGAX328615479', 'Francis Onghas timed-in', '2022-01-25', 'dtr.php', 0, 'admin'),
(2, 'CVSUGAX328615479', 'Francis Onghas timed-out', '2022-01-25', 'dtr.php', 0, 'admin'),
(3, 'CVSUGAX328615479', 'Francis Ong sent a request for attendance correction', '2022-01-25', 'record_correction.php', 0, 'admin'),
(4, 'CVSUGAX328615479', 'You have new disciplinary record ', '2022-01-25', 'disciplinary.php', 0, 'employee'),
(5, 'CVSUGAX328615479', 'Your attendance correction has been evaluated', '2022-01-25', 'dtr.php', 0, 'employee'),
(6, 'CVSUNOU746588823', 'Ken Pangilinan send a cash advance request', '2022-01-25', 'cash_advance.php', 0, 'admin'),
(7, 'CVSUNOU746588823', 'Ken Pangilinan send a cash advance request', '2022-01-25', 'cash_advance.php', 0, 'admin'),
(8, 'CVSUNOU746588823', 'Ken Pangilinan send a cash advance request', '2022-01-25', 'cash_advance.php', 0, 'admin'),
(9, 'CVSUNOU746588823', 'Ken Pangilinan send a cash advance request', '2022-01-25', 'cash_advance.php', 0, 'admin'),
(10, 'CVSUNOU746588823', 'Ken Pangilinan send a document request', '2022-01-25', 'documents.php', 0, 'admin'),
(11, 'CVSUNOU746588823', 'Ken Pangilinan send a document request', '2022-01-25', 'documents.php', 0, 'admin'),
(12, 'CVSUNOU746588823', 'Ken Pangilinan sent a official business request', '2022-01-25', 'official_business.php', 0, 'admin'),
(13, 'CVSUNOU746588823', 'Ken Pangilinan sent a official business request', '2022-01-25', 'official_business.php', 0, 'admin'),
(14, 'CVSUNOU746588823', 'Ken Pangilinan send a overtime request', '2022-01-25', 'overtime.php', 0, 'admin'),
(15, 'CVSUNOU746588823', 'Ken Pangilinan send a overtime request', '2022-01-25', 'overtime.php', 0, 'admin'),
(16, 'CVSUGAX328615479', 'Francis Onghas timed-in', '2022-01-25', 'dtr.php', 0, 'admin'),
(17, 'CVSUGAX328615479', 'Francis Onghas timed-out', '2022-01-25', 'dtr.php', 0, 'admin'),
(18, 'CVSUGAX328615479', 'Francis Ong sent a request for attendance correction', '2022-01-25', 'record_correction.php', 0, 'admin'),
(19, 'CVSUGAX328615479', 'You have new task - Check it out', '2022-01-25', 'tasks.php', 0, 'employee'),
(20, 'CVSUGAX328615479', 'Francis Ong send a event request', '2022-01-25', 'events.php', 0, 'admin'),
(21, 'CVSUGAX328615479', 'Francis Ong send a event request', '2022-01-25', 'events.php', 0, 'admin'),
(22, 'CVSUGAX328615479', 'Your event request has been approved', '2022-01-25', 'events.php', 0, 'employee'),
(23, 'CVSUGAX328615479', 'Your event request has been rejected', '2022-01-25', 'events.php', 0, 'employee'),
(24, 'CVSUGAX328615479', 'Francis Ong send a task progress', '2022-01-25', 'tasks.php', 0, 'admin'),
(25, 'CVSUGAX328615479', 'Francis Ong send a task progress', '2022-01-25', 'tasks.php', 0, 'admin'),
(26, 'CVSUGAX328615479', 'Francis Ong send a event request', '2022-01-25', 'events.php', 0, 'admin'),
(27, 'CVSUGAX328615479', 'Francis Ong sent a training request', '2022-01-25', 'training_list.php', 0, 'admin'),
(28, 'CVSUGAX328615479', 'Francis Ong sent a training request', '2022-01-25', 'training_list.php', 0, 'admin'),
(29, 'CVSUGAX328615479', 'You have new document request from HR', '2022-01-25', 'documents.php', 0, 'employee'),
(30, 'CVSUGAX328615479', 'Your event request has been approved', '2022-01-25', 'events.php', 0, 'employee'),
(31, 'CVSUNOU746588823', 'Your overtime request has been evaluated', '2022-01-25', 'overtime.php', 0, 'employee'),
(32, 'CVSUNOU746588823', 'Your official business request has been evaluated', '2022-01-25', 'official_business.php', 0, 'employee'),
(33, 'CVSUNOU746588823', 'Your cash advance request has been rejected', '2022-01-25', 'cash_advance.php', 0, 'employee'),
(34, 'CVSUGAX328615479', 'Your attendance correction has been evaluated', '2022-01-25', 'dtr.php', 0, 'employee'),
(35, 'CVSUGAX328615479', 'You have new task - Check it out', '2022-01-25', 'tasks.php', 0, 'employee'),
(36, 'CVSUGAX328615479', 'Your task evaluation has been evaluated', '2022-01-25', 'tasks.php', 0, 'employee'),
(37, 'CVSUGAX328615479', 'You have new document request from HR', '2022-01-25', 'documents.php', 0, 'employee'),
(38, 'CVSUNOU746588823', 'Document Request has been evaluated', '2022-01-25', 'documents.php', 0, 'employee'),
(39, 'CVSUGAX328615479', 'Francis Ong sent a reply regarding with disciplinary action', '2022-01-25', 'disciplinary.php', 0, 'admin'),
(40, 'CVSUGAX328615479', 'Francis Ong send a task progress', '2022-01-25', 'tasks.php', 0, 'admin'),
(41, 'CVSUGAX328615479', 'Francis Ong send a task progress', '2022-01-25', 'tasks.php', 0, 'admin'),
(42, 'CVSUGAX328615479', 'Francis Ong sent a reply for the document request', '2022-01-25', 'documents.php', 0, 'admin'),
(43, 'CVSUGAX328615479', 'Francis Onghas timed-in', '2022-01-25', 'dtr.php', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id` int(11) NOT NULL,
  `overtime_name` varchar(255) NOT NULL,
  `overtime_rate` double NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id`, `overtime_name`, `overtime_rate`, `status`) VALUES
(38, 'Ordinary', 15, 'active'),
(39, 'Rest Day', 30, 'active'),
(41, 'Special Holiday', 50, 'active'),
(42, 'Legal Holiday', 50, 'inactive'),
(43, 'Special Holiday Rest Day', 100, 'inactive'),
(44, 'Double Holiday', 200, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `overtime_request`
--

CREATE TABLE `overtime_request` (
  `id` int(30) NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(3) NOT NULL COMMENT '0=pending;1=approved;2=rejected ',
  `evaluated_by` varchar(50) DEFAULT NULL,
  `overtime_code` varchar(20) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overtime_request`
--

INSERT INTO `overtime_request` (`id`, `employee_id`, `date`, `start`, `end`, `reason`, `status`, `evaluated_by`, `overtime_code`, `notes`) VALUES
(1, 'CVSUNOU746588823', '2022-01-25', '16:03:00', '00:03:00', 'Sample', '0', NULL, NULL, NULL),
(2, 'CVSUNOU746588823', '2022-01-26', '15:03:00', '16:03:00', 'Request Overtime', '1', 'Ran Taken', '38', '');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_coverage_table`
--

CREATE TABLE `payroll_coverage_table` (
  `id` int(30) NOT NULL,
  `pay_code` varchar(50) NOT NULL,
  `Sdate` date NOT NULL,
  `Edate` date NOT NULL,
  `Pdate` date NOT NULL,
  `payroll_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll_coverage_table`
--

INSERT INTO `payroll_coverage_table` (`id`, `pay_code`, `Sdate`, `Edate`, `Pdate`, `payroll_status`) VALUES
(1, 'PC0117TO01172022', '2022-01-17', '2022-01-29', '2022-01-31', '0');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_summary`
--

CREATE TABLE `payroll_summary` (
  `id` int(30) NOT NULL,
  `pay_code` varchar(50) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `GrossAmount` decimal(10,2) DEFAULT NULL,
  `TotalDeduction` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll_summary`
--

INSERT INTO `payroll_summary` (`id`, `pay_code`, `employee_id`, `GrossAmount`, `TotalDeduction`) VALUES
(1, 'PC0117TO01172022', 'CVSUEJT052613497', NULL, NULL),
(2, 'PC0117TO01172022', 'CVSUGAX328615479', NULL, NULL),
(3, 'PC0117TO01172022', 'CVSUIAO469172580', NULL, NULL),
(4, 'PC0117TO01172022', 'CVSUBXP304892576', NULL, NULL),
(5, 'PC0117TO01172022', 'CVSUNOU746588823', NULL, NULL),
(6, 'PC0117TO01172022', 'CVSUPOB591062721', NULL, NULL),
(7, 'PC0117TO01172022', 'CVSUJMV260851479', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `rate` double NOT NULL,
  `grade` int(11) NOT NULL,
  `step` varchar(10) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=cnt,2=jo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `description`, `rate`, `grade`, `step`, `type`) VALUES
(1, 'Instructor', 15818, 4, 'S8', 1),
(3, 'Janitor', 12517, 1, 'S1', 1),
(5, 'Chairperson', 56633, 20, 'S2', 1),
(6, 'Technical ', 35097, 15, 'S1', 1),
(7, 'Program Head', 50574, 19, 'S2', 1),
(8, 'Instructor', 40282, 16, 'S6', 1),
(9, 'Instructor (JO)', 180, 1, 'S1', 2),
(10, 'Security Guard', 14035, 2, 'S8', 1),
(11, 'Sample', 180, 1, 'S1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(30) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `task_id` int(30) NOT NULL,
  `efficiency` int(11) NOT NULL,
  `timeliness` int(11) NOT NULL,
  `quality` int(11) NOT NULL,
  `accuracy` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `employee_id`, `task_id`, `efficiency`, `timeliness`, `quality`, `accuracy`, `remarks`, `date_created`) VALUES
(7, 'CVSUGAX328615479', 7, 4, 5, 3, 2, 'Sample', '2022-01-25 06:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `day` varchar(20) NOT NULL,
  `isCheck` int(3) NOT NULL COMMENT '0=no , 1=yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `employee_id`, `time_in`, `time_out`, `day`, `isCheck`) VALUES
(1, 'CVSUEJT052613497', '07:00:00', '07:30:00', 'Monday', 0),
(2, 'CVSUEJT052613497', '07:30:00', '08:00:00', 'Monday', 0),
(3, 'CVSUEJT052613497', '08:00:00', '08:30:00', 'Monday', 0),
(4, 'CVSUEJT052613497', '08:30:00', '09:00:00', 'Monday', 0),
(5, 'CVSUEJT052613497', '09:00:00', '09:30:00', 'Monday', 0),
(6, 'CVSUEJT052613497', '09:30:00', '10:00:00', 'Monday', 0),
(7, 'CVSUEJT052613497', '10:00:00', '10:30:00', 'Monday', 0),
(8, 'CVSUEJT052613497', '10:30:00', '11:00:00', 'Monday', 0),
(9, 'CVSUEJT052613497', '11:00:00', '11:30:00', 'Monday', 0),
(10, 'CVSUEJT052613497', '11:30:00', '12:00:00', 'Monday', 0),
(11, 'CVSUEJT052613497', '12:00:00', '12:30:00', 'Monday', 0),
(12, 'CVSUEJT052613497', '12:30:00', '13:00:00', 'Monday', 0),
(13, 'CVSUEJT052613497', '13:00:00', '13:30:00', 'Monday', 0),
(14, 'CVSUEJT052613497', '13:30:00', '14:00:00', 'Monday', 0),
(15, 'CVSUEJT052613497', '14:00:00', '14:30:00', 'Monday', 0),
(16, 'CVSUEJT052613497', '14:30:00', '15:00:00', 'Monday', 0),
(17, 'CVSUEJT052613497', '15:00:00', '15:30:00', 'Monday', 0),
(18, 'CVSUEJT052613497', '15:30:00', '16:00:00', 'Monday', 0),
(19, 'CVSUEJT052613497', '16:00:00', '16:30:00', 'Monday', 0),
(20, 'CVSUEJT052613497', '16:30:00', '17:00:00', 'Monday', 0),
(21, 'CVSUEJT052613497', '17:00:00', '17:30:00', 'Monday', 0),
(22, 'CVSUEJT052613497', '17:30:00', '18:00:00', 'Monday', 0),
(23, 'CVSUEJT052613497', '18:00:00', '18:30:00', 'Monday', 0),
(24, 'CVSUEJT052613497', '18:30:00', '19:00:00', 'Monday', 0),
(25, 'CVSUEJT052613497', '19:00:00', '19:30:00', 'Monday', 0),
(26, 'CVSUEJT052613497', '19:30:00', '20:00:00', 'Monday', 0),
(27, 'CVSUEJT052613497', '07:00:00', '07:30:00', 'Tuesday', 0),
(28, 'CVSUEJT052613497', '07:30:00', '08:00:00', 'Tuesday', 0),
(29, 'CVSUEJT052613497', '08:00:00', '08:30:00', 'Tuesday', 0),
(30, 'CVSUEJT052613497', '08:30:00', '09:00:00', 'Tuesday', 0),
(31, 'CVSUEJT052613497', '09:00:00', '09:30:00', 'Tuesday', 0),
(32, 'CVSUEJT052613497', '09:30:00', '10:00:00', 'Tuesday', 0),
(33, 'CVSUEJT052613497', '10:00:00', '10:30:00', 'Tuesday', 0),
(34, 'CVSUEJT052613497', '10:30:00', '11:00:00', 'Tuesday', 0),
(35, 'CVSUEJT052613497', '11:00:00', '11:30:00', 'Tuesday', 0),
(36, 'CVSUEJT052613497', '11:30:00', '12:00:00', 'Tuesday', 0),
(37, 'CVSUEJT052613497', '12:00:00', '12:30:00', 'Tuesday', 0),
(38, 'CVSUEJT052613497', '12:30:00', '13:00:00', 'Tuesday', 0),
(39, 'CVSUEJT052613497', '13:00:00', '13:30:00', 'Tuesday', 0),
(40, 'CVSUEJT052613497', '13:30:00', '14:00:00', 'Tuesday', 0),
(41, 'CVSUEJT052613497', '14:00:00', '14:30:00', 'Tuesday', 0),
(42, 'CVSUEJT052613497', '14:30:00', '15:00:00', 'Tuesday', 0),
(43, 'CVSUEJT052613497', '15:00:00', '15:30:00', 'Tuesday', 0),
(44, 'CVSUEJT052613497', '15:30:00', '16:00:00', 'Tuesday', 0),
(45, 'CVSUEJT052613497', '16:00:00', '16:30:00', 'Tuesday', 0),
(46, 'CVSUEJT052613497', '16:30:00', '17:00:00', 'Tuesday', 0),
(47, 'CVSUEJT052613497', '17:00:00', '17:30:00', 'Tuesday', 0),
(48, 'CVSUEJT052613497', '17:30:00', '18:00:00', 'Tuesday', 0),
(49, 'CVSUEJT052613497', '18:00:00', '18:30:00', 'Tuesday', 0),
(50, 'CVSUEJT052613497', '18:30:00', '19:00:00', 'Tuesday', 0),
(51, 'CVSUEJT052613497', '19:00:00', '19:30:00', 'Tuesday', 0),
(52, 'CVSUEJT052613497', '19:30:00', '20:00:00', 'Tuesday', 0),
(53, 'CVSUEJT052613497', '07:00:00', '07:30:00', 'Wednesday', 0),
(54, 'CVSUEJT052613497', '07:30:00', '08:00:00', 'Wednesday', 0),
(55, 'CVSUEJT052613497', '08:00:00', '08:30:00', 'Wednesday', 0),
(56, 'CVSUEJT052613497', '08:30:00', '09:00:00', 'Wednesday', 0),
(57, 'CVSUEJT052613497', '09:00:00', '09:30:00', 'Wednesday', 0),
(58, 'CVSUEJT052613497', '09:30:00', '10:00:00', 'Wednesday', 0),
(59, 'CVSUEJT052613497', '10:00:00', '10:30:00', 'Wednesday', 0),
(60, 'CVSUEJT052613497', '10:30:00', '11:00:00', 'Wednesday', 0),
(61, 'CVSUEJT052613497', '11:00:00', '11:30:00', 'Wednesday', 0),
(62, 'CVSUEJT052613497', '11:30:00', '12:00:00', 'Wednesday', 0),
(63, 'CVSUEJT052613497', '12:00:00', '12:30:00', 'Wednesday', 0),
(64, 'CVSUEJT052613497', '12:30:00', '13:00:00', 'Wednesday', 0),
(65, 'CVSUEJT052613497', '13:00:00', '13:30:00', 'Wednesday', 0),
(66, 'CVSUEJT052613497', '13:30:00', '14:00:00', 'Wednesday', 0),
(67, 'CVSUEJT052613497', '14:00:00', '14:30:00', 'Wednesday', 0),
(68, 'CVSUEJT052613497', '14:30:00', '15:00:00', 'Wednesday', 0),
(69, 'CVSUEJT052613497', '15:00:00', '15:30:00', 'Wednesday', 0),
(70, 'CVSUEJT052613497', '15:30:00', '16:00:00', 'Wednesday', 0),
(71, 'CVSUEJT052613497', '16:00:00', '16:30:00', 'Wednesday', 0),
(72, 'CVSUEJT052613497', '16:30:00', '17:00:00', 'Wednesday', 0),
(73, 'CVSUEJT052613497', '17:00:00', '17:30:00', 'Wednesday', 0),
(74, 'CVSUEJT052613497', '17:30:00', '18:00:00', 'Wednesday', 0),
(75, 'CVSUEJT052613497', '18:00:00', '18:30:00', 'Wednesday', 0),
(76, 'CVSUEJT052613497', '18:30:00', '19:00:00', 'Wednesday', 0),
(77, 'CVSUEJT052613497', '19:00:00', '19:30:00', 'Wednesday', 0),
(78, 'CVSUEJT052613497', '19:30:00', '20:00:00', 'Wednesday', 0),
(79, 'CVSUEJT052613497', '07:00:00', '07:30:00', 'Thursday', 0),
(80, 'CVSUEJT052613497', '07:30:00', '08:00:00', 'Thursday', 0),
(81, 'CVSUEJT052613497', '08:00:00', '08:30:00', 'Thursday', 0),
(82, 'CVSUEJT052613497', '08:30:00', '09:00:00', 'Thursday', 0),
(83, 'CVSUEJT052613497', '09:00:00', '09:30:00', 'Thursday', 0),
(84, 'CVSUEJT052613497', '09:30:00', '10:00:00', 'Thursday', 0),
(85, 'CVSUEJT052613497', '10:00:00', '10:30:00', 'Thursday', 0),
(86, 'CVSUEJT052613497', '10:30:00', '11:00:00', 'Thursday', 0),
(87, 'CVSUEJT052613497', '11:00:00', '11:30:00', 'Thursday', 0),
(88, 'CVSUEJT052613497', '11:30:00', '12:00:00', 'Thursday', 0),
(89, 'CVSUEJT052613497', '12:00:00', '12:30:00', 'Thursday', 0),
(90, 'CVSUEJT052613497', '12:30:00', '13:00:00', 'Thursday', 0),
(91, 'CVSUEJT052613497', '13:00:00', '13:30:00', 'Thursday', 0),
(92, 'CVSUEJT052613497', '13:30:00', '14:00:00', 'Thursday', 0),
(93, 'CVSUEJT052613497', '14:00:00', '14:30:00', 'Thursday', 0),
(94, 'CVSUEJT052613497', '14:30:00', '15:00:00', 'Thursday', 0),
(95, 'CVSUEJT052613497', '15:00:00', '15:30:00', 'Thursday', 0),
(96, 'CVSUEJT052613497', '15:30:00', '16:00:00', 'Thursday', 0),
(97, 'CVSUEJT052613497', '16:00:00', '16:30:00', 'Thursday', 0),
(98, 'CVSUEJT052613497', '16:30:00', '17:00:00', 'Thursday', 0),
(99, 'CVSUEJT052613497', '17:00:00', '17:30:00', 'Thursday', 0),
(100, 'CVSUEJT052613497', '17:30:00', '18:00:00', 'Thursday', 0),
(101, 'CVSUEJT052613497', '18:00:00', '18:30:00', 'Thursday', 0),
(102, 'CVSUEJT052613497', '18:30:00', '19:00:00', 'Thursday', 0),
(103, 'CVSUEJT052613497', '19:00:00', '19:30:00', 'Thursday', 0),
(104, 'CVSUEJT052613497', '19:30:00', '20:00:00', 'Thursday', 0),
(105, 'CVSUEJT052613497', '07:00:00', '07:30:00', 'Friday', 0),
(106, 'CVSUEJT052613497', '07:30:00', '08:00:00', 'Friday', 0),
(107, 'CVSUEJT052613497', '08:00:00', '08:30:00', 'Friday', 0),
(108, 'CVSUEJT052613497', '08:30:00', '09:00:00', 'Friday', 0),
(109, 'CVSUEJT052613497', '09:00:00', '09:30:00', 'Friday', 0),
(110, 'CVSUEJT052613497', '09:30:00', '10:00:00', 'Friday', 0),
(111, 'CVSUEJT052613497', '10:00:00', '10:30:00', 'Friday', 0),
(112, 'CVSUEJT052613497', '10:30:00', '11:00:00', 'Friday', 0),
(113, 'CVSUEJT052613497', '11:00:00', '11:30:00', 'Friday', 0),
(114, 'CVSUEJT052613497', '11:30:00', '12:00:00', 'Friday', 0),
(115, 'CVSUEJT052613497', '12:00:00', '12:30:00', 'Friday', 0),
(116, 'CVSUEJT052613497', '12:30:00', '13:00:00', 'Friday', 0),
(117, 'CVSUEJT052613497', '13:00:00', '13:30:00', 'Friday', 0),
(118, 'CVSUEJT052613497', '13:30:00', '14:00:00', 'Friday', 0),
(119, 'CVSUEJT052613497', '14:00:00', '14:30:00', 'Friday', 0),
(120, 'CVSUEJT052613497', '14:30:00', '15:00:00', 'Friday', 0),
(121, 'CVSUEJT052613497', '15:00:00', '15:30:00', 'Friday', 0),
(122, 'CVSUEJT052613497', '15:30:00', '16:00:00', 'Friday', 0),
(123, 'CVSUEJT052613497', '16:00:00', '16:30:00', 'Friday', 0),
(124, 'CVSUEJT052613497', '16:30:00', '17:00:00', 'Friday', 0),
(125, 'CVSUEJT052613497', '17:00:00', '17:30:00', 'Friday', 0),
(126, 'CVSUEJT052613497', '17:30:00', '18:00:00', 'Friday', 0),
(127, 'CVSUEJT052613497', '18:00:00', '18:30:00', 'Friday', 0),
(128, 'CVSUEJT052613497', '18:30:00', '19:00:00', 'Friday', 0),
(129, 'CVSUEJT052613497', '19:00:00', '19:30:00', 'Friday', 0),
(130, 'CVSUEJT052613497', '19:30:00', '20:00:00', 'Friday', 0),
(131, 'CVSUEJT052613497', '07:00:00', '07:30:00', 'Saturday', 0),
(132, 'CVSUEJT052613497', '07:30:00', '08:00:00', 'Saturday', 0),
(133, 'CVSUEJT052613497', '08:00:00', '08:30:00', 'Saturday', 0),
(134, 'CVSUEJT052613497', '08:30:00', '09:00:00', 'Saturday', 0),
(135, 'CVSUEJT052613497', '09:00:00', '09:30:00', 'Saturday', 0),
(136, 'CVSUEJT052613497', '09:30:00', '10:00:00', 'Saturday', 0),
(137, 'CVSUEJT052613497', '10:00:00', '10:30:00', 'Saturday', 0),
(138, 'CVSUEJT052613497', '10:30:00', '11:00:00', 'Saturday', 0),
(139, 'CVSUEJT052613497', '11:00:00', '11:30:00', 'Saturday', 0),
(140, 'CVSUEJT052613497', '11:30:00', '12:00:00', 'Saturday', 0),
(141, 'CVSUEJT052613497', '12:00:00', '12:30:00', 'Saturday', 0),
(142, 'CVSUEJT052613497', '12:30:00', '13:00:00', 'Saturday', 0),
(143, 'CVSUEJT052613497', '13:00:00', '13:30:00', 'Saturday', 0),
(144, 'CVSUEJT052613497', '13:30:00', '14:00:00', 'Saturday', 0),
(145, 'CVSUEJT052613497', '14:00:00', '14:30:00', 'Saturday', 0),
(146, 'CVSUEJT052613497', '14:30:00', '15:00:00', 'Saturday', 0),
(147, 'CVSUEJT052613497', '15:00:00', '15:30:00', 'Saturday', 0),
(148, 'CVSUEJT052613497', '15:30:00', '16:00:00', 'Saturday', 0),
(149, 'CVSUEJT052613497', '16:00:00', '16:30:00', 'Saturday', 0),
(150, 'CVSUEJT052613497', '16:30:00', '17:00:00', 'Saturday', 0),
(151, 'CVSUEJT052613497', '17:00:00', '17:30:00', 'Saturday', 0),
(152, 'CVSUEJT052613497', '17:30:00', '18:00:00', 'Saturday', 0),
(153, 'CVSUEJT052613497', '18:00:00', '18:30:00', 'Saturday', 0),
(154, 'CVSUEJT052613497', '18:30:00', '19:00:00', 'Saturday', 0),
(155, 'CVSUEJT052613497', '19:00:00', '19:30:00', 'Saturday', 0),
(156, 'CVSUEJT052613497', '19:30:00', '20:00:00', 'Saturday', 0),
(157, 'CVSUGAX328615479', '07:00:00', '07:30:00', 'Monday', 1),
(158, 'CVSUGAX328615479', '07:30:00', '08:00:00', 'Monday', 1),
(159, 'CVSUGAX328615479', '08:00:00', '08:30:00', 'Monday', 1),
(160, 'CVSUGAX328615479', '08:30:00', '09:00:00', 'Monday', 0),
(161, 'CVSUGAX328615479', '09:00:00', '09:30:00', 'Monday', 0),
(162, 'CVSUGAX328615479', '09:30:00', '10:00:00', 'Monday', 1),
(163, 'CVSUGAX328615479', '10:00:00', '10:30:00', 'Monday', 1),
(164, 'CVSUGAX328615479', '10:30:00', '11:00:00', 'Monday', 1),
(165, 'CVSUGAX328615479', '11:00:00', '11:30:00', 'Monday', 1),
(166, 'CVSUGAX328615479', '11:30:00', '12:00:00', 'Monday', 1),
(167, 'CVSUGAX328615479', '12:00:00', '12:30:00', 'Monday', 0),
(168, 'CVSUGAX328615479', '12:30:00', '13:00:00', 'Monday', 0),
(169, 'CVSUGAX328615479', '13:00:00', '13:30:00', 'Monday', 0),
(170, 'CVSUGAX328615479', '13:30:00', '14:00:00', 'Monday', 0),
(171, 'CVSUGAX328615479', '14:00:00', '14:30:00', 'Monday', 1),
(172, 'CVSUGAX328615479', '14:30:00', '15:00:00', 'Monday', 1),
(173, 'CVSUGAX328615479', '15:00:00', '15:30:00', 'Monday', 1),
(174, 'CVSUGAX328615479', '15:30:00', '16:00:00', 'Monday', 1),
(175, 'CVSUGAX328615479', '16:00:00', '16:30:00', 'Monday', 0),
(176, 'CVSUGAX328615479', '16:30:00', '17:00:00', 'Monday', 0),
(177, 'CVSUGAX328615479', '17:00:00', '17:30:00', 'Monday', 0),
(178, 'CVSUGAX328615479', '17:30:00', '18:00:00', 'Monday', 0),
(179, 'CVSUGAX328615479', '18:00:00', '18:30:00', 'Monday', 0),
(180, 'CVSUGAX328615479', '18:30:00', '19:00:00', 'Monday', 0),
(181, 'CVSUGAX328615479', '19:00:00', '19:30:00', 'Monday', 0),
(182, 'CVSUGAX328615479', '19:30:00', '20:00:00', 'Monday', 0),
(183, 'CVSUGAX328615479', '07:00:00', '07:30:00', 'Tuesday', 0),
(184, 'CVSUGAX328615479', '07:30:00', '08:00:00', 'Tuesday', 0),
(185, 'CVSUGAX328615479', '08:00:00', '08:30:00', 'Tuesday', 0),
(186, 'CVSUGAX328615479', '08:30:00', '09:00:00', 'Tuesday', 1),
(187, 'CVSUGAX328615479', '09:00:00', '09:30:00', 'Tuesday', 1),
(188, 'CVSUGAX328615479', '09:30:00', '10:00:00', 'Tuesday', 1),
(189, 'CVSUGAX328615479', '10:00:00', '10:30:00', 'Tuesday', 1),
(190, 'CVSUGAX328615479', '10:30:00', '11:00:00', 'Tuesday', 0),
(191, 'CVSUGAX328615479', '11:00:00', '11:30:00', 'Tuesday', 0),
(192, 'CVSUGAX328615479', '11:30:00', '12:00:00', 'Tuesday', 0),
(193, 'CVSUGAX328615479', '12:00:00', '12:30:00', 'Tuesday', 1),
(194, 'CVSUGAX328615479', '12:30:00', '13:00:00', 'Tuesday', 1),
(195, 'CVSUGAX328615479', '13:00:00', '13:30:00', 'Tuesday', 1),
(196, 'CVSUGAX328615479', '13:30:00', '14:00:00', 'Tuesday', 1),
(197, 'CVSUGAX328615479', '14:00:00', '14:30:00', 'Tuesday', 0),
(198, 'CVSUGAX328615479', '14:30:00', '15:00:00', 'Tuesday', 0),
(199, 'CVSUGAX328615479', '15:00:00', '15:30:00', 'Tuesday', 1),
(200, 'CVSUGAX328615479', '15:30:00', '16:00:00', 'Tuesday', 1),
(201, 'CVSUGAX328615479', '16:00:00', '16:30:00', 'Tuesday', 1),
(202, 'CVSUGAX328615479', '16:30:00', '17:00:00', 'Tuesday', 1),
(203, 'CVSUGAX328615479', '17:00:00', '17:30:00', 'Tuesday', 0),
(204, 'CVSUGAX328615479', '17:30:00', '18:00:00', 'Tuesday', 0),
(205, 'CVSUGAX328615479', '18:00:00', '18:30:00', 'Tuesday', 0),
(206, 'CVSUGAX328615479', '18:30:00', '19:00:00', 'Tuesday', 0),
(207, 'CVSUGAX328615479', '19:00:00', '19:30:00', 'Tuesday', 0),
(208, 'CVSUGAX328615479', '19:30:00', '20:00:00', 'Tuesday', 0),
(209, 'CVSUGAX328615479', '07:00:00', '07:30:00', 'Wednesday', 1),
(210, 'CVSUGAX328615479', '07:30:00', '08:00:00', 'Wednesday', 1),
(211, 'CVSUGAX328615479', '08:00:00', '08:30:00', 'Wednesday', 1),
(212, 'CVSUGAX328615479', '08:30:00', '09:00:00', 'Wednesday', 0),
(213, 'CVSUGAX328615479', '09:00:00', '09:30:00', 'Wednesday', 0),
(214, 'CVSUGAX328615479', '09:30:00', '10:00:00', 'Wednesday', 0),
(215, 'CVSUGAX328615479', '10:00:00', '10:30:00', 'Wednesday', 0),
(216, 'CVSUGAX328615479', '10:30:00', '11:00:00', 'Wednesday', 1),
(217, 'CVSUGAX328615479', '11:00:00', '11:30:00', 'Wednesday', 1),
(218, 'CVSUGAX328615479', '11:30:00', '12:00:00', 'Wednesday', 1),
(219, 'CVSUGAX328615479', '12:00:00', '12:30:00', 'Wednesday', 1),
(220, 'CVSUGAX328615479', '12:30:00', '13:00:00', 'Wednesday', 1),
(221, 'CVSUGAX328615479', '13:00:00', '13:30:00', 'Wednesday', 0),
(222, 'CVSUGAX328615479', '13:30:00', '14:00:00', 'Wednesday', 0),
(223, 'CVSUGAX328615479', '14:00:00', '14:30:00', 'Wednesday', 0),
(224, 'CVSUGAX328615479', '14:30:00', '15:00:00', 'Wednesday', 0),
(225, 'CVSUGAX328615479', '15:00:00', '15:30:00', 'Wednesday', 0),
(226, 'CVSUGAX328615479', '15:30:00', '16:00:00', 'Wednesday', 0),
(227, 'CVSUGAX328615479', '16:00:00', '16:30:00', 'Wednesday', 1),
(228, 'CVSUGAX328615479', '16:30:00', '17:00:00', 'Wednesday', 1),
(229, 'CVSUGAX328615479', '17:00:00', '17:30:00', 'Wednesday', 1),
(230, 'CVSUGAX328615479', '17:30:00', '18:00:00', 'Wednesday', 1),
(231, 'CVSUGAX328615479', '18:00:00', '18:30:00', 'Wednesday', 1),
(232, 'CVSUGAX328615479', '18:30:00', '19:00:00', 'Wednesday', 0),
(233, 'CVSUGAX328615479', '19:00:00', '19:30:00', 'Wednesday', 0),
(234, 'CVSUGAX328615479', '19:30:00', '20:00:00', 'Wednesday', 0),
(235, 'CVSUGAX328615479', '07:00:00', '07:30:00', 'Thursday', 0),
(236, 'CVSUGAX328615479', '07:30:00', '08:00:00', 'Thursday', 1),
(237, 'CVSUGAX328615479', '08:00:00', '08:30:00', 'Thursday', 1),
(238, 'CVSUGAX328615479', '08:30:00', '09:00:00', 'Thursday', 1),
(239, 'CVSUGAX328615479', '09:00:00', '09:30:00', 'Thursday', 1),
(240, 'CVSUGAX328615479', '09:30:00', '10:00:00', 'Thursday', 1),
(241, 'CVSUGAX328615479', '10:00:00', '10:30:00', 'Thursday', 1),
(242, 'CVSUGAX328615479', '10:30:00', '11:00:00', 'Thursday', 0),
(243, 'CVSUGAX328615479', '11:00:00', '11:30:00', 'Thursday', 0),
(244, 'CVSUGAX328615479', '11:30:00', '12:00:00', 'Thursday', 1),
(245, 'CVSUGAX328615479', '12:00:00', '12:30:00', 'Thursday', 1),
(246, 'CVSUGAX328615479', '12:30:00', '13:00:00', 'Thursday', 1),
(247, 'CVSUGAX328615479', '13:00:00', '13:30:00', 'Thursday', 1),
(248, 'CVSUGAX328615479', '13:30:00', '14:00:00', 'Thursday', 0),
(249, 'CVSUGAX328615479', '14:00:00', '14:30:00', 'Thursday', 1),
(250, 'CVSUGAX328615479', '14:30:00', '15:00:00', 'Thursday', 1),
(251, 'CVSUGAX328615479', '15:00:00', '15:30:00', 'Thursday', 1),
(252, 'CVSUGAX328615479', '15:30:00', '16:00:00', 'Thursday', 1),
(253, 'CVSUGAX328615479', '16:00:00', '16:30:00', 'Thursday', 0),
(254, 'CVSUGAX328615479', '16:30:00', '17:00:00', 'Thursday', 0),
(255, 'CVSUGAX328615479', '17:00:00', '17:30:00', 'Thursday', 0),
(256, 'CVSUGAX328615479', '17:30:00', '18:00:00', 'Thursday', 1),
(257, 'CVSUGAX328615479', '18:00:00', '18:30:00', 'Thursday', 1),
(258, 'CVSUGAX328615479', '18:30:00', '19:00:00', 'Thursday', 1),
(259, 'CVSUGAX328615479', '19:00:00', '19:30:00', 'Thursday', 1),
(260, 'CVSUGAX328615479', '19:30:00', '20:00:00', 'Thursday', 0),
(261, 'CVSUGAX328615479', '07:00:00', '07:30:00', 'Friday', 1),
(262, 'CVSUGAX328615479', '07:30:00', '08:00:00', 'Friday', 1),
(263, 'CVSUGAX328615479', '08:00:00', '08:30:00', 'Friday', 1),
(264, 'CVSUGAX328615479', '08:30:00', '09:00:00', 'Friday', 0),
(265, 'CVSUGAX328615479', '09:00:00', '09:30:00', 'Friday', 1),
(266, 'CVSUGAX328615479', '09:30:00', '10:00:00', 'Friday', 1),
(267, 'CVSUGAX328615479', '10:00:00', '10:30:00', 'Friday', 1),
(268, 'CVSUGAX328615479', '10:30:00', '11:00:00', 'Friday', 1),
(269, 'CVSUGAX328615479', '11:00:00', '11:30:00', 'Friday', 0),
(270, 'CVSUGAX328615479', '11:30:00', '12:00:00', 'Friday', 0),
(271, 'CVSUGAX328615479', '12:00:00', '12:30:00', 'Friday', 0),
(272, 'CVSUGAX328615479', '12:30:00', '13:00:00', 'Friday', 0),
(273, 'CVSUGAX328615479', '13:00:00', '13:30:00', 'Friday', 0),
(274, 'CVSUGAX328615479', '13:30:00', '14:00:00', 'Friday', 1),
(275, 'CVSUGAX328615479', '14:00:00', '14:30:00', 'Friday', 1),
(276, 'CVSUGAX328615479', '14:30:00', '15:00:00', 'Friday', 1),
(277, 'CVSUGAX328615479', '15:00:00', '15:30:00', 'Friday', 0),
(278, 'CVSUGAX328615479', '15:30:00', '16:00:00', 'Friday', 0),
(279, 'CVSUGAX328615479', '16:00:00', '16:30:00', 'Friday', 0),
(280, 'CVSUGAX328615479', '16:30:00', '17:00:00', 'Friday', 0),
(281, 'CVSUGAX328615479', '17:00:00', '17:30:00', 'Friday', 1),
(282, 'CVSUGAX328615479', '17:30:00', '18:00:00', 'Friday', 1),
(283, 'CVSUGAX328615479', '18:00:00', '18:30:00', 'Friday', 1),
(284, 'CVSUGAX328615479', '18:30:00', '19:00:00', 'Friday', 0),
(285, 'CVSUGAX328615479', '19:00:00', '19:30:00', 'Friday', 0),
(286, 'CVSUGAX328615479', '19:30:00', '20:00:00', 'Friday', 0),
(287, 'CVSUGAX328615479', '07:00:00', '07:30:00', 'Saturday', 0),
(288, 'CVSUGAX328615479', '07:30:00', '08:00:00', 'Saturday', 1),
(289, 'CVSUGAX328615479', '08:00:00', '08:30:00', 'Saturday', 1),
(290, 'CVSUGAX328615479', '08:30:00', '09:00:00', 'Saturday', 1),
(291, 'CVSUGAX328615479', '09:00:00', '09:30:00', 'Saturday', 1),
(292, 'CVSUGAX328615479', '09:30:00', '10:00:00', 'Saturday', 1),
(293, 'CVSUGAX328615479', '10:00:00', '10:30:00', 'Saturday', 0),
(294, 'CVSUGAX328615479', '10:30:00', '11:00:00', 'Saturday', 0),
(295, 'CVSUGAX328615479', '11:00:00', '11:30:00', 'Saturday', 0),
(296, 'CVSUGAX328615479', '11:30:00', '12:00:00', 'Saturday', 0),
(297, 'CVSUGAX328615479', '12:00:00', '12:30:00', 'Saturday', 0),
(298, 'CVSUGAX328615479', '12:30:00', '13:00:00', 'Saturday', 0),
(299, 'CVSUGAX328615479', '13:00:00', '13:30:00', 'Saturday', 0),
(300, 'CVSUGAX328615479', '13:30:00', '14:00:00', 'Saturday', 0),
(301, 'CVSUGAX328615479', '14:00:00', '14:30:00', 'Saturday', 0),
(302, 'CVSUGAX328615479', '14:30:00', '15:00:00', 'Saturday', 0),
(303, 'CVSUGAX328615479', '15:00:00', '15:30:00', 'Saturday', 1),
(304, 'CVSUGAX328615479', '15:30:00', '16:00:00', 'Saturday', 1),
(305, 'CVSUGAX328615479', '16:00:00', '16:30:00', 'Saturday', 1),
(306, 'CVSUGAX328615479', '16:30:00', '17:00:00', 'Saturday', 1),
(307, 'CVSUGAX328615479', '17:00:00', '17:30:00', 'Saturday', 1),
(308, 'CVSUGAX328615479', '17:30:00', '18:00:00', 'Saturday', 1),
(309, 'CVSUGAX328615479', '18:00:00', '18:30:00', 'Saturday', 1),
(310, 'CVSUGAX328615479', '18:30:00', '19:00:00', 'Saturday', 0),
(311, 'CVSUGAX328615479', '19:00:00', '19:30:00', 'Saturday', 0),
(312, 'CVSUGAX328615479', '19:30:00', '20:00:00', 'Saturday', 0),
(313, 'CVSUIAO469172580', '07:00:00', '07:30:00', 'Monday', 1),
(314, 'CVSUIAO469172580', '07:30:00', '08:00:00', 'Monday', 1),
(315, 'CVSUIAO469172580', '08:00:00', '08:30:00', 'Monday', 1),
(316, 'CVSUIAO469172580', '08:30:00', '09:00:00', 'Monday', 0),
(317, 'CVSUIAO469172580', '09:00:00', '09:30:00', 'Monday', 0),
(318, 'CVSUIAO469172580', '09:30:00', '10:00:00', 'Monday', 1),
(319, 'CVSUIAO469172580', '10:00:00', '10:30:00', 'Monday', 1),
(320, 'CVSUIAO469172580', '10:30:00', '11:00:00', 'Monday', 1),
(321, 'CVSUIAO469172580', '11:00:00', '11:30:00', 'Monday', 1),
(322, 'CVSUIAO469172580', '11:30:00', '12:00:00', 'Monday', 1),
(323, 'CVSUIAO469172580', '12:00:00', '12:30:00', 'Monday', 0),
(324, 'CVSUIAO469172580', '12:30:00', '13:00:00', 'Monday', 0),
(325, 'CVSUIAO469172580', '13:00:00', '13:30:00', 'Monday', 0),
(326, 'CVSUIAO469172580', '13:30:00', '14:00:00', 'Monday', 0),
(327, 'CVSUIAO469172580', '14:00:00', '14:30:00', 'Monday', 0),
(328, 'CVSUIAO469172580', '14:30:00', '15:00:00', 'Monday', 0),
(329, 'CVSUIAO469172580', '15:00:00', '15:30:00', 'Monday', 0),
(330, 'CVSUIAO469172580', '15:30:00', '16:00:00', 'Monday', 0),
(331, 'CVSUIAO469172580', '16:00:00', '16:30:00', 'Monday', 0),
(332, 'CVSUIAO469172580', '16:30:00', '17:00:00', 'Monday', 0),
(333, 'CVSUIAO469172580', '17:00:00', '17:30:00', 'Monday', 0),
(334, 'CVSUIAO469172580', '17:30:00', '18:00:00', 'Monday', 0),
(335, 'CVSUIAO469172580', '18:00:00', '18:30:00', 'Monday', 0),
(336, 'CVSUIAO469172580', '18:30:00', '19:00:00', 'Monday', 0),
(337, 'CVSUIAO469172580', '19:00:00', '19:30:00', 'Monday', 0),
(338, 'CVSUIAO469172580', '19:30:00', '20:00:00', 'Monday', 0),
(339, 'CVSUIAO469172580', '07:00:00', '07:30:00', 'Tuesday', 0),
(340, 'CVSUIAO469172580', '07:30:00', '08:00:00', 'Tuesday', 0),
(341, 'CVSUIAO469172580', '08:00:00', '08:30:00', 'Tuesday', 0),
(342, 'CVSUIAO469172580', '08:30:00', '09:00:00', 'Tuesday', 1),
(343, 'CVSUIAO469172580', '09:00:00', '09:30:00', 'Tuesday', 0),
(344, 'CVSUIAO469172580', '09:30:00', '10:00:00', 'Tuesday', 1),
(345, 'CVSUIAO469172580', '10:00:00', '10:30:00', 'Tuesday', 1),
(346, 'CVSUIAO469172580', '10:30:00', '11:00:00', 'Tuesday', 0),
(347, 'CVSUIAO469172580', '11:00:00', '11:30:00', 'Tuesday', 0),
(348, 'CVSUIAO469172580', '11:30:00', '12:00:00', 'Tuesday', 0),
(349, 'CVSUIAO469172580', '12:00:00', '12:30:00', 'Tuesday', 0),
(350, 'CVSUIAO469172580', '12:30:00', '13:00:00', 'Tuesday', 0),
(351, 'CVSUIAO469172580', '13:00:00', '13:30:00', 'Tuesday', 0),
(352, 'CVSUIAO469172580', '13:30:00', '14:00:00', 'Tuesday', 0),
(353, 'CVSUIAO469172580', '14:00:00', '14:30:00', 'Tuesday', 1),
(354, 'CVSUIAO469172580', '14:30:00', '15:00:00', 'Tuesday', 1),
(355, 'CVSUIAO469172580', '15:00:00', '15:30:00', 'Tuesday', 1),
(356, 'CVSUIAO469172580', '15:30:00', '16:00:00', 'Tuesday', 1),
(357, 'CVSUIAO469172580', '16:00:00', '16:30:00', 'Tuesday', 1),
(358, 'CVSUIAO469172580', '16:30:00', '17:00:00', 'Tuesday', 1),
(359, 'CVSUIAO469172580', '17:00:00', '17:30:00', 'Tuesday', 0),
(360, 'CVSUIAO469172580', '17:30:00', '18:00:00', 'Tuesday', 0),
(361, 'CVSUIAO469172580', '18:00:00', '18:30:00', 'Tuesday', 0),
(362, 'CVSUIAO469172580', '18:30:00', '19:00:00', 'Tuesday', 0),
(363, 'CVSUIAO469172580', '19:00:00', '19:30:00', 'Tuesday', 0),
(364, 'CVSUIAO469172580', '19:30:00', '20:00:00', 'Tuesday', 0),
(365, 'CVSUIAO469172580', '07:00:00', '07:30:00', 'Wednesday', 0),
(366, 'CVSUIAO469172580', '07:30:00', '08:00:00', 'Wednesday', 0),
(367, 'CVSUIAO469172580', '08:00:00', '08:30:00', 'Wednesday', 0),
(368, 'CVSUIAO469172580', '08:30:00', '09:00:00', 'Wednesday', 0),
(369, 'CVSUIAO469172580', '09:00:00', '09:30:00', 'Wednesday', 0),
(370, 'CVSUIAO469172580', '09:30:00', '10:00:00', 'Wednesday', 0),
(371, 'CVSUIAO469172580', '10:00:00', '10:30:00', 'Wednesday', 0),
(372, 'CVSUIAO469172580', '10:30:00', '11:00:00', 'Wednesday', 0),
(373, 'CVSUIAO469172580', '11:00:00', '11:30:00', 'Wednesday', 0),
(374, 'CVSUIAO469172580', '11:30:00', '12:00:00', 'Wednesday', 0),
(375, 'CVSUIAO469172580', '12:00:00', '12:30:00', 'Wednesday', 0),
(376, 'CVSUIAO469172580', '12:30:00', '13:00:00', 'Wednesday', 0),
(377, 'CVSUIAO469172580', '13:00:00', '13:30:00', 'Wednesday', 1),
(378, 'CVSUIAO469172580', '13:30:00', '14:00:00', 'Wednesday', 1),
(379, 'CVSUIAO469172580', '14:00:00', '14:30:00', 'Wednesday', 1),
(380, 'CVSUIAO469172580', '14:30:00', '15:00:00', 'Wednesday', 1),
(381, 'CVSUIAO469172580', '15:00:00', '15:30:00', 'Wednesday', 1),
(382, 'CVSUIAO469172580', '15:30:00', '16:00:00', 'Wednesday', 1),
(383, 'CVSUIAO469172580', '16:00:00', '16:30:00', 'Wednesday', 1),
(384, 'CVSUIAO469172580', '16:30:00', '17:00:00', 'Wednesday', 1),
(385, 'CVSUIAO469172580', '17:00:00', '17:30:00', 'Wednesday', 0),
(386, 'CVSUIAO469172580', '17:30:00', '18:00:00', 'Wednesday', 0),
(387, 'CVSUIAO469172580', '18:00:00', '18:30:00', 'Wednesday', 0),
(388, 'CVSUIAO469172580', '18:30:00', '19:00:00', 'Wednesday', 0),
(389, 'CVSUIAO469172580', '19:00:00', '19:30:00', 'Wednesday', 0),
(390, 'CVSUIAO469172580', '19:30:00', '20:00:00', 'Wednesday', 0),
(391, 'CVSUIAO469172580', '07:00:00', '07:30:00', 'Thursday', 0),
(392, 'CVSUIAO469172580', '07:30:00', '08:00:00', 'Thursday', 1),
(393, 'CVSUIAO469172580', '08:00:00', '08:30:00', 'Thursday', 1),
(394, 'CVSUIAO469172580', '08:30:00', '09:00:00', 'Thursday', 1),
(395, 'CVSUIAO469172580', '09:00:00', '09:30:00', 'Thursday', 1),
(396, 'CVSUIAO469172580', '09:30:00', '10:00:00', 'Thursday', 1),
(397, 'CVSUIAO469172580', '10:00:00', '10:30:00', 'Thursday', 1),
(398, 'CVSUIAO469172580', '10:30:00', '11:00:00', 'Thursday', 1),
(399, 'CVSUIAO469172580', '11:00:00', '11:30:00', 'Thursday', 0),
(400, 'CVSUIAO469172580', '11:30:00', '12:00:00', 'Thursday', 0),
(401, 'CVSUIAO469172580', '12:00:00', '12:30:00', 'Thursday', 1),
(402, 'CVSUIAO469172580', '12:30:00', '13:00:00', 'Thursday', 1),
(403, 'CVSUIAO469172580', '13:00:00', '13:30:00', 'Thursday', 1),
(404, 'CVSUIAO469172580', '13:30:00', '14:00:00', 'Thursday', 1),
(405, 'CVSUIAO469172580', '14:00:00', '14:30:00', 'Thursday', 0),
(406, 'CVSUIAO469172580', '14:30:00', '15:00:00', 'Thursday', 0),
(407, 'CVSUIAO469172580', '15:00:00', '15:30:00', 'Thursday', 0),
(408, 'CVSUIAO469172580', '15:30:00', '16:00:00', 'Thursday', 0),
(409, 'CVSUIAO469172580', '16:00:00', '16:30:00', 'Thursday', 0),
(410, 'CVSUIAO469172580', '16:30:00', '17:00:00', 'Thursday', 1),
(411, 'CVSUIAO469172580', '17:00:00', '17:30:00', 'Thursday', 1),
(412, 'CVSUIAO469172580', '17:30:00', '18:00:00', 'Thursday', 1),
(413, 'CVSUIAO469172580', '18:00:00', '18:30:00', 'Thursday', 1),
(414, 'CVSUIAO469172580', '18:30:00', '19:00:00', 'Thursday', 1),
(415, 'CVSUIAO469172580', '19:00:00', '19:30:00', 'Thursday', 0),
(416, 'CVSUIAO469172580', '19:30:00', '20:00:00', 'Thursday', 0),
(417, 'CVSUIAO469172580', '07:00:00', '07:30:00', 'Friday', 0),
(418, 'CVSUIAO469172580', '07:30:00', '08:00:00', 'Friday', 0),
(419, 'CVSUIAO469172580', '08:00:00', '08:30:00', 'Friday', 0),
(420, 'CVSUIAO469172580', '08:30:00', '09:00:00', 'Friday', 0),
(421, 'CVSUIAO469172580', '09:00:00', '09:30:00', 'Friday', 0),
(422, 'CVSUIAO469172580', '09:30:00', '10:00:00', 'Friday', 1),
(423, 'CVSUIAO469172580', '10:00:00', '10:30:00', 'Friday', 1),
(424, 'CVSUIAO469172580', '10:30:00', '11:00:00', 'Friday', 1),
(425, 'CVSUIAO469172580', '11:00:00', '11:30:00', 'Friday', 1),
(426, 'CVSUIAO469172580', '11:30:00', '12:00:00', 'Friday', 1),
(427, 'CVSUIAO469172580', '12:00:00', '12:30:00', 'Friday', 1),
(428, 'CVSUIAO469172580', '12:30:00', '13:00:00', 'Friday', 0),
(429, 'CVSUIAO469172580', '13:00:00', '13:30:00', 'Friday', 0),
(430, 'CVSUIAO469172580', '13:30:00', '14:00:00', 'Friday', 0),
(431, 'CVSUIAO469172580', '14:00:00', '14:30:00', 'Friday', 0),
(432, 'CVSUIAO469172580', '14:30:00', '15:00:00', 'Friday', 0),
(433, 'CVSUIAO469172580', '15:00:00', '15:30:00', 'Friday', 0),
(434, 'CVSUIAO469172580', '15:30:00', '16:00:00', 'Friday', 0),
(435, 'CVSUIAO469172580', '16:00:00', '16:30:00', 'Friday', 0),
(436, 'CVSUIAO469172580', '16:30:00', '17:00:00', 'Friday', 0),
(437, 'CVSUIAO469172580', '17:00:00', '17:30:00', 'Friday', 0),
(438, 'CVSUIAO469172580', '17:30:00', '18:00:00', 'Friday', 0),
(439, 'CVSUIAO469172580', '18:00:00', '18:30:00', 'Friday', 0),
(440, 'CVSUIAO469172580', '18:30:00', '19:00:00', 'Friday', 0),
(441, 'CVSUIAO469172580', '19:00:00', '19:30:00', 'Friday', 0),
(442, 'CVSUIAO469172580', '19:30:00', '20:00:00', 'Friday', 0),
(443, 'CVSUIAO469172580', '07:00:00', '07:30:00', 'Saturday', 0),
(444, 'CVSUIAO469172580', '07:30:00', '08:00:00', 'Saturday', 1),
(445, 'CVSUIAO469172580', '08:00:00', '08:30:00', 'Saturday', 1),
(446, 'CVSUIAO469172580', '08:30:00', '09:00:00', 'Saturday', 1),
(447, 'CVSUIAO469172580', '09:00:00', '09:30:00', 'Saturday', 1),
(448, 'CVSUIAO469172580', '09:30:00', '10:00:00', 'Saturday', 1),
(449, 'CVSUIAO469172580', '10:00:00', '10:30:00', 'Saturday', 1),
(450, 'CVSUIAO469172580', '10:30:00', '11:00:00', 'Saturday', 1),
(451, 'CVSUIAO469172580', '11:00:00', '11:30:00', 'Saturday', 1),
(452, 'CVSUIAO469172580', '11:30:00', '12:00:00', 'Saturday', 1),
(453, 'CVSUIAO469172580', '12:00:00', '12:30:00', 'Saturday', 0),
(454, 'CVSUIAO469172580', '12:30:00', '13:00:00', 'Saturday', 0),
(455, 'CVSUIAO469172580', '13:00:00', '13:30:00', 'Saturday', 0),
(456, 'CVSUIAO469172580', '13:30:00', '14:00:00', 'Saturday', 0),
(457, 'CVSUIAO469172580', '14:00:00', '14:30:00', 'Saturday', 0),
(458, 'CVSUIAO469172580', '14:30:00', '15:00:00', 'Saturday', 0),
(459, 'CVSUIAO469172580', '15:00:00', '15:30:00', 'Saturday', 0),
(460, 'CVSUIAO469172580', '15:30:00', '16:00:00', 'Saturday', 0),
(461, 'CVSUIAO469172580', '16:00:00', '16:30:00', 'Saturday', 0),
(462, 'CVSUIAO469172580', '16:30:00', '17:00:00', 'Saturday', 0),
(463, 'CVSUIAO469172580', '17:00:00', '17:30:00', 'Saturday', 0),
(464, 'CVSUIAO469172580', '17:30:00', '18:00:00', 'Saturday', 0),
(465, 'CVSUIAO469172580', '18:00:00', '18:30:00', 'Saturday', 0),
(466, 'CVSUIAO469172580', '18:30:00', '19:00:00', 'Saturday', 0),
(467, 'CVSUIAO469172580', '19:00:00', '19:30:00', 'Saturday', 0),
(468, 'CVSUIAO469172580', '19:30:00', '20:00:00', 'Saturday', 0),
(469, 'CVSUBXP304892576', '07:00:00', '07:30:00', 'Monday', 1),
(470, 'CVSUBXP304892576', '07:30:00', '08:00:00', 'Monday', 1),
(471, 'CVSUBXP304892576', '08:00:00', '08:30:00', 'Monday', 1),
(472, 'CVSUBXP304892576', '08:30:00', '09:00:00', 'Monday', 1),
(473, 'CVSUBXP304892576', '09:00:00', '09:30:00', 'Monday', 1),
(474, 'CVSUBXP304892576', '09:30:00', '10:00:00', 'Monday', 1),
(475, 'CVSUBXP304892576', '10:00:00', '10:30:00', 'Monday', 0),
(476, 'CVSUBXP304892576', '10:30:00', '11:00:00', 'Monday', 0),
(477, 'CVSUBXP304892576', '11:00:00', '11:30:00', 'Monday', 0),
(478, 'CVSUBXP304892576', '11:30:00', '12:00:00', 'Monday', 0),
(479, 'CVSUBXP304892576', '12:00:00', '12:30:00', 'Monday', 0),
(480, 'CVSUBXP304892576', '12:30:00', '13:00:00', 'Monday', 0),
(481, 'CVSUBXP304892576', '13:00:00', '13:30:00', 'Monday', 0),
(482, 'CVSUBXP304892576', '13:30:00', '14:00:00', 'Monday', 0),
(483, 'CVSUBXP304892576', '14:00:00', '14:30:00', 'Monday', 0),
(484, 'CVSUBXP304892576', '14:30:00', '15:00:00', 'Monday', 0),
(485, 'CVSUBXP304892576', '15:00:00', '15:30:00', 'Monday', 0),
(486, 'CVSUBXP304892576', '15:30:00', '16:00:00', 'Monday', 0),
(487, 'CVSUBXP304892576', '16:00:00', '16:30:00', 'Monday', 0),
(488, 'CVSUBXP304892576', '16:30:00', '17:00:00', 'Monday', 0),
(489, 'CVSUBXP304892576', '17:00:00', '17:30:00', 'Monday', 0),
(490, 'CVSUBXP304892576', '17:30:00', '18:00:00', 'Monday', 0),
(491, 'CVSUBXP304892576', '18:00:00', '18:30:00', 'Monday', 0),
(492, 'CVSUBXP304892576', '18:30:00', '19:00:00', 'Monday', 0),
(493, 'CVSUBXP304892576', '19:00:00', '19:30:00', 'Monday', 0),
(494, 'CVSUBXP304892576', '19:30:00', '20:00:00', 'Monday', 0),
(495, 'CVSUBXP304892576', '07:00:00', '07:30:00', 'Tuesday', 0),
(496, 'CVSUBXP304892576', '07:30:00', '08:00:00', 'Tuesday', 0),
(497, 'CVSUBXP304892576', '08:00:00', '08:30:00', 'Tuesday', 0),
(498, 'CVSUBXP304892576', '08:30:00', '09:00:00', 'Tuesday', 0),
(499, 'CVSUBXP304892576', '09:00:00', '09:30:00', 'Tuesday', 0),
(500, 'CVSUBXP304892576', '09:30:00', '10:00:00', 'Tuesday', 0),
(501, 'CVSUBXP304892576', '10:00:00', '10:30:00', 'Tuesday', 0),
(502, 'CVSUBXP304892576', '10:30:00', '11:00:00', 'Tuesday', 1),
(503, 'CVSUBXP304892576', '11:00:00', '11:30:00', 'Tuesday', 1),
(504, 'CVSUBXP304892576', '11:30:00', '12:00:00', 'Tuesday', 1),
(505, 'CVSUBXP304892576', '12:00:00', '12:30:00', 'Tuesday', 1),
(506, 'CVSUBXP304892576', '12:30:00', '13:00:00', 'Tuesday', 0),
(507, 'CVSUBXP304892576', '13:00:00', '13:30:00', 'Tuesday', 0),
(508, 'CVSUBXP304892576', '13:30:00', '14:00:00', 'Tuesday', 0),
(509, 'CVSUBXP304892576', '14:00:00', '14:30:00', 'Tuesday', 0),
(510, 'CVSUBXP304892576', '14:30:00', '15:00:00', 'Tuesday', 0),
(511, 'CVSUBXP304892576', '15:00:00', '15:30:00', 'Tuesday', 0),
(512, 'CVSUBXP304892576', '15:30:00', '16:00:00', 'Tuesday', 0),
(513, 'CVSUBXP304892576', '16:00:00', '16:30:00', 'Tuesday', 0),
(514, 'CVSUBXP304892576', '16:30:00', '17:00:00', 'Tuesday', 0),
(515, 'CVSUBXP304892576', '17:00:00', '17:30:00', 'Tuesday', 0),
(516, 'CVSUBXP304892576', '17:30:00', '18:00:00', 'Tuesday', 0),
(517, 'CVSUBXP304892576', '18:00:00', '18:30:00', 'Tuesday', 0),
(518, 'CVSUBXP304892576', '18:30:00', '19:00:00', 'Tuesday', 0),
(519, 'CVSUBXP304892576', '19:00:00', '19:30:00', 'Tuesday', 0),
(520, 'CVSUBXP304892576', '19:30:00', '20:00:00', 'Tuesday', 0),
(521, 'CVSUBXP304892576', '07:00:00', '07:30:00', 'Wednesday', 1),
(522, 'CVSUBXP304892576', '07:30:00', '08:00:00', 'Wednesday', 1),
(523, 'CVSUBXP304892576', '08:00:00', '08:30:00', 'Wednesday', 1),
(524, 'CVSUBXP304892576', '08:30:00', '09:00:00', 'Wednesday', 0),
(525, 'CVSUBXP304892576', '09:00:00', '09:30:00', 'Wednesday', 1),
(526, 'CVSUBXP304892576', '09:30:00', '10:00:00', 'Wednesday', 1),
(527, 'CVSUBXP304892576', '10:00:00', '10:30:00', 'Wednesday', 1),
(528, 'CVSUBXP304892576', '10:30:00', '11:00:00', 'Wednesday', 0),
(529, 'CVSUBXP304892576', '11:00:00', '11:30:00', 'Wednesday', 0),
(530, 'CVSUBXP304892576', '11:30:00', '12:00:00', 'Wednesday', 0),
(531, 'CVSUBXP304892576', '12:00:00', '12:30:00', 'Wednesday', 0),
(532, 'CVSUBXP304892576', '12:30:00', '13:00:00', 'Wednesday', 0),
(533, 'CVSUBXP304892576', '13:00:00', '13:30:00', 'Wednesday', 0),
(534, 'CVSUBXP304892576', '13:30:00', '14:00:00', 'Wednesday', 0),
(535, 'CVSUBXP304892576', '14:00:00', '14:30:00', 'Wednesday', 0),
(536, 'CVSUBXP304892576', '14:30:00', '15:00:00', 'Wednesday', 0),
(537, 'CVSUBXP304892576', '15:00:00', '15:30:00', 'Wednesday', 0),
(538, 'CVSUBXP304892576', '15:30:00', '16:00:00', 'Wednesday', 0),
(539, 'CVSUBXP304892576', '16:00:00', '16:30:00', 'Wednesday', 0),
(540, 'CVSUBXP304892576', '16:30:00', '17:00:00', 'Wednesday', 0),
(541, 'CVSUBXP304892576', '17:00:00', '17:30:00', 'Wednesday', 0),
(542, 'CVSUBXP304892576', '17:30:00', '18:00:00', 'Wednesday', 0),
(543, 'CVSUBXP304892576', '18:00:00', '18:30:00', 'Wednesday', 0),
(544, 'CVSUBXP304892576', '18:30:00', '19:00:00', 'Wednesday', 0),
(545, 'CVSUBXP304892576', '19:00:00', '19:30:00', 'Wednesday', 0),
(546, 'CVSUBXP304892576', '19:30:00', '20:00:00', 'Wednesday', 0),
(547, 'CVSUBXP304892576', '07:00:00', '07:30:00', 'Thursday', 0),
(548, 'CVSUBXP304892576', '07:30:00', '08:00:00', 'Thursday', 0),
(549, 'CVSUBXP304892576', '08:00:00', '08:30:00', 'Thursday', 0),
(550, 'CVSUBXP304892576', '08:30:00', '09:00:00', 'Thursday', 0),
(551, 'CVSUBXP304892576', '09:00:00', '09:30:00', 'Thursday', 1),
(552, 'CVSUBXP304892576', '09:30:00', '10:00:00', 'Thursday', 1),
(553, 'CVSUBXP304892576', '10:00:00', '10:30:00', 'Thursday', 1),
(554, 'CVSUBXP304892576', '10:30:00', '11:00:00', 'Thursday', 1),
(555, 'CVSUBXP304892576', '11:00:00', '11:30:00', 'Thursday', 0),
(556, 'CVSUBXP304892576', '11:30:00', '12:00:00', 'Thursday', 0),
(557, 'CVSUBXP304892576', '12:00:00', '12:30:00', 'Thursday', 0),
(558, 'CVSUBXP304892576', '12:30:00', '13:00:00', 'Thursday', 0),
(559, 'CVSUBXP304892576', '13:00:00', '13:30:00', 'Thursday', 0),
(560, 'CVSUBXP304892576', '13:30:00', '14:00:00', 'Thursday', 0),
(561, 'CVSUBXP304892576', '14:00:00', '14:30:00', 'Thursday', 0),
(562, 'CVSUBXP304892576', '14:30:00', '15:00:00', 'Thursday', 0),
(563, 'CVSUBXP304892576', '15:00:00', '15:30:00', 'Thursday', 0),
(564, 'CVSUBXP304892576', '15:30:00', '16:00:00', 'Thursday', 0),
(565, 'CVSUBXP304892576', '16:00:00', '16:30:00', 'Thursday', 0),
(566, 'CVSUBXP304892576', '16:30:00', '17:00:00', 'Thursday', 0),
(567, 'CVSUBXP304892576', '17:00:00', '17:30:00', 'Thursday', 0),
(568, 'CVSUBXP304892576', '17:30:00', '18:00:00', 'Thursday', 0),
(569, 'CVSUBXP304892576', '18:00:00', '18:30:00', 'Thursday', 0),
(570, 'CVSUBXP304892576', '18:30:00', '19:00:00', 'Thursday', 0),
(571, 'CVSUBXP304892576', '19:00:00', '19:30:00', 'Thursday', 0),
(572, 'CVSUBXP304892576', '19:30:00', '20:00:00', 'Thursday', 0),
(573, 'CVSUBXP304892576', '07:00:00', '07:30:00', 'Friday', 1),
(574, 'CVSUBXP304892576', '07:30:00', '08:00:00', 'Friday', 1),
(575, 'CVSUBXP304892576', '08:00:00', '08:30:00', 'Friday', 1),
(576, 'CVSUBXP304892576', '08:30:00', '09:00:00', 'Friday', 0),
(577, 'CVSUBXP304892576', '09:00:00', '09:30:00', 'Friday', 0),
(578, 'CVSUBXP304892576', '09:30:00', '10:00:00', 'Friday', 0),
(579, 'CVSUBXP304892576', '10:00:00', '10:30:00', 'Friday', 0),
(580, 'CVSUBXP304892576', '10:30:00', '11:00:00', 'Friday', 0),
(581, 'CVSUBXP304892576', '11:00:00', '11:30:00', 'Friday', 0),
(582, 'CVSUBXP304892576', '11:30:00', '12:00:00', 'Friday', 0),
(583, 'CVSUBXP304892576', '12:00:00', '12:30:00', 'Friday', 0),
(584, 'CVSUBXP304892576', '12:30:00', '13:00:00', 'Friday', 0),
(585, 'CVSUBXP304892576', '13:00:00', '13:30:00', 'Friday', 0),
(586, 'CVSUBXP304892576', '13:30:00', '14:00:00', 'Friday', 0),
(587, 'CVSUBXP304892576', '14:00:00', '14:30:00', 'Friday', 0),
(588, 'CVSUBXP304892576', '14:30:00', '15:00:00', 'Friday', 0),
(589, 'CVSUBXP304892576', '15:00:00', '15:30:00', 'Friday', 0),
(590, 'CVSUBXP304892576', '15:30:00', '16:00:00', 'Friday', 0),
(591, 'CVSUBXP304892576', '16:00:00', '16:30:00', 'Friday', 0),
(592, 'CVSUBXP304892576', '16:30:00', '17:00:00', 'Friday', 0),
(593, 'CVSUBXP304892576', '17:00:00', '17:30:00', 'Friday', 0),
(594, 'CVSUBXP304892576', '17:30:00', '18:00:00', 'Friday', 0),
(595, 'CVSUBXP304892576', '18:00:00', '18:30:00', 'Friday', 0),
(596, 'CVSUBXP304892576', '18:30:00', '19:00:00', 'Friday', 0),
(597, 'CVSUBXP304892576', '19:00:00', '19:30:00', 'Friday', 0),
(598, 'CVSUBXP304892576', '19:30:00', '20:00:00', 'Friday', 0),
(599, 'CVSUBXP304892576', '07:00:00', '07:30:00', 'Saturday', 1),
(600, 'CVSUBXP304892576', '07:30:00', '08:00:00', 'Saturday', 1),
(601, 'CVSUBXP304892576', '08:00:00', '08:30:00', 'Saturday', 1),
(602, 'CVSUBXP304892576', '08:30:00', '09:00:00', 'Saturday', 0),
(603, 'CVSUBXP304892576', '09:00:00', '09:30:00', 'Saturday', 0),
(604, 'CVSUBXP304892576', '09:30:00', '10:00:00', 'Saturday', 0),
(605, 'CVSUBXP304892576', '10:00:00', '10:30:00', 'Saturday', 0),
(606, 'CVSUBXP304892576', '10:30:00', '11:00:00', 'Saturday', 0),
(607, 'CVSUBXP304892576', '11:00:00', '11:30:00', 'Saturday', 0),
(608, 'CVSUBXP304892576', '11:30:00', '12:00:00', 'Saturday', 0),
(609, 'CVSUBXP304892576', '12:00:00', '12:30:00', 'Saturday', 0),
(610, 'CVSUBXP304892576', '12:30:00', '13:00:00', 'Saturday', 0),
(611, 'CVSUBXP304892576', '13:00:00', '13:30:00', 'Saturday', 0),
(612, 'CVSUBXP304892576', '13:30:00', '14:00:00', 'Saturday', 0),
(613, 'CVSUBXP304892576', '14:00:00', '14:30:00', 'Saturday', 0),
(614, 'CVSUBXP304892576', '14:30:00', '15:00:00', 'Saturday', 0),
(615, 'CVSUBXP304892576', '15:00:00', '15:30:00', 'Saturday', 0),
(616, 'CVSUBXP304892576', '15:30:00', '16:00:00', 'Saturday', 0),
(617, 'CVSUBXP304892576', '16:00:00', '16:30:00', 'Saturday', 0),
(618, 'CVSUBXP304892576', '16:30:00', '17:00:00', 'Saturday', 0),
(619, 'CVSUBXP304892576', '17:00:00', '17:30:00', 'Saturday', 0),
(620, 'CVSUBXP304892576', '17:30:00', '18:00:00', 'Saturday', 0),
(621, 'CVSUBXP304892576', '18:00:00', '18:30:00', 'Saturday', 0),
(622, 'CVSUBXP304892576', '18:30:00', '19:00:00', 'Saturday', 0),
(623, 'CVSUBXP304892576', '19:00:00', '19:30:00', 'Saturday', 0),
(624, 'CVSUBXP304892576', '19:30:00', '20:00:00', 'Saturday', 0),
(625, 'CVSUNOU746588823', '07:00:00', '07:30:00', 'Monday', 1),
(626, 'CVSUNOU746588823', '07:30:00', '08:00:00', 'Monday', 1),
(627, 'CVSUNOU746588823', '08:00:00', '08:30:00', 'Monday', 1),
(628, 'CVSUNOU746588823', '08:30:00', '09:00:00', 'Monday', 1),
(629, 'CVSUNOU746588823', '09:00:00', '09:30:00', 'Monday', 0),
(630, 'CVSUNOU746588823', '09:30:00', '10:00:00', 'Monday', 0),
(631, 'CVSUNOU746588823', '10:00:00', '10:30:00', 'Monday', 0),
(632, 'CVSUNOU746588823', '10:30:00', '11:00:00', 'Monday', 0),
(633, 'CVSUNOU746588823', '11:00:00', '11:30:00', 'Monday', 0),
(634, 'CVSUNOU746588823', '11:30:00', '12:00:00', 'Monday', 1),
(635, 'CVSUNOU746588823', '12:00:00', '12:30:00', 'Monday', 1),
(636, 'CVSUNOU746588823', '12:30:00', '13:00:00', 'Monday', 1),
(637, 'CVSUNOU746588823', '13:00:00', '13:30:00', 'Monday', 1),
(638, 'CVSUNOU746588823', '13:30:00', '14:00:00', 'Monday', 0),
(639, 'CVSUNOU746588823', '14:00:00', '14:30:00', 'Monday', 0),
(640, 'CVSUNOU746588823', '14:30:00', '15:00:00', 'Monday', 0),
(641, 'CVSUNOU746588823', '15:00:00', '15:30:00', 'Monday', 0),
(642, 'CVSUNOU746588823', '15:30:00', '16:00:00', 'Monday', 0),
(643, 'CVSUNOU746588823', '16:00:00', '16:30:00', 'Monday', 0),
(644, 'CVSUNOU746588823', '16:30:00', '17:00:00', 'Monday', 0),
(645, 'CVSUNOU746588823', '17:00:00', '17:30:00', 'Monday', 0),
(646, 'CVSUNOU746588823', '17:30:00', '18:00:00', 'Monday', 0),
(647, 'CVSUNOU746588823', '18:00:00', '18:30:00', 'Monday', 0),
(648, 'CVSUNOU746588823', '18:30:00', '19:00:00', 'Monday', 0),
(649, 'CVSUNOU746588823', '19:00:00', '19:30:00', 'Monday', 0),
(650, 'CVSUNOU746588823', '19:30:00', '20:00:00', 'Monday', 0),
(651, 'CVSUNOU746588823', '07:00:00', '07:30:00', 'Tuesday', 0),
(652, 'CVSUNOU746588823', '07:30:00', '08:00:00', 'Tuesday', 0),
(653, 'CVSUNOU746588823', '08:00:00', '08:30:00', 'Tuesday', 1),
(654, 'CVSUNOU746588823', '08:30:00', '09:00:00', 'Tuesday', 1),
(655, 'CVSUNOU746588823', '09:00:00', '09:30:00', 'Tuesday', 1),
(656, 'CVSUNOU746588823', '09:30:00', '10:00:00', 'Tuesday', 1),
(657, 'CVSUNOU746588823', '10:00:00', '10:30:00', 'Tuesday', 0),
(658, 'CVSUNOU746588823', '10:30:00', '11:00:00', 'Tuesday', 0),
(659, 'CVSUNOU746588823', '11:00:00', '11:30:00', 'Tuesday', 0),
(660, 'CVSUNOU746588823', '11:30:00', '12:00:00', 'Tuesday', 1),
(661, 'CVSUNOU746588823', '12:00:00', '12:30:00', 'Tuesday', 1),
(662, 'CVSUNOU746588823', '12:30:00', '13:00:00', 'Tuesday', 1),
(663, 'CVSUNOU746588823', '13:00:00', '13:30:00', 'Tuesday', 0),
(664, 'CVSUNOU746588823', '13:30:00', '14:00:00', 'Tuesday', 0),
(665, 'CVSUNOU746588823', '14:00:00', '14:30:00', 'Tuesday', 0),
(666, 'CVSUNOU746588823', '14:30:00', '15:00:00', 'Tuesday', 0),
(667, 'CVSUNOU746588823', '15:00:00', '15:30:00', 'Tuesday', 0),
(668, 'CVSUNOU746588823', '15:30:00', '16:00:00', 'Tuesday', 0),
(669, 'CVSUNOU746588823', '16:00:00', '16:30:00', 'Tuesday', 0),
(670, 'CVSUNOU746588823', '16:30:00', '17:00:00', 'Tuesday', 0),
(671, 'CVSUNOU746588823', '17:00:00', '17:30:00', 'Tuesday', 0),
(672, 'CVSUNOU746588823', '17:30:00', '18:00:00', 'Tuesday', 0),
(673, 'CVSUNOU746588823', '18:00:00', '18:30:00', 'Tuesday', 0),
(674, 'CVSUNOU746588823', '18:30:00', '19:00:00', 'Tuesday', 0),
(675, 'CVSUNOU746588823', '19:00:00', '19:30:00', 'Tuesday', 0),
(676, 'CVSUNOU746588823', '19:30:00', '20:00:00', 'Tuesday', 0),
(677, 'CVSUNOU746588823', '07:00:00', '07:30:00', 'Wednesday', 0),
(678, 'CVSUNOU746588823', '07:30:00', '08:00:00', 'Wednesday', 0),
(679, 'CVSUNOU746588823', '08:00:00', '08:30:00', 'Wednesday', 0),
(680, 'CVSUNOU746588823', '08:30:00', '09:00:00', 'Wednesday', 0),
(681, 'CVSUNOU746588823', '09:00:00', '09:30:00', 'Wednesday', 1),
(682, 'CVSUNOU746588823', '09:30:00', '10:00:00', 'Wednesday', 1),
(683, 'CVSUNOU746588823', '10:00:00', '10:30:00', 'Wednesday', 1),
(684, 'CVSUNOU746588823', '10:30:00', '11:00:00', 'Wednesday', 1),
(685, 'CVSUNOU746588823', '11:00:00', '11:30:00', 'Wednesday', 1),
(686, 'CVSUNOU746588823', '11:30:00', '12:00:00', 'Wednesday', 1),
(687, 'CVSUNOU746588823', '12:00:00', '12:30:00', 'Wednesday', 0),
(688, 'CVSUNOU746588823', '12:30:00', '13:00:00', 'Wednesday', 0),
(689, 'CVSUNOU746588823', '13:00:00', '13:30:00', 'Wednesday', 0),
(690, 'CVSUNOU746588823', '13:30:00', '14:00:00', 'Wednesday', 0),
(691, 'CVSUNOU746588823', '14:00:00', '14:30:00', 'Wednesday', 0),
(692, 'CVSUNOU746588823', '14:30:00', '15:00:00', 'Wednesday', 0),
(693, 'CVSUNOU746588823', '15:00:00', '15:30:00', 'Wednesday', 0),
(694, 'CVSUNOU746588823', '15:30:00', '16:00:00', 'Wednesday', 0),
(695, 'CVSUNOU746588823', '16:00:00', '16:30:00', 'Wednesday', 0),
(696, 'CVSUNOU746588823', '16:30:00', '17:00:00', 'Wednesday', 0),
(697, 'CVSUNOU746588823', '17:00:00', '17:30:00', 'Wednesday', 0),
(698, 'CVSUNOU746588823', '17:30:00', '18:00:00', 'Wednesday', 0),
(699, 'CVSUNOU746588823', '18:00:00', '18:30:00', 'Wednesday', 0),
(700, 'CVSUNOU746588823', '18:30:00', '19:00:00', 'Wednesday', 0),
(701, 'CVSUNOU746588823', '19:00:00', '19:30:00', 'Wednesday', 0),
(702, 'CVSUNOU746588823', '19:30:00', '20:00:00', 'Wednesday', 0),
(703, 'CVSUNOU746588823', '07:00:00', '07:30:00', 'Thursday', 0),
(704, 'CVSUNOU746588823', '07:30:00', '08:00:00', 'Thursday', 0),
(705, 'CVSUNOU746588823', '08:00:00', '08:30:00', 'Thursday', 1),
(706, 'CVSUNOU746588823', '08:30:00', '09:00:00', 'Thursday', 1),
(707, 'CVSUNOU746588823', '09:00:00', '09:30:00', 'Thursday', 0),
(708, 'CVSUNOU746588823', '09:30:00', '10:00:00', 'Thursday', 0),
(709, 'CVSUNOU746588823', '10:00:00', '10:30:00', 'Thursday', 0),
(710, 'CVSUNOU746588823', '10:30:00', '11:00:00', 'Thursday', 0),
(711, 'CVSUNOU746588823', '11:00:00', '11:30:00', 'Thursday', 0),
(712, 'CVSUNOU746588823', '11:30:00', '12:00:00', 'Thursday', 0),
(713, 'CVSUNOU746588823', '12:00:00', '12:30:00', 'Thursday', 1),
(714, 'CVSUNOU746588823', '12:30:00', '13:00:00', 'Thursday', 1),
(715, 'CVSUNOU746588823', '13:00:00', '13:30:00', 'Thursday', 1),
(716, 'CVSUNOU746588823', '13:30:00', '14:00:00', 'Thursday', 1),
(717, 'CVSUNOU746588823', '14:00:00', '14:30:00', 'Thursday', 0),
(718, 'CVSUNOU746588823', '14:30:00', '15:00:00', 'Thursday', 0),
(719, 'CVSUNOU746588823', '15:00:00', '15:30:00', 'Thursday', 0),
(720, 'CVSUNOU746588823', '15:30:00', '16:00:00', 'Thursday', 0),
(721, 'CVSUNOU746588823', '16:00:00', '16:30:00', 'Thursday', 0),
(722, 'CVSUNOU746588823', '16:30:00', '17:00:00', 'Thursday', 0),
(723, 'CVSUNOU746588823', '17:00:00', '17:30:00', 'Thursday', 0),
(724, 'CVSUNOU746588823', '17:30:00', '18:00:00', 'Thursday', 0),
(725, 'CVSUNOU746588823', '18:00:00', '18:30:00', 'Thursday', 0),
(726, 'CVSUNOU746588823', '18:30:00', '19:00:00', 'Thursday', 0),
(727, 'CVSUNOU746588823', '19:00:00', '19:30:00', 'Thursday', 0),
(728, 'CVSUNOU746588823', '19:30:00', '20:00:00', 'Thursday', 0),
(729, 'CVSUNOU746588823', '07:00:00', '07:30:00', 'Friday', 0),
(730, 'CVSUNOU746588823', '07:30:00', '08:00:00', 'Friday', 1),
(731, 'CVSUNOU746588823', '08:00:00', '08:30:00', 'Friday', 1),
(732, 'CVSUNOU746588823', '08:30:00', '09:00:00', 'Friday', 0),
(733, 'CVSUNOU746588823', '09:00:00', '09:30:00', 'Friday', 1),
(734, 'CVSUNOU746588823', '09:30:00', '10:00:00', 'Friday', 1),
(735, 'CVSUNOU746588823', '10:00:00', '10:30:00', 'Friday', 0),
(736, 'CVSUNOU746588823', '10:30:00', '11:00:00', 'Friday', 0),
(737, 'CVSUNOU746588823', '11:00:00', '11:30:00', 'Friday', 0),
(738, 'CVSUNOU746588823', '11:30:00', '12:00:00', 'Friday', 0),
(739, 'CVSUNOU746588823', '12:00:00', '12:30:00', 'Friday', 0),
(740, 'CVSUNOU746588823', '12:30:00', '13:00:00', 'Friday', 0),
(741, 'CVSUNOU746588823', '13:00:00', '13:30:00', 'Friday', 0),
(742, 'CVSUNOU746588823', '13:30:00', '14:00:00', 'Friday', 0),
(743, 'CVSUNOU746588823', '14:00:00', '14:30:00', 'Friday', 0),
(744, 'CVSUNOU746588823', '14:30:00', '15:00:00', 'Friday', 0),
(745, 'CVSUNOU746588823', '15:00:00', '15:30:00', 'Friday', 0),
(746, 'CVSUNOU746588823', '15:30:00', '16:00:00', 'Friday', 0),
(747, 'CVSUNOU746588823', '16:00:00', '16:30:00', 'Friday', 0),
(748, 'CVSUNOU746588823', '16:30:00', '17:00:00', 'Friday', 0),
(749, 'CVSUNOU746588823', '17:00:00', '17:30:00', 'Friday', 0),
(750, 'CVSUNOU746588823', '17:30:00', '18:00:00', 'Friday', 0),
(751, 'CVSUNOU746588823', '18:00:00', '18:30:00', 'Friday', 0),
(752, 'CVSUNOU746588823', '18:30:00', '19:00:00', 'Friday', 0),
(753, 'CVSUNOU746588823', '19:00:00', '19:30:00', 'Friday', 0),
(754, 'CVSUNOU746588823', '19:30:00', '20:00:00', 'Friday', 0),
(755, 'CVSUNOU746588823', '07:00:00', '07:30:00', 'Saturday', 0),
(756, 'CVSUNOU746588823', '07:30:00', '08:00:00', 'Saturday', 0),
(757, 'CVSUNOU746588823', '08:00:00', '08:30:00', 'Saturday', 0),
(758, 'CVSUNOU746588823', '08:30:00', '09:00:00', 'Saturday', 0),
(759, 'CVSUNOU746588823', '09:00:00', '09:30:00', 'Saturday', 1),
(760, 'CVSUNOU746588823', '09:30:00', '10:00:00', 'Saturday', 1),
(761, 'CVSUNOU746588823', '10:00:00', '10:30:00', 'Saturday', 0),
(762, 'CVSUNOU746588823', '10:30:00', '11:00:00', 'Saturday', 0),
(763, 'CVSUNOU746588823', '11:00:00', '11:30:00', 'Saturday', 0),
(764, 'CVSUNOU746588823', '11:30:00', '12:00:00', 'Saturday', 0),
(765, 'CVSUNOU746588823', '12:00:00', '12:30:00', 'Saturday', 0),
(766, 'CVSUNOU746588823', '12:30:00', '13:00:00', 'Saturday', 1),
(767, 'CVSUNOU746588823', '13:00:00', '13:30:00', 'Saturday', 1),
(768, 'CVSUNOU746588823', '13:30:00', '14:00:00', 'Saturday', 1),
(769, 'CVSUNOU746588823', '14:00:00', '14:30:00', 'Saturday', 1),
(770, 'CVSUNOU746588823', '14:30:00', '15:00:00', 'Saturday', 1),
(771, 'CVSUNOU746588823', '15:00:00', '15:30:00', 'Saturday', 1),
(772, 'CVSUNOU746588823', '15:30:00', '16:00:00', 'Saturday', 0),
(773, 'CVSUNOU746588823', '16:00:00', '16:30:00', 'Saturday', 0),
(774, 'CVSUNOU746588823', '16:30:00', '17:00:00', 'Saturday', 0),
(775, 'CVSUNOU746588823', '17:00:00', '17:30:00', 'Saturday', 0),
(776, 'CVSUNOU746588823', '17:30:00', '18:00:00', 'Saturday', 0),
(777, 'CVSUNOU746588823', '18:00:00', '18:30:00', 'Saturday', 0),
(778, 'CVSUNOU746588823', '18:30:00', '19:00:00', 'Saturday', 0),
(779, 'CVSUNOU746588823', '19:00:00', '19:30:00', 'Saturday', 0),
(780, 'CVSUNOU746588823', '19:30:00', '20:00:00', 'Saturday', 0),
(781, 'CVSUPOB591062721', '07:00:00', '07:30:00', 'Monday', 0),
(782, 'CVSUPOB591062721', '07:30:00', '08:00:00', 'Monday', 0),
(783, 'CVSUPOB591062721', '08:00:00', '08:30:00', 'Monday', 0),
(784, 'CVSUPOB591062721', '08:30:00', '09:00:00', 'Monday', 0),
(785, 'CVSUPOB591062721', '09:00:00', '09:30:00', 'Monday', 0),
(786, 'CVSUPOB591062721', '09:30:00', '10:00:00', 'Monday', 0),
(787, 'CVSUPOB591062721', '10:00:00', '10:30:00', 'Monday', 0),
(788, 'CVSUPOB591062721', '10:30:00', '11:00:00', 'Monday', 0),
(789, 'CVSUPOB591062721', '11:00:00', '11:30:00', 'Monday', 0);
INSERT INTO `schedules` (`id`, `employee_id`, `time_in`, `time_out`, `day`, `isCheck`) VALUES
(790, 'CVSUPOB591062721', '11:30:00', '12:00:00', 'Monday', 0),
(791, 'CVSUPOB591062721', '12:00:00', '12:30:00', 'Monday', 0),
(792, 'CVSUPOB591062721', '12:30:00', '13:00:00', 'Monday', 0),
(793, 'CVSUPOB591062721', '13:00:00', '13:30:00', 'Monday', 0),
(794, 'CVSUPOB591062721', '13:30:00', '14:00:00', 'Monday', 0),
(795, 'CVSUPOB591062721', '14:00:00', '14:30:00', 'Monday', 0),
(796, 'CVSUPOB591062721', '14:30:00', '15:00:00', 'Monday', 0),
(797, 'CVSUPOB591062721', '15:00:00', '15:30:00', 'Monday', 0),
(798, 'CVSUPOB591062721', '15:30:00', '16:00:00', 'Monday', 0),
(799, 'CVSUPOB591062721', '16:00:00', '16:30:00', 'Monday', 0),
(800, 'CVSUPOB591062721', '16:30:00', '17:00:00', 'Monday', 0),
(801, 'CVSUPOB591062721', '17:00:00', '17:30:00', 'Monday', 0),
(802, 'CVSUPOB591062721', '17:30:00', '18:00:00', 'Monday', 0),
(803, 'CVSUPOB591062721', '18:00:00', '18:30:00', 'Monday', 0),
(804, 'CVSUPOB591062721', '18:30:00', '19:00:00', 'Monday', 0),
(805, 'CVSUPOB591062721', '19:00:00', '19:30:00', 'Monday', 0),
(806, 'CVSUPOB591062721', '19:30:00', '20:00:00', 'Monday', 0),
(807, 'CVSUPOB591062721', '07:00:00', '07:30:00', 'Tuesday', 0),
(808, 'CVSUPOB591062721', '07:30:00', '08:00:00', 'Tuesday', 0),
(809, 'CVSUPOB591062721', '08:00:00', '08:30:00', 'Tuesday', 0),
(810, 'CVSUPOB591062721', '08:30:00', '09:00:00', 'Tuesday', 0),
(811, 'CVSUPOB591062721', '09:00:00', '09:30:00', 'Tuesday', 0),
(812, 'CVSUPOB591062721', '09:30:00', '10:00:00', 'Tuesday', 0),
(813, 'CVSUPOB591062721', '10:00:00', '10:30:00', 'Tuesday', 0),
(814, 'CVSUPOB591062721', '10:30:00', '11:00:00', 'Tuesday', 0),
(815, 'CVSUPOB591062721', '11:00:00', '11:30:00', 'Tuesday', 0),
(816, 'CVSUPOB591062721', '11:30:00', '12:00:00', 'Tuesday', 0),
(817, 'CVSUPOB591062721', '12:00:00', '12:30:00', 'Tuesday', 0),
(818, 'CVSUPOB591062721', '12:30:00', '13:00:00', 'Tuesday', 0),
(819, 'CVSUPOB591062721', '13:00:00', '13:30:00', 'Tuesday', 0),
(820, 'CVSUPOB591062721', '13:30:00', '14:00:00', 'Tuesday', 0),
(821, 'CVSUPOB591062721', '14:00:00', '14:30:00', 'Tuesday', 0),
(822, 'CVSUPOB591062721', '14:30:00', '15:00:00', 'Tuesday', 0),
(823, 'CVSUPOB591062721', '15:00:00', '15:30:00', 'Tuesday', 0),
(824, 'CVSUPOB591062721', '15:30:00', '16:00:00', 'Tuesday', 0),
(825, 'CVSUPOB591062721', '16:00:00', '16:30:00', 'Tuesday', 0),
(826, 'CVSUPOB591062721', '16:30:00', '17:00:00', 'Tuesday', 0),
(827, 'CVSUPOB591062721', '17:00:00', '17:30:00', 'Tuesday', 0),
(828, 'CVSUPOB591062721', '17:30:00', '18:00:00', 'Tuesday', 0),
(829, 'CVSUPOB591062721', '18:00:00', '18:30:00', 'Tuesday', 0),
(830, 'CVSUPOB591062721', '18:30:00', '19:00:00', 'Tuesday', 0),
(831, 'CVSUPOB591062721', '19:00:00', '19:30:00', 'Tuesday', 0),
(832, 'CVSUPOB591062721', '19:30:00', '20:00:00', 'Tuesday', 0),
(833, 'CVSUPOB591062721', '07:00:00', '07:30:00', 'Wednesday', 0),
(834, 'CVSUPOB591062721', '07:30:00', '08:00:00', 'Wednesday', 0),
(835, 'CVSUPOB591062721', '08:00:00', '08:30:00', 'Wednesday', 0),
(836, 'CVSUPOB591062721', '08:30:00', '09:00:00', 'Wednesday', 0),
(837, 'CVSUPOB591062721', '09:00:00', '09:30:00', 'Wednesday', 0),
(838, 'CVSUPOB591062721', '09:30:00', '10:00:00', 'Wednesday', 0),
(839, 'CVSUPOB591062721', '10:00:00', '10:30:00', 'Wednesday', 0),
(840, 'CVSUPOB591062721', '10:30:00', '11:00:00', 'Wednesday', 0),
(841, 'CVSUPOB591062721', '11:00:00', '11:30:00', 'Wednesday', 0),
(842, 'CVSUPOB591062721', '11:30:00', '12:00:00', 'Wednesday', 0),
(843, 'CVSUPOB591062721', '12:00:00', '12:30:00', 'Wednesday', 0),
(844, 'CVSUPOB591062721', '12:30:00', '13:00:00', 'Wednesday', 0),
(845, 'CVSUPOB591062721', '13:00:00', '13:30:00', 'Wednesday', 0),
(846, 'CVSUPOB591062721', '13:30:00', '14:00:00', 'Wednesday', 0),
(847, 'CVSUPOB591062721', '14:00:00', '14:30:00', 'Wednesday', 0),
(848, 'CVSUPOB591062721', '14:30:00', '15:00:00', 'Wednesday', 0),
(849, 'CVSUPOB591062721', '15:00:00', '15:30:00', 'Wednesday', 0),
(850, 'CVSUPOB591062721', '15:30:00', '16:00:00', 'Wednesday', 0),
(851, 'CVSUPOB591062721', '16:00:00', '16:30:00', 'Wednesday', 0),
(852, 'CVSUPOB591062721', '16:30:00', '17:00:00', 'Wednesday', 0),
(853, 'CVSUPOB591062721', '17:00:00', '17:30:00', 'Wednesday', 0),
(854, 'CVSUPOB591062721', '17:30:00', '18:00:00', 'Wednesday', 0),
(855, 'CVSUPOB591062721', '18:00:00', '18:30:00', 'Wednesday', 0),
(856, 'CVSUPOB591062721', '18:30:00', '19:00:00', 'Wednesday', 0),
(857, 'CVSUPOB591062721', '19:00:00', '19:30:00', 'Wednesday', 0),
(858, 'CVSUPOB591062721', '19:30:00', '20:00:00', 'Wednesday', 0),
(859, 'CVSUPOB591062721', '07:00:00', '07:30:00', 'Thursday', 0),
(860, 'CVSUPOB591062721', '07:30:00', '08:00:00', 'Thursday', 0),
(861, 'CVSUPOB591062721', '08:00:00', '08:30:00', 'Thursday', 0),
(862, 'CVSUPOB591062721', '08:30:00', '09:00:00', 'Thursday', 0),
(863, 'CVSUPOB591062721', '09:00:00', '09:30:00', 'Thursday', 0),
(864, 'CVSUPOB591062721', '09:30:00', '10:00:00', 'Thursday', 0),
(865, 'CVSUPOB591062721', '10:00:00', '10:30:00', 'Thursday', 0),
(866, 'CVSUPOB591062721', '10:30:00', '11:00:00', 'Thursday', 0),
(867, 'CVSUPOB591062721', '11:00:00', '11:30:00', 'Thursday', 0),
(868, 'CVSUPOB591062721', '11:30:00', '12:00:00', 'Thursday', 0),
(869, 'CVSUPOB591062721', '12:00:00', '12:30:00', 'Thursday', 0),
(870, 'CVSUPOB591062721', '12:30:00', '13:00:00', 'Thursday', 0),
(871, 'CVSUPOB591062721', '13:00:00', '13:30:00', 'Thursday', 0),
(872, 'CVSUPOB591062721', '13:30:00', '14:00:00', 'Thursday', 0),
(873, 'CVSUPOB591062721', '14:00:00', '14:30:00', 'Thursday', 0),
(874, 'CVSUPOB591062721', '14:30:00', '15:00:00', 'Thursday', 0),
(875, 'CVSUPOB591062721', '15:00:00', '15:30:00', 'Thursday', 0),
(876, 'CVSUPOB591062721', '15:30:00', '16:00:00', 'Thursday', 0),
(877, 'CVSUPOB591062721', '16:00:00', '16:30:00', 'Thursday', 0),
(878, 'CVSUPOB591062721', '16:30:00', '17:00:00', 'Thursday', 0),
(879, 'CVSUPOB591062721', '17:00:00', '17:30:00', 'Thursday', 0),
(880, 'CVSUPOB591062721', '17:30:00', '18:00:00', 'Thursday', 0),
(881, 'CVSUPOB591062721', '18:00:00', '18:30:00', 'Thursday', 0),
(882, 'CVSUPOB591062721', '18:30:00', '19:00:00', 'Thursday', 0),
(883, 'CVSUPOB591062721', '19:00:00', '19:30:00', 'Thursday', 0),
(884, 'CVSUPOB591062721', '19:30:00', '20:00:00', 'Thursday', 0),
(885, 'CVSUPOB591062721', '07:00:00', '07:30:00', 'Friday', 0),
(886, 'CVSUPOB591062721', '07:30:00', '08:00:00', 'Friday', 0),
(887, 'CVSUPOB591062721', '08:00:00', '08:30:00', 'Friday', 0),
(888, 'CVSUPOB591062721', '08:30:00', '09:00:00', 'Friday', 0),
(889, 'CVSUPOB591062721', '09:00:00', '09:30:00', 'Friday', 0),
(890, 'CVSUPOB591062721', '09:30:00', '10:00:00', 'Friday', 0),
(891, 'CVSUPOB591062721', '10:00:00', '10:30:00', 'Friday', 0),
(892, 'CVSUPOB591062721', '10:30:00', '11:00:00', 'Friday', 0),
(893, 'CVSUPOB591062721', '11:00:00', '11:30:00', 'Friday', 0),
(894, 'CVSUPOB591062721', '11:30:00', '12:00:00', 'Friday', 0),
(895, 'CVSUPOB591062721', '12:00:00', '12:30:00', 'Friday', 0),
(896, 'CVSUPOB591062721', '12:30:00', '13:00:00', 'Friday', 0),
(897, 'CVSUPOB591062721', '13:00:00', '13:30:00', 'Friday', 0),
(898, 'CVSUPOB591062721', '13:30:00', '14:00:00', 'Friday', 0),
(899, 'CVSUPOB591062721', '14:00:00', '14:30:00', 'Friday', 0),
(900, 'CVSUPOB591062721', '14:30:00', '15:00:00', 'Friday', 0),
(901, 'CVSUPOB591062721', '15:00:00', '15:30:00', 'Friday', 0),
(902, 'CVSUPOB591062721', '15:30:00', '16:00:00', 'Friday', 0),
(903, 'CVSUPOB591062721', '16:00:00', '16:30:00', 'Friday', 0),
(904, 'CVSUPOB591062721', '16:30:00', '17:00:00', 'Friday', 0),
(905, 'CVSUPOB591062721', '17:00:00', '17:30:00', 'Friday', 0),
(906, 'CVSUPOB591062721', '17:30:00', '18:00:00', 'Friday', 0),
(907, 'CVSUPOB591062721', '18:00:00', '18:30:00', 'Friday', 0),
(908, 'CVSUPOB591062721', '18:30:00', '19:00:00', 'Friday', 0),
(909, 'CVSUPOB591062721', '19:00:00', '19:30:00', 'Friday', 0),
(910, 'CVSUPOB591062721', '19:30:00', '20:00:00', 'Friday', 0),
(911, 'CVSUPOB591062721', '07:00:00', '07:30:00', 'Saturday', 0),
(912, 'CVSUPOB591062721', '07:30:00', '08:00:00', 'Saturday', 0),
(913, 'CVSUPOB591062721', '08:00:00', '08:30:00', 'Saturday', 0),
(914, 'CVSUPOB591062721', '08:30:00', '09:00:00', 'Saturday', 0),
(915, 'CVSUPOB591062721', '09:00:00', '09:30:00', 'Saturday', 0),
(916, 'CVSUPOB591062721', '09:30:00', '10:00:00', 'Saturday', 0),
(917, 'CVSUPOB591062721', '10:00:00', '10:30:00', 'Saturday', 0),
(918, 'CVSUPOB591062721', '10:30:00', '11:00:00', 'Saturday', 0),
(919, 'CVSUPOB591062721', '11:00:00', '11:30:00', 'Saturday', 0),
(920, 'CVSUPOB591062721', '11:30:00', '12:00:00', 'Saturday', 0),
(921, 'CVSUPOB591062721', '12:00:00', '12:30:00', 'Saturday', 0),
(922, 'CVSUPOB591062721', '12:30:00', '13:00:00', 'Saturday', 0),
(923, 'CVSUPOB591062721', '13:00:00', '13:30:00', 'Saturday', 0),
(924, 'CVSUPOB591062721', '13:30:00', '14:00:00', 'Saturday', 0),
(925, 'CVSUPOB591062721', '14:00:00', '14:30:00', 'Saturday', 0),
(926, 'CVSUPOB591062721', '14:30:00', '15:00:00', 'Saturday', 0),
(927, 'CVSUPOB591062721', '15:00:00', '15:30:00', 'Saturday', 0),
(928, 'CVSUPOB591062721', '15:30:00', '16:00:00', 'Saturday', 0),
(929, 'CVSUPOB591062721', '16:00:00', '16:30:00', 'Saturday', 0),
(930, 'CVSUPOB591062721', '16:30:00', '17:00:00', 'Saturday', 0),
(931, 'CVSUPOB591062721', '17:00:00', '17:30:00', 'Saturday', 0),
(932, 'CVSUPOB591062721', '17:30:00', '18:00:00', 'Saturday', 0),
(933, 'CVSUPOB591062721', '18:00:00', '18:30:00', 'Saturday', 0),
(934, 'CVSUPOB591062721', '18:30:00', '19:00:00', 'Saturday', 0),
(935, 'CVSUPOB591062721', '19:00:00', '19:30:00', 'Saturday', 0),
(936, 'CVSUPOB591062721', '19:30:00', '20:00:00', 'Saturday', 0),
(937, 'CVSUJMV260851479', '07:00:00', '07:30:00', 'Monday', 1),
(938, 'CVSUJMV260851479', '07:30:00', '08:00:00', 'Monday', 1),
(939, 'CVSUJMV260851479', '08:00:00', '08:30:00', 'Monday', 1),
(940, 'CVSUJMV260851479', '08:30:00', '09:00:00', 'Monday', 1),
(941, 'CVSUJMV260851479', '09:00:00', '09:30:00', 'Monday', 1),
(942, 'CVSUJMV260851479', '09:30:00', '10:00:00', 'Monday', 1),
(943, 'CVSUJMV260851479', '10:00:00', '10:30:00', 'Monday', 0),
(944, 'CVSUJMV260851479', '10:30:00', '11:00:00', 'Monday', 0),
(945, 'CVSUJMV260851479', '11:00:00', '11:30:00', 'Monday', 0),
(946, 'CVSUJMV260851479', '11:30:00', '12:00:00', 'Monday', 0),
(947, 'CVSUJMV260851479', '12:00:00', '12:30:00', 'Monday', 0),
(948, 'CVSUJMV260851479', '12:30:00', '13:00:00', 'Monday', 0),
(949, 'CVSUJMV260851479', '13:00:00', '13:30:00', 'Monday', 0),
(950, 'CVSUJMV260851479', '13:30:00', '14:00:00', 'Monday', 0),
(951, 'CVSUJMV260851479', '14:00:00', '14:30:00', 'Monday', 0),
(952, 'CVSUJMV260851479', '14:30:00', '15:00:00', 'Monday', 0),
(953, 'CVSUJMV260851479', '15:00:00', '15:30:00', 'Monday', 0),
(954, 'CVSUJMV260851479', '15:30:00', '16:00:00', 'Monday', 0),
(955, 'CVSUJMV260851479', '16:00:00', '16:30:00', 'Monday', 0),
(956, 'CVSUJMV260851479', '16:30:00', '17:00:00', 'Monday', 0),
(957, 'CVSUJMV260851479', '17:00:00', '17:30:00', 'Monday', 0),
(958, 'CVSUJMV260851479', '17:30:00', '18:00:00', 'Monday', 0),
(959, 'CVSUJMV260851479', '18:00:00', '18:30:00', 'Monday', 0),
(960, 'CVSUJMV260851479', '18:30:00', '19:00:00', 'Monday', 0),
(961, 'CVSUJMV260851479', '19:00:00', '19:30:00', 'Monday', 0),
(962, 'CVSUJMV260851479', '19:30:00', '20:00:00', 'Monday', 0),
(963, 'CVSUJMV260851479', '07:00:00', '07:30:00', 'Tuesday', 0),
(964, 'CVSUJMV260851479', '07:30:00', '08:00:00', 'Tuesday', 0),
(965, 'CVSUJMV260851479', '08:00:00', '08:30:00', 'Tuesday', 1),
(966, 'CVSUJMV260851479', '08:30:00', '09:00:00', 'Tuesday', 1),
(967, 'CVSUJMV260851479', '09:00:00', '09:30:00', 'Tuesday', 1),
(968, 'CVSUJMV260851479', '09:30:00', '10:00:00', 'Tuesday', 1),
(969, 'CVSUJMV260851479', '10:00:00', '10:30:00', 'Tuesday', 1),
(970, 'CVSUJMV260851479', '10:30:00', '11:00:00', 'Tuesday', 0),
(971, 'CVSUJMV260851479', '11:00:00', '11:30:00', 'Tuesday', 0),
(972, 'CVSUJMV260851479', '11:30:00', '12:00:00', 'Tuesday', 0),
(973, 'CVSUJMV260851479', '12:00:00', '12:30:00', 'Tuesday', 0),
(974, 'CVSUJMV260851479', '12:30:00', '13:00:00', 'Tuesday', 0),
(975, 'CVSUJMV260851479', '13:00:00', '13:30:00', 'Tuesday', 0),
(976, 'CVSUJMV260851479', '13:30:00', '14:00:00', 'Tuesday', 0),
(977, 'CVSUJMV260851479', '14:00:00', '14:30:00', 'Tuesday', 0),
(978, 'CVSUJMV260851479', '14:30:00', '15:00:00', 'Tuesday', 0),
(979, 'CVSUJMV260851479', '15:00:00', '15:30:00', 'Tuesday', 0),
(980, 'CVSUJMV260851479', '15:30:00', '16:00:00', 'Tuesday', 0),
(981, 'CVSUJMV260851479', '16:00:00', '16:30:00', 'Tuesday', 0),
(982, 'CVSUJMV260851479', '16:30:00', '17:00:00', 'Tuesday', 0),
(983, 'CVSUJMV260851479', '17:00:00', '17:30:00', 'Tuesday', 0),
(984, 'CVSUJMV260851479', '17:30:00', '18:00:00', 'Tuesday', 0),
(985, 'CVSUJMV260851479', '18:00:00', '18:30:00', 'Tuesday', 0),
(986, 'CVSUJMV260851479', '18:30:00', '19:00:00', 'Tuesday', 0),
(987, 'CVSUJMV260851479', '19:00:00', '19:30:00', 'Tuesday', 0),
(988, 'CVSUJMV260851479', '19:30:00', '20:00:00', 'Tuesday', 0),
(989, 'CVSUJMV260851479', '07:00:00', '07:30:00', 'Wednesday', 0),
(990, 'CVSUJMV260851479', '07:30:00', '08:00:00', 'Wednesday', 0),
(991, 'CVSUJMV260851479', '08:00:00', '08:30:00', 'Wednesday', 1),
(992, 'CVSUJMV260851479', '08:30:00', '09:00:00', 'Wednesday', 1),
(993, 'CVSUJMV260851479', '09:00:00', '09:30:00', 'Wednesday', 1),
(994, 'CVSUJMV260851479', '09:30:00', '10:00:00', 'Wednesday', 1),
(995, 'CVSUJMV260851479', '10:00:00', '10:30:00', 'Wednesday', 0),
(996, 'CVSUJMV260851479', '10:30:00', '11:00:00', 'Wednesday', 0),
(997, 'CVSUJMV260851479', '11:00:00', '11:30:00', 'Wednesday', 0),
(998, 'CVSUJMV260851479', '11:30:00', '12:00:00', 'Wednesday', 0),
(999, 'CVSUJMV260851479', '12:00:00', '12:30:00', 'Wednesday', 0),
(1000, 'CVSUJMV260851479', '12:30:00', '13:00:00', 'Wednesday', 0),
(1001, 'CVSUJMV260851479', '13:00:00', '13:30:00', 'Wednesday', 0),
(1002, 'CVSUJMV260851479', '13:30:00', '14:00:00', 'Wednesday', 0),
(1003, 'CVSUJMV260851479', '14:00:00', '14:30:00', 'Wednesday', 0),
(1004, 'CVSUJMV260851479', '14:30:00', '15:00:00', 'Wednesday', 0),
(1005, 'CVSUJMV260851479', '15:00:00', '15:30:00', 'Wednesday', 0),
(1006, 'CVSUJMV260851479', '15:30:00', '16:00:00', 'Wednesday', 0),
(1007, 'CVSUJMV260851479', '16:00:00', '16:30:00', 'Wednesday', 0),
(1008, 'CVSUJMV260851479', '16:30:00', '17:00:00', 'Wednesday', 0),
(1009, 'CVSUJMV260851479', '17:00:00', '17:30:00', 'Wednesday', 0),
(1010, 'CVSUJMV260851479', '17:30:00', '18:00:00', 'Wednesday', 0),
(1011, 'CVSUJMV260851479', '18:00:00', '18:30:00', 'Wednesday', 0),
(1012, 'CVSUJMV260851479', '18:30:00', '19:00:00', 'Wednesday', 0),
(1013, 'CVSUJMV260851479', '19:00:00', '19:30:00', 'Wednesday', 0),
(1014, 'CVSUJMV260851479', '19:30:00', '20:00:00', 'Wednesday', 0),
(1015, 'CVSUJMV260851479', '07:00:00', '07:30:00', 'Thursday', 1),
(1016, 'CVSUJMV260851479', '07:30:00', '08:00:00', 'Thursday', 1),
(1017, 'CVSUJMV260851479', '08:00:00', '08:30:00', 'Thursday', 1),
(1018, 'CVSUJMV260851479', '08:30:00', '09:00:00', 'Thursday', 0),
(1019, 'CVSUJMV260851479', '09:00:00', '09:30:00', 'Thursday', 0),
(1020, 'CVSUJMV260851479', '09:30:00', '10:00:00', 'Thursday', 0),
(1021, 'CVSUJMV260851479', '10:00:00', '10:30:00', 'Thursday', 0),
(1022, 'CVSUJMV260851479', '10:30:00', '11:00:00', 'Thursday', 0),
(1023, 'CVSUJMV260851479', '11:00:00', '11:30:00', 'Thursday', 0),
(1024, 'CVSUJMV260851479', '11:30:00', '12:00:00', 'Thursday', 0),
(1025, 'CVSUJMV260851479', '12:00:00', '12:30:00', 'Thursday', 0),
(1026, 'CVSUJMV260851479', '12:30:00', '13:00:00', 'Thursday', 0),
(1027, 'CVSUJMV260851479', '13:00:00', '13:30:00', 'Thursday', 0),
(1028, 'CVSUJMV260851479', '13:30:00', '14:00:00', 'Thursday', 0),
(1029, 'CVSUJMV260851479', '14:00:00', '14:30:00', 'Thursday', 0),
(1030, 'CVSUJMV260851479', '14:30:00', '15:00:00', 'Thursday', 0),
(1031, 'CVSUJMV260851479', '15:00:00', '15:30:00', 'Thursday', 0),
(1032, 'CVSUJMV260851479', '15:30:00', '16:00:00', 'Thursday', 0),
(1033, 'CVSUJMV260851479', '16:00:00', '16:30:00', 'Thursday', 0),
(1034, 'CVSUJMV260851479', '16:30:00', '17:00:00', 'Thursday', 0),
(1035, 'CVSUJMV260851479', '17:00:00', '17:30:00', 'Thursday', 0),
(1036, 'CVSUJMV260851479', '17:30:00', '18:00:00', 'Thursday', 0),
(1037, 'CVSUJMV260851479', '18:00:00', '18:30:00', 'Thursday', 0),
(1038, 'CVSUJMV260851479', '18:30:00', '19:00:00', 'Thursday', 0),
(1039, 'CVSUJMV260851479', '19:00:00', '19:30:00', 'Thursday', 0),
(1040, 'CVSUJMV260851479', '19:30:00', '20:00:00', 'Thursday', 0),
(1041, 'CVSUJMV260851479', '07:00:00', '07:30:00', 'Friday', 0),
(1042, 'CVSUJMV260851479', '07:30:00', '08:00:00', 'Friday', 0),
(1043, 'CVSUJMV260851479', '08:00:00', '08:30:00', 'Friday', 0),
(1044, 'CVSUJMV260851479', '08:30:00', '09:00:00', 'Friday', 1),
(1045, 'CVSUJMV260851479', '09:00:00', '09:30:00', 'Friday', 1),
(1046, 'CVSUJMV260851479', '09:30:00', '10:00:00', 'Friday', 1),
(1047, 'CVSUJMV260851479', '10:00:00', '10:30:00', 'Friday', 1),
(1048, 'CVSUJMV260851479', '10:30:00', '11:00:00', 'Friday', 0),
(1049, 'CVSUJMV260851479', '11:00:00', '11:30:00', 'Friday', 0),
(1050, 'CVSUJMV260851479', '11:30:00', '12:00:00', 'Friday', 0),
(1051, 'CVSUJMV260851479', '12:00:00', '12:30:00', 'Friday', 0),
(1052, 'CVSUJMV260851479', '12:30:00', '13:00:00', 'Friday', 0),
(1053, 'CVSUJMV260851479', '13:00:00', '13:30:00', 'Friday', 0),
(1054, 'CVSUJMV260851479', '13:30:00', '14:00:00', 'Friday', 0),
(1055, 'CVSUJMV260851479', '14:00:00', '14:30:00', 'Friday', 0),
(1056, 'CVSUJMV260851479', '14:30:00', '15:00:00', 'Friday', 0),
(1057, 'CVSUJMV260851479', '15:00:00', '15:30:00', 'Friday', 0),
(1058, 'CVSUJMV260851479', '15:30:00', '16:00:00', 'Friday', 0),
(1059, 'CVSUJMV260851479', '16:00:00', '16:30:00', 'Friday', 0),
(1060, 'CVSUJMV260851479', '16:30:00', '17:00:00', 'Friday', 0),
(1061, 'CVSUJMV260851479', '17:00:00', '17:30:00', 'Friday', 0),
(1062, 'CVSUJMV260851479', '17:30:00', '18:00:00', 'Friday', 0),
(1063, 'CVSUJMV260851479', '18:00:00', '18:30:00', 'Friday', 0),
(1064, 'CVSUJMV260851479', '18:30:00', '19:00:00', 'Friday', 0),
(1065, 'CVSUJMV260851479', '19:00:00', '19:30:00', 'Friday', 0),
(1066, 'CVSUJMV260851479', '19:30:00', '20:00:00', 'Friday', 0),
(1067, 'CVSUJMV260851479', '07:00:00', '07:30:00', 'Saturday', 1),
(1068, 'CVSUJMV260851479', '07:30:00', '08:00:00', 'Saturday', 1),
(1069, 'CVSUJMV260851479', '08:00:00', '08:30:00', 'Saturday', 1),
(1070, 'CVSUJMV260851479', '08:30:00', '09:00:00', 'Saturday', 1),
(1071, 'CVSUJMV260851479', '09:00:00', '09:30:00', 'Saturday', 1),
(1072, 'CVSUJMV260851479', '09:30:00', '10:00:00', 'Saturday', 0),
(1073, 'CVSUJMV260851479', '10:00:00', '10:30:00', 'Saturday', 0),
(1074, 'CVSUJMV260851479', '10:30:00', '11:00:00', 'Saturday', 0),
(1075, 'CVSUJMV260851479', '11:00:00', '11:30:00', 'Saturday', 0),
(1076, 'CVSUJMV260851479', '11:30:00', '12:00:00', 'Saturday', 0),
(1077, 'CVSUJMV260851479', '12:00:00', '12:30:00', 'Saturday', 0),
(1078, 'CVSUJMV260851479', '12:30:00', '13:00:00', 'Saturday', 0),
(1079, 'CVSUJMV260851479', '13:00:00', '13:30:00', 'Saturday', 0),
(1080, 'CVSUJMV260851479', '13:30:00', '14:00:00', 'Saturday', 0),
(1081, 'CVSUJMV260851479', '14:00:00', '14:30:00', 'Saturday', 0),
(1082, 'CVSUJMV260851479', '14:30:00', '15:00:00', 'Saturday', 0),
(1083, 'CVSUJMV260851479', '15:00:00', '15:30:00', 'Saturday', 0),
(1084, 'CVSUJMV260851479', '15:30:00', '16:00:00', 'Saturday', 0),
(1085, 'CVSUJMV260851479', '16:00:00', '16:30:00', 'Saturday', 0),
(1086, 'CVSUJMV260851479', '16:30:00', '17:00:00', 'Saturday', 0),
(1087, 'CVSUJMV260851479', '17:00:00', '17:30:00', 'Saturday', 0),
(1088, 'CVSUJMV260851479', '17:30:00', '18:00:00', 'Saturday', 0),
(1089, 'CVSUJMV260851479', '18:00:00', '18:30:00', 'Saturday', 0),
(1090, 'CVSUJMV260851479', '18:30:00', '19:00:00', 'Saturday', 0),
(1091, 'CVSUJMV260851479', '19:00:00', '19:30:00', 'Saturday', 0),
(1092, 'CVSUJMV260851479', '19:30:00', '20:00:00', 'Saturday', 0),
(1093, 'CVSUUFR643709143', '07:00:00', '07:30:00', 'Monday', 0),
(1094, 'CVSUUFR643709143', '07:30:00', '08:00:00', 'Monday', 0),
(1095, 'CVSUUFR643709143', '08:00:00', '08:30:00', 'Monday', 0),
(1096, 'CVSUUFR643709143', '08:30:00', '09:00:00', 'Monday', 0),
(1097, 'CVSUUFR643709143', '09:00:00', '09:30:00', 'Monday', 0),
(1098, 'CVSUUFR643709143', '09:30:00', '10:00:00', 'Monday', 0),
(1099, 'CVSUUFR643709143', '10:00:00', '10:30:00', 'Monday', 0),
(1100, 'CVSUUFR643709143', '10:30:00', '11:00:00', 'Monday', 0),
(1101, 'CVSUUFR643709143', '11:00:00', '11:30:00', 'Monday', 0),
(1102, 'CVSUUFR643709143', '11:30:00', '12:00:00', 'Monday', 0),
(1103, 'CVSUUFR643709143', '12:00:00', '12:30:00', 'Monday', 0),
(1104, 'CVSUUFR643709143', '12:30:00', '13:00:00', 'Monday', 0),
(1105, 'CVSUUFR643709143', '13:00:00', '13:30:00', 'Monday', 0),
(1106, 'CVSUUFR643709143', '13:30:00', '14:00:00', 'Monday', 0),
(1107, 'CVSUUFR643709143', '14:00:00', '14:30:00', 'Monday', 0),
(1108, 'CVSUUFR643709143', '14:30:00', '15:00:00', 'Monday', 0),
(1109, 'CVSUUFR643709143', '15:00:00', '15:30:00', 'Monday', 0),
(1110, 'CVSUUFR643709143', '15:30:00', '16:00:00', 'Monday', 0),
(1111, 'CVSUUFR643709143', '16:00:00', '16:30:00', 'Monday', 0),
(1112, 'CVSUUFR643709143', '16:30:00', '17:00:00', 'Monday', 0),
(1113, 'CVSUUFR643709143', '17:00:00', '17:30:00', 'Monday', 0),
(1114, 'CVSUUFR643709143', '17:30:00', '18:00:00', 'Monday', 0),
(1115, 'CVSUUFR643709143', '18:00:00', '18:30:00', 'Monday', 0),
(1116, 'CVSUUFR643709143', '18:30:00', '19:00:00', 'Monday', 0),
(1117, 'CVSUUFR643709143', '19:00:00', '19:30:00', 'Monday', 0),
(1118, 'CVSUUFR643709143', '19:30:00', '20:00:00', 'Monday', 0),
(1119, 'CVSUUFR643709143', '07:00:00', '07:30:00', 'Tuesday', 0),
(1120, 'CVSUUFR643709143', '07:30:00', '08:00:00', 'Tuesday', 0),
(1121, 'CVSUUFR643709143', '08:00:00', '08:30:00', 'Tuesday', 0),
(1122, 'CVSUUFR643709143', '08:30:00', '09:00:00', 'Tuesday', 0),
(1123, 'CVSUUFR643709143', '09:00:00', '09:30:00', 'Tuesday', 0),
(1124, 'CVSUUFR643709143', '09:30:00', '10:00:00', 'Tuesday', 0),
(1125, 'CVSUUFR643709143', '10:00:00', '10:30:00', 'Tuesday', 0),
(1126, 'CVSUUFR643709143', '10:30:00', '11:00:00', 'Tuesday', 0),
(1127, 'CVSUUFR643709143', '11:00:00', '11:30:00', 'Tuesday', 0),
(1128, 'CVSUUFR643709143', '11:30:00', '12:00:00', 'Tuesday', 0),
(1129, 'CVSUUFR643709143', '12:00:00', '12:30:00', 'Tuesday', 0),
(1130, 'CVSUUFR643709143', '12:30:00', '13:00:00', 'Tuesday', 0),
(1131, 'CVSUUFR643709143', '13:00:00', '13:30:00', 'Tuesday', 0),
(1132, 'CVSUUFR643709143', '13:30:00', '14:00:00', 'Tuesday', 0),
(1133, 'CVSUUFR643709143', '14:00:00', '14:30:00', 'Tuesday', 0),
(1134, 'CVSUUFR643709143', '14:30:00', '15:00:00', 'Tuesday', 0),
(1135, 'CVSUUFR643709143', '15:00:00', '15:30:00', 'Tuesday', 0),
(1136, 'CVSUUFR643709143', '15:30:00', '16:00:00', 'Tuesday', 0),
(1137, 'CVSUUFR643709143', '16:00:00', '16:30:00', 'Tuesday', 0),
(1138, 'CVSUUFR643709143', '16:30:00', '17:00:00', 'Tuesday', 0),
(1139, 'CVSUUFR643709143', '17:00:00', '17:30:00', 'Tuesday', 0),
(1140, 'CVSUUFR643709143', '17:30:00', '18:00:00', 'Tuesday', 0),
(1141, 'CVSUUFR643709143', '18:00:00', '18:30:00', 'Tuesday', 0),
(1142, 'CVSUUFR643709143', '18:30:00', '19:00:00', 'Tuesday', 0),
(1143, 'CVSUUFR643709143', '19:00:00', '19:30:00', 'Tuesday', 0),
(1144, 'CVSUUFR643709143', '19:30:00', '20:00:00', 'Tuesday', 0),
(1145, 'CVSUUFR643709143', '07:00:00', '07:30:00', 'Wednesday', 0),
(1146, 'CVSUUFR643709143', '07:30:00', '08:00:00', 'Wednesday', 0),
(1147, 'CVSUUFR643709143', '08:00:00', '08:30:00', 'Wednesday', 0),
(1148, 'CVSUUFR643709143', '08:30:00', '09:00:00', 'Wednesday', 0),
(1149, 'CVSUUFR643709143', '09:00:00', '09:30:00', 'Wednesday', 0),
(1150, 'CVSUUFR643709143', '09:30:00', '10:00:00', 'Wednesday', 0),
(1151, 'CVSUUFR643709143', '10:00:00', '10:30:00', 'Wednesday', 0),
(1152, 'CVSUUFR643709143', '10:30:00', '11:00:00', 'Wednesday', 0),
(1153, 'CVSUUFR643709143', '11:00:00', '11:30:00', 'Wednesday', 0),
(1154, 'CVSUUFR643709143', '11:30:00', '12:00:00', 'Wednesday', 0),
(1155, 'CVSUUFR643709143', '12:00:00', '12:30:00', 'Wednesday', 0),
(1156, 'CVSUUFR643709143', '12:30:00', '13:00:00', 'Wednesday', 0),
(1157, 'CVSUUFR643709143', '13:00:00', '13:30:00', 'Wednesday', 0),
(1158, 'CVSUUFR643709143', '13:30:00', '14:00:00', 'Wednesday', 0),
(1159, 'CVSUUFR643709143', '14:00:00', '14:30:00', 'Wednesday', 0),
(1160, 'CVSUUFR643709143', '14:30:00', '15:00:00', 'Wednesday', 0),
(1161, 'CVSUUFR643709143', '15:00:00', '15:30:00', 'Wednesday', 0),
(1162, 'CVSUUFR643709143', '15:30:00', '16:00:00', 'Wednesday', 0),
(1163, 'CVSUUFR643709143', '16:00:00', '16:30:00', 'Wednesday', 0),
(1164, 'CVSUUFR643709143', '16:30:00', '17:00:00', 'Wednesday', 0),
(1165, 'CVSUUFR643709143', '17:00:00', '17:30:00', 'Wednesday', 0),
(1166, 'CVSUUFR643709143', '17:30:00', '18:00:00', 'Wednesday', 0),
(1167, 'CVSUUFR643709143', '18:00:00', '18:30:00', 'Wednesday', 0),
(1168, 'CVSUUFR643709143', '18:30:00', '19:00:00', 'Wednesday', 0),
(1169, 'CVSUUFR643709143', '19:00:00', '19:30:00', 'Wednesday', 0),
(1170, 'CVSUUFR643709143', '19:30:00', '20:00:00', 'Wednesday', 0),
(1171, 'CVSUUFR643709143', '07:00:00', '07:30:00', 'Thursday', 0),
(1172, 'CVSUUFR643709143', '07:30:00', '08:00:00', 'Thursday', 0),
(1173, 'CVSUUFR643709143', '08:00:00', '08:30:00', 'Thursday', 0),
(1174, 'CVSUUFR643709143', '08:30:00', '09:00:00', 'Thursday', 0),
(1175, 'CVSUUFR643709143', '09:00:00', '09:30:00', 'Thursday', 0),
(1176, 'CVSUUFR643709143', '09:30:00', '10:00:00', 'Thursday', 0),
(1177, 'CVSUUFR643709143', '10:00:00', '10:30:00', 'Thursday', 0),
(1178, 'CVSUUFR643709143', '10:30:00', '11:00:00', 'Thursday', 0),
(1179, 'CVSUUFR643709143', '11:00:00', '11:30:00', 'Thursday', 0),
(1180, 'CVSUUFR643709143', '11:30:00', '12:00:00', 'Thursday', 0),
(1181, 'CVSUUFR643709143', '12:00:00', '12:30:00', 'Thursday', 0),
(1182, 'CVSUUFR643709143', '12:30:00', '13:00:00', 'Thursday', 0),
(1183, 'CVSUUFR643709143', '13:00:00', '13:30:00', 'Thursday', 0),
(1184, 'CVSUUFR643709143', '13:30:00', '14:00:00', 'Thursday', 0),
(1185, 'CVSUUFR643709143', '14:00:00', '14:30:00', 'Thursday', 0),
(1186, 'CVSUUFR643709143', '14:30:00', '15:00:00', 'Thursday', 0),
(1187, 'CVSUUFR643709143', '15:00:00', '15:30:00', 'Thursday', 0),
(1188, 'CVSUUFR643709143', '15:30:00', '16:00:00', 'Thursday', 0),
(1189, 'CVSUUFR643709143', '16:00:00', '16:30:00', 'Thursday', 0),
(1190, 'CVSUUFR643709143', '16:30:00', '17:00:00', 'Thursday', 0),
(1191, 'CVSUUFR643709143', '17:00:00', '17:30:00', 'Thursday', 0),
(1192, 'CVSUUFR643709143', '17:30:00', '18:00:00', 'Thursday', 0),
(1193, 'CVSUUFR643709143', '18:00:00', '18:30:00', 'Thursday', 0),
(1194, 'CVSUUFR643709143', '18:30:00', '19:00:00', 'Thursday', 0),
(1195, 'CVSUUFR643709143', '19:00:00', '19:30:00', 'Thursday', 0),
(1196, 'CVSUUFR643709143', '19:30:00', '20:00:00', 'Thursday', 0),
(1197, 'CVSUUFR643709143', '07:00:00', '07:30:00', 'Friday', 0),
(1198, 'CVSUUFR643709143', '07:30:00', '08:00:00', 'Friday', 0),
(1199, 'CVSUUFR643709143', '08:00:00', '08:30:00', 'Friday', 0),
(1200, 'CVSUUFR643709143', '08:30:00', '09:00:00', 'Friday', 0),
(1201, 'CVSUUFR643709143', '09:00:00', '09:30:00', 'Friday', 0),
(1202, 'CVSUUFR643709143', '09:30:00', '10:00:00', 'Friday', 0),
(1203, 'CVSUUFR643709143', '10:00:00', '10:30:00', 'Friday', 0),
(1204, 'CVSUUFR643709143', '10:30:00', '11:00:00', 'Friday', 0),
(1205, 'CVSUUFR643709143', '11:00:00', '11:30:00', 'Friday', 0),
(1206, 'CVSUUFR643709143', '11:30:00', '12:00:00', 'Friday', 0),
(1207, 'CVSUUFR643709143', '12:00:00', '12:30:00', 'Friday', 0),
(1208, 'CVSUUFR643709143', '12:30:00', '13:00:00', 'Friday', 0),
(1209, 'CVSUUFR643709143', '13:00:00', '13:30:00', 'Friday', 0),
(1210, 'CVSUUFR643709143', '13:30:00', '14:00:00', 'Friday', 0),
(1211, 'CVSUUFR643709143', '14:00:00', '14:30:00', 'Friday', 0),
(1212, 'CVSUUFR643709143', '14:30:00', '15:00:00', 'Friday', 0),
(1213, 'CVSUUFR643709143', '15:00:00', '15:30:00', 'Friday', 0),
(1214, 'CVSUUFR643709143', '15:30:00', '16:00:00', 'Friday', 0),
(1215, 'CVSUUFR643709143', '16:00:00', '16:30:00', 'Friday', 0),
(1216, 'CVSUUFR643709143', '16:30:00', '17:00:00', 'Friday', 0),
(1217, 'CVSUUFR643709143', '17:00:00', '17:30:00', 'Friday', 0),
(1218, 'CVSUUFR643709143', '17:30:00', '18:00:00', 'Friday', 0),
(1219, 'CVSUUFR643709143', '18:00:00', '18:30:00', 'Friday', 0),
(1220, 'CVSUUFR643709143', '18:30:00', '19:00:00', 'Friday', 0),
(1221, 'CVSUUFR643709143', '19:00:00', '19:30:00', 'Friday', 0),
(1222, 'CVSUUFR643709143', '19:30:00', '20:00:00', 'Friday', 0),
(1223, 'CVSUUFR643709143', '07:00:00', '07:30:00', 'Saturday', 0),
(1224, 'CVSUUFR643709143', '07:30:00', '08:00:00', 'Saturday', 0),
(1225, 'CVSUUFR643709143', '08:00:00', '08:30:00', 'Saturday', 0),
(1226, 'CVSUUFR643709143', '08:30:00', '09:00:00', 'Saturday', 0),
(1227, 'CVSUUFR643709143', '09:00:00', '09:30:00', 'Saturday', 0),
(1228, 'CVSUUFR643709143', '09:30:00', '10:00:00', 'Saturday', 0),
(1229, 'CVSUUFR643709143', '10:00:00', '10:30:00', 'Saturday', 0),
(1230, 'CVSUUFR643709143', '10:30:00', '11:00:00', 'Saturday', 0),
(1231, 'CVSUUFR643709143', '11:00:00', '11:30:00', 'Saturday', 0),
(1232, 'CVSUUFR643709143', '11:30:00', '12:00:00', 'Saturday', 0),
(1233, 'CVSUUFR643709143', '12:00:00', '12:30:00', 'Saturday', 0),
(1234, 'CVSUUFR643709143', '12:30:00', '13:00:00', 'Saturday', 0),
(1235, 'CVSUUFR643709143', '13:00:00', '13:30:00', 'Saturday', 0),
(1236, 'CVSUUFR643709143', '13:30:00', '14:00:00', 'Saturday', 0),
(1237, 'CVSUUFR643709143', '14:00:00', '14:30:00', 'Saturday', 0),
(1238, 'CVSUUFR643709143', '14:30:00', '15:00:00', 'Saturday', 0),
(1239, 'CVSUUFR643709143', '15:00:00', '15:30:00', 'Saturday', 0),
(1240, 'CVSUUFR643709143', '15:30:00', '16:00:00', 'Saturday', 0),
(1241, 'CVSUUFR643709143', '16:00:00', '16:30:00', 'Saturday', 0),
(1242, 'CVSUUFR643709143', '16:30:00', '17:00:00', 'Saturday', 0),
(1243, 'CVSUUFR643709143', '17:00:00', '17:30:00', 'Saturday', 0),
(1244, 'CVSUUFR643709143', '17:30:00', '18:00:00', 'Saturday', 0),
(1245, 'CVSUUFR643709143', '18:00:00', '18:30:00', 'Saturday', 0),
(1246, 'CVSUUFR643709143', '18:30:00', '19:00:00', 'Saturday', 0),
(1247, 'CVSUUFR643709143', '19:00:00', '19:30:00', 'Saturday', 0),
(1248, 'CVSUUFR643709143', '19:30:00', '20:00:00', 'Saturday', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ssl_table`
--

CREATE TABLE `ssl_table` (
  `id` int(11) NOT NULL,
  `salary_grade` int(10) NOT NULL,
  `S1` decimal(10,2) NOT NULL,
  `S2` decimal(10,2) NOT NULL,
  `S3` decimal(10,2) NOT NULL,
  `S4` decimal(10,2) NOT NULL,
  `S5` decimal(10,2) NOT NULL,
  `S6` decimal(10,2) NOT NULL,
  `S7` decimal(10,2) NOT NULL,
  `S8` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ssl_table`
--

INSERT INTO `ssl_table` (`id`, `salary_grade`, `S1`, `S2`, `S3`, `S4`, `S5`, `S6`, `S7`, `S8`) VALUES
(1, 1, '12517.00', '12621.00', '12728.00', '12834.00', '12941.00', '13049.00', '13159.00', '13268.00'),
(2, 2, '13305.00', '13406.00', '13509.00', '13613.00', '13718.00', '13823.00', '13929.00', '14035.00'),
(3, 3, '14125.00', '14234.00', '14343.00', '14454.00', '14565.00', '14676.00', '14790.00', '14903.00'),
(4, 4, '14993.00', '15109.00', '15224.00', '15341.00', '15459.00', '15577.00', '15698.00', '15818.00'),
(5, 5, '15909.00', '16032.00', '16155.00', '16279.00', '16404.00', '16530.00', '16657.00', '16784.00'),
(6, 6, '16877.00', '17007.00', '17137.00', '17269.00', '17402.00', '17535.00', '17670.00', '17806.00'),
(7, 7, '17899.00', '18037.00', '18176.00', '18315.00', '18455.00', '18598.00', '18740.00', '18884.00'),
(8, 8, '18998.00', '19170.00', '19343.00', '19518.00', '19694.00', '19872.00', '20052.00', '20233.00'),
(9, 9, '20340.00', '20509.00', '20681.00', '20854.00', '21029.00', '21204.00', '21382.00', '21561.00'),
(10, 10, '22190.00', '22376.00', '22563.00', '22752.00', '22942.00', '23134.00', '23327.00', '23522.00'),
(11, 11, '25439.00', '25723.00', '26012.00', '26304.00', '26600.00', '26901.00', '27205.00', '27514.00'),
(12, 12, '27608.00', '27892.00', '28180.00', '28471.00', '28766.00', '29065.00', '29367.00', '29673.00'),
(13, 13, '29798.00', '30111.00', '30427.00', '30747.00', '31072.00', '31400.00', '31732.00', '32069.00'),
(14, 14, '32321.00', '32665.00', '33013.00', '33366.00', '33722.00', '34083.00', '34449.00', '34819.00'),
(15, 15, '35097.00', '35475.00', '35858.00', '36246.00', '36638.00', '37035.00', '37437.00', '37845.00'),
(16, 16, '38150.00', '38566.00', '38987.00', '39413.00', '39845.00', '40282.00', '40725.00', '41172.00'),
(17, 17, '41508.00', '41966.00', '42429.00', '42898.00', '43373.00', '43854.00', '44340.00', '44833.00'),
(18, 18, '45203.00', '45706.00', '46216.00', '46731.00', '47254.00', '47783.00', '48318.00', '48860.00'),
(19, 19, '49835.00', '50574.00', '51325.00', '52088.00', '52864.00', '53652.00', '54454.00', '55268.00'),
(20, 20, '55799.00', '56633.00', '57482.00', '58344.00', '59221.00', '60112.00', '61017.00', '61937.00'),
(21, 21, '62449.00', '63392.00', '64351.00', '65325.00', '66316.00', '67322.00', '68345.00', '69385.00'),
(22, 22, '69963.00', '71029.00', '72113.00', '73214.00', '74333.00', '75471.00', '76627.00', '77801.00'),
(23, 23, '78455.00', '79659.00', '80884.00', '82133.00', '83474.00', '84836.00', '86220.00', '87628.00'),
(24, 24, '88410.00', '89853.00', '91320.00', '92810.00', '94325.00', '95865.00', '97430.00', '99020.00'),
(25, 25, '100788.00', '102433.00', '104105.00', '105804.00', '107531.00', '109286.00', '111070.00', '112883.00'),
(26, 26, '113891.00', '115749.00', '117639.00', '119558.00', '121510.00', '123493.00', '125508.00', '127557.00'),
(27, 27, '128696.00', '130797.00', '132931.00', '135101.00', '137306.00', '139547.00', '141825.00', '144140.00'),
(28, 28, '145427.00', '147800.00', '150213.00', '152664.00', '155155.00', '157689.00', '160262.00', '162877.00'),
(29, 29, '164332.00', '167015.00', '169740.00', '172511.00', '175326.00', '178188.00', '181096.00', '184052.00'),
(30, 30, '185695.00', '188726.00', '191806.00', '194937.00', '198118.00', '201352.00', '204638.00', '207978.00'),
(31, 31, '273278.00', '278615.00', '284057.00', '289605.00', '295262.00', '301028.00', '306908.00', '312902.00'),
(32, 32, '325807.00', '332378.00', '339080.00', '345918.00', '352894.00', '360011.00', '367272.00', '374678.00'),
(33, 33, '411382.00', '423723.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `due_date` date NOT NULL,
  `completed` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '	0=pending, 1=on-progress,2=Completed',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `task`, `description`, `employee_id`, `due_date`, `completed`, `status`, `date_created`) VALUES
(7, 'Documentary', 'Create a documentary about your day', 'CVSUGAX328615479', '2022-02-05', '2022-01-25', 2, '2022-01-25 05:37:13'),
(8, 'Sample', 'Sample', 'CVSUGAX328615479', '2022-01-29', '2022-01-25', 2, '2022-01-25 06:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `task_progress`
--

CREATE TABLE `task_progress` (
  `id` int(11) NOT NULL,
  `task_id` int(30) NOT NULL,
  `progress` text NOT NULL,
  `document` text DEFAULT NULL,
  `is_complete` tinyint(1) NOT NULL COMMENT '0=no,1=Yes	',
  `data_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_progress`
--

INSERT INTO `task_progress` (`id`, `task_id`, `progress`, `document`, `is_complete`, `data_created`) VALUES
(17, 7, 'Chapter 1', NULL, 0, '2022-01-25 05:44:55'),
(18, 7, 'Chapter 2', NULL, 1, '2022-01-25 05:45:06'),
(19, 8, 'Add prog', NULL, 0, '2022-01-25 06:58:53'),
(20, 8, 'asd', NULL, 1, '2022-01-25 06:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `tax_code` varchar(50) NOT NULL,
  `tax_name` varchar(100) NOT NULL,
  `tax_vendor` int(11) NOT NULL,
  `tax_type` varchar(50) NOT NULL,
  `tax_amount` double NOT NULL,
  `amount_from` double NOT NULL,
  `amount_to` double NOT NULL,
  `tax_status` varchar(50) NOT NULL,
  `tax_start` date NOT NULL,
  `tax_end` date NOT NULL,
  `tax_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `tax_code`, `tax_name`, `tax_vendor`, `tax_type`, `tax_amount`, `amount_from`, `amount_to`, `tax_status`, `tax_start`, `tax_end`, `tax_desc`) VALUES
(13, 'CVSUTAXTOK243958760', 'Sample', 1, 'Fixed Amount', 100, 1000, 2000, 'active', '2022-01-25', '2022-02-05', 'Sample');

-- --------------------------------------------------------

--
-- Table structure for table `training_course`
--

CREATE TABLE `training_course` (
  `id` int(11) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_course`
--

INSERT INTO `training_course` (`id`, `course_code`, `course_title`, `course_details`) VALUES
(4, 'ITEC09', 'Web Development', 'This course is good for IT/CS Students'),
(5, 'ITEC101', 'Capstone Course', 'A sample course for capstone project'),
(6, 'ITEC110', 'Sample', 'Sample');

-- --------------------------------------------------------

--
-- Table structure for table `training_list`
--

CREATE TABLE `training_list` (
  `id` int(11) NOT NULL,
  `training_code` varchar(100) NOT NULL,
  `training_title` varchar(255) NOT NULL,
  `training_objective` varchar(100) NOT NULL,
  `training_course` int(11) NOT NULL,
  `batch_size` int(11) NOT NULL,
  `schedule_from` datetime NOT NULL,
  `schedule_to` datetime NOT NULL,
  `training_mode` varchar(50) NOT NULL,
  `training_details` text NOT NULL,
  `training_duration` varchar(100) NOT NULL,
  `training_vendor` int(11) NOT NULL,
  `training_trainer` varchar(255) NOT NULL,
  `training_experience` varchar(255) NOT NULL,
  `training_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_list`
--

INSERT INTO `training_list` (`id`, `training_code`, `training_title`, `training_objective`, `training_course`, `batch_size`, `schedule_from`, `schedule_to`, `training_mode`, `training_details`, `training_duration`, `training_vendor`, `training_trainer`, `training_experience`, `training_status`) VALUES
(3, 'CVSUTRADSA4631908', 'Web Development', 'to become web developer expert', 4, 5, '2022-01-25 01:29:00', '2022-01-27 13:30:00', 'Online', 'sample details', '60.016666666667', 4, 'Mr. Mark Baron', 'Web Developer with 10 Years of experience', 'active'),
(4, 'CVSUTRAMRF5189037', 'Cloud Training', 'cloud platforms', 5, 20, '2022-01-25 01:47:00', '2022-01-25 13:47:00', 'Online', 'cloud training for aspiring cloud architect', '12', 4, 'Mr. Mark', 'web developer', 'inactive'),
(5, 'CVSUTRALIX2786041', 'Teaching Prof.', 'for instructors', 5, 30, '2022-01-26 01:50:00', '2022-01-30 13:50:00', 'Hybrid', 'sample details', '108', 4, 'Mr. James', 'sample experience', 'active'),
(6, 'CVSUTRAJXM2084173', 'Sample', 'Sample', 6, 3, '2022-01-25 14:35:00', '2022-01-29 14:35:00', 'Online', 'Sample', '96', 4, 'Sample', 'Sample', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `training_record`
--

CREATE TABLE `training_record` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(50) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `training_code` varchar(50) NOT NULL,
  `internal_note` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `review` int(11) NOT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp(),
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_record`
--

INSERT INTO `training_record` (`id`, `reference_no`, `employee_id`, `training_code`, `internal_note`, `status`, `review`, `request_date`, `comment`) VALUES
(25, 'CVSUATTETX25847', 'CVSUGAX328615479', 'CVSUTRADSA4631908', '', 'On-going', 0, '2022-01-25', ''),
(26, 'CVSUATTWHV72394', 'CVSUGAX328615479', 'CVSUTRAMRF5189037', 'Sample Note', 'Pending', 0, '2022-01-25', ''),
(27, 'CVSUATTPXN87104', 'CVSUGAX328615479', 'CVSUTRALIX2786041', 'sample request', 'Rejected', 0, '2022-01-25', ''),
(28, 'CVSUATTDOB41092', 'CVSUGAX328615479', 'CVSUTRAJXM2084173', '', 'On-going', 0, '2022-01-25', '');

-- --------------------------------------------------------

--
-- Table structure for table `training_vendor`
--

CREATE TABLE `training_vendor` (
  `id` int(11) NOT NULL,
  `vendor_code` varchar(50) NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_vendor`
--

INSERT INTO `training_vendor` (`id`, `vendor_code`, `vendor_name`, `email`, `contact`, `experience`, `contact_person`) VALUES
(4, 'CVSUTVSGT5091384', 'CVSU IT soulutions', 'cvsu@gmail.com', '053435132', 'Organizer of IT Summit 2099\r\nWeb Development Courses', 'Mr. Francis Ong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allowance`
--
ALTER TABLE `allowance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `applicant_no` (`applicant_no`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_correction`
--
ALTER TABLE `attendance_correction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefit_record`
--
ALTER TABLE `benefit_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_advance`
--
ALTER TABLE `cash_advance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `deduction_code` (`deduction_code`);

--
-- Indexes for table `deduction_employee`
--
ALTER TABLE `deduction_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction_vendor`
--
ALTER TABLE `deduction_vendor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_code` (`vendor_code`);

--
-- Indexes for table `department_category`
--
ALTER TABLE `department_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplinary_action`
--
ALTER TABLE `disciplinary_action`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_id` (`reference_id`);

--
-- Indexes for table `disciplinary_category`
--
ALTER TABLE `disciplinary_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_folder`
--
ALTER TABLE `document_folder`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `folder_id` (`folder_id`),
  ADD UNIQUE KEY `folder_name` (`folder_name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_category`
--
ALTER TABLE `employment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_max_hours`
--
ALTER TABLE `emp_max_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_id` (`reference_id`);

--
-- Indexes for table `event_request`
--
ALTER TABLE `event_request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_id` (`reference_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_code` (`job_code`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_id` (`reference_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtime_request`
--
ALTER TABLE `overtime_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_coverage_table`
--
ALTER TABLE `payroll_coverage_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_summary`
--
ALTER TABLE `payroll_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ssl_table`
--
ALTER TABLE `ssl_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_progress`
--
ALTER TABLE `task_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_course`
--
ALTER TABLE `training_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_list`
--
ALTER TABLE `training_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_record`
--
ALTER TABLE `training_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_vendor`
--
ALTER TABLE `training_vendor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_code` (`vendor_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `allowance`
--
ALTER TABLE `allowance`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attendance_correction`
--
ALTER TABLE `attendance_correction`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `benefit_record`
--
ALTER TABLE `benefit_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cash_advance`
--
ALTER TABLE `cash_advance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deduction_employee`
--
ALTER TABLE `deduction_employee`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deduction_vendor`
--
ALTER TABLE `deduction_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department_category`
--
ALTER TABLE `department_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `disciplinary_action`
--
ALTER TABLE `disciplinary_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `disciplinary_category`
--
ALTER TABLE `disciplinary_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `document_folder`
--
ALTER TABLE `document_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `employment_category`
--
ALTER TABLE `employment_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `emp_max_hours`
--
ALTER TABLE `emp_max_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_request`
--
ALTER TABLE `event_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `overtime_request`
--
ALTER TABLE `overtime_request`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payroll_coverage_table`
--
ALTER TABLE `payroll_coverage_table`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payroll_summary`
--
ALTER TABLE `payroll_summary`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1249;

--
-- AUTO_INCREMENT for table `ssl_table`
--
ALTER TABLE `ssl_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task_progress`
--
ALTER TABLE `task_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `training_course`
--
ALTER TABLE `training_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `training_list`
--
ALTER TABLE `training_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `training_record`
--
ALTER TABLE `training_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `training_vendor`
--
ALTER TABLE `training_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
