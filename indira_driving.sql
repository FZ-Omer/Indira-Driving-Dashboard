-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 02:40 PM
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
-- Database: `indira_driving`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `date`, `status`, `student_id`) VALUES
(0, '2023-07-15', 'P', 4),
(0, '2023-07-15', 'P', 2),
(0, '2023-07-24', 'P', 1),
(0, '2023-07-24', 'A', 2),
(0, '2023-07-24', 'P', 3);

-- --------------------------------------------------------

--
-- Table structure for table `classes_dl`
--

CREATE TABLE `classes_dl` (
  `id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `nfd` varchar(40) NOT NULL,
  `simulation` varchar(40) NOT NULL,
  `onroad` varchar(50) NOT NULL,
  `theory` varchar(30) NOT NULL,
  `reverse` varchar(20) NOT NULL,
  `testround` varchar(20) NOT NULL,
  `fees` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes_dl`
--

INSERT INTO `classes_dl` (`id`, `class_name`, `nfd`, `simulation`, `onroad`, `theory`, `reverse`, `testround`, `fees`) VALUES
(1, 'Basic Package', '35', '10', '5', '10', '5', '5', '4000'),
(2, 'Premium Package', '45', '10', '10', '10', '10', '5', '8000');

-- --------------------------------------------------------

--
-- Table structure for table `classes_rc`
--

CREATE TABLE `classes_rc` (
  `id` int(11) NOT NULL,
  `working` varchar(250) NOT NULL,
  `fees` varchar(250) NOT NULL,
  `nfd` varchar(100) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes_rc`
--

INSERT INTO `classes_rc` (`id`, `working`, `fees`, `nfd`, `class_name`) VALUES
(1, 'LLR', '4000', '35', 'Renewal'),
(3, 'License', '3500', '20', 'Update Rc');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `classes` varchar(250) NOT NULL,
  `dfa` varchar(200) NOT NULL,
  `total_amt` varchar(150) NOT NULL,
  `discount_amt` varchar(150) NOT NULL,
  `ref_name` varchar(250) NOT NULL,
  `mobile_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `date_of_joining` varchar(100) NOT NULL,
  `time` varchar(20) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `class` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `enquiry_interest` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `phone`, `date_of_joining`, `time`, `emailid`, `class`, `remarks`, `enquiry_interest`) VALUES
(1, 'Angel Jansi', '9884631330', '2023-08-06', '06:00', 'jansijo5756@gmail.com', 'DL', 'join soon', 'Interested'),
(2, 'Angel Jansi', '9884631330', '2023-08-06', '06:00', 'jansijo5756@gmail.com', 'DL', 'join soon', 'Not Interested');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` int(11) NOT NULL,
  `enquiry` varchar(50) NOT NULL,
  `student_name` varchar(60) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `dob` varchar(40) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  `referencer` varchar(200) NOT NULL,
  `phoneno` varchar(30) NOT NULL,
  `blood` varchar(20) NOT NULL,
  `point` varchar(20) NOT NULL,
  `enroll14` varchar(50) NOT NULL,
  `llr` varchar(30) NOT NULL,
  `validity` varchar(30) NOT NULL,
  `package` varchar(200) NOT NULL,
  `classname` varchar(30) NOT NULL,
  `nfd` varchar(40) NOT NULL,
  `fees` varchar(80) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `previous_paid` varchar(50) NOT NULL,
  `balance_amount` varchar(50) NOT NULL,
  `enr_id` varchar(40) NOT NULL,
  `existing_student` varchar(200) NOT NULL,
  `working` varchar(200) NOT NULL,
  `class_time` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `license_no` varchar(100) NOT NULL,
  `simulation` varchar(200) NOT NULL,
  `onroad` varchar(200) NOT NULL,
  `theory` varchar(200) NOT NULL,
  `reverse` varchar(200) NOT NULL,
  `testround` varchar(200) NOT NULL,
  `classdate` varchar(150) NOT NULL,
  `payment_date` varchar(100) NOT NULL,
  `register_no` varchar(200) NOT NULL,
  `insurance_validity` varchar(200) NOT NULL,
  `puc_date` varchar(200) NOT NULL,
  `rfitness_certi` varchar(200) NOT NULL,
  `llr_no` varchar(200) NOT NULL,
  `transport_type` varchar(100) NOT NULL,
  `license_validity` varchar(100) NOT NULL,
  `workpending_date` varchar(50) NOT NULL,
  `postponed_date` varchar(50) NOT NULL,
  `card_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `enquiry`, `student_name`, `father_name`, `dob`, `photo`, `address`, `referencer`, `phoneno`, `blood`, `point`, `enroll14`, `llr`, `validity`, `package`, `classname`, `nfd`, `fees`, `amount_paid`, `previous_paid`, `balance_amount`, `enr_id`, `existing_student`, `working`, `class_time`, `status`, `license_no`, `simulation`, `onroad`, `theory`, `reverse`, `testround`, `classdate`, `payment_date`, `register_no`, `insurance_validity`, `puc_date`, `rfitness_certi`, `llr_no`, `transport_type`, `license_validity`, `workpending_date`, `postponed_date`, `card_no`) VALUES
