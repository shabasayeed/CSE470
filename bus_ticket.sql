-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 06:06 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_operator`
--

CREATE TABLE `bus_operator` (
  `oname` varchar(25) NOT NULL,
  `oid` varchar(8) NOT NULL,
  `headquarter` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `alternate_phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_operator`
--

INSERT INTO `bus_operator` (`oname`, `oid`, `headquarter`, `phone`, `alternate_phone`, `email`) VALUES
('Hanif', 'BD01', '34/A Gabtoli, Dhaka', 1715015204, 1945198915, 'hanif_bus@yahoo.com'),
('Saudia', 'BD02', '29/A, Syedabad, Dhaka', 1950000555, 1950000556, 'saudia_bus@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nid` varchar(25) NOT NULL,
  `phone` int(11) NOT NULL,
  `alternative_phone` int(11) NOT NULL,
  `emergency_phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `address`, `email`, `nid`, `phone`, `alternative_phone`, `emergency_phone`) VALUES
('niloy', 'MD Robiul Islam', 'niloy', 'Mohakhali, Dhaka.', '00robiulislam@gmail.com', '21553640', 1945198915, 0, 1713176448);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_operator`
--
ALTER TABLE `bus_operator`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
