-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2021 at 07:49 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aden_bdd6`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `Client_ID` int(11) NOT NULL,
  `Client_Nom` varchar(50) NOT NULL,
  `Client_Prenom` varchar(50) NOT NULL,
  `Client_Adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`Client_ID`, `Client_Nom`, `Client_Prenom`, `Client_Adresse`) VALUES
(1, 'LOPEZ', 'Maxime', 'le Genest St Isle'),
(2, 'COULON', 'Valentin', 'Montourtier'),
(3, 'VINSONNEAU', 'Loane', 'Laval'),
(4, 'BOURDON', 'Marc Antoine', 'Laval'),
(5, 'FERRAND', 'Laurent', 'Ahuillé'),
(6, 'SABIN', 'Maxime', 'Changé');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_pdt`
--

CREATE TABLE `cmd_pdt` (
  `Cmd_Pdt_ID` int(11) NOT NULL,
  `Cmd_Pdt_Commande_ID` int(11) NOT NULL,
  `Cmd_Pdt_Produit_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_pdt`
--

INSERT INTO `cmd_pdt` (`Cmd_Pdt_ID`, `Cmd_Pdt_Commande_ID`, `Cmd_Pdt_Produit_ID`) VALUES
(1, 1, 1),
(2, 1, 4),
(4, 3, 3),
(5, 3, 1),
(6, 4, 6),
(7, 5, 3),
(8, 7, 4),
(9, 7, 1),
(10, 8, 5),
(11, 4, 5),
(12, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `Commande_ID` int(11) NOT NULL,
  `Commande_Date` date NOT NULL,
  `Commande_Client_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`Commande_ID`, `Commande_Date`, `Commande_Client_ID`) VALUES
(1, '2021-07-01', 1),
(3, '2021-07-02', 2),
(4, '2021-07-04', 3),
(5, '2021-07-20', 4),
(6, '2021-07-14', 5),
(7, '2021-07-08', 1),
(8, '2021-07-01', 6);

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `Produit_ID` int(11) NOT NULL,
  `Produit_Nom` varchar(255) NOT NULL,
  `Produit_Image` varchar(255) NOT NULL,
  `Produit_Prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`Produit_ID`, `Produit_Nom`, `Produit_Image`, `Produit_Prix`) VALUES
(1, 'iPhone 12', '', 1000),
(2, 'Imprimante', '', 250),
(3, 'Tablette tactile', '', 500),
(4, 'Ordinateur ', '', 700),
(5, 'Montre connectée', '', 300),
(6, 'Nintendo Switch', '', 300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`Client_ID`);

--
-- Indexes for table `cmd_pdt`
--
ALTER TABLE `cmd_pdt`
  ADD PRIMARY KEY (`Cmd_Pdt_ID`),
  ADD KEY `FK_Commande_ID` (`Cmd_Pdt_Commande_ID`),
  ADD KEY `FK_Produit_ID` (`Cmd_Pdt_Produit_ID`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`Commande_ID`),
  ADD KEY `FK_Client_ID` (`Commande_Client_ID`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`Produit_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `Client_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cmd_pdt`
--
ALTER TABLE `cmd_pdt`
  MODIFY `Cmd_Pdt_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `Commande_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `Produit_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cmd_pdt`
--
ALTER TABLE `cmd_pdt`
  ADD CONSTRAINT `FK_Commande_ID` FOREIGN KEY (`Cmd_Pdt_Commande_ID`) REFERENCES `commandes` (`Commande_ID`),
  ADD CONSTRAINT `FK_Produit_ID` FOREIGN KEY (`Cmd_Pdt_Produit_ID`) REFERENCES `produits` (`Produit_ID`);

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `FK_Client_ID` FOREIGN KEY (`Commande_Client_ID`) REFERENCES `clients` (`Client_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
