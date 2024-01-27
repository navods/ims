-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 08:33 AM
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
-- Table structure for table `deps`
--

CREATE TABLE `deps` (
  `depID` int(11) NOT NULL,
  `depName` varchar(150) DEFAULT NULL,
  `facID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facs`
--

CREATE TABLE `facs` (
  `facID` int(11) NOT NULL,
  `facName` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `labID` int(11) NOT NULL,
  `labName` varchar(150) DEFAULT NULL,
  `depID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('rosara', '$2y$10$DLDNO8AFY.bEL2OuNascUOVwkWWUaYq9mZ.Yw2frg0X.cWqS50joW', 'Rosara Dayaratne', 'rosara@gmail.com', NULL, 0),
('test', '$2y$10$EAA9Xu.boe3f/YZw5S4ILeYJrfgbJ4K7M/l0wJtMLDoRXdTj8t5Di', 'testing', 'test@gmail.com', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deps`
--
ALTER TABLE `deps`
  ADD PRIMARY KEY (`depID`),
  ADD KEY `facID` (`facID`);

--
-- Indexes for table `facs`
--
ALTER TABLE `facs`
  ADD PRIMARY KEY (`facID`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`labID`),
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
-- Constraints for table `deps`
--
ALTER TABLE `deps`
  ADD CONSTRAINT `deps_ibfk_1` FOREIGN KEY (`facID`) REFERENCES `facs` (`facID`);

--
-- Constraints for table `labs`
--
ALTER TABLE `labs`
  ADD CONSTRAINT `labs_ibfk_1` FOREIGN KEY (`depID`) REFERENCES `deps` (`depID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
