CREATE DATABASE IF NOT EXISTS todo_db;
USE todo_db;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 12:42 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `todo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblregister`
--

CREATE TABLE IF NOT EXISTS `tblregister` (
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblregister`
--

INSERT INTO `tblregister` (`username`, `fullname`, `password`) VALUES
('Afolabi', 'Afolabi Temidayo Timothy', '$2y$10$dxU1UlCelEq0KVsYg.Lw/umjzM6t5T9QHMBPdDpWhznIKoQbiP.nu'),
('Albert', 'Albert Faith Segun', '$2y$10$tHCvT7k7ht/zpsTiFVEek.nMu.Qxnsyx9AFCZ0mCxz7T4edBGhP82');

-- --------------------------------------------------------

--
-- Table structure for table `tbltodo`
--

CREATE TABLE IF NOT EXISTS `tbltodo` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbltodo`
--

INSERT INTO `tbltodo` (`id`, `title`, `username`) VALUES
(1, 'Feranmi Birthday', 'Afolabi'),
(2, 'Test Title', 'Afolabi'),
(3, 'Cake', 'Afolabi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
