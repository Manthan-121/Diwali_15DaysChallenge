-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 02:18 PM
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
-- Database: `multi_email_sender`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_info`
--

CREATE TABLE `file_info` (
  `f_id` int(11) NOT NULL,
  `F_file_name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_info`
--

INSERT INTO `file_info` (`f_id`, `F_file_name`, `f_name`, `f_email`) VALUES
(9, 'demo2.csv', 'John Doe', 'lexad87311@anypng.com'),
(10, 'demo2.csv', 'Jane Smith', 'dofakol900@inikale.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_info`
--
ALTER TABLE `file_info`
  ADD PRIMARY KEY (`f_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_info`
--
ALTER TABLE `file_info`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
