-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 04:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putovanja`
--

-- --------------------------------------------------------

--
-- Table structure for table `aranzmani`
--

CREATE TABLE `aranzmani` (
  `IdAranzmana` int(11) NOT NULL,
  `Naziv` varchar(50) NOT NULL,
  `Cena` int(11) NOT NULL,
  `BrojDana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aranzmani`
--

INSERT INTO `aranzmani` (`IdAranzmana`, `Naziv`, `Cena`, `BrojDana`) VALUES
(1, 'Madrid', 26000, 4),
(2, 'Rim', 19000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `klijent`
--

CREATE TABLE `klijent` (
  `IdKlijenta` int(11) NOT NULL,
  `ImePrezime` varchar(50) NOT NULL,
  `KorisnickoIme` varchar(50) NOT NULL,
  `Lozinka` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klijent`
--

INSERT INTO `klijent` (`IdKlijenta`, `ImePrezime`, `KorisnickoIme`, `Lozinka`) VALUES
(1, 'Mika Mikic', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `IdRezervacije` int(11) NOT NULL,
  `Aranzman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`IdRezervacije`, `Aranzman`) VALUES
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aranzmani`
--
ALTER TABLE `aranzmani`
  ADD PRIMARY KEY (`IdAranzmana`);

--
-- Indexes for table `klijent`
--
ALTER TABLE `klijent`
  ADD PRIMARY KEY (`IdKlijenta`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`IdRezervacije`),
  ADD KEY `Rez` (`Aranzman`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `Rez` FOREIGN KEY (`Aranzman`) REFERENCES `aranzmani` (`IdAranzmana`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
