-- phpMyAdmin SQL Dump
-- version 5.2.1-1.fc37
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2023 at 03:49 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SEpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `username` varchar(50) NOT NULL,
  `about` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`username`, `about`) VALUES
('iit2021087', 'I am outgoing, dedicated, and open-minded. I get across to people and adjust to changes with ease. I believe that a person should work on developing their professional skills and learning new things all the time. Currently, I am looking for new career opportunities my current job position cannot provide.');

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `username` varchar(50) NOT NULL,
  `social` varchar(20) NOT NULL,
  `Ntech` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `flags`
--

INSERT INTO `flags` (`username`, `social`, `Ntech`) VALUES
('iit2021087', 'false', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `forgot`
--

CREATE TABLE `forgot` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiryDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `handles`
--

CREATE TABLE `handles` (
  `username` varchar(50) NOT NULL,
  `git` varchar(50) NOT NULL,
  `insta` varchar(50) NOT NULL,
  `twit` varchar(50) NOT NULL,
  `face` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `handles`
--

INSERT INTO `handles` (`username`, `git`, `insta`, `twit`, `face`) VALUES
('iit2021087', 'shreyansh1215', 'shrey', 'twit', 'face');

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `department` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`username`, `password`, `email`, `name`, `department`, `role`) VALUES
('admin@iiita.ac.in', '7228499d50771162510b6ca2727eb300', 'admin@iiita.ac.in', 'admin', '', 'admin'),
('iit2021087', '7228499d50771162510b6ca2727eb300', 'iit2021087@iiita.ac.in', 'Shreyansh Jain', 'it', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `nonTechnical`
--

CREATE TABLE `nonTechnical` (
  `username` varchar(50) NOT NULL,
  `serial#` varchar(20) NOT NULL,
  `skill` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nonTechnical`
--

INSERT INTO `nonTechnical` (`username`, `serial#`, `skill`) VALUES
('iit2021087', 'Ntech1', 'Cricket'),
('iit2021087', 'Ntech2', 'Video'),
('iit2021087', 'Ntech3', 'Photography'),
('iit2021087', 'Ntech4', 'Music'),
('iit2021087', 'Ntech5', '');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `username` varchar(50) NOT NULL,
  `serial#` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pron` varchar(255) NOT NULL,
  `prod` varchar(255) NOT NULL,
  `prol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`username`, `serial#`, `pron`, `prod`, `prol`) VALUES
('iit2021087', '1', 'hello hello', 'A web Application to build and showcase your portfolio.', 'hello hello'),
('iit2021087', '2', 'An', 'Web Application to sell books online.', 'An');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiryDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technical`
--

CREATE TABLE `technical` (
  `username` varchar(50) NOT NULL,
  `serial#` varchar(20) NOT NULL,
  `skill` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `technical`
--

INSERT INTO `technical` (`username`, `serial#`, `skill`) VALUES
('iit2021087', 'tech1', 'C++'),
('iit2021087', 'tech2', 'SQL'),
('iit2021087', 'tech3', 'WebD'),
('iit2021087', 'tech4', 'AppD'),
('iit2021087', 'tech5', 'Cryptomining');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `flags`
--
ALTER TABLE `flags`
  ADD KEY `flags_ibfk_1` (`username`);

--
-- Indexes for table `forgot`
--
ALTER TABLE `forgot`
  ADD PRIMARY KEY (`email`,`token`);

--
-- Indexes for table `handles`
--
ALTER TABLE `handles`
  ADD KEY `handles_ibfk_1` (`username`);

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `nonTechnical`
--
ALTER TABLE `nonTechnical`
  ADD KEY `nonTechnical_ibfk_1` (`username`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD KEY `project_ibfk_1` (`username`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`email`,`token`);

--
-- Indexes for table `technical`
--
ALTER TABLE `technical`
  ADD KEY `technical_ibfk_1` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`username`) REFERENCES `logindetails` (`username`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `flags`
--
ALTER TABLE `flags`
  ADD CONSTRAINT `flags_ibfk_1` FOREIGN KEY (`username`) REFERENCES `logindetails` (`username`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `handles`
--
ALTER TABLE `handles`
  ADD CONSTRAINT `handles_ibfk_1` FOREIGN KEY (`username`) REFERENCES `logindetails` (`username`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `nonTechnical`
--
ALTER TABLE `nonTechnical`
  ADD CONSTRAINT `nonTechnical_ibfk_1` FOREIGN KEY (`username`) REFERENCES `logindetails` (`username`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`username`) REFERENCES `logindetails` (`username`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `technical`
--
ALTER TABLE `technical`
  ADD CONSTRAINT `technical_ibfk_1` FOREIGN KEY (`username`) REFERENCES `logindetails` (`username`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