(34, 'Yes', 'tamil', '', '', '', '', '', '', '', '', '', '', '', 'RC', 'Renewal', '35', '4000', '', '', '', 'IND-EN001', '', 'LLR', '', 'payment', '', '', '', '', '', '', '', '2023-07-27 08:12:45', '83738373873', '2024-03-30', '2023-12-08', '2024-05-03', '', '', '', '', '', ''),
(35, 'Yes', 'sobia', 'daniel', '01/01/1970', '42e22313-2cf1-428a-9fef-310532854327.jpg', 'nanganallur', 'rajan', '8765431282', 'B+ve', 'ashok nagar', 'completed', '2023-08-04', '2024-02-04', 'DL', 'Basic Package', '35', '3500', '', '', '', 'IND-EN002', '', 'License', '2:00 PM', 'Pending Payment', 'LC-123456722', '10', '10', '5', '5', '5', '2023-08-01', '2023-07-29 07:28:56', '', '', '', '', 'LLR23443322', 'Non Transport', '2023-08-09', '2023-09-02', '2023-08-19', ''),
(36, 'Yes', 'Ram kumar', 'rajakumar', '2003-06-05', 'dev.jpg', 'nanganallur', '', '8765431282', 'AB-', 'kk nagar', 'LLR', '', '', 'DL', 'Premium Package', '45', '8000', '3000', '9000', '5000.00', 'IND-EN003', '', '', '6:00 PM', 'Pending Payment', '', '10', '10', '10', '10', '5', '2023-08-06', '2023-07-29 08:55:39', '', '', '', '', '', '', '', '', '', ''),
(37, 'Yes', 'angel', 'thangaraj', '2023-07-21', 'side4.jpeg', 'Kovilambakkam ', 'rajan', '9884631330', 'A+ve', '187', 'LLR', '', '', 'DL', 'Premium Package', '45', '7000', '', '', '', 'IND-EN004', '', '', '9:00 AM', 'Pending Payment', '', '10', '10', '10', '10', '5', '2023-08-05', '2023-07-29 09:43:04', '', '', '', '', '', '', '', '', '', ''),
(38, 'Yes', 'kamachi', 'rajakumar', '2023-07-04', 'side2.jpg', 'Kovilambakkam ', 'rajan', '8765431282', 'AB-', '187', 'completed', '', '', 'DL', 'Premium Package', '45', '8000', '', '2000', '', 'IND-EN005', '', '', '12:00 AM', 'Payment Completed', '', '10', '10', '10', '10', '5', '2023-08-03', '2023-07-29 09:54:25', '', '', '', '', '', '', '', '', '', ''),
(39, 'Yes', 'Flora', 'thiraviyam', '2023-06-23', 'person_4.jpg', 'nanganallur', 'rajan', '9886547892', 'A+ve', 'kk nagar', 'yes', '', '', 'DL', 'Premium Package', '45', '8000', '', '', '', 'IND-EN006', '', '', '7:00 AM', 'Payment Completed', '', '10', '10', '10', '10', '5', '2023-08-08', '2023-08-01 12:43:31', '', '', '', '', '', '', '', '', '', ''),
(40, 'Yes', 'Ashitha', 'fazhil', '12/02/1997', 'trainer-1.jpg', ' Gst Road 3rd street', '', '9886547892', 'B+ve', 'ashok nagar', 'completed', '2023-08-04', '2024-02-04', 'DL', 'Premium Package', '45', '8000', '', '', '', 'IND-EN007', '', '', '12:00 PM', 'Payment Completed', '', '10', '10', '10', '10', '5', '2023-08-10', '2023-08-01 13:41:02', '', '', '', '', 'LLR2344111', '', '', '', '', ''),
(41, 'Yes', 'Rajan', '', '', '', '', '', '', '', '', '', '', '', 'RC', 'Renewal', '35', '4000', '', '', '', 'IND-EN008', '', 'LLR', '', 'Pending Payment', '', '', '', '', '', '', '', '2023-08-02 13:24:11', '83738373873', '2023-10-19', '2023-09-02', '2023-08-26', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `class_name` varchar(200) NOT NULL,
  `amt_paid` varchar(200) NOT NULL,
  `balance_amt` varchar(200) NOT NULL,
  `payment_date` varchar(100) DEFAULT NULL,
  `fees` varchar(100) DEFAULT NULL,
  `staff_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `previous_paid` float DEFAULT 0,
  `test_ground_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `student_id`, `student_name`, `class_name`, `amt_paid`, `balance_amt`, `payment_date`, `fees`, `staff_name`, `status`, `previous_paid`, `test_ground_date`) VALUES
