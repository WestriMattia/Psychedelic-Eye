-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 25, 2023 alle 18:47
-- Versione del server: 10.4.25-MariaDB
-- Versione PHP: 8.1.10

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
  `idFoto` int(11) NOT NULL,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `foto4` varchar(255) DEFAULT NULL,
  `foto5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `foto`
--

INSERT INTO `foto` (`idFoto`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`) VALUES
(1, 'magliaNera.png', NULL, NULL, NULL, NULL),
(2, 'MagliaVerde.png', NULL, NULL, NULL, NULL),
(3, 'MagliaBlu.png', NULL, NULL, NULL, NULL),
(4, 'MagliaRossa.png', NULL, NULL, NULL, NULL),
(5, 'BerrettoBianco.png', NULL, NULL, NULL, NULL),
(6, 'BerrettoNero.png', NULL, NULL, NULL, NULL),
(7, 'CappelloPescatoreBianco.png', NULL, NULL, NULL, NULL),
(8, 'CappelloPescatoreNero.png', NULL, NULL, NULL, NULL),
(9, 'ZainoNero.png', NULL, NULL, NULL, NULL),
(10, 'tazzaNera.png', NULL, NULL, NULL, NULL),
(11, 'MarsupioNero.png', NULL, NULL, NULL, NULL),
(12, 'bandanaNera.png', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `login`
--

CREATE TABLE `login` (
  `idUtente` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `moderatore` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `idProdotto` int(11) NOT NULL,
  `nome` char(255) NOT NULL,
  `prezzo` float NOT NULL,
  `descrizione` varchar(255) DEFAULT NULL,
  `idFoto` int(11) DEFAULT NULL,
  `idTaglia` int(11) DEFAULT NULL,
  `colore` varchar(255) DEFAULT NULL,
  `tipo` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`idProdotto`, `nome`, `prezzo`, `descrizione`, `idFoto`, `idTaglia`, `colore`, `tipo`) VALUES
(1, 'Maglietta Nera con logo', 24.99, 'Questa maglietta è realizzata al 100% in cotone di alta qualità. Disponibile in diverse taglie è il capo perfetto per ogni occasione.', 1, 1, 'Nero', 'Magliette con Logo'),
(2, 'Maglietta Verde con logo', 24.99, 'Questa maglietta è realizzata al 100% in cotone di alta qualità. Disponibile in diverse taglie è il capo perfetto per ogni occasione.', 2, 2, 'Verde', 'Magliette con Logo'),
(3, 'Maglietta Blu con logo', 24.99, 'Questa maglietta è realizzata al 100% in cotone di alta qualità. Disponibile in diverse taglie è il capo perfetto per ogni occasione.', 3, 3, 'Verde', 'Magliette con Logo'),
(4, 'Maglietta Rossa con logo', 24.99, 'Questa maglietta è realizzata al 100% in cotone di alta qualità. Disponibile in diverse taglie è il capo perfetto per ogni occasione.', 4, 4, 'Rosso', 'Magliette con Logo'),
(5, 'Berretto Bianco con logo', 19.99, 'Un cappello di alta qualità realizzato con materiali pregiati. Confortevole da indossare e disponibile in una varietà di colori, questo cappello è un accessorio versatile che ti farà distinguere con classe.', 5, 5, 'Bianco', 'Cappello con Logo'),
(6, 'Berretto Nero con logo', 19.99, 'Un cappello di alta qualità realizzato con materiali pregiati. Confortevole da indossare e disponibile in una varietà di colori, questo cappello è un accessorio versatile che ti farà distinguere con classe.', 6, 6, 'Nero', 'Cappello con Logo'),
(7, 'Cap da Pescatore Nero', 19.99, 'Un cappello di alta qualità realizzato con materiali pregiati. Confortevole da indossare e disponibile in una varietà di colori, questo cappello è un accessorio versatile che ti farà distinguere con classe.', 7, 7, 'Bianco', 'Cappello con Logo'),
(8, 'Cap da Pescatore Nero', 19.99, 'Un cappello di alta qualità realizzato con materiali pregiati. Confortevole da indossare e disponibile in una varietà di colori, questo cappello è un accessorio versatile che ti farà distinguere con classe.', 8, 8, 'Nero', 'Cappello con Logo'),
(9, 'Zaino Nero con logo', 45.99, 'Realizzato con materiali durevoli e resistenti all usura, questo zaino è costruito per durare nel tempo. Le cuciture rinforzate e i materiali di alta qualità garantiscono una robustezza che resiste alle sollecitazioni quotidiane, mantenendo il tuo carico ', 9, 9, 'Nero', 'Zaino con logo'),
(10, 'Tazza Nera con Logo', 7.99, 'La tazza è dotata di una superficie liscia e facile da pulire, che non assorbe odori o sapori. Puoi goderti la tua bevanda preferita senza alcuna interferenza, sapendo che la tazza manterrà il suo aspetto impeccabile anche dopo un utilizzo prolungato.', 10, 10, 'Nero', 'Tazza con logo'),
(11, 'Marsupio Nero con logo', 15.99, 'La cintura regolabile garantisce una vestibilità personalizzata, adattandosi a diverse taglie e preferenze di indossamento. Puoi scegliere di indossare il marsupio intorno alla vita o sulle spalle, a seconda delle tue esigenze e dello stile che preferisci', 11, 11, 'Nero', 'Marsupio con logo'),
(12, 'Bandana nera con logo', 4.99, 'La nostra bandana è realizzata con materiali di alta qualità, garantendo durata e comfort durante l uso. La sua morbidezza e leggerezza ti permetteranno di indossarla comodamente tutto il giorno, senza compromettere il tuo stile.', 12, 12, 'Nero', 'Bandana');

-- --------------------------------------------------------

--
-- Struttura della tabella `taglie`
--

CREATE TABLE `taglie` (
  `idTaglia` int(11) NOT NULL,
  `xl` int(11) DEFAULT NULL,
  `l` int(11) DEFAULT NULL,
  `m` int(11) DEFAULT NULL,
  `s` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `taglie`
--

INSERT INTO `taglie` (`idTaglia`, `xl`, `l`, `m`, `s`) VALUES
(1, 10, 5, 4, 5),
(2, 15, 7, 18, 2),
(3, 12, 24, 17, 32),
(4, 34, 19, 6, 54),
(5, 23, 12, 43, 13),
(6, 21, 16, 5, 43),
(7, 17, 25, 14, 9),
(8, 22, 43, 11, 33),
(9, 14, 25, 42, 14),
(10, 11, 54, 27, 2),
(11, 24, 12, 32, 58),
(12, 18, 23, 15, 41);

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
  MODIFY `idFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `login`
--
ALTER TABLE `login`
  MODIFY `idUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `idProdotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `taglie`
--
ALTER TABLE `taglie`
  MODIFY `idTaglia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
