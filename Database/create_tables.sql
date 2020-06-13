SET FOREIGN_KEY_CHECKS=0;


DROP TABLE IF EXISTS Preferiti;
DROP TABLE IF EXISTS Voto;
DROP TABLE IF EXISTS Likes;
DROP TABLE IF EXISTS Follow;
DROP TABLE IF EXISTS Commento;
DROP TABLE IF EXISTS Ricetta;
DROP TABLE IF EXISTS Utente;

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
('Chiara','Perin','chiaraperin','cperin@gmail.com','Chiara4563','Veneziana, appassionata da sempre di dolci. Apro la mia prima pasticceria a soli 28 anni, nei successivi 10 anni il successo è tale da dover aprire altre 8 sedi in tutta Italia',0,0,0,false,false,'immagine_chiaraperin','chiaraperin','Immagine profilo di Chiara Perin'),
('Pippo','Franco','pippofranco','pfranco@gmail.com','Pippo123','Conduttore televisivo di fama internazionale, dedico i miei ultimi anni alla cucina',0,0,0,false,false,'immagine_pippofranco','pippofranco','Immagine profilo di Pippo Franco'),
('Giorgio','Andrea','giorgioandrea','gandrea@gmail.com','Giorgino123','Ex veterinario, ora mi diletto nel preparare ottimi piatti a mia moglie',0,0,0,false,false,'immagine_giorgioandrea','giorgioandrea','Immagine profilo di Giorgio Andrea'),
('Stefania','Rossi','stefaniarossi','srossi@gmail.com','bghH67','Cucinare non significa solo leggere una ricetta: è una questione di sensibilità, di rispetto degli ingredienti e dei tempi di preparazione',0,0,0,false,false,'immagine_stefaniarossi','stefaniarossi','Immagine profilo di Stefania Rossi'),
('Giulia','Verdi','giuliaverdi','gverdi@gmail.com','678hgDDR','Si cucina sempre pensando a qualcuno, altrimenti stai solo preparando da mangiare.',0,0,0,false,false,'immagine_giuliaverdi','giuliaverdi','Immagine profilo di Giulia Verdi'),
('Francesco','Veronese','fveronese','fveronese@gmail.com','nmk89F5','Tutto è più facile da dire in una cucina, tutto è sfumato da questa intenzione di condivisione, e l’appetito fa scorrere nuova linfa nelle cose',0,0,0,false,false,'immagine_francescoveronese','francescoveronese','Immagine profilo di Francesco Veronese'),
('Hideo','Kojima','hideokojima','hkojima@gmail.com','Lalala89','Nella vita normale, “semplicità” è sinonimo di “facile da fare “, ma quando un cuoco usa questa parola, significa “ci vuole una vita per imparare”',0,0,0,false,false,'immagine_hideokojima','hideokojima','Immagine profilo di Hideo kojima'),
('Margherita','Dal Mas','margheritadalmas','mdalmas@gmail.com','jijo5363','La fame esprime un bisogno: quello di essere saziati. La cucina, invece, eccede la sazietà, va oltre il necessario, ambisce a soddisfare il piacere',0,0,0,false,false,'immagine_margheritadalmas','margheritadalmas','Immagine profilo di Margherita Dal Mas');


CREATE TABLE Ricetta
(
Id_Ricetta integer auto_increment PRIMARY KEY,
Macro_Categoria varchar(20) not null,
Categoria varchar(20) not null,
Nome varchar(30) not null,
Voto decimal(2,1) default Null,
Calorie integer not null,
Difficoltà varchar(20) not null,
Tempo_Preparazione smallint not null,
Dose smallint not null,
Costo varchar(20) not null,
Introduzione varchar(1500) not null,
Ingredienti varchar(2000) not null,
Passo_Passo varchar(2000) not null,
Preparazione varchar(4000) not null,
Nome_Immagine varchar(250) not null,
Nome_Thumbnail varchar(250) not null,
Descrizione_Immagine varchar(250) not null
)ENGINE=InnoDB;

