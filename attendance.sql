-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 02:36 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `firstname`, `surname`, `email`, `is_super`, `password`) VALUES
(1, 'super', 'admin', 'super@gmail.com', 1, '$2y$10$iKQTud3UlAEIKMrbTcQW9e5zmY71ZiC/sviZ1mD5/mfX/0Hzh6vAi'),
(2, 'normal', 'admin', 'admin@gmail.com', 0, '$2y$10$iKQTud3UlAEIKMrbTcQW9e5zmY71ZiC/sviZ1mD5/mfX/0Hzh6vAi'),
(4, 'normal', 'Admin', 'admin1@gmail.com', 0, '$2y$10$iKQTud3UlAEIKMrbTcQW9e5zmY71ZiC/sviZ1mD5/mfX/0Hzh6vAi'),
(5, 'admin', 'admin', 'admin2@gmail.com', 0, '$2y$10$iKQTud3UlAEIKMrbTcQW9e5zmY71ZiC/sviZ1mD5/mfX/0Hzh6vAi');

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

CREATE TABLE `archives` (
  `archive_id` bigint(20) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `check_date` date NOT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archives`
--

INSERT INTO `archives` (`archive_id`, `employee_id`, `check_date`, `check_in`, `check_out`) VALUES
(2, 1, '2019-11-22', '09:43:28', '16:43:29'),
(3, 1, '2019-11-24', '09:45:30', '10:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `attend_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `check_date` date NOT NULL,
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `employeeStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendanceStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`attend_id`, `employee_id`, `check_date`, `check_in`, `check_out`, `employeeStatus`, `attendanceStatus`) VALUES
(43, 1, '2020-07-17', '14:51:51', '14:51:53', 'inactive', 'present'),
(44, 2, '2020-07-17', '14:51:21', '14:51:23', 'inactive', 'present'),
(45, 1, '2020-07-18', NULL, NULL, 'onLeave', 'onLeave'),
(46, 1, '2020-07-19', NULL, NULL, 'onLeave', 'onLeave'),
(47, 1, '2020-07-20', NULL, NULL, 'onLeave', 'onLeave'),
(48, 1, '2020-07-21', NULL, NULL, 'onLeave', 'onLeave'),
(49, 1, '2020-07-22', NULL, NULL, 'onLeave', 'onLeave'),
(50, 1, '2020-07-23', NULL, NULL, 'onLeave', 'onLeave'),
(51, 1, '2020-07-24', NULL, NULL, 'onLeave', 'onLeave'),
(52, 1, '2020-07-25', NULL, NULL, 'onLeave', 'onLeave'),
(53, 1, '2020-07-26', NULL, NULL, 'onLeave', 'onLeave');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department`) VALUES
(1, 'Department 1'),
(2, 'Department 2');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` int(11) NOT NULL,
  `date_of_joining` date NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `firstname`, `surname`, `address`, `email`, `password`, `gender`, `dob`, `phone`, `department`, `date_of_joining`, `basic_salary`, `account_name`, `account_number`, `bank_name`, `branch`, `status`) VALUES
(1, 'David', 'Jone', 'Ktm', 'employee@gmail.com', '$2y$10$iKQTud3UlAEIKMrbTcQW9e5zmY71ZiC/sviZ1mD5/mfX/0Hzh6vAi', 'Male', '1995-04-20', '9123817283', 1, '2019-09-02', '91773.00', 'David Jone', '12389127398127', 'Prabhu Bank', 'Ktm', 1),
(2, 'rohit', 'rajbanshi', 'jhapa', 'rohit@gmail.com', '$2y$10$HTFABv6fpC9Yf4534AegDe8Ld2ibiHUUJWMU8z3oQ.MfLr5eBH6Ne', 'Male', '1997-07-25', '8172381273', 2, '0000-00-00', '123.00', 'rohit rajbanshi', '91823912839783', 'Prabhu', 'Jhapa', 1),
(4, 'ganesh', 'gautam', 'ktm', 'ganesh@gmail.com', '$2y$10$kx3xxZOzVPpl7UyX63i.QOSUL4.7LBFYv6zgtgF6u3Z7rP7uewQMa', 'Male', '2004-07-27', '9712813981', 2, '2020-06-26', '90000.00', 'Ganesh Gautam', '18239127387129', 'Prabhu Bank', 'Butwal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `holidaydata`
--

CREATE TABLE `holidaydata` (
  `holidayId` int(8) NOT NULL,
  `holidayDate` date NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holidaydata`
--

INSERT INTO `holidaydata` (`holidayId`, `holidayDate`, `description`) VALUES
(2, '2020-07-18', 'kinga'),
(3, '2020-07-20', 'Shiva Ratri');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leave_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `applied_date` date NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leave_id`, `employee_id`, `applied_date`, `reason`, `description`, `start_date`, `end_date`, `status`) VALUES
(1, 1, '2019-11-20', 'Sick Leave', 'can\'t attend can\'t attend can\'t attend can\'t attend can\'t attend can\'t attend can\'t attend', '2019-11-21', '2019-11-22', 'Rejected'),
(2, 1, '2019-11-20', 'Sick Leave', 'can\'t attend', '2019-11-25', '2019-11-28', 'Accepted'),
(3, 2, '2020-07-02', 'Annual Leave', 'No leave so far', '2020-07-03', '2020-07-15', 'Accepted'),
(4, 1, '2020-07-07', 'Sick Leave', 'I am very sick', '2020-07-07', '2020-07-09', 'Accepted'),
(5, 2, '2020-07-11', 'Annual Leave', 'blah blah', '2020-07-12', '2020-07-13', 'Accepted'),
(6, 2, '2020-07-17', 'Unpaid Leave', 'fuck you khanal', '2020-07-18', '2020-07-31', 'Accepted'),
(7, 1, '2020-07-17', 'Sick Leave', 'aids', '2020-07-18', '2020-07-19', 'Accepted'),
(8, 1, '2020-07-17', 'Bereavement', 'gandu', '2020-07-20', '2020-07-26', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `salary_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `present_days` int(10) NOT NULL,
  `holidays` int(10) NOT NULL,
  `deduction` decimal(10,2) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `incentive` decimal(10,2) NOT NULL,
  `total_salary` decimal(10,2) NOT NULL,
  `salary_of` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`salary_id`, `emp_id`, `present_days`, `holidays`, `deduction`, `salary`, `incentive`, `total_salary`, `salary_of`, `created_at`) VALUES
(2, 1, 9, 1, '61182.00', '30591.00', '100.00', '30691.00', '2020-07-31', '2020-07-11 11:20:55'),
(3, 2, 9, 2, '77.90', '45.10', '10.00', '55.10', '2020-07-31', '2020-07-11 12:46:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`archive_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`attend_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `holidaydata`
--
ALTER TABLE `holidaydata`
  ADD PRIMARY KEY (`holidayId`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`salary_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `archives`
--
ALTER TABLE `archives`
  MODIFY `archive_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attend_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `holidaydata`
--
ALTER TABLE `holidaydata`
  MODIFY `holidayId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
