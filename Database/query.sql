-- UTENTE

-- chiedere al db l'immagine del profilo
SELECT Nome_Immagine
FROM Utente
WHERE Id_Utente=$Id_Utente;

-- chiedere al db il nome
SELECT Nome
FROM Utente
WHERE Id_Utente=$Id_Utente;

-- chiedere al db i vari badges
SELECT Livello, Top_Fan
FROM Utente
WHERE Id_Utente=$Id_Utente;

-- chiedere al db i followers
SELECT U.Nome, U.Cognome, U.Nome_Immagine, U.Livello
FROM Utente AS U JOIN Follow AS F ON U.Id_Utente=F.Id_Utente2
WHERE F.Id_Utente1=$Id_Utente;

-- chiedere al db la quantità di followers
SELECT count(*)
FROM Follow
WHERE Id_Utente1=$Id_Utente;

-- chiedere al db la bio
SELECT Bio
FROM Utente
WHERE Id_Utente=$Id_Utente;

-- chiedere al db tutte le ricette che hanno il preferito
SELECT R.Nome, R.Introduzione, R.Nome_Immagine
FROM Preferiti AS P JOIN Ricetta AS R ON P.Id_Ricetta=R.Id_Ricetta
WHERE P.Id_Utente=$Id_Utente;


-- RICERCA

--chiedere al db le ricette che hanno in uno dei vari campi la stringa ricercata



-- INTERMEDIE

-- chiedere al db le ricette che corrispondono alla categoria della pagina intermedia
-- caso pagina intermedia di primo livello (primi,secondi ecc)
SELECT Nome, Introduzione, Nome_Immagine
FROM Ricetta
WHERE Macro_Categoria='$Macro_Categoria';
-- caso pagina intermedia di secondo livello (risotti,pasta,pesce ecc)
SELECT Nome, Introduzione, Nome_Immagine
FROM Ricetta
WHERE Macro_Categoria='$Macro_Categoria' AND Categoria='$Categoria';



--RICETTA

-- chiedere al db le varie categorie
SELECT Macro_Categoria, Categoria
FROM Ricetta
WHERE Id_Ricetta=$Id_Ricetta;

-- chiedere al db il nome della ricetta
SELECT Nome
FROM Ricetta
WHERE Id_Ricetta=$Id_Ricetta;

-- chiedere al db il voto
SELECT Voto
FROM Ricetta
WHERE Id_Ricetta=$Id_Ricetta;

-- chiedere al db la quantità preferiti
SELECT count(*)
FROM Preferiti
WHERE Id_Ricetta=$Id_Ricetta;

-- chiedere al db l'immagine della ricetta
SELECT Nome_Immagine
FROM Ricetta
WHERE Id_Ricetta=$Id_Ricetta;

-- chiedere al db le varie parti del riassunto
SELECT Calorie, Dose, Costo, Difficoltà, Tempo_Preparazione
FROM Ricetta
WHERE Id_Ricetta=$Id_Ricetta;

-- chiedere al db la breve introduzione
SELECT Introduzione
FROM Ricetta
WHERE Id_Ricetta=$Id_Ricetta;

-- chiedere al db la lista di ingredienti
SELECT Ingredienti
FROM Ricetta
WHERE Id_Ricetta=$Id_Ricetta;

-- chiedere al db la lista dei passo passo
SELECT Passo_Passo
FROM Ricetta
WHERE Id_Ricetta=$Id_Ricetta;

-- chiedere al db la ricetta estesa
SELECT Preparazione
FROM Ricetta
WHERE Id_Ricetta=$Id_Ricetta;

-- chiedere al db i commenti associati a quella ricetta
SELECT U.Nome, U.Cognome, U.Nome_Immagine, C.Testo, C.Data, C.Numero_Like
FROM Commento as C JOIN Utente AS U ON C.Id_Utente=U.Id_Utente
WHERE C.Id_Ricetta=$Id_Ricetta;

