-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 05 mai 2019 à 17:03
-- Version du serveur :  5.7.25
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ECEAmazon`
--

-- --------------------------------------------------------

--
-- Structure de la table `varie`
--

DROP TABLE IF EXISTS `varie`;
CREATE TABLE `varie` (
  `IdItem` int(11) NOT NULL,
  `IdVar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `varie`
--

INSERT INTO `varie` (`IdItem`, `IdVar`) VALUES
(4, 1),
(12, 4),
(14, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `varie`
--
ALTER TABLE `varie`
  ADD PRIMARY KEY (`IdItem`,`IdVar`),
  ADD KEY `IdVar` (`IdVar`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `varie`
--
ALTER TABLE `varie`
  ADD CONSTRAINT `varie_ibfk_1` FOREIGN KEY (`IdItem`) REFERENCES `item` (`Id`),
  ADD CONSTRAINT `varie_ibfk_2` FOREIGN KEY (`IdVar`) REFERENCES `variation` (`Id`);
