-- UTENTE

-- chiedere al db l'immagine del profilo



-- chiedere al db il nome
SELECT Nome
FROM Utente
WHERE Id_Utente='$Id_Utente';


-- chiedere al db i vari badges
SELECT Livello, Top_Fan
FROM Utente
WHERE Id_Utente='$Id_Utente';

-- chiedere al db i followers
SELECT Id_Utente2
FROM Follow
WHERE Id_Utente1='$Id_Utente';

-- chiedere al db la quantità di followers
SELECT count(*)
FROM Follow
WHERE Id_Utente1='$Id_Utente'

-- chiedere al db la bio
SELECT Bio
FROM Utente
WHERE Id_Utente='$Id_Utente';

-- chiedere al db tutte le ricette che hanno il preferito
SELECT Id_Ricetta
FROM Preferiti
WHERE Id_Utente='$Id_Utente';


-- RICERCA

--chiedere al db le ricette che hanno in uno dei vari campi la stringa ricercata



-- INTERMEDIE

-- chiedere al db le ricette che corrispondono alla categoria della pagina intermedia
SELECT Id_Ricetta
FROM Ricetta
WHERE Macro_Categoria='$Macro_Categoria' AND Categoria='$Categoria';



--RICETTA

-- chiedere al db le varie categorie
SELECT Macro_Categoria, Categoria
FROM Ricetta
WHERE Id_Ricetta='Id_Ricetta';

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




-- chiedere al db le varie parti del riassunto
SELECT Calorie, Dose, Costo, Difficoltà, Tempo_Preparazione
FROM Ricetta
WHERE Id_Ricetta='$Id_Ricetta';

-- chiedere al db la breve introduzione
SELECT Introduzione
FROM Ricetta
WHERE Id_Ricetta='$Id_Ricetta';

-- chiedere al db la lista di ingredienti
SELECT ingredienti
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
SELECT *
FROM Commento
WHERE Id_Ricetta='$Id_Ricetta';

-- chiedere al db le ricette legate a quella ricetta
SELECT *
FROM Correlati
WHERE Id_Ricetta='$Id_Ricetta';



-- INDEX

-- chidere al db delle ricette