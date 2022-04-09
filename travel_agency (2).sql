-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 12:10 PM
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
  `sleeper` char(1) NOT NULL,
  `bus_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_info`
--

INSERT INTO `bus_info` (`bus_number`, `capacity`, `ac`, `sleeper`, `bus_name`) VALUES
('gj_10_as_1111', 55, 'y', 'y', 'tulsi'),
('gj_10_as_2222', 55, 'y', 'y', 'wrindavan'),
('gj_1_an_1234', 60, 'y', 'y', 'krishn'),
('gj_1_an_1235', 60, 'y', 'y', 'radheshyam'),
('gj_1_an_1236', 50, 'y', 'y', 'eagle'),
('gj_1_an_1237', 50, 'y', 'y', 'dwarka'),
('gj_10_as_2223', 56, 'y', 'y', 'shital'),
('gj_1_an_8877', 60, 'y', 'Y', 'patel'),
(' gj_1_as_1223 ', 45, 'y', 'y', ' sonal ');

-- --------------------------------------------------------

--
-- Table structure for table `route_info`
--

CREATE TABLE `route_info` (
  `bus_number` varchar(20) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `source` varchar(50) NOT NULL,
  `pickup_time` time NOT NULL,
  `daily_ser` char(1) NOT NULL,
  `bus_name` varchar(50) DEFAULT NULL,
  `capacity` bigint(20) DEFAULT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route_info`
--

INSERT INTO `route_info` (`bus_number`, `destination`, `source`, `pickup_time`, `daily_ser`, `bus_name`, `capacity`, `price`) VALUES
('gj_10_as_1111', 'bhanvad', 'anand', '20:30:00', 'y', 'tulsi', 55, 500),
('gj_10_as_1112', 'anand', 'bhanvad', '22:30:00', 'y', 'tulsi', 55, 500),
('gj_10_as_2223', 'anand', 'bhanvad', '06:45:00', 'y', 'shital', 56, 600);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_7_4_2022_gj_10_as_1112`
--

CREATE TABLE `ticket_7_4_2022_gj_10_as_1112` (
  `sit_number` bigint(20) NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_7_4_2022_gj_10_as_1112`
--

INSERT INTO `ticket_7_4_2022_gj_10_as_1112` (`sit_number`, `user_email`) VALUES
(1, 'aarjubodaaarjuboda@gmail.com'),
(2, 'aarjubodaaarjuboda@gmail.com'),
(3, 'aarjubodaaarjuboda@gmail.com'),
(4, 'aarjubodaaarjuboda@gmail.com'),
(5, 'aarjubodaaarjuboda@gmail.com'),
(6, 'aarjubodaaarjuboda@gmail.com'),
(7, 'xyz@gmail.com'),
(8, 'xyz@gmail.com'),
(9, 'xyz@gmail.com'),
(10, 'xyz@gmail.com'),
(11, 'xyz@gmail.com'),
(12, 'xyz@gmail.com'),
(13, 'xyz@gmail.com'),
(14, 'xyz@gmail.com'),
(15, 'xyz@gmail.com'),
(16, 'xyz@gmail.com'),
(17, 'xyz@gmail.com'),
(18, 'xyz@gmail.com'),
(19, 'xyz@gmail.com'),
(20, 'xyz@gmail.com'),
(21, 'xyz@gmail.com'),
(22, 'xyz@gmail.com'),
(23, 'xyz@gmail.com'),
(24, 'xyz@gmail.com'),
(25, 'xyz@gmail.com'),
(26, 'xyz@gmail.com'),
(27, 'xyz@gmail.com'),
(28, 'xyz@gmail.com'),
(29, 'xyz@gmail.com'),
(30, 'xyz@gmail.com'),
(31, 'xyz@gmail.com'),
(32, 'xyz@gmail.com'),
(33, 'xyz@gmail.com'),
(34, 'xyz@gmail.com'),
(35, 'xyz@gmail.com'),
(36, 'xyz@gmail.com'),
(37, 'xyz@gmail.com'),
(38, 'xyz@gmail.com'),
(39, 'xyz@gmail.com'),
(40, 'xyz@gmail.com'),
(41, 'xyz@gmail.com'),
(42, 'xyz@gmail.com'),
(43, 'xyz@gmail.com'),
(44, 'xyz@gmail.com'),
(45, 'xyz@gmail.com'),
(46, 'xyz@gmail.com'),
(47, 'xyz@gmail.com'),
(48, 'xyz@gmail.com'),
(49, 'xyz@gmail.com'),
(50, 'xyz@gmail.com'),
(51, 'xyz@gmail.com'),
(52, 'xyz@gmail.com'),
(53, 'xyz@gmail.com'),
(54, 'xyz@gmail.com'),
(55, 'xyz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_7_4_2022_gj_10_as_2223`
--

CREATE TABLE `ticket_7_4_2022_gj_10_as_2223` (
  `sit_number` bigint(20) NOT NULL,
  `user_email` varchar(50) NOT NULL
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
('sk', 'dkn123', 3432432432, 'denish@gmail.com'),
('xyz', 'xyz', 8765467987, 'xyz@gmail.com'),
('dfgh', 'dfgh', 987654321, 'dfgh@gmail.com'),
('fgvh', 'fghj', 987654243, 'dkjhfgh@gmail.com'),
('kjhgfd', 'fgh', 9876543, 'dfgh');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
