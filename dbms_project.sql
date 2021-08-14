-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 08:08 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `ad_id` int(11) NOT NULL,
  `prod_desc` varchar(255) NOT NULL,
  `prod_name` varchar(120) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `prod_pic1` varchar(255) NOT NULL,
  `prod_pic2` varchar(255) NOT NULL,
  `prod_pic3` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`ad_id`, `prod_desc`, `prod_name`, `prod_price`, `category_name`, `prod_pic1`, `prod_pic2`, `prod_pic3`, `user_id`, `contact`) VALUES
(2, 'Luxury car with top high speed.', 'Car', 123400, 'Card', '2018-lexus-lc-500-5.jpg', '2019-toyota-86-5-2.jpg', 'lexus-lc8.jpg', 1, '9991445085'),
(6, 'cool posters of batman etc', 'posters', 1000, 'poster', 'Dark batman wallpaper.jpg', 'e7232729-87da-44ec-b961-bee1e9d711cb.jpg', 'IRON MAN.jpg', 1, '9991445085'),
(8, 'beatiful room lamp', 'lamp', 5000, 'Mobile', 'lamp-400.jpg', 'wheel-400.jpg', 'sydney-800.jpg', 1, '9991445085'),
(9, 'sony camera 54mpx', 'camera', 24000, 'Mobile', 'shutterbug-400.jpg', 'fuji-400.jpg', 'beetle-800.jpg', 1, '9991445085'),
(10, 'brown funky watch', 'watch', 3500, 'Watch', 'FTW7008_main.jpg', 'FTW7008_3.jpg', 'FTW7008_2.jpg', 1, '9991445085'),
(11, 'brown color', 'wallet', 3500, 'Wallet', 'ML3681200_main.jpg', 'ML3681200_1.jpg', 'ML3681200_2.jpg', 2, '7062519700');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Card'),
(2, 'Watch'),
(3, 'Mobile'),
(4, 'Wallet'),
(5, 'Car'),
(6, 'keys'),
(7, 'poster');

-- --------------------------------------------------------

--
-- Table structure for table `foundproduct`
--

CREATE TABLE `foundproduct` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(120) NOT NULL,
  `prod_desc` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foundproduct`
--

INSERT INTO `foundproduct` (`prod_id`, `prod_name`, `prod_desc`, `location`, `category_name`, `user_id`, `contact`) VALUES
(2, 'wallet', 'red', 'atm circle', 'Wallet', 1, '9991445085'),
(3, 'atm card', 'sbi', 'atm circle', 'Card', 1, '9991445085');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `midname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) NOT NULL,
  `uname` varchar(45) NOT NULL,
  `contact` decimal(10,0) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pw` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `midname`, `lname`, `uname`, `contact`, `email`, `pw`, `address`) VALUES
(1, 'aman', 'singh', 'kadiyan', 'amansk123', '9991445085', 'aman_b181103cs@nitc.ac.in', '123456', '225,mhb'),
(2, 'Tarun', '.', 'Kansal', 'tk123', '7062519700', 'tarunkansal12345@gmail.com', 'tarun123', 'F191 Beechwal Ind. Area Bikaner'),
(3, 'aishik', '', 'rana', 'rana12', '856321830', 'rana@nitc.ac.in', 'rana123', 'room 509 mbh'),
(4, 'ravi', '', 'kumar', 'ravi12', '7896312545', 'ravi@nitc.ac.in', 'ravi123', 'room 65 mbh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`ad_id`),
  ADD KEY `user_id` (`user_id`,`contact`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `foundproduct`
--
ALTER TABLE `foundproduct`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `user_id` (`user_id`,`contact`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`,`contact`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `foundproduct`
--
ALTER TABLE `foundproduct`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `advertisement_ibfk_1` FOREIGN KEY (`user_id`,`contact`) REFERENCES `users` (`user_id`, `contact`);

--
-- Constraints for table `foundproduct`
--
ALTER TABLE `foundproduct`
  ADD CONSTRAINT `foundproduct_ibfk_1` FOREIGN KEY (`user_id`,`contact`) REFERENCES `users` (`user_id`, `contact`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
