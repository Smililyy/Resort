-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2023 at 09:35 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `bookingID` int NOT NULL AUTO_INCREMENT,
  `customerID` int NOT NULL,
  `roomID` int NOT NULL,
  `checkinDate` date DEFAULT NULL,
  `checkOutDate` datetime DEFAULT NULL,
  `totalAmount` float DEFAULT NULL,
  `paymentStatus` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numberOfCustomer` int DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`bookingID`),
  KEY `FK_Bookings_Customers` (`customerID`),
  KEY `FK_Bookings_Rooms` (`roomID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingID`, `customerID`, `roomID`, `checkinDate`, `checkOutDate`, `totalAmount`, `paymentStatus`, `numberOfCustomer`, `message`) VALUES
(11, 21, 6, '0000-00-00', '0000-00-00 00:00:00', 3000, 'Unpaid', 20, 'hello'),
(12, 24, 9, '0000-00-00', '0000-00-00 00:00:00', 5, 'Unpaid', 9, ''),
(13, 25, 11, '0000-00-00', '0000-00-00 00:00:00', 4, 'Unpaid', 4, ''),
(14, 26, 8, '0000-00-00', '0000-00-00 00:00:00', 2, 'Unpaid', 4, ''),
(15, 26, 7, '0000-00-00', '0000-00-00 00:00:00', 2, 'Unpaid', 4, ''),
(16, 27, 10, '2023-11-24', '0000-00-00 00:00:00', 4.5, 'Unpaid', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `bookingservices`
--

DROP TABLE IF EXISTS `bookingservices`;
CREATE TABLE IF NOT EXISTS `bookingservices` (
  `bookingservicelD` int NOT NULL AUTO_INCREMENT,
  `bookingID` int NOT NULL,
  `serviceID` int NOT NULL,
  `quantity` int DEFAULT NULL,
  `totalPrice` decimal(10,3) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`bookingservicelD`),
  KEY `FK_Bookingservices_Bookings` (`bookingID`),
  KEY `FK_Bookingservices_Services` (`serviceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customerID` int NOT NULL AUTO_INCREMENT,
  `customerFirstName` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customerLastName` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customerDob` datetime DEFAULT NULL,
  `customerAddress` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customerPhoneNumber` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customerEmail` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `customerFirstName`, `customerLastName`, `customerDob`, `customerAddress`, `customerPhoneNumber`, `customerEmail`) VALUES
(1, 'David', 'Smith', '1990-01-01 00:00:00', '123 Easy Street', '555-555-5555', 'david.smith@email.com'),
(2, 'Jennifer', 'Johnson', '1991-02-02 00:00:00', '456 Hard Street', '555-555-5556', 'jennifer.johnson@email.com'),
(3, 'Robert', 'Williams', '1992-03-03 00:00:00', '789 Good Street', '555-555-5557', 'robert.williams@email.com'),
(4, 'Emily', 'Brown', '1993-04-04 00:00:00', '321 Bad Street', '555-555-5558', 'emily.brown@email.com'),
(5, 'Michael', 'Davis', '1994-05-05 00:00:00', '987 Simple Street', '555-555-5559', 'michael.davis@email.com'),
(20, '', '', NULL, NULL, '', ''),
(21, 'Jason', 'Park', NULL, NULL, '12345678', 'jason@gmail.com'),
(22, '', '', NULL, NULL, 'jjjjjjjjjjjjj', ''),
(23, 'Jennie', 'Kim', NULL, NULL, '566 777 889', 'jenniekim@gmail.com'),
(24, 'Chanyeol', 'Parl', NULL, NULL, '222 555 999 ', 'chanyeolpark@gmail.com'),
(25, 'Rose', 'Park', NULL, NULL, '777 888 999', 'rose@gmail.com'),
(26, 'Jisoo', 'Kim', NULL, NULL, '333 444  555', 'jisoo@gmail.com'),
(27, 'Hue', 'Tu', NULL, NULL, '0325344646', 'tuthihue.qn@gmail.com'),
(28, 'Lily', 'Tu', NULL, NULL, '789-654-321', 'tuthihue.qn@gmail.com'),
(29, 'Olivia', 'Rod', NULL, NULL, '555-333-222', 'huetu03@gmail.com'),
(30, 'Julie', 'Park', NULL, NULL, '999999999', 'huetu03@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employeeID` int NOT NULL AUTO_INCREMENT,
  `employeeFirstName` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `employeeLastName` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `employeeAddress` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `employeePhoneNumber` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `employeeEmail` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `position` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `employeeFirstName`, `employeeLastName`, `employeeAddress`, `employeePhoneNumber`, `employeeEmail`, `position`) VALUES