INSERT INTO Ricetta(Macro_Categoria,Categoria,Nome,Voto,Calorie,Difficoltà,Tempo_Preparazione,Dose,Costo,Introduzione,Ingredienti,Passo_Passo,Preparazione,Nome_Immagine,Nome_Thumbnail,Descrizione_Immagine) VALUES
('Antipasti','Antipasti','Arancini di riso',NULL,628,'Media',60,12,'Basso','Gli arancini di riso (o arancine), vanto della cucina siciliana, sono dei piccoli timballi adatti ad essere consumati sia come spuntino che come antipasto, primo piatto o addirittura piatto unico. In Sicilia si trovano ovunque e in ogni momento, sempre caldi e fragranti nelle molte friggitorie: di città in città spesso cambiano forma e dimensioni, assumendo fattezze ovali, a pera o rotonde, a seconda del ripieno. Si possono contare circa 100 varianti: dalla più classica al ragù e al prosciutto, a quelle più originali come al pistacchio e al nero di seppia! Noi oggi vi presentiamo le due classiche intramontabili, al ragù di carne di maiale e piselli e al prosciutto e mozzarella; voi quale preferite?',
	'Ingredienti per circa 12 arancini:
	-Zafferano 1 bustina 
	-Burro 30 g 
	-Riso vialone nano 500 g 
	-Sale fino 1 pizzico 
	-Acqua 1,2 l 
	-Caciocavallo stagionato da grattugiare 100 g 
	Per il ripieno al ragù:
	-Sale fino q.b. 
	-Pepe nero q.b. 
	-Cipolle ½ 
	-Burro 25 g 
	-Maiale macinato 100 g 
	-Olio extravergine d''oliva q.b. 
	-Passata di pomodoro 200 ml 
	-Pisellini 80 g 
	-Caciocavallo fresco 50 g 
	-Vino rosso 50 ml 
	Per il ripieno al prosciutto:
	-Prosciutto cotto in una sola fetta 30 g 
	-Mozzarella 60 g
	Per la pastella:
	-Farina 00 200 g 
	-Sale fino 1 pizzico 
	-Acqua 300 ml 
	Per impanare e friggere:
	-Pangrattato q.b. 
	-Olio di semi q.b.',
	'- Cucocere il riso, aggiungere zafferano, burro e formaggio. Lasciarlo a raffreddare completamente;
	- Stufare la cipolla, unire il macinato, sfumare col vino e aggiungere la passata di pomodoro;
	- A metà cottura aggiungere i piselli;
	- Preparare i ripieni (caciocavallo, prosciutto cotto, mozzarella);
	- Formare gli arancini aggiungendo al riso il ragu (o il prosciutto) e il caciocavallo;
	- Preparare la pastella;
	- Friggere gli arancini.',
'Per preparare gli arancini di riso, iniziate lessando il riso in 1,2 l di acqua bollente salata, in modo da far si che, a cottura avvenuta, l''acqua sia stata completamente assorbita (questo permetterà all''amido di rimanere tutto in pentola e otterrete un riso molto asciutto e compatto). Fate cuocere per circa 15 minuti, poi sciogliete lo zafferano in pochissima acqua calda e unitelo al riso ormai cotto . Unite anche il burro a pezzetti.
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
In un pentolino scaldate l''olio e portatelo alla temperatura di 170°, a quel punto friggete un arancino alla volta o massimo due per non abbassare la temperatura dell''olio: quando saranno ben dorati potrete scolarli ponendoli su un vassoio foderato con carta assorbente',
'antipasti_arancini_quadrato','Arancini di riso','Arancini di riso'),
('Secondi','Carne','Bollito',NULL,256,'Facile',15,4,'Medio',
'Cottura lenta, una manciata di erbe aromatiche e una scelta accurata del taglio di carne: sono questi i segreti per realizzare un prelibato bollito. Con le sue carni tenere e saporite, il bollito è un piatto tipico intramontabile della cucina casalinga italiana, generalmente accompagnato da verdure lesse, salsine aromatiche e mostarda (in particolare nelle zone lombarde). Tra le ricette più note ricordiamo il bollito alla piemontese realizzato con carni miste e servito tradizionalmente con stuzzicanti salse a base di verdure come la salsa al cren e la salsa rubra. Il bollito si prepara lessando la carne di manzo in abbondante acqua insaporita con aromi e verdure, il risultato che si ottiene è una carne molto tenera e saporita dal gusto semplice e un brodo ricco e nutriente, ottime pietanze che non possono mancare nei menù invernali. E e state cercando un''idea gustosa per utilizzare la carne lessa avanzata, provate le nostre polpette di bollito e ricotta!',
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
Acqua 4 l',
'- Preparare la cipolla (coi chiodi di garofano) e realizzare il mazzetto aromatico (timo, prezzemolo, alloro);
- Preparare carota e sedano;
- Preparare l''acqua aggiungendo le verdure preparate precedentemente e portare al bollore;
- legare l''arrosto e aggiungerlo all''acqua;
- Eliminare le impurtà col mestolo forato;
- Controllare la cottura della carne con un forchettone;
- Scolare il bollito con un mestolo forato e sgocciolarlo;
- Tagliarlo a fette di 1cm circa.',
'Per preparare il bollito per prima cosa mondate la cipolla, steccatela infilzando i chiodi di garofano nella sua polpa. Realizzate un mazzetto aromatico con timo, prezzemolo e alloro, quindi legatelo con uno spago da cucina.
Pelate la carota, lavate e spuntate il sedano. Le verdure sono pronte, versate l’acqua in un tegame largo e dal bordo alto, immergete la carota, la cipolla, il sedano e il mazzetto aromatico. Aggiungete il sale 10 e portate al bollore. 

Intanto legate il pezzo di carne con uno spago da cucina, così che mantenga la forma in cottura. Per realizzare la legatura consigliamo di consultare la nostra scheda “Come legare l’arrosto”.
Una volta che l’acqua avrà raggiunto il bollore aggiungete la carne. Dopo qualche minuto di cottura, sulla superficie dell’acqua cominceranno ad affiorare le impurità sotto forma di schiuma: sono le proteine della carne coagulate che dovrete eliminare per mezzo di un mestolo forato (schiumarola); dopo avere eliminato tutte le impurità aggiungete i grani di pepe (che, se aggiunti in precedenza, rischiereste di eliminare con il mestolo) e abbassate il fuoco al minimo.

Il bollore deve durare circa 3 ore ed essere leggerissimo poiché se fosse violento rovinerebbe la carne sfilacciandola e rendendola stopposa; consigliamo di controllare il livello di cottura infilzando la carne con un forchettone così da controllare la consistenza. Quando il bollito sarà cotto a puntino, scolatelo con un mestolo forato, fatelo sgocciolare e poggiatelo su di un tagliere, quindi eliminate la legatura (se l’avete fatta) e tagliatelo a fette di circa 1 cm di spessore utilizzando un coltello dalla lama liscia e lunga. Disponete le fette di carne su di un piatto da portata e servitelo con verdure lesse e se gradite della mostarda.',
'carne_bollito_quadrato','Bollito di carne','Bollito di carne'),
('Dolci','Dolci','Torta tenerina',NULL,395,'Facile',55,8,'Medio',
'La torta tenerina è un dolce tipico della città di Ferrara, che grazie alla sua golosità ha conquistato tutto il paese... nessuno infatti riesce a resistere ad una fetta di questo fantastico dolce! Sarà merito della fragrante crosticina esterna o della sua consistenza fondente che si scioglie in bocca ad ogni assaggio? Noi ci siamo innamorati di entrambi, ma una cosa è certa: il suo intenso sapore di cioccolato mette d''accordo tutti! La torta tenerina è una torta con pochi ingredienti, senza lievito che ha la particolarità di rimanere bassa e umida all''interno, proprio come il nome suggerisce: nel dialetto ferrarese veniva chiamata anche "Torta Taclenta", che in italiano significa appiccicosa. Un dessert semplice da realizzare, dal successo garantito perfetto anche per festeggiare i papà e per esaltare tutto il suo sapore provate a servirlo insieme ad una delicata crema al mascarpone, sentirete che bontà.. perfetta per ogni occasione e per la festa del papà!',
'Ingredienti per uno stampo da 23 cm di diametro
Cioccolato fondente 200 g 
Burro 100 g 
Uova medie 4 
Zucchero 150 g 
Farina 00 50 g 
Per spolverizzare
Zucchero a velo q.b.',
'- Sciogliete a bagnomaria il cioccolato;
- Aggiungete il burro e mescolate;
- Separate i tuorli dagli albumi e montate questi ultimi con metà dello zucchero;
- Unite lo zucchero restante ai tuorli;
- Unite il cioccolato e burro tiepidi poi gli albumi e infine la farina;
- Burrate e infarinate uno stampo a cerniera e versate il composto;
- Cuocere in forno preriscaldato a 180° per 30-35 minuti.',
'Per preparare la torta tenerina iniziate a tritare finemente il cioccolato, poi trasferitelo in una bastardella posta in un tegame con acqua (possibilmente l''acqua non dovrebbe venire a contatto con il fondo della bastardella o pentolino in cui avete versato il cioccolato) e scioglietelo a bagnomaria, mescolando di continuo. Solo quando il cioccolato sarà già sciolto, ma non eccessivamente caldo unite il burro a pezzetti e lasciate sciogliere anche questo continuando a mescolare. Poiché l’esatta temperatura di fusione del cioccolato è intorno ai 50°, il burro va aggiunto solo quando il cioccolato è sciolto, facendo in modo che non superi il suo punto di fusione (che è di circa 32°), ed evitando quindi che si separi. Lasciate intiepidire il composto di cioccolato e burro, mescolandolo di tanto in tanto, e nel frattempo separate i tuorli dagli albumi in due ciotole differenti e capienti. A questo punto aggiungete a questi ultimi metà dello zucchero e montateli fino ad ottenere un composto fermo e spumoso.
Tenete da parte gli albumi montati a neve e versate nei tuorli la parte restante di zucchero, poi montate il tutto a velocità moderata fino ad ottenere un composto chiaro e spumoso. A questo punto con le fruste ancora in azione versate a filo il composto di cioccolato e burro ormai tiepido e continuate a sbattere fino a che non otterrete un composto uniforme. Aggiungete a questo punto gli albumi montati a neve in più riprese: aggiungete inizialmente circa 1/3 degli albumi mescolando con una spatola o con una frusta.
Incorporate poi gli albumi restanti questa volta mescolando delicatamente dal basso verso l''alto. Unite la farina a pioggia e mescolate sempre con una spatola facendo dei movimenti delicati dal basso verso l''alto fino ad ottenere un composto liscio ed uniforme. A questo punto imburrate e infarinate uno stampo a cerniera da 23 cm (così sarà più facile sformare la torta tenerina) e versate al suo interno l''impasto appena preparato. Cuocete in forno statico preriscaldato a 180° per 30-35 minuti (si sconsiglia l''utilizzo del forno ventilato che potrebbe cuocere troppo l''esterno della torta e troppo poco la parte interna).
Una volta sfornata lasciate intiepidire la vostra torta tenerina prima di sformarla e di cospargerla di zucchero a velo.',
'dolci_tenerina_quadrato','Torta tenerina','Torta tenerina'),
('Antipasti','Antipasti','Crocchette di patate',NULL,440,'Facile',75,30,'Molto basso',
'Le crocchette di patate sono antipasti sfiziosi senza tempo, peccati di gola che ci si può concedere ogni tanto e che rientrano a pieno titolo nella grande famiglia dei finger food, protagonisti indiscussi dei buffet. Inutile dire che, una volta portate in tavola, le crocchette di patate spariscono in un lampo: con la loro panatura croccante e dorata e il ripieno morbido conquistano da sempre i palati di grandi e piccini! Come ogni grande classico della cucina, anche le crocchette hanno ispirato stuzzicanti varianti come le crocchette di patate e salmone con salsa allo yogurt, le crocchette di patate e speck o ancora le colorate crocchette di barbabietola. Le crocchette di patate sono una preparazione semplice che richiede pochi ma importanti accorgimenti, primo fra tutti la scelta delle patate: quelle rosse dalla polpa soda sono perfette per ottenere una purea asciutta che ha una resa ottimale per ogni tipo di cottura. Tutti gli altri segreti saranno svelati nella nostra ricetta di queste piccole delizie tentatrici, venite a scoprirla!',
'Per 30 crocchette
Patate rosse 1 kg 
Tuorli 30 g 
Noce moscata q.b. 
Pepe nero q.b. 
Sale fino q.b. 
Parmigiano Reggiano DOP grattugiato 100 g 
Per impanare
Uova (2 medie) 130 g 
Pangrattato q.b. 
Per friggere
Olio di semi di arachide q.b.',
'- Lessate le patate senza sbucciarle;
- Sbucciatele una volta intiepidite;
- Passatele in un uno schiacciapatate;
- Sbattete i tuorli con pepe e sale e aggiugeteli alla purea;
- Aggiungete noce moscata e formaggio grattugiato e mescolate;
- Formate le crocchette con 35 grammi di impasto ciascuna;
- Impanatele, prima nelle uova sbattute poi nel pangrattato;
- Cuocetele in abbondante olio di arachidi a 180-190 gradi.',
'Per preparare le crocchette di patate lavate le patate sotto l’acqua corrente per togliere residui di terra , ponetele a lessare in un tegame capiente versando acqua fino a coprire e senza sbucciarle: utilizzate patate il più possibile della stessa dimensione così da uniformare la cottura. Ci vorranno circa 40 minuti se le bollite oppure la metà del tempo circa con una pentola a pressione. Una volta pronte, lasciatele leggermente intiepidire (giusto quello che servirà per poterle maneggiare) e poi sbucciatele. 
Passatele in uno schiacciapatate per ottenere una purea mentre sono ancora calde ; in una ciotolina a parte sbattete i tuorli con pepe e sale (considerate che 30 g di tuorli corrispondono a 2 quelli di uova medie) e poi aggiungeteli alla purea di patate aromatizzate con la noce moscata grattugiata e insaporite con il formaggio grattugiato, mescolate con un cucchiaio per amalgamare gli ingredienti fino ad ottenere un composto morbido e asciutto. Prendete una porzione di impasto del peso di circa 35 g e formate le crocchette dando una forma a cilindo, con le due estremità leggermente schiacciate. Man mano che formate le crocchette adagiatele su un vassoio rivestito con carta da forno. Con la dose indicata otterrete circa 30 crocchette. Una volta ultimato l’impasto impanate le crocchette: preparate due ciotole rispettivamente con le due uova sbattute e l''altra con il pangrattato. Passate le crocchette prima nell’uovo e poi nel pangrattato.
Adagiate le crocchette su un vassoio rivestito con carta da forno. Una volta terminate tutte le crocchette, scaldate abbondante olio di arachidi in un tegame non troppo grande fino a raggiungere i 180-190° (si consiglia l''uso di un termometro da cucina per monitorare al meglio la temperatura) e poi tuffate all’interno 3-4 crocchette alla volta per non fare abbassare  la temperatura dell’olio. Cuocete rigirandole con una schiumarola fino a quando non saranno ben dorate su tutti i lati. Scolatele e mettetele a scolare dell’olio in eccesso su di un piatto foderato con carta assorbente. Servite le crocchette di patate ancora calde!',
'antipasti_crocchette_quadrato','Crocchette di patate','Crocchette di patate'),