-- chiedere al db le ricette legate a quella ricetta
SELECT Nome, Nome_Immagine, Introduzione
FROM Ricetta
WHERE Macro_Categoria='$Macro_Categoria' AND Categoria='$Categoria' AND Id_Ricetta<>$Id_Ricetta;



-- INDEX

-- chiedere al db delle ricette --> ritorna le ricette ordinate secondo il numero di voti ricevuti
SELECT R.Nome, R.Nome_Immagine, R.Introduzione,count(V.Voto) AS Numero_Voti
FROM Ricetta AS R JOIN Voto AS V ON R.Id_Ricetta=V.Id_Ricetta
GROUP BY R.Nome
ORDER BY Numero_Voti DESC;


-- aggiungere un commento
DROP PROCEDURE IF EXISTS Ins_Commento;

DELIMITER |
CREATE PROCEDURE Ins_Commento($Id_Utente integer, $Testo varchar(150), $Id_Ricetta integer)
BEGIN
INSERT INTO Commento(Testo,Data,Numero_Like,Id_Utente,Id_Ricetta) VALUES
($Testo,CURRENT_TIMESTAMP,0,$Id_Utente,$Id_Ricetta);
END |
DELIMITER ;

-- eliminare un commento
DROP PROCEDURE IF EXISTS Elimina_Commento;

DELIMITER |
CREATE PROCEDURE Elimina_Commento($Id_Commento integer)
BEGIN
DELETE FROM Commento
WHERE Id_Commento=$Id_Commento;
END |
DELIMITER ;

-- aggiungere un amico
DROP PROCEDURE IF EXISTS Ins_Amico;

DELIMITER |
CREATE PROCEDURE Ins_Amico($Id_Utente1 integer, $Id_Utente2 integer)
BEGIN
INSERT INTO Follow(Id_Utente1,Id_Utente2) VALUES
($Id_Utente1,$Id_Utente2);
END |
DELIMITER ;

-- eliminare un amico
DROP PROCEDURE IF EXISTS Elimina_Amico;

DELIMITER |
CREATE PROCEDURE Elimina_Amico($Id_Utente1 integer,$Id_Utente2 integer)
BEGIN
DELETE FROM Follow
WHERE Id_Utente1=$Id_Utente1 && Id_Utente2=$Id_Utente2;
END |
DELIMITER ;

-- aggiungere un utente
DROP PROCEDURE IF EXISTS Ins_Utente;

DELIMITER |
CREATE PROCEDURE Ins_Utente($Nome varchar(20),$Cognome varchar(20),$Username varchar(20),$Mail varchar(30),$Password varchar(60),$Bio varchar(250),$Like_Ricevuti integer,$Commenti_Scritti integer,$Livello tinyint,$Top_Fan boolean,$is_Admin boolean,$Nome_Immagine varchar(250),$Nome_Thumbnail varchar(250),$Descrizione_Immagine varchar(250))
BEGIN
INSERT INTO Utente(Nome,Cognome,Username,Mail,Password,Bio,Like_Ricevuti,Commenti_Scritti,Livello,Top_Fan,is_Admin,Nome_Immagine,Nome_Thumbnail,Descrizione_Immagine) VALUES
($Nome,$Cognome,$Username,$Mail,$Password,$Bio,$Like_Ricevuti,$Commenti_Scritti,$Livello,$Top_Fan,$is_Admin,$Nome_Immagine,$Nome_Thumbnail,$Descrizione_Immagine);
END |
DELIMITER ;

-- eliminare un utente
DROP PROCEDURE IF EXISTS Elimina_Utente;

DELIMITER |
CREATE PROCEDURE Elimina_Utente($Id_Utente integer)
BEGIN
DELETE FROM Utente
WHERE Id_Utente=$Id_Utente;
END |
DELIMITER ;

-- modificare la bio
DROP PROCEDURE IF EXISTS Modifica_Bio;

DELIMITER |
CREATE PROCEDURE Modifica_Bio($Id_Utente integer, $Bio varchar(250))
BEGIN
UPDATE Utente
SET Bio=$Bio
WHERE Id_Utente=$Id_Utente;
END |
DELIMITER ;