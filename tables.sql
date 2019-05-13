DROP DATABASE IF EXISTS myRecipes;
CREATE DATABASE myRecipes;
USE myRecipes;


CREATE TABLE cibo (
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome VARCHAR(60) NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE utente (
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome VARCHAR(60) NOT NULL,
	cognome VARCHAR(60) NOT NULL,
	username VARCHAR(20) NOT NULL,
	password VARCHAR(20) NOT NULL,
	email VARCHAR(50) NOT NULL,
	stato BOOLEAN NOT NULL,
	PRIMARY KEY (id)
	)ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE categoria(
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome VARCHAR(60) NOT NULL,
	PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE ingrediente (
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	qta SMALLINT NOT NULL,
	id_cibo SMALLINT UNSIGNED NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_cibo) REFERENCES cibo(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE rictoingr (
	id_ricetta SMALLINT UNSIGNED NOT NULL,
	id_ingrediente SMALLINT UNSIGNED NOT NULL,
	PRIMARY KEY(id_ricetta,id_ingrediente),
	FOREIGN KEY (id_ricetta) REFERENCES ricetta(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_ingrediente) REFERENCES ingrediente(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE utprefric (
	id_ricetta SMALLINT UNSIGNED NOT NULL,
	id_utente SMALLINT UNSIGNED NOT NULL,
	PRIMARY KEY(id_ricetta,id_utente),
	FOREIGN KEY (id_ricetta) REFERENCES ricetta(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_utente) REFERENCES utente(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


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
	)ENGINE=InnoDB DEFAULT CHARSET=latin1;




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
('Patate fritte',2,'Lavare le patate e tagliarle. \n Friggere le patate nell\'olio bollente a 170°C. \n Trasferirle in un vassoio e aggiungere il sale.','00:25:00',4,4,0);


/**
* Inserimento dei dati nella tabella commento
* INSERIRE ID RICETTA
*/
INSERT INTO commento (testo, data, ora, bannato, id_utente, id_ricetta) VALUES
('Ricetta molto buona. Consigliatissima','2018-02-28','12:10:30',false,3,3),
('Ho provato a replicare la ricetta, non ho ottenuto il risultato desiderato','2019-01-30','20:25:59',false,2,1),
('Posso sostituire il burro con l\'olio?','2019-04-18','15:45:01',false,1,1),
('Uno schifo, meglio il Mc Flurry del mc','2018-09-01','08:15:22',false,5,2),
('Un piatto veramente delicato','2019-03-13','17:59:48',false,4,1),
('Consiglio di mettere meno zucchero, uscirà più soffice','2019-04-15','09:58:32',false,6,1),
('Fatta ieri sera per festeggiare un Compleanno: è venuta buonissima è molto apprezzata dai mie ospiti: grazie ragazzi !!!!!!','2019-03-13','17:59:48',false,7,1);




/**
* Inserimento dei dati nella tabella categoria
*/
INSERT INTO cibo(nome) VALUES
('Olio'),
('Uova'),
('Sale'),
('Pasta'),
('Pecorino'),
('Pepe'),
('Patate'),
('Farina 00'),
('Farina integrale'),
('Olio di semi');


/**
* Inserimento dei dati nella tabella ingrediente
*/
INSERT INTO ingrediente(qta,id_cibo) VALUES
(4,2),
(1000,7),
(30,1),
(5,3),
(800,7),
(700,10);

/**
* Inserimento dei dati nella tabella utprefric
*/
INSERT INTO utprefric(id_ricetta,id_utente) VALUES
(1,1),
(1,3),
(1,5);

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
(3,6);
