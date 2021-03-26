-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 02:13 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid_19`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_driver`
--

CREATE TABLE `ambulance_driver` (
  `AD_ID` varchar(4) NOT NULL,
  `Vehicle_Reg` varchar(50) NOT NULL,
  `A_ID` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambulance_driver`
--

INSERT INTO `ambulance_driver` (`AD_ID`, `Vehicle_Reg`, `A_ID`) VALUES
('AD_0', 'DHAKA-D-11-9998', 'A_0'),
('AD_1', 'DHAKA-D-11-9999', 'A_0'),
('AD_2', 'DHAKA-D-11-9900', 'A_0');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `P_ID` varchar(10) NOT NULL,
  `H_Name` varchar(100) NOT NULL,
  `First_Vaccine_Date` varchar(10) NOT NULL,
  `D_Name_1` varchar(100) NOT NULL,
  `Second_Vaccine_Date` varchar(10) NOT NULL,
  `D_Name_2` varchar(100) NOT NULL,
  `PDate` varchar(10) NOT NULL,
  `Message` int(10) NOT NULL,
  `Disease_History` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`P_ID`, `H_Name`, `First_Vaccine_Date`, `D_Name_1`, `Second_Vaccine_Date`, `D_Name_2`, `PDate`, `Message`, `Disease_History`) VALUES
('P_100000', '', '', '', '', '', '12-03-2021', 1, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `U_ID` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `B_G` varchar(3) NOT NULL,
  `Age` int(3) NOT NULL,
  `Pre_Add` varchar(50) NOT NULL,
  `Per_Add` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(11) NOT NULL,
  `NID` varchar(14) DEFAULT NULL,
  `Photo` text DEFAULT NULL,
  `User_Name` varchar(20) NOT NULL,
  `Password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_ID`, `Name`, `DOB`, `Gender`, `B_G`, `Age`, `Pre_Add`, `Per_Add`, `Email`, `Mobile`, `NID`, `Photo`, `User_Name`, `Password`) VALUES
('AD_0', 'Sumit Malakar', '25-01-1980', 'Male', 'AB-', 40, 'Khulna', 'Khulna', 'malakar.sumit@gmail.com', '01715252525', '66666666', 'uploads/5038aacce4.jpg', 'SM123', '12345'),
('AD_1', 'Shahin', '27-08-1995', 'Male', 'A+', 23, 'Dhaka', 'Dhaka', 'shahin@gmail.com', '01715910000', '', 'uploads/46aafe7b91.png', 'Shahin123', '12345'),
('AD_2', 'Urmila Mazumder', '04-08-1998', 'Female', 'B+', 22, 'Dhaka', 'Narayangong', 'urmila.mazumder@gmail.com', '01714564858', '', 'uploads/4cc0c4750b.png', 'Urmila.Driver', '12345'),
('A_0', 'Hridoy Bir', '25-01-1980', 'Male', 'O+', 41, 'Dhaka', 'Dhaka', 'bir@gmail.com', '01715910000', '12345678912345', 'uploads/70c86ff133.png', 'bir.admin', '12345'),
('P_100000', 'S.M', '25-01-1980', 'Male', 'O+', 41, 'Dhaka', 'Khulna', 'malakar.satyajit@gmail.com', '01715910000', '12584632145874', NULL, 'None', 'None'),
('R_0', 'Progga Shirsho Some', '27-08-2000', 'Male', 'A+', 21, 'Dhaka', 'Khulna', 'progga.shome@gmail.com', '01715658585', '12548631247851', 'uploads/86c3ca47f0.png', 'progga.rec', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambulance_driver`
--
ALTER TABLE `ambulance_driver`
  ADD PRIMARY KEY (`AD_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`U_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
