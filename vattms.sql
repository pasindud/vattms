-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2012 at 12:17 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vatwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `insid` varchar(15) DEFAULT NULL,
  `insreport` varchar(3000) DEFAULT NULL,
  `studentid` int(11) NOT NULL,
  `date` varchar(14) NOT NULL,
  `time` varchar(14) NOT NULL,
  `facility` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `req_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `insid`, `insreport`, `studentid`, `date`, `time`, `facility`, `status`, `req_date`) VALUES
(1, '1', 'Test Report from insid 1 to student 4', 4, '11/09/12', ' 1800- 2000z', 'VABB_CTR', 0, '0000-00-00 00:00:00'),
(2, '1', 'Test report from ins 1 to student 2', 5, '8/10/2012', '1800z-1900z', 'VABB_GND', 0, '0000-00-00 00:00:00'),
(3, '3', 'Test report from ins 3 to student 2', 4, '18/10/2012', '1800z-1900z', 'VABB_TWR', 0, '0000-00-00 00:00:00'),
(4, '2', 'Test report from ins 2 to student 3', 3, '11/10/2012', '1800z-1900z', 'VABB_APP', 0, '0000-00-00 00:00:00'),
(5, ' 1 ', NULL, 4, '11/10/2012', '1800z-1900z', 'VABB_GND', 2, '2012-11-02 17:24:33'),
(6, ' 2 ', NULL, 2, '11/10/2012', '1800z-1900z', 'VABB_APP', 2, '2012-11-02 17:56:04'),
(7, ' 2 ', NULL, 2, '11/10/2012', '1800z-1900z', 'VABB_GND', 2, '2012-11-03 22:40:23'),
(8, ' 1 ', NULL, 3, '11/10/2012', '1800z-1900z', 'VABB_APP', 2, '2012-11-03 22:40:23'),
(9, '2', NULL, 1, '11/10/2012', '1800z-1900z', 'VABB_GND', 2, '2012-11-27 10:11:11'),
(10, NULL, NULL, 5, '11/10/2012', '1800z-1900z', 'VABB_GND', 1, '2012-11-27 10:12:12'),
(11, NULL, NULL, 4, '11/10/2012', '1800z-1900z', 'VABB_APP', 1, '2012-11-27 10:15:14'),
(24, NULL, NULL, 1, '11/10/2012', '1800z-1900z', 'VABB_APP', 1, '2012-12-29 21:56:23'),
(25, NULL, NULL, 1, '11/10/2012', '1800z-1900z', 'VABB_APP', 1, '2012-12-29 21:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(25) NOT NULL AUTO_INCREMENT,
  `Username` varchar(65) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `level` int(1) NOT NULL,
  `vatsimid` int(10) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `EmailAddress`, `name`, `level`, `vatsimid`) VALUES
(1, 'admin', 'admin', 'admin@ymail.com', 'Admin John', 1, 110110),
(2, 'ins1', 'ins1', 'ins1@mail.com', 'Instructor 1', 1, 110112),
(3, 'ins2', 'ins2', 'ins2@mail.com', 'Instructor 2', 1, 110113),
(4, 'student1', 'student1', 'student1@mail.com', 'Student 1', 0, 110114),
(5, 'student2', 'student2', 'student2@mail.com', 'Student 2', 0, 110115),
(6, 'd', 'd', 'd', '', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
