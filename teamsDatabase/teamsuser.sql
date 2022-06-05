-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 05:06 PM
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
-- Table structure for table `teamsuser`
--

CREATE TABLE `teamsuser` (
  `userId` int(11) NOT NULL,
  `userFirstname` varchar(255) NOT NULL,
  `userLastname` varchar(255) NOT NULL,
  `userImage` varchar(255) DEFAULT 'avatar_0.png',
  `userNumber` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userCode` int(11) DEFAULT 0,
  `userStatus` varchar(255) DEFAULT 'active',
  `userAccount` varchar(255) DEFAULT 'notverified',
  `userStamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teamsuser`
--

INSERT INTO `teamsuser` (`userId`, `userFirstname`, `userLastname`, `userImage`, `userNumber`, `userEmail`, `userPassword`, `userCode`, `userStatus`, `userAccount`, `userStamp`) VALUES
(20190060, 'Andrei Nowell', 'Ong', '', 2147483647, 'ong.andrei nowell.bscs2019@gmail.com', 'Ong20190060', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20190066, 'Jeruzael ', 'Dumale', '', 2147483647, 'dumale.jeruzael .bscs2019@gmail.com', 'Dumale20190066', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20190323, 'Troy ', 'Exclamado', '', 2147483647, 'exclamado.troy .bscs2019@gmail.com', 'Exclamado20190323', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20190344, 'Porral', 'Jacqueline', '', 2147483647, 'jacqueline.porral.bscs2019@gmail.com', 'Porral20190344', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20190374, 'Kent ', 'Ballesteros', '', 2147483647, 'ballesteros.kent .bscs2019@gmail.com', 'Ballesteros20190374', 0, 'inactive', 'notverified', '0000-00-00 00:00:00'),
(20190391, 'Cabullo', 'Danica', '', 2147483647, 'danica.cabullo.bscs2019@gmail.com', 'Cabullo20190391', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20190502, 'Alexander ', 'Caberto', '', 2147483647, 'caberto.alexander .bscs2019@gmail.com', 'Caberto20190502', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20190531, 'Gerald ', 'Chavez', '', 2147483647, 'chavez.gerald .bscs2019@gmail.com', 'Chavez20190531', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20190586, 'Roger Moore', 'Sangol', '', 2147483647, 'sangol.roger moore.bscs2019@gmail.com', 'Sangol20190586', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20190700, 'Jade Ivan', 'Ibarra', '', 2147483647, 'ibarra.jade ivan.bscs2019@gmail.com', 'Ibarra20190700', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20190719, 'Kenny Lloyd', 'Castillo', '', 2147483647, 'castillo.kenny lloyd.bscs2019@gmail.com', 'Castillo20190719', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20190791, 'Christopher ', 'Calleja', '', 2147483647, 'calleja.christopher .bscs2019@gmail.com', 'Calleja20190791', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20190800, 'Jeffrix ', 'Briol', '', 2147483647, 'briol.jeffrix .bscs2019@gmail.com', 'Briol20190800', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20190981, 'Khyle Andrei', 'Remolona', '', 2147483647, 'remolona.khyle andrei.bscs2019@gmail.com', 'Remolona20190981', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20190987, 'Zhyrex ', 'Canino', '', 2147483647, 'canino.zhyrex .bscs2019@gmail.com', 'Canino20190987', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20190996, 'Charles Daniel', 'Turiaga', '', 2147483647, 'turiaga.charles daniel.bscs2019@gmail.com', 'Turiaga20190996', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191060, 'Carlo ', 'Diaz', '', 2147483647, 'diaz.carlo .bscs2019@gmail.com', 'Diaz20191060', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191065, 'Jaymar ', 'Walohan', '', 2147483647, 'walohan.jaymar .bscs2019@gmail.com', 'Walohan20191065', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191071, 'Napoto', 'Gabrielle', '', 2147483647, 'gabrielle.napoto.bscs2019@gmail.com', 'Napoto20191071', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191094, 'Espinola', 'Demverleen', '', 2147483647, 'demverleen.espinola.bscs2019@gmail.com', 'Espinola20191094', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191105, 'Sean Kim', 'Ebarle', '', 2147483647, 'ebarle.sean kim.bscs2019@gmail.com', 'Ebarle20191105', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191112, 'Karl Aldrinne', 'Sebastian', '', 2147483647, 'sebastian.karl aldrinne.bscs2019@gmail.com', 'Sebastian20191112', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191115, 'Efrhaim Jay', 'Riate', '', 2147483647, 'riate.efrhaim jay.bscs2019@gmail.com', 'Riate20191115', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191131, 'Demzil Ian', 'Zamora', '', 2147483647, 'zamora.demzil ian.bscs2019@gmail.com', 'Zamora20191131', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191136, 'John Ralph', 'Sila', '', 2147483647, 'sila.john ralph.bscs2019@gmail.com', 'Sila20191136', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191155, 'Kevin ', 'Corpin', '', 2147483647, 'corpin.kevin .bscs2019@gmail.com', 'Corpin20191155', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191172, 'Maglangit', 'Trizhalyn', '', 2147483647, 'trizhalyn.maglangit.bscs2019@gmail.com', 'Maglangit20191172', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191181, 'Billy Jou', 'Nillos', '', 2147483647, 'nillos.billy jou.bscs2019@gmail.com', 'Nillos20191181', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191251, 'Edriane ', 'Barcita', '', 2147483647, 'barcita.edriane .bscs2019@gmail.com', 'Barcita20191251', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191285, 'Mikkie ', 'Gregorio', '', 2147483647, 'gregorio.mikkie .bscs2019@gmail.com', 'Gregorio20191285', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191299, 'Ba-alan', 'Nikki', '', 2147483647, 'nikki.ba-alan.bscs2019@gmail.com', 'Ba-alan20191299', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191309, 'John Paul', 'Quia', '', 2147483647, 'quia.john paul.bscs2019@gmail.com', 'Quia20191309', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191323, 'John Lloyd', 'Igharas', '', 2147483647, 'igharas.john lloyd.bscs2019@gmail.com', 'Igharas20191323', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191367, 'Jerecho ', 'Jolo', '', 2147483647, 'jolo.jerecho .bscs2019@gmail.com', 'Jolo20191367', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191368, 'John Josuah', 'Pamintuan', '', 2147483647, 'pamintuan.john josuah.bscs2019@gmail.com', 'Pamintuan20191368', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191375, 'John Philip', 'Bulaclac', '', 2147483647, 'bulaclac.john philip.bscs2019@gmail.com', 'Bulaclac20191375', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191382, 'Karl Eduard', 'Viana', '', 2147483647, 'viana.karl eduard.bscs2019@gmail.com', 'Viana20191382', 0, 'active', 'notverified', '0000-00-00 00:00:00'),
(20191383, 'userFirstname', 'userLastname', 'userImage', 0, 'userEmail', 'userPassord', 0, 'userStatus', 'userAccount', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teamsuser`
--
ALTER TABLE `teamsuser`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teamsuser`
--
ALTER TABLE `teamsuser`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20191384;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
