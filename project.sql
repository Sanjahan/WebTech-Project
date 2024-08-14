-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 07:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `HistoryID` int(11) NOT NULL,
  `HostID` int(255) NOT NULL,
  `ClientID` varchar(255) NOT NULL,
  `PostID` int(255) NOT NULL,
  `DaysSpent` mediumtext NOT NULL,
  `Earning` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`HistoryID`, `HostID`, `ClientID`, `PostID`, `DaysSpent`, `Earning`) VALUES
(1, 1, '2', 1, '5330', '520040'),
(2, 6, '2', 6, '30', '16000');

-- --------------------------------------------------------

--
-- Table structure for table `hotelroom`
--

CREATE TABLE `hotelroom` (
  `id` varchar(20) NOT NULL,
  `hotelName` varchar(200) NOT NULL,
  `roomType` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `hotelfacilities` varchar(400) NOT NULL,
  `hotelLocation` varchar(200) NOT NULL,
  `roomStatus` varchar(20) NOT NULL,
  `bookedBy` varchar(50) NOT NULL,
  `complain` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelroom`
--

INSERT INTO `hotelroom` (`id`, `hotelName`, `roomType`, `price`, `hotelfacilities`, `hotelLocation`, `roomStatus`, `bookedBy`, `complain`) VALUES
('1', 'hotel 1', 'single', '$20', 'tv, wifi, ac', 'kuril', 'available', 'ahamadahasaf@gmail.com', 'bbbb'),
('2', 'hotel 2', 'double', '$10', 'Wifi, lift', 'Kuratoli', 'available', 'ahamadahasaf@gmail.com', ''),
('3', 'Blue Moon', 'single', '$50', 'ac, lift, pool, gym, bar', 'Cox\'s bazar', 'available', 'aaa', '');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NotificationID` int(11) NOT NULL,
  `Notification` varchar(500) NOT NULL,
  `Date` varchar(500) NOT NULL,
  `UserID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`NotificationID`, `Notification`, `Date`, `UserID`) VALUES
(1, 'User-1 requested for an maintenance', 'May 8, 2024', 1),
(2, 'User-3 has payments pending for this month', 'May 8, 2024', 1),
(3, 'Air conditioner is not working. ', '14 May, 2024', 6),
(4, 'Broken window pane.', '14 may, 2024', 6);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PostID` int(11) NOT NULL,
  `Address` varchar(5000) NOT NULL,
  `Rent` varchar(500) NOT NULL,
  `PostDate` varchar(500) NOT NULL,
  `UserID` int(255) NOT NULL,
  `Status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PostID`, `Address`, `Rent`, `PostDate`, `UserID`, `Status`) VALUES
(1, '290/1 A Khilgaon Railgate, Dhaka 1219', '25000', 'May 8, 2024', 1, 'Vacant'),
(2, 'Kuratoli, Kuril\r\nDhaka', '12500', 'May 8, 2024', 2, 'Vacant'),
(3, 'Lalmatia Block-C', '25000', 'May 8, 2024', 1, 'Booked'),
(4, 'No of rooms-5 \r\nHouse-21, Road-1\r\nMohammadpur, Dhaka-1207', '25000', 'May 12, 2024', 3, 'Vacant'),
(5, 'Hatirjheel, Area-12', '22500', 'May 15, 2024', 4, 'Booked'),
(6, 'Banani, Sector-12', '50000', 'May 28, 2024', 4, 'Vacant'),
(7, 'Adabor, Mohammadpur', '12500', 'April 4, 2024', 4, 'Booked'),
(8, 'R/A, Rajiasultana Road\r\nMohammadpur, Dhaka-1207', '16000', 'May 14, 2024', 6, 'Booked'),
(9, 'House-21, Road-1\r\nMohammadi Housing Limited\r\nMohammadpur, Dhaka-1207', '25000', 'May 14, 2024', 6, 'Booked'),
(10, 'Dhanmondi 9/A,\r\nDhaka', '35000', 'May 14, 2024', 6, 'Vacant');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `UserID` int(11) NOT NULL,
  `Fullname` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Username` varchar(500) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `SecurityQuestion` varchar(500) NOT NULL,
  `SecurityQuestionAnswer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`UserID`, `Fullname`, `Email`, `Username`, `Password`, `SecurityQuestion`, `SecurityQuestionAnswer`) VALUES
(1, 'Pillow', 'pillow@gmail.com', 'pillow', 'pillow@1234', 'What is your favourite color?', 'black'),
(2, 'Daku', 'daku@gmail.com', 'daku', 'daku@1234', 'What is your favourite color?', 'Red'),
(3, 'Sanjida Meem', 'sanjidajahan.cse@gmail.com', 'San', 'san@1234', 'What is your favourite color?', 'Black'),
(4, 'Paupau', 'paupau@gmail.com', 'Pau', 'pops@1234', 'What is the name of your high school best friend?', 'Pops'),
(5, 'Dimmie', 'dimmie@gmail.com', 'Dimi', 'dimi@1234', 'What is your childhood nickname?', 'dim'),
(6, 'Remedy Lemed', 'remedy@gmail.com', 'Remedy', 'remedy@1234', 'What is your childhood nickname?', 'Lemed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `userType` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `phoneNumber`, `email`, `address`, `userType`, `password`) VALUES
(2, 'a', '11', 'a', 'a', 'a', 'a'),
(8, 'admin', '0', 'admin@gmail.com', 'admin', 'Guest', 'admin'),
(9, 'b', '1', 'b', 'b', 'Guest', 'ba'),
(10, 'safat', '+8801721291286', 'ahamadahasaf@gmail.com', '17/A Mymensingh', 'Guest', '12345'),
(12, 'a', '0', 'abcdf', 'abcdef', 'a', 'a'),
(13, 'xyz', '00000000000', 'xyz', 'xyz', 'host', 'xyz'),
(14, 'b', '0', 'ubc', 'bbhb', 'Guest', 'bbb'),
(15, 'aaaa', '0000001010', 'aaaa', 'aaaa', 'Guest', 'aaaa'),
(16, 'xz', '01000001010', 'xz', 'xz', 'Guest', 'xz'),
(18, 'xxx', '0101', 'xxx', 'xxx', 'guest', 'xxx'),
(21, 'zzz', '01010101', 'zzz', 'zzz', 'host', 'zzz'),
(27, 'abc', 'abc', 'abc', 'abc', 'host', 'abc'),
(28, 'aaa9', 'aaa', 'aaa', 'aaa', 'guest', '111'),
(29, 'qqq', 'qqq', 'qqq', 'qqq', 'host', 'qqq'),
(30, 'abb', 'abb', 'abb', 'abb', 'guest', 'abb'),
(32, '000', '000', '000', '000', 'guest', '000'),
(35, 'a1', '123', 'ahamadsafat2002@gmail.com', 'a1', 'host', 'a1'),
(36, 'b1', 'b1', 'abc@gmail.com', 'b1', 'guest', 'bbbb@');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`HistoryID`);

--
-- Indexes for table `hotelroom`
--
ALTER TABLE `hotelroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NotificationID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `HistoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NotificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
