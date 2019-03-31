-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 29, 2019 alle 13:58
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alternanza5ci`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `appunti`
--

CREATE TABLE `appunti` (
  `id` int(11) NOT NULL,
  `titolo` varchar(250) COLLATE utf8_bin NOT NULL,
  `id_utente` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `data_pub` date NOT NULL,
  `valutazioneP` int(11) NOT NULL,
  `valutazioneN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struttura della tabella `classi`
--

CREATE TABLE `classi` (
  `id` int(11) NOT NULL,
  `anno` int(1) NOT NULL,
  `sezione` varchar(1) COLLATE utf8_bin NOT NULL,
  `indirizzo` varchar(30) COLLATE utf8_bin NOT NULL,
  `id_istituto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `classi`
--

INSERT INTO `classi` (`id`, `anno`, `sezione`, `indirizzo`, `id_istituto`) VALUES
(1, 5, 'c', 'inf', 1),
(2, 5, 'e', 'inf', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `istituti`
--

CREATE TABLE `istituti` (
  `id` int(11) NOT NULL,
  `cod_scuola` varchar(20) COLLATE utf8_bin NOT NULL,
  `nome` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `istituti`
--

INSERT INTO `istituti` (`id`, `cod_scuola`, `nome`) VALUES
(1, 'SG20578', 'ITS Dalla Chiesa'),
(2, 'SG20579', 'Sandro Pertini');

-- --------------------------------------------------------

--
-- Struttura della tabella `materie`
--

CREATE TABLE `materie` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struttura della tabella `ruolo`
--

CREATE TABLE `ruolo` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `cognome` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `passwordMD5` varchar(64) COLLATE utf8_bin NOT NULL,
  `id_ruolo` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_istituto` int(11) NOT NULL,
  `punteggio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `appunti`
--
ALTER TABLE `appunti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `classi`
--
ALTER TABLE `classi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `istituti`
--
ALTER TABLE `istituti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `materie`
--
ALTER TABLE `materie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `ruolo`
--
ALTER TABLE `ruolo`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `appunti`
--
ALTER TABLE `appunti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `classi`
--
ALTER TABLE `classi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `istituti`
--
ALTER TABLE `istituti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `materie`
--
ALTER TABLE `materie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `ruolo`
--
ALTER TABLE `ruolo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
