-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 08:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weather_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `weather_table`
--

CREATE TABLE `weather_table` (
  `City` varchar(100) NOT NULL,
  `Temperature` float NOT NULL,
  `W_Condition` varchar(100) NOT NULL,
  `Humidity` float NOT NULL,
  `Pressure` float NOT NULL,
  `Wind_Speed` float NOT NULL,
  `W_Direction` float NOT NULL,
  `W_Date_And_Time` datetime NOT NULL,
  `Dt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weather_table`
--

INSERT INTO `weather_table` (`City`, `Temperature`, `W_Condition`, `Humidity`, `Pressure`, `Wind_Speed`, `W_Direction`, `W_Date_And_Time`, `Dt`) VALUES
('Tameside', 30, 'Clear', 39, 1021, 0.7, 312, '2022-08-11 20:02:40', 1660227003),
('Tameside', 30.61, 'Clear', 37, 1021, 0.5, 292, '2022-08-11 21:02:56', 1660231076),
('Tameside', 30.24, 'Clouds', 27, 1020, 0.48, 285, '2022-08-11 22:05:17', 1660234818),
('Tameside', 29.38, 'Clouds', 34, 1020, 1.79, 326, '2022-08-11 23:45:47', 1660240847);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
