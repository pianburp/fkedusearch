-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 11:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(1, 'aman', 'Titt5674', 'aman@gmail.com', 'Unvalidate'),
(2, 'adam', 'Titt5679', 'adam@gmail.com', 'Unvalidate'),
(3, 'musyir', 'Titt5671', 'musyir@gmail.com', 'Validate'),
(4, 'kevin', 'Titt5672', 'kevin@gmail.com', 'Validate'),
(5, 'Suffian', 'Titt5678', 'suffian@gmail.com', 'Unvalidate'),
(6, 'Satoshi', 'Btc4567', 'sats@gmail.com', 'Unvalidate');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `date_added` date DEFAULT NULL,
  `likes` int(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `category`, `content`, `date_added`, `likes`) VALUES
(13, 'Car is broken', 'Course', 'Car is broken Car is broken Car is broken', NULL, 0),
(14, 'How to do math', 'Research', 'I can\'t understand this one question', NULL, 0),
(15, 'I am homeless, please help me', 'Others', 'I have been homeless for the past 4 days. Anyone with a home want to contact me?', NULL, 0),
(16, 'How do you do this chapter in SE?', 'Course', 'I am having a hard time thinking about this', NULL, 0),
(17, 'Need help now', 'Others', 'SOS', '2023-06-21', 0),
(18, 'I have a problem with Database Systems', 'Course', 'How to filter out my column?', '2023-05-12', 0),
(19, 'I have a problem', 'Others', 'Alfredo', '2023-06-21', 0),
(20, 'Need some guidance on UMP OR', 'Course', 'I have having trouble opening OR', '2023-06-21', 0);

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name_user` varchar(60) NOT NULL,
  `pass_user` varchar(60) NOT NULL,
  `email_user` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name_user`, `pass_user`, `email_user`) VALUES
(1, 'Adam Hakim', 'Tit1234', 'adam@gmail.com'),
(2, 'Jamal', 'K3HTApSKYj9G@y', 'tyrone@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `useractivity`
--

CREATE TABLE `useractivity` (
  `id` int(11) NOT NULL,
  `total_post` int(11) NOT NULL,
  `total_comment` int(11) NOT NULL,
  `total_like` int(11) NOT NULL,
  `total_user` int(11) NOT NULL,
  `ret_rate` int(11) NOT NULL,
  `eng_rate` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useractivity`
--

INSERT INTO `useractivity` (`id`, `total_post`, `total_comment`, `total_like`, `total_user`, `ret_rate`, `eng_rate`, `date`) VALUES
(2, 420, 666, 6721, 333, 31, 11, '2023-06-01'),
(4, 324, 758, 5641, 256, 40, 32, '2023-07-01'),
(5, 367, 777, 6666, 300, 28, 45, '2023-08-01'),
(6, 278, 478, 5555, 168, 51, 32, '2023-09-01'),
(7, 360, 772, 5043, 229, 42, 34, '2023-10-01'),
(8, 304, 663, 5498, 209, 82, 52, '2023-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userId` int(11) NOT NULL,
  `areaOfResearch` varchar(100) NOT NULL,
  `academicStatus` varchar(100) NOT NULL,
  `socialMediaAccount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userId`, `areaOfResearch`, `academicStatus`, `socialMediaAccount`) VALUES
(1, 'Faculty of Engineering', 'Masters', '@jamalnba');

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
(2, 'Satoshi Nakamoto', '5 star'),
(3, '', '');

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useractivity`
--
ALTER TABLE `useractivity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userId`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `useractivity`
--
ALTER TABLE `useractivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usersatisfy`
--
ALTER TABLE `usersatisfy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
