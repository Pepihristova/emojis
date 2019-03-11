-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 08:21 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emojis`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `username` varchar(150) NOT NULL,
  `message` varchar(150) NOT NULL,
  `recipient` varchar(150) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`username`, `message`, `recipient`, `date_added`) VALUES
('Preslava', 'hi', 'Preslava1', '2019-03-04'),
('Preslava', '1234', 'Hristo', '2002-03-05'),
('Hristo', 'hi', 'Preslava', '2002-08-09'),
('Preslava', '569', '', '0000-00-00'),
('Preslava', '8', '', '2000-07-01'),
('Preslava', '7', '', '2000-07-01'),
('Preslava', 'adano', 'Aksenia', '2000-07-01'),
('Preslava', '1', 'Aksenia', '2000-07-01'),
('Preslava', '1', 'Aksenia', '2000-07-01'),
('Preslava', 'hope', 'Vladislav', '2000-07-01'),
('Preslava', '', 'Aksenia', '2000-07-01'),
('Preslava', '', 'Aksenia', '0000-00-00'),
('Preslava', 'stana li', 'new', '2000-07-01'),
('Preslava', '', 'Aksenia', '2000-07-01'),
('Preslava', '', 'Aksenia', '2000-07-01'),
('Preslava', '', '', '2000-07-01'),
('Preslava', '', '', '2000-07-01'),
('Preslava', '', 'Aksenia', '2000-07-01'),
('Preslava', '', 'Aksenia', '2000-07-01'),
('Preslava', '', 'Aksenia', '2000-07-01'),
('Preslava', '', 'Aksenia', '2000-07-01'),
('Preslava', 'proba 1', 'Preslava2', '2000-07-01'),
('Preslava', '', 'Aksenia', '2000-07-01'),
('Preslava', '', 'Aksenia', '2000-07-01'),
('Preslava', 'hope pepe', 'Preslava1', '2000-07-01'),
('Preslava', 'hopa never die', 'new', '2000-07-01'),
('Preslava', 'mucka stana', 'Hristo', '2000-07-01'),
('Preslava', 'zdrasti tate', 'Hristo', '2000-07-01'),
('Hristo', 'zdrasti i na tebe tate', 'Preslava', '2000-07-01'),
('new', 'proba 1', 'Preslava', '2000-07-01'),
('Stela', 'hi', 'Preslava', '2000-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `pass`) VALUES
('Aksenia', '1234'),
('Hristo', '1974'),
('new', '1234'),
('Preslava', 'pepi'),
('Preslava1', 'pepi1'),
('Preslava2', 'pepi2'),
('Stela', '1234'),
('Vladislav', 'm5j9r3q8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
