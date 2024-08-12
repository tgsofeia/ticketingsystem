-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2024 at 12:38 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concert`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `adminId` int NOT NULL AUTO_INCREMENT,
  `adminName` varchar(20) NOT NULL,
  `adminPassword` varchar(20) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminId`, `adminName`, `adminPassword`) VALUES
(2, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  `quota` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `quota`) VALUES
(1, 'VVIP', 10),
(3, 'VIP', 10),
(11, 'hotseat', 34);

-- --------------------------------------------------------

--
-- Table structure for table `event_quotas`
--

DROP TABLE IF EXISTS `event_quotas`;
CREATE TABLE IF NOT EXISTS `event_quotas` (
  `id` int NOT NULL,
  `event_date` datetime NOT NULL,
  `quota_vvip` int NOT NULL,
  `quota_vip` int NOT NULL,
  `quota_ps1` int NOT NULL,
  `quota_ps2` int NOT NULL,
  `quota_ps3` int NOT NULL,
  `quota_ps4` int NOT NULL,
  `quota_ps5` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `event_quotas`
--

INSERT INTO `event_quotas` (`id`, `event_date`, `quota_vvip`, `quota_vip`, `quota_ps1`, `quota_ps2`, `quota_ps3`, `quota_ps4`, `quota_ps5`) VALUES
(0, '2024-06-08 19:30:00', 1, 0, 2, 5, 5, 5, 5),
(0, '2024-06-09 19:30:00', 5, 5, 5, 5, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`username`, `password`) VALUES
('', ''),
('abu', 'abu'),
('adibah', 'adibah'),
('ali imran', '333'),
('amalina123', '111'),
('Iman', 'iman123'),
('piya', '123'),
('sarah', 'sarah123'),
('smith', 'smith'),
('tengku', '211');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `registerId` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime(6) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `quantity` int NOT NULL,
  `totalPrice` varchar(10) NOT NULL,
  `totalPriceforAll` varchar(20) NOT NULL,
  PRIMARY KEY (`registerId`),
  KEY `fk_register_user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`registerId`, `username`, `fullname`, `email`, `date`, `category`, `price`, `quantity`, `totalPrice`, `totalPriceforAll`) VALUES
(37, 'tengku', 'iman badrisyia', 'iman@gmail.com', '2024-06-08 19:30:00.000000', 'VIP', '899', 2, '1798', '3596'),
(38, 'tengku', 'Tengku Sofeia', 'tengkusofeia@gmail.com', '2024-06-08 19:30:00.000000', 'VIP', '899', 1, '899', '899'),
(39, 'tengku', 'Tengku Sofeia', 'tengkusofeia@gmail.com', '2024-06-08 19:30:00.000000', 'VIP', '899', 3, '2697', '2697'),
(40, 'tengku', 'iman badrisyia', 'iman@gmail.com', '2024-06-08 19:30:00.000000', 'VIP', '899', 1, '899', '899'),
(41, 'ali imran', 'ali', 'ali@gmail.com', '2024-06-08 19:30:00.000000', 'VVIP', '949', 4, '3796', '3796'),
(42, 'tengku', 'Tengku Sofeia', 'tengkusofeia@gmail.com', '2024-06-08 19:30:00.000000', 'PS1', '799', 3, '2397', '2397');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `fk_register_user` FOREIGN KEY (`username`) REFERENCES `participants` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
