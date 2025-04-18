-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2025 at 08:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_details`
--

CREATE TABLE `appointment_details` (
  `apid` int(5) NOT NULL,
  `docid` int(5) NOT NULL,
  `patid` int(5) NOT NULL,
  `apdate` date NOT NULL,
  `slot` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_details`
--

INSERT INTO `appointment_details` (`apid`, `docid`, `patid`, `apdate`, `slot`) VALUES
(20, 1, 15, '2025-04-24', 'Afternoon'),
(21, 6, 16, '2025-05-01', 'Afternoon');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_details`
--

CREATE TABLE `doctor_details` (
  `docid` int(5) NOT NULL,
  `docfname` varchar(20) NOT NULL,
  `docsname` varchar(20) NOT NULL,
  `docemail` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `docmob` bigint(10) NOT NULL,
  `docaddress` varchar(20) NOT NULL,
  `docdoj` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `special` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_details`
--

INSERT INTO `doctor_details` (`docid`, `docfname`, `docsname`, `docemail`, `gender`, `docmob`, `docaddress`, `docdoj`, `username`, `password`, `special`) VALUES
(1, 'Ruban', 'george', 'ruban@gmail', 'Male', 9446189371, 'AHouse', '2025-04-01', 'ruban11', '1234', ''),
(4, 'Sam', 'Abraham', 'sam@gmail.com', 'Male', 987654321, 'Sam House', '2025-04-02', 'sam123', 'sampass', 'Oncologist'),
(6, 'Seema', 'A', 'seema@gmail.com', 'Female', 6789054321, 'Seema house', '2025-04-01', 'seema123', 's123', 'Nephrology');

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

CREATE TABLE `patient_details` (
  `patid` int(5) NOT NULL,
  `patfname` varchar(20) NOT NULL,
  `patsname` varchar(20) NOT NULL,
  `patdob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `patemail` varchar(30) NOT NULL,
  `patmob` int(10) NOT NULL,
  `pataddress` varchar(40) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`patid`, `patfname`, `patsname`, `patdob`, `gender`, `patemail`, `patmob`, `pataddress`, `username`, `password`) VALUES
(1, 'Nivin', 'Thomas', '1976-04-21', 'Male', 'nivi@gmail.com', 1234567890, 'NivinVilla', 'nivi123', 'suma1'),
(15, 'Sooraj', 'Santhosh', '2025-04-09', 'Male', 'sooraj@gmail', 1146189371, 'Sooraj House', 'soor11', 'soor123'),
(16, 'Sneha', 'Susan', '2025-02-05', 'Female', 'sneha@gmail.com', 987654321, 'Snehavilla', 'sneha123', 's12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_details`
--
ALTER TABLE `appointment_details`
  ADD PRIMARY KEY (`apid`);

--
-- Indexes for table `doctor_details`
--
ALTER TABLE `doctor_details`
  ADD PRIMARY KEY (`docid`);

--
-- Indexes for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD PRIMARY KEY (`patid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_details`
--
ALTER TABLE `appointment_details`
  MODIFY `apid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `doctor_details`
--
ALTER TABLE `doctor_details`
  MODIFY `docid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_details`
--
ALTER TABLE `patient_details`
  MODIFY `patid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
