-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 02:15 AM
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
  `depID` int(11) NOT NULL,
  `facID` int(11) NOT NULL,
  `depName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dep`
--

INSERT INTO `dep` (`depID`, `facID`, `depName`) VALUES
(1, 1, 'Department of Information and Communication Technology'),
(2, 1, 'Department of Instrumentation and Automation Technology'),
(3, 2, 'Department of Human Resources'),
(4, 2, 'Academic Affairs Department'),
(5, 1, 'Department of Agricultural Technology');

-- --------------------------------------------------------

--
-- Table structure for table `fac`
--

CREATE TABLE `fac` (
  `facID` int(11) NOT NULL,
  `facName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fac`
--

INSERT INTO `fac` (`facID`, `facName`) VALUES
(1, 'Faculty of Technology'),
(2, 'Main Office');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `labID` int(11) NOT NULL,
  `facID` int(11) NOT NULL,
  `depID` int(11) NOT NULL,
  `labName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`labID`, `facID`, `depID`, `labName`) VALUES
(1, 1, 2, 'A102'),
(2, 1, 1, 'D102'),
(4, 1, 5, 'B302');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(65) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userFac` varchar(10) DEFAULT NULL,
  `userDep` varchar(10) DEFAULT NULL,
  `userLab` varchar(10) DEFAULT NULL,
  `userP` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `fullName`, `email`, `userFac`, `userDep`, `userLab`, `userP`) VALUES
('Nav', 'lol', 'Navod Senarathne', 'nav@gmail.com', NULL, NULL, NULL, 0),
('reid', '$2y$10$Di/1qbdhhf9.cUS5btfdRujJ7Vv/b45.HjxaYIqmHkH8RnnjnSvPK', 'Reid LK', 'reid@reid.com', NULL, NULL, NULL, 0),
('test', '$2y$10$N1CGNK2Wwnb97oaKG8nFWOQTIH/upTbsgFjOqX.dxWpq0lkcxlgzq', 'Testing 123', 'test@check.com', 'FOT', 'IAT', 'A102', 3),
('user', '$2y$10$giXGSPgswp3TvKuZfzfXYuVt/Rmq34174y5JarjWl4nMP3u1b842S', 'user', 'user@gmail.com', NULL, NULL, NULL, 2);

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
  ADD PRIMARY KEY (`labID`,`depID`,`facID`),
  ADD KEY `facID` (`facID`),
  ADD KEY `depID` (`depID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dep`
--
ALTER TABLE `dep`
  MODIFY `depID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fac`
--
ALTER TABLE `fac`
  MODIFY `facID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `labID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `lab_ibfk_1` FOREIGN KEY (`facID`) REFERENCES `fac` (`facID`),
  ADD CONSTRAINT `lab_ibfk_2` FOREIGN KEY (`depID`) REFERENCES `dep` (`depID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
