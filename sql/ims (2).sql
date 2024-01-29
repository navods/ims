-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 03:01 AM
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
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `dep`
--

CREATE TABLE `dep` (
  `depID` varchar(10) NOT NULL,
  `facID` varchar(10) NOT NULL,
  `depName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dep`
--

INSERT INTO `dep` (`depID`, `facID`, `depName`) VALUES
('ACAF', 'MO', 'Academic Affairs Department'),
('ACC', 'MO', 'Accounts Department'),
('ADMS', 'MO', 'Admissions Department'),
('AT', 'FOT', 'Department of Agricultural Technology'),
('ET', 'FOT', 'Department of Environmental Technology'),
('FOTO', 'FOT', 'Office of Faculty of Technology'),
('HR', 'MO', 'Human Resources Department'),
('IAT', 'FOT', 'Department of Instrumentation & Automation Technology'),
('ICT', 'FOT', 'Department of Information & Communication Technology'),
('LEAF', 'MO', 'Legal Affairs Department'),
('PR', 'MO', 'Public Relations Department'),
('REG', 'MO', 'Registrar Office'),
('RSCH', 'MO', 'Research Department'),
('STAF', 'MO', 'Student Affairs Department');

-- --------------------------------------------------------

--
-- Table structure for table `fac`
--

CREATE TABLE `fac` (
  `facID` varchar(10) NOT NULL,
  `facName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fac`
--

INSERT INTO `fac` (`facID`, `facName`) VALUES
('FOT', 'Faculty of Technology'),
('MO', 'Main Office');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `labID` varchar(10) NOT NULL,
  `depID` varchar(10) NOT NULL,
  `labName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`labID`, `depID`, `labName`) VALUES
('A101', 'IAT', 'A101 Computer Lab'),
('A102', 'IAT', 'A102 Instrument Lab');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(65) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userSection` varchar(50) DEFAULT NULL,
  `userP` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `fullName`, `email`, `userSection`, `userP`) VALUES
('Nav', 'lol', 'Navod Senarathne', 'nav@gmail.com', NULL, 0),
('test', '$2y$10$iewTuBib9gKAdIlE6T7o2Ooyh.2NNuGPJZ/MOTcBji0w7v3RTx/zy', 'testing', 'test@gmail.com', NULL, 1),
('user', '$2y$10$giXGSPgswp3TvKuZfzfXYuVt/Rmq34174y5JarjWl4nMP3u1b842S', 'user', 'user@gmail.com', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dep`
--
ALTER TABLE `dep`
  ADD PRIMARY KEY (`depID`,`facID`),
  ADD KEY `facID` (`facID`);

--
-- Indexes for table `fac`
--
ALTER TABLE `fac`
  ADD PRIMARY KEY (`facID`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`labID`,`depID`),
  ADD KEY `depID` (`depID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dep`
--
ALTER TABLE `dep`
  ADD CONSTRAINT `dep_ibfk_1` FOREIGN KEY (`facID`) REFERENCES `fac` (`facID`);

--
-- Constraints for table `lab`
--
ALTER TABLE `lab`
  ADD CONSTRAINT `lab_ibfk_1` FOREIGN KEY (`depID`) REFERENCES `dep` (`depID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
