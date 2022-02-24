-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 06:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `actor_id` smallint(5) UNSIGNED NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`actor_id`, `first_name`, `last_name`, `last_update`, `Email`) VALUES
(1, 'PENELOPE', 'GUINESS', '2022-02-23 17:32:31', 'PENELOPE@testmail.ac.th'),
(2, 'NICK', 'WAHLBERG', '2022-02-23 17:34:21', 'NICK@testmail.ac.th'),
(3, 'ED', 'CHASE', '2022-02-23 17:33:22', 'ED@testmail.ac.th'),
(4, 'JENNIFER', 'DAVIS', '2022-02-23 17:33:44', 'JENNIFER@testmail.ac.th'),
(5, 'JOHNNY', 'LOLLOBRIGIDA', '2022-02-23 17:34:01', 'JOHNNY@testmail.ac.th'),
(6, 'BETTE', 'NICHOLSON3', '2022-02-23 17:33:03', 'BETTE@testmail.ac.th'),
(7, 'GRACE', 'MOSTEL', '2022-02-23 17:33:34', 'GRACE@testmail.ac.th'),
(8, 'MATTHEW', 'JOHANSSON', '2022-02-23 17:34:09', 'MATTHEW@testmail.ac.th'),
(9, 'JOE', 'SWANK', '2022-02-23 17:33:52', 'JOE@testmail.ac.th'),
(10, 'CHRISTIAN', 'GABLE', '2022-02-23 17:33:11', 'CHRISTIAN@testmail.ac.th'),
(12, 'SITTIPON', 'ZANGf', '2022-02-23 17:31:36', 'ZANGdd@gmail.com'),
(15, 'SITTIPON', 'SITTIPON', '2022-02-23 17:32:41', 'SITTIPON@testmail.ac.th'),
(16, 'IZHABIT', 'YCN', '2022-02-23 17:34:50', 'ADMIN@testmail.ac.th');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`actor_id`),
  ADD UNIQUE KEY `Email` (`Email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `actor_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
