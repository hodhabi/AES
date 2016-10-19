-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2016 at 08:44 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FWA`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `Course` varchar(9) NOT NULL DEFAULT '',
  `semester` varchar(2) DEFAULT NULL,
  `day` int(3) DEFAULT NULL,
  `nStudents` int(11) NOT NULL,
  `Duration` int(3) NOT NULL,
  `Deliverytype` varchar(100) NOT NULL,
  `ExamMethod` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `coursesBAK`
--

CREATE TABLE IF NOT EXISTS `coursesBAK` (
  `Course` varchar(9) NOT NULL DEFAULT '',
  `semester` varchar(2) DEFAULT NULL,
  `day` int(3) DEFAULT NULL,
  `nStudents` int(11) NOT NULL,
  `Duration` int(3) NOT NULL,
  `Deliverytype` varchar(100) NOT NULL,
  `ExamMethod` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examsession`
--

CREATE TABLE IF NOT EXISTS `examsession` (
  `slot` int(2) NOT NULL DEFAULT '0',
  `Date` varchar(9) DEFAULT NULL,
  `Start` int(2) DEFAULT NULL,
  `End` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registeration`
--

CREATE TABLE IF NOT EXISTS `registeration` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(9) DEFAULT NULL,
  `Campus` varchar(4) DEFAULT NULL,
  `Course` varchar(8) DEFAULT NULL,
  `Division` varchar(30) DEFAULT NULL,
  `day` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registeration2`
--

CREATE TABLE IF NOT EXISTS `registeration2` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(9) DEFAULT NULL,
  `Campus` varchar(6) DEFAULT NULL,
  `StudentDivision` varchar(30) DEFAULT NULL,
  `Course` varchar(9) DEFAULT NULL,
  `CourseDivision` varchar(30) DEFAULT NULL,
  `day` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registerationBAK`
--

CREATE TABLE IF NOT EXISTS `registerationBAK` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(9) DEFAULT NULL,
  `Campus` varchar(6) DEFAULT NULL,
  `StudentDivision` varchar(30) DEFAULT NULL,
  `Course` varchar(9) DEFAULT NULL,
  `CourseDivision` varchar(30) DEFAULT NULL,
  `day` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Course`);

--
-- Indexes for table `coursesBAK`
--
ALTER TABLE `coursesBAK`
  ADD PRIMARY KEY (`Course`);

--
-- Indexes for table `examsession`
--
ALTER TABLE `examsession`
  ADD PRIMARY KEY (`slot`);

--
-- Indexes for table `registeration`
--
ALTER TABLE `registeration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `StudentId` (`StudentId`),
  ADD KEY `Course` (`Course`),
  ADD KEY `day` (`day`);

--
-- Indexes for table `registeration2`
--
ALTER TABLE `registeration2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day` (`day`),
  ADD KEY `Course` (`Course`),
  ADD KEY `Course_2` (`Course`),
  ADD KEY `day_2` (`day`),
  ADD KEY `StudentId` (`StudentId`);

--
-- Indexes for table `registerationBAK`
--
ALTER TABLE `registerationBAK`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day` (`day`),
  ADD KEY `Course` (`Course`),
  ADD KEY `Course_2` (`Course`),
  ADD KEY `day_2` (`day`),
  ADD KEY `StudentId` (`StudentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registeration`
--
ALTER TABLE `registeration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registeration2`
--
ALTER TABLE `registeration2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registerationBAK`
--
ALTER TABLE `registerationBAK`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
