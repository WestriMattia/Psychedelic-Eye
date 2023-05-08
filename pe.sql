-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 05, 2023 alle 02:20
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
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `foto4` varchar(255) DEFAULT NULL,
  `foto5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `foto`
--

INSERT INTO `foto` (`idFoto`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`) VALUES
(1, 'magliaNera.png', NULL, NULL, NULL, NULL),
(2, 'MagliaVerde.png', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `login`
--

CREATE TABLE `login` (
  `idUtente` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `telefono` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `login`
--

INSERT INTO `login` (`idUtente`, `email`, `password`, `nome`, `cognome`, `indirizzo`, `telefono`) VALUES
(15, 'a@a', 'a', 'a', 'a', 'a', 1),
(16, 'andreavestri2007@gmail.com', 'sdfg', 'Andrea', 'Vestri', 'Via del Gelsomino 16', 3920992083);

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
  `colore` varchar(255) DEFAULT NULL,
  `tipo` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`idProdotto`, `nome`, `prezzo`, `descrizione`, `idFoto`, `idTaglia`, `colore`, `tipo`) VALUES
(1, 'Maglietta Nera con logo', 24.99, 'Questa maglietta è realizzata al 100% in cotone di alta qualità. Disponibile in diverse taglie è il capo perfetto per ogni occasione.', 1, 1, 'Nero', 'Magliette con Logo'),
(2, 'Maglietta Verde con logo', 24.99, 'Questa maglietta è realizzata al 100% in cotone di alta qualità. Disponibile in diverse taglie è il capo perfetto per ogni occasione.', 2, 2, 'Verde', 'Magliette con Logo');

-- --------------------------------------------------------

--
-- Struttura della tabella `taglie`
--

CREATE TABLE `taglie` (
  `idTaglia` int NOT NULL,
  `xl` int DEFAULT NULL,
  `l` int DEFAULT NULL,
  `m` int DEFAULT NULL,
  `s` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `taglie`
--

INSERT INTO `taglie` (`idTaglia`, `xl`, `l`, `m`, `s`) VALUES
(1, 10, 5, 4, 7),
(2, 15, 7, 18, 2);

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
  MODIFY `idFoto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `login`
--
ALTER TABLE `login`
  MODIFY `idUtente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `idProdotto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `taglie`
--
ALTER TABLE `taglie`
  MODIFY `idTaglia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
