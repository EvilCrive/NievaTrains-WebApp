Utenti:
	Persone interessate ai treni (Appassionati, gente che ci lavora, curiosi)
	maschi e femmine (soprattutto maschi)
	fascia di età (soprattutto da indagare)
	sito di nicchia
	Tipi di utente: Utente non registrato, Utente base, Utente esperto, Admin
Funzionalità:
	Mostrare caratteristiche treni
	Inserimento, modifica e rimozione (Commenti, Bio dell'utente)
	Social (Utenti)
	Admin
	Preferiti treni
	Ricerca (Utenti, Treni)
	Pagine create (Utente esperto)
-------------------------------------------------------------------------------------------------------------------
--HTML--
Homepage
About
Ricerca (get: categoria, stringa)
Utente (get: id_utente)
Vapore
Combustione interna
Elettrico
Maglev
Treno (get: id_treno)
Admin Panel
Login Registrazione
404

--PHP(pagine)--
Homepage
Ricerca
Utente
Vapore
Combustione interna
Elettrico
Maglev
Singolo treno
Admin Panel
Login Registrazione

--PHP(metodi)--

--JS--

--SQL--
Treno 		(id, categoria, nome, marca, descrizione, immagine, tipo, veloctià, preferiti, autore)
Commenti 	(id, testo, autore, data, id_treno, id_utente)
Utenti 		(id, nome, cognome, nome_utente, password, email, bio, is_user_type, immagine)
Preferiti 	(id_utente, id_treno)