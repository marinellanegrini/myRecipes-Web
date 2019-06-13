DROP DATABASE IF EXISTS myRecipes;
CREATE DATABASE myRecipes;
USE myRecipes;


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
	procedimento VARCHAR(600) NOT NULL,
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
    data LONGBLOB NOT NULL,
    type VARCHAR(20) NOT NULL,
    id_utente SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_utente) REFERENCES utente(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE imgcibo(
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    data LONGBLOB NOT NULL,
    type VARCHAR(20) NOT NULL,
    id_cibo SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_cibo) REFERENCES cibo(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE imgricetta(
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    data LONGBLOB NOT NULL,
    type VARCHAR(20) NOT NULL,
    id_ricetta SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_ricetta) REFERENCES ricetta(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE galleryricetta(
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    data LONGBLOB NOT NULL,
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
('Patate al forno',2,'Lavare le patate e tagliarle. \n Porre le patate in una teglia e aggiungete olio e il sale. \n Porre in forno preriscaldato a 200°C per 1 ora.','01:20:00',4,4,0),
('Patate fritte',2,'Lavare le patate e tagliarle. \n Friggere le patate nell\'olio bollente a 170°C. \n Trasferirle in un vassoio e aggiungere il sale.','00:25:00',4,4,0),
('Carbonara',3,'Porre sul fuoco una pentolo con l\'acqua salata. Eliminare la cotenna dal guanciale, tagliarlo a striscioline spesse di un centimento, metterli in una padella antiaderente e rosolare per 15 min a fiamma media. Nel frattempo tuffate gli spaghetti nell\'acqua bollente. Versare i tuorli in una ciotola, aggiugendo il pecorino, insaporire con il pepe e amalgamare il tutto con una frusta.Intanto il guanciale sarà giunto a cottura, spegnete il fuoco e tenetelo da parte. Scolate la pasta nel tegame con il guanciale. Tohlietela dal fuoco e versate il composto di uova e pecorino nel tegame. Infine saltate la pasta per amalgamare e servitela ','00:25:00',4,1,2),
('Insalata di riso',2,'Per realizzare l’insalata di riso ponete sul fuoco una pentola colma di acqua salata e una volta che avrà raggiunto il bollore versate il riso. Lavate e tagliate a metà i pomodori e tagliateli a cubetti. Tagliate a cubetti anche il prosciutto cotto e a rondelle le olive nere. Quando mancheranno circa 2-3 minuti dalla cottura, scolate il riso e lasciatelo raffreddare così. Incorporare nel riso i filetti di tonno sbriciolati, il prosciutto cotto, le olive nere e i pomodorini. Aggiustate di sale e mescolate con un cucchiaio. Porla in frigorifero fino al momento di servirla così sarà ben fredda e i sapori si saranno amalgamati.','00:35:00',4,6,0),
('Torta al cioccolato',3,'Tritate il cioccolato fondente, quindi scioglietelo al microonde o a bagnomaria e lasciatelo intiepidire. \n Tagliate il burro a cubetti e versatelo nella ciotola, insieme allo zucchero . \n Azionate la macchina a velocità media con la frusta montata e lavorate il burro fino a ridurlo in crema . \n A questo punto rompete le uova in una ciotola. Continuate in questo modo fino ad ottenere una crema soffice ed omogenea . Incorporate il cioccolato, versandolo direttamente nella ciotola e continuate a sbattere fino ad amalgamarlo. \n Aggiungete il sale all’impasto e mescolate in una ciotolina la farina con il cacao e il lievito, quindi setacciatele direttamente nel composto al cioccolato e aiutandovi con una spatola incorporatele delicatamente nell’impasto. \n Foderate con la carta forno una tortiera da 22-24 cm e versate l’impasto al suo interno 15. \n Infornate in forno statico preriscaldato a 180° per circa 40-45 minuti. \n Una volta cotta sfornate la torta al cioccolato e lasciatela intiepidire.','01:30:00',8,5,0),
('Pomodorini confit',1,'Per preparare i pomodorini confit, iniziate lavando i pomodorini sotto acqua corrente. Asciugateli con un canovaccio o carta da cucina e poneteli su un tagliere, quindi dividete tutti i pomodorini a metà. Ora disponete i pomodorini tagliati su una leccarda ricoperta di carta forno con la parte del taglio rivolta verso l’alto. Dopodichè salate e pepate a piacere. A questo punto preparate il trito di aglio: sbucciate uno spicchio d’aglio e tritatelo finemente. Infine versatelo su ogni pomodorino e aggiungete anche lo zucchero. Distribuite l’origano secco e infine versate un filo d’olio su ogni pomodorino. Infornate il tutto a in forno statico preriscaldato a 140° per circa 2 ore, fino a quando l’acqua di vegetazione dei pomodorini non sarà evaporata e questi non risulteranno leggermente abbrustoliti ma non secchi','01:10:00',4,1,0),
('Barrette cocco e cioccolato',2,'Versate il cocco rapè in una ciotola, aggiungete il latte condensato e il sale e mescolate con una spatola. \n Trasferite il tutto su un foglio di carta forno e con le mani pressate il composto in modo da ricavare un rettangolo. \n Trasferite in frigorifero a raffreddare per circa 1 ora. Dividete il composto, posto in frigorifero, con il coltello in modo da ricavare 12 barrette. \n Nel frattempo tritate il cioccolato e fondetelo a bagnomaria. \n  Mescolate con una spatola il cioccolato, portandolo a raggiungere i 31-30°. \n Immergete all''interno del cioccolato fuso una delle barrette aiutandovi con una forchetta. \n Sistematele man mano sulla gratella e proseguite a ricoprire tutte le altre con il cioccolato. Decorate con un po'' di cocco rapè la superficie e lasciate cristallizzare a temperatura ambiente. \n Non appena il cioccolato sarà completamente asciutto potrete servire le barrette al cocco e cioccolato. ','00:01:00',12,5,0),
('Crocchette di patate',2,'Lavate le patate, ponetele a lessare in un tegame versando acqua fino a coprirle e senza sbucciarle per circa 40 min. \n Lasciatele intiepidire e poi sbucciatele, passatele in uno schiacciapatate per ottenere una purea. \n In una ciotolina sbattete i tuorli con pepe e sale e poi aggiungeteli alla purea di patate e aggiungete la noce moscata grattugiata e insaporite con il formaggio grattugiato, amalgamare gli ingredienti fino ad ottenere un composto morbido e asciutto. \n Prendete una porzione di impasto e formate le crocchette dando una forma a cilindo. \n  Una volta ultimato l’impasto impanate le crocchette: preparate due ciotole rispettivamente con le due uova sbattute e l''altra con il pangrattato. Passate le crocchette prima nell’uovo e poi nel pangrattato. \n Adagiate le crocchette su un vassoio rivestito con carta da forno. \n Scaldate abbondante olio di arachidi in un tegame fino a raggiungere i 180-190° e poi tuffate all’interno 3-4 crocchette alla volta. \n Scolatele e mettetele a scolare dell’olio in eccesso su di un piatto foderato con carta assorbente. \n Servite le crocchette di patate ancora calde!','01:15:00',10,3,0);

/**
* Inserimento dei dati nella tabella commento
* INSERIRE ID RICETTA
*/
INSERT INTO commento (testo, data, ora, bannato, id_utente, id_ricetta) VALUES
('Ricetta molto buona. Consigliatissima','2018-02-28','12:10:30',false,3,3),
('Ho provato a replicare la ricetta, non ho ottenuto il risultato desiderato','2019-01-30','20:25:59',false,2,1),
('Posso sostituire il burro con l\'olio?','2019-04-18','15:45:01',false,1,2),
('Sono riuscita a replicare perfettamente la ricetta!','2019-03-18','10:45:01',false,1,1),
('Uno schifo, meglio il Mc Flurry del mc','2018-09-01','08:15:22',false,5,2),
('Un piatto veramente delicato','2019-03-13','17:59:48',false,4,1),
('Consiglio di mettere meno zucchero, uscirà più soffice','2019-04-15','09:58:32',false,6,1),
('Fatta ieri sera per festeggiare un Compleanno: è venuta buonissima è molto apprezzata dai mie ospiti: grazie ragazzi !!!!!!','2019-03-13','19:59:48',false,7,1),
('Ho preparato questa torta per un compleanno! E''uscita molto bene!','2018-02-15','18:58:32',false,3,6),
('Posso sostituire il guanciale con la pancetta?','2019-04-15','12:58:32',false,5,4),
('Consiglio di mettere meno burro, uscirà più soffice','2019-04-15','09:58:32',false,5,6);



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
('Tonno sott\'olio','gr'),
('Cioccolato fondente','gr'),
('Lievito per dolci','gr'),
('Cacao','gr'),
('Zucchero','gr'),
('Burro','gr'),
('Pomodorini ciliegino','gr'),
('Aglio','spicchi'),
('Origano','gr'),
('Cocco rapè','gr'),
('Latte condensato','gr'),
('Patate Rosse','gr'),
('Noce moscata','gr'),
('Parmigiano','gr'),
('Pangrattato','gr');


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
(500,10);


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
(4,12),
(4,3),
(4,5),
(4,4),
(4,6),
(4,11),
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
(9,10);


INSERT INTO imgcibo(id,data,type,id_cibo) VALUES
(1,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/olio-doliva.jpg'),'image/jpg',1),
(2,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/uova.jpg'),'image/jpg',2),
(3,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/sale.jpg'),'image/jpg',3),
(4,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/pasta.jpg'),'image/jpg',4),
(5,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/pecorino.jpg'),'image/jpg',5),
(6,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/pepe.jpeg'),'image/jpeg',6),
(7,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/patate.jpg'),'image/jpg',7),
(8,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/farina-00.jpg'),'image/jpg',8),
(9,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/farina_integrale.jpg'),'image/jpg',9),
(10,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/oliosemi.jpg'),'image/jpg',10),
(11,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/guanciale.jpg'),'image/jpg',11),
(12,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/Tuorli.png'),'image/png',12),
(13,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/riso.jpg'),'image/jpg',13),
(14,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/pomodori.png'),'image/png',14),
(15,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/prosciuttocotto.jpg'),'image/jpg',15),
(16,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/olivenere.jpg'),'image/jpg',16),
(17,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/tonno.jpg'),'image/jpg',17),
(18,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/cioccolatofondente.jpg'),'image/jpg',18),
(19,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/lievitoperdolci.jpg'),'image/jpg',19),
(20,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/cacao.jpg'),'image/jpg',20),
(21,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/zucchero.jpg'),'image/jpg',21),
(22,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/burro.jpg'),'image/jpg',22),
(23,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/pomodorini.jpg'),'image/jpg',23),
(24,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/Aglio.jpg'),'image/jpg',24),
(25,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/origano.jpg'),'image/jpg',25),
(26,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/coccorape.jpg'),'image/jpg',26),
(27,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/lattecondensato.jpg'),'image/jpg',27),
(28,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/pataterosse.jpg'),'image/jpg',28),
(29,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/nocemoscata.jpg'),'image/jpg',29),
(30,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/parmigiano.jpg'),'image/jpg',30),
(31,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Cibo/pangrattato.jpg'),'image/jpg',31);

INSERT INTO imgricetta(id,data,type,id_ricetta) VALUES
(1,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Ricetta/uova-sode.jpg'),'image/jpg',1),
(2,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Ricetta/patate-al-forno.jpg'),'image/jpg',2),
(3,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Ricetta/patate-fritte.jpg'),'image/jpg',3),
(4,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Ricetta/carbonara.jpg'),'image/jpg',4),
(5,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Ricetta/insalatadiriso.jpg'),'image/jpg',5),
(6,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Ricetta/tortacioccolato.jpg'),'image/jpg',6),
(7,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Ricetta/pomodoriconfit.jpg'),'image/jpg',7),
(8,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Ricetta/bounty.jpg'),'image/jpg',8),
(9,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Ricetta/crocchettepatate.jpg'),'image/jpg',9);


INSERT INTO imgutente(id,data,type,id_utente) VALUES
(1,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Utente/arianna.jpg'),'image/jpg',1),
(2,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Utente/marinella.jpg'),'image/jpg',2),
(3,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Utente/valepa.jpg'),'image/jpg',3),
(4,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Utente/lorenzo.jpg'),'image/jpg',4),
(5,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Utente/oscar.jpg'),'image/jpg',5),
(6,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Utente/valeio.jpg'),'image/jpg',6),
(7,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/Utente/claudia.jpg'),'image/jpg',7);

INSERT INTO galleryricetta(id,data,type,id_ricetta) VALUES
(1,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/uovaacqua.jpg'),'image/jpg',1),
(2,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/togliuova.jpeg'),'image/jpeg',1),
(3,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/uovasuode.jpg'),'image/jpg',1),
(4,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/mmyRecipes/images/GalleryRicetta/fineuova.jpg'),'image/jpg',1),
(5,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/mmyRecipes/images/GalleryRicetta/pentola.jpg'),'image/jpg',1),
(6,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/guanciale.jpg'),'image/jpg',4),
(7,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/tuorliepecorino.jpg'),'image/jpg',4),
(8,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/guancialerosolato.jpg'),'image/jpg',4),
(9,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/mmyRecipes/images/GalleryRicetta/padella.jpg'),'image/jpg',4),
(10,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/pentola.jpg'),'image/jpg',5),
(11,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/mmyRecipes/images/GalleryRicetta/pomodorini.jpg'),'image/jpg',5),
(12,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/mmyRecipes/images/GalleryRicetta/prosciuttocotto.jpg'),'image/jpg',5),
(13,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/olivenere.jpg'),'image/jpg',5),
(14,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/mmyRecipes/images/GalleryRicetta/insalatadiriso.jpg'),'image/jpg',5),
(15,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/lavapomodorini.jpg'),'image/jpg',7),
(16,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/mmyRecipes/images/GalleryRicetta/tagliarepomodorini.jpg'),'image/jpg',7),
(17,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/mmyRecipes/images/GalleryRicetta/pomodorinisuleccarda.jpg'),'image/jpg',7),
(18,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/pomodorinifiniti.jpg'),'image/jpg',7),
(19,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/torta.jpg'),'image/jpg',6),
(20,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/mmyRecipes/images/GalleryRicetta/teglia.jpg'),'image/jpg',6),
(21,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/mmyRecipes/images/GalleryRicetta/farinaecacao.jpg'),'image/jpg',6),
(22,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/torta.jpg'),'image/jpg',6),
(23,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/bounty.jpg'),'image/jpg',8),
(24,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/mmyRecipes/images/GalleryRicetta/cioccolato.jpg'),'image/jpg',8),
(25,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/mmyRecipes/images/GalleryRicetta/lattecondensato.jpg'),'image/jpg',8),
(26,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/coccorape.jpg'),'image/jpg',8),
(27,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/bollirepatate.jpg'),'image/jpg',9),
(28,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes/images/GalleryRicetta/schiaccpatate.jpg'),'image/jpg',9);