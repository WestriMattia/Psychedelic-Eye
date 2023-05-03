-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 04, 2023 alle 01:14
-- Versione del server: 8.0.32
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pe`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `foto`
--

CREATE TABLE `foto` (
  `idFoto` int NOT NULL,
  `foto1` blob,
  `foto2` blob,
  `foto3` blob,
  `foto4` blob,
  `foto5` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `login`
--

CREATE TABLE `login` (
  `idUtente` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `idProdotto` int NOT NULL,
  `nome` char(255) NOT NULL,
  `prezzo` float NOT NULL,
  `descrizione` varchar(255) DEFAULT NULL,
  `idFoto` int DEFAULT NULL,
  `idTaglia` int DEFAULT NULL,
  `colore` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `taglie`
--

CREATE TABLE `taglie` (
  `idTaglia` int NOT NULL,
  `xl` int DEFAULT NULL,
  `l` int DEFAULT NULL,
  `m` int DEFAULT NULL,
  `s` int DEFAULT NULL,
  `xs` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`idFoto`);

--
-- Indici per le tabelle `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idUtente`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`idProdotto`),
  ADD KEY `idFoto` (`idFoto`),
  ADD KEY `idTaglia` (`idTaglia`);

--
-- Indici per le tabelle `taglie`
--
ALTER TABLE `taglie`
  ADD PRIMARY KEY (`idTaglia`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `foto`
--
ALTER TABLE `foto`
  MODIFY `idFoto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `login`
--
ALTER TABLE `login`
  MODIFY `idUtente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `idProdotto` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `taglie`
--
ALTER TABLE `taglie`
  MODIFY `idTaglia` int NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  ADD CONSTRAINT `prodotto_ibfk_1` FOREIGN KEY (`idFoto`) REFERENCES `foto` (`idFoto`),
  ADD CONSTRAINT `prodotto_ibfk_2` FOREIGN KEY (`idTaglia`) REFERENCES `taglie` (`idTaglia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
