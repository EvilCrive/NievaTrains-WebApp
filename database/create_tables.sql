SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS Admins;
DROP TABLE IF EXISTS Proposte;
DROP TABLE IF EXISTS Preferiti;
DROP TABLE IF EXISTS Commenti;
DROP TABLE IF EXISTS Utenti;
DROP TABLE IF EXISTS Treni;


SET FOREIGN_KEY_CHECKS=1;

CREATE TABLE Treni(
	Id_Treno integer auto_increment PRIMARY KEY,
	Id_Autore integer not null,
	Categoria varchar(50) not null,
	Nome varchar(50) not null unique,
	Costruttore varchar(50) not null,
	Tipo varchar(50) not null,
	Velocità_Max smallint not null,
	Anno_Costruzione varchar(4),
	Descrizione varchar(6000),
	Immagine varchar(50) not null
) ENGINE=InnoDB;

CREATE TABLE Utenti(
	Id_Utente integer auto_increment PRIMARY KEY,
	Nome varchar(20) not null,
	Cognome varchar(20) not null,
	Username varchar(20) not null unique,
	Mail varchar(30) not null unique,
	Password varchar(60) not null,
	Bio varchar(250) not null,
	Is_User_Type tinyint not null,
	Immagine varchar(60) not null
) ENGINE=InnoDB;

CREATE TABLE Commenti(
	Id_Commento integer auto_increment PRIMARY KEY,
	Testo varchar(500) not null,
	Data datetime not null,
	Id_Utente integer,
	Id_Treno integer,
	FOREIGN KEY (Id_Utente) REFERENCES Utenti(Id_Utente) ON DELETE CASCADE,
	FOREIGN KEY (Id_Treno) REFERENCES Treni(Id_Treno) ON DELETE CASCADE
) ENGINE=InnoDB;


CREATE TABLE Preferiti(
	Id_Utente integer,
	Id_Treno integer,
	PRIMARY KEY(Id_Utente,Id_Treno),
	FOREIGN KEY (Id_Utente) REFERENCES Utenti(Id_Utente) ON DELETE CASCADE,
	FOREIGN KEY (Id_Treno) REFERENCES Treni(Id_Treno) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE Admins(
	Id_Admin integer auto_increment PRIMARY KEY,
	User varchar(20) not null unique,
	Pin varchar(60) not null
) ENGINE=InnoDB;
