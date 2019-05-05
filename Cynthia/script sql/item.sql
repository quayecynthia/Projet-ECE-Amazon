-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 05 mai 2019 à 17:01
-- Version du serveur :  5.7.25
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ECEAmazon`
--

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Categorie` varchar(255) NOT NULL,
  `Vendu` int(11) DEFAULT '0',
  `IdVendeur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`Id`, `Nom`, `Photo`, `Description`, `Prix`, `Stock`, `Categorie`, `Vendu`, `IdVendeur`) VALUE
(1, 'Ballon', 'ballon.png', 'Cool', 15, 5, 'Sport et Loisir', 0, 'cynthia.quaye@edu.ece.fr');

INSERT INTO `item` (`Id`, `Nom`, `Photo`, `Description`, `Prix`, `Stock`, `Categorie`, `Vendu`, `IdVendeur`) VALUE
(2, 'Guitare ', 'guitare.jpg', 'belle gratte toute neuve', 50, 2, 'Musique', 0, 'chloe.salama@gmail.com');

INSERT INTO `item` (`Id`, `Nom`, `Photo`, `Description`, `Prix`, `Stock`, `Categorie`, `Vendu`, `IdVendeur`) VALUE
(3, 'Le rouge et le noir - Stendhal', 'rougeetnoir.jpg', 'Bonne lecture', 20, 10, 'Livres', 0, 'chloe.salama@gmail.com');

INSERT INTO `item` (`Id`, `Nom`, `Photo`, `Description`, `Prix`, `Stock`, `Categorie`, `Vendu`, `IdVendeur`) VALUE
(4, 'Chaussures moches', 'chaussures.jpg', 'en effet pas ouf', 30, 100, 'Vetement', 0, 'chloe.salama@gmail.com');

INSERT INTO `item` (`Id`, `Nom`, `Photo`, `Description`, `Prix`, `Stock`, `Categorie`, `Vendu`, `IdVendeur`) VALUE
(5, 'Alteres ', 'halteres.png', 'Pour être énorme et sec', 30, 7, 'Sport et Loisir', 0, 'chloe.salama@gmail.com');

INSERT INTO `item` (`Id`, `Nom`, `Photo`, `Description`, `Prix`, `Stock`, `Categorie`, `Vendu`, `IdVendeur`) VALUE
(6, '20 mille lieues sous les mers - Jules Vernes', '20millelieuessouslesmers.jpg', 'Un chef d\'oeuvre', 15, 40, 'Livres', 0, 'chloe.salama@gmail.com');

INSERT INTO `item` (`Id`, `Nom`, `Photo`, `Description`, `Prix`, `Stock`, `Categorie`, `Vendu`, `IdVendeur`) VALUE
(7, 'Les Miserables ', 'LesMiserables.jpg', 'Un classique', 15, 50, 'Livres', 0, 'eliedaici@gmail.com');

INSERT INTO `item` (`Id`, `Nom`, `Photo`, `Description`, `Prix`, `Stock`, `Categorie`, `Vendu`, `IdVendeur`) VALUE
(8, 'Maillot domicile adulte Olympique Lyonnais 2018/2019', 'maillotOL.jpeg', 'Maillot de la meilleure équipe de France', 60, 10, 'Sport et Loisir', 0, 'raphael.daici@edu.ece.fr');

INSERT INTO `item` (`Id`, `Nom`, `Photo`, `Description`, `Prix`, `Stock`, `Categorie`, `Vendu`, `IdVendeur`) VALUE
(9, 'Enceinte Devialet', 'enceinte.jpg', 'Meilleure sur le marché', 2500, 20, 'Musique', 0, 'eliedaici@gmail.com');

INSERT INTO `item` (`Id`, `Nom`, `Photo`, `Description`, `Prix`, `Stock`, `Categorie`, `Vendu`, `IdVendeur`) VALUE
(12, 'Pull SUPREME', 'pull.jpg', 'Très bonne qualité', 250, 5, 'Vetement', 0, 'eliedaici@gmail.com');

INSERT INTO `item` (`Id`, `Nom`, `Photo`, `Description`, `Prix`, `Stock`, `Categorie`, `Vendu`, `IdVendeur`) VALUE
(13, 'Vinyle Beatles - Abbey Road Edition', 'vinyle.jpg', 'Un album collector', 75, 10, 'Musique', 0, 'cynthia.quaye@edu.ece.fr');

INSERT INTO `item` (`Id`, `Nom`, `Photo`, `Description`, `Prix`, `Stock`, `Categorie`, `Vendu`, `IdVendeur`) VALUE
(14, 'Yeezy Boost 350 ', 'yeezy.png', 'Pour avoir du style ', 350, 5, 'Vetement', 0, 'cynthia.quaye@edu.ece.fr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdVendeur` (`IdVendeur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`IdVendeur`) REFERENCES `vendeur` (`Email`);
