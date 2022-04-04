-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 12:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`email`, `password`) VALUES
('aarjupatel922003@gmail.com', '20CP020@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bus_info`
--

CREATE TABLE `bus_info` (
  `bus_number` varchar(20) NOT NULL,
  `capacity` bigint(20) NOT NULL,
  `ac` char(1) NOT NULL,
  `sleeper` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_info`
--

INSERT INTO `bus_info` (`bus_number`, `capacity`, `ac`, `sleeper`) VALUES
('GJ 10 AS 1111', 55, 'y', 'y'),
('GJ 10 AS 2222', 55, 'y', 'y'),
('GJ 1 AN 1234', 60, 'y', 'y'),
('GJ 1 AN 1235', 60, 'y', 'y'),
('GJ 1 AN 1236', 50, 'y', 'y'),
('GJ 1 AN 1237', 50, 'y', 'y'),
('GJ 10 AS 2223', 56, 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `route_info`
--

CREATE TABLE `route_info` (
  `bus_number` varchar(11) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `source` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_login_info`
--

CREATE TABLE `user_login_info` (
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `number` bigint(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login_info`
--

INSERT INTO `user_login_info` (`username`, `password`, `number`, `email`) VALUES
('Aarju patel', 'awrs', 6353884460, 'aarjubodaaarjuboda@gmail.com'),
('Aarju patel', 'amanpatel1234', 1232114324, 'jkdjf@gmail.com'),
('Sagar', 'hshsbsjsn', 8764864999, 'sagar@gmail.com'),
('aman paret', 'aman@123', 9904935123, 'aman@gmail.com'),
('sk', 'dkn123', 3432432432, 'denish@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
