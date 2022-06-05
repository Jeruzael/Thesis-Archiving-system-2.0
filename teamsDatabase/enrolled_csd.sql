-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 05:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
-- Table structure for table `enrolled_csd`
--

CREATE TABLE `enrolled_csd` (
  `studentId` int(11) NOT NULL,
  `studentFirstname` varchar(191) NOT NULL,
  `studentLastname` varchar(191) NOT NULL,
  `studentImage` varchar(191) DEFAULT 'avatar_0.png',
  `studentNumber` int(11) NOT NULL,
  `studentEmail` varchar(191) NOT NULL,
  `studentPassword` varchar(191) NOT NULL,
  `studentStatus` varchar(191) DEFAULT 'active',
  `studentStamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolled_csd`
--

INSERT INTO `enrolled_csd` (`studentId`, `studentFirstname`, `studentLastname`, `studentImage`, `studentNumber`, `studentEmail`, `studentPassword`, `studentStatus`, `studentStamp`) VALUES
(20190060, 'Andrei Nowell', 'Ong', 'avatar_0.png', 2147483647, 'ong andrei nowell.cs@gmail.com', 'Ong20190060', 'active', '2018-05-05 11:11:00'),
(20190066, 'Jeruzael ', 'Dumale', 'avatar_0.png', 2147483647, 'dumale jeruzael .cs@gmail.com', 'Dumale20190066', 'active', '2018-05-05 11:11:00'),
(20190323, 'Troy ', 'Exclamado', 'avatar_0.png', 2147483647, 'exclamado troy .cs@gmail.com', 'Exclamado20190323', 'active', '2018-05-05 11:11:00'),
(20190344, 'Porral', 'Jacqueline', 'avatar_0.png', 2147483647, 'jacqueline porral.cs@gmail.com', 'Porral20190344', 'active', '2018-05-05 11:11:00'),
(20190374, 'Kent ', 'Ballesteros', 'avatar_0.png', 2147483647, 'ballesteros kent .cs@gmail.com', 'Ballesteros20190374', 'deactivated', '2018-05-05 11:11:00'),
(20190391, 'Cabullo', 'Danica', 'avatar_0.png', 2147483647, 'danica cabullo.cs@gmail.com', 'cabullo12', 'active', '2018-05-05 11:11:00'),
(20190502, 'Alexander ', 'Caberto', 'avatar_0.png', 2147483647, 'caberto alexander .cs@gmail.com', 'Caberto20190502', 'active', '2018-05-05 11:11:00'),
(20190531, 'Gerald ', 'Chavez', 'avatar_0.png', 2147483647, 'chavez gerald .cs@gmail.com', 'Chavez20190531', 'active', '2018-05-05 11:11:00'),
(20190586, 'Roger Moore', 'Sangol', 'avatar_0.png', 2147483647, 'sangol roger moore.cs@gmail.com', 'Sangol20190586', 'active', '2018-05-05 11:11:00'),
(20190700, 'Jade Ivan', 'Ibarra', 'avatar_0.png', 2147483647, 'ibarra jade ivan.cs@gmail.com', 'Ibarra20190700', 'deactivated', '2018-05-05 11:11:00'),
(20190719, 'Kenny Lloyd', 'Castillo', 'avatar_0.png', 2147483647, 'castillo kenny lloyd.cs@gmail.com', 'Castillo20190719', 'active', '2018-05-05 11:11:00'),
(20190791, 'Christopher ', 'Calleja', 'avatar_0.png', 2147483647, 'calleja christopher .cs@gmail.com', 'Calleja20190791', 'active', '2018-05-05 11:11:00'),
(20190800, 'Jeffrix ', 'Briol', 'avatar_0.png', 2147483647, 'briol jeffrix .cs@gmail.com', 'Briol20190800', 'active', '2018-05-05 11:11:00'),
(20190981, 'Khyle Andrei', 'Remolona', 'avatar_0.png', 2147483647, 'remolona khyle andrei.cs@gmail.com', 'Remolona20190981', 'active', '2018-05-05 11:11:00'),
(20190987, 'Zhyrex ', 'Canino', 'avatar_0.png', 2147483647, 'canino zhyrex .cs@gmail.com', 'Canino20190987', 'active', '2019-10-10 11:11:00'),
(20190996, 'Charles Daniel', 'Turiaga', 'avatar_0.png', 2147483647, 'turiaga charles daniel.cs@gmail.com', 'Turiaga20190996', 'active', '2019-10-10 11:11:00'),
(20191060, 'Carlo ', 'Diaz', 'avatar_0.png', 2147483647, 'diaz carlo .cs@gmail.com', 'Diaz20191060', 'active', '2019-10-10 11:11:00'),
(20191065, 'Jaymar ', 'Walohan', 'avatar_0.png', 2147483647, 'walohan jaymar .cs@gmail.com', 'Walohan20191065', 'active', '2019-10-10 11:11:00'),
(20191071, 'Napoto', 'Gabrielle', 'avatar_0.png', 2147483647, 'gabrielle napoto.cs@gmail.com', 'newpassword1234', 'active', '2019-10-10 11:11:00'),
(20191094, 'Espinola', 'Demverleen', 'avatar_0.png', 2147483647, 'demverleen espinola.cs@gmail.com', 'Espinola20191094', 'active', '2019-10-10 11:11:00'),
(20191105, 'Sean Kim', 'Ebarle', 'avatar_0.png', 2147483647, 'ebarle sean kim.cs@gmail.com', 'Ebarle20191105', 'active', '2019-10-10 11:11:00'),
(20191112, 'Karl Aldrinne', 'Sebastian', 'avatar_0.png', 2147483647, 'sebastian karl aldrinne.cs@gmail.com', 'Sebastian20191112', 'active', '02019-10-10 11:11:00'),
(20191115, 'Efrhaim Jay', 'Riate', 'avatar_0.png', 2147483647, 'riate efrhaim jay.cs@gmail.com', 'Riate20191115', 'active', '2019-10-10 11:11:00'),
(20191131, 'Demzil Ian', 'Zamora', 'avatar_0.png', 2147483647, 'zamora demzil ian.cs@gmail.com', 'Zamora20191131', 'active', '2019-10-10 11:11:00'),
(20191136, 'John Ralph', 'Sila', 'avatar_0.png', 2147483647, 'sila john ralph.cs@gmail.com', 'Sila20191136', 'active', '2019-10-10 11:11:00'),
(20191155, 'Kevin ', 'Corpin', 'avatar_0.png', 2147483647, 'corpin kevin .cs@gmail.com', 'Corpin20191155', 'active', '2019-10-10 11:11:00'),
(20191172, 'Maglangit', 'Trizhalyn', 'avatar_0.png', 2147483647, 'trizhalyn maglangit.cs@gmail.com', 'Maglangit20191172', 'active', '2020-11-11 11:11:00'),
(20191181, 'Billy Jou', 'Nillos', 'avatar_0.png', 2147483647, 'nillos billy jou.cs@gmail.com', 'Nillos20191181', 'active', '2020-11-11 11:11:00'),
(20191251, 'Edriane ', 'Barcita', 'avatar_0.png', 2147483647, 'barcita edriane .cs@gmail.com', 'Barcita20191251', 'active', '2020-11-11 11:11:00'),
(20191285, 'Mikkie ', 'Gregorio', 'avatar_0.png', 2147483647, 'gregorio mikkie .cs@gmail.com', 'Gregorio20191285', 'active', '2020-11-11 11:11:00'),
(20191299, 'Ba-alan', 'Nikki', 'avatar_0.png', 2147483647, 'nikki ba-alan.cs@gmail.com', 'Ba-alan20191299', 'active', '2020-11-11 11:11:00'),
(20191309, 'John Paul', 'Quia', 'avatar_0.png', 2147483647, 'quia john paul.cs@gmail.com', 'Quia20191309', 'active', '2020-11-11 11:11:00'),
(20191323, 'John Lloyd', 'Igharas', 'avatar_0.png', 2147483647, 'igharas john lloyd.cs@gmail.com', 'Igharas20191323', 'active', '2020-11-11 11:11:00'),
(20191367, 'Jerecho ', 'Jolo', 'avatar_0.png', 2147483647, 'jolo jerecho .cs@gmail.com', 'Jolo20191367', 'active', '2020-11-11 11:11:00'),
(20191368, 'John Josuah', 'Pamintuan', 'avatar_0.png', 2147483647, 'pamintuan john josuah.cs@gmail.com', 'Pamintuan20191368', 'active', '2020-11-11 11:11:00'),
(20191375, 'John Philip', 'Bulaclac', 'avatar_0.png', 2147483647, 'bulaclac john philip.cs@gmail.com', 'Bulaclac20191375', 'active', '2020-11-11 11:11:00'),
(20191382, 'Karl Eduard', 'Viana', 'avatar_0.png', 2147483647, 'viana karl eduard.cs@gmail.com', 'Viana20191382', 'active', '2020-11-11 11:11:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrolled_csd`
--
ALTER TABLE `enrolled_csd`
  ADD PRIMARY KEY (`studentId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
