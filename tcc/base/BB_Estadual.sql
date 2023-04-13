-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2017 at 10:44 AM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BB_Estadual`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(150) CHARACTER SET utf8 NOT NULL,
  `senha_admin` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `email_admin`, `senha_admin`) VALUES
(1, '2016infor25@gmail.com', 24191048);

-- --------------------------------------------------------

--
-- Table structure for table `tb_carro`
--

CREATE TABLE `tb_carro` (
  `id_car` int(11) NOT NULL,
  `mod_car` varchar(150) CHARACTER SET utf8 NOT NULL,
  `marca_car` varchar(150) CHARACTER SET utf8 NOT NULL,
  `ano_car` varchar(10) NOT NULL,
  `foto_car` varchar(250) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_carro`
--

INSERT INTO `tb_carro` (`id_car`, `mod_car`, `marca_car`, `ano_car`, `foto_car`) VALUES
(9, 'Prisma', 'Chevrolet', '2017', '1140973059.jpeg'),
(11, 'Prisma', 'Chevrolet', '2017', '933942327.jpg'),
(13, 'Prisma', 'Chevrolet', '2018', '1568817208.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_carro`
--
ALTER TABLE `tb_carro`
  ADD PRIMARY KEY (`id_car`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_carro`
--
ALTER TABLE `tb_carro`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
