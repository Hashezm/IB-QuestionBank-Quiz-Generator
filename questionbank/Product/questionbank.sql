-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 08:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questionbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `QuestionID` int(11) NOT NULL,
  `QuestionName` varchar(100) NOT NULL,
  `QuestionSection` varchar(1) NOT NULL,
  `QuestionSrc` varchar(200) NOT NULL,
  `MarkschemeSrc` varchar(200) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QuestionID`, `QuestionName`, `QuestionSection`, `QuestionSrc`, `MarkschemeSrc`, `time`) VALUES
(1, 'Features of a word processor and purpose of technical documentation', 'A', 'questions\\question1.png', 'questions\\question1_markscheme.png', 3),
(2, 'Peripheral', 'A', 'questions\\question2.png', 'questions\\question2_markscheme.png', 1),
(3, 'GUI features', 'A', 'questions\\question3.png', 'questions\\question3_markscheme.png', 2),
(4, 'Methods of Collecting Information from Stakeholders', 'A', 'questions\\question4.png', 'questions\\question4_markscheme.png', 2),
(5, 'Mail order company data security', 'B', 'questions\\question5.png', 'questions\\question5_markscheme.png', 15),
(6, 'A school teacher decides to write a program to store class records and marks', 'B', 'questions\\question6_part1.png,questions\\question6_part2.png,questions\\question6_part3.png', 'questions\\question6_markscheme_part1.png,questions\\question6_markscheme_part2.png,questions\\question6_markscheme_part3.png', 15),
(7, 'A company that provides training for teachers plans to set up a training room in its offices', 'B', 'questions\\question7.png', 'questions\\question7_markscheme_part1.png,questions\\question7_markscheme_part2.png', 15),
(8, 'Prototype used to demonstrate system to client', 'A', 'questions\\question8.png', 'questions\\question8_markscheme.png', 2),
(9, 'Hexadecimal and Binary numbers', 'A', 'questions\\question9.png', 'questions\\question9_markscheme.png', 1),
(10, 'Truth table and logic circuit', 'A', 'questions\\question10.png', 'questions\\question10_markscheme.png', 3),
(11, 'MAR and CPU', 'A', 'questions\\question11.png', 'questions\\question11_markscheme.png', 2),
(12, 'Central Processing Unit', 'A', 'questions\\question12.png', 'questions\\question12_markscheme.png', 1),
(13, 'Compilers', 'A', 'questions\\question13.png', 'questions\\question13_markscheme.png', 2),
(14, 'User documentation', 'A', 'questions\\question14.png', 'questions\\question14_markscheme.png', 2),
(15, 'Protocols uses', 'A', 'questions\\question15.png', 'questions\\question15_markscheme.png', 2),
(16, 'Personal Area Network', 'A', 'questions\\question16.png', 'questions\\question16_markscheme.png', 2),
(17, 'Packet Switching', 'A', 'questions\\question17.png', 'questions\\question17_markscheme.png', 3),
(18, 'Binary tree traversal', 'A', 'questions\\question18.png', 'questions\\question18_markscheme.png', 2),
(19, 'Operating System Paging', 'A', 'questions\\question19.png', 'questions\\question19_markscheme.png', 3),
(20, 'Direct Changeover', 'A', 'questions\\question20.png', 'questions\\question20_markscheme.png', 4),
(21, 'Autonomous Agents', 'A', 'questions\\question21.png', 'questions\\question21_markscheme.png', 2),
(22, 'Machine instruction cycle', 'A', 'questions\\question22.png', 'questions\\question22_markscheme.png', 3),
(23, 'Bubble sort', 'A', 'questions\\question23.png', 'questions\\question23_markscheme.png', 4),
(24, 'Truth table and logical expression', 'A', 'questions\\question24.png', 'questions\\question24_markscheme.png', 4),
(25, 'School LAN network', 'B', 'questions\\question25.png', 'questions\\question25_markscheme_part1.png,questions\\question25_markscheme_part2.png', 15),
(26, 'Designing a website', 'B', 'questions\\question26.png', 'questions\\question26_markscheme.png', 15);

-- --------------------------------------------------------

--
-- Table structure for table `question_unit`
--

CREATE TABLE `question_unit` (
  `QuestionID` int(11) NOT NULL,
  `UnitID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_unit`
--

INSERT INTO `question_unit` (`QuestionID`, `UnitID`) VALUES
(1, 11),
(1, 21),
(2, 21),
(3, 21),
(4, 12),
(5, 11),
(5, 12),
(6, 41),
(6, 42),
(6, 43),
(7, 21),
(7, 31),
(8, 12),
(9, 21),
(10, 21),
(11, 21),
(12, 21),
(13, 43),
(14, 11),
(15, 31),
(16, 31),
(17, 31),
(18, 51),
(19, 61),
(20, 11),
(21, 71),
(22, 21),
(23, 42),
(24, 21),
(25, 31),
(25, 42),
(26, 12),
(26, 21);

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE `recent` (
  `RecentID` int(11) NOT NULL,
  `RecentTest` text NOT NULL,
  `Username` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `UnitID` int(11) NOT NULL,
  `UnitName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`UnitID`, `UnitName`) VALUES
