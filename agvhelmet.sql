-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2022 at 11:14 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agvhelmet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `datahelm`
--

CREATE TABLE `datahelm` (
  `id` int(100) NOT NULL,
  `tipehelm` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datahelm`
--

INSERT INTO `datahelm` (`id`, `tipehelm`, `harga`, `ukuran`, `status`) VALUES
(18, 'AGV Pista Anniversario', 35000000, 'L', 'Ready'),
(19, 'AGV K3SV', 1500000, 'L', 'Ready'),
(20, 'AGV K3SV Silver', 1450000, 'M', 'Ready'),
(21, 'AGV Corsa Black Matte', 5200000, 'M', 'Ready');

-- --------------------------------------------------------

--
-- Table structure for table `datamodal`
--

CREATE TABLE `datamodal` (
  `id` int(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datamodal`
--

INSERT INTO `datamodal` (`id`, `img`, `title`, `deskripsi`) VALUES
(1, 'assets\\img\\helm\\corsa-r-multi-ece.png', 'CORSA R MULTI ECE DOT - SUPERSPORT BLUE/RED/YELLOW', 'A premium sport-riding helmet with a carbon-aramidic-fiberglass shell, the Corsa R offers a long lis'),
(2, 'assets\\img\\helm\\k1-top-ece-dot.png', 'K1 TOP ECE DOT - ROSSI MUGELLO 2015', 'K1 is the brand new AGV sport helmet for everyday riding challenges. Born from AGV racing technology'),
(3, 'assets\\img\\helm\\k3-sv-top-ece.png', 'K3 SV TOP ECE DOT - ROSSI MUGELLO 2017', 'The K3 SV is an affordable, adaptable helmet with a surprising array of features, including an inter'),
(4, 'assets\\img\\helm\\k5-s-multi-ece.png', 'K5 S MULTI ECE DOT - CORE MATT BLACK/BLUE/ORANGE', 'K5 S MULTI ECE DOT - CORE MATT BLACK/BLUE/ORANGE\", desc: \"AGV’s latest version of this premium sport helmet now features a new construction for the inner liner, designed with high-performance fabrics and with no stitching in sensitive areas, making for an extremely comfortable fit.'),
(5, 'assets\\img\\helm\\k6-ece-dot-multi.png', 'K6 ECE DOT MULTI - FLASH MATT BLACK/GREY/RED', 'The best road helmet for any use, made from technologies developed for MotoGP™.'),
(6, 'assets\\img\\helm\\pista-gp-rr-ece.png', 'PISTA GP RR ECE DOT SPECIAL EDITION - FUTURO CARBONIO FORGIATO/ELETTRO IRIDIUM', 'Special edition of the racing helmet used in MotoGP™ with shell and PRO Spoiler made of exclusive Carbonio Forgiato, visor and details in Elettro Iridium blue. Design: FUTURO CARBONIO FORGIATO/ELETTRO IRIDIUM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datahelm`
--
ALTER TABLE `datahelm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datamodal`
--
ALTER TABLE `datamodal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `datahelm`
--
ALTER TABLE `datahelm`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `datamodal`
--
ALTER TABLE `datamodal`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
