<?php

class MCGestioneRicetteMobile{

    public function RicercaPerIngredienti(){
        $pm = FPersistentManager::getInstance();
        $cibi = $pm->loadAllObjects();
        $view = new VMobile();
        $view->mandaDati($cibi);

    }

    public function cercaPerIngredienti(){
        $view = new VMobile();
        $json = $view->recuperaDati();
        // convertire da json a array di id cibo
        $pm = FPersistentManager::getInstance();
        $ricette = $pm->ricercaTramiteIngrediente(/* arrayidcibo*/);
        $view->mandaDati($ricette);
    }

    public function Avanzata(){
        $view = new VMobile();
        $filtri = $view->recuperaDati();
        $s = $filtri['tprep'];
        if(strlen($s)>3){
            $a = explode("-",$s);
            $filtri['tprep'] = (int)$a[1];
        } else {
            $a = substr($s, 0, 2);
            $filtri['tprep'] = (int)$a+1;
        }
        $filtri['diff'] = (int) $filtri['diff'];

        $pm = FPersistentManager::getInstance();
        $ricette = $pm->ricercaTramiteFiltri($filtri);
        $view->mandaDati($ricette);
    }


    public function Ricetta($id) {
        $view = new VMobile();
        $pm = FPersistentManager::getInstance();
        $ricetta = $pm->loadById("ricetta",$id);
        $view->mandaDati($ricetta);
    }

    public function Preferiti() {
        $t = Token::getInstance();
        $utente = $t->getAuthUtente();

        $ricette = $utente->getPreferiti();
        $view = new VMobile();
        $view->mandaDati($ricette);
    }

    public function AggiungiaiPreferiti($idricetta){
        //dal token recupero i dati dell'utente
        $pm = FPersistentManager::getInstance();
        $ric = $pm->loadById("ricetta",$idricetta);
        $ric->incrementasalvataggi();
        $n = $ric->getNsalvataggi();
        $pm->update("ricetta",$idricetta,'nsalvataggi',$n); //aggiornamento ricetta db
       // $esito =  $pm->storeUtPrefRic($idricetta, $idutente);
       // $utente = $pm->loadById("utente", $idutente);
        $view = new VMobile();
        // $view->mandaDati($utente aggiornato);
    }

    public function rimuoviDaPreferiti($idricetta){
        //dal token recupero i dati dell'utente
        $pm = FPersistentManager::getInstance();
        $ret1 = $pm->loadById("ricetta",$idricetta);
        $ret1->decrementaSalvataggi();
        $n = $ret1->getNsalvataggi();
        $pm->update("ricetta", $idricetta, "nsalvataggi", $n);
        // $esito = $pm->deleteUtPrefRic($idricetta, $idutente);
        // $utente = $pm->loadById("utente", $idutente);
        $view = new VMobile();
        // $view->mandaDati($utente aggiornato);
    }

    public function Commento() {

        $t = Token::getInstance();
        $utente = $t->getAuthUtente();
        $id=  $utente->getId();
        //dal token recupero i dati dell'utente
        $view = new VMobile();
        $json = $view->recuperaDati();
        print_r($json);
        // convertire da json a ECommento
        //$pm = FPersistentManager::getInstance();
        //$id = $pm->store($json['testo']);
        //$utente = $pm->loadById("utente", $id);
        //$view->mandaDati($utente);

    }

    public function Categorie() {
        $pm = FPersistentManager::getInstance();
        $cat = $pm->loadAllCategory();
        $view = new VMobile();
        $view->mandaDati($cat);
    }

    public function Homepage($n){
        $view = new VMobile();

        $pm = FPersistentManager::getInstance();
        $max= $pm->contaricetta();
        $a=array();
        for ($i=1; $i<=$max; $i++){

            array_push($a,$i);
        }
        $b= array_combine(array_values($a),array_values($a));
        $id= array_rand($b,$n);
        $ricette = $pm->loadAllByIds("ricetta",$id);
        $view->mandaDati($ricette);

    }





}

?>