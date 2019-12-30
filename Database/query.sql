-- UTENTE

-- chiedere al db l'immagine del profilo
SELECT Nome_Immagine
FROM Utente
WHERE Id_Utente='$Id_Utente';

-- chiedere al db il nome
SELECT Nome
FROM Utente
WHERE Id_Utente='$Id_Utente';

-- chiedere al db i vari badges
SELECT Livello, Top_Fan
FROM Utente
WHERE Id_Utente='$Id_Utente';

-- chiedere al db i followers
SELECT U.Nome, U.Cognome, U.Nome_Immagine, U.Livello
FROM Utente AS U JOIN Follow AS F ON U.Id_Utente=F.Id_Utente2
WHERE F.Id_Utente1='$Id_Utente';

-- chiedere al db la quantità di followers
SELECT count(*)
FROM Follow
WHERE Id_Utente1='$Id_Utente'

-- chiedere al db la bio
SELECT Bio
FROM Utente
WHERE Id_Utente='$Id_Utente';

-- chiedere al db tutte le ricette che hanno il preferito
SELECT R.Nome, R.Introduzione, R.Nome_Immagine
FROM Preferiti AS P JOIN Ricetta AS R ON P.Id_Ricetta=R.Id_Ricetta
WHERE P.Id_Utente='$Id_Utente';


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
WHERE Id_Ricetta='$Id_Ricetta';

-- chiedere al db il nome della ricetta
SELECT Nome
FROM Ricetta
WHERE Id_Ricetta='$Id_Ricetta';

-- chiedere al db il voto
SELECT Voto
FROM Ricetta
WHERE Id_Ricetta='$Id_Ricetta';

-- chiedere al db la quantità preferiti
SELECT count(*)
FROM Preferiti
WHERE Id_Ricetta='$Id_Ricetta';

-- chiedere al db l'immagine della ricetta
SELECT Nome_Immagine
FROM Ricetta
WHERE Id_Ricetta='$Id_Ricetta';

-- chiedere al db le varie parti del riassunto
SELECT Calorie, Dose, Costo, Difficoltà, Tempo_Preparazione
FROM Ricetta
WHERE Id_Ricetta='$Id_Ricetta';

-- chiedere al db la breve introduzione
SELECT Introduzione
FROM Ricetta
WHERE Id_Ricetta='$Id_Ricetta';

-- chiedere al db la lista di ingredienti
SELECT Ingredienti
FROM Ricetta
WHERE Id_Ricetta='$Id_Ricetta';

-- chiedere al db la lista dei passo passo
SELECT Passo_Passo
FROM Ricetta
WHERE Id_Ricetta='$Id_Ricetta';

-- chiedere al db la ricetta estesa
SELECT Preparazione
FROM Ricetta
WHERE Id_Ricetta='$Id_Ricetta';

-- chiedere al db i commenti associati a quella ricetta
SELECT U.Nome. U.Cognome, U.Nome_Immagine, C.Testo, C.Data, C.Numero_Like
FROM Commento as C JOIN Utente AS U ON C.Id_Utente=U.Id_Utente
WHERE C.Id_Ricetta='$Id_Ricetta';

-- chiedere al db le ricette legate a quella ricetta
SELECT Nome, Nome_Immagine, Introduzione
FROM Ricetta
WHERE Macro_Categoria='$Macro_Categoria' AND Categoria='$Categoria' AND Id_Ricetta<>'$Id_Ricetta';



-- INDEX

-- chiedere al db delle ricette --> ritorna le prime 4 ricette con il maggior numero di voti
SELECT TOP 4 R.Nome, R.Nome_Immagine, R.Introduzione
FROM Ricetta AS R JOIN Voto AS V ON R.Id_Ricetta=V.Id_Ricetta
WHERE R.Nome IN
(
SELECT count(V.Voto) AS Numero_Voti, R.Nome, R.Nome_Immagine, R.Introduzione
FROM Ricetta AS R JOIN Voto AS V ON R.Id_Ricetta=V.Id_Ricetta
GROUP BY Numero_Voti
)
