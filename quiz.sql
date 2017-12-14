-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2017 at 08:20 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `QUIZ`
--

-- --------------------------------------------------------

--
-- Table structure for table `ANSWERS`
--

CREATE TABLE `ANSWERS` (
  `ID` tinyint(4) NOT NULL,
  `questions_ID` tinyint(4) NOT NULL,
  `answer` text NOT NULL,
  `wrong_correct` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `ANSWERS` (`ID`, `questions_ID`, `answer`, `wrong_correct`) VALUES
(1, 1, 'galīgi grūts', 1),
(3, 1, 'grūts', 0),
(4, 1, 'vidēji grūts', 0),
(5, 1, 'viegls', 0),
(6, 2, 'Kampala', 0),
(7, 2, 'Kambala', 0),
(8, 2, 'Kigali', 1),
(9, 2, 'Ligali', 0),
(10, 2, 'Maseru', 0),
(11, 2, 'Suseru', 0),
(12, 3, 'Atļauts', 0),
(13, 3, 'Aizliegts', 1),
(14, 6, 'galīgi grūts', 0),
(15, 6, 'grūts', 1),
(16, 6, 'vidēji grūts', 0),
(17, 6, 'viegls', 0),
(18, 7, 'Ruphus', 0),
(19, 7, 'Betula', 1),
(20, 7, 'Kaligula', 0),
(21, 8, 'Konuss', 0),
(22, 8, 'Taurīte', 0),
(23, 8, 'Vēršataure', 0),
(24, 8, 'Eņģeļtaure', 1),
(25, 9, 'galīgi grūts', 0),
(26, 9, 'grūts', 0),
(27, 9, 'vidēji grūts', 1),
(28, 9, 'viegls', 0),
(29, 10, 'fukši', 1),
(30, 10, 'mokši', 0),
(31, 10, 'lokši', 0),
(32, 11, 'zaļa', 1),
(33, 11, 'zila', 0),
(34, 11, 'melna', 0),
(35, 11, 'sarkana', 0),
(36, 11, 'lillā', 0),
(37, 11, 'rozā', 0),
(38, 12, 'galīgi grūts', 0),
(39, 12, 'grūts', 0),
(40, 12, 'vidēji grūts', 0),
(41, 12, 'viegls', 1),
(42, 13, 'viens', 0),
(43, 13, 'divi', 0),
(44, 13, 'trīs', 1),
(45, 13, 'četri', 0),
(46, 13, 'pieci', 0),
(47, 13, 'seši', 0),
(48, 13, 'septiņi', 0),
(49, 13, 'astoņi', 0),
(50, 13, 'deviņi', 0),
(60, 14, 'nepareizā atbilde', 0),
(61, 14, 'nepareizā atbilde', 0),
(62, 14, 'pareizā atbilde', 1),
(63, 14, 'nepareizā atbilde', 0),
(64, 14, 'nepareizā atbilde', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `QUESTIONS` (
  `ID` tinyint(4) NOT NULL COMMENT 'question ID',
  `TEST_ID` tinyint(4) NOT NULL COMMENT 'from testlist ID',
  `QUESTION` text NOT NULL,
  `QUESTION_NO` tinyint(4) NOT NULL COMMENT 'question nomber'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `QUESTIONS`
--

INSERT INTO `QUESTIONS` (`ID`, `TEST_ID`, `QUESTION`, `QUESTION_NO`) VALUES
(1, 1, 'Šis tests ir:', 1),
(2, 1, 'Kas ir Ruandas galvaspilsēta?', 2),
(3, 1, 'Vai attēlotajā situācijā vieglā automobiļa vadītājam atļauts apgriezties braukšanai pretējā virzienā?', 3),
(6, 2, 'Šis tests ir:', 1),
(7, 2, 'Bērza latīniskais nosaukums ir:', 2),
(8, 2, 'Šo puķi sauc:', 3),
(9, 3, 'Šis tests ir:', 1),
(10, 3, 'Pirmkursnieki ir:', 2),
(11, 3, 'Šī krāsa ir:', 3),
(12, 4, 'Šis tests ir:', 1),
(13, 4, '“3” ir:', 2),
(14, 4, 'Izvēlies pareizo atbildi:', 3);

-- --------------------------------------------------------

--
-- Table structure for table `testlist`
--

CREATE TABLE `testlist` (
  `ID` tinyint(4) NOT NULL,
  `TEST_NAME` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='test list';

--
-- Dumping data for table `testlist`
--

INSERT INTO `TESTLIST` (`ID`, `TEST_NAME`) VALUES
(1, 'Galīgi grūts tests'),
(2, 'Grūts tests'),
(3, 'Vidēji grūts tests'),
(4, 'Viegls tests');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `USER` (
  `ID` smallint(6) NOT NULL,
  `NAME` tinytext NOT NULL,
  `SESSION_KEY` varchar(64) DEFAULT NULL,
  `ANSWER1` tinyint(4) NOT NULL,
  `ANSWER2` tinyint(4) NOT NULL,
  `ANSWER3` tinyint(4) NOT NULL,
  `RESULT` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `USER`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `ANSWERS`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `QUESTIONS` (`questions_ID`);

--
-- Indexes for table `QUESTIONS`
--
ALTER TABLE `QUESTIONS`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `test` (`TEST_ID`);

--
-- Indexes for table `TESTLIST`
--
ALTER TABLE `TESTLIST`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ANSWERS`
--
ALTER TABLE `ANSWERS`
  MODIFY `ID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `QUESTIONS`
--
ALTER TABLE `QUESTIONS`
  MODIFY `ID` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'question ID', AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `TESTLIST`
--
ALTER TABLE `TESTLIST`
  MODIFY `ID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
