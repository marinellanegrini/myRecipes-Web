<?php

class CGestioneRicetteMobile{

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

    public function cercaAvanzata(){
        $view = new VMobile();
        $json = $view->recuperaDati();
        // convertire da json a array associativo filtri
        $pm = FPersistentManager::getInstance();
        $ricette = $pm->ricercaTramiteFiltri(/* filtri*/);
        $view->mandaDati($ricette);
    }

    public function Ricetta($id) {
        $view = new VMobile();
        $pm = FPersistentManager::getInstance();
        $ricetta = $pm->loadById("ricetta",$id);
        $view->mandaDati($ricetta);
    }

    public function Preferiti() {
        //dal token recupero i preferiti dell'utente
        $pm = FPersistentManager::getInstance();
        // $ut = $pm->loadById("utente", $idutente);
       // $ricette = $ut->getPreferiti();
        $view = new VMobile();
       // $view->mandaDati($ricette);
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

    public function Commento($idricetta) {
        //dal token recupero i dati dell'utente
        $view = new VMobile();
        $json = $view->recuperaDati();
        // convertire da json a ECommento
        $pm = FPersistentManager::getInstance();
       // $id = $pm->store($com);
        // $utente = $pm->loadById("utente", $idutente);
        // $view->mandaDati($utente aggiornato);

    }


}

?>