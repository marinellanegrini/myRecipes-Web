CREATE TABLE cibo (
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome VARCHAR(60) NOT NULL,
	unitamisura VARCHAR(10) NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE utente (
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome VARCHAR(60) NOT NULL,
	cognome VARCHAR(60) NOT NULL,
	username VARCHAR(20) NOT NULL,
	password VARCHAR(20) NOT NULL,
	email VARCHAR(50) NOT NULL,
	stato BOOLEAN NOT NULL,
	PRIMARY KEY (id)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE categoria(
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome VARCHAR(60) NOT NULL,
	PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE ricetta(
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome VARCHAR(60) NOT NULL,
	difficolta SMALLINT NOT NULL,
	procedimento VARCHAR(1600) NOT NULL,
	tprep TIME NOT NULL,
	ndosi SMALLINT NOT NULL,
	id_categoria SMALLINT UNSIGNED NOT NULL,
	nsalvataggi SMALLINT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(id_categoria) REFERENCES categoria(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE ingrediente (
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	qta SMALLINT NOT NULL,
	id_cibo SMALLINT UNSIGNED NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_cibo) REFERENCES cibo(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE rictoingr (
	id_ricetta SMALLINT UNSIGNED NOT NULL,
	id_ingrediente SMALLINT UNSIGNED NOT NULL,
	PRIMARY KEY(id_ricetta,id_ingrediente),
	FOREIGN KEY (id_ricetta) REFERENCES ricetta(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_ingrediente) REFERENCES ingrediente(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE utprefric (
	id_ricetta SMALLINT UNSIGNED NOT NULL,
	id_utente SMALLINT UNSIGNED NOT NULL,
	PRIMARY KEY(id_ricetta,id_utente),
	FOREIGN KEY (id_ricetta) REFERENCES ricetta(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_utente) REFERENCES utente(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE commento(
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	testo VARCHAR(150) NOT NULL,
	data DATE NOT NULL,
	ora TIME NOT NULL,
	bannato BOOLEAN NOT NULL,
	id_utente SMALLINT UNSIGNED NOT NULL,
	id_ricetta SMALLINT UNSIGNED NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_utente) REFERENCES utente(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_ricetta) REFERENCES ricetta(id) ON DELETE CASCADE ON UPDATE CASCADE
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE imgutente(
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    data longblob NOT NULL,
    type VARCHAR(20) NOT NULL,
    id_utente SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_utente) REFERENCES utente(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE imgcibo(
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    data longblob NOT NULL,
    type VARCHAR(20) NOT NULL,
    id_cibo SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_cibo) REFERENCES cibo(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE imgricetta(
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    data longblob NOT NULL,
    type VARCHAR(20) NOT NULL,
    id_ricetta SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_ricetta) REFERENCES ricetta(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE galleryricetta(
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    data longblob NOT NULL,
    type VARCHAR(20) NOT NULL,
    id_ricetta SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_ricetta) REFERENCES ricetta(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


/**
* Inserimento dei dati nella tabella utente
*/

INSERT INTO utente (nome,cognome,username,password,email,stato) VALUES
('Arianna','Tusi','Arianna98','arianna','ariannatusi@live.it',false),
('Marinella','Negrini','Negrini98','marinella','marinella.negrini@gmail.com',true),
('Valeria','Parascandolo','ValeriaPara','valeria97','parascandolovaleria@gmail.com',false),
('Lorenzo','Colarossi','LoreCola','lorenzo97','lorenzo.colarossi@gmail.com',true),
('Oscar','Guerra','OscGue','oscar96','oscar.guerra@gmail.com',false),
('Valeria','Ioannucci','valeioan','ioannucciv','valeriaioannucci@yahoo.it',true),
('Claudia','Recchia','claurecc','claudia97','claudiarecchia@live.it',false);

/**
* Inserimento dei dati nella tabella categoria
*/
INSERT INTO categoria (nome) VALUES
('Primi piatti'),
('Secondi piatti'),
('Antipasti'),
('Contorni'),
('Dolci'),
('Piatti unici');

/**
* Inserimento dei dati nella tabella ricetta
*/
INSERT INTO ricetta(nome,difficolta,procedimento,tprep,ndosi,id_categoria,nsalvataggi) VALUES
('Uova sode',1,'Porre le uova in una pentola e versarci l\'acqua fredda fino a ricoprire. \n Porre il pentolino sul fuoco e fate arrivare a bollore. \n Dal bollore calcolate 9 minuti di cottura','00:09:00',4,2,3 ),
('Patate al forno',2,'Lavare le patate e tagliarle. \n Porre le patate in una teglia e aggiungete olio e il sale. \n Porre in forno preriscaldato a 200&ordm;C per 1 ora.','01:20:00',4,4,0),
('Patate fritte',2,'Lavare le patate e tagliarle. \n Friggere le patate nell\'olio bollente a 170°C. \n Trasferirle in un vassoio e aggiungere il sale.','00:25:00',4,4,0),
('Carbonara',3,'Porre sul fuoco una pentolo con l\'acqua salata. Eliminare la cotenna dal guanciale, tagliarlo a striscioline spesse di un centimento, metterli in una padella antiaderente e rosolare per 15 min a fiamma media. Nel frattempo tuffate gli spaghetti nell\'acqua bollente. Versare i tuorli in una ciotola, aggiugendo il pecorino, insaporire con il pepe e amalgamare il tutto con una frusta.Intanto il guanciale sar&agrave; giunto a cottura, spegnete il fuoco e tenetelo da parte. Scolate la pasta nel tegame con il guanciale. Tohlietela dal fuoco e versate il composto di uova e pecorino nel tegame. Infine saltate la pasta per amalgamare e servitela ','00:25:00',4,1,2),
('Insalata di riso',2,'Per realizzare l\’insalata di riso ponete sul fuoco una pentola colma di acqua salata e una volta che avr&agrave; raggiunto il bollore versate il riso. Lavate e tagliate a met&agrave; i pomodori e tagliateli a cubetti. Tagliate a cubetti anche il prosciutto cotto e a rondelle le olive nere. Quando mancheranno circa 2-3 minuti dalla cottura, scolate il riso e lasciatelo raffreddare cos&igrave. Incorporare nel riso i filetti di tonno sbriciolati, il prosciutto cotto, le olive nere e i pomodorini. Aggiustate di sale e mescolate con un cucchiaio. Porla in frigorifero fino al momento di servirla cos&igrave sar&agrave; ben fredda.','00:35:00',4,6,0),
('Torta al cioccolato',3,'Tritate il cioccolato fondente, quindi scioglietelo al microonde o a bagnomaria e lasciatelo intiepidire. \n Tagliate il burro a cubetti e versatelo nella ciotola, insieme allo zucchero . \n Azionate la macchina a velocit&agrave; media con la frusta montata e lavorate il burro fino a ridurlo in crema . \n A questo punto rompete le uova in una ciotola. Continuate in questo modo fino ad ottenere una crema soffice ed omogenea . Incorporate il cioccolato, versandolo direttamente nella ciotola e continuate a sbattere fino ad amalgamarlo. \n Aggiungete il sale all\'impasto e mescolate in una ciotolina la farina con il cacao e il lievito, quindi setacciatele direttamente nel composto al cioccolato e aiutandovi con una spatola incorporatele delicatamente nell’impasto. \n Foderate con la carta forno una tortiera da 22-24 cm e versate l’impasto al suo interno 15. \n Infornate in forno statico preriscaldato a 180&ordm; per circa 40-45 minuti. \n Una volta cotta sfornate la torta al cioccolato e lasciatela intiepidire.','01:30:00',8,5,0),
('Pomodorini confit',1,'Per preparare i pomodorini confit, iniziate lavando i pomodorini sotto acqua corrente. Asciugateli con un canovaccio o carta da cucina e poneteli su un tagliere, quindi dividete tutti i pomodorini a met&agrave;. Ora disponete i pomodorini tagliati su una leccarda ricoperta di carta forno con la parte del taglio rivolta verso l’alto. Dopodich&egrave; salate e pepate a piacere. A questo punto preparate il trito di aglio: sbucciate uno spicchio d’aglio e tritatelo finemente. Infine versatelo su ogni pomodorino e aggiungete anche lo zucchero. Distribuite l’origano secco e infine versate un filo d\'olio su ogni pomodorino. Infornate il tutto a in forno statico preriscaldato a 140&ordm; per circa 2 ore, fino a quando l\'acqua di vegetazione dei pomodorini non sar&agrave; evaporata e questi non risulteranno leggermente abbrustoliti ma non secchi','01:10:00',4,3,0),
('Barrette cocco e cioccolato',2,'Versate il cocco rap&egrave; in una ciotola, aggiungete il latte condensato e il sale e mescolate con una spatola. \n Trasferite il tutto su un foglio di carta forno e con le mani pressate il composto in modo da ricavare un rettangolo. \n Trasferite in frigorifero a raffreddare per circa 1 ora. Dividete il composto, posto in frigorifero, con il coltello in modo da ricavare 12 barrette. \n Nel frattempo tritate il cioccolato e fondetelo a bagnomaria. \n  Mescolate con una spatola il cioccolato, portandolo a raggiungere i 31-30&ordm;. \n Immergete all''interno del cioccolato fuso una delle barrette aiutandovi con una forchetta. \n Sistematele man mano sulla gratella e proseguite a ricoprire tutte le altre con il cioccolato. Decorate con un po'' di cocco rap&egrave; la superficie e lasciate cristallizzare a temperatura ambiente. \n Non appena il cioccolato sar&agrave; completamente asciutto potrete servire le barrette al cocco e cioccolato. ','00:01:00',12,5,0),
('Crocchette di patate',2,'Lavate le patate, ponetele a lessare in un tegame versando acqua fino a coprirle e senza sbucciarle per circa 40 min. \n Lasciatele intiepidire e poi sbucciatele, passatele in uno schiacciapatate per ottenere una purea. \n In una ciotolina sbattete i tuorli con pepe e sale e poi aggiungeteli alla purea di patate e aggiungete la noce moscata grattugiata e insaporite con il formaggio grattugiato, amalgamare gli ingredienti fino ad ottenere un composto morbido e asciutto. \n Prendete una porzione di impasto e formate le crocchette dando una forma a cilindo. \n  Una volta ultimato l’impasto impanate le crocchette: preparate due ciotole rispettivamente con le due uova sbattute e l''altra con il pangrattato. Passate le crocchette prima nell\'uovo e poi nel pangrattato. \n Adagiate le crocchette su un vassoio rivestito con carta da forno. \n Scaldate abbondante olio di arachidi in un tegame fino a raggiungere i 180-190&ordm; e poi tuffate all\'interno 3-4 crocchette alla volta. \n Scolatele e mettetele a scolare dell\'olio in eccesso su di un piatto foderato con carta assorbente. \n Servite le crocchette di patate ancora calde!','01:15:00',10,3,0),
('Pasta fredda con tonno, pomodorini, mozzarella',4,'Lessare innanzitutto la pasta in abbondante acqua salata e scolarla al dente. \n Per favorirne il raffreddamento e bloccare la cottura &egrave; possibile passarla sotto l''acqua fredda dopo averla scolata, quando ancora &egrave; nello scolapasta. \n Unire in un''insalatiera la pasta, il tonno sgocciolato, il basilico, le olive a pezzettini e i pomodorini tagliati a piccoli pezzi. \n La mozzarella deve essere aggiunta, tagliata a cubetti, alla fine, poco prima di servire, per evitare che inacidisca. \n L''insalata di pasta fredda si può condire con sale, olio e basilico. Una variante per il condimento pu&ograve; essere, se piace, una miscela di olio e poca senape dolce, da distribuire uniformemente sul piatto. \n Naturalmente, a seconda dei gusti si possono aggiungere olive bianche, capperi, cubetti di formaggio o gamberetti, che renderanno ancora pi&ugrave; sfizioso il piatto.','00:20:00',4,4,0);


/**
* Inserimento dei dati nella tabella commento
* INSERIRE ID RICETTA
*/
INSERT INTO commento (testo, data, ora, bannato, id_utente, id_ricetta) VALUES
('Ricetta molto buona. Consigliatissima','2018-02-28','12:10:30',false,3,3),
('Ho provato a replicare la ricetta, non ho ottenuto il risultato desiderato','2019-01-30','20:25:59',false,2,1),
('Posso sostituire il burro con l''olio?','2019-04-18','15:45:01',false,1,2),
('Sono riuscita a replicare perfettamente la ricetta!','2019-03-18','10:45:01',false,1,1),
('Uno schifo, meglio il Mc Flurry del mc','2018-09-01','08:15:22',false,5,2),
('Un piatto veramente delicato','2019-03-13','17:59:48',false,4,1),
('Consiglio di mettere meno zucchero, uscir&agrave; pi&ugrave; soffice','2019-04-15','09:58:32',false,6,1),
('Fatta ieri sera per festeggiare un Compleanno: &egrave; venuta buonissima &egrave; molto apprezzata dai mie ospiti: grazie ragazzi !!!!!!','2019-03-13','19:59:48',false,7,1),
('Ho preparato questa torta per un compleanno! E''uscita molto bene!','2018-02-15','18:58:32',false,3,6),
('Posso sostituire il guanciale con la pancetta?','2019-04-15','12:58:32',false,5,4),
('Consiglio di mettere meno burro, uscir&agrave pi&ugrave soffice','2019-04-15','09:58:32',false,5,6);




/**
* Inserimento dei dati nella tabella categoria
*/
INSERT INTO cibo(nome, unitamisura) VALUES
('Olio','ml'),
('Uova','pz'),
('Sale','gr'),
('Pasta','gr'),
('Pecorino','gr'),
('Pepe','gr'),
('Patate','gr'),
('Farina 00','gr'),
('Farina integrale','gr'),
('Olio di semi','ml'),
('Guanciale','gr'),
('Tuorli','pz'),
('Riso Arborio','gr'),
('Pomodori','gr'),
('Prosciutto cotto','gr'),
('Olive nere','gr'),
('Tonno sott&#8217;olio','gr'),
('Cioccolato fondente','gr'),
('Lievito per dolci','gr'),
('Cacao','gr'),
('Zucchero','gr'),
('Burro','gr'),
('Pomodorini ciliegino','gr'),
('Aglio','spicchi'),
('Origano','gr'),
('Cocco rap&egrave;','gr'),
('Latte condensato','gr'),
('Patate Rosse','gr'),
('Noce moscata','gr'),
('Parmigiano','gr'),
('Pangrattato','gr'),
('Mozzarella','pz'),
('Basilico','gr');

/**
* Inserimento dei dati nella tabella ingrediente
*/
INSERT INTO ingrediente(qta,id_cibo) VALUES
(4,2),
(1000,7),
(30,1),
(5,3),
(800,7),
(700,10),
(320,4),
(150,11),
(6,12),
(5,6),
(50,5),
(300,13),
(150,14),
(100,15),
(200,16),
(150,18),
(8,19),
(50,20),
(180,21),
(200,22),
(180,8),
(6,2),
(500,23),
(2,24),
(25,21),
(35,1),
(5,25),
(200,26),
(150,27),
(250,18),
(900,28),
(5,29),
(100,30),
(20,31),
(30,12),
(2,2),
(500,10),
(1,32),
(10,33),
(160,17),
(200,23),
(350,4),
(10,1),
(50,16);



/**
* Inserimento dei dati nella tabella utprefric
*/
INSERT INTO utprefric(id_ricetta,id_utente) VALUES
(1,1),
(1,3),
(1,5),
(4,2),
(4,1);

/**
* Inserimento dei dati nella tabella rictoingr
*/
INSERT INTO rictoingr(id_ricetta,id_ingrediente) VALUES
(1,1),
(2,2),
(2,3),
(2,4),
(3,4),
(3,5),
(3,6),
(4,35),
(4,11),
(4,7),
(4,10),
(4,8),
(5,12),
(5,13),
(5,14),
(5,15),
(5,3),
(6,16),
(6,17),
(6,18),
(6,19),
(6,20),
(6,21),
(6,22),
(6,4),
(7,4),
(7,10),
(7,23),
(7,24),
(7,25),
(7,26),
(7,27),
(8,28),
(8,29),
(8,30),
(8,4),
(9,31),
(9,32),
(9,33),
(9,34),
(9,35),
(9,36),
(9,37),
(9,4),
(9,10),
(10,38),
(10,39),
(10,40),
(10,41),
(10,42),
(10,43),
(10,44),
(10,4);

