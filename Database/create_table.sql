SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS Utente;
DROP TABLE IF EXISTS Commento;
DROP TABLE IF EXISTS Ricetta;
DROP TABLE IF EXISTS Follow;
DROP TABLE IF EXISTS Likes;
DROP TABLE IF EXISTS Voto;
DROP TABLE IF EXISTS Preferiti;

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
Livello tinyint default 0,
Top_Fan boolean default false,
is_Admin boolean default false,
Nome_Immagine varchar(250) not null,
Nome_Thumbnail varchar(250) not null,
Descrizione_Immagine varchar(250) not null
)ENGINE=InnoDB;

INSERT INTO Utente(Nome,Cognome,Username,Mail,Password,Bio,Like_Ricevuti,Commenti_Scritti,Livello,Top_Fan,is_Admin,Nome_Immagine,Nome_Thumbnail,Descrizione_Immagine) VALUES
('Giacomo','Poretti','Giacomino','gporetti@gmail.com','Qwerty123','Cresciuto a pane e salame! Ora che sono in pensione mi diletto nel cucinare per i miei nipotini',0,0,0,false,false,'immagine_giacomino','Giacomino','Immagine profilo di Giacomo Poretti'),
('Davide','Carlet','Davidone','dcarlet@gmail.com','asd55AS','Mi dedico alla cucina fin da piccolo e decido così di studiare in una scuola alberghiera; ora lavoro come aiuto-cuoco in un famoso ristorante',0,0,0,false,false,'immagine_davidone','Davidone','Immagine profilo di Davide Carlet'),
('Chiara','Perin','chiaraperin','cperin@gmail.com','Chiara4563','Veneziana, appassionata da sempre di dolci. Apro la mia prima pasticceria a soli 28 anni, nei successivi 10 anni il successo è tale da dover aprire altre 8 sedi in tutta Italia',0,0,0,false,false,'immagine_chiara','chiaraperin','Immagine profilo di Chiara Perin');

CREATE TABLE Ricetta
(
Id_Ricetta integer auto_increment PRIMARY KEY,
Macro_Categoria varchar(20) not null,
Categoria varchar(20) not null,
Nome varchar(30) not null,
Voto decimal(2,1) default 0,
Calorie integer not null,
Difficoltà varchar(10) not null,
Tempo_Preparazione tinyint not null,
Dose integer not null,
Costo varchar(15) not null,
Introduzione varchar(1000) not null,
Ingredienti varchar(2000) not null,
Passo_Passo varchar(2000) not null,
Preparazione varchar(4000) not null,
Nome_Immagine varchar(250) not null,
Nome_Thumbnail varchar(250) not null,
Descrizione_Immagine varchar(250) not null
)ENGINE=InnoDB;

