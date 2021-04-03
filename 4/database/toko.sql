-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 01:51 PM
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
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_tb`
--

CREATE TABLE `book_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `Publication_year` varchar(4) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_tb`
--

INSERT INTO `book_tb` (`id`, `name`, `category_id`, `writer_id`, `Publication_year`, `img`) VALUES
(24, 'buku baru', 1, 5, '2222', 'buku baru.png'),
(25, 'Buku sakti', 1, 6, '2222', 'aa.png');

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

CREATE TABLE `category_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`id`, `name`) VALUES
(1, 'programming'),
(2, 'sosial');

-- --------------------------------------------------------

--
-- Table structure for table `writer_tb`
--

CREATE TABLE `writer_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `writer_tb`
--

INSERT INTO `writer_tb` (`id`, `name`, `email`, `no_hp`) VALUES
(5, 'alfianizzah', 'alfianizzah6@gmail.com', '82347634401'),
(6, 'clara', 'clara@gmail.com', '082378905532');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_tb`
--
ALTER TABLE `book_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_tb_ibfk_1` (`category_id`),
  ADD KEY `book_tb_ibfk_2` (`writer_id`);

--
-- Indexes for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writer_tb`
--
ALTER TABLE `writer_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_tb`
--
ALTER TABLE `book_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category_tb`
--
ALTER TABLE `category_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `writer_tb`
--
ALTER TABLE `writer_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_tb`
--
ALTER TABLE `book_tb`
  ADD CONSTRAINT `book_tb_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_tb` (`id`),
  ADD CONSTRAINT `book_tb_ibfk_2` FOREIGN KEY (`writer_id`) REFERENCES `writer_tb` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
