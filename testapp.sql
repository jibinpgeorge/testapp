-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2016 at 12:54 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `station_name` varchar(255) NOT NULL,
  `available_docks` int(11) NOT NULL,
  `total_docks` int(11) NOT NULL,
  `status_value` varchar(100) NOT NULL,
  `available_bikes` int(11) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `post_id`, `user_id`, `station_name`, `available_docks`, `total_docks`, `status_value`, `available_bikes`, `address`) VALUES
(4, 82, 1, 'St James Pl & Pearl St', 1, 27, 'In Service', 26, 'St James Pl & Pearl St'),
(6, 72, 1, 'W 52 St & 11 Ave', 17, 39, 'In Service', 21, 'W 52 St & 11 Ave'),
(8, 116, 1, 'W 17 St & 8 Ave', 36, 39, 'In Service', 3, 'W 17 St & 8 Ave'),
(9, 119, 1, 'Park Ave & St Edwards St', 9, 19, 'In Service', 10, 'Park Ave & St Edwards St'),
(10, 83, 1, 'Atlantic Ave & Fort Greene Pl', 25, 62, 'In Service', 35, 'Atlantic Ave & Fort Greene Pl'),
(11, 79, 1, 'Franklin St & W Broadway', 29, 33, 'In Service', 3, 'Franklin St & W Broadway'),
(12, 120, 1, 'Lexington Ave & Classon Ave', 0, 19, 'In Service', 19, 'Lexington Ave & Classon Ave'),
(13, 127, 1, 'Barrow St & Hudson St', 5, 31, 'In Service', 26, 'Barrow St & Hudson St');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_05_24_103057_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`) VALUES
(1, 'jibin', 'jibinpgeorge@gmail.com', '$2y$10$AMbvAqogi9PpHM4pwQcD9eOpG7SeeFaZ9kSyBYgKwji/ArM9KzyAe', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
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
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
