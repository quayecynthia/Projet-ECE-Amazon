-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 05 mai 2019 à 16:36
-- Version du serveur :  5.7.25
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ECEAmazon`
--

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE `vendeur` (
  `Email` varchar(255) NOT NULL,
  `Pseudo` varchar(255) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Fond` varchar(255) NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`Email`, `Pseudo`, `Mdp`, `Nom`, `Prenom`, `Photo`, `Fond`, `Admin`) VALUES
('chloe.salama@gmail.com', 'chlo', 'chl', 'Salama', 'Chloé', 'chloe.png', 'maldives.jpg', 0),
('cynthia.quaye@edu.ece.fr', 'Cynaye', 'cyn', 'Quaye', 'Cynthia', 'cynthia.jpg', 'rouge.jpg', 1),
('eliedaici@gmail.com', 'elied', 'eli', 'Daici', 'Elie', 'elie.jpg', 'maldives.jpg', 0),
('ramzi.agougile@edu.ece.fr', 'Ziram', 'ram', 'Agougile', 'Ramzi', 'ramzi.jpg', 'rouge.jpg', 1),
('raphael.daici@edu.ece.fr', 'Raph', 'rap', 'Daici', 'Raphael', 'raph.png', 'paris.jpg', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`Email`);
