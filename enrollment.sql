-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 09:43 AM
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
  `created_at` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `enquiry`, `student_name`, `father_name`, `dob`, `photo`, `address`, `referencer`, `phoneno`, `blood`, `point`, `enroll14`, `llr`, `validity`, `package`, `classname`, `nfd`, `fees`, `amount_paid`, `previous_paid`, `balance_amount`, `enr_id`, `existing_student`, `working`, `class_time`, `status`, `license_no`, `created_at`) VALUES
(1, 'Yes', 'Angel', 'Daniel', '1997-02-14', '', 'Chennai , Tamil nadu', 'Umar', '987867761', 'b+ve', '120', 'Completed', '18-07-2023', '18-07-2023', 'RC', 'Update Rc', '20', '3000', '', '', '', 'IND-EN001', 'client1', 'License', '', 'Payment', '', '2023-07-14'),
(3, 'Yes', 'umar', 'fazil', '2023-07-08', 'client-2.jpg', ' Seekar south street, Guindy', 'ashik', '987867761', 'b+ve', '120', 'Completed', '18-06-2023', '18-07-2023', 'RC', 'Update Rc', '20', '3000', '1000', '3000', '0.00', 'IND-EN002', '', 'License', '', 'Dispatched', 'LC-123456789', '2023-07-14'),
(4, 'No', 'Rashmika', 'Sekar', '1999-11-18', 'client-2.jpg', 'Tirunelveli main street, Tirunelveli', 'Hari', '987867761', 'b+ve', '120', 'Completed', 'LLR Date', 'LLR Validity Date', 'DL', 'Premium Package', '45', '8000', '', '', '', 'IND-EN003', '', '', '7:00 AM', 'Discount', '', '2023-07-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
