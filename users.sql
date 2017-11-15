-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: sulley.cah.ucf.edu
-- Generation Time: Nov 15, 2017 at 01:34 PM
-- Server version: 5.5.58-0ubuntu0.14.04.1
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dig4530c_group06`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `street` varchar(80) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `country` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `cardnumber` varchar(40) NOT NULL,
  `privilege` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `street`, `city`, `state`, `zip`, `country`, `phone`, `cardnumber`, `privilege`) VALUES
(1, 'bob@bob.bob', 'Bob McBob', '77604649bc942ee77d88bcef056b20a5af1576be', '444 Bob Lane', 'Bobville', 'MD', '33333', 'United States', '7135558080', '9d070d426b32591f951f249034b9e43161aefb39', 'user'),
(2, 'one@more.test', 'One More', 'c8ae3df7fa00e8ee7403829bb30853793c0a07c5', '', '', '', '', '', '', '', 'user'),
(3, 'test@test.test', 'testpassword', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', '', '', '', '', '', 'guest'),
(4, 'third@idea.com', 'aaaa', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', '', '', '', '', '', 'user'),
(5, '', 'Super', 'a82f4eadda2b8a04d92bdd21350b95561ae3d93e', '', '', '', '', '', '', '', 'super'),
(6, '', 'Admin', '1209227dd65df46bbbf90bd4d1e97fa1de21ded8', '', '', '', '', '', '', '', 'admin'),
(9, 'sa', 'asd', '12345', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
