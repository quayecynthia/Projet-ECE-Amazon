CREATE TABLE item (
Id int(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY (Id),
Nom varchar (255) NOT NULL,
Photo varchar (255) NOT NULL,
Description varchar (255) NOT NULL,
Prix int (11) NOT NULL,
Stock int (11) NOT NULL,
Categorie varchar (255) NOT NULL,
Vendu int (11) DEFAULT 0,
IdVendeur varchar(255) NOT NULL,
FOREIGN KEY(IdVendeur) REFERENCES vendeur(Email)
);


insert into item (Id, Nom, Photo, Description, Prix, Stock, Categorie, IdVendeur)value(1, "Ballon", "ballon.png", "Cool", 15, 5, "Sport et Loisir", "cynthia.quaye@edu.ece.fr");