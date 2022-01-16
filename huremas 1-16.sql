-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2022 at 07:33 PM
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
(1, 'CVSUEJT052613497', 'admin', '$2y$10$jopL5bSinvWaDY2nFjufIeb.u9ZFPgmWB0zoL7P60BPPbP2Ix9XMC', 'admin123', 'admin', '2021-12-12 16:15:30'),
(45, 'CVSUJPS103467598', 'howard.richmond_7598', '$2y$10$jopL5bSinvWaDY2nFjufIeb.u9ZFPgmWB0zoL7P60BPPbP2Ix9XMC', 'Z086P197243F', 'employee', '2021-12-12 16:46:40'),
(46, 'CVSUFIZ562147308', 'ong.francis_7308', '$2y$10$jopL5bSinvWaDY2nFjufIeb.u9ZFPgmWB0zoL7P60BPPbP2Ix9XMC', 'A2Z910538I46', 'employee', '2021-12-12 17:06:48'),
(47, 'CVSUZRO036571482', 'cooper.foreman_1482', '$2y$10$jopL5bSinvWaDY2nFjufIeb.u9ZFPgmWB0zoL7P60BPPbP2Ix9XMC', '8L317254P0A9', 'employee', '2021-12-12 17:07:50');

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
(1, 'CVSUZRO036571482', '2022-01-07', '06:39:00', '17:39:00', 'Trys', '2', 'Ran Taken', '0.00', 'Test'),
(2, 'CVSUFIZ562147308', '2022-01-20', '10:01:00', '22:01:00', 'details', '0', NULL, NULL, NULL),
(3, 'CVSUFIZ562147308', '2022-01-21', '00:34:00', '23:34:00', 'details', '0', NULL, NULL, NULL);

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
(56, 2021894537102, 'CVSUJOBKLS30765', '2021-11-17 03:54:58', 'Francis', 'Condino', 'Ong', 'francis@gmail.com', '12316512341', '2021894537102.pdf', 'On-Board', ''),
(67, 2021970316584, 'CVSUJOBYID78135', '2021-11-25 16:37:11', 'sample', 'sample', 'sample', 'sample@gmail.com', '1231231', '2021970316584.pdf', 'On-Board', ''),
(68, 2021478906231, 'CVSUJOBYID78135', '2021-11-25 16:41:39', 'mabait', 'mabait', 'mabait', 'mabait@gmail.com', '123123', '2021478906231.pdf', 'On-Board', ''),
(69, 2021690251483, 'CVSUJOBYID78135', '2021-11-25 16:44:32', 'asdas', 'dasd', 'asd', 'asd@gmail.com', '123213', '2021690251483.pdf', 'On-Board', ''),
(70, 2021512486907, 'CVSUJOBYID78135', '2021-11-25 16:47:45', 'adasd', 'asd', 'asd', 'asda@gmail.com', '123123', '2021512486907.pdf', 'On-Board', '');

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
(5, 'CVSUZRO036571482', '2021-12-13 15:32:37', '2021-12-12 09:00:00', '2021-12-12 16:00:00'),
(7, 'CVSUZRO036571482', '2021-12-13 17:51:50', '2021-12-13 08:51:00', '2021-12-13 18:00:00'),
(8, 'CVSURIB015736298', '2021-12-13 18:02:57', '2021-12-13 06:02:00', '2021-12-13 15:00:00'),
(13, 'CVSUZRO036571482', '2021-12-19 13:57:29', '2021-12-19 13:57:00', '2021-12-19 19:57:00'),
(14, 'CVSUFIZ562147308', '2021-12-19 14:05:56', '2021-12-18 14:05:56', NULL),
(15, 'CVSUFIZ562147308', '2021-12-19 14:11:07', '2021-12-19 14:11:07', '2021-12-19 14:11:16'),
(16, 'CVSUZRO036571482', '2021-12-21 12:51:39', '2021-12-21 12:51:39', '2021-12-21 16:10:29'),
(17, 'CVSUFIZ562147308', '2022-01-13 18:55:44', '2022-01-13 06:55:00', '2022-01-13 18:55:00');

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
(5, 13, '2021-12-19 13:57:00', '2021-12-19 19:57:00', '1', 'Test1', '2021-12-21 16:22:18', 'Ran Taken'),
(6, 16, '2021-12-21 07:00:00', '2021-12-21 16:10:00', '0', 'Test', '2021-12-22 21:47:59', NULL);

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
(1, 'CVSUBENVSM759042638', 'Clothing Allowance', 'Section 50 of the General Provisions of Republic Act (R.A.) No. 10964 or the\r\nFiscal Year (FY) 2018 General Appropriations Act (GAA) provides that an\r\namount not exceeding Six Thousand Pesos (P6,000) per annum is authorized\r\nfor the payment of U/CA of each qualified government employee, subject to\r\nthe guidelines, rules and regulations issued by the Department of Budget and\r\nManagement (DBM).\r\n'),
(3, 'CVSUBENEOV791084562', 'Midyear Pay Workload', 'PHP 3000, cash incentives'),
(4, 'CVSUBENEOV791084566', '13th Month Pay', 'An additional amount of compensation, calculated from a single month\'s salary'),
(8, 'CVSUBENHOJ169345287', 'Sample Benefit', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint velit magni cumque vitae distinctio sapiente quae dolores, ipsa iste quos quas voluptates reprehenderit incidunt ut enim animi, unde qui porro!Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint velit magni cumque vitae distinctio sapiente quae dolores, ipsa iste quos quas voluptates reprehenderit incidunt ut enim animi, unde qui porro!Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint velit magni cumque vitae distinctio sapiente quae dolores, ipsa iste quos quas voluptates reprehenderit incidunt ut enim animi, unde qui porro!Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint velit magni cumque vitae distinctio sapiente quae dolores, ipsa iste quos quas voluptates reprehenderit incidunt ut enim animi, unde qui porro!Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint velit magni cumque vitae distinctio sapiente quae dolores, ipsa iste quos quas voluptates reprehenderit incidunt ut enim animi, unde qui porro!');

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
  `amount` decimal(10,0) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reviewed_by` varchar(100) DEFAULT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash_advance`
--

INSERT INTO `cash_advance` (`id`, `reference_id`, `employee_id`, `req_date`, `ca_type`, `ca_reason`, `amount`, `status`, `reviewed_by`, `notes`) VALUES
(10, 'CAOGM136985204', 'CVSUZRO036571482', '2021-12-21', 'Cash', 'Need', '1000', 'Approved', 'Ran Taken', 'CHecked'),
(11, 'CAYJP138752096', 'CVSUZRO036571482', '2021-12-21', 'Cash', 'TEst2', '999', 'Rejected', 'Ran Taken', 'Test'),
(12, 'CAPYF805136427', 'CVSUFIZ562147308', '2022-01-14', 'Cash', 'Need for Medical Emergency', '1000', 'Approved', 'Ran Taken', 'Approved'),
(13, 'CAUPK468097125', 'CVSUFIZ562147308', '2022-01-14', 'Cheque', 'Emergency Fund', '5000', 'Rejected', 'Ran Taken', 'Rejected'),
(14, 'CAYRX187902346', 'CVSUFIZ562147308', '2022-01-14', 'Cash', 'Emergency Fund', '300', 'Pending', NULL, '');

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
(7, 'CVSUDTXBYH3142', 'SSS Loan Payment', 'Gross Percent', 'Payment for All types of Loan', 4, 30, 1000, 'Period'),
(8, 'CVSUDTCSGX3765', 'Deduction', 'Gross Percent', 'description', 13, 3, 0, 'None'),
(9, 'CVSUDTTYVA1978', 'Dental Fee', 'Fixed Amount', 'Dental Fee Deduction', 6, 1000, 0, 'None'),
(16, 'CVSUDTRTIW8360', 'Life Insurance', 'Fixed Amount', 'Insulife Deduction', 19, 2000, 0, 'None'),
(19, 'CVSUDTRVJF0615', 'Sample Deduction 1', 'Fixed Amount', '1', 5, 1, 0, 'None'),
(20, 'CVSUDTKJXE2513', 'Sample Deduction 2', 'Fixed Amount', '1', 19, 1, 0, 'None'),
(21, 'CVSUDTTYBS2083', 'Sample Deduction 3', 'Fixed Amount', '1', 12, 1, 0, 'None');

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
(4, 'CVSUVENHBR706', '242-124-213', 'Social Security System', 'SSS - Bacoor Branch', 'Government', 'SSS - Mandatory 2021'),
(5, 'CVSUVENMHG17403', '242-124-213', 'Pag-ibig', 'Pag-ibig - Bacoor Branch', 'Government', 'Pag-ibig Contribution 2021'),
(6, 'CVSUVENEVP18926', '232-11-23', 'Healthy Smile Dental', 'Sm - Bacoor City', 'Private', 'Dental Vendor'),
(12, 'CVSUVENONB16452', '1111', 'Phil-Health', 'Philhealth - Bacoor Branch', 'Government', 'Goverment Agency for Health '),
(13, 'CVSUVENLEV29813', '24-24-213', 'Cavite State University - Imus', 'Imus, cavite', 'Local', 'State University'),
(19, 'CVSUVENERU26573', '241112-124-213', 'Insulife', 'Insulife - USA', 'International', 'Life Insurance to ensure you future'),
(20, 'CVSUVENJSQ87069', '242-124-21233', 'Bureau of Internal Revenue', 'Bacoor City', 'Government', 'BIR - Tax Reform');

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
(8, 'CVSUDADOA35164', 'CVSUFIZ562147308', '2022-01-14', 1, 'Kindly report to the HR', 'CVSUDADOA35164.pdf', 'Please accept my apology.........', '3 day Suspesion', 'we cant tolerate your action this time, so were giving a 3 day suspension for this one.....', 'Ran Taken', 'Reviewed');

-- --------------------------------------------------------

--
-- Table structure for table `disciplinary_category`
--

CREATE TABLE `disciplinary_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cat_type` varchar(100) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disciplinary_category`
--

INSERT INTO `disciplinary_category` (`id`, `title`, `cat_type`, `details`) VALUES
(1, 'Verbal Warning', 'Malala', 'Testing'),
(2, 'Written Warning', 'MIld lngs', 'details'),
(3, 'Suspension', 'OMG', 'asdasdasdas'),
(5, 'Damage to company properties', 'N/A', 'Sample');

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
(1, 'CVSUDOXCJEM104386', 'names', 'document', 'owner', 'Institutional Records', '2021-11-13', 'details', 'CVSUEJT052613497', 1, 'Exercise 7.pdf', 0, 0),
(2, 'CVSUDOXCPDO153679', 'sample resume', 'document', 'jaun dela cruz', 'Employees Resume', '2021-12-13', 'smaple dtails', 'CVSUEJT052613497', 0, 'Exercise 8.pdf', 0, 0),
(3, 'CVSUDOXCFAY386410', 'cvsu docu #2', 'document', 'xdxd', 'Institutional Records', '2021-12-13', 'xdxdx', 'CVSUEJT052613497', 0, 'Exercise 8.pdf', 0, 0),
(4, 'CVSUDOXCBXE243598', 'hr docu', 'document', '1231', 'Human Resource', '2021-12-13', '123123', 'CVSUEJT052613497', 0, 'Exercise 8.pdf', 0, 0),
(5, 'CVSUDOXCXRV803761', 'exercise 7', 'document', 'sir rods', 'Institutional Records', '2021-12-14', 'exercise 7', 'CVSUEJT052613497', 0, 'Exercise 7.pdf', 0, 0),
(6, 'CVSUDOXCGOL245869', 'imggggg', 'document', 'haha', 'Institutional Records', '2021-12-14', 'hahah', 'CVSUEJT052613497', 0, 'img.png', 0, 0),
(7, 'CVSUDOXCUIC283741', 'excel', 'document', 'hah', 'Institutional Records', '2021-12-14', 'ahaha', 'CVSUEJT052613497', 0, 'esample excel.xlsx', 0, 0),
(8, 'CVSUDOXCEMH463859', 'wordsss', 'document', 'easda', 'Institutional Records', '2021-12-14', 'dasdas', 'CVSUEJT052613497', 0, 'word.docx', 0, 0),
(9, 'CVSUDOXCMBR947831', 'ashahahaha', 'document', 'sadasd', 'Institutional Records', '2021-12-14', 'asdad', 'CVSUEJT052613497', 0, 'xdxdx.php', 0, 0),
(10, 'CVSUDOXCFWE975621', 'zipewqeqweqwe', 'document', 'haha', 'Institutional Records', '2021-12-14', 'hahaha', 'CVSUEJT052613497', 0, 'xdxdx.zip', 0, 0),
(11, 'CVSUDOXCCFA236718', 'fgile sampeleee', 'document', 'adaf', 'Institutional Records', '2021-12-14', 'asfasfas', 'CVSUEJT052613497', 0, 'xdxdx.php', 0, 0),
(12, 'CVSUDOXCJEI640529', 'first upload', 'document', 'optional', 'CVSUFOLDHTR701459', '0000-00-00', 'pdf', 'CVSUEJT052613497', 0, 'Exercise 8.pdf', 0, 1),
(13, 'CVSUDOXCJUZ093741', 'Francis Resume', 'document', 'francis ong', 'Employees Resume', '2021-12-14', 'xdxd haha', 'CVSUEJT052613497', 0, 'Exercise 8.pdf', 0, 0),
(14, 'CVSUDOXCMSO058139', 'xdxdx resume', 'document', 'xdxdxd', 'Employees Resume', '2021-12-14', 'xdxd', 'CVSUEJT052613497', 0, 'Exercise 8.pdf', 0, 0),
(15, 'CVSUDOXCBKH759261', 'rarararar', 'document', 'rarara', 'Institutional Records', '2021-12-14', 'rara', 'CVSUEJT052613497', 0, 'xdxdx.rar', 0, 0),
(16, 'CVSULINKFOL985647', 'HR meeting with Sir Rods', 'url', 'N/A', 'Human Resource', '2021-12-14', 'meeting for BSIT', 'CVSUEJT052613497', 0, 'https://meet.google.com/bot-muwn-whs?fbclid=IwAR1rhpvkOUkzXDE6NhPj1Rg7MRa7b1ycgmzgBSUiEVhWciUi-ZiSnvtndCs&pli=1', 0, 0),
(17, 'CVSULINKOEL612397', 'epbi dot com', 'url', 'mark zubergggssss', 'Human Resource', '2021-12-14', 'ez access epbi', 'CVSUEJT052613497', 0, 'https://www.facebook.com', 0, 0),
(18, 'CVSULINKHZF615028', 'link for lorem', 'url', 'asdsad', 'CVSUFOLDHTR701459', '2021-12-14', 'asdsa', 'CVSUEJT052613497', 0, 'https://www.youtube.com', 0, 0),
(19, 'CVSUDOXCQDU649125', 'xdxdsese', 'document', 'seses', 'CVSUFOLDQRM164983', '2021-12-14', 'sese', 'CVSUEJT052613497', 0, 'txt.jpg', 0, 0),
(20, 'CVSUDOXCRTF367145', 'rarararara', 'document', 'rarara', 'CVSUFOLDRCW703614', '2021-12-26', 'rararara', 'CVSUEJT052613497', 1, 'Exercise 7 (5).pdf', 0, 1),
(21, 'CVSULINKXIP503741', 'epbe dot com', 'url', 'mark zubergesxyxyx123', 'Institutional Records', '2021-12-26', 'epbi ez access123', 'CVSUEJT052613497', 0, 'https://www.facebook.com', 0, 0);

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
(3, 'CVSUFOLDUGH894672', 'hahah123', '2021-12-13', 'ahahaha123', 'CVSUEJT052613497', 0),
(7, 'CVSUFOLDWGR654029', 'sample archive 2', '2021-12-13', 'xd111', 'CVSUEJT052613497', 0),
(8, 'CVSUFOLDMFZ079283', 'archive sample', '2021-12-13', '1111', 'CVSUEJT052613497', 0),
(9, 'CVSUFOLDWRK269834', 'aaaaaaaa', '2021-12-13', 'aaaaaaaa', 'CVSUEJT052613497', 0),
(10, 'CVSUFOLDHTR701459', 'otherss', '2021-12-14', 'sdad', 'CVSUEJT052613497', 0),
(11, 'CVSUFOLDIKN368025', 'wtatata', '2021-12-14', 'wtatata', 'CVSUEJT052613497', 0),
(12, 'CVSUFOLDRCW703614', 'rererere', '2021-12-26', 'rerere', 'CVSUEJT052613497', 1);

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
(0, 'CVSUREQAGYJ246180', 'CVSUFIZ562147308', '2021-12-26', 'rararara', 'rararara', 'Exercise 7 (1).pdf', 1, 'tratasdasdsa', 'admin', NULL),
(0, 'CVSUREQANZX506218', 'CVSUFIZ562147308', '2022-01-09', 'Request for Certificate of Employment', 'Good evening Maam,\r\n\r\nI would like to request a certificate of employment to be use in.....', 'laya-diwa.jpg', 1, '123123', 'employee', NULL);

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
  `date_regularization` date DEFAULT NULL,
  `sss_id` varchar(50) DEFAULT NULL,
  `pagibig_id` varchar(50) DEFAULT NULL,
  `philhealth_id` varchar(50) DEFAULT NULL,
  `tin_num` varchar(50) DEFAULT NULL,
  `basic_salary` decimal(10,2) DEFAULT NULL,
  `daily_wage` decimal(10,2) DEFAULT NULL,
  `sss_prem` decimal(10,2) DEFAULT NULL,
  `philhealth_prem` decimal(10,2) DEFAULT NULL,
  `pagibig_prem` decimal(10,2) DEFAULT NULL,
  `created_date` date NOT NULL,
  `employee_archive` int(11) NOT NULL DEFAULT 0 COMMENT '0- active 1-archved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `firstname`, `middlename`, `lastname`, `suffix`, `address`, `birthdate`, `mobile_no`, `contact_info`, `email`, `sex`, `photo`, `position_id`, `department_id`, `schedule_id`, `category_id`, `date_hired`, `date_regularization`, `sss_id`, `pagibig_id`, `philhealth_id`, `tin_num`, `basic_salary`, `daily_wage`, `sss_prem`, `philhealth_prem`, `pagibig_prem`, `created_date`, `employee_archive`) VALUES
(3, 'CVSUEJT052613497', 'Ran', 'Was', 'Taken', 'XD', 'Salina', '2002-11-15', '09262487125', '4763233', 'dr.ranzkie99@gmail.com', 'Male', 'Untitled9.png', 7, 2, 3, 1, '2013-06-04', '2013-06-04', '34-6581234-4', '121253674428', '082504598536', '439-126-266-0488', '130000.00', '5000.00', '338.00', '112.50', '100.00', '2021-10-04', 0),
(4, 'CVSUZRO036571482', 'Foreman', 'Wade', 'Cooper', '', 'Imus', '2003-12-31', '09262848154', '4721846', 'sample@gmail.com', 'Male', 'dp.png', 1, 1, 1, 1, '2019-07-15', '0000-00-00', '34-6435234-0', '121256377429', '087584593324', '439-126-456-0000', '10400.00', '400.00', '337.50', '112.50', '50.00', '2021-11-26', 0),
(46, 'CVSUJPS103467598', 'Richmond', 'Ivan', 'Howard', 'mabait', 'Zapote', '2003-03-12', '09262487124', '4731548', 'mabait@gmail.com', 'Male', '121546080_644120502972807_2419157886757437579_n.jpg', 1, 1, 1, 1, '2021-12-07', '2022-01-21', '34-6451234-4', '121253674428', '087584593324', '439-126-266-0486', '10400.00', '400.00', '338.00', '122.50', '100.00', '2021-11-26', 0),
(47, 'CVSURIB015736298', 'Woodward Stuart', 'Dan', 'White', '', 'Kalinisan', '2001-08-17', '09262487148', '4763548', 'asd@gmail.com', 'Female', 'CVSURIB015736298.png', 1, 1, 2, 1, '2021-11-10', '2021-12-30', '34-6451234-5', '121253674424', '082504593349', '439-126-266-0447', '10400.00', '400.00', '337.50', '122.50', '50.00', '2021-11-26', 0),
(48, 'CVSUCAK697231805', 'Sebastian', 'Lewis', 'Smith', '', 'Molino', '2000-06-12', '09262198123', '4765484', 'asda@gmail.com', 'Male', 'ICON1.png', 1, 1, 3, 1, '2021-08-10', '2021-12-07', '34-6581234-0', '121253674429', '082504593324', '439-126-266-0000', '10400.00', '400.00', '337.50', '112.50', '50.00', '2021-11-26', 0),
(49, 'CVSUFIZ562147308', 'Francis', 'Condino', 'Ong', '', 'Camella', '2000-05-13', '09262487123', '4731548', 'francis@gmail.com', 'Male', '1X1PIC.png', 7, 2, 3, 1, '2015-06-10', '2015-07-23', '34-6847234-0', '129683674429', '082504598534', '439-126-266-0487', '130000.00', '5000.00', '337.50', '112.50', '50.00', '2021-11-16', 0),
(50, 'CVSUYLP047156239', 'Klaus', 'Von', 'Reinherz', '', 'Bacoor', '1999-11-15', '09262198154', '4754869', 'klaus@gmail.com', 'Male', 'Klaus.V..Reinherz.full.1876280.jpg', 1, 1, 1, 1, '2022-01-02', '0000-00-00', '34-6451234-0', '121256374429', '082507493324', '339-684-148-0000', '10400.00', '400.00', '338.00', '122.50', '50.45', '2022-01-02', 0),
(51, 'CVSUPGC530287196', 'Keeper', 'Miranda', 'Estacion', 'Jr.', 'Queen\'s Row, Apple St., Cavite', '2005-12-23', '09991234567', '4751485', 'keeper@gmail.com', 'Female', '', 6, 4, 2, 1, '2022-01-07', '0000-00-00', '34-684234-0', '121253478424', '082504268536', '439-126-456-0475', '13000.00', '500.00', '337.50', '0.00', '100.00', '2022-01-07', 0);

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
(1, 'REG', 'Regular'),
(2, 'PRO', 'Probationary'),
(3, 'RES', 'Resigned'),
(4, 'SUS', 'Suspended'),
(5, 'AWOL', 'Absent Without Leave'),
(6, 'TER', 'Terminated'),
(7, 'FNC', 'Finished Contract'),
(8, 'EXP', 'Expired'),
(9, 'CNT', 'Contractual'),
(10, 'RET', 'Retired');

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
(1, 'CVSUEVJAF7638', 'CVSU Event 2022', 'CVSUEVJAF7638.jpg', '2022-01-18', '07:01:00', '19:02:00', 'Imus'),
(2, 'CVSUEVBDZ4876', 'CVSU Intramurals', 'CVSUEVBDZ4876.jpg', '2022-01-21', '10:11:00', '22:11:00', 'CVSU Court');

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
(2, 'CVSUEVAVH8341', '123', 'CVSUEVAVH8341.jpg', '2022-01-29', '10:44:00', '22:44:00', '123', 2, 'CVSUFIZ562147308', '2022-01-13', '123'),
(3, 'CVSUEVIUF9802', 'sadasdasd', 'CVSUEVIUF9802.jpg', '2022-01-28', '11:24:00', '23:24:00', 'asdasasdasd', 2, 'CVSUFIZ562147308', '2022-01-13', 'asdasdasd'),
(4, 'CVSUEVAEK5467', '13.21312312312', 'CVSUEVAEK5467.jpg', '2022-01-19', '04:21:00', '16:21:00', '455463123', 1, 'CVSUFIZ562147308', '2022-01-13', '1312345'),
(5, 'CVSUEVMQX4273', 'event sample', 'CVSUEVMQX4273.jpg', '2022-01-21', '10:44:00', '22:44:00', 'hahaha', 1, 'CVSUFIZ562147308', '2022-01-14', 'hahahahaha'),
(6, 'CVSUEVIJX9058', 'sample', 'CVSUEVIJX9058.jpg', '2022-01-22', '08:37:00', '20:37:00', 'venue', 0, 'CVSUFIZ562147308', '2022-01-14', 'details');

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
(39, 'CVSUJOBKLS30765', 'Super Janitor', 3, 3, 3, 'Permanent', 'Full Time', 'No Experience Needed', 19, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tempora ut inventore recusandae mollitia maxime, exercitationem! Rerum, laboriosam eligendi dolores, dolorem iure pariatur voluptatibus autem cumque, perspiciatis laudantium soluta, eum.Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tempora ut inventore recusandae mollitia maxime, exercitationem! Rerum, laboriosam eligendi dolores, dolorem iure pariatur voluptatibus autem cumque, perspiciatis laudantium soluta, eum.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Hic tempora ut inventore recusandae mollitia maxime, exercitationem! Rerum, laboriosam eligendi dolores, dolorem iure pariatur voluptatibus autem cumque, perspiciatis laudantium soluta, eum.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Hic tempora ut inventore recusandae mollitia maxime, exercitationem! Rerum, laboriosam eligendi dolores, dolorem iure pariatur voluptatibus autem cumque, perspiciatis laudantium soluta, eum.', 'active', '2021-11-17 01:55:22'),
(41, 'CVSUJOBFYE01537', 'chair', 5, 2, 2, 'Permanent', 'Full Time', '10 Years + of Experience', 19, 'haha', 'active', '2021-11-24 15:50:12'),
(44, 'CVSUJOBJGL83720', 'Program Head with 50k signing Bonus ! OMG', 7, 1, 1, 'Permanent', 'Full Time', '10 Years + of Experience', 33, 'Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Vel eius praesentium natus, magni inventore aliquam magnam adipisci maxime sit nemo dolor minima commodi sint quasi, rerum blanditiis. Magni, quidem, dignissimos.Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Vel eius praesentium natus, magni inventore aliquam magnam adipisci maxime sit nemo dolor minima commodi sint quasi, rerum blanditiis. Magni, quidem, dignissimos.\r\n\r\nLorem ipsum dolor sit, amet consectetur adipisicing, elit. Vel eius praesentium natus, magni inventore aliquam magnam adipisci maxime sit nemo dolor minima commodi sint quasi, rerum blanditiis. Magni, quidem, dignissimos.', 'active', '2021-11-25 15:48:51'),
(46, 'CVSUJOBYID78135', 'Mabait na Instructor', 1, 4, 1, 'Permanent', 'Full Time', '5 Years + of Experience', 18, 'Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Vel eius praesentium natus, magni inventore aliquam magnam adipisci maxime sit nemo dolor minima commodi sint quasi, rerum blanditiis. Magni, quidem, dignissimos.Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Vel eius praesentium natus, magni inventore aliquam magnam adipisci maxime sit nemo dolor minima commodi sint quasi, rerum blanditiis. Magni, quidem, dignissimos.', 'inactive', '2021-11-25 15:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `reference_id` varchar(50) NOT NULL,
  `news_date` date NOT NULL,
  `news_headline` varchar(255) NOT NULL,
  `display_image` varchar(255) NOT NULL,
  `news_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `reference_id`, `news_date`, `news_headline`, `display_image`, `news_details`) VALUES