(16, 38, 'kamachi', '', '8000', '0', '2023-07-31 11:49:41', '8000', 'Indira', 'Payment Completed', 0, ''),
(17, 39, 'Flora', '', '2000', '6000', '2023-08-01 12:44:27', '8000', 'Indira', 'Pending Payment', 0, ''),
(18, 40, 'Ashitha', '', '1000', '7000', '2023-08-01 13:41:12', '8000', 'Indira', 'Pending Payment', 0, ''),
(19, 40, 'Ashitha', '', '4000', '3000', '2023-08-01 14:31:05', '8000', 'Indira', 'Pending Payment', 0, ''),
(20, 40, 'Ashitha', '', '3000', '0', '2023-08-02 07:43:44', '8000', 'Indira', 'Payment Completed', 0, ''),
(21, 39, 'Flora', '', '6000', '0', '2023-08-02 08:19:51', '8000', 'Indira', 'Payment Completed', 0, ''),
(22, 38, 'kamachi', '', '0', '0', '2023-08-02 08:24:28', '8000', 'Indira', 'Payment Completed', 0, '2023-08-23'),
(23, 41, 'Rajan', '', '2000', '2000', '2023-08-02 13:24:29', '4000', 'Angel Jansi', 'Pending Payment', 0, ''),
(24, 37, 'angel', '', '2000', '5000', '2023-08-04 14:25:32', '7000', 'Indira', 'Pending Payment', 0, ''),
(25, 35, 'sobia', '', '0', '3500', '2023-08-08 13:54:59', '3500', 'Umar', 'Pending Payment', 0, '2023-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`) VALUES
(2, 'Indira', 'admin@gmail.com', 'admin@123456');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `role` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date_of_joining` varchar(100) NOT NULL,
  `salary_amount` varchar(100) NOT NULL,
  `salary_date` varchar(100) NOT NULL,
  `daily_allowance` varchar(100) NOT NULL,
  `bonus` varchar(100) NOT NULL,
  `working_time` varchar(100) NOT NULL,
  `increment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `password`, `username`, `role`, `phone`, `date_of_joining`, `salary_amount`, `salary_date`, `daily_allowance`, `bonus`, `working_time`, `increment`) VALUES
(3, 'Vinoth ', 'vinoth@123', 'vinoth', 'staff_grade_2', '9884631330', '2023-07-12', '12000', '2023-07-05', '200', '500', '5 Hours', '700'),
(5, 'Angel Jansi', '', '', '', '9884631330', '2023-08-05', '', '', '', '', '', ''),
(6, 'Angel Jansi', '', '', '', '9884631330', '2023-08-04', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `session_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `student_id`, `date`, `time`, `status`, `class`, `session_name`) VALUES
(0, 34, '2023-08-03', '12:52:00', 'P', 'theory', 'Angel Jansi'),
(0, 36, '2023-08-03', '12:52:00', 'P', 'reverse', 'Angel Jansi'),
(0, 37, '2023-08-03', '12:52:00', 'P', 'onroad', 'Angel Jansi'),
(0, 38, '2023-08-03', '12:58:00', 'P', 'reverse', 'Angel Jansi'),
(0, 39, '2023-08-03', '12:58:00', 'P', 'testround', 'Angel Jansi'),
(0, 34, '2023-08-03', '15:27:00', 'P', 'onroad', 'Angel Jansi'),
(0, 40, '2023-08-03', '18:21:00', 'P', 'testround', 'Angel Jansi'),
(0, 34, '2023-08-04', '11:59:00', 'P', 'reverse', 'Angel Jansi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes_dl`
--
ALTER TABLE `classes_dl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes_rc`
--
ALTER TABLE `classes_rc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes_dl`
--
ALTER TABLE `classes_dl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes_rc`
--
ALTER TABLE `classes_rc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