('Antipasti','Antipasti','Pizzette',NULL,137,'Media',40,24,'Basso',
'Una ricetta versatile, per chi ama mettere le mani in pasta... perfetta come merenda da portare a scuola o come aperitivo rustico: l''impasto per pizza trasformato in pizzette rosse! Morbide e saporite, condite con pomodoro, origano e mozzarella; sarà una soddisfazione prepararle e un piacere gustarle ancora calde, tiepide o leggermente riscaldate! Scoprite come è semplice prepararle e mentre l''impasto delle vostre pizzette rosse sarà in lievitazione, pensate a come arricchirle o diversificare il condimento: sarà divertente realizzarle e un piacere assaggiarle tutte! E se avete amato questa ricetta perchè non provare anche le pizzelle fritte o le lingue di pizza?',
'Ingredienti per 24 pizzette rosse
Acqua a temperatura ambiente 250 g 
Farina 00 500 g 
Lievito di birra fresco 10 g 
Zucchero 12 g 
Olio extravergine d''oliva + q.b. per la ciotola 60 g 
Sale fino 15 g 
Per il condimento
Passata di pomodoro 350 g 
Mozzarella 250 g 
Sale fino 1 cucchiaino 
Pepe nero q.b. 
Olio extravergine d''oliva 2 cucchiai 
Origano 2 cucchiai',
'- Preparare l''impasto (farina, lievito, acqua, zucchero, sale, olio), mescolare e formare una sfera;
- Lasciare riposare l''impasto in un luogo adeguato;
- Preparare una ciotola col pomodoro per il condimento;
- Spolverare di farina l''impasto e stenderlo;
- Dopo aver oliato la leccarda, coppare l''impasto fino ad ottenere 24 pizzette;
- Condire le pizzette con pomodoro, mozzarella e olio;
- Infornare.',
'Per preparare le pizzette rosse come prima cosa versate la farina in una ciotola, insieme al lievito. Aggiungete poi l''acqua e mescolate con un mestolo di legno.
Unite poi lo zucchero, il sale e l''olio. Mescolate per incorporare gli ingredienti, quindi trasferite su un piano di lavoro e impastate energicamente fino a quando non risulterà liscio. 
Formate una sfera con l''impasto lavorato, oliate una ciotola ampia e trasferite l''impasto, coprite con pellicola trasparente e fate lievitare per circa 3 ore a temperatura ambiente, lontano da correnti d''aria o in forno spento con luce accesa. Terminate le ore di lievitazione ecco come risulterà il vostro impasto: avrà triplicato il suo volume.

Nel frattempo occupatevi del condimento delle pizzette: in una ciotola versate il pomodoro, condite con sale, pepe, origano e olio. Mescolate tutto con un cucchiaio e tenete da parte fino a quando dovrete utilizzarlo.

Trasferire su una spianatoia l’impasto lievitato e spolverizzate con pochissima farina; stendete con il matterello fino ad ottenere un rettangolo di circa 4 mm di spessore (17-18).

Oliate accuratamente la leccarda dove farete cuocere le pizzette. Coppate l’impasto con una coppapasta da 7,5 cm di diametro. Prelevate l''impasto in esubero, date forma sferican e fatelo riposare coperto per circa 10 minuti. Potete quindi impastare nuovamente l''esubero: otterrete in tutto 24 pizzette! Prelevatele una ad una con un tarocco e iniziate a posizionarle sulla teglia oleata.
Una volta sistemate, formate una conchetta al centro, lasciando circa 0,5 cm di bordo. Tagliate la mozzarella a dadini e condite al centro con il pomodoro e la mozzarella a dadini; irrorate con un filo d’olio e un pizzico di origano a piacere. 

Infornate le pizzette in forno statico preriscaldato a 200°: i primi 10 minuti cuocete posizionando la teglia alla base del forno; mentre i restanti 5 minuti sul ripiano più alto. Una volta cotte, sfornate le vostre pizzette rosse e servitele calde!',
'antipasti_pizzette_quadrato','Pizzette','Pizzette'),
('Secondi','Carne','Brasato al Barolo',NULL,638,'Facile',170,4,'Molto elevata',
'Quando si parla di ricette ricche e succulenti la regione del Piemonte scende in campo sfoderando dei piatti davvero magnifici. A partire dall''intramontabile vitello tonnato ai famosissimi ravioli del plin. Passando poi per ricette come la salsa verde, irresistibile compagna di bolliti e panini. E i dolci? I migliori! Il bonet o la panna cotta, la cui consistenza non smette mai di conquistare i palati golosi di tutto il mondo. E dopo questa irresistibile carrellata di golosità, che nemmeno a farlo apposta, fanno parte del patrimonio della cucina italiana, passiamo forse al top di tutte le ricette: il brasato al barolo. Un secondo piatto ricercatissimo che si prepara proprio utilizzando l''omonimo vino rosso del Piemonte. Una ricetta ricca e succulenta da dedicarsi e da regalare agli ospiti durante le occasioni speciali, e perché no, anche per le feste natalizie.',
'Manzo cappello del prete 1 kg 
Barolo (1 bottiglia) 750 ml 
Carote (circa 2 medie) 160 g 
Sedano (circa 2 coste medie) 100 g 
Cipolle dorate (circa 1 grossa) 180 g 
Aglio 1 spicchio 
Rosmarino 1 rametto 
Alloro 2 foglie 
Chiodi di garofano 3 
Pepe nero in grani 4 
Cannella in stecche 1 
Burro 15 g 
Olio extravergine d''oliva 50 g 
Sale fino q.b.',
'- Preparate un sacchettino aromatico;
- Pulite e tagliate le verdure e mondate lo spicchio d''aglio;
- Versate il tutto in una ciotola capiente insieme alla carne e coprite per intero con il vino;
- Lasciate marinare in frigo per almeno 8-12 ore;
- Mettete a rosolare del burro in una padella e aggiungete la carne;
- Cuocete tutti i lati fino a formare la crosticina;
- Cuocete poi insieme alle verdure in una padella a fuoco basso;
- Coprite fino a metà la carne con la sua marinatura e fate sobbollire per un''ora.',
'Per preparare il brasato al Barolo cominciate facendo un sacchettino aromatico. In un pezzo di garza sterile sistemate i chiodi di garofano, i grani di pepe e la cannella. Richiudete e fate un fiocchetto con dello spago da cucina. 
Poi legate anche il rosmarino e le foglie di alloro e passate alle verdure.
Pulite sedano, carota e cipolla, spuntate e tagliate a tocchetti grossi 2-3 cm, infine mondate lo spicchio d’aglio. In una ciotola abbastanza capiente versate la carne, le verdure, il sacchettino e il mazzetto odoroso. Coprite poi il 
tutto con il vino fino a coprire per intero la carne.
Poi ricoprite con la pellicola trasparente e lasciate marinare in frigorifero per almeno 8-12 ore. Trascorso il tempo scolate il tutto senza buttare via il fondo. Prendete la carne e sistematela sul tagliere, asciugatela con della carta 
assorbente.
In una padella lasciate sciogliere il burro nell’olio a fuoco medio. Non appena il fondo è ben caldo aggiungete la carne e lasciate rosolare a fuoco vivace. Rigirate su tutti i lati affinché sulla superficie si formi la crosticina.
Dopo qualche minuto trasferite la carne e il suo fondo in una pentola capiente, scaldate un attimo a fuoco medio e unite anche le verdure scolate lasciandole insaporire a fuoco più basso per circa 15 minuti.

A questo punto potrete regolare di sale e coprire fino a metà la carne con la sua marinatura. Portate a bollore e poi chiudete con il coperchio, abbassate un po’ la fiamma e lasciate sobbollire per 1 ora . Trascorso il tempo rigirate e, soltanto se dovesse servire, potrete aggiungere ancora un po’ di liquido di marinatura. Proseguite la cottura per un’altra ora. Una volto cotto il brasato toglietelo dalla pentola e mettete da parte su un piatto coprendo con il coperchio. 
Poi eliminate gli aromi. prima di frullare con il mixer ad immersione le verdure e il fondo di cottura, potrete raccogliere un po’ di liquido e tenerlo da parte. In questo modo potrete aggiungerlo al bisogno ottenendo la consistenza desiderata. Nel frattempo affettate la carne, cercando di ottenere 2-3 fette a persona e disponete nel piatto da portata; nappate le fette con la salsa. Il vostro brasato al barolo è pronto, buon appetito!',
'carne_brasato_quadrato','Brasato al Barolo','Brasato al Barolo'),
('Secondi','Carne','Polpette di carne',NULL,393,'Facile',45,6,'Medio',
'Le polpette al forno sono un secondo piatto gustoso e velocissimo da preparare: succulenti bocconcini di carne arricchiti con formaggio, uova e prezzemolo.
Le polpette al forno, con il loro sapore ricco e deciso, piaceranno davvero a tutti. Accompagnatele con un purè di patate o con una bella insalata mista!',
'Manzo macinato 400 g 
Salsiccia 200 g 
Aglio 1 spicchio 
Pane raffermo 100 g 
Pecorino da grattugiare 40 g 
Uova 2 
Prezzemolo 1 ciuffo 
Grana Padano DOP 60 g 
Sale fino q.b. 
Pepe nero q.b. 
Olio extravergine d''oliva 2 cucchiai',
'- Ponete il macinato e la salsiccia in una ciotola;
- Aggiungete la mollica tritata, formaggio grattuggiato, prezzemolo e aglio tritati;
- Aggiungete uova, sale e pepe e mescolate;
- Lasciate riposare in frigo per almeno mezz''ora;
- Formate delle polpette con le mani;
- Oliate una pirofila e infornate.',
'Per preparare le polpette al forno iniziate ponendo in una ciotola capiente la carne di manzo macinata e la salsiccia a pezzetti, aggiungete quindi la mollica di pane raffermo tritata finemente, i due formaggi grattugiati e il prezzemolo e l''aglio  tritati. In ultimo aggiungete le uova, aggiustate di sale e pepate a piacere. Mescolate bene il composto con un cucchiaio di legno, affinchè tutti gli ingredienti siano ben amalgamati.
Coprite con la pellicola trasparente e lasciate riposare in frigorifero per almeno mezz’ora.
Trascorso questo tempo formate con le mani delle polpette leggermente schiacciate della dimensione che preferite. Oliate leggermente una pirofila da forno e posatevi le polpette. Aggiungete un filo d’olio e infornate a forno statico preriscaldato 180°C per circa 40 minuti (il tempo di cottura dipenderà dalla dimensione delle polpette!), fino a che saranno ben dorate in superficie. Servite le polpette al forno calde!',
'carne_polpette_quadrato','Polpette di carne','Polpette di carne'),
('Dolci','Dolci','Tiramisù',NULL,544,'Facile',40,8,'Medio',
'Anticamente le nonne usavano preparare una colazione che oggi potremmo definire povera, ma che all’epoca era davvero ricchissima! Ancora oggi la ricetta è immutata, basta rompere in un bicchiere un uovo freschissimo e sbatterlo con dello zucchero e a piacere aggiungere caffè o latte caldo, per i più piccoli, e marsala o anice per i più grandicelli. Ed è proprio da questa portentosa crema che nasce la crema al mascarpone base del tiramisù. Il dolce italiano per eccellenza, quello più famoso e amato, ma soprattutto che ha dato vita a tantissime altre versioni!',
'Savoiardi 300 g 
Uova freschissime (circa 4 medie) 220 g 
Mascarpone 500 g 
Zucchero 100 g 
Caffè della moka già pronto (e zuccherato a piacere) 300 g 
Cacao amaro in polvere per la superficie q.b.',
'- Separate gli albumi dai tuorli;
- Montate i tuorli con le fruste elettriche versando metà zucchero;
- Aggiungete un po'' alla volta il mascarpone;
- Montate a neve gli albumi con il restante zucchero;
- Incorporate delicatamente gli albumi ai tuorli;
- Distribuite il primo strato di crema sulla pirofila;
- Inzuppate i savoiardi nel caffe zuccherato;
- Aggiungete i savoiardi alla pirofila;
- Continuate ad alternare crema e savoiardi fino all''ultimo strato di crema;
- Spolverate con del cacao amaro e lasciate in frigo per due ore.',
'Per preparare il tiramisù cominciate dalle uova (freschissime): quindi separate accuratamente gli albumi dai tuorli, ricordando che per montare bene gli albumi non dovranno presentare alcuna traccia di tuorlo. Poi montate i tuorli con le fruste elettriche, versando solo metà dose di zucchero. Non appena il composto sarà diventato chiaro e spumoso, e con le fruste ancora in funzione, potrete aggiungere il mascarpone, poco alla volta. Incorporato tutto il formaggio avrete ottenuto una crema densa e compatta; tenetela da parte. Pulite molto bene le fruste e passate a montare gli albumi versando il restante zucchero un po’ alla volta.
Dovrete montarli a neve ben ferma; otterrete questo risultato quando rovesciando la ciotola la massa non si muoverà. Prendete una cucchiaiata di albumi e versatela nella ciotola con i tuorli e lo zucchero e mescolate energicamente con una spatola, così stempererete il composto. Dopodiché procedete ad aggiungere la restante parte di albumi, poco alla alla volta mescolando molto delicatamente dal basso verso l''alto.
Una volta pronto, distribuite una generosa cucchiaiata di crema sul fondo di una pirofila da 30x20cm e distribuite per bene. Poi inzuppate per pochi istanti i savoiardi nel caffè freddo già zuccherato a vostro piacimento (noi abbiamo aggiunto solo 1 cucchiaino di zucchero), prima da un lato e poi dall’altro. Man mano distribuite i savoiardi imbevuti sulla crema, tutti in un verso, così da ottenere un primo strato sul quale andrete a distribuire una parte della crema al mascarpone.
Anche in questo caso dovrete livellarla accuratamente così da avere una superficie liscia. E continuate a distribuire i savoiardi imbevuti nel caffè, poi realizzate un altro strato di crema. Livellate la superficie e spolverizzatela con del cacao amaro in polvere e lasciate rassodare in frigorifero per un paio d’ore. Il vostro tiramisù è pronto per essere gustato!',
'dolci_tiramisu_quadrato','Tiramisù','Tiramisù'),
('Dolci','Dolci','Zuppa inglese',NULL,657,'Media',110,4,'Medio',
'La pasticceria è frutto di tre caratteristiche. La prima è la perfezione: la pasticceria è pura chimica. Un esempio? La torta magica, una torta che si compone di 3 strati differenti la cui magia non esisterebbe senza gli studiati equilibri. La seconda caratteristica è l''errore: dolci importantissimi come la caprese campana o la ganache francese sono nati proprio da una dimenticanza. Per finire la pasticceria è anche commistione e trasformazione di grandi classici come la Saint Honorè o il trifle, dolce inglese che probabilmente ha ispirato questa ricetta: la zuppa inglese. La zuppa inglese è un famosissimo dolce, classificato tra i prodotti di pasticceria tipici dell''Emilia Romagna e divenuto un classico italiano, con debite varianti da regione a regione. Preparare la zuppa inglese non è per niente difficile; realizzando per tempo le due basi di cui si compone, sarà facilissimo assemblarla e servirla come dessert in una giornata speciale!',
'Ingredienti (per un pan di spagna da 18 cm)
Uova (circa 2 medie) 110 g 
Farina 00 30 g 
Fecola di patate 30 g 
Zucchero 60 g 
Sale fino 1 pizzico 
Baccello di vaniglia ½ 
Per la crema pasticcera
Latte intero 400 g 
Panna fresca liquida 100 g 
Tuorli (di circa 4 uova media) 72 g 
Amido di mais (maizena) 45 g 
Zucchero 140 g 
Baccello di vaniglia 1 
Cioccolato fondente 50 g 
Per guarnire
Alchermes 100 g 
Cacao amaro in polvere q.b.',
'- Preparate il pan di spagna;
- Preparate la crema pasticcera e dividitela in due ciotole;
- Aggiungete il cioccolato in una delle due ciotole;
- Prendete 70g di pan di spagna e tagliatelo a fette verticali di un centimetro;
- Rifinitele in modo da inserirle in 4 bicchieri da 150 millilitri;
- Inzuppate il pan di spagna con l''archermes;
- Versate della crema al cioccolato e poi quella classica;
- Ripetete gli ultimi due passaggi fino a riempire i bicchieri;
- Ponete i bicchieri in frigorifero per almeno due ore;
- Spolverizzate con cacao amaro.',
'Per preparare la zuppa inglese cominciate realizzando il pan di spagna. In una ciotola versate le uova a temperatura ambiente e sbattetele con le fruste mentre versate lo zucchero un po'' alla volta. Lavorate per una decina di minuti o finché il composto non diventa chiaro e spumoso: potrete inoltre fare la prova lasciando che l''impasto tracci un segno come se scrivesse. Quindi sistemate un colino nella ciotola e versate al suo interno la farina e la fecola di patate.
Incorporate le polveri facendo movimenti delicati dal basso verso l''alto e assicurandovi che non restino residui sul fondo della ciotola. Versate l''impasto in uno stampo da 18 cm precedentemente imburrato e infarinato. Livellate la superficie aiutandovi con una leccapentole e cuocete in forno preriscaldato, in modalità statica a 160° per circa 40 minuti riponendo la leccarda sul ripiano più basso (non a contatto con la base); lasciate raffreddare e poi sfornate.
Nel frattempo occupatevi della crema pasticcera. Versate latte e panna in un pentolino, estraete i semi di vaniglia, tenendoli da parte, dal baccello e versate quest''ultimo nel pentolino. Fate scaldare lasciando sfiorare il bollore. Intanto versate la polpa di vaniglia sui tuorli aggiungete lo zucchero, sbattete rapidamente e poi setacciate l''amido di mais. Mescolate e a questo punto latte e panna dovrebbero essere caldi, quindi scartate il baccello e versate un paio di mestolate nel composto di uova per diluirlo. Dopodiché riversate nel tegame e mescolate con una frusta mentre cuocete per qualche minuto. Non appena la crema si addensa potrete spegnere la fiamma.
Dividete la crema in due ciotole e in una versate il cioccolato. Approfittate del fatto che sia ancora molto calda per aiutarvi a scioglierlo, quindi coprite entrambe le creme con la pellicola a contatto e lasciate intiepidire.
Recuperate il pan di spagna pronto e raffreddato, utilizzatene 70 g, tagliatelo a fette verticali spesse 1 cm, dopodiché rifilate affinché i pezzi possano entrare in 4 bicchieri da 150 ml di capienza. Inzuppate, non troppo, il pan di spagna con l''alchermes e procedete versando prima un po'' di crema al cioccolato e poi quella classica. Date qualche colpo sotto al bicchiere, in modo da distribuire uniformemente il tutto e poi ricominciate con gli strati di pan di spagna inzuppati e le due creme. Livellate la superficie con una spatola e ripetete per tutti gli altri bicchieri. Alla fine riponeteli in frigorifero a rassodare per almeno un paio d''ore. Spolverizzate con il cacao amaro i vostri bicchieri di zuppa inglese prima di servire e buon appetito.',
'dolci_zuppa_inglese_quadrato','Zuppa inglese','Zuppa inglese'),
('Primi','Pasta','Pasta alla gricia',NULL,600,'Facile',25,4,'Medio',
'La pasta alla gricia è uno dei piatti più famosi della cucina laziale, considerata l’antenata della pasta all''amatriciana.
In comune con la ricetta dell’amatriciana infatti c’è l’utilizzo del guanciale e del Pecorino romano. La differenza principale invece sta nel sugo di pomodoro, assente nella pasta alla gricia poiché la sua origine sarebbe addirittura antecedente all’importazione del pomodoro in Europa. Si dice la pasta alla gricia sia stata inventata dai pastori laziali, che con i pochi ingredienti che avevano a disposizione al ritorno dai pascoli preparavano un piatto così semplice ma altrettanto gustoso e sostanzioso.',
'Rigatoni 320 g 
Guanciale (già pepato) 250 g 
Pecorino romano da grattugiare 60 g 
Sale fino q.b.',
'- Fate bollire l''acqua;
- Tagliate il guanciale a fette spesse un centimetro;
- Separate l''eventuale cotenna;
- Buttate la pasta;
- Cuocetelo per una decina di minuti in una padella a fuoco medio;
- Grattugiate del pecorino;
- Aggiugengete un cucchiaio di acqua di cottura al guanciale;
- Scolate la pasta nella padella, conservando l''acqua di cottura;
- Saltate per circa un minuto e aggiungete altro pecorino;
- Aggiungete un altro cucchiaio di acqua di cottura.',
'Per preparare la pasta alla gricia come prima cosa ponete sul fuoco una pentola colma d''acqua che servirà per la cottura della pasta. A questo punto prendete il guanciale e ricavate delle fette spesse 1 cm. Poi separate la cotenna eventualmente presente (potete conservarla in frigo e riutilizzarla in altre ricette, come delle zuppe) e dalle fette ottenete delle listarelle spesse circa mezzo cm. In una padella già calda versate il guanciale, senza aggiungere altri grassi; lasciatele sfrigolare a fuoco medio per una decina di minuti finché non sarà diventato dorato e croccante, facendo attenzione a non bruciarlo. Nel frattempo l''acqua sarà arrivata a bollore, salate e cuocete la pasta; mentre la pasta cuoce grattugiate finemente il Pecorino. Quando alla pasta mancheranno 2 minuti dalla fine della cottura, rallentate la cottura del guanciale versando una mestolata d’acqua di cottura della pasta (la cottura del guanciale si bloccherà e l''amido rilasciato dalla pasta creerà una piacevole cremina). Agitate un po’ la padella per smuovere i pezzetti di guanciale.
A questo punto la pasta è cotta, scolatela direttamente nel condimento, conservando l''acqua di cottura. Saltate per circa 1 minuto, scuotendo la padella e mescolando. Poi togliete la padella dal fuoco, spolverizzate con un un terzo del Pecorino grattugiato e aggiungete ancora poca acqua di cottura al bisogno.
Mescolate e saltate ancora la pasta; noterete che si sarà creata una gustosa cremina. Potete impiattare la pasta alla gricia e guarnire ciascun piatto con il Pecorino rimasto.',
'pasta_alla_gricia_quadrato','Pasta alla gricia','Pasta alla gricia'),
('Primi','Pasta','Pasta calamarata',NULL,526,'Facile',90,4,'Elevato',
'Riconoscete questo particolare formato di pasta? Si tratta della calamarata, un formato di pasta molto comune nella cucina campana e che si presta benissimo per dei condimenti veloci e saporiti come il ragù di pesce spada. Vi state domandando se hanno qualcosa in comune con i paccheri? Beh non siete fuori strada! Infatti la calamarata, nel napoletano, è conosciuta con il nome di mezzi paccheri. Oltre ad essere un formato di pasta è però anche un condimento il cui protagonista, nemmeno a dirlo, è il calamaro. Tagliato ad anelli grossi risulta praticamente uguale al formato di pasta. Grazie al nostro modo molto originale per servire la calamarata potrebbe facilmente rappresentare un piatto delle grandi occasioni, delle feste o per sorprendere gli ospiti. Infatti il cartoccio serve a preservare i profumi che fuoriusciranno dall''involucro inebriando gli ospiti.',
'Calamarata 400 g 
Calamari 600 g 
Aglio 1 spicchio 
Peperoncino fresco 1 
Prezzemolo da tritare 2 cucchiai 
Sale q.b. 
Pepe nero q.b. 
Pomodorini ciliegino 400 g 
Triplo concentrato di pomodoro 25 g 
Vino bianco 60 g 
Olio extravergine d''oliva q.b.',
'- Pulite i calamari;
- Mettete a bollire l''acqua per la pasta;
- In una casseruola scaldare l''olio con aglio e peperoncino;
- Scottate gli anelli di calamaro nel sugo e sfumate con vino bianco;
- Togliete l''aglio e aggiungete pomodorini e concentrato di pomodoro;
- Spoleverizzate con del prezzemolo;
- Cuocete la pasta fino a metà cottura;
- Prelevate un mestolo d''acqua di cottura e versatelo nella padella;
- Scolate la calamarata e buttatela in padella;
- Incartate la pasta in un foglio di carta forno e poi in uno di alluminio;
- Infornate a 200° per dieci minuti.',
'Per preparare la calamarata cominciate dell''aglio, spellatelo e schiacciatelo con il palmo della mano. Pulite il peperoncino, privatelo dei semi e sminuzzate finemente.
Poi lavate i pomodorini, asciugateli e divideteli in 4 parti. A questo punto occupatevi della pulizia dei calamari. Vanno prima sciacquati sotto acqua corrente, poi staccate la parte interne tirando il capo. Da quest’ultimo eliminate la parte bianca con la cartilagine; dalla testa invece togliete gli occhi e spremete il becco posto al centro.
Staccate la pelle utilizzando uno spelucchino e per finire, sciacquate nuovamente, prima di tagliare ad anelli grossi circa 2 cm. Sposatevi ai fornelli; mettete a bollire in un tegame abbondante acqua da salare a bollore per poi cuocere la pasta. Quindi mettete sul fuoco una casseruola. Scaldate l''olio assieme allo spicchio d’aglio sbucciato intero e il peperoncino tritato. Non appena il fondo sarà ben caldo alzate alla temperatura e scottate gli anelli di calamaro. Quando si saranno sigillati sfumate con il vino bianco e aspettate che l’alcol sia completamente evaporato. Quindi rimuovete l’aglio, aggiungete i pomodorini e il concentrato di pomodoro. Stemperate quest’ultimo, aggiustate di sale e poi abbassate la fiamma, lasciate cuocere il tutto per una decina di minuti; a fine cottura spolverizzate con il prezzemolo tritato. Nel frattempo cuocete la pasta fino a metà cottura.
Non appena la pasta è a metà cottura prelevate un mestolo d’acqua di cottura e versatelo in padella poi scolate la calamarata e tuffatela in padella. Amalgamate pochi istanti e aggiungete acqua al bisogno affinché il composto risulti liquido ma non slegato.
Su un foglio di alluminio mettete un altro foglio ma di carta forno, adagiate nel mezzo un paio di mestolate di pasta e chiudete a caramella prima la carta forno e poi quella alluminio. Disponete i cartocci su una leccarda e cuocete in forno statico, già caldo a 200°, per circa 10 minuti. Ecco pronta la vostra calamarata, non vi resta che servirla.',
'pasta_calamarata_quadrato','Pasta calamarata','Pasta calamarata'),
('Primi','Pasta','Pasta e fagioli',NULL,748,'Molto facile',125,4,'Basso',
'La ricetta della pasta e fagioli è un classico della cucina italiana, un primo piatto dal sapore inconfondibile che affonda le radici nella tradizione rurale. Nella sua versione più rustica viene insaporita con le cotiche di maiale, come nella pasta e fagioli alla napoletana, mentre in altre varianti i legumi vengono abbinati a molluschi che conferiscono alla pietanza un intenso sapore di mare, come nei cicatielli con cozze e fagioli. Un piatto povero ed economico, quindi, ma sempre estremamente gustoso e genuino. Proprio come la nostra versione della pasta e fagioli! Abbastanza densa da "reggere il cucchiaio in piedi" e ricca di aromi, con l''immancabile nota sapida data dall''aggiunta del lardo e del prosciutto crudo. Assaggiate la nostra pasta e fagioli e vedrete che non la lascerete più!',
'Ditaloni Rigati 320 g 
Fagioli borlotti secchi 200 g 
Passata di pomodoro 250 g 
Lardo 80 g 
Prosciutto crudo 80 g 
Cipolle 30 g 
Sedano 30 g 
Carote 30 g 
Aglio 1 spicchio 
Rosmarino 3 rametti 
Alloro 2 foglie 
Olio extravergine d''oliva 10 g 
Pepe nero q.b. 
Sale fino q.b.',
'- Lasciate i fagioli in ammollo per una notte;
- Fateli bollire per 80 minuti in acqua con due foglie d''alloro;
- Fate soffriggere olio, aglio e le verdure tritate in una padella;
- Unite il prosciutto e il lardo tagliati a fettine;
- Unite i fagioli prima e la passata di pomodoro poi;
- Prendete una parte del composto e frullatela;
- Aggiungete la pasta alla padella e dell''acqua di cottura dei fagioli;
- Quando la pasta è al dente aggiungete i fagioli frullati e il rosmarino;
- Spoleverate con del pepe.',
'Per preparare la pasta e fagioli, per prima cosa lasciate i fagioli secchi in ammollo per tutta la notte. Il giorno dopo risciacquateli, trasferiteli in una pentola, copriteli con abbondante acqua fredda, aggiungete 2 foglie di alloro e lessateli per circa 80 minuti.
Nel frattempo preparate gli altri ingredienti per la ricetta: mondate e tritate finemente la cipolla, il sedano e la carota, poi tagliate il prosciutto e il lardo a listarelle 
Scaldate l’olio in una casseruola, aggiungete uno spicchio d’aglio sbucciato e le verdure tritate; lasciate soffriggere per circa 5 minuti, poi unite le striscioline di prosciutto e di lardo e cuocete ancora per un paio di minuti. Prelevate i fagioli con una schiumarola e aggiungeteli al soffritto poi unite un mestolo della loro acqua di cottura: conservate il resto dell’acqua di cottura perché vi servirà in seguito. Ora versate all’interno della pentola anche la passata di pomodoro, salate con moderazione, pepate e fate cuocere per 20 minuti a fiamma moderata, dopodiché potrete aggiungere la pasta. Prima di aggiungere la pasta, prelevate due mestoli dal composto e versateli in un contenitore, poi frullateli con un frullatore a immersione e tenete da parte la crema ottenuta.
Aggiungete i ditaloni rigati direttamente nella pentola, coprite con l’acqua di cottura dei fagioli e portate la pasta a cottura mescolando di tanto in tanto, sempre a fiamma moderata. Quando la pasta sarà al dente, aggiungete il composto frullato in precedenza e il rosmarino tritato, poi spegnete il fuoco, coprite con il coperchio e lasciate riposare per 3 minuti. Un’ultima spolverata di pepe nero e la vostra pasta e fagioli è pronta per essere servita!',
'pasta_e_fagioli_quadrato','Pasta e fagioli','Pasta e fagioli'),
('Secondi','Pesce','Branzino al forno',NULL,490,'Media',60,2,'Medio',
'Il branzino (o spigola) al forno è un piatto molto apprezzato dai buoni intenditori di pesce, che ne riconoscono l’ottima carne bianca, pregiata e profumata, esaltata in questa ricetta, dalla cottura al forno insaporita da verdure e aromi, e ultimata con una spruzzata di buon vino bianco. Il branzino al forno è un''idea magnifica per una cena estiva!',
'Branzino (spigola) 800 g 
Cipolle media 1 
Carote 1 
Sedano 1 costa 
Salvia 2 foglie 
Basilico 4 foglie 
Prezzemolo da tritare 2 cucchiai 
Olio extravergine d''oliva 6 cucchiai 
Aglio 1 spicchio 
Alloro 2 foglie 
Pepe nero q.b. 
Vino bianco q.b. 
Pomodorini ciliegino 250 g',
'- Pulite il branzino
- Imbottite il ventre con salvia, alloro, aglio e sale;
- Tagliate a quarti i pomodorini;
- Tritate carota, sedano e cipolla e cuocete a fuoco basso in una padella con olio;
- Aggiungete pomodorini, prezzemolo, basilico, sale e pepe;
- Versate il condimento in una teglia e adagiateci il branzino;
- Cuocere per 45 minuti a 180 gradi.',
'Per preparare il branzino al forno iniziate pulendo il branzino: tagliategli le pinne, squamatelo ed eliminate le interiora, per vedere come fare cliccate qui.
Sciacquate poi il branzino sotto l’acqua corrente e introducete  nel suo ventre due foglie di salvia, l''alloro, lo spicchio di aglio e una presa di sale. Lavate i pomodorini e tagliateli a quarti; lavate, mondate e tritate la carota, il sedano e la cipolla. Accendete il forno a 180°. Ponete il trito di verdure in una padella con l’olio e fatelo appassire a fuoco lento, poi aggiungete il prezzemolo e i pomodorini e fate cuocere il tutto per almeno 5 minuti a fuoco basso. Aggiungete il basilico spezzato grossolanamente con le mani, aggiustate di sale e pepate e versate il condimento su una teglia da forno abbastanza capiente da contenere il branzino, ponetevi il branzino e irroratelo con dell''olio di oliva.
Infornatelo e fatelo cuocere per 45/50 minuti, (il tempo di cottura varierà a seconda del peso e dello spessore del branzino) spruzzandolo quando serve con un po'' di vino bianco. A cottura ultimata estraete il pesce dal forno, sfilettatelo e disponetelo su di un piatto da portata irrorandolo col suo fondo di cottura.',
'pesce_branzino_quadrato','Branzino al forno','Branzino al forno'),
('Secondi','Pesce','Calamari in umido',NULL,280,'Media',70,4,'Medio',
'I calamari in umido sono un secondo piatto della tradizione casalinga, un modo semplice ma gustoso di assaporare al meglio questi teneri molluschi. Con questa ricetta proponiamo una versione in “rosso” con un vellutato sugo di pomodori pelati che avvolge con gusto le morbide striscioline di calamari. Immancabile il tocco profumato del prezzemolo, l’erba aromatica che ha un legame indissolubile con i piatti dal sapore di mare. Non vi resta quindi che iniziare ad affettare una croccante pagnotta: qui la scarpetta è d’obbligo!',
'Ingredienti per i calamari
Calamari 1 kg 
Aglio 1 spicchio 
Vino bianco 70 g 
Olio extravergine d''oliva 30 g 
Per il sugo
Pomodori pelati 800 g 
Olio extravergine d''oliva 20 g 
Aglio 1 spicchio 
Sale fino q.b. 
Pepe nero q.b. 
Prezzemolo q.b.',
'- Scaldate in un tegame olio e aglio e unite i pomodori pelati;
- Lavate e pulite i calamari;
- Scaldate un pentolino con olio e aglio;
- Saltate i calamari a fuoco vivo per circa 2 minuti;
- Sfumate con vino bianco e togliete l''aglio;
- Versate il tutto nel sugo di pomodoro;
- Salate, pepate e cuocete a fuoco basso per 10 minuti;
- Condire con prezzemolo.',
'Per preparate i calamari in umido iniziate dal sugo. In un tegame capiente, versate l’olio e l’aglio, lasciate insaporire l’olio per un paio di minuti circa a fuoco basso. Versate i pomodori pelati in una ciotola e schiacciateli leggermente con una forchetta, quindi quando l''olio sarà ben caldo versate i pomodori pelati. Lasciate cuocere a fuoco lento per almeno 30 minuti, mescolando ogni tanto. Se dovesse asciugarsi troppo in cottura, potete allungare con poca acqua. A cottura ultimata il sugo si sarà addensato, eliminate con una pinza da cucina lo spicchio di aglio e tenete da parte.
Occupatevi poi della pulizia dei calamari: sciacquateli sotto l’acqua corrente, poi con le mani estraete la testa dal mantello. Proseguite con l’estrazione della penna di cartilagine trasparente che si trova nel mantello.
Lavate di nuovo i calamari accuratamente ed aiutatevi con le mani per estrarre le interiora. Ora eliminate la pelle esterna: praticate un’incisione con un coltellino sulla parte finale del mantello, quel tanto che basta per prendere un lembo della pelle, e tirate via completamente il rivestimento. Per finire rimuovete le pinne. Separate la testa dai tentacoli incidendo con un coltellino poco sotto gli occhi. Prendete i tentacoli ed eliminate il dente centrale. Ora aprite il mantello a libro con un coltello incidetene la parte finale e tagliate mantello e pinne in listarelle di circa mezzo centimetro. Lasciate interi i tentacoli. Scolare i calamari in un colino, intanto scaldate l’olio di oliva in una padella con lo spicchio di aglio sbucciato intero, poi versate i calamari puliti e scolati, fate saltare a fiamma viva per 2-3 minuti: si arricceranno. Sfumate con il vino bianco e lasciate evaporare.
Eliminate l’aglio con una pinza da cucina e versate i calamari con tutto il condimento nel sugo di pomodoro. Salate, pepate e lasciate cuocere con un coperchio a fuoco basso per circa 10 minuti. A cottura ultimata, spegnete il fuoco, tritate il prezzemolo fresco finemente e aggiungetelo ai calamari. I vostri calamari in umido sono pronti per essere portata in tavola ben caldi!',
'pesce_calamari_quadrato','Calamari in umido','Calamari in umido'),
('Secondi','Pesce','Salmone croccante',NULL,645,'Molto facile',30,4,'Medio',
'A volte bastano poche mosse per trasformare un semplice ingrediente in un piatto di grande effetto… e il salmone croccante ne è la dimostrazione! Non dovrete fare altro che procurarvi dei filetti di pesce fresco di buona qualità, insaporirli con una fragrante panure al profumo di erbe aromatiche e infornare: il salmone croccante risulterà cotto alla perfezione e dorato al punto giusto. Accompagnato con un leggero contorno di stagione come possono essere gli agretti o la cicoria, potrete portare in tavola nel giro di mezz’ora un secondo di mare da leccarsi i baffi!',
'Filetto di salmone (4 da 250 g l''uno) 1 kg 
Pane 100 g 
Prezzemolo 1 ciuffo 
Aneto 1 ciuffo 
Timo 4 rametti 
Rosmarino 2 rametti 
Scorza di limone 1 
Olio extravergine d''oliva 50 g 
Pepe bianco in grani 1 cucchiaino 
Sale fino 1 cucchiaino',
'- Frullate il pane con il mixer, aggiungete aneto, timo, rosmarino e prezzemolo;
- Versate l''olio, aggiungete la scorza di limone e il pepe bianco e frullate;
- Pulite il salmone;
- Ricoprite i filetti di salmone con la panatura;
- Cuocete in forno ventilato a 190° per circa venti minuti.',
'Per realizzare il salmone croccante, per prima cosa preparate la panatura: tagliate il pane a pezzi e mettetelo in un mixer, poi aggiungete l’aneto, il timo sfogliato, gli aghi di rosmarino e il prezzemolo. Versate anche l’olio poi unite la scorza di limone e il pepe bianco. Frullate fino a ottenere una consistenza grossolana.
Ora occupatevi dei filetti di salmone: eliminate la pelle con un coltello dalla lama sottile e rimuovete le lische aiutandovi con una pinza da cucina, poi trasferite i filetti su una leccarda foderata con carta forno e ricopriteli con la panatura, facendola aderire bene con le mani.
Dopo aver ricoperto i filetti in modo omogeneo, cuocete in forno ventilato preriscaldato a 190° per circa 20 minuti. Trascorso il tempo di cottura, sfornate e servite il vostro salmone croccante ben caldo!',
'pesce_salmone_croccante_quadrato','Salmone croccante','Salmone croccante'),
('Primi','Risotti','Risotto ai funghi',NULL,488,'Facile',70,4,'Basso',
'Il risotto ai funghi è un primo piatto intramontabile. C''è chi preferisce il risotto con i porcini, ma questa tipologia di funghi spesso risulta difficile da reperire e a volte dato il loro gusto intenso non sempre viene apprezzato da tutti. Vi proponiamo in alternativa una versione più delicata che prevede l''utilizzo degli Champignon e dei funghi chiodini: due famiglie sicuramente più facili da trovare non solo in autunno ma anche durante il resto dell''anno! Allacciate il grembiule, prepariamo insieme questo cremoso e delizioso risotto ai funghi, mantecato a puntino!',
'Riso Carnaroli 240 g 
Funghi chiodini 200 g 
Funghi champignon 200 g 
Cipolle ½ 
Burro 80 g 
Parmigiano Reggiano DOP 60 g 
Sale fino q.b. 
Prezzemolo da tritare q.b. 
Vino bianco 50 g 
Acqua 1 l 
Pepe bianco q.b. 
Olio extravergine d''oliva q.b.',
'- Pulite e tagliate i funghi Champignon e i chiodini;
- Preparate un brodo con gli scarti dei funghi;
- Fate fondere 40 grammi di burro in un tegame;
- Unite la cipolla, i funghi e cuocete per 5 minuti;
- Aggiungete il riso e mescolate per tostarlo;
- Sfumate con vino bianco e aggiungete del brodo;
- Salate e cuocete per altri 13 minuti;
- Mantecate con altri 40 grammi di burro e con il parmigiano;
- Unite prezzemolo, pepe bianco e olio.',
'Per preparare il risotto ai funghi iniziate dalla pulizia degli Champignon. Eliminate la parte finale del gambo, poi spellateli utilizzando un coltellino, per farlo partite dalla base del cappello e tirate delicatamente la pellicina fino al centro. Poi eliminate anche i gambi e tenete gli scarti da parte che serviranno per realizzare il brodo.
Occupatevi ora anche dei funghi chiodini. Eliminate la parte finale del gambo, che risulterà troppo terrosa, e prelevate solo la parte centrale che servirà a realizzare il brodo insieme ai gambi degli Champignon, mentre per il risotto utilizzerete solo la parte superiore che dovrete ridurre a cubetti con un coltellino. A questo punto occupatevi di realizzare il brodo di funghi. Versate gli scarti in un tegame, aggiungete l''acqua e lasciateli sobollire per circa 30 minuti. Nel frattempo tagliate a cubetti anche gli le teste di Champignon e tritate finemente una mezza cipolla.
Prendete un tegame capiente che servirà per la cottura del risotto, aggiungete metà della dose di burro (40 g) e lasciatelo fondere dolcemente. Unite poi la cipolla e lasciatela imbiondire prima di aggiungere i funghi. Cuocete a fiamma medio-alta per 5 minuti, mescolando di tanto in tanto e facendo in modo che i funghi non rilascino liquidi. A questo punto aggiungete il riso  e mescolate spesso in modo da tostarlo.
Dopo qualche minuto sfumate con il vino bianco e solo quando la parte alcolica sarà completamente evaporata aggiungete un paio di mestoli di brodo, filtrandoli con un colino direttamente all''interno del tegame.
Aggiustate di sale e proseguite la cottura per circa 13 minuti bagnando di tanto in tanto con il brodo caldo filtrato, fino a che non risulterà cotto. Quindi spegnete il fuoco e occupatevi di mantecare il risotto: aggiungete prima i 40 g di burro restanti e mescolate fino a farlo sciogliere completamente; poi unite il Parmigiano e mescolate ancora.
Adesso tritate finemenente il prezzemolo; condite il riso con del pepe bianco macinato, il prezzemolo e un filo d''olio. 
Mescolate per amalgamare i sapori e regolate la densità del risotto aggiungendo altro brodo se necessario, mescolate ancora e servite il vostro risotto ai funghi ancora caldo.',
'risotto_ai_funghi_quadrato','Risotto ai funghi','Risotto ai funghi'),
('Primi','Risotti','Risotto all''arancia',NULL,473,'Facile',30,4,'Basso',
'Il risotto all''arancia è un primo piatto semplice, fresco e delicato, come il suo "cugino" al limone adatto ad una cenetta romantica e perfetto per i vegetariani.
Il suo aroma è dovuto alle zeste di arancia in esso contenute che sprigionano un piacevole e fresco profumo; il succo d’arancia presente nel risotto da il tocco finale a questo primo piatto a base di agrumi molto particolare e gustoso.',
'Riso Carnaroli 350 g 
Cipolle 1 
Burro 50 g 
Arance biologica 1 
Grana Padano DOP da grattugiare 30 g Vino bianco q.b. 
Erba cipollina tritata 3 cucchiai Sale fino q.b. 
Pepe bianco q.b. 
Brodo vegetale 1 l',
'- Spremete l''arancia e tenete il succo da parte;
- Tagliate a bastoncini la scorza e sbollentatela in poca acqua;
- Tritate la cipolla nel burro fuso, unite il riso e tostatelo;
- Sfumate con del vino bianco e unite il succo d''arancia;
- Qualche minuto prima del termine della cottura aggiugete i bastocini d''arancia, erba cipollina, sale e pepe;
- Mantecare con burro e grana padano.',
'Per preparare il risotto all''aranciaria, cominciate lavando l''arancia e prelevandone la buccia con un pelapatate avendo cura di asportare il meno possibile la parte bianca (che risulterebbe amara); spremete l’arancia e tenete il succo da parte. Tagliate la scorza asportata in zeste (bastoncini) piuttosto fini che farete leggermente sbollentare in un tegame contenente un paio di dita di acqua e poi scolerete.
Sbucciate e tritate finemente la cipolla, fatela soffriggere nel burro fuso quindi aggiungete il riso che farete tostare per qualche minuto; sfumate il riso con uno spruzzo di vino bianco dopodiché aggiungete il succo d’arancia.
Sempre mescolando, portate a termine la cottura del riso aggiungendo poco brodo ogni volta che servirà. Qualche minuto prima di fine cottura, aggiungete le zeste d’arancia, l’erba cipollina e regolate eventualmente di sale e di pepe bianco macinato. Una volta spento il fuoco aggiungete il Grana Padano DOP grattugiato e una noce di burro per mantecare. Servite immediatamente guarnendo il piatto con fettine e zeste di arancia e, volendo, qualche filo di erba cipollina.',
'risotto_all_arancia_quadrato','Risotto all''arancia','Risotto all''arancia'),
('Primi','Risotti','Risotto alla zucca',NULL,541,'Facile',70,4,'Basso',
'Il risotto alla zucca è una vera e propria istituzione della cucina italiana: una primo piatto che racchiude tutto il calore delle cotture lente, dei sapori genuini, del buon profumo che sa di casa. Una pietanza di origini contadine, come molti tra i migliori piatti della nostra tradizione: solo intuizione, pratica e fantasia hanno saputo trasformare la zucca e il riso in un piatto oggi celebrato dai gastronomi e amato dagli intenditori. Cosa c’è di così speciale in un risotto alla zucca, cosa lo rende irresistibile? La sua semplicità, ci verrebbe da rispondere; una semplicità che racchiude saggezza, cura, gesti immutabili, necessari, privi di frivolezze pompose: la tostatura del riso, che ne impermeabilizza i chicchi e regala loro una straordinaria tenuta di cottura. La cottura seguita passo passo, un mestolo di brodo per volta, perché un riso lesso è diverso da un risotto. La mantecatura, quel momento in cui l’amido trasforma i rimasugli di brodo in una cremina che poi il burro rende lucida e fondente. Tanti piccoli gesti d’altri tempi, che rendono questo piatto una delizia capace di conquistare tanto i palati più raffinati quanto gli amanti dei sapori semplici e genuini.',
'Riso Carnaroli 320 g 
Zucca 600 g 
Cipolle ramate 100 g 
Brodo vegetale 1,5 l 
Parmigiano Reggiano DOP 80 g 
Vino bianco 60 g 
Burro 50 g 
Pepe nero q.b. 
Sale fino q.b. 
Olio extravergine d''oliva 20 g',
'- Preparate un brodo vegetale;
- Pulite la zucca e tagliatela a dadini;
- Soffriggete olio e cipolla, unite poi la zucca;
- Tostate il riso in una padella;
- Sfumate con vino bianco e aggiungete poi la zucca;
- Cuocete versando del brodo all''occorrenza;
- Salate, pepate e mantecate con burro e parmigiano.',
'Per cucinare il risotto alla zucca, cominciate preparando un brodo vegetale leggero, che utilizzerete per portare il riso a cottura. Tagliate le verdure, mettetele in una casseruola capiente, coprite con acqua e regolate di sale. Coprite con un coperchio, portate a ebollizione e fate cuocere per circa 1 ora. Filtrate il brodo e tenetelo in caldo.
Passate quindi alla zucca: pulitela, tagliatela a fettine e da esse ricavate dei piccoli dadini. Tritate finemente la cipolla e ponetela in un tegame largo in cui avrete fatto scaldare l’olio. Lasciate soffriggere la cipolla a fuoco dolcissimo per circa 10 minuti, fino a quando non risulterà così tenera da sciogliersi. A quel punto aggiungete la zucca e rosolatela per alcuni minuti, mescolando per non farla attaccare. Cominciate poi ad aggiungere un mestolo di brodo, e aggiungetene altro, poco a poco fino a portare a cottura la zucca (circa 20 minuti): dovrà risultare ben tenera e cremosa. A parte, scaldate una larga padella e buttatevi il riso per farlo tostare. Utilizziamo il metodo a secco perché la tostatura del riso, indispensabile perché poi i chicchi tengano la cottura, non può avvenire in un ambiente umido come quello creatosi nel tegame con la zucca.
Tostate quindi il riso a fuoco alto fino a renderlo opalescente, girandolo spesso per non farlo scottare. Ci vorranno 2-3 minuti. Sfumate quindi con il vino bianco e mescolate immediatamente per non far attaccare. Appena il vino sarà completamente evaporato versate il riso nel tegame con la zucca. Mescolate bene per amalgamare i sapori ed impedire al riso di attaccarsi.
Appena il risotto comincia ad asciugarsi, aggiungete un mestolo di brodo ben caldo, e proseguite via via aggiungendo il successivo solo quando il precedente sarà stato assorbito, fino al raggiungimento del giusto grado di cottura. Ci vorranno 15-20 minuti a seconda del riso utilizzato. Verso fine cottura regolate di pepe e di sale. Infine, a fuoco spento, mantecate con il burro e il parmigiano grattugiato. Amalgamate con cura, quindi aggiungete un ultimo mestolo raso di brodo se preferite un risotto più cremoso (“all’onda”). Lasciate rapprendere un minuto prima di impiattare e gustare!',
'risotto_di_zucca_quadrato','Risotto alla zucca','Risotto alla zucca'),
('Primi','Zuppe','Zuppa di ceci',NULL,356,'Facile',130,4,'Basso',
'C’è chi alle zuppe proprio non sa dire di no. Hanno il potere di scaldare le mani, il corpo e, non per ultimo, il cuore. Ognuno ha la sua preferita a partire da quella del contadino, probabilmente il classico dei classici, fino a quelle miste di legumi e cereali. Ma tra tutte quelle di terra (si perché esistono anche le zuppe di mare, come quella di cozze) ce n’è una che è sopra tutte: la zuppa di ceci. Probabilmente la più semplice, la più umile ma soprattutto la più buona. Qualcuno dice addirittura che chi cerca le coccole in realtà vuole i ceci. Quindi definire la zuppa di ceci un piatto amarcord è assolutamente corretto, siete d’accordo? Ecco la nostra ricetta, fateci sapere se anche a voi ha scaldato il cuore.',
'Ceci secchi 300 g 
Carote 1 
Sedano 1 costa 
Cipolle bianche ½ 
Porri 1 
Olio extravergine d''oliva 3 cucchiai 
Rosmarino 2 rametti 
Sale fino q.b. 
Pepe nero q.b. 
Alloro 2 foglie 
Brodo vegetale 1,5 l 
Passata di pomodoro 60 g',
'- Mettete i ceci in ammollo per almeno 12 ore;
- Preparate e scaldate il brodo vegetale;
- Preparate un soffritto con olio, porro, sedano, cipolla e carota;
- Unite del brodo al soffritto e poi anche i ceci;
- Unite alloro e rosmarino e coprite i ceci con il brodo;
- Aggiungete la passata di pomodoro;
- Cuocete a fuoco dolce per due ore o due ore e mezza.',
'Per preparare la zuppa di ceci cominciate mettendo questi ultimi in ammollo. Versateli in una ciotola capiente, coprite d’acqua e lasciate reidratare per almeno 12 ore. Trascorso il tempo mettete sul fuoco una pentola con il brodo vegetale per scaldarlo. Intanto scolate e sciacquate i ceci. Prima di passare alla cottura pulite il porro: eliminate le due estremità
poi incidete verticalmente ed eliminate le prime due foglie, quindi tagliate a rondelle sottili. Spuntate anche il sedano e con il pelapatate eliminate la parte più esterna e fibrosa.
Poi tritatelo finemente. Proseguite mondando e tritando anche cipolla e carota.
Spostatevi ai fornelli e versate l’olio in una casseruola, lasciatelo scaldare e poi aggiungete il trito di sedano, carota e cipolla e il porro. Per aiutare le verdure a stufarsi meglio, aggiungete un mestolino di brodo caldo e continuate la cottura per una decina di minuti. A questo punto versate i ceci lasciandoli rosolare per qualche minuto.
Poi unite alloro e rosmarino legati con lo spago da cucina. Coprite i ceci con il brodo vegetale caldo e infine unite la passata di pomodoro.
Mescolate e coprite con il coperchio. Lasciate cuocere a fuoco dolce per circa 2 ore o 2 ore e mezza aggiungendo brodo al bisogno. A fine cottura eliminate il mazzetto odoroso e regolate di sale e di pepe prima di servire. Ecco pronta la vostra zuppa di ceci, accompagnate con dei crostini, se preferite, e buon appetito.',
'zuppa_di_ceci_quadrato','Zuppa di ceci','Zuppa di ceci'),
('Primi','Zuppe','Vellutata di zucca',NULL,205,'Facile',45,4,'Molto basso',
'Siamo certi che la nostra vellutata di zucca vi conquisterà: delicata e confortante, con il suo profumo autunnale e la sua consistenza inconfondibile. Un primo piatto perfetto per scaldare cuori e palati nelle sere più fredde, ma grazie alla sua allure elegante e tutta francese è ideale anche per le cene più sofisticate e le occasioni più speciali. L''importante, secondo noi, è accompagnarla con dei crostini magari preparandoli con l''impasto di una pizza senza glutine, così risulteranno croccanti e perfetti per tutti!',
'Brodo vegetale 800 g 
Sale fino q.b. 
Pepe nero q.b. 
Noce moscata 1 pizzico 
Porri 130 g 
Zucca pulita 1 kg 
Panna fresca liquida 100 g 
Olio extravergine d''oliva 40 g',
'- Fate un soffritto con olio e porro tagliato a rondelle;
- Pulite la zucca e tagliatela a cubetti;
- Aggiungete la zucca al soffritto e cuocete con brodo caldo per circa mezz''ora;
- Insaporire con noce moscata, sale e pepe a piacere;
- Unite la panna, tenendone una parte per dopo e frullate con il mixer;
- Passate la vellutata in un colino a maglie strette;
- Versatela nei piatti e guarnite con la panna rimasta.',
'Per preparare la vellutata di zucca, cominciate pulendo il porro e tagliandolo a rondelle. Scaldate l’olio in una casseruola capiente, quindi unitevi il porro e fatelo soffriggere per qualche minuto, a fuoco non troppo basso, facendo attenzione che non si bruci ma facendolo tuttavia rosolare bene: questo soffritto conferirà un buon retrogusto arrostito alla vellutata. Se necessario, sfumate con poco brodo vegetale.
Intanto pulite la zucca e tagliatela a cubetti. Aggiungetela nella casseruola e fatela insaporire qualche minuto, quindi aggiungete il brodo vegetale caldo in modo che le verdure ne risultino coperte, e portate a cottura mescolando spesso. Dopo 25-30 minuti la zucca dovrebbe risultare molto morbida e quasi sfatta: insaporite con la noce moscata e regolate di sale e di pepe a piacere. Unite quindi la panna, tenendone da parte una parte per la guarnizione finale dei piatti, e frullate accuratamente con il mixer a immersione.
Avrete ottenuto una crema piuttosto liscia, ma per renderla vellutata come da manuale dovete setacciarla passandola attraverso un colino a maglie strette. Distribuitela infine nei piatti, guarnite con la restante panna e gustate la vostra vellutata di zucca ben calda!',
'zuppa_vellutata_di_zucca_quadrato','Vellutata di zucca','Vellutata di zucca');

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
('Questa ricetta è un evergreen',CURRENT_TIMESTAMP,0,1,5),
('Buonissimissimo',CURRENT_TIMESTAMP,0,1,2),
('Che dire, è il tisamisù',CURRENT_TIMESTAMP,0,2,8),
('Grazie per avermi fatto scoprire questo dolce',CURRENT_TIMESTAMP,0,2,3),
('Queste pizzette sono buonissime!',CURRENT_TIMESTAMP,0,2,5),
('Impegnativi per un principiante ma buoni',CURRENT_TIMESTAMP,0,2,14),
('Con questi arancini ho stupito tutti i miei amici xd',CURRENT_TIMESTAMP,0,3,1),
('Il miglior tiramisù di sempre',CURRENT_TIMESTAMP,0,3,8),
('Ricetta esposta in modo chiaro, come sempre',CURRENT_TIMESTAMP,0,3,2),
('Grazie, ho stupito tutti i miei amici',CURRENT_TIMESTAMP,0,4,4),
('Questa ricetta è davvero interessante, la proverò senz''altro',CURRENT_TIMESTAMP,0,5,6),
('Tiramisù fantastico',CURRENT_TIMESTAMP,0,5,8),
('Top ricetta',CURRENT_TIMESTAMP,0,6,9),
('Finalmente ho trovato una spiegazione dettagliata di questa ricetta',CURRENT_TIMESTAMP,0,7,11),
('Siete il miglior sito di cucina',CURRENT_TIMESTAMP,0,8,1),
('Pizzette fantatiche',CURRENT_TIMESTAMP,0,8,5),
('Questo piatto mi è riuscita benissimo, grazie',CURRENT_TIMESTAMP,0,10,7);


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
(1,7),
(1,9),
(2,1),
(2,10),
(3,6),
(3,8),
(4,5),
(4,8),
(5,10),
(6,1),
(6,7),
(7,1),
(7,6),
(8,3),
(8,4),
(9,1),
(10,2),
(10,5);