(1, 'John', 'Doe', '123 Easy Street', '555-555-5555', 'john.doe@email.com', 'Manager'),
(2, 'Jane', 'Smith', '456 Hard Street', '555-555-5556', 'jane.smith@email.com', 'Receptionist'),
(3, 'Sam', 'Johnson', '789 Good Street', '555-555-5557', 'sam.johnson@email.com', 'Accountant'),
(4, 'Mike', 'Williams', '321 Bad Street', '555-555-5558', 'mike.williams@email.com', 'Maintenance'),
(5, 'Tom', 'Brown', '987 Simple Street', '555-555-5559', 'tom.brown@email.com', 'Chef');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `invoicelD` int NOT NULL AUTO_INCREMENT,
  `bookingID` int NOT NULL,
  `paymentDate` datetime DEFAULT NULL,
  `amount` decimal(10,3) DEFAULT NULL,
  PRIMARY KEY (`invoicelD`),
  KEY `FK_Invoices_Booking` (`bookingID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `roomID` int NOT NULL AUTO_INCREMENT,
  `roomType` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `roomRate` decimal(10,3) DEFAULT NULL,
  `roomStatus` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `roomName` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`roomID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomID`, `roomType`, `roomRate`, `roomStatus`, `roomName`) VALUES
(1, 'Single', '100.000', 'Available', NULL),
(2, 'Double', '150.000', 'Available', NULL),
(3, 'Suite', '250.000', 'Available', NULL),
(4, 'Single', '100.000', 'Available', NULL),
(5, 'Double', '150.000', 'Available', NULL),
(6, 'Event Meeting', '3000.000', 'Reserved', 'Apricot'),
(7, 'Event Meeting', '2.000', 'Reserved', 'Apricot 1'),
(8, 'Event Meeting', '2.000', 'Reserved', 'Apricot 2'),
(9, 'Event Meeting', '5.000', 'Reserved', 'Lotus ballroom'),
(10, 'Event Meeting', '4.500', 'Reserved', 'Lotus ballroom 1'),
(11, 'Event Meeting', '4.000', 'Reserved', 'Lotus ballroom 2');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `serviceID` int NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` decimal(10,3) DEFAULT NULL,
  PRIMARY KEY (`serviceID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `serviceName`, `price`) VALUES
(1, 'Room Cleaning', '10.000'),
(2, 'Laundry', '20.000'),
(3, 'Dinner', '50.000'),
(4, 'Massage', '100.000'),
(5, 'Coffee Break', '10.000');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `FK_Bookings_Customers` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`),
  ADD CONSTRAINT `FK_Bookings_Rooms` FOREIGN KEY (`roomID`) REFERENCES `rooms` (`roomID`);

--
-- Constraints for table `bookingservices`
--
ALTER TABLE `bookingservices`
  ADD CONSTRAINT `FK_Bookingservices_Bookings` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bookingID`),
  ADD CONSTRAINT `FK_Bookingservices_Services` FOREIGN KEY (`serviceID`) REFERENCES `services` (`serviceID`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `FK_Invoices_Booking` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bookingID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
