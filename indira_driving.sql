-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 03:15 PM
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
  `enr_id` varchar(40) NOT NULL,
  `existing_student` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Angel Jansi', 'angel@123', 'angel', 'instructor', '9884631330', '2023-07-01', '25000', '2023-07-05', '200', '4000', '8 hours', '10000'),
(2, 'Sekar', 'sekar@123', 'sekar', 'staff_grade_1', '9812223344', '2023-07-11', '15000', '2023-07-05', '200', '500', '5 Hours', '700'),
(3, 'Vinoth ', 'vinoth@123', 'vinoth', 'instructor', '9884631330', '2023-07-12', '12000', '2023-07-05', '200', '500', '5 Hours', '700');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance`
--

CREATE TABLE `staff_attendance` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `day` varchar(60) NOT NULL,
  `attendance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_attendance`
--

INSERT INTO `staff_attendance` (`id`, `name`, `day`, `attendance`) VALUES
(1, 'Sekar', '1', 'A');

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
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
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
-- Indexes for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
