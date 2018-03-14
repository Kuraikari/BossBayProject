-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Mrz 2018 um 11:09
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `boss`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userFk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `cart`
--

INSERT INTO `cart` (`id`, `userFk`) VALUES
(2, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cart_product`
--

CREATE TABLE `cart_product` (
  `productFk` int(11) NOT NULL,
  `cartFk` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `cart_product`
--

INSERT INTO `cart_product` (`productFk`, `cartFk`, `amount`) VALUES
(4, 1, 0),
(1, 1, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `categorie`
--

INSERT INTO `categorie` (`id`, `name`) VALUES
(1, 'Electronic'),
(2, 'Clothes'),
(3, 'Vehicle'),
(4, 'Accessoires');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `cartFk` int(11) NOT NULL,
  `userFk` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(64) NOT NULL,
  `description` varchar(5024) NOT NULL,
  `date` date NOT NULL,
  `userFk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `newPrice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`, `description`, `date`, `userFk`, `quantity`, `newPrice`) VALUES
(6, 'Pacman', 666, 'Download.jpg', 'SScrrrrrrumdkgnsdklgslg', '2018-02-20', 7, 0, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product_categorie`
--

CREATE TABLE `product_categorie` (
  `categorieFk` int(11) NOT NULL,
  `productFk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `product_categorie`
--

INSERT INTO `product_categorie` (`categorieFk`, `productFk`) VALUES
(4, 1),
(4, 2),
(3, 3),
(2, 4),
(1, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `userFk` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stars`
--

CREATE TABLE `stars` (
  `id` int(11) NOT NULL,
  `userFk` int(11) NOT NULL,
  `starrReview` enum('1','2','3','4','5') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `roleFk` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `cityname` varchar(64) DEFAULT NULL,
  `postcode` varchar(16) DEFAULT NULL,
  `streetname` varchar(64) DEFAULT NULL,
  `streetnumber` int(11) DEFAULT NULL,
  `telefon` int(11) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `image` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `roleFk`, `username`, `password`, `firstname`, `lastname`, `cityname`, `postcode`, `streetname`, `streetnumber`, `telefon`, `email`, `image`) VALUES
(1, 1, 'jerom.r', '$2y$10$KInv7q8OMC.dqzrrhZfBVuJhOn5zzGEOj5ijW97Sjm3Y3br1RMG6W', 'Jerom', 'Rajan', NULL, NULL, NULL, NULL, NULL, 'jeromrajan@hotmail.com', 'jerom.r.jpg'),
(2, 2, 'MuellerA', '$2y$10$KInv7q8OMC.dqzrrhZfBVuJhOn5zzGEOj5ijW97Sjm3Y3br1RMG6W', 'Alfred', 'Mueller', NULL, NULL, NULL, NULL, NULL, 'alfred.mueller@gmx.com', NULL),
(3, 2, 'Peter', '$2y$10$KInv7q8OMC.dqzrrhZfBVuJhOn5zzGEOj5ijW97Sjm3Y3br1RMG6W', 'Peter', 'Griffin', NULL, NULL, NULL, NULL, NULL, 'peter.griffin@gmail.com', NULL),
(4, 2, 'Homie', '$2y$10$KInv7q8OMC.dqzrrhZfBVuJhOn5zzGEOj5ijW97Sjm3Y3br1RMG6W', 'Homer', 'Simpson', NULL, NULL, NULL, NULL, NULL, 'homerS@gmail.com', NULL),
(5, 2, 'JeromR', '$2y$10$Z1HShuz779mCA3IPpq5WdOccIh2kjEFL/zgmB0snSPO4x3nnpBwIK', 'Jerom', 'Rajan', NULL, NULL, NULL, NULL, NULL, 'jeromrajan@hotmail.com', NULL),
(6, 2, 'FelixG', '$2y$10$/FUaya3F6ZpA27m9hFkwPOdCXXCtKAdomaEW5CwFGoSYraRMqVRry', 'Felix', 'GrÃ¼ner', 'Bern', '36068', 'Hallerstrasse', 30, 333367890, 'felix', 'FelixG.jpg'),
(7, 2, 'Kuraikari', '$2y$10$9m0.qDucMvL11T5Oh4WDWOq3wY5NeqTzvKRHUhEGImA1xKglqbQO.', 'Zian', 'Wermelinger', NULL, NULL, NULL, NULL, NULL, 'kurai.kari@gmail.com', 'Kuraikari.jpg');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userFk` (`userFk`);

--
-- Indizes für die Tabelle `cart_product`
--
ALTER TABLE `cart_product`
  ADD KEY `productFk` (`productFk`),
  ADD KEY `cartFk` (`cartFk`);

--
-- Indizes für die Tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cartFk` (`cartFk`),
  ADD KEY `userFk` (`userFk`);

--
-- Indizes für die Tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userFk` (`userFk`);

--
-- Indizes für die Tabelle `product_categorie`
--
ALTER TABLE `product_categorie`
  ADD KEY `categorieFk` (`categorieFk`),
  ADD KEY `productFk` (`productFk`);

--
-- Indizes für die Tabelle `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userFk` (`userFk`);

--
-- Indizes für die Tabelle `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userFk` (`userFk`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleFk` (`roleFk`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `stars`
--
ALTER TABLE `stars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userFk`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`cartFk`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`userFk`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`userFk`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`userFk`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `stars`
--
ALTER TABLE `stars`
  ADD CONSTRAINT `stars_ibfk_1` FOREIGN KEY (`userFk`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleFk`) REFERENCES `role` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
