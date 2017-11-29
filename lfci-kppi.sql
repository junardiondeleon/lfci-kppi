-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2017 at 09:11 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lfci-kppi`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting_particulars`
--

CREATE TABLE `accounting_particulars` (
  `accounting_particular_id` int(5) NOT NULL,
  `accounting_particular_code` varchar(30) NOT NULL,
  `accounting_particular_name` varchar(255) NOT NULL,
  `accounting_particular_type` tinyint(1) NOT NULL,
  `remarks` text NOT NULL,
  `is_actived` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `deleted_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounting_particulars`
--

INSERT INTO `accounting_particulars` (`accounting_particular_id`, `accounting_particular_code`, `accounting_particular_name`, `accounting_particular_type`, `remarks`, `is_actived`, `created_by`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(1, 'AR LOAN', 'Account Receivable Loan', 1, '', 1, 2, '2017-10-31 15:23:29', '2017-10-31 15:23:29', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `activity_log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_ip` varchar(50) NOT NULL,
  `request_uri` varchar(255) NOT NULL,
  `referer_page` varchar(255) NOT NULL,
  `action` text NOT NULL,
  `is_actived` tinyint(1) DEFAULT '1',
  `created_by` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`activity_log_id`, `user_id`, `client_ip`, `request_uri`, `referer_page`, `action`, `is_actived`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '::1', '/lfci-kppi/logout', 'http://localhost/lfci-kppi/users', 'Logout Successfully', 1, 00002, '2017-10-30 00:25:23', NULL, NULL),
(2, 2, '::1', '/lfci-kppi/site/login', 'http://localhost/lfci-kppi/site/login', 'Login Successfully', 1, 00002, '2017-10-30 00:25:50', NULL, NULL),
(3, 2, '::1', '/lfci-kppi/area', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-30 00:38:03', NULL, NULL),
(4, 2, '::1', '/lfci-kppi/area', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-30 00:38:31', NULL, NULL),
(5, 2, '::1', '/lfci-kppi/area/00001/edit', 'http://localhost/lfci-kppi/area', 'Editing Area Area One', 1, 00002, '2017-10-30 00:38:46', NULL, NULL),
(6, 2, '::1', '/lfci-kppi/area/00001/edit', 'http://localhost/lfci-kppi/area/00001/edit', 'Editing Area Area One', 1, 00002, '2017-10-30 00:39:24', NULL, NULL),
(7, 2, '::1', '/lfci-kppi/area/00001/edit', 'http://localhost/lfci-kppi/area/00001/edit', 'Sucessfully saved $area_name', 1, 00002, '2017-10-30 00:39:24', NULL, NULL),
(8, 2, '::1', '/lfci-kppi/area/index', 'http://localhost/lfci-kppi/area/00001/edit', 'Viewing Areas Dashboard', 1, 00002, '2017-10-30 00:39:24', NULL, NULL),
(9, 2, '::1', '/lfci-kppi/area/00002/edit', 'http://localhost/lfci-kppi/area/index', 'Editing Area Area Two', 1, 00002, '2017-10-30 00:41:48', NULL, NULL),
(10, 2, '::1', '/lfci-kppi/area/00002/edit', 'http://localhost/lfci-kppi/area/00002/edit', 'Editing Area Area Two', 1, 00002, '2017-10-30 00:42:00', NULL, NULL),
(11, 2, '::1', '/lfci-kppi/area/00002/edit', 'http://localhost/lfci-kppi/area/00002/edit', 'Sucessfully saved Area Two', 1, 00002, '2017-10-30 00:42:00', NULL, NULL),
(12, 2, '::1', '/lfci-kppi/area/index', 'http://localhost/lfci-kppi/area/00002/edit', 'Viewing Areas Dashboard', 1, 00002, '2017-10-30 00:42:00', NULL, NULL),
(13, 2, '::1', '/lfci-kppi/site/login', 'http://localhost/lfci-kppi/site/login', 'Login Successfully', 1, 00002, '2017-10-31 02:33:37', NULL, NULL),
(14, 2, '::1', '/lfci-kppi/area/new', '', 'Adding New Area', 1, 00002, '2017-10-31 02:49:43', NULL, NULL),
(15, 2, '::1', '/lfci-kppi/logout', 'http://localhost/lfci-kppi/area/new', 'Logout Successfully', 1, 00002, '2017-10-31 02:50:04', NULL, NULL),
(16, 2, '::1', '/lfci-kppi/site/login', 'http://localhost/lfci-kppi/site/login', 'Login Successfully', 1, 00002, '2017-10-31 03:11:33', NULL, NULL),
(17, 2, '::1', '/lfci-kppi/site/login', 'http://localhost/lfci-kppi/site/login', 'Login Successfully', 1, 00002, '2017-10-31 09:48:09', NULL, NULL),
(18, 2, '::1', '/lfci-kppi/area/new', '', 'Adding New Area', 1, 00002, '2017-10-31 12:29:46', NULL, NULL),
(19, 2, '::1', '/lfci-kppi/area/new', 'http://localhost/lfci-kppi/area/new', 'Adding New Area', 1, 00002, '2017-10-31 12:29:49', NULL, NULL),
(20, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 12:40:05', NULL, NULL),
(21, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 12:41:25', NULL, NULL),
(22, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 12:42:05', NULL, NULL),
(23, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 12:43:05', NULL, NULL),
(24, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 12:43:07', NULL, NULL),
(25, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 12:43:20', NULL, NULL),
(26, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 12:43:21', NULL, NULL),
(27, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 12:43:22', NULL, NULL),
(28, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 12:43:27', NULL, NULL),
(29, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 12:44:00', NULL, NULL),
(30, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 12:44:15', NULL, NULL),
(31, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 12:44:43', NULL, NULL),
(32, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 12:44:44', NULL, NULL),
(33, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 12:44:56', NULL, NULL),
(34, 2, '::1', '/lfci-kppi/area/00001/view', 'http://localhost/lfci-kppi/areas', 'Viewing Area - Area One', 1, 00002, '2017-10-31 14:01:32', NULL, NULL),
(35, 2, '::1', '/lfci-kppi/areas', '', 'Viewing Areas Dashboard', 1, 00002, '2017-10-31 16:08:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `area_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `area_code` varchar(30) DEFAULT NULL,
  `area_name` varchar(255) NOT NULL,
  `area_description` text,
  `street_no` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`area_id`, `area_code`, `area_name`, `area_description`, `street_no`, `barangay`, `municipality`, `province`, `remarks`, `is_actived`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(00001, 'Area One', 'Area One', 'Area One Text', '171-Z 22nd Avenue', 'East Rembo', 'Makati City', 'Metro Manila', '', 1, NULL, '2017-10-29 13:16:25', '2017-10-30 00:39:24', NULL),
(00002, 'Area Two', 'Area Two', 'Area Two and Text', 'Block 45 Lot 16 Phase 2', 'Pinagsama', 'Taguig City', 'Metro Manila', '', 1, NULL, '2017-10-29 15:34:27', '2017-10-30 00:42:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `audit_log_id` int(11) NOT NULL,
  `primary_field` int(11) NOT NULL,
  `table_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `updated_field` varchar(100) CHARACTER SET latin1 NOT NULL,
  `old_value` text CHARACTER SET latin1 NOT NULL,
  `new_value` text CHARACTER SET latin1 NOT NULL,
  `is_actived` tinyint(1) DEFAULT NULL,
  `created_by` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(5) NOT NULL,
  `group_code` varchar(30) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_description` text NOT NULL,
  `remarks` text NOT NULL,
  `is_actived` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `deleted_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_code`, `group_name`, `group_description`, `remarks`, `is_actived`, `created_by`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(1, 'ADMIN', 'Administrator', 'Group consists of IT', '', 1, 1, '2017-10-29 14:39:30', '2017-10-29 14:42:14', '0000-00-00 00:00:00', 0),
(2, 'TELLER', 'Teller/Cashier', 'Group consists of Tellers and Cashiers', '', 0, 1, '2017-10-29 14:40:05', '2017-10-29 14:40:05', '2017-10-29 15:19:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `loan_type_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `loan_code` varchar(25) NOT NULL,
  `loan_desc` varchar(200) NOT NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(5) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loan_categories`
--

CREATE TABLE `loan_categories` (
  `loan_category_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `LoanProgramId` int(5) NOT NULL,
  `loan_category_code` varchar(30) NOT NULL,
  `loan_category_name` varchar(200) NOT NULL,
  `min_loanable_amount` decimal(12,2) NOT NULL,
  `max_loanable_amount` decimal(12,2) NOT NULL,
  `remarks` text NOT NULL,
  `is_actived` tinyint(1) DEFAULT '1',
  `created_by` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan_categories`
--

INSERT INTO `loan_categories` (`loan_category_id`, `LoanProgramId`, `loan_category_code`, `loan_category_name`, `min_loanable_amount`, `max_loanable_amount`, `remarks`, `is_actived`, `created_by`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(00001, 1, 'Latag', 'Latag', '5000.00', '15000.00', '', 1, 00002, '2017-10-31 10:05:49', '2017-10-31 10:46:45', NULL, 0),
(00002, 1, 'Goodwill Stall', 'Goodwill Stall', '5000.00', '30000.00', '', 1, 00002, '2017-10-31 10:48:45', '2017-10-31 10:48:45', NULL, 0),
(00003, 1, 'Stall with Rights', 'Stall with Rights', '31000.00', '100000.00', '', 1, 00002, '2017-10-31 10:49:13', '2017-10-31 10:49:13', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loan_profiles`
--

CREATE TABLE `loan_profiles` (
  `LoanTypeId` int(5) UNSIGNED ZEROFILL NOT NULL,
  `LoanCatId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loan_programs`
--

CREATE TABLE `loan_programs` (
  `loan_program_id` int(5) NOT NULL,
  `loan_program_code` varchar(30) NOT NULL,
  `loan_program_name` varchar(255) NOT NULL,
  `loan_program_description` text NOT NULL,
  `remarks` text NOT NULL,
  `is_actived` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `deleted_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan_programs`
--

INSERT INTO `loan_programs` (`loan_program_id`, `loan_program_code`, `loan_program_name`, `loan_program_description`, `remarks`, `is_actived`, `created_by`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(1, 'P3 PROGRAM', 'Pangarap na Pondo sa Palengke', 'Market Vendor Loan Program', '', 1, 1, '2017-10-31 03:13:55', '2017-10-31 03:14:02', '2017-10-31 03:14:10', 0),
(2, 'PNP PROGRAM', 'Pangarap Na Pangkabuhayan', 'Dream of a Good Means of Livelihood', '', 1, 2, '2017-10-31 04:56:07', '2017-10-31 04:56:07', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loan_terms`
--

CREATE TABLE `loan_terms` (
  `loan_term_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `LoanProgramId` int(5) NOT NULL,
  `loan_term` varchar(100) NOT NULL,
  `interest` decimal(5,2) NOT NULL,
  `remarks` text NOT NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan_terms`
--

INSERT INTO `loan_terms` (`loan_term_id`, `LoanProgramId`, `loan_term`, `interest`, `remarks`, `is_actived`, `created_by`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(00001, 1, '50 Days', '0.04', '', 1, 2, '2017-10-31 04:37:15', '2017-10-31 04:45:04', '2017-10-31 04:45:07', 2),
(00002, 1, '100 Days', '0.07', '', 1, 2, '2017-10-31 04:46:26', '2017-10-31 04:46:26', NULL, 0),
(00003, 1, '200 Days', '0.14', '', 1, 2, '2017-10-31 04:46:41', '2017-10-31 04:46:41', NULL, 0),
(00004, 1, '3 months or 12 weeks', '0.06', '', 1, 2, '2017-10-31 04:47:05', '2017-10-31 04:47:05', NULL, 0),
(00005, 1, '6 months or 24 weeks', '0.12', '', 1, 2, '2017-10-31 04:47:24', '2017-10-31 04:47:24', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `AreaId` int(5) NOT NULL,
  `street_no` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `spouse_lastname` varchar(100) NOT NULL,
  `spouse_firstname` varchar(100) NOT NULL,
  `spouse_middlename` varchar(100) NOT NULL,
  `spouse_contact_no` varchar(50) NOT NULL,
  `telephone_no` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `business_type` text NOT NULL,
  `created_by` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `is_actived` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `lastname`, `firstname`, `middlename`, `AreaId`, `street_no`, `barangay`, `municipality`, `province`, `age`, `birthday`, `gender`, `civil_status`, `spouse_lastname`, `spouse_firstname`, `spouse_middlename`, `spouse_contact_no`, `telephone_no`, `mobile_no`, `business_type`, `created_by`, `is_actived`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(1, 'De Leon', 'Junard', 'Pando', 2, '171-Z 22nd Avenue', 'East Rembo', 'Makati City', 'Metro Manila', 32, '2017-02-14', 'Male', 'Divorced', 'De Leon', 'Rozanne', 'Anido', '09156781234', '', '09954835545', 'Hardware Supplies, Computer Shop', 00002, 1, '2017-10-29 23:58:19', '2017-10-31 15:52:34', '2017-10-29 23:58:58', 0),
(2, 'Talaguit', 'Brando', 'Tausa', 2, 'Block 45 Lot 16 Phase 2', 'Pinagsama', 'Taguig City', 'Metro Manila', 32, '2017-10-10', 'Male', 'Married', '', '', '', '0', '(02) 567-8890', '09154671234', 'Sari Sari Store, School Supplies', 00002, 0, '2017-10-30 00:02:58', '2017-10-30 00:02:58', '2017-10-30 00:03:29', 2),
(3, 'Chua', 'Mark', 'Oreon', 2, '171-Z 22nd Avenue', 'East Rembo', 'Pasig City', 'Metro Manila', 25, '2017-10-03', 'Male', 'Divorced', 'Rosario', 'Mylene', 'Caspro', '768-9091', '754-1236', '09173461234', 'Computer Shop', 00002, 1, '2017-10-31 15:54:32', '2017-10-31 15:55:13', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_loans`
--

CREATE TABLE `member_loans` (
  `member_loan_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `MemberId` int(5) NOT NULL,
  `LoanProgramId` int(5) NOT NULL,
  `LoanTermId` decimal(12,2) NOT NULL,
  `interest` decimal(12,2) NOT NULL,
  `mode_of_payment` tinyint(1) NOT NULL,
  `loan_amount` decimal(12,2) NOT NULL,
  `service_charge` decimal(9,2) NOT NULL,
  `notarial` decimal(9,2) NOT NULL,
  `kasanib_fund` decimal(9,2) NOT NULL,
  `loan_protection_insruance` decimal(9,2) NOT NULL,
  `kapamilya_insurance` decimal(9,2) NOT NULL,
  `amortization_due` decimal(9,2) NOT NULL,
  `handled_by` int(5) NOT NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_loan_profiles`
--

CREATE TABLE `member_loan_profiles` (
  `member_loan_profile_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `MemberId` int(5) UNSIGNED ZEROFILL NOT NULL,
  `LoanProgramId` int(5) NOT NULL,
  `LoanCategoryId` int(5) NOT NULL,
  `min_loanable_amount` decimal(12,2) NOT NULL,
  `max_loanable_amount` decimal(12,2) NOT NULL,
  `is_actived` int(11) NOT NULL DEFAULT '1',
  `created_by` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `deleted_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_loan_profiles`
--

INSERT INTO `member_loan_profiles` (`member_loan_profile_id`, `MemberId`, `LoanProgramId`, `LoanCategoryId`, `min_loanable_amount`, `max_loanable_amount`, `is_actived`, `created_by`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(00000000001, 00001, 2, 2, '5000.00', '30000.00', 1, 0, '0000-00-00 00:00:00', '2017-10-31 15:52:35', '0000-00-00 00:00:00', 0),
(00000000002, 00003, 1, 2, '5000.00', '25000.00', 1, 2, '2017-10-31 15:54:32', '2017-10-31 15:54:32', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_loan_status`
--

CREATE TABLE `member_loan_status` (
  `member_loan_status_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `member_loan_id` int(11) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `verefied_by` int(5) UNSIGNED ZEROFILL NOT NULL,
  `verefied_date` datetime DEFAULT NULL,
  `is_cash_voucher_created` tinyint(1) NOT NULL,
  `cash_vouchered_by` int(5) UNSIGNED ZEROFILL NOT NULL,
  `cash_vouchered_date` datetime DEFAULT NULL,
  `is_checke_ready` tinyint(1) NOT NULL,
  `checke_ready_by` int(5) UNSIGNED ZEROFILL NOT NULL,
  `checke_ready_date` datetime DEFAULT NULL,
  `is_released` tinyint(1) NOT NULL,
  `released_by` int(5) UNSIGNED ZEROFILL NOT NULL,
  `released_date` datetime DEFAULT NULL,
  `date_printed` datetime DEFAULT NULL,
  `created_by` int(5) NOT NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_categories`
--

CREATE TABLE `payment_categories` (
  `payment_category_id` int(5) NOT NULL,
  `payment_category_code` varchar(30) NOT NULL,
  `payment_category_name` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  `is_actived` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `deleted_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_categories`
--

INSERT INTO `payment_categories` (`payment_category_id`, `payment_category_code`, `payment_category_name`, `remarks`, `is_actived`, `created_by`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(1, 'REG PAY', 'Regular Payment', '', 1, 2, '2017-10-31 15:18:52', '2017-10-31 15:18:52', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `GroupId` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `AreaId` int(5) NOT NULL,
  `street_no` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `telephone_no` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `last_logged_in` datetime NOT NULL,
  `created_by` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `is_actived` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(5) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `GroupId`, `username`, `password`, `email_address`, `lastname`, `firstname`, `middlename`, `AreaId`, `street_no`, `barangay`, `municipality`, `province`, `age`, `birthday`, `gender`, `civil_status`, `telephone_no`, `mobile_no`, `last_logged_in`, `created_by`, `is_actived`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 'junardion21', '70b4897b11ec6176d20bc999d9b9784b7a318290c758aaf94cc961e33b13973a7a590190170f1b738f88156ea51d1184683a7d30a7879a46a2e039b044eb7397', 'junard.deleon@gmail.com', 'De Leon', 'Junard', 'Pando', 1, '171-Z 22nd Avenue', 'East Rembo', 'Makati City', 'Metro Manila', 32, '1985-06-10', 'Male', 'Married', '(02) 7756767', '09954835545', '0000-00-00 00:00:00', NULL, 1, '2017-10-29 16:22:38', '2017-10-29 18:31:01', '2017-10-29 17:48:08', 00000),
(2, 2, 'jeyu-teller', '70b4897b11ec6176d20bc999d9b9784b7a318290c758aaf94cc961e33b13973a7a590190170f1b738f88156ea51d1184683a7d30a7879a46a2e039b044eb7397', 'jeyudeleon@yahoo.com', 'De Leon', 'Jeyu', 'Pando', 2, 'Blk 45 Lot 16 Phase 2', 'Pinagsama', 'Taguig City', 'Metro Manila', 23, '2017-10-03', 'Female', 'Single', '', '09154834567', '0000-00-00 00:00:00', NULL, 1, '2017-10-29 17:50:18', '2017-10-29 17:50:18', NULL, 00000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting_particulars`
--
ALTER TABLE `accounting_particulars`
  ADD PRIMARY KEY (`accounting_particular_id`);

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`activity_log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `area` (`area_code`,`is_actived`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`audit_log_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loan_type_id`);

--
-- Indexes for table `loan_categories`
--
ALTER TABLE `loan_categories`
  ADD PRIMARY KEY (`loan_category_id`),
  ADD KEY `minmax` (`min_loanable_amount`,`max_loanable_amount`,`is_actived`);

--
-- Indexes for table `loan_profiles`
--
ALTER TABLE `loan_profiles`
  ADD KEY `LoanType` (`LoanTypeId`,`LoanCatId`);

--
-- Indexes for table `loan_programs`
--
ALTER TABLE `loan_programs`
  ADD PRIMARY KEY (`loan_program_id`);

--
-- Indexes for table `loan_terms`
--
ALTER TABLE `loan_terms`
  ADD PRIMARY KEY (`loan_term_id`),
  ADD KEY `actived` (`is_actived`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `lastname` (`lastname`,`is_actived`),
  ADD KEY `firstname` (`is_actived`),
  ADD KEY `areaId` (`AreaId`,`is_actived`);

--
-- Indexes for table `member_loans`
--
ALTER TABLE `member_loans`
  ADD PRIMARY KEY (`member_loan_id`),
  ADD KEY `member` (`MemberId`,`is_actived`),
  ADD KEY `handled` (`MemberId`,`handled_by`,`is_actived`);

--
-- Indexes for table `member_loan_profiles`
--
ALTER TABLE `member_loan_profiles`
  ADD PRIMARY KEY (`member_loan_profile_id`),
  ADD KEY `LoanProfile` (`MemberId`,`LoanCategoryId`);

--
-- Indexes for table `member_loan_status`
--
ALTER TABLE `member_loan_status`
  ADD PRIMARY KEY (`member_loan_status_id`),
  ADD KEY `member` (`member_loan_id`,`is_actived`),
  ADD KEY `loan_status` (`member_loan_id`,`is_released`,`is_actived`);

--
-- Indexes for table `payment_categories`
--
ALTER TABLE `payment_categories`
  ADD PRIMARY KEY (`payment_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `lastname` (`lastname`,`is_actived`),
  ADD KEY `firstname` (`is_actived`),
  ADD KEY `areaId` (`AreaId`,`is_actived`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting_particulars`
--
ALTER TABLE `accounting_particulars`
  MODIFY `accounting_particular_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `area_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `audit_log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loan_categories`
--
ALTER TABLE `loan_categories`
  MODIFY `loan_category_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loan_programs`
--
ALTER TABLE `loan_programs`
  MODIFY `loan_program_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loan_terms`
--
ALTER TABLE `loan_terms`
  MODIFY `loan_term_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `member_loans`
--
ALTER TABLE `member_loans`
  MODIFY `member_loan_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member_loan_profiles`
--
ALTER TABLE `member_loan_profiles`
  MODIFY `member_loan_profile_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `member_loan_status`
--
ALTER TABLE `member_loan_status`
  MODIFY `member_loan_status_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_categories`
--
ALTER TABLE `payment_categories`
  MODIFY `payment_category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
