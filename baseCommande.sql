-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 09, 2021 at 06:37 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Base-Commande`
--

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE `Clients` (
  `Client_ID` int(11) NOT NULL,
  `Client_Nom` varchar(50) NOT NULL,
  `Client_Prenom` varchar(50) NOT NULL,
  `Client_Adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Cmd_Pdt`
--

CREATE TABLE `Cmd_Pdt` (
  `Cmd_Pdt_ID` int(11) NOT NULL,
  `Cmd_Pdt_Commande_ID` int(11) NOT NULL,
  `Cmd_Pdt_Produit_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Commandes`
--

CREATE TABLE `Commandes` (
  `Commande_ID` int(11) NOT NULL,
  `Commande_Date` date NOT NULL,
  `Commande_Client_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Produits`
--

CREATE TABLE `Produits` (
  `Produit_ID` int(11) NOT NULL,
  `Produit_Nom` varchar(255) NOT NULL,
  `Produit_Image` varchar(255) NOT NULL,
  `Produit_Prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`Client_ID`);

--
-- Indexes for table `Cmd_Pdt`
--
ALTER TABLE `Cmd_Pdt`
  ADD PRIMARY KEY (`Cmd_Pdt_ID`),
  ADD KEY `FK_Commande_ID` (`Cmd_Pdt_Commande_ID`),
  ADD KEY `FK_Produit_ID` (`Cmd_Pdt_Produit_ID`);

--
-- Indexes for table `Commandes`
--
ALTER TABLE `Commandes`
  ADD PRIMARY KEY (`Commande_ID`),
  ADD KEY `FK_Client_ID` (`Commande_Client_ID`);

--
-- Indexes for table `Produits`
--
ALTER TABLE `Produits`
  ADD PRIMARY KEY (`Produit_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `Client_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Cmd_Pdt`
--
ALTER TABLE `Cmd_Pdt`
  MODIFY `Cmd_Pdt_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Commandes`
--
ALTER TABLE `Commandes`
  MODIFY `Commande_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Produits`
--
ALTER TABLE `Produits`
  MODIFY `Produit_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cmd_Pdt`
--
ALTER TABLE `Cmd_Pdt`
  ADD CONSTRAINT `FK_Commande_ID` FOREIGN KEY (`Cmd_Pdt_Commande_ID`) REFERENCES `Commandes` (`Commande_ID`),
  ADD CONSTRAINT `FK_Produit_ID` FOREIGN KEY (`Cmd_Pdt_Produit_ID`) REFERENCES `Produits` (`Produit_ID`);

--
-- Constraints for table `Commandes`
--
ALTER TABLE `Commandes`
  ADD CONSTRAINT `FK_Client_ID` FOREIGN KEY (`Commande_Client_ID`) REFERENCES `Clients` (`Client_ID`);
