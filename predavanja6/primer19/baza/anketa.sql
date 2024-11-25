-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 10:03 PM
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
  `tip_korisnika` enum('korisnik','admin') NOT NULL,
  `stanje` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnicko_ime`, `ime`, `prezime`, `email`, `lozinka`, `adresa`, `jmbg`, `telefon`, `slika`, `tip_korisnika`, `stanje`) VALUES
('mm', 'Pata', 'Patak', 'patabp@cnw.com', '6f8f57715090da2632453988d9a1501b', 'Patkovgrad', '09693787999', '+381 60 666 666', 'slike/mobile.jpg', 'korisnik', NULL),
('ukica', 'Ulfeta', 'Marovac', 'umarovac@np.ac.rs', '44f437ced647ec3f40fa0841041871cd', 'Sutjeska 9', '09693787999', '+381 60 666 666', 'slike/mobile.jpg', 'korisnik', '0');

-- --------------------------------------------------------

--
-- Table structure for table `verifikacioni_kodovi`
--

CREATE TABLE `verifikacioni_kodovi` (
  `korisnicko_ime` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kod` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verifikacioni_kodovi`
--

INSERT INTO `verifikacioni_kodovi` (`korisnicko_ime`, `email`, `kod`) VALUES
('korisnik', 'umarovac@np.ac.rs', '16204165eb8fc3'),
('korisnik', 'umarovac@np.ac.rs', '16204169f9a1f8'),
('korisnik', 'umarovac@np.ac.rs', '16204190069603'),
('korisnik', 'umarovac@np.ac.rs', '1620419009e21a'),
('korisnik', 'umarovac@np.ac.rs', '162041902859ee'),
('korisnik', 'umarovac@np.ac.rs', '16204194db88d4'),
('korisnik', 'umarovac@np.ac.rs', '16204194f45a6b'),
('korisnik', 'umarovac@np.ac.rs', '162041a8a0cf60'),
('korisnik', 'umarovac@np.ac.rs', '162041a8bc6443');

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
