-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 10, 2021 at 09:47 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kupi_sebi_doniraj_drugom`
--
CREATE DATABASE IF NOT EXISTS `kupi_sebi_doniraj_drugom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kupi_sebi_doniraj_drugom`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `korisnickoime` varchar(45) NOT NULL,
  `lozinka` varchar(45) NOT NULL,
  PRIMARY KEY (`korisnickoime`),
  UNIQUE KEY `korisničko ime_UNIQUE` (`korisnickoime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`korisnickoime`, `lozinka`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `fondacija`
--

DROP TABLE IF EXISTS `fondacija`;
CREATE TABLE IF NOT EXISTS `fondacija` (
  `idFondacija` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `racun` char(20) NOT NULL,
  `opis` varchar(256) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `iznos` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`idFondacija`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fondacija`
--

INSERT INTO `fondacija` (`idFondacija`, `naziv`, `adresa`, `racun`, `opis`, `logo`, `iznos`) VALUES
(1, 'Krov nad glavom', 'Kralja Milutina 15', '221-1234567891234-12', 'Humanitarna organizacija Krov nad glavom', '/slike/krov_nad_glavom.jpg', 0),
(2, 'Budi human ', 'Krunska 13', '123-1234567891232-70', 'Humanitarna organizacija Budi human', '/slike/budi-human.png', 0),
(3, 'Pokreni zivot', 'Kralja Milutina 5', '123-1234567891232-55', 'Humanitarna organizacija Pokreni zivot', '/slike/pokreni zivot.jpg', 50000),
(4, 'Radost deci', 'Krunska 13', '123-1234567891232-55', 'Humanitarna organizacija Radost deci', '/slike/radostdeci.jpg', 75000);

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

DROP TABLE IF EXISTS `kategorija`;
CREATE TABLE IF NOT EXISTS `kategorija` (
  `IdKategorije` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) NOT NULL,
  PRIMARY KEY (`IdKategorije`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`IdKategorije`, `naziv`) VALUES
(1, 'Odeca'),
(2, 'Obuca'),
(3, 'Tehnika'),
(4, 'Knjige'),
(5, 'Za decu'),
(6, 'Za kucu');

-- --------------------------------------------------------

--
-- Table structure for table `kompanija`
--

DROP TABLE IF EXISTS `kompanija`;
CREATE TABLE IF NOT EXISTS `kompanija` (
  `PIB` char(9) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `registarskibroj` varchar(15) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `telefon` varchar(45) NOT NULL,
  `lozinka` varchar(20) NOT NULL,
  PRIMARY KEY (`PIB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kompanija`
--

INSERT INTO `kompanija` (`PIB`, `naziv`, `registarskibroj`, `adresa`, `telefon`, `lozinka`) VALUES
('123456787', 'Telenor', '56431512', 'Kralja milana 13', '0645872', 'Sifra123'),
('123456789', 'VIP', '4864684', 'Njegoseva 15', '06154551', 'Sifra123');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `idKorisnik` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `grad` varchar(45) NOT NULL,
  `telefon` varchar(45) NOT NULL,
  `korisnickoime` varchar(20) NOT NULL,
  `lozinka` varchar(20) NOT NULL,
  `pol` char(1) NOT NULL,
  PRIMARY KEY (`idKorisnik`),
  UNIQUE KEY `korisničko ime_UNIQUE` (`korisnickoime`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `ime`, `prezime`, `adresa`, `grad`, `telefon`, `korisnickoime`, `lozinka`, `pol`) VALUES
(1, 'Masa', 'Hadzi Nikolic', 'Krunska 15', 'Beograd', '064788956', 'masahn', 'Sifra123', 'z'),
(2, 'Milanka', 'Labovic', 'Beogradska 15', 'Beograd', '064878895', 'mila', 'Sifra123', 'z'),
(3, 'Nina', 'Savkic', 'Krunska 20', 'Beograd', '06457845', 'ninas', 'Sifra123', 'z'),
(4, 'Nadja', 'Milojkovic', 'Beogradska 18', 'Beograd', '06457845', 'nadjam', 'Sifra123', 'z');

-- --------------------------------------------------------

--
-- Table structure for table `licitacija`
--

DROP TABLE IF EXISTS `licitacija`;
CREATE TABLE IF NOT EXISTS `licitacija` (
  `idLicitacija` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_stvari` varchar(45) NOT NULL,
  `opis` varchar(256) NOT NULL,
  `pocetna_cena` int(11) NOT NULL,
  `trajanje` date NOT NULL,
  `slika` varchar(100) NOT NULL,
  `korisnik` varchar(50) NOT NULL,
  `Kategorija_IdKategorije` int(11) NOT NULL,
  `Fondacija_idFondacija` int(11) NOT NULL,
  `uplaceno` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLicitacija`),
  KEY `fk_Licitacija_Kategorija_idx` (`Kategorija_IdKategorije`),
  KEY `fk_Licitacija_Fondacija1_idx` (`Fondacija_idFondacija`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `licitacija`
--

INSERT INTO `licitacija` (`idLicitacija`, `naziv_stvari`, `opis`, `pocetna_cena`, `trajanje`, `slika`, `korisnik`, `Kategorija_IdKategorije`, `Fondacija_idFondacija`, `uplaceno`) VALUES
(2, 'Majica', 'Majica u veoma dobrom stanju, jednom nosena', 200, '2021-06-30', '/slike/majicaa.webp', 'masahn', 1, 2, NULL),
(3, 'Dzemper', 'Odlican dzemper za devojke', 300, '2021-06-24', '/slike/dzemper.webp', 'masahn', 1, 4, NULL),
(4, 'Laptop ', 'Polovan laptop, radi, fali space dugme', 5000, '2021-06-24', '/slike/asus-mini-laptop-500x500.jpg', 'mila', 3, 3, NULL),
(5, 'Samsung telefon', 'FaceID ne radi, star 5godina, u super stanju sa par ogrebotina', 5500, '2021-06-24', '/slike/Samsung-Galaxy-S10-5G.webp', 'mila', 3, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recenzija`
--

DROP TABLE IF EXISTS `recenzija`;
CREATE TABLE IF NOT EXISTS `recenzija` (
  `idRecenzija` int(11) NOT NULL AUTO_INCREMENT,
  `Ocena` int(11) NOT NULL,
  `Komentar` varchar(256) DEFAULT NULL,
  `Korisnik_idKorisnik` int(11) NOT NULL,
  PRIMARY KEY (`idRecenzija`),
  KEY `fk_Recenzija_Korisnik1_idx` (`Korisnik_idKorisnik`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recenzija`
--

INSERT INTO `recenzija` (`idRecenzija`, `Ocena`, `Komentar`, `Korisnik_idKorisnik`) VALUES
(1, 1, 'Korisnik nije poslao proizvod', 2),
(2, 5, 'Sve preporuke', 4);

-- --------------------------------------------------------

--
-- Table structure for table `trenutne_cene`
--

DROP TABLE IF EXISTS `trenutne_cene`;
CREATE TABLE IF NOT EXISTS `trenutne_cene` (
  `Cena` int(11) NOT NULL,
  `Licitacija_idLicitacija` int(11) NOT NULL AUTO_INCREMENT,
  `Korisnik_idKorisnik` int(11) DEFAULT NULL,
  `Licitator` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Licitacija_idLicitacija`),
  KEY `fk_Trenutne_cene_Licitacija1_idx` (`Licitacija_idLicitacija`),
  KEY `fk_Trenutne_cene_Korisnik1_idx` (`Korisnik_idKorisnik`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trenutne_cene`
--

INSERT INTO `trenutne_cene` (`Cena`, `Licitacija_idLicitacija`, `Korisnik_idKorisnik`, `Licitator`) VALUES
(200, 2, NULL, NULL),
(300, 3, NULL, NULL),
(6000, 4, 1, 'masahn'),
(5500, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uplata`
--

DROP TABLE IF EXISTS `uplata`;
CREATE TABLE IF NOT EXISTS `uplata` (
  `idUplata` int(11) NOT NULL AUTO_INCREMENT,
  `uplatilac` varchar(45) NOT NULL,
  `valuta` varchar(5) NOT NULL,
  `iznos` int(11) NOT NULL,
  `racunprimaoca` char(20) NOT NULL,
  `svrha uplate` int(11) DEFAULT NULL,
  `primalac` int(11) NOT NULL,
  PRIMARY KEY (`idUplata`),
  KEY `fk_Uplata_Licitacija1_idx` (`svrha uplate`),
  KEY `fk_Uplata_Fondacija1_idx` (`primalac`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uplata`
--

INSERT INTO `uplata` (`idUplata`, `uplatilac`, `valuta`, `iznos`, `racunprimaoca`, `svrha uplate`, `primalac`) VALUES
(1, 'VIP', 'rsd', 50000, '', NULL, 3),
(2, 'VIP', 'rsd', 75000, '', NULL, 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `licitacija`
--
ALTER TABLE `licitacija`
  ADD CONSTRAINT `fk_Licitacija_Fondacija1` FOREIGN KEY (`Fondacija_idFondacija`) REFERENCES `fondacija` (`idFondacija`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Licitacija_Kategorija` FOREIGN KEY (`Kategorija_IdKategorije`) REFERENCES `kategorija` (`IdKategorije`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recenzija`
--
ALTER TABLE `recenzija`
  ADD CONSTRAINT `fk_Recenzija_Korisnik1` FOREIGN KEY (`Korisnik_idKorisnik`) REFERENCES `korisnik` (`idKorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trenutne_cene`
--
ALTER TABLE `trenutne_cene`
  ADD CONSTRAINT `fk_Trenutne_cene_Korisnik1` FOREIGN KEY (`Korisnik_idKorisnik`) REFERENCES `korisnik` (`idKorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Trenutne_cene_Licitacija1` FOREIGN KEY (`Licitacija_idLicitacija`) REFERENCES `licitacija` (`idLicitacija`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `uplata`
--
ALTER TABLE `uplata`
  ADD CONSTRAINT `fk_Uplata_Fondacija1` FOREIGN KEY (`primalac`) REFERENCES `fondacija` (`idFondacija`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Uplata_Licitacija1` FOREIGN KEY (`svrha uplate`) REFERENCES `licitacija` (`idLicitacija`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
