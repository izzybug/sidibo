-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 15, 2023 at 06:43 AM
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
-- Database: `siparti`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-11-03 05:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `emp_id` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `NIM` char(50) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT 1,
  `role` varchar(30) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`emp_id`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Dob`, `Department`, `Address`, `NIM`, `Status`, `role`, `location`) VALUES
(1, 'Janobe', 'Martins', 'janobe@janobe.com', '36d59e2369f00c4d9f336acf4408bae9', 'Male', '3 February, 1990', 'ICT', 'N NEPO', '0248865955', 1, 'Student', 'NO-IMAGE-AVAILABLE.jpg'),
(2, 'Edem', 'Mcwilliams', 'james@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Male', '3 February, 1990', 'ICT', 'N NEPO', '8587944255', 1, 'Admin', '296577871_1941852899344663_2372952534954040402_n.jpeg'),
(4, 'Nathaniel', 'Nkrumah', 'nat@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Male', '3 February, 1990', 'ICT', 'N NEPO', '587944255', 1, 'Admin', 'NO-IMAGE-AVAILABLE.jpg'),
(5, 'Gideon', 'Annan', 'gideon@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Male', '3 February, 1990', 'ICT', 'N NEPO', '587944255', 1, 'HOD', 'photo5.jpg'),
(6, 'Martha', 'Arthur', 'mat@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Female', '3 February, 1990', 'KPR', 'N NEPO', '587944255', 1, 'Student', 'NO-IMAGE-AVAILABLE.jpg'),
(7, 'Bridget', 'Gafa', 'bridget@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Female', '3 February, 1990', 'ICT', 'N NEPO', '0596667981', 1, 'Student', 'download.jpeg'),
(8, 'Anna', 'Mensah', 'an@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Female', '3 February, 1990', 'ICT', 'N NEPO', '587944255', 1, 'HOD', 'NO-IMAGE-AVAILABLE.jpg'),
(15, 'Muhammad', 'Izza Iqbal', 'user1@user1', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '01 September 2003', 'ICT', 'Jawa barat', '123456789', 1, 'Student', '../vendors/images/logo-poltek.png'),
(16, 'izza', 'Iqbal', 'user2@user2', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '02 September 2023', 'ICT', 'Elendra Kost, Trihanggo, Gamping, Sleman Regency, Jogja', '52416273', 1, 'Student', '../vendors/images/logo-poltek.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblkeperluan`
--

CREATE TABLE `tblkeperluan` (
  `id` int(11) NOT NULL,
  `Keperluan` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblkeperluan`
--

INSERT INTO `tblkeperluan` (`id`, `Keperluan`, `Description`, `CreationDate`) VALUES
(5, 'Izin Penelitian', 'Izin Penelitian', '2021-05-19 14:32:03'),
(6, 'Pengajuan KTI', 'Pengajuan KTI', '2021-05-19 15:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `tblpengajuan`
--

CREATE TABLE `tblpengajuan` (
  `kti_id` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `NIM` varchar(20) NOT NULL,
  `ProgramStudi` varchar(30) NOT NULL,
  `Keperluan` varchar(30) DEFAULT NULL,
  `JudulProposal` varchar(100) DEFAULT NULL,
  `WaktuPenelitian` varchar(30) DEFAULT NULL,
  `TempatPenelitian` varchar(100) DEFAULT NULL,
  `PostingDate` date NOT NULL,
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `admin_status` int(11) NOT NULL DEFAULT 0,
  `IsRead` int(1) NOT NULL,
  `empid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpengajuan`
--

INSERT INTO `tblpengajuan` (`kti_id`, `FirstName`, `LastName`, `NIM`, `ProgramStudi`, `Keperluan`, `JudulProposal`, `WaktuPenelitian`, `TempatPenelitian`, `PostingDate`, `AdminRemark`, `AdminRemarkDate`, `Status`, `admin_status`, `IsRead`, `empid`) VALUES
(1, 'Izza', 'Iqbal', '5210352736', 'RMIK', 'Izin Penelitian', 'aja aka aja hsja jskand', '12 September 2023', 'Rumah Sakit Gunung Jati', '2023-09-12', 'okok', '2023-09-14 21:47:59 ', 1, 0, 1, 7),
(2, 'a', 's', '5210352732', 'RMIK', 'Izin Penelitian', 'as', '13 September 2023', 'as', '2023-09-12', 'ok', '2023-09-13 10:16:21 ', 1, 0, 1, 7),
(3, 'a', 'a', '123', 'RMIK', 'Pengajuan KTI', 'asd', '14 September 2023', 'as', '2023-09-12', 'ga jelas', '2023-09-13 21:57:10 ', 2, 2, 1, 7),
(4, 'Amelia', 'Sevilla', '123456678', 'RMIK', 'Izin Penelitian', 'Kenapa Ayam berkokok pada pagi hari', '30 September 2023', 'RSUD Gunung Jati', '2023-09-13', NULL, NULL, 0, 0, 0, 5),
(5, 'Lionel', 'Messi', '5210493523', 'KPR', 'Pengajuan KTI', 'asd', '21 September 2023', 'ad', '2023-09-13', NULL, NULL, 0, 0, 0, 5),
(6, 'Amelia', 'Sevilla', '4523134', 'RMIK', 'Izin Penelitian', 'asdfghjjk', '07 September 2023', 'rsud gunung jati', '2023-09-14', NULL, NULL, 0, 0, 1, 7),
(7, 'asdf', 'asd', '123', 'RMIK', 'Izin Penelitian', 'sdfg', '15 September 2023', 'sdf', '2023-09-14', NULL, NULL, 0, 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblprogramstudi`
--

CREATE TABLE `tblprogramstudi` (
  `id` int(11) NOT NULL,
  `ProgramStudi` varchar(150) DEFAULT NULL,
  `Prodi` varchar(100) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblprogramstudi`
--

INSERT INTO `tblprogramstudi` (`id`, `ProgramStudi`, `Prodi`, `CreationDate`) VALUES
(1, 'Rekam Medis dan Informasi Kesehatan', 'RMIK', '2023-11-01 00:19:37'),
(2, 'Keperawatan', 'KPR', '2023-05-21 01:27:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tblkeperluan`
--
ALTER TABLE `tblkeperluan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpengajuan`
--
ALTER TABLE `tblpengajuan`
  ADD PRIMARY KEY (`kti_id`),
  ADD KEY `UserEmail` (`empid`);

--
-- Indexes for table `tblprogramstudi`
--
ALTER TABLE `tblprogramstudi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblkeperluan`
--
ALTER TABLE `tblkeperluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblpengajuan`
--
ALTER TABLE `tblpengajuan`
  MODIFY `kti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblprogramstudi`
--
ALTER TABLE `tblprogramstudi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
