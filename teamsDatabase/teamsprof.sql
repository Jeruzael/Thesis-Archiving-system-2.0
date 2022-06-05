-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 12:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_teams`
--

-- --------------------------------------------------------

--
-- Table structure for table `teamsprof`
--

CREATE TABLE `teamsprof` (
  `profId` int(11) NOT NULL,
  `profFirstname` varchar(191) NOT NULL,
  `profLastname` varchar(191) NOT NULL,
  `profImage` varchar(191) DEFAULT 'avatar_0.png',
  `profNumber` int(11) NOT NULL,
  `profEmail` varchar(191) NOT NULL,
  `profPassword` varchar(191) NOT NULL,
  `profCode` int(11) DEFAULT 0,
  `profStatus` varchar(191) DEFAULT 'active',
  `profAccount` varchar(191) DEFAULT 'notverified',
  `profStamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teamsprof`
--
ALTER TABLE `teamsprof`
  ADD PRIMARY KEY (`profId`),
  ADD UNIQUE KEY `profEmail` (`profEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teamsprof`
--
ALTER TABLE `teamsprof`
  MODIFY `profId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
