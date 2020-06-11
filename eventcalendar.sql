-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 12:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventcalendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `userid` int(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `userid`, `title`, `description`, `start_time`, `end_time`) VALUES
(1, 2, 'Meeting 1', 'Employee meet', '2020-06-03 06:00:00', '2020-06-03 07:00:00'),
(2, 1, 'Meeting 2', 'Discussion about stocks', '2020-06-16 05:14:16', '2020-06-16 06:13:15'),
(3, 1, 'Event 1', 'Event of management team', '2020-06-02 06:15:15', '2020-06-03 08:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `age` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `phone`, `age`, `username`, `password`, `reg_date`) VALUES
(1, 'Kamal', 'Sharma', 122, 34, 'kamal101', '827ccb0eea8a706c4c34a16891f84e7b', '2020-06-11'),
(9, 'Raj', 'Sharma', 2147483647, 12, 'raj123', 'e807f1fcf82d132f9bb018ca6738a19f', '2020-06-11'),
(10, 'Priya', 'Sharma', 2147483647, 56, 'Priya', 'e807f1fcf82d132f9bb018ca6738a19f', '2020-06-11'),
(11, 'Renu', 'Sharma', 2147483647, 56, 'renu_101', 'e807f1fcf82d132f9bb018ca6738a19f', '2020-06-11'),
(12, 'Jaya', 'Sharma', 2147483647, 23, 'jaya220', 'e807f1fcf82d132f9bb018ca6738a19f', '2020-06-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
