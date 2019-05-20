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

	
}


?>