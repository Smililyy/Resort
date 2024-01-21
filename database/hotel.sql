-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2024 at 08:11 PM
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
-- Table structure for table `admin_cred`
--

DROP TABLE IF EXISTS `ADMIN_CRED`;
CREATE TABLE IF NOT EXISTS `ADMIN_CRED` (
  `SrNo` int NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `AdminPass` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`SrNo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ADMIN_CRED`
--

INSERT INTO `ADMIN_CRED` (`SrNo`, `AdminName`, `AdminPass`) VALUES
(1, 'admin1', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `BOOKING`;
CREATE TABLE IF NOT EXISTS `BOOKING` (
  `BookingID` int NOT NULL AUTO_INCREMENT,
  `CustomerID` int DEFAULT NULL,
  `RoomID` int NOT NULL,
  `CheckInDate` date DEFAULT NULL,
  `CheckOutDate` date DEFAULT NULL,
  `TotalAmount` decimal(10,0) DEFAULT NULL,
  `PaymentStatus` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NumberOfCustomer` int DEFAULT NULL,
  `Message` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`BookingID`),
  KEY `FK_Bookings_Customers` (`CustomerID`),
  KEY `FK_Bookings_Rooms` (`RoomID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `BOOKING` (`BookingID`, `CustomerID`, `RoomID`, `CheckInDate`, `CheckOutDate`, `TotalAmount`, `PaymentStatus`, `NumberOfCustomer`, `Message`) VALUES
(1, 1, 101, '2022-01-01', '2022-01-05', '500', 'Paid', 1, 'Business trip'),
(2, 2, 102, '2022-02-10', '2022-02-15', '600', 'Paid', 2, 'Vacation with family'),
(3, 3, 103, '2022-03-20', '2023-12-30', '600', 'Paid', 1, 'Conference attendance'),
(4, 4, 104, '2022-04-05', '2022-04-10', '600', 'Paid', 1, 'Vacation'),
(5, 5, 105, '2022-05-15', '2022-05-20', '750', 'Paid', 2, 'Business meeting'),
(6, 6, 106, '2022-06-25', '2022-06-30', '900', 'Paid', 1, 'Holiday getaway'),
(7, 7, 107, '2022-07-10', '2022-07-15', '900', 'Paid', 1, 'Company event'),
(8, 8, 108, '2022-08-20', '2022-08-25', '900', 'Paid', 2, 'Family vacation'),
(9, 9, 201, '2022-09-05', '2022-09-10', '1000', 'Paid', 1, 'Business trip'),
(10, 10, 202, '2022-10-15', '2022-10-20', '900', 'Paid', 2, 'Vacation with family'),
(11, 11, 203, '2022-11-01', '2022-11-05', '800', 'Paid', 1, 'Conference attendance'),
(12, 12, 204, '2022-12-10', '2022-12-15', '700', 'Paid', 1, 'Vacation'),
(13, 13, 205, '2023-01-15', '2023-01-20', '600', 'Paid', 2, 'Business meeting'),
(14, 14, 206, '2023-02-25', '2023-03-01', '1000', 'Paid', 1, 'Holiday getaway'),
(15, 15, 207, '2023-03-10', '2023-03-15', '900', 'Paid', 1, 'Company event'),
(16, 16, 208, '2023-04-20', '2023-04-25', '900', 'Paid', 2, 'Family vacation'),
(17, 17, 209, '2023-05-05', '2023-05-10', '900', 'Paid', 1, 'undefined'),
(18, 18, 210, '2023-06-15', '2023-06-20', '900', 'Paid', 2, 'undefined'),
(19, 19, 211, '2023-12-28', '2023-12-28', '800', 'Paid', 1, 'undefined'),
(20, 20, 212, '2023-12-28', '2023-12-28', '700', 'Paid', 1, 'undefined'),
(22, 32, 101, '2023-12-28', '2023-12-29', '100', 'Paid', 21, 'undefined'),
(23, 33, 105, '2023-12-28', '2023-12-29', '150', 'Paid', 5, 'undefined'),
(24, 34, 106, '0000-00-00', NULL, '180', 'Unpaid', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_detail`
--

DROP TABLE IF EXISTS `CONTACT_DETAIL`;
CREATE TABLE IF NOT EXISTS `CONTACT_DETAIL` (
  `ContactID` int NOT NULL AUTO_INCREMENT,
  `Address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Pn1` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Pn2` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Fb` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Tpv` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ContactID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_detail`
--

INSERT INTO `CONTACT_DETAIL` (`ContactID`, `Address`, `Website`, `Pn1`, `Pn2`, `Email`, `Fb`, `Tpv`) VALUES
(1, '1 District. Ho Chi Minh City, Viet Nam', 'https://saigonhotel.com', '0325344646', '0356778989', 'lacuisinesante@gmail.com', 'https://www.facebook.com/saigonhotel.com', 'https://www.saigonhotel.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `CUSTOMER`;
CREATE TABLE IF NOT EXISTS `CUSTOMER` (
  `CustomerID` int NOT NULL AUTO_INCREMENT,
  `CustomerFirstName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CustomerLastName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CustomerDob` date DEFAULT NULL,
  `CustomerAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CustomerPhoneNumber` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CustomerEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `CUSTOMER` (`CustomerID`, `CustomerFirstName`, `CustomerLastName`, `CustomerDob`, `CustomerAddress`, `CustomerPhoneNumber`, `CustomerEmail`) VALUES
(1, 'John', 'Doe', '1990-01-01', '123 Main St', '555-1234', 'john.doe@email.com'),
(2, 'Jane', 'Smith', '1985-05-15', '456 Oak St', '555-5678', 'jane.smith@email.com'),
(3, 'Mike', 'Johnson', '1992-08-30', '789 Pine St', '555-9876', 'mike.johnson@email.com'),
(4, 'Emily', 'Williams', '1987-04-12', '234 Cedar St', '555-1111', 'emily.williams@email.com'),
(5, 'David', 'Brown', '1996-11-05', '567 Birch St', '555-2222', 'david.brown@email.com'),
(6, 'Sara', 'Miller', '1989-07-18', '890 Elm St', '555-3333', 'sara.miller@email.com'),
(7, 'Chris', 'Davis', '1993-02-25', '345 Maple St', '555-4444', 'chris.davis@email.com'),
(8, 'Emma', 'Jones', '1986-09-08', '678 Pine St', '555-5555', 'emma.jones@email.com'),
(9, 'Daniel', 'Taylor', '1991-06-15', '901 Oak St', '555-6666', 'daniel.taylor@email.com'),
(10, 'Olivia', 'Anderson', '1984-03-20', '123 Cedar St', '555-7777', 'olivia.anderson@email.com'),
(11, 'Michael', 'Smith', '1994-07-12', '345 Elm St', '555-8888', 'michael.smith@email.com'),
(12, 'Sophia', 'Clark', '1983-10-25', '678 Oak St', '555-9999', 'sophia.clark@email.com'),
(13, 'Joshua', 'Moore', '1990-04-18', '901 Pine St', '555-0000', 'joshua.moore@email.com'),
(14, 'Ava', 'Walker', '1987-01-30', '234 Birch St', '555-1122', 'ava.walker@email.com'),
(15, 'Matthew', 'Turner', '1996-08-15', '567 Cedar St', '555-3344', 'matthew.turner@email.com'),
(16, 'Madison', 'Baker', '1985-02-28', '890 Maple St', '555-5566', 'madison.baker@email.com'),
(17, 'Daniel', 'Garcia', '1993-06-05', '123 Oak St', '555-7788', 'daniel.garcia@email.com'),
(18, 'Olivia', 'Young', '1988-09-20', '456 Pine St', '555-9900', 'olivia.young@email.com'),
(19, 'Ethan', 'Hill', '1991-03-15', '789 Cedar St', '555-1122', 'ethan.hill@email.com'),
(20, 'Abigail', 'Fisher', '1984-12-10', '234 Elm St', '555-3344', 'abigail.fisher@email.com'),
(33, 'Hue', 'Tu Thi', NULL, NULL, '0325344646', 'tuthihue.qn@gmail.com'),
(34, 'Lily', 'Tu', NULL, NULL, '123456789', '21522109@gm.uit.edu.vn');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `INVOICE`;
CREATE TABLE IF NOT EXISTS `INVOICE` (
  `InvoicelD` int NOT NULL AUTO_INCREMENT,
  `BookingID` int NOT NULL,
  `PaymentDate` date DEFAULT NULL,
  `Amount` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`InvoicelD`),
  KEY `FK_Invoices_Booking` (`BookingID`)
) ENGINE=MyISAM AUTO_INCREMENT=2393 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `INVOICE` (`InvoicelD`, `BookingID`, `PaymentDate`, `Amount`) VALUES
(1026, 3, '2023-12-29', '180'),
(1034, 1, '2022-12-15', '150'),
(1035, 2, '2022-12-16', '200'),
(1037, 4, '2022-12-18', '220'),
(1038, 5, '2022-12-19', '250'),
(1039, 6, '2022-12-20', '190'),
(1040, 7, '2022-12-21', '210'),
(1042, 8, '2022-12-22', '170'),
(1909, 9, '2022-12-23', '200'),
(2390, 10, '2022-12-24', '230'),
(2391, 22, '2023-12-28', '100'),
(2392, 23, '2023-12-28', '150');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `MESSAGE`;
CREATE TABLE IF NOT EXISTS `MESSAGE` (
  `MessageID` int NOT NULL AUTO_INCREMENT,
  `Sender` varchar(100) NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Content` varchar(1000) NOT NULL,
  `Timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`MessageID`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `MESSAGE` (`MessageID`, `Sender`, `Subject`, `Content`, `Timestamp`) VALUES
(1, 'johndoe@gmail.com', 'Meeting Tomorrow', 'Hi, let\'s meet tomorrow at 2 PM.', '2022-12-31 10:00:00'),
(2, 'janesmith@gmail.com', 'Project Update', 'The project is progressing well. Here is the latest update.', '2023-01-01 10:00:00'),
(3, 'mikejohnson@gmail.com', 'Important Announcement', 'Please be informed about the upcoming changes in the schedule.', '2023-01-02 10:00:00'),
(4, 'emilywilliams@gmail.com', 'Party Invitation', 'Join us for a celebration on Friday evening at 7 PM.', '2023-01-03 10:00:00'),
(5, 'davidbrown@gmail.com', 'New Product Launch', 'We are excited to announce the launch of our new product next week.', '2023-01-04 10:00:00'),
(6, 'saramiller@gmail.com', 'Training Session Reminder', 'A reminder for the training session scheduled for tomorrow morning.', '2023-01-05 10:00:00'),
(7, 'chrisdavis@gmail.com', 'Feedback Request', 'Your feedback is important to us. Please take a moment to share your thoughts.', '2023-01-06 10:00:00'),
(8, 'emmajones@gmail.com', 'Holiday Notice', 'Our office will be closed on Monday for the public holiday.', '2023-01-07 10:00:00'),
(9, 'danieltaylor@gmail.com', 'Job Opportunity', 'Exciting job opportunity available. Check the attached job description.', '2023-01-08 10:00:00'),
(10, 'tuthihue.qn@gmail.com', 'Thank You', 'Thank you for your collaboration on the recent project. Great job!', '2023-01-09 10:00:00'),
(50, 'lgirllovechan@gmail.com', 'Goodnight', 'Dear SaiGon hotel,\r\nHeeloooooo\r\nChan,', '2023-12-28 10:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `ROOM`;
CREATE TABLE IF NOT EXISTS `ROOM` (
  `RoomID` int NOT NULL AUTO_INCREMENT,
  `RoomType` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `RoomRate` decimal(10,0) DEFAULT NULL,
  `RoomStatus` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `RoomName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CreatedBy` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CreatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ModifiedBy` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`RoomID`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `ROOM` (`RoomID`, `RoomType`, `RoomRate`, `RoomStatus`, `RoomName`, `CreatedBy`, `CreatedDate`, `ModifiedDate`, `ModifiedBy`) VALUES
(101, 'Event Meeting', '100', 'Available', 'Apricot', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(102, 'Event Meeting', '120', 'Available', 'Apricot 1', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(103, 'Event Meeting', '120', 'Available', 'Apricot 2', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(104, 'Event Meeting', '120', 'Reserved', 'Apricot 3', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(105, 'Event Meeting', '150', 'Available', 'Lotus ballroom', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(106, 'Event Meeting', '180', 'Reserved', 'Lotus ballroom 1', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(107, 'Event Meeting', '180', 'Available', 'Lotus ballroom 2', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(108, 'Event Meeting', '180', 'Available', 'Lotus ballroom 3', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(201, 'Suite Room', '200', 'Available', 'Saigon Suite', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(202, 'Suite Room', '180', 'Available', 'Suite', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(203, 'Suite Room', '160', 'Available', 'Executive', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(204, 'Suite Room', '140', 'Available', 'Senior Deluxe', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(205, 'Suite Room', '120', 'Available', 'Superior', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(206, 'Suite Room', '200', 'Available', 'Saigon Suite', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(207, 'Suite Room', '180', 'Available', 'Suite', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(208, 'Suite Room', '160', 'Available', 'Executive', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(209, 'Suite Room', '140', 'Available', 'Senior Deluxe', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(210, 'Suite Room', '120', 'Available', 'Superior', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(211, 'Suite Room', '200', 'Available', 'Presidential Suite', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(212, 'Suite Room', '180', 'Occupied', 'Deluxe Suite', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(213, 'Suite Room', '160', 'Available', 'Penthouse', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(214, 'Suite Room', '140', 'Available', 'Junior Suite', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1'),
(215, 'Suite Room', '120', 'Available', 'Family Suite', 'Admin1', '2024-01-10 18:22:03', '2024-01-10 18:22:03', 'Admin1');

-- --------------------------------------------------------

--
-- Table structure for table `SETTING`
--

DROP TABLE IF EXISTS `SETTING`;
CREATE TABLE IF NOT EXISTS `SETTING` (
  `SettingID` int NOT NULL AUTO_INCREMENT,
  `SideTitle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `SideAbout` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Shutdown` tinyint(1) NOT NULL,
  PRIMARY KEY (`SettingID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SETTING`
--

INSERT INTO `SETTING` (`SettingID`, `SideTitle`, `SideAbout`, `Shutdown`) VALUES
(1, 'Submit form', 'By submitting this form, I agree to having my personal and contact information processed and used for the purpose of marketing communications.', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
