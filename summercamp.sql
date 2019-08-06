-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Aug 2019 um 15:07
-- Server-Version: 10.1.35-MariaDB
-- PHP-Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `summercamp`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `alter`
--

CREATE TABLE `alter` (
  `aid` int(11) NOT NULL,
  `gruppe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `alter`
--

INSERT INTO `alter` (`aid`, `gruppe`) VALUES
(1, 'Kinder'),
(2, 'Jugendlicher'),
(3, 'Erwachsener'),
(4, 'Senior');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `alter_angebot`
--

CREATE TABLE `alter_angebot` (
  `A.id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `angebot`
--

CREATE TABLE `angebot` (
  `aid` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `kategorie` varchar(255) NOT NULL,
  `alter` varchar(255) NOT NULL,
  `unternehmen` varchar(255) NOT NULL,
  `standort` varchar(255) NOT NULL,
  `beschreibung` text NOT NULL,
  `vorrausetzung` text NOT NULL,
  `kontakt` varchar(255) NOT NULL,
  `regelmaesigkeit` varchar(255) NOT NULL,
  `kosten` int(11) NOT NULL,
  `zeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verifiziert` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nutzer`
--

CREATE TABLE `nutzer` (
  `nid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwort` varchar(255) NOT NULL,
  `rolle` int(5) NOT NULL,
  `verifiziert` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `nutzer`
--

INSERT INTO `nutzer` (`nid`, `name`, `email`, `passwort`, `rolle`, `verifiziert`) VALUES
(1, 'Bibo Einstein', 'duttixxl2@gmail.com', '9dcc2a73f28f511aa4a09e61f22522f8353c4d181cd2c8ea737fbe16f10bdfe3', 3, 0),
(2, 'Bibo Dolores', 'jan.trodler2002@gmail.com', '97aca31f90e01b158fbd1c32d2b49b602e09feaf61fbe4acb217dad04edd7046', 1, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zeit`
--

CREATE TABLE `zeit` (
  `zid` int(11) NOT NULL,
  `zeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zeit_angebot`
--

CREATE TABLE `zeit_angebot` (
  `zaid` int(11) NOT NULL,
  `zid` int(11) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `alter`
--
ALTER TABLE `alter`
  ADD PRIMARY KEY (`aid`);

--
-- Indizes für die Tabelle `alter_angebot`
--
ALTER TABLE `alter_angebot`
  ADD PRIMARY KEY (`A.id`);

--
-- Indizes für die Tabelle `angebot`
--
ALTER TABLE `angebot`
  ADD PRIMARY KEY (`aid`);

--
-- Indizes für die Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD PRIMARY KEY (`nid`);

--
-- Indizes für die Tabelle `zeit_angebot`
--
ALTER TABLE `zeit_angebot`
  ADD PRIMARY KEY (`zaid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `alter`
--
ALTER TABLE `alter`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `alter_angebot`
--
ALTER TABLE `alter_angebot`
  MODIFY `A.id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `angebot`
--
ALTER TABLE `angebot`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `zeit_angebot`
--
ALTER TABLE `zeit_angebot`
  MODIFY `zaid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
