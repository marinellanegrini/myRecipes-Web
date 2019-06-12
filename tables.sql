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
('Torta al cioccolato',3,'Tritate il cioccolato fondente, quindi scioglietelo al microonde o a bagnomaria e lasciatelo intiepidire. \n Tagliate il burro a cubetti e versatelo nella ciotola, insieme allo zucchero . \n Azionate la macchina a velocità media con la frusta montata e lavorate il burro fino a ridurlo in crema . \n A questo punto rompete le uova in una ciotola. Continuate in questo modo fino ad ottenere una crema soffice ed omogenea . Incorporate il cioccolato, versandolo direttamente nella ciotola e continuate a sbattere fino ad amalgamarlo. \n Aggiungete il sale all’impasto e mescolate in una ciotolina la farina con il cacao e il lievito, quindi setacciatele direttamente nel composto al cioccolato e aiutandovi con una spatola incorporatele delicatamente nell’impasto. \n Foderate con la carta forno una tortiera da 22-24 cm e versate l’impasto al suo interno 15. \n Infornate in forno statico preriscaldato a 180° per circa 40-45 minuti. \n Una volta cotta sfornate la torta al cioccolato e lasciatela intiepidire.','01:30:00',8,5,0);

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
('Fatta ieri sera per festeggiare un Compleanno: è venuta buonissima è molto apprezzata dai mie ospiti: grazie ragazzi !!!!!!','2019-03-13','19:59:48',false,7,1);




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
('Cioccolato fondente','gr'),
('Lievito per dolci','gr'),
('Cacao','gr'),
('Zucchero','gr'),
('Burro','gr');


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
(150,17),
(8,18),
(50,19),
(180,20),
(200,21),
(180,8),
(6,2);

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
(3,6),
(6,),
(6,),
(6,),
(6),;

