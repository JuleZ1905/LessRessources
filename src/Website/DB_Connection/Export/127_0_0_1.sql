-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Jan 2022 um 08:19
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 7.4.23
/*
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `lessressources`
--

CREATE DATABASE IF NOT EXISTS `epiz_30590835_LessRessources` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `epiz_30590835_LessRessources`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admin`
--

CREATE TABLE `admin` (
  `pk_admin_ID` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `admin`
--

INSERT INTO `admin` (`pk_admin_ID`, `username`, `password`) VALUES
(1, 'realAdmin', 'senioradmin');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ressource`
--

CREATE TABLE `ressource` (
  `pk_ressource_ID` int(11) NOT NULL,
  `Bezeichnung` varchar(40) NOT NULL,
  `Menge` decimal(8,2) NOT NULL,
  `Einheit` varchar(20) NOT NULL,
  `von` date NOT NULL,
  `bis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `ressource`
--

INSERT INTO `ressource` (`pk_ressource_ID`, `Bezeichnung`, `Menge`, `Einheit`, `von`, `bis`) VALUES
(6, 'Strom', '123.00', 'kWh', '2021-12-29', '2021-12-31');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`pk_admin_ID`);

--
-- Indizes für die Tabelle `ressource`
--
ALTER TABLE `ressource`
  ADD PRIMARY KEY (`pk_ressource_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ressource`
--
ALTER TABLE `ressource`
  MODIFY `pk_ressource_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
