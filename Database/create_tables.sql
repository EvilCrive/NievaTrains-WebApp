SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS Utente;
DROP TABLE IF EXISTS Commento;
DROP TABLE IF EXISTS Ricetta;
DROP TABLE IF EXISTS Follow;
DROP TABLE IF EXISTS Likes;
DROP TABLE IF EXISTS Voto;
DROP TABLE IF EXISTS Preferiti;
DROP TABLE IF EXISTS Correlati;

SET FOREIGN_KEY_CHECKS=1;


CREATE TABLE Utente
(
Id_Utente integer auto_increment PRIMARY KEY,
Nome varchar(20) not null,
Cognome varchar(20) not null,
Username varchar(20) not null unique,
Mail varchar(30) not null unique,
Password varchar(60) not null,
Bio varchar(250) not null,
Like_Ricevuti integer default 0,
Commenti_Scritti integer default 0,
Livello tinyint,
Ranking integer,
is_Admin boolean default false,
Nome_Immagine varchar(250) not null,
Nome_Thumbnail varchar(250) not null,
Descrizione_Immagine varchar(250) not null
)ENGINE=InnoDB;


CREATE TABLE Commento
(
Id_Commento integer auto_increment PRIMARY KEY,
Testo varchar(300) not null unique,
Data datetime not null,
Numero_Like integer default 0,
FOREIGN KEY (Id_Utente) REFERENCES Utente(Id_Utente) ON DELETE CASCADE,
FOREIGN KEY (Id_Ricetta) REFERENCES Ricetta(Id_Ricetta) ON DELETE CASCADE
)ENGINE=InnoDB;


CREATE TABLE Ricetta
(
Id_Ricetta integer auto_increment PRIMARY KEY,
Macro_Categoria varchar(20) not null,
Categoria varchar(20) not null,
Nome varchar(30) not null,
Ingredienti varchar(60) not null,
Dose integer not null,
Tempo_Preparazione tinyint not null,
Difficoltà varchar(10) not null,
Passo_Passo varchar(200) not null,
Testo varchar(2000) not null,
Costo varchar(15) not null,
Calorie integer not null,
Voto double,
Nome_Immagine varchar(250) not null,
Nome_Thumbnail varchar(250) not null,
Descrizione_Immagine varchar(250) not null
)ENGINE=InnoDB;


CREATE TABLE Follow
(
Id_Utente1 integer,
Id_Utente2 integer,
PRIMARY KEY(Id_Utente1,Id_Utente2),
FOREIGN KEY (Id_Utente1) REFERENCES Utente(Id_Utente) ON DELETE CASCADE,
FOREIGN KEY (Id_Utente2) REFERENCES Utente(Id_Utente) ON DELETE CASCADE
)ENGINE=InnoDB;


CREATE TABLE Likes
(
Id_Utente integer,
Id_Commento integer,
PRIMARY KEY(Id_Utente,Id_Commento),
FOREIGN KEY (Id_Utente) REFERENCES Utente(Id_Utente) ON DELETE CASCADE,
FOREIGN KEY (Id_Commento) REFERENCES Commento(Id_Commento) ON DELETE CASCADE
)ENGINE=InnoDB;


CREATE TABLE Voto
(
Id_Utente integer,
Id_Ricetta integer,
Voto tinyint,
PRIMARY KEY(Id_Utente,Id_Ricetta),
FOREIGN KEY (Id_Utente) REFERENCES Utente(Id_Utente) ON DELETE CASCADE,
FOREIGN KEY (Id_Ricetta) REFERENCES Ricetta(Id_Ricetta) ON DELETE CASCADE
)ENGINE=InnoDB;


CREATE TABLE Preferiti
(
Id_Utente integer,
Id_Ricetta integer,
PRIMARY KEY(Id_Utente,Id_Ricetta),
FOREIGN KEY (Id_Utente) REFERENCES Utente(Id_Utente) ON DELETE CASCADE,
FOREIGN KEY (Id_Ricetta) REFERENCES Ricetta(Id_Ricetta) ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Correlati
(
Id_Ricetta integer,
Id_Ricetta_Correlata integer,
PRIMARY KEY(Id_Ricetta,Id_Ricetta_Correlata),
FOREIGN KEY(Id_Ricetta) REFERENCES Ricetta(Id_Ricetta) ON DELETE CASCADE,
FOREIGN KEY(Id_Ricetta_Correlata) REFERENCES Ricetta(Id_Ricetta) ON DELETE CASCADE
)ENGINE=InnoDB;