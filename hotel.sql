-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2023 lúc 01:59 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hotel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `checkinDate` datetime DEFAULT NULL,
  `checkOutDate` datetime DEFAULT NULL,
  `totalAmount` float DEFAULT NULL,
  `paymentStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bookings`
--

INSERT INTO `bookings` (`bookingID`, `customerID`, `roomID`, `checkinDate`, `checkOutDate`, `totalAmount`, `paymentStatus`) VALUES
(1, 1, 1, '2022-01-01 00:00:00', '2022-01-05 00:00:00', NULL, NULL),
(2, 2, 2, '2022-01-05 00:00:00', '2022-01-10 00:00:00', NULL, NULL),
(3, 3, 3, '2022-01-10 00:00:00', '2022-01-15 00:00:00', NULL, NULL),
(4, 4, 4, '2022-01-15 00:00:00', '2022-01-20 00:00:00', NULL, NULL),
(5, 5, 5, '2022-01-20 00:00:00', '2022-01-25 00:00:00', NULL, NULL),
(6, 1, 1, '2022-01-01 00:00:00', '2022-01-05 00:00:00', NULL, NULL),
(7, 2, 2, '2022-01-05 00:00:00', '2022-01-10 00:00:00', NULL, NULL),
(8, 3, 3, '2022-01-10 00:00:00', '2022-01-15 00:00:00', NULL, NULL),
(9, 4, 4, '2022-01-15 00:00:00', '2022-01-20 00:00:00', NULL, NULL),
(10, 5, 5, '2022-01-20 00:00:00', '2022-01-25 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookingservices`
--

CREATE TABLE `bookingservices` (
  `bookingservicelD` int(11) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `totalPrice` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `customerFirstName` varchar(50) DEFAULT NULL,
  `customerLastName` varchar(50) DEFAULT NULL,
  `customerDob` datetime DEFAULT NULL,
  `customerAddress` varchar(100) DEFAULT NULL,
  `customerPhoneNumber` varchar(50) DEFAULT NULL,
  `customerEmail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customerID`, `employeeID`, `customerFirstName`, `customerLastName`, `customerDob`, `customerAddress`, `customerPhoneNumber`, `customerEmail`) VALUES
(1, 1, 'David', 'Smith', '1990-01-01 00:00:00', '123 Easy Street', '555-555-5555', 'david.smith@email.com'),
(2, 2, 'Jennifer', 'Johnson', '1991-02-02 00:00:00', '456 Hard Street', '555-555-5556', 'jennifer.johnson@email.com'),
(3, 3, 'Robert', 'Williams', '1992-03-03 00:00:00', '789 Good Street', '555-555-5557', 'robert.williams@email.com'),
(4, 4, 'Emily', 'Brown', '1993-04-04 00:00:00', '321 Bad Street', '555-555-5558', 'emily.brown@email.com'),
(5, 5, 'Michael', 'Davis', '1994-05-05 00:00:00', '987 Simple Street', '555-555-5559', 'michael.davis@email.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `employeeID` int(11) NOT NULL,
  `employeeFirstName` varchar(50) DEFAULT NULL,
  `employeeLastName` varchar(50) DEFAULT NULL,
  `employeeAddress` varchar(100) DEFAULT NULL,
  `employeePhoneNumber` varchar(50) DEFAULT NULL,
  `employeeEmail` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`employeeID`, `employeeFirstName`, `employeeLastName`, `employeeAddress`, `employeePhoneNumber`, `employeeEmail`, `position`) VALUES
(1, 'John', 'Doe', '123 Easy Street', '555-555-5555', 'john.doe@email.com', 'Manager'),
(2, 'Jane', 'Smith', '456 Hard Street', '555-555-5556', 'jane.smith@email.com', 'Receptionist'),
(3, 'Sam', 'Johnson', '789 Good Street', '555-555-5557', 'sam.johnson@email.com', 'Accountant'),
(4, 'Mike', 'Williams', '321 Bad Street', '555-555-5558', 'mike.williams@email.com', 'Maintenance'),
(5, 'Tom', 'Brown', '987 Simple Street', '555-555-5559', 'tom.brown@email.com', 'Chef');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `invoicelD` int(11) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `paymentDate` datetime DEFAULT NULL,
  `amount` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `roomID` int(11) NOT NULL,
  `roomType` varchar(50) DEFAULT NULL,
  `roomRate` decimal(10,3) DEFAULT NULL,
  `roomStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`roomID`, `roomType`, `roomRate`, `roomStatus`) VALUES
(1, 'Single', 100.000, 'Available'),
(2, 'Double', 150.000, 'Available'),
(3, 'Suite', 250.000, 'Available'),
(4, 'Single', 100.000, 'Available'),
(5, 'Double', 150.000, 'Available');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `serviceID` int(11) NOT NULL,
  `serviceName` varchar(100) DEFAULT NULL,
  `price` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `services`
--

INSERT INTO `services` (`serviceID`, `serviceName`, `price`) VALUES
(1, 'Room Cleaning', 10.000),
(2, 'Laundry', 20.000),
(3, 'Dinner', 50.000),
(4, 'Massage', 100.000),
(5, 'Coffee Break', 10.000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `FK_Bookings_Customers` (`customerID`),
  ADD KEY `FK_Bookings_Rooms` (`roomID`);

--
-- Chỉ mục cho bảng `bookingservices`
--
ALTER TABLE `bookingservices`
  ADD PRIMARY KEY (`bookingservicelD`),
  ADD KEY `FK_Bookingservices_Bookings` (`bookingID`),
  ADD KEY `FK_Bookingservices_Services` (`serviceID`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`),
  ADD KEY `FK_Customers_Employees` (`employeeID`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employeeID`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoicelD`),
  ADD KEY `FK_Invoices_Booking` (`bookingID`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomID`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `bookingservices`
--
ALTER TABLE `bookingservices`
  MODIFY `bookingservicelD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoicelD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `FK_Bookings_Customers` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`),
  ADD CONSTRAINT `FK_Bookings_Rooms` FOREIGN KEY (`roomID`) REFERENCES `rooms` (`roomID`);

--
-- Các ràng buộc cho bảng `bookingservices`
--
ALTER TABLE `bookingservices`
  ADD CONSTRAINT `FK_Bookingservices_Bookings` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bookingID`),
  ADD CONSTRAINT `FK_Bookingservices_Services` FOREIGN KEY (`serviceID`) REFERENCES `services` (`serviceID`);

--
-- Các ràng buộc cho bảng `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `FK_Customers_Employees` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`);

--
-- Các ràng buộc cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `FK_Invoices_Booking` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bookingID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
