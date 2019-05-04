CREATE TABLE bonitem(
	IdItem int(11) NOT NULL,
	FOREIGN KEY(IdItem) REFERENCES item(Id),
	IdPan int(11) NOT NULL,
	FOREIGN KEY(IdPan) REFERENCES panier(Id), 
	PRIMARY KEY(IdItem, IdPan),
	Quantite int (11)
);