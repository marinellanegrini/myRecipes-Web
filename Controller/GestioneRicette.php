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
     * Metodo che dato l'id restituisce una ricetta
     * @param $id identificativo ricetta
     * @return oggetto ERicetta
     */
    public function selezionaRicetta($id){
        $pm = PersistentManager::getInstance();
        $ret = $pm->loadById("ricetta",$id);
        return $ret;
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