-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 18 avr. 2019 à 16:10
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ECEAmazon`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Adresse1` varchar(255) NOT NULL,
  `Adresse2` varchar(255) ,
  `Ville` varchar(255) NOT NULL,
  `Code_Postal` varchar(255) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `Type_carte` varchar(255) NOT NULL,
  `Num_carte` varchar(16) NOT NULL,
  `Expiration_carte` date NOT NULL,
  `Nom_carte` varchar(255) NOT NULL,
  `Crypto` int NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`Nom`, `Prenom`, `Email`, `Adresse1`, `Adresse2`, `Ville`, `Code_Postal`, `Pays`, `Tel`, `Type_carte`, `Num_carte`, `Expiration_carte`, `Nom_carte`, `Crypto`) VALUES
('Dupond', 'Jean', 'jean.dupond@edu.ece.fr', '37 quai de Grenelle', '', 'Paris', '75015', 'France', '0601010101', 'VISA', '0101020203030404', '2020-04-30', 'Jean Dupond', '789');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
