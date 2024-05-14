-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 05:00 PM
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
-- Database: `watch_001`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `w_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `number`, `w_id`) VALUES
(15, 'ram', 1750939233, 62804),
(16, 'admin', 2147483647, 31529),
(17, 'try', 1750939233, 80836),
(18, 'mummy', 662713780, 74209),
(19, 'beta', 1510121973, 97567);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(200) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `w_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `type`, `path`, `size`, `date`, `w_id`) VALUES
(21, 'android', 'folder', 'C:/', NULL, '2024-05-12 08:54:02', 62804),
(22, 'androidv', 'folder', 'C:/', NULL, '2024-05-12 16:20:39', 27077),
(23, 'camera', 'folder', 'C:/', NULL, '2024-05-12 20:43:03', 27077),
(27, '6640ebd820c6f.jpg', 'img', 'C://camera', 57412, '2024-05-12 21:48:32', 27077),
(28, '6640ec1b6eb6b.jpg', 'img', 'C://camera', 57311, '2024-05-12 21:49:39', 27077),
(29, '6640ec570e851.jpg', 'img', 'C://camera', 3, '2024-05-12 21:50:39', 27077),
(30, '6640ec81e6124.jpg', 'img', 'C://camera', 1140, '2024-05-12 21:51:22', 27077),
(32, 'camera', 'folder', 'C:/', NULL, '2024-05-14 15:16:26', 97567),
(33, 'camera', 'folder', 'C:/', NULL, '2024-05-14 15:16:42', 74209),
(34, 'photos', 'folder', 'C://camera', NULL, '2024-05-14 15:17:30', 97567);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `incoming_num` int(20) NOT NULL,
  `outgoing_num` int(20) NOT NULL,
  `msg` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `w_id`, `incoming_num`, `outgoing_num`, `msg`, `time`) VALUES
(15, 31529, 2147483647, 1750939233, 'ok', '2024-05-14 06:21:26'),
(16, 31529, 2147483647, 1750939233, 'hm', '2024-05-14 06:21:29'),
(17, 80836, 1750939233, 1630086617, 'hy ram', '2024-05-14 07:23:08'),
(18, 31529, 2147483647, 1750939233, 'thi is last 7 ', '2024-05-14 08:13:21'),
(19, 31529, 1630086617, 1750939233, 'hy seeta ', '2024-05-14 08:24:31'),
(20, 31529, 1630086617, 1750939233, 'hn bol', '2024-05-14 09:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `note` text NOT NULL,
  `fav` int(11) DEFAULT NULL,
  `w_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `note`, `fav`, `w_id`) VALUES
(27, '120524', 'dfgfgdfdf', NULL, 31529),
(28, '120524', 'dddddddd', 1, 62804);

-- --------------------------------------------------------

--
-- Table structure for table `sim`
--

CREATE TABLE `sim` (
  `num` int(11) NOT NULL,
  `w_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sim`
--

INSERT INTO `sim` (`num`, `w_id`) VALUES
(1750939233, 31529),
(2147483647, 62804),
(1630086617, 80836),
(662713780, 97567),
(1510121973, 74209);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `watch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `watch_id`) VALUES
(7, 'ram', 31529),
(8, 'admin', 62804),
(9, 'mahesh', 27077),
(10, 'seeta', 80836),
(11, 'lalsingh', 74209),
(12, 'memwati', 97567);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
