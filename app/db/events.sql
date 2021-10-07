-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 04:29 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendee`
--

CREATE TABLE `attendee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendee`
--

INSERT INTO `attendee` (`id`, `name`, `password`, `role`) VALUES
(30, 'tomas', '1234', 1),
(29, 'tomas111111', 'aaaa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendee_event`
--

CREATE TABLE `attendee_event` (
  `event` int(11) NOT NULL,
  `attendee` int(11) NOT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendee_session`
--

CREATE TABLE `attendee_session` (
  `session` int(11) NOT NULL,
  `attendee` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `idevent` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `datestart` datetime NOT NULL,
  `dateend` datetime NOT NULL,
  `numberallowed` int(11) NOT NULL,
  `venue` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`idevent`, `name`, `datestart`, `dateend`, `numberallowed`, `venue`) VALUES
(1, 'Moto GP racing', '2021-10-04 08:13:18', '2021-10-08 10:13:18', 1500, 1),
(2, 'Super event 500', '2021-10-06 10:13:18', '2021-10-14 10:13:18', 3450, 2),
(3, 'Tee Hee hee', '2021-10-06 08:13:18', '2021-10-19 10:13:18', 900, 2),
(4, 'Grupno pijenje vode', '2021-12-06 10:13:18', '2021-12-14 10:13:18', 450, 1);

-- --------------------------------------------------------

--
-- Table structure for table `manager_event`
--

CREATE TABLE `manager_event` (
  `event` int(11) NOT NULL,
  `manager` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idrole`, `name`) VALUES
(1, 'admin'),
(2, 'event manager'),
(3, 'attendee');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `idsession` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `numberallowed` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`idsession`, `name`, `numberallowed`, `event`, `startdate`, `enddate`) VALUES
(1, 'Race track 1', 100, 1, '2021-10-04 08:00:58', '2021-10-04 11:45:58'),
(2, 'Offroad Race', 450, 1, '2021-10-04 09:00:58', '2021-10-04 16:30:58'),
(3, 'Jedenje domacica', 100, 2, '2021-10-04 08:00:58', '2021-10-04 11:45:58'),
(4, 'Pricanje s duhovima', 450, 2, '2021-10-04 09:00:58', '2021-10-04 16:30:58'),
(5, 'Jedenje domacica', 100, 3, '2021-10-04 08:00:58', '2021-10-04 11:45:58'),
(6, 'Pricanje s duhovima', 450, 3, '2021-10-04 09:00:58', '2021-10-04 16:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `idvenue` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`idvenue`, `name`, `capacity`) VALUES
(1, 'Arena Centar', 3000),
(2, 'Bundek park', 6000);

--
-- Dumping data for table `attendee_session`
--

INSERT INTO `attendee_session` (`session`, `attendee`) VALUES
(1, 30);

-- --------------------------------------------------------

--
-- Dumping data for table `attendee_event`
--

INSERT INTO `attendee_event` (`event`, `attendee`, `paid`) VALUES
(1, 30, 100);

-- --------------------------------------------------------


--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendee`
--
ALTER TABLE `attendee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_idx` (`role`);

--
-- Indexes for table `attendee_event`
--
ALTER TABLE `attendee_event`
  ADD PRIMARY KEY (`event`,`attendee`);

--
-- Indexes for table `attendee_session`
--
ALTER TABLE `attendee_session`
  ADD PRIMARY KEY (`session`,`attendee`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`idevent`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `venue_fk_idx` (`venue`);

--
-- Indexes for table `manager_event`
--
ALTER TABLE `manager_event`
  ADD PRIMARY KEY (`event`,`manager`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`idsession`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`idvenue`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendee`
--
ALTER TABLE `attendee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `idevent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `idsession` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `idvenue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
