SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



DROP TABLE IF EXISTS acheteur;
CREATE TABLE IF NOT EXISTS acheteur (
  Nom varchar(255) NOT NULL,
  Prenom varchar(255) NOT NULL,
  Email varchar(255) NOT NULL,
  Mdp varchar(255) NOT NULL,
  Adresse1 varchar(255) NOT NULL,
  Adresse2 varchar(255) ,
  Ville varchar(255) NOT NULL,
  Code_Postal varchar(255) NOT NULL,
  Pays varchar(255) NOT NULL,
  Tel varchar(10) NOT NULL,
  Type_carte varchar(255) NOT NULL,
  Num_carte varchar(16) NOT NULL,
  Expiration_carte date NOT NULL,
  Nom_carte varchar(255) NOT NULL,
  Crypto int NOT NULL,
  IdPan int(11) NOT NULL,
  FOREIGN KEY(IdPan) REFERENCES panier(Id), 
  PRIMARY KEY (Email)

) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;


INSERT INTO acheteur (Nom, Prenom, Email, Mdp, Adresse1, Adresse2, Ville, Code_Postal, Pays, Tel, Type_carte, Num_carte, Expiration_carte, Nom_carte, Crypto, IdPan) VALUES
('Dupond', 'Jean', 'jean.dupond@edu.ece.fr', '0000', '37 quai de Grenelle', '', 'Paris', '75015', 'France', '0601010101', 'VISA', '0101020203030404', '2020-04-30', 'Jean Dupond', '789', 0);
COMMIT;
