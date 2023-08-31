-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 01:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nss`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dateofbirth` date NOT NULL,
  `place` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `mothername` varchar(100) NOT NULL,
  `caste` varchar(150) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `participated` varchar(100) NOT NULL,
  `bloodgroup` varchar(100) NOT NULL,
  `spectacles` varchar(100) NOT NULL,
  `minority` varchar(100) NOT NULL,
  `vaccinated` varchar(100) NOT NULL,
  `aadharcardno` varchar(100) NOT NULL,
  `electioncardno` varchar(100) NOT NULL,
  `languages` varchar(100) NOT NULL,
  `Activity` varchar(100) NOT NULL,
  `skills` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `email`, `dateofbirth`, `place`, `gender`, `mothername`, `caste`, `pincode`, `height`, `weight`, `participated`, `bloodgroup`, `spectacles`, `minority`, `vaccinated`, `aadharcardno`, `electioncardno`, `languages`, `Activity`, `skills`) VALUES
(1, 'sarvesh', 'santosh', 'kulkarni', 'sarveshkulkarni486@gmail.com', '2001-12-09', 'Nanded', 'male', 'Vibha', 'Brahman', '431005', '165cm', '55kg', 'Trekking', 'AB positive', 'fullframe', 'no', 'yes', '7577165531', 'EL6425123', 'English,Hindi,Marathi', '', 'Driving,Swimming'),
(2, 'ashutosh', 'santosh', 'wazarkar', 'ashutoshwazarkar1@gmail.com', '2023-08-24', 'aurangabad', 'male', 'amruta', 'brahmin', '431001', '23', '12', 'RSP,Civil Defence', 'O negative', 'no spectacles', 'yes', 'yes', '6276278364', '623554234', 'English,Hindi,Marathi,Bengali,Tamil', 'pre NRD', 'Driving');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
