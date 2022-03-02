-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Feb 28, 2022 at 02:30 PM
-- Server version: 8.0.28
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `doc_num` varchar(100) NOT NULL,
  `doc_start_date` date NOT NULL,
  `doc_to_date` date DEFAULT NULL,
  `doc_status` varchar(10) NOT NULL,
  `doc_file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `doc_num`, `doc_start_date`, `doc_to_date`, `doc_status`, `doc_file_name`) VALUES
('DC0001', 'wordtest', '2022-03-08', '2022-03-28', 'Active', 'testDB');

-- --------------------------------------------------------

--
-- Table structure for table `doc_staff`
--

CREATE TABLE `doc_staff` (
  `doc_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sff_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `doc_staff`
--

INSERT INTO `doc_staff` (`doc_id`, `sff_id`) VALUES
('DC0001', 'SF0001');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` varchar(10) NOT NULL,
  `sff_code` varchar(10) NOT NULL,
  `sff_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `sff_code`, `sff_name`) VALUES
('DC0001', 'SF0001', 'Prayut');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_staff`
--
ALTER TABLE `doc_staff`
  ADD PRIMARY KEY (`doc_id`,`sff_id`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
