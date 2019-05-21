<?php

class GestioneRicette {
    /**
     * Metodo che avvia la ricerca per ingrediente
     * @return array di ECibo
     */
    public function avviaRicercaI(){
        $pm = PersistentManager::getInstance();
        $cibi = $pm->loadAllObjects();
        return $cibi;
    }

    /**
     * Metodo che ricerca una ricetta contenente un determinato cibo
     * @param $idCibo array di idcibo
     * @return array di ERicetta
     */
    public function cercaIngre($idCibo){
        $pm = PersistentManager::getInstance();
        $ric = $pm->ricercaTramiteIngrediente($idCibo);
        return $ric;
    }
    /**
     * Metodo che avvia la ricerca avanzata, comunicando alla view di mostrare i filtri
     */
    public function avviaRicercaAv(){

        //comunica alla vista di mostrare i filtri
    }

    /**
     * Metodo che gestisce la ricerca avanzata
     * @param $idcat id categoria
     * @param $tprep tempo di preparazione
     * @param $diff difficoltà
     * @return array di ERicetta risultati della ricerca
     *
     */
    public function cercaAv($idcat, $tprep, $diff){
        $pm = PersistentManager::getInstance();
        $ricette = $pm->ricercaTramiteFiltri($idcat, $tprep, $diff);
        return $ricette;
    }

    /**
     * Metodo che dato l'id della ricetta selezionata restituisce una ricetta
     * @param $id identificativo ricetta selezionata dall'utente
     * @return oggetto ERicetta
     */
    public function selezionaRicetta($id){
        $pm = PersistentManager::getInstance();
        $ret = $pm->loadById("ricetta",$id);
        return $ret;
    }

    /**
     * Metodo che dato l'id restituisce una ricetta
     * @param $id identificativo della ricetta
     * @return oggetto ERicetta
     */
    public function AggiungiaiPreferiti($idricetta, $idutente){
        $pm = PersistentManager::getInstance();
        $ret = $pm->loadById("ricetta",$idricetta);
        
        $ret->incrementasalvataggi();
        $n = $ret->getNsalvataggi();
        $return= $pm->update("ricetta",$idricetta,'nsalvataggi',$n);
        $ut=  $pm->storeUtPrefRic($idricetta, $idutente);
    }

     /** Metodo che permettte di gestire l'inserimento di un commento dell'utente
     * @param $idricetta id ricetta commentata
     * @param $testo testo del commento
     * @param $data data di inserimento
     * @param $ora ora di inserimento
     * @param $idutente utente che ha inserito il commento
     *
     */
    public function aggiungiCommento($idricetta, $testo, $data, $ora, $idutente){
        $com = new ECommento($testo, $data, $ora, $idutente, $idricetta );
        $pm = PersistentManager::getInstance();
        $id = $pm->store($com);
        if ($id){
            //inserimento corretto, comunica alla vista di inserire l'esito
            print ("inserimento corretto");
        }
        else {
            //errore nell'inserimento, comunica alla vista di inserire l'esito
            print ("inserimento non corretto");
        }
    }
	
}

    /**
     * Metodo che permette di rimuovere una ricetta dai preferiti
     * @param $idricetta identificativo ricetta
     */
    public function rimuoviDaPreferiti($idricetta, $idut){

        $pm = PersistentManager::getInstance();
        $ret1 = $pm->loadById("ricetta",$idricetta);
        $ret1->decrementaSalvataggi();
        $n = $ret1->getNsalvataggi();
        $pm->update("ricetta", $idricetta, "nsalvataggi", $n);
        $pm->deleteUtPrefRic($idricetta, $idut);
    }

}
?>