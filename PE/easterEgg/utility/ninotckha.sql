-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 05, 2023 alle 14:57
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ninotckha`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `IDUser` int(11) NOT NULL,
  `IDProdotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`IDUser`, `IDProdotto`) VALUES
(0, 0),
(0, 0),
(0, 1),
(7, 1),
(7, 1),
(7, 1),
(7, 1),
(7, 1),
(1, 7),
(1, 7),
(2, 7),
(7, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria_prod`
--

CREATE TABLE `categoria_prod` (
  `ID` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categoria_prod`
--

INSERT INTO `categoria_prod` (`ID`, `nome`) VALUES
(1, 'Spray'),
(2, 'Marker');

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `ID` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `categoria` int(11) NOT NULL,
  `prezzo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`ID`, `nome`, `descrizione`, `img`, `categoria`, `prezzo`) VALUES
(1, 'spray montana water based 300ml', '', 'https://i.ibb.co/mDK53BW/spray-montana-water-based-300-ml-24462-480-1-Photo-Room-png-Photo-Room.png', 1, 4.20),
(9, 'spray montana nitro 2g', '', 'https://i.ibb.co/F5LZwkr/spray-montana-nitro-2g-colors-500-ml-3219-480-1-Photo-Room-png-Photo-Room.png', 1, 4.20),
(10, 'spray montana pocket', '', 'https://i.ibb.co/kSccbSC/spray-montana-pocket-150-ml-3855-480-1-Photo-Room-png-Photo-Room.png', 1, 3.20),
(11, 'spray montana pro protettivo', '', 'https://i.ibb.co/kXK68NB/spray-montana-pro-protettivo-acrilico-400-ml-146066-480-1-Photo-Room-png-Photo-Room.png', 1, 4.20),
(17, 'marker grog squeezer mini 10FMP', '', 'https://i.ibb.co/mTXMDzs/square-paint-marker-grog-squeezer-mini-10-FMP-01-Photo-Room-png-Photo-Room.png', 2, 7.50),
(18, 'refill grog full metal paint', '', 'https://i.ibb.co/NNJvNzB/square-paint-refill-grog-full-metal-paint-200-FMP-01-480x480-Photo-Room-png-Photo-Room.png', 2, 7.50),
(19, 'marker grog squeezer 20FMP', '', 'https://i.ibb.co/sygND7b/download-1-Photo-Room-png-Photo-Room.png', 2, 7),
(20, 'cutter grog squeezer 30FMP', '', 'https://i.ibb.co/NTWk698/download-Photo-Room-png-Photo-Room.png', 2, 7.50),
(21, 'refill grog full metal paint', '', 'https://i.ibb.co/dgNmNKP/marker-grog-full-metal-paint-200-10108-674-1-Photo-Room-png-Photo-Room.png', 2, 12),
(22, 'molotow burner 600 ml 6 pack', '', 'https://i.ibb.co/M9bVgVZ/molotow-burner-600-ml-6-pack-7833-480-1-Photo-Room-png-Photo-Room.png', 1, 24),
(23, 'mtn94 by mister cartoon matt black', '', 'https://i.ibb.co/9qcxSdT/montana-mtn-94-ltd-ed-by-mister-cartoon-matt-black-400630-480-1-Photo-Room-png-Photo-Room.png', 1, 13),
(24, 'mtn94 by taki 183 matt black', '', 'https://i.ibb.co/6NDpBqQ/montana-mtn-94-ltd-ed-by-taki-183-matt-black-379299-480-1-Photo-Room-png-Photo-Room.png', 1, 14),
(25, 'nqb fast 6 pack', '', 'https://i.ibb.co/N6ktG9s/nbq-fast-400-ml-6-pack-389127-480-1-Photo-Room-png-Photo-Room.png', 1, 22),
(26, 'nqb fast 400ml', '', 'https://i.ibb.co/YD22C3t/nbq-fast-400-ml-377701-480-1-Photo-Room-png-Photo-Room.png', 1, 4.20),
(27, 'marker refillable grog squeezer 30FMP', '', 'https://i.ibb.co/YbvHtyw/P-Photo-Room-png-Photo-Room.png', 2, 4.20),
(28, 'Spektra SPRAY Bombolette', '', 'https://i.ibb.co/mzJCG74/Spektra-SK-SPRAY-Bombolette-Photo-Room-png-Photo-Room.png', 1, 15),
(29, 'spray montana94 400ml 6 pack', '', 'https://i.ibb.co/sHhqXsX/spray-montana-94-400-ml-6-pack-7826-480-1-Photo-Room-png-Photo-Room.png', 1, 25),
(30, 'spray montana94 400ml', '', 'https://i.ibb.co/3ffm6tC/spray-montana-94-400-ml-3235-480-1-Photo-Room-png-Photo-Room.png', 1, 4.20),
(31, 'spray montana94 hardcore 400ml', '', 'https://i.ibb.co/5rKvmx4/spray-montana-hardcore-400-ml-6-pack-13494-480-1-Photo-Room-png-Photo-Room.png', 1, 4.20),
(32, 'spray montana94 hardcore 400ml', '', 'https://i.ibb.co/87X7G2N/spray-montana-hardcore-400-ml-10075-480-1-Photo-Room-png-Photo-Room.png', 1, 4.20),
(33, 'spray montana 600ml 6 pack', '', 'https://i.ibb.co/Px3Nwzd/spray-montana-mega-600-ml-6-pack-7835-480-1-Photo-Room-png-Photo-Room.png', 1, 25),
(34, 'spray montana 600ml', '', 'https://i.ibb.co/SvtTDKX/spray-montana-mega-600-ml-3129-480-1-Photo-Room-png-Photo-Room.png', 1, 4.20),
(35, 'spray montana nitro 2g 6pack', '', 'https://i.ibb.co/4JCkPSy/spray-montana-nitro-2g-400-ml-6-pack-255346-480-1-Photo-Room-png-Photo-Room.png', 1, 25),
(36, 'spray montana 500ml nitro 2g', '', 'https://i.ibb.co/6PfqnWY/spray-montana-nitro-2g-colors-500-ml-6-pack-212911-480-1-Photo-Room-png-Photo-Room.png', 1, 4.20),

-- --------------------------------------------------------

--
-- Struttura della tabella `userdata`
--

CREATE TABLE `userdata` (
  `ID` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `userdata`
--

INSERT INTO `userdata` (`ID`, `nome`, `cognome`, `indirizzo`, `email`, `password`, `admin`) VALUES
(7, 'Mirko', 'Ragusa', 'non richiesto', 'Ragusamirko@gmail.com', '123456', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `categoria_prod`
--
ALTER TABLE `categoria_prod`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `categoria_prod`
--
ALTER TABLE `categoria_prod`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT per la tabella `userdata`
--
ALTER TABLE `userdata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
