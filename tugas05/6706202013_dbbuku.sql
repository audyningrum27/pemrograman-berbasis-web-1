-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 01:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `6706202013_dbbuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `6706202013_tbbuku`
--

CREATE TABLE `6706202013_tbbuku` (
  `id_buku` int(3) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `6706202013_tbbuku`
--

INSERT INTO `6706202013_tbbuku` (`id_buku`, `judul`, `pengarang`, `penerbit`) VALUES
(1, 'Hello World!', 'Nurul Qofifah', 'Coba Update'),
(3, 'Puasa di Bulan Ramadan', 'Nurul', 'Audyningrum'),
(4, 'Programmer', 'Nurul Qofifah', 'Audyningrum'),
(5, 'PHP 5 Sessions', 'Pak Indra [IZM]', 'D3 RPLA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`) VALUES
(1, 'audyningrum27', '$2y$10$g7Nu0qCBrkQKR0BJSUWkleVDGqGbXX3yBxSxSNUZoe32bYQxCwD1y'),
(2, 'audy', '$2y$10$B/NUunZUjPN67OE2uizlc.jOWs0kqDYF524mX4J1ekUGEazEF.OO6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `6706202013_tbbuku`
--
ALTER TABLE `6706202013_tbbuku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `6706202013_tbbuku`
--
ALTER TABLE `6706202013_tbbuku`
  MODIFY `id_buku` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
