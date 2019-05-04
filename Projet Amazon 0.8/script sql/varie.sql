CREATE TABLE varie(
	IdItem int(11) NOT NULL,
	FOREIGN KEY(IdItem) REFERENCES item(Id),
	IdVar int(11) NOT NULL,
	FOREIGN KEY(IdVar) REFERENCES variation(Id), 
	PRIMARY KEY(IdItem, IdVar)
);