-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2021 at 06:18 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `road`
--

-- --------------------------------------------------------

--
-- Table structure for table `accident_reg`
--

CREATE TABLE IF NOT EXISTS `accident_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CrashT` varchar(33) NOT NULL,
  `ArrivalT` varchar(33) NOT NULL,
  `Route` varchar(33) NOT NULL,
  `Location` varchar(33) NOT NULL,
  `VehicleN` varchar(33) NOT NULL,
  `DName` varchar(33) NOT NULL,
  `DriverL` varchar(33) NOT NULL,
  `Cause` varchar(33) NOT NULL,
  `Injured` varchar(33) NOT NULL,
  `Killed` varchar(33) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `accident_reg`
--

INSERT INTO `accident_reg` (`id`, `CrashT`, `ArrivalT`, `Route`, `Location`, `VehicleN`, `DName`, `DriverL`, `Cause`, `Injured`, `Killed`) VALUES
(1, '2:30pm', '2:50pm', 'opposite Gida dubu', 'Dutse', '12;23;211', 'Muhammad Musa', '12343m123q', 'High speed driving', '5', '1'),
(2, '2:30pm', '2:50pm', 'opposite Gida ', 'Dutse', '12;23;211', 'salihi tijjani', '12343m123q', 'High speed driving', '5', '1'),
(3, '2:30pm', '2:50pm', 'opposite Gida ', 'Dutse', '12;23;211', 'kawu salihi', '12343m123q', 'High speed driving', '5', '1');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `username` varchar(33) NOT NULL,
  `password` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`) VALUES
('road', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `firstname` varchar(33) NOT NULL,
  `secondname` varchar(33) NOT NULL,
  `sex` varchar(33) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `email` varchar(22) NOT NULL,
  `username` varchar(22) NOT NULL,
  `password` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstname`, `secondname`, `sex`, `phone`, `email`, `username`, `password`) VALUES
('muhammad', 'muhammd', 'Male', '081234523', 'salihit19@gmail.com', 'salihi', 'no'),
('salihi', 'tijjani', 'Male', '081234523', 'asd', 'SALIHI', '1234'),
('musa', 'ibrahim', 'Male', '09126636', 'salihi@gmail.com', 'musa', 'musa');
