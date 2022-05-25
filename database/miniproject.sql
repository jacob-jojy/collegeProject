-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 08:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(100) NOT NULL,
  `patient_name` varchar(500) NOT NULL,
  `appointment_date` varchar(100) NOT NULL,
  `doctor_name` varchar(500) NOT NULL,
  `status` int(100) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `patient_name`, `appointment_date`, `doctor_name`, `status`) VALUES
(2, 'thomas paul', '2021-12-08T00:03', 'Ajith', 1),
(3, 'lali', '2021-12-15T23:03', 'Threse', 1),
(5, 'ankitha', '2021-12-16T09:00', 'Tommy', 1),
(6, 'lali', '2022-03-05T09:00', 'Thomas', 1),
(7, 'mrudul', '2022-03-06T09:00', 'Shalini', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `bill_amount` int(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `status` int(100) NOT NULL DEFAULT 1,
  `bill_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `user_id`, `bill_amount`, `payment_method`, `status`, `bill_date`) VALUES
(1, 1, 100, 'card', 1, '29/11/2021');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(100) NOT NULL,
  `doc_email` varchar(100) NOT NULL,
  `doc_phone` int(10) NOT NULL,
  `doc_created_at` date NOT NULL DEFAULT current_timestamp(),
  `doc_department` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(100) NOT NULL,
  `doc_fees` int(11) NOT NULL,
  `doctor_name` varchar(1000) NOT NULL,
  `specialization` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doc_fees`, `doctor_name`, `specialization`) VALUES
(1, 100, 'Thomas Antony', 'ortho'),
(2, 300, 'Varghese Paul', 'Dermatology'),
(3, 300, 'Shalini Mathew', 'pediatrision'),
(4, 300, 'Threse Joseph', 'Gynocology'),
(5, 300, 'Tommy Chacko', 'General Medicine'),
(6, 300, 'Shibu Thomas', 'Cardiology'),
(7, 300, 'Sheela Mathew', 'Pediatrision'),
(8, 300, 'Ajith Kumar', 'Homeopathy');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospital_id` int(100) NOT NULL,
  `license` varchar(500) NOT NULL,
  `hospital_name` varchar(100) NOT NULL,
  `hospital_location` varchar(1000) NOT NULL,
  `hospital_number` int(100) NOT NULL,
  `hospital_email` varchar(1000) NOT NULL,
  `user_created_at` date NOT NULL DEFAULT current_timestamp(),
  `status` int(100) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospital_id`, `license`, `hospital_name`, `hospital_location`, `hospital_number`, `hospital_email`, `user_created_at`, `status`) VALUES