INSERT INTO Ricetta(Macro_Categoria,Categoria,Nome,Voto,Calorie,Difficoltà,Tempo_Preparazione,Dose,Costo,Introduzione,Ingredienti,Passo_Passo,Preparazione,Nome_Immagine,Nome_Thumbnail,Descrizione_Immagine) VALUES
('Antipasti','Antipasti','Arancini di riso',0,628,'Media',60,12,'Basso','Gli arancini di riso (o arancine), vanto della cucina siciliana, sono dei piccoli timballi adatti ad essere consumati sia come spuntino che come antipasto, primo piatto o addirittura piatto unico. In Sicilia si trovano ovunque e in ogni momento, sempre caldi e fragranti nelle molte friggitorie: di città in città spesso cambiano forma e dimensioni, assumendo fattezze ovali, a pera o rotonde, a seconda del ripieno. Si possono contare circa 100 varianti: dalla più classica al ragù e al prosciutto, a quelle più originali come al pistacchio e al nero di seppia! Noi oggi vi presentiamo le due classiche intramontabili, al ragù di carne di maiale e piselli e al prosciutto e mozzarella; voi quale preferite?','Zafferano 1 bustina 
    Burro 30 g 
    Riso vialone nano 500 g 
    Sale fino 1 pizzico 
    Acqua 1,2 l 
    Caciocavallo stagionato da grattugiare 100 g 

per il ripieno al ragù
    Sale fino q.b. 
    Pepe nero q.b. 
    Cipolle ½ 
    Burro 25 g 
    Maiale macinato 100 g 
    Olio extravergine di oliva q.b. 
    Passata di pomodoro 200 ml 
    Pisellini 80 g 
    Caciocavallo fresco 50 g 
    Vino rosso 50 ml 

Per il ripieno al prosciutto
    Prosciutto cotto in una sola fetta 30 g 
    Mozzarella 60 g 

Per la pastella
    Farina 00 200 g 
    Sale fino 1 pizzico 
    Acqua 300 ml 

Per impanare e friggere
    Pangrattato q.b. 
    Olio di semi q.b. ','-Cucocere il riso, aggiungere zafferano, burro e formaggio. Lasciarlo a raffreddare completamente
-Stufare la cipolla, unire il macinato, sfumare col vino e aggiungere la passata di pomodoro
-A metà cottura aggiungere i piselli
-Preparare i ripieni (caciocavallo, prosciutto cotto, mozzarella)
-Formare gli arancini aggiungendo al riso il ragu (o il prosciutto) e il caciocavallo
-Preparare la pastella
-Friggere gli arancini
','Per preparare gli arancini di riso, iniziate lessando il riso in 1,2 l di acqua bollente salata, in modo da far si che, a cottura avvenuta, l''acqua sia stata completamente assorbita (questo permetterà all''amido di rimanere tutto in pentola e otterrete un riso molto asciutto e compatto). Fate cuocere per circa 15 minuti, poi sciogliete lo zafferano in pochissima acqua calda e unitelo al riso ormai cotto . Unite anche il burro a pezzetti.
Unite il formaggio grattugiato, mescolate bene per amalgamare il tutto, dopodiché  versate e livellate il riso su un vassoio ampio e basso e copritelo con la pellicola, per farlo rafferddare completamente, la pellicola eviterà che la superficie del riso si secchi. Lasciate riposare il riso per un paio di ore fuori dal frigorifero. 

Intanto dedicatevi al ripieno al ragù: mondate e affettate finemente la cipolla.
Fate stufare la cipolla tritata in un tegame con 2 cucchiai d’olio e il burro, poi unite la carne macinata; fatela rosolare a fuoco vivace, quindi aggiungete il vino e lasciatelo sfumare.
A questo punto aggiungete la passata di pomodoro, aggiustate di sale e di pepe a piacere e fate cuocere a fuoco lento coperto per almeno 20 minuti. A metà cottura, aggiungete i piselli (11-12) (se necessario potete aggiungere pochissima acqua calda perchè il ragù dovrà risultare ben rappreso e non liquido).

Mentre i piselli si cuociono tagliate a cubetti il caciocavallo, il prosciutto cotto e la mozzarella. Avrete così pronti tutti i ripieni.

Una volta che il riso si sarà raffreddato completamente (ci vorranno almeno un paio di ore), potrete formare gli arancini, per aiutarvi nella formazione tenete vicino una ciotola colma di acqua così da potervi inumidirvi le mani. Prelevate un paio di cucchiai di riso per volta (circa 120 gr di riso), schiacciate il mucchietto al centro del mano formando una conca e versateci all''interno un cucchiaino di ripieno al ragù, aggiungete qualche cubetto di caciocavallo.
Quindi richiudete la base dell''arancino con il riso e modellatelo dandogli una forma a punta: potete dare questa forma a tutti gli arancini farciti con il ragù. Mentre per il ripieno al prosciutto, farcite ciascun arancino (formato circa da 130 gr di riso) con dadini di prosciutto e mozzarella. Il ripieno con questo tipo di ripieno viene tradizionalmente detto "al burro"
e modellateli dandogli una forma rotonda. 

Ora che avete tutti gli arancini pronti, preparate la pastella: in una ciotola versate la farina setacciata, un pizzico di sale e l''acqua a filo. Mescolate accuratamente con una frusta per evitare che si formino grumi.
Quindi tuffate gli arancini, uno ad uno, nella pastella avendo cura di ricoprirli interamente e rotolateli nel pangrattato.
In un pentolino scaldate l''olio e portatelo alla temperatura di 170°, a quel punto friggete un arancino alla volta o massimo due per non abbassare la temperatura dell''olio: quando saranno ben dorati potrete scolarli ponendoli su un vassoio foderato con carta assorbente','antipasti_arancini_quadrato','arancini','Arancini di riso'),
('Secondi','Carne','Bollito',0,256,'Facile',15,4,'Medio','Cottura lenta, una manciata di erbe aromatiche e una scelta accurata del taglio di carne: sono questi i segreti per realizzare un prelibato bollito. Con le sue carni tenere e saporite, il bollito è un piatto tipico intramontabile della cucina casalinga italiana, generalmente accompagnato da verdure lesse, salsine aromatiche e mostarda (in particolare nelle zone lombarde). Tra le ricette più note ricordiamo il bollito alla piemontese realizzato con carni miste e servito tradizionalmente con stuzzicanti salse a base di verdure come la salsa al cren e la salsa rubra. Il bollito si prepara lessando la carne di manzo in abbondante acqua insaporita con aromi e verdure, il risultato che si ottiene è una carne molto tenera e saporita dal gusto semplice e un brodo ricco e nutriente, ottime pietanze che non possono mancare nei menù invernali. E e state cercando un''idea gustosa per utilizzare la carne lessa avanzata, provate le nostre polpette di bollito e ricotta!',
'Carne bovina per bollito 1 kg 
    Cipolle bianche ( circa 1) 120 g 
    Sedano coste 2 
    Carote (circa 1) 110 g 
    Prezzemolo 1 ciuffo 
    Timo 1 rametto 
    Alloro 3 foglie 
    Chiodi di garofano 3 
    Pepe nero in grani 4 
    Sale grosso 15 g 
    Acqua 4 litri','-Preparare la cipolla (coi chiodi di garofano) e realizzare il mazzetto aromatico (timo, prezzemolo, alloro)
-Preparare carota e sedano
-Preparare l''acqua aggiungendo le verdure preparate precedentemente e portare al bollore
-legare l''arrosto e aggiungerlo all''acqua
-Eliminare le impurtà col mestolo forato
-Controllare la cottura della carne con un forchettone
-Scolare il bollito con un mestolo forato e sgocciolarlo
-Tagliarlo a fette di 1cm circa.','Per preparare il bollito per prima cosa mondate la cipolla, steccatela infilzando i chiodi di garofano nella sua polpa. Realizzate un mazzetto aromatico con timo, prezzemolo e alloro, quindi legatelo con uno spago da cucina.
Pelate la carota, lavate e spuntate il sedano. Le verdure sono pronte, versate l’acqua in un tegame largo e dal bordo alto, immergete la carota, la cipolla, il sedano e il mazzetto aromatico. Aggiungete il sale 10 e portate al bollore. 

Intanto legate il pezzo di carne con uno spago da cucina, così che mantenga la forma in cottura. Per realizzare la legatura consigliamo di consultare la nostra scheda “Come legare l’arrosto”.
Una volta che l’acqua avrà raggiunto il bollore aggiungete la carne. Dopo qualche minuto di cottura, sulla superficie dell’acqua cominceranno ad affiorare le impurità sotto forma di schiuma: sono le proteine della carne coagulate che dovrete eliminare per mezzo di un mestolo forato (schiumarola); dopo avere eliminato tutte le impurità aggiungete i grani di pepe (che, se aggiunti in precedenza, rischiereste di eliminare con il mestolo) e abbassate il fuoco al minimo.

Il bollore deve durare circa 3 ore ed essere leggerissimo poiché se fosse violento rovinerebbe la carne sfilacciandola e rendendola stopposa; consigliamo di controllare il livello di cottura infilzando la carne con un forchettone così da controllare la consistenza. Quando il bollito sarà cotto a puntino, scolatelo con un mestolo forato, fatelo sgocciolare e poggiatelo su di un tagliere, quindi eliminate la legatura (se l’avete fatta) e tagliatelo a fette di circa 1 cm di spessore utilizzando un coltello dalla lama liscia e lunga. Disponete le fette di carne su di un piatto da portata e servitelo con verdure lesse e se gradite della mostarda.','carne_bollito_quadrato','carne bollito','Bollito di carne'),
('Dolci','Dolci','Torta tenerina',0,395,'Facile',55,8,'Medio','La torta tenerina è un dolce tipico della città di Ferrara, che grazie alla sua golosità ha conquistato tutto il paese... nessuno infatti riesce a resistere ad una fetta di questo fantastico dolce! Sarà merito della fragrante crosticina esterna o della sua consistenza fondente che si scioglie in bocca ad ogni assaggio? Noi ci siamo innamorati di entrambi, ma una cosa è certa: il suo intenso sapore di cioccolato mette d''accordo tutti! La torta tenerina è una torta con pochi ingredienti, senza lievito che ha la particolarità di rimanere bassa e umida all''interno, proprio come il nome suggerisce: nel dialetto ferrarese veniva chiamata anche "Torta Taclenta", che in italiano significa appiccicosa. Un dessert semplice da realizzare, dal successo garantito perfetto anche per festeggiare i papà e per esaltare tutto il suo sapore provate a servirlo insieme ad una delicata crema al mascarpone, sentirete che bontà.. perfetta per ogni occasione e per la festa del papà!',
	'Ingredienti per uno stampo da 23 cm di diametro
    Cioccolato fondente 200 g 
    Burro 100 g 
    Uova medie 4 
    Zucchero 150 g 
    Farina 00 50 g 

per spolverizzare
    Zucchero a velo q.b.','- Sciogliete a bagnomaria il cioccolato;
- Aggiungete il burro e mescolate;
- Separate i tuorli dagli albumi e montate questi ultimi con metà dello zucchero;
- Unite lo zucchero restante ai tuorli;
- Unite il cioccolato e burro tiepidi poi gli albumi e infine la farina;
- Burrate e infarinate uno stampo a cerniera e versate il composto;
- Cuocere in forno preriscaldato a 180° per 30-35 minuti.',
'Per preparare la torta tenerina iniziate a tritare finemente il cioccolato, poi trasferitelo in una bastardella posta in un tegame con acqua (possibilmente l''acqua non dovrebbe venire a contatto con il fondo della bastardella o pentolino in cui avete versato il cioccolato) e scioglietelo a bagnomaria, mescolando di continuo. Solo quando il cioccolato sarà già sciolto, ma non eccessivamente caldo unite il burro a pezzetti e lasciate sciogliere anche questo continuando a mescolare. Poiché l’esatta temperatura di fusione del cioccolato è intorno ai 50°, il burro va aggiunto solo quando il cioccolato è sciolto, facendo in modo che non superi il suo punto di fusione (che è di circa 32°), ed evitando quindi che si separi. Lasciate intiepidire il composto di cioccolato e burro, mescolandolo di tanto in tanto, e nel frattempo separate i tuorli dagli albumi in due ciotole differenti e capienti. A questo punto aggiungete a questi ultimi metà dello zucchero e montateli fino ad ottenere un composto fermo e spumoso.
Tenete da parte gli albumi montati a neve e versate nei tuorli la parte restante di zucchero, poi montate il tutto a velocità moderata fino ad ottenere un composto chiaro e spumoso. A questo punto con le fruste ancora in azione versate a filo il composto di cioccolato e burro ormai tiepido e continuate a sbattere fino a che non otterrete un composto uniforme. Aggiungete a questo punto gli albumi montati a neve in più riprese: aggiungete inizialmente circa 1/3 degli albumi mescolando con una spatola o con una frusta.
Incorporate poi gli albumi restanti questa volta mescolando delicatamente dal basso verso l''alto. Unite la farina a pioggia e mescolate sempre con una spatola facendo dei movimenti delicati dal basso verso l''alto fino ad ottenere un composto liscio ed uniforme. A questo punto imburrate e infarinate uno stampo a cerniera da 23 cm (così sarà più facile sformare la torta tenerina) e versate al suo interno l''impasto appena preparato. Cuocete in forno statico preriscaldato a 180° per 30-35 minuti (si sconsiglia l''utilizzo del forno ventilato che potrebbe cuocere troppo l''esterno della torta e troppo poco la parte interna).
Una volta sfornata lasciate intiepidire la vostra torta tenerina prima di sformarla e di cospargerla di zucchero a velo.','dolci_tenerina_quadrato','dolce tenerina','Torta tenerina');



CREATE TABLE Commento
(
Id_Commento integer auto_increment PRIMARY KEY,
Testo varchar(150) not null unique,
Data datetime not null,
Numero_Like integer default 0,
Id_Utente integer,
Id_Ricetta integer,
FOREIGN KEY (Id_Utente) REFERENCES Utente(Id_Utente) ON DELETE CASCADE,
FOREIGN KEY (Id_Ricetta) REFERENCES Ricetta(Id_Ricetta) ON DELETE CASCADE
)ENGINE=InnoDB;

INSERT INTO Commento(Testo,Data,Numero_Like,Id_Utente,Id_Ricetta) VALUES
('Consiglio a tutti questa ricetta semplice e buonissima',CURRENT_TIMESTAMP,0,1,3),
('Con questi arancini ho stupito tutti i miei amici xd',CURRENT_TIMESTAMP,0,3,1);


CREATE TABLE Follow
(
Id_Utente1 integer,
Id_Utente2 integer,
PRIMARY KEY(Id_Utente1,Id_Utente2),
FOREIGN KEY (Id_Utente1) REFERENCES Utente(Id_Utente) ON DELETE CASCADE,
FOREIGN KEY (Id_Utente2) REFERENCES Utente(Id_Utente) ON DELETE CASCADE
)ENGINE=InnoDB;

INSERT INTO Follow(Id_Utente1,Id_Utente2) VALUES
(1,2),
(1,3),
(2,1),
(3,1);


CREATE TABLE Likes
(
Id_Utente integer,
Id_Commento integer,
PRIMARY KEY(Id_Utente,Id_Commento),
FOREIGN KEY (Id_Utente) REFERENCES Utente(Id_Utente) ON DELETE CASCADE,
FOREIGN KEY (Id_Commento) REFERENCES Commento(Id_Commento) ON DELETE CASCADE
)ENGINE=InnoDB;

INSERT INTO Likes(Id_Utente,Id_Commento) VALUES
(2,1),
(3,1),
(1,2);


CREATE TABLE Voto
(
Id_Utente integer,
Id_Ricetta integer,
Voto tinyint,
PRIMARY KEY(Id_Utente,Id_Ricetta),
FOREIGN KEY (Id_Utente) REFERENCES Utente(Id_Utente) ON DELETE CASCADE,
FOREIGN KEY (Id_Ricetta) REFERENCES Ricetta(Id_Ricetta) ON DELETE CASCADE
)ENGINE=InnoDB;

INSERT INTO Voto(Id_Utente,Id_Ricetta,Voto) VALUES
(1,3,5),
(2,1,5),
(3,1,4);



CREATE TABLE Preferiti
(
Id_Utente integer,
Id_Ricetta integer,
PRIMARY KEY(Id_Utente,Id_Ricetta),
FOREIGN KEY (Id_Utente) REFERENCES Utente(Id_Utente) ON DELETE CASCADE,
FOREIGN KEY (Id_Ricetta) REFERENCES Ricetta(Id_Ricetta) ON DELETE CASCADE
)ENGINE=InnoDB;

INSERT INTO Preferiti(Id_Utente,Id_Ricetta) VALUES
(1,3),
(2,1),
(2,2),
(3,1);