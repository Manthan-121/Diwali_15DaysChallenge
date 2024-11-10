-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 11:13 AM
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
-- Database: `url_shortener`
--

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `id` int(11) NOT NULL,
  `original_url` text NOT NULL,
  `shortened_code` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`id`, `original_url`, `shortened_code`, `created_at`) VALUES
(4, 'http://localhost/phpmyadmin/index.php?route=/database/multi-table-query&db=url_shortener', '1rp4MJ', '2024-11-09 12:10:33'),
(5, 'http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=url_shortener&table=urls', 'Utqqxy', '2024-11-09 12:10:43'),
(6, 'http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=url_shortener&table=urls', 'ksrIQG', '2024-11-09 12:11:06'),
(7, 'https://www.google.com/search?q=what+is+php&sca_esv=b540a80d58e8a1c4&sxsrf=ADLYWIJGCLhh7eAINNsOBuG-9dLLnYb9VA%3A1731154386020&source=hp&ei=0VEvZ4CuO8TH0-kP2rvI6Ak&iflsig=AL9hbdgAAAAAZy9f4kHo_gqi3Pfeq14SPgVpnH690m6K&ved=0ahUKEwjA2ujRnM-JAxXE4zQHHdodEp0Q4dUDCBg&uact=5&oq=what+is+php&gs_lp=Egdnd3Mtd2l6Igt3aGF0IGlzIHBocDIIEAAYgAQYsQMyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgARI0kpQujJYhkhwAngAkAEAmAHsA6ABgROqAQkwLjguMi4wLjG4AQPIAQD4AQGYAg2gAqoUqAIKwgIHECMYJxjqAsICChAjGIAEGCcYigXCAg4QABiABBiRAhixAxiKBcICCxAAGIAEGJECGIoFwgILEAAYgAQYsQMYgwHCAhAQABiABBixAxiDARgUGIcCwgIIEC4YgAQYsQOYAy2SBwkyLjUuNS4wLjGgB8w-&sclient=gws-wiz', 'GIUkjR', '2024-11-09 12:13:32'),
(8, 'https://chart.apis.google.com/chart?chs=500x500&chma=0,0,100,100&cht=p&chco=FF0000%2CFFFF00%7CFF8000%2C00FF00%7C00FF00%2C0000FF&chd=t%3A122%2C42%2C17%2C10%2C8%2C7%2C7%2C7%2C7%2C6%2C6%2C6%2C6%2C5%2C5&chl=122%7C42%7C17%7C10%7C8%7C7%7C7%7C7%7C7%7C6%7C6%7C6%7C6%7C5%7C5&chdl=android%7Cjava%7Cstack-trace%7Cbroadcastreceiver%7Candroid-ndk%7Cuser-agent%7Candroid-webview%7Cwebview%7Cbackground%7Cmultithreading%7Candroid-source%7Csms%7Cadb%7Csollections%7Cactivity|Chart', 'w4OVkN', '2024-11-09 12:27:20'),
(9, 'https://chart.apis.google.com/chart?chs=500x500&chma=0,0,100,100&cht=p&chco=FF0000%2CFFFF00%7CFF8000%2C00FF00%7C00FF00%2C0000FF&chd=t%3A122%2C42%2C17%2C10%2C8%2C7%2C7%2C7%2C7%2C6%2C6%2C6%2C6%2C5%2C5&chl=122%7C42%7C17%7C10%7C8%7C7%7C7%7C7%7C7%7C6%7C6%7C6%7C6%7C5%7C5&chdl=android%7Cjava%7Cstack-trace%7Cbroadcastreceiver%7Candroid-ndk%7Cuser-agent%7Candroid-webview%7Cwebview%7Cbackground%7Cmultithreading%7Candroid-source%7Csms%7Cadb%7Csollections%7Cactivity|Chart', 'eNic3D', '2024-11-09 12:34:47'),
(10, 'https://chart.apis.google.com/chart?chs=500x500&chma=0,0,100,100&cht=p&chco=FF0000%2CFFFF00%7CFF8000%2C00FF00%7C00FF00%2C0000FF&chd=t%3A122%2C42%2C17%2C10%2C8%2C7%2C7%2C7%2C7%2C6%2C6%2C6%2C6%2C5%2C5&chl=122%7C42%7C17%7C10%7C8%7C7%7C7%7C7%7C7%7C6%7C6%7C6%7C6%7C5%7C5&chdl=android%7Cjava%7Cstack-trace%7Cbroadcastreceiver%7Candroid-ndk%7Cuser-agent%7Candroid-webview%7Cwebview%7Cbackground%7Cmultithreading%7Candroid-source%7Csms%7Cadb%7Csollections%7Cactivity|Chart', 'GhlqtU', '2024-11-09 12:36:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shortened_code` (`shortened_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