INSERT INTO imgcibo(id,data,type,id_cibo) VALUES
(1,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Cibo/olio-doliva.jpg'),'image/jpg',1),
(2,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Cibo/uovap.jpg'),'image/jpg',2),
(3,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Cibo/sale.jpg'),'image/jpg',3),
(4,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Cibo/pasta.jpg'),'image/jpg',4),
(5,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Cibo/pecorino.jpg'),'image/jpg',5),
(6,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Cibo/pepe.jpeg'),'image/jpeg',6),
(7,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Cibo/patate.jpg'),'image/jpg',7),
(8,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Cibo/farina-00.jpg'),'image/jpg',8),
(9,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Cibo/farina_integrale.jpg'),'image/jpg',9),
(10,0xffd8ffe000104a46494600010100000100010000ffdb00840009060713121213131212161415121017141718141514101414141514171614141514181c2820181a271c151421312225292d2e2e2e171f3338332c37282d2e2b010a0a0a0e0d0e1a10101a2c2420242c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2cffc0001108008e00c303011100021101031101ffc4001c0001000203010101000000000000000000000405030607010208ffc4003710000103020404040307040301000000000100020304110506122131415171132261913281a107142342b1c1d1526272e12492b215ffc4001a010100020301000000000000000000000000030401020506ffc4002b110002020104010401040203000000000000010203110412213105132241513214618191152371a1d1ffda000c03010002110311003f00ee28020080200802008020080f2e83261a8ac8d9f1bdadff002706feab594a31ed9bc6b9cff14d9823c5e9dc6c278cf67b563d487d923d35cb9717fd131af045c1b8f4dd6e4183eae8020080200802008020080200802008020080200802008020080d2b3ce67753da188d9ee6ddcee3a072b0eab9facd5fa5ed8f6773c478c5a8ff00659d2ebf734ba0c39d524b9cfd449dcb8ea375cf8c656f6cf436db0d32c463fd19eb72f98c5f503f25b3d3e0d2bd72b1e3044c3f30cd4cef23cdba1dda7e4b30be70f933a8d053a88f28ea59631f6d5c5ac6ce6ece6f43d7b2ec536ab2393c86b7492d359b5f45d85294c200802008020080200802008020080200802008020080c15152d60bb9c00b13bfa71586f00e299b6afc5a89240ebf3db7163c2c5713510df2723d9f8cb957546054d0630f8fe13650c1b89d2b611b3b33d56607bf62548ec6c8abd2c22554f55751edc96e2b0b05fe40c74c154cdfcb21d0e1e879ab7a6938cb0727cbe9d5b4b7f28eec175cf147a80200802008020080200802008020080203c2500ba03d4078501a467eaeab87cd4b0cb239ccb6a63192b1ade61c0f99a7b286ccfc038bd5d7bc100b046e90ee01b922fb92dfcaa9ce3c1d0d06a5c6d516f83c9dda554703d8576e5114d42db613ef47c19eeb6da14cb7cb3bccc24fe71ef75bc17b8a5ae97fad9fa4e13e51d87e8baaba3c33ecfbbac9800a03d401004010040100401004010040101f2501a33f179696ba56cc49638ea1d0c478103ab4dd5394a50b39e81bad3d435ed0e610e69e041b856949306473acb6c8340c5f1392be77454ee79a3845aa5f1024c8ebdfc3888dddb0b1b70ba8659975d039ae71c20c123ded8bc163cffc76bb691cd162647731bf5df70a092c1734f0f5271c2e8d7df5474f986e557da7a583f7110bc2ce0b5bf07c87a60dfd445f651b36764ae617318ed561b6a2380bf451cad8d6f935b6b95f5b8c784fe4ea2338d649f032367605df52b2b5b6cfa5839abc3692bfca4d9e1cdd5911bbdad70ed65b7eaed8f66dfe234967e0da2f70acf10c80eb058f03e1e3abd1aacd7ac8cbb395a8f0d754fdbcafb311cfd1dec209081d81f65afeba3f4c95782b319de89f439c69a4362e319e8f16faa961aaae5fb156ef13a8af9c657ec5fc52870041041e041b8f75653cf4739a71786b0644301004010040100401004044ad95ec1a9add41bbb80f8b4f32df5f45860e4bf68f8a0aaab0c864d2da78ac5eddeee7f9b4ede96543556a4d32fe8bc7cb54dae92f92970dcc159460963f5378dc0bff00d9ab4af509f46faaf15769f9ed7da2eb2e63efc59c59595a616036f0636f84641eb2721d95952cfe4ca5186efc7b3aad1d136189b1d3b18c6b459ad1b347a9b715652e3822349fb4982214ce64a75cb20d664d816e9f8430726dcf0efc4aad7b4b83a5e361273dcba3844cf3c2f7039a8523b8fdbc88207c9f08bfb6fd96d829dfac50e33c99e8a8dce786398e6f70411deea3b66a116c934bbecb16279fb377c358d6d9bc02e46e729727a494711c44de30eab89adb0b2e8c30970702eaec94b92af1fae6169b10b5b248b5a4adc59a73ea08370aaa6d1d5924d619b8e54c49b382d7db58dafd4722ae56d497270f5709552f6be08f996943770a2b92f82e68ed725864cc85994c72085eef23cdb7fca7910ac696f69e1943cc6814a3ea47b4755695d53ca1f480200802008020080f2e80d0fed2731368d81cc9a46d416de3683f8445ec75b4ed6faa86c96383291c7a96a487381372ff00c427ab9fbb9736f865e59e9bc3db8aa497d9b361f39863bc8d0e8dc7623e21dc7458845245c9dae52c2eca2acf0db2f890ec2fb8fdc29159ce19cdd678d938fab576bb5ff86ed97f3ffdd5c219eef8cb6e0dfccded7e23d159aec71e1f470a767a8b2fbfb2973fe668eaa526278d1a6dbdefecb4b332964eae87554d35e2596ff639f4ed60fcc4f616fd56c91359aaba7cc2bc7fc9592d4d9d704b6de854ca2b07366e4dbdef1fc1b365b9def6bdef712059adbfd4ae7eb2296123b3e16adadcff0082dc545950da7a4dc65762ce02c0a953644eb4d9165ad279a24ccf44196a96ca063259e57ab2d9763c410a682c3296b1e5224d7630e78209504db9176aaa3149a2150d5da561bf070fd566b58791a8598347e82cbf57e2c11bfab6c7e4bb753cc4f01a886cb1c4b25210840100401004010155981a4c45a2e03886921e62203b6beb0091bd96b207e7cc7b0d90c8f649339e5a7480f79909009b0693c552dff24d2a2c52db82250c76600458826ffb7d154be797847aaf1fa65543925cd5474e9becb48ca5d175d516f257784f3bb5a48bdae2f61dca952c9a59a9853ccdf464c7251768d8e965aea6e4e378eaabb21394e394df0563e2b00f65c02749beed2e1bfcb652279ecd6ed16c7ba9786be08f2907d0f42b2960863ae937b6d5c982184bded6f371b2dd3e0da76470e46c343335ad2d1c0136f91b2a17c5b964ea78ce294cc8e92ea1513a8a660748b7511b8c6665b2898dc60d45498446e65d604dd0ed6e360012b64b051be7bded4573a63ee7f52a1c23b0b88a5f45850d31b8256ca3f253befe3077ac8ac229197ea6dd974a8e2278ed6bcdcd9b0a98a81004010040100407cbd97b822e0a0385668a52c99c40b1692171e7947a9d328b8a7f66bb215592793ab1c25c119b1ea36bdb9dd58847920d4dca9adcd96788c8d81ac309d98030b78891eef312eec02b51c2e0f1d75d3ba5ea4fe7fe8a4751199ce734b582fbea3600f4ff0048f08e969756e15ed6b9fd8dbb29e1d4e20a9a5aa76bf18b1f198c79a37b438170d5dc7b2c2b23d19b67a8dcac8c1ac1a1e61c38c0e2dbea00ec6d6dbd47253408b54d4d29e065ca8884bf88e034b4f1dae6db01ea938bc1ce967a5fd1869ea0dced6f313efba8ac867947a1f1b7fb76b2c29aa78dd43b4e9cdb7ca3c73db74da637c8cd0c2d7702b2473b648cce8d8cdcac608d4a52e111c575dc3a03c124b82c5515b9246e14142e9630e2d16ff15536c9979dd183da7d40c898f1ada6d7e2dfe16f0b70f0c86fd33b2398f6765cbf570c90b3c175dad16b7304755d9aa71947da789d55565563562e4b45215c20080200802008020399fda0613693c403cb26ff003e6150ba1c9dad05f9863e8e7f2d1926c05c9dbbaaee291d6aed6c954b8286dcbb777d02a53bdc645d9d51b2b7197c95d36012b9c4177975170b1e6474b2b2b5b1c1c19f8593e13582db03cb2e683a86b24df86c3fda86cb2563f6f08e9d1a7a74eb32c64938961c59f137e8abca338be4e9d36c26b8355c7a8350bb77b722af69b50d3c48e6791f1fea41bad72695511e93b8defecbaf179e8f2334d70c9eddc35c37b8dfd142d72d17b476e3da65936171b0e7d3dd69b7274d6a76f67b0b1ee17635ce17b795a5dbf1b6c8eb365ad87d99bc09d80b8c32340e25cc7307d53d330f5b1656c988976c39f55bfa292cb2b7f90dcd420bb2c70d65c8eeab5cf83b3a34d472751a2c644503630de0d507a892c0fd3efb37366bf5d53a892aa49e59d5ad6d8e0b7c8f988d34e013e479b387eeade96d7091caf2da45757b9768edd138100837045c765d94f28f138c3c1f6b202008020080203c406a79dafe19b74bfb2ab3e4b544b0f28d06941647e23c00e75fe4de5eea9ddf47a1d22ddc911b5773bae64f96771438361c2aaa2d8103e6add5b51ccd4d567c3275563b13366d94b2b229611561a1b25cc8d4f17c5cc85559c9c99d9d3d11ad7050554f75884792c49f1835ac670fbb8cadf86e36e3c2d71d976289b703c4791d3ecb9e0914f046f27c33b3f72c3b169fedea16b3925d94a11971b136c9f4d84c8d370d0481b6adc03fd56e67ba89eae0ba3b50f197da9397062660afeae6106f763882e71e24916dd692d6bf845cabc2d58c4f262af86adad205448e16e0f76b1f50a586ad3fc910dfe1f09bae4cd5a08887588b11c55b9c938f07274b5ca36e24ba363c340162b9d73c9ea695ed2e0d4faaa98c96e1846092a16540df71f744ff00383eab78a7922ba6b6b3f4064da93252444f100b7d8aecd2f313c2eae2a373c178a52b0401004010040101558dd1788c3d94338924258397e69668bb7fa6c3d973ad3d4681fb51ab78d62aa38a3b5191905611cd636bf832da6637d522898c91e69d6ca2614886e92eb7510e464a6883d8fb9fcc077241fe15b84d460db383e42995b7c6315d96587d1c510f28df9b8f13fc2a375ee675b47e3e1a78fdb36ac1e382da9eef92de9516b934d4caefc628fbc571082d6601c3a2924e1f06945772fc99a956d402540fb3a0a26b58b530beb03bab94d9c6d673f5344776f5fc9f34c56268deb7844c00a894493d43cf0c9591ea16d4149c365ba894aeb5b3bbe4da3315244d3c482ef72ba5547113cb6aa7bed6cbb5295c200802008020080f08580736fb42c3b4bcbadb3c5fe6a8dd5e19dcf1f7e63839ccf010555703b90b7822cbb2c6d245611dcf4c1b399e5c959da6aec48c12ecb6c1953ca3350b88b5c6c771ebcbf62b172f6a4287176b97d705909952da5fdc7cbaa8f55b46268da313aa56fb4c64c324cb65135c9f3245aa327d54d1454bace705751f1f9a95a2befe0b989ab5c116f2444c09b5187266d19530e12cad04d9a0ddddba2920b2ca3aabb6c4ecb080000380161d97423d1c17d99164c04010040100401004053e65c304f096f31b8515b1ca27d35be9cce4388d1169b2a0d1e86bb32b253cf02c6099584634cb1b4dbd53e842b6c11b9b2bab6325d66f13b0f9acc57248acdb1cb2df305208feec1bf0f81a2ffdcd249ffd25d1e883c6df9736fe5988c5b03e8abec3a5eb10e64da6eac239715b2899de79b959da63d42d032d0394a970736cb3df935a6120edd54ae39456f5de4991d4bd6be999fd42244733ca2ac8e5a87f06eff67e1c24befba95239b7cb2768a4f842b1029333adcc04010040100401004060ac759a7b2d26f8331ece479a6ab43c922e09e5c554713a9a7b1ae19ad3aa987810a26b0742324cc4666f558c92ed66296a1a39ace0d5bc7656b65bbc11c8a9611c152fb772daba2eb119db243a49dda6ed3ebcfe8b79aca2be9e6eab33f045a375daaae0ecef4f9479341758c1b46c238a74c197333c54dbadb04729965253de323aec3d4a9231c94adb36f257c596dc7915360a0ee24372cc9c9ab1831eb16587e51909dc2c9a3b8e8b95b2df856242de31209cf26e6c6d94c9109f4b20200802008020080203055b2ed23d16b35c194731cdb86937d956c16a1239bd55296920a16a337f045734f55aec46feacfecf04456db51a3937db2652519256c91ab919ea681f647d1aa9106391d11b1170a171c972bbbe0991d6b4a89a68b91929747dfde1bd50df079ffd16b786eb749b2bd93512e72f874ce05df20380532491cbba796746c370816e0b3d955b2e21c19bd16ca263258418735bc96ea069b898d681c14891a9f4b2020080200802008020080f084052e3185078e0a1944de3239f635968efe551e0994cd5e7c05e0ecd59c12fa867a1cb3238ee10c3b4db30cca440dc2c9139932af2d6dc1630cc6f354c5f2f1df658258cf06a5558639a782c609e3691beee56306eed7d64cf4f49736016d822723a6e48c148b1216d8f82b4e6748a6a60d0b751216c9202912353d5901004010040100401004010040101e10808f351b5dc42d1c119c911f8346792c6c33b999e1c3636f00b2a08c6e2536303805b6d46321d103c426d43255e2184b1ca27046ea46ad88e5b61bad7a3752650cb94d84f10b06dbd969846528c10564d5c99bee1d42d8db6014b189137926adcc0401004010040100407ffd9,'image/jpg',10);

INSERT INTO imgricetta(id,data,type,id_ricetta) VALUES
(1,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Ricetta/uova-sode.jpg'),'image/jpg',1),
(2,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Ricetta/patate-al-forno.jpg'),'image/jpg',2),
(3,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Ricetta/patate-fritte.jpg'),'image/jpg',3);

INSERT INTO imgutente(id,data,type,id_utente) VALUES
(1,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Utente/arianna.jpg'),'image/jpg',1),
(2,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Utente/marinella.jpg'),'image/jpg',2),
(3,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Utente/valepa.jpg'),'image/jpg',3),
(4,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Utente/lorenzo.jpg'),'image/jpg',4),
(5,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Utente/oscar.jpg'),'image/jpg',5),
(6,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Utente/valeio.jpg'),'image/jpg',6),
(7,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/Utente/claudia.jpg'),'image/jpg',7);

INSERT INTO galleryricetta(id,data,type,id_ricetta) VALUES
(1,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/GalleryRicetta/uovaacqua.jpg'),'image/jpg',1),
(2,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/GalleryRicetta/togliuova.jpg'),'image/jpg',1),
(3,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/GalleryRicetta/uovasuode.jpg'),'image/jpg',1),
(4,LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/myRecipes_img/GalleryRicetta/fineuova.jpg'),'image/jpg',1);

