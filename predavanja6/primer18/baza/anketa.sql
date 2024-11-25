-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 10:20 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anketa`
--
CREATE DATABASE anketa;


-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnicko_ime` varchar(255) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lozinka` varchar(64) NOT NULL,
  `adresa` varchar(50) DEFAULT NULL,
  `jmbg` varchar(15) DEFAULT NULL,
  `telefon` varchar(20) NOT NULL,
  `slika` varchar(50) DEFAULT NULL,
  `tip_korisnika` enum('korisnik','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnicko_ime`, `ime`, `prezime`, `email`, `lozinka`, `adresa`, `jmbg`, `telefon`, `slika`, `tip_korisnika`) VALUES
('mini', 'Mini', 'Mouse', 'mmini@cnw.com', '3514ca7dbcce6c8feb7ce4b705fccfdd', 'Patkovgrad', '0607937837838', '+381 6422222222', 'slike/Mini2.jpg', 'korisnik'),
('pata', 'Pata', 'Patak', 'patap@cnw.com', 'kvakva', 'Patkovgrad', '0906937837838', '+381 6411111111', 'slike/Pata.jpg', 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnicko_ime`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