(7, 'CVSUNEWSEHX806957413', '2022-01-20', 'Under Development', 'CVSUNEWSEHX806957413.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(11, 'CVSUNEWSYKU137528064', '2022-01-13', 'CVSU Festival 2022', 'CVSUNEWSYKU137528064.jpg', 'Lorem ipsum dolor sit amet, consectetur, adipisicing elit. Corrupti quisquam impedit itaque reprehenderit commodi modi quis alias, beatae voluptates, velit expedita, asperiores suscipit ipsam possimus excepturi. Commodi, totam veniam aliquid?Lorem ipsum dolor sit amet, consectetur, adipisicing elit. Corrupti quisquam impedit itaque reprehenderit commodi modi quis alias, beatae voluptates, velit expedita, asperiores suscipit ipsam possimus excepturi. Commodi, totam veniam aliquid?');

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
(2, 'CVSUZRO036571482', '2021-12-22', '10:21:00', '22:21:00', 'Test', '1', 'Ran Taken', '38', 'Testing'),
(3, 'CVSUZRO036571482', '2021-12-20', '10:00:00', '23:00:00', 'Traffic eh', '0', NULL, NULL, NULL),
(5, 'CVSUFIZ562147308', '2022-01-20', '11:25:00', '23:25:00', 'Its overtime', '0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `description`, `rate`) VALUES
(1, 'Instructor', 400),
(3, 'Janitor', 230),
(5, 'Chairperson', 2000),
(6, 'Technical ', 500),
(7, 'Program Head', 5000);

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
(5, 'CVSUZRO036571482', 1, 5, 5, 5, 4, 'Test edit ok', '2021-12-08 22:44:26'),
(6, 'CVSUFIZ562147308', 5, 5, 5, 5, 5, 'very good', '2022-01-14 22:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `schedcode` varchar(10) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `schedcode`, `time_in`, `time_out`) VALUES
(1, '2021120001', '07:00:00', '16:00:00'),
(2, '2021120002', '08:00:00', '17:00:00'),
(3, '2021120003', '09:00:00', '18:00:00'),
(5, '2021110005', '07:00:00', '09:00:00');

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
(1, 'test13', 'sample3', 'CVSUZRO036571482', '2021-11-16', '2021-12-05', 2, '2021-11-29 23:30:36'),
(3, 'Sample2', 'asdasdasggg', 'CVSURIB015736298', '2021-12-10', '0000-00-00', 0, '2021-12-01 19:09:41'),
(4, 'Test2', 'Test2', 'CVSUZRO036571482', '2022-02-25', '0000-00-00', 1, '2021-12-01 22:43:53'),
(5, 'Sample Task', 'This task will make you strong', 'CVSUFIZ562147308', '2022-01-28', '2022-01-14', 2, '2022-01-14 22:26:50');

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
(1, 1, 'Test 1', NULL, 0, '2021-12-01 20:59:08'),
(2, 1, 'Prpgress 2 sample', NULL, 0, '2021-12-01 22:44:17'),
(3, 1, 'Test2', NULL, 0, '2021-12-04 22:12:43'),
(4, 1, '1', NULL, 0, '2021-12-04 22:15:18'),
(5, 1, '2', NULL, 0, '2021-12-04 22:15:24'),
(6, 1, 'complete', NULL, 1, '2021-12-05 10:47:13'),
(7, 1, 'gertfertrew', NULL, 0, '2021-12-05 10:57:35'),
(8, 1, 'jhklhkhkjkhj', NULL, 0, '2021-12-05 10:58:19'),
(9, 1, 'k;klklkl', NULL, 1, '2021-12-05 10:58:40'),
(10, 4, 'test', NULL, 0, '2021-12-05 10:58:57'),
(11, 1, 'dgegg', NULL, 1, '2021-12-05 11:03:06'),
(12, 1, '345345sdfs', NULL, 1, '2021-12-05 11:04:15'),
(13, 1, 'ABCD1', NULL, 1, '2021-12-05 11:07:24'),
(16, 5, '10 % Complete', NULL, 0, '2022-01-14 22:29:45'),
(17, 5, '20%', NULL, 0, '2022-01-14 22:30:33'),
(18, 5, '100%', NULL, 1, '2022-01-14 22:31:05');

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
(1, 'CVSUTAXJLK690253147', 'Sample Tax 1', 20, 'Percentage', 33, 333, 444, 'active', '2021-11-03', '2021-11-30', 'Sample Description'),
(6, 'CVSUTAXHAW518439670', 'Income Tax', 20, 'Percentage', 12, 50000, 70000, 'active', '2021-11-10', '2021-11-18', 'Sample Income Tax'),
(7, 'CVSUTAXHDQ186459730', 'Sample Tax 2', 20, 'Fixed Amount', 300, 5000, 600000, 'active', '2021-11-02', '0000-00-00', 'hahahahahaha');

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
(7, 'ITEC-111', 'Sample Course', 'Sample Details');

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
(10, 'CVSUTRAJGO7230641', 'asdasd', 'asdas', 7, 21, '2022-01-01 22:09:00', '2022-01-02 22:10:00', 'Online', 'asdasd', '24.016666666667', 3, 'asdasd', 'asd', 'inactive');

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
(39, 'CVSUATTCBH19670', 'CVSUFIZ562147308', 'CVSUTRAJGO7230641', 'gsVhnsamGDsd', 'Reviewed', 5, '2022-01-15', 'great experience');

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
(3, 'CVSUTVRJD0795381', 'vendor name', 'myemail@gmail.com', '111111', 'experience', 'i am your contact person');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `allowance`
--
ALTER TABLE `allowance`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `attendance_correction`
--
ALTER TABLE `attendance_correction`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cash_advance`
--
ALTER TABLE `cash_advance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `deduction_vendor`
--
ALTER TABLE `deduction_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `department_category`
--
ALTER TABLE `department_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `disciplinary_action`
--
ALTER TABLE `disciplinary_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `disciplinary_category`
--
ALTER TABLE `disciplinary_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `document_folder`
--
ALTER TABLE `document_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `employment_category`
--
ALTER TABLE `employment_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_request`
--
ALTER TABLE `event_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `overtime_request`
--
ALTER TABLE `overtime_request`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task_progress`
--
ALTER TABLE `task_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `training_course`
--
ALTER TABLE `training_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `training_list`
--
ALTER TABLE `training_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `training_record`
--
ALTER TABLE `training_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `training_vendor`
--
ALTER TABLE `training_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
