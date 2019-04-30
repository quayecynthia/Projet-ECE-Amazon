CREATE TABLE vendeur (
Email varchar (255) NOT NULL PRIMARY KEY,
Pseudo varchar (255) NOT NULL,
Mdp varchar (255) NOT NULL,
Nom varchar (255) NOT NULL,
Prenom varchar (255) NOT NULL,
Photo varchar (255) NOT NULL,
Fond varchar (255) NOT NULL,
Admin boolean NOT NULL
);

insert into vendeur (Email, Pseudo, Mdp, Nom, Prenom, Photo, Fond, Admin)value("cynthia.quaye@edu.ece.fr", "Cynaye","cyn", "Quaye", "Cynthia", "pp", "fond", true);
insert into vendeur (Email, Pseudo, Mdp, Nom, Prenom, Photo, Fond, Admin)value("ramzi.agougile@edu.ece.fr", "Ziram","ram", "Agougile", "Ramzi", "pp", "fond", true);
insert into vendeur (Email, Pseudo, Mdp, Nom, Prenom, Photo, Fond, Admin)value("raphael.daici@edu.ece.fr", "Raph","rap", "Daici", "Raphael", "pp", "fond", true);
insert into vendeur (Email, Pseudo, Mdp, Nom, Prenom, Photo, Fond, Admin)value("kevin.kann@edu.ece.fr", "Kev","kev", "Kann", "Kevin", "pp", "fond", false);
