<?php
require_once 'Classes.php';

/*
$primo= "Primo";
$v= new ECommento("ciao","2019/09/20","15:02:30",1,2);
$v->setId(1);

$p= new ECommento("pasqua","2220/09/22","15:02:30",1,2);
$p->setId(2);

$e= new ECommento("natale","2220/09/22","15:02:30",3,4);
$e->setId(3);


$p1=new EUtente($primo,"435","ariannatusi@live.it","arianna","tusi");
$p1->setStatoAttivo();
$p1->addCommento($v);
$p1->addCommento($p);
$p1->addCommento($e);
//print($p1->cercaCommento(1));
//print_r($p1->getCommenti());

$p1->eliminaCommento(2);
//print_r($p1->getCommenti());

//print($p1);


/**
print($p1->getNome()."\n");
print($p1->getCognome()."\n");
print($p1->getUsername()."\n");
print($p1->getPassword()."\n");
print($p1->getEmail()."\n");
echo implode(" ", $p1->getCommenti());*/

/*$nome="carota";



	$c=new ECibo($nome);
	$fcibo = new FCibo();
	$id=$fcibo->store($c);
	$c=$fcibo->loadById(9);


	$i = new EIngrediente (4,$c);
	$fing=new FIngrediente();
	$fing->store($i);
	$i=$fing->loadById(2);
	
	$categoria = new ECategoria ("Antipasto");
	$fcat=new FCategoria();
	$fcat->store($categoria);
	$categoria=$fcat->loadById(7);


	$ricetta = new ERicetta ("Pasta",3,"dcjndcnd",'00:10:00',4,$categoria,2);
	
	


	$c1=new ECibo("patate");
	$fcibo->store($c1);
	$c1=$fcibo->loadById(10);
	
	$ingr1 = new EIngrediente(2, $c1);
	$fing->store($ingr1);
	$ingr1=$fing->loadById(3);
	
	$ricetta->addIngrediente($i);
	$ricetta->addIngrediente($ingr1);
	
	//print($ricetta);
	$p1->addPreferito($ricetta);
	
	
	
	$ricettadb = new FRicetta();
	$ricettadb->store($ricetta);


	$comm=new Ecommento("jdasjf","2019/07/30","14:40:32",5,2);
	$fcom=new FCommento();



	$fcom->store($comm);
	$comm=$fcom->loadById(8);
	
	$comm1=new Ecommento("ciao","2018/05/33","12:40:55",4,2);
	$fcom->store($comm1);
	$comm1=$fcom->loadById(9);


	$ricetta->addCommento($comm);

	$ricetta->addCommento($comm1);*/

	$pm = PersistentManager::getInstance();
	$r = $pm->loadById("ricetta", 2);
	print ($r);

	$pm->update("ricetta",3,'nome','patatine fritte');


	
	
	


	
		



	
	
	

	

	
?>