(5, '56985488', 'Mary queens ', '26 mile', 944728712, 'ALL', '0000-00-00', 1),
(6, '96325874', 'Mar Sleeva', 'Kottayam', 790712453, 'All', '0000-00-00', 1),
(7, '99885566', 'sony memorial', 'erumely', 2147483647, 'ortho', '0000-00-00', 1),
(9, '99332255', 'caritas', 'Kottayam', 2147483647, 'ALL', '2021-12-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `file_name` varchar(500) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`id`, `date`, `file_name`, `status`) VALUES
(4, '2022-04-06', '', 0),
(5, '2022-04-06', '', 1),
(6, '2022-04-06', 'Feedback form - New (1).xls', 1),
(7, '2022-04-06', 'abstractold.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `new_appointment`
--

CREATE TABLE `new_appointment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `hosptial_id` int(11) NOT NULL,
  `time_slot` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_appointment`
--

INSERT INTO `new_appointment` (`id`, `user_id`, `patient_name`, `doctor_id`, `hosptial_id`, `time_slot`, `date`, `status`) VALUES
(1, 1012, 'lali', 1, 5, 9, '04/08/2022', 1),
(2, 1012, 'jomon', 4, 5, 10, '04/07/2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `specialization_id` int(100) NOT NULL,
  `specialization` varchar(1000) DEFAULT NULL,
  `creation_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updation_date` timestamp(6) NULL DEFAULT NULL ON UPDATE current_timestamp(6),
  `specialization_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`specialization_id`, `specialization`, `creation_date`, `updation_date`, `specialization_status`) VALUES
(2, 'gynocology', '2021-11-29 06:04:03.000000', '2021-12-14 18:29:12.249469', 1),
(5, 'Oncology', '2021-11-29 06:04:43.000000', '2021-12-14 18:29:17.870086', 1),
(6, 'Homeopathy', '2021-11-29 06:05:49.000000', '2021-12-14 18:29:22.635346', 1),
(7, 'General physician', '2021-11-29 06:05:56.000000', '2021-12-14 18:29:26.388089', 1),
(8, 'ENT', '2021-11-29 06:07:07.000000', '2021-12-14 18:29:30.582470', 1),
(9, 'Pediatrision', '2021-11-29 06:07:13.000000', '2021-12-14 18:29:34.154877', 1),
(10, 'Dermatology', '2021-11-29 06:07:18.000000', '2021-12-14 18:29:37.840099', 1),
(11, 'Ayurveda', '2021-12-06 06:12:19.000000', '2021-12-14 18:29:41.415201', 1),
(12, 'orthopedia', '2021-12-14 18:32:12.043801', '2021-12-14 18:48:06.007142', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(100) NOT NULL,
  `staff_email` varchar(100) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `staff_department` varchar(500) NOT NULL,
  `staff_created_at` varchar(100) NOT NULL,
  `staff_status` int(100) NOT NULL DEFAULT 1,
  `password` varchar(100) NOT NULL,
  `phn_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_email`, `staff_name`, `staff_department`, `staff_created_at`, `staff_status`, `password`, `phn_number`) VALUES
(6, 'ekhil@gmail.com', 'Ekhil A', 'Pediatrision', '2021-12-07', 1, '9fab6755cd2e8817d3e73b0978ca54a6', 2147483647),
(7, 'aby321@gmail.com', 'aby Sebastian', 'cardiac', '2021-12-07', 1, 'e719b97358a676ad529e8970a7de311a', 2147483647),
(10, 'telbincherian@mca.ajce.in', 'telbin', 'Homeopathy', '2021-12-15', 1, 'CM4D[)p5 ', 2147483647),
(11, 'abysebastian73@gmail.com', 'ghf', 'gynocology', '2022-03-08', 1, '353bf1082336a20793b65c0bb9a1ab96 ', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phn_number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `user_created_at` varchar(100) NOT NULL,
  `user_status` int(2) NOT NULL DEFAULT 1,
  `address` varchar(1000) DEFAULT 'Enter address',
  `profile_pic` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `phn_number`, `email`, `password`, `user_created_at`, `user_status`, `address`, `profile_pic`) VALUES
(18, 'akhil', '1234567899', 'akhil@gmail.com', '7815696ecbf1c96e6894b779456d330e', '2021-11-23', 0, '', ''),
(22, 'ligin', '8848017820', 'ligin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-04', 3, '', ''),
(23, 'manas', '8086297005', 'jacobjojy341@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-04', 1, '', ''),
(25, 'frank', '884802963', 'frank123@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-12-06', 1, '', ''),
(31, 'albin p thomas', '8848026344', 'albinpthomas@gmail.com', 'b4f4a15ee4999650458e0c705ebacad9', '2021-12-06', 1, '', ''),
(35, 'amal', '7894561230', 'akshai@gmail.com', 'b2023820a60123ef4e6869bacaf7d90c', '2021-12-06', 1, '', ''),
(1000, 'admin', '9947476159', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-07', 2, '', ''),
(1003, 'jacob', '9447287294', 'jacob@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-12-07', 1, '', ''),
(1004, 'superadmin', '9961396531', 'superadmin@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-12-07', 2, '', ''),
(1009, 'abyson mathew', '995866325', 'abysonmathew@mca.ajce.in', 'ae8f1b5d98c1e1bb983263ea0c53dd47', '2021-12-15', 1, '', ''),
(1010, 'mathew', '7034445390', 'mathew@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-20', 3, 'THANNICKAL HOUSE ERUMELY P.O ERUMELY', 'Screenshot 2021-09-24 111215.png'),
(1012, 'james jojy', '9048871946', 'james@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2022-03-05', 1, 'Mannamplackal house erumely po erumely', 'mail.jpg'),
(1013, 'mrudul', '9961366531', 'mrudul@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2022-03-06', 2, 'Enter address', ''),
(1014, 'Manas', '6546545412', 'manasp@gmail.com', '572956342d0232063019a7863d029391', '2022-04-06', 1, 'Enter address', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_appointment`
--
ALTER TABLE `new_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`specialization_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospital_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `new_appointment`
--
ALTER TABLE `new_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `specialization_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
