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
        //base 64 immagine
        $img = $ricetta->getImmagine();
        $img->setData(base64_encode($img->getData()));
        $ricetta->setImmagine($img);
        //base 64 gallery
        $gallery = $ricetta->getImgpreparazione();
        foreach ($gallery as $g){
            $g->setData(base64_encode($g->getData()));
        }
        $ricetta->setImgpreparazione($gallery);
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

    public function HomePage(){
        $view = new VMobile();

        $pm = FPersistentManager::getInstance();
        $max= $pm->contaricetta();
        $a=array();
        for ($i=1; $i<=$max; $i++){

            array_push($a,$i);
        }
        $b= array_combine(array_values($a),array_values($a));
        $id= array_rand($b,8);
        //$ids= array_rand($b,3);



        //$ricettePrinc = $pm->loadAllByIds("ricetta",$ids);
        $ricette = $pm->loadAllByIds("ricetta",$id);
        $view->mandaDati($ricette);

    }




}

?>