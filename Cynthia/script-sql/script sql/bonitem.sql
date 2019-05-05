-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 05 mai 2019 à 17:02
-- Version du serveur :  5.7.25
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ECEAmazon`
--

-- --------------------------------------------------------

--
-- Structure de la table `bonitem`
--

DROP TABLE IF EXISTS `bonitem`;
CREATE TABLE `bonitem` (
  `IdItem` int(11) NOT NULL,
  `IdPan` int(11) NOT NULL,
  `Quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bonitem`
--
ALTER TABLE `bonitem`
  ADD PRIMARY KEY (`IdItem`,`IdPan`),
  ADD KEY `IdPan` (`IdPan`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bonitem`
--
ALTER TABLE `bonitem`
  ADD CONSTRAINT `bonitem_ibfk_1` FOREIGN KEY (`IdItem`) REFERENCES `item` (`Id`),
  ADD CONSTRAINT `bonitem_ibfk_2` FOREIGN KEY (`IdPan`) REFERENCES `panier` (`Id`);