CREATE TABLE Likes
(
Id_Utente integer,
Id_Commento integer,
PRIMARY KEY(Id_Utente,Id_Commento),
FOREIGN KEY (Id_Utente) REFERENCES Utente(Id_Utente) ON DELETE CASCADE,
FOREIGN KEY (Id_Commento) REFERENCES Commento(Id_Commento) ON DELETE CASCADE
)ENGINE=InnoDB;

INSERT INTO Likes(Id_Utente,Id_Commento) VALUES
(1,4),
(1,6),
(1,8),
(1,9),
(2,1),
(2,8),
(3,1),
(3,4),
(4,2),
(10,14),
(9,17);


CREATE TABLE Voto
(
Id_Utente integer,
Id_Ricetta integer,
Voto decimal(2,1),
PRIMARY KEY(Id_Utente,Id_Ricetta),
FOREIGN KEY (Id_Utente) REFERENCES Utente(Id_Utente) ON DELETE CASCADE,
FOREIGN KEY (Id_Ricetta) REFERENCES Ricetta(Id_Ricetta) ON DELETE CASCADE
)ENGINE=InnoDB;

INSERT INTO Voto(Id_Utente,Id_Ricetta,Voto) VALUES
(1,1,4),
(1,3,5),
(1,5,4),
(1,7,3),
(1,9,4),
(1,11,5),
(1,13,2),
(1,15,3),
(1,17,4),
(1,19,4),
(2,2,5),
(2,4,5),
(2,6,3),
(2,8,3),
(2,10,2),
(2,12,4),
(2,14,5),
(2,16,4),
(2,18,3),
(2,20,4),
(3,1,4),
(3,4,4),
(3,6,3),
(3,2,5),
(3,14,4),
(3,11,4),
(3,8,5),
(3,19,3);

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
(1,2),
(2,1),
(2,2),
(3,2),
(3,8),
(4,4),
(4,7),
(4,11),
(4,14),
(5,16),
(5,20),
(6,12),
(6,18),
(7,5),
(7,6),
(8,9),
(8,10),
(9,13),
(9,15),
(10,17),
(10,19);

