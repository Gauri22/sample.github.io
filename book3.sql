-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 04:56 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book3`
--

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `user_id`, `name`, `email`, `address`, `phone_no`, `gender`, `avatar`, `hobbies`, `created`, `modified`) VALUES
(1, 8, 'Gauri Sanjay', 'r@gmail.com', 'Subhash nagar, Nagpur', '8600488870', 'F', 'GuviCertification - J9s2411642VCc7B793.png', 'Reading,Listening', '2022-02-08 02:02:11', '2022-02-08 03:02:08'),
(2, 10, 'shiva jivtode', 'shivajivtode1@gmail.com', 'it prk', '5468488585', 'M', 'module_table_bottom.png', 'Reading,Listening', '2022-02-11 06:02:15', '0000-00-00 00:00:00'),
(3, 12, 'triveni', 'triveni@gmail.com', 'Subhash nagar, Nagpur', '08600488870', 'F', '', 'Reading,Listening', '2022-02-16 01:02:37', '0000-00-00 00:00:00'),
(4, 12, 'swaraj', 'swaraj@gmail.com', 'higana', '08600488870', 'M', '31ueI7OfV9L-1.jpg', 'Reading', '2022-02-16 02:02:59', '0000-00-00 00:00:00'),
(5, 13, 'swaraj', 'swaraj@gmail.com', 'Subhash nagar, Nagpur', '08600488870', 'M', '620922_logo.jpg', 'Reading,Listening', '2022-02-17 03:02:40', '0000-00-00 00:00:00'),
(6, 16, 'ashwnini', 'ashwinikashti@gmail.com', 'hignana', '1234566', 'M', '620922_logo.jpg', 'Reading,Listening', '2022-02-22 12:02:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created`, `modified`) VALUES
(1, 'gauri', 'gauriitankar00@gmail.com', '58b107985ea76d7d76d82ae9b2788cfa', '2022-02-07 07:02:32', '2022-02-20 11:02:52'),
(2, 'piyush', 'PP@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-02-07 07:02:36', '0000-00-00 00:00:00'),
(3, 'abc', 'p@gmail.com', 'f1dc9a4f5792ac55063b2aedcdf2b365', '2022-02-07 07:02:49', '2022-02-07 05:02:41'),
(4, 'sads', 'gauriitankar22@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-02-07 02:02:54', '0000-00-00 00:00:00'),
(5, 'gauri', 'swyamitankar00@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-02-07 05:02:19', '0000-00-00 00:00:00'),
(6, 'php', 'php@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-02-07 05:02:38', '0000-00-00 00:00:00'),
(7, 'abc', 'a@gmail.com', '4389116292f4eb6655aba930db2c3f61', '2022-02-08 06:02:33', '2022-02-08 06:02:09'),
(8, 'ranveer', 'r@gmail.com', '68053af2923e00204c3ca7c6a3150cf7', '2022-02-08 01:02:31', '0000-00-00 00:00:00'),
(9, 'gola', 'gola@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-02-09 10:02:59', '0000-00-00 00:00:00'),
(10, 'shiva', 'shivajivtode1@gmail.com', 'd5f7b68ba6682a691cb19351685f3757', '2022-02-11 06:02:23', '0000-00-00 00:00:00'),
(11, 'triveni', 'triveni@gmial.com', '202cb962ac59075b964b07152d234b70', '2022-02-15 07:02:16', '0000-00-00 00:00:00'),
(12, 'triveni', 'triveni@gmail.com', '68053af2923e00204c3ca7c6a3150cf7', '2022-02-16 01:02:02', '0000-00-00 00:00:00'),
(13, 'swaraj', 'swaraj@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-02-17 02:02:27', '0000-00-00 00:00:00'),
(14, 'radha', 'radha@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-02-17 02:02:34', '0000-00-00 00:00:00'),
(15, 'abc', 'abc@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-02-17 04:02:05', '0000-00-00 00:00:00'),
(16, 'ashwini', 'ashwinikashti@gmail.com', '68053af2923e00204c3ca7c6a3150cf7', '2022-02-22 12:02:54', '2022-02-22 12:02:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
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
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
