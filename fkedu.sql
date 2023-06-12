-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 08:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fkedu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email_admin` varchar(60) NOT NULL,
  `name_admin` varchar(60) NOT NULL,
  `pass_admin` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email_admin`, `name_admin`, `pass_admin`) VALUES
(1, 'ahmad@gmail.com', 'ahmad', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `id` int(11) NOT NULL,
  `name_expert` varchar(60) NOT NULL,
  `pass_expert` varchar(60) NOT NULL,
  `email_expert` varchar(60) NOT NULL,
  `status_expert` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`id`, `name_expert`, `pass_expert`, `email_expert`, `status_expert`) VALUES
(1, 'aman', '12534', 'aman@gmail.com', 'Unvalidate'),
(2, 'adam', '42069', 'adam@gmail.com', 'Unvalidate'),
(3, 'musyir', '11469', 'musyir@gmail.com', 'Validate'),
(4, 'kevin', '112234', 'kevin@gmail.com', 'Validate');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `title_report` varchar(60) NOT NULL,
  `desc_report` varchar(200) NOT NULL,
  `stats_report` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `title_report`, `desc_report`, `stats_report`) VALUES
(2, 'Toilet Problem', 'Blok A Bilik 49', 'In Investigation'),
(3, 'Wifi Problem', 'Blok A Bilik 420', 'Resolved'),
(5, 'Wifi Problem', 'Lab FKOM 64', 'Resolved'),
(6, 'Blackout', 'ASTAKA', 'Resolved');

-- --------------------------------------------------------

--
-- Table structure for table `usersatisfy`
--

CREATE TABLE `usersatisfy` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `rating` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersatisfy`
--

INSERT INTO `usersatisfy` (`id`, `name`, `rating`) VALUES
(2, 'Satoshi Nakamoto', '5 star');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersatisfy`
--
ALTER TABLE `usersatisfy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usersatisfy`
--
ALTER TABLE `usersatisfy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
