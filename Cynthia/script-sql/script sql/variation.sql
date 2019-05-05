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
-- Structure de la table `variation`
--

DROP TABLE IF EXISTS `variation`;
CREATE TABLE `variation` (
  `Id` int(11) NOT NULL,
  `Sexe` varchar(255) NOT NULL,
  `Couleur` varchar(255) NOT NULL,
  `Taille` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `variation`
--

INSERT INTO `variation` (`Id`, `Sexe`, `Couleur`, `Taille`, `Type`) VALUES
(1, 'Homme', 'Bleu', '38', 'Chaussure'),
(4, 'Unisexe', 'Rouge', 'L', 'Habits'),
(5, 'Femme', 'Jaune', '44', 'Chaussure');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `variation`
--
ALTER TABLE `variation`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `variation`
--
ALTER TABLE `variation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
