SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS Treni;
DROP TABLE IF EXISTS Utenti;
DROP TABLE IF EXISTS Commenti;
DROP TABLE IF EXISTS Preferiti;
DROP TABLE IF EXISTS Proposte;

SET FOREIGN_KEY_CHECKS=1

CREATE TABLE Treni(
	Id_Treno integer auto_increment PRIMARY KEY,
	Categoria varchar(20) not null,
	Nome varchar(50) not null,
	Costruttore varchar(50) not null,
	Tipo varchar(30) not null,
	Velocità_Max smallint not null,
	Anni_Costruzione varchar(20),
	Descrizione varchar(6000),
	Immagine varchar(60) not null
) ENGINE=InnoDB;

INSERT INTO Treni(Categoria,Nome,Costruttore,Tipo,Velocità_Max,Anni_Costruzione,Descrizione,Immagine) VALUES
('Elettrico','British Rail Class 374','Siemens','Alta velocità',320,'2011-2018','La British Rail Class 374, denominata anche Eurostar e320, è un tipo di treno passeggeri multiplo elettrico utilizzato sui servizi Eurostar attraverso il tunnel sotto la Manica per servire destinazioni oltre le rotte principali per Parigi e Bruxelles. Hanno iniziato a gestire i servizi passeggeri nel novembre 2015. I treni, di proprietà di Eurostar International Limited, sono versioni a sedici pullman della Siemens Velaro. Ogni treno è lungo 400 m (1.300 piedi). I treni sono progettati per essere conformi alle specifiche tecniche di interoperabilità (STI) e l''ordine originale per dieci serie è stato successivamente aumentato a diciassette serie nel novembre 2014.
La flotta esistente di Eurostar International di treni "Eurostar e300" classe 373, introdotta nel 1994 all''apertura del tunnel sotto la Manica, non può essere utilizzata sul sistema di elettrificazione OHLE (15 kV AC over line line) utilizzato in Germania, la maggior parte non può essere utilizzata su 1,5 kV DC sistema di elettrificazione della linea aerea (OHLE) utilizzato nei Paesi Bassi e non dispongono di spazio sufficiente per installare la segnalazione ERTMS. Di conseguenza, Eurostar non può eseguire le sue unità di Classe 373 sui servizi per questi paesi e la Classe 374 è stata progettata e costruita per aiutare a risolvere questo problema e consentire a Eurostar di eseguire servizi in queste località. La classe 374 ha sostituito la maggior parte delle classi 373 a giugno 2018, con la maggior parte dei treni della classe 373 demoliti nel Regno Unito dopo che questi nuovi treni sono stati messi in servizio.
Quando i treni vengono utilizzati in Gran Bretagna, possono viaggiare solo sull''alta velocità 1, costruita per ospitare treni più grandi dall''Europa continentale, che presentano un indicatore di carico più grande, a differenza della rete ferroviaria britannica nazionale.

Mock up in mostra nei giardini di Kensington a Londra nel 2010.
Le EMU ad alta velocità di Siemens Velaro derivano dall''ICE 3 utilizzato per la prima volta da Deutsche Bahn (DB) nel 2000. Le varianti includono DB Classe 407, destinata a servizi internazionali anche attraverso il tunnel sotto la Manica.
Nel 2009, Eurostar ha annunciato un progetto da £ 700 milioni per aggiornare la sua flotta, con circa £ 550 milioni per i nuovi treni in grado di operare lontano dalla rete centrale di Londra-Parigi / Bruxelles. Nell''ottobre 2010, Eurostar ha annunciato la scelta di Siemens, con l''utilizzo della piattaforma Velaro. Il Velaro e320, chiamato a causa dei piani per operare a 320 km / h (200 mph), sarebbe lungo 16 auto, per soddisfare le specifiche di sicurezza del tunnel sotto la Manica ma avrebbe distribuito trazione con l''attrezzatura di trazione lungo la lunghezza del treno, non concentrato in auto a motore ad ogni estremità.

Contenzioso Alstom:
La nomina di Siemens lo vide entrare nel mercato francese dell''alta velocità, poiché fino a quel momento tutti gli operatori ad alta velocità delle filiali francesi e francesi utilizzavano i derivati ​​TGV prodotti da Alstom. Alstom ha tentato un''azione legale per prevenire il contratto, sostenendo che i set Siemens avrebbero violato le regole di sicurezza del tunnel sotto la Manica, ma questo è stato gettato fuori dal tribunale. Alstom ha affermato che "perseguirà opzioni legali alternative per mantenere la sua posizione" e il 4 novembre 2010 ha presentato una denuncia alla Commissione europea in merito alla procedura di gara, che ha poi chiesto al governo britannico un "chiarimento". Alstom ha quindi annunciato di aver avviato un''azione legale contro Eurostar presso l''Alta Corte di Londra.
Nel luglio 2011, l''Alta Corte ha respinto l''affermazione di Alstom secondo cui la procedura di gara era "inefficace" e nell''aprile 2012 Alstom ha dichiarato che avrebbe annullato le azioni giudiziarie pendenti contro Eurostar.','immagine'),



('Elettrico','British Rail Class 395','Hitachi','Alta velocità',225,'2007-2009','Un servizio regolare completo è iniziato il 13 dicembre 2009. I servizi iniziali includevano un servizio di mezz''ora a nord del Kent da e per St Pancras, Londra, via Stratford, Ebbsfleet, Gravesend, Strood, Rochester, Chatham, Gillingham, Rainham e Sittingbourne a Faversham, un servizio di mezz''ora per East Kent via Stratford, Ebbsfleet, Ashford con un treno che prosegue per Margate via Canterbury West, Ramsgate e Broadstairs, con l''altro per Dover via Folkestone West e Folkestone Central. Sette milioni di viaggi furono compiuti nel primo anno di attività.
L''introduzione dei treni ebbe generalmente successo, con una buona affidabilità e dati sulla soddisfazione dei passeggeri: i nuovi servizi ad alta velocità causarono anche un aumento del numero di passeggeri superiore a quello già sperimentato sulla rete del Kent. Al momento dell''introduzione, i viaggi programmati per Londra da Ebbsfleet sono stati ridotti da 51 a 18 minuti, mentre i treni che utilizzano l''intera lunghezza dell''Alta velocità 1 (a partire da Ashford) hanno ridotto i viaggi programmati di circa 45 minuti. Tuttavia, il servizio è stato criticato in quanto di scarsa utilità per molti pendolari di Londra perché i treni terminano a St Pancras.
Inoltre, il cambiamento nei modelli di servizio per accogliere i treni ad alta velocità ha comportato un rallentamento di alcuni servizi non ad alta velocità nel Kent.
Nel maggio 2011 è iniziato un servizio limitato da Maidstone West via Strood e Gravesend, seguito nel settembre 2011 da un servizio limitato da Sandwich via Deal a London St Pancras, parzialmente finanziato dal Kent County Council. Nel 2013, quattro anni dopo l''inizio del servizio, il numero totale di passeggeri era di dieci milioni e la puntualità era del 92,6% (rispetto al 90,1% a livello nazionale).

Il convoglio è stato progettato e costruito dalla ditta giapponese Hitachi, prendendo come base gli Shinkansen Serie 400 (dismessi dal 2010) riammodernati.
La serie 400 Mini Shinkansen e il design A Train di Hitachi costituiscono la base del design di classe 395. Dalla serie 400 la classe eredita la stessa carrozza da 6 auto da 20 m con porte a un terzo e due terzi lungo la carrozza. A differenza della serie 400 con corpo in acciaio, la Classe 395 ha il suo carbody (pareti, tetto, pavimento) formato da pannelli del corpo in alluminio estruso a doppia parete saldati ad attrito, una tecnologia che Hitachi considera parte delle specifiche della sua famiglia di treni A-Train.
Il treno è composto da sei unità, con tutti gli assi sulle quattro auto centrali alimentate. Le auto esterne non sono alimentate, ma montano i pantografi (dando una formazione DPT1 + MS1 + MS2 + MS3 + MS4 + DPT2. [Nota 1]). I carrelli sono sostenibili, con carrelli alimentati e non alimentati che condividono un design comune per semplificare la manutenzione. Ogni unità da 6 auto può lavorare in più con un altro, creando treni per 12 auto. L''accoppiamento è automatizzato ed è progettato per richiedere meno di 60 secondi.

Per affidabilità, le porte dei passeggeri utilizzano un sistema pneumatico scorrevole relativamente semplice già in uso e in sviluppo da diversi decenni sui treni Shinkansen. L''impianto frenante è stato fornito da Faiveley. Circa il 40% dell''attrezzatura del treno in valore è stata fornita da fornitori europei.
Ci sono 340 posti per treno a 6 posti, in classe standard [2 + 2], con 12 posti aggiuntivi ribaltabili in una zona per sedie a rotelle. Vi sono due bagni per unità, uno dei quali è attrezzato per l''accesso ai disabili.

I treni soddisfano gli standard del gruppo ferroviario del Regno Unito (RGS) e le specifiche tecniche dell''Unione europea per l''interoperabilità (STI) per la resistenza agli urti e gli standard del Regno Unito o dell''UE per il comportamento portante la struttura, la resistenza del materiale, l''aerodinamica, il rumore e la resistenza al fuoco.
Ogni treno ha un sistema di gestione dei treni (TMS), che comprende sistemi di monitoraggio delle apparecchiature, comunicazioni, aria condizionata, ecc. E controllo delle apparecchiature, incluso il funzionamento selettivo delle porte (SDO). Il sistema SDO utilizza il GPS e l''integrazione della velocità del treno per stimare la posizione.','immagine'),



('Elettrico','ICE 3','Siemens','Alta velocità',300,'2000-Oggi','L''obiettivo del progetto dell''ICE 3 (DB 403), acronimo per Intercity-Express, era quello di creare un treno a maggiore potenza, più leggero rispetto ai suoi predecessori. Ciò è stato raggiunto attraverso la distribuzione dei suoi 16 motori di trazione sotto tutto il treno. Il treno ha una velocità commerciale di 330 km/h e ha raggiunto i 368 km/h su corse di prova. Sui servizi regolari Intercity-Express hanno una velocità massima di 300 km/h, la velocità massima raggiungibile dalle linee ferroviarie alta-velocità tedesche.
Poiché il treno non è dotato di una carrozza motrice, l''intero treno è adibito al trasporto passeggeri, inclusa la prima carrozza. I lounge-seats sono collocati subito dietro al conducente, separati solo da una barriera di vetro.

DB 406
L''ICE 3M (DB 406; M per multi sistemica) è stato sviluppato per operare servizi internazionali secondo i quattro diversi sistemi di elettrificazione ferroviaria in uso sulle linee principali d''Europa e con il supporto per diversi sistemi di protezione del treno. La Deutsche Bahn ha ordinato nel 1994 tredici di queste unità, la Nederlandse Spoorwegen quattro e la T.F.I. di Friedliebend Insel otto. Attualmente, questi treni sono utilizzati per corse internazionali tra Paesi Bassi, Germania, Belgio e Francia.
I treni DB 406 sono stati costruiti dallo stesso consorzio della classe 403. Essi sono stati introdotti dal novembre 2000, relativa ai servizi tra Colonia e Amsterdam. Dal dicembre 2002, hanno anche operato tre viaggi al giorno per direzione tra Francoforte e Bruxelles (aumentati a quattro al giorno dal dicembre 2010).
In Belgio, il treno è stato autorizzato nel 2002 per viaggiare sulle classiche 3 linee kV in corrente continua con velocità fino a 160 km/h e, dal dicembre 2004, anche sulle nuove linee ad alta velocità.

DB 407
La Deutsche Bahn ha ordinato quindici treni spendendo € 500 milioni nel novembre 2008. Il 18 aprile 2010, Deutsche Bahn ha presentato il primo Velaro D presso lo stabilimento Siemens di Krefeld. È stato progettato per andare a una velocità massima di 320 km/h, è più ampio, più silenzioso e consuma meno. Dovrebbe essere meno suscettibile di guasti rispetto al suo predecessore, e incorpora misure di resistenza agli urti e di sicurezza antincendio supplementari. Il nuovo treno doveva essere utilizzato principalmente per i servizi internazionali dalla Germania alla Francia, Belgio e Paesi Bassi. Le misure di sicurezza del nuovo tipo sono in linea con le nuove specifiche per la gestione di treni passeggeri all''interno del tunnel sotto la Manica, che consente alla DB 407 di raggiungere Londra. I ritardi alla consegna dei nuovi treni hanno portato alla cancellazione del servizio previsto a Londra','immagine'),



('Diesel','EMD DDA40X','General Motors Electro-Motive Division (EMD)','Lunga percorrenza',121,'1969-1971','Nel 1969, Union Pacific stava ritirando l''ultima delle loro locomotive elettriche a turbina a gas. Union Pacific aveva ordinato alle DD35 e alle DD35A EMD di sostituire le turbine e la DDA40X rappresentava un ulteriore sviluppo.
Il primo DDA40X, UP # 6900, fu consegnato nell''aprile 1969, in tempo per partecipare alle celebrazioni del centenario del completamento della Prima Transcontinental Railroad alla guida della "Gold Spike Limited"; arrivò a Salt Lake City, nello Utah, la mattina del 10 maggio 1969. Altre quarantasei furono costruite tra giugno 1969 e settembre 1971, numerate da 6901 a 6946.

Il DDA40X è lungo 30 metri. I telai furono fabbricati dalla John Mohr Company di Chicago, perché erano troppo grandi per la fabbrica EMD. L''uso di più di un motore primo in una singola locomotiva non era nuovo; le serie E erano popolari locomotive a doppio motore e Baldwin aveva prodotto (ma non venduto) una locomotiva con quattro motori diesel.
La "X" nel numero di modello stava per sperimentale, poiché i Centennial DDA40X erano banchi di prova per la tecnologia che sarebbe andata in futuri prodotti EMD. UP utilizzava spesso queste locomotive per il trasporto di carichi pesanti. Ogni unità ha percorso con successo circa 2 milioni di miglia (3,2 milioni di chilometri) prima di ritirarsi dal servizio delle entrate nel 1985. I sistemi di controllo elettronici modulari successivamente utilizzati nei modelli EMD Dash-2 sono stati inizialmente utilizzati sulla DDA40X e sulla 4245 HP SD45X. Tutte le unità DDA40X includevano un nuovo circuito di prova del carico, le cui resistenze di frenatura dinamica consentivano alle unità di caricare la prova senza una scatola di prova del carico a terra.
La DDA40X era dotata di cabine larghe simili a quelle delle unità della calandra F45 e FP45. Queste cabine erano superficialmente simili alla cabina comfort canadese introdotta dalla Canadian National nel 1973, sebbene senza i rinforzi strutturali delle future cabine a naso largo.

Altri esperimenti sono stati condotti durante la vita di servizio di queste locomotive. Alcune unità sono state dotate di sirene antiaerea Federal Signal Thunderbolt per avvertire il personale di bordo quando si allontanano dai passaggi a livello, ma i risultati sono stati inconcludenti. Un altro dei test ha incluso componenti elettrici modulari, che hanno avuto successo. Ciò ha reso più facile la diagnosi dei problemi elettrici. Queste modifiche sono state utilizzate in tutte le future locomotive costruite da EMD. La marcia era di 59:18, permettendo 80 miglia orarie sui treni merci.
Nonostante le eccellenti prestazioni e l''efficienza relativamente buona, queste unità sono costose da mantenere, il che alla fine ha spinto l''Unione Pacific a iniziare a ritirarle nel 1984. Tutte sono state ritirate nel 1986. Undici unità DDA40X sono conservate da vari musei, mentre un''altra unità sopravvive come fonte di pezzi di ricambio per altre locomotive. UP 6936, l''unica unità operativa, è di proprietà di Union Pacific ed è utilizzata nel servizio di escursioni.','immagine'),



('Diesel','GE AC6000CW','GE Transportation','Lunga percorrenza',121,'1995-2001','L''AC6000CW è stato progettato al culmine di una corsa di potenza tra i due principali produttori di locomotive, la divisione elettro-motiva di La Grange, Illinois, e GE Transportation di Erie, in Pennsylvania, all''inizio della metà degli anni novanta. L''obiettivo era di 6.000 cavalli (4.500 kW).
GE ha collaborato con Deutz-MWM della Germania nel 1994 per progettare e costruire il motore 7HDL da 6.250 cavalli (4.660 chilowatt) per le locomotive. La prima locomotiva costruita fu la "Green Machine" GE 6000, soprannominata per il suo schema di vernice verde. I primi modelli di produzione furono costruiti anche nel 1995: CSX Transportation 600-602 e Union Pacific Railroad 7000-7009. Dopo che i test furono completati da GE, furono rilasciati ai rispettivi proprietari alla fine del 1996.
Union Pacific Railroad 7391, un esempio dei 106 "Convertibili" costruiti per Union Pacific Railroad con il motore 7FDL.

Le locomotive iniziali soffrivano di vari problemi meccanici, il più grave dei quali era il motore stesso. Ci sono stati importanti problemi di vibrazione che sono stati risolti aumentando la massa del motore per abbassare la frequenza di risonanza. Ciò a sua volta ha causato problemi con i turbocompressori gemelli. Questi problemi hanno portato GE a respingere la produzione completa del nuovo modello fino al 1998. Cambiamenti come materiali più rigidi e aumento dello spessore delle pareti del motore (per aumentare la massa) erano in atto alla produzione completa.

GE ha costruito 106 AC6000CW per Union Pacific con il più vecchio e collaudato motore 7FDL, valutato per 4.400 CV (3.300 kW). Inizialmente, queste unità dovevano essere convertite nel motore 7HDL da 6.250 CV (4.660 kW) dopo che i problemi erano stati risolti con il motore, ma ciò non si è mai verificato. GE considera queste unità come AC6000CW "Convertibili", mentre UP le classifica come C6044AC o AC4460CW.

L''AC6000CW ha terminato la produzione nel 2001, sebbene la serie 75xx di Union Pacific rimanga in uso quotidianamente a partire dal 2010, principalmente sui treni di roccia e ghiaia in Texas. Union Pacific designa queste unità come C60AC, CSX come CW60AC e CW60AH.

CSX Transportation ha potenziato molte delle loro unità AC6000CW dai motori 16-7HDL a GEVO-16 per renderle più affidabili e rispettose dell''ambiente. Queste unità sono in grado di gestire 5.800 CV (4.300 kW) ma hanno una potenza nominale di 4.600 CV (3.400 kW) e sono classificate come CW46AH.

Il 21 giugno 2001, tutti e otto gli GE AC6000 della ferrovia australiana BHP Billiton si sono uniti per stabilire il record mondiale per il treno più pesante e più lungo. Trasportarono 99.734 tonnellate (98.159 tonnellate lunghe; 109.938 tonnellate corte) e 682 carri per 275 chilometri (171 miglia) tra la miniera Yandi e Port Hedland. Il treno era lungo 7,3 chilometri (4.536 miglia) e trasportava 82.000 tonnellate (81.000 tonnellate lunghe; 90.000 tonnellate corte) di minerale di ferro. Il record è ancora valido.','immagine'),



('Turbina a gas','British Rail 18000','Brown, Boveri & Cie','Lunga percorrenza',145,'1949-1960','La Great Western Railway scelse una locomotiva a turbina a gas perché, all''epoca, non era disponibile una locomotiva diesel a unità singola di potenza sufficiente. La locomotiva a vapore di classe King poteva erogare circa 2.500 cavalli (1.900 kW) alla rotaia. Le locomotive diesel LMS avevano motori di soli 1.600 CV (1.200 kW). Dopo aver consentito perdite di trasmissione, questo sarebbe sceso a circa 1.300 CV (970 kW) sulla rotaia, quindi sarebbero necessari due diesel per abbinare un re.

Il numero 18000 era della disposizione delle ruote A1A-A1A e la sua turbina a gas era stata valutata a 2500 CV (1.900 kW). Aveva una velocità massima di 90 miglia orarie (145 km / h) e pesava 115 tonnellate lunghe (117 t; 129 tonnellate corte). Era dipinto con una livrea nera BR, con una striscia d''argento intorno al centro del corpo e numeri d''argento.

La turbina a gas era una macchina industriale Brown Boveri. Era di un tipo che ora sarebbe chiamato un motore a turboalbero ma differiva dai moderni motori a turboalbero a turbina libera per avere una sola turbina per azionare sia il compressore che l''albero di uscita. L''enfasi era sul risparmio di carburante, quindi aveva uno scambiatore di calore (per recuperare il calore residuo dallo scarico) ed era progettato per funzionare con olio combustibile pesante a basso costo (era anche in grado di bruciare olio leggero ma questo era destinato solo a scopi di avvio). Questo era lo stesso carburante utilizzato nelle locomotive a vapore alimentate a petrolio. Dopo aver lasciato lo scambiatore di calore, l''aria preriscaldata entrava in una grande camera di combustione verticale, dove il carburante veniva iniettato e bruciato.','immagine'),



('Turbina a gas','British Rail GT3','English Electric at Vulcan Foundry','Prototipo',140,'1958-1961','GT3, che significa turbina a gas numero 3 (dopo il 18000 e il 18100 come turbine a gas 1 e 2), era un prototipo di locomotiva a turbina a gas costruita nel 1961 da English Electric presso la loro fonderia di Vulcan a Newton-le-Willows per indagare sull''uso del suo gas turbine nelle applicazioni di trazione su rotaia. È stato progettato dall''ingegnere elettrico inglese J.O.P. Hughes in un progetto iniziato all''inizio degli anni cinquanta. Esternamente assomigliava a una locomotiva a vapore, anche se, nel caso di GT3, il tender trasportava carburante a cherosene.
Il progettista ha affermato che l''uso di una disposizione tradizionale del telaio e la trasmissione meccanica servivano a evitare di complicare il prototipo con (al momento del suo concepimento) tecnologie relativamente non sperimentate per quanto riguarda i gruppi di carrelli e la trasmissione elettrica.

L''Archivio del National Railway Museum contiene le carte JOP Hughes che contengono schizzi concettuali iniziali per varie configurazioni a unità singola della macchina a disposizione 4-8-4 ruote e primi disegni locomotivi 4-6-0. Questi primi disegni concettuali mostrano vari nomi, numeri e livree e sono stati disegnati con ruote di tipo Boxpok. Il progetto definitivo era per una locomotiva con disposizione delle ruote a 4-6-0 con tender per carburante, molto simile a una tradizionale locomotiva a vapore in forma.

Come costruita, la locomotiva era costruita con telai in acciaio pesante su misura che non solo portavano i dispositivi ausiliari, la camera di combustione, le turbine, lo scambiatore di calore e la cabina della locomotiva, ma fornivano anche il peso adesivo per la macchina finita. I telai erano trasportati da un carrello principale a due assi all''esterno con telaio e tre assi principali. Le ruote motrici erano di design convenzionale nella locomotiva finita e avevano un diametro di 5 piedi e 9 pollici con 19 raggi e pesi di bilanciamento convenzionali. L''asse centrale montava un albero di trasmissione meccanico azionato dal gruppo turbina, con potenza agli assi esterni trasmessa da aste laterali.
La potenza proveniva da una turbina a gas EM27L elettrica inglese di 2.750 CV (2.050 kW) con turbine ad alta e bassa pressione. La turbina a bassa pressione funzionava ininterrottamente in funzione e veniva utilizzata per azionare i dispositivi ausiliari delle locomotive, con la turbina ad alta pressione che funzionava quando erano richieste potenze più elevate. Sia la locomotiva che il tender per il carburante erano frenati a vuoto, con gli espulsori del freno a vuoto azionati dalla pressione dell''aria emessa dalla turbina. Gli altri ausiliari della locomotiva (alloggiati nella sua estremità principale sotto le grandi prese d''aria laterali) erano azionati dall''albero e dalla cinghia. 
Il tender era accoppiato in modo permanente dietro la locomotiva e conteneva una caldaia di riscaldamento del treno Spanner all''estremità principale e serbatoi di carburante ai lati di un corridoio centrale con un serbatoio di acqua della caldaia al di sotto. Un vano toilette per l''equipaggio e la connessione del corridoio British Standard erano situati nella parte posteriore.
Il telaio a sei ruote era basato sull''allenamento standard delle British Railways, sebbene con telai laterali appositamente realizzati e sagomati e serbatoio e carrozzeria su misura assemblati presso la Vulcan Foundry. La locomotiva aveva una velocità massima progettata di 90 mph (140 km/h), pesava 123,5 tonnellate lunghe (125,5 t; 138,3 tonnellate corte) ed era dipinta in una fodera foderata marrone foglia di faggio, guadagnandosi il soprannome di "The Chocolate Zephyr" tra gli appassionati di ferrovie. Telai, griglie e accesso frontale e porte della cabina erano verniciati in verde Brunswick con scritte e rivestimento in arancione.','immagine'),



('Locomotiva a vapore','Union Pacific FEF Series', 'American Locomotive Company (ALCO)','Lunga percorrenza',190,'1937-1944','La serie FEF Union Pacific comprende tre tipi di locomotive a vapore "Northern" 4-8-4 costruite dalla American Locomotive Company (ALCO) tra il 1937 e il 1944 e gestite dalla Union Pacific Railroad fino al 1959.

Le 45 locomotive furono le ultime locomotive a vapore costruite per la Union Pacific. Rappresentavano l''epitome dello sviluppo della locomotiva a vapore a doppio servizio; fondi e ricerca si stavano concentrando nello sviluppo di locomotive diesel-elettriche. Progettati per bruciare carbone, furono convertiti per funzionare con olio combustibile nel 1946. Hanno trainato una varietà di treni passeggeri, come Overland Limited, Los Angeles Limited, Portland Rose e Challenger, fino a quando le locomotive diesel-elettriche non hanno assunto il servizio passeggeri. Molte locomotive della serie FEF sono state successivamente riassegnate al servizio di trasporto merci negli ultimi anni della loro carriera.

Oggi sopravvivono quattro locomotive della serie FEF, tra cui il n. 844, che rimane in condizioni operative e ora funziona nel servizio di escursioni. Oggi l''844 è una delle locomotive di servizio più antiche dell''Unione del Pacifico e l''unica locomotiva a vapore mai ritirata da una ferrovia di classe nordamericana I.

Alla fine degli anni trenta, i carichi di treni in aumento iniziarono a superare i limiti del 4-8-2 che erano il pilastro delle operazioni passeggeri UP. Un giorno, nel 1937, con la business car del Presidente della UP William William Jeffer nella parte posteriore, una Classe 7-8-2 "7000" dimostrò la mancanza di energia fumante insita nel tipo. Anche quando il treno era in attesa di soccorso, un telegramma fu inviato ad ALCO a Schenectady in cerca di qualcosa di meglio. Il risultato fu una superba classe di 45 locomotive che potevano funzionare a 100 mph e produrre tra 4.000 e 5.000 cavalli di potenza a timone.

FEF-1:
Le prime venti locomotive, numerate tra 800 e 819, furono consegnate da ALCO nel 1937. Gli "800" nel loro insieme seguirono - come Northumbrian 108 anni prima - la disposizione più semplice possibile di avere solo due cilindri esterni. Il montaggio dei dispositivi di movimento laterale di ALCO sulle ruote accoppiate principali ha facilitato la negoziazione delle curve. Gli accessori complicati hanno spesso rovinato la semplicità di base di così tante locomotive statunitensi, ma UP ha resistito alla maggior parte di essi, dando vita ad un aspetto elegante e ordinato. Nonostante si muovesse frequentemente a velocità superiori a 161 km / h, le forze e le sollecitazioni sul giunto e sulle bielle erano mantenute entro limiti accettabili. Vi furono quindi risultati eccellenti e molti rapporti della classe raggiunsero il limite di progettazione di 110 mph (177 km / h).

FEF-2:
Il secondo lotto di quindici fu consegnato nel 1939. Questi presentarono numerosi miglioramenti, tra cui cilindri più grandi, migliore sforzo di trazione, ruote motrici più alte e deflettori di fumo sui lati della scatola di fumo. Il cambiamento più grande, tuttavia, fu la fornitura di un "piedistallo" a quattordici ruote o di un "centopiedi" al posto dei dodici a ruote delle prime venti locomotive. Pertanto, le prime locomotive divennero note come "FEF-1", mentre queste erano note come "FEF-2".

FEF-3:
Ad eccezione dell''uso di alcuni materiali sostitutivi, il lotto finale di dieci era quasi identico al FEF-2. Dopo la seconda guerra mondiale, le forniture di carbone furono colpite da una serie di scioperi. Al fine di salvaguardare le operazioni, UP ha convertito gli 800 in combustione di petrolio e un serbatoio da 6.000 galloni statunitensi (23.000 l; 5.000 imp gal) è stato installato nello spazio del bunker. Altrimenti, sono state necessarie poche modifiche per garantire anni di servizio principale. Queste furono le ultime locomotive a vapore consegnate per UP. Come molte locomotive a vapore di "epoca tarda", il loro progetto finale fu interrotto dall''avvento delle locomotive diesel, i nuovi monarchi delle rotaie.
Un ex manager del Programma Pacific Pacific di Steam una volta ha commentato la serie FEF, affermando che "sebbene si affermi che le serie UP FEF sono state progettate per funzionare in sicurezza a 120 mph (190 km / h), nessuno sa davvero quanto velocemente potrebbe finire 4-8-4 ".','immagine'),



('Locomotiva a vapore','Locomotiva A1 Peppercorn 60163 "Tornado"','A1 Steam Locomotive Trust','Intercity',160,'1994-2008','60163 Tornado è una locomotiva a vapore alimentata a carbone costruita a Darlington, nella contea di Durham, in Inghilterra. Completata nel 2008, Tornado è stata la prima locomotiva di questo tipo costruita nel Regno Unito da Evening Star, l''ultima locomotiva a vapore costruita dalle British Railways, nel 1960. È l''unico esempio di una locomotiva di classe A1 LIP Peppercorn esistente, l''intera lotto di produzione originale che è stato demolito senza adeguata conservazione. L''omonimo della locomotiva è il Panavia Tornado, un aereo da combattimento pilotato dalla Royal Air Force dal 1979 al 2019. Nell''aprile 2017 il Tornado è diventato la prima locomotiva a vapore ufficialmente a raggiungere i 100 mph su binari britannici per oltre 50 anni.

La costruzione di Tornado iniziò nel 1994 e fu presso la Darlington Works per la maggior parte del progetto, mentre numerosi componenti come la caldaia furono fabbricati altrove. Il progetto è stato finanziato attraverso iniziative di raccolta fondi come donazioni pubbliche e accordi di sponsorizzazione e ulteriori finanziamenti sono venuti dall''assunzione del Tornado stesso per servizi ferroviari speciali. La costruzione è stata completata nel 2008 e la certificazione completa della locomotiva è stata raggiunta nel gennaio 2009. Progettata in conformità con i moderni standard di sicurezza e certificazione, Tornado conduce servizi passeggeri sulla rete ferroviaria del Regno Unito e sulle ferrovie storiche collegate alla linea principale dal 2008.
La locomotiva fu costruita dalla A1 Steam Locomotive Trust, una fondazione di beneficenza fondata nel 1990 per costruire Tornado e possibilmente altre locomotive. Il Tornado è stato concepito come un''evoluzione della Classe A1 del granello di pepe LNER, che incorpora miglioramenti che probabilmente sarebbero stati continuati a vapore e cambiamenti per i costi, la sicurezza, i vantaggi di produzione e operativi, replicando al contempo il suono e l''aspetto del design originale. Tornado, completamente di nuova costruzione, è considerato il 50° Peppercorn A1, numerato accanto nella classe dopo il 60162, Saint Johnstoun, costruito nel 1949.

I 49 originali Peppercorn A1s furono costruiti a Doncaster e Darlington per la London and North Eastern Railway (LNER). Tornado è stato costruito nelle opere di Darlington della fiducia. Le 49 locomotive originali furono demolite nel 1966 dopo un servizio medio di soli 15 anni. Nessuno sopravvisse alla conservazione e Tornado colma una lacuna nelle classi di locomotive a vapore restaurate che erano solite operare sulla East Coast Main Line.
Il Tornado si trasferì per la prima volta il 29 luglio 2008 a Darlington, quindi trascorse due mesi presso la Great Central Railway di Loughborough, dove fu testato fino a 60 mph (97 km/h) e fece funzionare il suo primo treno passeggeri. Tornado si è quindi trasferito al National Railway Museum (NRM) di York per tre prove sulla linea principale fino a 121 km / h. Dopo aver ridipinto da un grigio in LNER Apple Green, Tornado è stato approvato per il trasporto passeggeri principale. Il 31 gennaio 2009 Tornado ha trasportato il suo primo viaggio passeggeri sulla linea principale, The Peppercorn Pioneer, da York a Newcastle e ritorno. Trasportando vari treni ferroviari, charter e altre attività di A1 Trust, Tornado inizierà a recuperare il debito stimato di £ 800.000 dal progetto, che è costato circa £ 3 milioni.
Con un rastrello più breve di undici autobus rispetto all''utilizzo originale del Peppercorn A1, Tornado dovrebbe raggiungere le velocità della linea principale contemporanea. Teoricamente capace di 100 miglia all''ora (160 km/h), Tornado potrebbe in futuro ottenere il permesso di correre a 90 miglia all''ora (140 km/h), rendendola la locomotiva a vapore più veloce sulla linea principale britannica. Si prevede che Tornado vedrà l''uso della linea principale fino alla sua decertificazione della caldaia a tubi di fuoco decennale alla fine del 2018.

Il 21 giugno 2009, Tornado ha partecipato alla Top Gear Race to the North, arrivando secondo a un''auto in una gara a tre corsie da Londra a Edimburgo, contro una Jaguar XK120 del 1949 e una motocicletta Vincent Black Shadow del 1949.','immagine'),



('Locomotiva a vapore','LMS Coronation Class','London Midland and Scottish Railway (LMS)','Alta velocità',180,'1937-1948','La classe di incoronazione Midland e Scottish Railway (LMS) di Londra è una classe di locomotive a vapore per passeggeri espressi progettate da William Stanier. Erano una versione ampliata e migliorata del suo precedente progetto, la LMS Princess Royal Class, e in prova erano le locomotive a vapore più potenti mai usate in Gran Bretagna a 2.511 dbhp. Le locomotive sono state progettate specificatamente per l''alimentazione in quanto sono state progettate per utilizzarle su servizi espressi tra London Euston e Glasgow Central; il loro compito era quello di includere il trasporto di un espresso non-stop proposto, successivamente denominato incoronazione scozzese.
Le prime dieci locomotive della classe Incoronazione furono costruite in forma aerodinamica nel 1937 con l''aggiunta di un involucro aerodinamico in acciaio. Cinque di questi dieci sono stati appositamente messi da parte per tirare l''incoronazione scozzese. Sebbene una successiva serie di cinque locomotive non delineate fu prodotta nel 1938, la maggior parte della classe di incoronazione che ne seguì fu superata come streamliner. Alla fine, dal 1944 al 1949, tutti i nuovi motori sarebbero stati costruiti in modo non semplificato e tutti gli streamliner sarebbero stati rimossi i loro involucri. L''ultima delle 38 locomotive fu completata nel 1948.

La classe di incoronazione fu probabilmente dipinta con più stili di livrea rispetto a qualsiasi altra classe di motori, sette nell''era LMS fino al 1947 e altre cinque durante l''era delle ferrovie britanniche dal 1948 in poi. Ciò non significa che tutte e 38 le locomotive siano state verniciate in tutti questi stili diversi; molti erano specifici per pochi motori. L''unico stile che tutti e 38 portavano erano le ferrovie britanniche allineate a Brunswick Green e l''intera classe fu scoperta così tra il 1955 e il 1958.
In tutti i viaggi in Gran Bretagna era consuetudine cambiare motore in posizioni convenienti per evitare il lungo processo di ricombustione. Le locomotive di incoronazione erano quindi strategicamente posizionate in punti chiave tra Londra e Glasgow e sarebbero state assegnate al capannone in quella posizione. Le località prescelte erano a Londra (capannone di Camden), Crewe (Crewe North), Carlisle (Upperby) e Glasgow (Polmadie). Fu solo negli ultimi giorni di vapore che il mix di incarichi di capannone divenne più fluido.
Mentre la classe di incoronazione era rappresentata nelle prove di scambio di locomotive delle ferrovie britanniche del 1948, progettate per confrontare le prestazioni di locomotive simili da tutte e quattro le società prenazionalizzate, il motore rappresentativo ha funzionato in modo disastroso. Non c''era più traccia del potere che poteva essere scatenato da questi motori; invece, l''obiettivo era il consumo insolitamente basso di carbone. Se le prove fossero dimenticabili, altri risultati della classe sono sicuramente memorabili.
In primo luogo, l''incoronazione numero 6220 ha registrato il record di velocità del vapore britannico tra il 1937 e il 1938. In secondo luogo, la numero 6234, Duchessa di Abercorn, detiene il record fino ad oggi per la più grande potenza britannica registrata ufficialmente su un''auto a dinamometro collegata, ottenuta nel 1939 Sfortunatamente l''evento più memorabile nella storia della classe fu l''incidente ferroviario di Harrow e Wealdstone precipitato dalla città di Glasgow di 46242. Questo è stato il secondo peggior incidente ferroviario della storia britannica, con il bilancio delle vittime 112.

Dopo un decennio riuscito di operazioni negli anni cinquanta, il piano di modernizzazione degli anni sessanta fu il massimo annullamento delle incoronazioni. Non solo l''uso crescente di locomotive diesel ha reso ridondanti molte delle classi, ma l''elettrificazione della linea principale tra Londra Euston e Crewe ha anche portato alla loro espulsione da questa importante sezione della linea principale in quanto non vi era spazio sufficiente tra le locomotive e i fili sotto tensione. Senza un ruolo utile da svolgere, i sopravvissuti furono demoliti in massa alla fine del 1964. Tre locomotive furono salvate per la conservazione. Ad ottobre 2016, due sono statici nei musei, mentre il terzo è completamente certificato per il servizio di linea principale.','immagine'),



('Maglev EDS','SCMaglev','Railway Technical Research Institute','Alta velocità (Super espresso)',603,'2011-Oggi','Il treno utilizza magneti superconduttori e sospensioni elettrodinamiche, al contrario del Transrapid, che utilizza convenzionali elettromagneti e sospensioni elettromagnetiche di tipo attrattivo. Il "Superconducting Maglev Shinkansen" sviluppato dalla Central Japan Railway Co. ("JR Central") e Kawasaki Heavy Industries è quindi attualmente il treno più veloce del mondo. La proposta del Chūō Shinkansen è stata approvata il 27 maggio 2011, la costruzione è iniziata nel 2012 e nel 2027 Tokyo e Nagoya verranno collegate dal maglev in quaranta minuti; il completamento del tracciato fino a Osaka avverrà verso il 2040, e Tokyo sarà unita con Osaka in un''ora e sette minuti; il tracciato di test entrerà a far parte della linea.
Il treno che presterà servizio è una diretta derivazione del JR-Maglev e si chiama Shinkansen Serie L0, costruito da un consorzio formato dalla Mitsubishi Heavy Industries e dalla Nippon Sharyo. Il treno sarà a guida automatica, senza macchinista a bordo.

Per frenare si usano due sistemi: il primo, quello principale, è un sistema magnetico che inverte la polarità dei magneti, facendo decelerare il treno; il secondo è un sistema di aerofreni di derivazione aeronautica, che agiscono grazie all''attrito con l''aria.
Il treno si solleva di circa 10 millimetri da terra per l''azione di magneti posti sulla "rotaia guida" e di altri magneti superconduttori posti lungo tutto il treno, in una speciale lega di niobio e titanio raffreddata a -269 °C da elio liquido.','immagine'),



('Maglev EMS', 'M-Bahn','Magnetbahn GmbH','Trasporto locale',80,'1983-1991','La prima sezione della U-Bahn di Berlino da costruire comprendeva una sezione elevata tra le stazioni di Gleisdreieck e Potsdamer Platz. Dopo la spartizione di Berlino, la stazione di Gleisdreieck si trovava a Berlino Ovest mentre la stazione di Potsdamer Platz era direttamente sotto il confine con Berlino Est. Dopo la costruzione del muro di Berlino nel 1961, i treni di entrambi i lati terminarono all''ultima stazione prima di Potsdamer Platz. Intorno al 1972 anche le due stazioni prima di Potsdamer Platz, sul lato occidentale, chiudevano, perché l''area servita da queste stazioni era anche servita da un''altra linea U-Bahn.
L''area di Berlino Ovest adiacente a Potsdamer Platz richiedeva quindi un collegamento con la U-Bahn, e alla fine questa necessità fu soddisfatta dalla costruzione della M-Bahn, che utilizzava le piattaforme abbandonate della U-Bahn a Gleisdreieck e i binari della U-Bahn verso nord verso il confine. Poi si è leggermente spostato verso ovest per terminare vicino a Potsdamer Platz ma ancora a Berlino Ovest.

I lavori sulla linea iniziarono nel 1983 e le prime prove, senza passeggeri, si svolsero nel giugno 1984 nella parte meridionale della linea. I test iniziali hanno utilizzato un''auto precedentemente utilizzata sulla pista di prova della Magnetbahn GmbH vicino a Brunswick e le prime due auto appositamente costruite per Berlino sono state consegnate alla fine del 1986. L''intenzione originale era che il servizio pubblico potesse iniziare nel maggio 1987, ma un incendio alla stazione di Gleisdreieck nell''aprile di quell''anno distrusse una delle due macchine e danneggiò gravemente l''altra.
Alla fine furono costruite altre quattro auto, dello stesso design delle due originali. Diverse date di apertura previste non furono rispettate e, nel dicembre 1988, un treno di prova non riuscì a fermarsi a Kemperplatz e una delle auto si schiantò a terra e fu distrutta. Un servizio pubblico alla fine iniziò nell''agosto 1989, sebbene il servizio fosse intermittente e non garantito, e le tariffe non furono addebitate. Il servizio passeggeri regolare ufficiale, nell''ambito del sistema di trasporto pubblico integrato di Berlino, è iniziato nel luglio 1991.

A questo punto il muro di Berlino era caduto, qualcosa che non si poteva prevedere quando iniziò la costruzione. È diventato desiderabile ristabilire la linea U-Bahn che era stata precedentemente interrotta, richiedendo la rimozione della M-Bahn dal suo diritto di passaggio. Anche la principale necessità della M-Bahn era stata rimossa, in quanto l''area da essa servita era di nuovo facilmente accessibile dalla stazione di Potsdamer Platz. Lo smantellamento della M-Bahn è iniziato solo due mesi dopo la sua apertura ufficiale, ed è stato completato nel febbraio 1992. Il collegamento U-Bahn tra Gleisdreieck e Potsdamer Platz è stato ripristinato, diventando parte della linea U2.','immagine'),



('Maglev EMS', 'Transrapid','Deutsche Bundesbahn','Alta velocità (Super espresso)',500,'2002-2011','Il Transrapid usa la tecnologia a sospensione elettromagnetica (EMS).
Il motore lineare sincrono utilizzato dal Transrapid viene utilizzato per muovere il treno e per frenarlo. Funziona come un motore rotativo elettrico in cui lo statore è stato aperto e disteso lungo la rotaia. All''interno delle bobine le correnti alternate generano un campo magnetico che muove il treno senza contatto fisico con la rotaia. Ogni rotaia è in grado di portare treni in un solo senso, rendendo gli scontri fra treni che viaggiano in senso opposto impossibili e limitando la possibilità di collisione ad eventuali tamponamenti.
Il sistema maglev non ha assi di trasmissione, ruote o pantografo. Il treno non rotola bensì lèvita. Il sistema elettronico garantisce che la distanza dalla rotaia rimanga costante (10 millimetri). Per stazionare sopra la rotaia il maglev richiede meno energia di quella richiesta dal sistema di aria condizionata del treno. Il sistema di livellamento e tutta l''elettronica a bordo vengono alimentate dalle oscillazioni armoniche del campo magnetico dello statore lineare. Queste oscillazioni non possono essere utilizzate come sistema di propulsione. In caso di mancata alimentazione della rotaia il Transrapid utilizza le batterie di riserva installate a bordo della motrice per mantenere il treno in levitazione e muoverlo. 
Costi di costruzione

Costruire una linea maglev è più economico che costruire una linea convenzionale ad alta velocità dato che i maggiori componenti sono prodotti prefabbricati ed assemblati in loco, non necessitando di tutti gli accorgimenti necessari ad una linea ad alta velocità, ottenendo così il risultato di un costo inferiore mediamente tra il 20 ed il 50% rispetto ad una linea ad alta velocità. Di contro un locomotore maglev è molto più costoso di un locomotore classico e in sostanza i costi di costruzione complessivi o si equivalgono o rendono il maglev più costoso.

Sebbene il maglev costi di più nella costruzione delle infrastrutture, consente di risparmiare in costi di esercizio e di manutenzione essendo il metodo di trasporto più efficiente di un treno standard.

Basati su un brevetto del 1934, i progetti per l''attuale Transrapid iniziarono nel 1969. La linea di test, costruita su un percorso che corre a circa 8 metri dal suolo, si trova a Emsland in Germania ed è stata completata nel 1987.
Nel 2002, la prima implementazione commerciale è stato completato - il Maglev Train Shanghai , che collega la città della rete di trasporto rapido di Shanghai 30,5 km (18.95 mi) a Shanghai Pudong International Airport . Il sistema Transrapid non è ancora stato implementato su una linea intercity a lunga distanza.','immagine');


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

INSERT INTO Utenti(Nome,Cognome,Username,Mail,Password,Bio,Is_User_Type,Immagine) VALUES
('Giacomo','Poretti','Giacomino','gporetti@gmail.com','Qwerty123','Prendo una valigia leggera e salgo sul treno, carrozza meraviglia, lato finestrino, vicino all’imprevedibile',0,'immagine'),
('Davide','Carlet','Davidone','dcarlet@gmail.com','asd55AS','Trent''anni come macchinista e ancora mi emoziono quando salgo in carrozza',0,'inmmagine'),
('Chiara','Perin','chiaraperin','cperin@gmail.com','Chiara4563','Dirigente Trenitalia da sette mesi, appassionata di treni da sempre',0,'immagine'),
('Pippo','Franco','pippofranco','pfranco@gmail.com','Pippo123','Conduttore televisivo di fama internazionale, dedico i miei ultimi anni alla mia più grande passione',0,'immagine'),
('Giorgio','Andrea','giorgioandrea','gandrea@gmail.com','Giorgino123','Le ferrovie sono qualcosa di sorprendentemente silenzioso, quando non ci passa sopra il treno',0,'immagine'),
('Stefania','Rossi','stefaniarossi','srossi@gmail.com','bghH67','La vita è il treno, non la stazione ferroviaria',0,'immagine'),
('Giulia','Verdi','giuliaverdi','gverdi@gmail.com','678hgDDR','In treno: sognare dal finestrino e a ogni stazione lasciare salire nuovi pensieri',0,'immagine'),
('Francesco','Veronese','fveronese','fveronese@gmail.com','nmk89F5','Non c’è treno che non prenderei, non importa dove sia diretto.',0,'immagine'),
('Hideo','Kojima','hideokojima','hkojima@gmail.com','Lalala89','Trains master',0,'immagine'),
('Margherita','Dal Mas','marghedalmas','mdalmas@gmail.com','jijo5363','E poi, il treno, nel viaggiare, sempre ci fa sognare',0,'immagine');




CREATE TABLE Commenti(
	Id_Commento integer auto_increment PRIMARY KEY,
	Testo varchar(500) not null,
	Data datetime not null,
	Id_Utente integer,
	Id_Treno integer,
	FOREIGN KEY (Id_Utente) REFERENCES Utenti(Id_Utente) ON DELETE CASCADE,
	FOREIGN KEY (Id_Treno) REFERENCES Treni(Id_Treno) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO Commenti(Testo,Data,Id_Utente,Id_Treno) VALUES
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,1,3),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,2,1),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,2,5),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,2,6),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,4,4),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,4,7),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,6,9),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,6,10),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,6,12),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,7,8),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,7,12),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,8,13),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,9,2),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,9,8),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,9,11),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,9,12),
('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur. Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',CURRENT_TIMESTAMP,10,4);



CREATE TABLE Preferiti(
	Id_Utente integer,
	Id_Treno integer,
	PRIMARY KEY(Id_Utente,Id_Treno),
	FOREIGN KEY (Id_Utente) REFERENCES Utenti(Id_Utente) ON DELETE CASCADE,
	FOREIGN KEY (Id_Treno) REFERENCES Treni(Id_Treno) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO Preferiti(Id_Utente,Id_Treno) VALUES
(1,1),(1,8),
(2,2),(2,6),(2,9),(2,13),
(3,3),(3,4),
(4,5),(4,7),(4,10),(4,11),
(5,6),(5,12),
(6,4),(6,10),
(7,3),(7,11),(7,13),
(8,1),(8,8),(8,10),(8,12),
(9,2),(9,7),
(10,5),(10,9),(10,11);



CREATE TABLE Proposte(
	Id_Utente integer,
	Id_Treno integer,
	PRIMARY KEY(Id_Utente,Id_Treno),
	FOREIGN KEY (Id_Utente) REFERENCES Utenti(Id_Utente) ON DELETE CASCADE,
	FOREIGN KEY (Id_Treno) REFERENCES Treni(Id_Treno) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO Proposte(Id_Utente,Id_Treno) VALUES
();