(51, 'Abstract data structures'),
(21, 'Computer organization'),
(42, 'Connecting computational thinking + program design'),
(71, 'Control'),
(41, 'General principles'),
(43, 'Introduction to Programming'),
(31, 'Networks'),
(61, 'Resource management'),
(12, 'System design basics'),
(11, 'Systems in Organizations');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserEmail`, `Username`, `FirstName`, `LastName`, `Password`) VALUES
(1, 'gamer@gmail.com', 's', 's', 's', 'ss'),
(2, 'hokoomeh@gmail.com', 'government', 'hokoomeh', 'lastname', 'society'),
(3, 'dsds@gmail.com', 'sdsds', 'dadad', 'dadada', 'dsdsds'),
(4, 'dbms@gmail.com', 'database manage', 'database', 'management', 'dbms'),
(5, 'hhalomari21@gmail.com', 'HashemAlom', 'Hashem', 'Alomari', 'Hashem2005'),
(6, 'forloving@gmail.com', 'hello everyone', 'squid ', 'game', 'thankyouguys'),
(8, 'fallguys@gmail.com', 'Gamer', 'sssss', 'ssdsds', 'sasas'),
(9, 'dsda@gmail.com', 'pdasdasddsd', 'dsadas', 'dasdas', 'dsadas'),
(10, 'oj@gmail.com', 'Omar', 'Omar', 'Jallouq', 'oj'),
(11, 'mohammadhaji@gmail.com', 'Mohammad Haji', 'Mohammad', 'Hajij', 'yaming'),
(13, 'radal@gmail.com', 'radalhzubui', 'rad', 'hh', 'hh'),
(14, 'AhmadHD@gmail.com', 'A7mad Gaming', 'Ahmad', 'Awaqleh', 'Hashem2005'),
(15, 'out@gmail.com', 'get', 'save', 'me', 'me'),
(16, 'alo@gmail.com', 'alo', 'aloha', 'aloao', 'alo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QuestionID`),
  ADD UNIQUE KEY `QuestionSrc` (`QuestionSrc`),
  ADD UNIQUE KEY `MarkschemeSrc` (`MarkschemeSrc`);

--
-- Indexes for table `question_unit`
--
ALTER TABLE `question_unit`
  ADD KEY `QuestionID` (`QuestionID`,`UnitID`),
  ADD KEY `UnitID` (`UnitID`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
  ADD PRIMARY KEY (`RecentID`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`UnitID`),
  ADD UNIQUE KEY `UnitName` (`UnitName`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `unique` (`UserEmail`),
  ADD UNIQUE KEY `composite` (`Username`,`Password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
  MODIFY `RecentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question_unit`
--
ALTER TABLE `question_unit`
  ADD CONSTRAINT `question_unit_ibfk_1` FOREIGN KEY (`UnitID`) REFERENCES `unit` (`UnitID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_unit_ibfk_2` FOREIGN KEY (`QuestionID`) REFERENCES `question` (`QuestionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recent`
--
ALTER TABLE `recent`
  ADD CONSTRAINT `recent_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
