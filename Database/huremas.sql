-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 03:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `huremas`
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
(1, 'CVSUEJT052613497', 'admin', '$2y$10$AbmOsNdjTbmA2lff.TwwDOUSCEWjVXE9sbMZb6/dFcP5A.X8hwN8a', 'admin123', 'admin', '2021-12-12 16:15:30'),
(73, 'CVSUKNC085291637', 'bellon.randolf_1637', '$2y$10$jZLAD1KOVie.bFWBJwDcTuUXm4x/zthwPq.vzZxpzUtQmq4scUYpK', '12SN4589670B', 'employee', '2022-04-16 20:23:31');

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
(5, 2022126795840, 'CVSUJOBAYH207981536', '2022-04-16 02:01:50', 'Juan', 'Dela', 'Cruz', 'francis.ong25@gmail.com', '094546545456', '2022126795840.pdf', 'On-Board', 'Successfully Onboarded'),
(9, 2022830146275, 'CVSUJOBAYH207981536', '2022-04-16 13:26:06', 'James', 'Dela', 'Cruz', 'james@gmail.com', '086435132', '2022830146275.pdf', 'Disqualified', ''),
(33, 2022064985712, 'CVSUJOBAYH207981536', '2022-04-16 15:27:03', 'Henry', 'Dela', 'Cruz', 'francis.ong25@gmail.com', '09867435432', '2022064985712.pdf', 'New Candidates', '');

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
(9, 'CVSUEJT052613497', '2022-04-15 22:44:23', '2022-04-15 08:00:00', '2022-04-15 16:00:00');

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
(2, 'CVSUBENVJI258140739', '13th Month Pay', 'Mandatory 13th Month Pay\r\n');

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
(2, 'CVSUDTLGD638742901', 'ddsadas', 'Fixed Amount', 'asdasdsa', 2, 23, 0, 'None'),
(3, 'CVSUDTGMJ679412503', '5', 'Fixed Amount', '1', 4, 2, 0, 'None');

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
(2, 'CVSUVENWGC26497', '123123', 'BIR', 'Bacoor BIR', 'Government', 'Tax'),
(4, 'CVSUVENXJF863790125', '2', '1', '4', 'Government', '5');

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
(2, 'CVSUDALRX026543798', 'CVSUKNC085291637', '2022-02-11', 2, 'Sample', '', '', '', '', 'Francis Ong', 'Draft');

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
(2, 'Verbal Abuse', '', 'Mild', 'Sample Details');

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
(2, 'CVSUDOXCCSD247916358', 'AWS Academy Certificate - Francis Ong', 'document', 'Francis Ong', 'Institutional Records', '2022-04-16', 'Sample', 'CVSUEJT052613497', 0, 'AWS_Academy_Graduate___AWS_Academy_Cloud_Foundations_Badge20220403-46-2nwhrv.pdf', 0, 1),
(3, 'CVSULINKPHL713069524', 'AWS - Francics Ong', 'url', 'Francis Ong', 'CVSUFOLDXDU253096714', '2022-04-16', 'AWS Link', 'CVSUEJT052613497', 0, 'https://www.credly.com/badges/a8bfd27c-f99f-43ee-9120-b87596f8860e/public_url', 0, 0);

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
(15, 'CVSUFOLDXDU253096714', 'Personal', '2022-04-16', 'Sample Folder', 'CVSUEJT052613497', 0);

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
(3, 'CVSUEJT052613497', 'Francis', 'Condino', 'Ong', '', 'Bacoor City, Cavite', '2000-05-13', '09362387135', '4763233', 'francis.ong25@gmail.com', 'Male', 'CVSUEJT052613497.jpg', 7, 1, 3, 1, '2013-06-04', '34-6581234-4', '121253674428', '082504598536', '439-126-266-0488', '338.00', '112.50', '100.00', '2021-10-04', 0),
(72, 'CVSUDZH231690758', 'Juan', 'Dela', 'Cruz', '', 'Salinas 1', '2000-01-14', '0987465123', '2323-232-3', 'juandelacruz123123@gmail.com', 'Male', 'CVSUDZH231690758.jpg', 9, 1, 0, 2, '2022-02-08', '439-126-456-0475', '439-126-456-0475', '439-126-456-0475', '439-126-456-0475', NULL, NULL, NULL, '2022-02-08', 0),
(73, 'CVSUGDQ792531486', '22222', '22222', '22222', '2222', 'sadasd22222', '2000-01-26', '313123', '12312', 'francis.ong25@gmail.com', 'Male', 'CVSUGDQ792531486.png', 1, 2, 0, 2, '2022-02-08', '12312322', '1231232222', '1232222', '123123222', NULL, NULL, NULL, '2022-02-08', 0),
(74, 'CVSUMKY260375198', 'George', 'Dela', 'Frizz', '', 'Salinas 1', '2000-01-06', '098453132', '123-123123', 'webhost025@gmail.com', 'Male', 'CVSUMKY260375198.jpg', 9, 1, 0, 2, '2022-02-10', '439-126-456-0475', '439-126-456-0475', '439-126-456-0475', '439-126-456-0475', NULL, NULL, NULL, '2022-02-10', 0),
(75, 'CVSUKNC085291637', 'Randolf', 'Cada', 'Bellon', '', 'Salinas 1', '2000-01-06', '087454654', '232-323-23', 'francis.ong25@gmail.com', 'Male', '', 1, 1, 0, 1, '2022-02-10', '439-126-456-0475', '439-126-456-0475', '439-126-456-0475', '439-126-456-0475', NULL, NULL, NULL, '2022-02-10', 0),
(76, 'CVSUHFE671280435', 'asdasd', 'asd', 'asda', 'adas', 'sadasd', '2000-01-07', '09564525862', 'asdas', 'francis.ong25@gmail.com', 'Male', 'CVSUHFE671280435.jpg', 1, 2, 0, 2, '2022-04-14', '123123', '12313', '123123123', '123123', NULL, NULL, NULL, '2022-04-14', 0),
(82, 'CVSUQND5468792302733', 'Juan', 'Dela', 'Cruz', '', 'asdasd', '2000-02-23', '094546545456', '094546545456', 'francis.ong25@gmail.com', 'Male', 'CVSUQND5468792302733.png', 1, 7, 0, 1, '2022-04-16', '439-126-456-0475', '439-126-456-0475', '3123-12312-32', '439-126-266-0488', NULL, NULL, NULL, '2022-04-16', 0);

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
(32, 'CVSUDZH231690758', '1.50', '0.00', '0.00', '0.00', '0.00', '0.00'),
(33, 'CVSUGDQ792531486', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(34, 'CVSUMKY260375198', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(35, 'CVSUKNC085291637', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(36, 'CVSUEJT052613497', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(37, 'CVSUHFE671280435', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(38, 'CVSUJAH1296478307907', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(39, 'CVSUCMY8754912307907', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(40, 'CVSUPRU6538947217907', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(41, 'CVSUIBP2305416797907', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(42, 'CVSUUEG2491536877606', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(43, 'CVSUQND5468792302733', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00');

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
(6, 'CVSUEVZBV473162859', 'asdasd', 'CVSUEVZBV473162859.png', '2022-04-28', '09:47:00', '21:47:00', 'sadsadas');

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
(4, 'CVSUJOBAYH207981536', 'Instructor with 10k signing BONUS', 1, 23, 7, 'Contract', 'null', 'No Experience Needed', 12, 'Sample Description', 'active', '2022-04-16 01:54:49');

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
(21, 'CVSUNEWSPZX014376825', '2022-04-28', '11111', 'CVSUNEWSPZX014376825.jpg', 'Sample');

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
(1, 'CVSUKNC085291637', 'You have new disciplinary record', '2022-02-11', 'disciplinary.php', 0, 'employee'),
(2, 'CVSUKNC085291637', 'You have new disciplinary record', '2022-02-11', 'disciplinary.php', 0, 'employee'),
(3, 'CVSUEJT052613497', 'Your attendance record has been updated', '2022-04-15', 'dtr.php', 0, 'employee'),
(4, 'CVSUKNC085291637', 'You have new task - Check it out', '2022-04-15', 'tasks.php', 0, 'employee'),
(5, 'CVSUKNC085291637', 'Your task has been updated', '2022-04-15', 'tasks.php', 0, 'employee'),
(6, 'CVSUGDQ792531486', 'You have new task - Check it out', '2022-04-15', 'tasks.php', 0, 'employee');

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
(55, 'Overtime Holiday', 5, 'active'),
(56, 'Regular Overtime', 2, 'active');

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
(2, 'PC0404TO04042022', '2022-04-04', '2022-05-25', '2022-04-11', '0');

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
(8, 'PC0404TO04042022', 'CVSUEJT052613497', NULL, NULL),
(9, 'PC0404TO04042022', 'CVSUDZH231690758', NULL, NULL),
(10, 'PC0404TO04042022', 'CVSUMKY260375198', NULL, NULL),
(11, 'PC0404TO04042022', 'CVSUKNC085291637', NULL, NULL),
(12, 'PC0404TO04042022', 'CVSUHFE671280435', NULL, NULL),
(13, 'PC0404TO04042022', 'CVSUGDQ792531486', NULL, NULL),
(14, 'PC0404TO04042022', 'CVSUQND5468792302733', NULL, NULL);

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
(10, 'Security Guard', 14035, 2, 'S8', 1);

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
(1, 'CVSUDZH231690758', '07:00:00', '07:30:00', 'Monday', 1),
(2, 'CVSUDZH231690758', '07:30:00', '08:00:00', 'Monday', 1),
(3, 'CVSUDZH231690758', '08:00:00', '08:30:00', 'Monday', 1),
(4, 'CVSUDZH231690758', '08:30:00', '09:00:00', 'Monday', 0),
(5, 'CVSUDZH231690758', '09:00:00', '09:30:00', 'Monday', 0),
(6, 'CVSUDZH231690758', '09:30:00', '10:00:00', 'Monday', 0),
(7, 'CVSUDZH231690758', '10:00:00', '10:30:00', 'Monday', 0),
(8, 'CVSUDZH231690758', '10:30:00', '11:00:00', 'Monday', 0),
(9, 'CVSUDZH231690758', '11:00:00', '11:30:00', 'Monday', 0),
(10, 'CVSUDZH231690758', '11:30:00', '12:00:00', 'Monday', 0),
(11, 'CVSUDZH231690758', '12:00:00', '12:30:00', 'Monday', 0),
(12, 'CVSUDZH231690758', '12:30:00', '13:00:00', 'Monday', 0),
(13, 'CVSUDZH231690758', '13:00:00', '13:30:00', 'Monday', 0),
(14, 'CVSUDZH231690758', '13:30:00', '14:00:00', 'Monday', 0),
(15, 'CVSUDZH231690758', '14:00:00', '14:30:00', 'Monday', 0),
(16, 'CVSUDZH231690758', '14:30:00', '15:00:00', 'Monday', 0),
(17, 'CVSUDZH231690758', '15:00:00', '15:30:00', 'Monday', 0),
(18, 'CVSUDZH231690758', '15:30:00', '16:00:00', 'Monday', 0),
(19, 'CVSUDZH231690758', '16:00:00', '16:30:00', 'Monday', 0),
(20, 'CVSUDZH231690758', '16:30:00', '17:00:00', 'Monday', 0),
(21, 'CVSUDZH231690758', '17:00:00', '17:30:00', 'Monday', 0),
(22, 'CVSUDZH231690758', '17:30:00', '18:00:00', 'Monday', 0),
(23, 'CVSUDZH231690758', '18:00:00', '18:30:00', 'Monday', 0),
(24, 'CVSUDZH231690758', '18:30:00', '19:00:00', 'Monday', 0),
(25, 'CVSUDZH231690758', '19:00:00', '19:30:00', 'Monday', 0),
(26, 'CVSUDZH231690758', '19:30:00', '20:00:00', 'Monday', 0),
(27, 'CVSUDZH231690758', '07:00:00', '07:30:00', 'Tuesday', 0),
(28, 'CVSUDZH231690758', '07:30:00', '08:00:00', 'Tuesday', 0),
(29, 'CVSUDZH231690758', '08:00:00', '08:30:00', 'Tuesday', 0),
(30, 'CVSUDZH231690758', '08:30:00', '09:00:00', 'Tuesday', 0),
(31, 'CVSUDZH231690758', '09:00:00', '09:30:00', 'Tuesday', 0),
(32, 'CVSUDZH231690758', '09:30:00', '10:00:00', 'Tuesday', 0),
(33, 'CVSUDZH231690758', '10:00:00', '10:30:00', 'Tuesday', 0),
(34, 'CVSUDZH231690758', '10:30:00', '11:00:00', 'Tuesday', 0),
(35, 'CVSUDZH231690758', '11:00:00', '11:30:00', 'Tuesday', 0),
(36, 'CVSUDZH231690758', '11:30:00', '12:00:00', 'Tuesday', 0),
(37, 'CVSUDZH231690758', '12:00:00', '12:30:00', 'Tuesday', 0),
(38, 'CVSUDZH231690758', '12:30:00', '13:00:00', 'Tuesday', 0),
(39, 'CVSUDZH231690758', '13:00:00', '13:30:00', 'Tuesday', 0),
(40, 'CVSUDZH231690758', '13:30:00', '14:00:00', 'Tuesday', 0),
(41, 'CVSUDZH231690758', '14:00:00', '14:30:00', 'Tuesday', 0),
(42, 'CVSUDZH231690758', '14:30:00', '15:00:00', 'Tuesday', 0),
(43, 'CVSUDZH231690758', '15:00:00', '15:30:00', 'Tuesday', 0),
(44, 'CVSUDZH231690758', '15:30:00', '16:00:00', 'Tuesday', 0),
(45, 'CVSUDZH231690758', '16:00:00', '16:30:00', 'Tuesday', 0),
(46, 'CVSUDZH231690758', '16:30:00', '17:00:00', 'Tuesday', 0),
(47, 'CVSUDZH231690758', '17:00:00', '17:30:00', 'Tuesday', 0),
(48, 'CVSUDZH231690758', '17:30:00', '18:00:00', 'Tuesday', 0),
(49, 'CVSUDZH231690758', '18:00:00', '18:30:00', 'Tuesday', 0),
(50, 'CVSUDZH231690758', '18:30:00', '19:00:00', 'Tuesday', 0),
(51, 'CVSUDZH231690758', '19:00:00', '19:30:00', 'Tuesday', 0),
(52, 'CVSUDZH231690758', '19:30:00', '20:00:00', 'Tuesday', 0),
(53, 'CVSUDZH231690758', '07:00:00', '07:30:00', 'Wednesday', 0),
(54, 'CVSUDZH231690758', '07:30:00', '08:00:00', 'Wednesday', 0),
(55, 'CVSUDZH231690758', '08:00:00', '08:30:00', 'Wednesday', 0),
(56, 'CVSUDZH231690758', '08:30:00', '09:00:00', 'Wednesday', 0),
(57, 'CVSUDZH231690758', '09:00:00', '09:30:00', 'Wednesday', 0),
(58, 'CVSUDZH231690758', '09:30:00', '10:00:00', 'Wednesday', 0),
(59, 'CVSUDZH231690758', '10:00:00', '10:30:00', 'Wednesday', 0),
(60, 'CVSUDZH231690758', '10:30:00', '11:00:00', 'Wednesday', 0),
(61, 'CVSUDZH231690758', '11:00:00', '11:30:00', 'Wednesday', 0),
(62, 'CVSUDZH231690758', '11:30:00', '12:00:00', 'Wednesday', 0),
(63, 'CVSUDZH231690758', '12:00:00', '12:30:00', 'Wednesday', 0),
(64, 'CVSUDZH231690758', '12:30:00', '13:00:00', 'Wednesday', 0),
(65, 'CVSUDZH231690758', '13:00:00', '13:30:00', 'Wednesday', 0),
(66, 'CVSUDZH231690758', '13:30:00', '14:00:00', 'Wednesday', 0),
(67, 'CVSUDZH231690758', '14:00:00', '14:30:00', 'Wednesday', 0),
(68, 'CVSUDZH231690758', '14:30:00', '15:00:00', 'Wednesday', 0),
(69, 'CVSUDZH231690758', '15:00:00', '15:30:00', 'Wednesday', 0),
(70, 'CVSUDZH231690758', '15:30:00', '16:00:00', 'Wednesday', 0),
(71, 'CVSUDZH231690758', '16:00:00', '16:30:00', 'Wednesday', 0),
(72, 'CVSUDZH231690758', '16:30:00', '17:00:00', 'Wednesday', 0),
(73, 'CVSUDZH231690758', '17:00:00', '17:30:00', 'Wednesday', 0),
(74, 'CVSUDZH231690758', '17:30:00', '18:00:00', 'Wednesday', 0),
(75, 'CVSUDZH231690758', '18:00:00', '18:30:00', 'Wednesday', 0),
(76, 'CVSUDZH231690758', '18:30:00', '19:00:00', 'Wednesday', 0),
(77, 'CVSUDZH231690758', '19:00:00', '19:30:00', 'Wednesday', 0),
(78, 'CVSUDZH231690758', '19:30:00', '20:00:00', 'Wednesday', 0),
(79, 'CVSUDZH231690758', '07:00:00', '07:30:00', 'Thursday', 0),
(80, 'CVSUDZH231690758', '07:30:00', '08:00:00', 'Thursday', 0),
(81, 'CVSUDZH231690758', '08:00:00', '08:30:00', 'Thursday', 0),
(82, 'CVSUDZH231690758', '08:30:00', '09:00:00', 'Thursday', 0),
(83, 'CVSUDZH231690758', '09:00:00', '09:30:00', 'Thursday', 0),
(84, 'CVSUDZH231690758', '09:30:00', '10:00:00', 'Thursday', 0),
(85, 'CVSUDZH231690758', '10:00:00', '10:30:00', 'Thursday', 0),
(86, 'CVSUDZH231690758', '10:30:00', '11:00:00', 'Thursday', 0),
(87, 'CVSUDZH231690758', '11:00:00', '11:30:00', 'Thursday', 0),
(88, 'CVSUDZH231690758', '11:30:00', '12:00:00', 'Thursday', 0),
(89, 'CVSUDZH231690758', '12:00:00', '12:30:00', 'Thursday', 0),
(90, 'CVSUDZH231690758', '12:30:00', '13:00:00', 'Thursday', 0),
(91, 'CVSUDZH231690758', '13:00:00', '13:30:00', 'Thursday', 0),
(92, 'CVSUDZH231690758', '13:30:00', '14:00:00', 'Thursday', 0),
(93, 'CVSUDZH231690758', '14:00:00', '14:30:00', 'Thursday', 0),
(94, 'CVSUDZH231690758', '14:30:00', '15:00:00', 'Thursday', 0),
(95, 'CVSUDZH231690758', '15:00:00', '15:30:00', 'Thursday', 0),
(96, 'CVSUDZH231690758', '15:30:00', '16:00:00', 'Thursday', 0),
(97, 'CVSUDZH231690758', '16:00:00', '16:30:00', 'Thursday', 0),
(98, 'CVSUDZH231690758', '16:30:00', '17:00:00', 'Thursday', 0),
(99, 'CVSUDZH231690758', '17:00:00', '17:30:00', 'Thursday', 0),
(100, 'CVSUDZH231690758', '17:30:00', '18:00:00', 'Thursday', 0),
(101, 'CVSUDZH231690758', '18:00:00', '18:30:00', 'Thursday', 0),
(102, 'CVSUDZH231690758', '18:30:00', '19:00:00', 'Thursday', 0),
(103, 'CVSUDZH231690758', '19:00:00', '19:30:00', 'Thursday', 0),
(104, 'CVSUDZH231690758', '19:30:00', '20:00:00', 'Thursday', 0),
(105, 'CVSUDZH231690758', '07:00:00', '07:30:00', 'Friday', 0),
(106, 'CVSUDZH231690758', '07:30:00', '08:00:00', 'Friday', 0),
(107, 'CVSUDZH231690758', '08:00:00', '08:30:00', 'Friday', 0),
(108, 'CVSUDZH231690758', '08:30:00', '09:00:00', 'Friday', 0),
(109, 'CVSUDZH231690758', '09:00:00', '09:30:00', 'Friday', 0),
(110, 'CVSUDZH231690758', '09:30:00', '10:00:00', 'Friday', 0),
(111, 'CVSUDZH231690758', '10:00:00', '10:30:00', 'Friday', 0),
(112, 'CVSUDZH231690758', '10:30:00', '11:00:00', 'Friday', 0),
(113, 'CVSUDZH231690758', '11:00:00', '11:30:00', 'Friday', 0),
(114, 'CVSUDZH231690758', '11:30:00', '12:00:00', 'Friday', 0),
(115, 'CVSUDZH231690758', '12:00:00', '12:30:00', 'Friday', 0),
(116, 'CVSUDZH231690758', '12:30:00', '13:00:00', 'Friday', 0),
(117, 'CVSUDZH231690758', '13:00:00', '13:30:00', 'Friday', 0),
(118, 'CVSUDZH231690758', '13:30:00', '14:00:00', 'Friday', 0),
(119, 'CVSUDZH231690758', '14:00:00', '14:30:00', 'Friday', 0),
(120, 'CVSUDZH231690758', '14:30:00', '15:00:00', 'Friday', 0),
(121, 'CVSUDZH231690758', '15:00:00', '15:30:00', 'Friday', 0),
(122, 'CVSUDZH231690758', '15:30:00', '16:00:00', 'Friday', 0),
(123, 'CVSUDZH231690758', '16:00:00', '16:30:00', 'Friday', 0),
(124, 'CVSUDZH231690758', '16:30:00', '17:00:00', 'Friday', 0),
(125, 'CVSUDZH231690758', '17:00:00', '17:30:00', 'Friday', 0),
(126, 'CVSUDZH231690758', '17:30:00', '18:00:00', 'Friday', 0),
(127, 'CVSUDZH231690758', '18:00:00', '18:30:00', 'Friday', 0),
(128, 'CVSUDZH231690758', '18:30:00', '19:00:00', 'Friday', 0),
(129, 'CVSUDZH231690758', '19:00:00', '19:30:00', 'Friday', 0),
(130, 'CVSUDZH231690758', '19:30:00', '20:00:00', 'Friday', 0),
(131, 'CVSUDZH231690758', '07:00:00', '07:30:00', 'Saturday', 0),
(132, 'CVSUDZH231690758', '07:30:00', '08:00:00', 'Saturday', 0),
(133, 'CVSUDZH231690758', '08:00:00', '08:30:00', 'Saturday', 0),
(134, 'CVSUDZH231690758', '08:30:00', '09:00:00', 'Saturday', 0),
(135, 'CVSUDZH231690758', '09:00:00', '09:30:00', 'Saturday', 0),
(136, 'CVSUDZH231690758', '09:30:00', '10:00:00', 'Saturday', 0),
(137, 'CVSUDZH231690758', '10:00:00', '10:30:00', 'Saturday', 0),
(138, 'CVSUDZH231690758', '10:30:00', '11:00:00', 'Saturday', 0),
(139, 'CVSUDZH231690758', '11:00:00', '11:30:00', 'Saturday', 0),
(140, 'CVSUDZH231690758', '11:30:00', '12:00:00', 'Saturday', 0),
(141, 'CVSUDZH231690758', '12:00:00', '12:30:00', 'Saturday', 0),
(142, 'CVSUDZH231690758', '12:30:00', '13:00:00', 'Saturday', 0),
(143, 'CVSUDZH231690758', '13:00:00', '13:30:00', 'Saturday', 0),
(144, 'CVSUDZH231690758', '13:30:00', '14:00:00', 'Saturday', 0),
(145, 'CVSUDZH231690758', '14:00:00', '14:30:00', 'Saturday', 0),
(146, 'CVSUDZH231690758', '14:30:00', '15:00:00', 'Saturday', 0),
(147, 'CVSUDZH231690758', '15:00:00', '15:30:00', 'Saturday', 0),
(148, 'CVSUDZH231690758', '15:30:00', '16:00:00', 'Saturday', 0),
(149, 'CVSUDZH231690758', '16:00:00', '16:30:00', 'Saturday', 0),
(150, 'CVSUDZH231690758', '16:30:00', '17:00:00', 'Saturday', 0),
(151, 'CVSUDZH231690758', '17:00:00', '17:30:00', 'Saturday', 0),
(152, 'CVSUDZH231690758', '17:30:00', '18:00:00', 'Saturday', 0),
(153, 'CVSUDZH231690758', '18:00:00', '18:30:00', 'Saturday', 0),
(154, 'CVSUDZH231690758', '18:30:00', '19:00:00', 'Saturday', 0),
(155, 'CVSUDZH231690758', '19:00:00', '19:30:00', 'Saturday', 0),
(156, 'CVSUDZH231690758', '19:30:00', '20:00:00', 'Saturday', 0),
(157, 'CVSUGDQ792531486', '07:00:00', '07:30:00', 'Monday', 0),
(158, 'CVSUGDQ792531486', '07:30:00', '08:00:00', 'Monday', 0),
(159, 'CVSUGDQ792531486', '08:00:00', '08:30:00', 'Monday', 0),
(160, 'CVSUGDQ792531486', '08:30:00', '09:00:00', 'Monday', 0),
(161, 'CVSUGDQ792531486', '09:00:00', '09:30:00', 'Monday', 0),
(162, 'CVSUGDQ792531486', '09:30:00', '10:00:00', 'Monday', 0),
(163, 'CVSUGDQ792531486', '10:00:00', '10:30:00', 'Monday', 0),
(164, 'CVSUGDQ792531486', '10:30:00', '11:00:00', 'Monday', 0),
(165, 'CVSUGDQ792531486', '11:00:00', '11:30:00', 'Monday', 0),
(166, 'CVSUGDQ792531486', '11:30:00', '12:00:00', 'Monday', 0),
(167, 'CVSUGDQ792531486', '12:00:00', '12:30:00', 'Monday', 0),
(168, 'CVSUGDQ792531486', '12:30:00', '13:00:00', 'Monday', 0),
(169, 'CVSUGDQ792531486', '13:00:00', '13:30:00', 'Monday', 0),
(170, 'CVSUGDQ792531486', '13:30:00', '14:00:00', 'Monday', 0),
(171, 'CVSUGDQ792531486', '14:00:00', '14:30:00', 'Monday', 0),
(172, 'CVSUGDQ792531486', '14:30:00', '15:00:00', 'Monday', 0),
(173, 'CVSUGDQ792531486', '15:00:00', '15:30:00', 'Monday', 0),
(174, 'CVSUGDQ792531486', '15:30:00', '16:00:00', 'Monday', 0),
(175, 'CVSUGDQ792531486', '16:00:00', '16:30:00', 'Monday', 0),
(176, 'CVSUGDQ792531486', '16:30:00', '17:00:00', 'Monday', 0),
(177, 'CVSUGDQ792531486', '17:00:00', '17:30:00', 'Monday', 0),
(178, 'CVSUGDQ792531486', '17:30:00', '18:00:00', 'Monday', 0),
(179, 'CVSUGDQ792531486', '18:00:00', '18:30:00', 'Monday', 0),
(180, 'CVSUGDQ792531486', '18:30:00', '19:00:00', 'Monday', 0),
(181, 'CVSUGDQ792531486', '19:00:00', '19:30:00', 'Monday', 0),
(182, 'CVSUGDQ792531486', '19:30:00', '20:00:00', 'Monday', 0),
(183, 'CVSUGDQ792531486', '07:00:00', '07:30:00', 'Tuesday', 0),
(184, 'CVSUGDQ792531486', '07:30:00', '08:00:00', 'Tuesday', 0),
(185, 'CVSUGDQ792531486', '08:00:00', '08:30:00', 'Tuesday', 0),
(186, 'CVSUGDQ792531486', '08:30:00', '09:00:00', 'Tuesday', 0),
(187, 'CVSUGDQ792531486', '09:00:00', '09:30:00', 'Tuesday', 0),
(188, 'CVSUGDQ792531486', '09:30:00', '10:00:00', 'Tuesday', 0),
(189, 'CVSUGDQ792531486', '10:00:00', '10:30:00', 'Tuesday', 0),
(190, 'CVSUGDQ792531486', '10:30:00', '11:00:00', 'Tuesday', 0),
(191, 'CVSUGDQ792531486', '11:00:00', '11:30:00', 'Tuesday', 0),
(192, 'CVSUGDQ792531486', '11:30:00', '12:00:00', 'Tuesday', 0),
(193, 'CVSUGDQ792531486', '12:00:00', '12:30:00', 'Tuesday', 0),
(194, 'CVSUGDQ792531486', '12:30:00', '13:00:00', 'Tuesday', 0),
(195, 'CVSUGDQ792531486', '13:00:00', '13:30:00', 'Tuesday', 0),
(196, 'CVSUGDQ792531486', '13:30:00', '14:00:00', 'Tuesday', 0),
(197, 'CVSUGDQ792531486', '14:00:00', '14:30:00', 'Tuesday', 0),
(198, 'CVSUGDQ792531486', '14:30:00', '15:00:00', 'Tuesday', 0),
(199, 'CVSUGDQ792531486', '15:00:00', '15:30:00', 'Tuesday', 0),
(200, 'CVSUGDQ792531486', '15:30:00', '16:00:00', 'Tuesday', 0),
(201, 'CVSUGDQ792531486', '16:00:00', '16:30:00', 'Tuesday', 0),
(202, 'CVSUGDQ792531486', '16:30:00', '17:00:00', 'Tuesday', 0),
(203, 'CVSUGDQ792531486', '17:00:00', '17:30:00', 'Tuesday', 0),
(204, 'CVSUGDQ792531486', '17:30:00', '18:00:00', 'Tuesday', 0),
(205, 'CVSUGDQ792531486', '18:00:00', '18:30:00', 'Tuesday', 0),
(206, 'CVSUGDQ792531486', '18:30:00', '19:00:00', 'Tuesday', 0),
(207, 'CVSUGDQ792531486', '19:00:00', '19:30:00', 'Tuesday', 0),
(208, 'CVSUGDQ792531486', '19:30:00', '20:00:00', 'Tuesday', 0),
(209, 'CVSUGDQ792531486', '07:00:00', '07:30:00', 'Wednesday', 0),
(210, 'CVSUGDQ792531486', '07:30:00', '08:00:00', 'Wednesday', 0),
(211, 'CVSUGDQ792531486', '08:00:00', '08:30:00', 'Wednesday', 0),
(212, 'CVSUGDQ792531486', '08:30:00', '09:00:00', 'Wednesday', 0),
(213, 'CVSUGDQ792531486', '09:00:00', '09:30:00', 'Wednesday', 0),
(214, 'CVSUGDQ792531486', '09:30:00', '10:00:00', 'Wednesday', 0),
(215, 'CVSUGDQ792531486', '10:00:00', '10:30:00', 'Wednesday', 0),
(216, 'CVSUGDQ792531486', '10:30:00', '11:00:00', 'Wednesday', 0),
(217, 'CVSUGDQ792531486', '11:00:00', '11:30:00', 'Wednesday', 0),
(218, 'CVSUGDQ792531486', '11:30:00', '12:00:00', 'Wednesday', 0),
(219, 'CVSUGDQ792531486', '12:00:00', '12:30:00', 'Wednesday', 0),
(220, 'CVSUGDQ792531486', '12:30:00', '13:00:00', 'Wednesday', 0),
(221, 'CVSUGDQ792531486', '13:00:00', '13:30:00', 'Wednesday', 0),
(222, 'CVSUGDQ792531486', '13:30:00', '14:00:00', 'Wednesday', 0),
(223, 'CVSUGDQ792531486', '14:00:00', '14:30:00', 'Wednesday', 0),
(224, 'CVSUGDQ792531486', '14:30:00', '15:00:00', 'Wednesday', 0),
(225, 'CVSUGDQ792531486', '15:00:00', '15:30:00', 'Wednesday', 0),
(226, 'CVSUGDQ792531486', '15:30:00', '16:00:00', 'Wednesday', 0),
(227, 'CVSUGDQ792531486', '16:00:00', '16:30:00', 'Wednesday', 0),
(228, 'CVSUGDQ792531486', '16:30:00', '17:00:00', 'Wednesday', 0),
(229, 'CVSUGDQ792531486', '17:00:00', '17:30:00', 'Wednesday', 0),
(230, 'CVSUGDQ792531486', '17:30:00', '18:00:00', 'Wednesday', 0),
(231, 'CVSUGDQ792531486', '18:00:00', '18:30:00', 'Wednesday', 0),
(232, 'CVSUGDQ792531486', '18:30:00', '19:00:00', 'Wednesday', 0),
(233, 'CVSUGDQ792531486', '19:00:00', '19:30:00', 'Wednesday', 0),
(234, 'CVSUGDQ792531486', '19:30:00', '20:00:00', 'Wednesday', 0),
(235, 'CVSUGDQ792531486', '07:00:00', '07:30:00', 'Thursday', 0),
(236, 'CVSUGDQ792531486', '07:30:00', '08:00:00', 'Thursday', 0),
(237, 'CVSUGDQ792531486', '08:00:00', '08:30:00', 'Thursday', 0),
(238, 'CVSUGDQ792531486', '08:30:00', '09:00:00', 'Thursday', 0),
(239, 'CVSUGDQ792531486', '09:00:00', '09:30:00', 'Thursday', 0),
(240, 'CVSUGDQ792531486', '09:30:00', '10:00:00', 'Thursday', 0),
(241, 'CVSUGDQ792531486', '10:00:00', '10:30:00', 'Thursday', 0),
(242, 'CVSUGDQ792531486', '10:30:00', '11:00:00', 'Thursday', 0),
(243, 'CVSUGDQ792531486', '11:00:00', '11:30:00', 'Thursday', 0),
(244, 'CVSUGDQ792531486', '11:30:00', '12:00:00', 'Thursday', 0),
(245, 'CVSUGDQ792531486', '12:00:00', '12:30:00', 'Thursday', 0),
(246, 'CVSUGDQ792531486', '12:30:00', '13:00:00', 'Thursday', 0),
(247, 'CVSUGDQ792531486', '13:00:00', '13:30:00', 'Thursday', 0),
(248, 'CVSUGDQ792531486', '13:30:00', '14:00:00', 'Thursday', 0),
(249, 'CVSUGDQ792531486', '14:00:00', '14:30:00', 'Thursday', 0),
(250, 'CVSUGDQ792531486', '14:30:00', '15:00:00', 'Thursday', 0),
(251, 'CVSUGDQ792531486', '15:00:00', '15:30:00', 'Thursday', 0),
(252, 'CVSUGDQ792531486', '15:30:00', '16:00:00', 'Thursday', 0),
(253, 'CVSUGDQ792531486', '16:00:00', '16:30:00', 'Thursday', 0),
(254, 'CVSUGDQ792531486', '16:30:00', '17:00:00', 'Thursday', 0),
(255, 'CVSUGDQ792531486', '17:00:00', '17:30:00', 'Thursday', 0),
(256, 'CVSUGDQ792531486', '17:30:00', '18:00:00', 'Thursday', 0),
(257, 'CVSUGDQ792531486', '18:00:00', '18:30:00', 'Thursday', 0),
(258, 'CVSUGDQ792531486', '18:30:00', '19:00:00', 'Thursday', 0),
(259, 'CVSUGDQ792531486', '19:00:00', '19:30:00', 'Thursday', 0),
(260, 'CVSUGDQ792531486', '19:30:00', '20:00:00', 'Thursday', 0),
(261, 'CVSUGDQ792531486', '07:00:00', '07:30:00', 'Friday', 0),
(262, 'CVSUGDQ792531486', '07:30:00', '08:00:00', 'Friday', 0),
(263, 'CVSUGDQ792531486', '08:00:00', '08:30:00', 'Friday', 0),
(264, 'CVSUGDQ792531486', '08:30:00', '09:00:00', 'Friday', 0),
(265, 'CVSUGDQ792531486', '09:00:00', '09:30:00', 'Friday', 0),
(266, 'CVSUGDQ792531486', '09:30:00', '10:00:00', 'Friday', 0),
(267, 'CVSUGDQ792531486', '10:00:00', '10:30:00', 'Friday', 0),
(268, 'CVSUGDQ792531486', '10:30:00', '11:00:00', 'Friday', 0),
(269, 'CVSUGDQ792531486', '11:00:00', '11:30:00', 'Friday', 0),
(270, 'CVSUGDQ792531486', '11:30:00', '12:00:00', 'Friday', 0),
(271, 'CVSUGDQ792531486', '12:00:00', '12:30:00', 'Friday', 0),
(272, 'CVSUGDQ792531486', '12:30:00', '13:00:00', 'Friday', 0),
(273, 'CVSUGDQ792531486', '13:00:00', '13:30:00', 'Friday', 0),
(274, 'CVSUGDQ792531486', '13:30:00', '14:00:00', 'Friday', 0),
(275, 'CVSUGDQ792531486', '14:00:00', '14:30:00', 'Friday', 0),
(276, 'CVSUGDQ792531486', '14:30:00', '15:00:00', 'Friday', 0),
(277, 'CVSUGDQ792531486', '15:00:00', '15:30:00', 'Friday', 0),
(278, 'CVSUGDQ792531486', '15:30:00', '16:00:00', 'Friday', 0),
(279, 'CVSUGDQ792531486', '16:00:00', '16:30:00', 'Friday', 0),
(280, 'CVSUGDQ792531486', '16:30:00', '17:00:00', 'Friday', 0),
(281, 'CVSUGDQ792531486', '17:00:00', '17:30:00', 'Friday', 0),
(282, 'CVSUGDQ792531486', '17:30:00', '18:00:00', 'Friday', 0),
(283, 'CVSUGDQ792531486', '18:00:00', '18:30:00', 'Friday', 0),
(284, 'CVSUGDQ792531486', '18:30:00', '19:00:00', 'Friday', 0),
(285, 'CVSUGDQ792531486', '19:00:00', '19:30:00', 'Friday', 0),
(286, 'CVSUGDQ792531486', '19:30:00', '20:00:00', 'Friday', 0),
(287, 'CVSUGDQ792531486', '07:00:00', '07:30:00', 'Saturday', 0),
(288, 'CVSUGDQ792531486', '07:30:00', '08:00:00', 'Saturday', 0),
(289, 'CVSUGDQ792531486', '08:00:00', '08:30:00', 'Saturday', 0),
(290, 'CVSUGDQ792531486', '08:30:00', '09:00:00', 'Saturday', 0),
(291, 'CVSUGDQ792531486', '09:00:00', '09:30:00', 'Saturday', 0),
(292, 'CVSUGDQ792531486', '09:30:00', '10:00:00', 'Saturday', 0),
(293, 'CVSUGDQ792531486', '10:00:00', '10:30:00', 'Saturday', 0),
(294, 'CVSUGDQ792531486', '10:30:00', '11:00:00', 'Saturday', 0),
(295, 'CVSUGDQ792531486', '11:00:00', '11:30:00', 'Saturday', 0),
(296, 'CVSUGDQ792531486', '11:30:00', '12:00:00', 'Saturday', 0),
(297, 'CVSUGDQ792531486', '12:00:00', '12:30:00', 'Saturday', 0),
(298, 'CVSUGDQ792531486', '12:30:00', '13:00:00', 'Saturday', 0),
(299, 'CVSUGDQ792531486', '13:00:00', '13:30:00', 'Saturday', 0),
(300, 'CVSUGDQ792531486', '13:30:00', '14:00:00', 'Saturday', 0),
(301, 'CVSUGDQ792531486', '14:00:00', '14:30:00', 'Saturday', 0),
(302, 'CVSUGDQ792531486', '14:30:00', '15:00:00', 'Saturday', 0),
(303, 'CVSUGDQ792531486', '15:00:00', '15:30:00', 'Saturday', 0),
(304, 'CVSUGDQ792531486', '15:30:00', '16:00:00', 'Saturday', 0),
(305, 'CVSUGDQ792531486', '16:00:00', '16:30:00', 'Saturday', 0),
(306, 'CVSUGDQ792531486', '16:30:00', '17:00:00', 'Saturday', 0),
(307, 'CVSUGDQ792531486', '17:00:00', '17:30:00', 'Saturday', 0),
(308, 'CVSUGDQ792531486', '17:30:00', '18:00:00', 'Saturday', 0),
(309, 'CVSUGDQ792531486', '18:00:00', '18:30:00', 'Saturday', 0),
(310, 'CVSUGDQ792531486', '18:30:00', '19:00:00', 'Saturday', 0),
(311, 'CVSUGDQ792531486', '19:00:00', '19:30:00', 'Saturday', 0),
(312, 'CVSUGDQ792531486', '19:30:00', '20:00:00', 'Saturday', 0),
(313, 'CVSUMKY260375198', '07:00:00', '07:30:00', 'Monday', 0),
(314, 'CVSUMKY260375198', '07:30:00', '08:00:00', 'Monday', 0),
(315, 'CVSUMKY260375198', '08:00:00', '08:30:00', 'Monday', 0),
(316, 'CVSUMKY260375198', '08:30:00', '09:00:00', 'Monday', 0),
(317, 'CVSUMKY260375198', '09:00:00', '09:30:00', 'Monday', 0),
(318, 'CVSUMKY260375198', '09:30:00', '10:00:00', 'Monday', 0),
(319, 'CVSUMKY260375198', '10:00:00', '10:30:00', 'Monday', 0),
(320, 'CVSUMKY260375198', '10:30:00', '11:00:00', 'Monday', 0),
(321, 'CVSUMKY260375198', '11:00:00', '11:30:00', 'Monday', 0),
(322, 'CVSUMKY260375198', '11:30:00', '12:00:00', 'Monday', 0),
(323, 'CVSUMKY260375198', '12:00:00', '12:30:00', 'Monday', 0),
(324, 'CVSUMKY260375198', '12:30:00', '13:00:00', 'Monday', 0),
(325, 'CVSUMKY260375198', '13:00:00', '13:30:00', 'Monday', 0),
(326, 'CVSUMKY260375198', '13:30:00', '14:00:00', 'Monday', 0),
(327, 'CVSUMKY260375198', '14:00:00', '14:30:00', 'Monday', 0),
(328, 'CVSUMKY260375198', '14:30:00', '15:00:00', 'Monday', 0),
(329, 'CVSUMKY260375198', '15:00:00', '15:30:00', 'Monday', 0),
(330, 'CVSUMKY260375198', '15:30:00', '16:00:00', 'Monday', 0),
(331, 'CVSUMKY260375198', '16:00:00', '16:30:00', 'Monday', 0),
(332, 'CVSUMKY260375198', '16:30:00', '17:00:00', 'Monday', 0),
(333, 'CVSUMKY260375198', '17:00:00', '17:30:00', 'Monday', 0),
(334, 'CVSUMKY260375198', '17:30:00', '18:00:00', 'Monday', 0),
(335, 'CVSUMKY260375198', '18:00:00', '18:30:00', 'Monday', 0),
(336, 'CVSUMKY260375198', '18:30:00', '19:00:00', 'Monday', 0),
(337, 'CVSUMKY260375198', '19:00:00', '19:30:00', 'Monday', 0),
(338, 'CVSUMKY260375198', '19:30:00', '20:00:00', 'Monday', 0),
(339, 'CVSUMKY260375198', '07:00:00', '07:30:00', 'Tuesday', 0),
(340, 'CVSUMKY260375198', '07:30:00', '08:00:00', 'Tuesday', 0),
(341, 'CVSUMKY260375198', '08:00:00', '08:30:00', 'Tuesday', 0),
(342, 'CVSUMKY260375198', '08:30:00', '09:00:00', 'Tuesday', 0),
(343, 'CVSUMKY260375198', '09:00:00', '09:30:00', 'Tuesday', 0),
(344, 'CVSUMKY260375198', '09:30:00', '10:00:00', 'Tuesday', 0),
(345, 'CVSUMKY260375198', '10:00:00', '10:30:00', 'Tuesday', 0),
(346, 'CVSUMKY260375198', '10:30:00', '11:00:00', 'Tuesday', 0),
(347, 'CVSUMKY260375198', '11:00:00', '11:30:00', 'Tuesday', 0),
(348, 'CVSUMKY260375198', '11:30:00', '12:00:00', 'Tuesday', 0),
(349, 'CVSUMKY260375198', '12:00:00', '12:30:00', 'Tuesday', 0),
(350, 'CVSUMKY260375198', '12:30:00', '13:00:00', 'Tuesday', 0),
(351, 'CVSUMKY260375198', '13:00:00', '13:30:00', 'Tuesday', 0),
(352, 'CVSUMKY260375198', '13:30:00', '14:00:00', 'Tuesday', 0),
(353, 'CVSUMKY260375198', '14:00:00', '14:30:00', 'Tuesday', 0),
(354, 'CVSUMKY260375198', '14:30:00', '15:00:00', 'Tuesday', 0),
(355, 'CVSUMKY260375198', '15:00:00', '15:30:00', 'Tuesday', 0),
(356, 'CVSUMKY260375198', '15:30:00', '16:00:00', 'Tuesday', 0),
(357, 'CVSUMKY260375198', '16:00:00', '16:30:00', 'Tuesday', 0),
(358, 'CVSUMKY260375198', '16:30:00', '17:00:00', 'Tuesday', 0),
(359, 'CVSUMKY260375198', '17:00:00', '17:30:00', 'Tuesday', 0),
(360, 'CVSUMKY260375198', '17:30:00', '18:00:00', 'Tuesday', 0),
(361, 'CVSUMKY260375198', '18:00:00', '18:30:00', 'Tuesday', 0),
(362, 'CVSUMKY260375198', '18:30:00', '19:00:00', 'Tuesday', 0),
(363, 'CVSUMKY260375198', '19:00:00', '19:30:00', 'Tuesday', 0),
(364, 'CVSUMKY260375198', '19:30:00', '20:00:00', 'Tuesday', 0),
(365, 'CVSUMKY260375198', '07:00:00', '07:30:00', 'Wednesday', 0),
(366, 'CVSUMKY260375198', '07:30:00', '08:00:00', 'Wednesday', 0),
(367, 'CVSUMKY260375198', '08:00:00', '08:30:00', 'Wednesday', 0),
(368, 'CVSUMKY260375198', '08:30:00', '09:00:00', 'Wednesday', 0),
(369, 'CVSUMKY260375198', '09:00:00', '09:30:00', 'Wednesday', 0),
(370, 'CVSUMKY260375198', '09:30:00', '10:00:00', 'Wednesday', 0),
(371, 'CVSUMKY260375198', '10:00:00', '10:30:00', 'Wednesday', 0),
(372, 'CVSUMKY260375198', '10:30:00', '11:00:00', 'Wednesday', 0),
(373, 'CVSUMKY260375198', '11:00:00', '11:30:00', 'Wednesday', 0),
(374, 'CVSUMKY260375198', '11:30:00', '12:00:00', 'Wednesday', 0),
(375, 'CVSUMKY260375198', '12:00:00', '12:30:00', 'Wednesday', 0),
(376, 'CVSUMKY260375198', '12:30:00', '13:00:00', 'Wednesday', 0),
(377, 'CVSUMKY260375198', '13:00:00', '13:30:00', 'Wednesday', 0),
(378, 'CVSUMKY260375198', '13:30:00', '14:00:00', 'Wednesday', 0),
(379, 'CVSUMKY260375198', '14:00:00', '14:30:00', 'Wednesday', 0),
(380, 'CVSUMKY260375198', '14:30:00', '15:00:00', 'Wednesday', 0),
(381, 'CVSUMKY260375198', '15:00:00', '15:30:00', 'Wednesday', 0),
(382, 'CVSUMKY260375198', '15:30:00', '16:00:00', 'Wednesday', 0),
(383, 'CVSUMKY260375198', '16:00:00', '16:30:00', 'Wednesday', 0),
(384, 'CVSUMKY260375198', '16:30:00', '17:00:00', 'Wednesday', 0),
(385, 'CVSUMKY260375198', '17:00:00', '17:30:00', 'Wednesday', 0),
(386, 'CVSUMKY260375198', '17:30:00', '18:00:00', 'Wednesday', 0),
(387, 'CVSUMKY260375198', '18:00:00', '18:30:00', 'Wednesday', 0),
(388, 'CVSUMKY260375198', '18:30:00', '19:00:00', 'Wednesday', 0),
(389, 'CVSUMKY260375198', '19:00:00', '19:30:00', 'Wednesday', 0),
(390, 'CVSUMKY260375198', '19:30:00', '20:00:00', 'Wednesday', 0),
(391, 'CVSUMKY260375198', '07:00:00', '07:30:00', 'Thursday', 0),
(392, 'CVSUMKY260375198', '07:30:00', '08:00:00', 'Thursday', 0),
(393, 'CVSUMKY260375198', '08:00:00', '08:30:00', 'Thursday', 0),
(394, 'CVSUMKY260375198', '08:30:00', '09:00:00', 'Thursday', 0),
(395, 'CVSUMKY260375198', '09:00:00', '09:30:00', 'Thursday', 0),
(396, 'CVSUMKY260375198', '09:30:00', '10:00:00', 'Thursday', 0),
(397, 'CVSUMKY260375198', '10:00:00', '10:30:00', 'Thursday', 0),
(398, 'CVSUMKY260375198', '10:30:00', '11:00:00', 'Thursday', 0),
(399, 'CVSUMKY260375198', '11:00:00', '11:30:00', 'Thursday', 0),
(400, 'CVSUMKY260375198', '11:30:00', '12:00:00', 'Thursday', 0),
(401, 'CVSUMKY260375198', '12:00:00', '12:30:00', 'Thursday', 0),
(402, 'CVSUMKY260375198', '12:30:00', '13:00:00', 'Thursday', 0),
(403, 'CVSUMKY260375198', '13:00:00', '13:30:00', 'Thursday', 0),
(404, 'CVSUMKY260375198', '13:30:00', '14:00:00', 'Thursday', 0),
(405, 'CVSUMKY260375198', '14:00:00', '14:30:00', 'Thursday', 0),
(406, 'CVSUMKY260375198', '14:30:00', '15:00:00', 'Thursday', 0),
(407, 'CVSUMKY260375198', '15:00:00', '15:30:00', 'Thursday', 0),
(408, 'CVSUMKY260375198', '15:30:00', '16:00:00', 'Thursday', 0),
(409, 'CVSUMKY260375198', '16:00:00', '16:30:00', 'Thursday', 0),
(410, 'CVSUMKY260375198', '16:30:00', '17:00:00', 'Thursday', 0),
(411, 'CVSUMKY260375198', '17:00:00', '17:30:00', 'Thursday', 0),
(412, 'CVSUMKY260375198', '17:30:00', '18:00:00', 'Thursday', 0),
(413, 'CVSUMKY260375198', '18:00:00', '18:30:00', 'Thursday', 0),
(414, 'CVSUMKY260375198', '18:30:00', '19:00:00', 'Thursday', 0),
(415, 'CVSUMKY260375198', '19:00:00', '19:30:00', 'Thursday', 0),
(416, 'CVSUMKY260375198', '19:30:00', '20:00:00', 'Thursday', 0),
(417, 'CVSUMKY260375198', '07:00:00', '07:30:00', 'Friday', 0),
(418, 'CVSUMKY260375198', '07:30:00', '08:00:00', 'Friday', 0),
(419, 'CVSUMKY260375198', '08:00:00', '08:30:00', 'Friday', 0),
(420, 'CVSUMKY260375198', '08:30:00', '09:00:00', 'Friday', 0),
(421, 'CVSUMKY260375198', '09:00:00', '09:30:00', 'Friday', 0),
(422, 'CVSUMKY260375198', '09:30:00', '10:00:00', 'Friday', 0),
(423, 'CVSUMKY260375198', '10:00:00', '10:30:00', 'Friday', 0),
(424, 'CVSUMKY260375198', '10:30:00', '11:00:00', 'Friday', 0),
(425, 'CVSUMKY260375198', '11:00:00', '11:30:00', 'Friday', 0),
(426, 'CVSUMKY260375198', '11:30:00', '12:00:00', 'Friday', 0),
(427, 'CVSUMKY260375198', '12:00:00', '12:30:00', 'Friday', 0),
(428, 'CVSUMKY260375198', '12:30:00', '13:00:00', 'Friday', 0),
(429, 'CVSUMKY260375198', '13:00:00', '13:30:00', 'Friday', 0),
(430, 'CVSUMKY260375198', '13:30:00', '14:00:00', 'Friday', 0),
(431, 'CVSUMKY260375198', '14:00:00', '14:30:00', 'Friday', 0),
(432, 'CVSUMKY260375198', '14:30:00', '15:00:00', 'Friday', 0),
(433, 'CVSUMKY260375198', '15:00:00', '15:30:00', 'Friday', 0),
(434, 'CVSUMKY260375198', '15:30:00', '16:00:00', 'Friday', 0),
(435, 'CVSUMKY260375198', '16:00:00', '16:30:00', 'Friday', 0),
(436, 'CVSUMKY260375198', '16:30:00', '17:00:00', 'Friday', 0),
(437, 'CVSUMKY260375198', '17:00:00', '17:30:00', 'Friday', 0),
(438, 'CVSUMKY260375198', '17:30:00', '18:00:00', 'Friday', 0),
(439, 'CVSUMKY260375198', '18:00:00', '18:30:00', 'Friday', 0),
(440, 'CVSUMKY260375198', '18:30:00', '19:00:00', 'Friday', 0),
(441, 'CVSUMKY260375198', '19:00:00', '19:30:00', 'Friday', 0),
(442, 'CVSUMKY260375198', '19:30:00', '20:00:00', 'Friday', 0),
(443, 'CVSUMKY260375198', '07:00:00', '07:30:00', 'Saturday', 0),
(444, 'CVSUMKY260375198', '07:30:00', '08:00:00', 'Saturday', 0),
(445, 'CVSUMKY260375198', '08:00:00', '08:30:00', 'Saturday', 0),
(446, 'CVSUMKY260375198', '08:30:00', '09:00:00', 'Saturday', 0),
(447, 'CVSUMKY260375198', '09:00:00', '09:30:00', 'Saturday', 0),
(448, 'CVSUMKY260375198', '09:30:00', '10:00:00', 'Saturday', 0),
(449, 'CVSUMKY260375198', '10:00:00', '10:30:00', 'Saturday', 0),
(450, 'CVSUMKY260375198', '10:30:00', '11:00:00', 'Saturday', 0),
(451, 'CVSUMKY260375198', '11:00:00', '11:30:00', 'Saturday', 0),
(452, 'CVSUMKY260375198', '11:30:00', '12:00:00', 'Saturday', 0),
(453, 'CVSUMKY260375198', '12:00:00', '12:30:00', 'Saturday', 0),
(454, 'CVSUMKY260375198', '12:30:00', '13:00:00', 'Saturday', 0),
(455, 'CVSUMKY260375198', '13:00:00', '13:30:00', 'Saturday', 0),
(456, 'CVSUMKY260375198', '13:30:00', '14:00:00', 'Saturday', 0),
(457, 'CVSUMKY260375198', '14:00:00', '14:30:00', 'Saturday', 0),
(458, 'CVSUMKY260375198', '14:30:00', '15:00:00', 'Saturday', 0),
(459, 'CVSUMKY260375198', '15:00:00', '15:30:00', 'Saturday', 0),
(460, 'CVSUMKY260375198', '15:30:00', '16:00:00', 'Saturday', 0),
(461, 'CVSUMKY260375198', '16:00:00', '16:30:00', 'Saturday', 0),
(462, 'CVSUMKY260375198', '16:30:00', '17:00:00', 'Saturday', 0),
(463, 'CVSUMKY260375198', '17:00:00', '17:30:00', 'Saturday', 0),
(464, 'CVSUMKY260375198', '17:30:00', '18:00:00', 'Saturday', 0),
(465, 'CVSUMKY260375198', '18:00:00', '18:30:00', 'Saturday', 0),
(466, 'CVSUMKY260375198', '18:30:00', '19:00:00', 'Saturday', 0),
(467, 'CVSUMKY260375198', '19:00:00', '19:30:00', 'Saturday', 0),
(468, 'CVSUMKY260375198', '19:30:00', '20:00:00', 'Saturday', 0),
(469, 'CVSUKNC085291637', '07:00:00', '07:30:00', 'Monday', 0),
(470, 'CVSUKNC085291637', '07:30:00', '08:00:00', 'Monday', 0),
(471, 'CVSUKNC085291637', '08:00:00', '08:30:00', 'Monday', 0),
(472, 'CVSUKNC085291637', '08:30:00', '09:00:00', 'Monday', 0),
(473, 'CVSUKNC085291637', '09:00:00', '09:30:00', 'Monday', 0),
(474, 'CVSUKNC085291637', '09:30:00', '10:00:00', 'Monday', 0),
(475, 'CVSUKNC085291637', '10:00:00', '10:30:00', 'Monday', 0),
(476, 'CVSUKNC085291637', '10:30:00', '11:00:00', 'Monday', 0),
(477, 'CVSUKNC085291637', '11:00:00', '11:30:00', 'Monday', 0),
(478, 'CVSUKNC085291637', '11:30:00', '12:00:00', 'Monday', 0),
(479, 'CVSUKNC085291637', '12:00:00', '12:30:00', 'Monday', 0),
(480, 'CVSUKNC085291637', '12:30:00', '13:00:00', 'Monday', 0),
(481, 'CVSUKNC085291637', '13:00:00', '13:30:00', 'Monday', 0),
(482, 'CVSUKNC085291637', '13:30:00', '14:00:00', 'Monday', 0),
(483, 'CVSUKNC085291637', '14:00:00', '14:30:00', 'Monday', 0),
(484, 'CVSUKNC085291637', '14:30:00', '15:00:00', 'Monday', 0),
(485, 'CVSUKNC085291637', '15:00:00', '15:30:00', 'Monday', 0),
(486, 'CVSUKNC085291637', '15:30:00', '16:00:00', 'Monday', 0),
(487, 'CVSUKNC085291637', '16:00:00', '16:30:00', 'Monday', 0),
(488, 'CVSUKNC085291637', '16:30:00', '17:00:00', 'Monday', 0),
(489, 'CVSUKNC085291637', '17:00:00', '17:30:00', 'Monday', 0),
(490, 'CVSUKNC085291637', '17:30:00', '18:00:00', 'Monday', 0),
(491, 'CVSUKNC085291637', '18:00:00', '18:30:00', 'Monday', 0),
(492, 'CVSUKNC085291637', '18:30:00', '19:00:00', 'Monday', 0),
(493, 'CVSUKNC085291637', '19:00:00', '19:30:00', 'Monday', 0),
(494, 'CVSUKNC085291637', '19:30:00', '20:00:00', 'Monday', 0),
(495, 'CVSUKNC085291637', '07:00:00', '07:30:00', 'Tuesday', 0),
(496, 'CVSUKNC085291637', '07:30:00', '08:00:00', 'Tuesday', 0),
(497, 'CVSUKNC085291637', '08:00:00', '08:30:00', 'Tuesday', 0),
(498, 'CVSUKNC085291637', '08:30:00', '09:00:00', 'Tuesday', 0),
(499, 'CVSUKNC085291637', '09:00:00', '09:30:00', 'Tuesday', 0),
(500, 'CVSUKNC085291637', '09:30:00', '10:00:00', 'Tuesday', 0),
(501, 'CVSUKNC085291637', '10:00:00', '10:30:00', 'Tuesday', 0),
(502, 'CVSUKNC085291637', '10:30:00', '11:00:00', 'Tuesday', 0),
(503, 'CVSUKNC085291637', '11:00:00', '11:30:00', 'Tuesday', 0),
(504, 'CVSUKNC085291637', '11:30:00', '12:00:00', 'Tuesday', 0),
(505, 'CVSUKNC085291637', '12:00:00', '12:30:00', 'Tuesday', 0),
(506, 'CVSUKNC085291637', '12:30:00', '13:00:00', 'Tuesday', 0),
(507, 'CVSUKNC085291637', '13:00:00', '13:30:00', 'Tuesday', 0),
(508, 'CVSUKNC085291637', '13:30:00', '14:00:00', 'Tuesday', 0),
(509, 'CVSUKNC085291637', '14:00:00', '14:30:00', 'Tuesday', 0),
(510, 'CVSUKNC085291637', '14:30:00', '15:00:00', 'Tuesday', 0),
(511, 'CVSUKNC085291637', '15:00:00', '15:30:00', 'Tuesday', 0),
(512, 'CVSUKNC085291637', '15:30:00', '16:00:00', 'Tuesday', 0),
(513, 'CVSUKNC085291637', '16:00:00', '16:30:00', 'Tuesday', 0),
(514, 'CVSUKNC085291637', '16:30:00', '17:00:00', 'Tuesday', 0),
(515, 'CVSUKNC085291637', '17:00:00', '17:30:00', 'Tuesday', 0),
(516, 'CVSUKNC085291637', '17:30:00', '18:00:00', 'Tuesday', 0),
(517, 'CVSUKNC085291637', '18:00:00', '18:30:00', 'Tuesday', 0),
(518, 'CVSUKNC085291637', '18:30:00', '19:00:00', 'Tuesday', 0),
(519, 'CVSUKNC085291637', '19:00:00', '19:30:00', 'Tuesday', 0),
(520, 'CVSUKNC085291637', '19:30:00', '20:00:00', 'Tuesday', 0),
(521, 'CVSUKNC085291637', '07:00:00', '07:30:00', 'Wednesday', 0),
(522, 'CVSUKNC085291637', '07:30:00', '08:00:00', 'Wednesday', 0),
(523, 'CVSUKNC085291637', '08:00:00', '08:30:00', 'Wednesday', 0),
(524, 'CVSUKNC085291637', '08:30:00', '09:00:00', 'Wednesday', 0),
(525, 'CVSUKNC085291637', '09:00:00', '09:30:00', 'Wednesday', 0),
(526, 'CVSUKNC085291637', '09:30:00', '10:00:00', 'Wednesday', 0),
(527, 'CVSUKNC085291637', '10:00:00', '10:30:00', 'Wednesday', 0),
(528, 'CVSUKNC085291637', '10:30:00', '11:00:00', 'Wednesday', 0),
(529, 'CVSUKNC085291637', '11:00:00', '11:30:00', 'Wednesday', 0),
(530, 'CVSUKNC085291637', '11:30:00', '12:00:00', 'Wednesday', 0),
(531, 'CVSUKNC085291637', '12:00:00', '12:30:00', 'Wednesday', 0),
(532, 'CVSUKNC085291637', '12:30:00', '13:00:00', 'Wednesday', 0),
(533, 'CVSUKNC085291637', '13:00:00', '13:30:00', 'Wednesday', 0),
(534, 'CVSUKNC085291637', '13:30:00', '14:00:00', 'Wednesday', 0),
(535, 'CVSUKNC085291637', '14:00:00', '14:30:00', 'Wednesday', 0),
(536, 'CVSUKNC085291637', '14:30:00', '15:00:00', 'Wednesday', 0),
(537, 'CVSUKNC085291637', '15:00:00', '15:30:00', 'Wednesday', 0),
(538, 'CVSUKNC085291637', '15:30:00', '16:00:00', 'Wednesday', 0),
(539, 'CVSUKNC085291637', '16:00:00', '16:30:00', 'Wednesday', 0),
(540, 'CVSUKNC085291637', '16:30:00', '17:00:00', 'Wednesday', 0),
(541, 'CVSUKNC085291637', '17:00:00', '17:30:00', 'Wednesday', 0),
(542, 'CVSUKNC085291637', '17:30:00', '18:00:00', 'Wednesday', 0),
(543, 'CVSUKNC085291637', '18:00:00', '18:30:00', 'Wednesday', 0),
(544, 'CVSUKNC085291637', '18:30:00', '19:00:00', 'Wednesday', 0),
(545, 'CVSUKNC085291637', '19:00:00', '19:30:00', 'Wednesday', 0),
(546, 'CVSUKNC085291637', '19:30:00', '20:00:00', 'Wednesday', 0),
(547, 'CVSUKNC085291637', '07:00:00', '07:30:00', 'Thursday', 0),
(548, 'CVSUKNC085291637', '07:30:00', '08:00:00', 'Thursday', 0),
(549, 'CVSUKNC085291637', '08:00:00', '08:30:00', 'Thursday', 0),
(550, 'CVSUKNC085291637', '08:30:00', '09:00:00', 'Thursday', 0),
(551, 'CVSUKNC085291637', '09:00:00', '09:30:00', 'Thursday', 0),
(552, 'CVSUKNC085291637', '09:30:00', '10:00:00', 'Thursday', 0),
(553, 'CVSUKNC085291637', '10:00:00', '10:30:00', 'Thursday', 0),
(554, 'CVSUKNC085291637', '10:30:00', '11:00:00', 'Thursday', 0),
(555, 'CVSUKNC085291637', '11:00:00', '11:30:00', 'Thursday', 0),
(556, 'CVSUKNC085291637', '11:30:00', '12:00:00', 'Thursday', 0),
(557, 'CVSUKNC085291637', '12:00:00', '12:30:00', 'Thursday', 0),
(558, 'CVSUKNC085291637', '12:30:00', '13:00:00', 'Thursday', 0),
(559, 'CVSUKNC085291637', '13:00:00', '13:30:00', 'Thursday', 0),
(560, 'CVSUKNC085291637', '13:30:00', '14:00:00', 'Thursday', 0),
(561, 'CVSUKNC085291637', '14:00:00', '14:30:00', 'Thursday', 0),
(562, 'CVSUKNC085291637', '14:30:00', '15:00:00', 'Thursday', 0),
(563, 'CVSUKNC085291637', '15:00:00', '15:30:00', 'Thursday', 0),
(564, 'CVSUKNC085291637', '15:30:00', '16:00:00', 'Thursday', 0),
(565, 'CVSUKNC085291637', '16:00:00', '16:30:00', 'Thursday', 0),
(566, 'CVSUKNC085291637', '16:30:00', '17:00:00', 'Thursday', 0),
(567, 'CVSUKNC085291637', '17:00:00', '17:30:00', 'Thursday', 0),
(568, 'CVSUKNC085291637', '17:30:00', '18:00:00', 'Thursday', 0),
(569, 'CVSUKNC085291637', '18:00:00', '18:30:00', 'Thursday', 0),
(570, 'CVSUKNC085291637', '18:30:00', '19:00:00', 'Thursday', 0),
(571, 'CVSUKNC085291637', '19:00:00', '19:30:00', 'Thursday', 0),
(572, 'CVSUKNC085291637', '19:30:00', '20:00:00', 'Thursday', 0),
(573, 'CVSUKNC085291637', '07:00:00', '07:30:00', 'Friday', 0),
(574, 'CVSUKNC085291637', '07:30:00', '08:00:00', 'Friday', 0),
(575, 'CVSUKNC085291637', '08:00:00', '08:30:00', 'Friday', 0),
(576, 'CVSUKNC085291637', '08:30:00', '09:00:00', 'Friday', 0),
(577, 'CVSUKNC085291637', '09:00:00', '09:30:00', 'Friday', 0),
(578, 'CVSUKNC085291637', '09:30:00', '10:00:00', 'Friday', 0),
(579, 'CVSUKNC085291637', '10:00:00', '10:30:00', 'Friday', 0),
(580, 'CVSUKNC085291637', '10:30:00', '11:00:00', 'Friday', 0),
(581, 'CVSUKNC085291637', '11:00:00', '11:30:00', 'Friday', 0),
(582, 'CVSUKNC085291637', '11:30:00', '12:00:00', 'Friday', 0),
(583, 'CVSUKNC085291637', '12:00:00', '12:30:00', 'Friday', 0),
(584, 'CVSUKNC085291637', '12:30:00', '13:00:00', 'Friday', 0),
(585, 'CVSUKNC085291637', '13:00:00', '13:30:00', 'Friday', 0),
(586, 'CVSUKNC085291637', '13:30:00', '14:00:00', 'Friday', 0),
(587, 'CVSUKNC085291637', '14:00:00', '14:30:00', 'Friday', 0),
(588, 'CVSUKNC085291637', '14:30:00', '15:00:00', 'Friday', 0),
(589, 'CVSUKNC085291637', '15:00:00', '15:30:00', 'Friday', 0),
(590, 'CVSUKNC085291637', '15:30:00', '16:00:00', 'Friday', 0),
(591, 'CVSUKNC085291637', '16:00:00', '16:30:00', 'Friday', 0),
(592, 'CVSUKNC085291637', '16:30:00', '17:00:00', 'Friday', 0),
(593, 'CVSUKNC085291637', '17:00:00', '17:30:00', 'Friday', 0),
(594, 'CVSUKNC085291637', '17:30:00', '18:00:00', 'Friday', 0),
(595, 'CVSUKNC085291637', '18:00:00', '18:30:00', 'Friday', 0),
(596, 'CVSUKNC085291637', '18:30:00', '19:00:00', 'Friday', 0),
(597, 'CVSUKNC085291637', '19:00:00', '19:30:00', 'Friday', 0),
(598, 'CVSUKNC085291637', '19:30:00', '20:00:00', 'Friday', 0),
(599, 'CVSUKNC085291637', '07:00:00', '07:30:00', 'Saturday', 0),
(600, 'CVSUKNC085291637', '07:30:00', '08:00:00', 'Saturday', 0),
(601, 'CVSUKNC085291637', '08:00:00', '08:30:00', 'Saturday', 0),
(602, 'CVSUKNC085291637', '08:30:00', '09:00:00', 'Saturday', 0),
(603, 'CVSUKNC085291637', '09:00:00', '09:30:00', 'Saturday', 0),
(604, 'CVSUKNC085291637', '09:30:00', '10:00:00', 'Saturday', 0),
(605, 'CVSUKNC085291637', '10:00:00', '10:30:00', 'Saturday', 0),
(606, 'CVSUKNC085291637', '10:30:00', '11:00:00', 'Saturday', 0),
(607, 'CVSUKNC085291637', '11:00:00', '11:30:00', 'Saturday', 0),
(608, 'CVSUKNC085291637', '11:30:00', '12:00:00', 'Saturday', 0),
(609, 'CVSUKNC085291637', '12:00:00', '12:30:00', 'Saturday', 0),
(610, 'CVSUKNC085291637', '12:30:00', '13:00:00', 'Saturday', 0),
(611, 'CVSUKNC085291637', '13:00:00', '13:30:00', 'Saturday', 0),
(612, 'CVSUKNC085291637', '13:30:00', '14:00:00', 'Saturday', 0),
(613, 'CVSUKNC085291637', '14:00:00', '14:30:00', 'Saturday', 0),
(614, 'CVSUKNC085291637', '14:30:00', '15:00:00', 'Saturday', 0),
(615, 'CVSUKNC085291637', '15:00:00', '15:30:00', 'Saturday', 0),
(616, 'CVSUKNC085291637', '15:30:00', '16:00:00', 'Saturday', 0),
(617, 'CVSUKNC085291637', '16:00:00', '16:30:00', 'Saturday', 0),
(618, 'CVSUKNC085291637', '16:30:00', '17:00:00', 'Saturday', 0),
(619, 'CVSUKNC085291637', '17:00:00', '17:30:00', 'Saturday', 0),
(620, 'CVSUKNC085291637', '17:30:00', '18:00:00', 'Saturday', 0),
(621, 'CVSUKNC085291637', '18:00:00', '18:30:00', 'Saturday', 0),
(622, 'CVSUKNC085291637', '18:30:00', '19:00:00', 'Saturday', 0),
(623, 'CVSUKNC085291637', '19:00:00', '19:30:00', 'Saturday', 0),
(624, 'CVSUKNC085291637', '19:30:00', '20:00:00', 'Saturday', 0),
(625, 'CVSUEJT052613497', '07:00:00', '07:30:00', 'Monday', 0),
(626, 'CVSUEJT052613497', '07:30:00', '08:00:00', 'Monday', 0),
(627, 'CVSUEJT052613497', '08:00:00', '08:30:00', 'Monday', 0),
(628, 'CVSUEJT052613497', '08:30:00', '09:00:00', 'Monday', 0),
(629, 'CVSUEJT052613497', '09:00:00', '09:30:00', 'Monday', 0),
(630, 'CVSUEJT052613497', '09:30:00', '10:00:00', 'Monday', 0),
(631, 'CVSUEJT052613497', '10:00:00', '10:30:00', 'Monday', 0),
(632, 'CVSUEJT052613497', '10:30:00', '11:00:00', 'Monday', 0),
(633, 'CVSUEJT052613497', '11:00:00', '11:30:00', 'Monday', 0),
(634, 'CVSUEJT052613497', '11:30:00', '12:00:00', 'Monday', 0),
(635, 'CVSUEJT052613497', '12:00:00', '12:30:00', 'Monday', 0),
(636, 'CVSUEJT052613497', '12:30:00', '13:00:00', 'Monday', 0),
(637, 'CVSUEJT052613497', '13:00:00', '13:30:00', 'Monday', 0),
(638, 'CVSUEJT052613497', '13:30:00', '14:00:00', 'Monday', 0),
(639, 'CVSUEJT052613497', '14:00:00', '14:30:00', 'Monday', 0),
(640, 'CVSUEJT052613497', '14:30:00', '15:00:00', 'Monday', 0),
(641, 'CVSUEJT052613497', '15:00:00', '15:30:00', 'Monday', 0),
(642, 'CVSUEJT052613497', '15:30:00', '16:00:00', 'Monday', 0),
(643, 'CVSUEJT052613497', '16:00:00', '16:30:00', 'Monday', 0),
(644, 'CVSUEJT052613497', '16:30:00', '17:00:00', 'Monday', 0),
(645, 'CVSUEJT052613497', '17:00:00', '17:30:00', 'Monday', 0),
(646, 'CVSUEJT052613497', '17:30:00', '18:00:00', 'Monday', 0),
(647, 'CVSUEJT052613497', '18:00:00', '18:30:00', 'Monday', 0),
(648, 'CVSUEJT052613497', '18:30:00', '19:00:00', 'Monday', 0),
(649, 'CVSUEJT052613497', '19:00:00', '19:30:00', 'Monday', 0),
(650, 'CVSUEJT052613497', '19:30:00', '20:00:00', 'Monday', 0),
(651, 'CVSUEJT052613497', '07:00:00', '07:30:00', 'Tuesday', 0),
(652, 'CVSUEJT052613497', '07:30:00', '08:00:00', 'Tuesday', 0),
(653, 'CVSUEJT052613497', '08:00:00', '08:30:00', 'Tuesday', 0),
(654, 'CVSUEJT052613497', '08:30:00', '09:00:00', 'Tuesday', 0),
(655, 'CVSUEJT052613497', '09:00:00', '09:30:00', 'Tuesday', 0),
(656, 'CVSUEJT052613497', '09:30:00', '10:00:00', 'Tuesday', 0),
(657, 'CVSUEJT052613497', '10:00:00', '10:30:00', 'Tuesday', 0),
(658, 'CVSUEJT052613497', '10:30:00', '11:00:00', 'Tuesday', 0),
(659, 'CVSUEJT052613497', '11:00:00', '11:30:00', 'Tuesday', 0),
(660, 'CVSUEJT052613497', '11:30:00', '12:00:00', 'Tuesday', 0),
(661, 'CVSUEJT052613497', '12:00:00', '12:30:00', 'Tuesday', 0),
(662, 'CVSUEJT052613497', '12:30:00', '13:00:00', 'Tuesday', 0),
(663, 'CVSUEJT052613497', '13:00:00', '13:30:00', 'Tuesday', 0),
(664, 'CVSUEJT052613497', '13:30:00', '14:00:00', 'Tuesday', 0),
(665, 'CVSUEJT052613497', '14:00:00', '14:30:00', 'Tuesday', 0),
(666, 'CVSUEJT052613497', '14:30:00', '15:00:00', 'Tuesday', 0),
(667, 'CVSUEJT052613497', '15:00:00', '15:30:00', 'Tuesday', 0),
(668, 'CVSUEJT052613497', '15:30:00', '16:00:00', 'Tuesday', 0),
(669, 'CVSUEJT052613497', '16:00:00', '16:30:00', 'Tuesday', 0),
(670, 'CVSUEJT052613497', '16:30:00', '17:00:00', 'Tuesday', 0),
(671, 'CVSUEJT052613497', '17:00:00', '17:30:00', 'Tuesday', 0),
(672, 'CVSUEJT052613497', '17:30:00', '18:00:00', 'Tuesday', 0),
(673, 'CVSUEJT052613497', '18:00:00', '18:30:00', 'Tuesday', 0),
(674, 'CVSUEJT052613497', '18:30:00', '19:00:00', 'Tuesday', 0),
(675, 'CVSUEJT052613497', '19:00:00', '19:30:00', 'Tuesday', 0),
(676, 'CVSUEJT052613497', '19:30:00', '20:00:00', 'Tuesday', 0),
(677, 'CVSUEJT052613497', '07:00:00', '07:30:00', 'Wednesday', 0),
(678, 'CVSUEJT052613497', '07:30:00', '08:00:00', 'Wednesday', 0),
(679, 'CVSUEJT052613497', '08:00:00', '08:30:00', 'Wednesday', 0),
(680, 'CVSUEJT052613497', '08:30:00', '09:00:00', 'Wednesday', 0),
(681, 'CVSUEJT052613497', '09:00:00', '09:30:00', 'Wednesday', 0),
(682, 'CVSUEJT052613497', '09:30:00', '10:00:00', 'Wednesday', 0),
(683, 'CVSUEJT052613497', '10:00:00', '10:30:00', 'Wednesday', 0),
(684, 'CVSUEJT052613497', '10:30:00', '11:00:00', 'Wednesday', 0),
(685, 'CVSUEJT052613497', '11:00:00', '11:30:00', 'Wednesday', 0),
(686, 'CVSUEJT052613497', '11:30:00', '12:00:00', 'Wednesday', 0),
(687, 'CVSUEJT052613497', '12:00:00', '12:30:00', 'Wednesday', 0),
(688, 'CVSUEJT052613497', '12:30:00', '13:00:00', 'Wednesday', 0),
(689, 'CVSUEJT052613497', '13:00:00', '13:30:00', 'Wednesday', 0),
(690, 'CVSUEJT052613497', '13:30:00', '14:00:00', 'Wednesday', 0),
(691, 'CVSUEJT052613497', '14:00:00', '14:30:00', 'Wednesday', 0),
(692, 'CVSUEJT052613497', '14:30:00', '15:00:00', 'Wednesday', 0),
(693, 'CVSUEJT052613497', '15:00:00', '15:30:00', 'Wednesday', 0),
(694, 'CVSUEJT052613497', '15:30:00', '16:00:00', 'Wednesday', 0),
(695, 'CVSUEJT052613497', '16:00:00', '16:30:00', 'Wednesday', 0),
(696, 'CVSUEJT052613497', '16:30:00', '17:00:00', 'Wednesday', 0),
(697, 'CVSUEJT052613497', '17:00:00', '17:30:00', 'Wednesday', 0),
(698, 'CVSUEJT052613497', '17:30:00', '18:00:00', 'Wednesday', 0),
(699, 'CVSUEJT052613497', '18:00:00', '18:30:00', 'Wednesday', 0),
(700, 'CVSUEJT052613497', '18:30:00', '19:00:00', 'Wednesday', 0),
(701, 'CVSUEJT052613497', '19:00:00', '19:30:00', 'Wednesday', 0),
(702, 'CVSUEJT052613497', '19:30:00', '20:00:00', 'Wednesday', 0),
(703, 'CVSUEJT052613497', '07:00:00', '07:30:00', 'Thursday', 0),
(704, 'CVSUEJT052613497', '07:30:00', '08:00:00', 'Thursday', 0),
(705, 'CVSUEJT052613497', '08:00:00', '08:30:00', 'Thursday', 0),
(706, 'CVSUEJT052613497', '08:30:00', '09:00:00', 'Thursday', 0),
(707, 'CVSUEJT052613497', '09:00:00', '09:30:00', 'Thursday', 0),
(708, 'CVSUEJT052613497', '09:30:00', '10:00:00', 'Thursday', 0),
(709, 'CVSUEJT052613497', '10:00:00', '10:30:00', 'Thursday', 0),
(710, 'CVSUEJT052613497', '10:30:00', '11:00:00', 'Thursday', 0),
(711, 'CVSUEJT052613497', '11:00:00', '11:30:00', 'Thursday', 0),
(712, 'CVSUEJT052613497', '11:30:00', '12:00:00', 'Thursday', 0),
(713, 'CVSUEJT052613497', '12:00:00', '12:30:00', 'Thursday', 0),
(714, 'CVSUEJT052613497', '12:30:00', '13:00:00', 'Thursday', 0),
(715, 'CVSUEJT052613497', '13:00:00', '13:30:00', 'Thursday', 0),
(716, 'CVSUEJT052613497', '13:30:00', '14:00:00', 'Thursday', 0),
(717, 'CVSUEJT052613497', '14:00:00', '14:30:00', 'Thursday', 0),
(718, 'CVSUEJT052613497', '14:30:00', '15:00:00', 'Thursday', 0),
(719, 'CVSUEJT052613497', '15:00:00', '15:30:00', 'Thursday', 0),
(720, 'CVSUEJT052613497', '15:30:00', '16:00:00', 'Thursday', 0),
(721, 'CVSUEJT052613497', '16:00:00', '16:30:00', 'Thursday', 0),
(722, 'CVSUEJT052613497', '16:30:00', '17:00:00', 'Thursday', 0),
(723, 'CVSUEJT052613497', '17:00:00', '17:30:00', 'Thursday', 0),
(724, 'CVSUEJT052613497', '17:30:00', '18:00:00', 'Thursday', 0),
(725, 'CVSUEJT052613497', '18:00:00', '18:30:00', 'Thursday', 0),
(726, 'CVSUEJT052613497', '18:30:00', '19:00:00', 'Thursday', 0),
(727, 'CVSUEJT052613497', '19:00:00', '19:30:00', 'Thursday', 0),
(728, 'CVSUEJT052613497', '19:30:00', '20:00:00', 'Thursday', 0),
(729, 'CVSUEJT052613497', '07:00:00', '07:30:00', 'Friday', 0),
(730, 'CVSUEJT052613497', '07:30:00', '08:00:00', 'Friday', 0),
(731, 'CVSUEJT052613497', '08:00:00', '08:30:00', 'Friday', 0),
(732, 'CVSUEJT052613497', '08:30:00', '09:00:00', 'Friday', 0),
(733, 'CVSUEJT052613497', '09:00:00', '09:30:00', 'Friday', 0),
(734, 'CVSUEJT052613497', '09:30:00', '10:00:00', 'Friday', 0),
(735, 'CVSUEJT052613497', '10:00:00', '10:30:00', 'Friday', 0),
(736, 'CVSUEJT052613497', '10:30:00', '11:00:00', 'Friday', 0),
(737, 'CVSUEJT052613497', '11:00:00', '11:30:00', 'Friday', 0),
(738, 'CVSUEJT052613497', '11:30:00', '12:00:00', 'Friday', 0),
(739, 'CVSUEJT052613497', '12:00:00', '12:30:00', 'Friday', 0),
(740, 'CVSUEJT052613497', '12:30:00', '13:00:00', 'Friday', 0),
(741, 'CVSUEJT052613497', '13:00:00', '13:30:00', 'Friday', 0),
(742, 'CVSUEJT052613497', '13:30:00', '14:00:00', 'Friday', 0),
(743, 'CVSUEJT052613497', '14:00:00', '14:30:00', 'Friday', 0),
(744, 'CVSUEJT052613497', '14:30:00', '15:00:00', 'Friday', 0),
(745, 'CVSUEJT052613497', '15:00:00', '15:30:00', 'Friday', 0),
(746, 'CVSUEJT052613497', '15:30:00', '16:00:00', 'Friday', 0),
(747, 'CVSUEJT052613497', '16:00:00', '16:30:00', 'Friday', 0),
(748, 'CVSUEJT052613497', '16:30:00', '17:00:00', 'Friday', 0),
(749, 'CVSUEJT052613497', '17:00:00', '17:30:00', 'Friday', 0),
(750, 'CVSUEJT052613497', '17:30:00', '18:00:00', 'Friday', 0),
(751, 'CVSUEJT052613497', '18:00:00', '18:30:00', 'Friday', 0),
(752, 'CVSUEJT052613497', '18:30:00', '19:00:00', 'Friday', 0),
(753, 'CVSUEJT052613497', '19:00:00', '19:30:00', 'Friday', 0),
(754, 'CVSUEJT052613497', '19:30:00', '20:00:00', 'Friday', 0),
(755, 'CVSUEJT052613497', '07:00:00', '07:30:00', 'Saturday', 0),
(756, 'CVSUEJT052613497', '07:30:00', '08:00:00', 'Saturday', 0),
(757, 'CVSUEJT052613497', '08:00:00', '08:30:00', 'Saturday', 0),
(758, 'CVSUEJT052613497', '08:30:00', '09:00:00', 'Saturday', 0),
(759, 'CVSUEJT052613497', '09:00:00', '09:30:00', 'Saturday', 0),
(760, 'CVSUEJT052613497', '09:30:00', '10:00:00', 'Saturday', 0),
(761, 'CVSUEJT052613497', '10:00:00', '10:30:00', 'Saturday', 0),
(762, 'CVSUEJT052613497', '10:30:00', '11:00:00', 'Saturday', 0),
(763, 'CVSUEJT052613497', '11:00:00', '11:30:00', 'Saturday', 0),
(764, 'CVSUEJT052613497', '11:30:00', '12:00:00', 'Saturday', 0),
(765, 'CVSUEJT052613497', '12:00:00', '12:30:00', 'Saturday', 0),
(766, 'CVSUEJT052613497', '12:30:00', '13:00:00', 'Saturday', 0),
(767, 'CVSUEJT052613497', '13:00:00', '13:30:00', 'Saturday', 0),
(768, 'CVSUEJT052613497', '13:30:00', '14:00:00', 'Saturday', 0),
(769, 'CVSUEJT052613497', '14:00:00', '14:30:00', 'Saturday', 0),
(770, 'CVSUEJT052613497', '14:30:00', '15:00:00', 'Saturday', 0),
(771, 'CVSUEJT052613497', '15:00:00', '15:30:00', 'Saturday', 0),
(772, 'CVSUEJT052613497', '15:30:00', '16:00:00', 'Saturday', 0),
(773, 'CVSUEJT052613497', '16:00:00', '16:30:00', 'Saturday', 0),
(774, 'CVSUEJT052613497', '16:30:00', '17:00:00', 'Saturday', 0),
(775, 'CVSUEJT052613497', '17:00:00', '17:30:00', 'Saturday', 0),
(776, 'CVSUEJT052613497', '17:30:00', '18:00:00', 'Saturday', 0),
(777, 'CVSUEJT052613497', '18:00:00', '18:30:00', 'Saturday', 0),
(778, 'CVSUEJT052613497', '18:30:00', '19:00:00', 'Saturday', 0),
(779, 'CVSUEJT052613497', '19:00:00', '19:30:00', 'Saturday', 0),
(780, 'CVSUEJT052613497', '19:30:00', '20:00:00', 'Saturday', 0),
(781, 'CVSUHFE671280435', '07:00:00', '07:30:00', 'Monday', 0),
(782, 'CVSUHFE671280435', '07:30:00', '08:00:00', 'Monday', 0),
(783, 'CVSUHFE671280435', '08:00:00', '08:30:00', 'Monday', 0),
(784, 'CVSUHFE671280435', '08:30:00', '09:00:00', 'Monday', 0),
(785, 'CVSUHFE671280435', '09:00:00', '09:30:00', 'Monday', 0),
(786, 'CVSUHFE671280435', '09:30:00', '10:00:00', 'Monday', 0),
(787, 'CVSUHFE671280435', '10:00:00', '10:30:00', 'Monday', 0),
(788, 'CVSUHFE671280435', '10:30:00', '11:00:00', 'Monday', 0),
(789, 'CVSUHFE671280435', '11:00:00', '11:30:00', 'Monday', 0);
INSERT INTO `schedules` (`id`, `employee_id`, `time_in`, `time_out`, `day`, `isCheck`) VALUES
(790, 'CVSUHFE671280435', '11:30:00', '12:00:00', 'Monday', 0),
(791, 'CVSUHFE671280435', '12:00:00', '12:30:00', 'Monday', 0),
(792, 'CVSUHFE671280435', '12:30:00', '13:00:00', 'Monday', 0),
(793, 'CVSUHFE671280435', '13:00:00', '13:30:00', 'Monday', 0),
(794, 'CVSUHFE671280435', '13:30:00', '14:00:00', 'Monday', 0),
(795, 'CVSUHFE671280435', '14:00:00', '14:30:00', 'Monday', 0),
(796, 'CVSUHFE671280435', '14:30:00', '15:00:00', 'Monday', 0),
(797, 'CVSUHFE671280435', '15:00:00', '15:30:00', 'Monday', 0),
(798, 'CVSUHFE671280435', '15:30:00', '16:00:00', 'Monday', 0),
(799, 'CVSUHFE671280435', '16:00:00', '16:30:00', 'Monday', 0),
(800, 'CVSUHFE671280435', '16:30:00', '17:00:00', 'Monday', 0),
(801, 'CVSUHFE671280435', '17:00:00', '17:30:00', 'Monday', 0),
(802, 'CVSUHFE671280435', '17:30:00', '18:00:00', 'Monday', 0),
(803, 'CVSUHFE671280435', '18:00:00', '18:30:00', 'Monday', 0),
(804, 'CVSUHFE671280435', '18:30:00', '19:00:00', 'Monday', 0),
(805, 'CVSUHFE671280435', '19:00:00', '19:30:00', 'Monday', 0),
(806, 'CVSUHFE671280435', '19:30:00', '20:00:00', 'Monday', 0),
(807, 'CVSUHFE671280435', '07:00:00', '07:30:00', 'Tuesday', 0),
(808, 'CVSUHFE671280435', '07:30:00', '08:00:00', 'Tuesday', 0),
(809, 'CVSUHFE671280435', '08:00:00', '08:30:00', 'Tuesday', 0),
(810, 'CVSUHFE671280435', '08:30:00', '09:00:00', 'Tuesday', 0),
(811, 'CVSUHFE671280435', '09:00:00', '09:30:00', 'Tuesday', 0),
(812, 'CVSUHFE671280435', '09:30:00', '10:00:00', 'Tuesday', 0),
(813, 'CVSUHFE671280435', '10:00:00', '10:30:00', 'Tuesday', 0),
(814, 'CVSUHFE671280435', '10:30:00', '11:00:00', 'Tuesday', 0),
(815, 'CVSUHFE671280435', '11:00:00', '11:30:00', 'Tuesday', 0),
(816, 'CVSUHFE671280435', '11:30:00', '12:00:00', 'Tuesday', 0),
(817, 'CVSUHFE671280435', '12:00:00', '12:30:00', 'Tuesday', 0),
(818, 'CVSUHFE671280435', '12:30:00', '13:00:00', 'Tuesday', 0),
(819, 'CVSUHFE671280435', '13:00:00', '13:30:00', 'Tuesday', 0),
(820, 'CVSUHFE671280435', '13:30:00', '14:00:00', 'Tuesday', 0),
(821, 'CVSUHFE671280435', '14:00:00', '14:30:00', 'Tuesday', 0),
(822, 'CVSUHFE671280435', '14:30:00', '15:00:00', 'Tuesday', 0),
(823, 'CVSUHFE671280435', '15:00:00', '15:30:00', 'Tuesday', 0),
(824, 'CVSUHFE671280435', '15:30:00', '16:00:00', 'Tuesday', 0),
(825, 'CVSUHFE671280435', '16:00:00', '16:30:00', 'Tuesday', 0),
(826, 'CVSUHFE671280435', '16:30:00', '17:00:00', 'Tuesday', 0),
(827, 'CVSUHFE671280435', '17:00:00', '17:30:00', 'Tuesday', 0),
(828, 'CVSUHFE671280435', '17:30:00', '18:00:00', 'Tuesday', 0),
(829, 'CVSUHFE671280435', '18:00:00', '18:30:00', 'Tuesday', 0),
(830, 'CVSUHFE671280435', '18:30:00', '19:00:00', 'Tuesday', 0),
(831, 'CVSUHFE671280435', '19:00:00', '19:30:00', 'Tuesday', 0),
(832, 'CVSUHFE671280435', '19:30:00', '20:00:00', 'Tuesday', 0),
(833, 'CVSUHFE671280435', '07:00:00', '07:30:00', 'Wednesday', 0),
(834, 'CVSUHFE671280435', '07:30:00', '08:00:00', 'Wednesday', 0),
(835, 'CVSUHFE671280435', '08:00:00', '08:30:00', 'Wednesday', 0),
(836, 'CVSUHFE671280435', '08:30:00', '09:00:00', 'Wednesday', 0),
(837, 'CVSUHFE671280435', '09:00:00', '09:30:00', 'Wednesday', 0),
(838, 'CVSUHFE671280435', '09:30:00', '10:00:00', 'Wednesday', 0),
(839, 'CVSUHFE671280435', '10:00:00', '10:30:00', 'Wednesday', 0),
(840, 'CVSUHFE671280435', '10:30:00', '11:00:00', 'Wednesday', 0),
(841, 'CVSUHFE671280435', '11:00:00', '11:30:00', 'Wednesday', 0),
(842, 'CVSUHFE671280435', '11:30:00', '12:00:00', 'Wednesday', 0),
(843, 'CVSUHFE671280435', '12:00:00', '12:30:00', 'Wednesday', 0),
(844, 'CVSUHFE671280435', '12:30:00', '13:00:00', 'Wednesday', 0),
(845, 'CVSUHFE671280435', '13:00:00', '13:30:00', 'Wednesday', 0),
(846, 'CVSUHFE671280435', '13:30:00', '14:00:00', 'Wednesday', 0),
(847, 'CVSUHFE671280435', '14:00:00', '14:30:00', 'Wednesday', 0),
(848, 'CVSUHFE671280435', '14:30:00', '15:00:00', 'Wednesday', 0),
(849, 'CVSUHFE671280435', '15:00:00', '15:30:00', 'Wednesday', 0),
(850, 'CVSUHFE671280435', '15:30:00', '16:00:00', 'Wednesday', 0),
(851, 'CVSUHFE671280435', '16:00:00', '16:30:00', 'Wednesday', 0),
(852, 'CVSUHFE671280435', '16:30:00', '17:00:00', 'Wednesday', 0),
(853, 'CVSUHFE671280435', '17:00:00', '17:30:00', 'Wednesday', 0),
(854, 'CVSUHFE671280435', '17:30:00', '18:00:00', 'Wednesday', 0),
(855, 'CVSUHFE671280435', '18:00:00', '18:30:00', 'Wednesday', 0),
(856, 'CVSUHFE671280435', '18:30:00', '19:00:00', 'Wednesday', 0),
(857, 'CVSUHFE671280435', '19:00:00', '19:30:00', 'Wednesday', 0),
(858, 'CVSUHFE671280435', '19:30:00', '20:00:00', 'Wednesday', 0),
(859, 'CVSUHFE671280435', '07:00:00', '07:30:00', 'Thursday', 0),
(860, 'CVSUHFE671280435', '07:30:00', '08:00:00', 'Thursday', 0),
(861, 'CVSUHFE671280435', '08:00:00', '08:30:00', 'Thursday', 0),
(862, 'CVSUHFE671280435', '08:30:00', '09:00:00', 'Thursday', 0),
(863, 'CVSUHFE671280435', '09:00:00', '09:30:00', 'Thursday', 0),
(864, 'CVSUHFE671280435', '09:30:00', '10:00:00', 'Thursday', 0),
(865, 'CVSUHFE671280435', '10:00:00', '10:30:00', 'Thursday', 0),
(866, 'CVSUHFE671280435', '10:30:00', '11:00:00', 'Thursday', 0),
(867, 'CVSUHFE671280435', '11:00:00', '11:30:00', 'Thursday', 0),
(868, 'CVSUHFE671280435', '11:30:00', '12:00:00', 'Thursday', 0),
(869, 'CVSUHFE671280435', '12:00:00', '12:30:00', 'Thursday', 0),
(870, 'CVSUHFE671280435', '12:30:00', '13:00:00', 'Thursday', 0),
(871, 'CVSUHFE671280435', '13:00:00', '13:30:00', 'Thursday', 0),
(872, 'CVSUHFE671280435', '13:30:00', '14:00:00', 'Thursday', 0),
(873, 'CVSUHFE671280435', '14:00:00', '14:30:00', 'Thursday', 0),
(874, 'CVSUHFE671280435', '14:30:00', '15:00:00', 'Thursday', 0),
(875, 'CVSUHFE671280435', '15:00:00', '15:30:00', 'Thursday', 0),
(876, 'CVSUHFE671280435', '15:30:00', '16:00:00', 'Thursday', 0),
(877, 'CVSUHFE671280435', '16:00:00', '16:30:00', 'Thursday', 0),
(878, 'CVSUHFE671280435', '16:30:00', '17:00:00', 'Thursday', 0),
(879, 'CVSUHFE671280435', '17:00:00', '17:30:00', 'Thursday', 0),
(880, 'CVSUHFE671280435', '17:30:00', '18:00:00', 'Thursday', 0),
(881, 'CVSUHFE671280435', '18:00:00', '18:30:00', 'Thursday', 0),
(882, 'CVSUHFE671280435', '18:30:00', '19:00:00', 'Thursday', 0),
(883, 'CVSUHFE671280435', '19:00:00', '19:30:00', 'Thursday', 0),
(884, 'CVSUHFE671280435', '19:30:00', '20:00:00', 'Thursday', 0),
(885, 'CVSUHFE671280435', '07:00:00', '07:30:00', 'Friday', 0),
(886, 'CVSUHFE671280435', '07:30:00', '08:00:00', 'Friday', 0),
(887, 'CVSUHFE671280435', '08:00:00', '08:30:00', 'Friday', 0),
(888, 'CVSUHFE671280435', '08:30:00', '09:00:00', 'Friday', 0),
(889, 'CVSUHFE671280435', '09:00:00', '09:30:00', 'Friday', 0),
(890, 'CVSUHFE671280435', '09:30:00', '10:00:00', 'Friday', 0),
(891, 'CVSUHFE671280435', '10:00:00', '10:30:00', 'Friday', 0),
(892, 'CVSUHFE671280435', '10:30:00', '11:00:00', 'Friday', 0),
(893, 'CVSUHFE671280435', '11:00:00', '11:30:00', 'Friday', 0),
(894, 'CVSUHFE671280435', '11:30:00', '12:00:00', 'Friday', 0),
(895, 'CVSUHFE671280435', '12:00:00', '12:30:00', 'Friday', 0),
(896, 'CVSUHFE671280435', '12:30:00', '13:00:00', 'Friday', 0),
(897, 'CVSUHFE671280435', '13:00:00', '13:30:00', 'Friday', 0),
(898, 'CVSUHFE671280435', '13:30:00', '14:00:00', 'Friday', 0),
(899, 'CVSUHFE671280435', '14:00:00', '14:30:00', 'Friday', 0),
(900, 'CVSUHFE671280435', '14:30:00', '15:00:00', 'Friday', 0),
(901, 'CVSUHFE671280435', '15:00:00', '15:30:00', 'Friday', 0),
(902, 'CVSUHFE671280435', '15:30:00', '16:00:00', 'Friday', 0),
(903, 'CVSUHFE671280435', '16:00:00', '16:30:00', 'Friday', 0),
(904, 'CVSUHFE671280435', '16:30:00', '17:00:00', 'Friday', 0),
(905, 'CVSUHFE671280435', '17:00:00', '17:30:00', 'Friday', 0),
(906, 'CVSUHFE671280435', '17:30:00', '18:00:00', 'Friday', 0),
(907, 'CVSUHFE671280435', '18:00:00', '18:30:00', 'Friday', 0),
(908, 'CVSUHFE671280435', '18:30:00', '19:00:00', 'Friday', 0),
(909, 'CVSUHFE671280435', '19:00:00', '19:30:00', 'Friday', 0),
(910, 'CVSUHFE671280435', '19:30:00', '20:00:00', 'Friday', 0),
(911, 'CVSUHFE671280435', '07:00:00', '07:30:00', 'Saturday', 0),
(912, 'CVSUHFE671280435', '07:30:00', '08:00:00', 'Saturday', 0),
(913, 'CVSUHFE671280435', '08:00:00', '08:30:00', 'Saturday', 0),
(914, 'CVSUHFE671280435', '08:30:00', '09:00:00', 'Saturday', 0),
(915, 'CVSUHFE671280435', '09:00:00', '09:30:00', 'Saturday', 0),
(916, 'CVSUHFE671280435', '09:30:00', '10:00:00', 'Saturday', 0),
(917, 'CVSUHFE671280435', '10:00:00', '10:30:00', 'Saturday', 0),
(918, 'CVSUHFE671280435', '10:30:00', '11:00:00', 'Saturday', 0),
(919, 'CVSUHFE671280435', '11:00:00', '11:30:00', 'Saturday', 0),
(920, 'CVSUHFE671280435', '11:30:00', '12:00:00', 'Saturday', 0),
(921, 'CVSUHFE671280435', '12:00:00', '12:30:00', 'Saturday', 0),
(922, 'CVSUHFE671280435', '12:30:00', '13:00:00', 'Saturday', 0),
(923, 'CVSUHFE671280435', '13:00:00', '13:30:00', 'Saturday', 0),
(924, 'CVSUHFE671280435', '13:30:00', '14:00:00', 'Saturday', 0),
(925, 'CVSUHFE671280435', '14:00:00', '14:30:00', 'Saturday', 0),
(926, 'CVSUHFE671280435', '14:30:00', '15:00:00', 'Saturday', 0),
(927, 'CVSUHFE671280435', '15:00:00', '15:30:00', 'Saturday', 0),
(928, 'CVSUHFE671280435', '15:30:00', '16:00:00', 'Saturday', 0),
(929, 'CVSUHFE671280435', '16:00:00', '16:30:00', 'Saturday', 0),
(930, 'CVSUHFE671280435', '16:30:00', '17:00:00', 'Saturday', 0),
(931, 'CVSUHFE671280435', '17:00:00', '17:30:00', 'Saturday', 0),
(932, 'CVSUHFE671280435', '17:30:00', '18:00:00', 'Saturday', 0),
(933, 'CVSUHFE671280435', '18:00:00', '18:30:00', 'Saturday', 0),
(934, 'CVSUHFE671280435', '18:30:00', '19:00:00', 'Saturday', 0),
(935, 'CVSUHFE671280435', '19:00:00', '19:30:00', 'Saturday', 0),
(936, 'CVSUHFE671280435', '19:30:00', '20:00:00', 'Saturday', 0),
(937, 'CVSUJAH1296478307907', '07:00:00', '07:30:00', 'Monday', 0),
(938, 'CVSUJAH1296478307907', '07:30:00', '08:00:00', 'Monday', 0),
(939, 'CVSUJAH1296478307907', '08:00:00', '08:30:00', 'Monday', 0),
(940, 'CVSUJAH1296478307907', '08:30:00', '09:00:00', 'Monday', 0),
(941, 'CVSUJAH1296478307907', '09:00:00', '09:30:00', 'Monday', 0),
(942, 'CVSUJAH1296478307907', '09:30:00', '10:00:00', 'Monday', 0),
(943, 'CVSUJAH1296478307907', '10:00:00', '10:30:00', 'Monday', 0),
(944, 'CVSUJAH1296478307907', '10:30:00', '11:00:00', 'Monday', 0),
(945, 'CVSUJAH1296478307907', '11:00:00', '11:30:00', 'Monday', 0),
(946, 'CVSUJAH1296478307907', '11:30:00', '12:00:00', 'Monday', 0),
(947, 'CVSUJAH1296478307907', '12:00:00', '12:30:00', 'Monday', 0),
(948, 'CVSUJAH1296478307907', '12:30:00', '13:00:00', 'Monday', 0),
(949, 'CVSUJAH1296478307907', '13:00:00', '13:30:00', 'Monday', 0),
(950, 'CVSUJAH1296478307907', '13:30:00', '14:00:00', 'Monday', 0),
(951, 'CVSUJAH1296478307907', '14:00:00', '14:30:00', 'Monday', 0),
(952, 'CVSUJAH1296478307907', '14:30:00', '15:00:00', 'Monday', 0),
(953, 'CVSUJAH1296478307907', '15:00:00', '15:30:00', 'Monday', 0),
(954, 'CVSUJAH1296478307907', '15:30:00', '16:00:00', 'Monday', 0),
(955, 'CVSUJAH1296478307907', '16:00:00', '16:30:00', 'Monday', 0),
(956, 'CVSUJAH1296478307907', '16:30:00', '17:00:00', 'Monday', 0),
(957, 'CVSUJAH1296478307907', '17:00:00', '17:30:00', 'Monday', 0),
(958, 'CVSUJAH1296478307907', '17:30:00', '18:00:00', 'Monday', 0),
(959, 'CVSUJAH1296478307907', '18:00:00', '18:30:00', 'Monday', 0),
(960, 'CVSUJAH1296478307907', '18:30:00', '19:00:00', 'Monday', 0),
(961, 'CVSUJAH1296478307907', '19:00:00', '19:30:00', 'Monday', 0),
(962, 'CVSUJAH1296478307907', '19:30:00', '20:00:00', 'Monday', 0),
(963, 'CVSUJAH1296478307907', '07:00:00', '07:30:00', 'Tuesday', 0),
(964, 'CVSUJAH1296478307907', '07:30:00', '08:00:00', 'Tuesday', 0),
(965, 'CVSUJAH1296478307907', '08:00:00', '08:30:00', 'Tuesday', 0),
(966, 'CVSUJAH1296478307907', '08:30:00', '09:00:00', 'Tuesday', 0),
(967, 'CVSUJAH1296478307907', '09:00:00', '09:30:00', 'Tuesday', 0),
(968, 'CVSUJAH1296478307907', '09:30:00', '10:00:00', 'Tuesday', 0),
(969, 'CVSUJAH1296478307907', '10:00:00', '10:30:00', 'Tuesday', 0),
(970, 'CVSUJAH1296478307907', '10:30:00', '11:00:00', 'Tuesday', 0),
(971, 'CVSUJAH1296478307907', '11:00:00', '11:30:00', 'Tuesday', 0),
(972, 'CVSUJAH1296478307907', '11:30:00', '12:00:00', 'Tuesday', 0),
(973, 'CVSUJAH1296478307907', '12:00:00', '12:30:00', 'Tuesday', 0),
(974, 'CVSUJAH1296478307907', '12:30:00', '13:00:00', 'Tuesday', 0),
(975, 'CVSUJAH1296478307907', '13:00:00', '13:30:00', 'Tuesday', 0),
(976, 'CVSUJAH1296478307907', '13:30:00', '14:00:00', 'Tuesday', 0),
(977, 'CVSUJAH1296478307907', '14:00:00', '14:30:00', 'Tuesday', 0),
(978, 'CVSUJAH1296478307907', '14:30:00', '15:00:00', 'Tuesday', 0),
(979, 'CVSUJAH1296478307907', '15:00:00', '15:30:00', 'Tuesday', 0),
(980, 'CVSUJAH1296478307907', '15:30:00', '16:00:00', 'Tuesday', 0),
(981, 'CVSUJAH1296478307907', '16:00:00', '16:30:00', 'Tuesday', 0),
(982, 'CVSUJAH1296478307907', '16:30:00', '17:00:00', 'Tuesday', 0),
(983, 'CVSUJAH1296478307907', '17:00:00', '17:30:00', 'Tuesday', 0),
(984, 'CVSUJAH1296478307907', '17:30:00', '18:00:00', 'Tuesday', 0),
(985, 'CVSUJAH1296478307907', '18:00:00', '18:30:00', 'Tuesday', 0),
(986, 'CVSUJAH1296478307907', '18:30:00', '19:00:00', 'Tuesday', 0),
(987, 'CVSUJAH1296478307907', '19:00:00', '19:30:00', 'Tuesday', 0),
(988, 'CVSUJAH1296478307907', '19:30:00', '20:00:00', 'Tuesday', 0),
(989, 'CVSUJAH1296478307907', '07:00:00', '07:30:00', 'Wednesday', 0),
(990, 'CVSUJAH1296478307907', '07:30:00', '08:00:00', 'Wednesday', 0),
(991, 'CVSUJAH1296478307907', '08:00:00', '08:30:00', 'Wednesday', 0),
(992, 'CVSUJAH1296478307907', '08:30:00', '09:00:00', 'Wednesday', 0),
(993, 'CVSUJAH1296478307907', '09:00:00', '09:30:00', 'Wednesday', 0),
(994, 'CVSUJAH1296478307907', '09:30:00', '10:00:00', 'Wednesday', 0),
(995, 'CVSUJAH1296478307907', '10:00:00', '10:30:00', 'Wednesday', 0),
(996, 'CVSUJAH1296478307907', '10:30:00', '11:00:00', 'Wednesday', 0),
(997, 'CVSUJAH1296478307907', '11:00:00', '11:30:00', 'Wednesday', 0),
(998, 'CVSUJAH1296478307907', '11:30:00', '12:00:00', 'Wednesday', 0),
(999, 'CVSUJAH1296478307907', '12:00:00', '12:30:00', 'Wednesday', 0),
(1000, 'CVSUJAH1296478307907', '12:30:00', '13:00:00', 'Wednesday', 0),
(1001, 'CVSUJAH1296478307907', '13:00:00', '13:30:00', 'Wednesday', 0),
(1002, 'CVSUJAH1296478307907', '13:30:00', '14:00:00', 'Wednesday', 0),
(1003, 'CVSUJAH1296478307907', '14:00:00', '14:30:00', 'Wednesday', 0),
(1004, 'CVSUJAH1296478307907', '14:30:00', '15:00:00', 'Wednesday', 0),
(1005, 'CVSUJAH1296478307907', '15:00:00', '15:30:00', 'Wednesday', 0),
(1006, 'CVSUJAH1296478307907', '15:30:00', '16:00:00', 'Wednesday', 0),
(1007, 'CVSUJAH1296478307907', '16:00:00', '16:30:00', 'Wednesday', 0),
(1008, 'CVSUJAH1296478307907', '16:30:00', '17:00:00', 'Wednesday', 0),
(1009, 'CVSUJAH1296478307907', '17:00:00', '17:30:00', 'Wednesday', 0),
(1010, 'CVSUJAH1296478307907', '17:30:00', '18:00:00', 'Wednesday', 0),
(1011, 'CVSUJAH1296478307907', '18:00:00', '18:30:00', 'Wednesday', 0),
(1012, 'CVSUJAH1296478307907', '18:30:00', '19:00:00', 'Wednesday', 0),
(1013, 'CVSUJAH1296478307907', '19:00:00', '19:30:00', 'Wednesday', 0),
(1014, 'CVSUJAH1296478307907', '19:30:00', '20:00:00', 'Wednesday', 0),
(1015, 'CVSUJAH1296478307907', '07:00:00', '07:30:00', 'Thursday', 0),
(1016, 'CVSUJAH1296478307907', '07:30:00', '08:00:00', 'Thursday', 0),
(1017, 'CVSUJAH1296478307907', '08:00:00', '08:30:00', 'Thursday', 0),
(1018, 'CVSUJAH1296478307907', '08:30:00', '09:00:00', 'Thursday', 0),
(1019, 'CVSUJAH1296478307907', '09:00:00', '09:30:00', 'Thursday', 0),
(1020, 'CVSUJAH1296478307907', '09:30:00', '10:00:00', 'Thursday', 0),
(1021, 'CVSUJAH1296478307907', '10:00:00', '10:30:00', 'Thursday', 0),
(1022, 'CVSUJAH1296478307907', '10:30:00', '11:00:00', 'Thursday', 0),
(1023, 'CVSUJAH1296478307907', '11:00:00', '11:30:00', 'Thursday', 0),
(1024, 'CVSUJAH1296478307907', '11:30:00', '12:00:00', 'Thursday', 0),
(1025, 'CVSUJAH1296478307907', '12:00:00', '12:30:00', 'Thursday', 0),
(1026, 'CVSUJAH1296478307907', '12:30:00', '13:00:00', 'Thursday', 0),
(1027, 'CVSUJAH1296478307907', '13:00:00', '13:30:00', 'Thursday', 0),
(1028, 'CVSUJAH1296478307907', '13:30:00', '14:00:00', 'Thursday', 0),
(1029, 'CVSUJAH1296478307907', '14:00:00', '14:30:00', 'Thursday', 0),
(1030, 'CVSUJAH1296478307907', '14:30:00', '15:00:00', 'Thursday', 0),
(1031, 'CVSUJAH1296478307907', '15:00:00', '15:30:00', 'Thursday', 0),
(1032, 'CVSUJAH1296478307907', '15:30:00', '16:00:00', 'Thursday', 0),
(1033, 'CVSUJAH1296478307907', '16:00:00', '16:30:00', 'Thursday', 0),
(1034, 'CVSUJAH1296478307907', '16:30:00', '17:00:00', 'Thursday', 0),
(1035, 'CVSUJAH1296478307907', '17:00:00', '17:30:00', 'Thursday', 0),
(1036, 'CVSUJAH1296478307907', '17:30:00', '18:00:00', 'Thursday', 0),
(1037, 'CVSUJAH1296478307907', '18:00:00', '18:30:00', 'Thursday', 0),
(1038, 'CVSUJAH1296478307907', '18:30:00', '19:00:00', 'Thursday', 0),
(1039, 'CVSUJAH1296478307907', '19:00:00', '19:30:00', 'Thursday', 0),
(1040, 'CVSUJAH1296478307907', '19:30:00', '20:00:00', 'Thursday', 0),
(1041, 'CVSUJAH1296478307907', '07:00:00', '07:30:00', 'Friday', 0),
(1042, 'CVSUJAH1296478307907', '07:30:00', '08:00:00', 'Friday', 0),
(1043, 'CVSUJAH1296478307907', '08:00:00', '08:30:00', 'Friday', 0),
(1044, 'CVSUJAH1296478307907', '08:30:00', '09:00:00', 'Friday', 0),
(1045, 'CVSUJAH1296478307907', '09:00:00', '09:30:00', 'Friday', 0),
(1046, 'CVSUJAH1296478307907', '09:30:00', '10:00:00', 'Friday', 0),
(1047, 'CVSUJAH1296478307907', '10:00:00', '10:30:00', 'Friday', 0),
(1048, 'CVSUJAH1296478307907', '10:30:00', '11:00:00', 'Friday', 0),
(1049, 'CVSUJAH1296478307907', '11:00:00', '11:30:00', 'Friday', 0),
(1050, 'CVSUJAH1296478307907', '11:30:00', '12:00:00', 'Friday', 0),
(1051, 'CVSUJAH1296478307907', '12:00:00', '12:30:00', 'Friday', 0),
(1052, 'CVSUJAH1296478307907', '12:30:00', '13:00:00', 'Friday', 0),
(1053, 'CVSUJAH1296478307907', '13:00:00', '13:30:00', 'Friday', 0),
(1054, 'CVSUJAH1296478307907', '13:30:00', '14:00:00', 'Friday', 0),
(1055, 'CVSUJAH1296478307907', '14:00:00', '14:30:00', 'Friday', 0),
(1056, 'CVSUJAH1296478307907', '14:30:00', '15:00:00', 'Friday', 0),
(1057, 'CVSUJAH1296478307907', '15:00:00', '15:30:00', 'Friday', 0),
(1058, 'CVSUJAH1296478307907', '15:30:00', '16:00:00', 'Friday', 0),
(1059, 'CVSUJAH1296478307907', '16:00:00', '16:30:00', 'Friday', 0),
(1060, 'CVSUJAH1296478307907', '16:30:00', '17:00:00', 'Friday', 0),
(1061, 'CVSUJAH1296478307907', '17:00:00', '17:30:00', 'Friday', 0),
(1062, 'CVSUJAH1296478307907', '17:30:00', '18:00:00', 'Friday', 0),
(1063, 'CVSUJAH1296478307907', '18:00:00', '18:30:00', 'Friday', 0),
(1064, 'CVSUJAH1296478307907', '18:30:00', '19:00:00', 'Friday', 0),
(1065, 'CVSUJAH1296478307907', '19:00:00', '19:30:00', 'Friday', 0),
(1066, 'CVSUJAH1296478307907', '19:30:00', '20:00:00', 'Friday', 0),
(1067, 'CVSUJAH1296478307907', '07:00:00', '07:30:00', 'Saturday', 0),
(1068, 'CVSUJAH1296478307907', '07:30:00', '08:00:00', 'Saturday', 0),
(1069, 'CVSUJAH1296478307907', '08:00:00', '08:30:00', 'Saturday', 0),
(1070, 'CVSUJAH1296478307907', '08:30:00', '09:00:00', 'Saturday', 0),
(1071, 'CVSUJAH1296478307907', '09:00:00', '09:30:00', 'Saturday', 0),
(1072, 'CVSUJAH1296478307907', '09:30:00', '10:00:00', 'Saturday', 0),
(1073, 'CVSUJAH1296478307907', '10:00:00', '10:30:00', 'Saturday', 0),
(1074, 'CVSUJAH1296478307907', '10:30:00', '11:00:00', 'Saturday', 0),
(1075, 'CVSUJAH1296478307907', '11:00:00', '11:30:00', 'Saturday', 0),
(1076, 'CVSUJAH1296478307907', '11:30:00', '12:00:00', 'Saturday', 0),
(1077, 'CVSUJAH1296478307907', '12:00:00', '12:30:00', 'Saturday', 0),
(1078, 'CVSUJAH1296478307907', '12:30:00', '13:00:00', 'Saturday', 0),
(1079, 'CVSUJAH1296478307907', '13:00:00', '13:30:00', 'Saturday', 0),
(1080, 'CVSUJAH1296478307907', '13:30:00', '14:00:00', 'Saturday', 0),
(1081, 'CVSUJAH1296478307907', '14:00:00', '14:30:00', 'Saturday', 0),
(1082, 'CVSUJAH1296478307907', '14:30:00', '15:00:00', 'Saturday', 0),
(1083, 'CVSUJAH1296478307907', '15:00:00', '15:30:00', 'Saturday', 0),
(1084, 'CVSUJAH1296478307907', '15:30:00', '16:00:00', 'Saturday', 0),
(1085, 'CVSUJAH1296478307907', '16:00:00', '16:30:00', 'Saturday', 0),
(1086, 'CVSUJAH1296478307907', '16:30:00', '17:00:00', 'Saturday', 0),
(1087, 'CVSUJAH1296478307907', '17:00:00', '17:30:00', 'Saturday', 0),
(1088, 'CVSUJAH1296478307907', '17:30:00', '18:00:00', 'Saturday', 0),
(1089, 'CVSUJAH1296478307907', '18:00:00', '18:30:00', 'Saturday', 0),
(1090, 'CVSUJAH1296478307907', '18:30:00', '19:00:00', 'Saturday', 0),
(1091, 'CVSUJAH1296478307907', '19:00:00', '19:30:00', 'Saturday', 0),
(1092, 'CVSUJAH1296478307907', '19:30:00', '20:00:00', 'Saturday', 0),
(1093, 'CVSUCMY8754912307907', '07:00:00', '07:30:00', 'Monday', 0),
(1094, 'CVSUCMY8754912307907', '07:30:00', '08:00:00', 'Monday', 0),
(1095, 'CVSUCMY8754912307907', '08:00:00', '08:30:00', 'Monday', 0),
(1096, 'CVSUCMY8754912307907', '08:30:00', '09:00:00', 'Monday', 0),
(1097, 'CVSUCMY8754912307907', '09:00:00', '09:30:00', 'Monday', 0),
(1098, 'CVSUCMY8754912307907', '09:30:00', '10:00:00', 'Monday', 0),
(1099, 'CVSUCMY8754912307907', '10:00:00', '10:30:00', 'Monday', 0),
(1100, 'CVSUCMY8754912307907', '10:30:00', '11:00:00', 'Monday', 0),
(1101, 'CVSUCMY8754912307907', '11:00:00', '11:30:00', 'Monday', 0),
(1102, 'CVSUCMY8754912307907', '11:30:00', '12:00:00', 'Monday', 0),
(1103, 'CVSUCMY8754912307907', '12:00:00', '12:30:00', 'Monday', 0),
(1104, 'CVSUCMY8754912307907', '12:30:00', '13:00:00', 'Monday', 0),
(1105, 'CVSUCMY8754912307907', '13:00:00', '13:30:00', 'Monday', 0),
(1106, 'CVSUCMY8754912307907', '13:30:00', '14:00:00', 'Monday', 0),
(1107, 'CVSUCMY8754912307907', '14:00:00', '14:30:00', 'Monday', 0),
(1108, 'CVSUCMY8754912307907', '14:30:00', '15:00:00', 'Monday', 0),
(1109, 'CVSUCMY8754912307907', '15:00:00', '15:30:00', 'Monday', 0),
(1110, 'CVSUCMY8754912307907', '15:30:00', '16:00:00', 'Monday', 0),
(1111, 'CVSUCMY8754912307907', '16:00:00', '16:30:00', 'Monday', 0),
(1112, 'CVSUCMY8754912307907', '16:30:00', '17:00:00', 'Monday', 0),
(1113, 'CVSUCMY8754912307907', '17:00:00', '17:30:00', 'Monday', 0),
(1114, 'CVSUCMY8754912307907', '17:30:00', '18:00:00', 'Monday', 0),
(1115, 'CVSUCMY8754912307907', '18:00:00', '18:30:00', 'Monday', 0),
(1116, 'CVSUCMY8754912307907', '18:30:00', '19:00:00', 'Monday', 0),
(1117, 'CVSUCMY8754912307907', '19:00:00', '19:30:00', 'Monday', 0),
(1118, 'CVSUCMY8754912307907', '19:30:00', '20:00:00', 'Monday', 0),
(1119, 'CVSUCMY8754912307907', '07:00:00', '07:30:00', 'Tuesday', 0),
(1120, 'CVSUCMY8754912307907', '07:30:00', '08:00:00', 'Tuesday', 0),
(1121, 'CVSUCMY8754912307907', '08:00:00', '08:30:00', 'Tuesday', 0),
(1122, 'CVSUCMY8754912307907', '08:30:00', '09:00:00', 'Tuesday', 0),
(1123, 'CVSUCMY8754912307907', '09:00:00', '09:30:00', 'Tuesday', 0),
(1124, 'CVSUCMY8754912307907', '09:30:00', '10:00:00', 'Tuesday', 0),
(1125, 'CVSUCMY8754912307907', '10:00:00', '10:30:00', 'Tuesday', 0),
(1126, 'CVSUCMY8754912307907', '10:30:00', '11:00:00', 'Tuesday', 0),
(1127, 'CVSUCMY8754912307907', '11:00:00', '11:30:00', 'Tuesday', 0),
(1128, 'CVSUCMY8754912307907', '11:30:00', '12:00:00', 'Tuesday', 0),
(1129, 'CVSUCMY8754912307907', '12:00:00', '12:30:00', 'Tuesday', 0),
(1130, 'CVSUCMY8754912307907', '12:30:00', '13:00:00', 'Tuesday', 0),
(1131, 'CVSUCMY8754912307907', '13:00:00', '13:30:00', 'Tuesday', 0),
(1132, 'CVSUCMY8754912307907', '13:30:00', '14:00:00', 'Tuesday', 0),
(1133, 'CVSUCMY8754912307907', '14:00:00', '14:30:00', 'Tuesday', 0),
(1134, 'CVSUCMY8754912307907', '14:30:00', '15:00:00', 'Tuesday', 0),
(1135, 'CVSUCMY8754912307907', '15:00:00', '15:30:00', 'Tuesday', 0),
(1136, 'CVSUCMY8754912307907', '15:30:00', '16:00:00', 'Tuesday', 0),
(1137, 'CVSUCMY8754912307907', '16:00:00', '16:30:00', 'Tuesday', 0),
(1138, 'CVSUCMY8754912307907', '16:30:00', '17:00:00', 'Tuesday', 0),
(1139, 'CVSUCMY8754912307907', '17:00:00', '17:30:00', 'Tuesday', 0),
(1140, 'CVSUCMY8754912307907', '17:30:00', '18:00:00', 'Tuesday', 0),
(1141, 'CVSUCMY8754912307907', '18:00:00', '18:30:00', 'Tuesday', 0),
(1142, 'CVSUCMY8754912307907', '18:30:00', '19:00:00', 'Tuesday', 0),
(1143, 'CVSUCMY8754912307907', '19:00:00', '19:30:00', 'Tuesday', 0),
(1144, 'CVSUCMY8754912307907', '19:30:00', '20:00:00', 'Tuesday', 0),
(1145, 'CVSUCMY8754912307907', '07:00:00', '07:30:00', 'Wednesday', 0),
(1146, 'CVSUCMY8754912307907', '07:30:00', '08:00:00', 'Wednesday', 0),
(1147, 'CVSUCMY8754912307907', '08:00:00', '08:30:00', 'Wednesday', 0),
(1148, 'CVSUCMY8754912307907', '08:30:00', '09:00:00', 'Wednesday', 0),
(1149, 'CVSUCMY8754912307907', '09:00:00', '09:30:00', 'Wednesday', 0),
(1150, 'CVSUCMY8754912307907', '09:30:00', '10:00:00', 'Wednesday', 0),
(1151, 'CVSUCMY8754912307907', '10:00:00', '10:30:00', 'Wednesday', 0),
(1152, 'CVSUCMY8754912307907', '10:30:00', '11:00:00', 'Wednesday', 0),
(1153, 'CVSUCMY8754912307907', '11:00:00', '11:30:00', 'Wednesday', 0),
(1154, 'CVSUCMY8754912307907', '11:30:00', '12:00:00', 'Wednesday', 0),
(1155, 'CVSUCMY8754912307907', '12:00:00', '12:30:00', 'Wednesday', 0),
(1156, 'CVSUCMY8754912307907', '12:30:00', '13:00:00', 'Wednesday', 0),
(1157, 'CVSUCMY8754912307907', '13:00:00', '13:30:00', 'Wednesday', 0),
(1158, 'CVSUCMY8754912307907', '13:30:00', '14:00:00', 'Wednesday', 0),
(1159, 'CVSUCMY8754912307907', '14:00:00', '14:30:00', 'Wednesday', 0),
(1160, 'CVSUCMY8754912307907', '14:30:00', '15:00:00', 'Wednesday', 0),
(1161, 'CVSUCMY8754912307907', '15:00:00', '15:30:00', 'Wednesday', 0),
(1162, 'CVSUCMY8754912307907', '15:30:00', '16:00:00', 'Wednesday', 0),
(1163, 'CVSUCMY8754912307907', '16:00:00', '16:30:00', 'Wednesday', 0),
(1164, 'CVSUCMY8754912307907', '16:30:00', '17:00:00', 'Wednesday', 0),
(1165, 'CVSUCMY8754912307907', '17:00:00', '17:30:00', 'Wednesday', 0),
(1166, 'CVSUCMY8754912307907', '17:30:00', '18:00:00', 'Wednesday', 0),
(1167, 'CVSUCMY8754912307907', '18:00:00', '18:30:00', 'Wednesday', 0),
(1168, 'CVSUCMY8754912307907', '18:30:00', '19:00:00', 'Wednesday', 0),
(1169, 'CVSUCMY8754912307907', '19:00:00', '19:30:00', 'Wednesday', 0),
(1170, 'CVSUCMY8754912307907', '19:30:00', '20:00:00', 'Wednesday', 0),
(1171, 'CVSUCMY8754912307907', '07:00:00', '07:30:00', 'Thursday', 0),
(1172, 'CVSUCMY8754912307907', '07:30:00', '08:00:00', 'Thursday', 0),
(1173, 'CVSUCMY8754912307907', '08:00:00', '08:30:00', 'Thursday', 0),
(1174, 'CVSUCMY8754912307907', '08:30:00', '09:00:00', 'Thursday', 0),
(1175, 'CVSUCMY8754912307907', '09:00:00', '09:30:00', 'Thursday', 0),
(1176, 'CVSUCMY8754912307907', '09:30:00', '10:00:00', 'Thursday', 0),
(1177, 'CVSUCMY8754912307907', '10:00:00', '10:30:00', 'Thursday', 0),
(1178, 'CVSUCMY8754912307907', '10:30:00', '11:00:00', 'Thursday', 0),
(1179, 'CVSUCMY8754912307907', '11:00:00', '11:30:00', 'Thursday', 0),
(1180, 'CVSUCMY8754912307907', '11:30:00', '12:00:00', 'Thursday', 0),
(1181, 'CVSUCMY8754912307907', '12:00:00', '12:30:00', 'Thursday', 0),
(1182, 'CVSUCMY8754912307907', '12:30:00', '13:00:00', 'Thursday', 0),
(1183, 'CVSUCMY8754912307907', '13:00:00', '13:30:00', 'Thursday', 0),
(1184, 'CVSUCMY8754912307907', '13:30:00', '14:00:00', 'Thursday', 0),
(1185, 'CVSUCMY8754912307907', '14:00:00', '14:30:00', 'Thursday', 0),
(1186, 'CVSUCMY8754912307907', '14:30:00', '15:00:00', 'Thursday', 0),
(1187, 'CVSUCMY8754912307907', '15:00:00', '15:30:00', 'Thursday', 0),
(1188, 'CVSUCMY8754912307907', '15:30:00', '16:00:00', 'Thursday', 0),
(1189, 'CVSUCMY8754912307907', '16:00:00', '16:30:00', 'Thursday', 0),
(1190, 'CVSUCMY8754912307907', '16:30:00', '17:00:00', 'Thursday', 0),
(1191, 'CVSUCMY8754912307907', '17:00:00', '17:30:00', 'Thursday', 0),
(1192, 'CVSUCMY8754912307907', '17:30:00', '18:00:00', 'Thursday', 0),
(1193, 'CVSUCMY8754912307907', '18:00:00', '18:30:00', 'Thursday', 0),
(1194, 'CVSUCMY8754912307907', '18:30:00', '19:00:00', 'Thursday', 0),
(1195, 'CVSUCMY8754912307907', '19:00:00', '19:30:00', 'Thursday', 0),
(1196, 'CVSUCMY8754912307907', '19:30:00', '20:00:00', 'Thursday', 0),
(1197, 'CVSUCMY8754912307907', '07:00:00', '07:30:00', 'Friday', 0),
(1198, 'CVSUCMY8754912307907', '07:30:00', '08:00:00', 'Friday', 0),
(1199, 'CVSUCMY8754912307907', '08:00:00', '08:30:00', 'Friday', 0),
(1200, 'CVSUCMY8754912307907', '08:30:00', '09:00:00', 'Friday', 0),
(1201, 'CVSUCMY8754912307907', '09:00:00', '09:30:00', 'Friday', 0),
(1202, 'CVSUCMY8754912307907', '09:30:00', '10:00:00', 'Friday', 0),
(1203, 'CVSUCMY8754912307907', '10:00:00', '10:30:00', 'Friday', 0),
(1204, 'CVSUCMY8754912307907', '10:30:00', '11:00:00', 'Friday', 0),
(1205, 'CVSUCMY8754912307907', '11:00:00', '11:30:00', 'Friday', 0),
(1206, 'CVSUCMY8754912307907', '11:30:00', '12:00:00', 'Friday', 0),
(1207, 'CVSUCMY8754912307907', '12:00:00', '12:30:00', 'Friday', 0),
(1208, 'CVSUCMY8754912307907', '12:30:00', '13:00:00', 'Friday', 0),
(1209, 'CVSUCMY8754912307907', '13:00:00', '13:30:00', 'Friday', 0),
(1210, 'CVSUCMY8754912307907', '13:30:00', '14:00:00', 'Friday', 0),
(1211, 'CVSUCMY8754912307907', '14:00:00', '14:30:00', 'Friday', 0),
(1212, 'CVSUCMY8754912307907', '14:30:00', '15:00:00', 'Friday', 0),
(1213, 'CVSUCMY8754912307907', '15:00:00', '15:30:00', 'Friday', 0),
(1214, 'CVSUCMY8754912307907', '15:30:00', '16:00:00', 'Friday', 0),
(1215, 'CVSUCMY8754912307907', '16:00:00', '16:30:00', 'Friday', 0),
(1216, 'CVSUCMY8754912307907', '16:30:00', '17:00:00', 'Friday', 0),
(1217, 'CVSUCMY8754912307907', '17:00:00', '17:30:00', 'Friday', 0),
(1218, 'CVSUCMY8754912307907', '17:30:00', '18:00:00', 'Friday', 0),
(1219, 'CVSUCMY8754912307907', '18:00:00', '18:30:00', 'Friday', 0),
(1220, 'CVSUCMY8754912307907', '18:30:00', '19:00:00', 'Friday', 0),
(1221, 'CVSUCMY8754912307907', '19:00:00', '19:30:00', 'Friday', 0),
(1222, 'CVSUCMY8754912307907', '19:30:00', '20:00:00', 'Friday', 0),
(1223, 'CVSUCMY8754912307907', '07:00:00', '07:30:00', 'Saturday', 0),
(1224, 'CVSUCMY8754912307907', '07:30:00', '08:00:00', 'Saturday', 0),
(1225, 'CVSUCMY8754912307907', '08:00:00', '08:30:00', 'Saturday', 0),
(1226, 'CVSUCMY8754912307907', '08:30:00', '09:00:00', 'Saturday', 0),
(1227, 'CVSUCMY8754912307907', '09:00:00', '09:30:00', 'Saturday', 0),
(1228, 'CVSUCMY8754912307907', '09:30:00', '10:00:00', 'Saturday', 0),
(1229, 'CVSUCMY8754912307907', '10:00:00', '10:30:00', 'Saturday', 0),
(1230, 'CVSUCMY8754912307907', '10:30:00', '11:00:00', 'Saturday', 0),
(1231, 'CVSUCMY8754912307907', '11:00:00', '11:30:00', 'Saturday', 0),
(1232, 'CVSUCMY8754912307907', '11:30:00', '12:00:00', 'Saturday', 0),
(1233, 'CVSUCMY8754912307907', '12:00:00', '12:30:00', 'Saturday', 0),
(1234, 'CVSUCMY8754912307907', '12:30:00', '13:00:00', 'Saturday', 0),
(1235, 'CVSUCMY8754912307907', '13:00:00', '13:30:00', 'Saturday', 0),
(1236, 'CVSUCMY8754912307907', '13:30:00', '14:00:00', 'Saturday', 0),
(1237, 'CVSUCMY8754912307907', '14:00:00', '14:30:00', 'Saturday', 0),
(1238, 'CVSUCMY8754912307907', '14:30:00', '15:00:00', 'Saturday', 0),
(1239, 'CVSUCMY8754912307907', '15:00:00', '15:30:00', 'Saturday', 0),
(1240, 'CVSUCMY8754912307907', '15:30:00', '16:00:00', 'Saturday', 0),
(1241, 'CVSUCMY8754912307907', '16:00:00', '16:30:00', 'Saturday', 0),
(1242, 'CVSUCMY8754912307907', '16:30:00', '17:00:00', 'Saturday', 0),
(1243, 'CVSUCMY8754912307907', '17:00:00', '17:30:00', 'Saturday', 0),
(1244, 'CVSUCMY8754912307907', '17:30:00', '18:00:00', 'Saturday', 0),
(1245, 'CVSUCMY8754912307907', '18:00:00', '18:30:00', 'Saturday', 0),
(1246, 'CVSUCMY8754912307907', '18:30:00', '19:00:00', 'Saturday', 0),
(1247, 'CVSUCMY8754912307907', '19:00:00', '19:30:00', 'Saturday', 0),
(1248, 'CVSUCMY8754912307907', '19:30:00', '20:00:00', 'Saturday', 0),
(1249, 'CVSUPRU6538947217907', '07:00:00', '07:30:00', 'Monday', 0),
(1250, 'CVSUPRU6538947217907', '07:30:00', '08:00:00', 'Monday', 0),
(1251, 'CVSUPRU6538947217907', '08:00:00', '08:30:00', 'Monday', 0),
(1252, 'CVSUPRU6538947217907', '08:30:00', '09:00:00', 'Monday', 0),
(1253, 'CVSUPRU6538947217907', '09:00:00', '09:30:00', 'Monday', 0),
(1254, 'CVSUPRU6538947217907', '09:30:00', '10:00:00', 'Monday', 0),
(1255, 'CVSUPRU6538947217907', '10:00:00', '10:30:00', 'Monday', 0),
(1256, 'CVSUPRU6538947217907', '10:30:00', '11:00:00', 'Monday', 0),
(1257, 'CVSUPRU6538947217907', '11:00:00', '11:30:00', 'Monday', 0),
(1258, 'CVSUPRU6538947217907', '11:30:00', '12:00:00', 'Monday', 0),
(1259, 'CVSUPRU6538947217907', '12:00:00', '12:30:00', 'Monday', 0),
(1260, 'CVSUPRU6538947217907', '12:30:00', '13:00:00', 'Monday', 0),
(1261, 'CVSUPRU6538947217907', '13:00:00', '13:30:00', 'Monday', 0),
(1262, 'CVSUPRU6538947217907', '13:30:00', '14:00:00', 'Monday', 0),
(1263, 'CVSUPRU6538947217907', '14:00:00', '14:30:00', 'Monday', 0),
(1264, 'CVSUPRU6538947217907', '14:30:00', '15:00:00', 'Monday', 0),
(1265, 'CVSUPRU6538947217907', '15:00:00', '15:30:00', 'Monday', 0),
(1266, 'CVSUPRU6538947217907', '15:30:00', '16:00:00', 'Monday', 0),
(1267, 'CVSUPRU6538947217907', '16:00:00', '16:30:00', 'Monday', 0),
(1268, 'CVSUPRU6538947217907', '16:30:00', '17:00:00', 'Monday', 0),
(1269, 'CVSUPRU6538947217907', '17:00:00', '17:30:00', 'Monday', 0),
(1270, 'CVSUPRU6538947217907', '17:30:00', '18:00:00', 'Monday', 0),
(1271, 'CVSUPRU6538947217907', '18:00:00', '18:30:00', 'Monday', 0),
(1272, 'CVSUPRU6538947217907', '18:30:00', '19:00:00', 'Monday', 0),
(1273, 'CVSUPRU6538947217907', '19:00:00', '19:30:00', 'Monday', 0),
(1274, 'CVSUPRU6538947217907', '19:30:00', '20:00:00', 'Monday', 0),
(1275, 'CVSUPRU6538947217907', '07:00:00', '07:30:00', 'Tuesday', 0),
(1276, 'CVSUPRU6538947217907', '07:30:00', '08:00:00', 'Tuesday', 0),
(1277, 'CVSUPRU6538947217907', '08:00:00', '08:30:00', 'Tuesday', 0),
(1278, 'CVSUPRU6538947217907', '08:30:00', '09:00:00', 'Tuesday', 0),
(1279, 'CVSUPRU6538947217907', '09:00:00', '09:30:00', 'Tuesday', 0),
(1280, 'CVSUPRU6538947217907', '09:30:00', '10:00:00', 'Tuesday', 0),
(1281, 'CVSUPRU6538947217907', '10:00:00', '10:30:00', 'Tuesday', 0),
(1282, 'CVSUPRU6538947217907', '10:30:00', '11:00:00', 'Tuesday', 0),
(1283, 'CVSUPRU6538947217907', '11:00:00', '11:30:00', 'Tuesday', 0),
(1284, 'CVSUPRU6538947217907', '11:30:00', '12:00:00', 'Tuesday', 0),
(1285, 'CVSUPRU6538947217907', '12:00:00', '12:30:00', 'Tuesday', 0),
(1286, 'CVSUPRU6538947217907', '12:30:00', '13:00:00', 'Tuesday', 0),
(1287, 'CVSUPRU6538947217907', '13:00:00', '13:30:00', 'Tuesday', 0),
(1288, 'CVSUPRU6538947217907', '13:30:00', '14:00:00', 'Tuesday', 0),
(1289, 'CVSUPRU6538947217907', '14:00:00', '14:30:00', 'Tuesday', 0),
(1290, 'CVSUPRU6538947217907', '14:30:00', '15:00:00', 'Tuesday', 0),
(1291, 'CVSUPRU6538947217907', '15:00:00', '15:30:00', 'Tuesday', 0),
(1292, 'CVSUPRU6538947217907', '15:30:00', '16:00:00', 'Tuesday', 0),
(1293, 'CVSUPRU6538947217907', '16:00:00', '16:30:00', 'Tuesday', 0),
(1294, 'CVSUPRU6538947217907', '16:30:00', '17:00:00', 'Tuesday', 0),
(1295, 'CVSUPRU6538947217907', '17:00:00', '17:30:00', 'Tuesday', 0),
(1296, 'CVSUPRU6538947217907', '17:30:00', '18:00:00', 'Tuesday', 0),
(1297, 'CVSUPRU6538947217907', '18:00:00', '18:30:00', 'Tuesday', 0),
(1298, 'CVSUPRU6538947217907', '18:30:00', '19:00:00', 'Tuesday', 0),
(1299, 'CVSUPRU6538947217907', '19:00:00', '19:30:00', 'Tuesday', 0),
(1300, 'CVSUPRU6538947217907', '19:30:00', '20:00:00', 'Tuesday', 0),
(1301, 'CVSUPRU6538947217907', '07:00:00', '07:30:00', 'Wednesday', 0),
(1302, 'CVSUPRU6538947217907', '07:30:00', '08:00:00', 'Wednesday', 0),
(1303, 'CVSUPRU6538947217907', '08:00:00', '08:30:00', 'Wednesday', 0),
(1304, 'CVSUPRU6538947217907', '08:30:00', '09:00:00', 'Wednesday', 0),
(1305, 'CVSUPRU6538947217907', '09:00:00', '09:30:00', 'Wednesday', 0),
(1306, 'CVSUPRU6538947217907', '09:30:00', '10:00:00', 'Wednesday', 0),
(1307, 'CVSUPRU6538947217907', '10:00:00', '10:30:00', 'Wednesday', 0),
(1308, 'CVSUPRU6538947217907', '10:30:00', '11:00:00', 'Wednesday', 0),
(1309, 'CVSUPRU6538947217907', '11:00:00', '11:30:00', 'Wednesday', 0),
(1310, 'CVSUPRU6538947217907', '11:30:00', '12:00:00', 'Wednesday', 0),
(1311, 'CVSUPRU6538947217907', '12:00:00', '12:30:00', 'Wednesday', 0),
(1312, 'CVSUPRU6538947217907', '12:30:00', '13:00:00', 'Wednesday', 0),
(1313, 'CVSUPRU6538947217907', '13:00:00', '13:30:00', 'Wednesday', 0),
(1314, 'CVSUPRU6538947217907', '13:30:00', '14:00:00', 'Wednesday', 0),
(1315, 'CVSUPRU6538947217907', '14:00:00', '14:30:00', 'Wednesday', 0),
(1316, 'CVSUPRU6538947217907', '14:30:00', '15:00:00', 'Wednesday', 0),
(1317, 'CVSUPRU6538947217907', '15:00:00', '15:30:00', 'Wednesday', 0),
(1318, 'CVSUPRU6538947217907', '15:30:00', '16:00:00', 'Wednesday', 0),
(1319, 'CVSUPRU6538947217907', '16:00:00', '16:30:00', 'Wednesday', 0),
(1320, 'CVSUPRU6538947217907', '16:30:00', '17:00:00', 'Wednesday', 0),
(1321, 'CVSUPRU6538947217907', '17:00:00', '17:30:00', 'Wednesday', 0),
(1322, 'CVSUPRU6538947217907', '17:30:00', '18:00:00', 'Wednesday', 0),
(1323, 'CVSUPRU6538947217907', '18:00:00', '18:30:00', 'Wednesday', 0),
(1324, 'CVSUPRU6538947217907', '18:30:00', '19:00:00', 'Wednesday', 0),
(1325, 'CVSUPRU6538947217907', '19:00:00', '19:30:00', 'Wednesday', 0),
(1326, 'CVSUPRU6538947217907', '19:30:00', '20:00:00', 'Wednesday', 0),
(1327, 'CVSUPRU6538947217907', '07:00:00', '07:30:00', 'Thursday', 0),
(1328, 'CVSUPRU6538947217907', '07:30:00', '08:00:00', 'Thursday', 0),
(1329, 'CVSUPRU6538947217907', '08:00:00', '08:30:00', 'Thursday', 0),
(1330, 'CVSUPRU6538947217907', '08:30:00', '09:00:00', 'Thursday', 0),
(1331, 'CVSUPRU6538947217907', '09:00:00', '09:30:00', 'Thursday', 0),
(1332, 'CVSUPRU6538947217907', '09:30:00', '10:00:00', 'Thursday', 0),
(1333, 'CVSUPRU6538947217907', '10:00:00', '10:30:00', 'Thursday', 0),
(1334, 'CVSUPRU6538947217907', '10:30:00', '11:00:00', 'Thursday', 0),
(1335, 'CVSUPRU6538947217907', '11:00:00', '11:30:00', 'Thursday', 0),
(1336, 'CVSUPRU6538947217907', '11:30:00', '12:00:00', 'Thursday', 0),
(1337, 'CVSUPRU6538947217907', '12:00:00', '12:30:00', 'Thursday', 0),
(1338, 'CVSUPRU6538947217907', '12:30:00', '13:00:00', 'Thursday', 0),
(1339, 'CVSUPRU6538947217907', '13:00:00', '13:30:00', 'Thursday', 0),
(1340, 'CVSUPRU6538947217907', '13:30:00', '14:00:00', 'Thursday', 0),
(1341, 'CVSUPRU6538947217907', '14:00:00', '14:30:00', 'Thursday', 0),
(1342, 'CVSUPRU6538947217907', '14:30:00', '15:00:00', 'Thursday', 0),
(1343, 'CVSUPRU6538947217907', '15:00:00', '15:30:00', 'Thursday', 0),
(1344, 'CVSUPRU6538947217907', '15:30:00', '16:00:00', 'Thursday', 0),
(1345, 'CVSUPRU6538947217907', '16:00:00', '16:30:00', 'Thursday', 0),
(1346, 'CVSUPRU6538947217907', '16:30:00', '17:00:00', 'Thursday', 0),
(1347, 'CVSUPRU6538947217907', '17:00:00', '17:30:00', 'Thursday', 0),
(1348, 'CVSUPRU6538947217907', '17:30:00', '18:00:00', 'Thursday', 0),
(1349, 'CVSUPRU6538947217907', '18:00:00', '18:30:00', 'Thursday', 0),
(1350, 'CVSUPRU6538947217907', '18:30:00', '19:00:00', 'Thursday', 0),
(1351, 'CVSUPRU6538947217907', '19:00:00', '19:30:00', 'Thursday', 0),
(1352, 'CVSUPRU6538947217907', '19:30:00', '20:00:00', 'Thursday', 0),
(1353, 'CVSUPRU6538947217907', '07:00:00', '07:30:00', 'Friday', 0),
(1354, 'CVSUPRU6538947217907', '07:30:00', '08:00:00', 'Friday', 0),
(1355, 'CVSUPRU6538947217907', '08:00:00', '08:30:00', 'Friday', 0),
(1356, 'CVSUPRU6538947217907', '08:30:00', '09:00:00', 'Friday', 0),
(1357, 'CVSUPRU6538947217907', '09:00:00', '09:30:00', 'Friday', 0),
(1358, 'CVSUPRU6538947217907', '09:30:00', '10:00:00', 'Friday', 0),
(1359, 'CVSUPRU6538947217907', '10:00:00', '10:30:00', 'Friday', 0),
(1360, 'CVSUPRU6538947217907', '10:30:00', '11:00:00', 'Friday', 0),
(1361, 'CVSUPRU6538947217907', '11:00:00', '11:30:00', 'Friday', 0),
(1362, 'CVSUPRU6538947217907', '11:30:00', '12:00:00', 'Friday', 0),
(1363, 'CVSUPRU6538947217907', '12:00:00', '12:30:00', 'Friday', 0),
(1364, 'CVSUPRU6538947217907', '12:30:00', '13:00:00', 'Friday', 0),
(1365, 'CVSUPRU6538947217907', '13:00:00', '13:30:00', 'Friday', 0),
(1366, 'CVSUPRU6538947217907', '13:30:00', '14:00:00', 'Friday', 0),
(1367, 'CVSUPRU6538947217907', '14:00:00', '14:30:00', 'Friday', 0),
(1368, 'CVSUPRU6538947217907', '14:30:00', '15:00:00', 'Friday', 0),
(1369, 'CVSUPRU6538947217907', '15:00:00', '15:30:00', 'Friday', 0),
(1370, 'CVSUPRU6538947217907', '15:30:00', '16:00:00', 'Friday', 0),
(1371, 'CVSUPRU6538947217907', '16:00:00', '16:30:00', 'Friday', 0),
(1372, 'CVSUPRU6538947217907', '16:30:00', '17:00:00', 'Friday', 0),
(1373, 'CVSUPRU6538947217907', '17:00:00', '17:30:00', 'Friday', 0),
(1374, 'CVSUPRU6538947217907', '17:30:00', '18:00:00', 'Friday', 0),
(1375, 'CVSUPRU6538947217907', '18:00:00', '18:30:00', 'Friday', 0),
(1376, 'CVSUPRU6538947217907', '18:30:00', '19:00:00', 'Friday', 0),
(1377, 'CVSUPRU6538947217907', '19:00:00', '19:30:00', 'Friday', 0),
(1378, 'CVSUPRU6538947217907', '19:30:00', '20:00:00', 'Friday', 0),
(1379, 'CVSUPRU6538947217907', '07:00:00', '07:30:00', 'Saturday', 0),
(1380, 'CVSUPRU6538947217907', '07:30:00', '08:00:00', 'Saturday', 0),
(1381, 'CVSUPRU6538947217907', '08:00:00', '08:30:00', 'Saturday', 0),
(1382, 'CVSUPRU6538947217907', '08:30:00', '09:00:00', 'Saturday', 0),
(1383, 'CVSUPRU6538947217907', '09:00:00', '09:30:00', 'Saturday', 0),
(1384, 'CVSUPRU6538947217907', '09:30:00', '10:00:00', 'Saturday', 0),
(1385, 'CVSUPRU6538947217907', '10:00:00', '10:30:00', 'Saturday', 0),
(1386, 'CVSUPRU6538947217907', '10:30:00', '11:00:00', 'Saturday', 0),
(1387, 'CVSUPRU6538947217907', '11:00:00', '11:30:00', 'Saturday', 0),
(1388, 'CVSUPRU6538947217907', '11:30:00', '12:00:00', 'Saturday', 0),
(1389, 'CVSUPRU6538947217907', '12:00:00', '12:30:00', 'Saturday', 0),
(1390, 'CVSUPRU6538947217907', '12:30:00', '13:00:00', 'Saturday', 0),
(1391, 'CVSUPRU6538947217907', '13:00:00', '13:30:00', 'Saturday', 0),
(1392, 'CVSUPRU6538947217907', '13:30:00', '14:00:00', 'Saturday', 0),
(1393, 'CVSUPRU6538947217907', '14:00:00', '14:30:00', 'Saturday', 0),
(1394, 'CVSUPRU6538947217907', '14:30:00', '15:00:00', 'Saturday', 0),
(1395, 'CVSUPRU6538947217907', '15:00:00', '15:30:00', 'Saturday', 0),
(1396, 'CVSUPRU6538947217907', '15:30:00', '16:00:00', 'Saturday', 0),
(1397, 'CVSUPRU6538947217907', '16:00:00', '16:30:00', 'Saturday', 0),
(1398, 'CVSUPRU6538947217907', '16:30:00', '17:00:00', 'Saturday', 0),
(1399, 'CVSUPRU6538947217907', '17:00:00', '17:30:00', 'Saturday', 0),
(1400, 'CVSUPRU6538947217907', '17:30:00', '18:00:00', 'Saturday', 0),
(1401, 'CVSUPRU6538947217907', '18:00:00', '18:30:00', 'Saturday', 0),
(1402, 'CVSUPRU6538947217907', '18:30:00', '19:00:00', 'Saturday', 0),
(1403, 'CVSUPRU6538947217907', '19:00:00', '19:30:00', 'Saturday', 0),
(1404, 'CVSUPRU6538947217907', '19:30:00', '20:00:00', 'Saturday', 0),
(1405, 'CVSUIBP2305416797907', '07:00:00', '07:30:00', 'Monday', 0),
(1406, 'CVSUIBP2305416797907', '07:30:00', '08:00:00', 'Monday', 0),
(1407, 'CVSUIBP2305416797907', '08:00:00', '08:30:00', 'Monday', 0),
(1408, 'CVSUIBP2305416797907', '08:30:00', '09:00:00', 'Monday', 0),
(1409, 'CVSUIBP2305416797907', '09:00:00', '09:30:00', 'Monday', 0),
(1410, 'CVSUIBP2305416797907', '09:30:00', '10:00:00', 'Monday', 0),
(1411, 'CVSUIBP2305416797907', '10:00:00', '10:30:00', 'Monday', 0),
(1412, 'CVSUIBP2305416797907', '10:30:00', '11:00:00', 'Monday', 0),
(1413, 'CVSUIBP2305416797907', '11:00:00', '11:30:00', 'Monday', 0),
(1414, 'CVSUIBP2305416797907', '11:30:00', '12:00:00', 'Monday', 0),
(1415, 'CVSUIBP2305416797907', '12:00:00', '12:30:00', 'Monday', 0),
(1416, 'CVSUIBP2305416797907', '12:30:00', '13:00:00', 'Monday', 0),
(1417, 'CVSUIBP2305416797907', '13:00:00', '13:30:00', 'Monday', 0),
(1418, 'CVSUIBP2305416797907', '13:30:00', '14:00:00', 'Monday', 0),
(1419, 'CVSUIBP2305416797907', '14:00:00', '14:30:00', 'Monday', 0),
(1420, 'CVSUIBP2305416797907', '14:30:00', '15:00:00', 'Monday', 0),
(1421, 'CVSUIBP2305416797907', '15:00:00', '15:30:00', 'Monday', 0),
(1422, 'CVSUIBP2305416797907', '15:30:00', '16:00:00', 'Monday', 0),
(1423, 'CVSUIBP2305416797907', '16:00:00', '16:30:00', 'Monday', 0),
(1424, 'CVSUIBP2305416797907', '16:30:00', '17:00:00', 'Monday', 0),
(1425, 'CVSUIBP2305416797907', '17:00:00', '17:30:00', 'Monday', 0),
(1426, 'CVSUIBP2305416797907', '17:30:00', '18:00:00', 'Monday', 0),
(1427, 'CVSUIBP2305416797907', '18:00:00', '18:30:00', 'Monday', 0),
(1428, 'CVSUIBP2305416797907', '18:30:00', '19:00:00', 'Monday', 0),
(1429, 'CVSUIBP2305416797907', '19:00:00', '19:30:00', 'Monday', 0),
(1430, 'CVSUIBP2305416797907', '19:30:00', '20:00:00', 'Monday', 0),
(1431, 'CVSUIBP2305416797907', '07:00:00', '07:30:00', 'Tuesday', 0),
(1432, 'CVSUIBP2305416797907', '07:30:00', '08:00:00', 'Tuesday', 0),
(1433, 'CVSUIBP2305416797907', '08:00:00', '08:30:00', 'Tuesday', 0),
(1434, 'CVSUIBP2305416797907', '08:30:00', '09:00:00', 'Tuesday', 0),
(1435, 'CVSUIBP2305416797907', '09:00:00', '09:30:00', 'Tuesday', 0),
(1436, 'CVSUIBP2305416797907', '09:30:00', '10:00:00', 'Tuesday', 0),
(1437, 'CVSUIBP2305416797907', '10:00:00', '10:30:00', 'Tuesday', 0),
(1438, 'CVSUIBP2305416797907', '10:30:00', '11:00:00', 'Tuesday', 0),
(1439, 'CVSUIBP2305416797907', '11:00:00', '11:30:00', 'Tuesday', 0),
(1440, 'CVSUIBP2305416797907', '11:30:00', '12:00:00', 'Tuesday', 0),
(1441, 'CVSUIBP2305416797907', '12:00:00', '12:30:00', 'Tuesday', 0),
(1442, 'CVSUIBP2305416797907', '12:30:00', '13:00:00', 'Tuesday', 0),
(1443, 'CVSUIBP2305416797907', '13:00:00', '13:30:00', 'Tuesday', 0),
(1444, 'CVSUIBP2305416797907', '13:30:00', '14:00:00', 'Tuesday', 0),
(1445, 'CVSUIBP2305416797907', '14:00:00', '14:30:00', 'Tuesday', 0),
(1446, 'CVSUIBP2305416797907', '14:30:00', '15:00:00', 'Tuesday', 0),
(1447, 'CVSUIBP2305416797907', '15:00:00', '15:30:00', 'Tuesday', 0),
(1448, 'CVSUIBP2305416797907', '15:30:00', '16:00:00', 'Tuesday', 0),
(1449, 'CVSUIBP2305416797907', '16:00:00', '16:30:00', 'Tuesday', 0),
(1450, 'CVSUIBP2305416797907', '16:30:00', '17:00:00', 'Tuesday', 0),
(1451, 'CVSUIBP2305416797907', '17:00:00', '17:30:00', 'Tuesday', 0),
(1452, 'CVSUIBP2305416797907', '17:30:00', '18:00:00', 'Tuesday', 0),
(1453, 'CVSUIBP2305416797907', '18:00:00', '18:30:00', 'Tuesday', 0),
(1454, 'CVSUIBP2305416797907', '18:30:00', '19:00:00', 'Tuesday', 0),
(1455, 'CVSUIBP2305416797907', '19:00:00', '19:30:00', 'Tuesday', 0),
(1456, 'CVSUIBP2305416797907', '19:30:00', '20:00:00', 'Tuesday', 0),
(1457, 'CVSUIBP2305416797907', '07:00:00', '07:30:00', 'Wednesday', 0),
(1458, 'CVSUIBP2305416797907', '07:30:00', '08:00:00', 'Wednesday', 0),
(1459, 'CVSUIBP2305416797907', '08:00:00', '08:30:00', 'Wednesday', 0),
(1460, 'CVSUIBP2305416797907', '08:30:00', '09:00:00', 'Wednesday', 0),
(1461, 'CVSUIBP2305416797907', '09:00:00', '09:30:00', 'Wednesday', 0),
(1462, 'CVSUIBP2305416797907', '09:30:00', '10:00:00', 'Wednesday', 0),
(1463, 'CVSUIBP2305416797907', '10:00:00', '10:30:00', 'Wednesday', 0),
(1464, 'CVSUIBP2305416797907', '10:30:00', '11:00:00', 'Wednesday', 0),
(1465, 'CVSUIBP2305416797907', '11:00:00', '11:30:00', 'Wednesday', 0),
(1466, 'CVSUIBP2305416797907', '11:30:00', '12:00:00', 'Wednesday', 0),
(1467, 'CVSUIBP2305416797907', '12:00:00', '12:30:00', 'Wednesday', 0),
(1468, 'CVSUIBP2305416797907', '12:30:00', '13:00:00', 'Wednesday', 0),
(1469, 'CVSUIBP2305416797907', '13:00:00', '13:30:00', 'Wednesday', 0),
(1470, 'CVSUIBP2305416797907', '13:30:00', '14:00:00', 'Wednesday', 0),
(1471, 'CVSUIBP2305416797907', '14:00:00', '14:30:00', 'Wednesday', 0),
(1472, 'CVSUIBP2305416797907', '14:30:00', '15:00:00', 'Wednesday', 0),
(1473, 'CVSUIBP2305416797907', '15:00:00', '15:30:00', 'Wednesday', 0),
(1474, 'CVSUIBP2305416797907', '15:30:00', '16:00:00', 'Wednesday', 0),
(1475, 'CVSUIBP2305416797907', '16:00:00', '16:30:00', 'Wednesday', 0),
(1476, 'CVSUIBP2305416797907', '16:30:00', '17:00:00', 'Wednesday', 0),
(1477, 'CVSUIBP2305416797907', '17:00:00', '17:30:00', 'Wednesday', 0),
(1478, 'CVSUIBP2305416797907', '17:30:00', '18:00:00', 'Wednesday', 0),
(1479, 'CVSUIBP2305416797907', '18:00:00', '18:30:00', 'Wednesday', 0),
(1480, 'CVSUIBP2305416797907', '18:30:00', '19:00:00', 'Wednesday', 0),
(1481, 'CVSUIBP2305416797907', '19:00:00', '19:30:00', 'Wednesday', 0),
(1482, 'CVSUIBP2305416797907', '19:30:00', '20:00:00', 'Wednesday', 0),
(1483, 'CVSUIBP2305416797907', '07:00:00', '07:30:00', 'Thursday', 0),
(1484, 'CVSUIBP2305416797907', '07:30:00', '08:00:00', 'Thursday', 0),
(1485, 'CVSUIBP2305416797907', '08:00:00', '08:30:00', 'Thursday', 0),
(1486, 'CVSUIBP2305416797907', '08:30:00', '09:00:00', 'Thursday', 0),
(1487, 'CVSUIBP2305416797907', '09:00:00', '09:30:00', 'Thursday', 0),
(1488, 'CVSUIBP2305416797907', '09:30:00', '10:00:00', 'Thursday', 0),
(1489, 'CVSUIBP2305416797907', '10:00:00', '10:30:00', 'Thursday', 0),
(1490, 'CVSUIBP2305416797907', '10:30:00', '11:00:00', 'Thursday', 0),
(1491, 'CVSUIBP2305416797907', '11:00:00', '11:30:00', 'Thursday', 0),
(1492, 'CVSUIBP2305416797907', '11:30:00', '12:00:00', 'Thursday', 0),
(1493, 'CVSUIBP2305416797907', '12:00:00', '12:30:00', 'Thursday', 0),
(1494, 'CVSUIBP2305416797907', '12:30:00', '13:00:00', 'Thursday', 0),
(1495, 'CVSUIBP2305416797907', '13:00:00', '13:30:00', 'Thursday', 0),
(1496, 'CVSUIBP2305416797907', '13:30:00', '14:00:00', 'Thursday', 0),
(1497, 'CVSUIBP2305416797907', '14:00:00', '14:30:00', 'Thursday', 0),
(1498, 'CVSUIBP2305416797907', '14:30:00', '15:00:00', 'Thursday', 0),
(1499, 'CVSUIBP2305416797907', '15:00:00', '15:30:00', 'Thursday', 0),
(1500, 'CVSUIBP2305416797907', '15:30:00', '16:00:00', 'Thursday', 0),
(1501, 'CVSUIBP2305416797907', '16:00:00', '16:30:00', 'Thursday', 0),
(1502, 'CVSUIBP2305416797907', '16:30:00', '17:00:00', 'Thursday', 0),
(1503, 'CVSUIBP2305416797907', '17:00:00', '17:30:00', 'Thursday', 0),
(1504, 'CVSUIBP2305416797907', '17:30:00', '18:00:00', 'Thursday', 0),
(1505, 'CVSUIBP2305416797907', '18:00:00', '18:30:00', 'Thursday', 0),
(1506, 'CVSUIBP2305416797907', '18:30:00', '19:00:00', 'Thursday', 0),
(1507, 'CVSUIBP2305416797907', '19:00:00', '19:30:00', 'Thursday', 0),
(1508, 'CVSUIBP2305416797907', '19:30:00', '20:00:00', 'Thursday', 0),
(1509, 'CVSUIBP2305416797907', '07:00:00', '07:30:00', 'Friday', 0),
(1510, 'CVSUIBP2305416797907', '07:30:00', '08:00:00', 'Friday', 0),
(1511, 'CVSUIBP2305416797907', '08:00:00', '08:30:00', 'Friday', 0),
(1512, 'CVSUIBP2305416797907', '08:30:00', '09:00:00', 'Friday', 0),
(1513, 'CVSUIBP2305416797907', '09:00:00', '09:30:00', 'Friday', 0),
(1514, 'CVSUIBP2305416797907', '09:30:00', '10:00:00', 'Friday', 0),
(1515, 'CVSUIBP2305416797907', '10:00:00', '10:30:00', 'Friday', 0),
(1516, 'CVSUIBP2305416797907', '10:30:00', '11:00:00', 'Friday', 0),
(1517, 'CVSUIBP2305416797907', '11:00:00', '11:30:00', 'Friday', 0),
(1518, 'CVSUIBP2305416797907', '11:30:00', '12:00:00', 'Friday', 0),
(1519, 'CVSUIBP2305416797907', '12:00:00', '12:30:00', 'Friday', 0),
(1520, 'CVSUIBP2305416797907', '12:30:00', '13:00:00', 'Friday', 0),
(1521, 'CVSUIBP2305416797907', '13:00:00', '13:30:00', 'Friday', 0),
(1522, 'CVSUIBP2305416797907', '13:30:00', '14:00:00', 'Friday', 0),
(1523, 'CVSUIBP2305416797907', '14:00:00', '14:30:00', 'Friday', 0),
(1524, 'CVSUIBP2305416797907', '14:30:00', '15:00:00', 'Friday', 0),
(1525, 'CVSUIBP2305416797907', '15:00:00', '15:30:00', 'Friday', 0),
(1526, 'CVSUIBP2305416797907', '15:30:00', '16:00:00', 'Friday', 0),
(1527, 'CVSUIBP2305416797907', '16:00:00', '16:30:00', 'Friday', 0),
(1528, 'CVSUIBP2305416797907', '16:30:00', '17:00:00', 'Friday', 0),
(1529, 'CVSUIBP2305416797907', '17:00:00', '17:30:00', 'Friday', 0),
(1530, 'CVSUIBP2305416797907', '17:30:00', '18:00:00', 'Friday', 0),
(1531, 'CVSUIBP2305416797907', '18:00:00', '18:30:00', 'Friday', 0);
INSERT INTO `schedules` (`id`, `employee_id`, `time_in`, `time_out`, `day`, `isCheck`) VALUES
(1532, 'CVSUIBP2305416797907', '18:30:00', '19:00:00', 'Friday', 0),
(1533, 'CVSUIBP2305416797907', '19:00:00', '19:30:00', 'Friday', 0),
(1534, 'CVSUIBP2305416797907', '19:30:00', '20:00:00', 'Friday', 0),
(1535, 'CVSUIBP2305416797907', '07:00:00', '07:30:00', 'Saturday', 0),
(1536, 'CVSUIBP2305416797907', '07:30:00', '08:00:00', 'Saturday', 0),
(1537, 'CVSUIBP2305416797907', '08:00:00', '08:30:00', 'Saturday', 0),
(1538, 'CVSUIBP2305416797907', '08:30:00', '09:00:00', 'Saturday', 0),
(1539, 'CVSUIBP2305416797907', '09:00:00', '09:30:00', 'Saturday', 0),
(1540, 'CVSUIBP2305416797907', '09:30:00', '10:00:00', 'Saturday', 0),
(1541, 'CVSUIBP2305416797907', '10:00:00', '10:30:00', 'Saturday', 0),
(1542, 'CVSUIBP2305416797907', '10:30:00', '11:00:00', 'Saturday', 0),
(1543, 'CVSUIBP2305416797907', '11:00:00', '11:30:00', 'Saturday', 0),
(1544, 'CVSUIBP2305416797907', '11:30:00', '12:00:00', 'Saturday', 0),
(1545, 'CVSUIBP2305416797907', '12:00:00', '12:30:00', 'Saturday', 0),
(1546, 'CVSUIBP2305416797907', '12:30:00', '13:00:00', 'Saturday', 0),
(1547, 'CVSUIBP2305416797907', '13:00:00', '13:30:00', 'Saturday', 0),
(1548, 'CVSUIBP2305416797907', '13:30:00', '14:00:00', 'Saturday', 0),
(1549, 'CVSUIBP2305416797907', '14:00:00', '14:30:00', 'Saturday', 0),
(1550, 'CVSUIBP2305416797907', '14:30:00', '15:00:00', 'Saturday', 0),
(1551, 'CVSUIBP2305416797907', '15:00:00', '15:30:00', 'Saturday', 0),
(1552, 'CVSUIBP2305416797907', '15:30:00', '16:00:00', 'Saturday', 0),
(1553, 'CVSUIBP2305416797907', '16:00:00', '16:30:00', 'Saturday', 0),
(1554, 'CVSUIBP2305416797907', '16:30:00', '17:00:00', 'Saturday', 0),
(1555, 'CVSUIBP2305416797907', '17:00:00', '17:30:00', 'Saturday', 0),
(1556, 'CVSUIBP2305416797907', '17:30:00', '18:00:00', 'Saturday', 0),
(1557, 'CVSUIBP2305416797907', '18:00:00', '18:30:00', 'Saturday', 0),
(1558, 'CVSUIBP2305416797907', '18:30:00', '19:00:00', 'Saturday', 0),
(1559, 'CVSUIBP2305416797907', '19:00:00', '19:30:00', 'Saturday', 0),
(1560, 'CVSUIBP2305416797907', '19:30:00', '20:00:00', 'Saturday', 0),
(1561, 'CVSUUEG2491536877606', '07:00:00', '07:30:00', 'Monday', 0),
(1562, 'CVSUUEG2491536877606', '07:30:00', '08:00:00', 'Monday', 0),
(1563, 'CVSUUEG2491536877606', '08:00:00', '08:30:00', 'Monday', 0),
(1564, 'CVSUUEG2491536877606', '08:30:00', '09:00:00', 'Monday', 0),
(1565, 'CVSUUEG2491536877606', '09:00:00', '09:30:00', 'Monday', 0),
(1566, 'CVSUUEG2491536877606', '09:30:00', '10:00:00', 'Monday', 0),
(1567, 'CVSUUEG2491536877606', '10:00:00', '10:30:00', 'Monday', 0),
(1568, 'CVSUUEG2491536877606', '10:30:00', '11:00:00', 'Monday', 0),
(1569, 'CVSUUEG2491536877606', '11:00:00', '11:30:00', 'Monday', 0),
(1570, 'CVSUUEG2491536877606', '11:30:00', '12:00:00', 'Monday', 0),
(1571, 'CVSUUEG2491536877606', '12:00:00', '12:30:00', 'Monday', 0),
(1572, 'CVSUUEG2491536877606', '12:30:00', '13:00:00', 'Monday', 0),
(1573, 'CVSUUEG2491536877606', '13:00:00', '13:30:00', 'Monday', 0),
(1574, 'CVSUUEG2491536877606', '13:30:00', '14:00:00', 'Monday', 0),
(1575, 'CVSUUEG2491536877606', '14:00:00', '14:30:00', 'Monday', 0),
(1576, 'CVSUUEG2491536877606', '14:30:00', '15:00:00', 'Monday', 0),
(1577, 'CVSUUEG2491536877606', '15:00:00', '15:30:00', 'Monday', 0),
(1578, 'CVSUUEG2491536877606', '15:30:00', '16:00:00', 'Monday', 0),
(1579, 'CVSUUEG2491536877606', '16:00:00', '16:30:00', 'Monday', 0),
(1580, 'CVSUUEG2491536877606', '16:30:00', '17:00:00', 'Monday', 0),
(1581, 'CVSUUEG2491536877606', '17:00:00', '17:30:00', 'Monday', 0),
(1582, 'CVSUUEG2491536877606', '17:30:00', '18:00:00', 'Monday', 0),
(1583, 'CVSUUEG2491536877606', '18:00:00', '18:30:00', 'Monday', 0),
(1584, 'CVSUUEG2491536877606', '18:30:00', '19:00:00', 'Monday', 0),
(1585, 'CVSUUEG2491536877606', '19:00:00', '19:30:00', 'Monday', 0),
(1586, 'CVSUUEG2491536877606', '19:30:00', '20:00:00', 'Monday', 0),
(1587, 'CVSUUEG2491536877606', '07:00:00', '07:30:00', 'Tuesday', 0),
(1588, 'CVSUUEG2491536877606', '07:30:00', '08:00:00', 'Tuesday', 0),
(1589, 'CVSUUEG2491536877606', '08:00:00', '08:30:00', 'Tuesday', 0),
(1590, 'CVSUUEG2491536877606', '08:30:00', '09:00:00', 'Tuesday', 0),
(1591, 'CVSUUEG2491536877606', '09:00:00', '09:30:00', 'Tuesday', 0),
(1592, 'CVSUUEG2491536877606', '09:30:00', '10:00:00', 'Tuesday', 0),
(1593, 'CVSUUEG2491536877606', '10:00:00', '10:30:00', 'Tuesday', 0),
(1594, 'CVSUUEG2491536877606', '10:30:00', '11:00:00', 'Tuesday', 0),
(1595, 'CVSUUEG2491536877606', '11:00:00', '11:30:00', 'Tuesday', 0),
(1596, 'CVSUUEG2491536877606', '11:30:00', '12:00:00', 'Tuesday', 0),
(1597, 'CVSUUEG2491536877606', '12:00:00', '12:30:00', 'Tuesday', 0),
(1598, 'CVSUUEG2491536877606', '12:30:00', '13:00:00', 'Tuesday', 0),
(1599, 'CVSUUEG2491536877606', '13:00:00', '13:30:00', 'Tuesday', 0),
(1600, 'CVSUUEG2491536877606', '13:30:00', '14:00:00', 'Tuesday', 0),
(1601, 'CVSUUEG2491536877606', '14:00:00', '14:30:00', 'Tuesday', 0),
(1602, 'CVSUUEG2491536877606', '14:30:00', '15:00:00', 'Tuesday', 0),
(1603, 'CVSUUEG2491536877606', '15:00:00', '15:30:00', 'Tuesday', 0),
(1604, 'CVSUUEG2491536877606', '15:30:00', '16:00:00', 'Tuesday', 0),
(1605, 'CVSUUEG2491536877606', '16:00:00', '16:30:00', 'Tuesday', 0),
(1606, 'CVSUUEG2491536877606', '16:30:00', '17:00:00', 'Tuesday', 0),
(1607, 'CVSUUEG2491536877606', '17:00:00', '17:30:00', 'Tuesday', 0),
(1608, 'CVSUUEG2491536877606', '17:30:00', '18:00:00', 'Tuesday', 0),
(1609, 'CVSUUEG2491536877606', '18:00:00', '18:30:00', 'Tuesday', 0),
(1610, 'CVSUUEG2491536877606', '18:30:00', '19:00:00', 'Tuesday', 0),
(1611, 'CVSUUEG2491536877606', '19:00:00', '19:30:00', 'Tuesday', 0),
(1612, 'CVSUUEG2491536877606', '19:30:00', '20:00:00', 'Tuesday', 0),
(1613, 'CVSUUEG2491536877606', '07:00:00', '07:30:00', 'Wednesday', 0),
(1614, 'CVSUUEG2491536877606', '07:30:00', '08:00:00', 'Wednesday', 0),
(1615, 'CVSUUEG2491536877606', '08:00:00', '08:30:00', 'Wednesday', 0),
(1616, 'CVSUUEG2491536877606', '08:30:00', '09:00:00', 'Wednesday', 0),
(1617, 'CVSUUEG2491536877606', '09:00:00', '09:30:00', 'Wednesday', 0),
(1618, 'CVSUUEG2491536877606', '09:30:00', '10:00:00', 'Wednesday', 0),
(1619, 'CVSUUEG2491536877606', '10:00:00', '10:30:00', 'Wednesday', 0),
(1620, 'CVSUUEG2491536877606', '10:30:00', '11:00:00', 'Wednesday', 0),
(1621, 'CVSUUEG2491536877606', '11:00:00', '11:30:00', 'Wednesday', 0),
(1622, 'CVSUUEG2491536877606', '11:30:00', '12:00:00', 'Wednesday', 0),
(1623, 'CVSUUEG2491536877606', '12:00:00', '12:30:00', 'Wednesday', 0),
(1624, 'CVSUUEG2491536877606', '12:30:00', '13:00:00', 'Wednesday', 0),
(1625, 'CVSUUEG2491536877606', '13:00:00', '13:30:00', 'Wednesday', 0),
(1626, 'CVSUUEG2491536877606', '13:30:00', '14:00:00', 'Wednesday', 0),
(1627, 'CVSUUEG2491536877606', '14:00:00', '14:30:00', 'Wednesday', 0),
(1628, 'CVSUUEG2491536877606', '14:30:00', '15:00:00', 'Wednesday', 0),
(1629, 'CVSUUEG2491536877606', '15:00:00', '15:30:00', 'Wednesday', 0),
(1630, 'CVSUUEG2491536877606', '15:30:00', '16:00:00', 'Wednesday', 0),
(1631, 'CVSUUEG2491536877606', '16:00:00', '16:30:00', 'Wednesday', 0),
(1632, 'CVSUUEG2491536877606', '16:30:00', '17:00:00', 'Wednesday', 0),
(1633, 'CVSUUEG2491536877606', '17:00:00', '17:30:00', 'Wednesday', 0),
(1634, 'CVSUUEG2491536877606', '17:30:00', '18:00:00', 'Wednesday', 0),
(1635, 'CVSUUEG2491536877606', '18:00:00', '18:30:00', 'Wednesday', 0),
(1636, 'CVSUUEG2491536877606', '18:30:00', '19:00:00', 'Wednesday', 0),
(1637, 'CVSUUEG2491536877606', '19:00:00', '19:30:00', 'Wednesday', 0),
(1638, 'CVSUUEG2491536877606', '19:30:00', '20:00:00', 'Wednesday', 0),
(1639, 'CVSUUEG2491536877606', '07:00:00', '07:30:00', 'Thursday', 0),
(1640, 'CVSUUEG2491536877606', '07:30:00', '08:00:00', 'Thursday', 0),
(1641, 'CVSUUEG2491536877606', '08:00:00', '08:30:00', 'Thursday', 0),
(1642, 'CVSUUEG2491536877606', '08:30:00', '09:00:00', 'Thursday', 0),
(1643, 'CVSUUEG2491536877606', '09:00:00', '09:30:00', 'Thursday', 0),
(1644, 'CVSUUEG2491536877606', '09:30:00', '10:00:00', 'Thursday', 0),
(1645, 'CVSUUEG2491536877606', '10:00:00', '10:30:00', 'Thursday', 0),
(1646, 'CVSUUEG2491536877606', '10:30:00', '11:00:00', 'Thursday', 0),
(1647, 'CVSUUEG2491536877606', '11:00:00', '11:30:00', 'Thursday', 0),
(1648, 'CVSUUEG2491536877606', '11:30:00', '12:00:00', 'Thursday', 0),
(1649, 'CVSUUEG2491536877606', '12:00:00', '12:30:00', 'Thursday', 0),
(1650, 'CVSUUEG2491536877606', '12:30:00', '13:00:00', 'Thursday', 0),
(1651, 'CVSUUEG2491536877606', '13:00:00', '13:30:00', 'Thursday', 0),
(1652, 'CVSUUEG2491536877606', '13:30:00', '14:00:00', 'Thursday', 0),
(1653, 'CVSUUEG2491536877606', '14:00:00', '14:30:00', 'Thursday', 0),
(1654, 'CVSUUEG2491536877606', '14:30:00', '15:00:00', 'Thursday', 0),
(1655, 'CVSUUEG2491536877606', '15:00:00', '15:30:00', 'Thursday', 0),
(1656, 'CVSUUEG2491536877606', '15:30:00', '16:00:00', 'Thursday', 0),
(1657, 'CVSUUEG2491536877606', '16:00:00', '16:30:00', 'Thursday', 0),
(1658, 'CVSUUEG2491536877606', '16:30:00', '17:00:00', 'Thursday', 0),
(1659, 'CVSUUEG2491536877606', '17:00:00', '17:30:00', 'Thursday', 0),
(1660, 'CVSUUEG2491536877606', '17:30:00', '18:00:00', 'Thursday', 0),
(1661, 'CVSUUEG2491536877606', '18:00:00', '18:30:00', 'Thursday', 0),
(1662, 'CVSUUEG2491536877606', '18:30:00', '19:00:00', 'Thursday', 0),
(1663, 'CVSUUEG2491536877606', '19:00:00', '19:30:00', 'Thursday', 0),
(1664, 'CVSUUEG2491536877606', '19:30:00', '20:00:00', 'Thursday', 0),
(1665, 'CVSUUEG2491536877606', '07:00:00', '07:30:00', 'Friday', 0),
(1666, 'CVSUUEG2491536877606', '07:30:00', '08:00:00', 'Friday', 0),
(1667, 'CVSUUEG2491536877606', '08:00:00', '08:30:00', 'Friday', 0),
(1668, 'CVSUUEG2491536877606', '08:30:00', '09:00:00', 'Friday', 0),
(1669, 'CVSUUEG2491536877606', '09:00:00', '09:30:00', 'Friday', 0),
(1670, 'CVSUUEG2491536877606', '09:30:00', '10:00:00', 'Friday', 0),
(1671, 'CVSUUEG2491536877606', '10:00:00', '10:30:00', 'Friday', 0),
(1672, 'CVSUUEG2491536877606', '10:30:00', '11:00:00', 'Friday', 0),
(1673, 'CVSUUEG2491536877606', '11:00:00', '11:30:00', 'Friday', 0),
(1674, 'CVSUUEG2491536877606', '11:30:00', '12:00:00', 'Friday', 0),
(1675, 'CVSUUEG2491536877606', '12:00:00', '12:30:00', 'Friday', 0),
(1676, 'CVSUUEG2491536877606', '12:30:00', '13:00:00', 'Friday', 0),
(1677, 'CVSUUEG2491536877606', '13:00:00', '13:30:00', 'Friday', 0),
(1678, 'CVSUUEG2491536877606', '13:30:00', '14:00:00', 'Friday', 0),
(1679, 'CVSUUEG2491536877606', '14:00:00', '14:30:00', 'Friday', 0),
(1680, 'CVSUUEG2491536877606', '14:30:00', '15:00:00', 'Friday', 0),
(1681, 'CVSUUEG2491536877606', '15:00:00', '15:30:00', 'Friday', 0),
(1682, 'CVSUUEG2491536877606', '15:30:00', '16:00:00', 'Friday', 0),
(1683, 'CVSUUEG2491536877606', '16:00:00', '16:30:00', 'Friday', 0),
(1684, 'CVSUUEG2491536877606', '16:30:00', '17:00:00', 'Friday', 0),
(1685, 'CVSUUEG2491536877606', '17:00:00', '17:30:00', 'Friday', 0),
(1686, 'CVSUUEG2491536877606', '17:30:00', '18:00:00', 'Friday', 0),
(1687, 'CVSUUEG2491536877606', '18:00:00', '18:30:00', 'Friday', 0),
(1688, 'CVSUUEG2491536877606', '18:30:00', '19:00:00', 'Friday', 0),
(1689, 'CVSUUEG2491536877606', '19:00:00', '19:30:00', 'Friday', 0),
(1690, 'CVSUUEG2491536877606', '19:30:00', '20:00:00', 'Friday', 0),
(1691, 'CVSUUEG2491536877606', '07:00:00', '07:30:00', 'Saturday', 0),
(1692, 'CVSUUEG2491536877606', '07:30:00', '08:00:00', 'Saturday', 0),
(1693, 'CVSUUEG2491536877606', '08:00:00', '08:30:00', 'Saturday', 0),
(1694, 'CVSUUEG2491536877606', '08:30:00', '09:00:00', 'Saturday', 0),
(1695, 'CVSUUEG2491536877606', '09:00:00', '09:30:00', 'Saturday', 0),
(1696, 'CVSUUEG2491536877606', '09:30:00', '10:00:00', 'Saturday', 0),
(1697, 'CVSUUEG2491536877606', '10:00:00', '10:30:00', 'Saturday', 0),
(1698, 'CVSUUEG2491536877606', '10:30:00', '11:00:00', 'Saturday', 0),
(1699, 'CVSUUEG2491536877606', '11:00:00', '11:30:00', 'Saturday', 0),
(1700, 'CVSUUEG2491536877606', '11:30:00', '12:00:00', 'Saturday', 0),
(1701, 'CVSUUEG2491536877606', '12:00:00', '12:30:00', 'Saturday', 0),
(1702, 'CVSUUEG2491536877606', '12:30:00', '13:00:00', 'Saturday', 0),
(1703, 'CVSUUEG2491536877606', '13:00:00', '13:30:00', 'Saturday', 0),
(1704, 'CVSUUEG2491536877606', '13:30:00', '14:00:00', 'Saturday', 0),
(1705, 'CVSUUEG2491536877606', '14:00:00', '14:30:00', 'Saturday', 0),
(1706, 'CVSUUEG2491536877606', '14:30:00', '15:00:00', 'Saturday', 0),
(1707, 'CVSUUEG2491536877606', '15:00:00', '15:30:00', 'Saturday', 0),
(1708, 'CVSUUEG2491536877606', '15:30:00', '16:00:00', 'Saturday', 0),
(1709, 'CVSUUEG2491536877606', '16:00:00', '16:30:00', 'Saturday', 0),
(1710, 'CVSUUEG2491536877606', '16:30:00', '17:00:00', 'Saturday', 0),
(1711, 'CVSUUEG2491536877606', '17:00:00', '17:30:00', 'Saturday', 0),
(1712, 'CVSUUEG2491536877606', '17:30:00', '18:00:00', 'Saturday', 0),
(1713, 'CVSUUEG2491536877606', '18:00:00', '18:30:00', 'Saturday', 0),
(1714, 'CVSUUEG2491536877606', '18:30:00', '19:00:00', 'Saturday', 0),
(1715, 'CVSUUEG2491536877606', '19:00:00', '19:30:00', 'Saturday', 0),
(1716, 'CVSUUEG2491536877606', '19:30:00', '20:00:00', 'Saturday', 0),
(1717, 'CVSUQND5468792302733', '07:00:00', '07:30:00', 'Monday', 0),
(1718, 'CVSUQND5468792302733', '07:30:00', '08:00:00', 'Monday', 0),
(1719, 'CVSUQND5468792302733', '08:00:00', '08:30:00', 'Monday', 0),
(1720, 'CVSUQND5468792302733', '08:30:00', '09:00:00', 'Monday', 0),
(1721, 'CVSUQND5468792302733', '09:00:00', '09:30:00', 'Monday', 0),
(1722, 'CVSUQND5468792302733', '09:30:00', '10:00:00', 'Monday', 0),
(1723, 'CVSUQND5468792302733', '10:00:00', '10:30:00', 'Monday', 0),
(1724, 'CVSUQND5468792302733', '10:30:00', '11:00:00', 'Monday', 0),
(1725, 'CVSUQND5468792302733', '11:00:00', '11:30:00', 'Monday', 0),
(1726, 'CVSUQND5468792302733', '11:30:00', '12:00:00', 'Monday', 0),
(1727, 'CVSUQND5468792302733', '12:00:00', '12:30:00', 'Monday', 0),
(1728, 'CVSUQND5468792302733', '12:30:00', '13:00:00', 'Monday', 0),
(1729, 'CVSUQND5468792302733', '13:00:00', '13:30:00', 'Monday', 0),
(1730, 'CVSUQND5468792302733', '13:30:00', '14:00:00', 'Monday', 0),
(1731, 'CVSUQND5468792302733', '14:00:00', '14:30:00', 'Monday', 0),
(1732, 'CVSUQND5468792302733', '14:30:00', '15:00:00', 'Monday', 0),
(1733, 'CVSUQND5468792302733', '15:00:00', '15:30:00', 'Monday', 0),
(1734, 'CVSUQND5468792302733', '15:30:00', '16:00:00', 'Monday', 0),
(1735, 'CVSUQND5468792302733', '16:00:00', '16:30:00', 'Monday', 0),
(1736, 'CVSUQND5468792302733', '16:30:00', '17:00:00', 'Monday', 0),
(1737, 'CVSUQND5468792302733', '17:00:00', '17:30:00', 'Monday', 0),
(1738, 'CVSUQND5468792302733', '17:30:00', '18:00:00', 'Monday', 0),
(1739, 'CVSUQND5468792302733', '18:00:00', '18:30:00', 'Monday', 0),
(1740, 'CVSUQND5468792302733', '18:30:00', '19:00:00', 'Monday', 0),
(1741, 'CVSUQND5468792302733', '19:00:00', '19:30:00', 'Monday', 0),
(1742, 'CVSUQND5468792302733', '19:30:00', '20:00:00', 'Monday', 0),
(1743, 'CVSUQND5468792302733', '07:00:00', '07:30:00', 'Tuesday', 0),
(1744, 'CVSUQND5468792302733', '07:30:00', '08:00:00', 'Tuesday', 0),
(1745, 'CVSUQND5468792302733', '08:00:00', '08:30:00', 'Tuesday', 0),
(1746, 'CVSUQND5468792302733', '08:30:00', '09:00:00', 'Tuesday', 0),
(1747, 'CVSUQND5468792302733', '09:00:00', '09:30:00', 'Tuesday', 0),
(1748, 'CVSUQND5468792302733', '09:30:00', '10:00:00', 'Tuesday', 0),
(1749, 'CVSUQND5468792302733', '10:00:00', '10:30:00', 'Tuesday', 0),
(1750, 'CVSUQND5468792302733', '10:30:00', '11:00:00', 'Tuesday', 0),
(1751, 'CVSUQND5468792302733', '11:00:00', '11:30:00', 'Tuesday', 0),
(1752, 'CVSUQND5468792302733', '11:30:00', '12:00:00', 'Tuesday', 0),
(1753, 'CVSUQND5468792302733', '12:00:00', '12:30:00', 'Tuesday', 0),
(1754, 'CVSUQND5468792302733', '12:30:00', '13:00:00', 'Tuesday', 0),
(1755, 'CVSUQND5468792302733', '13:00:00', '13:30:00', 'Tuesday', 0),
(1756, 'CVSUQND5468792302733', '13:30:00', '14:00:00', 'Tuesday', 0),
(1757, 'CVSUQND5468792302733', '14:00:00', '14:30:00', 'Tuesday', 0),
(1758, 'CVSUQND5468792302733', '14:30:00', '15:00:00', 'Tuesday', 0),
(1759, 'CVSUQND5468792302733', '15:00:00', '15:30:00', 'Tuesday', 0),
(1760, 'CVSUQND5468792302733', '15:30:00', '16:00:00', 'Tuesday', 0),
(1761, 'CVSUQND5468792302733', '16:00:00', '16:30:00', 'Tuesday', 0),
(1762, 'CVSUQND5468792302733', '16:30:00', '17:00:00', 'Tuesday', 0),
(1763, 'CVSUQND5468792302733', '17:00:00', '17:30:00', 'Tuesday', 0),
(1764, 'CVSUQND5468792302733', '17:30:00', '18:00:00', 'Tuesday', 0),
(1765, 'CVSUQND5468792302733', '18:00:00', '18:30:00', 'Tuesday', 0),
(1766, 'CVSUQND5468792302733', '18:30:00', '19:00:00', 'Tuesday', 0),
(1767, 'CVSUQND5468792302733', '19:00:00', '19:30:00', 'Tuesday', 0),
(1768, 'CVSUQND5468792302733', '19:30:00', '20:00:00', 'Tuesday', 0),
(1769, 'CVSUQND5468792302733', '07:00:00', '07:30:00', 'Wednesday', 0),
(1770, 'CVSUQND5468792302733', '07:30:00', '08:00:00', 'Wednesday', 0),
(1771, 'CVSUQND5468792302733', '08:00:00', '08:30:00', 'Wednesday', 0),
(1772, 'CVSUQND5468792302733', '08:30:00', '09:00:00', 'Wednesday', 0),
(1773, 'CVSUQND5468792302733', '09:00:00', '09:30:00', 'Wednesday', 0),
(1774, 'CVSUQND5468792302733', '09:30:00', '10:00:00', 'Wednesday', 0),
(1775, 'CVSUQND5468792302733', '10:00:00', '10:30:00', 'Wednesday', 0),
(1776, 'CVSUQND5468792302733', '10:30:00', '11:00:00', 'Wednesday', 0),
(1777, 'CVSUQND5468792302733', '11:00:00', '11:30:00', 'Wednesday', 0),
(1778, 'CVSUQND5468792302733', '11:30:00', '12:00:00', 'Wednesday', 0),
(1779, 'CVSUQND5468792302733', '12:00:00', '12:30:00', 'Wednesday', 0),
(1780, 'CVSUQND5468792302733', '12:30:00', '13:00:00', 'Wednesday', 0),
(1781, 'CVSUQND5468792302733', '13:00:00', '13:30:00', 'Wednesday', 0),
(1782, 'CVSUQND5468792302733', '13:30:00', '14:00:00', 'Wednesday', 0),
(1783, 'CVSUQND5468792302733', '14:00:00', '14:30:00', 'Wednesday', 0),
(1784, 'CVSUQND5468792302733', '14:30:00', '15:00:00', 'Wednesday', 0),
(1785, 'CVSUQND5468792302733', '15:00:00', '15:30:00', 'Wednesday', 0),
(1786, 'CVSUQND5468792302733', '15:30:00', '16:00:00', 'Wednesday', 0),
(1787, 'CVSUQND5468792302733', '16:00:00', '16:30:00', 'Wednesday', 0),
(1788, 'CVSUQND5468792302733', '16:30:00', '17:00:00', 'Wednesday', 0),
(1789, 'CVSUQND5468792302733', '17:00:00', '17:30:00', 'Wednesday', 0),
(1790, 'CVSUQND5468792302733', '17:30:00', '18:00:00', 'Wednesday', 0),
(1791, 'CVSUQND5468792302733', '18:00:00', '18:30:00', 'Wednesday', 0),
(1792, 'CVSUQND5468792302733', '18:30:00', '19:00:00', 'Wednesday', 0),
(1793, 'CVSUQND5468792302733', '19:00:00', '19:30:00', 'Wednesday', 0),
(1794, 'CVSUQND5468792302733', '19:30:00', '20:00:00', 'Wednesday', 0),
(1795, 'CVSUQND5468792302733', '07:00:00', '07:30:00', 'Thursday', 0),
(1796, 'CVSUQND5468792302733', '07:30:00', '08:00:00', 'Thursday', 0),
(1797, 'CVSUQND5468792302733', '08:00:00', '08:30:00', 'Thursday', 0),
(1798, 'CVSUQND5468792302733', '08:30:00', '09:00:00', 'Thursday', 0),
(1799, 'CVSUQND5468792302733', '09:00:00', '09:30:00', 'Thursday', 0),
(1800, 'CVSUQND5468792302733', '09:30:00', '10:00:00', 'Thursday', 0),
(1801, 'CVSUQND5468792302733', '10:00:00', '10:30:00', 'Thursday', 0),
(1802, 'CVSUQND5468792302733', '10:30:00', '11:00:00', 'Thursday', 0),
(1803, 'CVSUQND5468792302733', '11:00:00', '11:30:00', 'Thursday', 0),
(1804, 'CVSUQND5468792302733', '11:30:00', '12:00:00', 'Thursday', 0),
(1805, 'CVSUQND5468792302733', '12:00:00', '12:30:00', 'Thursday', 0),
(1806, 'CVSUQND5468792302733', '12:30:00', '13:00:00', 'Thursday', 0),
(1807, 'CVSUQND5468792302733', '13:00:00', '13:30:00', 'Thursday', 0),
(1808, 'CVSUQND5468792302733', '13:30:00', '14:00:00', 'Thursday', 0),
(1809, 'CVSUQND5468792302733', '14:00:00', '14:30:00', 'Thursday', 0),
(1810, 'CVSUQND5468792302733', '14:30:00', '15:00:00', 'Thursday', 0),
(1811, 'CVSUQND5468792302733', '15:00:00', '15:30:00', 'Thursday', 0),
(1812, 'CVSUQND5468792302733', '15:30:00', '16:00:00', 'Thursday', 0),
(1813, 'CVSUQND5468792302733', '16:00:00', '16:30:00', 'Thursday', 0),
(1814, 'CVSUQND5468792302733', '16:30:00', '17:00:00', 'Thursday', 0),
(1815, 'CVSUQND5468792302733', '17:00:00', '17:30:00', 'Thursday', 0),
(1816, 'CVSUQND5468792302733', '17:30:00', '18:00:00', 'Thursday', 0),
(1817, 'CVSUQND5468792302733', '18:00:00', '18:30:00', 'Thursday', 0),
(1818, 'CVSUQND5468792302733', '18:30:00', '19:00:00', 'Thursday', 0),
(1819, 'CVSUQND5468792302733', '19:00:00', '19:30:00', 'Thursday', 0),
(1820, 'CVSUQND5468792302733', '19:30:00', '20:00:00', 'Thursday', 0),
(1821, 'CVSUQND5468792302733', '07:00:00', '07:30:00', 'Friday', 0),
(1822, 'CVSUQND5468792302733', '07:30:00', '08:00:00', 'Friday', 0),
(1823, 'CVSUQND5468792302733', '08:00:00', '08:30:00', 'Friday', 0),
(1824, 'CVSUQND5468792302733', '08:30:00', '09:00:00', 'Friday', 0),
(1825, 'CVSUQND5468792302733', '09:00:00', '09:30:00', 'Friday', 0),
(1826, 'CVSUQND5468792302733', '09:30:00', '10:00:00', 'Friday', 0),
(1827, 'CVSUQND5468792302733', '10:00:00', '10:30:00', 'Friday', 0),
(1828, 'CVSUQND5468792302733', '10:30:00', '11:00:00', 'Friday', 0),
(1829, 'CVSUQND5468792302733', '11:00:00', '11:30:00', 'Friday', 0),
(1830, 'CVSUQND5468792302733', '11:30:00', '12:00:00', 'Friday', 0),
(1831, 'CVSUQND5468792302733', '12:00:00', '12:30:00', 'Friday', 0),
(1832, 'CVSUQND5468792302733', '12:30:00', '13:00:00', 'Friday', 0),
(1833, 'CVSUQND5468792302733', '13:00:00', '13:30:00', 'Friday', 0),
(1834, 'CVSUQND5468792302733', '13:30:00', '14:00:00', 'Friday', 0),
(1835, 'CVSUQND5468792302733', '14:00:00', '14:30:00', 'Friday', 0),
(1836, 'CVSUQND5468792302733', '14:30:00', '15:00:00', 'Friday', 0),
(1837, 'CVSUQND5468792302733', '15:00:00', '15:30:00', 'Friday', 0),
(1838, 'CVSUQND5468792302733', '15:30:00', '16:00:00', 'Friday', 0),
(1839, 'CVSUQND5468792302733', '16:00:00', '16:30:00', 'Friday', 0),
(1840, 'CVSUQND5468792302733', '16:30:00', '17:00:00', 'Friday', 0),
(1841, 'CVSUQND5468792302733', '17:00:00', '17:30:00', 'Friday', 0),
(1842, 'CVSUQND5468792302733', '17:30:00', '18:00:00', 'Friday', 0),
(1843, 'CVSUQND5468792302733', '18:00:00', '18:30:00', 'Friday', 0),
(1844, 'CVSUQND5468792302733', '18:30:00', '19:00:00', 'Friday', 0),
(1845, 'CVSUQND5468792302733', '19:00:00', '19:30:00', 'Friday', 0),
(1846, 'CVSUQND5468792302733', '19:30:00', '20:00:00', 'Friday', 0),
(1847, 'CVSUQND5468792302733', '07:00:00', '07:30:00', 'Saturday', 0),
(1848, 'CVSUQND5468792302733', '07:30:00', '08:00:00', 'Saturday', 0),
(1849, 'CVSUQND5468792302733', '08:00:00', '08:30:00', 'Saturday', 0),
(1850, 'CVSUQND5468792302733', '08:30:00', '09:00:00', 'Saturday', 0),
(1851, 'CVSUQND5468792302733', '09:00:00', '09:30:00', 'Saturday', 0),
(1852, 'CVSUQND5468792302733', '09:30:00', '10:00:00', 'Saturday', 0),
(1853, 'CVSUQND5468792302733', '10:00:00', '10:30:00', 'Saturday', 0),
(1854, 'CVSUQND5468792302733', '10:30:00', '11:00:00', 'Saturday', 0),
(1855, 'CVSUQND5468792302733', '11:00:00', '11:30:00', 'Saturday', 0),
(1856, 'CVSUQND5468792302733', '11:30:00', '12:00:00', 'Saturday', 0),
(1857, 'CVSUQND5468792302733', '12:00:00', '12:30:00', 'Saturday', 0),
(1858, 'CVSUQND5468792302733', '12:30:00', '13:00:00', 'Saturday', 0),
(1859, 'CVSUQND5468792302733', '13:00:00', '13:30:00', 'Saturday', 0),
(1860, 'CVSUQND5468792302733', '13:30:00', '14:00:00', 'Saturday', 0),
(1861, 'CVSUQND5468792302733', '14:00:00', '14:30:00', 'Saturday', 0),
(1862, 'CVSUQND5468792302733', '14:30:00', '15:00:00', 'Saturday', 0),
(1863, 'CVSUQND5468792302733', '15:00:00', '15:30:00', 'Saturday', 0),
(1864, 'CVSUQND5468792302733', '15:30:00', '16:00:00', 'Saturday', 0),
(1865, 'CVSUQND5468792302733', '16:00:00', '16:30:00', 'Saturday', 0),
(1866, 'CVSUQND5468792302733', '16:30:00', '17:00:00', 'Saturday', 0),
(1867, 'CVSUQND5468792302733', '17:00:00', '17:30:00', 'Saturday', 0),
(1868, 'CVSUQND5468792302733', '17:30:00', '18:00:00', 'Saturday', 0),
(1869, 'CVSUQND5468792302733', '18:00:00', '18:30:00', 'Saturday', 0),
(1870, 'CVSUQND5468792302733', '18:30:00', '19:00:00', 'Saturday', 0),
(1871, 'CVSUQND5468792302733', '19:00:00', '19:30:00', 'Saturday', 0),
(1872, 'CVSUQND5468792302733', '19:30:00', '20:00:00', 'Saturday', 0);

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
(9, 'Sample Task', 'Sample Task Edit', 'CVSUKNC085291637', '2022-04-22', '0000-00-00', 0, '2022-04-15 22:45:33');

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
(8, 'PWE-235', 'Sample Course', 'Sample Course 102');

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
(8, 'CVSUTRAZCS021983754', 'Sample Training', 'Sample Objective', 8, 5, '2022-04-16 22:58:00', '2022-04-17 22:58:00', 'Online', 'Zoom Meeting :  sample link', '24', 6, 'Francis Ong', 'Web Developer', 'inactive');

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
(29, 'CVSUATTSOR846721903', 'CVSUKNC085291637', 'CVSUTRAZCS021983754', '', 'Finished', 0, '2022-04-15', '');

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
(6, 'CVSUTVZLX819570264', 'CVSU', 'vendor@cvsu.edu.ph', '087354132423', 'Sample Exeperience', 'Juan Dela Cruz');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `allowance`
--
ALTER TABLE `allowance`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attendance_correction`
--
ALTER TABLE `attendance_correction`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `benefit_record`
--
ALTER TABLE `benefit_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cash_advance`
--
ALTER TABLE `cash_advance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deduction_employee`
--
ALTER TABLE `deduction_employee`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deduction_vendor`
--
ALTER TABLE `deduction_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department_category`
--
ALTER TABLE `department_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `disciplinary_action`
--
ALTER TABLE `disciplinary_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disciplinary_category`
--
ALTER TABLE `disciplinary_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `document_folder`
--
ALTER TABLE `document_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `employment_category`
--
ALTER TABLE `employment_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `emp_max_hours`
--
ALTER TABLE `emp_max_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_request`
--
ALTER TABLE `event_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `overtime_request`
--
ALTER TABLE `overtime_request`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payroll_coverage_table`
--
ALTER TABLE `payroll_coverage_table`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payroll_summary`
--
ALTER TABLE `payroll_summary`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1873;

--
-- AUTO_INCREMENT for table `ssl_table`
--
ALTER TABLE `ssl_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `training_list`
--
ALTER TABLE `training_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `training_record`
--
ALTER TABLE `training_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `training_vendor`
--
ALTER TABLE `training_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
